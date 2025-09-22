 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
	  <h1>Attendance</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Attendance</a></li>
        <li class="active">Holiday Setting</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
  
	 <div class="row">
        <!-- left column -->
		<div class="col-md-12">
          <div class="box box-success">
			<div class="box-header">
			<?php foreach($list as $details) { 
			$id=$details['StaffAttendance']['staff_attendance_detail_id']; ?>
			
			<div class="row">
				<div class="col-md-10"><h4>Staff Attendance List</h4></div>
				<div class="col-md-1">
	<?php echo $this->Html->link('<i class="btn btn-info btn-sm pull-right">Print</i>',array('controller'=>'StaffDetail','action'=>'printAttendance',$id),array('escape'=>false,'target'=>'_blank'))?>
				</div>
				<div class="col-md-1">
	<?php echo $this->Html->link('<i class="btn btn-warning btn-sm pull-right">Go Back</i>',array('controller'=>'StaffDetail','action'=>'StaffAttendance'),array('escape'=>false))?>
				</div>
			</div>
			</div>
			<div class="box-body">
			<!--<div class="row"><div class="col-md-4">Academic Year : <?php //echo $details['AcademicYear']['academic_year']; ?></div></div>-->
			<div class="row"><div class="col-md-4">Month : <?php echo $details['StaffAttendanceDetail']['month']; ?></div></div>
			<?php break; } ?>
			<table class="table table-condensed"> 
			<thead>
				<tr>
					 <th>Sl.No</th>
					 <th>Name</th>
					 <?php foreach($list as $l) { ?>
					<?php for($i=1;$i<=31;$i++) { ?>
					
					<?php if($l['StaffAttendance']["day$i"]!='N') { ?>
					<th align="center"><?php  echo $i; ?></th> <?php }  ?>
					<?php } break; } ?>
					<th>Total Day</th>
					<th>Attended / Wroking</th>
				</tr>
			</thead>
			<tbody>
			<?php $i=0;
				$serial_number=1; foreach($list as $attend) { ?>
				<tr>
					<td><?php echo $serial_number++; ?></td>
					<td><?php echo $attend['StaffDetail']['first_name']; ?></td>
					<?php $total_working_day=0; $attended=0; $total_day=0;
					for($a=1;$a<=31;$a++) 
					{  
						if($attend['StaffAttendance']["day$a"]!='N') {
							$total_day++;
						
						if($attend['StaffAttendance']["day$a"]!='H' && $attend['StaffAttendance']["day$a"]!='SH' && $attend['StaffAttendance']["day$a"]!='LH'
						&& $attend['StaffAttendance']["day$a"]!='RH' && $attend['StaffAttendance']["day$a"]!='NH' &&  $attend['StaffAttendance']["day$a"]!='OH'
						&&  $attend['StaffAttendance']["day$a"]!='S')
							{ $total_working_day++; ?>
							
								<?php if($attend['StaffAttendance']["day$a"]=='P' || $attend['StaffAttendance']["day$a"]=='OD'){ ?>
									<td style="color:green;"><?php $attended++; echo $attend['StaffAttendance']["day$a"];  ?></td>
									
								<?php } else if($attend['StaffAttendance']["day$a"]=='HD'){ ?>
									<td style="color:red;"><?php $attended= $attended + 0.5 ; echo $attend['StaffAttendance']["day$a"];  ?></td>
								
								<?php } else { ?> 
									<td style="color:red"><?php echo $attend['StaffAttendance']["day$a"]; ?></td><?php } ?>
					<?php }	else { ?>
							   <td style="color:blue"><?php echo $attend['StaffAttendance']["day$a"]; ?></td>
					<?php } } } ?>
					<td><?php echo $total_day; ?></td>
					<td><?php echo $attended."/".$total_working_day; ?></td>
				</tr>
				<?php 
				$i++;
				} ?>
			</tbody>
		</table>
		</div>
		</div>
		 
		</div>
	  </div>
      <!-- row -->
    
	</section>
    <!-- content -->
  </div>
  <!-- content-wrapper -->