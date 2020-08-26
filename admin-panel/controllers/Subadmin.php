<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subadmin extends CI_Controller {

	/*--construct--*/
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_subadmin');
        $this->load->library('bcrypt');
    }


    public function index(Type $var = null)
    {
        if ($this->session->userdata('Mht_type') !='1') { redirect('/'); }
        $data['title'] = 'Subadmin';
        $this->load->model('m_post');
        $data['result']   = $this->m_subadmin->getsub();
        $this->load->view('subadmin/list', $data, FALSE); 
    }

    //  add category
    public function add()
    {
        if ($this->session->userdata('Mht_type') !='1') { redirect('/'); }
    	if(!empty($this->input->post())){
    		$this->form_validation->set_rules('name', 'Name', 'trim|required|is_unique[admin.name]');
    		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[admin.email]');
    		$this->form_validation->set_rules('phone', 'Phone', 'trim|required|min_length[10]|max_length[10]|is_unique[admin.phone]');

    		if ($this->form_validation->run() == FALSE) {
	            $this->form_validation->set_error_delimiters('', '<br>');
            	$this->session->set_flashdata('error', str_replace(array("\n", "\r"), '', validation_errors()));
	            redirect('subadmin/add','refresh');
    		} else {
    			$title  = $this->input->post('name');
		        $email  = $this->input->post('email');
		        $phone  = $this->input->post('phone');
		        $uniq  	= $this->input->post('uniq');
		        $data   = array(
		            'name'      => $title,
		            'email'     => $email,
		            'phone'     => $phone,
		            'updated_date' => date('Y-m-d H:i:s'),
		            'reference_d' => $uniq,
		            'admin_type'	=> 2,
		        );
		        if($this->m_subadmin->add($data))
		        {
		        	$this->sendActivation($data);
		        	$this->session->set_flashdata('success', 'Sub Admin added successfully');
		            redirect('subadmin','refresh');
		        }else{
		            $this->session->set_flashdata('error', 'Some error occured, Please try agin later');
		            redirect('subadmin/add','refresh');
		        }
    		}	        
    	}else{
    		$data['title'] ='Subadmin';
    		$this->load->view('subadmin/add', $data, FALSE);
    	}
    }

     public function sendActivation($insert = null)
    {
        $data['email'] = $insert['email'];
        $data['regid'] = $insert['reference_d'];
        $data['name'] = $insert['name'];
        $this->load->config('email');
        $this->load->library('email');
        $from = $this->config->item('smtp_user');
        $msg = $this->load->view('email/adminuser', $data, true);
        $this->email->set_newline("\r\n");
        $this->email->from($from , 'Mahonnathi');
        $this->email->to($data['email']);
        $this->email->subject('Subadmin Activation'); 
        $this->email->message($msg);
        if($this->email->send())  
        {
            return true;
        } 
        else
        {
            return false;
        }
    }

    public function edit($id='')
    {
        if ($this->session->userdata('Mht_type') !='1') { redirect('/'); }
    	if(!empty($this->input->post())){
    		$id  	= $this->input->post('id');

    		$this->form_validation->set_rules('name', 'Name', 'trim|required');
    		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
    		$this->form_validation->set_rules('phone', 'Phone', 'trim|required|min_length[10]|max_length[10]');

    		if ($this->form_validation->run() == FALSE) {
	            $this->form_validation->set_error_delimiters('', '<br>');
            	$this->session->set_flashdata('error', str_replace(array("\n", "\r"), '', validation_errors()));
	            redirect('subadmin/edit/'.$id,'refresh');
    		} else {
    			$title  = $this->input->post('name');
		        $email  = $this->input->post('email');
		        $phone  = $this->input->post('phone');
		        $data   = array(
		            'name'      => $title,
		            'email'     => $email,
		            'phone'     => $phone,
		            'updated_date' => date('Y-m-d H:i:s'),
		        );
		        if($this->m_subadmin->update($data,$id))
		        {
		        	$this->session->set_flashdata('success', 'Sub Admin added successfully');
		           	redirect('subadmin/edit/'.$id,'refresh');
		        }else{
		            $this->session->set_flashdata('error', 'Some error occured, Please try agin later');
		            redirect('subadmin/edit/'.$id,'refresh');
		        }
    		}	        
    	}else{
    		$data['title'] ='Subadmin';
    		$data['result'] = $this->m_subadmin->edit($id);
    		$this->load->view('subadmin/edit', $data, FALSE);
    	}
    }


    public function delete($id='')
    {
        if ($this->session->userdata('Mht_type') !='1') { redirect('/'); }
    	if($this->m_subadmin->delete($id))
		{
			$this->session->set_flashdata('success', 'Sub Admin added successfully');
		}else{
		    $this->session->set_flashdata('error', 'Some error occured, Please try agin later');
		}
		redirect('subadmin','refresh');
    }


    public function activate($id='')
    {
    	$data['id'] = $id;
    	$this->load->view('subadmin/set-pass', $data, FALSE);
    }

    public function setPass($value='')
    {
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]');
		$this->form_validation->set_rules('cpassword', 'Confirm Password', 'trim|required|min_length[5]');
    	
    	if ($this->form_validation->run() == FALSE) {
	        $this->form_validation->set_error_delimiters('', '<br>');
           	$this->session->set_flashdata('error', str_replace(array("\n", "\r"), '', validation_errors()));
	        redirect('account-activation/'.$id,'refresh');
    	}else {
    		$id  		= $this->input->post('id');
			$password  	= $this->input->post('password');
			$newpass 	= $this->bcrypt->hash_password($password);

			if($this->m_subadmin->setPass($id,$newpass))
			{
				$this->session->set_flashdata('success', 'Password Updated successfully<br> you can login with new password');
				redirect('/','refresh');
			}else{
			    $this->session->set_flashdata('error', 'Some error occured, Please try agin later');
				redirect('account-activation/'.$id,'refresh');
			}
    	}
    }

    public function block($id='')
    {
        $status = "2";
        if($this->m_subadmin->staschange($id,$status))
        {
            $this->session->set_flashdata('success', 'Sub Admin blocked successfully');
        }else{
            $this->session->set_flashdata('error', 'Some error occured, Please try agin later');
        }
        redirect('subadmin','refresh');
    }

    public function unblock($id='')
    {
        $status = "1";
        if($this->m_subadmin->staschange($id,$status))
        {
            $this->session->set_flashdata('success', 'Sub Admin Unblocked successfully');
        }else{
            $this->session->set_flashdata('error', 'Some error occured, Please try agin later');
        }
        redirect('subadmin','refresh');
    }

}

/* End of file Subadmin.php */
/* Location: .//C/xampp/htdocs/mahonnathi/admin-panel/controllers/Subadmin.php */