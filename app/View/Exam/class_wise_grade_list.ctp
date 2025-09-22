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
			<?php foreach($marks as $list ) { 
			$exam=$list['CreateExam']['exam_type'];
			$class_id=$list['AddClass']['id'];
			$academic_year_id=$list['AcademicYear']['id']; ?>
				<div class="row">
					<div class="col-md-10"><h4>Class Wise Grade List </hr></div>
					<div class="col-md-1"><?php echo $this->Html->link('<i class="btn btn-warning btn-sm pull-right">Go Back</i>',
					array('controller'=>'Exam','action'=>'classWiseGrade'),array('escape'=>false))?></div>
					<div class="col-md-1"><?php echo $this->Html->link('<i class="btn btn-info btn-sm pull-right">Print</i>',	array('controller'=>'Exam','action'=>'printoutGradeList',$exam,$class_id,$academic_year_id),array('escape'=>false,'target'=>'_blank'))?>
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
					<?php $no_subject=1; foreach($marks as $mark) { 
								for($i=1;$i<=10;$i++) {
									if(!empty($mark['SubjectAllocation']["sub$i"])) { ?>
										<th><?php $no_subject++;
											echo $mark['SubjectAllocation']["subcode$i"]; ?></th>
						<?php } } break; } ?>
						</tr>
					</thead>
					
					<tbody>
					<?php $number=1; 
						foreach($marks as $mark_data) { ?>
						<tr>
						<td><?php echo $number++; ?></td>
						<td width="120"><?php echo $mark_data['StudentDetail']['student_name']; ?></td>
						<?php 
							for($count=1;$count<$no_subject;$count++) { ?>
						<td>
							<?php foreach($grade as $g)
							{
								if(($g['GradeSetting']['from_marksA+']>=(round($mark_data['MarksEntry']["marks$count"]/$percent))) && ($g['GradeSetting']['to_marksA+']<=(round($mark_data['MarksEntry']["marks$count"]/$percent))))
									echo $g['GradeSetting']['gradeA+']."/".number_format($mark_data['MarksEntry']["marks$count"]/$percent,2);
								
								else if(($g['GradeSetting']['from_marksA']>=(round($mark_data['MarksEntry']["marks$count"]/$percent))) && ($g['GradeSetting']['to_marksA']<=(round($mark_data['MarksEntry']["marks$count"]/$percent))))
									echo$g['GradeSetting']['gradeA']."/".number_format($mark_data['MarksEntry']["marks$count"]/$percent,2);
								
								else if(($g['GradeSetting']['from_marksB+']>=(round($mark_data['MarksEntry']["marks$count"]/$percent))) && ($g['GradeSetting']['to_marksB+']<=(round($mark_data['MarksEntry']["marks$count"]/$percent))))
									echo $g['GradeSetting']['gradeB+']."/".number_format($mark_data['MarksEntry']["marks$count"]/$percent,2);
								
								else if(($g['GradeSetting']['from_marksB']>=(round($mark_data['MarksEntry']["marks$count"]/$percent))) && ($g['GradeSetting']['to_marksB']<=(round($mark_data['MarksEntry']["marks$count"]/$percent))))
									echo $g['GradeSetting']['gradeB']."/".number_format($mark_data['MarksEntry']["marks$count"]/$percent,2);
								
								else
									echo $g['GradeSetting']['gradeC']."/".number_format($mark_data['MarksEntry']["marks$count"]/$percent,2);
							} ?>
						</td>
								
						<?php } ?>
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