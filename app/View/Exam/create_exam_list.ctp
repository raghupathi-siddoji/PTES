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
			<div class="row">
				<div class="col-md-4"><h4>Exam List</h4></div>
				<div class="col-md-4"><?php echo $this->Session->flash(); ?></div>
				<div class="col-md-4"><a href="../Exam/createExam" class="btn btn-info btn-sm pull-right">Create Examination</a></div>
			</div>
		</div>
			
			<div class="box-body">
				<table class="table table-condensed table-bordered" id="example1">
					<thead>
						<tr>
							<th>Sl.No</th>
							<th>Class</th>
							<th>Academic Year</th>
							<th>From</th>
							<th>To</th>
							<th>Maximum Marks</th>
							<th>Exam Name</th>
							<th>Delete</th>
							<th>Edit</th>
						</tr>
					</thead>
					
					<tbody>
					 <?php $number=1; foreach($exam as $sub) { 
					 $id=$sub['CreateExam']['id']; ?> 
						<tr>
							<td><?php echo $number++; ?></td>
							<td><?php echo $sub['AddClass']['class']; ?></td>
							<td><?php echo $sub['AcademicYear']['academic_year']; ?></td>
							<td><?php echo date('d-M-Y',strtotime($sub['CreateExam']['from_date'])); ?></td>
							<td><?php echo date('d-M-Y',strtotime($sub['CreateExam']['to_date'])); ?></td>
							<td><?php echo $sub['CreateExam']['max_marks']; ?></td>
							<td><?php echo $sub['CreateExam']['exam_type']; ?></td>
						
							<td><?php echo $this->Html->link('<i style="font-size:17px;" class="glyphicon glyphicon-trash"></i>'
						,array("controller"=>"Exam","action"=>"createExamDelete",$id),
						array("confirm"=>"Are you sure you want ro delete???","escape"=>false)); ?></td>	
					
					<td><?php echo $this->Html->link('<i style="font-size:17px;" class="glyphicon glyphicon-edit"></i>'
					,array("controller"=>"Exam","action"=>"createExam",$id),
					array("escape"=>false)); ?></td>
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