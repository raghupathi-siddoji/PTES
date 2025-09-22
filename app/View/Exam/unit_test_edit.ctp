<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
	  <h1>Edit Unit Test Marks</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Unit Test</a></li>
        <li class="active">Edit Unit Test</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content"> 
	
	
		
	<?php echo $this->Form->create('UnitTestDetail',array("url"=>array("controller"=>"Exam","action"=>"UnitTestEdit")));?>
	
	<div class="row">  
				<div class="col-md-12">
					<div class="box box-warning">
						<div class="box-header">
							<div class="col-md-3"><strong>Marks Edit</strong></div>
							
							<div class="col-md-3"><label>Date : </label>  <?php echo date('d-m-Y',strtotime($unit_test_marks[0]['UnitTest']['date']));?></div>
							<div class="col-md-3"><label>Subject : </label>  <?php echo $unit_test_marks[0]['SubjectAllocation']['subject'];?></div>
							<div class="col-md-2"><label>Class : </label>  <?php echo $unit_test_marks[0]['AddClass']['class_name'];?></div>
							
							<div class=" col-md-1">
							<?php echo $this->Form->submit("Submit",array("class"=>"btn btn-success btn-md",'name'=>'show_btn','value'=>'Show')); ?>
							</div>
						</div>
							
						<div class="box-body">
							<table class="table table-bordered">
								<thead>
									<tr>
										<th>#</th>
										<th>Student Name</th>
										
										<?php for ($g=0;$g<1;$g++) { ?>
										<th>Marks </th><?php } ?>
										
										
									</tr>
								</thead>
								<tbody>
									<?php 
									$i=0;
									foreach($marks as $lt) {
									?>
										<tr>
											<td><?php echo $i+1;?></td>
											<td><?php echo strtoupper($lt[3]); ?></td>
											<!--<td><?php //echo $lt['AddClass']['class_name']; ?></td>-->
											
											<td align="center"><?php echo $this->Form->input("marks.".$i,array("type"=>"text","value"=>$lt[4],"label"=>false));?> </td>
										
											<?php echo $this->Form->input("id.".$i,array("type"=>"hidden","value"=>$lt[0]));?>
											<?php echo $this->Form->input("unit_test_id.".$i,array("type"=>"hidden","value"=>$lt[1]));?>
											<?php echo $this->Form->input("student_detail_id.".$i,array("type"=>"hidden","value"=>$lt[2]));?>
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
		
	</div>
<script>
	$("#checkAll").click(function () {
    $(".check").prop('checked', $(this).prop('checked'));
});

  </script>