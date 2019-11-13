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
    public function index($category = null, $slug = null, $date = null, $auth = null)
    {
        $data['post'] = $this->m_result->getPosts($category, $slug, $date, $auth);

        if($category != null && $slug != null){
            $data['is_detail'] = TRUE;
            $this->load->view('site/detail', $data, FALSE);
        }
        else{
            $data['category'] = $category;
            $this->load->view('site/result', $data, FALSE);
        }
        
    }
}

/* End of file Result.php */
