<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_dashboard extends CI_Model {

    // dash board top box counts
    public function topCounts()
    {
        $data['articles']   = $this->articleCount();
        $data['category']   = $this->categoryCount();
        $data['Authors']    = $this->AuthorCount();
        return $data;
    }
    // counts of article
    public function articleCount(Type $var = null)
    {
        return $this->db->where('status', 1)->count_all_results('mh_posts');
    }
    // counts of categories
    public function categoryCount(Type $var = null)
    {
        return $this->db->where('status', 1)->count_all_results('mh_category');
    }
    // counts of Authors
    public function AuthorCount(Type $var = null)
    {
        return $this->db->where('status', 1)->count_all_results('mh_author');
    }


    // Most viewed
    public function mostViewed($sort = 'day')
    {
      
        if($sort == 'year'){
            $sorted = date("Y-01-01 00:00:00");
        }elseif($sort == 'week'){
            $sorted = date("Y-m-d 00:00:00", strtotime('monday this week'));
        }elseif($sort == 'half-month'){
            $sorted = date('Y-m-d 00:00:00', strtotime('-15 day'));
        }elseif($sort == 'month'){
            $sorted = date("Y-m-d 00:00:00", strtotime("first day of this month"));
        }else{
            $sorted = date('Y-m-d 00:00:00');
        }
        $this->db->where('p.update_on <=', date('Y-m-d H:i:s'));
        $this->db->where('p.update_on >=', $sorted);
        return $this->db->from('mh_posts p')
        ->select('p.views, p.id, p.slug, p.title, p.update_on, a.id as authid, a.name as author, p.update_on, c.title as category')
        ->join('mh_author a', 'a.id = p.posted_by', 'left')
        ->join('mh_category c', 'c.id = p.category', 'left')
        ->order_by('p.views', 'DESC')
        ->limit(7)
        ->get()
        ->result();
    }

    // author
    public function authors()
    {
        $this->db->select('id, name');
        $data = $this->db->get('mh_author', 5)->result();
        foreach ($data as $key => $value) {
            $value->articles = $this->authorsArticleCount($value->id);
        }
        return $data;
    }

    // author articles count
    public function authorsArticleCount($id = null)
    {
        return $this->db->where('category', $id)->count_all_results('mh_posts');
    }

}

/* End of file M_dashboard.php */
