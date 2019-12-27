<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class home extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_site');
    }
    

    public function index()
    {
        // $data['result']     = $this->m_site->getsiteData();
        $data['fetured']    = $this->m_site->todayFetured();
        $data['banner']     = $this->m_site->getBanner();
        $data['cArticle']   = $this->m_site->getCategoryArticle();
        $data['breaking']   = $this->m_site->breaking();
        $data['trending']   = $this->m_site->trending();
        $data['temple']     = $this->m_site->temple();
        $data['popular']    = $this->m_site->popular();
        $data['videos']     = $this->m_site->videos();
        $data['gallery']    = $this->m_site->gallery();
        $data['happening']  = $this->m_site->happening();
        $this->load->view('site/index', $data, FALSE);
    }

}

/* End of file home.php */
