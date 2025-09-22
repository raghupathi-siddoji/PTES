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
            <div class="box-header"><h4>Student Profile</h4></div>
            <!-- /.box-header -->
            <div class="box-body">
			<div class="row">
				<div class="col-xs-12">
					<?php foreach($parent_list as $pic) { ?>
						<img src="<?php echo $this->webroot."/StudentPhoto/".$pic['ParentDetail']['student_photo']; ?>" width="100px"  alt="Student photo" height="100px">
					<?php } ?>
					<?php echo $this->Html->link('<i class="btn btn-warning btn-sm pull-right">Back</i>',array('controller'=>'Student','action'=>'studentLists'),array('escape'=>false))?>
				</div>
			</div>
			<?php foreach($list as $detail) { ?>
			<div class="form-group">
				<table class="table table-bordered">
					<tr><th colspan="3"><b style="color:blue">Student Details</b></th></tr>
					<tr><td><b>Student Code </b>: <?php echo $detail['StudentDetail']['student_code']; ?></td>
						<td><b>Student Name</b> :  <?php echo $detail['StudentDetail']['student_name']; ?> </td>
						<td><b>Academic Year</b> :  <?php echo $detail['AcademicYear']['academic_year']; ?></td>
					</tr>
					<tr>
						<td><b>Admission Number </b>:  <?php echo $detail['StudentDetail']['admission_number']; ?></td>
						<td><b>Class</b> :  <?php echo $detail['AddClass']['class_name']; ?></td>
						<td><b>Section </b>:  <?php echo $detail['Section']['section']; ?></td>
					</tr>
					<tr>
						<td><b>Medium </b>:  <?php echo $detail['Language']['language']; ?></td>
						<td><b>Adhar Card Number</b> :  <?php echo $detail['StudentDetail']['aadhar_card_number']; ?></td>
						<td><b>DISC Number </b>:  <?php echo $detail['StudentDetail']['dise_no']; ?></td>
					</tr>
				</table>
			</div>
			
			<div class="form-group">
				<table class="table table-bordered">
					<tr><th colspan="3"><b style="color:blue">Personal Information</b></th></tr>
					<tr>
						<td><b>Gender</b> :  <?php echo $detail['StudentDetail']['gender']; ?></td>
						<td><b>Date of Birth </b>:  <?php echo date('d-M-y',strtotime($detail['StudentDetail']['dob'])); ?> </td>
						<td><b>Blood Group</b> :  <?php echo $detail['BloodGroup']['blood_group']; ?></td>
					</tr>
					<tr>
						<td><b>Caste </b>:  <?php echo $detail['Caste']['caste']; ?></td>
						<td><b>Caste </b>:  <?php echo $detail['SubCaste']['subcaste']; ?></td>
						<td><b>Religion </b>:  <?php echo $detail['Religion']['religion']; ?></td>
					</tr>
					<tr>
						<td><b>Mother Tongue</b> :  <?php echo $detail['MotherTongue']['mother_tongue']; ?></td>
						<td><b>Father/Mother is Employee of MPM Ltd.,</b>:  
							<?php if($detail['StudentDetail']['mpm_employee']=='Non_MPM')  
								echo "NO";
							else
								echo "YES"; ?> </td>
						<td><b>Admitting Under RTe</b> :  <?php echo ucfirst($detail['StudentDetail']['admitting_under_rte']); ?></td>
					</tr>
					<tr><td colspan="3"><b>Address</b>:  <?php echo $detail['StudentDetail']['permanent_address']; ?>- <?php echo $detail['StudentDetail']['permanent_address_pincode']; ?></td> </tr>
				</table>
			</div>
			<?php } ?>
			
			<div class="form-group">
				<table class="table table-bordered">
					<tr><th colspan="3"><b style="color:blue">Parent Information</b></th></tr>
					<?php if($parent_list) { ?>
					<?php foreach($parent_list as $l) { ?>
					<tr>
						<td><b>Father Name</b>:  <?php echo $l['ParentDetail']['father_name']; ?></td>
						<td><b>Mother Name</b>:  <?php echo $l['ParentDetail']['mother_name']; ?></td>
						<td><b>Guardian Name </b>:  <?php echo $l['ParentDetail']['guardian']; ?></td>
					</tr>
					<tr>
						<td><b>Father/Guardian Qualification</b>:  <?php echo $l['ParentDetail']['father_qualification']; ?></td>
						<td><b>Father/Guardian Occupation </b>:  <?php echo $l['ParentDetail']['father_job']; ?></td>
						<td><b>Annual Salary</b>:  <?php echo $l['ParentDetail']['annual_income'];?></td>
					</tr>
					<tr>
						<td><b>Father Contact No</b>:  <?php echo $l['ParentDetail']['mobile_no'];?></td>
						<td><b>Father Email</b>:  <?php echo $l['ParentDetail']['mail'];?></td>
						<td><b>Guardian Contact</b>:  <?php echo $l['ParentDetail']['mobile_no'];?></td>
					</tr>
					<?php } } else { ?><tr><td><b style="color:red">Parent Information is empty</b></td></tr><?php } ?>
				</table>
			</div>
			</div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  
 
    
