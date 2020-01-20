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

    	$this->db->where('iduser',$idUser);
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
					'id'        => $user['iduser'],
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
    	$user = $this->getSingleUser($data['iduser'])->result();
		$redirect       =  base_url()."Dashboard/";

    	foreach ($user as $val){
    		$old_pass =  $this->encrypt->decode($val->password);
		}

    	if ($data['passwordlama'] == $old_pass){
    		$data_update = array(
    			'password'=>$this->encrypt->encode($data['passwordbaru'])
			);

    		$this->db->where('iduser',$data['iduser']);
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

    function getSingleUser($iduser){
        $this->db->where('iduser',$iduser);
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
}
