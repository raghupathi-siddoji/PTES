
    <!-- Main content -->
    <section class="content">
  
	 <div class="row">
        <!-- left column -->
		<div class="col-md-12">
			<div class="box box-success">
				<div class="box-header with-border">
					<div class="row">
					<div class="col-md-8"><h4>Attendance List</h4></div>
				    <div class="col-md-2">
						 <button type="button" class="btn btn-info btn-sm pull-right" data-toggle="modal" data-target="#holidays">Display Holiday</button>
					</div>
				    <div class="col-md-1">
						 <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#holiday_name">Names</button>
					</div>
					<div class="col-md-1">
					</div>
				</div>
				</div>
				<div class="box-body">
					<?php echo $this->Form->create('StaffAttendance',array("url"=>array("controller"=>"StaffDetail","action"=>"storeStaffAttendanceUpdate")));?>
					<div class="form-group">
						<div class="row">
							
							<?php echo $this->Form->input('id',array("type"=>"hidden")); ?>
							<?php echo $this->Form->input('academic_year_id',array("type"=>"hidden","value"=>$this->request->data['StaffAttendance']['academic_year_id']));?>
							<div class="col-sm-9"></div>
							
							<label class="col-sm-1">Month: <?php echo "  ".$this->request->data['StaffAttendance']['month']; ?></label>
							<?php echo $this->Form->input('month',array("type"=>"hidden","value"=>$this->request->data['StaffAttendance']['month']));?>
						</div>
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
					<td><?php echo $attend['StaffDetail']['first_name']; ?></td>
					<?php echo $this->Form->input('staff_detail_id.',array('type'=>'hidden','value'=>$attend['StaffDetail']['id'])); ?>
					
					
					
					<?php echo $this->Form->input('id.',array('type'=>'hidden','value'=>$attend['StaffAttendance']['id'])); ?>
					
					<?php for($a=1;$a<=31;$a++) {?>
					<td>
					<?php 
					if($attend['StaffAttendance']["day$a"]=='N')
					{
						echo $this->Form->input("day$a.",array('type'=>'select','class'=>'none','options'=>array('N'=>'N'),'default'=>$attend['StaffAttendance']["day$a"],"required","label"=>false,"size"=>"1")); 
					}
					else if($attend['StaffAttendance']["day$a"]=='S')
					{
						echo $this->Form->input("day$a.",array('type'=>'select','class'=>'sunday','options'=>array('S'=>'S'),'default'=>$attend['StaffAttendance']["day$a"],"required","label"=>false,"size"=>"1")); 
					}
					else if($attend['StaffAttendance']["day$a"]=='RH' || $attend['StaffAttendance']["day$a"]=='NH' || $attend['StaffAttendance']["day$a"]=='H' || $attend['StaffAttendance']["day$a"]=='LH' || $attend['StaffAttendance']["day$a"]=='SH' || $attend['StaffAttendance']["day$a"]=='OH')
					{
						echo $this->Form->input("day$a.",array('type'=>'select','class'=>'holiday','options'=>array('H'=>'H','RH'=>'RH','SH'=>'SH','NH'=>'NH','LH'=>'LH','OH'=>'OH'),'default'=>$attend['StaffAttendance']["day$a"],"label"=>false,"size"=>"1")); 
					}
					else
					{
						echo $this->Form->input("day$a.",array('type'=>'select','options'=>array('P'=>'P','A'=>'A','OD'=>'OD','CL'=>'CL','EL'=>'EL','HD'=>'HD'),'default'=>$attend['StaffAttendance']["day$a"],"required","label"=>false,"size"=>"1"));
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
						<div class="col-sm-4"><?php echo $this->Form->submit('Store Attendance List',array("class"=>"btn btn-info"));?></div>
						<div class="col-md-4">
							<a href="../StaffDetail/staffAttendanceUpdate" class="btn btn-warning btn-sm pull-right">Go Back</a></h4>
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
			<tr><td>OD</td><td>On Official Duty</td></tr>
			<tr><td>A</td><td>Absent without Pay</td></tr>
			<tr><td>CL</td><td>Casual Leave</td></tr>
			<tr><td>EL</td><td>Earned Leave</td></tr>
			<tr><td>HD</td><td>Half Day CL</td></tr>
			<tr><td>H</td><td>Holiday</td></tr>
			<tr><td>RH</td><td>Restricted Holiday</td></tr>
			<tr><td>NH</td><td>National Holiday</td></tr>
			<tr><td>SH</td><td>State Holiday</td></tr>
			<tr><td>LH</td><td>Local Holiday</td></tr>
			<tr><td>OH</td><td>Other Holiday</td></tr>
			<tr><td>S</td><td>Sunday</td></tr>
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