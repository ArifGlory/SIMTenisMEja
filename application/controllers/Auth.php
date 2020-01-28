<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 * User: Glory
 * Date: 12/07/2019
 * Time: 08:51
 */
class Auth extends CI_Controller
{
	var $userSession;
    function __construct()
    {
        parent::__construct();
        $this->load->helper(array('url'));
        $this->load->library(array('form_validation','encrypt','pagination','session'));
        $this->load->model('M_Akun');
		$this->userSession = $this->session->userdata();
    }

    function index(){
        $this->load->view('atlet/login_admin');
    }

    function loginPelatih(){
		$this->load->view('pelatih/login');
	}

    function daftarUser(){
		$this->load->view('parts/header');
		$this->load->view('user/daftar');
		$this->load->view('parts/footer');
	}
       
    function signInUser(){
    	$data = $_POST;
       	$this->M_Akun->cekSignInUser($data);
    }

	function signInAdmin(){
		$data = $_POST;
		$this->M_Akun->cekSignInAdmin($data);
	}

    function createUser(){
		$data = $_POST;
		$this->M_Akun->saveUser($data);
	}

	function setting(){
    	$level = $this->userSession['level'];
    	if($level == "atlet"){
			$data['profil'] = $this->M_Akun->getSingleUser($this->userSession['id'])->result_array()[0];
		}else{
			$data['profil'] = $this->M_Akun->getSingleAdmin($this->userSession['id'])->result_array()[0];
		}

		$this->load->view('part_admin/header');
		$this->load->view('part_admin/sidebar');
		$this->load->view('user/change_password',$data);
		$this->load->view('part_admin/footer');

	}

	function editProfiluser(){
		$data['profil'] = $this->M_Akun->getSingleUser($this->userSession['id'])->result_array()[0];

		$this->load->view('part_admin/header');
		$this->load->view('part_admin/sidebar');
		$this->load->view('atlet/change_profil_atlet',$data);
		$this->load->view('part_admin/footer');
	}

	function updateProfilUser(){
		$data = $_POST;
		$profil = $this->M_Akun->getSingleUser($this->userSession['id'])->result_array()[0];

		$this->M_Akun->updateProfilUser($data,$profil);
	}

	function changePassword(){
		$data = $_POST;
		$level = $this->userSession['level'];
		if($level == "atlet"){
			$this->M_Akun->updatePasswordUser($data);
		}else{
			$this->M_Akun->updatePasswordAdmin($data);
		}

	}

    function logout(){
        session_destroy();
        redirect(base_url());
    }





}
