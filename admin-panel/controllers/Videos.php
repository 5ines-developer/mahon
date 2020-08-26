<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Videos extends CI_Controller {

	/*--construct--*/
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('Mht') == '') {$this->session->set_flashdata('error', 'Please try again'); redirect('login'); }
        $this->load->model('m_videos');

        if ($this->session->userdata('Mht_type') =='2') {
            $this->load->library('preload');
            $this->preload->check_auth($this->session->userdata('Mht'));
        }
    }

    // get videos
    public function index()
    {
        $data['title'] = 'Video article | Mahonnthi';
        $uri =  $this->uri->segment(2);
        $this->load->model('m_videos');
        $data['category']   = $this->m_videos->getCategory();
        $data['author']     = $this->m_videos->getauthor();
        $data['video']      = $this->m_videos->getVideos($uri);
        $this->load->view('video/list', $data, FALSE);
    }

    // Insert 
    public function insert()
    {
        $id = $this->input->post('ctid', TRUE);
        
            if($_FILES['img']['size'] != 0) {
                if(empty($id)){
                    $thumbnail = $this->uploadFile();
                }
                else{
                    $thumbnail = array('status'=> true, 'file' => $this->input->post('filepath', TRUE));
                }
            }else{
                $thumbnail['file'] = $this->makeThumb();
            }
            // file upload check
           
        // categoty 
        $related = $this->input->post('related', TRUE);
        $relatedItem = '';
        if(!empty($related)):
            foreach ($related as $key => $value):
                $relatedItem .= $value.' , ';
            endforeach;
        endif;
        
        $title  = $this->input->post('post');
        
        if(!empty($this->input->post('slug', TRUE))){
            $slug = $this->input->post('slug', TRUE);
        }else{
            $slug =  str_replace(' ', '-',$this->input->post('title', TRUE));
        }
        // assign to array        
        $schedule = $this->input->post('time').' '. $this->input->post('scheduledate');
        $schedule = date('Y-m-d H:i:s', strtotime($schedule));
            
            $data = array(
                'title'     => $this->input->post('title', TRUE),
                'category'  => $this->input->post('category', TRUE),
                'posted_by' => $this->input->post('posted_by', TRUE),
                'date'      => date('Y-m-d', strtotime($this->input->post('date'))),
                'slug'      => $slug,
                'tags'      => $this->input->post('tags', TRUE),
                'content'   => $this->input->post('description', TRUE),
                'update_on' => date('Y-m-d H:i:s'),
                'scategory' => $this->input->post('scategory', TRUE),
                'realted'   => $relatedItem,
                'schedule'  => $schedule,
                'type'      => $this->input->post('social'),
                'url'       => $this->input->post('url'),
                'tumb'      => $thumbnail['file'],
                'vtype'     => $this->input->post('vtype')
            );

            $postResult = $this->m_videos->addPost($data, $id);
            
            if(!empty($id)){
                $msg = 'Update successfully.';
                $postid = $id;
            }else{
                $msg = 'Video Article successfully submited.';
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
                $this->m_videos->addPageMeta($dataPage, $id);
                $this->m_videos->addFbMeta($datafb, $id);
                $this->m_videos->addTwitMeta($datatwit, $id);
                $this->session->set_flashdata('success', 'Video article Created');
                redirect('video-article','refresh');
                
            }else{
                $this->session->set_flashdata('error', 'upload error occurred');
                redirect('video-article','refresh');
            }
                
                
    }

    // make a thumbnail
    public function makeThumb()
    {
        $type = $this->input->post('social');
        $url = $this->input->post('url');
        if($type == 'youtube'){
            return  $thumbnail = 'https://img.youtube.com/vi/'.explode('=',parse_url($url)['query'])[1].'/0.jpg';
            
        }
      
        elseif($type == 'vimeo'){
            $videoId = explode('/',parse_url($url)['path'])[1];
            $hash = unserialize(file_get_contents("http://vimeo.com/api/v2/video/$videoId.php"));
            return  $hash[0]['thumbnail_large'];
        }
        
    }

    function uploadFile()
    {
        $config = array(
            'upload_path' => "../video_tumb/",
            'allowed_types' => "gif|jpg|png|jpeg|svg",
            'overwrite' => TRUE,
            'max_size' => "2048000", 
            'encrypt_name' => true
        );
        $this->load->library('upload', $config);
        if(!is_dir($config['upload_path'])) mkdir($config['upload_path'], 0777, TRUE);
        if($this->upload->do_upload('img'))
        {
            $filename = $this->config->item('web_url').'video_tumb/'.$this->upload->data('file_name');
            $data = array('status'=> true, 'file' => $filename);
        }
        else
        {
            $data = array('status'=> false, 'file'=> '', 'error' => $this->upload->display_errors());

        }
        return $data;
    }

    public function delete($id = null)
    {
        if($this->m_videos->moveToTrash($id)){
            $this->session->set_flashdata('success', 'Video successfully move to trash');
            redirect('video-article','refresh');
        }else{
            $this->session->set_flashdata('error', 'Some error occurred. Please try agin later');
            redirect('video-article','refresh');
        }
    }

    

}