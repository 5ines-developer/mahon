<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Photos extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('Mht') == '') {$this->session->set_flashdata('error', 'Please try again'); redirect('login'); }
        $this->load->model('m_photo');

        if ($this->session->userdata('Mht_type') =='2') {
            $this->load->library('preload');
            $this->preload->check_auth($this->session->userdata('Mht'));
        }
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


       $id = $this->input->post('ctid');
        $data = array(
            'title'         =>  $this->input->post('title'),
            'slug'          => $this->input->post('slug'),
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
            $slug = $data['slug'];
           
        }else{
                $msg = 'Post successfully submited.';
                $postid = $postResult['id'];
                $slug = $postResult['slug'];
               
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
                $this->uploadImage($_FILES['img'], $postid,$slug);
            }


            $this->session->set_flashdata('success', 'Gallery Added successfully');
        }else{
            $this->session->set_flashdata('error', 'please try again');
        }
        redirect('photos','refresh');
    }

    function uploadImage($images, $postid,$slug)
    {
        $files = array();
        $files = $_FILES;
        $title = $this->input->post('imagetitle');
        $filesCount = count($title);
        $uniq = $this->input->post('uniq');
        $edit = $this->input->post('edit');

        
        if (!empty($filesCount)) {
            // $this->db->where('photo_id', $postid);
            // $this->db->delete('mh_photo_gallery');
            for ($i = 0; $i < $filesCount; $i++) {

                if(!empty($title[$i])){
                        $tit = $title[$i];
                    }else{
                        $tit = '';
                    }
                $data = array('title'=> $tit, 'photo_id' => $postid);
                if (!empty($uniq[$i])) {
                    $data['uniq'] = $uniq[$i];
                }else{
                    $data['uniq'] = random_string('alnum',10);;
                }
                if (!empty($_FILES['img']['name'][$i])) {
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
                    
                    $image_url= $slug.'-image-'.($i+1);

                    $data['image'] = $filename;
                    $data['image_url'] = $image_url;
                }

                if (!empty($edit)) {
                    if (!empty($uniq[$i]) || !empty($filename)) {
                        $this->m_photo->addImages($data);
                    }
                }else{
                    $this->m_photo->addImages($data);
                }
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
        $id = $this->input->post('id');
        $result = $this->m_photo->single_gall($id);
        echo json_encode($result);
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


    public function album($value='')
    {
        $data['title'] = 'Photo Album | Mahonnathi';
        $this->load->model('m_videos');
        $data['category']   = $this->m_videos->getCategory();
        $data['author']     = $this->m_videos->getauthor(); 
        $data['gallery']    = $this->m_photo->getAlbum();
        $this->load->view('pages/photo-album', $data, FALSE);
    }

    public function addAlbum($value='')
    {
        $id = '';
        $data = array(
            'title'         =>  $this->input->post('title'),
            'slug'          =>  $this->input->post('slug'),
            'author'        =>  $this->input->post('posted_by'),
            'date'          =>  date('Y-m-d',strtotime($this->input->post('date'))),
            'tags'          =>  $this->input->post('tags'),
            'uploaded_by'   =>  $this->session->userdata('Mht'),
            'uploaded_on'   =>date('Y-m-d H:i:s'),
        );
        $this->load->library('upload');
        $this->load->library('image_lib');
        $files = $_FILES;
        if (file_exists($_FILES['img']['tmp_name'])) {
            $config['upload_path'] = '../photo_album/';
            $config['allowed_types'] = 'jpg|png|jpeg|gif|svg';
            $config['max_size'] = '2048';
            $config['max_width'] = 0;
            $config['encrypt_name'] = true;
            $this->load->library('upload');
            $this->upload->initialize($config);
            if (!is_dir($config['upload_path'])) {mkdir($config['upload_path'], 0777, true); }
            if (!$this->upload->do_upload('img')) {
                $error = array('error' => $this->upload->display_errors());
                // print_r($error);exit();
                $this->session->set_flashdata('error', $this->upload->display_errors());
                redirect('photo-album');
            } else {
                $upload_data = $this->upload->data();
                $file_name = $upload_data['file_name'];
                $data['f_image'] = $this->config->item('web_url').'photo_album/'.$file_name;
            }
        }
        $postid = $this->m_photo->insertAlbum($data);
        $this->albumImages($postid);

        if(!empty($postid)){
            $this->session->set_flashdata('success', 'Photo Album Added successfully');
        }else{
            $this->session->set_flashdata('error', 'please try again');
        }
        redirect('photo-album','refresh');
        

    }

    function albumImages($postid)
    {
        $files = array();
        $files = $_FILES;
        $filesCount = sizeof($_FILES['images']['name']);
        
        if (!empty($_FILES['images']['name'][0])) 
        {
            for ($i = 0; $i < $filesCount; $i++) {
                $_FILES['images']['name']     = $files['images']['name'][$i];
                $_FILES['images']['type']     = $files['images']['type'][$i];
                $_FILES['images']['tmp_name'] = $files['images']['tmp_name'][$i];
                $_FILES['images']['error']    = $files['images']['error'][$i];
                $_FILES['images']['size']     = $files['images']['size'][$i];
                $config = array(
                    'upload_path' => "../photo_album/",
                    'allowed_types' => "gif|jpg|png|jpeg|svg",
                    'overwrite' => TRUE,
                    'max_size' => "2048000", 
                    'encrypt_name' => true
                );
                $this->load->library('upload', $config);
                if(!is_dir($config['upload_path'])) mkdir($config['upload_path'], 0777, TRUE);
                $this->upload->do_upload('images');
                $filename = $this->config->item('web_url').'photo_album/'.$this->upload->data('file_name');
                $data = array('uniq'=> random_string('alnum',20), 'image' => $filename, 'post_id' => $postid);
                $this->m_photo->albumImages($data);
            }
        }
        return true;
    }

        // Delete 
    public function albumDelete($id = null)
    {
        if($this->m_photo->albumDelete($id)){
            $this->session->set_flashdata('success', 'Photo Albums deleted successfully');
        }else{
            $this->session->set_flashdata('error', 'please try again');
        }
        redirect('photo-album','refresh');
    }

    
}

/* End of file Photos.php */
