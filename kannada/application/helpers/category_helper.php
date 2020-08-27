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

    if(!function_exists('randomArticle')) {
        function randomArticle() {
            $ci = get_instance();

            $ci->load->model('m_site');
            $category =  $ci->m_site->random();
            return $category;
        }
    }
    if(!function_exists('playlistCount')) {
        function playlistCount($playlist_id) {
            $ci = get_instance();

            $ci->load->model('m_playlist');
            $count =  $ci->m_playlist->playlist_count($playlist_id);
            return $count;
        }
    }


