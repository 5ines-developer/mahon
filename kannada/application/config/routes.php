<?php

defined('BASEPATH') OR exit('No direct script access allowed');



    



$route['default_controller']    = 'home/index';



$route['news/(:any)']           = 'result/index/$1';

$route['news/(:any)/(:any)']    = 'result/index/$1/$2';      // detail page

$route['topic/(:any)']          = 'search/index/$1';        // search 

$route['preview/(:any)']        = 'result/preview/$1';     // Preview 

$route['videos/(:any)/(:any)']  = 'result/videos/$1/$2';

$route['photogallery/(:any)/(:any)'] = 'result/photogallery/$1/$2';     // Preview 



$route['photo-gallery']    = 'result/pgallery';

$route['photo-album/(:any)']  	= 'result/photoAlbum/$1';//photo album



$route['contact-us']    		= 'home/contact';

$route['contact-submit']    	= 'home/contactSubmit';

$route['corona-updates-in-india']    	= 'home/widget';


$route['playlist']  = 'playlist/index';
$route['playlist/(:any)']  = 'playlist/index/$1';
$route['playlist/(:any)/(:any)']  = 'playlist/index/$1/$2';
$route['playlist/(:any)/detail/(:any)']  = 'playlist/PlaylistVideos/$1/$2';














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

