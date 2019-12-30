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
     * Parameters
     * 1. category
     * 2. slug
     * 3. date
     * 4. author
    */
    public function index($slug = null, $date = null, $auth = null)
    {
        $category = $this->urls->urlDformat($this->uri->segment(1));
        $data['post'] = $this->m_result->getPosts($category, $slug, $date, $auth);
        $data['breaking']   = $this->m_result->breaking();

        $this->load->model('m_site');
        $data['temple']     = $this->m_site->temple();
        $data['trending']   = $this->m_site->trending();
        $data['videos']     = $this->m_site->videos();
        $data['popular']    = $this->m_site->popular();
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
        $this->load->model('m_site');
        $data['temple']     = $this->m_site->temple();
        $data['trending']   = $this->m_site->trending();
        $data['videos']     = $this->m_site->videos();
        $data['popular']    = $this->m_site->popular();
        $data['post'] = $this->m_result->getPostsPreview($id);
        $data['breaking']   = $this->m_result->breaking();
        $this->load->view('site/detail', $data, FALSE);
    }

    // gallery preview
    public function photogallery($category = null, $slug = null)
    {
        $this->load->model('m_site');
        $data['temple']     = $this->m_site->temple();
        $data['trending']   = $this->m_site->trending();
        $data['videos']     = $this->m_site->videos();
        $data['popular']    = $this->m_site->popular();
        $data['photos'] = $this->m_result->GetGallery($slug);
        $data['breaking']   = $this->m_result->breaking();
        $data['title']  =   'Photos';
        $this->load->view('site/photos', $data, FALSE);
        
    }

    // Video single result
    public function videos($category = null, $slug = null)
    {
        // $category = $this->urls->urlDformat($this->uri->segment(1));
        $data['post'] = $this->m_result->getVideo($category, $slug);
        $data['breaking']   = $this->m_result->breaking();
        $this->load->model('m_site');
        $data['temple']     = $this->m_site->temple();
        $data['trending']   = $this->m_site->trending();
        $data['videos']     = $this->m_site->videos();
        $data['popular']    = $this->m_site->popular();
        if($category != null && $slug != null){
            $data['related']    =  $this->m_result->relatedVideo($category, $slug);
            $data['is_detail'] = TRUE;
            // $this->m_result->visitorCount($data['post']->id);
            $this->load->view('site/video-detail', $data, FALSE);
        }
        else{
            $data['category'] = $category;
            $this->load->view('site/result', $data, FALSE);
        }
    }
}

/* End of file Result.php */
