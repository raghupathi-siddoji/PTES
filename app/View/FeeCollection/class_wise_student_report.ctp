 <?php //print_r($govt_class_amount_array);?>
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
	  <h1>Class Wise Details</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Fee</a></li>
        <li class="active">Class wise Details</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
  
	<div class="row"> 
		<!------------------------------------>
		 
		<?php echo $this->Form->create('FeeCollection',array("url"=>array("controller"=>"FeeCollection","action"=>"classWiseStudentReport")));?>
		
			<div class="form-horizontal">
				<div class="col-md-2">&nbsp;</div>
				<div class="col-md-6"> 
					<div class="box box-warning"> 
						<div class="box-header with-border">
							<div class="row"> 
								<div class="col-md-4">
									<?php echo $this->Form->input("academic_year_id",array("type"=>"select","options"=>$academic_year_array,"class"=>"form-control"));?>		
								</div>
								
								<div class="col-md-4">
									<?php echo $this->Form->input("class_id",array("type"=>"select","options"=>$class_array,"class"=>"form-control"));?>		
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
	 
	
	<?php if(isset($_POST['show_btn'])!=''){?>
	 	
	<div class="row">
		<div class="form-horizontal"> 
			<div class="col-md-12"> 
				<div class="box box-warning">			
					<div class="box-body">  
						<div class="row">
							<div class="col-md-2">Class:</div>
							<div class="col-md-2"><?php echo $student_list[0]['AddClass']['class_name'];?></div>
							<div class="col-md-2">Academic Year:</div>
							<div class="col-md-2"><?php echo $student_list[0]['AcademicYear']['academic_year'];?></div>
							
						</div>
						<div class="row">
							 
							<div class="col-md-12 text-center"></div>
						</div>
						<!--DISPLAY START -->
							<table width="100%" class="table-bordered">
							   
							  <tr align="center">
								<td>Sl.No</td>
								<td>Student Name</td>
								<td>Student Code</td>
								<td>Caste</td>
								 
								<td>MPM/Non</td> 
								<td>RTE/NON</td> 
							  </tr>
							  <?php  
								$j=1;
								foreach($student_list as $list): 
									
								?>
								<tr>
									<td><?php echo $j;?></td>
									<td><?php echo $list['StudentDetail']['student_name'];?></td>
									<td><?php echo $list['StudentDetail']['student_code'];?></td>
									<td><?php echo $list['Caste']['caste'];?></td>
									 
									<td><?php echo $list['StudentDetail']['mpm_employee'];?></td>
									<td><?php echo $list['StudentDetail']['admitting_under_rte'];?></td>
								</tr> 
							  <?php  $j++;endforeach;?>
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
  
      