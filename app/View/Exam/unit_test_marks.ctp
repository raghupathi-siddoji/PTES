 
  <!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">  
	<style>
	
	.content
	{min-height:1px;}
	
	</style>
		<!-- Content Header (Page header) -->
		<section class="content-header">
		  <h1>
			Unit Test Marks Entry
		  </h1>
		  <ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
			<li>Unit Test</li>
			<li class="active">Unit Test Marks Entry</li>
		  </ol>
		</section>
		<section class="content">
			<div class="row"> 
				<?php echo $this->Form->create('UnitTest',array("url"=>array("controller"=>"Exam","action"=>"UnitTestMarks")));?>
				<div class="col-md-12">
					<div class="box box-info">
						<div class="box-body">
							<div class="col-md-2">
								<div class="form-group">											
									<label for="select" class="col-sm-2 control-label">Batch</label>
									<div class="col-sm-10">
									<?php 
									echo $this->Form->input("academic_year_id",array("type"=>"select","label"=>false,"options"=>$year_list,"class"=>"form-control","required"));?> 
									 
									</div>
								</div>
							</div>
							<div class="col-md-2">
								<div class="form-group">											
									<label for="select" class="col-sm-2 control-label">Class</label>
									<div class="col-sm-10">
										<?php  
										echo $this->Form->input("add_class_id",array("type"=>"select","label"=>false,"options"=>$classes,"class"=>"form-control","empty"=>"Select","required"));
										?> 
									</div>
								</div>
							</div>
							<div class="col-md-2">
								<div class="form-group">											
									<label for="select" class="col-sm-2 control-label">Section</label>
									<div class="col-sm-10">
										<?php  
										echo $this->Form->input("section_id",array("type"=>"select","label"=>false,"options"=>$listSection,"class"=>"form-control","empty"=>"Select"));
										?> 
									</div>
								</div>
							</div>
							<div class="col-md-2">
								<div class="form-group">											
									<label for="select" class="col-sm-2 control-label">Subject</label>
									<div class="col-sm-10">
										<?php  
										echo $this->Form->input("subject_allocation_id",array("type"=>"select","label"=>false,"options"=>$sub_list,"class"=>"form-control","empty"=>"Select","required"));
										?> 
									</div>
								</div>
							</div>
							<div class="col-md-2">
								<div class="form-group">											
									<label for="select" class="col-sm-2 control-label">Date</label>
										<div class="col-sm-10">
											<?php echo $this->Form->input('date',array("type"=>"text","class"=>"form-control","label"=>false,"id"=>"datepicker", 'value' => date('d-m-Y')));?>
											</div>
								</div>
							</div> 
							<div class="col-md-2">
								<div class="form-group">											
									<label for="select" class="col-sm-2 control-label">&nbsp; </label>
										<div class="col-sm-10">
											<button type="submit" class="btn btn-success" name="search_btn">
												<i class="glyphicon glyphicon-search"></i> Search
											</button>
										</div>
									
								</div> 
							
							</div>
					</div>
				</div>
				<?php echo $this->Form->end(); ?>
			</div>
			<div class="row">
				<div class="col-md-4">
					<?php echo $this->Session->flash();?>
				</div>
			</div>
		</section>
		
		<?php if(isset($this->request->data['search_btn'])){?>
		
		<?php echo $this->Form->create('UnitTest',array("url"=>array("controller"=>"Exam","action"=>"UnitTestMarksEntry")));	?>
		<?php echo $this->Form->input("academic_year_id",array("type"=>"hidden","value"=>$academic_year_id));?>
		<?php echo $this->Form->input("section_id",array("type"=>"hidden","value"=>$section_id));?>		
		<?php echo $this->Form->input("add_class_id",array("type"=>"hidden","value"=>$class_id));?>
		<?php echo $this->Form->input("subject_allocation_id",array("type"=>"hidden","value"=>$this->request->data['subject_allocation_id']));?>
		<?php echo $this->FOrm->input("UnitTest.date",array("type"=>"hidden","value"=>$date));?>
		
		
		<section class="content"> 
			<div class="row">  
				<div class="col-md-12">
					<div class="box box-warning">
						<div class="box-header">
							<div class="col-md-4"><strong>Marks Entry</strong></div>
								<div class="col-md-push-7 col-md-2"><?php echo $this->Form->submit("Submit",array("class"=>"btn btn-success btn-md",'name'=>'show_btn','value'=>'Show')); ?></div>
						</div>
						<div class="box-body">
							<table class="table table-bordered" id="example1">
								<thead>
									<tr>
										<th>#</th>
										<!--<th style="text-align:center;"><input type="checkbox" id="checkAll"></th>-->
										<th>Student Name</th>
										<th>Class</th>
										<?php for ($g=0;$g<1;$g++) { ?>
										<th>Marks </th><?php } ?>
										
										
									</tr>
								</thead>
								<tbody>
									<?php 
									$i=0;
									foreach($student_details as $lt) {
									$id = $lt['StudentDetail']['id'];
									
									?>
										<tr>
											<td><?php echo $i+1;?></td>
											<!--<td align="center"><?php //echo $this->Form->input("check.".$i,array("type"=>"checkbox","label"=>false,'class'=>'check'));?></td>-->
											<td><?php echo strtoupper($lt['StudentDetail']['student_name']); ?></td>
											<td><?php echo $lt['AddClass']['class_name']; ?></td>
											<?php //$grade=array("A"=>"A","B"=>"B","C"=>"C");
											for ($k=0;$k<1;$k++) {?>
											<td align="center"><?php echo $this->Form->input("marks.".$i.".".$k,array("type"=>"text","value"=>"0","label"=>false));?> </td>
											<?php } ?>
											
											<!--<td align="center"><?php 
												//$grade=array("A"=>"A","B"=>"B","C"=>"C");
											//echo $this->Form->input("grade.".$i,array("type"=>"select","label"=>false,"options"=>$grade,"class"=>"form-control","required"));?></td>-->
											<?php echo $this->Form->input("student_detail_id.".$i,array("type"=>"hidden","value"=>$lt['StudentDetail']['id']));?>
										</tr>
									<?php $i++; } ?> 
								</tbody>
							</table>
							<div class="col-md-push-7 col-md-2">
							<?php echo $this->Form->submit("Submit",array("class"=>"btn btn-success btn-md",'name'=>'show_btn','value'=>'Show')); ?>
							</div>
						</div>
					</div>
				</div> 	
			</div>
		<?php echo $this->Form->end();?>
		</section>
		<?php }?>
		
	</div>
<script>
	$("#checkAll").click(function () {
    $(".check").prop('checked', $(this).prop('checked'));
});

  </script>