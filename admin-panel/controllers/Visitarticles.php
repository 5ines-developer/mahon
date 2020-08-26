<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Visitarticles extends CI_Controller {

	/*--construct--*/
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('Mht') == '') {$this->session->set_flashdata('error', 'Please try again'); redirect('login'); }
        $this->load->model('m_visitarticles');
    }

    
	public function index($cat_id='')
	{

            $data['title'] = 'Visit articles - Mahonnati';
            $data['category'] = $this->m_visitarticles->getCategory();
            $data['articles'] = $this->m_visitarticles->getArticles($cat_id);
            
            $this->load->view('pages/visit-articles', $data);
       
	}


	

}

/* End of file Authentication.php */
/* Location: ./application/controllers/Authentication.php */