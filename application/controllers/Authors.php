<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Authors extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        chek_session();
        $this->load->model('Authors_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $authors = $this->Authors_model->get_all();

        $data = array(
            'authors_data' => $authors
        );

        $this->template->load('template','authors_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Authors_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'author' => $row->author,
	    );
            $this->template->load('template','authors_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('authors'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('authors/create_action'),
	    'id' => set_value('id'),
	    'author' => set_value('author'),
	);
        $this->template->load('template','authors_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'author' => $this->input->post('author',TRUE),
	    );

            $this->Authors_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('authors'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Authors_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('authors/update_action'),
		'id' => set_value('id', $row->id),
		'author' => set_value('author', $row->author),
	    );
            $this->template->load('template','authors_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('authors'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'author' => $this->input->post('author',TRUE),
	    );

            $this->Authors_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('authors'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Authors_model->get_by_id($id);

        if ($row) {
            $this->Authors_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('authors'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('authors'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('author', 'author', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Authors.php */
/* Location: ./application/controllers/Authors.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-05-06 09:17:02 */
/* http://harviacode.com */