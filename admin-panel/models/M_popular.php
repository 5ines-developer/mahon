<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_popular extends CI_Model {

    public function getpopular($var = null)
    {
        $this->db->select('id, img as image, title,  link, type');
        $result = $this->db->order_by('orders', 'asc')->get('mh_popular')->result();
        return $this->arrangedata($result);
        
    }

    function arrangedata($result = null)
    {
        $data = array();
        $offset = 1;
        foreach ($result as $key => $value) {
            
            if($value->type == 'recent'){
                $query = $this->getArticle($link = null,  $data);
                $offset += 1;
                array_push($data, $query);
            }
            elseif($value->type == 'article'){
                $link = explode('/', $value->link);
                $slug = $link[sizeof($link) - 1];
                $query = $this->getArticle($slug,  $data);
                array_push($data, $query);

            }                
            else{
                array_push($data,$value);
            }
        }
        return $data;
        
    }

    function getArticle($link = null,  $data= null)
    {
        if(!empty($data)){
            foreach ($data as $key => $value) {
              if(!empty($value->id)){
                  $this->db->where('id !=', $value->id);
              }
            }
        }
        if(!empty($link)){$this->db->where('slug', $link); }
        $this->db->where('status', 1);
        $this->db->select('id, image, title, content');
        
        return $this->db->order_by('update_on', 'DESC')->get('mh_posts')->row(0);
    }


    // update popular
    public function updatepopular($data, $position)
    {
        $this->db->where('position', $position);
        $this->db->update('mh_popular', $data);
        if($this->db->affected_rows() > 0){ return true;}else{return false; }
    }

    // single popular fetch
    public function get_single_popular($position)
    {
        $this->db->where('position', $position);
        return $this->db->get('mh_popular')->row();
    }
}

/* End of file M_popular.php */
