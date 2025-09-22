  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>  Academic    </h1>
     <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Academic</a></li>
        <li class="active">Parent List</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-warning">
            <div class="box-header with-border">
				<div class="row">
					<div class="col-xs-8"><h4>Student List </h4></div>
					<div class="col-xs-4"><?php echo $this->Session->flash(); ?></div>
					<div class="col-xs-4">
						<?php echo $this->Html->link('<i class="btn btn-warning btn-sm pull-right">Go Back</i>',array('controller'=>'Student','action'=>'studentLists'),array('escape'=>false)) ;?>
					</div>
				</div>
			</div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
				<tr>
					<th>Sl.No</th><th>Student Name</th><th>Application #</th><th>Student Code</th><th>Admission #</th><th>Class</th><th>Section</th><th>Academic Year</th><th>Edit/Print</th>
				<th></th>
				</tr>
                </thead>
                <tbody>
				<?php $i=1; foreach($list as $lt) 
				 { $id=$lt['StudentDetail']['id']; 
				  $application_id=$lt['StudentDetail']['student_application_id']; 
				  $student_code=$lt['StudentDetail']['student_code']; 
				  $admison_id=$lt['StudentDetail']['admission_number'];		  ?>
					<tr>
						<td><?php echo $i++; ?></td>
						<td><?php echo $lt['StudentDetail']['student_name']; ?></td>
						<td><?php echo $lt['StudentApplication']['application_no']; ?></td>
						<td><?php echo $lt['StudentDetail']['student_code']; ?></td>
						<td><?php echo $lt['StudentDetail']['admission_number']; ?></td>
						<td><?php echo $lt['AddClass']['class_name']; ?></td>
						<td><?php echo $lt['Section']['section']; ?></td>
						<td><?php echo $lt['AcademicYear']['academic_year']; ?></td>
						
						<!---<td><?php echo $this->Html->link('<i style="font-size:17px;" class="glyphicon glyphicon-trash"></i>'
						,array("controller"=>"Student","action"=>"deleteStudent", $id),
						array("confirm"=>"Are you sure you want ro delete???","escape"=>false)); ?></td>-->
						
						<td><?php echo $this->Html->link('<i style="font-size:17px;" class="glyphicon glyphicon-edit"></i>'
						,array("controller"=>"Student","action"=>"studentDetail", $id),
						array("escape"=>false)); ?> |
						<?php echo $this->Html->link('<i style="font-size:12px;" class="glyphicon glyphicon-print"></i>',array("controller"=>"Student","action"=>"filledApplicationForm", $student_code),
						array("escape"=>false,'target'=>'_blank')); ?></td>
						
						<td><?php echo $this->Html->link('Profile',array("controller"=>"Student","action"=>"studentProfile", $id),
						array("escape"=>false)); ?>|
						<?php echo $this->Html->link('view',array("controller"=>"Student","action"=>"viewDetail", $id),
						array("escape"=>false)); ?></td>
						
						
					</tr>
				<?php } ?>
                </tbody>
                <tfoot>
                <tr>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
<!------------------------------------------------------------------------------------------------>


<!-------------------------------------------------------------------------------------------------->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  
 
    
