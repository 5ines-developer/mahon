<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] 	                = 'authentication';
$route['404_override'] 			                = '';
$route['translate_uri_dashes'] 	                = FALSE;
//admin authentication              
$route['login'] 				                = 'authentication/index'; 			
$route['can-login'] 			                = 'authentication/form_validation'; 
$route['dashboard'] 			                = 'dashboard'; 			
$route['logout'] 				                = 'authentication/logout'; 			
//forgot password               
$route['forgot-password'] 		                = 'authentication/forgot_password'; 	
$route['set-password/(:any)'] 	                = 'authentication/add_pass/$1'; 		
$route['update-password']   	                = 'authentication/update_pass'; 		
//change password               
$route['change-password']   	                = 'account/index'; 						
$route['password/change']   	                = 'account/password_validation'; 		
//account settings              
$route['profile']   			                = 'account/accntsttngs'; 	
$route['profile/update']   		                = 'account/updateacnt'; 
// Post             
$route['post']                                  = 'post/index';
$route['post/edit/(:any)']                      = 'post/edit/$1';
$route['post/detail/(:any)']                    = 'post/get_single/$1';
$route['post/draft']                            = 'post/draft';
$route['post/add']                            = 'post/addPost';


// banner               
$route['banner']                                = 'banner/index';
$route['banner/update']                         = 'banner/update';
// todays featured              
$route['todays-featured']                       = 'featured';
$route['todays-featured/delete/(:any)']         = 'featured/delete/$1';
$route['breaking-news']                         = 'breaking_news';
// Trash                
$route['trash/category']                        = 'trash/category';
$route['trash/article']                         = 'trash/articles';
$route['trash/category-restore/(:any)']         = 'trash/category_restore/$1';
$route['trash/article-restore/(:any)']          = 'trash/articles_restore/$1';
$route['trash/article/delete']                  = 'trash/articles_delete';
$route['trash/article/clear-all']               = 'trash/clear_all';
$route['trash/category/clear-all']              = 'trash/category_clear';
$route['trash/category/delete']                 = 'trash/delete_category';
// category
$route['category']                              = 'category/index';
$route['category/sub-category']                 = 'category/sub_category';
$route['category/related-category']             = 'category/related_category';
$route['category/sub-category-add']             = 'category/sub_category_add';
$route['category/sub-category-edit']            = 'category/sub_category_edit';
$route['category/sub-category-delete/(:any)']   = 'category/sub_category_delete/$1';
// Trending
$route['trending']                               = 'trending/index';
$route['trending/update']                        = 'trending/update';
$route['trending/delete/(:any)']                 = 'trending/delete/$1';
// Trending
$route['temple-visit']                           = 'temple/index';
$route['temple-visit/update']                    = 'temple/update';
// popular Article
$route['popular-article']                        = 'popular/index';
$route['popular-article/update']                 = 'popular/update';
$route['popular-article/delete/(:any)']          = 'popular/delete/$1';
// Video gallery
$route['video-article']                          = 'videos';
$route['video-article/featured-videos']          = 'videos';
$route['video-article-insert']                   = 'videos/insert';
$route['video-article/delete/(:any)']            = 'videos/delete/$1';
// photo gallery
$route['photos']                                 = 'photos/index';   
$route['photos']                                 = 'photos/index';   
$route['photos/(:any)/all']                      = 'photos/single_gall/$1';   
$route['photos/update']                          = 'photos/update';   
$route['photos/delete/(:any)']                   = 'photos/delete/$1';  

// photo album
$route['photo-album']                            = 'photos/album';
$route['photo-album/delete/(:any)']              = 'photos/albumDelete/$1';



// Event
$route['events']                                 = 'events/index';
// newsletter
$route['news-letter']                            = 'events/news_letter';
$route['news-letter/delete/(:any)']              = 'events/news_letter_delete/$1';
                 




