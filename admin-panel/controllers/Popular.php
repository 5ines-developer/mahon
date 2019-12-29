<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Popular extends CI_Controller {

	/*--construct--*/
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('Mht') == '') {$this->session->set_flashdata('error', 'Please try again'); redirect('login'); }
        $this->load->model('m_popular');
    }

    // get popular
    public function index()
    {
        $data['title'] = 'popular | Mahonnthi';
        $data['popular'] = $this->m_popular->getpopular();
        $this->load->view('pages/popular', $data, FALSE);
    }

    // update popular
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
                redirect('popular');
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

        if($this->m_popular->updatepopular($data, $position)){
            $this->session->set_flashdata('success', 'popular update successfully');
            redirect('popular');
        }else{
            $this->session->set_flashdata('error', 'Some error occured, Please try agin later');
            redirect('popular');
        }
    }

    function uploadImg()
    {
        $config = array(
            'upload_path' => "../popular_img/",
            'allowed_types' => "gif|jpg|png|jpeg|svg",
            'overwrite' => TRUE,
            'max_size' => "2048000", 
            'encrypt_name' => true
        );
        $this->load->library('upload', $config);
        if(!is_dir($config['upload_path'])) mkdir($config['upload_path'], 0777, TRUE);
        if($this->upload->do_upload('img'))
        {
            $filename = 'popular_img/'.$this->upload->data('file_name');
            $data = array('status'=> true, 'file' => $filename);
        }
        else
        {
            $data = array('status'=> false, 'file'=> '', 'error' => $this->upload->display_errors());

        }
        return $data;
    }

    // get single popular fetch
    public function get_single_popular()
    {
        $position = $this->input->post('position');
        $result = $this->m_popular->get_single_popular($position);
        echo json_encode($result);
    }


}