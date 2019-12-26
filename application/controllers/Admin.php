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
		$this->load->view('part_admin/sidebar_pelatih');
		$this->load->view('atlet/data_ranking',$data);
		$this->load->view('part_admin/footer');
	}

	function addEvaluasi(){
		$data['atlet'] = $this->M_Akun->getAllAtlet()->result();

		$this->load->view('part_admin/header');
		$this->load->view('part_admin/sidebar_pelatih');
		$this->load->view('pelatih/tambah_evaluasi',$data);
		$this->load->view('part_admin/footer');
	}

	function editEvaluasi($idEvaluasi){
		$data['evaluasi'] = $this->M_Evaluasi->getSingleEvaluasi($idEvaluasi)->result_array()[0];

		$this->load->view('part_admin/header');
		$this->load->view('part_admin/sidebar_pelatih');
		$this->load->view('pelatih/edit_evaluasi',$data);
		$this->load->view('part_admin/footer');
	}

	function simpanEvaluasi(){
    	$data = $this->input->post();

    	$total = $data['backhand'] + $data['forehand'] + $data['chop'] + $data['blok'] + $data['spin'] + $data['gerakankaki'] + $data['fisik'];

    	if ($total > 700){
    		$total = 700;
		}
    	$total = $total / 7;

    	if ($total < 70){
    		$kategori_nilai = "Kurang";
		}else if ($total >= 70 && $total <80 ){
			$kategori_nilai = "Cukup";
		}else if ($total >= 80 && $total <90 ){
			$kategori_nilai = "Baik";
		}else if ($total >= 90){
			$kategori_nilai = "Sangat Baik";
		}
    	$data['total_nilai'] = $total;
    	$data['kategori_nilai'] = $kategori_nilai;

    	$this->M_Evaluasi->simpanEvaluasi($data);
	}

	function updateEvaluasi(){
		$data = $this->input->post();

		$total = $data['backhand'] + $data['forehand'] + $data['chop'] + $data['blok'] + $data['spin'] + $data['gerakankaki'] + $data['fisik'];

		if ($total > 700){
			$total = 700;
		}
		$total = $total / 7;

		if ($total < 70){
			$kategori_nilai = "Kurang";
		}else if ($total >= 70 && $total <80 ){
			$kategori_nilai = "Cukup";
		}else if ($total >= 80 && $total <90 ){
			$kategori_nilai = "Baik";
		}else if ($total >= 90){
			$kategori_nilai = "Sangat Baik";
		}
		$data['total_nilai'] = $total;
		$data['kategori_nilai'] = $kategori_nilai;

		$this->M_Evaluasi->ubahEvaluasi($data);
	}

	function hapusEvaluasi(){
    	$idevaluasi = $this->input->post('idevaluasi');

    	$this->M_Evaluasi->deleteEvaluasi($idevaluasi);
	}


}
