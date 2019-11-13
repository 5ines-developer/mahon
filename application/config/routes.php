<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'home/index';










$route['news/(:any)']           = 'result/index/$1';
$route['news/(:any)/(:any)']    = 'result/index/$1/$2';
// $route['category/(:any)']       = 'result/category/$1';
// $route['(:any)/(:any)/(:any)/(:any)'] = 'result/$1/$2/$3/$4';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
