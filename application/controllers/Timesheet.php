<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once(APPPATH."libraries/Admin_controller.php");

class Timesheet extends Admin_Controller 
{
	
    function __construct()
    {
        parent::__construct();  

        if(!is_logged_in())
            redirect('login');
        
        $this->load->model('timesheet_model');
       
    }  
    
    public function index()
    { 
        $this->layout->add_javascripts(array('listing'));  

        $this->load->library('listing');         
        
        $this->simple_search_fields = array(                                                
                                    'e.emp_name'       => 'Name',
                                    'e.emp_code'       => 'Employee Code'
                                                                               
        );
         
        $this->_narrow_search_conditions = array("organization","project","date_range","emplist");
        
        $str = '<a href="javascript:void(0);" data-original-title="Edit" data-toggle="tooltip" data-placement="top" class="table-action" onclick="edit_timesheet(\'form\',\'{id}\');"><i class="fa fa-edit edit"></i></a>';
        if(get_user_role() == '1')
            $str .= '<a href="javascript:void(0);" data-original-title="Remove" data-toggle="tooltip" data-placement="top" class="table-action" onclick="delete_record(\'timesheet/delete/{id}\',this);"><i class="fa fa-trash-o trash"></i></a>';
 
        $this->listing->initialize(array('listing_action' => $str));

        $listing = $this->listing->get_listings('timesheet_model', 'listing');

        if($this->input->is_ajax_request())
            $this->_ajax_output(array('listing' => $listing), TRUE);
        
        $this->data['bulk_actions'] = array('' => 'select', 'delete' => 'Delete');
        $this->data['simple_search_fields'] = $this->simple_search_fields;
        $this->data['search_conditions'] = $this->session->userdata($this->namespace.'_search_conditions');
        $this->data['per_page'] = $this->listing->_get_per_page();
        $this->data['per_page_options'] = array_combine($this->listing->_get_per_page_options(), $this->listing->_get_per_page_options());
        
        $this->data['search_bar'] = $this->load->view('frontend/timesheet/search_bar', $this->data, TRUE);        
        
        $this->data['listing'] = $listing;
        
        $this->data['grid'] = $this->load->view('listing/view', $this->data, TRUE);
        
        $this->layout->view("frontend/timesheet/index");
        
    }
    
    public function create(){

        try
        {
            $data['status']   = 'success';
            $data['message']  = '';

            $form = $this->input->post();

            $emplist = isset($form['emplist'])?$form['emplist'] : array();

            if(!$emplist){

                $where=(isset($form['organization']) && !empty($form['organization']))? array('org_id'=>$form['organization']) : array();

                $emplist = $this->timesheet_model->get_employess($where);                
            }            

            if(!$emplist)
                throw new Exception("No Employees Found.");

            $splitdate  = explode("|",$form['date_range']);

            $datelist = $this->daterange($splitdate[0],$splitdate[1]);

            foreach($emplist as $emp){

                foreach($datelist as $dat){

                    if(!check_is_working_day($dat))
                        continue;

                    $timestamp = strtotime($dat);

                    $day = date('D', $timestamp);


                    if($day=="Fri" || empty($form['hours'])) 
                        $hour=0;
                    else
                        $hour=$form['hours'];

                    $ins_data = array();
                    $ins_data['emp_code']   = $emp;
                    $ins_data['date']       = $dat;
                    $ins_data['hour']       = $hour;
                    $ins_data['type']       = $form['timesheet_type'];

                    if($form['empproject'])
                        $ins_data['project']    = $form['empproject'];

                    $ins_data['purpose']    = '';   
                   
                    $this->insert_and_update_timesheet($ins_data);
                    
                }
            }

            $data['message']  = 'Records created successfully!';

        }
        catch (Exception $e)
        {
            $data['status']   = 'error';
            $data['message']  = $e->getMessage();
                
        }

        if($this->input->is_ajax_request())
            $this->_ajax_output($data, TRUE);

    }

    public function edit($id = 0){

        try
        {
            if(!$id)
                throw new Exception("Invalid ID.");

            $output = array('status'=>'','message'=>'');

            $this->form_validation->set_rules('hour','Hour','trim|required');
            $this->form_validation->set_rules('project','Project','trim');
            $this->form_validation->set_rules('purpose','Purpose','trim');

            $this->form_validation->set_error_delimiters('', '');

            if ( count($_POST) && $this->form_validation->run())
            {
                $ins_data= array();
                $ins_data['hour']      = $this->input->post('hour');
                $ins_data['type']      = $this->input->post('timesheet_type');
                $ins_data['project']   = $this->input->post('project');
                $ins_data['purpose']   = $this->input->post('purpose');
                $ins_data['updated_id']= get_current_user_id();

                $this->timesheet_model->update(array('id'=>$id), $ins_data);

                $output['status']  = 'success';
                $output['message'] = 'Timesheet updated sucessfully';
            }
            
            $data['edit_data'] = $this->timesheet_model->get_edit_record($id);
            $data['id']        = $id;

            $output['content'] = $this->load->view('frontend/timesheet/edit',$data,TRUE);  

        }    
        catch (Exception $e)
        {
            $output['status']   = 'error';
            $output['message']  = $e->getMessage();                
        }
        
        if($this->input->is_ajax_request())
            $this->_ajax_output($output, TRUE);   

    }

    public function import(){

        try
        {
            $message ='';

            $this->load->library('csvreader');

            if(count($_FILES) <= 0 )
                throw new Exception("Please choose file!");

            $config['upload_path'] = './uploads';
            $config['allowed_types'] = 'text/plain|text/csv|csv';
            $config['max_size']     = '20000000';
          
            $this->load->library('upload', $config);

            if (!$this->upload->do_upload())
                throw new Exception($this->upload->display_errors());

            $data  = $this->upload->data();
            
            //read the first row of uploaded file
            $first_row = $this->csvreader->parse_file($data['full_path'], TRUE, $indexedArray = FALSE, $records_to_return=1);

            //get first row from csv
            $fields = $this->csvreader->fields;

            $missing_columns = array();
            foreach ($this->require_fields() as $k=>$v)
            {
                if(!in_array($v, $fields) && !in_array(strtolower($v), $fields) ) 
                    $missing_columns[] = $v;                    
            }
            
            if(count($missing_columns))            
                throw new Exception('Incorrect columns appeared in CSV file.');
            
            $rows = $this->csvreader->parse_file($data['full_path'], TRUE, $indexedArray = FALSE);


            if(!count($rows))
                throw new Exception('No records found in file.');

            foreach ($rows as $row) 
            {
                if( strcmp('', trim($row['empcode'])) === 0 || strcmp('', trim($row['date'])) === 0  || strcmp('', trim($row['hour'])) === 0 )
                    continue;

                if(!check_is_working_day(trim($row['date'])))
                    continue;

                $checkemp = $this->timesheet_model->get_where(array('emp_code'=>trim($row['empcode'])),'id','employee')->num_rows();

                if(!$checkemp)
                    continue;

                $newDate = date("Y-m-d", strtotime($row['date']));

                $timestamp = strtotime($newDate);

                $day = date('D', $timestamp);

                if($day=="Fri") 
                  $hour=0;
                else
                  $hour=$row['hour'];

                $ins_data = array();
                $ins_data['emp_code']   = trim($row['empcode']);
                $ins_data['date']       = trim($newDate);
                $ins_data['hour']       = trim($hour);
                $ins_data['type']       = trim($row['type']);
                //$ins_data['project']    = '';
                $ins_data['purpose']    = trim($row['purpose']);

                $this->insert_and_update_timesheet($ins_data);
            }

            array_map('unlink', glob("./uploads/*"));    

            $message ='File imported successfully';
            $status = 'success';

        }
        catch (Exception $e)
        {
            $status   = 'error';
            $message  = $e->getMessage();                
        }

        $alertmsg = ($status == 'success')?'success_msg':'error_msg';
        $this->session->set_flashdata($alertmsg,$message,TRUE);

        redirect('timesheet');

    }

    function insert_and_update_timesheet($data){

        //Check the data already exists
        $where = array('emp_code'=> $data['emp_code'],'date'=>$data['date']);
        $checkupd = $this->timesheet_model->get_where($where)->num_rows(); 

        if($checkupd){

            $data['updated_id'] = get_current_user_id();

            $day = date('D', strtotime($data['date']));

            if($data['hour']!=0 || $day == 'Fri')
                $this->timesheet_model->update($where, $data);
        }
        else
        {
            $data['created_id'] = get_current_user_id();
            $data['created_date'] = date('Y-m-d H:i:s'); 

            $this->timesheet_model->insert($data);
        } 

        return TRUE;   

    }


    function daterange($start, $end, $step = '+1 day', $format = 'Y-m-d'){

        $start = date($format,strtotime($start));

        $data = array();

        while (strtotime($start) <= strtotime($end)) {

            $data[] = $start;

            $start = date ($format , strtotime( $step, strtotime($start)));
        }

        return $data;
    }

    function delete($del_id)
    {
        $access_data = $this->timesheet_model->get_where(array("id"=>$del_id))->num_rows();
       
        $output=array();

        if($access_data > 0){
            $this->timesheet_model->delete(array("id"=>$del_id));
            $output['message'] ="Record deleted successfuly.";
            $output['status']  = "success";
        }
        else
        {
           $output['message'] ="This record not matched by timesheet.";
           $output['status']  = "error";
        }
        
        $this->_ajax_output($output, TRUE);
            
    }

    function require_fields(){

        $fields = array();

        $fields['empcode']='empcode';  
        $fields['date']='date';
        $fields['hour']='hour';
        $fields['type']='type';
        $fields['purpose']='purpose';

        return $fields;
    }

    public function template_download(){

        $this->load->helper('csv_helper');

        $data[] = $this->require_fields();
        
        array_to_csv($data,'timesheet_import.csv');
            
        exit;
    }

    function export($type){


        try
        {
            $form = $this->input->post();

            list($from, $to)  = explode("|",$form['date_range']);

            $filename = 'Timesheet-'.$from.'-to-'.$to.'.xls';

            header('Content-type: application/vnd.ms-excel');
            header('Content-Disposition: attachment; filename='.$filename);

            $result = $this->timesheet_model->get_report($form,$type);

            $str = '<table><tr>';

            $columns = array('Employee Name','Employee Code','Date(yyyy-mm-dd)','Hours','Type','Organization','Project','Purpose');

            if($type == 2)
                $columns = array('Employee Name','Employee Code','Organization','Hours');

            foreach($columns as $key) {
                $key = ucwords($key);
                $str .= '<th>'.$key.'</th>';
            }

            $str .= '</tr>';


            foreach($result as $ke => $res)
            {
                 $str .= '<tr>';

                if($type == 1){

                     $str .= '<td>'.$res['emp_name'].'</td>';
                     $str .= '<td>'.$res['emp_code'].'</td>';
                     $str .= '<td>'.$res['date'].'</td>';
                     $str .= '<td>'.$res['hour'].'</td>';
                     $str .= '<td>'.$res['type'].'</td>';
                     $str .= '<td>'.$res['organization'].'</td>';
                     $str .= '<td>'.$res['project'].'</td>';
                     $str .= '<td>'.$res['purpose'].'</td>';

                }else{

                     $str .= '<td>'.$res['emp_name'].'</td>';
                     $str .= '<td>'.$res['emp_code'].'</td>';
                     $str .= '<td>'.$res['hour'].'</td>';
                     $str .= '<td>'.$res['organization'].'</td>';

                }    

                $str .= '</tr>';
            }

            $str .= '</table>';

           
        }
        catch (Exception $e)
        {
            $status   = 'error';
            $message  = $e->getMessage();                
        }

        echo $str;
        exit;    
    }

    function org_employees($org_id=''){

        $emp_data = get_employees($org_id);
       
        $output=array();

        $str = '';

        foreach($emp_data as $key => $val){
         
            $str .= '<div class="single-user">
                        <label for="checkbox-'.$key.'" class="custom-checkbox" align="left">'.$val.' </label>
                        <input type="checkbox" name="emplist[]" value="'.$key.'" id="checkbox-'.$key.'" class="checkbox empcheckbox">
                    </div>';

        }
        $output['content']  = $str;
        $output['status']  = "success";
        
        $this->_ajax_output($output, TRUE);
    }

    public function project(){

        try
        {

            $output = array('status'=>'','message'=>'');

            $this->form_validation->set_rules('project_name','Project Name','trim|required|callback_checkproject');
            $this->form_validation->set_rules('description','Description','trim|required');

            $this->form_validation->set_error_delimiters('', '');

            if ( count($_POST) && $this->form_validation->run())
            {
                $ins_data= array();
                $ins_data['name']         = $this->input->post('project_name');
                $ins_data['description']  = $this->input->post('description');
                $ins_data['status']       = 1;
                $ins_data['created_date'] = date('Y-m-d H:i:s'); 

                $this->timesheet_model->insert($ins_data,'projects');

                $output['status']  = 'success';
                $output['message'] = 'Project created sucessfully';

                $output['projects'] = form_dropdown('empproject', array(''=>'Select Project')+ get_projects(), '', 'id="empproject" class="form-control" style="display: inline-block;max-width:160px;"');
            }
            
            $data['data']        = '';

            $output['content'] = $this->load->view('frontend/timesheet/create_project',$data,TRUE);  

        }    
        catch (Exception $e)
        {
            $output['status']   = 'error';
            $output['message']  = $e->getMessage();                
        }
        
        if($this->input->is_ajax_request())
            $this->_ajax_output($output, TRUE);   

    }  

    function checkproject($name)
    {
        $where = array();
     
        $where['name'] = $name;

        $result = $this->timesheet_model->get_where($where,'id','projects')->num_rows();
     
        if ($result) {
            $this->form_validation->set_message('checkproject', 'This project already exists!');
            return FALSE;
        }
        return TRUE;
    }
    
}
?>

