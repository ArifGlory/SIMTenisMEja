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

    function __construct()
    {
        parent::__construct();
        $this->load->helper(array('url'));
        $this->load->library(array('form_validation','encrypt','pagination','session'));
        $this->load->model('M_Akun');
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



    function logout(){
        session_destroy();
        redirect(base_url());
    }





}
