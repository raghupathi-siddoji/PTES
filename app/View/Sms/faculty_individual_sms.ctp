   
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  <style>

  </style>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
		Faculty Individual Wise Send SMS
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-envelope-o" aria-hidden="true"></i> SMS</a></li>
		<li>Individual Wise Send SMS</li>
        <li class="active">Individual SMS</li>
      </ol>
    </section>
	
	<!--<section class="content" style="padding-bottom:1px;min-height:20px;">
		<div class="row">
			<div class="col-md-6">
				<div class="box box-info">
					<?php echo $this->Session->flash(); ?>	
				<?php //echo $this->Form->create("Facultie",array("class"=>"form-horizontal"),array("url"=>array("controller"=>"Sms","action"=>"facultyIndividualSms")));?>
				<form action="facultyIndividualSms" name="facultyIndividualSms" method="POST" class="form-horizontal">
					<div class="box-body">
					
						<div class="col-md-9">
							<div class="form-group">											
								<label for="select" class="col-sm-4 control-label">Faculty Type</label>
								<div class="col-sm-8">
									<?php $options =array("All"=>'All',"Teaching"=>'Teaching',"NonTeaching"=>'Non-Teaching');
												 echo $this->Form->input("faculty",array("type"=>"select","label"=>false,"options"=>$options,"class"=>"form-control","required","empty"=>"Select"));?>
								</div>
							</div>
						</div>
						<div class="col-md-2">
							<button type="submit" class="btn btn-success" name="search_btn">
									  <i class="glyphicon glyphicon-search"></i>  Search
									</button>
						</div>
						
					</div>
					<?php echo $this->Form->end();?>
				</div>
			</div>
		</div>
	</section>-->
	
	<!--main content-->
		 <!-- Main content -->
	<?php //if(isset($this->request->data['search_btn'])){
		//$faculty=  $this->request->data['faculty'];
		 
	?>
    <section class="content">
    <!-- <div class="container">-->
	
	<?php //echo //$this->Form->create("IndividualSms",array("class"=>"form-horizontal"),array("url"=>array("controller"=>"Sms","action"=>"degreeIndividualSmsSend")));?>
	 <form action="facultyIndividualSmsSend" method="POST" class="form-horizontal">
	 <?php   $this->Form->input('faculty',array("type"=>"text"));?>	 
		<div class="row">
			<div class="col-md-6">
				<div class="box box-warning">
					<div class="box-body">
						<table class="table table-bordered" id="example1">
								<thead>
									<tr>
										<th><input type="checkbox" id="checkAll"></th>
										<th>Faculty Name</th>
										<th>Mobile Number</th>
									</tr>
								</thead>
								<tbody>
									<?php 
									$i=1;
									foreach($faculty_list as $lt) {
									$mobile = $lt['StaffDetail']['mobile'].','.$lt['StaffDetail']['id'];									
									?>
									<tr>
										 
										<td><input type="checkbox" class="check" name="mobile_no[]" value="<?php echo $mobile ?>"></td>
										<td><?php echo $lt['StaffDetail']['first_name']; ?></td>
										<td><?php echo $lt['StaffDetail']['mobile']; ?></td>
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
						 
						<?php echo $this->Form->submit('Send',array("class"=>"btn btn-success"));?>
					  </div>
					  <!-- /.box-footer -->
					
				</div>
			</div>
		<?php echo $this->Form->end();?>
		</div>
	<!--</div>-->
      <!-- /.row -->
    </section>
	<?php //}?>
	
	<!--main content end-->
  </div>
  <script>
	$("#checkAll").click(function () {
    $(".check").prop('checked', $(this).prop('checked'));
});

  </script>
  
  <script> 
  function get_course_onstream(stream_id)
  {  
	if(stream_id != ""){
		 

		$.get( "<?php echo $this->webroot?>Admission/populateCourse/"+stream_id, function( data ) {
		  $( "#course_list" ).html( data ); 
		  
		});
	}
	 
  }
  </script>