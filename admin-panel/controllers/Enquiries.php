<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Enquiries extends CI_Controller {

		/*--construct--*/
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('Mht') == '') {$this->session->set_flashdata('error', 'Please try again'); redirect('login'); }
        $this->load->model('m_enquiry');    

    }

    //get enquiries
	public function index()
	{
        $data['title']  = 'Enquiry - Mahonnathi';
        $data['result']  = $this->m_enquiry->getEnquiry();
        $this->load->view('pages/enquiry-list', $data, FALSE);
	}

	public function view($id='')
    {
        $data['result']  = $this->m_enquiry->view($id);
        $data['title']   = 'Enquiry - Mahonnathi';
        $this->load->view('pages/view-enquiry', $data, FALSE);
    }

}

/* End of file Enquiries.php */
/* Location: ./application/controllers/Enquiries.php */