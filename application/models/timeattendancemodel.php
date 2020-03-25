<?php 

class Timeattendancemodel extends CI_Model{

	private $primary_key='id';
	//private $primary_key2='Username';
	private $table_name='members';
	//private $table_name2='usersinroles';
	
		function __construct(){
	parent::__construct();
	}

	
	function get_paged_list($limit=10, $offset=0, $order_column='', $order_type='asc', $filter, $datepicker1, $datepicker2){
	//function get_paged_list($limit=10, $offset=0, $order_column='', $order_type='asc', $filter){
	

		$bdate = date('Y-m-d', strtotime($datepicker1));
		$edate = date('Y-m-d', strtotime($datepicker2));
			   
	if(empty($order_column)||empty($order_type)){		
		$this->db->order_by($this->primary_key,'asc');
		//$this->db->join('Rolename', 'users.Username = usersinroles.Username');
	}
	//else{
	  
	          
			   
		
		$query = $this->db->select('*')
                        ->from('members')
                       // ->join('usersinroles', 'users.Username= usersinroles.Username')
						
						//->where('DATE BETWEEN',"'" ,$bdate,"'", ' AND ' ,"'", $edate,"'")
						->where('members.id', $filter)
						->where('DATE >=', $bdate)
						->where('DATE <=', $edate)
						
                        ->get('', $limit, $offset); 
					   
		//$this->db->order_by($order_column,$order_type);
		//return $this->db->get($this->table_name, $limit, $offset);
		return $query;
		
	//}
	}

     
	function get_employee_no($un){
		
    $this->db->select('employee_no');
    $this->db->from('users');
    $this->db->where('Username',$un);
    $un = $this->db->get()->row()->employee_no;
   
    return $un;    

	}

	
		
	function get_operator() { 		
			$this->db->select('ShortName');
     	    $this->db->order_by('ShortName', 'ASC');
      		$query=$this->db->get('operators');
      		$result = $query->result();
     		$drop_menu_operator_name = array();
        		foreach($result as $item){
        			$options[$item->ShortName] = $item->ShortName;
      				}
      		return $options;	
		}
	
	function get_role() { 		
			$this->db->select('Rolename');
     	    $this->db->order_by('Rolename', 'ASC');
      		$query=$this->db->get('roles');
      		$result = $query->result();
     		$drop_menu_operator_name = array();
        		foreach($result as $item){
        			$options[$item->Rolename] = $item->Rolename;
      				}
      		return $options;	
		}

		
	
	function count_all(){
	return $this->db->count_all($this->table_name);
	}

	function get_by_id($id){	
	$this->db->select('*')                        
						->where($this->primary_key,$id)
                        ->join('usersinroles', 'users.Username= usersinroles.Username');
                        //->get('', $limit, $offset); 	
	return $this->db->get($this->table_name);
	}

	function save($person){
	$this->db->insert($this->table_name,$person);
	return $this->db->insert_id();
	}

	function update($id,$id2,$person1, $person2){
	$this->db->where($this->primary_key,$id);
	$this->db->update($this->table_name,$person1);
	
	$this->db->where($this->primary_key2,$id2);
	$this->db->update($this->table_name2,$person2);
	
	
	
	}

	function delete($id, $id2){
	$this->db->where($this->primary_key,$id);
	$this->db->delete($this->table_name);
	
	$this->db->where($this->primary_key2,$id2);
	$this->db->delete($this->table_name2);
	
	}


	function get_list(){
		
		$query = $this->db->select('*')
                        ->from('users')
                        ->join('usersinroles', 'users.Username= usersinroles.Username');
						//->like('users.Username', $filter, 'after')
                        //->get('', $limit, $offset); 
					   
		return $query;
		}
	
	function encryptIt( $q ) {
    $cryptKey  = 'qJB0rGtIn5UB1xG03efyCp';
    $qEncoded      = base64_encode( mcrypt_encrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), $q, MCRYPT_MODE_CBC, md5(md5( $cryptKey ))));
    return( $qEncoded );
	}


	function decryptIt( $q ) {
    $cryptKey  = 'qJB0rGtIn5UB1xG03efyCp';
    $qDecoded      = rtrim( mcrypt_decrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), base64_decode( $q ),MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ), "\0");
    return( $qDecoded );
	}
	
}

?>