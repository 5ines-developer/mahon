<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class home extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_site');
        $this->ci =& get_instance();
        $this->detect = $this->ci->mobdetect->detect();
        
    }
    

    public function index()
    {

        // $data['result']     = $this->m_site->getsiteData();
        $data['fetured']    = $this->m_site->todayFetured();
        $data['banner']     = $this->m_site->getBanner();
        $data['cArticle']   = $this->m_site->getCategoryArticle();
        $data['breaking']   = $this->m_site->breaking();
        $data['trending']   = $this->m_site->trending();
        $data['temple']     = $this->m_site->temple();
        $data['popular']    = $this->m_site->popular();
        $data['videos']     = $this->m_site->videos();
        $data['fvideos']    = $this->m_site->fvideos();
        $data['gallery']    = $this->m_site->gallery();
        $data['happening']  = $this->m_site->happening();
        $data['twitter']    = $this->m_site->twitter();

        if ($this->detect == 'mobile') {
            $this->load->view('mobile/index', $data, FALSE);
        }else{
            $this->load->view('site/index', $data, FALSE);
        }
    }

    // subscription
    public function subscribe()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules(
            'email', 'Email', 'required|is_unique[mh_newsletter.email]',
            array(
                    'required'      => 'You have not provided %s.',
                    'is_unique'     => 'This %s already exists.'
            )
        );
        if ($this->form_validation->run() == FALSE)
        {
            http_response_code(400);
            echo json_encode(preg_replace("/\r|\n/", "", validation_errors()));
        }
        else
        {
            $email =  $this->input->post('email', true);
            $this->m_site->subscribe($email);
            echo json_encode('your subscription has been successfully confirmed');
        }
       
    }

// mobile video

public function mobile_video()
{
    $data['title']  = 'Mobile - Video';
    $this->load->view('mobile/mobile-video',$data);
}
public function mobile_video_detail()
{
    $data['title']  = 'Mobile - Video - Detail';
    $this->load->view('mobile/mobile-video-detail',$data);
}
public function photo()
{
    $data['title']  = 'Mobile - photo';
    $this->load->view('mobile/photo',$data);
}
public function photo_detail()
{
    $data['title']  = 'Mobile - photo - Detail';
    $this->load->view('mobile/photo-detail',$data);
}

}

/* End of file home.php */
