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
				  <?php echo $this->Form->create('PeriodSubjectAllocation',array("url"=>array("controller"=>"TimeTable","action"=>"periodSubjectAllocation")));
						echo $this->Form->input('id');
				  ?> 
				   
					  <div class="box-body">
						<div class="form-group">
							<div class="row">
								<div class="col-sm-8">
									<div class="row">
										<div class="col-sm-6"><label>Academic Year</label>
											<div class="form-group">
											<?php echo $this->Form->input("academic_year_id",array("type"=>"select","options"=>$academic_years_list,"label"=>false,"class"=>"form-control select_box","empty"=>"Select","required"));?>		  
											</div>
										</div>	
							
										<div class="col-sm-6"><label>Class</label>
											<div class="form-group">
											<?php echo $this->Form->input("add_class_id",array("type"=>"select","options"=>$class_list,"label"=>false,"class"=>"form-control select_box","empty"=>"Select","required"));?>		  
											</div>
										</div>	
									</div>
									<div class="row">
										<div class="col-sm-6"><label>Section</label>
											<div class="form-group">
												<?php echo $this->Form->input("section_id",array("type"=>"select","options"=>$section_list,"label"=>false,"class"=>"form-control select_box"));?>		  
											</div>
										</div>	
										<div class="col-sm-6"><label>Subject</label>
											<div class="form-group">
												<?php echo $this->Form->input("subject_id",array("type"=>"select","options"=>$subject_list,"label"=>false,"class"=>"form-control select_box","empty"=>"Select","required"));?>		  
											</div>
											</div>
									</div>
									<div class="row">
										<div class="col-sm-6"><label>Subject Type</label>
											<div class="form-group">
											<?php 
											$subject_type= array("Language1"=>"Language1","Language2"=>"Language2","Language3"=>"Language3","Regular"=>"Regular");
											echo $this->Form->input("subject_type",array("type"=>"select","options"=>$subject_type,"label"=>false,"class"=>"form-control select_box","empty"=>"Select","required"));?>		  
											</div>
										</div>	
										<div class="col-sm-6"><label>Period Order Series</label>
										<div class="form-group">
											<?php 
											$period_order= array("1"=>"1","2"=>"2","3"=>"3","4"=>"4","5"=>"5","6"=>"6","7"=>"7","8"=>"8","9"=>"9","10"=>"10");
											echo $this->Form->input("period_order",array("type"=>"select","options"=>$period_order,"label"=>false,"class"=>"form-control select_box","empty"=>"Select","required"));?>		  
											</div>
										</div>
									</div>
									
								</div>	
								<div class="col-sm-4">
									<div class="row">
											<?php 
											$days = array("MONDAY"=>"MONDAY","TUESDAY"=>"TUESDAY","WEDNESDAY"=>"WEDNESDAY","THURSDAY"=>"THURSDAY","FRIDAY"=>"FRIDAY","SATURDAY"=>"SATURDAY");
											$selected1 =  explode(',',trim($this->request->data['PeriodSubjectAllocation']['weekdays']));
											$sel_key = array();
											for($i=0;$i<count($selected1);$i++)
											{
												if(trim($selected1[$i])=="MONDAY")
												{
														$sel_key[] = "MONDAY";
												}
												
												if( trim($selected1[$i])=="TUESDAY")
												{
													$sel_key[] = "TUESDAY";
												}
												
												if(trim($selected1[$i])=="WEDNESDAY")
												{
													$sel_key[] = "WEDNESDAY";
												}
												
												if(trim($selected1[$i])=="THURSDAY")
												{
													$sel_key[] = "THURSDAY";
												}
												
												if(trim($selected1[$i])=="FRIDAY")
												{
													$sel_key[] = "FRIDAY";
												}
												
												if(trim($selected1[$i])=="SATURDAY")
												{
													$sel_key[] = "SATURDAY";
												}
											
											}
											//print_r($sel_key);
											?>
									<div class="col-sm-8" STYLE="margin-left:70px;">
										
										
										
										  <label>
											<input type="checkbox" id="selectall" onClick="selectAll(this)" STYLE="margin-top:10px;margin-left:-20px;"/> All
											<?php 
											 echo $this->Form->input("weekdays.", array('multiple' => 'checkbox', 'options' => $days,'selected' => $sel_key, "hiddenField"=>false),array("class"=>"form-control"));		
											?>
										</label>
										
									</div>	

									
									</div>

								</div>
							</div>
							<div class="row">
								<div class="col-sm-4"></div>
								<div class="col-sm-4"><?php echo $this->Form->submit('Submit',array("class"=>"btn btn-info","onClick"=>"return validate();"));?></div>
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
	
	
	<script language="JavaScript">
	function selectAll(source) {
		
		if(source.checked==true)
		{
			document.getElementById('PeriodSubjectAllocationWeekdaysMONDAY').checked=true;
			document.getElementById('PeriodSubjectAllocationWeekdaysTUESDAY').checked=true;
			document.getElementById('PeriodSubjectAllocationWeekdaysWEDNESDAY').checked=true;
			document.getElementById('PeriodSubjectAllocationWeekdaysTHURSDAY').checked=true;
			document.getElementById('PeriodSubjectAllocationWeekdaysFRIDAY').checked=true;
			document.getElementById('PeriodSubjectAllocationWeekdaysSATURDAY').checked=true;
		}
		else
		{
			document.getElementById('PeriodSubjectAllocationWeekdaysMONDAY').checked=false;
			document.getElementById('PeriodSubjectAllocationWeekdaysTUESDAY').checked=false;
			document.getElementById('PeriodSubjectAllocationWeekdaysWEDNESDAY').checked=false;
			document.getElementById('PeriodSubjectAllocationWeekdaysTHURSDAY').checked=false;
			document.getElementById('PeriodSubjectAllocationWeekdaysFRIDAY').checked=false;
			document.getElementById('PeriodSubjectAllocationWeekdaysSATURDAY').checked=false;
		}
		
	} 
	</script>