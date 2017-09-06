<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

require_once('App_model.php');

class Reports_model extends App_model {
    
    
    function __construct()
    {
        parent::__construct();

        $this->_table = 'timesheet';
    }
    
    function listing()
    {  
		
      $this->_fields = "b.*,d.name as organization,MONTH(a.date) as e_month,YEAR(a.date) as e_year";
      $this->db->from('timesheet a');        
      $this->db->join("employee b","b.emp_code=a.emp_code");
      $this->db->join("organization d","d.id=b.org_id");

      $this->db->group_by('a.emp_code'); 

      foreach ($this->criteria as $key => $value) 
      {
        if( !is_array($value) && strcmp($value, '') === 0 )
            continue;

        switch ($key)
        {
          case 'organization':
              $this->db->where('b.org_id', $value);
          break; 
          case 'year':
              $this->db->where('YEAR(a.date)', $value);
          break;
          case 'month':
              $this->db->where('MONTH(a.date)', $value);
          break;   
       }
      }

      return parent::listing();
    }

    public function get_total_working_hours($emp_id,$month)
    {
      $q = $this->db->query("select sum(hour) as hours from timesheet where emp_code='".$emp_id."' and type!='Absent' and MONTH(date)='".$month."'")->row_array();
      return $q['hours'];
    }

     public function get_total_working_hours_by_date($emp_id,$start_date='',$end_date='')
    {
      $q = $this->db->query("select sum(hour) as hours from timesheet where emp_code='".$emp_id."' and type!='Absent' and date>='".$start_date."' and date>='".$end_date."'")->row_array();
      return $q['hours'];
    }

    public function get_normal_ot($emp_id,$month)
    {
      $q = $this->db->query("select (sum(hour - 8)) as hours from timesheet where emp_code='".$emp_id."' and type!='Absent' and hour>'8' and MONTH(date)='".$month."' and DAYOFWEEK(date)!=6")->row_array();
      return $q['hours'];
    }

    public function get_friday_ot($emp_id,$month)
    {
      $q = $this->db->query("select sum(hour) as hours from timesheet where emp_code='".$emp_id."' and MONTH(date)='".$month."' and DAYOFWEEK(date)=6")->row_array();
      return $q['hours'];
    }

    public function get_normal_ot_by_date($emp_id,$start_date='',$end_date='')
    {
      $q = $this->db->query("select (sum(hour - 8)) as hours from timesheet where emp_code='".$emp_id."' and type!='Absent' and hour>'8' and date>='".$start_date."' and date<='".$end_date."' and DAYOFWEEK(date)!=6")->row_array();
      return $q['hours'];
    }

    public function get_friday_ot_by_date($emp_id,$start_date='',$end_date='')
    {
      $q = $this->db->query("select sum(hour) as hours from timesheet where emp_code='".$emp_id."' and date>='".$start_date."' and date<='".$end_date."' and  DAYOFWEEK(date)=6")->row_array();
      return $q['hours'];
    }


    public function select($where,$table)
    {
      $this->db->where($where);
      $q = $this->db->get($table);
      return $q->row_array();
    }

    public function get_employee_details($emp_id)
    {
      $this->_fields = "a.*,b.basic_salary,b.food_allowance";
      $this->db->where("a.id",$emp_id);
      $this->db->from("employee a");
      $this->db->join("employee_details b","a.id=b.emp_id");
      $this->db->group_by("a.id");
      $q = $this->db->get();
      return $q->row_array();
    }

    public function get_org_employee($where,$month,$year)
    {
      $q = $this->db->query("select b.*,c.* from timesheet a,employee b,employee_details c where b.org_id='".$where."' and a.emp_code=b.emp_code and MONTH(a.date)='".$month."' and YEAR(a.date)='".$year."' and c.emp_id=b.id group by a.emp_code");
      
      // echo $this->db->last_query();exit;
      return $q->result_array();
    }

    public function get_timesheet($org,$date)
    {
      $date = explode("|",$date);
      $this->db->where("a.date>=",$date[0]);
      $this->db->where("a.date<=",$date[1]);
      $this->db->where("b.org_id",$org);
      $this->db->where("a.hour!=",'0');
      $this->db->select("a.*,b.id as emp_id");
      $this->db->from("timesheet a");
      $this->db->join("employee b","a.emp_code=b.emp_code");
      $q = $this->db->get();
      return $q->result_array();
    }
}
?>