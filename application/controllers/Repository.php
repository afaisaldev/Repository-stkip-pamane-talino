<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Repository extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        chek_session();
        $this->load->model('Repo_model');
        $this->load->library('form_validation');
        error_reporting(0);
    }

    public function index()
    {
        
        $repository = $this->Repo_model->get_all();

        $data = array(
            'repository_data' => $repository
        );

        $this->template->load('template','repo_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Repo_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'date' => $row->date,
		'year' => $row->year,
		'id_author' => $row->id_author,
		'id_type' => $row->id_type,
		'id_prodi' => $row->id_prodi,
		'title' => $row->title,
		'description' => $row->description,
		'file_repo' => $row->file_repo,
		'thumbnail' => $row->thumbnail,
	    );
            $this->template->load('template','repo_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('repository'));
        }
    }

    public function create() 
    {
        $sql1 = "SELECT * FROM authors";        
        $combo1 = $this->db->query($sql1);

        $sql2 = "SELECT * FROM types";        
        $combo2 = $this->db->query($sql2);

        $sql3 = "SELECT * FROM prodi";        
        $combo3 = $this->db->query($sql3);


        $data = array(
            'button' => 'Create',
            'action' => site_url('repository/create_action'),
	    'id' => set_value('id'),
	    'date' => set_value('date'),
	    'year' => set_value('year'),
	    'id_author' => set_value('id_author'),
	    'id_type' => set_value('id_type'),
	    'id_prodi' => set_value('id_prodi'),
	    'title' => set_value('title'),
	    'description' => set_value('description'),
	    'file' => set_value('file'),
        'thumbnail' => set_value('thumbnail'),
        'authors' => $combo1,
        'types' => $combo2,
        'prodi' => $combo3,
	);
        $this->template->load('template','repo_form_insert', $data);
    }
    
    public function create_action() 
    {
        $date = $this->input->post('date',TRUE);
        $year =  date('Y',strtotime($date . "+0 days"));

        $config['upload_path']          = './uploads/';
        $config['allowed_types']    = '*';
        $this->load->library('upload', $config);
        $this->upload->do_upload('file');
        $upload_data1 =  $this->upload->data();
        $file =   $upload_data1['file_name'];
        $this->upload->initialize($config);

        $this->upload->do_upload('thumbnail');
        $upload_data2 =  $this->upload->data();
        $thumbnail =   $upload_data2['file_name'];
        $this->upload->initialize($config);

        $data  = array(
            'date'    => $date,
            'year'    => $year,
            'id_author'   => $this->input->post('id_author',TRUE),
            'id_type'   => $this->input->post('id_type',TRUE),
            'id_prodi' => $this->input->post('id_prodi',TRUE),
            'title' => $this->input->post('title',TRUE),
            'description'     => $this->input->post('description',TRUE),
            'file_repo'    => $file,
            'thumbnail'         => $thumbnail,
        );

        $this->Repo_model->insert($data);
        $this->session->set_flashdata('message', 'Create Record Success');
        redirect(site_url('repository'));
        
    }
    
    public function update($id) 
    {
        $row = $this->Repo_model->get_by_id($id);

        $sql1 = "SELECT * FROM authors";        
        $combo1 = $this->db->query($sql1);

        $sql2 = "SELECT * FROM types";        
        $combo2 = $this->db->query($sql2);

        $sql3 = "SELECT * FROM prodi";        
        $combo3 = $this->db->query($sql3);        

        if ($row) {
            $data = array(
        'button' => 'Update',
        'action' => site_url('repository/update_action'),
		'id' => set_value('id', $row->id),
		'date' => set_value('date', $row->date),
		'year' => set_value('year', $row->year),
		'id_author' => set_value('id_author', $row->id_author),
		'id_type' => set_value('id_type', $row->id_type),
		'id_prodi' => set_value('id_prodi', $row->id_prodi),
		'title' => set_value('title', $row->title),
		'description' => set_value('description', $row->description),
		'file_repo' => set_value('file', $row->file_repo),
		'thumbnail' => set_value('thumbnail', $row->thumbnail),
        'authors' => $combo1,
        'types' => $combo2,
        'prodi' => $combo3,
	    );
            $this->template->load('template','repo_form_update', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('repository'));
        }
    }
    
    public function update_action() 
    {
        $date = $this->input->post('date',TRUE);
        $year =  date('Y',strtotime($date . "+0 days"));

        $config['upload_path']          = './uploads/';
        $config['allowed_types']    = '*';
        $this->load->library('upload', $config);
        $this->upload->do_upload('file');
        $upload_data1 =  $this->upload->data();
        $file =   $upload_data1['file_name'];
        $this->upload->initialize($config);

        $this->upload->do_upload('thumbnail');
        $upload_data2 =  $this->upload->data();
        $thumbnail =   $upload_data2['file_name'];
        $this->upload->initialize($config);

        
        $data  = array(
            'date'    => $date,
            'year'    => $year,
            'id_author'   => $this->input->post('id_author',TRUE),
            'id_type'   => $this->input->post('id_type',TRUE),
            'id_prodi' => $this->input->post('id_prodi',TRUE),
            'title' => $this->input->post('title',TRUE),
            'description'     => $this->input->post('description',TRUE),
        );

        if ($file != '') {
            $data['file_repo'] = $file;
        }
        if ($thumbnail != '') {
            $data['thumbnail'] = $thumbnail;
        }

        $this->Repo_model->update($this->input->post('id', TRUE), $data);
        $this->session->set_flashdata('message', 'Update Record Success');
        redirect(site_url('repository'));
        
    }
    
    public function delete($id) 
    {
        $row = $this->Repo_model->get_by_id($id);

        if ($row) {
            $this->Repo_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('repository'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('repository'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('date', 'date', 'trim|required');
	$this->form_validation->set_rules('year', 'year', 'trim|required');
	$this->form_validation->set_rules('id_author', 'id author', 'trim|required');
	$this->form_validation->set_rules('id_type', 'id type', 'trim|required');
	$this->form_validation->set_rules('id_prodi', 'id prodi', 'trim|required');
	$this->form_validation->set_rules('title', 'title', 'trim|required');
	$this->form_validation->set_rules('description', 'description', 'trim|required');
	$this->form_validation->set_rules('file', 'file', 'trim|required');
	$this->form_validation->set_rules('thumbnail', 'thumbnail', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Repository.php */
/* Location: ./application/controllers/Repository.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-05-06 09:34:01 */
/* http://harviacode.com */