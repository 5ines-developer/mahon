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
        return true;
    }

    public function articleList()
    {
        $select_column = array("p.id", "p.title", "c.title as category", 'p.date', 'a.name as posted_by', 'p.created_on');
        $this->db->select($select_column);
        $this->db->where('p.status !=', 1);
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


}

/* End of file M_trash.php */
