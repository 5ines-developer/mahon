<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class m_post extends CI_Model {

    public function make_query()
	{
		$select_column = array("p.id", "p.title", "c.title as category", 'p.date', 'a.name as posted_by', 'p.created_on');  
		$order_column = array(null, "p.id", "p.title", 'c.title', 'p.date', 'p.posted_by', 'p.created_on');  
		  
		$this->db->select($select_column);
        $this->db->from('mh_posts p');
        $this->db->join('mh_category c', 'c.id = p.category', 'left');
        $this->db->join('mh_author a', 'a.id = p.posted_by', 'left');
        $this->db->where('p.status', 1);
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

	function make_datatables(){  
		$this->make_query();  
		if($_POST["length"] != -1)  
		{  
			 $this->db->limit($_POST['length'], $_POST['start']);  
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
        $select_column = array("p.id", "p.title", "c.title as category", 'p.date', 'a.name as posted_by', 'p.created_on', 'p.slug', 'p.content', 'p.tags', 'p.image', 
        'fb.pageid as fbid', 'fb.title as fbtitle', 'fb.site_name as fbsite', 'fb.url as fburl', 'fb.img_url as fbimg', 'fb.descr as fbdes', 'p.realted', 'p.scategory',
        'pp.title as page_title', 'pp.keyword as page_keyword', 'pp.descr as page_descr',
        't.card as tw_card', 't.title as tw_title', 't.card as tw_card', 't.site_name as tw_site_name', 't.url as tw_url', 't.img_url as tw_img_url', 't.descr as tw_descr',

    ); 
        $this->db->select($select_column);
        $this->db->from('mh_posts p');
        $this->db->join('mh_category c', 'c.id = p.category', 'left');
        $this->db->join('mh_author a', 'a.id = p.posted_by', 'left');
        $this->db->join('mh_post_fb fb', 'fb.postid = p.id', 'left');
        $this->db->join('mh_post_page pp', 'pp.post_id = p.id', 'left');
        $this->db->join('mh_twitter t', 't.post_id = p.id', 'left');
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

    // subcategory
    public function choose_sub_category($id = null)
    {
        return $this->db->where('main_category', $id)->get('mh_sub_category')->result();
    }

    
}
/* End of file m_post.php */
