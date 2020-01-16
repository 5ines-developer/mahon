<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class M_trash extends CI_Model {

    public function categoryList()
    {
        return $this->db->where('status', 0)->get('mh_category')->result();
    }

    public function category_restore($id = null)
    {
        $this->db->where('id', $id)->update('mh_category', array('status' => 1));
        $this->articles_restore_category($id);
        return true;
    }

    public function articleList()
    {
        $select_column = array("p.id", "p.title", "c.title as category", 'p.date', 'a.name as posted_by', 'p.created_on', 'p.status');
        $this->db->select($select_column);
        $this->db->where('p.status !=', 1);
        $this->db->where('p.status !=', 3);
        $this->db->where('p.status !=', 4);
        $this->db->from('mh_posts p');
        $this->db->join('mh_category c', 'c.id = p.category', 'left');
        $this->db->join('mh_author a', 'a.id = p.posted_by', 'left');
        return $this->db->get()->result();
    }

    public function articles_restore($id = null)
    {
        $this->db->where('id', $id)->update('mh_posts', array('status' => 1));
        return true;
    }

    public function articles_restore_category($id = null)
    {
        $this->db->where('category', $id)->update('mh_posts', array('status' => 1));
        return true;
    }

    // delete selected articles fom trash
    public function articles_delete($id = null)
    {
        $this->db->where('id', $id)->delete('mh_posts');
        $this->fb_delete($id);
        $this->page_delete($id);
        $this->twitter_delete($id);
        return true;
    }
    
    public function fb_delete($id = null)
    {
        $this->db->where('postid', $id)->delete('mh_post_fb');
        return true;
    }

    public function page_delete($id = null)
    {
        $this->db->where('post_id', $id)->delete('mh_post_page');
        return true;
    }

    public function twitter_delete($id = null)
    {
        $this->db->where('post_id', $id)->delete('mh_photo_twitter');
        return true;
    }

    public function clear_all()
    {
        $result = $this->db->where('status', 2)->or_where('status', 0)->get('mh_posts');
        if($result->num_rows() > 0){
            foreach ($result->result() as $key => $value) {
                $this->articles_delete($value->id);
            }
        }else{
            return array('status' => false, 'msg'=> 'No data found');
        }
        return array('status' => true, 'msg'=> 'deleted');
    }

    public function delete_category($id = null)
    {
        $this->db->where('id', $id)->delete('mh_category');
        return true;
    }

    public function category_clear()
    {
        $result = $this->db->where('status', 0)->delete('mh_category');
        if($this->db->affected_rows() > 0){
            return array('status' => true, 'msg'=> 'deleted');
        }else{
            return array('status' => false, 'msg'=> 'No data found');
        }
    }
}

/* End of file M_trash.php */
