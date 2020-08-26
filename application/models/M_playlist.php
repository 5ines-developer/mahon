<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class M_playlist extends CI_Model {


    public function getPosts($slug,$playlist_id)
    {
        // where
        if(!empty($slug)){$this->db->where('p.slug', $slug);$this->db->where('p.playlist_id', $playlist_id);}
     
        $this->db->distinct();
        $query = $this->db->from('mh_posts p')
            ->where('p.status', 1)
            ->where('p.schedule <=', date('Y-m-d H:i:s'))
            ->select('p.id, p.title, p.slug, p.content, p.image, c.title as category, p.posted_by, p.created_on, p.tags, 
            f.pageid as fid, f.title as ftitle, f.site_name as fsite_name, f.url as furl, f.descr as fdes,
            t.card as tcard, t.title as ttitle, t.site_name as tsite_name, t.url as turl, t.descr as tdes, 
            pg.title as ptitle, pg.keyword as pkeyword, pg.descr as pdes')
            ->order_by('p.id', 'DESC')
            ->join('mh_category c', 'c.id = p.category', 'left')
            ->join('mh_post_fb f', 'f.postid = p.id', 'left')
            ->join('mh_twitter t', 't.post_id = p.id', 'left')
            ->join('mh_post_page pg', 'pg.post_id = p.id')
            ->get();

        if( !empty($slug)){
            $result =  $query->row();
            if(!empty($result)):
                $result->author = $this->autherdetail($result->posted_by);
                return $result;
            else:
                return $result;
            endif;
        }else{
            return $query->result();
        }
    }
    public function autherdetail($id = null)
    {
        return $this->db->where('id', $id)->get('mh_author')->row();
    }
    public function get_playlist_id($playslug)
    {
        return $this->db->where('pl_slug',$playslug)->get('mh_playlist')->row()->id;
    }





    public function getPlaylist($pl_slug=null,$slug=null)
    {
       
        $query= $this->db->where('po.status', 1)
        ->where('pl.pl_slug', $pl_slug)
        
        ->where('po.schedule <=', date('Y-m-d H:i:s'))
        ->from('mh_posts po')
        ->join('mh_playlist pl', 'pl.id = po.playlist_id', 'left')
        ->join('mh_category c', 'c.id = po.category', 'left')
        ->select('pl.title as playlist,pl.pl_slug, c.title as category,c.title as category, po.id, po.title, po.content, po.image,po.alt,po.tags,po.slug,po.created_on,  po.playlist_id')
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
