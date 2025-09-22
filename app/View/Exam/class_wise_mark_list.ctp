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
        <div class="box box-warning">
			<div class="box-header with-border">
			<?php foreach($marks_list as $list ) { 
						$id=$list['MarksEntry']['marks_entry_detail_id']; ?>
				<div class="row">
					<div class="col-md-10"><h4>Class Wise Mark List</h4></div>
					<div class="col-md-1">
						<?php echo $this->Html->link('<i class="btn btn-warning btn-sm pull-right">Go Back</i>',
						array('controller'=>'Exam','action'=>'classWiseMark'),array('escape'=>false))?>
					</div>
					<div class="col-md-1">
						<?php echo $this->Html->link('<i class="btn btn-info btn-sm pull-right">Print</i>',
						array('controller'=>'Exam','action'=>'printoutMarksList',$id),array('escape'=>false,'target'=>'_blank'))?>
					</div>
			</div>
			</div>
			<div class="box-body">
				<div class="row" style="color:#00C0EF">
					<div class="col-md-6">Class : <?php echo $list['AddClass']['class']; ?>
				</div> 
				</div>
				<div class="row" style="color:#00C0EF">
					<div class="col-md-2">Academic year : <?php echo $list['AcademicYear']['academic_year']; ?></div>
				</div>
				<div class="row" style="color:#00C0EF">
					<div class="col-md-4">Exam Type : <?php echo $list['CreateExam']['exam_type']; ?></div>
				</div>
			<?php  break; } ?>
				<table class="table table-condensed table-bordered">
					<thead>
						<tr>
						<th>Sl.No</th>
						<th>Name</th>
					<?php $no_subject=1; foreach($marks_list as $mark) { 
								for($i=1;$i<=10;$i++) {
									if(!empty($mark['SubjectAllocation']["sub$i"])) { ?>
										<th><?php $no_subject++;
											echo $mark['SubjectAllocation']["subcode$i"]; ?></th>
						<?php } } break; } ?>
						<th>Secured / Total</th>
						</tr>
					</thead>
					
					<tbody>
					<?php $number=1; 
						foreach($marks_list as $mark_data) { $total_marks=0; $marks_secured=0; ?>
						<tr>
						<td><?php echo $number++; ?></td>
						<td width="120"><?php echo $mark_data['StudentDetail']['student_name']; ?></td>
						<?php for($count=1;$count<$no_subject;$count++) { ?>
							<td><?php 
							$total_marks=$total_marks+$mark_data['CreateExam']['max_marks'];
							$marks_secured=$marks_secured+$mark_data['MarksEntry']["marks$count"];
							echo $mark_data['MarksEntry']["marks$count"]; ?></td>
						<?php } ?>
						<td><?php echo $marks_secured." / ".$total_marks; ?></td>
						</tr>
					<?php } ?>
					</tbody>
				</table>
			</div>
        </div>
	</div>
	
 </div>
 <!-- row -->
	  
	  
    
	</section>
    <!-- content -->
  </div>
  <!-- content-wrapper -->