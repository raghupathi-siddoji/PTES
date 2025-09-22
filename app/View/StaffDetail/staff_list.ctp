 <?php //print_r($staffList);?>
  <!-- Bootstrap time Picker -->
   <?php echo $this->Html->css('plugins/timepicker/bootstrap-timepicker.min'); ?>
   <?php echo $this->Html->css('plugins/timepicker/bootstrap-timepicker'); ?>
 <div class="wrapper"> 
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h3>
            Payroll Maintenance | Staff List
          </h3>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			 <li>Payroll Maintenance</li>
            <li class="active">Staff List</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
           
           <!------------"Staff Detail" created: 25 aug 2016 ----------->
			  
			<div class="row">
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-12 col-md-push-11"><?php echo $this->Html->link('<i class="fa fa-print" ></i>',
											array("controller"=>"StaffDetail","action"=>"staffListPrint"),
											array("escape"=>false,"target"=>"_blank")); ?></td></div>
						</div>
					  <div class="box box-warning">
						  <div class="box-body">
							<table class="table table-bordered" id="example1">
							<thead>
							<tr><th>Emp ID</th><th>Name</th><th>Gender</th><th>DOB</th><th>Qualification</th><th>Mobile</th><th>Email</th><th>Designation</th><th>Action</th> </tr>
							</thead>
							<?php	$i=1;	
								foreach($staffList as $list) {
								$id = $list['StaffDetail']['id'];
								?>
									<tr>
										<td><?php echo $list['StaffDetail']['emp_id'];?></td>
										<td><?php echo $list['StaffDetail']['first_name'];?></td>
										<td><?php echo $list['StaffDetail']['gender'];?></td>
										<td><?php echo $list['StaffDetail']['dob'];?></td>
										<td><?php echo $list['StaffDetail']['qualification'];?></td>
										<td><?php echo $list['StaffDetail']['mobile'];?></td>
										<td><?php echo $list['StaffDetail']['email'];?></td>
										<td><?php echo $list['Designation']['designation'];?></td>
										<td> 
											<?php //echo $this->Html->link('<i class="fa fa-user" ></i>','#',array("data-toggle"=>"modal","data-target"=>"#staff","escape"=>false)); ?>											|
											<?php echo $this->Html->link('<i class="fa fa-trash-o" ></i>',
											array("controller"=>"StaffDetail","action"=>"deleteStaff", $id),
											array("confirm"=>"Are you sure you want ro delete?","escape"=>false)); ?> |
										    <?php echo $this->Html->link('<i class="fa fa-pencil" ></i>',
											array("controller"=>"StaffDetail","action"=>"staffDetails", $id),
											array("escape"=>false)); ?> 
									</tr>
								<?php } ?> 
							</table>
											
						</div>
						
						</div>
					</div>
				</div>
			
<!------------------------------------------------------------------------------------------------>

<div class="modal fade" id="staff" role="dialog">
	<div class="modal-dialog modal-lg">
    
      <!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<div class="modal-title"><h4 style="color:#e91e63;">Student Profile</h4></div>
			</div>
        
			<div class="modal-body">
			<div class="row">
				<div class="col-xs-3"><img src="../img/DOC1428743586307.8.jpg" width="100px" height="100px"></div>
			</div>
			<div class="form-group">
				<table class="table table-bordered">
					<tr><th colspan="3"><b style="color:blue">Student Details</b></th></tr>
					<tr><td><b>Student Code </b>: 16170102101</td><td><b>Student Name</b> : Kruthi </td><td><b>Academic Year</b> : 2016-17 </td></tr>
					<tr><td><b>Medium </b>: English</td><td><b>Class</b> : 1st</td><td><b>Section </b>: A</td></tr>
					 
				</table>
			</div>
			
			<div class="form-group">
				<table class="table table-bordered">
					<tr><th colspan="3"><b style="color:blue">Personal Information</b></th></tr>
					<tr><td><b>Gender</b> : Female</td><td><b>Date of Birth </b>: 29-01-1993 </td><td><b>Blood Group</b> : B+</td></tr>
					<tr><td><b>Caste </b>: Brahmin</td><td><b>Religion </b>: Hindu</td><td><b>Mother Tongue</b> : Kannada</td></tr>
					<tr><td colspan="3"><b>Address</b>: Gandhi Nagar, main road,  SHivamogga-577201.</td> </tr>
				</table>
			</div>
			
			<div class="form-group">
				<table class="table table-bordered">
					<tr><th colspan="3"><b style="color:blue">Parent Information</b></th></tr>
					<tr><td><b>Father Name</b>: Ramesh</td><td><b>Mother Name</b>: Renuka</td><td><b>Guardian Name </b>: </td></tr>
					<tr><td><b>Father/Guardian Qualification</b>: BA</td><td><b>Father/Guardian Occupation </b>: Gove Emp</td><td><b>Annual Salary</b>:5Lac PA</td></tr>
					<tr><td><b>Father Contact No</b>:+91 9845098450</td><td><b>Father Email</b>: ramesh@gmail.com</td><td><b>Guardian Contact</b>:+91 9886885522</td></tr>
				</table>
			</div>
			</div>
			
			<div class="modal-footer">
				<button type="submit" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
			
		</div>
	</div>
</div>
<!-------------------------------------------------------------------------------------------------->
	
	
    </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
	</div> <!-- wrapper -->
	
	<!-- bootstrap time picker -->

 <?php echo $this->Html->script('plugins/timepicker/bootstrap-timepicker.min'); ?>
 <?php echo $this->Html->script('plugins/timepicker/bootstrap-timepicker'); ?>
  <?php echo $this->Html->script('jQuery/jquery-2.2.3.min'); ?>

<!-- Page script -->
<script>
 $(function () {
    //Initialize Select2 Elements
    $(".select2").select2();

    //Timepicker
    $(".timepicker").timepicker({
      showInputs: false
    });
  });
</script>