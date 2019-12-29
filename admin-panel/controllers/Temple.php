<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Temple extends CI_Controller {

	/*--construct--*/
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('Mht') == '') {$this->session->set_flashdata('error', 'Please try again'); redirect('login'); }
        $this->load->model('m_temple');
    }

    // get temple
    public function index()
    {
        $data['title'] = 'temple | Mahonnthi';
        $data['temple'] = $this->m_temple->gettemple();
        $this->load->view('pages/temple', $data, FALSE);
    }

    // update temple
    public function update()
    {
        $type = $this->input->post('type');
        $position = $this->input->post('id');
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
                redirect('temple');
            }else{
                $data = array(
                    'type'      => $type,
                    'title'     => $title,
                    'link'       => $url,
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

        if($this->m_temple->updatetemple($data, $position)){
            $this->session->set_flashdata('success', 'temple update successfully');
            redirect('temple');
        }else{
            $this->session->set_flashdata('error', 'Some error occured, Please try agin later');
            redirect('temple');
        }
    }

    function uploadImg()
    {
        $config = array(
            'upload_path' => "../temple_img/",
            'allowed_types' => "gif|jpg|png|jpeg|svg",
            'overwrite' => TRUE,
            'max_size' => "2048000", 
            'encrypt_name' => true
        );
        $this->load->library('upload', $config);
        if(!is_dir($config['upload_path'])) mkdir($config['upload_path'], 0777, TRUE);
        if($this->upload->do_upload('img'))
        {
            $filename = 'temple_img/'.$this->upload->data('file_name');
            $data = array('status'=> true, 'file' => $filename);
        }
        else
        {
            $data = array('status'=> false, 'file'=> '', 'error' => $this->upload->display_errors());

        }
        return $data;
    }

    // get single temple fetch
    public function get_single_temple()
    {
        $position = $this->input->post('position');
        $result = $this->m_temple->get_single_temple($position);
        echo json_encode($result);
    }


}