<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_search extends CI_Model {

    public function search($input = null, $slug = null)
    {
        $query = $this->db->from('mh_posts p')
            ->like('p.slug', $slug)
            ->or_like('p.title', $input, 'both')
            ->or_like('p.tags', $input, 'both')
            ->or_like('c.title', $input, 'both')
            ->or_like('s.title', $input, 'both')
            ->or_like('r.title', $input, 'both')
            ->or_like('a.name', $input, 'both')
            ->or_like('p.content', $input, 'both')
            ->group_start()
                ->where('p.schedule <=', date('Y-m-d H:i:s'))
                ->where('p.status', 1)
            ->group_end()
            ->select('p.id, p.title, p.slug, p.content, p.image, c.title as category, a.name as posted_by, p.created_on, p.tags')
            ->order_by('p.id', 'DESC')
            ->join('mh_category c', 'c.id = p.category', 'left')
            ->join('mh_sub_category s', 's.id = p.scategory', 'left')
            ->join('mh_sub_category r', 'r.id = p.realted', 'left')
            ->join('mh_author a', 'a.id = p.posted_by', 'left')
            ->get();
       
        return $query->result();
       
    }

}

/* End of file M_search.php */
