<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class auth extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        date_default_timezone_set("Asia/Jakarta");
        $this->load->model('model_auth');
    }
    
    function login()
    {
        if(isset($_POST['submit'])){
            
            // proses login disini
            $username   =   $this->input->post('username', TRUE);
            $password   =   $this->input->post('password', TRUE);
            $level      =   $this->db->query("SELECT * FROM users WHERE username = '$username'")->row()->level;
            $hasil      =   $this->model_auth->login($username,$password);
            if($hasil==1)
            {

                
                $this->session->set_userdata(array('status_login'=>'oke','username'=>$username,'level'=>$level,));
                redirect('dashboard');
                //echo "HEY TAYO";                
                
            }
            else{

                $pass = "wrong";
                $this->session->set_flashdata('alert_user', $pass); 
                redirect('auth/login');
            }
        }
        else{
            
            chek_session_login();
            $this->load->view('form_login');
        }
    }
    
    
    function logout()
    {
        $username = $this->session->userdata('username');     
        $this->session->sess_destroy();
        redirect('auth/login');
    }
}