<?php

/**
 * Created by PhpStorm.
 * User: Glory
 * Date: 31/08/2019
 * Time: 10:31
 */
class M_Akun extends CI_Model
{

    function saveUser($data){
    	$username = $data['username'];
    	$encoded_password = $this->encrypt->encode($data['password']);
    	$data['password'] = $encoded_password;

    	$this->db->select('*');
    	$this->db->from('user');
    	$this->db->where('username',$username);
    	$cek_username = $this->db->get()->num_rows();

    	if ($cek_username > 0){
			$response['status']     = "error";
			$response['message']    = "Username sudah digunakan, silakan gunakan username lain";

			$response = json_encode($response);
			echo $response;
		}else{
			$query =  $this->db->insert('user',$data);
			$redirect       =  base_url()."Auth";

			if($query){
				$response['status']     = "success";
				$response['message']    = "Pendaftaran berhasil ! , Silahkan Login";
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

    function deleteUser($idUser){
		$redirect       =  base_url()."Admin/atlet";

    	$this->db->where('idatlet',$idUser);
    	$query = $this->db->delete('user');

		if($query){
			$response['status']     = "success";
			$response['message']    = "Hapus data berhasil";
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

    function cekSignInUser($data){
        $username = $data ['username'];
        $password = $data ['password'];

        $q = $this->db->query("SELECT * FROM `user` WHERE `username` = '$username' ");

        if(count($q->result()) > 0){

            $user = $q->result_array()[0];
            $decoded_pass = $this->encrypt->decode($user['password']);

            if ($decoded_pass == $password){
				$user = array(
					'nama'      => $user['nama'],
					'id'        => $user['idatlet'],
					'level'     => "atlet"
				);

				$this->session->set_userdata($user);
				$response['status']     = "success";
				$response['message']    = "Login berhasil";
				$response['redirect']   = base_url()."Dashboard";

				$response = json_encode($response);
				echo $response;
			}else{
				$response['status']     = "error";
				$response['message']    = "Login gagal, periksa kembali password anda";

				$response = json_encode($response);
				echo $response;
			}


        }else{
            $response['status']     = "error";
            $response['message']    = "Login gagal, periksa kembali email / password anda";

            $response = json_encode($response);
            echo $response;
        }
    }

	function cekSignInAdmin($data){
		$username = $data ['username'];
		$password = $data ['password'];

		$q = $this->db->query("SELECT * FROM `admin` WHERE `username` = '$username' ");

		if(count($q->result()) > 0){

			$user = $q->result_array()[0];
			$decoded_pass = $this->encrypt->decode($user['password']);

			if ($decoded_pass == $password){
				$user = array(
					'nama'      => $user['nama'],
					'id'        => $user['idadmin'],
					'level'     => $user['level']
				);

				$this->session->set_userdata($user);
				$response['status']     = "success";
				$response['message']    = "Login berhasil";
				$response['redirect']   = base_url()."Admin";

				$response = json_encode($response);
				echo $response;
			}else{
				$response['status']     = "error";
				$response['message']    = "Login gagal, periksa kembali password anda";

				$response = json_encode($response);
				echo $response;
			}


		}else{
			$response['status']     = "error";
			$response['message']    = "Login gagal, periksa kembali email / password anda";

			$response = json_encode($response);
			echo $response;
		}
	}

    function updatePasswordUser($data){
    	$user = $this->getSingleUser($data['idatlet'])->result();
		$redirect       =  base_url()."Dashboard/";

    	foreach ($user as $val){
    		$old_pass =  $this->encrypt->decode($val->password);
		}

    	if ($data['passwordlama'] == $old_pass){
    		$data_update = array(
    			'password'=>$this->encrypt->encode($data['passwordbaru'])
			);

    		$this->db->where('idatlet',$data['idatlet']);
    		$update =  $this->db->update('user',$data_update);

    		if ($update){
				$response['status']     = "success";
				$response['message']    = "Data berhasil di ubah";
				$response['redirect']   = $redirect;

				$response = json_encode($response);
				echo $response;
			}else{
				$response['status']     = "error";
				$response['message']    = "Gagal menyimpan perubahan, coba lagi nanti";

				$response = json_encode($response);
				echo $response;
			}

		}else{
			$response['status']     = "error";
			$response['message']    = "Password lama salah";

			$response = json_encode($response);
			echo $response;
		}
	}

	function updatePasswordAdmin($data){
		$dataAdmin = $this->getSingleAdmin($data['idadmin'])->result();
		$redirect       =  base_url()."Admin/";

		foreach ($dataAdmin as $val){
			$old_pass =  $this->encrypt->decode($val->password);
		}

		if ($data['passwordlama'] == $old_pass){
			$data_update = array(
				'password'=>$this->encrypt->encode($data['passwordbaru'])
			);

			$this->db->where('idadmin',$data['idadmin']);
			$update =  $this->db->update('admin',$data_update);

			if ($update){
				$response['status']     = "success";
				$response['message']    = "Data berhasil di ubah";
				$response['redirect']   = $redirect;

				$response = json_encode($response);
				echo $response;
			}else{
				$response['status']     = "error";
				$response['message']    = "Gagal menyimpan perubahan, coba lagi nanti";

				$response = json_encode($response);
				echo $response;
			}

		}else{
			$response['status']     = "error";
			$response['message']    = "Password lama salah";

			$response = json_encode($response);
			echo $response;
		}
	}

	function updateProfilUser($data,$profil){
    	$username = $data['username'];
		$redirect       =  base_url()."Dashboard/profil";

    	$this->db->where('username',$username);
    	$cek = $this->db->get('user')->num_rows();

    	if ($cek > 0){
    		if ($data['username'] == $profil['username']){
				$idatlet = $data['idatlet'];
				unset($data['idatlet']);

				$this->db->where('idatlet',$idatlet);
				$update = $this->db->update('user',$data);

				if ($update){
					$response['status']     = "success";
					$response['message']    = "Data berhasil di ubah";
					$response['redirect']   = $redirect;

					$response = json_encode($response);
					echo $response;
				}else{
					$response['status']     = "error";
					$response['message']    = "Gagal menyimpan perubahan, coba lagi nanti";

					$response = json_encode($response);
					echo $response;
				}
			}else{
				$response['status']     = "error";
				$response['message']    = "Username telah digunakan";

				$response = json_encode($response);
				echo $response;
			}

		}else{
    		$idatlet = $data['idatlet'];
    		unset($data['idatlet']);

    		$this->db->where('idatlet',$idatlet);
    		$update = $this->db->update('user',$data);

			if ($update){
				$response['status']     = "success";
				$response['message']    = "Data berhasil di ubah";
				$response['redirect']   = $redirect;

				$response = json_encode($response);
				echo $response;
			}else{
				$response['status']     = "error";
				$response['message']    = "Gagal menyimpan perubahan, coba lagi nanti";

				$response = json_encode($response);
				echo $response;
			}


		}



	}

    function getSingleUser($idatlet){
        $this->db->where('idatlet',$idatlet);
        $data = $this->db->get("user");
        return $data;
    }

	function getSingleAdmin($id){
		$this->db->where('idadmin',$id);
		$data = $this->db->get("admin");
		return $data;
	}

    function getAllAtlet(){
		$data = $this->db->get("user");
		return $data;
	}

	function getAllPelatih(){
    	$this->db->where('level','pelatih');
		$data = $this->db->get("admin");
		return $data;
	}

	function getAtletByJenis($jenis){
    	$this->db->where('jenis',$jenis);
		$data = $this->db->get("user");
		return $data;
	}

    function updateFoto($idPelangan,$foto){
        $target_dir = "foto/pelanggan/";
        $imgType    = substr($foto['type'],strpos( $foto['type'],"/") + 1);
        $nmfile     = "file_".time() . "." . $imgType;
        $targetFile = $target_dir . $nmfile;
        $uploaded   = move_uploaded_file($foto['tmp_name'],$targetFile);

        $data_update = array(
            'foto'=>$nmfile
        );
        $redirect       =  base_url()."User/gantiPassword";

        if($uploaded){
            $this->db->where("id_pelanggan",$idPelangan);
            $query =  $this->db->update('tb_pelanggan',$data_update);

            if($query){
                $response['status']     = "success";
                $response['message']    = "Data berhasil disimpan";
                $response['redirect']   = $redirect;

                $response = json_encode($response);
                echo $response;
            }else{
                $response['status']     = "error";
                $response['message']    = "Gagal menyimpan, coba lagi nanti";

                $response = json_encode($response);
                echo $response;
            }

        }else{
            $response['status']     = "error";
            $response['message']    = "Upload gagal, coba lagi nanti";

            $response = json_encode($response);
            echo $response;
        }
    }


    function simpanPelatih($data){
    	$username = $data['username'];
		$redirect       =  base_url()."Admin/listPelatih";

		$this->db->where('username',$username);
		$cek = $this->db->get('admin')->num_rows();

		if ($cek > 0){
			$response['status']     = "error";
			$response['message']    = "Username telah digunakan";

			$response = json_encode($response);
			echo $response;
		}else{
			$encoded_password = $this->encrypt->encode($data['password']);
			$data['password'] = $encoded_password;
			$data['level'] = "pelatih";

			$query =  $this->db->insert('admin',$data);

			if($query){
				$response['status']     = "success";
				$response['message']    = "Data berhasil disimpan";
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

	function deletePelatih($idadmin){
		$redirect       =  base_url()."Admin/listPelatih";

		$this->db->where('idadmin',$idadmin);
		$query = $this->db->delete('admin');

		if($query){
			$response['status']     = "success";
			$response['message']    = "Hapus data berhasil";
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

	function deleteAtlet($idatlet){
		$redirect       =  base_url()."Admin/atlet";

		$this->db->where('idatlet',$idatlet);
		$query = $this->db->delete('user');

		if($query){
			$response['status']     = "success";
			$response['message']    = "Hapus data berhasil";
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
