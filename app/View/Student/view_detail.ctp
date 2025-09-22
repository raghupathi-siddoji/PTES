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
					<div class="col-xs-12">
						<h4>Student Detail
							<?php echo $this->Html->link('<i class="btn btn-warning btn-sm pull-right">Back</i>',array('controller'=>'Student','action'=>'studentLists'),array('escape'=>false))?>
						</h4>
					</div>
				</div>
			</div>
			
            <!-- /.box-header -->
            <div class="box-body">
			
			<div class="form-group">
			<?php foreach($list as $lt) { 
				echo "Student Name : ".$lt['StudentDetail']['student_name'];
				echo "<br>Student Code : ".$lt['StudentDetail']['student_code'];
			} ?>
			</div>
			
			<div class="form-group">
				<table class="table table-bordered">
				<?php if($parent_list) { ?>
					<?php foreach($parent_list as $l) { ?>
					<tr><th colspan="4"><b style="color:blue">Parent Information</b></th></tr>
					<tr>
						<td><b>Father Name</b>:  <?php echo $l['ParentDetail']['father_name']; ?></td>
						<td><b>Mother Name</b>:  <?php echo $l['ParentDetail']['mother_name']; ?></td>
						<td colspan="2"><b>Guardian Name </b>:  <?php echo $l['ParentDetail']['guardian']; ?></td>
					</tr>
					<tr>
						<td><b>Father Qualification</b>:  <?php echo $l['ParentDetail']['father_qualification']; ?></td>
						<td><b>Mother Qualification</b>:  <?php echo $l['ParentDetail']['mother_qualification']; ?></td>
						<td colspan="2"><b>Guardian Qualification</b>:  <?php echo $l['ParentDetail']['guardian_qualification']; ?></td>
					</tr>
					<tr>
						<td><b>Father Occupation </b>:  <?php echo $l['ParentDetail']['father_job']; ?></td>
						<td><b>Mother Occupation </b>:  <?php echo $l['ParentDetail']['mother_job']; ?></td>
						<td colspan="2"><b>Guardian Occupation </b>:  <?php echo $l['ParentDetail']['guardian_job']; ?></td>
					</tr>
					<tr>
						<td><b>Annual Salary</b>:  <?php echo $l['ParentDetail']['annual_income'];?></td>
						<td><b>Father Contact No</b>:  <?php echo $l['ParentDetail']['mobile_no'];?></td>
						<td colspan="2"><b>Father Email</b>:  <?php echo $l['ParentDetail']['mail'];?></td>
					</tr>
					<tr><td colspan="4"><b style="color:blue;">Brother or Sister Studying in PTES</b></td></tr>
					<?php if($l['ParentDetail']['other_ptes_student']=='yes') { ?>
					<tr>
						<th>Student Name</th><th>Class</th><th>Student Name</th><th>Class</th>
					</tr>
					<tr>
						<?php if($l['ParentDetail']['student_name_one']) { ?>
							<td><?php echo $l['ParentDetail']['student_name_one']; ?></td>
							<td><?php echo $l['ParentDetail']['class_one']; ?></td> 
						<?php } ?>
						
						<?php if($l['ParentDetail']['student_name_two']) { ?>
						<td><?php echo $l['ParentDetail']['student_name_two']; ?></td>
						<td><?php echo $l['ParentDetail']['class_two']; ?></td>
						<?php } else if($l['ParentDetail']['student_name_one']) { ?><td></td><td></td><?php } ?>
					</tr>
					<tr>
						<?php if($l['ParentDetail']['student_name_three']) { ?>
						<td><?php echo $l['ParentDetail']['student_name_three']; ?></td>
						<td><?php echo $l['ParentDetail']['class_three']; ?></td>
						<?php } ?>
						
						<?php if($l['ParentDetail']['student_name_four']) { ?>
						<td><?php echo $l['ParentDetail']['student_name_four']; ?></td>
						<td><?php echo $l['ParentDetail']['class_four']; ?></td>
						<?php } else if($l['ParentDetail']['student_name_three']) { ?><td></td><td></td> <?php } ?>
					</tr>
					<?php }  else { ?><tr><td colspan="4" style="color:red">No</td></tr><?php } ?>
					
				
				<?php } } else { ?>
					<tr><td colspan="4"><b style="color:red">Parent Information is empty</b></td></tr><?php } ?>
				</table>
			</div>
			
			<div class="form-group">
				<?php if($school_list) {
					foreach($school_list as $slist) { ?>
						<table class="table table-bordered">
							<tr><th colspan="3"><b style="color:blue">Previous School Information</b></th></tr>
							<tr>
								<td colspan="2"><b>School Name</b>:  <?php echo $slist['PreviousSchoolDetail']['school_name']; ?></td>
								<td><b>Passing Year </b>:  <?php echo $slist['PreviousSchoolDetail']['passing_year']; ?></td>
							</tr>
							<tr>
								<td><b>Medium</b>:  <?php echo $slist['PreviousSchoolDetail']['medium']; ?></td>
								<td><b>Marks Secured</b>:  <?php echo $slist['PreviousSchoolDetail']['marks_secured']; ?></td>
								<td><b>Register Number</b>:  <?php echo $slist['PreviousSchoolDetail']['register_number']; ?></td>
							</tr>
							<tr>
								<td colspan="3"><b>Address</b>:  <?php echo $slist['PreviousSchoolDetail']['addr_school']."-".
																	$slist['PreviousSchoolDetail']['city']; ?></td>
							</tr>
						</table>
						<?php } } else { ?>
							<table class="table table-bordered">
								<tr><td colspan="3"><b style="color:red">Previous School Information is empty</b></td></tr>
							</table>
						<?php } ?>
			</div>
		
			</div>
			</div>
        </div>
   
      </div>
      
    </section>

  </div>
  
 
    
