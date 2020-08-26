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
       $result = $this->db->where('p.status', 1)
       ->order_by('p.id', 'desc')
       ->from('mh_photos p')
       ->join('mh_category c', "c.id = p.category", 'left')
       ->select('p.*, c.title as acategory')
       ->get()
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

    public function delete($id = null)
    {
        $this->db->where('id', $id)->delete('mh_photos');
        if( $this->db->affected_rows()>0):
            return true;
        else:
            return false;
        endif;
    }

        public function insertAlbum($data='')
    {
      $this->db->insert('mh_photo_album', $data);
      return $this->db->insert_id();
    }

    public function albumImages($data='')
    {
      return $this->db->insert('mh_pht_albums', $data);
    }

    public function getAlbum($value='')
    {
      $result = $this->db->get('mh_photo_album')->result();
      if(!empty($result)){
        foreach ($result as $key => $value) {
          $value->count = $this->countAlbum($value->id);
        }
      }
      return $result;
    }

    public function countAlbum($id='')
    {
      return $this->db->where('post_id', $id)->count_all_results('mh_pht_albums');
    }

    public function albumDelete($id = null)
    {

        $query = $this->db->where('id', $id)->get('mh_photo_album')->row();

        if(!empty($query)){
          $this->db->where('id', $id)->delete('mh_photo_album');
          if($this->db->affected_rows()>0):
            unlink($query->f_image);
            $this->salbmdelete($id);
              return true;
          else:
              return false;
          endif;
        }else{
          return false;
        }
    }

    public function salbmdelete($id='')
    {
      return $this->db->where('post_id', $id)->delete('mh_pht_albums');
    }

}
/* End of file m_photo.php */
