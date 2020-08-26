<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class m_post extends CI_Model {

    public function make_query()
	{
		$select_column = array("p.id", "p.title", "p.slug", "p.tags", "c.title as category", 'p.date', 'a.name as posted_by', 'p.created_on','pl.title as playlist');  
		$order_column = array(null, "p.id", "p.title", 'c.title','p.tags', 'p.date', 'p.posted_by', 'p.created_on','pl.title'); 

        if($this->session->userdata('Mht_type') =='2'){
            $this->db->where('updated_by', $this->session->userdata('Mht'));
        } 
		  
		$this->db->select($select_column);
        $this->db->from('mh_posts p');
        $this->db->join('mh_category c', 'c.id = p.category', 'left');
        $this->db->join('mh_author a', 'a.id = p.posted_by', 'left');
        $this->db->join('mh_playlist pl', 'pl.id = p.playlist_id', 'left');
        $this->db->where('p.schedule <=', date('Y-m-d H:i:s'));
        $this->db->where('p.status', 1);
		if(isset($_POST["search"]["value"])){
        $this->db->group_start();    
            $this->db->like("p.id", $_POST["search"]["value"]);  
            $this->db->or_like("p.title", $_POST["search"]["value"]);
            $this->db->or_like("p.date", $_POST["search"]["value"]);
            $this->db->or_like("c.title", $_POST["search"]["value"]);
            $this->db->or_like("p.posted_by", $_POST["search"]["value"]);
            $this->db->or_like("p.created_on", $_POST["search"]["value"]);
            $this->db->or_like("p.tags", $_POST["search"]["value"]);
        $this->db->group_end();
		}
		if(isset($_POST["order"]))  
        {  
            $this->db->order_by($order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
        }  
        else  
        {  
            $this->db->order_by('p.id', 'DESC');  
        }  	
	}

	function make_datatables(){
        $this->make_query();
        if(!empty($_POST["length"])){  
            if($_POST["length"] != -1)  
            {  
                $this->db->limit($_POST['length'], $_POST['start']);  
            }  
        }
		$query = $this->db->get();  
		return $query->result();  
   }

   function get_filtered_data(){  
		$this->make_query();  
		$query = $this->db->get();  
		return $query->num_rows();  
	} 

	function get_all_data()  
      {  
           $this->db->select("*");  
           $this->db->from('mh_posts');  
           return $this->db->count_all_results();  
      }
    
   
    //delete
    public function delete($id)
    {
        $this->db->where('id', $id)->update('mh_posts', array('status' => 2));
        if($this->db->affected_rows() > 0){ return true;}else{return false; }
    }


/* ****************          ****************** */
    // get Category
    public function getCategory()
    {
        $category =  $this->db->get('mh_category')->result();
        foreach ($category as $key => $value) {
            $value->sub = $this->choose_sub_category($value->id);        
        }
        return  $category;
    }

    // app post
    public function addPost($data = null, $id = null)
    {
        if(!empty($id)){
            $this->db->where('id', $id);
            $this->db->update('mh_posts', $data);
            if( $this->db->affected_rows() > 0 ){
                $data = array('status' => 1, 'id' => $this->db->insert_id());
            }else{
                    $data = array('status' => 0,);
            }
            return $data;
        }
        else{
            $this->db->insert('mh_posts', $data);
            if( $this->db->affected_rows() > 0 ){
                $data = array('status' => 1, 'id' => $this->db->insert_id());
            }else{
                    $data = array('status' => 0,);
            }
            return $data;
        }
    }

    // add page meta
    public function addPageMeta($data = null, $id = null)
    {
        if(!empty($id)){
            $this->db->where('post_id', $id);
            $this->db->update('mh_post_page', $data);
            return true;
        }
        else{
            $this->db->insert('mh_post_page', $data);
            return true;
        }
    }

    // add page fb
    public function addFbMeta($data = null, $id = null)
    {
        if(!empty($id)){
            $this->db->where('postid', $id);
            $this->db->update('mh_post_fb', $data);
            return true;
        }
        else{
            $this->db->insert('mh_post_fb', $data);
            return true;
        }
    }

    // add page twitter
    public function addTwitMeta($data = null, $id = null)
    {
        if(!empty($id)){
            $this->db->where('post_id', $id);
            $this->db->update('mh_twitter', $data);
            return true;
        }
        else{
            $this->db->insert('mh_twitter', $data);
            return true;
        }
    }

    // fetch single data
    public function single_data($id)
    {
        $select_column = array("p.id", "p.title", "c.title as category", 'p.date', 'a.name as posted_by', 'p.created_on', 'p.slug', 'p.content', 'p.tags', 'p.image', 'DATE_FORMAT(p.schedule, "%h:%i %p") as time', 'DATE_FORMAT(p.schedule, "%M %d, %Y") as scheduled',
        'fb.pageid as fbid', 'fb.title as fbtitle', 'fb.site_name as fbsite', 'fb.url as fburl', 'fb.img_url as fbimg', 'fb.descr as fbdes', 'p.realted', 'p.scategory',
        'pp.title as page_title', 'pp.keyword as page_keyword', 'pp.descr as page_descr',
        't.card as tw_card', 't.title as tw_title', 't.card as tw_card', 't.site_name as tw_site_name', 't.url as tw_url', 't.img_url as tw_img_url', 't.descr as tw_descr','p.playlist_id'

        ); 
        $this->db->select($select_column);
        $this->db->from('mh_posts p');
        $this->db->join('mh_category c', 'c.id = p.category', 'left');
        $this->db->join('mh_author a', 'a.id = p.posted_by', 'left');
        $this->db->join('mh_post_fb fb', 'fb.postid = p.id', 'left');
        $this->db->join('mh_post_page pp', 'pp.post_id = p.id', 'left');
        $this->db->join('mh_twitter t', 't.post_id = p.id', 'left');
        $this->db->join('mh_playlist pl', 'pl.id = p.playlist_id', 'left');
        $this->db->where('p.id', $id);
        return $this->db->get()->row();
    }

    // update
    public function UpdatePost($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('mh_posts', $data);
        if( $this->db->affected_rows() > 0 ){
           return true;
        }else{
            return false;
        }
    }

    // get author
    public function getauthor()
    {
       return $this->db->where('status', 1)->order_by('name', 'asc')->get('mh_author')->result();
    }
      // get playlist
      public function getPlaylist()
      {
         return $this->db->where('status', 1)->order_by('title', 'asc')->get('mh_playlist')->result();
      }

    // subcategory
    public function choose_sub_category($id = null)
    {
        return $this->db->where('main_category', $id)->get('mh_sub_category')->result();
    }

    // add to draft
    public function addPost_draft($data = null, $id = null)
    {
        if(!empty($id)){
            $this->db->where('draft', $id);
            $this->db->update('mh_posts_draft', $data);
            if($this->db->affected_rows() > 0 ){
                $data = array('status' => 1, 'draft' => $id);
            }else{
                $this->db->insert('mh_posts_draft', $data);
                if( $this->db->affected_rows() > 0 ){
                    $data = array('status' => 1, 'draft' => $id);
                }else{
                        $data = array('status' => 0,);
                }
            }
           
            return $data;
        }
        else{
            $this->db->insert('mh_posts_draft', $data);
            if( $this->db->affected_rows() > 0 ){
                $data = array('status' => 1, 'draft' => $id);
            }else{
                    $data = array('status' => 0,);
            }
            return $data;
        }
        
    }

    // delete draft
    public function deleteDraft($id = null)
    {
        $this->db->where('draft', $id);
        $this->db->delete('mh_posts_draft');
        return true;
    }

    public function isExistDraft($id = null)
    {
        $this->db->where('draft', $id);
        $this->db->where('image <>', null);
        $query = $this->db->get('mh_posts_draft');
        
        if($query->num_rows() > 0){
            return array('status' => false, 'data' => $query->row());
        }else{
            return array('status' => true, 'data' => $query->row());
        }
        
        
    }



/** 
 * DRAFT
 * FETCH
 * DELETE
 * RE-EDIT 
*/
    public function draft_make_query()
	{
		$select_column = array("p.id", "p.title", "p.slug", "c.title as category", 'p.date', 'a.name as posted_by', 'p.created_on');  
		$order_column = array(null,  "p.title", 'c.title',  'p.posted_by', 'p.created_on');  
		  
		$this->db->select($select_column);
        $this->db->from('mh_posts_draft p');
        $this->db->join('mh_category c', 'c.id = p.category', 'left');
        $this->db->join('mh_author a', 'a.id = p.posted_by', 'left');
       
		if(isset($_POST["search"]["value"])){
        $this->db->group_start();    
            $this->db->like("p.id", $_POST["search"]["value"]);  
            $this->db->or_like("p.title", $_POST["search"]["value"]);
            $this->db->or_like("p.date", $_POST["search"]["value"]);
            $this->db->or_like("c.title", $_POST["search"]["value"]);
            $this->db->or_like("p.posted_by", $_POST["search"]["value"]);
            $this->db->or_like("p.created_on", $_POST["search"]["value"]);
        $this->db->group_end();
		}
		if(isset($_POST["order"]))  
        {  
            $this->db->order_by($order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
        }  
        else  
        {  
            $this->db->order_by('p.id', 'DESC');  
        }  	
	}

	function  draft_make_datatables(){  
        $this->draft_make_query();
        if(!empty($_POST["length"])){  
            if($_POST["length"] != -1)  
            {  
                $this->db->limit($_POST['length'], $_POST['start']);  
            }  
        }
		$query = $this->db->get();  
		return $query->result();  
   }

    function  draft_get_filtered_data(){  
		$this->draft_make_query();  
		$query = $this->db->get();  
		return $query->num_rows();  
	} 

	function  draft_get_all_data()  
    {  
           $this->db->select("*");  
           $this->db->from('mh_posts_draft');  
           return $this->db->count_all_results();  
    }
    
    //delete
    public function  draft_delete($id)
    {
        $this->db->where('id', $id)->delete('mh_posts_draft');
        if($this->db->affected_rows() > 0){ return true;}else{return false; }
    }    

    // fetch single Draft
    public function single_draft($id)
    {
        $select_column = array("p.id", "p.draft", "p.title", "c.title as category", 'p.date', 'a.name as posted_by', 'p.created_on', 'p.slug', 'p.content', 'p.tags', 'p.image', 'DATE_FORMAT(p.schedule, "%h:%i %p") as time', 'DATE_FORMAT(p.schedule, "%M %d, %Y") as scheduled',
        'fb.pageid as fbid', 'fb.title as fbtitle', 'fb.site_name as fbsite', 'fb.url as fburl', 'fb.img_url as fbimg', 'fb.descr as fbdes', 'p.realted', 'p.scategory',
        'pp.title as page_title', 'pp.keyword as page_keyword', 'pp.descr as page_descr',
        't.card as tw_card', 't.title as tw_title', 't.card as tw_card', 't.site_name as tw_site_name', 't.url as tw_url', 't.img_url as tw_img_url', 't.descr as tw_descr',
        ); 
        $this->db->where('p.id', $id);
        $this->db->select($select_column);
        $this->db->from('mh_posts_draft p');
        $this->db->join('mh_category c', 'c.id = p.category', 'left');
        $this->db->join('mh_author a', 'a.id = p.posted_by', 'left');
        $this->db->join('mh_post_fb fb', 'fb.postid = p.id', 'left');
        $this->db->join('mh_post_page pp', 'pp.post_id = p.id', 'left');
        $this->db->join('mh_twitter t', 't.post_id = p.id', 'left');
        return $this->db->get()->row();
    }

      // schedule article
      function make_schedule_datatables(){  
        $this->make_schedule_query();
        if(!empty($_POST["length"])){  
            if($_POST["length"] != -1)  
            {  
                $this->db->limit($_POST['length'], $_POST['start']);  
            }  
        }
		$query = $this->db->get();  
		return $query->result();  
   }

   public function make_schedule_query()
   {
       $select_column = array("p.id", "p.title", "p.slug", "c.title as category", 'p.date', 'a.name as posted_by', 'p.created_on');  
       $order_column = array(null, "p.id", "p.title", 'c.title', 'p.date', 'p.posted_by', 'p.created_on');  
         
       $this->db->select($select_column);
       $this->db->from('mh_posts p');
       $this->db->join('mh_category c', 'c.id = p.category', 'left');
       $this->db->join('mh_author a', 'a.id = p.posted_by', 'left');
       $this->db->where('p.schedule >=', date('Y-m-d H:i:s'));
       $this->db->where('p.status', 5);
       if(isset($_POST["search"]["value"])){
       $this->db->group_start();    
           $this->db->like("p.id", $_POST["search"]["value"]);  
           $this->db->or_like("p.title", $_POST["search"]["value"]);
           $this->db->or_like("p.date", $_POST["search"]["value"]);
           $this->db->or_like("c.title", $_POST["search"]["value"]);
           $this->db->or_like("p.posted_by", $_POST["search"]["value"]);
           $this->db->or_like("p.created_on", $_POST["search"]["value"]);
       $this->db->group_end();
       }
       if(isset($_POST["order"]))  
       {  
           $this->db->order_by($order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
       }  
       else  
       {  
           $this->db->order_by('p.id', 'DESC');  
       }  	
   }

   public function updateStatus(Type $var = null)
   {
        date_default_timezone_set('Asia/Kolkata');
        $this->db->where('schedule <=', date('Y-m-d H:i:s'));
        $this->db->where('status',5);
        $query=$this->db->get('mh_posts');
            
        if($query->num_rows()>0){
            
            $this->db->where('schedule <=', date('Y-m-d H:i:s'));
            $this->db->where('status',5);
            $this->db->update('mh_posts', array('status' => 1));
            if($this->db->affected_rows()>0){
                return true;
            }else{
                return false;
            }
        }
   }
   function get_schedule_data()  
   {  
         $this->db->where('status',5); 
        $this->db->from('mh_posts');  
        return $this->db->count_all_results();  
   }
   function get_schedule_filtered_data(){  
     $this->make_schedule_query();  
     $query = $this->db->get();  
     return $query->num_rows();  
 } 


}
/* End of file m_post.php */
