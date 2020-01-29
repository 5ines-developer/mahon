<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class m_site extends CI_Model {

    public function getsiteData()
    {
        return  $this->db->from('mh_posts p')
                ->where('p.status', 1)
                ->where('p.schedule <=', date('Y-m-d H:i:s'))
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
        $query =  $this->db
            ->where('status', 1)
            ->select('title, id, menu, index')
            ->get('mh_category')
            ->result();
        foreach ($query as $key => $value) {
            $value->total = $this->totalposts($value->id);
        }
        return $query;
    }

    public function totalposts($id = null)
    {
        $query = $this->db->where('category', $id)
        ->where('schedule <=', date('Y-m-d H:i:s'))
        ->get('mh_posts');
        return $query->num_rows();
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

    public function trending($var = null)
    {
        $this->db->select('id, img as image, title,  link as slug, type');
        $result = $this->db->order_by('orders', 'asc')->get('mh_trending')->result();
        return $this->arrangedata($result);
        
    }

    public function temple($var = null)
    {
        $this->db->select('id, img as image, title,  link as slug, type');
        $result = $this->db->order_by('orders', 'asc')->get('mh_temple')->result();
        return $this->arrangedata($result);
    }

    public function popular($var = null)
    {
        $this->db->select('id, img as image, title,  link as slug, type');
        $result = $this->db->order_by('orders', 'asc')->get('mh_popular')->result();
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
                ->where('p.schedule <=', date('Y-m-d H:i:s'))
                ->select('p.id, p.title, p.slug, p.content, p.image, c.title as category, a.name as posted_by')
                ->join('mh_category c', 'c.id = p.category', 'left')
                ->join('mh_author a', 'a.id = p.posted_by', 'left');
        return $this->db->order_by('p.update_on', 'DESC')->get()->row(0);
    }

    // get Category wise data
    public function getCategoryArticle()
    {
        $category = $this->indexCategory();
        foreach ($category as $key => $value) {
            $value->data = $this->getArticleBycategory($value->id);
        }
        return $category;
    }

    // Index Category
    public function indexCategory()
    {
        return  $this->db->where('index', 1)
        // ->order_by('created_on', 'DESC')
        ->where('status', 1)
        ->select('title, id')
        ->get('mh_category')
        ->result();
    }

    // get category wise data
    public function getArticleBycategory($id = null)
    {
        return $this->db->where('category', $id)
        ->where('schedule <=', date('Y-m-d H:i:s'))
        ->order_by('created_on', 'DESC')
        ->where('status', 1)
        ->select('id, title, slug,  image')
        ->limit(6)
        ->get('mh_posts')
        ->result();
    }

    public function random()
    {
        return  $this->db->from('mh_posts p')
                // ->where('p.status', 1)
                ->where('p.schedule <=', date('Y-m-d H:i:s'))
                ->where('p.status', 1)
                ->select('p.id, p.title, p.slug,  p.image, c.title as category')
                ->order_by('p.id', 'RANDOM')
                ->join('mh_category c', 'c.id = p.category', 'left')
                ->limit(3)
                ->get()
                ->result();
    }

    public function breaking()
    {
        $bareking = $this->db->where('status', 1)->order_by('created_on', 'DESC')->get('mh_breaking_news')->result();
        return $bareking;
    }
    
    // Website counter
    public function WebCounters($ip = null)
    {
        
        $getQ = $this->db->where('date', date('Y-m-d'))->where('ip_address', $ip)->get('web_view');
        if($getQ->num_rows() > 0){
            $this->updateVisitorCount($ip);
        }else{
            $this->addVisitorCount($ip);
        }
    }

    // update visitor count
    public function updateVisitorCount($ip = null)
    {
        $data = array( 'time'  => date('H:i:s'), );
        $this->db->where('date', date('Y-m-d'))->where('ip_address', $ip)->set('visite_perday', 'visite_perday+1', FALSE)->update('web_view', $data);
        return true;
    }

    // update visitor count
    public function addVisitorCount($ip = null)
    {
        $data = array(
            'ip_address'    => $ip,
            'visite_perday' => 1,
            'date'          => date('Y-m-d'),
            'time'          => date('H:i:s')
        );
        $this->db->insert('web_view', $data);
        return true;
    }

    // Get videos
    public function videos($slug='')
    {
        echo "<pre>";
        print_r ($slug);
        echo "</pre>";
        if(!empty($slug)){ $this->db->where('slug', $slug); }
        return $this->db->where('v.status', 1)
        ->where('v.schedule <=', date('Y-m-d H:i:s'))
        ->where('vtype', 'short')
        ->from('mh_videos v')
        ->join('mh_category c', 'c.id = v.category', 'left')
        ->select('c.title as category, v.id, v.title, v.url, v.tumb, v.slug')
        ->limit(3)
        ->order_by('v.id', 'DESC')
        ->get()
        ->result();
    }

    public function fvideos()
    {
        return $this->db->where('v.status', 1)
        ->where('vtype', 'featured')
        ->where('v.schedule <=', date('Y-m-d H:i:s'))
        ->from('mh_videos v')
        ->join('mh_category c', 'c.id = v.category', 'left')
        ->select('c.title as category, v.id, v.title, v.url, v.tumb, v.slug')
        ->limit(8)
        ->order_by('v.id', 'DESC')
        ->get()
        ->result();
    }

    public function twitter()
    {
        return $this->db->where('status', 1)
        ->limit(5)
        ->get('mh_twitter_post')
        ->result();       
    }

    public function gallery(Type $var = null)
    {
        $result = $this->db->where('p.status', 1)
        ->order_by('p.id', 'desc')
        ->from('mh_photos p')
        ->select('c.title as category, p.title, p.slug, p.id')
        ->join('mh_category c', 'c.id = p.category', 'left')
        ->get()
        ->result();
        foreach ($result as $key => $value) {
            $value->image = $this->image($value->id);
        }
        return $result;
    }

    public function image($id = null)
    {
        return  $this->db->where('photo_id', $id)->select('image')->get('mh_photo_gallery')->row();
    }

    public function happening()
    {
        $this->db->where('status', 1);
        $this->db->where('date >=',  date('Y-m-d H:i:s'));
        return $this->db->get('mh_events')->result();
    }

    // subscription
    public function subscribe($email = null)
    {
        $this->db->insert('mh_newsletter', array('email' => $email));
        return true;
    }






}

/* End of file m_site.php */
