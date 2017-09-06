<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

require_once('App_model.php');

class Timesheet_model extends App_model {
    
    
    function __construct()
    {
        parent::__construct();

        $this->_table = 'timesheet';
    }
    
     function listing()
    {  
		
        $this->_fields = "t.*,e.emp_name,p.name as project";

        $this->db->from('timesheet t');
        
        $this->db->join("employee e","t.emp_code=e.emp_code");
        $this->db->join("projects p","t.project=p.id",'left');

        $this->db->group_by('t.id');
                
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
                case 'organization':
                    $this->db->where('e.org_id', $value);
                break; 
                case 'project':
                    $this->db->where('t.project', $value);
                break;   
                case 'date_range':
                    $splitdate  = explode("|",$value);
                    $this->db->where( 't.date >=', date( 'Y-m-d', strtotime( $splitdate[0] ) )  );
                    $this->db->where( 't.date <=', date( 'Y-m-d', strtotime( $splitdate[1] ) )  );
                break;
                case 'emplist':
                    if(is_array($value))
                        $this->db->where_in("t.emp_code",$value);
                    else 
                        $this->db->where("t.emp_code",$value);
                break;                 
               
            }
        }
        
        
        return parent::listing();
    }

    function get_employess($where)
    {

        $this->db->select('emp_code');

        if($where)
            $this->db->where($where);

        $result = $this->db->get('employee')->result_array();

        $emp = array();

        foreach($result as $res){

            $emp[] = $res['emp_code'];
        }

        return $emp;

    }

    function get_edit_record($id){

        $this->db->select('t.*,e.emp_name');

        $this->db->from('timesheet t');
        $this->db->join("employee e","t.emp_code=e.emp_code");
        $this->db->where('t.id',$id);  

        return $this->db->get()->row_array();

    }

    function get_report($form,$type){

         $fields = "e.emp_name,e.emp_code,t.date,t.hour,t.purpose,t.type,o.name as organization,p.name as project";

        if($type == 2)
            $fields = "e.emp_name,e.emp_code,sum(t.hour) as hour,o.name as organization";

        $this->db->select($fields);

        if(isset($form['emplist']))
            $this->db->where_in('t.emp_code',$form['emplist']);

        if(empty($form['emplist']) && isset($form['organization']) && !empty($form['organization']))
            $this->db->where('e.org_id',$form['organization']);       

        if(isset($form['project']) && !empty($form['project']))
            $this->db->where('t.project',$form['project']);

        $splitdate  = explode("|",$form['date_range']);

        $this->db->where('t.date >=', date( 'Y-m-d', strtotime( $splitdate[0] ) )  );
        $this->db->where('t.date <=', date( 'Y-m-d', strtotime( $splitdate[1] ) )  );

        $this->db->from('timesheet t');
        $this->db->join("employee e","t.emp_code=e.emp_code");
        $this->db->join("organization o","e.org_id=o.id");
        $this->db->join("projects p","t.project=p.id",'left');

        if($type==2)
            $this->db->group_by("t.emp_code");

        $this->db->order_by("e.emp_name",'asc');

        return $this->db->get()->result_array();
    }
	
    
}
?>
