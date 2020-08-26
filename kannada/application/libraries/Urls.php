<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Urls
{
    protected $ci;

    public function __construct()
    {
        $this->ci =& get_instance();
    }

    public function urlFormat($preUrl = null)
    {
        return strtolower(str_replace(' ', '-', $preUrl));
    }

    public function urlDformat($preUrl = null)
    {
        return strtolower(str_replace('-', ' ', $preUrl));
    }

    public function checkCat($cat='')
    {
        switch ($cat) {
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

        return  $ca1cat;
    }

    public function catDecode($cat='')
    {
        switch ($cat) {
            case 'spiritual':
                $ca1cat = 'ಆಧ್ಯಾತ್ಮ'; 
                break;
            case 'nation':
                $ca1cat = 'ದೇಶ'; 
                break;
            case 'science':
                $ca1cat = 'ವಿಜ್ಞಾನ'; 
                break;
            case 'general knowledge':
                $ca1cat = 'ಸಾಮಾನ್ಯ ಜ್ಞಾನ'; 
                break;
            case 'health':
                $ca1cat = 'ಅರೋಗ್ಯ'; 
                break;
            case 'video':
                $ca1cat = 'ವಿಡಿಯೋ'; 
                break;                              
            default:
                $ca1cat = 'ವಿಡಿಯೋ'; 
                break;
        }

        return  $ca1cat;
    }


     public function widgetDeath($value='')
    {
        $result =  $this->ci->m_site->widgetDeath();
        foreach ($result as $key => $value) {
            return $value->deaths;
        }
    }

    public function widgetconfirm($value='')
    {
        $result =  $this->ci->m_site->widgetconfirm();
        foreach ($result as $key => $value) {
            return $value->total;
        }
    }

    

}

/* End of file Urls.php */
