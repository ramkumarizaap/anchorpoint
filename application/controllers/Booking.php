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
                                    array('field' => 'e_checkout_date', 'label' => 'Expected Checkout Date', 'rules' => 'trim'),
                                    array('field' => 'e_checkout_time', 'label' => 'Expected Checkout Time', 'rules' => 'trim'),                                    
                                    array('field' => 'breakfast', 'label' => 'Breakfast', 'rules' => 'trim'),
                                    array('field' => 'lunch', 'label' => 'Lunch', 'rules' => 'trim'),
                                    array('field' => 'snacks', 'label' => 'Snacks', 'rules' => 'trim'),
                                    array('field' => 'printout', 'label' => 'Printout', 'rules' => 'trim'),
                                    array('field' => 'laundry', 'label' => 'Laundry', 'rules' => 'trim'),
                                    array('field'=>'inv_address','label'=>'Invoice Ref. Address', 'rules' => 'trim|required'),
                                    array('field' => 'checked_in', 'label' => 'Checked In', 'rules' => 'trim|required'),
                                    array('field' => 'logistics', 'label' => 'Logistics', 'rules' => 'trim'),
                                  );
	
    function __construct()
    {
        parent::__construct();          
        $this->load->model('booking_model');
        $this->load->library("pdf");
    }  

    public function index()
    {
      
    	redirect("booking/logs");
    }
    public function create($edit_id='')
	  {
      $this->layout->set_title('Book A Room');
      if($edit_id)
      {
        $this->form_validation->set_rules('po_no', 'Purchase Order No', 'callback_check_po_no');
      }
	    $this->form_validation->set_rules($this->_booking_validation_rules);       
	    if($this->form_validation->run())
	    {
	      $form = $this->input->post();
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

        if($form['e_checkout_date']){
	         $ins['e_checkout_date'] = date("Y-m-d",strtotime($form['e_checkout_date']));
	         $ins['e_checkout_time'] = date("H:i:s",strtotime($form['e_checkout_time']));
        }   

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
          $this->invoice($edit_id);
	        $this->session->set_flashdata("success_msg","Record updated successfully.",TRUE);
        }
        else
        {
          $ins['inv_no'] = "APH-1718-".rand(0,999);
          $ins_id = $this->booking_model->insert($ins,"bookings");
	        $this->session->set_flashdata("success_msg","Room booked successfully.",TRUE);
        }
        redirect("booking/logs");
	    }
      if($edit_id){
        $this->data['editdata'] = $this->booking_model->get_bookings(array("a.id"=>$edit_id));

        if($this->data['editdata']['e_checkout_date']=='0000-00-00'){
          $this->data['editdata']['e_checkout_date']="";
          $this->data['editdata']['e_checkout_time']="";
        }
      }
      else{
        $this->data['editdata'] = array("id"=>"","po_no"=>"","officer_name"=>"","course_name"=>"","checkin_date"=>"","checkout_date"=>"","e_checkout_date"=>"","checkin_time"=>"","e_checkout_time"=>"","checkout_time"=>"","breakfast"=>"","lunch"=>"","printout"=>"","laundry"=>"","snacks"=>"","inv_address_id"=>"","logistics"=>"","discount"=>"","checked_in"=>"","rank_id"=>"","executive"=>"","occupancy"=>"","room_name"=>"","purpose"=>"","vessel"=>"","inv_address"=>"","rank"=>"","room"=>"","executives"=>"","address"=>"","cost_centre"=>"","room_id"=>"","executive_id"=>"","rank_id"=>"","vessel_id"=>"");
      }
	    $this->layout->view('frontend/roombooking/create');
	  }
    public function check_po_no($str)
    {
      $chk = $this->booking_model->get_where(array("po_no"=>$str))->row_array();
      if($chk)
      {
        $this->form_validation->set_message('check_po_no', 'This '.$str.' {field} already exists.');
        return false;
      }
      else
        return true;
    }

	  public function logs()
	  {
      /*Room Booking*/
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
          $up['invoice_link'] = base_url().$this->invoice($opt[$i]);
        else
          $up['pdf_downloaded'] = "Yes";
        $ins_id = $this->booking_model->update(array("id"=>$opt[$i]),$up,"bookings");
      }
    }

    public function invoice($id='')
    {
      $this->data['invoice'] = $this->booking_model->get_bookings(array("a.id"=>$id));
      $html = $this->load->view("/frontend/roombooking/invoice",$this->data,true);
      $pdf = $this->pdf->load();
      $pdf->setFooter("Page {PAGENO} of {nb}");
      // $css = file_get_contents('assets/css/invoice.css');
      // $css .= file_get_contents('assets/css/bootstrap.min.css');
      // $pdf->WriteHTML($css,1);
      $pdf->WriteHTML($html);
      $pdfpath = "assets/pdf/invoice/room/".$this->data['invoice']['inv_no'].".pdf";
      $pdf->Output($pdfpath, 'F');
      $date1 = date("Y-m-d H:i:s",strtotime($this->data['invoice']['checkin_date']." ".$this->data['invoice']['checkin_time']));
      $date2 = date("Y-m-d H:i:s",strtotime($this->data['invoice']['checkout_date']." ".$this->data['invoice']['checkout_time']));
      $days = ceil(abs(strtotime($date2) - strtotime($date1)) / 86400);
      $total = $days * $this->data['invoice']['tariff'];
      $tt = ($total / 100 ) * $this->data['invoice']['discount'];
      $t_value = $total - $tt;
      $cgst=($t_value / 100 ) * 6;
      $sgst=($t_value / 100 ) * 6;
      $ins['invoice_amount'] = ceil($t_value + $cgst + $sgst);
      $update = $this->booking_model->update(array("id"=>$id),$ins,"bookings");
      return $pdfpath;
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


     public function export_excel()
    {
       $where = array();
      if(isset($_POST['search_officer_name']) && $_POST['search_officer_name']!='')
      {
        $where['a.officer_name'] = $_POST['search_officer_name'];
      }
      if(isset($_POST['search_from_date']) && $_POST['search_from_date']!='')
      {
        $where['a.checkout_date>='] = $_POST['search_from_date'];
      }
      if(isset($_POST['search_to_date']) && $_POST['search_to_date']!='')
      {
        $where['a.checkout_date<='] = $_POST['search_to_date'];
      }
      if(isset($_POST['search_inv_no']) && $_POST['search_inv_no']!='')
      {
        $where['a.inv_no'] = $_POST['search_inv_no'];
      }
      if(isset($_POST['search_po_no']) && $_POST['search_po_no']!='')
      {
        $where['a.po_no'] = $_POST['search_po_no'];
      }
      if(isset($_POST['search_pdf_link']) && $_POST['search_pdf_link']!='')
      {
        if($_POST['search_pdf_link']=="enable")
          $where['a.invoice_link'] = "IS NOT NULL";
        else
          $where['a.invoice_link'] = "IS NULL";
      }
      if(isset($_POST['search_order_status']) && $_POST['search_order_status']!='')
      {
        $where['a.status'] = $_POST['search_order_status'];
      }
      if(isset($_POST['search_pdf_downloaded']) && $_POST['search_pdf_downloaded']!='')
      {
        $where['a.pdf_downloaded'] = $_POST['search_pdf_downloaded'];
      }
      header('Content-type: application/vnd.ms-excel');
      header('Content-Disposition: attachment; filename=Room-Booking-'.date("Y-m-d").'.xls');
      $books = $this->booking_model->get_room_bookings($where);
      // echo "<pre>";print_r($books);
      $str = "<table border=1>
                <thead>
                  <th>SNo</th><th>Invoice No</th><th>PO NO</th><th>Officer Name</th><th>Rank</th><th>Booking Executive</th>
                  <th>Purpose of Visit</th><th>course Name</th><th>Assigned Vessel</th><th>Checkin Date</th><th>Checked In</th>
                  <th>Checkout Date</th><th>Occupancy</th><th>Room</th><th>Room Tariff</th><th>Breakfast</th>
                  <th>Lunch</th><th>Snacks</th><th>Printout</th><th>Laundry</th><th>Logisitcs</th><th>Discount Amt</th>
                  <th>Invoice Amt</th><th>Pdf Downmloaded</th>
                </thead>
              <tbody>";
      $i=1;
      foreach ($books as $value)
      {
        $str .= "<tr>
                  <td>".$i++."</td>
                  <td>".$value['inv_no']."</td>
                  <td>".$value['po_no']."</td>
                  <td>".$value['officer_name']."</td>
                  <td>".$value['rank']."</td>
                  <td>".$value['executive']."</td>
                  <td>".$value['purpose']."</td>
                  <td>".$value['course_name']."</td>
                  <td>".$value['vessel']."</td>
                  <td>".$value['checkin_date']."</td>
                  <td>".$value['checked_in']."</td>
                  <td>".$value['checkout_date']."</td>
                  <td>".$value['occupancy']."</td>
                  <td>".$value['room']."</td>
                  <td>".$value['tariff']."</td>
                  <td>".$value['breakfast']."</td>
                  <td>".$value['lunch']."</td>
                  <td>".$value['snacks']."</td>
                  <td>".$value['printout']."</td>
                  <td>".$value['laundry']."</td>
                  <td>".$value['logistics']."</td>
                  <td>".$value['discount']."</td>
                  <td>".$value['invoice_amount']."</td>
                  <td>".$value['pdf_downloaded']."</td>
                </tr>";
      }
      $str .= "</tbody>
              </table>";
      echo $str;
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
