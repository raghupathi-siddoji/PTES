 
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
					  
					  <div class="col-md-8"><h3 class="box-title">List Class Timings</h3></div>
					<div class="col-md-4">
						<?php echo $this->Session->flash(); ?>
						<?php echo $this->Html->link('<i class="btn btn-info btn-sm pull-right">Add ClassTimings</i>',
						array('controller'=>'TimeTable','action'=>'addClassTimings'),array('escape'=>false))?>
					</div>
					</div>
			  <div class="box-body">
				<table class="table table-bordered" id="example1">
				<thead>
					<tr><th>Sl.No</th><th>Academic Year</th><th>Class</th><th>Section</th><th>Delete</th><th>Edit</th></tr>
				</thead>
				<?php 
					$i=1;
					foreach($class_list as $values)
					{
				?>
				<tr>
					<td><?php echo $i++; ?></td>
					<td><?php echo $values['AcademicYear']['academic_year']; ?> </td>
					<td><?php echo $values['AddClass']['class_name']; ?> </td>
					<td><?php echo $values['Section']['section']; ?></td>
					<td><?php echo $this->Html->link('<i style="font-size:17px;" class="glyphicon glyphicon-trash"></i>'
						,array("controller"=>"TimeTable","action"=>"deleteClassTimings",$values['ClassTiming']['id']),
						array("confirm"=>"Are you sure you want ro delete???","escape"=>false)); ?></td>
					</td>
					<td><?php echo $this->Html->link('<i style="font-size:17px;" class="glyphicon glyphicon-edit"></i>'
					,array("controller"=>"TimeTable","action"=>"addClassTimings",$values['ClassTiming']['id']),
					array("escape"=>false)); ?></td>
				</tr>
				
					<?php }?>
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

<!-- Page script -->
<script>
 $(function () {
    //Initialize Select2 Elements
    $(".select2").select2();

    //Timepicker
    $(".timepicker").timepicker({
      showInputs: false
    });
  });
</script>