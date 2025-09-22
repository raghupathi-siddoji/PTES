<style>
input[type="text"]
{
	background-color:white;
}
#select
{
	background-color: #ffff99;
}
</style>
 
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
			$id=$details['ClassWiseAttendance']['class_attendance_id']; ?>
			
			<div class="row">
				<div class="col-md-10"><h4>Attendance List</h4></div>
				<div class="col-md-1">
	<?php echo $this->Html->link('<i class="btn btn-info btn-sm pull-right">Print</i>',array('controller'=>'Attendance','action'=>'printAttendance',$id),array('escape'=>false))?>
				</div>
				<div class="col-md-1">
	<?php echo $this->Html->link('<i class="btn btn-warning btn-sm pull-right">Go Back</i>',array('controller'=>'Attendance','action'=>'ClassWiseAttendance'),array('escape'=>false))?>
				</div>
			</div>
			</div>
			<div class="box-body">
			<div class="row"><div class="col-md-4">Academic Year : <?php echo $details['AcademicYear']['academic_year']; ?></div></div>
			<div class="row"><div class="col-md-4">Class  : <?php echo $details['AddClass']['class']; ?></div></div>
			<div class="row"><div class="col-md-4">Section  : <?php echo $details['Section']['section']; ?></div></div>
			<div class="row"><div class="col-md-4">Month : <?php echo $details['ClassWiseAttendance']['month']; ?></div></div>
			<?php break; } ?>
			<table border="1" style="border-collapse:collapse"> 
				<tr>
					<th>#</th>
					 <th>Name</th>
					 <?php foreach($list as $l) { ?>
					<?php for($i=1;$i<=31;$i++) { ?>
					
					<?php if($l['ClassWiseAttendance']["day$i"]!='N') { ?>
					<th align="center"><?php  echo $i; ?></th> <?php }  ?>
					<?php } break; } ?>
					<th>Total Day</th>
					<th>Attended / Wroking</th>
				</tr>
			<?php $i=0;
				$serial_number=1; foreach($list as $attend) { ?>
				<tr>
					<td><?php echo $serial_number++; ?></td>
					<td><?php echo $attend['StudentDetail']['student_name']; ?></td>
					<?php $total_working_day=0; $attended=0; $total_day=0;
					for($a=1;$a<=31;$a++) 
					{  
						if($attend['ClassWiseAttendance']["day$a"]!='N'){ $total_day++;
						if($attend['ClassWiseAttendance']["day$a"]!='H' && $attend['ClassWiseAttendance']["day$a"]!='S')
							{ $total_working_day++; ?>
								<?php if($attend['ClassWiseAttendance']["day$a"]=='P'){ ?>
									<td style="color:green"><?php $attended++; echo $attend['ClassWiseAttendance']["day$a"];  ?></td>
								<?php } else { ?> 
									<td style="color:red"><?php echo $attend['ClassWiseAttendance']["day$a"]; ?></td><?php } ?>
					<?php }	else { ?>
							   <td style="color:blue"><?php echo $attend['ClassWiseAttendance']["day$a"]; ?></td>
					<?php } } } ?>
					<td><?php echo $total_day; ?></td>
					<td><?php echo $attended."/".$total_working_day; ?></td>
				</tr>
				<?php 
				$i++;
				} ?>
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