<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();
require_once("system/core/Common.php");

	
class Applyunplanleave extends CI_Controller{	
	
	private $limit = 132;
 		
	function __construct()
 	{
		parent::__construct();
	 
	#load library
	 
		$this->load->library(array('table','form_validation'));
	 	$this->load->helper(array('form', 'url'));
	 	$this->load->model('applyleavemodel','',TRUE);
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
    $un= $this->session->userdata('username');
    $data['emp_no'] = $this->applyleavemodel->get_employee_no($un);
   
    $data['lname'] = $this->applyleavemodel->get_employee_details($data['emp_no'])->row()->last_name;
    $data['fname'] = $this->applyleavemodel->get_employee_details($data['emp_no'])->row()->first_name;



		$this->load->view('pages/template/header');
		$this->load->view('pages/template/nav', $data);
		
		if (($data['Role'] == "Administrators") || ($data['Role'] == "Operators")) {
			 $this->load->view('pages/applyunplanleave_view', $data);
		} else {
			 $this->load->view('pages/unauth_view');
		} 
		
				
	//	$this->load->view('pages/template/footer');
	 }
	}

?>