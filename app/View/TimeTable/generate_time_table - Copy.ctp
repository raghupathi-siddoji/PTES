<style>


.table-responsive {
    display:table-cell;
    width:100%;
	padding-right:1px; 
	padding-left:1px; 
}
.table-responsive + .glyphicon.glyphicon-plus {
    display:table-cell;
	
}
</style>
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
			 <li class="active">TimeTable Generation</li>
          </ol>
        </section>

        <!-- Main content -->
    <section class="content">
	<!--------------------START FORM-------------------------------->
		 <div class="row">
				<!-- left column -->
				
				<div class="col-md-6">
				  <div class="box box-success">
				<br>
					<div class="box-header with-border">
					  <h3 class="box-title">Add Subject</h3>
					</div>
					<!-- form start -->
				   <?php echo $this->Form->create('TimeTable',array("url"=>array("controller"=>"TimeTable","action"=>"generateTimeTable")));?>
				   
					  <div class="box-body">
						<div class="form-group">
							
							<div class="row">
							<div class="col-sm-5"><label>Academic Year</label></div>
						
							<div class="col-sm-7">
							 <div class="form-group">
							<?php echo $this->Form->input("academic_year_id",array("type"=>"select","options"=>$academic_years_list,"label"=>false,"class"=>"form-control"));?>		  
									</div>
							</div>
							</div>
							<br>
							<div class="row">
								<div class="col-sm-5"><label>Class</label></div>
							<div class="col-sm-7">
								<?php echo $this->Form->input("add_class_id",array("type"=>"select","options"=>$class_list,"label"=>false,"class"=>"form-control"));?>		  
							</div>
							</div>
							<br>
							<div class="row">
								<div class="col-sm-5"><label>Section</label></div>
								<div class="col-sm-7">
									<?php echo $this->Form->input("section_id",array("type"=>"select","options"=>$section_list,"label"=>false,"class"=>"form-control"));?>		  
								</div>
							</div>
							
						
							
							<br>
							<div class="row">
								<div class="col-sm-4"></div>
								<div class="col-sm-4"><?php echo $this->Form->submit('Show',array("class"=>"btn btn-info"));?></div>
								<div class="col-sm-4"></div>
						   </div>
						</div>
						<?php //echo $this->Session->Flash();?>
					  </div>
					<?php echo $this->Form->end();?>
					<!---- form end ------>
				  	
				  
				</div>
				</div>
				</div>
	<!--------------------END FORM-------------------------------->
      <div class="row">
        <div class="col-md-12">
          <div class="box">
           
            <!-- /.box-header -->
            <div class="box-body">
			<div class="row" style="margin-left:10px;">
				<?php 
					$days1=array('Period','MONDAY','TUEDAY','WEDDAY','THURSDAY','FRIDAY','SATURDAY');
					for($i=0;$i<sizeof($days1);$i++)
					{
				?>
				<div class="col-md-2" style="padding-left:1px;padding-right:0px;width:14%;">
						<table class="table table-responsive" style="border: 0px solid #B9D9F0;display:inline-table;border-collapse:collapse;">
							<tr  bgcolor="#B9D9F0" align="center">
							  <th></th>
							  <th><?php echo $days1[$i];?></th>
							</tr>
						</table>
				</div>
				<?php } ?>
			</div>
			<div class="row" style="margin-left:10px;">
				<!-----------------------PEROID------------------------------------>
				<div class="col-md-2" style="padding-left:1px;padding-right:0px;width:14%;">
					<table class="table table-responsive" style="border: 0px solid #B9D9F0;display:inline-table;border-collapse:collapse;">
							 <?php 
							 	foreach($monday_time_table as $monday)
								{
									if(($monday['TimeTable']['period'])=='LEISURE')
									{
									?>
									<tr style="background-color:#EAF068;color:#FF0000;">
									  <td><?php echo $monday['TimeTable']['period'];?> </BR></BR>  </td>
									</tr>
									<?php
									}
									else if(($monday['TimeTable']['period'])=='BREAK')
									{
									?>
									<tr style="background-color:#EAF068;color:#FF0000;">
									  <td><?php echo $monday['TimeTable']['period'];?> </BR></BR>  </td>
									</tr>
									<?php
									}
									else
									{
									?>
									<tr>
									  <td><?php echo 'PERIOD'.$monday['TimeTable']['period'];?> </BR></BR></BR>   </td>
									</tr>
									<?php
									}
									
								} 
							?>
						
					</table>
				</div>
				<!-----------------------MONDAY------------------------------------>
				<div class="col-md-2" style="padding-left:1px;padding-right:0px;width:14%;">
					<table class="table table-responsive" style="border: 0px solid #B9D9F0;display:inline-table;border-collapse:collapse;">
							  <?php 
							 	foreach($monday_time_table as $monday)
								{
									$patterns = array('/LEISURE-/','/BREAK-/');
									$replacement = '';
									$time =  preg_replace($patterns, $replacement, $monday['TimeTable']['time']);
																		
									if(($monday['TimeTable']['period'])=='LEISURE')
									{
									?>
									<tr style="background-color:#EAF068;color:#FF0000;">
									  <td><?php echo $time;?> </BR>  </td>
									</tr>
									<?php
									}
									else if(($monday['TimeTable']['period'])=='BREAK')
									{
									?>
									<tr style="background-color:#EAF068;color:#FF0000;">
									  <td><?php echo $time;?> </BR></td>
									</tr>
									<?php
									}
									else
									{
									?>
									<tr>
									  <td><?php echo $time;?> </BR><?php echo $monday['Subject']['subject_id'];?>  </td>
									</tr>
									<?php
									}
									
								} 
							?>
						
					</table>
				</div>
				<!-----------------------TUESDAY------------------------------------>
				<div class="col-md-2" style="padding-left:1px;padding-right:0px;width:14%;">
					<table class="table table-responsive" style="border: 0px solid #B9D9F0;display:inline-table;border-collapse:collapse;">
							 <?php 
							 	foreach($tuesday_time_table as $tuesday)
								{
									$pattrens= array('/LEISURE-/','/BREAK-/');
									
									$time = preg_replace($pattrens, '',$tuesday['TimeTable']['time']);
									
									if(($tuesday['TimeTable']['period'])=='LEISURE')
									{
									?>
									<tr style="background-color:#EAF068;color:#FF0000;">
									  <td><?php echo $time;?> </BR> </td>
									</tr>
									<?php
									}
									else if(($tuesday['TimeTable']['period'])=='BREAK')
									{
									?>
									<tr style="background-color:#EAF068;rcolor:#FF0000;">
									  <td><?php echo $time;?> </BR> </td>
									</tr>
									<?php
									}
									else
									{
									?>
									<tr>
									  <td><?php echo $time;?> </BR><?php echo $tuesday['Subject']['subject_id'];?>    </td>
									</tr>
									<?php
									}
								} 
							?>
						
					</table>
				</div>
				<!-----------------------WEDNESDAY------------------------------------>
				<div class="col-md-2" style="padding-left:1px;padding-right:0px;width:14%;">
					<table class="table table-responsive" style="border: 0px solid #B9D9F0;display:inline-table;border-collapse:collapse;">
							 <?php 
							 	foreach($wednesday_time_table as $wednesday)
								{
									$patterns= array('/LEISURE-/','/BREAK-/');
									$time = preg_replace($patterns, '',$wednesday['TimeTable']['time']);
									
									if(($wednesday['TimeTable']['period'])=='LEISURE')
									{
									?>
									<tr style="background-color:#EAF068;color:#FF0000;">
									  <td><?php echo $time;?> </BR> </td>
									</tr>
									<?php
									}
									else if(($wednesday['TimeTable']['period'])=='BREAK')
									{
									?>
									<tr style="background-color:#EAF068;color:#FF0000;">
									  <td><?php echo $time;?> </BR></td>
									</tr>
									<?php
									}
									else
									{
									?>
									<tr>
									  <td><?php echo $time;?> </BR><?php echo $wednesday['Subject']['subject_id'];?>    </td>
									</tr>
									<?php
									}
								} 
							?>
						
					</table>
				</div>
				<!-----------------------THURSDAY------------------------------------>
				<div class="col-md-2" style="padding-left:1px;padding-right:0px;width:14%;">
					<table class="table table-responsive" style="border: 0px solid #B9D9F0;display:inline-table;border-collapse:collapse;">
							 <?php 
							 
							 	foreach($thursday_time_table as $thursday)
								{
									$patterns =array('/LEISURE-/','/BREAK-/');
									$time = preg_replace($patterns, '',$thursday['TimeTable']['time']);
									
									if(($thursday['TimeTable']['period'])=='LEISURE')
									{
									?>
									<tr style="background-color:#EAF068;color:#FF0000;">
									  <td><?php echo $time;?> </BR>   </td>
									</tr>
									<?php
									}
									else if(($thursday['TimeTable']['period'])=='BREAK')
									{
									?>
									<tr style="background-color:#EAF068;color:#FF0000;">
									  <td><?php echo $time;?> </BR>  </td>
									</tr>
									<?php
									}
									else
									{
									?>
									<tr>
									  <td><?php echo $time;?> </BR><?php echo $thursday['Subject']['subject_id'];?>    </td>
									</tr>
									<?php
									}
								} 
							?>
						
					</table>
				</div>
				<!-----------------------FRIDAY------------------------------------>
				<div class="col-md-2" style="padding-left:1px;padding-right:0px;width:14%;">
					<table class="table table-responsive" style="border: 0px solid #B9D9F0;display:inline-table;border-collapse:collapse;">
							 <?php 
							 	foreach($friday_time_table as $friday)
								{
									$patterns =array('/LEISURE-/','/BREAK-/');
									$time = preg_replace($patterns, '',$friday['TimeTable']['time']);
									
									if(($friday['TimeTable']['period'])=='LEISURE')
									{
									?>
									<tr style="background-color:#EAF068;color:#FF0000;">
									  <td><?php echo $time;?> </BR></td>
									</tr>
									<?php
									}
									else if(($friday['TimeTable']['period'])=='BREAK')
									{
									?>
									<tr style="background-color:#EAF068;color:#FF0000;">
									  <td><?php echo $time;?> </BR></td>
									</tr>
									<?php
									}
									else
									{
									?>
									<tr>
									  <td><?php echo $time;?> </BR><?php echo $friday['Subject']['subject_id'];?>    </td>
									</tr>
									<?php
									}
								} 
							?>
						
					</table>
				</div>
				<!-----------------------SATURDAY------------------------------------>
				<div class="col-md-2" style="padding-left:1px;padding-right:0px;width:14%;">
					<table class="table table-responsive" style="border: 0px solid #B9D9F0;display:inline-table;border-collapse:collapse;">
							 <?php 
							 	foreach($saturday_time_table as $saturday)
								{
									$patterns =array('/LEISURE-/','/BREAK-/');
									$time = preg_replace($patterns, '',$saturday['TimeTable']['time']);
									
									if(($saturday['TimeTable']['period'])=='LEISURE')
									{
									?>
									<tr style="background-color:#EAF068;color:#FF0000;">
									  <td><?php echo $time;?> </BR> </td>
									</tr>
									<?php
									}
									else if(($saturday['TimeTable']['period'])=='BREAK')
									{
									?>
									<tr style="background-color:#EAF068;color:#FF0000;">
									  <td><?php echo $time;?> </BR></td>
									</tr>
									<?php
									}
									else
									{
									?>
									<tr>
									  <td><?php echo $time;?> </BR><?php echo $saturday['Subject']['subject_id'];?>  </td>
									</tr>
									<?php
									}
								} 
							?>
						
					</table>
				</div>
				</div>
				<!-----------------------END------------------------------------>
		   </div>
      

          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
     
      </div>
    </section>
    <!-- /.content -->
      </div><!-- /.content-wrapper -->
	</div> <!-- wrapper -->