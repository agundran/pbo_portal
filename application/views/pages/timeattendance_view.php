<script>
//Nav Bar Collapse Open when click ManageUser & Operators
$('#PBOInternal, #timeattendance').addClass('open');
$('#PBOInternal, #timeattendance').children('ul').slideDown();


</script>


<script src="<?php echo base_url(); ?>js/jquery-ui-fdate.js"></script>
  <link href="<?php echo base_url(); ?>css/jquery-ui-fdate.css" rel="stylesheet">



<script>


 $( function() {
    $( "#datepicker1" ).datepicker();
  } );
  
    $( function() {
    $( "#datepicker2" ).datepicker();
  } );
  
  
</script>


   		 <div id="container">
        
	        <center>
			<h4><?php //echo $title; ?></h4>
	   		</center>
            
            <div class="search">
		<fieldset>
		<form name='search' action=<?=site_url('timeattendance/index');?> method='post'>
		<table>
			<tr>
        		<th>
				
				
				</th>
				<th></th>	
                <th></th>	
            </tr>
			
			
			<tr>
				<td>FROM
				<input type="text" name="datepicker1"   id="datepicker1" placeholder="YYYY-MM-DD"  value="<?php //echo (isset($Users['datepicker1']))?$Users['datepicker1']:''; echo ""; ?>"/>
				TO <input type="text" name="datepicker2"   id="datepicker2" placeholder="YYYY-MM-DD"  value="<?php //echo (isset($Users['datepicker2']))?$Users['datepicker2']:''; echo ""; ?>"/>
				</td>
				<td>
				<input type='submit' class="btn btn-primary btn-lg active" value='Search' >
								
			   <!-- <td><input name="SysCode"  type='text' id="SysCode"  value="<?php //echo $selectedSysCode; ?>" /></td>					
				-->
				
				<!--
                
                -->
				</td>
                
                <td>
				
				
                </td>
			</tr>
			<tr>
			<td>
			<h4>
			<?php 
			
			if ($bda != '' || $eda != '') {
				
			$bbdate = date("F d, Y",strtotime($bda)); 
			$eedate = date("F d, Y",strtotime($eda)); 
				
			echo "Time Attendance from ", $bbdate, ' to ' ,$eedate; ;  
			}
			
			?>
				
			
			</h4>
			</td>
			
			<td> </td>  <td> </td>
			</tr>
			
			
		</table>
        
		</form>
	</fieldset>
</div>
    
            <div class="paging"><?php //echo $pagination; ?></div>
			
            <div class="data" id="datas"><?php echo $table; ?></div>
            <div class="paging"><?php //echo $pagination; ?></div>
    
    	
            <br />
    	    
              

            
            
            <?php // echo $print_me; ?>
			
			<?php //echo $bda;  ?>
			<?php echo "<br>";  ?>
            <?php //echo $eda;  ?>
			
            <?php


$options = array(
                  ''  => 'Select',
                  '2'    => '2',
                  '10'   => '10',
                  '100' => '100',
                );



//echo form_dropdown('sel', $options,'');
?>

 
         
            
            
        	<br /><br /><br />
           
    		