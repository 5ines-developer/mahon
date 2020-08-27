<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Playlist extends CI_Controller {

	/*--construct--*/
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('Mht') == '') {$this->session->set_flashdata('error', 'Please try again'); redirect('login'); }
        $this->load->model('m_playlist');
        $this->load->model('m_post');
    }

    // load playlist
    public function index()
    {
        $data['title'] = 'Playlist | Mahonnathi';
        $this->load->view('pages/playlist', $data, FALSE);
    }

     // fetch category 
     public function getData($var = null)
     {
         $fetch_data = $this->m_playlist->make_datatables();

         $data = array();  
         foreach($fetch_data as $key => $row)  
         {  
              $sub_array = array();  
              $sub_array[] = $key + 1;  
              $sub_array[] = $row->title;  
              
              $sub_array[] = date('d M, Y', strtotime($row->created_on)); 
              $sub_array[] = '
                  <a class="orange accent-3 hoverable action-btn update-btn"  href="'.base_url('playlist-article/').$row->id.'"><i class="fas fa-eye "></i></a>
                  <a class="blue hoverable action-btn update-btn  modal-trigger" id="'.$row->id.'" href="#modal1"><i class="fas fa-edit "></i></a>
                  <a class="red hoverable delete-btn action-btn" id="'.$row->id.'"><i class="fas fa-trash  "></i></a>
              ';  
              $data[] = $sub_array;  
         }  
         $output = array(  
              "draw"                =>     intval($_POST["draw"]),  
              "recordsTotal"        =>     $this->m_playlist->get_all_data(),  
              "recordsFiltered"     =>     $this->m_playlist->get_filtered_data(),  
              "data"                =>     $data  
         );  
         echo json_encode($output); 
     }
 
     //  add category
     public function add()
     {
       
         $this->load->library('form_validation');
         $this->form_validation->set_rules('title', 'Playlist Title', 'required|is_unique[mh_playlist.title]');
         if ($this->form_validation->run() == FALSE)
         { 
             $this->output->set_status_header('400');
             $data = form_error('title');
             echo $data;
             
         }else{
                $title     = $this->input->post('title');
                $slug = strtolower($this->input->post('pl_slug'));
              // file upload check
                if($_FILES['img']['size'] != 0) {
                    $files = $this->uploadFile();
                }else{
                    $files = array('status'=> true, 'file' => $this->input->post('filepath', TRUE));
                }

                if($files['status']){
                    $data      = array(
                        'title' => $title,
                        'playlist_img'     => $files['file'],
                        'alt'     => $this->input->post('imagetitle'),
                        'pl_slug'=> str_replace(' ', '-',$slug)
                    );
                  
                    if($this->m_playlist->add($data))
                    {
                        echo 'Successfully Added';
                    }else{
                        echo 'Some error occured, Please try agin later';
                    }

                }else{
                    $data = array('status' => false, 'status_code' => 400,  'msg' => $files['error']);
                    echo json_encode($data);
                }
            
         }
         
     }

         // upload file
    function uploadFile()
    {
        $config = array(
            'upload_path' => "../playlist_img/",
            'allowed_types' => "gif|jpg|png|jpeg|svg",
            'overwrite' => TRUE,
            'max_size' => "2048000", 
            'encrypt_name' => true
        );
        $this->load->library('upload', $config);
        if(!is_dir($config['upload_path'])) mkdir($config['upload_path'], 0777, TRUE);
        if($this->upload->do_upload('img'))
        {
            $filename = 'playlist_img/'.$this->upload->data('file_name');
            $data = array('status'=> true, 'file' => $filename);
        }
        else
        {
            $data = array('status'=> false, 'file'=> '', 'error' => $this->upload->display_errors());

        }
        return $data;
    }
 
    //  // delete data
     public function delete()
     {
         $id  = $this->input->post('id');
         if($this->m_playlist->delete($id))
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
         if($row = $this->m_playlist->single_data($id))
         {
             $output['title']   = $row->title;
             $output['id']      = $row->id;
             $output['playlist_img']      = $row->playlist_img;
             $output['alt']      = $row->alt;
             $output['pl_slug']      = $row->pl_slug;
             echo json_encode($output);
         }else{
             echo 'No data fond';
         }
     }
 
    //  // update
    public function update_playlist()
    {
         $title  = $this->input->post('title');
         $id  = $this->input->post('ctid');
         $slug = strtolower($this->input->post('pl_slug'));
         $data   = array(
            'title'=> $title,
            'alt'     => $this->input->post('imagetitle'),
            'pl_slug'=> str_replace(' ', '-',$slug)
        );
          // file upload check
          if($_FILES['img']['size'] != 0) {
                $files = $this->uploadFile();
                $data['playlist_img'] = $files['file'];
            }
           
  
         if($this->m_playlist->add($data, $id))
         {
             echo 'Successfully Updated';
         }else{
             echo 'Some error occured, Please try agin later';
         }
    }
    
    //load playlist article list
    public function playlistArticle($playlist_id='')
    {
       $data['title'] = 'Playlist-articles | Mahonnathi';
       $data['playlist_id']=$playlist_id;
       $this->load->view('pages/playlist-articles', $data, FALSE);
    }

    // fetch post 
    public function getPlaylistData($playlist_id='')
    {
       $_POST["draw"] = null;
       $fetch_data = $this->m_playlist->make_playlist_datatables($playlist_id);
       $data = array();  
       foreach($fetch_data as $row)  
       {  
           
           $sub_array = array();  
           $sub_array[] = '
               <a class="blue hoverable action-btn update-btn modal-trigger"  href="'.base_url('playlist-article/edit/').$row->id.'/'.$playlist_id.'" id="'.$row->id.'"><i class="fas fa-edit "></i></a>
               <a class="red hoverable delete-btn action-btn" id="'.$row->id.'"><i class="fas fa-trash  "></i></a>
               <a class="orange accent-3 hoverable detail action-btn" target="_blank" href="'.strtolower($this->config->item('web_url').str_replace(' ','-',$row->category).'/'.$row->slug).'"><i class="fas fa-eye  "></i></a>
           ';  
           //  $sub_array[] = $row->id;  
            // $sub_array[] =  (strlen($row->title) > 60) ? substr($row->title,0,57).'...' : $row->title; 
            $sub_array[] =   $row->title; 
            $sub_array[] = $row->category;  
            $sub_array[] = $row->playlist;  
            $sub_array[] = $row->tags; 
            $sub_array[] = date('d M, Y', strtotime($row->date)); 
            $sub_array[] = $row->posted_by;  
            $sub_array[] = date('d M, Y', strtotime($row->created_on));  

            $data[] = $sub_array;  
       }  
       $output = array(  
            "draw"                =>     intval($_POST["draw"]),  
            "recordsTotal"        =>     $this->m_playlist->get_playlist_all_data(),  
            "recordsFiltered"     =>     $this->m_playlist->get_playlist_filtered_data($playlist_id),  
            "data"                =>     $data  
       );  
       echo json_encode($output); 
    }

    // edit
    public function edit($id = null,$playlist_id=null)
    {
        if($this->input->post()){
         
            if(is_uploaded_file($_FILES['img']['tmp_name'])) {
                exit;
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
                    redirect('playlist-article/edit/'.$id,'refresh');
                    
                }else{
                    $this->session->set_flashdata('error', 'Some error occured, Please try agin later');
                    redirect('playlist-article/edit/'.$id);
                }
            }else{
                $this->session->set_flashdata('error', $files['error']);
                redirect('playlist-article/edit/'.$id);
            }
        }else{
            $data['post'] = $this->m_post->single_data($id);
            $data['playlist_id'] = $playlist_id;
            $data['category'] = $this->m_post->getCategory();
            $data['author']     = $this->m_post->getauthor();
            $data['playlist']   = $this->m_post->getPlaylist();
            $data['title'] = 'Edit';
            $this->load->view('pages/playlist-post-edit', $data, FALSE);
        }
    }

}