<?php 


defined('BASEPATH') OR exit('No direct script access allowed');

class Playlist extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_result');
        $this->load->model('m_site');
        $this->load->model('m_playlist');
        $this->ci =& get_instance();
        $this->detect = $this->ci->mobdetect->detect();
        $this->load->library('pagination');
    }

    /** 
     * Result
     * Parameters
     * 1. category
     * 2. slug
     * 3. date
     * 4. author
    */
  

   
    // Video single result
    public function index($slug = null, $page = '')
    {
        $category = $this->urls->urlDformat($this->uri->segment(1));
        // $data['post'] = $this->m_result->getPosts($category, $slug, $date, $auth);
        $data['breaking']   = $this->m_result->breaking();

        $this->load->model('m_site');
        $data['temple']     = $this->m_site->temple();
        $data['trending']   = $this->m_site->trending();
        $data['videos']     = $this->m_site->videos();
        $data['popular']    = $this->m_site->popular();
       //pagination
       $per_page = 10;
       $data['playlists']  = $this->m_playlist->getAllPlaylist($slug,$per_page,$page);

       $rows = $this->m_playlist->getCount($slug);
     
       $config['base_url'] = base_url().'playlist/'.$slug;;
       $config['total_rows'] = $rows;
       $config['per_page'] =$per_page;
       $config['reuse_query_string'] = TRUE;
       $config['num_links'] = 5;
       $config['full_tag_open'] = '<div class="text-center"><ul class="pagination">';
       $config['full_tag_close'] = '</ul></div>';

       $config['num_tag_open']     = '<li >';
       $config['num_tag_close']    = '</li>';

       $config['cur_tag_open']     = '<li class="active"><a>';
       $config['cur_tag_close']    = '</a></li>';

       $config['next_tag_open']    = '<li class="next">  ';
       $config['next_tag_close']   = '</li>';
       $config['next_link']        = '<i class="fa fa-chevron-right" aria-hidden="true"></i>';

       $config['prev_tag_open']    = '<li class="prev"> ';
       $config['prev_tag_close']   = '</li>';
       $config['prev_link']        = '<i class="fa fa-chevron-left" aria-hidden="true"></i>';

       $config['first_tag_open']   = '<li class=""><span class="">';
       $config['first_tag_close']  = '</span></li>';
       $config['first_link']        = FALSE;

       $config['last_tag_open']    = '<li class=""><span class="">';
       $config['last_tag_close']   = '</span></li>';
       $config['last_link']        = FALSE;

       $this->pagination->initialize($config);
       $data['pagelink'] 	= $this->pagination->create_links();

            if ($category == 'video') {
                $data['vid'] = $this->m_result->allVideos();
            }
            $data['category'] = $category;
            if ($this->detect == 'mobile') {
                $this->load->view('mobile/playlists', $data, FALSE);
            }else{

                $this->load->view('site/playlists', $data, FALSE);
            }
        
    }











  

    public function PlaylistVideos($playlist = null, $slug = null)
    {
        $data['playlists']  = $this->m_playlist->getPlaylist($playlist);

        $data['video']  = $this->m_playlist->getPlaylist($playlist, $slug);
       
        $data['breaking']   = $this->m_result->breaking();
        $this->load->model('m_site');
        $data['temple']     = $this->m_site->temple();
        $data['trending']   = $this->m_site->trending();
        $data['videos']     = $this->m_site->videos();
        $data['popular']    = $this->m_site->popular();
        if($playlist != null && $slug != null){
           
            $data['is_detail'] = TRUE;
           
             if ($this->detect == 'mobile') {
                
                $this->load->view('mobile/mobile-playlist-detail', $data, FALSE);
            }else{
                
                $this->load->view('site/playlist-detail', $data, FALSE);
            }
        }
       
    }

   
}

/* End of file Result.php */
