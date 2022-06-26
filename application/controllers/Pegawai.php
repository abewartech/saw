<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pegawai extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_pegawai');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'pegawai/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'pegawai/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'pegawai/index.html';
            $config['first_url'] = base_url() . 'pegawai/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->M_pegawai->total_rows($q);
        $pegawai = $this->M_pegawai->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'pegawai_data' => $pegawai,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'content' => 'pegawai/pegawai_list', 
            'lokasi' => 'Data Pegawai',
        );
        $this->load->view('admin', $data);
    }

    public function read($id) 
    {
        $row = $this->M_pegawai->get_by_id($id);
        if ($row) {
            $data = array(
		'id_pegawai' => $row->id_pegawai,
		'nip' => $row->nip,
		'nama' => $row->nama,
		'jabatan' => $row->jabatan,
		'bagian' => $row->bagian,
		'grade' => $row->grade,
		'cabang' => $row->cabang,
		'tanggal_masuk' => $row->tanggal_masuk,
	    );
            $this->load->view('pegawai/pegawai_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pegawai'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('pegawai/create_action'),
	    'id_pegawai' => set_value('id_pegawai'),
	    'nip' => set_value('nip'),
	    'nama' => set_value('nama'),
	    'jabatan' => set_value('jabatan'),
	    'bagian' => set_value('bagian'),
	    'grade' => set_value('grade'),
	    'cabang' => set_value('cabang'),
	    'tanggal_masuk' => set_value('tanggal_masuk'),
        'content' => 'pegawai/pegawai_form', 
        'lokasi' => 'Data Pegawai',
	);
        $this->load->view('admin', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nip' => $this->input->post('nip',TRUE),
		'nama' => $this->input->post('nama',TRUE),
		'jabatan' => $this->input->post('jabatan',TRUE),
		'bagian' => $this->input->post('bagian',TRUE),
		'grade' => $this->input->post('grade',TRUE),
		'cabang' => $this->input->post('cabang',TRUE),
		'tanggal_masuk' => $this->input->post('tanggal_masuk',TRUE),
	    );

            $this->M_pegawai->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('pegawai'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->M_pegawai->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('pegawai/update_action'),
		'id_pegawai' => set_value('id_pegawai', $row->id_pegawai),
		'nip' => set_value('nip', $row->nip),
		'nama' => set_value('nama', $row->nama),
		'jabatan' => set_value('jabatan', $row->jabatan),
		'bagian' => set_value('bagian', $row->bagian),
		'grade' => set_value('grade', $row->grade),
		'cabang' => set_value('cabang', $row->cabang),
		'tanggal_masuk' => set_value('tanggal_masuk', $row->tanggal_masuk),
        'content' => 'pegawai/pegawai_form', 
            'lokasi' => 'Data Pegawai',
	    );
            $this->load->view('admin', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pegawai'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_pegawai', TRUE));
        } else {
            $data = array(
		'nip' => $this->input->post('nip',TRUE),
		'nama' => $this->input->post('nama',TRUE),
		'jabatan' => $this->input->post('jabatan',TRUE),
		'bagian' => $this->input->post('bagian',TRUE),
		'grade' => $this->input->post('grade',TRUE),
		'cabang' => $this->input->post('cabang',TRUE),
		'tanggal_masuk' => $this->input->post('tanggal_masuk',TRUE),
	    );

            $this->M_pegawai->update($this->input->post('id_pegawai', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('pegawai'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->M_pegawai->get_by_id($id);

        if ($row) {
            $this->M_pegawai->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('pegawai'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pegawai'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nip', 'nip', 'trim|required');
	$this->form_validation->set_rules('nama', 'nama', 'trim|required');
	$this->form_validation->set_rules('jabatan', 'jabatan', 'trim|required');
	$this->form_validation->set_rules('bagian', 'bagian', 'trim|required');
	$this->form_validation->set_rules('grade', 'grade', 'trim|required');
	$this->form_validation->set_rules('cabang', 'cabang', 'trim|required');
	$this->form_validation->set_rules('tanggal_masuk', 'tanggal masuk', 'trim|required');

	$this->form_validation->set_rules('id_pegawai', 'id_pegawai', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Pegawai.php */
/* Location: ./application/controllers/Pegawai.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-09-08 02:51:21 */
/* http://harviacode.com */