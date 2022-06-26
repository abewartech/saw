<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kriteria extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_kriteria');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'kriteria/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'kriteria/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'kriteria/index.html';
            $config['first_url'] = base_url() . 'kriteria/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->M_kriteria->total_rows($q);
        $kriteria = $this->M_kriteria->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'kriteria_data' => $kriteria,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'content' => 'kriteria/kriteria_list', 
            'lokasi' => 'Data Kriteria',
        );
        $this->load->view('admin', $data);
    }

    public function read($id) 
    {
        $row = $this->M_kriteria->get_by_id($id);
        if ($row) {
            $data = array(
		'id_kriteria' => $row->id_kriteria,
		'kriteria' => $row->kriteria,
		'bobot' => $row->bobot,
	    );
            $this->load->view('kriteria/kriteria_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kriteria'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('kriteria/create_action'),
	    'id_kriteria' => set_value('id_kriteria'),
	    'kriteria' => set_value('kriteria'),
	    'bobot' => set_value('bobot'),
        'content' => 'kriteria/kriteria_form', 
        'lokasi' => 'Data Kriteria',
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
		'kriteria' => $this->input->post('kriteria',TRUE),
		'bobot' => $this->input->post('bobot',TRUE),
	    );

            $this->M_kriteria->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('kriteria'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->M_kriteria->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('kriteria/update_action'),
		'id_kriteria' => set_value('id_kriteria', $row->id_kriteria),
		'kriteria' => set_value('kriteria', $row->kriteria),
		'bobot' => set_value('bobot', $row->bobot),
        'content' => 'kriteria/kriteria_form', 
        'lokasi' => 'Data Kriteria',
	    );
            $this->load->view('admin', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kriteria'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_kriteria', TRUE));
        } else {
            $data = array(
		'kriteria' => $this->input->post('kriteria',TRUE),
		'bobot' => $this->input->post('bobot',TRUE),
	    );

            $this->M_kriteria->update($this->input->post('id_kriteria', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('kriteria'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->M_kriteria->get_by_id($id);

        if ($row) {
            $this->M_kriteria->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('kriteria'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kriteria'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('kriteria', 'kriteria', 'trim|required');
	$this->form_validation->set_rules('bobot', 'bobot', 'trim|required');

	$this->form_validation->set_rules('id_kriteria', 'id_kriteria', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Kriteria.php */
/* Location: ./application/controllers/Kriteria.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-09-08 02:52:01 */
/* http://harviacode.com */