<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once(APPPATH."libraries/Admin_controller.php");

class Taxi extends Admin_Controller 
{
	protected $_taxi_validation_rules = array (
                                    array('field' => 'driver_name', 'label' => 'Driver Name', 'rules' => 'trim|required'),
                                    array('field' => 'officer_name', 'label' => 'Officer Name', 'rules' => 'trim|required'),
                                    array('field' => 'rank', 'label' => 'Rank', 'rules' => 'trim|required'),
                                    array('field' => 'to', 'label' => 'To Location', 'rules' => 'trim|required'),
                                    array('field' => 'from', 'label' => 'From Location', 'rules' => 'trim|required'),
                                    array('field' => 'date', 'label' => 'Pickup Date', 'rules' => 'trim|required'),
                                    array('field' => 'trip_sheet', 'label' => 'Trip Sheet No', 'rules' => 'trim|required'),
                                    array('field' => 'vessel', 'label' => 'Vessel', 'rules' => 'trim|required'),
                                    array('field' => 'charge', 'label' => 'Charge', 'rules' => 'trim|required'),
                                    array('field' => 'day_type', 'label' => 'Day Type', 'rules' => 'trim|required'),
                                    array('field' => 'kms', 'label' => 'No.of Kms', 'rules' => 'trim|required'),);
	
    function __construct()
    {
        parent::__construct();          
        $this->load->model('taxi_model');
    }  

    public function index()
    {
    	redirect("taxibooking/logs");
    }
    public function create($edit_id='')
	  {
      $this->layout->set_title('Book A Taxi');
	    $this->form_validation->set_rules($this->_taxi_validation_rules);       
	    if($this->form_validation->run())
	    {
	      $form = $this->input->post();
	      $ins['inv_no'] = "APH-1718-INV-".rand(0,999);
	      $ins['driver_name'] = $form['driver_name'];
	      $ins['officer_name'] = $form['officer_name'];
	      $ins['rank'] = $form['rank'];
	      $ins['to'] = $form['to'];
	      $ins['from'] = $form['from'];
	      $ins['date'] = $form['date'];
	      $ins['trip_sheet'] = $form['trip_sheet'];
	      $ins['vessel'] = $form['vessel'];
	      $ins['waiting'] = $form['waiting'];      
	      $ins['toll'] = $form['toll'];
	      $ins['parking'] = $form['parking'];
        $ins['day_type'] = $form['day_type'];
        $ins['kms'] = $form['kms'];
        $ins['amount'] = $form['charge'];
        $ins['cgst'] = ($ins['amount'] / 100 ) * 2.5;
        $ins['sgst'] = ($ins['amount'] / 100 ) * 2.5;
        $ins['invoice_sent'] = "No";
        $ins['cash_received'] = "No";
        $ins['total'] = ceil($ins['amount'] + $ins['toll'] + $ins['parking']);
        $ins['grand_total'] = ceil($ins['total'] + $ins['sgst'] + $ins['cgst']);
        if($edit_id)
        {
          $ins['updated_date'] = date("Y-m-d H:i:s");
          $ins_id = $this->taxi_model->update(array("id"=>$edit_id),$ins,"taxi_booking");
          $this->session->set_flashdata("success_msg","Taxi updated successfully.",TRUE);
        }
        else
        {
          $ins['created_date'] = date("Y-m-d H:i:s");
          $ins_id = $this->taxi_model->insert($ins,"taxi_booking");
	        $this->session->set_flashdata("success_msg","Taxi booked successfully.",TRUE);
        }
        redirect("taxi/logs");
	    }
      if($edit_id)
        $this->data['editdata'] = $this->taxi_model->get_bookings(array("a.id"=>$edit_id));
      else
        $this->data['editdata'] = array("id"=>"","driver_name"=>"","officer_name"=>"","to"=>"","from"=>"","date"=>"","trip_sheet"=>"","waiting"=>"","toll"=>"","parking"=>"","rank"=>"","vessel"=>"","charge"=>"","day_type"=>"","kms"=>"");
	    $this->layout->view('frontend/taxibooking/create');
	  }

	  public function logs()
	  {
      $this->layout->set_title('Taxi Booking Logs');
	  	$this->layout->add_javascripts(array('listing'));
      $this->load->library('listing');
      $this->simple_search_fields = array('');
      $this->_narrow_search_conditions = array("driver_name","officer_name","date","trip_sheet","inv_no");
      $str = '<a href="'.site_url('taxi/create/{id}').'" class="table-action"><i class="fa fa-edit edit"></i> Edit</a>';
      $this->listing->initialize(array('listing_action' => $str));
      $listing = $this->listing->get_listings('taxi_model', 'listing');
      if($this->input->is_ajax_request())
          $this->_ajax_output(array('listing' => $listing), TRUE);
      $this->data['bulk_actions'] = array('' => 'select', 'delete' => 'Delete');
      $this->data['simple_search_fields'] = $this->simple_search_fields;
      $this->data['search_conditions'] = $this->session->userdata($this->namespace.'_search_conditions');
      $this->data['per_page'] = $this->listing->_get_per_page();
      $this->data['per_page_options'] = array_combine($this->listing->_get_per_page_options(), $this->listing->_get_per_page_options());
      $this->data['search_bar'] = $this->load->view('frontend/taxibooking/search_bar', $this->data, TRUE);
      $this->data['listing'] = $listing;
      $this->data['grid'] = $this->load->view('listing/view', $this->data, TRUE);
	  	$this->layout->view('/frontend/taxibooking/logs');
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

    public function invoice($id='')
    {
      $this->data['invoice'] = $this->booking_model->get_bookings(array("a.id"=>$id));
      $this->load->view("/frontend/roombooking/invoice",$this->data);
    }

    public function pdfupload()
    {
      $path = $this->do_upload()['upload_data']['file_name'];
      $res = $this->ExtractTextFromPdf("assets/pdf/".$path)[0];
      $q = array();
      $q['vessel'] = get_ajax_row_id(array("name"=>$res['11']),"vessels");
      $q['rank'] = get_ajax_row_id(array("name"=>$res['27']),"rank");
      $q['officer_name'] = trim($res['26']);
      $q['po_no'] = $res['8'];
      $a = explode(" ",$res['14']);
      $date = explode("/",$a[0]);
      $checkindate = date("Y-m-d",strtotime($date[0]."-".$date[1]."-".$date[2]));
      $checkintime = date("H:i",strtotime($a[1]));
      $q['checkin_date'] = $checkindate;
      $q['checkin_time'] = $checkintime;
      $exe = explode(":",$res['34']);
      $q['executive'] = get_ajax_row_id(array("name"=>trim($exe['1'])),"executives");
      echo json_encode($q);
    }
    public function do_upload()
    {
      $config['upload_path']          = 'assets/pdf/';
      $config['allowed_types']        = 'gif|jpg|png|pdf';
      // $config['max_size']             = 10000;
      // $config['max_width']            = 2024;
      // $config['max_height']           = 1768;
      $this->load->library('upload', $config);
      if ( ! $this->upload->do_upload('file'))
      {
        $error = array('error' => $this->upload->display_errors());
        // $this->load->view('upload_form', $error);
        return $error;
      }
      else
      {
        $data = array('upload_data' => $this->upload->data());
        // $this->load->view('upload_success', $data);
        return $data;
      }
    }
    function ExtractTextFromPdf ($pdfdata)
    {
      if (strlen ($pdfdata) < 1000 && file_exists ($pdfdata)) $pdfdata = file_get_contents ($pdfdata); //get the data from file
      if (!trim ($pdfdata)) echo "Error: there is no PDF data or file to process.";
      $result = array(); //this will store the results
      //Find all the streams in FlateDecode format (not sure what this is), and then loop through each of them
      if (preg_match_all ('/<<[^>]*FlateDecode[^>]*>>\s*stream(.+)endstream/Uis', $pdfdata, $m)) foreach ($m[1] as $chunk)
      {
        $chunk = gzuncompress (ltrim ($chunk)); //uncompress the data using the PHP gzuncompress function
        //$chunk = iconv('UTF-8', 'ASCII//TRANSLIT', $chunk); //suggested in comments to code above to remove junk characters
        //If there are [] in the data, then extract all stuff within (), or just extract () from the data directly
        $a = preg_match_all ('/\[([^\]]+)\]/', $chunk, $m2) ? $m2[1] : array ($chunk); //get all the stuff within []
        foreach ($a as $subchunk)
        {
          if (preg_match_all ('/\(([^\)]+)\)/', $subchunk, $m3))
          {
            //$result []= join ('', $m3[1]); //within ()
            $result []= $m3[1]; //within ()
          }
        } 
      }
      else $result = "Error: there is no FlateDecode text in this PDF file that I can process.";
      return $result; //return what was found
    }
    

}
?>
