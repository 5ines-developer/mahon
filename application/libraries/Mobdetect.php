<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Mobdetect
{
	protected $ci;
	public function __construct()
    {
        $this->ci =& get_instance();
    }

    public function detect($var = null)
    {
        // Include and instantiate the class.
        require_once APPPATH.'third_party/Mobile_Detect.php';
        $detect = new Mobile_Detect;

        // Any mobile device (phones or tablets).
        if ($detect->isMobile() ) {
         return 'mobile';
        }

        // Any tablet device.
        if($detect->isTablet() ){
         return 'tablet';
        }

        // Exclude tablets.
        if(!$detect->isMobile() && !$detect->isTablet() ){
            return 'desktop';
        }
    }
}