<script>
//Nav Bar Collapse Open when click ManageUser & Operators
$('#Admin, #AdminManagement').addClass('open');
$('#Admin, #AdminManagement').children('ul').slideDown();

 $(document).ready(function() { 
		        $("#Range").change(function(){
            		var mydata = $(this).val();
					var post_url = "<?php echo base_url(); ?>index.php/manageuserlist/get_discount/"+ mydata;
                   
					
					$.ajax({
                   		url:post_url,
						type: "POST",
						dataType:'json',
                		data: mydata,
					  	success: function(result){
                  			$("#datas").val(result);},
        				error: function(result ) {
						     alert(result);	}
                    
                    });
                });
	     }).change();

   


</script>




   		 <div id="container">
        
	        <center>
			<h4><?php echo $title; ?></h4>
	   		</center>
            
            <div class="search">
		<fieldset>
	</fieldset>
</div>
              <?php 
			  
			  $attrib = array(
				
              'width'      => '0',
              'height'     => '0',
              'scrollbars' => 'yes',
              'status'     => 'yes',
              'resizable'  => 'no',
              'screenx'   =>  '0',
    		  'screeny'   =>  '0',
            );
			  
			  
			  
			  echo anchor('importer', 'Import Latest Attendance',array('class'=>'validate_add')) ?>
            <br />
            <br />
            
		 
 			<div class="paging"><?php echo $pagination; ?></div>
            <div class="data" id="datas"><?php echo $table; ?></div>
            <div class="paging"><?php echo $pagination; ?></div>
    
    	
            <br />
    	    
          

 
         
            
    		