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
                $query->mid = $value->id;
                array_push($data, $query);
            }
            elseif($value->type == 'article'){
                $link = explode('/', $value->link);
                $slug = $link[sizeof($link) - 1];
                $query = $this->getArticle($slug,  $data);
                $query->mid = $value->id;
                array_push($data, $query);
            }                
            else{
                $custom =  $value;
                $custom->mid = $value->id;
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
       

        if(!empty($position)):
            $this->db->where('id', $position);
            $this->db->update('mh_popular', $data);
            if($this->db->affected_rows() > 0){ return true;}else{return false; }
        else:
            $this->db->insert('mh_popular', $data);
            $id = $this->db->insert_id();
            if($this->updatePosition($id)){
                return true;
            }else{
                return false;
            }
        endif;

    }

    public function updatePosition($id = null)
    {
        $this->db->where('id', $id);
        $this->db->update('mh_popular', array('position' => $id, 'orders' => $id));
        if($this->db->affected_rows()){
            return true;
        }else{
            return false;
        }
    }

    // delete Tending article
    public function delete($id)
    {
        $this->db->where('id', $id)->delete('mh_popular');
        if($this->db->affected_rows()){
            return true;
        }else{
            return false;
        }
    }



    // single popular fetch
    public function get_single_popular($position)
    {
        $this->db->where('id', $position);
        return $this->db->get('mh_popular')->row();
    }

    // check existing
    public function checkExistUrl($url = null)
    {

        
        $explodeUrl = explode('/',parse_url($url)['path']);
        if(!empty(end($explodeUrl))){
            $slug = end($explodeUrl);
        }else{
            $slug = array_slice($explodeUrl, -2, 1)['0'];
        }
        $this->db->where('slug', $slug);
        $this->db->where('status', 1);
        $query = $this->db->get('mh_posts');
        if($query->num_rows() > 0){
            return true;
        }else{
            return false;
        }
    }
}

/* End of file M_popular.php */
