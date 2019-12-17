<?php


class M_Evaluasi extends CI_Model
{
	function getAllEvaluasi(){
		$data = $this->db->get("evaluasi");
		return $data;
	}
}
