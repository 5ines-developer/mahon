<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Trash extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('Mht') == '') {$this->session->set_flashdata('error', 'Please try again'); redirect('login'); }
        $this->load->model('m_trash');
        if ($this->session->userdata('Mht_type') !='1') { redirect('/'); }
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

    // delete trash
    public function articles_delete()
    {
       $ids = $this->input->post('ids');
       foreach ($ids as $key => $value) {
           $this->m_trash->articles_delete($value);
       }
       echo json_encode('deleted Successfully');
    }

    // clear all trash
    public function clear_all()
    {
        $result = $this->m_trash->clear_all();
        if($result['status'] == true)
        {
            $this->session->set_flashdata('success', 'Successfully trash cleared...');
            redirect('trash/article','refresh');
        }else{
            $this->session->set_flashdata('error', $result['msg']);
            redirect('trash/article','refresh');
        }
    }

    // delete trash
    public function delete_category()
    {
       $ids = $this->input->post('ids');
       foreach ($ids as $key => $value) {
           $this->m_trash->delete_category($value);
       }
       echo json_encode('deleted Successfully');
    }

    // clear all trash
    public function category_clear()
    {
        $result = $this->m_trash->category_clear();
        if($result['status'] == true)
        {
            $this->session->set_flashdata('success', 'Successfully trash cleared...');
            redirect('trash/category','refresh');
        }else{
            $this->session->set_flashdata('error', $result['msg']);
            redirect('trash/category','refresh');
        }
    }

}

/* End of file Trash.php */
