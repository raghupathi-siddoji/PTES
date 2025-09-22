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
			 <li class="active">Subject Allocation</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
           
          <!------------"Add Subject" created: 20 aug 2016 ----------->
		  
			 <div class="row">
				<!-- left column -->
				<div class="col-md-1"></div>
				<div class="col-md-10">
				  <div class="box box-success">
		
					<br>
					<div class="box-header with-border">
					  
					  <div class="col-md-8"><h3 class="box-title">Subject Allocation</h3></div>
					<div class="col-md-4">
						<?php echo $this->Html->link('<i class="btn btn-info btn-sm pull-right">Subject Allocation List</i>',
						array('controller'=>'TimeTable','action'=>'periodSubjectAllocationList'),array('escape'=>false))?>
					</div>
					</div>
					<!-- form start -->
				  <?php echo $this->Form->create('PeriodSubjectAllocation',array("url"=>array("controller"=>"TimeTable","action"=>"periodSubjectAllocation")));?> 
				   
					  <div class="box-body">
						<div class="form-group">
							<div class="row">
								<div class="col-sm-4"><label>Academic Year</label>
										<div class="form-group">
											<?php echo $this->Form->input("academic_year_id",array("type"=>"select","options"=>$academic_years_list,"label"=>false,"class"=>"form-control"));?>		  
										</div>
								</div>	
							
								<div class="col-sm-4"><label>Class</label>
									 <div class="form-group">
										<?php echo $this->Form->input("add_class_id",array("type"=>"select","options"=>$class_list,"label"=>false,"class"=>"form-control"));?>		  
									</div>
								</div>	
						
								<div class="col-sm-4"><label>Section</label>
									 <div class="form-group">
										<?php echo $this->Form->input("section_id",array("type"=>"select","options"=>$section_list,"label"=>false,"class"=>"form-control"));?>		  
									</div>
								</div>	
							</div>
							<br>
							<div class="row">
								<div class="col-sm-4"><label>Subject</label>
									 <div class="form-group">
										<?php echo $this->Form->input("subject_id",array("type"=>"select","options"=>$subject_list,"label"=>false,"class"=>"form-control"));?>		  
									</div>
								</div>	
								<div class="col-sm-4"><label>Subject Type</label>
									 <div class="form-group">
									  <?php 
										$subject_type= array("Language1"=>"Language1","Language2"=>"Language2","Language3"=>"Language3","Regular Subject"=>"Regular Subject");
										echo $this->Form->input("subject_type",array("type"=>"select","options"=>$subject_type,"label"=>false,"class"=>"form-control"));?>		  
									</div>
								</div>	
								<div class="col-sm-4"><label>Period Order Series</label>
									 <div class="form-group">
								    <?php 
										$period_order= array("1"=>"1","2"=>"2","3"=>"3","4"=>"4","5"=>"5","6"=>"6","7"=>"7","8"=>"8","9"=>"9","10"=>"10");
										echo $this->Form->input("period_order",array("type"=>"select","options"=>$period_order,"label"=>false,"class"=>"form-control"));?>		  
									</div>
									
								</div>
							</div>
							<div class="row">
								
								
								<?php 
									//$days = array('MONDAY', 'TUESDAY', 'WEDNESDAY','THURSDAY','FRIDAY','SATURDAY');
									$selected1 =  explode(",",rtrim($this->request->data['PeriodSubjectAllocation']['weekdays'],','));
									
									print_r($selected1);
									$sel_array = array();
									$sel_key = array();
									foreach($selected1 as $key => $value) {
										echo $key."=>".$value."<br>";
										if($value == "MONDAY")
										{
											echo "true";
											$sel_array[0]=0;
											$sel_key[] = 0;
										}
										else if($value == "TUESDAY")
										{
											$sel_array[1]='1';
											$sel_key[] = 1;
										}
										else if($value == "WEDNESDAY")
										{
											$sel_array[2]='2';
											$sel_key[] = 2;
										}
										else if($value == "THURSDAY")
										{
											$sel_array[3]='3';
											$sel_key[] = 3;
										}
										else if($value == "FRIDAY")
										{
											$sel_array[4]='4';
											$sel_key[] = 4;
										}
										else if($value == "SATURDAY")
										{
											$sel_array[5]='5';
											$sel_key[] = 5;
										}
									}
									echo "<br>";
									print_r($sel_array);
									echo "<br>";
									print_r($sel_key);
									foreach($selected1 as $key => $value) {echo $key; }
										
									$days = array("0"=>"MONDAY","1"=>"TUESDAY","2"=>"WEDNESDAY","3"=>"THURSDAY","4"=>"FRIDAY","5"=>"SATURDAY");
									/*$selected =  explode(",",rtrim($this->request->data['PeriodSubjectAllocation']['weekdays'],','));
									print_r($selected);
									echo "<br>";
									print_r($days);*/
								?>
								<div class="col-sm-4">
									<div class="checkbox">
									  <label>
										<?php 
										 // echo $this->Form->input("weekdays.", array("type"=>"checkbox","o"=>$days[$i],"label"=>$days[$i],'multiple' => 'checkbox',"hiddenField"=>false),array("class"=>"form-control"));
										  echo $this->Form->input("weekdays.", array('multiple' => 'checkbox', 'options' => $days, 'selected' => $sel_key,"hiddenField"=>false),array("class"=>"form-control"));		
								
										 ?>
										 
										 </label>
									</div>
								</div>
								<?php 
										 
											//$db_days = explode(",",$this->request->data['PeriodSubjectAllocation']['weekdays']);
										 
										 	/*$checked = false;
											$days = array("0"=>"MONDAY","1"=>"TUESDAY","2"=>"WEDNESDAY","3"=>"THURSDAY","4"=>"FRIDAY","5"=>"SATURDAY");
											for($i=0;$i<count($days);$i++)
											{
												if($days[$i]==$db_days[$i])
												{
													$checked = true;
												}*/
												 
										?>
										
								<!--	<div class="col-sm-4">
									<div class="checkbox">
									  <label>
										<?php 
										  echo $this->Form->input("weekdays.", array("type"=>"checkbox","options"=>$days[$i],"label"=>$days[$i],'selected' => $sel_key,"hiddenField"=>false),array("class"=>"form-control"));?>
										 </label>
									</div>
								</div>-->
								<?php 
								
								//}
								//$checked = false;?>
							</div>
								
							<br>
							
							
							<div class="row">
								<div class="col-sm-4"></div>
								<div class="col-sm-4"><?php echo $this->Form->submit('Submit',array("class"=>"btn btn-info"));?></div>
								<div class="col-sm-4"></div>
						   </div>
						</div>
						<?php echo $this->Session->flash();?>
					  </div>
					<?php echo $this->Form->end();?>
					<!---- form end ------>
				  	
				  
				</div>
				</div>
				<div class="col-md-1"></div>
		
      </div>
      <!-- row -->
	
				
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
	</div> <!-- wrapper -->