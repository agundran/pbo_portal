<?php  
if (!defined('BASEPATH')) exit('No direct script access allowed');
session_start();
require_once("system/core/Common.php");
class Dataimportview extends CI_Controller
{
	function __construct()
 	{
		parent::__construct();
	 	#load library 
	 	$this->load->library(array('table','form_validation'));
	 	$this->load->helper(array('form', 'url'));
	 	$this->load->model('dataimportviewmodel','',TRUE);
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

	
	function index($offset = 0, $order_column = 'id', $order_type = 'asc')
	{
		
		if (empty($offset)) $offset = 0;
		if (empty($order_column)) $order_column = 'id';
		if (empty($order_type)) $order_type = 'asc';
		
		$filter  = $this->input->post('ShortName');
		$limit =  30;

		
		//TODO: check for valid column
		// load data
		$Users = $this->dataimportviewmodel->get_paged_list($limit, $offset, $order_column, $order_type, $filter)->result();
		// generate pagination
		$this->load->library('pagination');
		$config['base_url'] = site_url('/dataimportview/index');
		$config['total_rows'] = $this->dataimportviewmodel->count_all();
		
		if(isset($post['sel']) && !empty($post['sel']))
                $config['per_page'] = $post['sel'];
                else
                $config['per_page'] = 30;
				
		//$config['per_page'] =$limit;
		
		$config['uri_segment'] = 3;
		$this->pagination->initialize($config);
		$data['pagination'] = $this->pagination->create_links();
		$data['title'] = "";
		$data['print_them'] = site_url('/dataimportview/print_user');
		
 
		// generate table data
		$this->load->library('table');
		$this->table->set_empty("");
		$new_order = ($order_type == 'asc' ? 'desc' : 'asc');
		$this->table->set_heading('ID','Date','Time In','Time Out','Short','Leave Type','Remarks','Action');
		
		//anchor('dataimportview/index/'.$offset.'/Username/'.$new_order, 'Username'),
		//anchor('dataimportview/index/'.$offset.'/Operator/'.$new_order, 'Operator'),
		//anchor('dataimportview/index/'.$offset.'/Priviledge/'.$new_order, 'Priviledge'),
		//anchor('dataimportview/index/'.$offset.'/Status/'.$new_order, 'Status'),
		//anchor('dataimportview/index/'.$offset.'/LastActivityDate/'.$new_order, 'Last Login'),'Actions','');
	 
	 	$upd = array(
              'width'      => '800',
              'height'     => '600',
              'scrollbars' => 'yes',
              'status'     => 'yes',
              'resizable'  => 'yes',
              'screenx'    => '0',
              'screeny'    => '0'
            );
	 	
		$i = 0 + $offset;
		foreach ($Users as $Users) {
			$this->table->add_row(
			$Users->id,
			$Users->date,			
			$Users->timein,
			$Users->timeout,
			$Users->short,
			$Users->leave_type,
			$Users->remarks,

			//strtotime($Users->LastActivityDate)
		    //$Users->LastActivityDate,
			
			
			//Set Different Date Format 
			//date('d-m-Y',strtotime($Student->date_of_birth)),
			//date("F j, Y, g:i a")
			//date("Y-m-d H:i:s")
		anchor('dataimportview/delete/'.$Users->reference,'Delete',array('class'=>'delete','onclick'=>"return confirm('Are you sure you want to delete this data?')"
		
		))
		
		);
		}
	 
		$data['table'] = $this->table->generate();
	
		if ($this->uri->segment(3)=='delete_success')
			$data['message'] = 'The Data was successfully deleted';
		else if ($this->uri->segment(3)=='add_success')
			$data['message'] = 'The Data has been successfully added';
		else if ($this->uri->segment(3)=='update_success')
			$data['message'] = 'The Data has been successfully updated';
		else
		$data['message'] = '';
	 
		// load view
	 	$data['Role']=$this->session->userdata('role');
		
		$atts = array(
              'width'      => '800',
              'height'     => '600',
              'scrollbars' => 'yes',
              'status'     => 'yes',
              'resizable'  => 'yes',
              'screenx'    => '0',
              'screeny'    => '0'
            );
		
		$data['print_me'] = anchor_popup('/dataimportview/print_user/','Print User List',array('class'=>'print_hello_world'),$atts);
		
		$this->load->view('pages/template/header');
		$this->load->view('pages/template/nav',$data);
		if ($data['Role'] == "Administrators" || $data['Role'] == "Execom" ){
			$this->load->view('pages/dataimportview_view', $data);
				} else {
				
				$this->load->view('pages/unauth_view', $data);
		}
	$this->load->view('pages/template/footer');
	}
	 
	
	 
		
	
	
	

	 
	 
	function delete($ref){
	 $data['Users'] = (array)$this->dataimportviewmodel->get_by_id($ref)->row();
	 $id = $data['Users']['reference'];
	 	
	 // delete user
	 	$this->dataimportviewmodel->delete($id);
	 	
	// redirect to Student list page
	 	redirect('dataimportview/index/delete_success','Refresh');
	 	}
 
	// validation rules
	 

	 
	 	function _set_rules_edit(){
		
		$this->form_validation->set_rules('Rolename', 'priviledge_group');
			$this->form_validation->set_rules('Operator', 'operator');
			//$this->form_validation->set_rules('Username', 'Username', 'required|min_length[4]|max_length[20]|is_unique[users.Username]');
			$this->form_validation->set_rules('Password', 'Password', 'trim|min_length[4]|max_length[32]');
			$this->form_validation->set_rules('Email', 'Email Address', 'trim|valid_email');
			
	 	}
	 
	// date_validation callback
	 
	function valid_date($str)
	{
	 	if(!preg_match('/^[0-9]{4}-[0-9]{2}-[0-9]{2}$/', $str))
	 	{
	 		$this->form_validation->set_message('valid_date', 'date format is not valid. yyyy-mm-dd');
	 		return false;
	 	}
	 	else
	 	{
	 	return true;
	 	}
	 }
	 
	 
	function print_user()
	{  $this->load->library('cezpdf');
	
		
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