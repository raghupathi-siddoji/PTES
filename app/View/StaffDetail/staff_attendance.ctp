
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
	  <h1>Attendance</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Staff Attendance</a></li>
        <li class="active">Staff Attendance</li>
      </ol>
    </section>

    <!-- Main content -->
     <!-- Main content -->
    <section class="content">
  
	 <div class="row">
        <!-- left column -->
		<div class="col-md-2"></div>
		<div class="col-md-8">
         <div class="box box-success">
			<div class="box-header with-border">
				<div class="row">
				  <div class="col-md-4"><h4>Staff Attendance</h4></div>
				    <div class="col-md-8">
						 <button type="button" class="btn btn-info btn-sm pull-right" data-toggle="modal" data-target="#attendance">Get Attendance List</button>
					</div>
				</div>
			</div>
			<div class="box-body">
				
				<table id="example1" class="table table-bordered table-striped">
					<thead>
						<tr><th>Sl.No</th><th>Academic Year</th><th>Month</th><th>Delete</th><th>View</th></tr>
					</thead>
					<tbody>
					<?php $number=1; foreach($attend_list as $attend) { 
					$id=$attend['StaffAttendanceDetail']['id']; ?>
						<tr>
							<td><?php echo $number++; ?></td>
							<td><?php echo $attend['AcademicYear']['academic_year']; ?></td>
							<td>
								<?php if($attend['StaffAttendanceDetail']['month']==1 ) 
									echo "January";
								else if($attend['StaffAttendanceDetail']['month']==2)
									echo "Febrauary";
								else if($attend['StaffAttendanceDetail']['month']==3)
									echo "March";
								else if($attend['StaffAttendanceDetail']['month']==4)
									echo "April";
								else if($attend['StaffAttendanceDetail']['month']==5)
									echo "May";
								else if($attend['StaffAttendanceDetail']['month']==6)
									echo "June";
								else if($attend['StaffAttendanceDetail']['month']==7)
									echo "July";
								else if($attend['StaffAttendanceDetail']['month']==8)
									echo "August";
								else if($attend['StaffAttendanceDetail']['month']==9)
									echo "September";
								else if($attend['StaffAttendanceDetail']['month']==10)
									echo "October";
								else if($attend['StaffAttendanceDetail']['month']==11)
									echo "November";
								else if($attend['StaffAttendanceDetail']['month']==12)
									echo "December"; ?>
							</td>
							<td>
								<?php echo $this->Html->link('<i style="font-size:12px;" class="glyphicon glyphicon-trash"></i>'
								,array("controller"=>"StaffDetail","action"=>"deleteAttendance",$id),
								array("confirm"=>"Are you sure you want ro delete?","escape"=>false)); ?>
							</td>
							<td>
								<?php echo $this->Html->link('View',array("controller"=>"StaffDetail","action"=>"viewAttendance",$id),
								array("escape"=>false)); ?>
							</td>
						</tr>
					<?php } ?>
					</tbody>
				</table>
		           
					<div class="row">
						<div class="col-sm-2"></div>
						<div class="col-sm-8"><?php echo $this->Session->flash(); ?></div>
						<div class="col-sm-2"></div>
					</div>
					
				
	<!---------------------Modal ----------------------------------------->
	<div class="modal fade" id="attendance" role="dialog">
		<div class="modal-dialog modal-md">
    
     
      <div class="modal-content" >
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <div class="modal-title"><h4>Staff Attendance</h4>
			
		  </div>
		</div>
        
		<div class="modal-body">
			<?php echo $this->Form->create('StaffAttendance',array("url"=>array("controller"=>"StaffDetail","action"=>"staffAttendanceList")));?>
						<?php echo $this->Form->input('id',array("text"=>"hidden")); ?>
					<div class="form-group">						
						<div class="row">
							<div class="col-md-3"></div>
							<div class="col-md-6">
						<?php echo $this->Form->input('academic_year_id',array('type'=>'select','options'=>array($year_list),"required","class"=>"form-control select_box",'empty'=>'Select academic year',));?>
							</div>	
							<div class="col-md-3"></div>
						</div>
					</div>
					
					<div class="form-group">	
						<div class="row">
							<div class="col-md-3"></div>
							<div class="col-md-6">
								<?php echo $this->Form->input('month',array('type'=>'select',"required","class"=>"form-control select_box",
								'options'=>array('1'=>'January','2'=>'Febrauary','3'=>'March','4'=>'April',
								'5'=>'May','6'=>'June','7'=>'July','8'=>'August','9'=>'September','10'=>'October','11'=>'November','12'=>'December'),'empty'=>'Select Month',)); ?>
							</div>
							<div class="col-md-3"></div>
						</div>
					</div>
					
						
						
			
        </div>
        
		<div class="modal-footer">

			<div class="form-group">
							<div class="row">
								<div class="col-md-4"></div>
								<div class="col-sm-4"><?php echo $this->Form->submit('Get Attendance List',array("class"=>"btn btn-info"));?></div>
								<div class="col-md-4"></div>
							</div>
						</div>
		</div>
         
        </div>
      </div>
	  </div>
	  </div>
	  <!-------------------------------------------------------------------------------------->
      
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