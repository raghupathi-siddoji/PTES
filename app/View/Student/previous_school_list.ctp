  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1> Academic     </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Academi</a></li>
        <li class="active">Previous School List</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-warning">
            <div class="box-header with-border">
			<div class="row">
				<div class="col-sm-4"><h4>Previous School Details</h4></div>
				<div class="col-sm-4"><?php echo $this->Session->flash(); ?></div>
				<div class="col-sm-4">
					<?php echo $this->Html->link('<i class="btn btn-info btn-sm pull-right">Previous School Detail Entry </i>',array('controller'=>'Student','action'=>'previousSchoolListCheck'),array('escape'=>false))?>
				</div>
			  </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
				<tr>
					<th>Sl.No</th><th>Student Name</th><th>School Name</th><th>Passing Year</th><th>Marks Secured</th><th>Medium</th><th>Registration Number</th><th>Edit</th>
				</tr>
                </thead>
                <tbody>
					<?php $i=1;
						foreach($set_school_list as $list)  {
					$id=$list['PreviousSchoolDetail']['id']; 
					$student_id=$list['PreviousSchoolDetail']['student_detail_id'];?>
					<tr>
						<td><?php echo $i++; ?></td>
						<td><?php echo $list['StudentDetail']['student_name']; ?></td>
						<td><?php echo $list['PreviousSchoolDetail']['school_name']; ?></td>
						<td><?php echo $list['PreviousSchoolDetail']['passing_year']; ?></td>
						<td><?php echo $list['PreviousSchoolDetail']['marks_secured']; ?></td>
						<td><?php echo $list['PreviousSchoolDetail']['medium']; ?></td>
						<td><?php echo $list['PreviousSchoolDetail']['register_number']; ?></td>
						
						<!--<td><?php echo $this->Html->link('<i style="font-size:17px;" class="glyphicon glyphicon-trash"></i>'
						,array("controller"=>"Student","action"=>"deleteSchool", $id),
						array("confirm"=>"Are you sure you want ro delete???","escape"=>false)); ?></td>-->
						
						<td><?php echo $this->Html->link('<i style="font-size:17px;" class="glyphicon glyphicon-edit"></i>'
						,array("controller"=>"Student","action"=>"previousSchoolDetail", $id),
						array("escape"=>false)); ?></td>
					</tr>
					<?php } ?>
                </tbody>
                <tfoot>
                <tr>
                </tr>
                </tfoot>
              </table>
			  <div class="row"><div class="col-sm-4"><?php echo $this->Session->flash(); ?></div></div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  
 
    
