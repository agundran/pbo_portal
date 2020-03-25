


 <div class="container">
  <br />
  <h3 align="center">Import Time Attendance</h3>
  <form method="post" id="import_form" enctype="multipart/form-data">
   <p><label>Select Excel File</label>
   <input type="file" name="file" id="file" required accept=".xls, .xlsx" /></p>
  
  
   <input type="submit" name="import" value="Import" class="btn btn-primary btn-lg active" />
  
  </form>
  <br />
  <?php 
			  
			  
			  
			  echo anchor('dataimportview', 'Back',array('class'=>'validate_add')) ?>
  <!--
  <div class="table-responsive" id="customer_data">
      -->
  </div>
 </div>

  

<script>

$('#Admin, #dataimport').addClass('open');
$('#Admin, #dataimport').children('ul').slideDown();


$(document).ready(function(){

 load_data();

 function load_data()
 {
  $.ajax({
   url:"<?php echo base_url(); ?>dataimport/fetch",
   method:"POST",
   success:function(data){
    $('#customer_data').html(data);
   }
  })
 }

 $('#import_form').on('submit', function(event){
  event.preventDefault();
  $.ajax({
   url:"<?php echo base_url(); ?>dataimport/import",
   method:"POST",
   data:new FormData(this),
   contentType:false,
   cache:false,
   processData:false,
   success:function(data){
    $('#file').val('');
    load_data();
    alert(data);
	window.location.href = "https://portal.pboglobal.com.au/index.php/dataimportview";
   }
  })
 });

});
</script>
