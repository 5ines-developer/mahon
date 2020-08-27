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

        $data['album']      = $this->m_site->getAlbum();

        $data['playlists']  = $this->m_site->getPlaylist();

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





     public function contact($value='')

    {

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

        $data['album']      = $this->m_site->getAlbum();

        $this->load->view('site/contact',$data);

    }



    public function contactSubmit($value='')

    {

        $this->load->library('form_validation');

        $this->form_validation->set_rules('name', 'Name', 'required|alpha_numeric_spaces');

        $this->form_validation->set_rules('mail', 'Email', 'required|valid_email');

        $this->form_validation->set_rules('phone', 'Phone Number', 'required|numeric');

        $this->form_validation->set_rules('subject', 'Subject', 'alpha_numeric_spaces');

        $this->form_validation->set_rules('comment', 'Message', 'required|alpha_numeric_spaces');

        if ($this->form_validation->run() == false) {

            $this->form_validation->set_error_delimiters('', '<br>');

            $this->session->set_flashdata('error', str_replace(array("\n", "\r"), '', validation_errors()));

            redirect('contact-us','refresh');

        }else{



            $name       =   $this->input->post('name');

            $email      =   $this->input->post('mail');

            $phone      =   $this->input->post('phone');

            $subject    =   $this->input->post('subject');

            $message    =   $this->input->post('comment');



            $insert = array(

              'name'    =>  $name , 

              'email'   =>  $email , 

              'phone'   =>  $phone , 

              'subject' =>  $subject , 

              'message' =>  $message ,

            );

            $data['result'] = $insert;

            $data['output']  =  $this->m_site->addenquiry($insert);

            if (!empty($data['output'])) {

                $this->load->config('email');

                $this->load->library('email');

                $from = $this->config->item('smtp_user');

                $to = $this->config->item('vr_to');

                $msg = $this->load->view('email/enquiry', $data, true);

                $this->email->set_newline("\r\n");

                $this->email->from($from, 'Mahonnathi');

                $this->email->to($to);

                $this->email->subject('Enquiry Form');

                $this->email->message($msg);

                if ($this->email->send()) {

                    $this->session->set_flashdata('success', 'ನಿಮ್ಮ ವಿನಂತಿಯನ್ನು ಯಶಸ್ವಿಯಾಗಿ ಸಲ್ಲಿಸಲಾಗಿದೆ, ನಮ್ಮ ತಂಡ ಶೀಘ್ರದಲ್ಲೇ ನಿಮ್ಮನ್ನು ಸಂಪರ್ಕಿಸುತ್ತದೆ.');

                } else {

                    $this->session->set_flashdata('error', 'ನಿಮ್ಮ ವಿನಂತಿಯನ್ನು ಸಲ್ಲಿಸಲು ಸಾಧ್ಯವಿಲ್ಲ, ದಯವಿಟ್ಟು ನಂತರ ಮತ್ತೆ ಪ್ರಯತ್ನಿಸಿ!');

                }

                redirect('contact-us','refresh');

            }else{

                $this->session->set_flashdata('error', 'ನಿಮ್ಮ ವಿನಂತಿಯನ್ನು ಸಲ್ಲಿಸಲು ಸಾಧ್ಯವಿಲ್ಲ, ದಯವಿಟ್ಟು ನಂತರ ಮತ್ತೆ ಪ್ರಯತ್ನಿಸಿ!');

                redirect('contact-us','refresh');

            }

        }

    }



    public function widget($value='')

    {

        $data['title']  = 'Covid 19 | Mahonnathi';

        $data['result'] = $this->m_site->getWidget();

        $this->load->view('site/widget', $data, FALSE);

    }



}



/* End of file home.php */

