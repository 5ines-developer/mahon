<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_visitarticles extends CI_Model {


  public function getCategory($value='')
  {
    $result =  $this->db->order_by('title','ASC')->get('mh_category')->result();
    return $result;
  }
  public function getArticles($cat_id = null)
  {
      if(!empty($cat_id)){
        $this->db->where('category',$cat_id);
      }
      $this->db->order_by('views','DESC');
    $result =  $this->db->get('mh_posts')->result();
    return $result;
  }
  public function countViews($catid='')
  {
        $total = 0;
        $this->db->where('category', $catid);
        $query = $this->db->get('mh_posts');
        $result  = $query->result();
        foreach($result as $key=>$value){
            $total = $total+$value->views;
        }
        return $total;
  }
  public function allCountViews()
  {
        $total = 0;
        $query = $this->db->get('mh_posts');
        $result  = $query->result();
        foreach($result as $key=>$value){
            $total = $total+$value->views;
        }
        return $total;
  }

}

/* End of file M_authentication.php */
/* Location: ./application/models/M_authentication.php */