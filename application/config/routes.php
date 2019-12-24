<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    

$route['default_controller']    = 'home/index';

$route['news/(:any)']           = 'result/index/$1';
$route['news/(:any)/(:any)']    = 'result/index/$1/$2';      // detail page
$route['topic/(:any)']          = 'search/index/$1';        // search 
$route['preview/(:any)']        = 'result/preview/$1';     // Preview 



// router database
require_once (BASEPATH .'database/DB.php');
$db =& DB();
$query = $db->get('mh_category');
$result = $query->result();
if(!empty($result)):
    foreach ($result as $key => $value):
        $title = strtolower(str_replace(' ', '-', $value->title));
        $route[$title]              = 'result/index';
        $route[$title.'/(:any)']    = 'result/index/$1';
    endforeach;
endif;




$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
