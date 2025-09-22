  
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
	  <h4>Study Certificate for CET Counselling</h4>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Report</a></li>
        <li class="active">Study Certificate</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
     
  <!------------ ----------->
  
	 <div class="row">
        <!-- left column -->  
		<div class="col-md-1">&nbsp;</div>
		<div class="col-md-11">
         <div class="box box-success"> <br>
			<div class="box-body">
				 <?php echo $this->Form->create('Report',array("url"=>array("controller"=>"Report","action"=>"CetstudyCertificate")));?>
				 
					 <div class="row"> 
						<div class="col-sm-1"> </div> 
						<div class="col-sm-2"><label> Academic Year <span class="mandatory_fields">*</span></label></div> 
						<div class="col-sm-3"><label> Student Name / Code <span class="mandatory_fields">*</span></label></div>
						<div class="col-sm-2"><label> From Class <span class="mandatory_fields">*</span></label> </div>
						<div class="col-sm-2"><label> To Class <span class="mandatory_fields">*</span></label></div>
					</div>
					<div class="row"> 
						<div class="col-sm-1"> </div> 
						<div class="col-sm-2"><?php echo $this->Form->input("academic_year_id",array("type"=>"select","options"=>$academic_year_array,"class"=>"form-control select_box","empty"=>"Select","required","label"=>false));?></div>
						<div class="col-sm-3"><?php echo $this->Form->input('student_code',array("type"=>"text","class"=>"form-control","required","id"=>"student_code","placeholder"=>"Type student code or name","label"=>false));?> </div>
						<div class="col-sm-2"><?php echo $this->Form->input('add_class_from',array('type'=>'select','id'=>'add_class_id','options'=>$class_array,"required","class"=>"form-control select_box","empty"=>"Select","label"=>false));?></div>
						<div class="col-sm-2"><?php echo $this->Form->input('add_class_to',array('type'=>'select','id'=>'add_class_id','options'=>$class_array,"required","class"=>"form-control select_box","empty"=>"Select","label"=>false));?></div>
						<div class="col-sm-2"><?php echo $this->Form->submit('Show',array("class"=>"btn btn-info","name"=>"show_btn"));?>
						</div>	
					</div> 
				<br>
				 
			</div>
		 </div> 
        </div>  
      </div>
      <!-- row -->
	  
	  <!-- print area -->
	  <?php if(isset($_POST['show_btn'])!=''){ 
		$academic_year_id = $this->request->data['Report']['academic_year_id'];
		$student_code_ =  $this->request->data['Report']['student_code'] ;
		$from_class = $this->request->data['Report']['add_class_from'];
		$to_class = $this->request->data['Report']['add_class_to'];
		
	  ?>
		<div class="row" >
		   <div class="col-sm-10">&nbsp;</div>
		   <div class="col-sm-1">
			<?php echo $this->Html->link('<i class="fa fa-print fa-2x" ></i>',
											array("controller"=>"Report","action"=>"CetstudyCertificatePrint", $student_code_,$academic_year_id,$from_class,$to_class),
											array("escape"=>false,"target"=>"_blank","title"=>"Take a print")); ?></div>
											<div class="col-sm-2">&nbsp;</div>
		</div>
	
		<div class="row" >
	   <div class="col-sm-2">&nbsp;</div><div class="col-sm-9 background">
        <!-- left column --> 
		<table width="100%" border="0" style="font-size:90.0%;">
		  <tr>
			<td colspan="2" rowspan="18" align="center" valign="top"></td>
			<td colspan="5" align="center">&nbsp;</td>
			</tr>
		  <tr>
			<td colspan="5" align="center">&nbsp;</td>
		  </tr>
		  <tr>
			<td colspan="5" align="center" style="font-size:18px">&nbsp;</td>
			</tr>
		  <tr>
			<td colspan="5" align="center">&nbsp;</td>
			</tr>
		  <tr>
			<td colspan="5" align="center"></td>
			</tr>
		  <tr>
			<td align="center">&nbsp;</td>
			<td align="center">&nbsp;</td>
			<td align="right">&nbsp;</td>
			<td>&nbsp;</td>
			<td align="center">&nbsp;</td>
		  </tr>
		  <tr>
			<td align="center">&nbsp;</td>
			<td align="center">&nbsp;</td>
			<td align="right">&nbsp;</td>
			<td>&nbsp;</td>
			<td align="center">&nbsp;</td>
		  </tr>
		  <tr>
			<td align="center">&nbsp;</td>
			<td align="center">&nbsp;</td>
			<td align="right">&nbsp;</td>
			<td>&nbsp;</td>
			<td align="center">&nbsp;</td>
		  </tr>
		  <tr>
			<td align="center">&nbsp;</td>
			<td align="center">&nbsp;</td>
			<td align="right">&nbsp;</td>
			<td>&nbsp;</td>
			<td align="center">&nbsp;</td>
		  </tr>
		  <tr>
			<td align="center">&nbsp;</td>
			<td align="center">&nbsp;</td>
			<td align="right">&nbsp;</td>
			<td>&nbsp;</td>
			<td align="center">&nbsp;</td>
		  </tr>
		  <tr>
			<td align="center">&nbsp;</td>
			<td align="center">&nbsp;</td>
			<td align="right">&nbsp;</td>
			<td>&nbsp;</td>
			<td align="center">&nbsp;</td>
		  </tr>
		 
		   
		  <tr>
			<td align="center">&nbsp;</td>
			<td align="center">&nbsp;</td>
			<td align="right">&nbsp;</td>
			<td>&nbsp;</td>
			<td align="center">&nbsp;</td>
		  </tr>
		  <tr>
			<td align="center">&nbsp;</td>
			<td align="center">&nbsp;</td>
			<td align="right">&nbsp;</td>
			<td>&nbsp;</td>
			<td align="center">&nbsp;</td>
		  </tr>
		  <tr>
			<td align="center">&nbsp;</td>
			<td align="center">&nbsp;</td>
			<td align="right">&nbsp;</td>
			<td>&nbsp;</td>
			<td align="center">&nbsp;</td>
		  </tr>
		  <tr>
			<td align="center">&nbsp;</td>
			<td align="center">&nbsp;</td>
			<td align="right"></td>
			<td>&nbsp;</td>
			<td align="center">&nbsp;</td>
		  </tr>
		  <tr>
			<td width="21%" align="center">&nbsp;</td>
			<td width="21%" align="center">&nbsp;</td> 
			<td width="21%" align="center">&nbsp;</td> 
			<td width="21%" align="right"><strong>Date: <?php echo date('d-m-Y');?> </strong></td> 
			<td  align="right"></td>
			 
		  </tr>
		</table>
		<table width="90%" border="0" align="center"> 
   
  <tr>
    <td>&nbsp;</td>
    <td width="14%">&nbsp;</td>
    <td colspan="2">&nbsp;</td>
    <td colspan="3">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <?php 
			$gender ="";  
			if($study_certificate_details['StudentDetail']['gender']=="Female")
			{
				$gender ="D/o";
			}
			else{
				$gender ="S/o";
			}
			$student_name = $study_certificate_details['StudentDetail']['student_name'];
			$father_name = $study_certificate_details['ParentDetail'][0]['father_name'];
			$class = $study_certificate_details['AddClass']['class_name'];
			$academic_year =  $study_certificate_details['AcademicYear']['academic_year'];
			$admission_no = $study_certificate_details['StudentDetail']['admission_number'];
			$mother_tongue = $study_certificate_details['MotherTongue']['mother_tongue'];
			$dob = date('d-m-Y',strtotime($study_certificate_details['StudentDetail']['dob']));
			$caste = $study_certificate_details['Caste']['caste']." / ".$study_certificate_details['SubCaste']['subcaste'] ;
			$date_split = explode("-",$dob);
			$date_in_words_year = $this->DateToWord->convert_number($date_split[2]);
			$date_in_words = $this->DateToWord->convert_number($date_split[0]); 
			$month = date("F", strtotime($dob)); 
		  ?>
  <tr>
    <td>&nbsp;</td>
    <td colspan="6" style="font-size:16px;font-style:italic;line-height:40px;text-align:justify">This is to certify that&nbsp; Kumara / Kumari <span style="font-size:16px;font-weight:bolder;"><?php echo $student_name;?> <?php echo $gender;?> <?php echo $father_name;?>
       </span>&nbsp;<span style="font-size:16px;font-style:italic;">.&nbsp;has studied from <span style="font-weight:bold"><?php echo $from_class;?></span> to<span style="font-weight:bold"><?php echo $to_class;?></span> in our institution during the Academic year <span style="font-weight:bold"><?php echo $academic_year;?></span></span><br />
      He belongs to  <span style="font-weight:bold"><?php echo $caste;?></span>
      and mother tongue of the candidate is <span style="font-size:16px;font-style:italic;"><span style="font-weight:bold"><?php echo $mother_tongue;?></span></span> as per the Admission Register of the institution.</td>
    <td>&nbsp;</td>
  </tr>
  
  <tr>
    <td>&nbsp;</td>
    <td colspan="6" style="font-size:20px;font-style:italic;">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="6" style="font-size:16px;font-style:italic;font-weight:bold;">The above details are true and correct to the best of my knowledge. </td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="6" style="font-size:20px;font-style:italic;">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="6" style="font-size:20px;font-style:italic;">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="6" style="font-size:20px;font-style:italic;">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="6" style="font-size:20px;font-style:italic;">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td style="font-size:15px;font-style:italic;">Institution seal</td>
    <td style="font-size:20px;font-style:italic;">&nbsp;</td>
    <td style="font-size:20px;font-style:italic;">&nbsp;</td>
    <td style="font-size:20px;font-style:italic;">&nbsp;</td>
    <td align="right" style="font-size:15px;font-style:italic;">Signature of Head of the Institution. </td>
    <td style="font-size:20px;font-style:italic;">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="right" style="font-size:20px;font-style:italic;"></td>
    <td width="1%" align="right" style="font-size:20px;font-style:italic;">&nbsp;</td>
    <td width="1%" align="right" style="font-size:20px;font-style:italic;">&nbsp;</td>
    <td width="1%" align="right" style="font-size:20px;font-style:italic;">&nbsp;</td>
    <td width="57%" align="right" style="font-size:20px;font-style:italic;">&nbsp;</td>
    <td width="11%" align="right" style="font-size:20px;font-style:italic;">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="6" style="font-size:20px;font-style:italic;"></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="6" style="font-size:20px;font-style:italic;">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="6" style="font-size:20px;font-style:italic;"> </td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="6" style="font-size:20px;font-style:italic;">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="6" align="center" style="font-size:20px;font-style:italic;">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="6" align="center" style="font-size:20px;font-style:italic;"> 
      <span class="style1"> </span>   </td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="6" align="center" style="font-size:20px;font-style:italic;">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="6" style="font-size:20px;font-style:italic;">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="8" align="center">&nbsp;</td>
    </tr>
</table>
		</div>
			 <div class="col-md-2">&nbsp;</div>     
			</div>	 
		   
			  <!-- row -->
	  
      <!-- print area -->
	  <?php } ?>
	  
	  
	</section>
    <!-- content -->
  </div>
  <!-- content-wrapper -->
    <script>
	
    <!--AUTO COMPLETE REFERENCE -->
  
var $j = jQuery.noConflict();
  $j(function() {
	 
    var availableTags = [<?=$student?>];
    $j( "#student_code" ).autocomplete({
      source: availableTags
    });
  } ); 
 <!--AUTO COMPLETE REFERENCE -->
 
 </script>
 
 
  <style> 
	.background
	{
 		background:url('../img/ptesstudy.jpg') no-repeat !important; 
		background-size:800px 800px !important 
		/*width:800px;
		height:1000px;
		margin-top:80px;background-position:center;*/
    }  
</style>

 