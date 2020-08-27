<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class M_playlist extends CI_Model {
    

    public function getPlaylist($pl_slug=null,$slug=null)
    {
       
        $query= $this->db->where('po.status', 1)
        ->where('pl.pl_slug', $pl_slug)
        
        ->where('po.schedule <=', date('Y-m-d H:i:s'))
        ->from('mh_posts po')
        ->join('mh_playlist pl', 'pl.id = po.playlist_id', 'left')
        ->join('mh_category c', 'c.id = po.category', 'left')
        ->select('pl.title as playlist,pl.pl_slug,c.title as category,c.title as category, po.id, po.title, po.content, po.image,po.alt,po.tags,po.slug,po.created_on,  po.playlist_id')
        ->order_by('po.id', 'DESC');
            if(!empty($slug)){
                $this->db->where('po.slug',$slug);
                return $query->get()->result();
            }
            return $query->get()->result();
       
    }

    public function getAllPlaylist($playlist,$per_page='',$page='')
    {
        $this->db->limit($per_page, $page);
        $query= $this->db->where('po.status', 1)
        ->where('pl.pl_slug',$playlist)
        ->where('po.schedule <=', date('Y-m-d H:i:s'))
       
        ->from('mh_posts po')
        ->join('mh_playlist pl', 'pl.id = po.playlist_id', 'left')
        ->join('mh_category c', 'c.id = po.category', 'left')
        ->select('pl.title as playlist,pl.pl_slug,c.title as category,c.title as category, po.id, po.title, po.content, po.image,po.alt,po.tags,po.slug,po.created_on,  po.playlist_id')
        ->order_by('po.id', 'DESC');
        return $query->get()->result();
    }
   
    public function playlist_count($playlist_id)
    {
        return $this->db->where('playlist_id',$playlist_id)->get('mh_posts')->num_rows();
    }
    public function getCount($playlist)
    {
        $query= $this->db->where('po.status', 1)
        ->where('pl.pl_slug',$playlist)
        ->where('po.schedule <=', date('Y-m-d H:i:s'))
        ->from('mh_posts po')
        ->join('mh_playlist pl', 'pl.id = po.playlist_id', 'left')
        ->select('pl.pl_slug,po.id, po.title,    po.playlist_id')->get();
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return false;
        }
    }
    
}

/* End of file M_result.php */
