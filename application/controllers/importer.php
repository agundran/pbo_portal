<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();
require_once("system/core/Common.php");

	
class Importer extends CI_Controller{	
	
 		
	function __construct()
 	{
		parent::__construct();
		#load library 
	 	$this->load->model('importermodel','',TRUE);
		$this->load->library('excel');	
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
		
		
		$data['Role']=$this->session->userdata('role');
		
		$this->load->view('pages/template/header4');
		$this->load->view('pages/template/nav', $data);
		if ($data['Role'] == "Administrators" || $data['Role'] == "Execom"){
			$this->load->view('pages/importer_view');
				} else
		{
				
				$this->load->view('pages/unauth_view', $data);
		}
		
	}
 
	function fetch()
	{
		$data = $this->dataimportmodel->select();
		$output = '
		<h3 align="center">Total Data - '.$data->num_rows().'</h3>
			<table class="table table-striped table-bordered">
			<tr>
			<th>Id</th>
			<th>Date</th>
			<th>Time in</th>
			<th>Time out</th>
			<th>Short</th>
			<th>Leave Type</th>
			<th>Remarks</th>
			
			
			
		 </tr>
		';
 

	foreach($data->result() as $row)
	{
		$output .= '
		<tr>
		<td>'.$row->id.'</td>
		<td>'.$row->date.'</td>
		<td>'.$row->timein.'</td>
		<td>'.$row->timeout.'</td>
		<td>'.$row->short.'</td>
		<td>'.$row->leave_type.'</td>
		<td>'.$row->remarks.'</td>
		
		
		</tr>
		';
	}
		$output .= '</table>';
		echo $output;
	}

	
	function import()
	{
		if(isset($_FILES["file"]["name"]))
		{
		$path = $_FILES["file"]["tmp_name"];
		$object = PHPExcel_IOFactory::load($path);
		
		foreach($object->getWorksheetIterator() as $worksheet)
		{
		$highestRow = $worksheet->getHighestRow();
		$highestColumn = $worksheet->getHighestColumn();
		
			for($row=2; $row<=$highestRow; $row++)
			{
     		$id = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
			$date = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
			
			$fdate = strtotime($date);
			
			$timein = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
			$timeout = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
			
			$short = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
			$leave_type = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
			$remarks = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
			
			
			
			$data[] = array(
					'id'  		=> 	$id,
					'date'   	=> 	date('Y-m-d', $fdate),
					'timein'    => 	$timein,
					'timeout'  	=> 	$timeout,
					'short'  	=> 	$short,
					'leave_type'=> 	$leave_type,
					'remarks'  	=> 	$remarks
					
					
					);
			}
		}
		
		
		
		         //$newformat = date('Y-m-d',$time);

				//echo $newformat;
   
		$this->dataimportmodel->insert($data);
		echo 'Data Imported successfully';
	} 
 }
	
}

?>