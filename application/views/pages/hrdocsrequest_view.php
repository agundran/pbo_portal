<script>
//Nav Bar Collapse Open when click ManageUser & Operators
$('#PBOInternal, #hrdocs').addClass('open');
$('#PBOInternal, #hrdocs').children('ul').slideDown();

 
   


</script> 
<div class="container">
   <div class="container-fluid">
		

                 
<?php


// PHP permanent URL redirection test
//header("Location: https://podio.com/webforms/21888073/1529497?fields[employee-no-2]=$emp_no&fields[employee-name-2]=$fname%20$lname;", true, 301);
//exit();
?> 
       

	   
<!-- In your <body> (required) -->
<!-- In your <body> (required) -->
<style type="text/css">
    .form-label-left{
        width:150px;
    }
    .form-line{
        padding-top:12px;
        padding-bottom:12px;
    }
    .form-label-right{
        width:150px;
    }
    body, html{
        margin:0;
        padding:0;
        background:#fff;
    }

    .form-all{
        margin:0px auto;
        padding-top:0px;
        width:690px;
        color:#999 !important;
        
		
		font-size:16px;
    }
	
	label {
    font-size: 15px;
    color: #999;
}

</style>

<style type="text/css" id="form-designer-style">
    /* Injected CSS Code */
.form-label.form-label-auto { display: block; float: none; text-align: left; width: inherit; } /*__INSPECT_SEPERATOR__*/
    /* Injected CSS Code */
</style>

<script src="https://cdn.jotfor.ms/static/prototype.forms.js" type="text/javascript"></script>
<script src="https://cdn.jotfor.ms/static/jotform.forms.js?3.3.13811" type="text/javascript"></script>
<script type="text/javascript">
   JotForm.setConditions([{"action":[{"id":"action_1573613887432","visibility":"Show","isError":false,"field":"6"}],"id":"1573613909981","index":"0","link":"Any","priority":"0","terms":[{"id":"term_1573613887432","field":"5","operator":"equals","value":"Certificate of Employment ","isError":false}],"type":"field"}]);
	JotForm.init(function(){
      JotForm.alterTexts(undefined);
	JotForm.clearFieldOnHide="disable";
	JotForm.submitError="jumpToFirstError";
    /*INIT-END*/
	});

   JotForm.prepareCalculationsOnTheFly([null,{"name":"heading","qid":"1","text":"HR Document Request","type":"control_head"},{"name":"submit2","qid":"2","text":"Submit","type":"control_button"},{"description":"","name":"employeeNo","qid":"3","subLabel":"","text":"Employee No.","type":"control_textbox"},{"description":"","name":"employeeName","qid":"4","subLabel":"","text":"Employee Name","type":"control_textbox"},{"description":"","name":"typeA","qid":"5","text":"Type of Document","type":"control_radio"},{"description":"","name":"typeA6","qid":"6","text":"Please Choose","type":"control_radio"},null,{"description":"","name":"pleaseSpecify","qid":"8","subLabel":"","text":"Please specify details \u002F purpose of your request","type":"control_textarea"}]);
   setTimeout(function() {
JotForm.paymentExtrasOnTheFly([null,{"name":"heading","qid":"1","text":"HR Document Request","type":"control_head"},{"name":"submit2","qid":"2","text":"Submit","type":"control_button"},{"description":"","name":"employeeNo","qid":"3","subLabel":"","text":"Employee No.","type":"control_textbox"},{"description":"","name":"employeeName","qid":"4","subLabel":"","text":"Employee Name","type":"control_textbox"},{"description":"","name":"typeA","qid":"5","text":"Type of Document","type":"control_radio"},{"description":"","name":"typeA6","qid":"6","text":"Please Choose","type":"control_radio"},null,{"description":"","name":"pleaseSpecify","qid":"8","subLabel":"","text":"Please specify details \u002F purpose of your request","type":"control_textarea"}]);}, 20); 
</script>
</head>
<body>
<form class="jotform-form" action="https://submit.jotform.me/submit/93158552351458/" method="post" name="form_93158552351458" id="93158552351458" accept-charset="utf-8">
  <input type="hidden" name="formID" value="93158552351458" />
  <input type="hidden" id="JWTContainer" value="" />
  <input type="hidden" id="cardinalOrderNumber" value="" />
  <div role="main" class="form-all">
    
	
	
	<ul class="form-section page-section">
	    <div class="form-header-group ">
          <div class="header-text httal htvam">
            <h2 id="header_1" class="form-header" data-component="header">
              HR Document Request
            </h2>
          </div>
        </div>
      

	
        <label class="form-label form-label-top form-label-auto" id="label_3" for="input_3"> Employee No. </label>
        <div id="cid_3" class="form-input-wide">
          <input type="text" id="input_3" name="q3_employeeNo" data-type="input-textbox" class="form-textbox" size="20" value="<?php echo $emp_no; ?>" data-component="textbox" aria-labelledby="label_3" readonly />
		  
	
        </div>
     
        <label class="form-label form-label-top form-label-auto" id="label_4" for="input_4"> Employee Name </label>
        <div id="cid_4" class="form-input-wide">
          <input type="text" id="input_4" name="q4_employeeName" data-type="input-textbox" class="form-textbox" size="20" value="<?php echo $fname.' '.$lname; ?>" data-component="textbox" aria-labelledby="label_4"  readonly />
        </div>
     
      <li class="form-line" data-type="control_radio" id="id_5">
        <label class="form-label form-label-top form-label-auto" id="label_5" for="input_5"> Type of Document </label>
        <div id="cid_5" class="form-input-wide">
          <div class="form-single-column" role="group" aria-labelledby="label_5" data-component="radio">
            <span class="form-radio-item" style="clear:left">
              <span class="dragger-item">
              </span>
              <input type="radio" class="form-radio" id="input_5_0" name="q5_typeA" value="Certificate of Employment" />
              <label id="label_input_5_0" for="input_5_0"> Certificate of Employment </label>
            </span>
            <span class="form-radio-item" style="clear:left">
              <span class="dragger-item">
              </span>
			  <br>
              <input type="radio" class="form-radio" id="input_5_1" name="q5_typeA" value="BIR 2316" />
              <label id="label_input_5_1" for="input_5_1"> BIR 2316 </label>
            </span>
            <span class="form-radio-item" style="clear:left">
              <span class="dragger-item">
              </span>
			  <br>
              <input type="radio" class="form-radio" id="input_5_2" name="q5_typeA" value="Others" />
              <label id="label_input_5_2" for="input_5_2"> Others </label>
            </span>
          </div>
        </div>
      </li>


      <li class="form-line form-field-hidden" style="display:none;" data-type="control_radio" id="id_6">
        <label class="form-label form-label-top" id="label_6" for="input_6"> Please Choose </label>
        <div id="cid_6" class="form-input-wide">
          <div class="form-multiple-column" data-columncount="2" role="group" aria-labelledby="label_6" data-component="radio">
            <span class="form-radio-item">
              <span class="dragger-item">
              </span>
              <input type="radio" class="form-radio" id="input_6_0" name="q6_typeA6" value="With Compensation Declaration" />
              <label id="label_input_6_0" for="input_6_0"> With Compensation  </label>
            </span>
            <span class="form-radio-item">
			<br>
              <span class="dragger-item">
              </span>
              <input type="radio" class="form-radio" id="input_6_1" name="q6_typeA6" value="Without Compensation Declaration" />
              <label id="label_input_6_1" for="input_6_1"> Without Compensation </label>
            </span>
          </div>
        </div>
      </li>


        <label class="form-label form-label-top form-label-auto" id="label_8" for="input_8"> Please specify details / purpose of your request </label>
        <div id="cid_8" class="form-input-wide">
          <textarea id="input_8" class="form-textarea" name="q8_pleaseSpecify" cols="40" rows="6" data-component="textarea" aria-labelledby="label_8"></textarea>
        </div>
        <br>
        <div id="cid_2" class="form-input-wide">
          <div style="margin-left:1px" class="form-buttons-wrapper ">
            <button id="input_2" type="submit" class="form-submit-button" data-component="button">
              Submit
            </button>
          </div>
        </div>
      
	  
	  
	 
    </ul>
	
	
	
	
  </div>
  <input type="hidden" id="simple_spc" name="simple_spc" value="93158552351458" />
  <script type="text/javascript">
  document.getElementById("si" + "mple" + "_spc").value = "93158552351458-93158552351458";
  </script>
  <div class="formFooter-heightMask">
  </div>

</form></body>
</html>
<script type="text/javascript">JotForm.ownerView=true;</script>

	 
	   
	   
	   
	   </div>
	  

</div>


</div>
	
	
	

    
     