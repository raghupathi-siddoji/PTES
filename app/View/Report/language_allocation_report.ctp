
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
	  <h1>Academic</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Attendance</a></li>
        <li class="active">Class Wise Attendance</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
  
	<div class="row">
        <!-- left column -->
		<div class="col-md-2"></div>
		<div class="col-md-8">
			<div class="box box-success">  
				<div class="box-body">
					<div class="row">
						<div class="col-md-12">
							<?php echo $this->Form->create('LanguageAllocation',array("url"=>array("controller"=>"Report","action"=>"languageAllocationReport")));?>
							 
							<div class="row">
								 
								<div class="col-md-3"><label>Academic Year<span class="mandatory_fields"> * </span></label>
									<?php echo $this->Form->input('academic_year_id',array('type'=>'select','empty'=>'Select academic year','label'=>false,'options'=>array($academic_year_array),"required","class"=>"form-control select_box"));?>
								</div>	 
					 
								<div class="col-md-3"><label>Class<span class="mandatory_fields"> * </span></label>
									<?php echo $this->Form->input('add_class_id',array('type'=>'select','label'=>false,'empty'=>'Select Class','options'=>array($clas_name),"required","class"=>"form-control select_box")) ?>
								</div> 
								<div class="col-md-3"><label>Langauge<span class="mandatory_fields"> * </span></label>
									<?php echo $this->Form->input('add_class_id',array('type'=>'select','label'=>false,'empty'=>'Select Class','options'=>array($listLanguage),"required","class"=>"form-control select_box")) ?>
								</div> 
								
								<div class="col-sm-3"><br><?php echo $this->Form->submit('Show',array("class"=>"btn btn-info","name"=>"show_btn"));?></div>
					 
							</div>
						</div>
						<!-------------------------------------------------------------------------------------->
					</div>
				</div>
			</div>				
				   <?php echo $this->Form->end(); ?> 
		</div>
		<!-------------------------------------------------------------------------->
		<div class="col-md-3"></div>
	  
	</div>
      <!-- row -->
	  <?php if(isset($_POST['show_btn'])!='') {?>
		<!-- ROW -->
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<div class="box box-success">  
					<div class="box-body">
						 
					</div>
				</div>
			</div>
		</div>
		<!-- ROW -->
	<?php } ?>	
		
	</section>
    <!-- content -->
  </div>
  <!-- content-wrapper -->