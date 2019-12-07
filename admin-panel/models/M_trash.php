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

}

/* End of file M_trash.php */
