<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Events extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('Mht') == '') {$this->session->set_flashdata('error', 'Please try again'); redirect('login'); }
        $this->load->model('m_events');

        if ($this->session->userdata('Mht_type') =='2') {
            $this->load->library('preload');
            $this->preload->check_auth($this->session->userdata('Mht'));
        }
    }

    public function index()
    {
        $data['title'] = 'events';
        $this->load->view('pages/events', $data, FALSE);
    }

    // fetch events 
    public function getData($var = null)
    {
        $fetch_data = $this->m_events->make_datatables();
        $data = array();  
        foreach($fetch_data as $row)  
        {  
             $sub_array = array();  
             $sub_array[] = $row->id;  
             $sub_array[] = $row->title;  
             $sub_array[] = date('d M, Y', strtotime($row->date)); 
             $sub_array[] = '
                 <a class="blue hoverable action-btn update-btn  modal-trigger" id="'.$row->id.'" href="#modal1"><i class="fas fa-edit "></i></a>
                 <a class="red hoverable delete-btn action-btn" id="'.$row->id.'"><i class="fas fa-trash  "></i></a>
             ';  
             $data[] = $sub_array;  
        }  
        $output = array(  
             "draw"                =>     intval($_POST["draw"]),  
             "recordsTotal"        =>     $this->m_events->get_all_data(),  
             "recordsFiltered"     =>     $this->m_events->get_filtered_data(),  
             "data"                =>     $data  
        );  
        echo json_encode($output); 
    }

    //  add events
    public function add_events()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('title', 'title', 'required|is_unique[mh_events.title]');
        if ($this->form_validation->run() == FALSE)
        { 
            $this->output->set_status_header('400');
            $data = form_error('title');
            echo $data;
        }else{
            $title  = $this->input->post('title');
            $url = $this->input->post('url');
            $date = $this->input->post('date');
            $data   = array(
                'title' => $title,
                'url' => $url,
                'date' => $date,
            );
            if($this->m_events->add_events($data))
            {
                echo 'Events added successfully';
            }else{
                echo 'Some error occurred, Please try agin later';
            }
        }
        
    }

    // delete data
    public function delete()
    {
        $id  = $this->input->post('id');
        if($this->m_events->delete($id))
        {
            echo 'events deleted successfully';
        }else{
            echo 'Some error occured, Please try agin later';
        }
    }

    // single data
    public function single_data()
    {
        $id  = $this->input->post('id');
        if($row = $this->m_events->single_data($id))
        {
            $output['title']  = $row->title;
            $output['id']     = $row->id;
            $output['date']  = date('Y-m-d', strtotime($row->date));
            $output['url']   = $row->url;
            echo json_encode($output);
        }else{
            echo 'No data fond';
        }
    }

    // update
    public function update_events()
    {
        $id  = $this->input->post('ctid');
        $title  = $this->input->post('title');
        $url = $this->input->post('url');
        $date = $this->input->post('date');
        $data   = array(
            'title' => $title,
            'url' => $url,
            'date' => $date,
        );
        if($this->m_events->add_events($data, $id))
        {
            echo 'events update successfully';
        }else{
            echo 'Some error occured, Please try agin later';
        }
    }


    // sub events
    public function sub_events($id = null)
    {
        $data['result'] = $this->m_events->sub_events();
        $data['title'] = 'Sub events';
        $this->load->view('pages/sub-events', $data, FALSE);
    }

    // add sub events
    public function sub_events_add(Type $var = null)
    {
        $id = $this->input->post('ctid');
        $title = $this->input->post('events');
        $data = array(
            'main_events' => $id,
            'title' => $title,
            'created_by' => $this->session->userdata('Mht')
        );
        if($this->m_events->add_sub_events($data))
        {
            $this->session->set_flashdata('success', 'events update successfully');
            redirect('events/sub-events');
        }else{
            $this->session->set_flashdata('error', 'Some error occured, Please try agin later');
            redirect('events/sub-events');
        }
    }

    // dete subevents
    public function sub_events_delete($id = null)
    {
        if($this->m_events->deleteSub($id))
        {
            $this->session->set_flashdata('success', 'events deleted successfully');
            redirect('events/sub-events');
        }else{
            $this->session->set_flashdata('error', 'Some error occured, Please try agin later');
            redirect('events/sub-events');
        }
    }

     // Edit subevents
    public function sub_events_edit()
    {
         $id = $this->input->post('id');
         $title = $this->input->post('events');
         $data = array('title' => $title, );
         if($this->m_events->editSub($data, $id))
         {
             $this->session->set_flashdata('success', 'events updated successfully');
             redirect('events/sub-events');
         }else{
             $this->session->set_flashdata('error', 'Some error occured, Please try agin later');
             redirect('events/sub-events');
         }
    }

    // newsletter subscription
    public function news_letter()
    {
        $data['lists'] = $this->m_events->news_letter();
        $data['title'] = 'Newsletter Subscribers';
        $this->load->view('pages/news-letter', $data, FALSE);
    }

    public function news_letter_delete($id = null)
    {
       
        if($this->m_events->news_letter_delete($id))
        {
            $this->session->set_flashdata('success', 'Email id Successfully deleted');
                redirect('news-letter','refresh');
        }else{
            $this->session->set_flashdata('error', 'Some error occured, Please try agin later');
            redirect('news-letter','refresh');
        }
       
       
    }


}

/* End of file events.php */
