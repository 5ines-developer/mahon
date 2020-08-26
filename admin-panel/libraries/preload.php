<?php





defined('BASEPATH') OR exit('No direct script access allowed');



class preload
{

    protected $ci;
    public function __construct()
    {
        $this->ci =& get_instance();
        $this->ci->load->model('m_authentication');
    } 

    public function check_auth($id = null)
    {
    	$output = $this->ci->m_authentication->checkLogin($id);
	    	if (empty($output)) {
	        	$session_data = array(
	            'Mht'      => $this->ci->session->userdata('Mht'),
	            'Mht_name' => $this->ci->session->userdata('Mht_name'),
	            'Mht_type' => $this->ci->session->userdata('Mht_type'),
	        );
        	$this->ci->session->unset_userdata($session_data);
        	$this->ci->session->sess_destroy();
        	$this->ci->session->set_flashdata('error', 'you are no longer able to access your account,<br>Your account has been blocked by admin');
        	redirect('/');
    	}else{
    		return true;
    	}
    }

}
/* End of file LibraryName.php */

