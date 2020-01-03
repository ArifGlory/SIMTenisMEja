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
		$data['evaluasi'] 	= $this->M_Evaluasi->getSingleEvaluasi($idEvaluasi)->result_array()[0];
		$detail 			= $this->M_Evaluasi->getSingleDetailEvaluasi($idEvaluasi)->result_array()[0];

		$data['driveforehand'] 	= explode(',',$detail['driveforehand']);
		$data['drivebackhand'] 	= explode(',',$detail['drivebackhand']);
		$data['pushforehand'] 	= explode(',',$detail['pushforehand']);
		$data['pushbackhand'] 	= explode(',',$detail['pushbackhand']);
		$data['smashforehand'] 	= explode(',',$detail['smashforehand']);
		$data['smashbackhand'] 	= explode(',',$detail['smashbackhand']);
		$data['blockforehand'] 	= explode(',',$detail['blockforehand']);
		$data['blockbackhand'] 	= explode(',',$detail['blockbackhand']);
		$data['chopforehand'] 	= explode(',',$detail['chopforehand']);
		$data['chopbackhand'] 	= explode(',',$detail['chopbackhand']);
		$data['serviceforehand'] 	= explode(',',$detail['serviceforehand']);
		$data['servicebackhand'] 	= explode(',',$detail['servicebackhand']);


		$this->load->view('part_admin/header');
		$this->load->view('part_admin/sidebar_pelatih');
		$this->load->view('pelatih/edit_evaluasi',$data);
		$this->load->view('part_admin/footer');
	}

	function simpanEvaluasi(){
		$data = $this->input->post();

		$drive_forehand = $data['driveforehand_memegangblade']+$data['driveforehand_memukulbola']+$data['driveforehand_penempatanbola']
			+$data['driveforehand_kecepatan']+$data['driveforehand_timing'];
		$drive_forehand = $drive_forehand / 5;
		$detail_drive_forehand = $data['driveforehand_memegangblade'] . "," . $data['driveforehand_memukulbola']. "," . $data['driveforehand_penempatanbola']
			. "," . $data['driveforehand_kecepatan']. "," . $data['driveforehand_timing'];

		$drive_backhand = $data['drivebackhand_memegangblade']+$data['drivebackhand_memukulbola']+$data['drivebackhand_penempatanbola']
			+$data['drivebackhand_kecepatan']+$data['drivebackhand_timing'];
		$drive_backhand = $drive_backhand / 5;
		$detail_drive_backhand = $data['drivebackhand_memegangblade'] . "," . $data['drivebackhand_memukulbola']. "," . $data['drivebackhand_penempatanbola']
			. "," . $data['drivebackhand_kecepatan']. "," . $data['drivebackhand_timing'];

		$push_forehand = $data['pushforehand_memegangblade']+$data['pushforehand_memukulbola']+$data['pushforehand_penempatanbola']
			+$data['pushforehand_kecepatan']+$data['pushforehand_timing'];
		$push_forehand = $push_forehand / 5;
		$detail_push_forehand = $data['pushforehand_memegangblade'] . "," . $data['pushforehand_memukulbola']. "," . $data['pushforehand_penempatanbola']
			. "," . $data['pushforehand_kecepatan']. "," . $data['pushforehand_timing'];

		$push_backhand = $data['pushbackhand_memegangblade']+$data['pushbackhand_memukulbola']+$data['pushbackhand_penempatanbola']
			+$data['pushbackhand_kecepatan']+$data['pushbackhand_timing'];
		$push_backhand = $push_backhand / 5;
		$detail_push_backhand = $data['pushbackhand_memegangblade'] . "," . $data['pushbackhand_memukulbola']. "," . $data['pushbackhand_penempatanbola']
			. "," . $data['pushbackhand_kecepatan']. "," . $data['pushbackhand_timing'];

		$smash_forehand = $data['smashforehand_memegangblade']+$data['smashforehand_memukulbola']+$data['smashforehand_penempatanbola']
			+$data['smashforehand_kecepatan']+$data['smashforehand_timing'];
		$smash_forehand = $smash_forehand / 5;
		$detail_smash_forehand = $data['smashforehand_memegangblade'] . "," . $data['smashforehand_memukulbola']. "," . $data['smashforehand_penempatanbola']
			. "," . $data['smashforehand_kecepatan']. "," . $data['smashforehand_timing'];

		$smash_backhand = $data['smashbackhand_memegangblade']+$data['smashbackhand_memukulbola']+$data['smashbackhand_penempatanbola']
			+$data['smashbackhand_kecepatan']+$data['smashbackhand_timing'];
		$smash_backhand = $smash_backhand / 5;
		$detail_smash_backhand = $data['smashbackhand_memegangblade'] . "," . $data['smashbackhand_memukulbola']. "," . $data['smashbackhand_penempatanbola']
			. "," . $data['smashbackhand_kecepatan']. "," . $data['smashbackhand_timing'];

		$block_forehand = $data['blockforehand_memegangblade']+$data['blockforehand_memukulbola']+$data['blockforehand_penempatanbola']
			+$data['blockforehand_kecepatan']+$data['blockforehand_timing'];
		$block_forehand = $block_forehand / 5;
		$detail_block_forehand = $data['blockforehand_memegangblade'] . "," . $data['blockforehand_memukulbola']. "," . $data['blockforehand_penempatanbola']
			. "," . $data['blockforehand_kecepatan']. "," . $data['blockforehand_timing'];

		$block_backhand = $data['blockbackhand_memegangblade']+$data['blockbackhand_memukulbola']+$data['blockbackhand_penempatanbola']
			+$data['blockbackhand_kecepatan']+$data['blockbackhand_timing'];
		$block_backhand = $block_backhand / 5;
		$detail_block_backhand = $data['blockbackhand_memegangblade'] . "," . $data['blockbackhand_memukulbola']. "," . $data['blockbackhand_penempatanbola']
			. "," . $data['blockbackhand_kecepatan']. "," . $data['blockbackhand_timing'];

		$chop_forehand = $data['chopforehand_memegangblade']+$data['chopforehand_memukulbola']+$data['chopforehand_penempatanbola']
			+$data['chopforehand_kecepatan']+$data['chopforehand_timing'];
		$chop_forehand = $chop_forehand / 5;
		$detail_chop_forehand = $data['chopforehand_memegangblade'] . "," . $data['chopforehand_memukulbola']. "," . $data['chopforehand_penempatanbola']
			. "," . $data['chopforehand_kecepatan']. "," . $data['chopforehand_timing'];

		$chop_backhand = $data['chopbackhand_memegangblade']+$data['chopbackhand_memukulbola']+$data['chopbackhand_penempatanbola']
			+$data['chopbackhand_kecepatan']+$data['chopbackhand_timing'];
		$chop_backhand = $chop_backhand / 5;
		$detail_chop_backhand = $data['chopbackhand_memegangblade'] . "," . $data['chopbackhand_memukulbola']. "," . $data['chopbackhand_penempatanbola']
			. "," . $data['chopbackhand_kecepatan']. "," . $data['chopbackhand_timing'];

		$service_forehand = $data['serviceforehand_memegangblade']+$data['serviceforehand_memukulbola']+$data['serviceforehand_penempatanbola']
			+$data['serviceforehand_kecepatan']+$data['serviceforehand_timing'];
		$service_forehand = $service_forehand / 5;
		$detail_service_forehand = $data['serviceforehand_memegangblade'] . "," . $data['serviceforehand_memukulbola']. "," . $data['serviceforehand_penempatanbola']
			. "," . $data['serviceforehand_kecepatan']. "," . $data['serviceforehand_timing'];

		$service_backhand = $data['servicebackhand_memegangblade']+$data['servicebackhand_memukulbola']+$data['servicebackhand_penempatanbola']
			+$data['servicebackhand_kecepatan']+$data['servicebackhand_timing'];
		$service_backhand = $service_backhand / 5;
		$detail_service_backhand = $data['servicebackhand_memegangblade'] . "," . $data['servicebackhand_memukulbola']. "," . $data['servicebackhand_penempatanbola']
			. "," . $data['servicebackhand_kecepatan']. "," . $data['servicebackhand_timing'];

		$total = 	$drive_forehand + $drive_backhand + $push_forehand + $push_backhand + $smash_forehand +
			$smash_backhand + $block_forehand + $block_backhand + $chop_forehand + $chop_backhand +
			$service_forehand + $service_backhand;
		$total = $total / 12;

		if ($total < 70){
			$kategori_nilai = "Kurang";
		}else if ($total >= 70 && $total <80 ){
			$kategori_nilai = "Cukup";
		}else if ($total >= 80 && $total <90 ){
			$kategori_nilai = "Baik";
		}else if ($total >= 90){
			$kategori_nilai = "Sangat Baik";
		}


		$data_evaluasi = array(
			'idatlet'=>$data['idatlet'],
			'total_nilai'=>$total,
			'kategori_nilai'=>$kategori_nilai,
			'drive_forehand'=>$drive_forehand,
			'drive_backhand'=>$drive_backhand,
			'push_forehand'=>$push_forehand,
			'push_backhand'=>$push_backhand,
			'smash_forehand'=>$smash_forehand,
			'smash_backhand'=>$smash_backhand,
			'block_forehand'=>$block_forehand,
			'block_backhand'=>$block_backhand,
			'chop_forehand'=>$chop_forehand,
			'chop_backhand'=>$chop_backhand,
			'service_forehand'=>$service_forehand,
			'service_backhand'=>$service_backhand
		);

		$this->db->insert('evaluasi',$data_evaluasi);
		$insert_id = $this->db->insert_id();

		$data_detail_evaluasi = array(
			'idevaluasi'=>$insert_id,
			'driveforehand'=>$detail_drive_forehand,
			'drivebackhand'=>$detail_drive_backhand,
			'pushforehand'=>$detail_push_forehand,
			'pushbackhand'=>$detail_push_backhand,
			'smashforehand'=>$detail_smash_forehand,
			'smashbackhand'=>$detail_smash_backhand,
			'blockforehand'=>$detail_block_forehand,
			'blockbackhand'=>$detail_block_backhand,
			'chopforehand'=>$detail_chop_forehand,
			'chopbackhand'=>$detail_chop_backhand,
			'serviceforehand'=>$detail_service_forehand,
			'servicebackhand'=>$detail_service_backhand,
		);

		$this->M_Evaluasi->simpanDetailEvaluasi($data_detail_evaluasi);

	}

	function simpanEvaluasi_bak(){
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
    	$idevaluasi = $data['idevaluasi'];

		$drive_forehand = $data['driveforehand_memegangblade']+$data['driveforehand_memukulbola']+$data['driveforehand_penempatanbola']
			+$data['driveforehand_kecepatan']+$data['driveforehand_timing'];
		$drive_forehand = $drive_forehand / 5;
		$detail_drive_forehand = $data['driveforehand_memegangblade'] . "," . $data['driveforehand_memukulbola']. "," . $data['driveforehand_penempatanbola']
			. "," . $data['driveforehand_kecepatan']. "," . $data['driveforehand_timing'];

		$drive_backhand = $data['drivebackhand_memegangblade']+$data['drivebackhand_memukulbola']+$data['drivebackhand_penempatanbola']
			+$data['drivebackhand_kecepatan']+$data['drivebackhand_timing'];
		$drive_backhand = $drive_backhand / 5;
		$detail_drive_backhand = $data['drivebackhand_memegangblade'] . "," . $data['drivebackhand_memukulbola']. "," . $data['drivebackhand_penempatanbola']
			. "," . $data['drivebackhand_kecepatan']. "," . $data['drivebackhand_timing'];

		$push_forehand = $data['pushforehand_memegangblade']+$data['pushforehand_memukulbola']+$data['pushforehand_penempatanbola']
			+$data['pushforehand_kecepatan']+$data['pushforehand_timing'];
		$push_forehand = $push_forehand / 5;
		$detail_push_forehand = $data['pushforehand_memegangblade'] . "," . $data['pushforehand_memukulbola']. "," . $data['pushforehand_penempatanbola']
			. "," . $data['pushforehand_kecepatan']. "," . $data['pushforehand_timing'];

		$push_backhand = $data['pushbackhand_memegangblade']+$data['pushbackhand_memukulbola']+$data['pushbackhand_penempatanbola']
			+$data['pushbackhand_kecepatan']+$data['pushbackhand_timing'];
		$push_backhand = $push_backhand / 5;
		$detail_push_backhand = $data['pushbackhand_memegangblade'] . "," . $data['pushbackhand_memukulbola']. "," . $data['pushbackhand_penempatanbola']
			. "," . $data['pushbackhand_kecepatan']. "," . $data['pushbackhand_timing'];

		$smash_forehand = $data['smashforehand_memegangblade']+$data['smashforehand_memukulbola']+$data['smashforehand_penempatanbola']
			+$data['smashforehand_kecepatan']+$data['smashforehand_timing'];
		$smash_forehand = $smash_forehand / 5;
		$detail_smash_forehand = $data['smashforehand_memegangblade'] . "," . $data['smashforehand_memukulbola']. "," . $data['smashforehand_penempatanbola']
			. "," . $data['smashforehand_kecepatan']. "," . $data['smashforehand_timing'];

		$smash_backhand = $data['smashbackhand_memegangblade']+$data['smashbackhand_memukulbola']+$data['smashbackhand_penempatanbola']
			+$data['smashbackhand_kecepatan']+$data['smashbackhand_timing'];
		$smash_backhand = $smash_backhand / 5;
		$detail_smash_backhand = $data['smashbackhand_memegangblade'] . "," . $data['smashbackhand_memukulbola']. "," . $data['smashbackhand_penempatanbola']
			. "," . $data['smashbackhand_kecepatan']. "," . $data['smashbackhand_timing'];

		$block_forehand = $data['blockforehand_memegangblade']+$data['blockforehand_memukulbola']+$data['blockforehand_penempatanbola']
			+$data['blockforehand_kecepatan']+$data['blockforehand_timing'];
		$block_forehand = $block_forehand / 5;
		$detail_block_forehand = $data['blockforehand_memegangblade'] . "," . $data['blockforehand_memukulbola']. "," . $data['blockforehand_penempatanbola']
			. "," . $data['blockforehand_kecepatan']. "," . $data['blockforehand_timing'];

		$block_backhand = $data['blockbackhand_memegangblade']+$data['blockbackhand_memukulbola']+$data['blockbackhand_penempatanbola']
			+$data['blockbackhand_kecepatan']+$data['blockbackhand_timing'];
		$block_backhand = $block_backhand / 5;
		$detail_block_backhand = $data['blockbackhand_memegangblade'] . "," . $data['blockbackhand_memukulbola']. "," . $data['blockbackhand_penempatanbola']
			. "," . $data['blockbackhand_kecepatan']. "," . $data['blockbackhand_timing'];

		$chop_forehand = $data['chopforehand_memegangblade']+$data['chopforehand_memukulbola']+$data['chopforehand_penempatanbola']
			+$data['chopforehand_kecepatan']+$data['chopforehand_timing'];
		$chop_forehand = $chop_forehand / 5;
		$detail_chop_forehand = $data['chopforehand_memegangblade'] . "," . $data['chopforehand_memukulbola']. "," . $data['chopforehand_penempatanbola']
			. "," . $data['chopforehand_kecepatan']. "," . $data['chopforehand_timing'];

		$chop_backhand = $data['chopbackhand_memegangblade']+$data['chopbackhand_memukulbola']+$data['chopbackhand_penempatanbola']
			+$data['chopbackhand_kecepatan']+$data['chopbackhand_timing'];
		$chop_backhand = $chop_backhand / 5;
		$detail_chop_backhand = $data['chopbackhand_memegangblade'] . "," . $data['chopbackhand_memukulbola']. "," . $data['chopbackhand_penempatanbola']
			. "," . $data['chopbackhand_kecepatan']. "," . $data['chopbackhand_timing'];

		$service_forehand = $data['serviceforehand_memegangblade']+$data['serviceforehand_memukulbola']+$data['serviceforehand_penempatanbola']
			+$data['serviceforehand_kecepatan']+$data['serviceforehand_timing'];
		$service_forehand = $service_forehand / 5;
		$detail_service_forehand = $data['serviceforehand_memegangblade'] . "," . $data['serviceforehand_memukulbola']. "," . $data['serviceforehand_penempatanbola']
			. "," . $data['serviceforehand_kecepatan']. "," . $data['serviceforehand_timing'];

		$service_backhand = $data['servicebackhand_memegangblade']+$data['servicebackhand_memukulbola']+$data['servicebackhand_penempatanbola']
			+$data['servicebackhand_kecepatan']+$data['servicebackhand_timing'];
		$service_backhand = $service_backhand / 5;
		$detail_service_backhand = $data['servicebackhand_memegangblade'] . "," . $data['servicebackhand_memukulbola']. "," . $data['servicebackhand_penempatanbola']
			. "," . $data['servicebackhand_kecepatan']. "," . $data['servicebackhand_timing'];

		$total = 	$drive_forehand + $drive_backhand + $push_forehand + $push_backhand + $smash_forehand +
			$smash_backhand + $block_forehand + $block_backhand + $chop_forehand + $chop_backhand +
			$service_forehand + $service_backhand;
		$total = $total / 12;

		if ($total < 70){
			$kategori_nilai = "Kurang";
		}else if ($total >= 70 && $total <80 ){
			$kategori_nilai = "Cukup";
		}else if ($total >= 80 && $total <90 ){
			$kategori_nilai = "Baik";
		}else if ($total >= 90){
			$kategori_nilai = "Sangat Baik";
		}


		$data_evaluasi = array(
			'total_nilai'=>$total,
			'kategori_nilai'=>$kategori_nilai,
			'drive_forehand'=>$drive_forehand,
			'drive_backhand'=>$drive_backhand,
			'push_forehand'=>$push_forehand,
			'push_backhand'=>$push_backhand,
			'smash_forehand'=>$smash_forehand,
			'smash_backhand'=>$smash_backhand,
			'block_forehand'=>$block_forehand,
			'block_backhand'=>$block_backhand,
			'chop_forehand'=>$chop_forehand,
			'chop_backhand'=>$chop_backhand,
			'service_forehand'=>$service_forehand,
			'service_backhand'=>$service_backhand
		);

		$this->db->where('idevaluasi',$idevaluasi);
		$this->db->update('evaluasi',$data_evaluasi);

		$data_detail_evaluasi = array(
			'driveforehand'=>$detail_drive_forehand,
			'drivebackhand'=>$detail_drive_backhand,
			'pushforehand'=>$detail_push_forehand,
			'pushbackhand'=>$detail_push_backhand,
			'smashforehand'=>$detail_smash_forehand,
			'smashbackhand'=>$detail_smash_backhand,
			'blockforehand'=>$detail_block_forehand,
			'blockbackhand'=>$detail_block_backhand,
			'chopforehand'=>$detail_chop_forehand,
			'chopbackhand'=>$detail_chop_backhand,
			'serviceforehand'=>$detail_service_forehand,
			'servicebackhand'=>$detail_service_backhand,
		);


		$this->M_Evaluasi->ubahEvaluasi($data_detail_evaluasi,$idevaluasi);
	}

	function hapusEvaluasi(){
    	$idevaluasi = $this->input->post('idevaluasi');

    	$this->M_Evaluasi->deleteEvaluasi($idevaluasi);
	}

	function getFilterAtlet($jenis){
    	$atlet = $this->M_Akun->getAtletByJenis($jenis)->result();
		echo json_encode($atlet);
	}


}
