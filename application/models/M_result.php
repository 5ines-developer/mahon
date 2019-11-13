<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class M_result extends CI_Model {

    public function getPosts($category, $slug, $date, $auth)
    {
        // where
        if(!empty($category)){$this->db->where('c.title', $category); }
        if(!empty($slug)){$this->db->where('p.slug', $slug);}
        // if(!empty($category)){}
        // if(!empty($category)){}
        $query = $this->db->from('mh_posts p')
            ->where('p.status', 1)
            ->select('p.id, p.title, p.slug, p.content, p.image, c.title as category, p.posted_by, p.created_on, p.tags')
            ->order_by('p.id', 'DESC')
            ->join('mh_category c', 'c.id = p.category', 'left')
            ->get();
        if(!empty($category) && !empty($slug)){
            $result =  $query->row();
            $result->author = $this->autherdetail($result->posted_by);
            return $result;
        }else{
            return $query->result();
        }
    }

    public function autherdetail($id = null)
    {
        return $this->db->where('id', $id)->get('mh_author')->row();
    }

}

/* End of file M_result.php */
