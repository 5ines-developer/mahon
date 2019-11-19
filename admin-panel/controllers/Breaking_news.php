<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Breaking_news extends CI_Controller {

	/*--construct--*/
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('Mht') == '') {$this->session->set_flashdata('error', 'Please try again'); redirect('login'); }
        $this->load->model('m_breaking_news');
    }

    // get banner
    public function index()
    {
        $data['title'] = 'Breaking News | Mahonnthi';
        $this->load->view('pages/breaking-news', $data, FALSE);
    }

     // fetch category 
     public function getData($var = null)
     {
         $fetch_data = $this->m_breaking_news->make_datatables();

         $data = array();  
         foreach($fetch_data as $key => $row)  
         {  
              $sub_array = array();  
              $sub_array[] = $key + 1;  
              $sub_array[] = $row->title;  
              $sub_array[] = '<a href="'.$row->url.'" class="truncate" target="_blank" />'.$row->url.'</a>';  
              $sub_array[] = date('d M, Y', strtotime($row->created_on)); 
              $sub_array[] = '
                  <a class="blue hoverable action-btn update-btn  modal-trigger" id="'.$row->id.'" href="#modal1"><i class="fas fa-edit "></i></a>
                  <a class="red hoverable delete-btn action-btn" id="'.$row->id.'"><i class="fas fa-trash  "></i></a>
              ';  
              $data[] = $sub_array;  
         }  
         $output = array(  
              "draw"                =>     intval($_POST["draw"]),  
              "recordsTotal"        =>     $this->m_breaking_news->get_all_data(),  
              "recordsFiltered"     =>     $this->m_breaking_news->get_filtered_data(),  
              "data"                =>     $data  
         );  
         echo json_encode($output); 
     }
 
     //  add category
     public function add()
     {
         $this->load->library('form_validation');
         $this->form_validation->set_rules('breaking', 'URL', 'required|is_unique[mh_breaking_news.url]');
         if ($this->form_validation->run() == FALSE)
         { 
             $this->output->set_status_header('400');
             $data = form_error('breaking');
             echo $data;
         }else{
             $url  = $this->input->post('breaking');
             $title  = $this->input->post('title');
             $data   = array('url' => $url, 'title' => $title);
             if($this->m_breaking_news->add($data))
             {
                 echo 'Successfully Added';
             }else{
                 echo 'Some error occured, Please try agin later';
             }
         }
         
     }
 
    //  // delete data
     public function delete()
     {
         $id  = $this->input->post('id');
         if($this->m_breaking_news->delete($id))
         {
             echo 'Successfully Deleted';
         }else{
             echo 'Some error occured, Please try agin later';
         }
     }
 
    //  // single data
     public function single_data()
     {
         $id  = $this->input->post('id');
         if($row = $this->m_breaking_news->single_data($id))
         {
             $output['url']  = $row->url;
             $output['title']  = $row->title;
             $output['id']     = $row->id;
             echo json_encode($output);
         }else{
             echo 'No data fond';
         }
     }
 
    //  // update
     public function update_breaking()
     {
         $url  = $this->input->post('breaking');
         $title  = $this->input->post('title');
         $id  = $this->input->post('ctid');
         $data   = array('url' => $url, 'title'=> $title);
         if($this->m_breaking_news->add($data, $id))
         {
             echo 'Successfully Updated';
         }else{
             echo 'Some error occured, Please try agin later';
         }
     }
 

}
