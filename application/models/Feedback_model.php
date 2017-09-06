<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

require_once('App_model.php');

class Feedback_model extends App_model {
    
    
    function __construct()
    {
        parent::__construct();

        $this->_table = 'feedback';
    }
    
     function listing()
    {  
      $this->_fields = "*";
      $this->db->get($this->_table);
      return parent::listing();
    }
    
}
?>
