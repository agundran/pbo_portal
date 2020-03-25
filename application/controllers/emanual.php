<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();
require_once("system/core/Common.php");

	
class Emanual extends CI_Controller{	
	
	private $limit = 132;
 		
	function __construct()
 	{
		parent::__construct();
	 

	 
		$this->load->library(array('table','form_validation'));
	 	$this->load->helper(array('form', 'url'));
	 	$this->load->model('emanualmodel','',TRUE);
 		$this->is_logged_in();
 	}
	 
	 function is_logged_in()
	{
	$is_logged_in = $this->session->userdata('is_logged_in');
	
	if(!isset($is_logged_in) || $is_logged_in != true){
		echo 'you don\'t have permission to access this page. <a href="pages/login">Login</a>';
		die();
		}	
	} 
	 
	 
	function index()
	
	{
	
	 
	// load view
	$data['Role']=$this->session->userdata('role');
		//header for emanaual
		$this->load->view('pages/template/header2');
		
		$this->load->view('pages/template/nav', $data);
		$this->load->view('pages/emanual_view');
		$this->load->view('pages/template/footer');
	 }
	}

?>