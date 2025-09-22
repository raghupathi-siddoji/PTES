  <?php //print_r($ind_list);?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  <style>

  </style>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
		Individual Wise Send SMS
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-envelope-o" aria-hidden="true"></i> SMS</a></li>
		<li>Individual Wise Send SMS</li>
        <li class="active">Individual SMS</li>
      </ol>
    </section>
	
	<section class="content" style="padding-bottom:1px;min-height:20px;">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-info">
					<?php echo $this->Session->flash(); ?>	
				<form class="form-horizontal" action="individualSms" name="IndividualSms" method="POST">
					<div class="box-body">
						<div class="col-md-4">
							<div class="form-group">											
								<label for="select" class="col-sm-4 control-label">Batch</label>
								<div class="col-sm-8">
									<?php 
												 echo $this->Form->input("academic_year_id",array("type"=>"select","label"=>false,"options"=>$year_list,"class"=>"form-control","empty"=>"Select","required"));?> 
								</div>								
							</div>							
						</div>
						<div class="col-md-3">
							<div class="form-group">											
								<label for="select" class="col-sm-4 control-label">Class</label>
								<div class="col-sm-8">
									<?php  
												echo $this->Form->input("add_class_id",array("type"=>"select","label"=>false,"options"=>$classes,"class"=>"form-control","empty"=>"Select","required"));
												?> 
								</div>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">											
								<label for="select" class="col-sm-4 control-label">Section</label>
								<div class="col-sm-8">
									<?php  
												echo $this->Form->input("section_id",array("type"=>"select","label"=>false,"options"=>$listSection,"class"=>"form-control","empty"=>"Select"));
												?>
								</div>
							</div>
						</div>
						<div class="col-md-2">
							<button type="submit" class="btn btn-success" name="search_btn">
									  <i class="glyphicon glyphicon-search"></i>  Search
									</button>
						</div>
						
					</div>
					</form>
				</div>
			</div>
		</div>
	</section>
	
	<!--main content-->
		 <!-- Main content -->
	<?php if(isset($this->request->data['search_btn'])){
	 
		$academic_year_id=  $this->request->data['academic_year_id']; 
		$section_id =  $this->request->data['section_id']; 
		$course =  $this->request->data['add_class_id'];
				 
	 
	?>
	
	 
    <section class="content">
    <!-- <div class="container">-->
	
	<form class="form-horizontal" action="individualSmsSend" name="individualSmsSend" method="POST">
	<input type="hidden" name="academic_year_id" value="<?php echo $academic_year_id;?>"> 
	 <input type="hidden" name="section_id" value="<?php echo $section_id;?>">
	 <input type="hidden" name="course" value="<?php echo $course;?>">
		<div class="row">
			<div class="col-md-6">
				<div class="box box-warning">
					<div class="box-body">
						<table class="table table-bordered" id="example1">
								<thead>
									<tr>
										<th><input type="checkbox" id="checkAll"></th>
										<th>Student Name</th>
										<th>Mobile Number</th>
									</tr>
								</thead>
								<tbody>
									<?php 
									$i=1;
									foreach($ind_list as $lt) {
									$mobile = $lt['StudentDetail']['father_mobile_number'].",".$lt['StudentDetail']['id'];
									?>
									<tr>
										<td><input type="checkbox" class="check" name="mobile_no[]" value="<?php echo $mobile ?>"></td>
										<td><?php echo $lt['StudentDetail']['student_name']; ?></td>
										<td><?php echo $lt['StudentDetail']['father_mobile_number']; ?></td>
									</tr> 
									<?php } ?>
											
								</tbody>
							</table>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="box box-warning">
					<div class="box-header with-border">
										
					</div>
					
						<div class="box-body">
							<div class="row"> 
								<div class="col-md-11">											
									<div class="form-group">											
										<label for="select" class="col-sm-4 control-label">Notification<span class="mandatory_fields">* </span></label>
										<div class="col-sm-8">
											<?php 
												 echo $this->Form->input("notification_type_id",array("type"=>"select","label"=>false,"options"=>$notification_list,"class"=>"form-control","required","empty"=>"Select"));?>
										</div>
									</div>											
									<div class="form-group">
										<label for="name" class="col-sm-4 control-label">Message<span class="mandatory_fields"> * </span></label>
										<div class="col-sm-8">
											<textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
										</div>
									</div>
								</div>
							</div>
						</div>
					  <!-- /.box-body -->
					  <div class="box-footer">								
						<button type="submit" class="btn btn-success" style="margin-left:146px;" value="Save"><i class="fa fa-paper-plane-o" aria-hidden="true"></i> Send</button>								
					  </div>
					  <!-- /.box-footer -->
					
				</div>
			</div>
		</form>	
		</div>
	<!--</div>-->
      <!-- /.row -->
    </section>
	<?php }?>
	
	<!--main content end-->
  </div>
  <script>
	$("#checkAll").click(function () {
    $(".check").prop('checked', $(this).prop('checked'));
});

  </script>