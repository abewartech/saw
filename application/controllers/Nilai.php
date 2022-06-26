<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Nilai extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_nilai');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'nilai/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'nilai/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'nilai/index.html';
            $config['first_url'] = base_url() . 'nilai/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->M_nilai->total_rows($q);
        $nilai = $this->M_nilai->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'nilai_data' => $nilai,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'content' => 'nilai/nilai_list', 
            'lokasi' => 'Data Nilai',
        );
        $this->load->view('admin', $data);
    }

    public function analisa() 
    {
        $data = array(
            'content' => 'analisa', 
            'lokasi' => 'Hasil Analisa', 
            );
        $this->load->view('admin', $data);
    }

    public function hapus_normalisasi()
    {
        $this->db->query("DELETE FROM normalisasi");
        redirect('nilai/analisa');
    }

    public function hapus_analisa()
    {
        $this->db->query("DELETE FROM analisa");
        redirect('nilai/analisa');
    }

    public function normalisasi() 
    {
        $pg = $this->db->query("SELECT DISTINCT nilai.id_pegawai, nilai.id_kriteria FROM nilai,kriteria,pegawai WHERE kriteria.id_kriteria=nilai.id_kriteria AND pegawai.id_pegawai=nilai.id_pegawai");
        foreach ($pg->result() as $a1) {
            $idker = $a1->id_kriteria;
            $idpeg = $a1->id_pegawai;
            $max = $this->db->query("SELECT kriteria.kriteria, MAX(nilai.nilai) as hasilmax FROM nilai,kriteria,pegawai WHERE kriteria.id_kriteria=nilai.id_kriteria AND kriteria.id_kriteria='$idker' ")->row();
            $nil = $this->db->query("SELECT nilai FROM nilai WHERE id_kriteria='$idker' AND id_pegawai='$idpeg'")->row();
            // echo $a1->id_pegawai.' - '. number_format($nil->nilai/$max->hasilmax,2).' - '.$a1->id_kriteria.'<br>';

            $data = array(
                'id_pegawai' => $a1->id_pegawai,
                'id_kriteria' => $a1->id_kriteria,
                'nilai_normalisasi' => number_format($nil->nilai/$max->hasilmax,2),
                );
            $nimax = number_format($nil->nilai/$max->hasilmax,2);
            $cek = $this->db->query("SELECT * FROM normalisasi WHERE id_pegawai='$a1->id_pegawai' and id_kriteria='$a1->id_kriteria' and nilai_normalisasi='$nimax'");
            if ($cek->num_rows() == null) {
                $this->db->insert('normalisasi', $data);
                
            } elseif ($cek->num_rows() == 1) {
                ?>
                <script type="text/javascript">
                    alert('normalisasi sudah dilakukan !');
                    window.location='<?php echo base_url('nilai'); ?>'
                </script>
                <?php
            }

        }
        redirect('nilai/analisa');

        
    }

    public function proses_analisa() 
    {
        $pg = $this->db->query("SELECT DISTINCT nilai.id_pegawai, nilai.id_kriteria FROM nilai,kriteria,pegawai WHERE kriteria.id_kriteria=nilai.id_kriteria AND pegawai.id_pegawai=nilai.id_pegawai");
        foreach ($pg->result() as $a1) {
            $idker = $a1->id_kriteria;
            $idpeg = $a1->id_pegawai;
            $bobot = $this->db->query("SELECT bobot FROM kriteria WHERE id_kriteria='$idker'")->row();
            $nil = $this->db->query("SELECT nilai_normalisasi FROM normalisasi WHERE id_kriteria='$idker' AND id_pegawai='$idpeg'")->row();
            echo $a1->id_pegawai.' - '. number_format($nil->nilai_normalisasi*$bobot->bobot,2).' - '.$a1->id_kriteria.'<br>';

            $data = array(
                'id_pegawai' => $a1->id_pegawai,
                'id_kriteria' => $a1->id_kriteria,
                'nilai' => number_format($nil->nilai_normalisasi*$bobot->bobot,2),
                );
            $nimax = number_format($nil->nilai_normalisasi*$bobot->bobot,2);
            $cek = $this->db->query("SELECT * FROM analisa WHERE id_pegawai='$a1->id_pegawai' and id_kriteria='$a1->id_kriteria' and nilai='$nimax'");
            if ($cek->num_rows() == null) {
                $this->db->insert('analisa', $data);
            } elseif ($cek->num_rows() == 1) {
                ?>
                <script type="text/javascript">
                    alert('Proses Analisa sudah dilakukan !');
                    window.location='<?php echo base_url('nilai'); ?>'
                </script>
                <?php
            }
        

        }

        $kr1 = $this->db->query("SELECT * FROM pegawai order by nilai_analisa desc");
        foreach ($kr1->result() as $a) {
            $id = $a->id_pegawai;
            $sum = 0;
            $kr3 = $this->db->query("SELECT id_kriteria FROM kriteria");
            foreach ($kr3->result() as $row) {
                $id_kriteria = $row->id_kriteria;
                $kr4 = $this->db->query("SELECT nilai FROM analisa WHERE id_pegawai='$id' and id_kriteria='$id_kriteria'")->row();
                // echo $kr4->nilai.'<br>';
                $sum = $sum + $kr4->nilai;

            }
            $data = array(
                'nilai_analisa' => $sum
                );
            $this->db->where('id_pegawai', $id);
            $this->db->update('pegawai', $data);
        }    
        redirect('nilai/analisa');

        
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('nilai/create_action'),
	    'id_nilai' => set_value('id_nilai'),
	    'id_pegawai' => set_value('id_pegawai'),
	    'id_kriteria' => set_value('id_kriteria'),
	    'nilai' => set_value('nilai'),
        'content' => 'nilai/nilai_form', 
        'lokasi' => 'Data Nilai',
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
		'id_pegawai' => $this->input->post('id_pegawai',TRUE),
		'id_kriteria' => $this->input->post('id_kriteria',TRUE),
		'nilai' => $this->input->post('nilai',TRUE),
	    );

            $this->M_nilai->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('nilai'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->M_nilai->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('nilai/update_action'),
		'id_nilai' => set_value('id_nilai', $row->id_nilai),
		'id_pegawai' => set_value('id_pegawai', $row->id_pegawai),
		'id_kriteria' => set_value('id_kriteria', $row->id_kriteria),
		'nilai' => set_value('nilai', $row->nilai),
        'content' => 'nilai/nilai_form', 
            'lokasi' => 'Data Nilai',
	    );
            $this->load->view('admin', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('nilai'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_nilai', TRUE));
        } else {
            $data = array(
		'id_pegawai' => $this->input->post('id_pegawai',TRUE),
		'id_kriteria' => $this->input->post('id_kriteria',TRUE),
		'nilai' => $this->input->post('nilai',TRUE),
	    );

            $this->M_nilai->update($this->input->post('id_nilai', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('nilai'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->M_nilai->get_by_id($id);

        if ($row) {
            $this->M_nilai->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('nilai'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('nilai'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_pegawai', 'id pegawai', 'trim|required');
	$this->form_validation->set_rules('id_kriteria', 'id kriteria', 'trim|required');
	$this->form_validation->set_rules('nilai', 'nilai', 'trim|required');

	$this->form_validation->set_rules('id_nilai', 'id_nilai', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Nilai.php */
/* Location: ./application/controllers/Nilai.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-09-08 03:28:59 */
/* http://harviacode.com */