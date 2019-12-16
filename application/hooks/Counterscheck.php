<?php defined('BASEPATH') or exit('No direct script allowed');

class Counterscheck
{
    protected $ci;

    public function __construct()
    {
        $ci =& get_instance();
        $ci->load->model('M_site');
    }

    function webCount()
    {
        $ci =& get_instance();
        $ip = $ci->input->ip_address();
        $ci->M_site->WebCounters($ip);
    }
}



/* End of file LibraryName.php */
