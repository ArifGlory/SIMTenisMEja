<?php


class M_Jadwal extends CI_Model
{
	function getAllJadwal(){
		$this->db->select('*');
		$this->db->from('jadwal');
		$data = $this->db->get();
		return $data;
	}

	function simpanJadwal($data){
		$redirect       =  base_url()."Jadwal";

		$insert = $this->db->insert('jadwal',$data);
		if($insert){
			$response['status']     = "success";
			$response['message']    = "Simpan Jadwal berhasil";
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

	function deleteJadwal($idJadwal){
		$redirect       =  base_url()."Jadwal";
		
		$this->db->where('idjadwal',$idJadwal);

		$hapus = $this->db->delete('jadwal');
		if($hapus){
			$response['status']     = "success";
			$response['message']    = "Hapus Jadwal berhasil";
			$response['redirect']   = $redirect;

			$response = json_encode($response);
			echo $response;
		}else{
			$response['status']     = "error";
			$response['message']    = "Gagal menghapus, coba lagi nanti";

			$response = json_encode($response);
			echo $response;
		}

	}
}
