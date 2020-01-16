<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class m_twitter extends CI_Model {

    public function make_query()
	{
		$select_column = array("id", "embed", "created_on");  
        $order_column = array("id", "embed", "created_on", 'null'); 

        $this->db->where('status', 1);
		$this->db->select($select_column);
        $this->db->from('mh_twitter_post');
        
		if(isset($_POST["search"]["value"])){
            $this->db->group_start();
                $this->db->like("id", $_POST["search"]["value"]);  
                $this->db->or_like("embed ", $_POST["search"]["value"]);
                $this->db->or_like("created_on ", $_POST["search"]["value"]);
            $this->db->group_end();
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
           $this->db->from('mh_twitter_post');  
           return $this->db->count_all_results();  
    }
    
    //  add new
    public function add_twitter($data, $id = '')
    {
        if(!empty($id)){
            $this->db->where('id', $id)->update('mh_twitter_post', $data);
        }else{
            $this->db->insert('mh_twitter_post', $data);
        }
        if($this->db->affected_rows() > 0){ return true;}else{return false; }
    }
    
    //delete
    public function delete($id)
    {
        $this->db->where('id', $id)->update('mh_twitter_post', array('status' => 0));
        if($this->db->affected_rows() > 0){ 
            return true;
        }
        else{
            return false; 
        }
    }

    




    // fetch single data
    public function single_data($id)
    {
        return $this->db->where('id', $id)->get('mh_twitter_post')->row();
    }


}

/* End of file m_twitter.php */
