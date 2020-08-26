<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_widget extends CI_Model {

	public function getwidget($id='')
	{
		if(!empty($id)){
			$this->db->where('id', $id);
		}
		return $this->db->get('states')->result();
	}

	public function update($insert='',$id='')
	{
		$this->db->where('id', $id)->update('states',$insert);
		if ($this->db->affected_rows() > 0) {
			return true;
		}else{
			return false;
		}
	}
	

}
/* End of file M_widget.php */
/* Location: .//C/xampp/htdocs/mahonnathi/admin-panel/models/M_widget.php */