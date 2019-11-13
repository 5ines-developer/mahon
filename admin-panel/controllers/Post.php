<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class post extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('Mht') == '') {$this->session->set_flashdata('error', 'Please try again'); redirect('login'); }
        $this->load->model('m_post');
    }

    public function index()
    {
        $data['title'] = 'post';
        $data['category'] = $this->m_post->getCategory();
        $data['author'] = $this->m_post->getauthor();
        $this->load->view('pages/post', $data, FALSE);
    }

    // fetch post 
    public function getData($var = null)
    {
        $fetch_data = $this->m_post->make_datatables();
        $data = array();  
        foreach($fetch_data as $row)  
        {  
            $sub_array = array();  
            $sub_array[] = '
                <a class="blue hoverable action-btn update-btn modal-trigger"  href="#modal1" id="'.$row->id.'"><i class="fas fa-edit "></i></a>
                <a class="red hoverable delete-btn action-btn" id="'.$row->id.'"><i class="fas fa-trash  "></i></a>
                <a class="orange accent-3 hoverable detail action-btn" target="_blank" href="'.base_url().'post/detail/'.$row->id.'"><i class="fas fa-eye  "></i></a>
            ';  
             $sub_array[] = $row->id;  
             $sub_array[] =  (strlen($row->title) > 60) ? substr($row->title,0,57).'...' : $row->title; 
             $sub_array[] = $row->category;  
             $sub_array[] = date('d M, Y', strtotime($row->date)); 
             $sub_array[] = $row->posted_by;  
             $sub_array[] = date('d M, Y', strtotime($row->created_on));  

             $data[] = $sub_array;  
        }  
        $output = array(  
             "draw"                =>     intval($_POST["draw"]),  
             "recordsTotal"        =>     $this->m_post->get_all_data(),  
             "recordsFiltered"     =>     $this->m_post->get_filtered_data(),  
             "data"                =>     $data  
        );  
        echo json_encode($output); 
    }

    //  add post
    public function add_post()
    {
        $title  = $this->input->post('post');

        // file upload check
        if($_FILES['img']['size'] != 0) {
            $files = $this->uploadFile();
        }else{
            $files = array('status'=> true, 'file' => $this->input->post('filepath', TRUE));
        }

       
        // categoty 
       
        
        
        $id = $this->input->post('ctid', TRUE);
        if(!empty($this->input->post('slug', TRUE))){
            $slug = $this->input->post('slug', TRUE);
        }else{
            $slug =  str_replace(' ', '-',$this->input->post('title', TRUE));
        }
        // assign to array
        if($files['status']){
            $data = array(
                'title'     => $this->input->post('title', TRUE),
                'category'  => $this->input->post('category', TRUE),
                'posted_by' => $this->input->post('posted_by', TRUE),
                'date'      => date('Y-m-d', strtotime($this->input->post('date', TRUE))),
                'slug'      => $slug,
                'tags'      => $this->input->post('tags', TRUE),
                'content'   => $this->input->post('description', TRUE),
                'image'     => $files['file'],
                'update_on' => date('Y-m-d H:i:s')
            );

            $postResult = $this->m_post->addPost($data, $id);
            if(!empty($id)){
                $msg = 'Update successfully.';
                $postid = $id;
            }else{
                $msg = 'Post successfully submited.';
                $postid = $postResult['id'];
            }
            if($postResult['status'] == 1){
                $dataPage = array(
                    'post_id'   => $postid,
                    'title'     => $this->input->post('ptitle', TRUE),
                    'keyword'   => $this->input->post('pkeywords', TRUE),
                    'descr'     => $this->input->post('pdescription', TRUE),
                );
    
                $datafb = array(
                    'postid'    => $postid,
                    'pageid'    => $this->input->post('fid', TRUE),
                    'title'     => $this->input->post('ftitle', TRUE),
                    'site_name' => $this->input->post('fsite_name', TRUE),
                    'url'       => $this->input->post('furl', TRUE),
                    'img_url'   => $this->input->post('fimg_url', TRUE),
                    'descr'     => $this->input->post('fdescription', TRUE),
                );
    
                $datatwit = array(
                    'post_id'   => $postid,
                    'card'      => $this->input->post('tcard', TRUE),
                    'title'     => $this->input->post('ttitle', TRUE),
                    'site_name' => $this->input->post('tsite_name', TRUE),
                    'url'       => $this->input->post('turl', TRUE),
                    'img_url'   => $this->input->post('timg_url', TRUE),
                    'descr'     => $this->input->post('tdescription', TRUE),
                );
                $this->m_post->addPageMeta($dataPage, $id);
                $this->m_post->addFbMeta($datafb, $id);
                $this->m_post->addTwitMeta($datatwit, $id);
                
                $data = array('status' => true, 'status_code' => 200, 'msg' => $msg);
                echo json_encode($data);
            }
            else
            {
                $data = array('status' => false, 'status_code' => 400, 'msg' => 'Server error occurred. Please try again.');
                echo json_encode($data);
            }
        }
        else
        {
            $data = array('status' => false, 'status_code' => 400, 'msg' => $files['error']);
            echo json_encode($data);
        }
    }

    // upload file
    function uploadFile()
    {
        $config = array(
            'upload_path' => "../post_img/",
            'allowed_types' => "gif|jpg|png|jpeg|svg",
            'overwrite' => TRUE,
            'max_size' => "2048000", 
            'encrypt_name' => true
        );
        $this->load->library('upload', $config);
        if(!is_dir($config['upload_path'])) mkdir($config['upload_path'], 0777, TRUE);
        if($this->upload->do_upload('img'))
        {
            $filename = 'post_img/'.$this->upload->data('file_name');
            $data = array('status'=> true, 'file' => $filename);
        }
        else
        {
            $data = array('status'=> false, 'file'=> '', 'error' => $this->upload->display_errors());

        }
        return $data;
    }





    // delete data
    public function delete()
    {
        $id  = $this->input->post('id');
        if($this->m_post->delete($id))
        {
            echo 'post deleted successfully';
        }else{
            echo 'Some error occured, Please try agin later';
        }
    }

    // single data
    public function single_data()
    {
        $id  = $this->input->post('id');
        if($row = $this->m_post->single_data($id))
        {
            echo json_encode($row);
        }else{
            echo 'No data fond';
        }
    }

    // get single data
    public function get_single($id = null)
    {
        
        $data['post'] = $this->m_post->single_data($id);
        $data['title'] = 'Detail';
        $this->load->view('pages/post-detail', $data, FALSE);
        
    }

    // update
    public function update_post()
    {
        $title  = $this->input->post('post');
        $id  = $this->input->post('ctid');
        $data   = array('title' => $title);
        if($this->m_post->add_post($data, $id))
        {
            echo 'post update successfully';
        }else{
            echo 'Some error occured, Please try agin later';
        }
    }

    // edit
    public function edit($id = null)
    {

        if($this->input->post()){
         
            if(is_uploaded_file($_FILES['img']['tmp_name'])) {
                $files = $this->uploadFile();
            }else{
                $files = array('status'=> true, 'file' => $this->input->post('filepath', TRUE));
            }



            if($files['status']){
                $data = array(
                    'title'     => $this->input->post('title', TRUE),
                    'category'  => $this->input->post('category', TRUE),
                    'posted_by' => $this->input->post('posted_by', TRUE),
                    'date'      => date('Y-m-d', strtotime($this->input->post('date', TRUE))),
                    'slug'      => $this->input->post('slug', TRUE),
                    'tags'      => $this->input->post('tags', TRUE),
                    'content'   => $this->input->post('description', TRUE),
                    'image'     => $files['file'],
                    'update_on' => date('Y-m-d H:i:s')
                );

                if($this->m_post->UpdatePost($data, $id))
                {
                    $this->session->set_flashdata('success', 'post update successfully');
                    redirect('post/edit/'.$id,'refresh');
                    
                }else{
                    $this->session->set_flashdata('error', 'Some error occured, Please try agin later');
                    redirect('post/edit/'.$id);
                }
            }else{
                $this->session->set_flashdata('error', $files['error']);
                redirect('post/edit/'.$id);
            }
        }else{
            $data['post'] = $this->m_post->single_data($id);
            $data['category'] = $this->m_post->getCategory();
            $data['title'] = 'Edit';
            $this->load->view('pages/post-edit', $data, FALSE);
        }
    }

}

/* End of file post.php */
