 <?php //print_r($govt_class_amount_array);?>
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
	  <h1>Class Wise Nominal Report</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Fee</a></li>
        <li class="active">Class wise Fee Details</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
  
	<div class="row"> 
		<!------------------------------------>
		 
		<?php echo $this->Form->create('Report',array("url"=>array("controller"=>"Report","action"=>"classwiseNominalRollReport")));?>
		
			<div class="form-horizontal">
				<div class="col-md-2">&nbsp;</div>
				<div class="col-md-6"> 
					<div class="box box-warning"> 
						<div class="box-header with-border">
							<div class="row"> 
								<div class="col-md-4">
									<label>Academic Year <span class="mandatory_fields">*</span></label>
									<?php echo $this->Form->input("academic_year_id",array("type"=>"select","options"=>$academic_year_array,"class"=>"form-control select_box","empty"=>"select","required","label"=>false));?>		
								</div>
								
								<div class="col-md-4">
									<label>Class <span class="mandatory_fields">*</span></label>
									<?php echo $this->Form->input("class_id",array("type"=>"select","options"=>$class_array,"class"=>"form-control select_box","empty"=>"select","required","label"=>false));?>		
								</div>  
								<div class="col-md-4"><br>
									<?php echo $this->Form->submit("Submit",array("class"=>"btn btn-primary btn-sm",'name'=>'show_btn','value'=>'Show')); ?>
								</div>
							</div>
							<!--<span><a href="" class="btn btn-primary btn-sm pull-right" data-toggle="modal" data-target="#management">Enter Student Code</a></span>-->
						</div>
					</div>
				</div>
				<div class="col-md-4">&nbsp;</div>
			</div>		
		<?php echo $this->Form->end(); ?> 
	</div>
	 
	
	<?php if(isset($_POST['show_btn'])!=''){
		$class_id = $this->request->data['Report']['class_id'];
		$academic_year_id = $this->request->data['Report']['academic_year_id']; 
	?>
	<div class="row">
		<div class="col-md-12 col-md-push-11">  
			<?php echo $this->Html->link('<i class="fa fa-print fa-2x" ></i>',
											array("controller"=>"Report","action"=>"classwiseNominalRollReportPrint", $class_id,$academic_year_id),
											array("escape"=>false,"target"=>"_blank","title"=>"Print")); ?> 
		</div>
	</div>
	<div class="row">
		<div class="form-horizontal"> 
			<div class="col-md-12"> 
				<div class="box box-warning">			
					<div class="box-body"> 
						<div class="row"> 
							<div class="col-md-12 text-center"><h4>NOMINAL ROLL FOR THE ACADEMIC YEAR: <?php echo $nominal_roll_list[0]['AcademicYear']['academic_year'];?> & CLASS: <?php echo $nominal_roll_list[0]['AddClass']['class_name'];?></h4></div>
						</div>
						 
						<!--DISPLAY START -->
							<table width="100%" class="table-bordered">
							  <tr style="background:#999999;color:white" align="center">
								<td>Sl.No</td>
								<td>Student Name</td>
								<td>Student Code</td>
								<td>Admission No</td>
								<td>Father Name</td>
								<td>Mother Name</td>
								<td>DOB</td>
								<td>Caste/Subcaste</td>
								<td>Mother Tongue</td>
								<td>Mobile No</td> 
							  </tr>
							  <?php 
							  $i=1;
							  $j=0;
							  $father_name= "-";
							  $mother_name = "-";
							  $mobile_no = "";
							  foreach($nominal_roll_list as $list): 
								 $father_name= $list['ParentDetail'][0]['father_name'];
								 $mother_name = $list['ParentDetail'][0]['mother_name'];
								 $mobile_no = $list['ParentDetail'][0]['mobile_no'];
							  ?>
							  <tr align="left">
								<td><?php echo $i;?></td>
								<td><?php echo $list['StudentDetail']['student_name'];?> </td>
								<td><?php echo $list['StudentDetail']['student_code'];?> </td>
								<td><?php echo $list['StudentDetail']['admission_number'];?> </td>
								<td><?php echo $father_name;?> </td>
								<td><?php echo $mother_name;?> </td>
								<td><?php echo date('d-m-Y',strtotime($list['StudentDetail']['dob']));?> </td>
								<td><?php echo $list['Caste']['caste'];?>/<?php echo $list['SubCaste']['subcaste'];?> </td>
								<td><?php echo $list['MotherTongue']['mother_tongue'];?> </td>
								<td><?php echo $mobile_no;?> </td>
							  </tr> 
							  <?php $i++;$j++;endforeach;?>
							</table>
						<!--DISPLAY END -->
					</div>
				</div>
			</div> 
			 
		</div>
	</div> 
	
	 
	
	
	<?php echo $this->Form->end(); ?>
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
  
      