
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
			<div class="box-body">
			<?php foreach($list as $details) { ?>
			<div class="row"><div class="col-md-4">Academic Year : <?php echo $details['AcademicYear']['academic_year']; ?></div></div>
			<div class="row"><div class="col-md-4">Class  : <?php echo $details['AddClass']['class']; ?></div></div>
			<div class="row"><div class="col-md-4">Section  : <?php echo $details['Section']['section']; ?></div></div>
			<?php break; } ?>
			
			
			<?php  foreach($list as $l) {
				
			
			
			}
			?>
			
			
			
			
			
			
			<table class="table table-condensed"> 
			<thead>
				<tr>
					<th>#</th>
					 <th>Name</th>
					 <th>June</th>
					 <th>July</th>
					 <th>August</th>
					 <th>September</th>
					 <th>October</th>
					 <th>November</th>
					 <th>December</th>
					 <th>January</th>
					 <th>February</th>
					<th>Total Day</th>
					<th>Attended / Wroking</th>
				</tr>
			</thead>
				
			<tbody>
				<tr>
					
				</tr>
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