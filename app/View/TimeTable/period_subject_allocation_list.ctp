 
  <!-- Bootstrap time Picker -->
   <?php echo $this->Html->css('plugins/timepicker/bootstrap-timepicker.min'); ?>
   <?php echo $this->Html->css('plugins/timepicker/bootstrap-timepicker'); ?>
 <div class="wrapper"> 
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Time Table
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a href="#">Time Table</a></li>
			 <li class="active">Add Class Timings</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
           
          <!------------"List Class timings"  ----------->
	    <div class="row">
     		<div class="col-md-12">
				  <div class="box box-success">
					<br>
					<div class="box-header with-border">
					  <?php echo $this->Session->flash();?>
					  <div class="col-md-8"><h3 class="box-title">Subject Allocation</h3></div>
					<div class="col-md-4">
						<?php echo $this->Html->link('<i class="btn btn-info btn-sm pull-right">Add Subject Allocation </i>',
						array('controller'=>'TimeTable','action'=>'periodSubjectAllocation'),array('escape'=>false))?>
					</div>
					</div>
			  <div class="box-body">
				<table class="table table-bordered" id="example1">
				<thead>
					<tr><th>Sl.No</th><th>Class </th><th>Section </th><th>Subject </th><th>Subject Type</th><th>Order Series</th><th>Days</th><th>Delete</th><th>Edit</th></tr>
				</thead>
				<?php	
					$i=1;	
					foreach($list as $values) 
					{
				?>
				<tr>
					<td><?php echo $i++; ?></td>
					<td><?php echo $values['AddClass']['class_name'];?> </td>
					<td><?php echo $values['Section']['section'];?> </td>
					<td><?php echo $values['Subject']['subject_name'];?> </td>
					<td><?php echo $values['Subject']['subject_type'];?> </td>
					<td><?php echo $values['PeriodSubjectAllocation']['period_order'];?></td>
					<td><?php echo rtrim($values['PeriodSubjectAllocation']['weekdays'],',');?></td>
					<td><?php echo $this->Html->link('<i style="font-size:17px;" class="glyphicon glyphicon-trash"></i>'
						,array("controller"=>"TimeTable","action"=>"deletePeriodSubjectAllocation",$values['PeriodSubjectAllocation']['id']),
						array("confirm"=>"Are you sure you want ro delete???","escape"=>false)); ?></td>
					</td>
					<td><?php echo $this->Html->link('<i style="font-size:17px;" class="glyphicon glyphicon-edit"></i>'
					,array("controller"=>"TimeTable","action"=>"PeriodSubjectAllocation",$values['PeriodSubjectAllocation']['id']),
					array("escape"=>false)); ?></td>
				</tr>
				
				<?php } ?> 
				</table>
								
								
			</div>
			
			</div>
        </div>
		
      </div>
      <!-- row -->
	
	
				
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
	</div> <!-- wrapper -->
	
	<!-- bootstrap time picker -->

 <?php echo $this->Html->script('plugins/timepicker/bootstrap-timepicker.min'); ?>
 <?php echo $this->Html->script('plugins/timepicker/bootstrap-timepicker'); ?>
  <?php echo $this->Html->script('jQuery/jquery-2.2.3.min'); ?>

