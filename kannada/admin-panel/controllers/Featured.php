<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Featured extends CI_Controller {

	/*--construct--*/
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('Mht') == '') {$this->session->set_flashdata('error', 'Please try again'); redirect('login'); }
        $this->load->model('m_featured');
    }

    public function index()
    {
        $data['title'] = 'Todays Fetured';
        $data['post'] = $this->m_featured->getFetures();
      
        
        $this->load->view('pages/today-featured', $data, FALSE);
        
    }

    // update banner
    public function update()
    {
        $type = $this->input->post('type');
        $position = $this->input->post('postion');
        if($type == 'article'){
            $url = $this->input->post('arurl');
            $data = array(
                'link'       => $url, 
                'type'      => $type,
                'update_by' => $this->session->userdata('Mht'),
                'update_on' => date('Y-m-d H:i:s')
            );
        }
        elseif ($type == 'custom') {

            $title  =   $this->input->post('ctitle');
            $url    =   $this->input->post('curl');
            if($_FILES['img']['size'] != 0) {
                $file   =      $this->uploadImg();
            }else{
                $file = array('status'=> true, 'file' => $this->input->post('filepath', TRUE));
            }
            
            if($file['status'] == false){
                $this->session->set_flashdata('error', $file['error']);
                redirect('todays-featured');
            }else{
                $data = array(
                    'type'      => $type,
                    'title'     => $title,
                    'link'      => $url,
                    'img'       => $file['file'],
                    'update_by' => $this->session->userdata('Mht'),
                    'update_on' => date('Y-m-d H:i:s')
                );
            }
        }
        else{
            $data = array(
                'type'      => $type,
                'update_by' => $this->session->userdata('Mht'),
                'update_on' => date('Y-m-d H:i:s')
            );
        }

        if($this->m_featured->updateArticle($data, $position)){
            $this->session->set_flashdata('success', 'update successfully');
            redirect('todays-featured');
        }else{
            $this->session->set_flashdata('error', 'Some error occured, Please try agin later');
            redirect('todays-featured');
        }
    }

    function uploadImg()
    {
        $config = array(
            'upload_path' => "../todays-featured-img/",
            'allowed_types' => "gif|jpg|png|jpeg|svg",
            'overwrite' => TRUE,
            'max_size' => "2048000", 
            'encrypt_name' => true
        );
        $this->load->library('upload', $config);
        if(!is_dir($config['upload_path'])) mkdir($config['upload_path'], 0777, TRUE);
        if($this->upload->do_upload('img'))
        {
            $filename = 'todays-featured-img/'.$this->upload->data('file_name');
            $data = array('status'=> true, 'file' => $filename);
        }
        else
        {
            $data = array('status'=> false, 'file'=> '', 'error' => $this->upload->display_errors());

        }
        return $data;
    }

    // get single banner fetch
    public function get_single_afticle()
    {
        $position = $this->input->post('position');
        $result = $this->m_featured->get_single_afticle($position);
        echo json_encode($result);
    }


    
}