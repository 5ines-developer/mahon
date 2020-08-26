<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Banner extends CI_Controller {

	/*--construct--*/
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('Mht') == '') {$this->session->set_flashdata('error', 'Please try again'); redirect('login'); }
        $this->load->model('m_banner');
        $this->db->cache_delete($this->router->fetch_class(), $this->router->fetch_method());
        $this->db->simple_query('SET NAMES \'utf-8\'');

        if ($this->session->userdata('Mht_type') =='2') {
            $this->load->library('preload');
            $this->preload->check_auth($this->session->userdata('Mht'));
        }
    }

    // get banner
    public function index()
    {
        $data['title'] = 'banner | Mahonnthi';
        $data['banner'] = $this->m_banner->getBanner();
        $this->load->view('pages/banner', $data, FALSE);
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
                redirect('banner');
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



        if($this->m_banner->updateBanner($data, $position)){
            $this->session->set_flashdata('success', 'Banner update successfully');
            redirect('banner');
        }else{
            $this->session->set_flashdata('error', 'Some error occured, Please try agin later');
            redirect('banner');
        }
    }

    function uploadImg()
    {
        $config = array(
            'upload_path' => "../banner_img/",
            'allowed_types' => "gif|jpg|png|jpeg|svg",
            'overwrite' => TRUE,
            'max_size' => "2048000", 
            'encrypt_name' => true
        );
        $this->load->library('upload', $config);
        if(!is_dir($config['upload_path'])) mkdir($config['upload_path'], 0777, TRUE);
        if($this->upload->do_upload('img'))
        {
            $filename = 'banner_img/'.$this->upload->data('file_name');
            $data = array('status'=> true, 'file' => $filename);
        }
        else
        {
            $data = array('status'=> false, 'file'=> '', 'error' => $this->upload->display_errors());

        }
        return $data;
    }

    // get single banner fetch
    public function get_single_banner()
    {
        $position = $this->input->post('position');
        $result = $this->m_banner->get_single_banner($position);
        echo json_encode($result);
    }


}