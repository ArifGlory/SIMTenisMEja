<?php


class M_Evaluasi extends CI_Model
{
	function getAllEvaluasi(){
		$this->db->select('*');
		$this->db->from('evaluasi');
		$this->db->join('user', 'evaluasi.idatlet = user.iduser');
		$this->db->order_by('tanggal',"ASC");
		$data = $this->db->get();
		return $data;
	}

	function getMyEvaluasi($idAtlet,$limit){
		$this->db->select('*');
		$this->db->from('evaluasi');
		$this->db->join('user', 'evaluasi.idatlet = user.iduser');
		$this->db->where('idatlet',$idAtlet);
		$this->db->order_by('tanggal',"ASC");
		$this->db->limit($limit);
		$data = $this->db->get();
		return $data;
	}

	function getSingleEvaluasi($idEvaluasi){
		$this->db->select('*');
		$this->db->from('evaluasi');
		$this->db->join('user', 'evaluasi.idatlet = user.iduser');
		$this->db->where('idevaluasi',$idEvaluasi);
		$data = $this->db->get();
		return $data;
	}

	function getSingleDetailEvaluasi($idEvaluasi){
		$this->db->select('*');
		$this->db->from('detail_evaluasi');
		$this->db->where('idevaluasi',$idEvaluasi);
		$data = $this->db->get();
		return $data;
	}

	function getRankByEvaluasi(){
		$query = $this->db->query("SELECT `idatlet`,SUM(`total_nilai`) AS `totalnya`,`user`.`nama`
		FROM `evaluasi` 
		RIGHT OUTER JOIN `user` ON `evaluasi`.`idatlet` = `user`.`iduser`
		GROUP BY `idatlet` ORDER BY `totalnya` DESC");

		return $query;
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

	function simpanDetailEvaluasi($data){
		$redirect       =  base_url()."Admin/evaluasi";

		$insert = $this->db->insert('detail_evaluasi',$data);
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

	function ubahEvaluasi($data,$idevaluasi){
		$redirect       =  base_url()."Admin/evaluasi";

		$this->db->where('idevaluasi',$idevaluasi);

		$update = $this->db->update('detail_evaluasi',$data);
		if($update){
			$response['status']     = "success";
			$response['message']    = "Ubah Evaluasi berhasil";
			$response['redirect']   = $redirect;

			$response = json_encode($response);
			echo $response;
		}else{
			$response['status']     = "error";
			$response['message']    = "Gagal mengubah, coba lagi nanti";

			$response = json_encode($response);
			echo $response;
		}

	}

	function deleteEvaluasi($idevaluasi){
		$redirect       =  base_url()."Admin/evaluasi";
		$this->db->where('idevaluasi',$idevaluasi);

		$delete = $this->db->delete('evaluasi');
		if($delete){
			$response['status']     = "success";
			$response['message']    = "Hapus Evaluasi berhasil";
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
