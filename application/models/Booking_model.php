<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

require_once('App_model.php');

class Booking_model extends App_model {
    
    
    function __construct()
    {
        parent::__construct();

        $this->_table = 'bookings';
    }
    
    function listing()
    {  
		
        $this->_fields = "a.*,b.name as rank,c.name as executive,d.name as vessel,IF(a.checkin_date='1970-01-01','',CONCAT(a.checkin_date,' ',TIME_FORMAT(a.checkin_time,'%H:%i'))) as checkin_date,IF(a.checkout_date='1970-01-01','',CONCAT(a.checkout_date,' ',TIME_FORMAT(a.checkout_time,'%H:%i'))) as checkout_date,CONCAT(a.e_checkout_date,' ',TIME_FORMAT(a.e_checkout_time,'%H:%i')) as e_checkout_date,e.name as room,e.tariff";
        $this->db->from('bookings a');
        $this->db->join("rank b","a.rank_id=b.id",'left');
        $this->db->join("executives c","a.executive_id=c.id",'left');
        $this->db->join("vessels d","a.vessel_id=d.id",'left');
        $this->db->join("rooms e","a.room_id=e.id",'left');
        // $this->db->join("rank b","a.rank_id=b.id");
        $this->db->group_by('a.id');
        foreach ($this->criteria as $key => $value)
        {
            if( !is_array($value) && strcmp($value, '') === 0 )
                continue;
            switch ($key)
            {
                case 'po_no':
                    $this->db->like('a.'.$key, $value);
                break;
                case 'officer_name':
                    $this->db->like('a.'.$key, $value);
                break;
                case 'checkout_date_from':
                    $this->db->where('a.checkout_date>=', $value);
                break;
                case 'checkout_date_to':
                    $this->db->where('a.checkout_date<=', $value);
                break;
                case 'inv_no':
                    $this->db->like('a.'.$key, $value);
                break;
                case 'invoice_link':
                  if($value=="enable" || $value=="")
                    $this->db->where('a.'.$key.' IS NOT NULL');
                  else
                    $this->db->where('a.'.$key.' IS NULL');
                break;
                case 'status':
                    $this->db->like('a.'.$key, $value);
                break;
                case 'pdf_downloaded':
                    $this->db->like('a.'.$key, $value);
                break;
                case 'c.email':
                    $this->db->like($key, $value);
                break;               
            }
        }        
        return parent::listing();
    }
	
    public function get_bookings($where='',$table='')
    {
      if($where!='')
        $this->db->where($where);
      $this->db->select("a.*,b.name as rank,c.name as room,d.name as vessel,e.name as executives,f.address as address,TIME_FORMAT(a.checkin_time,'%H:%i') as checkin_time,TIME_FORMAT(a.checkout_time,'%H:%i') as checkout_time,TIME_FORMAT(a.e_checkout_time,'%H:%i') as e_checkout_time,c.tariff");
      $this->db->from("bookings a");
      $this->db->join("rank b","a.rank_id=b.id");
      $this->db->join("rooms c","a.room_id=c.id");
      $this->db->join("vessels d","a.vessel_id=d.id");
      $this->db->join("executives e","a.executive_id=e.id");
      $this->db->join("invoice_address f","a.inv_address_id=f.id");
      $this->db->group_by("a.id");
      $q = $this->db->get();
      return $q->row_array();
    }

    public function get_room_bookings($where)
    {      
      if($where!='')
        $this->db->where($where);
      $this->db->select("a.*,b.name as rank,c.name as executive,d.name as vessel,CONCAT(a.checkin_date,' ',TIME_FORMAT(a.checkin_time,'%H:%i')) as checkin_date,CONCAT(a.checkout_date,' ',TIME_FORMAT(a.checkout_time,'%H:%i')) as checkout_date,CONCAT(a.e_checkout_date,' ',TIME_FORMAT(a.e_checkout_time,'%H:%i')) as e_checkout_date,e.name as room,e.tariff");
      $this->db->from('bookings a');        
      $this->db->join("rank b","a.rank_id=b.id");
      $this->db->join("executives c","a.executive_id=c.id");
      $this->db->join("vessels d","a.vessel_id=d.id");
      $this->db->join("rooms e","a.room_id=e.id");
      $q = $this->db->get();
      return $q->result_array();
    }

    public function get_room_status()
    {
      $this->db->select("a.*,IF(b.checkin_date='1970-01-01','',CONCAT(b.checkin_date,' ',TIME_FORMAT(b.checkin_time,'%H:%i'))) as checkin_date,b.occupancy,IF(b.e_checkout_date='0000-00-00','',CONCAT(b.e_checkout_date,' ',TIME_FORMAT(b.e_checkout_time,'%H:%i'))) as e_checkout_date,b.checked_in,b.officer_name,c.name as executive");
      $this->db->from('rooms a');
      $this->db->join("bookings b","b.room_id=a.id and b.status='Open'","left");
      $this->db->join("executives c","b.executive_id=c.id","left");
      $this->db->group_by("a.id");
      $q = $this->db->get();
      return $q->result_array();
    }
    
}
?>
