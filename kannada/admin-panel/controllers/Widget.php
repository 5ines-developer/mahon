<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Widget extends CI_Controller {

	/*--construct--*/
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_widget');
        $this->load->library('bcrypt');
    }

    public function index(Type $var = null)
    {
        if ($this->session->userdata('Mht_type') !='1') { redirect('/'); }
        $data['title'] = 'Widget';
        $this->load->model('m_widget');
        $data['result']   = $this->m_widget->getwidget();
        $this->load->view('widget/list', $data, FALSE); 
    }

    public function edit($id='')
    {
        $data['title'] = 'Widget';
        $data['result'] = $this->m_widget->getwidget($id);
        $this->load->view('widget/edit', $data, FALSE); 
    }

    public function update($value='')
    {
        $id         = $this->input->post('id');
        $reported   = $this->input->post('reported');
        $deaths     = $this->input->post('deaths');
        $recovered  = $this->input->post('recovered');
        $total      = $this->input->post('total');

        $insert = array(
            'reported' => $reported, 
            'deaths' => $deaths, 
            'recovered' => $recovered, 
            'total' => $total, 
        );

        if($this->m_widget->update($insert,$id))
        {
            $this->session->set_flashdata('success', 'Widget updated successfully');
        }else{
            $this->session->set_flashdata('error', 'Some error occured, Please try agin later');
        }
        redirect('widget/edit/'.$id,'refresh');
    }

    public function delete($id='')
    {

        $insert = array(
            'reported' => 0, 
            'deaths' => 0, 
            'recovered' => 0, 
            'total' => 0, 
        );

        if($this->m_widget->update($insert,$id))
        {
            $this->session->set_flashdata('success', 'Widget deleted successfully');
        }else{
            $this->session->set_flashdata('error', 'Some error occured, Please try agin later');
        }
        redirect('widget','refresh');
    }
}
/* End of file M_widget.php */
/* Location: .//C/xampp/htdocs/mahonnathi/admin-panel/models/M_widget.php */