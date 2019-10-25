<?php

defined('BASEPATH') OR exit('No direct script access allowed');

date_default_timezone_set('Asia/Kolkata');

class ubah_password extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        chek_session();
        date_default_timezone_set("Asia/Bangkok");
    }

    function index(){
        
        $username = $this->session->userdata('username');
    	
        $this->template->load('template','ubah_password', array(
            'action' => site_url('ubah_password/proses'),
		));

    }

    function proses(){
        
        $username = $this->session->userdata('username');
        $id = $this->db->query("SELECT * FROM users WHERE username = '$username'")->row()->id;

        $data	= array ('password' => md5($this->input->post('new_password',TRUE))  );

        $this->db->where('id', $id);
        $this->db->update('users', $data);                            
        
        $this->session->set_flashdata('message', 'true');
        redirect(site_url('ubah_password'));

    }
    
    


}