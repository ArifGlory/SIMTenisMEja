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
        $this->load->view('admin/dashboard',$data);
        $this->load->view('part_admin/footer');
    }


}
