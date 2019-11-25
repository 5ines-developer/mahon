<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Urls
{
    protected $ci;

    public function __construct()
    {
        $this->ci =& get_instance();
    }

    public function urlFormat($preUrl = null)
    {
        return strtolower(str_replace(' ', '-', $preUrl));
    }

    public function urlDformat($preUrl = null)
    {
        return strtolower(str_replace('-', ' ', $preUrl));
    }

    

}

/* End of file Urls.php */
