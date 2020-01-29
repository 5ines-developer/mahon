<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    

$route['default_controller']    = 'home/index';

$route['news/(:any)']           = 'result/index/$1';
$route['news/(:any)/(:any)']    = 'result/index/$1/$2';      // detail page
$route['topic/(:any)']          = 'search/index/$1';        // search 
$route['preview/(:any)']        = 'result/preview/$1';     // Preview 
$route['videos/(:any)/(:any)']  = 'result/videos/$1/$2';
$route['photogallery/(:any)/(:any)'] = 'result/photogallery/$1/$2';     // Preview 


// router database
require_once (BASEPATH .'database/DB.php');
$db =& DB();
$query = $db->get('mh_category');
$result = $query->result();
if(!empty($result)):
    foreach ($result as $key => $value):

    		switch ($value->title) {
        case 'ಆಧ್ಯಾತ್ಮ':
            $ca1cat = 'spiritual'; 
            break;
        case 'ದೇಶ':
            $ca1cat = 'nation'; 
            break;
        case 'ವಿಜ್ಞಾನ':
            $ca1cat = 'science'; 
            break;
        case 'ಸಾಮಾನ್ಯ ಜ್ಞಾನ':
            $ca1cat = 'general-knowledge'; 
            break;
        case 'ಆರೋಗ್ಯ':
            $ca1cat = 'health'; 
            break;
        case 'ವಿಡಿಯೋ':
            $ca1cat = 'video'; 
            break;                              
        default:
            $ca1cat = 'video'; 
            break;
    }
        $title = strtolower(str_replace(' ', '-', $ca1cat));
        $route[$ca1cat]              = 'result/index';
        $route[$ca1cat.'/(:any)']    = 'result/index/$1';
    endforeach;
endif;




$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
