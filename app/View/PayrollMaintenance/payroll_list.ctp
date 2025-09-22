 
  <!-- Bootstrap time Picker -->
   <?php echo $this->Html->css('plugins/timepicker/bootstrap-timepicker.min'); ?>
   <?php echo $this->Html->css('plugins/timepicker/bootstrap-timepicker'); ?>
 <div class="wrapper"> 
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Payroll Maintenance
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			 <li>Payroll Maintenance</li>
            <li class="active">Payroll List</li>
          </ol>
        </section> 
        <!-- Main content -->
        <section class="content">
           
           <!------------"Staff Detail" created: 25 aug 2016 ----------->
			<div class="row">
				 
				<div class="col-md-12">
				  <div class="box box-success"> 
					 
					<!-- form start -->
				   <?php echo $this->Form->create('StaffPayroll',array("url"=>array("controller"=>"PayrollMaintenance","action"=>"payrollList")));?>
				   
					  <div class="box-body">  
							<div class="row">
								<div class="col-sm-1">&nbsp;</div>
								<div class="col-sm-2"><label>Academic Year <span class="mandatory_fields">*</span></label></div>
								<div class="col-sm-2"> 
									<?php echo $this->Form->input("academic_year_id",array("type"=>"select","options"=>$academic_year_array,"label"=>false,"class"=>"form-control select_box","required","empty"=>"select"));?>		
								</div>
								<div class="col-sm-1"><label>Month <span class="mandatory_fields">*</span></label></div>
								<div class="col-sm-2">  
										<?php $month = array('1'=>'January','2'=>'Febrauary','3'=>'March','4'=>'April',
								'5'=>'May','6'=>'June','7'=>'July','8'=>'August','9'=>'September','10'=>'October','11'=>'November','12'=>'December');?>   
										<?php echo $this->Form->input("month",array("type"=>"select","options"=>$month,"label"=>false,"class"=>"form-control select_box","required","empty"=>"select"));?>		  
									</div>
								<div class="col-sm-2"><?php echo $this->Form->submit('Show',array("class"=>"btn btn-info",'name'=>'show_btn','value'=>'Show'));?></div>	 
								<div class="col-sm-1">&nbsp;</div>
							</div>  
						 
					  </div>
					<?php echo $this->Form->end();?>
					<!---- form end ------>
					 
				</div>
				</div> 
	  </div>
      <!-- row --> 
		<?php if(isset($_POST['show_btn'])!=''){?>
			<div class="row">
					<div class="col-md-12">
					<?php echo $this->Session->flash();?>
					  <div class="box box-warning">
						  <div class="box-body">
							<table class="table table-bordered" id="example1">
							<thead>
							<tr><th>Emp ID</th><th>Name</th><th>Month</th><th>Year</th><th>Gross Salary</th><th>Net Salary</th><th>Action</th></tr>
							</thead>
							<?php foreach($payroll_list as $paylist)
							{?>
								<tr>
									<th><?php echo $paylist['StaffDetail']['emp_id'];?></th>
									<th><?php echo $paylist['StaffDetail']['first_name'];?></th>
									<th><?php echo  $monthName = date("F", mktime(0, 0, 0, $paylist['StaffPayroll']['month']));?><?php //echo $paylist['StaffPayroll']['month'];?></th>
									<th><?php echo $paylist['AcademicYear']['academic_year'];?></th>
									<th><?php echo $paylist['StaffPayroll']['gross_salary'];?></th>
									<th><?php echo $paylist['StaffPayroll']['net_salary'];?></th>  
									<th> <?php echo $this->Html->link('<i class="fa fa-trash-o" ></i>',
											array("controller"=>"PayrollMaintenance","action"=>"deleteStaffPayroll", $paylist['StaffPayroll']['id']),
											array("confirm"=>"Are you sure you want ro delete?","escape"=>false)); ?></th> 
								</tr> 
							<?php } ?>
							</table>
											
						</div>
						
						</div>
					</div>
				</div>
			<?php }?>
				
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