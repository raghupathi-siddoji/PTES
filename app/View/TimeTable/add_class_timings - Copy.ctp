 
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
					  <h3 class="box-title">Add Class Timings</h3>
					</div>
					<!-- form start -->
				<!--   <?php echo $this->Form->create('Category',array("url"=>array("controller"=>"Admin","action"=>"addcategory")));?> -->
				   
					  <div class="box-body">
						<div class="form-group">
							
							<div class="row">
								<div class="col-sm-1"></div>
								<div class="col-sm-2"><label>Class</label></div>
									<div class="col-sm-2">
									 <div class="form-group">
									  <select class="form-control">
									  <option> Select Class</option>
									  	<option>All</option>
										<option>LKG</option>
										<option>UKG</option>
										<option>1std</option>
										<option>2nd</option>
										<option>3rd</option>
										<option>4th</option>
										<option>5th</option>
										<option>6th</option>
										<option>7th</option>
										<option>8th</option>
										<option>9th</option>
										<option>10th</option>
									  </select>
									</div>
									</div>
							<div class="col-sm-1"></div>
							
								<div class="col-sm-2"><label>Section</label></div>
									<div class="col-sm-2">
									 <div class="form-group">
										  <select class="form-control">
										   <option> Select Section</option>
											<option>All</option>
											<option>A</option>
											<option>B</option>
											<option>C</option>
											<option>D</option>
										 </select>
									</div>
								</div>
								<div class="col-sm-1"></div>
								<div class="col-sm-1"></div>
							</div>
							<div class="row">
								  <div class="box-body">
									  <table class="table table-bordered" >
										<tr bgcolor="#ECF0F5">
										  <th>Weekdays</th>
										  <th>Start Time</th>
										  <th>End Time</th>
										  <th>No of Periods</th>
										  <th>Time Duration</th>
										  <th>Break Time</th>
										  <th>Break after Period</th>
										  <th>Leisure Time</th>
										  <th>Leisure after Period</th>
										</tr>
										<tr>
											<td bgcolor="#ECF0F5">
												<div class="checkbox">
												  <label>
													<input type="checkbox"> Monday
												  </label>
												</div>
											</td>
											<td>
													<div class="bootstrap-timepicker">
														<div class="form-group">
													
														  <div class="input-group">
															<input type="text" class="form-control timepicker">
										
															<div class="input-group-addon">
															  <i class="fa fa-clock-o"></i>
															</div>
														  </div>
														  <!-- /.input group -->
														</div>
														<!-- /.form group -->
												</div>
											</td>
											<td>
											  <input class="form-control input-sm" type="text" placeholder="">
											</td>
											<td>
											  <input class="form-control input-sm" type="text" placeholder="">
										
											</td>
											<td>
											  <input class="form-control input-sm" type="text" placeholder="">
											</td>
											<td>
											  <input class="form-control input-sm" type="text" placeholder="">
											</td>
											<td>
											  <input class="form-control input-sm" type="text" placeholder="">
											</td>
											<td>
											  <input class="form-control input-sm" type="text" placeholder="">
											</td>
											<td>
											  <input class="form-control input-sm" type="text" placeholder="">
											</td>
										</tr>
								<tr>
												<td bgcolor="#ECF0F5">
												<div class="checkbox">
												  <label>
													<input type="checkbox"> Tuesdsay
												  </label>
												</div>
											</td>
											<td>
									  <input class="form-control input-sm" type="text" placeholder="">
									</td>
									<td>
									  <input class="form-control input-sm" type="text" placeholder="">
									</td>
									<td>
									  <input class="form-control input-sm" type="text" placeholder="">
								
									</td>
									<td>
									  <input class="form-control input-sm" type="text" placeholder="">
									</td>
									<td>
									  <input class="form-control input-sm" type="text" placeholder="">
									</td>
									<td>
									  <input class="form-control input-sm" type="text" placeholder="">
									</td>
									<td>
									  <input class="form-control input-sm" type="text" placeholder="">
									</td>
									<td>
									  <input class="form-control input-sm" type="text" placeholder="">
									</td>
								</tr>
								<tr>
											<td bgcolor="#ECF0F5">
												<div class="checkbox">
												  <label>
													<input type="checkbox"> Wednesday
												  </label>
												</div>
											</td>
											<td>
									  <input class="form-control input-sm" type="text" placeholder="">
									</td>
									<td>
									  <input class="form-control input-sm" type="text" placeholder="">
									</td>
									<td>
									  <input class="form-control input-sm" type="text" placeholder="">
								
									</td>
									<td>
									  <input class="form-control input-sm" type="text" placeholder="">
									</td>
									<td>
									  <input class="form-control input-sm" type="text" placeholder="">
									</td>
									<td>
									  <input class="form-control input-sm" type="text" placeholder="">
									</td>
									<td>
									  <input class="form-control input-sm" type="text" placeholder="">
									</td>
									<td>
									  <input class="form-control input-sm" type="text" placeholder="">
									</td>
								</tr>
								<tr>
											<td bgcolor="#ECF0F5">
												<div class="checkbox">
												  <label>
													<input type="checkbox"> Thrusday
												  </label>
												</div>
											</td>
										<td>
									  <input class="form-control input-sm" type="text" placeholder="">
									</td>
									<td>
									  <input class="form-control input-sm" type="text" placeholder="">
									</td>
									<td>
									  <input class="form-control input-sm" type="text" placeholder="">
								
									</td>
									<td>
									  <input class="form-control input-sm" type="text" placeholder="">
									</td>
									<td>
									  <input class="form-control input-sm" type="text" placeholder="">
									</td>
									<td>
									  <input class="form-control input-sm" type="text" placeholder="">
									</td>
									<td>
									  <input class="form-control input-sm" type="text" placeholder="">
									</td>
									<td>
									  <input class="form-control input-sm" type="text" placeholder="">
									</td>
								</tr>
								<tr>
											<td bgcolor="#ECF0F5">
												<div class="checkbox">
												  <label>
													<input type="checkbox"> Friday
												  </label>
												</div>
											</td>
											<td>
									  <input class="form-control input-sm" type="text" placeholder="">
									</td>
									<td>
									  <input class="form-control input-sm" type="text" placeholder="">
									</td>
									<td>
									  <input class="form-control input-sm" type="text" placeholder="">
								
									</td>
									<td>
									  <input class="form-control input-sm" type="text" placeholder="">
									</td>
									<td>
									  <input class="form-control input-sm" type="text" placeholder="">
									</td>
									<td>
									  <input class="form-control input-sm" type="text" placeholder="">
									</td>
									<td>
									  <input class="form-control input-sm" type="text" placeholder="">
									</td>
									<td>
									  <input class="form-control input-sm" type="text" placeholder="">
									</td>
								</tr>
								<tr>
											<td bgcolor="#ECF0F5">
												<div class="checkbox">
												  <label>
													<input type="checkbox"> Staurday
												  </label>
												</div>
											</td>
											<td>
									  <input class="form-control input-sm" type="text" placeholder="">
									</td>
									<td>
									  <input class="form-control input-sm" type="text" placeholder="">
									</td>
									<td>
									  <input class="form-control input-sm" type="text" placeholder="">
								
									</td>
									<td>
									  <input class="form-control input-sm" type="text" placeholder="">
									</td>
									<td>
									  <input class="form-control input-sm" type="text" placeholder="">
									</td>
									<td>
									  <input class="form-control input-sm" type="text" placeholder="">
									</td>
									<td>
									  <input class="form-control input-sm" type="text" placeholder="">
									</td>
									<td>
									  <input class="form-control input-sm" type="text" placeholder="">
									</td>
								</tr>
									 </table>
								</div>
							</div>
							<!--<div class="row">
								<div class="col-md-1">	</div>
								<div class="col-md-1">Weekdays	</div>
								<div class="col-md-1">Start Time	</div>
								<div class="col-md-1">End Time	</div>
								<div class="col-md-1">No of Periods	</div>
								<div class="col-md-1">Time Duration	</div>
								<div class="col-md-1">Break Time	</div>
								<div class="col-md-2">Break after Period	</div>
								<div class="col-md-1">Leisure Time</div>
								<div class="col-md-2">Leisure after Period</div>
							</div>
							<div class="row">
								<div class="col-md-1">	</div>
								<div class="col-md-1">
										<div class="checkbox">
										  <label>
											<input type="checkbox"> Monday
										  </label>
										</div>
								</div>
								<div class="col-md-1">
									<?php 
								   echo $this->Form->input('application_no',array("type"=>"text","class"=>"form-control","required","label"=>false));
									?>
								</div>
								<div class="col-md-1">
									<?php 
								   echo $this->Form->input('application_no',array("type"=>"text","class"=>"form-control","required","label"=>false));
									?>
								</div>
								<div class="col-md-1">
									<?php 
								   echo $this->Form->input('application_no',array("type"=>"text","class"=>"form-control","required","label"=>false));
									?>
								</div>
								<div class="col-md-1">
								<?php 
								   echo $this->Form->input('application_no',array("type"=>"text","class"=>"form-control","required","label"=>false));
									?>
								</div>
								<div class="col-md-1">
								<?php 
								   echo $this->Form->input('application_no',array("type"=>"text","class"=>"form-control","required","label"=>false));
									?>
								</div>
								<div class="col-md-2">
									<?php 
								   echo $this->Form->input('application_no',array("type"=>"text","class"=>"form-control","required","label"=>false));
									?>
								</div>
								<div class="col-md-1">
								<?php 
								   echo $this->Form->input('application_no',array("type"=>"text","class"=>"form-control","required","label"=>false));
									?>
								</div>
								<div class="col-md-2">
									<?php 
								   echo $this->Form->input('application_no',array("type"=>"text","class"=>"form-control","required","label"=>false));
									?>
								</div>
								
							</div>
							<div class="row">
								<div class="col-md-1">	</div>
								<div class="col-md-1">
										<div class="checkbox">
										  <label>
											<input type="checkbox"> Tuesday
										  </label>
										</div>
								</div>
								<div class="col-md-1">
									<?php 
								   echo $this->Form->input('application_no',array("type"=>"text","class"=>"form-control","required","label"=>false));
									?>
								</div>
								<div class="col-md-1">
									<?php 
								   echo $this->Form->input('application_no',array("type"=>"text","class"=>"form-control","required","label"=>false));
									?>
								</div>
								<div class="col-md-1">
									<?php 
								   echo $this->Form->input('application_no',array("type"=>"text","class"=>"form-control","required","label"=>false));
									?>
								</div>
								<div class="col-md-1">
								<?php 
								   echo $this->Form->input('application_no',array("type"=>"text","class"=>"form-control","required","label"=>false));
									?>
								</div>
								<div class="col-md-1">
								<?php 
								   echo $this->Form->input('application_no',array("type"=>"text","class"=>"form-control","required","label"=>false));
									?>
								</div>
								<div class="col-md-2">
									<?php 
								   echo $this->Form->input('application_no',array("type"=>"text","class"=>"form-control","required","label"=>false));
									?>
								</div>
								<div class="col-md-1">
								<?php 
								   echo $this->Form->input('application_no',array("type"=>"text","class"=>"form-control","required","label"=>false));
									?>
								</div>
								<div class="col-md-2">
									<?php 
								   echo $this->Form->input('application_no',array("type"=>"text","class"=>"form-control","required","label"=>false));
									?>
								</div>
								
							</div>
							<div class="row">
								<div class="col-md-1">	</div>
								<div class="col-md-1">
										<div class="checkbox">
										  <label>
											<input type="checkbox"> Wednesday
										  </label>
										</div>
								</div>
								<div class="col-md-1">
									<?php 
								   echo $this->Form->input('application_no',array("type"=>"text","class"=>"form-control","required","label"=>false));
									?>
								</div>
								<div class="col-md-1">
									<?php 
								   echo $this->Form->input('application_no',array("type"=>"text","class"=>"form-control","required","label"=>false));
									?>
								</div>
								<div class="col-md-1">
									<?php 
								   echo $this->Form->input('application_no',array("type"=>"text","class"=>"form-control","required","label"=>false));
									?>
								</div>
								<div class="col-md-1">
								<?php 
								   echo $this->Form->input('application_no',array("type"=>"text","class"=>"form-control","required","label"=>false));
									?>
								</div>
								<div class="col-md-1">
								<?php 
								   echo $this->Form->input('application_no',array("type"=>"text","class"=>"form-control","required","label"=>false));
									?>
								</div>
								<div class="col-md-2">
									<?php 
								   echo $this->Form->input('application_no',array("type"=>"text","class"=>"form-control","required","label"=>false));
									?>
								</div>
								<div class="col-md-1">
								<?php 
								   echo $this->Form->input('application_no',array("type"=>"text","class"=>"form-control","required","label"=>false));
									?>
								</div>
								<div class="col-md-2">
									<?php 
								   echo $this->Form->input('application_no',array("type"=>"text","class"=>"form-control","required","label"=>false));
									?>
								</div>
								
							</div>
							<div class="row">
								<div class="col-md-1">	</div>
								<div class="col-md-1">
										<div class="checkbox">
										  <label>
											<input type="checkbox"> Thrusday
										  </label>
										</div>
								</div>
								<div class="col-md-1">
									<?php 
								   echo $this->Form->input('application_no',array("type"=>"text","class"=>"form-control","required","label"=>false));
									?>
								</div>
								<div class="col-md-1">
									<?php 
								   echo $this->Form->input('application_no',array("type"=>"text","class"=>"form-control","required","label"=>false));
									?>
								</div>
								<div class="col-md-1">
									<?php 
								   echo $this->Form->input('application_no',array("type"=>"text","class"=>"form-control","required","label"=>false));
									?>
								</div>
								<div class="col-md-1">
								<?php 
								   echo $this->Form->input('application_no',array("type"=>"text","class"=>"form-control","required","label"=>false));
									?>
								</div>
								<div class="col-md-1">
								<?php 
								   echo $this->Form->input('application_no',array("type"=>"text","class"=>"form-control","required","label"=>false));
									?>
								</div>
								<div class="col-md-2">
									<?php 
								   echo $this->Form->input('application_no',array("type"=>"text","class"=>"form-control","required","label"=>false));
									?>
								</div>
								<div class="col-md-1">
								<?php 
								   echo $this->Form->input('application_no',array("type"=>"text","class"=>"form-control","required","label"=>false));
									?>
								</div>
								<div class="col-md-2">
									<?php 
								   echo $this->Form->input('application_no',array("type"=>"text","class"=>"form-control","required","label"=>false));
									?>
								</div>
								
							</div>
							<div class="row">
								<div class="col-md-1">	</div>
								<div class="col-md-1">
										<div class="checkbox">
										  <label>
											<input type="checkbox"> Friday
										  </label>
										</div>
								</div>
								<div class="col-md-1">
									<?php 
								   echo $this->Form->input('application_no',array("type"=>"text","class"=>"form-control","required","label"=>false));
									?>
								</div>
								<div class="col-md-1">
									<?php 
								   echo $this->Form->input('application_no',array("type"=>"text","class"=>"form-control","required","label"=>false));
									?>
								</div>
								<div class="col-md-1">
									<?php 
								   echo $this->Form->input('application_no',array("type"=>"text","class"=>"form-control","required","label"=>false));
									?>
								</div>
								<div class="col-md-1">
								<?php 
								   echo $this->Form->input('application_no',array("type"=>"text","class"=>"form-control","required","label"=>false));
									?>
								</div>
								<div class="col-md-1">
								<?php 
								   echo $this->Form->input('application_no',array("type"=>"text","class"=>"form-control","required","label"=>false));
									?>
								</div>
								<div class="col-md-2">
									<?php 
								   echo $this->Form->input('application_no',array("type"=>"text","class"=>"form-control","required","label"=>false));
									?>
								</div>
								<div class="col-md-1">
								<?php 
								   echo $this->Form->input('application_no',array("type"=>"text","class"=>"form-control","required","label"=>false));
									?>
								</div>
								<div class="col-md-2">
									<?php 
								   echo $this->Form->input('application_no',array("type"=>"text","class"=>"form-control","required","label"=>false));
									?>
								</div>
								
							</div>
							<div class="row">
								<div class="col-md-1">	</div>
								<div class="col-md-1">
										<div class="checkbox">
										  <label>
											<input type="checkbox"> Saturday
										  </label>
										</div>
								</div>
								<div class="col-md-1">
									<?php 
								   echo $this->Form->input('application_no',array("type"=>"text","class"=>"form-control","required","label"=>false));
									?>
								</div>
								<div class="col-md-1">
									<?php 
								   echo $this->Form->input('application_no',array("type"=>"text","class"=>"form-control","required","label"=>false));
									?>
								</div>
								<div class="col-md-1">
									<?php 
								   echo $this->Form->input('application_no',array("type"=>"text","class"=>"form-control","required","label"=>false));
									?>
								</div>
								<div class="col-md-1">
								<?php 
								   echo $this->Form->input('application_no',array("type"=>"text","class"=>"form-control","required","label"=>false));
									?>
								</div>
								<div class="col-md-1">
								<?php 
								   echo $this->Form->input('application_no',array("type"=>"text","class"=>"form-control","required","label"=>false));
									?>
								</div>
								<div class="col-md-2">
									<?php 
								   echo $this->Form->input('application_no',array("type"=>"text","class"=>"form-control","required","label"=>false));
									?>
								</div>
								<div class="col-md-1">
								<?php 
								   echo $this->Form->input('application_no',array("type"=>"text","class"=>"form-control","required","label"=>false));
									?>
								</div>
								<div class="col-md-2">
									<?php 
								   echo $this->Form->input('application_no',array("type"=>"text","class"=>"form-control","required","label"=>false));
									?>
								</div>
								
							</div>
						-->	
							
							
						
							
							
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
			
				
<!--------------Add  Category ---------------->
	
     <div class="row">
       <div class="col-md-12">
		
          <div class="box box-warning">
			  <div class="box-body">
				<table class="table table-bordered" id="example1">
				<thead>
				<tr><th>#</th><th>Class</th><th>Section</th><th>Start Time</th><th>End Time</th><th>Time Duration</th><th>Delete</th><th>Edit</th></tr>
				</thead>
			
				<tr>
					<td>1</td>
					<td>1 STD </td>
					<td>A </td>
					<td>9:40 AM</td>
					<td>4:00 PM </td>
					<td>40</td>
					<td> <i class="fa fa-trash-o" style="color:red"></i></td>
					<td> <i class="fa fa-pencil"  style="color:#00C0EF"></i></td>
				</tr>
				<tr>
					<td>2</td>
					<td>1 STD </td>
					<td>B </td>
					<td>9:40 AM</td>
					<td>4:00 PM </td>
					<td>40</td>
					<td> <i class="fa fa-trash-o" style="color:red"></i></td>
					<td> <i class="fa fa-pencil"  style="color:#00C0EF"></i></td>
				</tr>
				<tr>
					<td>3</td>
					<td>3 RD </td>
					<td>A </td>
					<td>9:40 AM</td>
					<td>4:00 PM </td>
					<td>40</td>
					<td> <i class="fa fa-trash-o" style="color:red"></i></td>
					<td> <i class="fa fa-pencil"  style="color:#00C0EF"></i></td>
				</tr>
				<tr>
					<td>4</td>
					<td>7 Th </td>
					<td>B </td>
					<td>9:40 AM</td>
					<td>4:00 PM </td>
					<td>40</td>
					<td> <i class="fa fa-trash-o" style="color:red"></i></td>
					<td> <i class="fa fa-pencil"  style="color:#00C0EF"></i></td>
				</tr>
				<!--	<?php	$i=1;	
					foreach($list as $lt) {?>
					<tr><td><?php echo $i++; ?></td>
					<td><?php echo $lt['Category']['category'];?></td>
					<?php $id=$lt['Category']['id'];?>
					<td><?php echo $this->Html->link('<i style="font-size:17px;" class="glyphicon glyphicon-trash"></i>'
						,array("controller"=>"Admin","action"=>"deletecategory", $id),
						array("confirm"=>"Are you sure you want ro delete???","escape"=>false)); ?></td>	
					
					<td><?php echo $this->Html->link('<i style="font-size:17px;" class="glyphicon glyphicon-edit"></i>'
					,array("controller"=>"Admin","action"=>"addcategory", $id),
					array("escape"=>false)); ?></td></tr>
					<?php } ?> -->
				
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