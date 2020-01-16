<?php 


defined('BASEPATH') OR exit('No direct script access allowed');

class M_author extends CI_Model {

    public function make_query()
	{
		$select_column = array("id", "name", "email", "phone", "profile", "status");  
		$order_column = array("NULL", "name","email", "phone", "NULL");  
		  
		$this->db->select($select_column);
		$this->db->from('mh_author');
		if(isset($_POST["search"]["value"])){

            $this->db->like("id", $_POST["search"]["value"]);  
            $this->db->or_like("name", $_POST["search"]["value"]);
            $this->db->or_like("email", $_POST["search"]["value"]);
            $this->db->or_like("phone", $_POST["search"]["value"]);
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
           $this->db->from('mh_author');  
           return $this->db->count_all_results();  
    }

    //  add new
    public function add_author($data, $id = '')
    {
        if(!empty($id)){
            $this->db->where('id', $id)->update('mh_author', $data);
        }else{
            $this->db->insert('mh_author', $data);
        }
        if($this->db->affected_rows() > 0){ return true;}else{return false; }
    }

    //delete
    public function delete($id)
    {
        $this->db->where('id', $id)->delete('mh_author');
        if($this->db->affected_rows() > 0){ return true;}else{return false; }
    }

    // fetch single data
    public function single_data($id)
    {
        return $this->db->where('id', $id)->get('mh_author')->row();
    }

    public function block_unblock($id, $status)
    {
        $this->db->where('id', $id);
        $this->db->update('mh_author', array('status' => $status));
        if($this->db->affected_rows()){
            return true;
        }else{
            return false;
        }
        
        
    }
  

}

/* End of file M_author.php */
