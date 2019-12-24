<?php

/**
 * Created by PhpStorm.
 * User: Glory
 * Date: 28/08/2019
 * Time: 14:12
 */
class Jadwal extends CI_Controller
{
    var $gallerypath;
    var $userSession;
    function __construct()
    {
        parent::__construct();
        $this->load->helper(array('url'));
        $this->load->library(array('form_validation','encryption','pagination','session'));
        $this->load->model('M_Akun');
        $this->load->model('M_Jadwal');

        $this->userSession = $this->session->userdata();

        $level      = $this->userSession['level'];
        if($level != "") {

        }else {
            redirect("Auth");
        }
    }

    function index(){

    	$data['jadwal'] = $this->M_Jadwal->getAllJadwal()->result();

        $this->load->view('part_admin/header');
        if ($this->userSession['level'] == "atlet"){
			$this->load->view('part_admin/sidebar');
		}else{
			$this->load->view('part_admin/sidebar_pelatih');
		}

        $this->load->view('pelatih/data_jadwal',$data);
        $this->load->view('part_admin/footer');
    }

	function addJadwal(){
		$this->load->view('part_admin/header');
		if ($this->userSession['level'] == "atlet"){
			$this->load->view('part_admin/sidebar');
		}else{
			$this->load->view('part_admin/sidebar_pelatih');
		}

		$this->load->view('pelatih/tambah_jadwal');
		$this->load->view('part_admin/footer');
	}



}
