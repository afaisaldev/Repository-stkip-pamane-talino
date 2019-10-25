<?php

defined('BASEPATH') OR exit('No direct script access allowed');

date_default_timezone_set('Asia/Kolkata');

class home extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        error_reporting(0);
        date_default_timezone_set("Asia/Bangkok");
        
    }

    function index(){ 
        
        $sql = "SELECT * FROM repo order by id DESC";        
        $data = $this->db->query($sql);

        $sqls = "SELECT * FROM prodi";        
        $prodi = $this->db->query($sqls);
            	
        $this->template->load('frontend_tmp','home', array(
        'data' => $data,
        'prodi' => $prodi
		));

    }

    function single($id){ 
        
        $query  =  "SELECT * FROM repo WHERE id = '$id' ";

        $sqls = "SELECT * FROM prodi";        
        $prodi = $this->db->query($sqls);
            	
        $this->template->load('frontend_tmp','single', array(
            'data' => $this->db->query($query)->row(),
            'prodi' => $prodi
		));

    }

    function search_rdr(){ 
        
        $kw  =  $this->input->post('keyword');
        redirect(base_url()."home/search/".$kw);

    }

    function search($kw){ 
        
        $sql = "SELECT * FROM repo WHERE title LIKE '%$kw%' ";        
        $data = $this->db->query($sql);

        $sqls = "SELECT * FROM prodi";        
        $prodi = $this->db->query($sqls);
            	
        $this->template->load('frontend_tmp','search', array(
            'data' => $data,
            'prodi' => $prodi
		));

    }

    function browse_prodi($id){ 
        
        $sql = "SELECT * FROM repo WHERE id_prodi = '$id' ";        
        $data = $this->db->query($sql);

        $sqls = "SELECT * FROM prodi";        
        $prodi = $this->db->query($sqls);

        $judul = $this->db->query("SELECT * FROM prodi WHERE id = '$id'")->row()->program_studi;
            	
        $this->template->load('frontend_tmp','browse_prodi', array(
            'data' => $data,
            'prodi' => $prodi,
            'judul' => $judul
		));

    }

    function browse_title(){ 
        
        $sql = "SELECT * FROM repo order by id desc ";        
        $data = $this->db->query($sql);

        $sqls = "SELECT * FROM prodi";        
        $prodi = $this->db->query($sqls);
            	
        $this->template->load('frontend_tmp','browse_title', array(
            'data' => $data,
            'prodi' => $prodi,
		));

    }

    function browse_author(){ 
        
        $sql = "SELECT * FROM authors order by id desc ";        
        $data = $this->db->query($sql);

        $sqls = "SELECT * FROM prodi";        
        $prodi = $this->db->query($sqls);
            	
        $this->template->load('frontend_tmp','browse_author', array(
            'data' => $data,
            'prodi' => $prodi,
		));

    }

    function browse_prodis(){ 
        
        $sql = "SELECT * FROM prodi order by id desc ";        
        $data = $this->db->query($sql);

        $sqls = "SELECT * FROM prodi";        
        $prodi = $this->db->query($sqls);
            	
        $this->template->load('frontend_tmp','browse_prodis', array(
            'data' => $data,
            'prodi' => $prodi,
		));

    }

    function browse_type(){ 
        
        $sql = "SELECT * FROM types order by id asc ";        
        $data = $this->db->query($sql);

        $sqls = "SELECT * FROM prodi";        
        $prodi = $this->db->query($sqls);
            	
        $this->template->load('frontend_tmp','browse_type', array(
            'data' => $data,
            'prodi' => $prodi,
		));

    }
    
    function browse_year(){ 
        
        $sql = "SELECT DISTINCT year FROM repo";        
        $data = $this->db->query($sql);

        $sqls = "SELECT * FROM prodi";        
        $prodi = $this->db->query($sqls);
            	
        $this->template->load('frontend_tmp','browse_year', array(
            'data' => $data,
            'prodi' => $prodi,
		));

    }

    function single_author($id){ 
        
        $sql = "SELECT * FROM repo where id_author = '$id' ";        
        $data = $this->db->query($sql);

        $penulis = $this->db->query("SELECT * FROM authors WHERE id = '$id'")->row()->author;

        $sqls = "SELECT * FROM prodi";        
        $prodi = $this->db->query($sqls);
            	
        $this->template->load('frontend_tmp','single_author', array(
            'data' => $data,
            'prodi' => $prodi,
            'penulis' => $penulis
		));

    }

    function single_prodis($id){ 
        
        $sql = "SELECT * FROM repo where id_prodi = '$id' ";        
        $data = $this->db->query($sql);

        $prodis = $this->db->query("SELECT * FROM prodi WHERE id = '$id'")->row()->program_studi;

        $sqls = "SELECT * FROM prodi";        
        $prodi = $this->db->query($sqls);
            	
        $this->template->load('frontend_tmp','single_prodis', array(
            'data' => $data,
            'prodi' => $prodi,
            'prodis' => $prodis
		));

    }

    function single_type($id){ 
        
        $sql = "SELECT * FROM repo where id_type = '$id' ";        
        $data = $this->db->query($sql);

        $tipe = $this->db->query("SELECT * FROM types WHERE id = '$id'")->row()->type;

        $sqls = "SELECT * FROM prodi";        
        $prodi = $this->db->query($sqls);
            	
        $this->template->load('frontend_tmp','single_type', array(
            'data' => $data,
            'prodi' => $prodi,
            'tipe' => $tipe
		));

    }
    
    function single_year($year){ 
        
        $sql = "SELECT * FROM repo where year = '$year' ";        
        $data = $this->db->query($sql);

        $sqls = "SELECT * FROM prodi";        
        $prodi = $this->db->query($sqls);
            	
        $this->template->load('frontend_tmp','single_year', array(
            'data' => $data,
            'prodi' => $prodi,
            'year' => $year
		));

    }

        
    


}