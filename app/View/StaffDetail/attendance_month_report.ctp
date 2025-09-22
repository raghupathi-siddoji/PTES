  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
	  <h1>Attendance</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Attendance</a></li>
        <li class="active">Attendance Report</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
  
	 <div class="row">
        <!-- left column -->
		<div class="col-md-3"></div>
		<div class="col-md-6">
         <div class="box box-success">
			<div class="box-header with-border"><h4>Month Wise Attendance Report</h4></div>
			<div class="box-body">
				
		           <?php echo $this->Form->create('StaffAttendance',array("url"=>array("controller"=>"StaffDetail","action"=>"attendanceMonthReportList")));?>
						<?php echo $this->Form->input('id',array("text"=>"hidden")); ?>
											
						<div class="row">
							<div class="col-md-3"></div>
							<div class="col-md-6">
						<?php echo $this->Form->input('academic_year_id',array('type'=>'select','options'=>array('select'=>'Select academic year',$year_list),"required","class"=>"form-control select_box"));?>
							</div>	
							<div class="col-md-3"></div>
						</div>
						
					<div class="form-group">	
						<div class="row">
							<div class="col-md-3"></div>
							<div class="col-md-6">
								<?php echo $this->Form->input('month',array('type'=>'select',"required","class"=>"form-control select_box",
								'options'=>array('select'=>'Select Month','1'=>'January','2'=>'Febrauary','3'=>'March','4'=>'April',
								'5'=>'May','6'=>'June','7'=>'July','8'=>'August','9'=>'September','10'=>'October','11'=>'November','12'=>'December'))); ?>
							</div>
							<div class="col-md-3"></div>
						</div>
					</div>
					
						<div class="form-group">
							<div class="row">
								<div class="col-md-4"></div>
								<div class="col-sm-4"><?php echo $this->Form->submit('Get Attendance List',array("class"=>"btn btn-info"));?></div>
								<div class="col-md-4"></div>
							</div>
						</div>
						
					<div class="row">
						<div class="col-sm-2"></div>
						<div class="col-sm-8"><?php echo $this->Session->flash(); ?></div>
						<div class="col-sm-2"></div>
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