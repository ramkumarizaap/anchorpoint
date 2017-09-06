<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

require_once('App_model.php');

class Org_model extends App_model {
    
    
    function __construct()
    {
        parent::__construct();

        $this->_table = 'organization';
    }
    
     function listing()
    {  
		
        $this->_fields = "c.*,t.name as type";

        $this->db->from('organization c');
        
        $this->db->join("org_type t","c.org_type=t.id");

        $this->db->group_by('c.id');
                
        foreach ($this->criteria as $key => $value) 
        {
            if( !is_array($value) && strcmp($value, '') === 0 )
                continue;

            switch ($key)
            {
                case 'c.name':
                    $this->db->like($key, $value);
                break;
                case 't.name':
                    $this->db->like($key, $value);
                break;
                case 'c.short_name':
                    $this->db->like($key, $value);
                break;
                case 'c.web_url':
                    $this->db->like($key, $value);
                break;
                case 'c.email':
                    $this->db->like($key, $value);
                break;
                 
               
            }
        }
        
        
        return parent::listing();
    }
	
    
}
?>
