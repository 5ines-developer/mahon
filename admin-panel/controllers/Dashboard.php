<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('Mht') == '') {$this->session->set_flashdata('error', 'Please try again'); redirect('login'); }
        $this->load->model('M_dashboard');
    }
    

    public function index()
    {
        $data['title'] = 'Dashboard - Mahonnati';
        $data['topCount'] = $this->M_dashboard->topCounts();
        $data['mostViewed'] = $this->M_dashboard->mostViewed($this->input->get('mview'));
        $data['authors'] = $this->M_dashboard->authors();
        $this->load->view('pages/dashboard.php', $data);
    }

}

/* End of file Dashboard.php */
