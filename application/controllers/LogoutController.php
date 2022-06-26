<?php
defined('BASEPATH') or exit('No direct script access allowed');

class LogoutController extends CI_Controller
{

    public function logout()
    {
        $this->session->unset_userdata('id_user');
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('nama');
        session_destroy();
        redirect('login');
    }

}
