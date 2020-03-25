<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();

require_once("system/core/Common.php");

	
class Ztest extends CI_Controller{	
	
	
	function __construct()
 	{
		parent::__construct();
	 	//$this->load->library(array('table','form_validation'));
	 	//$this->load->helper(array('form', 'url'));
	 	$this->load->model('ztestmodel','',TRUE);
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
	$order_column = '443987';
	$data['currentuser'] = $this->session->userdata('username');
	$myuser = $data['currentuser'];
	$data['vstartdate'] = $this->ztestmodel->get_billingstartdate($myuser);
	//$aenddate = $this->ztestmodel->get_billingenddate($myuser);
	$Users = $this->ztestmodel->get_info($limit = 100, $order_column, $order_type='asc')->result();

	$astartdate = $Users->t2SD;
	$aenddate = $Users->t2ED;
	
	$sd = strtotime($astartdate);
	$ed = strtotime($aenddate);
	$data['StartDate'] = date('Y-m-d',strtotime($astartdate));
	
	
	 $now = time(); // or your date as well
     $your_date = strtotime("2010-01-01");
     $datediff = $now - $your_date;
    // echo floor($datediff/(60*60*24));
	
	
	$data['EndDate'] = date('Y-m-d',strtotime($aenddate));
	
	
	$data['testDate'] = date('Y-m-d h:m:s' ,strtotime($aenddate));
	
	$data['NumDays'] = ($ed - $sd)/(60*60*24);
	
	
	// load data
	 
	// load view
		$data['Role']=$this->session->userdata('role');
		$this->load->view('pages/template/header2');
		$this->load->view('pages/template/nav', $data);
		$this->load->view('pages/ztest_view', $data);
		$this->load->view('pages/template/footer');
	 }

}

?>