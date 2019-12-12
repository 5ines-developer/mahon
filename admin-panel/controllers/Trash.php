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
        $this->session->set_flashdata('success', 'restored successfully');
        redirect('trash/category','refresh');
        
    }

    public function articles()
    {
        $data['title'] = 'Article';
        $data['result'] =   $this->m_trash->articleList();
        $this->load->view('trash/article', $data, FALSE);
    }

    public function articles_restore($id = null)
    {
        $this->m_trash->articles_restore($id);
        $this->session->set_flashdata('success', 'restored successfully');
        redirect('trash/article','refresh');
        
    }

}

/* End of file Trash.php */
