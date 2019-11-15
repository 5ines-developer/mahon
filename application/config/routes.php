<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'home/index';

$route['news/(:any)']           = 'result/index/$1';
$route['news/(:any)/(:any)']    = 'result/index/$1/$2'; // detail page
$route['topic/(:any)']          = 'search/index/$1';   // search 


$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
