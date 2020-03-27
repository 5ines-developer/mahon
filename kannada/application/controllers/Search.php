<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_search');
        $this->ci =& get_instance();
        $this->detect = $this->ci->mobdetect->detect();
    }
    

    public function index($slug = null)
    {
        $search         = $this->input->post('search');
        $this->load->model('m_site');
        $data['temple']     = $this->m_site->temple();
        $data['trending']   = $this->m_site->trending();
        $data['videos']     = $this->m_site->videos();
        $data['post']   = $this->m_search->search($search, $slug);
        $data['title']  = $search;
        $data['mtitle']  = $search;
        if ($this->detect == 'mobile') {
            $this->load->view('mobile/result', $data, FALSE);
        }else{
            $this->load->view('site/result', $data, FALSE);
        }
    }

}

/* End of file Search.php */
