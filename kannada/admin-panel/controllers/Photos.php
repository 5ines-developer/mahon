<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Photos extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('Mht') == '') {$this->session->set_flashdata('error', 'Please try again'); redirect('login'); }
        $this->load->model('m_photo');
    }

    public function index()
    {
        $data['title'] = 'Photos | Mahonnathi';
        $this->load->model('m_videos');
        $data['category']   = $this->m_videos->getCategory();
        $data['author']     = $this->m_videos->getauthor();
        $data['gallery']    = $this->m_photo->getImage();
        $this->load->view('pages/photo', $data, FALSE);
    }

    // add Image gallery
    public function add()
    {
       $id = '';
        
        
        $data = array(
            'title'         =>  $this->input->post('title'),
            'slug'          =>  $this->input->post('slug'),
            'author'        =>  $this->input->post('posted_by'),
            'date'          =>  date('Y-m-d',strtotime($this->input->post('date'))),
            'tags'          =>  $this->input->post('tags'),
            'category'      =>  $this->input->post('category'),
            'subcategory'   =>  $this->input->post('scategory'),
            'schedule'      =>  date('Y-m-d H:i:s',strtotime($this->input->post('scheduledate').' '.$this->input->post('time'))),
            'uploaded_by'   =>  $this->session->userdata('Mht'),
            'creaderby'     =>  $this->session->userdata('Mht'),
            'uploaded_on'   =>date('Y-m-d H:i:s'),
            
        );

        $postResult = $this->m_photo->addPost($data, $id);
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
                $this->m_photo->addPageMeta($dataPage, $id);
                $this->m_photo->addFbMeta($datafb, $id);
                $this->m_photo->addTwitMeta($datatwit, $id);

            if(isset($_FILES['img'])){
                $this->uploadImage($_FILES['img'], $postid);
            }

            $this->session->set_flashdata('success', 'Gallery Added successfully');
        }else{
            $this->session->set_flashdata('error', 'please try again');
        }
        redirect('photos','refresh');
    }

    function uploadImage($images, $postid)
    {
        $files = array();
        $files = $_FILES;
        $title = $this->input->post('imagetitle');
        $filesCount = count($_FILES['img']['name']);

        if (!empty($filesCount)) {
            for ($i = 0; $i < $filesCount; $i++) {
                $_FILES['img']['name']     = $files['img']['name'][$i];
                $_FILES['img']['type']     = $files['img']['type'][$i];
                $_FILES['img']['tmp_name'] = $files['img']['tmp_name'][$i];
                $_FILES['img']['error']    = $files['img']['error'][$i];
                $_FILES['img']['size']     = $files['img']['size'][$i];
                $config = array(
                    'upload_path' => "../photo_gall/",
                    'allowed_types' => "gif|jpg|png|jpeg|svg",
                    'overwrite' => TRUE,
                    'max_size' => "2048000", 
                    'encrypt_name' => true
                );
                $this->load->library('upload', $config);
                if(!is_dir($config['upload_path'])) mkdir($config['upload_path'], 0777, TRUE);
                $this->upload->do_upload('img');
                $filename = $this->config->item('web_url').'photo_gall/'.$this->upload->data('file_name');
                if(!empty($title[$i])){
                    $tit = $title[$i];
                }else{
                    $tit = '';
                }
                $data = array('title'=> $tit, 'image' => $filename, 'photo_id' => $postid);
                $this->m_photo->addImages($data);

            }
        }


        // foreach ($images['name'] as $key => $image) {
        //     if(!empty($image)){
                
        //         $_FILES['img[]']['name']= $images['name'][$key];
        //         $_FILES['img[]']['type']= $images['type'][$key];
        //         $_FILES['img[]']['tmp_name']= $images['tmp_name'][$key];
        //         $_FILES['img[]']['error']= $images['error'][$key];
        //         $_FILES['img[]']['size']= $images['size'][$key];
    
        //         $fileName = $image;
    
        //         $images[] = $fileName;
    
        //         $config['file_name'] = $fileName;
    
        //         $this->upload->initialize($config);
    
        //         if ($this->upload->do_upload('img[]')) {
        //             $filename = $this->config->item('web_url').'photo_gall/'.$this->upload->data('file_name');
        //             // array_push($files, $filename);
        //             if(!empty($title[$key])){
        //                 $tit = $title[$key];
        //             }else{
        //                 $tit = '';
        //             }
        //             $data = array('title'=> $tit, 'image' => $filename, 'photo_id' => $postid);
        //             $this->m_photo->addImages($data);
        //         } else {
        //             return false;
        //         }
        //     }
        // }
     
    }

    // single gallery

    public function single_gall($id = null)
    {
        $this->m_photo->single_gall($id);
    }

    // Delete 
    public function delete($id = null)
    {
        if($this->m_photo->delete($id)){
            $this->session->set_flashdata('success', 'Photos deleted successfully');
        }else{
            $this->session->set_flashdata('error', 'please try again');
        }
        redirect('photos','refresh');
    }
}

/* End of file Photos.php */
