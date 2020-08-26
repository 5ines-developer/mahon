<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_subadmin extends CI_Model {

	// add subadmin
	public function add($data='')
	{
		$this->db->where('reference_d', $data['reference_d']);
		$query = $this->db->get('admin');
		if($query->num_rows() > 0){
			$this->db->where('reference_d', $data['reference_d'])->update('admin',$data);
			if ($this->db->affected_rows() > 0) {
				return true;
			}else{
				return false;
			}
		}else{
			$this->db->insert('admin', $data);
			if ($this->db->affected_rows() > 0) {
				return true;
			}else{
				return false;
			}
		}
	}

	// get subadmins
	public function getsub($value='')
	{
		return $this->db->where('admin_type', 2)->get('admin')->result();
	}

	public function edit($id='')
	{
		return $this->db->where('admin_type', 2)->where('id', $id)->get('admin')->row();
	}

	public function update($data='',$id='')
	{
		$this->db->where('id', $id)->where('admin_type', 2)->update('admin',$data);
		if ($this->db->affected_rows() > 0) {
			return true;
		}else{
			return false;
		}
	}

	public function delete($id='')
	{
		return $this->db->where('id', $id)->where('admin_type', 2)->delete('admin');
	}

	public function setPass($id='',$newpass='')
	{
		$this->db->where('reference_d', $id);
		$this->db->update('admin',array('is_active'=>1,'password' => $newpass,'reference_d'=>random_string('alnum',16)));
		if ($this->db->affected_rows() > 0) {
			return true;
		}else{
			return false;
		}
	}

	public function staschange($id='',$status='')
	{
		return $this->db->where('id', $id)->where('admin_type', 2)->update('admin',array('is_active' => $status));
	}

	

}

/* End of file m_subadmin.php */
/* Location: .//C/xampp/htdocs/mahonnathi/admin-panel/models/m_subadmin.php */