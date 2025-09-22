  
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
	  <h4>Study Certificate</h4>
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
		
        <div class="col-md-2"></div>
		
		<div class="col-md-9">
         <div class="box box-success"> <br>
			<div class="box-body">
				 <?php echo $this->Form->create('Report',array("url"=>array("controller"=>"Report","action"=>"studyCertificate")));?>
				 
					 <div class="row">
						<div class="col-md-3">
									<label>Academic Year <span class="mandatory_fields">*</span></label>
									<?php echo $this->Form->input("academic_year_id",array("type"=>"select","id"=>"year","options"=>$academic_year_array,"class"=>"form-control select_box","empty"=>"Select","required","label"=>false));?>		
								</div>
								<div class="col-md-3">
									<label>Class <span class="mandatory_fields">*</span></label>
									<?php echo $this->Form->input("add_class_id",array("type"=>"select","options"=>$class_array,"id"=>"class_id","class"=>"form-control select_box","empty"=>"select","required","label"=>false));?>		
								</div> 
								<div class="col-md-3">
									<label>Student Code<span class="mandatory_fields">*</span></label>
									<?php echo $this->Form->input("student_code",array("type"=>"select","id"=>"student_detail_id","class"=>"form-control","required","placeholder"=>"Type Student name or Code","label"=>false)); ?>
								</div> 	
						<div class="col-sm-3"><label></label>
							<?php echo $this->Form->submit('Show',array("class"=>"btn btn-info","name"=>"show_btn"));?>
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
	  ?>
		<div class="row" >
		   <div class="col-sm-10">&nbsp;</div>
		   <div class="col-sm-1">
			<?php echo $this->Html->link('<i class="fa fa-print fa-2x" ></i>',
											array("controller"=>"Report","action"=>"studyCertificatePrint", $student_code_,$academic_year_id),
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
			<td colspan="5" align="center">&nbsp;</td>
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
			<td align="right">&nbsp;</td>
			<td>&nbsp;</td>
			<td align="center">&nbsp;</td>
		  </tr>
		  <tr>
			<td width="21%" align="center">&nbsp;</td>
			<td width="21%" align="center">&nbsp;</td>
			<td width="22%" align="right"><strong></strong></td>
			<td width="10%"><strong> </strong></td>
			<td width="10%" align="center">&nbsp;</td>
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
			<td colspan="6" style="font-size:18px;font-style:italic;line-height:35px;text-align:justify">This is to certify that&nbsp; Kumara / Kumari <span style="font-size:20px;font-weight:bolder;"><?php echo $study_certificate_details['StudentDetail']['student_name'];?> <?php echo $gender;?> <?php echo $father_name;?> 
			   </span>&nbsp;<span style="font-size:20px;font-style:italic;">.&nbsp;is a bonafide student of this Institution  studying in <span style="font-weight:bold"><?php echo $class;?></span> during the Academic year <span style="font-weight:bold"><?php echo $academic_year;?>. </span></span><br />
			   Admission number :  <span style="font-weight:bold"><?php echo $admission_no;?></span><br />
			  Date of birth: <span style="font-size:18px;font-style:italic;"><span style="font-weight:bold;font-size:16px;"><?php echo $dob;?> ( <?php echo $date_in_words." - ".$month." - ".$date_in_words_year;?> ) </span></span><br />Caste: <span style="font-weight:bold"><?php echo $caste;?></span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Mother tongue : <span style="font-weight:bold"><?php echo $mother_tongue;?></span></td>
			<td>&nbsp;</td>
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
			<td>&nbsp;</td>
			<td colspan="6" style="font-size:20px;font-style:italic;"></td>
			<td>&nbsp;</td>
		  </tr>
		  <tr>
			<td>&nbsp;</td>
			<td colspan="6" style="font-size:15px;font-weight:bold;text-align:center">"HIS / HER CHARACTER AND CONDUCT ARE / WERE SATISFACTORY"</td>
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
			<td style="font-size:16px;font-style:italic;font-weight:bold;" colspan="4">Date:<?php echo date('d-m-Y');?></td> 
			<td align="right" style="font-size:16px;font-style:italic;font-weight:bold;">Signature of Principal </td>
			<td style="font-size:20px;font-style:italic;">&nbsp;</td>
			<td>&nbsp;</td>
		  </tr>
		  <tr>
			<td>&nbsp;</td>
			<td align="right" style="font-size:20px;font-style:italic;">&nbsp;</td>
			<td width="1%" align="right" style="font-size:20px;font-style:italic;">&nbsp;</td>
			<td width="1%" align="right" style="font-size:20px;font-style:italic;">&nbsp;</td>
			<td width="1%" align="right" style="font-size:20px;font-style:italic;">&nbsp;</td>
			<td width="57%" align="right" style="font-size:20px;font-style:italic;">&nbsp;</td>
			<td width="11%" align="right" style="font-size:20px;font-style:italic;">&nbsp;</td>
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
  jQuery(document).ready(function($){
     $(" #year,#class_id").on('change', function () {

 		

         var year = $('#year').val();
         console.log(year);

         var class_id = $('#class_id').val();

         $("#student_detail_id").find('option').remove();

         if (class_id) {


             $.ajax({
                 type: "POST",
                 url: '<?php echo Router::url(array("controller" => "FeeCollection", "action" => "getStudents")); ?>',
                 data: {year: year,class_id: class_id},
                 cache: false,
                 success: function (html) {
                     console.log(html);

                     $.each(html, function (key, value) {
                         $('<option>').val('').text('select');
                         $('<option>').val(key).text(value).appendTo($("#student_detail_id"));
                     });
                 }
             });
         }
     });
});
 </script>
 
 
  <style> 
	.background
	{
 		background:url('../img/ptesstudy.jpg') no-repeat !important; 
		background-size:800px 900px !important 
		/*width:800px;
		height:1000px;
		margin-top:80px;background-position:center;*/
    }  
</style>

<script>
function myFunction(student_code,$academic_year) {
    var myWindow = window.open("study_certificate_print?student_code="student_code+"&academic_year="+academic_year, "MsgWindow", "width=700,height=600"); 
}
</script>