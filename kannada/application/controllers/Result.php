<?php 


defined('BASEPATH') OR exit('No direct script access allowed');

class result extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_result');
        $this->load->model('m_site');
        $this->ci =& get_instance();
        $this->detect = $this->ci->mobdetect->detect();
        
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

            if ($this->detect == 'mobile') {
                $this->load->view('mobile/detail', $data, FALSE);
            }else{
                $this->load->view('site/detail', $data, FALSE);
            }
        }
        else{

            if ($category == 'video') {
                $data['vid'] = $this->m_result->allVideos();
            }

            $data['category'] = $category;
            if ($this->detect == 'mobile') {
                $this->load->view('mobile/result', $data, FALSE);
            }else{
                $this->load->view('site/result', $data, FALSE);
            }
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
        $data['related']    =  $this->m_result->relatedGallery($category,$slug);

        $data['title']  =   'Photos';
       
        if ($this->detect == 'mobile') {
           
            $this->load->view('mobile/photo-detail', $data, FALSE);
        }else{
            
            $this->load->view('site/photos', $data, FALSE);
        }
        
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

             if ($this->detect == 'mobile') {
                $this->load->view('mobile/mobile-video-detail', $data, FALSE);
            }else{
                $this->load->view('site/video-detail', $data, FALSE);
            }
        }
        else{
            $data['category'] = $category;
            $this->load->view('site/result', $data, FALSE);
        }
    }

    public function pgallery()
    {
        $data['gallery']    = $this->m_result->pgallery();
        $this->load->view('mobile/photo', $data, FALSE);
    }

    public function photoAlbum($slug='')
    {
        $data['album']      = $this->m_result->getAlbum($slug);
        $data['temple']     = $this->m_site->temple();
        $data['trending']   = $this->m_site->trending();
        $data['videos']     = $this->m_site->videos();
        $data['popular']    = $this->m_site->popular();
        $data['breaking']   = $this->m_result->breaking();
        $this->load->view('site/photos', $data, FALSE);
    }
}

/* End of file Result.php */
