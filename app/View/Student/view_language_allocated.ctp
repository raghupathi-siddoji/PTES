
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
		<div class="col-md-1"></div>
		<div class="col-md-10">
         <div class="box box-success">
			<div class="box-header with-border">
			<div class="row">
				<div class="col-sm-10"><h4>Language Allocation List</h4></div>
					<div class="col-md-2"><?php echo $this->Html->link('<i class="btn btn-warning btn-sm pull-right">Go Back</i>',
					array('controller'=>'Student','action'=>'viewLanguage'),array('escape'=>false))?></div>
					</div>
				</div>
			
			<div class="box-body">
				<table id="example1" class="table table-bordered table-striped">
					<thead>
						<tr><th>Sl.No</th><th>Student Name</th><th>Class</th><th>Academic Year</th><th>Language I</th><th>Language II</th><th>Language III</th></tr>
					</thead>
					<tbody>
					<?php $number=1; foreach($language as $attend) { 
					$id=$attend['LanguageAllocation']['id']; ?>
						<tr>
							<td><?php echo $number++; ?></td>
							<td><?php echo $attend['StudentDetail']['student_name']; ?></td>
							<td><?php echo $attend['AddClass']['class']; ?></td>
							<td><?php echo $attend['AcademicYear']['academic_year']; ?></td>
							<td><?php echo $attend['LanguageAllocation']['language_1']; ?></td>
							<td><?php echo $attend['LanguageAllocation']['language_2']; ?></td>
							<td><?php echo $attend['LanguageAllocation']['language_3']; ?></td>
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
		<div class="col-md-1"></div>
	  
	  </div>
      <!-- row -->
    
	</section>
    <!-- content -->
  </div>
  <!-- content-wrapper -->