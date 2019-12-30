<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class m_events extends CI_Model {

    public function make_query()
	{
		$select_column = array("id", "title", "date");  
        $order_column = array("id", "title", "date", 'null'); 

        $this->db->where('status', 1);
		$this->db->select($select_column);
        $this->db->from('mh_events');
        
		if(isset($_POST["search"]["value"])){
            $this->db->group_start();
                $this->db->like("id", $_POST["search"]["value"]);  
                $this->db->or_like("title", $_POST["search"]["value"]);
                $this->db->or_like("date", $_POST["search"]["value"]);
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
           $this->db->from('mh_events');  
           return $this->db->count_all_results();  
    }
    
    //  add new
    public function add_events($data, $id = '')
    {
        if(!empty($id)){
            $this->db->where('id', $id)->update('mh_events', $data);
        }else{
            $this->db->insert('mh_events', $data);
        }
        if($this->db->affected_rows() > 0){ return true;}else{return false; }
    }
    
    //delete
    public function delete($id)
    {
        $this->db->where('id', $id)->update('mh_events', array('status' => 0));
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
        return $this->db->where('id', $id)->get('mh_events')->row();
    }

    // newsletter subscribers
    public function news_letter()
    {
        $this->db->order_by('id', 'desc');
        return $this->db->get('mh_newsletter')->result();
    }

    // news letter delete
    public function news_letter_delete($id)
    {
       $this->db->where('id', $id)->delete('mh_newsletter');
       if($this->db->affected_rows() > 0){ 
        return true;
        }
        else{
            return false; 
        }
    }

}

/* End of file m_events.php */
