<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once(APPPATH."libraries/Admin_controller.php");
class Feedback extends Admin_Controller
{
	function __construct()
  {
    parent::__construct();  
    $this->load->model('feedback_model');
  }  
  public function index()
  {
    $this->layout->set_title('Feedback');
    $this->layout->add_javascripts(array('listing'));
    $this->load->library('listing');
    $this->simple_search_fields = array('');
    $this->_narrow_search_conditions = array("po_no","officer_name","checkout_date_from","checkout_date_to","inv_no","invoice_link","status","pdf_downloaded");
    $str = '<a href="javascript:void(0);" data-original-title="Remove" data-toggle="tooltip" data-placement="top" class="table-action btn-padding btn red" onclick="delete_record(\'feedback/delete/{id}\',this);"> Delete</a>';
    $this->listing->initialize(array('listing_action' => $str));
    $listing = $this->listing->get_listings('feedback_model', 'listing');
    if($this->input->is_ajax_request())
        $this->_ajax_output(array('listing' => $listing), TRUE);
    $this->data['bulk_actions'] = array('' => 'select', 'delete' => 'Delete');
    $this->data['simple_search_fields'] = $this->simple_search_fields;
    $this->data['search_conditions'] = $this->session->userdata($this->namespace.'_search_conditions');
    $this->data['per_page'] = $this->listing->_get_per_page();
    $this->data['per_page_options'] = array_combine($this->listing->_get_per_page_options(), $this->listing->_get_per_page_options());
    $this->data['search_bar'] = "";
    $this->data['listing'] = $listing;
    $this->data['grid'] = $this->load->view('listing/view', $this->data, TRUE);
    $this->layout->view('frontend/feedback/index');
  }
  public function contact()
  {
    $this->layout->view('frontend/feedback/contact');
  }
  function delete($del_id)
  {
    $access_data = $this->feedback_model->get_where(array("id"=>$del_id),'id')->row_array();     
    $output=array();
    if(count($access_data) > 0)
    {
      $this->feedback_model->delete(array("id"=>$del_id));
      $output['message'] ="Record deleted successfuly.";
      $output['status']  = "success";
    }
    else
    {
      $output['message'] ="This record not matched by feedback.";
      $output['status']  = "error";
    }      
    $this->_ajax_output($output, TRUE);            
  }
}
?>
