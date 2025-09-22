
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
	  <h1>Attendance</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Attendance</a></li>
        <li class="active">Class Wise Attendance</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
  
	 <div class="row">
        <!-- left column -->
		<div class="col-md-2"></div>
		<div class="col-md-8">
         <div class="box box-success">
			<div class="box-header with-border">
			<div class="row">
				<div class="col-sm-4"><h4>Language Allocation List</h4></div>
					<div class="col-sm-6"><?php echo $this->Session->flash(); ?></div>
					<div class="col-md-2"><?php echo $this->Html->link('<i class="btn btn-info btn-sm pull-right">Language Allocation</i>',
					array('controller'=>'Student','action'=>'languageAllocation'),array('escape'=>false))?></div>
					</div>
				</div>
			
			<div class="box-body">
				<table id="example1" class="table table-bordered table-striped">
					<thead>
						<tr><th>Sl.No</th><th>Class</th><th>Academic Year</th><th>Action</th><th></th></tr>
					</thead>
					<tbody>
					<?php $number=1; foreach($language as $attend) { 
					$id=$attend['LanguageAllocationDetail']['id']; ?>
						<tr>
							<td><?php echo $number++; ?></td>
							<td><?php echo $attend['AddClass']['class']; ?></td>
							<td><?php echo $attend['AcademicYear']['academic_year']; ?></td>

							<td>
								<?php echo $this->Html->link('<i style="font-size:17px;" class="glyphicon glyphicon-trash"></i>'
								,array("controller"=>"Student","action"=>"deleteLanguageAllocate",$id),
								array("confirm"=>"Are you sure you want ro delete?","escape"=>false)); ?> | 
								
								<?php echo $this->Html->link('<i style="font-size:17px;" class="glyphicon glyphicon-edit"></i>'
								,array("controller"=>"Student","action"=>"editLanguageAllocation",$id),
								array("escape"=>false)); ?>
							</td>
							<td>
								<?php echo $this->Html->link('View',array("controller"=>"Student","action"=>"viewLanguageAllocated",$id),
								array("escape"=>false)); ?>
							</td>
						</tr>
					<?php } ?>
					</tbody>
				</table>
    </div>
  </div>				
				   <?php echo $this->Form->end(); ?>
				</div>
			</div>
        </div>
		</div>
	<!-------------------------------------------------------------------------->
		<div class="col-md-3"></div>
	  
	  </div>
      <!-- row -->
    
	</section>
    <!-- content -->
  </div>
  <!-- content-wrapper -->