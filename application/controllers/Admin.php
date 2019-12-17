<?php

/**
 * Created by PhpStorm.
 * User: Glory
 * Date: 28/08/2019
 * Time: 14:12
 */
class Admin extends CI_Controller
{
    var $gallerypath;
    var $userSession;
    function __construct()
    {
        parent::__construct();
        $this->load->helper(array('url'));
        $this->load->library(array('form_validation','encryption','pagination','session'));
        $this->load->model('M_Akun');
        $this->load->model('M_Evaluasi');

        $this->userSession = $this->session->userdata();

        $level      = $this->userSession['level'];
        if($level != "") {

        }else {
            redirect("Auth/loginPelatih");
        }
    }

    function index(){

    	$data['jml_atlet'] = $this->M_Akun->getAllAtlet()->num_rows();
    	$data['jml_evaluasi'] = $this->M_Evaluasi->getAllEvaluasi()->num_rows();

        $this->load->view('part_admin/header');
        $this->load->view('part_admin/sidebar_pelatih');
        $this->load->view('pelatih/dashboard',$data);
        $this->load->view('part_admin/footer');
    }

    function atlet(){

    	$data['atlet'] = $this->M_Akun->getAllAtlet()->result();

		$this->load->view('part_admin/header');
		$this->load->view('part_admin/sidebar_pelatih');
		$this->load->view('pelatih/data_atlet',$data);
		$this->load->view('part_admin/footer');
	}

	function evaluasi(){

		$data['evaluasi'] = $this->M_Evaluasi->getAllEvaluasi()->result();

		$this->load->view('part_admin/header');
		$this->load->view('part_admin/sidebar_pelatih');
		$this->load->view('pelatih/data_evaluasi',$data);
		$this->load->view('part_admin/footer');
	}

	function addEvaluasi(){
		$data['atlet'] = $this->M_Akun->getAllAtlet()->result();

		$this->load->view('part_admin/header');
		$this->load->view('part_admin/sidebar_pelatih');
		$this->load->view('pelatih/tambah_evaluasi',$data);
		$this->load->view('part_admin/footer');
	}

	function hapusAtlet(){
    	$iduser = $this->input->post('iduser');

    	$this->M_Akun->deleteUser($iduser);
	}


}
