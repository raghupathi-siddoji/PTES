  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
   <section class="content-header">
	  <h1>Examination</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Exam</a></li>
        <li class="active">Marks Entry</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
<!------------------------------------------------------------------------------------------------------->
<div class="row">
	<div class="col-md-2"></div>
	<div class="col-md-8">
        <div class="box box-warning">
			<div class="box-header with-border">
				<h4>Grade Lists	<?php echo $this->Html->link('<i class="btn btn-warning btn-sm pull-right">Go Back</i>',
				  array('controller'=>'Exam','action'=>'gradeSettingList'),array('escape'=>false)); ?>
				</h4>
				
		</div>
			
		<div class="box-body">
		<?php foreach($grade as $sub) { ?>
			<div class="row">
				<div class="col-md-4"><h4 style="color:#00C0EF">Maximum Marks : <?php echo $sub['GradeSetting']['max_marks']; ?></h4></div>
			</div>
			<div class="row">
				<div class="col-md-3"></div>
				<div class="col-md-6">	
					<table class="table table-condensed" >
						<tr style="color:#e91e63;"><th>From Marks</th><th>To Marks</th><th>Grade</th></tr>
						<tr>
							<td><?php echo $sub['GradeSetting']['from_marksA+']; ?></td>
							<td><?php echo $sub['GradeSetting']['to_marksA+']; ?></td>
							<td><?php echo $sub['GradeSetting']['gradeA+']; ?></td>
						</tr>
						<tr>
							<td><?php echo $sub['GradeSetting']['from_marksA']; ?></td>
							<td><?php echo $sub['GradeSetting']['to_marksA']; ?></td>
							<td><?php echo $sub['GradeSetting']['gradeA']; ?></td>
						</tr>
						<tr>
							<td><?php echo $sub['GradeSetting']['from_marksB+']; ?></td>
							<td><?php echo $sub['GradeSetting']['to_marksB+']; ?></td>
							<td><?php echo $sub['GradeSetting']['gradeB+']; ?></td>
						</tr>
						<tr>
							<td><?php echo $sub['GradeSetting']['from_marksB']; ?></td>
							<td><?php echo $sub['GradeSetting']['to_marksB']; ?></td>
							<td><?php echo $sub['GradeSetting']['gradeB']; ?></td>
						</tr>
						<tr>
							<td><?php echo $sub['GradeSetting']['from_marksC']; ?></td>
							<td><?php echo $sub['GradeSetting']['to_marksC']; ?></td>
							<td><?php echo $sub['GradeSetting']['gradeC']; ?></td>
						</tr>
					</table>				
				</div>
			</div>
				
				<div class="row">
					<div class="col-md-4"><?php echo $this->Session->flash(); ?></div>
				</div>
				
			</div>
        </div>
		<?php } ?>
	</div>
	
 </div>
 <!-- row -->
	  
	  
    
	</section>
    <!-- content -->
  </div>
  <!-- content-wrapper -->