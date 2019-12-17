<?php


class M_Evaluasi extends CI_Model
{
	function getAllEvaluasi(){
		$this->db->select('*');
		$this->db->from('evaluasi');
		$this->db->join('user', 'evaluasi.idatlet = user.iduser');
		$data = $this->db->get();
		return $data;
	}

	function simpanEvaluasi($data){
		$redirect       =  base_url()."Admin/evaluasi";

		$insert = $this->db->insert('evaluasi',$data);
		if($insert){
			$response['status']     = "success";
			$response['message']    = "Simpan Evaluasi berhasil";
			$response['redirect']   = $redirect;

			$response = json_encode($response);
			echo $response;
		}else{
			$response['status']     = "error";
			$response['message']    = "Gagal menyimpan, coba lagi nanti";

			$response = json_encode($response);
			echo $response;
		}
	}
}
