<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once(APPPATH."libraries/Admin_controller.php");

class Booking extends Admin_Controller 
{
	protected $_booking_validation_rules = array (
                                    array('field' => 'po_no', 'label' => 'Purchase Order No', 'rules' => 'trim|required'),
                                    array('field' => 'officer_name', 'label' => 'Officer Name', 'rules' => 'trim|required'),
                                    array('field' => 'rank', 'label' => 'Rank', 'rules' => 'trim|required'),
                                    array('field' => 'executive', 'label' => 'Booking Executive', 'rules' => 'trim|required'),
                                    array('field' => 'occupancy', 'label' => 'Occupancy', 'rules' => 'trim|required'),
                                    array('field' => 'room_name', 'label' => 'Room Name', 'rules' => 'trim|required'),
                                    array('field' => 'purpose', 'label' => 'Purpose of Visit', 'rules' => 'trim|required'),
                                    array('field' => 'vessel', 'label' => 'Assigned Vessel', 'rules' => 'trim|required'),
                                    array('field' => 'course_name', 'label' => 'Course Name', 'rules' => 'trim|required'),
                                    array('field' => 'checkin_date', 'label' => 'Checkin Date', 'rules' => 'trim|required'),
                                    array('field' => 'checkin_time', 'label' => 'Checkin Time', 'rules' => 'trim|required'),
                                    array('field' => 'checkout_date', 'label' => 'Checkout Date', 'rules' => 'trim|required'),
                                    array('field' => 'checkout_time', 'label' => 'Checkout Time', 'rules' => 'trim|required'),
                                    //array('field' => 'breakfast', 'label' => 'Breakfast', 'rules' => 'trim|required'),
                                    //array('field' => 'lunch', 'label' => 'Lunch', 'rules' => 'trim|required'),
                                    //array('field' => 'snacks', 'label' => 'Snacks', 'rules' => 'trim|required'),
                                   // array('field' => 'printout', 'label' => 'Printout', 'rules' => 'trim|required'),
                                   // array('field' => 'laundry', 'label' => 'Laundry', 'rules' => 'trim|required'),
                                    array('field'=>'inv_address','label'=>'Invoice Ref. Address', 'rules' => 'trim|required'),
                                    array('field' => 'checked_in', 'label' => 'Checked In', 'rules' => 'trim|required'),
                                   // array('field' => 'logistics', 'label' => 'Logistics', 'rules' => 'trim|required'),
                                  );
	
    function __construct()
    {
        parent::__construct();          
        $this->load->model('booking_model');
    }  

    public function index()
    {
    	redirect("booking/create");
    }
    public function create($edit_id='')
	  {
      $this->layout->set_title('Book A Room');
	    $this->form_validation->set_rules($this->_booking_validation_rules);       
	    if($this->form_validation->run())
	    {
	      $form = $this->input->post();
	      $ins['inv_no'] = "APH-1718-".rand(0,999);
	      $ins['po_no'] = $form['po_no'];
	      $ins['officer_name'] = $form['officer_name'];
	      $ins['rank_id'] = $form['rank'];
	      $ins['executive_id'] = $form['executive'];
	      $ins['occupancy'] = $form['occupancy'];
	      $ins['room_id'] = $form['room_name'];
	      $ins['purpose'] = $form['purpose'];
	      $ins['vessel_id'] = $form['vessel'];
	      $ins['course_name'] = $form['course_name'];
	      $ins['checkin_date'] = date("Y-m-d",strtotime($form['checkin_date']));
	      $ins['checkin_time'] = date("H:i",strtotime($form['checkin_time']));
	      $ins['checkout_date'] = date("Y-m-d",strtotime($form['checkout_date']));
	      $ins['checkout_time'] = date("H:i:s",strtotime($form['checkout_time']));
	      $ins['e_checkout_date'] = date("Y-m-d",strtotime($form['e_checkout_date']));
	      $ins['e_checkout_time'] = date("H:i:s",strtotime($form['e_checkout_time']));
	      $ins['breakfast'] = $form['breakfast'];
	      $ins['lunch'] = $form['lunch'];
	      $ins['snacks'] = $form['snacks'];
	      $ins['laundry'] = $form['laundry'];
	      $ins['inv_address_id'] = $form['inv_address'];
	      $ins['checked_in'] = $form['checked_in'];
	      $ins['logistics'] = $form['logistics'];
	      $ins['discount'] = $form['discount'];
        if($edit_id)
        {
          $ins_id = $this->booking_model->update(array("id"=>$edit_id),$ins,"bookings");
	        $this->session->set_flashdata("success_msg","Room updated successfully.",TRUE);
        }
        else
        {
          $ins_id = $this->booking_model->insert($ins,"bookings");
	        $this->session->set_flashdata("success_msg","Room booked successfully.",TRUE);
        }
        redirect("booking/logs");
	    }
      if($edit_id)
        $this->data['editdata'] = $this->booking_model->get_bookings(array("a.id"=>$edit_id));
      else
        $this->data['editdata'] = array("id"=>"","po_no"=>"","officer_name"=>"","course_name"=>"","checkin_date"=>"","checkout_date"=>"","e_checkout_date"=>"","checkin_time"=>"","e_checkout_time"=>"","checkout_time"=>"","breakfast"=>"","lunch"=>"","printout"=>"","laundry"=>"","snacks"=>"","inv_address_id"=>"","logistics"=>"","discount"=>"","checked_in"=>"");
	    $this->layout->view('frontend/roombooking/create');
	  }

	  public function logs()
	  {
      $this->layout->set_title('Booking Logs');
	  	$this->layout->add_javascripts(array('listing'));
      $this->load->library('listing');
      $this->simple_search_fields = array('');
      $this->_narrow_search_conditions = array("po_no","officer_name","checkout_date_from","checkout_date_to","inv_no","invoice_link","status","pdf_downloaded");
      $str = '<a href="'.site_url('booking/create/{id}').'" class="table-action"><i class="fa fa-edit edit"></i> Edit</a>';
      $this->listing->initialize(array('listing_action' => $str));
      $listing = $this->listing->get_listings('booking_model', 'listing');
      if($this->input->is_ajax_request())
          $this->_ajax_output(array('listing' => $listing), TRUE);
      $this->data['bulk_actions'] = array('' => 'select', 'delete' => 'Delete');
      $this->data['simple_search_fields'] = $this->simple_search_fields;
      $this->data['search_conditions'] = $this->session->userdata($this->namespace.'_search_conditions');
      $this->data['per_page'] = $this->listing->_get_per_page();
      $this->data['per_page_options'] = array_combine($this->listing->_get_per_page_options(), $this->listing->_get_per_page_options());
      $this->data['search_bar'] = $this->load->view('frontend/roombooking/search_bar', $this->data, TRUE);
      $this->data['listing'] = $listing;
      $this->data['grid'] = $this->load->view('listing/view', $this->data, TRUE);
	  	$this->layout->view('/frontend/roombooking/logs');
	  }

    public function operation()
    {
      $opt = explode(",",$_POST['opt']);
      $order = $_POST['order'];
      for ($i=0; $i <count($opt) ; $i++)
      {
        if($order=="1" || $order==1)
          $up['status']= "Closed";
        else if($order=="2" || $order==2)
          $up['invoice_link'] = base_url()."booking/invoice/".$opt[$i];
        else
          $up['pdf_downloaded'] = "Yes";
        $ins_id = $this->booking_model->update(array("id"=>$opt[$i]),$up,"bookings");
      }
    }

    
}
?>
