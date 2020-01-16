<?php defined('BASEPATH') or exit('No direct script allowed');

class Counterscheck
{
    protected $ci;

    public function __construct()
    {
        $ci =& get_instance();
    }

    function webCount()
    {
        $ci =& get_instance();
        echo $ci->input->ip_address();
    }
}





/* End of file LibraryName.php */
