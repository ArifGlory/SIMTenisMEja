<?php

/**
 * Created by PhpStorm.
 * User: Glory
 * Date: 28/08/2019
 * Time: 14:12
 */
class Dashboard extends CI_Controller
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
            redirect("Auth");
        }
    }

    function index(){

    	$data['evaluasi'] = array();

        $this->load->view('part_admin/header');
        $this->load->view('part_admin/sidebar');
        $this->load->view('atlet/dashboard',$data);
        $this->load->view('part_admin/footer');
    }

    function profil(){
		$data['profil'] = $this->M_Akun->getSingleUser($this->userSession['id'])->result_array()[0];

		$this->load->view('part_admin/header');
		$this->load->view('part_admin/sidebar');
		$this->load->view('atlet/profil',$data);
		$this->load->view('part_admin/footer');
	}

	function ranking(){
		$data['rank'] = $this->M_Evaluasi->getRankByEvaluasi()->result();


		foreach ($data['rank'] as $val){
			if ($val->totalnya == null){
				$val->totalnya = 0;
			}

			if ($val->idatlet == null){
				$val->idatlet = 0;
			}
		}

		$this->load->view('part_admin/header');
		$this->load->view('part_admin/sidebar');
		$this->load->view('atlet/data_ranking',$data);
		$this->load->view('part_admin/footer');
	}


}
