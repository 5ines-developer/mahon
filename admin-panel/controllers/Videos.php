<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Videos extends CI_Controller {

	/*--construct--*/
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('Mht') == '') {$this->session->set_flashdata('error', 'Please try again'); redirect('login'); }
        $this->load->model('m_videos');
    }

    // get videos
    public function index()
    {
        $data['title'] = 'Video article | Mahonnthi';
        $this->load->model('m_post');
        $data['category']   = $this->m_post->getCategory();
        $data['author']     = $this->m_post->getauthor();
        $this->load->view('video/list', $data, FALSE);
    }

    // Insert 
    public function insert()
    {
           



        
        echo "<pre>";
        print_r ($this->input->post());
        echo "</pre>";
        


        exit;
        // categoty 
        $related = $this->input->post('related', TRUE);
        $relatedItem = '';
        if(!empty($related)):
            foreach ($related as $key => $value):
                $relatedItem .= $value.' , ';
            endforeach;
        endif;
        
        $title  = $this->input->post('post');
        $id = $this->input->post('ctid', TRUE);
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
                'status'    => $postedBtn
            );

            $postResult = $this->m_post->addPost($data, $id);
            
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
                $this->m_post->addPageMeta($dataPage, $id);
                $this->m_post->addFbMeta($datafb, $id);
                $this->m_post->addTwitMeta($datatwit, $id);
            }
                
                
    }



}