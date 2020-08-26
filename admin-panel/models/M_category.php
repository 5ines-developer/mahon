<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class m_category extends CI_Model {

    public function make_query()
	{
		$select_column = array("id", "title", "created_on");  
        $order_column = array("id", "title", "created_on", 'null'); 

        $this->db->where('status', 1);
		$this->db->select($select_column);
        $this->db->from('mh_category');
        
		if(isset($_POST["search"]["value"])){
            $this->db->group_start();
                $this->db->like("id", $_POST["search"]["value"]);  
                $this->db->or_like("title", $_POST["search"]["value"]);
                $this->db->or_like("created_on", $_POST["search"]["value"]);
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
           $this->db->from('mh_category');  
           return $this->db->count_all_results();  
    }
    
    //  add new
    public function add_category($data, $id = '')
    {
        if(!empty($id)){
            $this->db->where('id', $id)->update('mh_category', $data);
        }else{
            $this->db->insert('mh_category', $data);
        }
        if($this->db->affected_rows() > 0){ return true;}else{return false; }
    }
    
    //delete
    public function delete($id)
    {
        $this->db->where('id', $id)->update('mh_category', array('status' => 0));
        if($this->db->affected_rows() > 0){ 
            $this->deleteSubCategory($id);
            $this->deletePots($id);
            return true;
        }
        else{
            return false; 
        }
    }

    public function deleteSubCategory($id)
    {
        $this->db->where('main_category', $id)->update('mh_sub_category', array('status' => 0));
        return true;
    }

    public function deletePots($id)
    {
        $this->db->where('category', $id)->update('mh_posts', array('status' => 0));
        return true;
    }




    // fetch single data
    public function single_data($id)
    {
        return $this->db->where('id', $id)->get('mh_category')->row();
    }


    // subcategory
    public function sub_category($id = null)
    {
        $result = $this->db->where('status', 1)->get('mh_category')->result();
        foreach ($result as $key => $value) {
            $value->sub = $this->getSubcategory($value->id);
        }
        return $result;
    }

    public function getSubcategory($id = null)
    {
        return $this->db->select('title, id')->where('status', 1)->where('main_category', $id)->get('mh_sub_category')->result();
    }

    // add subcategory
    public function add_sub_category($data = null)
    {
        $this->db->insert('mh_sub_category', $data);
        if($this->db->affected_rows() > 0){ return true;}else{return false; }
    }

    // delete sub category
    public function deleteSub($id = null)
    {
        $this->db->where('id', $id)->update('mh_sub_category', array('status' => 2));
        if($this->db->affected_rows() > 0){ 
            // $this->deleteSubCategoryTrash($id);
            return true;
        }
        else{
            return false; 
        }
    }
    // move to trash sub post
    public function deleteSubCategoryTrash($id)
    {
        $this->db->where('category', $id)->update('scategory', array('status' => 0));
        return true;
    }


    // edit sub category
    public function editSub($data = null, $id = null)
    {
        $this->db->where('id', $id);
        $this->db->update('mh_sub_category', $data);
        if($this->db->affected_rows() > 0){ return true;}else{return false; }
    }
}

/* End of file m_category.php */
