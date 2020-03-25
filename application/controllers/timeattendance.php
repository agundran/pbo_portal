<?php  
if (!defined('BASEPATH')) exit('No direct script access allowed');
session_start();
require_once("system/core/Common.php");


class Timeattendance extends CI_Controller
{
	function __construct()
 	{
		parent::__construct();
	 	#load library 
	 	$this->load->library(array('table','form_validation'));
	 	$this->load->helper(array('form', 'url'));
	 	$this->load->model('timeattendancemodel','',TRUE);
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

	
	function index($offset = 0, $order_column = 'Username', $order_type = 'asc')
	{
		if (empty($offset)) $offset = 0;
		if (empty($order_column)) $order_column = 'ID';
		if (empty($order_type)) $order_type = 'asc';
	
		$un= $this->session->userdata('username');
		$filter = $this->timeattendancemodel->get_employee_no($un);
		
		//$filter  = $this->input->post('ID');
		
		$datepicker1= $this->input->post('datepicker1');
		$datepicker2= $this->input->post('datepicker2');
		
		//$bdate = date('Y-m-d', strtotime($datepicker1));
		//$edate = date('Y-m-d', strtotime($datepicker2));
		 
		 $limit =  31;
           
		  $data['bda'] = $datepicker1;
		  $data['eda'] = $datepicker2;
		  
		  /*
		  if(($data['bda'] != "") && ($data['eda'] != "")){
			  $data['search_title'] = "Time Attendance from ", $data['bda'] ,' to ', $data['eda'];
		  } else {
			  $data['search_title'] = "";
		  }
		  */
		   
		//TODO: check for valid column
		// load data
		$Users = $this->timeattendancemodel->get_paged_list($limit, $offset, $order_column, $order_type, $filter, $datepicker1, $datepicker2)->result();
		//$Users = $this->timeattendancemodel->get_paged_list($limit, $offset, $order_column, $order_type, $filter)->result();
		
		// generate pagination
		$this->load->library('pagination');
		$config['base_url'] = site_url('/timeattendance/index');
		$config['total_rows'] = $this->timeattendancemodel->count_all();
		
		if(isset($post['sel']) && !empty($post['sel']))
                $config['per_page'] = $post['sel'];
                else
        //      $config['per_page'] = 10;
				
		$config['per_page'] =$limit;
		
		$config['uri_segment'] = 3;
		$this->pagination->initialize($config);
		$data['pagination'] = $this->pagination->create_links();
		$data['title'] = "";
		$data['print_them'] = site_url('/timeattendance/print_user');
		
 
		// generate table data
		$this->load->library('table');
		$this->table->set_empty("");
		$new_order = ($order_type == 'asc' ? 'desc' : 'asc');
		$this->table->set_heading('ID', 'Date', 'Time In','Time Out', 'Short', 'Leave Type', 'Remarks');
		
	 	
		$i = 0 + $offset;
		foreach ($Users as $Users) {$this->table->add_row(
			$Users->id,
			$Users->date,	
			
			
			$Users->timein,
			$Users->timeout,
			$Users->short,
			$Users->leave_type,
			$Users->remarks
			
			
			);
		}
	 
		$data['table'] = $this->table->generate();
	
	 
		// load view
	 	$data['Role']=$this->session->userdata('role');
		
		//$data['print_me'] = anchor_popup('/timeattendance/print_user/','Print User List',array('class'=>'print_hello_world'),$atts);
		
		$this->load->view('pages/template/header2');
		$this->load->view('pages/template/nav',$data);
		/*
		if ($data['Role'] != "Administrators"){
			$this->load->view('pages/unauth_view', $data);
				} else
		{
				$this->load->view('pages/timeattendance_view', $data);
		}
		
		*/
		$this->load->view('pages/timeattendance_view', $data);
		$this->load->view('pages/template/footer');
		}
	 
		
     
	 
	 
	function print_user()
	{
				
	$this->load->library('cezpdf');
	
		//$this->cezpdf->ezText('Hello World', 12, array('justification' => 'center'));
		//$this->cezpdf->ezSetDy(-10);
 
		$query = $this->db->select('*')
                        ->from('users')
                        ->join('usersinroles', 'users.Username= usersinroles.Username')
						->get();
			
		
		$col_names = array(
			'Username' => 'Username',
			'Operator' => 'Operator',
			'Email' => 'Email',
			'Rolename'=> 'User Access',
			'LastLoginDate'=> 'Last Login',
			'LastActivityDate'=> 'Last Activity'
			
		);
		
		foreach ($query->result_array() as $row)
			{
		$db_data[] = array('Username' => $row['Username'],
							'Operator'=>$row['Operator'], 
							'Email'=>$row['Email'], 
							'Rolename'=> $row['Rolename'], 
							'LastLoginDate'=>$row['LastLoginDate'], 
							'LastActivityDate'=>$row['LastActivityDate']);
		
			}
		
		$options = array(
		'width'=>550,
		'fontSize'=>8,
		'showLines'=>0
				);
		
		$this->cezpdf->ezTable($db_data, $col_names, '', $options);
		$this->cezpdf->ezStream();
	}
	
	} 

?>