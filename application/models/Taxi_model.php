<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

require_once('App_model.php');

class Taxi_model extends App_model {
    
    
    function __construct()
    {
        parent::__construct();

        $this->_table = 'taxi_booking';
    }
    
     function listing()
    {  
		
        $this->_fields = "a.*,b.name as rank,d.name as vessel";
        $this->db->from('taxi_booking a');        
        $this->db->join("rank b","a.rank=b.id");
        $this->db->join("vessels d","a.vessel=d.id");
        $this->db->group_by('a.id');
        foreach ($this->criteria as $key => $value)
        {
            if( !is_array($value) && strcmp($value, '') === 0 )
                continue;
            switch ($key)
            {
                case 'driver_name':
                    $this->db->like('a.'.$key, $value);
                break;
                case 'officer_name':
                    $this->db->like('a.'.$key, $value);
                break;
                case 'date':
                    $this->db->where('a.date', $value);
                break;
                case 'trip_sheet':
                    $this->db->where('a.trip_sheet', $value);
                break;
                case 'inv_no':
                    $this->db->like('a.'.$key, $value);
                break;           
            }
        }        
        return parent::listing();
    }
	
    public function get_bookings($where='',$table='')
    {
      $this->db->where($where);
      $this->db->select("a.*,a.amount as charge");
      $this->db->from("taxi_booking a");
      $this->db->join("rank b","a.rank=b.id");
      $this->db->join("vessels d","a.vessel=d.id");
      $this->db->group_by("a.id");
      $q = $this->db->get();
      return $q->row_array();
    }
    
}
?>
