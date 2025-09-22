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
				<div class="row"><div class="col-md-12"><h4>Class Wise Mark List
					<?php echo $this->Html->link('<i class="btn btn-warning btn-sm pull-right">Marks Entry</i>',
					array('controller'=>'Exam','action'=>'MarksEntry'),array('escape'=>false))?></h4>
				</div></div>
			</div>
			<div class="box-body">
				<table class="table table-condensed table-bordered" id="example1">
				<thead>
					<tr><th>Sl.No</th><th>Class</th><th>Academic Year</th><th>Type of Exam</th><th>Maximum Marks</th><th>View</th><th>Delete</th>
				</thead>
				<tbody>
					<?php $i=1; foreach($list as $lt) { 
					$id=$lt['MarksEntryDetail']['id']; ?>
						<tr>
							<td><?php echo $i++; ?></td>
							<td><?php echo $lt['AddClass']['class_name']; ?></td>
							<td><?php echo $lt['AcademicYear']['academic_year']; ?></td>
							<td><?php echo $lt['CreateExam']['exam_type']; ?></td>
							<td><?php echo $lt['CreateExam']['max_marks']; ?></td>
							<td><?php echo $this->Html->link('View',array("controller"=>"Exam","action"=>"marksList",$id)); ?></td>
							<td><?php echo $this->Html->link('<i style="font-size:12px;" class="glyphicon glyphicon-trash"></i>'
						,array("controller"=>"Exam","action"=>"marksEntryDelete",$id),
						array("confirm"=>"Are you sure you want ro delete???","escape"=>false)); ?></td>
						</tr>
					<?php } ?>
				</tbody>
				</table>
			</div>
			<?php echo $this->session->flash(); ?>
        </div>
	</div>
	
 </div>
 <!-- row -->
	  
	  
    
	</section>
    <!-- content -->
  </div>
  <!-- content-wrapper -->