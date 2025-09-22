<?php //print_r($attendance);?> 
    <!-- Main content -->
    <section class="content">
  
	 <div class="row">
        <!-- left column -->
		<div class="col-md-12">
			<div class="box box-success">
				<div class="box-header with-border">
				<div class="row">
				<div class="col-md-9"><h4>Attendance List</h4></div>
				    <div class="col-md-2">
						 <button type="button" class="btn btn-info btn-sm pull-right" data-toggle="modal" data-target="#holidays">Display Holiday</button>
					</div>
				    <div class="col-md-1">
						 <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#holiday_name">Names</button>
					</div>
					</div>				
				</div>
				<div class="box-body">
					<?php echo $this->Form->create('ClassWiseAttendance',array("url"=>array("controller"=>"Attendance","action"=>"storeUpdateAttendance")));?>
					<div class="form-group">
					<?php foreach($list as $a) { ?>
						<div class="row">
							
							<div class="col-sm-1">AcademicYear:</div>
							<div class="col-sm-2"><?php echo $this->Form->input('academic_year',array("type"=>"text","label"=>false,"readonly","value"=>$a['AcademicYear']['academic_year']));?></div>
							<?php echo $this->Form->input('academic_year_id',array("type"=>"hidden","value"=>$this->request->data['ClassWiseAttendance']['academic_year_id']));?>
							
							<div class="col-sm-1">Class  :</div>
							<div class="col-sm-2"><?php echo $this->Form->input('class',array("type"=>"text","label"=>false,"readonly","value"=>$a['AddClass']['class']));?></div>
							<?php echo $this->Form->input('add_class_id',array("type"=>"hidden","value"=>$this->request->data['ClassWiseAttendance']['add_class_id']));?>
							
							<div class="col-sm-1">Section:</div>
							<div class="col-sm-2"><?php echo $this->Form->input('section',array("type"=>"text","label"=>false,"readonly","value"=>$a['Section']['section']));?></div>
							<?php echo $this->Form->input('section_id',array("type"=>"hidden","value"=>$this->request->data['ClassWiseAttendance']['section_id']));?>
						
							<div class="col-sm-1">Month :</div>
							<div class="col-sm-2"><?php echo $this->Form->input('month',array("type"=>"text","label"=>false,"readonly","value"=>$this->request->data['ClassWiseAttendance']['month']));?></div>
						</div>
						
					<?php break; } ?>
					</div>
				
				<table width="100%" height="100%"> 
				<thead>
					<tr>
					   <th>Sl.No</th>
					  <th>Name</th>
					<?php for($i=1;$i<=31;$i++) {?>
					<td><?php echo $i; ?></td>
					<?php } ?>
					</tr>
				</thead>
				<tbody>
				<?php 
				$i=0;
				$serial_number=1; 
				foreach($list as $attend) { ?>
					<tr>
					<td><?php echo $serial_number++; ?></td>
					<td><?php echo $attend['StudentDetail']['student_name']; ?></td>
					<?php echo $this->Form->input('student_detail_id.',array('type'=>'hidden','value'=>$attend['StudentDetail']['id'])); ?>
					
					
					
					<?php echo $this->Form->input('id.',array('type'=>'hidden','value'=>$attend['ClassWiseAttendance']['id'])); ?>
					
					<?php for($a=1;$a<=31;$a++) {?>
					<td>
					<?php 
					if($attend['ClassWiseAttendance']["day$a"]=='N')
					{
						echo $this->Form->input("day$a.",array('type'=>'select','class'=>'none','options'=>array('N'=>'N'),'default'=>$attend['ClassWiseAttendance']["day$a"],"required","label"=>false,"size"=>"1")); 
					}
					else if($attend['ClassWiseAttendance']["day$a"]=='S')
					{
						echo $this->Form->input("day$a.",array('type'=>'select','class'=>'sunday','options'=>array('S'=>'S'),'default'=>$attend['ClassWiseAttendance']["day$a"],"required","label"=>false,"size"=>"1")); 
					}
					else if($attend['ClassWiseAttendance']["day$a"]=='RH' || $attend['ClassWiseAttendance']["day$a"]=='NH' || $attend['ClassWiseAttendance']["day$a"]=='H' || $attend['ClassWiseAttendance']["day$a"]=='LH' || $attend['ClassWiseAttendance']["day$a"]=='SH' || $attend['ClassWiseAttendance']["day$a"]=='OH')
					{
						echo $this->Form->input("day$a.",array('type'=>'select','class'=>'holiday','options'=>array('H'=>'H','RH'=>'RH','SH'=>'SH','NH'=>'NH','LH'=>'LH','OH'=>'OH'),'default'=>$attend['ClassWiseAttendance']["day$a"],"required","label"=>false,"size"=>"1")); 
					}
					else
					{
						echo $this->Form->input("day$a.",array('type'=>'select','options'=>array('P'=>'P','A'=>'A','L'=>'L','HL'=>'HL'),'default'=>$attend['ClassWiseAttendance']["day$a"],"required","label"=>false,"size"=>"1"));
					}
					?>
					</td>
				
				<?php } ?>
					</tr>
				<?php 
				$i++;
				} ?>
				</tbody>
				</table>
				
				<div class="form-group"></div>
				
				<div class="form-group">
					<div class="row">
						<div class="col-md-4"></div>
						<div class="col-sm-4"><?php echo $this->Form->submit('Save',array("class"=>"btn btn-info"));?></div>
						<div class="col-md-4">
							<a href="../Attendance/updateAttendance" class="btn btn-warning btn-sm pull-right">Cancel</a></h4>
						</div>
					</div>
				</div>
				
				<!----------------------------------------->
		<div class="modal fade" id="holiday_name" role="dialog">
		<div class="modal-dialog modal-sm">
    
		<div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <div class="modal-title"><h4> Names</h4>
		  </div>
		</div>
        
		<div class="modal-body" style="color:#e91e63;">
		<table class="table table-condensed">
			<tr><td>P</td><td>Present</td></tr>
			<tr><td>A</td><td>Absent</td></tr>
			<tr><td>L</td><td>Leave</td></tr>
			<tr><td>HL</td><td>Half Day Leave</td></tr>
			<tr><td>H</td><td>Holiday</td></tr>
			<tr><td>S</td><td>Sunday </td></tr>
			<tr><td>N</td><td>None</td></tr>
		</table>
		</div>
		
		<div class="modal-footer">
			<div class="row"><div class="col-md-1"><button type="button" class="btn btn-default" data-dismiss="modal">Close</button></div></div>
		</div>
		</div>
		</div>
		</div>
		<!--------------------------------------------------->
		
		<!--------------------------------------------------->
		<div class="modal fade" id="holidays" role="dialog">
		<div class="modal-dialog modal-md">
    
		<div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <div class="modal-title"><h4>Holiday </h4>
		  </div>
		</div>
        
		<div class="modal-body" style="color:#e91e63;">
				
			<?php if(!empty($reason)) { ?>
				<table class="table table-bordered">
				<tr><th>From Date</th><th>To Date</th><th>Holiday</th></tr>
				<?php foreach($reason as $holiDays){ ?>
				<tr>
					<td><?php echo $holiDays['HolidaySetting']['from_date']; ?></td>
					<td><?php echo $holiDays['HolidaySetting']['to_date']; ?></td>
					<td><?php echo $holiDays['HolidaySetting']['reason']; ?></td>
				</tr>
					<?php } ?>
				</table>
			<?php } else { ?>
			<?php echo "No Holidays in this Month"; } ?>
		</div>
		
		<div class="modal-footer">
			<div class="row"><div class="col-md-1"><button type="button" class="btn btn-default" data-dismiss="modal">Close</button></div></div>
		</div>
		</div>
		</div>
		</div>
		<!--------------------------------------------->
				
				
				
					<?php echo $this->Form->end(); ?>
				</div>
			</div>
		</div>
	<!-------------------------------------------------------------------------->
		
	  
	  </div>
      <!-- row -->