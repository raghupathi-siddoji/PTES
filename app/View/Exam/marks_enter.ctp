
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
   <section class="content-header">
	  <h1>Examination</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Exam</a></li>
        <li class="active">Marks Entry</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
<!------------------------------------------------------------------------------------------------------->
<div class="row">	
	<div class="col-md-12">
	 <?php echo $this->Form->create('MarksEntry',array("url"=>array("controller"=>"Exam","action"=>"storeMarks")));?>
          <div class="box box-warning">
			<div class="box-header with-border">
				<div class="row"><div class="col-md-12"><h4>Marks Entry
					<?php echo $this->Html->link('<i class="btn btn-warning btn-sm pull-right">Go Back</i>',
					array('controller'=>'Exam','action'=>'marksEntry'),array('escape'=>false))?></h4>
				</div></div>
			</div>
		    
			<div class="box-body">
			<?Php foreach($exam as $exam_value) { ?>
				<?php echo $this->Form->input('id',array("type"=>"hidden")); ?>
			
				<div class="row" style="color:#00C0EF">
					<div class="col-md-1">Class : <?php echo $exam_value['AddClass']['class']; ?></div> 
				</div>
				<div class="row" style="color:#00C0EF">
					<div class="col-md-2">Academic year : <?php echo $exam_value['AcademicYear']['academic_year']; ?></div>
				</div>
				<div class="row" style="color:#00C0EF">
					<div class="col-md-4">Exam Type : <?php echo $exam_value['CreateExam']['exam_type']; ?></div> </div>
					<?php echo $this->Form->input('create_exam_id',array('type'=>'hidden','value'=>$exam_value['CreateExam']['id']));
					 echo $this->Form->input('add_class_id',array('type'=>'hidden','value'=>$exam_value['CreateExam']['add_class_id']));
					echo $this->Form->input('section_id',array('type'=>'hidden','value'=>$exam_value['CreateExam']['section_id']));
					 echo $this->Form->input('academic_year_id',array('type'=>'hidden','value'=>$exam_value['CreateExam']['academic_year_id']));
					$max_marks=$exam_value['CreateExam']['max_marks']; ?>
			<?php } ?>
				<table class="table table-condensed table-bordered" style="text-align:center">
				<thead>
					<tr>
						<th>#</th>
						<th>Name</th>
						
						<?php $no_subject=1; foreach($subject as $sub) { 
								echo $this->Form->input('subject_allocation_id',array('type'=>'hidden','value'=>$sub['SubjectAllocation']['id']));
								for($i=1;$i<=10;$i++) {
									if(!empty($sub['SubjectAllocation']["sub$i"])) { ?>
										<th><?php $no_subject++; echo $sub['SubjectAllocation']["sub$i"]; ?><span class="mandatory_fields"> * </span></th>
						<?php } } } ?>
					
					</tr>
				</thead>
				<tbody>
					<?php $number=1; foreach($student as $student_value) {
						echo $this->Form->input('student_detail_id.',array('type'=>'hidden','value'=>$student_value['StudentDetail']['id'])); ?>
						<tr>
							<td><?php echo $number++; ?></td>
							<td><?php echo $student_value['StudentDetail']['student_name']; ?></td>
							<?php for($count=1;$count<$no_subject;$count++) { ?>
							<td><?php echo $this->Form->input("marks$count.",array('type'=>'number','max'=>$max_marks,'min'=>'0','class'=>'form-control','label'=>false,'required','size'=>4,'value'=>$max_marks)); ?></td>
							<?php } ?>
						</tr>
					<?php } ?>
				</tbody>
				</table>
				
				<div class="form-group"></div>
				
				<div class="row">
				  <div class="col-md-4"></div>
				    <div class="col-md-4">
						<?php echo $this->Form->submit('Add',array("class"=>"btn btn-info pull-right form-control"));?>
						<?php echo $this->Form->end(); ?>
					</div>
				  <div class="col-md-4"></div>
				</div>
			</div>
			
			</div>
        </div>
		
		
		
      </div>
      <!-- row -->
	  
	  
    
	</section>
    <!-- content -->
  </div>
  <!-- content-wrapper -->