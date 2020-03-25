<?php

class Ztestmodel extends CI_Model{
	
	
	function __construct(){
	parent::__construct();
	}




function get_info($offset=0, $order_column, $order_type='asc' )
{
	$currentuser = $this->session->userdata('username');
	$aStartDate = $this->get_billingstartdate($currentuser);
	$aEndDate = $this->get_billingenddate($currentuser);
	
	
	$astartdate = date('Y/n/d',strtotime($aStartDate));
	$aenddate = date('Y/n/d',strtotime($aEndDate));
	
	if(empty($order_column)||empty($order_type)){		
		$this->db->order_by('Line','asc');
		}
	else{
	
	  $query = $this->db->query("SELECT t1.Line AS t1L,
			  									t1.Contract AS t1C, 
												t1.Network AS t1N,
												t1.StartDate as t1S1, 
												t1.EndDate as t1E1, 
												
												t1.TimeOn, 
												t1.TimeOff, 
												t1.Distribution AS t1D, 
												(t1.UnitPrice/100) AS t1U, 
												t1.Value AS t1V, t1.nSched AS t1Sc, 
												t1.nPlaced AS t1Pc, 
												t1.nPlayed AS t1Py, 
												
												t2.ContractName AS t2CN,
												t2.CustOrder AS t2CO ,
												t2.StartDate AS t2SD,
												t2.EndDate AS t2ED,
												
												t3.Name AS t3N, 
												t3.Address1 AS t3A1, 
												t3.Address2 AS t3A2, 
												t3.City AS t3C, 
												t3.State AS t3S,
												t3.Zip AS t3Z, 
												
												t4.SysCode AS t4S 
												
												
			  
			  FROM (`contract_header` AS t2) 
			  INNER JOIN  `contract_detail` AS t1 ON `t2`.`Seq` = `t1`.`Contract`
			  
			  INNER JOIN `customers` AS t3 ON `t2`.`CIndex` = `t3`.`Seq` 
			  INNER JOIN `site_operators` AS t4 ON `t2`.`SiteName` = `t4`.`SiteName` 
			  

				WHERE `t1`.`Contract`=".$order_column. " and t1.Startdate between "."'".
				//$astartdate."'". 'and' ."'".$aenddate."' ");
				$astartdate."'". 'and ' ."'".$aenddate."'"
				
				);
	
	return $query;
	}
	}
	
	
	function get_billingstartdate($currentuser){
		$this->db->select('broadcast_calendar.Start_Date');
        $this->db->join('current_month', 'broadcast_calendar.Year= current_month.Year AND  broadcast_calendar.Month= current_month.Month','inner');
		$this->db->where('current_month.UserName', $currentuser);
			$query = $this->db->get('broadcast_calendar');
            $result = $query->result();  //  returns the query result as an array of objects
 			$result = $query->row(); // returns a single result row
 			$rolltext = $result->Start_Date;
			return $rolltext;             
		
		}
   
   
   function get_billingenddate($currentuser){
		$this->db->select('broadcast_calendar.End_Date');
        $this->db->join('current_month', 'broadcast_calendar.Year= current_month.Year AND  broadcast_calendar.Month= current_month.Month','inner');
		$this->db->where('current_month.UserName', $currentuser);
			$query = $this->db->get('broadcast_calendar');
            $result = $query->result();  //  returns the query result as an array of objects
 			$result = $query->row(); // returns a single result row
 			$rolltext = $result->End_Date;
			return $rolltext;             
		
		}
   
   
   
   
 
   

}

?>