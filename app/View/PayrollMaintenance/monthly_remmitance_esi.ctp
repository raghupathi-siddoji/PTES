<style>
.timetabletd{
	width:90px;
	height:90px;
}
table-bordered>thead>tr>th, .table-bordered>tbody>tr>th,   .table-bordered>tbody>tr>td {
border: 1px solid #B9D9F0;
}
</style>
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
            <li class="active">Payroll Generation</li>
          </ol>
        </section>

        <!-- Main content -->
  	  <section class="content">
       <!------------" Payroll Generation" created: 20 aug 2016 ----------->
		  
			 <div class="row">
				<div class="col-md-3"></div>
				<div class="col-md-6">
				  <div class="box box-success"> 
					<div class="box-header with-border">
					  <h3 class="box-title">Remmitance of ESI Contribution</h3>
					</div>
					<!-- form start -->
				   <?php echo $this->Form->create('StaffPayroll',array("url"=>array("controller"=>"PayrollMaintenance","action"=>"monthlyRemmitanceEsi")));?>
				   
					  <div class="box-body"> 
					  <div class="form-group"> 
							<div class="row">
								<div class="col-sm-4"><label>Academic Year</label></div>
								<div class="col-sm-6"> 
									<?php echo $this->Form->input("academic_year_id",array("type"=>"select","options"=>$academic_year_array,"label"=>false,"class"=>"form-control select_box","required","empty"=>"select"));?>		
								</div>
								<div class="col-sm-2">&nbsp;</div>
							</div>
						</div>
						<div class="form-group"> 
							<div class="row">
								<div class="col-sm-4"><label>Month</label></div>
								<div class="col-sm-6">  
										<?php $month = array('1'=>'January','2'=>'Febrauary','3'=>'March','4'=>'April',
								'5'=>'May','6'=>'June','7'=>'July','8'=>'August','9'=>'September','10'=>'October','11'=>'November','12'=>'December');?>   
										<?php echo $this->Form->input("month",array("type"=>"select","options"=>$month,"label"=>false,"class"=>"form-control select_box","required","empty"=>"select"));?>		  
									</div>
									<div class="col-sm-2">&nbsp;</div>
							</div>
						</div>
						  
						 
							<div class="row">
								<div class="col-sm-4"></div>
								<div class="col-sm-4"><?php echo $this->Form->submit('Get List',array("class"=>"btn btn-info"));?></div>
								<div class="col-sm-4"></div>
						   </div>
						 
					  </div>
					<?php echo $this->Form->end();?>
					<!---- form end ------>
					<?php echo $this->Session->flash();?>
				</div>
				</div>
				<div class="col-md-3"></div>
	  </div>
      <!-- row -->
	
				
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
	</div> <!-- wrapper -->