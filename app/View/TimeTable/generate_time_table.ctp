<style>
.table-responsive {
    display:table-cell;
    width:100%;
	padding-right:1px; 
	padding-left:1px; 
	background-color:#B9D9F0;
	border-spacing: 1px;
    border-collapse: separate;
}
.table-responsive + .glyphicon.glyphicon-plus {
    display:table-cell;
}
.data
{
	background-color:#ffffff;
	border-radius: 5px;
	margin:10px 10px;
	
	text-transform: uppercase;
}
.data:hover
{
	z-index:2;
	background-color:#F39C12;
	border-radius: 5px;
	margin:10px 10px;  
	-moz-transform: scale(1.1);
	-webkit-transform: scale(1.1);
	transform: scale(1.1);
	color:#ffffff;
	font-weight: bold;
	text-transform: uppercase;
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
				<div class="col-md-1"></div>
				<div class="col-md-10">
				  <div class="box box-success">
				<br>
					<div class="box-header with-border">
					  <h3 class="box-title">Generate Time Table</h3>
					</div>
					<!-- form start -->
				   <?php echo $this->Form->create('TimeTable',array("url"=>array("controller"=>"TimeTable","action"=>"generateTimeTable")));?>
				   
					  <div class="box-body">
						<div class="form-group">
							
							<div class="row">
								<div class="col-sm-3"><label>Academic Year</label>
								<?php echo $this->Form->input("academic_year_id",array("type"=>"select","options"=>$academic_years_list,"label"=>false,"class"=>"form-control select_box","required","empty"=>"select"));?>		  
								</div>
								<div class="col-sm-3"><label>Class</label>
									<?php echo $this->Form->input("add_class_id",array("type"=>"select","options"=>$class_list,"label"=>false,"class"=>"form-control select_box","required","empty"=>"select"));?>		  
								</div>
								<div class="col-sm-3"><label>Section</label>
									<?php echo $this->Form->input("section_id",array("type"=>"select","options"=>$section_list,"label"=>false,"class"=>"form-control select_box","required","empty"=>"select"));?>		  
								</div>
								</br>
								<div class="col-sm-3"><?php echo $this->Form->submit('Show',array("class"=>"btn btn-info","name"=>"show_btn"));?></div>
							
						   </div>
						</div>
						<div class="col-md-1"></div>
						<?php //echo $this->Session->Flash();?>
					  </div>
					<?php echo $this->Form->end();?>
					<!---- form end ------>
				  	
				  
				</div>
				</div>
				</div>
	<!--------------------END FORM-------------------------------->
	<?php if(isset($_POST['show_btn'])!='') {?>
      <div class="row">
        <div class="col-md-12">
          <div class="box">
           
            <!-- /.box-header -->
            <div class="box-body">
			<div class="row" style="margin-left:10px;">
				<?php 
					//print_r($list);
					$days=array('MONDAY','TUESDAY','WEDNESDAY','THURSDAY','FRIDAY','SATURDAY');
					$days1=array('PERIOD','MONDAY','TUESDAY','WEDNESDAY','THURSDAY','FRIDAY','SATURDAY');
					for($i=0;$i<sizeof($days1);$i++)
					{
							?>
				<div class="col-md-2" style="padding-left:1px;padding-right:0px;width:14%;">
						<table class="table table-responsive" style="border: 0px solid #ffffff;display:inline-table; " >
							<tr align="center" >
							  <th align="center" ><?php echo $days1[$i];?></BR></th>
							</tr>
						</table>
				</div>
				<?php 
					
				} ?>
			
				<div class="col-md-2" style="padding-left:1px;padding-right:0px;width:14%;">
					<table class="table table-responsive" style="border: 0px solid #B9D9F0;display:inline-table;border-collapse:collapse;margin-top:-20px;" >
		
					<?php 
						foreach($list as $monday)
						{
							if($monday['TimeTable']['day']=='MONDAY')
							{
							
							if(($monday['TimeTable']['period'])=='LEISURE')
								{
					?>
									<tr style="background-color:#d2d6de;color:#FF0000;width:20%;" >
									  <td><b><?php echo $monday['TimeTable']['period'];?> </b></BR>  </td>
									</tr>
						<?php
							}
								else if(($monday['TimeTable']['period'])=='BREAK')
								{
						?>
									<tr style="background-color:#d2d6de;color:#FF0000;">
									  <td><b><?php echo $monday['TimeTable']['period'];?> </b></BR>  </td>
									</tr>
						<?php
							}
							else
							{
						?>
									<tr>
									  <td style="height:59px;"><b><?php echo 'PERIOD'.$monday['TimeTable']['period'];?></b> </BR></BR> </td>
									</tr>
						<?php
								}
									
							}
						}
				?>
				</table>
					</div>
				<?php for($i=0;$i<count($days);$i++){?>
				<div class="col-md-2" style="padding-left:1px;padding-right:0px;width:14%;margin-top:-20px;">
					<table class="table table-responsive" style="display:inline-table;" >
		
					<?php 
						foreach($list as $monday)
						{
							
							/*$dt = DateTime::createFromFormat('H:i a',$time); 
							$time1 = date('h:i:s a', strtotime($dt->format('H:i:s a')));*/
							
							
							if($monday['TimeTable']['day']==$days[$i])
							{
									$patterns = array('/LEISURE-/','/BREAK-/');
									$replacement = '';
									$time =  preg_replace($patterns, $replacement, $monday['TimeTable']['time']);
							if(($monday['TimeTable']['period'])=='LEISURE')
								{
					?>
									<tr style="background-color:#d2d6de;color:#FF0000;">
									  <td><?php echo $time;?> </BR>  </td>
									</tr>
							<?php
								}
								else if(($monday['TimeTable']['period'])=='BREAK')
								{
						?>
									<tr style="background-color:#d2d6de;color:#FF0000;">
									  <td><?php echo $time;?> </BR>  </td>
									</tr>
						<?php
							}
							else
							{
								$str1 = trim($monday['TimeTable']['subject_id'],",");
						?>
									<tr >
									  <td class="data" data-toggle="tooltip" title="<?php echo $time;?>" style="height:57.5px;">
										<?php echo $str1; ?> 
									 </td>
									</tr>
						<?php
								}
									
							}
						}
				
				?>
				</table>
					</div>
					<?php }?>
				</div>
			
		   <!-------ROW END---------->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
     
      </div>
	  <?php  } ?>
    </section>
    <!-- /.content -->
      </div><!-- /.content-wrapper -->
	</div> <!-- wrapper -->