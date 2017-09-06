<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once(APPPATH."libraries/Admin_controller.php");

class Login extends Admin_controller 
{
    protected $_login_validation_rules =array (
                                        array('field' => 'email', 'label' => 'Email', 'rules' => 'trim|required|valid_email'),
                                        array('field' => 'password', 'label' => 'Password', 'rules' => 'trim|required|alpha_dash')
                                      );
    function __construct()
    {
        parent::__construct();  
        
        $this->load->model('login_model');
       
    }  
    public function index()
    {
        if(is_logged_in())
            redirect('home');
        
        $this->login();
    }
    
    public function login()
    {
      $this->form_validation->set_rules($this->_login_validation_rules);       
      if($this->form_validation->run())
      {
          $form = $this->input->post();
          
          if($this->login_model->login($form['email'], $form['password']))
          {
              redirect("home");
          }
          else
          { 
              $this->session->set_flashdata("error_msg","Invalid Username or Password",TRUE);
              redirect("login");
          }
      }        
      $this->layout->view("login/index");        
    }
    
    public function logout()
	  {
	    $this->session->sess_destroy();
	    $this->service_message->set_flash_message('logout_success');
			redirect('login');
	  }

    public function request_password()
    {
      $email = $this->input->post('email');
      $get = $this->login_model->get_where(array("email"=>$email),"*","users")->row_array();
      if($get)
      {
        $this->session->set_flashdata("success_msg","New Password has been sent to your mail id.",TRUE);
      }
      else
      {
        $this->session->set_flashdata("error_msg","Invalid Email-ID",TRUE);
      }
        redirect("login");
    } 
    
}
?>