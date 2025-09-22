
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
				<div class="col-sm-4"><h4>Class Wise Attendance</h4></div>
					<div class="col-sm-6"><?php echo $this->Session->flash(); ?></div>
					<div class="col-sm-2">
						<button type="button" class="btn btn-info btn-sm pull-right" data-toggle="modal" data-target="#attendance">Attendance List</button>
					</div>
				</div>
			</div>
			
			<div class="box-body">
				<table id="example1" class="table table-bordered table-striped">
					<thead>
						<tr><th>#</th><th>Class</th><th>Academic Year</th><th>Month</th><th>Edit</th><th></th></tr>
					</thead>
					<tbody>
					<?php $number=1; foreach($attend_list as $attend) { 
					$id=$attend['ClassAttendance']['id']; ?>
						<tr>
							<td><?php echo $number++; ?></td>
							<td><?php echo $attend['AddClass']['class']; ?></td>
							<td><?php echo $attend['AcademicYear']['academic_year']; ?></td>
							<td>
								<?php if($attend['ClassAttendance']['month']==1 ) 
									echo "January";
								else if($attend['ClassAttendance']['month']==2)
									echo "Febrauary";
								else if($attend['ClassAttendance']['month']==3)
									echo "March";
								else if($attend['ClassAttendance']['month']==4)
									echo "April";
								else if($attend['ClassAttendance']['month']==5)
									echo "May";
								else if($attend['ClassAttendance']['month']==6)
									echo "June";
								else if($attend['ClassAttendance']['month']==7)
									echo "July";
								else if($attend['ClassAttendance']['month']==8)
									echo "August";
								else if($attend['ClassAttendance']['month']==9)
									echo "September";
								else if($attend['ClassAttendance']['month']==10)
									echo "October";
								else if($attend['ClassAttendance']['month']==11)
									echo "November";
								else if($attend['ClassAttendance']['month']==12)
									echo "December"; ?>
							</td>
							<td>
								<?php echo $this->Html->link('<i style="font-size:17px;" class="glyphicon glyphicon-trash"></i>'
								,array("controller"=>"Attendance","action"=>"deleteAttendance",$id),
								array("confirm"=>"Are you sure you want ro delete?","escape"=>false)); ?>
							</td>
							<td>
								<?php echo $this->Html->link('View',array("controller"=>"Attendance","action"=>"viewAttendance",$id),
								array("escape"=>false)); ?>
							</td>
						</tr>
					<?php } ?>
					</tbody>
				</table>
				
	<!---------------------Modal ----------------------------------------->
	<div class="modal fade" id="attendance" role="dialog">
		<div class="modal-dialog modal-md">
    
     
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <div class="modal-title"><h4>Class Wise Attendance</h4></div>
		</div>
        
		<div class="modal-body">
			<div class="row">
			<div class="col-md-12">
				<?php echo $this->Form->create('ClassWiseAttendance',array("url"=>array("controller"=>"Attendance","action"=>"attendanceList")));?>
						<?php echo $this->Form->input('id',array("text"=>"hidden")); ?>
											
						<div class="row">
							<div class="col-md-3"></div>
							<div class="col-md-6"><label>AcademicYear<span class="mandatory_fields"> * </span></label>
						<?php echo $this->Form->input('academic_year_id',array('type'=>'select','label'=>false,'empty'=>'Select academic year','options'=>array($year_list),"required","class"=>"form-control select_box"));?>
							</div>	
							<div class="col-md-3"></div>
						</div>
				
						<div class="row"> 
							<div class="col-md-3"></div>
							<div class="col-md-6"><label>Class<span class="mandatory_fields"> * </span></label>
								<?php echo $this->Form->input('add_class_id',array('type'=>'select','empty'=>'Select Class','label'=>false,'options'=>array($classes),"required","class"=>"form-control select_box")) ?>
							</div>
							<div class="col-md-3"></div>
						</div>
				
						<div class="row">
							<div class="col-md-3"></div>
							<div class="col-md-6">
								<?php echo $this->Form->input('section_id',array('type'=>'select','options'=>array('select'=>'Select Section',$listSection),"required","class"=>"form-control select_box")) ?>
							</div>
							<div class="col-md-3"></div>
						</div>
						
					<div class="form-group">	
						<div class="row">
							<div class="col-md-3"></div>
							<div class="col-md-6"><label>Month<span class="mandatory_fields"> * </span></label>
								<?php echo $this->Form->input('month',array('type'=>'select',"required",'label'=>false,"class"=>"form-control select_box",'empty'=>'Select Month',
								'options'=>array('1'=>'January','2'=>'Febrauary','3'=>'March','4'=>'April',
								'5'=>'May','6'=>'June','7'=>'July','8'=>'August','9'=>'September','10'=>'October','11'=>'November','12'=>'December'))); ?>
							</div>
							<div class="col-md-3"></div>
						</div>
					</div>
					
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