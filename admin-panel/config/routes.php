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
// banner               
$route['banner']                                = 'banner/index';
$route['banner/update']                         = 'banner/update';
// todays featured              
$route['todays-featured']                       = 'featured';
$route['breaking-news']                         = 'breaking_news';
// Trash                
$route['trash/category']                        =  'trash/category';
$route['trash/article']                         = 'trash/articles';
$route['trash/category-restore/(:any)']         =  'trash/category_restore/$1';
$route['trash/article-restore/(:any)']          = 'trash/articles_restore/$1';
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
// Trending
$route['temple-visit']                           = 'temple/index';
$route['temple-visit/update']                    = 'temple/update';
// popular Article
$route['popular-article']                        = 'popular/index';
$route['popular-article/update']                 = 'popular/update';
// Video gallery
$route['video-article']                          = 'videos';
$route['video-article-insert']                   = 'videos/insert';






