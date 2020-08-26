<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class M_playlist extends CI_Model {

    public function make_query()
	{
		$select_column = array("id", "title",   "created_on");  
		$order_column = array("null", "title", "created_on", 'null');  
		  
		$this->db->select($select_column);
        $this->db->from('mh_playlist');

		if(isset($_POST["search"]["value"])){

            $this->db->like("id", $_POST["search"]["value"]);  
           
            $this->db->or_like("created_on", $_POST["search"]["value"]);
		}
		if(isset($_POST["order"]))  
        {  
             $this->db->order_by($order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
        }  
        else  
        {  
             $this->db->order_by('id', 'DESC');  
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
           $this->db->from('mh_playlist');  
           return $this->db->count_all_results();  
    }
    
    //  add new
    public function add($data, $id = '')
    {
        if(!empty($id)){
            $this->db->where('id', $id);
            $query = $this->db->get('mh_playlist')->row();
            if(!empty($data['playlist_img'])){
                if(!empty($query->playlist_img)){
                    unlink('../'.$query->playlist_img);
                }
            }
            $this->db->where('id', $id)->update('mh_playlist', $data);
        }else{
            $this->db->insert('mh_playlist', $data);
        }
        if($this->db->affected_rows() > 0){ return true;}else{return false; }
    }
    
    //delete
    public function delete($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('mh_playlist')->row();
        
        if(!empty($query)){
            $this->db->where('id', $id);
            $this->db->delete('mh_playlist');
                if(!empty($query->playlist_img)){
                    unlink('../'.$query->playlist_img);
                  }

            if($this->db->affected_rows() > 0){ return true;}else{return false; }
            }else{
                return false; 
            }
    }

    // fetch single data
    public function single_data($id)
    {
       
        return $this->db->where('id', $id)->get('mh_playlist')->row();
    }

     //playlist articles
     function make_playlist_datatables($playlist_id=''){
        $this->make_playlist_query($playlist_id);
        if(!empty($_POST["length"])){  
            if($_POST["length"] != -1)  
            {  
                $this->db->limit($_POST['length'], $_POST['start']);  
            }  
        }
		$query = $this->db->get();  
		return $query->result();  
   }

   public function make_playlist_query($playlist_id)
   {
       $select_column = array("p.id", "p.title","p.tags", "p.slug", "c.title as category", 'p.date', 'a.name as posted_by', 'p.created_on','pl.title as playlist');  
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
       $this->db->where('p.playlist_id', $playlist_id);
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

        function get_playlist_all_data()  
        {  
            $this->db->select("*");  
            
            $this->db->from('mh_posts');  
            return $this->db->count_all_results();  
        }

        function get_playlist_filtered_data($playlist_id){  
            $this->make_playlist_query($playlist_id);  
            $query = $this->db->get();  
            return $query->num_rows();  
        }

    
}
