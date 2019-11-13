<?php

defined('BASEPATH') OR exit('No direct script access allowed');

    // protected $ci;
    
    
    if(!function_exists('categories')) {
        function categories() {
            $ci = get_instance();

            $ci->load->model('m_site');
            $category =  $ci->m_site->getCategory();
            return $category;
        }
    }

  

