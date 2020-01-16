<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Twitter extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('Mht') == '') {$this->session->set_flashdata('error', 'Please try again'); redirect('login'); }
        $this->load->model('m_twitter');
    }

    public function index()
    {
        $data['title'] = 'twitter';
        $this->load->view('pages/twitter', $data, FALSE);
    }

    // fetch twitter 
    public function getData($var = null)
    {
        $fetch_data = $this->m_twitter->make_datatables();
        $data = array();  
        foreach($fetch_data as $row)  
        {  
             $sub_array = array();  
             $sub_array[] = $row->id;  
             $sub_array[] = $row->embed;  
             $sub_array[] = date('d M, Y', strtotime($row->created_on)); 
             $sub_array[] = '
                 <a class="blue hoverable action-btn update-btn  modal-trigger" id="'.$row->id.'" href="#modal1"><i class="fas fa-edit "></i></a>
                 <a class="red hoverable delete-btn action-btn" id="'.$row->id.'"><i class="fas fa-trash  "></i></a>
             ';  
             $data[] = $sub_array;  
        }  
        $output = array(  
             "draw"                =>     intval($_POST["draw"]),  
             "recordsTotal"        =>     $this->m_twitter->get_all_data(),  
             "recordsFiltered"     =>     $this->m_twitter->get_filtered_data(),  
             "data"                =>     $data  
        );  
        echo json_encode($output); 
    }

    //  add twitter
    public function add_twitter()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('embed', 'embed', 'required|is_unique[mh_twitter_post.embed]');
        if ($this->form_validation->run() == FALSE)
        { 
            $this->output->set_status_header('400');
            $data = form_error('embed');
            echo $data;
        }else{
            $embed  = $this->input->post('embed');
            $data   = array(
                'embed' => $embed,
            );
            if($this->m_twitter->add_twitter($data))
            {
                echo 'twitter added successfully';
            }else{
                echo 'Some error occurred, Please try agin later';
            }
        }
        
    }

    // delete data
    public function delete()
    {
        $id  = $this->input->post('id');
        if($this->m_twitter->delete($id))
        {
            echo 'twitter deleted successfully';
        }else{
            echo 'Some error occured, Please try agin later';
        }
    }

    // single data
    public function single_data()
    {
        $id  = $this->input->post('id');
        if($row = $this->m_twitter->single_data($id))
        {
            $output['embed']  = $row->embed;
            $output['id']     = $row->id;
            $output['date']  = date('Y-m-d', strtotime($row->created_on));
            echo json_encode($output);
        }else{
            echo 'No data fond';
        }
    }

    // update
    public function update_twitter()
    {
        $id  = $this->input->post('ctid');
        $embed  = $this->input->post('embed');
        $data   = array(
            'embed' => $embed,
        );
        if($this->m_twitter->add_twitter($data, $id))
        {
            echo 'twitter update successfully';
        }else{
            echo 'Some error occured, Please try agin later';
        }
    }


    
}

/* End of file twitter.php */
