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
        $data['result'] = $this->m_site->getsiteData();
        $data['banner'] = $this->m_site->getBanner();
        
        $this->load->view('site/index', $data, FALSE);
    }

}

/* End of file home.php */
