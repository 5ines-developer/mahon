<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class m_site extends CI_Model {

    public function getsiteData()
    {
        return  $this->db->from('mh_posts p')
                ->where('p.status', 1)
                ->select('p.id, p.title, p.slug, p.content, p.image, c.title as category, a.name as posted_by')
                ->order_by('p.id', 'DESC')
                ->join('mh_category c', 'c.id = p.category', 'left')
                ->join('mh_author a', 'a.id = p.posted_by', 'left')
                ->limit(13)
                ->get()
                ->result();
    }

    public function getCategory()
    {
        return $this->db
            ->where('status', 1)
            ->select('title, id')
            ->get('mh_category')
            ->result();
        
    }

    public function todayFetured()
    {
        $this->db->select('id, img as image, title,  link as slug, type');
        $result = $this->db->order_by('orders', 'asc')->get('mh_today_featured')->result();
        return $this->arrangedata($result);
    }

    public function getBanner($var = null)
    {
        $this->db->select('id, img as image, title,  link as slug, type');
        $result = $this->db->order_by('orders', 'asc')->get('mh_banner')->result();
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
                array_push($data, $query);
            }
            elseif($value->type == 'article'){
                $link = explode('/', $value->slug);
                $slug = $link[sizeof($link) - 1];
                $query = $this->getArticle($slug,  $data);
                array_push($data, $query);

            }                
            else{
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
                  $this->db->where('p.id !=', $value->id);
              }
            }
        }
        if(!empty($link)){$this->db->where('slug', $link); }
            $this->db->where('p.status', 1)
                ->from('mh_posts p')
                ->select('p.id, p.title, p.slug, p.content, p.image, c.title as category, a.name as posted_by')
                ->join('mh_category c', 'c.id = p.category', 'left')
                ->join('mh_author a', 'a.id = p.posted_by', 'left');
        return $this->db->order_by('p.update_on', 'DESC')->get()->row(0);
    }

}

/* End of file m_site.php */
