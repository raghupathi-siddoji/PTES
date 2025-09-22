 
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
           
          <!------------"Add Subject" created: 20 aug 2016 ----------->
		  
			 <div class="row">
					
				<div class="col-md-12">
				  <div class="box box-success">
					<br>
					<div class="box-header with-border">
					  
					  <div class="col-md-8"><h3 class="box-title">Add Class Timings</h3></div>
					<div class="col-md-4">
						<?php echo $this->Session->flash(); ?>
						<?php echo $this->Html->link('<i class="btn btn-info btn-sm pull-right">Class Timings List</i>',
						array('controller'=>'TimeTable','action'=>'classTimingsList'),array('escape'=>false))?>
					</div>
					</div>
					<!-- form start -->
				  <?php echo $this->Form->create('ClassTiming',array("url"=>array("controller"=>"TimeTable","action"=>"addClassTimings")));
						echo $this->Form->input('ClassTiming.id');?> 
				   
					  <div class="box-body">
						<div class="form-group">
							
							<div class="row">
								<div class="col-sm-2"><label>Academic Year</label></div>
									<div class="col-sm-2">
									 <div class="form-group">
									<?php echo $this->Form->input("ClassTiming.academic_year_id",array("type"=>"select","options"=>$academic_years_list,"label"=>false,"class"=>"form-control select_box","empty"=>"Select","required"));?>		  
									</div>
								</div>
								<div class="col-sm-2"><label>Class</label>
								 	<span style="margin-left:80px;" ><input type="button" name="Button" value="All" onclick="selectAll('ClassTimingAddClassId',true)" /></span>
								</div>
									<div class="col-sm-2">
									 <div class="form-group">
									
									 <!-----------------------Syllbus FOr FUTURE USE-------------------------->
									<?php echo $this->Form->input("ClassTiming.syllbus",array("type"=>"hidden","label"=>false,"class"=>"form-control","value"=>"state"));?>		  
									<!--------------------------Syllbus FOr FUTURE USE----------------------->
									<?php echo $this->Form->input("ClassTiming.add_class_id",array('multiple' => 'multiple',"type"=>"select","options"=>$class_list,"label"=>false,"class"=>"form-control select_box",'size' => 2,"required"));?>		  
									</div>
								</div>
							
								<div class="col-sm-2"><label>Section</label>	 	 	
								<span style="margin-left:40px;" ><input type="button" name="Button" value="All" onclick="selectAll('ClassTimingSectionId',true)" /></sapn>
									</div>
									<div class="col-sm-2">
										<div class="form-group">
										<?php echo $this->Form->input("ClassTiming.section_id",array('multiple' => 'true',"type"=>"select","options"=>$section_list,"label"=>false,"class"=>"form-control select_box",'size' => 2,"required"));?>		  
									</div>
								</div>
								
						
							</div>
							<div class="row">
								  <div class="box-body">
									  <table class="table table-bordered" >
										<tr bgcolor="#ECF0F5">
										  <th>Weekdays</th>
										  <th>Start Time</th>
										  <th>End Time</th>
										   <th>No of Periods</th>
										    <th>Period Duration</th>
										  <th>Break Time</th>
										  <th>Lunch Break after Period</th>
										  <th>Leisure Time</th>
										  <th>Leisure after Period</th>
										</tr>
										
										<?php 
											//print_r($class_details_list);
											$days = array("0"=>"MONDAY","1"=>"TUESDAY","2"=>"WEDNESDAY","3"=>"THURSDAY","4"=>"FRIDAY","5"=>"SATURDAY");
											for($i=0;$i<count($days);$i++)
											{
										?>
										<tr>
											<td bgcolor="#ECF0F5">
												<div class="checkbox">
												  <label>
													<input type="checkbox" name="days[]" value="<?php echo $days[$i];?>" <?php if($days[$i]==$this->request->data['ClassTimingDetails'][$i]['days']) echo "checked";?> > <?php echo $days[$i];?>
													
												  </label>
												</div>
											</td>
											
											<td>
											<?php echo $this->Form->input('ClassTimingDetails.id.',array("type"=>"hidden","class"=>"form-control input-sm","label"=>false,"value"=>$this->request->data['ClassTimingDetails'][$i]['id']));?>
											 <?php echo $this->Form->input('ClassTimingDetails.start_time.',array("type"=>"text","class"=>"form-control input-sm timepicker","label"=>false,"value"=>$this->request->data['ClassTimingDetails'][$i]['start_time'],"placeholder"=>"10:00 AM",));?>
											</td>
											<td>
											  <?php echo $this->Form->input('ClassTimingDetails.end_time.',array("type"=>"text","class"=>"form-control input-sm","label"=>false,"value"=>$this->request->data['ClassTimingDetails'][$i]['end_time'],"placeholder"=>"4:30 PM"));?>
											</td>
											
											</td>
											<td>
											  <?php echo $this->Form->input('ClassTimingDetails.number_of_period.',array("type"=>"text","class"=>"form-control input-sm","label"=>false,"value"=>$this->request->data['ClassTimingDetails'][$i]['number_of_period'],"placeholder"=>"8"));?>
											</td>
											</td>
											<td>
											 <?php echo $this->Form->input('ClassTimingDetails.time_duration.',array("type"=>"text","class"=>"form-control input-sm","label"=>false,"value"=>$this->request->data['ClassTimingDetails'][$i]['time_duration'],"placeholder"=>"40 "));?>
											</td>
											</td>
											<td>
											  <?php echo $this->Form->input('ClassTimingDetails.break_duration.',array("type"=>"text","class"=>"form-control input-sm","label"=>false,"value"=>$this->request->data['ClassTimingDetails'][$i]['break_duration'],"placeholder"=>"40"));?>
											</td>
											</td>
											<td>
											 <?php echo $this->Form->input('ClassTimingDetails.break_after_period.',array("type"=>"text","class"=>"form-control input-sm","label"=>false,"value"=>$this->request->data['ClassTimingDetails'][$i]['break_after_period'],"placeholder"=>"4"));?>
											</td>
											</td>
											<td>
											 <?php echo $this->Form->input('ClassTimingDetails.leisure_duration.',array("type"=>"text","class"=>"form-control input-sm","label"=>false,"value"=>$this->request->data['ClassTimingDetails'][$i]['leisure_duration'],"placeholder"=>"10"));?>
											</td>
											</td>
											<td>
											 <?php echo $this->Form->input('ClassTimingDetails.leisure_after_period.',array("type"=>"text","class"=>"form-control input-sm","label"=>false,"value"=>$this->request->data['ClassTimingDetails'][$i]['leisure_after_period'],"placeholder"=>"2"));?>
											</td>
											</td>
											</tr>
											<?php }?>
										
								 </table>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-4"></div>
								<div class="col-sm-4"><?php echo $this->Form->submit('Add Class Timings',array("class"=>"btn btn-info"));?></div>
								<div class="col-sm-4"></div>
						   </div>
						</div>
						
					  </div>
					<?php echo $this->Form->end();?>
					<!---- form end ------>
				  	
				  
				</div>
				</div>
				</div>
			
				
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
	</div> <!-- wrapper -->
	
	<!-- bootstrap time picker -->

 <?php echo $this->Html->script('plugins/timepicker/bootstrap-timepicker.min'); ?>
 <?php echo $this->Html->script('plugins/timepicker/bootstrap-timepicker'); ?>
  <?php echo $this->Html->script('jQuery/jquery-2.2.3.min'); ?>

<!-- Page script -->
<script type="text/javascript">
	function selectAll(selectBox,selectAll) {
		// have we been passed an ID
		if (typeof selectBox == "string") {
			selectBox = document.getElementById(selectBox);
		}
		// is the select box a multiple select box?
		if (selectBox.type == "select-multiple") {
			for (var i = 0; i < selectBox.options.length; i++) {
				selectBox.options[i].selected = selectAll;
			}
		}
	}
</script>