<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Trash extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('Mht') == '') {$this->session->set_flashdata('error', 'Please try again'); redirect('login'); }
        $this->load->model('m_trash');
    }

    public function category()
    {
        $data['result'] = $this->m_trash->categoryList();
        $this->load->view('trash/category', $data, FALSE);
    }

    public function category_restore($id = null)
    {
        $this->m_trash->category_restore($id);
        $this->session->set_flashdata('success', 'restore successfully');
        redirect('trash/category','refresh');
        
    }

}

/* End of file Trash.php */