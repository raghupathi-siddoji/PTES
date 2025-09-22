 
  <!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">  
	<style>
	
	.content
	{min-height:1px;}
	
	</style>
		<!-- Content Header (Page header) -->
		<section class="content-header">
		  <h1>
			Daily Attendance
		  </h1>
		  <ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li>Attendance</li>
			<li class="active">Daily Attendance</li>
		  </ol>
		</section>
	
		<section class="content">
			<div class="row"> 
				<form method="post" action="AttendanceLists">
				<div class="col-md-1">&nbsp;</div>
				<div class="col-md-10">
					<div class="box box-info">
						<div class="box-body">
							<div class="col-md-3">
								<div class="form-group">											
									<label for="select" class="col-sm-4 control-label">Batch</label>
									<div class="col-sm-12">
									<?php 
									echo $this->Form->input("academic_year_id",array("type"=>"select","label"=>false,"options"=>$year_list,"class"=>"form-control","empty"=>"Select","required",'default'=>'9'));?> 
									 
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">											
									<label for="select" class="col-sm-4 control-label">Class</label>
									<div class="col-sm-12">
										<?php  
										echo $this->Form->input("add_class_id",array("type"=>"select","label"=>false,"options"=>$classes,"class"=>"form-control","empty"=>"Select","required"));
										?> 
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">											
									<label for="select" class="col-sm-4 control-label">Date</label>
									<div class="col-sm-12">
									 
												<?php echo $this->Form->input("attendance_date",array("id"=>"datepicker2","type"=>"text","label"=>false,"class"=>"form-control","placeholder"=>"MM/DD/YYYY","value"=>date('d-m-Y')));?>
											 
									</div>
								</div>
							</div>
							 
							<div class="col-md-3">
							 <div class="form-group">
							 <label for="select" class="col-sm-4 control-label">&nbsp;</label>
								<div class="col-sm-12">
									<button type="submit" class="btn btn-success" name="search_btn">
									  <i class="glyphicon glyphicon-search"></i> Search
									</button>
								</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-1">&nbsp;</div>
				</form>
			</div>
			<div class="row">
				<div class="col-md-4">
					<?php echo $this->Session->flash();?>
				</div>
			</div>
		</section>
		
		<?php if(isset($this->request->data['search_btn'])){?>
		
		<?php echo $this->Form->create('StudentAttendance',array("url"=>array("controller"=>"Attendance","action"=>"DailyAttendanceSave")));?>
		<?php echo $this->Form->input('add_class_id',array('type'=>"hidden","label"=>false,"value"=>$this->request->data['add_class_id']));?>
		<?php echo $this->Form->input('academic_year_id',array('type'=>"hidden","label"=>false,"value"=>$this->request->data['academic_year_id']));?>
		
		<!--<div class="row">
			<div class="col-md-10 col-md-push-9">
				<button type="submit" class="btn btn-success">Print</button>
			</div>
		</div>-->
		
		<section class="content"> 
			<div class="row">  
				<div class="col-md-2"></div>
				<div class="col-md-8">
					<div class="box box-warning">
						<div class="box-header"><strong>Daily Attendance <span class="text-red"> </span></strong></div>
						<div class="box-body">
							<table class="table table-bordered">
								<thead>
									<tr>
										<th>#</th>
										<th>Student Name</th> 
										<th>Class</th> 
										<th><?php echo $this->request->data['attendance_date'];?></th>
									</tr>
								</thead>
								<tbody>
								
									<?php 
									if(!empty($student_attendance_list)){
									$i=1;
									foreach($student_attendance_list as $lt) {
									 
									 
									?>
										<tr>
											<td><?php echo $i++;?></td>
											<td><?php echo strtoupper($lt['StudentDetail']['student_name']); ?></td> 
											<td><?php echo $lt['AddClass']['class_name']; ?></td> 
											<td><?php if($lt['StudentAttendanceDetail']['attendance_status']=="AB") echo "<span class='text-red'>".$lt['StudentAttendanceDetail']['attendance_status']."<span>"; else echo $lt['StudentAttendanceDetail']['attendance_status'];?>
											 
											</td>
										</tr>
									<?php } 
									}
									else
									{?>
										<tr colspan="4"> No Data Found</tr>
										
									<?php }
									?> 
								</tbody>
							</table> 
						</div>
					</div>
				</div> 	
				<div class="col-md-2">&nbsp;</div>
			</div>
		<?php echo $this->Form->end();?>
		</section>
		<?php }?>
		
	</div>
<script>
	$(document).ready(function(){
		var date_input=$('input[name="date"]'); //our date input has the name "date"
		var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
		date_input.datepicker({
			format: 'mm/dd/yyyy',
			container: container,
			todayHighlight: true,
			autoclose: true,
		})
	})
</script>