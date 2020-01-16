<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class m_photo extends CI_Model {

  

	
  

    // app post
    public function addPost($data = null, $id = null)
    {
        if(!empty($id)){
            $this->db->where('id', $id);
            $this->db->update('mh_photos', $data);
            if( $this->db->affected_rows() > 0 ){
                $data = array('status' => 1, 'id' => $this->db->insert_id());
            }else{
                    $data = array('status' => 0,);
            }
            return $data;
        }
        else{
            $this->db->insert('mh_photos', $data);
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
            $this->db->update('mh_photo_post_page', $data);
            return true;
        }
        else{
            $this->db->insert('mh_photo_post_page', $data);
            return true;
        }
    }

    // add page fb
    public function addFbMeta($data = null, $id = null)
    {
        if(!empty($id)){
            $this->db->where('postid', $id);
            $this->db->update('mh_photo_post_fb', $data);
            return true;
        }
        else{
            $this->db->insert('mh_photo_post_fb', $data);
            return true;
        }
    }

    // add page twitter
    public function addTwitMeta($data = null, $id = null)
    {
        if(!empty($id)){
            $this->db->where('post_id', $id);
            $this->db->update('mh_photo_twitter', $data);
            return true;
        }
        else{
            $this->db->insert('mh_photo_twitter', $data);
            return true;
        }
    }

   public function addImages($data = null, $id=null)
   {
       
     
        if(!empty($id)){
            $this->db->where('post_id', $id);
            $this->db->update('mh_photo_gallery', $data);
            return true;
        }
        else{
            $this->db->insert('mh_photo_gallery', $data);
            return true;
        }
   }

   public function getImage()
   {
       $result = $this->db->where('status', 1)
       ->order_by('id', 'desc')
       ->get('mh_photos')
       ->result();
       foreach ($result as $key => $value) {
           $value->count = $this->countOfImages($value->id);
           $value->image = $this->image($value->id);
       }
       return $result;
   }

   public function countOfImages($id = null)
   {
     return  $this->db->where('photo_id', $id)->count_all_results('mh_photo_gallery');
   }

   public function image($id = null)
   {
       return  $this->db->where('photo_id', $id)->select('*')->get('mh_photo_gallery')->row_array();
   }

}
/* End of file m_photo.php */
