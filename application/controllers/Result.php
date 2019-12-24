<?php 


defined('BASEPATH') OR exit('No direct script access allowed');

class result extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_result');
        
    }

    /** 
     * Result
     * Parametes
     * 1. category
     * 2. slug
     * 3. date
     * 4. auter
    */
    public function index($slug = null, $date = null, $auth = null)
    {
        $category = $this->urls->urlDformat($this->uri->segment(1));
        $data['post'] = $this->m_result->getPosts($category, $slug, $date, $auth);
        $data['breaking']   = $this->m_result->breaking();
        
        if($category != null && $slug != null){
            $data['related']    =  $this->m_result->related($category, $slug);
            $data['is_detail'] = TRUE;
            $this->m_result->visitorCount($data['post']->id);
            $this->load->view('site/detail', $data, FALSE);
        }
        else{
            $data['category'] = $category;
            $this->load->view('site/result', $data, FALSE);
        }
        
    }

    public function test($var = null)
    {
        echo $this->uri->segment(1);
        
    }

    // preview
    public function preview($id = null)
    {
        $data['post'] = $this->m_result->getPostsPreview($id);
        $data['breaking']   = $this->m_result->breaking();
        $this->load->view('site/detail', $data, FALSE);
    }
}

/* End of file Result.php */
