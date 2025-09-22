  
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
	  <h4>Character Certificate</h4>
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
				 <?php echo $this->Form->create('Report',array("url"=>array("controller"=>"Report","action"=>"charCertificate")));?>
				 	<div class="row">
							
							<div class="col-md-4">
									<label>Academic Year <span class="mandatory_fields">*</span></label>
									<?php echo $this->Form->input("1academic_year_id",array("type"=>"select","id"=>"year","options"=>$academic_year_array,"class"=>"form-control select_box","empty"=>"Select","required","label"=>false));?>		
								</div>
								<div class="col-md-4">
									<label>Class <span class="mandatory_fields">*</span></label>
									<?php echo $this->Form->input("1add_class_id",array("type"=>"select","options"=>$class_array1,"id"=>"class_id","class"=>"form-control select_box","empty"=>"select","required","label"=>false));?>		
								</div> 
								<div class="col-md-4">
									<label>Student Code<span class="mandatory_fields">*</span></label>
									<?php echo $this->Form->input("student_code",array("type"=>"select","id"=>"student_detail_id","class"=>"form-control","required","placeholder"=>"Type Student name or Code","label"=>false)); ?>
								</div>
								</div><br>
					 <div class="row"> 
						<div class="col-sm-1"> </div> 
						<div class="col-sm-2"><label> Academic Year <span class="mandatory_fields">*</span></label></div> 
						
						<div class="col-sm-2"><label> From Class <span class="mandatory_fields">*</span></label> </div>
						<div class="col-sm-2"><label> To Class <span class="mandatory_fields">*</span></label></div>
					</div>
					<div class="row"> 
						<div class="col-sm-1"> </div> 
						<div class="col-sm-2"><?php echo $this->Form->input("academic_year_id",array("type"=>"select","options"=>$academic_year_array,"class"=>"form-control select_box","empty"=>"Select","required","label"=>false));?></div>
						
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
											array("controller"=>"Report","action"=>"charCertificatePrint", $student_code_,$academic_year_id,$from_class,$to_class),
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
    <td width="8%">&nbsp;</td>
    <td width="10%">&nbsp;</td>
    <td colspan="2">&nbsp;</td>
    <td colspan="3">&nbsp;</td>
    <td width="8%">&nbsp;</td>
  </tr>
  <?php 
		$gender ="";  
		if($char_certificate_details['StudentDetail']['gender']=="Female")
		{
			$gender ="D/o";
		}
		else{
			$gender ="S/o";
		}
		$father_name = $char_certificate_details['ParentDetail'][0]['father_name']; 
		$academic_year =  $char_certificate_details['AcademicYear']['academic_year'];
		
		
	?>
  <tr>
    <td>&nbsp;</td>
    <td colspan="6" style="font-size:20px;font-style:italic;line-height:40px;text-align:justify">This is to certify that&nbsp;<span style="font-size:20px;font-weight:bolder;"><?php echo $char_certificate_details['StudentDetail']['student_name'];?> <?php echo $gender;?> <?php echo $father_name;?>
            </span>&nbsp;<span style="font-size:20px;font-style:italic;">.has
studied from <span style="font-weight:bold"><?php echo $from_class;?></span> to <span style="font-weight:bold"><?php echo $to_class;?></span> in our Institution </span><span style="font-size:20px;font-weight:bolder;"> </span><span style=IInd PUC"font-size:20px;font-style:italic;">  during the year <span style="font-weight:bold"><?php echo $academic_year;?>.</span></span></td>
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
    <td colspan="6" style="font-size:20px;font-style:italic;text-align:center;font-weight:bold;">  "HIS / HER CHARACTER AND CONDUCT ARE / WERE SATISFACTORY"  .</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="6" style="font-size:20px;font-style:italic;">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="6" align="right" style="font-size:20px;font-style:italic;">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="right" style="font-size:20px;font-style:italic;">&nbsp;</td>
    <td width="15%" align="right" style="font-size:20px;font-style:italic;">&nbsp;</td>
    <td width="3%" align="right" style="font-size:20px;font-style:italic;">&nbsp;</td>
    <td width="25%" align="right" style="font-size:20px;font-style:italic;">&nbsp;</td>
    <td width="20%" align="right" style="font-size:20px;font-style:italic;">&nbsp;</td>
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
    <td style="font-size:20px;font-style:italic;">Date : </td>
    <td style="font-size:20px;font-style:italic;"><?php echo date('d-m-Y');?></td>
    <td colspan="4" style="font-size:20px;font-style:italic;">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="left" style="font-size:20px;font-style:italic;">Place : </td>
    <td align="right" style="font-size:20px;font-style:italic;">Bhadravathi.</td>
    <td align="right" style="font-size:20px;font-style:italic;">&nbsp;</td>
    <td colspan="3" align="right" style="font-size:20px;font-style:italic;">Signature of Principal</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="6" align="center" style="font-size:20px;font-style:italic;">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="6" align="center" style="font-size:20px;font-style:italic;">&nbsp; </td>
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
 		background:url('../img/ptescharactercertificat.jpg') no-repeat !important; 
		background-size:800px 800px !important 
		/*width:800px;
		height:1000px;
		margin-top:80px;background-position:center;*/
    }  
</style>

 