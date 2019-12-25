<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Author extends CI_Controller {

	/*--construct--*/
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('Mht') == '') {$this->session->set_flashdata('error', 'Please try again'); redirect('login'); }
        $this->load->model('m_author');
    }

    public function index(Type $var = null)
    {
        $data['title'] = 'Authors';
        $this->load->model('m_post');
        $data['category']   = $this->m_post->getCategory();
        $this->load->view('pages/author', $data, FALSE); 
    }

        // fetch category 
        public function getData($var = null)
        {
            $fetch_data = $this->m_author->make_datatables();
            $data = array();  
            foreach($fetch_data as $key => $row)  
            {  
                 $sub_array = array();  
                 $sub_array[] = $key + 1;  
                 $sub_array[] = '<div class="valign-wrapper progiletable center-align" ><img class="responsive-img " src="'.$this->config->item('web_url').$row->profile.'" /> </div>' ;
                 $sub_array[] = $row->name;  
                 $sub_array[] = $row->email; 
                 $sub_array[] = $row->phone; 
                 $sub_array[] = ($row->status == 1) ? '<a status="'.$row->status.'" class="green hoverable blocker   action-btn" id="'.$row->id.'"><i class="fas fa-check  "></i> block</a>' : '<a status="'.$row->status.'" class="red hoverable blocker  action-btn" id="'.$row->id.'"><i class="fas fa-ban  "></i> unblock</a>'; 
                 $sub_array[] = '
                     <a class="blue hoverable action-btn update-btn  modal-trigger" id="'.$row->id.'" href="#modal1"><i class="fas fa-edit "></i></a>
                     <a class="red hoverable delete-btn action-btn" id="'.$row->id.'"><i class="fas fa-trash  "></i></a>
                 ';  
                 $data[] = $sub_array;  
            }  
            $output = array(  
                 "draw"                =>     intval($_POST["draw"]),  
                 "recordsTotal"        =>     $this->m_author->get_all_data(),  
                 "recordsFiltered"     =>     $this->m_author->get_filtered_data(),  
                 "data"                =>     $data  
            );  
            echo json_encode($output); 
        }

      
    
        //  add category
        public function add_author()
        {
            
                if($_FILES['img']['size'] != 0) {
                    $file   =      $this->uploadImg();
                }else{
                    $file = array('status'=> true, 'file' => $this->input->post('filepath', TRUE));
                }

                if($file['status'] == false){
                    $this->session->set_flashdata('error', $file['error']);
                    redirect('author');
                }
                else{                
                    $title  = $this->input->post('name');
                    $email  = $this->input->post('email');
                    $phone  = $this->input->post('phone');
                    $about  = $this->input->post('about');
                    $permission = implode(",",$this->input->post('category'));
                    $id  = $this->input->post('ctid');
                    $data   = array(
                        'name'      => $title,
                        'email'     => $email,
                        'phone'     => $phone,
                        'des'       => $about,
                        'c_permission' => $permission,
                        'profile'   => $file['file'],
                        'update_by' => $this->session->userdata('Mht'),
                        'update_on' => date('Y-m-d H:i:s')
                    );
                    if($this->m_author->add_author($data, $id))
                    {
                        echo 'Changes done successfully';
                    }else{
                        echo 'Some error occured, Please try agin later';
                    }
                }
            
            
        }


        function uploadImg()
        {
            $config = array(
                'upload_path' => "../author-profile/",
                'allowed_types' => "gif|jpg|png|jpeg|svg",
                'overwrite' => TRUE,
                'max_size' => "2048000", 
                'encrypt_name' => true
            );
            $this->load->library('upload', $config);
            if(!is_dir($config['upload_path'])) mkdir($config['upload_path'], 0777, TRUE);
            if($this->upload->do_upload('img'))
            {
                $filename = 'author-profile/'.$this->upload->data('file_name');
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
            if($this->m_author->delete($id))
            {
                echo 'Category deleted successfully';
            }else{
                echo 'Some error occured, Please try agin later';
            }
        }
    
        // single data
        public function single_data()
        {
            $id  = $this->input->post('id');
            if($row = $this->m_author->single_data($id))
            {
             
                $output['name']     = $row->name;
                $output['email']    = $row->email;
                $output['id']       = $row->id;
                $output['phone']    = $row->phone;
                $output['abt']      = $row->des;
                $output['profile']  = $row->profile;
                $output['permission']  = explode(',', $row->c_permission);
                echo json_encode($output);
            }else{
                echo 'No data fond';
            }
        }
    
        // update
        public function update_author()
        {
            $title  = $this->input->post('category');
            $id  = $this->input->post('ctid');
            $data   = array('title' => $title);
            if($this->m_author->add_category($data, $id))
            {
                echo 'Category update successfully';
            }else{
                echo 'Some error occured, Please try agin later';
            }
        }



        public function block_unblock()
        {
            $id = $this->input->post('id');
            if($id == 1){
                $msg = 'Successfully blocked';
            }else{
                $msg = 'Successfully Unblocked';

            }
            $status = $this->input->post('status');
            if($this->m_author->block_unblock($id, $status)){
                echo $msg ;
            }else{
                echo $msg;
            }
        }


}