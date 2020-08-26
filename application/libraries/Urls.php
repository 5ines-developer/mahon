<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Urls
{
    protected $ci;

    public function __construct()
    {
        $this->ci =& get_instance();
        $this->ci->load->model('m_site');
    }

    public function urlFormat($preUrl = null)
    {
        return strtolower(str_replace(' ', '-', $preUrl));
    }

    public function urlDformat($preUrl = null)
    {
        return strtolower(str_replace('-', ' ', $preUrl));
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


    public function reload($url)
    {
        $graph = 'https://graph.facebook.com/';
        $post = 'id='.urlencode($url).'&scrape=true';
        return $this->send_post($graph, $post);
    }

    private function send_post($url, $post)
    {
        $r = curl_init();
        curl_setopt($r, CURLOPT_URL, $url);
        curl_setopt($r, CURLOPT_POST, 1);
        curl_setopt($r, CURLOPT_POSTFIELDS, $post);
        curl_setopt($r, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($r, CURLOPT_CONNECTTIMEOUT, 5);
        $data = curl_exec($r);
        curl_close($r);
        return $data;
    }

    

    

}

/* End of file Urls.php */
