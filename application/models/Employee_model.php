<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

require_once('App_model.php');

class Employee_model extends App_model {
    
    
    function __construct()
    {
        parent::__construct();

        $this->_table = 'employee';
    }
    
     function listing()
    {  
		
        $this->_fields = "e.*,o.name,o.short_name";

        $this->db->from('employee e');        
        $this->db->join("organization o","e.org_id=o.id");

        $this->db->group_by('e.id');
                
        foreach ($this->criteria as $key => $value) 
        {
            if( !is_array($value) && strcmp($value, '') === 0 )
                continue;

            switch ($key)
            {
                case 'e.emp_name':
                    $this->db->like($key, $value);
                break;
                case 'e.emp_code':
                    $this->db->like($key, $value);
                break;
                case 'e.current_status':
                    $this->db->like($key, $value);
                break;
                case 'e.designation':
                    $this->db->like($key, $value);
                break;
                case 'e.phone1':
                    $this->db->like($key, $value);
                    $this->db->or_like('e.phone2', $value);
                break;
                case 'e.agency':
                    $this->db->like($key, $value);
                break;
                case 'e.nationality':
                    $this->db->like($key, $value);
                break;
                case 'o.name':
                    $this->db->like($key, $value);
                break;
                 
               
            }
        }
        
        
        return parent::listing();
    }

    function get_employee_details($id){

        $this->db->select('e.*,d.*,n.*');
        $this->db->from('employee e');
        $this->db->join('employee_details d','e.id=d.emp_id');
        $this->db->join('employee_note n','e.id=n.emp_id');
        $this->db->where('e.id',$id);
        $this->db->group_by('e.id');
        $result = $this->db->get()->row_array();

        return $result;
    }

     function get_report(){

        $this->db->select('e.*,d.*,n.*,o.name as org_name');

        $this->db->from('employee e');
        $this->db->join("employee_details d","e.id=d.emp_id");
        $this->db->join("employee_note n","e.id=n.emp_id");
        $this->db->join("organization o","e.org_id=o.id");

        $this->db->group_by("e.id");
        $this->db->order_by("e.emp_name",'asc');

        return $this->db->get()->result_array();
    }
	
    
}
?>
