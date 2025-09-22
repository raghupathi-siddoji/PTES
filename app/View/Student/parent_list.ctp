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
            <div class="box-header">
			<div class="row">
				<div class="col-sm-4"><h4>Parent Details</h4></div>
				<div class="col-sm-4"><?php echo $this->Session->flash(); ?></div>
				<div class="col-sm-4">
					<?php echo $this->Html->link('<i class="btn btn-info btn-sm pull-right">Parent Detail Entry </i>',array('controller'=>'Student','action'=>'parentListCheck'),array('escape'=>false))?>
				</div>
			  </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
				<tr>
					<th>Sl.No</th><th>Student Name</th><th>Father</th><th>Guardian</th><th>Father Occupation</th></th><th>Annual Income</th><th>Mobile Number</th><th>Edit</th>
				</tr>
                </thead>
                <tbody>
					<?php $i=1;
						foreach($set_parent_list as $list)  {
					$id=$list['ParentDetail']['id']; 
					$student_id=$list['ParentDetail']['student_detail_id']; ?>
					<tr>
						<td><?php echo $i++; ?></td>
						<td><?php echo $list['StudentDetail']['student_name']; ?></td>
						<td><?php echo $list['ParentDetail']['father_name']; ?></td>
						<td><?php echo $list['ParentDetail']['guardian']; ?></td>
						<td><?php echo $list['ParentDetail']['father_job']; ?></td>
						<td><?php echo $list['ParentDetail']['annual_income']; ?></td>
						<td><?php echo $list['ParentDetail']['mobile_no']; ?></td>
						
						<!--<td><?php echo $this->Html->link('<i style="font-size:17px;" class="glyphicon glyphicon-trash"></i>'
						,array("controller"=>"Student","action"=>"deleteParent", $id),
						array("confirm"=>"Are you sure you want ro delete???","escape"=>false)); ?></td>-->
						
						<td><?php echo $this->Html->link('<i style="font-size:17px;" class="glyphicon glyphicon-edit"></i>'
						,array("controller"=>"Student","action"=>"parentDetail", $id),
						array("escape"=>false)); ?></td>
					</tr>
					<?php } ?>
                </tbody>
                <tfoot>
                <tr>
                </tr>
                </tfoot>
              </table>
			  <div class="row"></div>
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
  
   <script>
    <!--AUTO COMPLETE REFERENCE -->
  
var $j = jQuery.noConflict();
  $j(function() {
    var availableTags = [<?=$student?>];
    $j( "#student_code" ).autocomplete({
      source: availableTags
    });
  } ); 
 <!--AUTO COMPLETE REFERENCE -->
</script>
    
