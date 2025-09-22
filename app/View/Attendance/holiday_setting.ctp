 
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
	  <h1>Holiday</h1>
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
		<div class="col-md-5">
         <div class="box box-success">
			<div class="box-header with-border"><h4>Holiday Setting</h4></div>
		
			<div class="box-body">
				<div class="form-group">
		           <?php echo $this->Form->create('HolidaySetting',array("url"=>array("controller"=>"Attendance","action"=>"holidaySetting")));?>
						<?php echo $this->Form->input('id',array("text"=>"hidden")); ?>
											
						<div class="row">
							<div class="col-md-6"><label>From Date<span class="mandatory_fields"> * </span></label>
								<?php echo $this->Form->input('from_date',array('type'=>'text','label'=>false,"id"=>"datepicker1","required","class"=>"form-control")); ?>
							</div>	
							<div class="col-md-6"><label>To Date<span class="mandatory_fields"> * </span></label>
								<?php echo $this->Form->input('to_date',array('type'=>'text','label'=>false,"required","class"=>"form-control","id"=>"datepicker")); ?>
							</div>
						</div>
				</div>
						
					<div class="form-group">
						<div class="row">
							<div class="col-md-12">
							
								<?php echo $this->Form->input('holiday_name',array('type'=>'hidden',"required","value"=>"H","class"=>"form-control",'label'=>false)) ?>							
							
							<label>Reason for Holiday<span class="mandatory_fields"> * </span></label>
								<?php echo $this->Form->input('reason',array('type'=>'text',"required","class"=>"form-control","label"=>false)) ?>
							</div>	
						</div>
					</div>

			<div class="form-group">		
				<div class="row">
				  <div class="col-md-4"></div>
				    <div class="col-md-4">
						<?php echo $this->Form->submit('Submit',array("class"=>"btn btn-info pull-right form-control"));?>
					</div>
				  <div class="col-md-4">
					<?php echo $this->Html->link('<i class="btn btn-warning btn-sm pull-right">Cancel</i>', array("controller"=>"Attendance","action"=>"holidaySetting"),array("escape"=>false)); ?>
				  </div>
				</div>
				
				   <?php echo $this->Form->end(); ?>
				</div>
			</div>
        </div>
		<?php echo $this->Session->flash(); ?>
		</div>
	<!-------------------------------------------------------------------------->
	
		<div class="col-md-7">
		<?php if(!empty($list)) { ?>
			 <div class="box box-warning">
			  <div class="box-body">
				<table class="table table-bordered" id="example1">
				<thead>
					<tr><th>#</th><th>From Date</th><th>To Date</th><th>Reason</th><th>Delete</th><th>Edit</th></tr>
				</thead>
				<?php	$i=1;	
					foreach($list as $lt) {?>
					<tr><td><?php echo $i++; ?></td>
					<td><?php echo date('d-M-y',strtotime($lt['HolidaySetting']['from_date']));?></td>
					<td><?php echo date('d-M-y',strtotime($lt['HolidaySetting']['to_date']));?></td>
					<td><?php echo $lt['HolidaySetting']['reason'];?></td>
					<?php $id=$lt['HolidaySetting']['id'];?>
					
					<td><?php echo $this->Html->link('<i style="font-size:12px;" class="glyphicon glyphicon-trash"></i>'
						,array("controller"=>"Attendance","action"=>"holidaySettingDelete", $id),
						array("confirm"=>"Are you sure you want ro delete?","escape"=>false)); ?></td>	
					
					<td><?php echo $this->Html->link('<i style="font-size:12px;" class="glyphicon glyphicon-edit"></i>'
					,array("controller"=>"Attendance","action"=>"holidaySetting", $id),
					array("escape"=>false)); ?></td></tr>
					<?php } ?>
				
				</table>
				
					
			</div>
			
			</div>
			<?php  } else echo "List Empty";?>
	</div>
      
	  
	  </div>
      <!-- row -->
    
	</section>
    <!-- content -->
  </div>
  <!-- content-wrapper -->