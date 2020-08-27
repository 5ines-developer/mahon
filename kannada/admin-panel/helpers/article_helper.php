<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    // protected $ci;
    
    
    if(!function_exists('viewsCount')) {
        function viewsCount($id='') {
            $ci =& get_instance();

            $ci->load->model('M_visitarticles');
            $count =  $ci->M_visitarticles->countViews($id);
            return $count;
        }
    }
    if(!function_exists('allViewsCount')) {
        function allViewsCount() {
            $ci =& get_instance();

            $ci->load->model('M_visitarticles');
            $count =  $ci->M_visitarticles->allCountViews();
            return $count;
        }
    }

   


/* End of file LibraryName.php */
