<?php  
if (!defined('BASEPATH')) exit('No direct script access allowed');
session_start();
require_once("system/core/Common.php");

class Samplereportexcel extends CI_Controller
{
	function __construct()
 	{
		parent::__construct();
	 	#load library 
         $this->load->library(array('table','form_validation'));
         $this->load->library('excel');
	 	$this->load->helper(array('form', 'url'));
	 	$this->load->model('samplereportexcelmodel','',TRUE);
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
	
	
	
            public function index() {
                $data['page'] = 'export-excel';
                $data['title'] = 'Export Excel data | PBo Global';
                $data['employeeInfo'] = $this->samplereportexcelmodel->employeeList();
                // load view file for output
                $this->load->view('pages/samplereportexcel_view', $data);
            }
            // create xlsx
            public function createXLS() {
                // create file name
                $fileName = 'data-'.time().'.xlsx';  
                // load excel library
                $this->load->library('excel');
                $empInfo = $this->samplereportexcelmodel->employeeList();
                $objPHPExcel = new PHPExcel();
                $objPHPExcel->setActiveSheetIndex(0);
                // set Header
                $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'Emp #');
                $objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Last Name');
                $objPHPExcel->getActiveSheet()->SetCellValue('C1', 'First Name');
                $objPHPExcel->getActiveSheet()->SetCellValue('D1', 'Postion');
                $objPHPExcel->getActiveSheet()->SetCellValue('E1', 'Dept');
                $objPHPExcel->getActiveSheet()->SetCellValue('F1', 'Status');       
                // set Row
                $rowCount = 2;
                foreach ($empInfo as $element) {
                    $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $element['employee_no']);
                    $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $element['last_name']);
                    $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $element['first_name']);
                    $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $element['position']);
                    $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, $element['department']);
                    $objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount, $element['status']);
                    $rowCount++;
                }
               // original version
               //$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
               //$objWriter->save(ROOT_UPLOAD_IMPORT_PATH.$fileName);
               // download file
               //header("Content-Type: application/vnd.ms-excel");
               //redirect(HTTP_UPLOAD_IMPORT_PATH.$fileName);  
                


    

 

               //version 1   
               /**
              $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
              header('Content-Type: application/vnd.ms-excel');
              header('Content-Disposition: attachment;filename='.$fileName);
              $object_writer->save('php://output');
                        */
              
              //version 2

               
              header('Content-Type: application/vnd.ms-excel'); //mime type
              header('Content-Disposition: attachment;filename="'.$fileName.'"'); //tell browser what's the file name
              header('Cache-Control: max-age=0'); //no cache
              //save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
              //if you want to save it as .XLSX Excel 2007 format
              $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
              //$objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel2007');
              //force user to download the Excel file without writing it to server's HD
              $objWriter->save('php://output');


            }
	 
	
	
	} 

?>