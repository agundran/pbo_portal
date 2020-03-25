
	
<body>
	<?php
	
	$atts = array(
				
              'width'      => '800',
              'height'     => '600',
              'scrollbars' => 'yes',
              'status'     => 'yes',
              'resizable'  => 'no',
              'screenx'   =>  '\'+((parseInt(screen.width) - 800)/2)+\'',
    		  'screeny'   =>  '\'+((parseInt(screen.height) - 600)/2)+\'',
            );

	
	
	
	?>
	
    
	<script src="<?php echo base_url(); ?>js/jquery-1.11.0.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
 	<script src="<?php echo base_url(); ?>js/script.js"></script>
    <script src="<?php echo base_url(); ?>js/mypopup.js"></script>
	
	<script type="text/javascript">
			 
		
		
	var Rolename = "<?php echo $Role; ?>";
	
	if(Rolename == "Administrators")					
	$(document).ready(function() 
	{
   			 $('#ChangePassword,#Sitemap').hide();
				
			
	});

	else if(Rolename == "Execom")
		$(document).ready(function() {
			
			 $('#PBOInternal,#Employee, #InsertionDetail,#ChangePassword,#Sitemap, #PBOApplicant, #PBOExam, #PBOExam2').hide();
   			
			});
		
	else if(Rolename == "Applicant")
		$(document).ready(function() {
   			 $('#Admin,#Execom, #PBOInternal,#Employee, #InsertionDetail,#ChangePassword,#Sitemap').hide();
			});
	
	else if(Rolename == "Operators")
		$(document).ready(function() {
   			 $('#Admin, #Execom, #PBOApplicant, #PBOExam, #PBOExam2, #TestZone ').hide();
			});
	
	
	else
		document.write("Access Denied!"); 
			
			
		
	
    </script> 
    
    
    
    <div id="wrapper">
        <div id="sidebar-wrapper">
        		<div id="cssmenu">
            		<ul>	
           		 <li>
                        <a href='#'><font size="2" face="verdana" color= "black">Welcome:
                        <font size="2" face="verdana" color="yellow">
                        	<span><?php 
							      echo( str_replace("."," ",($this->session->userdata('username')))); 
							
							      ?>
							</span>
                        	</font>
                            <br>
						
                             <font size="2" face="verdana" color="yellow">
                        	<span><?php //echo $this->session->userdata('role'); ?></span>
                        	</a>
                            </font>
                     	</font>         
                 </li>
                 <?php $data['Role']=$this->session->userdata('role') ?>
                 <li><a href="<?php echo site_url("site/".$data['Role']) ?>"><span><i class="fa fa-home" style="color:#000"></i> Home</span></a></li>
                 <li class='active has-sub' id="Admin"><a href='#'><span><i class="fa fa-users" style="color:#000"></i> Administration</span></a>
                    		<ul>
                       			<li class='last' id="AdminManagement"><a href="<?php echo site_url("manageuserlist") ?>"><span>Manage Users</span></a>
								<li class='last' id="dataimportview"><a href="<?php echo site_url("dataimportview") ?> "><span>Time Attendance Import</span></a>
															
								
								
                          	</ul>
							
                  </li>
				   <li class='active has-sub' id="Execom"><a href='#'><span><i class="fa fa-pencil-square-o" style="color:#000"></i> Execom </span></a>
                  	    	<ul>
                       			<li class='last' id="Execomlink"><a href="http://clientap.pboglobal.com.au/e-manual"><span>Employee manual</span></a>
									
                     		</ul>
                            		
                  </li>
				  
                  <li class='active has-sub' id="PBOInternal"><a href='#'><span><i class="fa fa-file" style="color:#000"></i> PBO Internal </span></a>
                  	    	<ul>
                       				
									<li class='last' id="runninglate"><a href="<?php echo site_url("runninglate") ?> "><span>Running Late</span></a>
									
									<li class='last' id="leaveapply"><a href="<?php echo site_url("applyleave") ?> "><span>Leave Application</span></a>
									   
									
								
									<li class='last' id="unplanleaveapply"><a href="<?php echo site_url("applyunplanleave") ?> "><span>Unplanned Leave Application</span></a>
									
									
									<li class='last' id="undertime"><a href="<?php echo site_url("applyundertime") ?> "><span>Undertime Application</span></a>
									<li class='last' id="overtime"><a href="<?php echo site_url("applyovertime") ?> "><span>Overtime Application</span></a>
									
									<li class='last' id="timeattend"><a href="<?php echo site_url("timeattendance") ?> "><span>Time Attendance</span></a>

									

									<li class='last' id="itticket"><a href="<?php echo site_url("applyonline") ?> "><span>IT Ticket</span></a>
									<li class='last' id="roomreservation"><a href="<?php echo site_url("applyonlinereservation") ?> "><span>Room Reservation</span></a>
									
								    <li class='last' id="emcab"><a href="<?php echo site_url("emcab") ?> "><span>EMCAB Application</span></a>
							
							</ul>
                     </li>
                 

				     <li class='active has-sub' id="PBOManual"><a href='#'><span><i class="fa fa-file" style="color:#000"></i> Employee manual </span></a>
                  	    	<ul>
							  <li class='last' id="eman"><a href="<?php echo site_url("emanual") ?> "><span>Open</span></a>
							
							</ul>
                     </li>



					<li class='active has-sub' id="Payroll"><a href='#'><span><i class="fa fa-pencil-square-o" style="color:#000"></i> Payroll</span></a>
                  	    	<ul>
							  <li class='last' id="payroll"><a href="<?php echo site_url("undermaintenance") ?> "><span>Summary</span></a>
									
                     		</ul>
                            		
                  </li>


				    <li class='active has-sub' id="Employee"><a href='#'><span><i class="fa fa-pencil-square-o" style="color:#000"></i> My 201 </span></a>
                  	    	<ul>
                       			<li class='last' id="Employee201"><a href="<?php echo site_url("personalinfosheet") ?> "><span>Personnel Infomation Sheet</span></a>
									
                     		</ul>
                            		
                  </li>
                  
				   <li class='active has-sub' id="PBOApplicant"><a href='#'><span><i class="fa fa-file" style="color:#000"></i> Applicant's Information</span></a>
                  	    	<ul>
                       				<li class='last' id="applyform"><a href="<?php echo site_url("applyform") ?> "><span>Fill up Now!</span></a>
									
							</ul>
                     </li>
					 
					 <li class='active has-sub' id="PBOExam"><a href='#'><span><i class="fa fa-file" style="color:#000"></i> Personality Test </span></a>
                  	    	<ul>
                       				<li class='last' id="personality"><a href="<?php echo site_url("personality") ?> "><span>Take Now!</span></a>
									
									
							</ul>
                     </li>
					 <li class='active has-sub' id="PBOExam2"><a href='#'><span><i class="fa fa-file" style="color:#000"></i> Technical Exam</span></a>
                  	    	<ul>
                       				<li class='last' id="analytics"><a href="<?php echo site_url("undermaintenance") ?> "><span>Formula Analytics</span></a>
									<li class='last' id="basicmyob"><a href="<?php echo site_url("undermaintenance") ?> "><span>Basic MYOB</span></a>
									<li class='last' id="basicacctng"><a href="<?php echo site_url("undermaintenance") ?> "><span>Basic Accounting Test</span></a>
									<li class='last' id="listentest"><a href="<?php echo site_url("undermaintenance") ?> "><span>Listening Test</span></a>
									
							</ul>
                     </li>
					 
					  <li class='active has-sub' id="TestZone"><a href='#'><span><i class="fa fa-file" style="color:#000"></i> Test Zone</span></a>
                  	    	<ul>
                       		
									<li class='last' id="hrdocs"><a href="<?php echo site_url("hrdocsrequest") ?> "><span>HR Document Request</span></a>
									
									<li class='last' id="test2"><a href="<?php echo site_url("undermaintenance") ?> "><span>test 2</span></a>
									<li class='last' id="dataimportview"><a href="<?php echo site_url("dataimportview") ?> "><span>Data import view</span></a>
									
									
							</ul>
                     </li>
				   
				   
				     
				   <li><a  href="<?php echo site_url("site/logout")?> "><i class="fa fa-sign-out" style="color:#000"></i> Logout</a></li>
                   
				  
            			</ul>
                </div>         
        </div>   
</body>