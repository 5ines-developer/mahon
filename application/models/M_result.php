<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class M_result extends CI_Model {

    public function getPosts($category, $slug, $date, $auth)
    {
        // where
        if(!empty($slug)){$this->db->where('p.slug', $slug);}
        if(!empty($category)){$this->db->where('c.title', $category); }
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

            
            
        if(!empty($category) && !empty($slug)){
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

    public function breaking()
    {
        $bareking = $this->db->where('status', 1)->order_by('created_on', 'DESC')->get('mh_breaking_news')->result();
        return $bareking;
    }

    public function related($category, $slug)
    {
        $this->db->where('c.title', $category);
        $query = $this->db->from('mh_posts p')
            ->where('p.status', 1)
            ->where('p.slug <>', $slug)
            ->where('p.schedule <=', date('Y-m-d H:i:s'))
            ->where('p.status', 1)
            ->select('p.id, p.title, p.slug, p.content, p.image, c.title as category, p.posted_by, p.created_on, p.tags')
            ->order_by('p.id', 'DESC')
            ->join('mh_category c', 'c.id = p.category', 'left')
            ->get()
            ->result();
        foreach ($query as $key => $result) {
            $result->author = $this->autherdetail($result->posted_by);
        }
        return $query;
    }

    

    // Website counter
    public function visitorCount($id = null)
    {
        $ip = $this->input->ip_address();
        $getQ = $this->db->where('date', date('Y-m-d'))->where('ip_address', $ip)->where('article', $id)->get('visitor_article');
        if($getQ->num_rows() > 0){
            $this->updateVisitorCount($ip, $id);
        }else{
            $this->updateArticleViews($id);
            $this->addVisitorCount($ip, $id);
        }
    }

    // update visitor count
    public function updateVisitorCount($ip = null, $id = null)
    {
        $data = array( 'time'  => date('H:i:s'));
        $this->db->where('date', date('Y-m-d'))
        ->where('ip_address', $ip)
        ->where('article', $id)
        ->set('visit_perday', 'visit_perday+1', FALSE)
        ->update('visitor_article', $data);
        return true;
    }

    // update visitor count
    public function addVisitorCount($ip = null, $id = null)
    {
        $data = array(
            'ip_address'    => $ip,
            'visit_perday' => 1,
            'date'          => date('Y-m-d'),
            'time'          => date('H:i:s'),
            'article'       => $id
        );
        $this->db->insert('visitor_article', $data);
        return true;
    }

    // update article views
    public function updateArticleViews($id = null)
    {
        $this->db->where('id', $id)
        ->set('views', 'views+1', FALSE)
        ->update('mh_posts');
        return true;       
    }

    // preview
    public function getPostsPreview($id = null)
    {
        // where
       
       $this->db->where('p.id', $id);
        $query = $this->db->from('mh_posts p')
            ->where('p.status', 3)
            ->where('p.schedule <=', date('Y-m-d H:i:s'))
            ->select('p.id, p.title, p.slug, p.content, p.image, c.title as category, p.posted_by, p.created_on, p.tags')
            ->order_by('p.id', 'DESC')
            ->join('mh_category c', 'c.id = p.category', 'left')
            ->get();

        
            $result =  $query->row();
            if(!empty($result)):
                $result->author = $this->autherdetail($result->posted_by);
                return $result;
            else:
                return $result;
            endif;
    }

    public function GetGallery($slug = null)
    {
        $result = $this->db->where('p.status', 1)
        ->where('slug', $slug)
        ->order_by('p.id', 'desc')
        ->from('mh_photos p')
        ->select('c.title as category, p.title, p.slug, p.id, p.tags, p.uploaded_on,
        f.pageid as fid, f.title as ftitle, f.site_name as fsite_name, f.url as furl, f.descr as fdes,
        t.card as tcard, t.title as ttitle, t.site_name as tsite_name, t.url as turl, t.descr as tdes, 
        pg.title as ptitle, pg.keyword as pkeyword, pg.descr as pdes')
        ->join('mh_category c', 'c.id = p.category', 'left')
        ->join('mh_photo_post_fb  f', 'f.postid = p.id', 'left')
        ->join('mh_photo_twitter  t', 't.post_id = p.id', 'left')
        ->join('mh_photo_post_page pg', 'pg.post_id = p.id')
        ->get()
        ->row();
        $result->image = $this->image($result->id);
        return $result;
    }

    public function image($id = null)
    {
        return  $this->db->where('photo_id', $id)->select('*')->get('mh_photo_gallery')->result();
    }


    // video post
    public function getVideo($category, $slug)
    {
        // where
        if(!empty($slug)){$this->db->where('p.slug', $slug);}
        if(!empty($category)){$this->db->where('c.title', $category); }
        
        $query = $this->db->from('mh_videos p')
            ->where('p.status', 1)
            // ->where('p.schedule <=', date('Y-m-d H:i:s'))
            ->select('p.id, p.title, p.slug, p.content, p.tumb as image, p.url, p.type, c.title as category, p.posted_by, p.created_on, p.tags,
            f.pageid as fid, f.title as ftitle, f.site_name as fsite_name, f.url as furl, f.descr as fdes,
            t.card as tcard, t.title as ttitle, t.site_name as tsite_name, t.url as turl, t.descr as tdes, 
            pg.title as ptitle, pg.keyword as pkeyword, pg.descr as pdes')
            ->order_by('p.id', 'DESC')
            ->join('mh_category c', 'c.id = p.category', 'left')
            ->join('mh_video_post_fb  f', 'f.postid = p.id', 'left')
            ->join('mh_video_twitter  t', 't.post_id = p.id', 'left')
            ->join('mh_video_post_page pg', 'pg.post_id = p.id')
            ->get();

            
            
        if(!empty($category) && !empty($slug)){
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

    public function relatedVideo($category, $slug)
    {
        $this->db->where('c.title', $category);
        $query = $this->db->from('mh_videos p')
            ->where('p.status', 1)
            ->where('p.slug <>', $slug)
            ->where('p.schedule <=', date('Y-m-d H:i:s'))
            ->where('p.status', 1)
            ->select('p.id, p.title, p.slug, p.content, p.url, p.type, p.tumb as image, c.title as category, p.posted_by, p.created_on, p.tags')
            ->order_by('p.id', 'DESC')
            ->join('mh_category c', 'c.id = p.category', 'left')
            ->get()
            ->result();
        foreach ($query as $key => $result) {
            $result->author = $this->autherdetail($result->posted_by);
        }
        return $query;
    }


        public function allVideos($value='')
    {
        // $this->db->group_by('mhv.title');
        $query = $this->db->from('mh_videos mhv')
            ->where('mhv.status', 1)
            ->where('mhv.schedule <=', date('Y-m-d H:i:s'))
            ->select('mhv.id, mhv.title, mhv.slug, mhv.content, mhv.tumb,  mhv.created_by, mhv.created_on, mhv.tags, mhv.url,mhv.type,mhv.vtype,c.title as category, 
            f.pageid as fid, f.title as ftitle, f.site_name as fsite_name, f.url as furl, f.descr as fdes,
            t.card as tcard, t.title as ttitle, t.site_name as tsite_name, t.url as turl, t.descr as tdes, 
            pg.title as ptitle, pg.keyword as pkeyword, pg.descr as pdes')
            ->order_by('mhv.id', 'DESC')
            ->join('mh_category c', 'c.id = mhv.category', 'left')
            ->join('mh_video_post_fb f', 'f.postid = mhv.id', 'left')
            ->join('mh_video_twitter t', 't.post_id = mhv.id', 'left')
            ->join('mh_video_post_page pg', 'pg.post_id = mhv.id')
            ->get();
            return $query->result();

    }


     public function pgallery(Type $var = null)
    {
        $result = $this->db->where('p.status', 1)
        ->order_by('p.id', 'desc')
        ->from('mh_photos p')
        ->select('c.title as category, p.title, p.slug, p.id')
        ->join('mh_category c', 'c.id = p.category', 'left')
        ->get()
        ->result();
        foreach ($result as $key => $value) {
            $value->image = $this->pimage($value->id);
        }
        return $result;
    }

    public function pimage($id = null)
    {
        return  $this->db->where('photo_id', $id)->select('image')->get('mh_photo_gallery')->row();
    }


    
}

/* End of file M_result.php */
