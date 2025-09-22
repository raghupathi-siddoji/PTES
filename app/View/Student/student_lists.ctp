
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
			<div class="box-header with-border">
			<div class="row">
				<div class="col-sm-4"><h4>Student List</h4></div>
					<div class="col-sm-6"><?php echo $this->Session->flash(); ?></div>
				</div>
			</div>
			
			<div class="box-body">
			<div class="row">
			<div class="col-md-12">
				<?php echo $this->Form->create('StudentDetail',array("url"=>array("controller"=>"Student","action"=>"studentList")));?>
						<?php echo $this->Form->input('id',array("text"=>"hidden")); ?>
											
						<div class="row">
							<div class="col-md-3"></div>
							<div class="col-md-6"><label>Academic Year<span class="mandatory_fields"> * </span></label>
						<?php echo $this->Form->input('academic_year_id',array('type'=>'select','label'=>false,'empty'=>'Select academic year','options'=>array($year_list),"required","class"=>"form-control select_box","required"));?>
							</div>	
							<div class="col-md-3"></div>
						</div>
				
				<div class="form-group">
						<div class="row"> 
							<div class="col-md-3"></div>
							<div class="col-md-6">
								<?php echo $this->Form->input('add_class_id',array('type'=>'select','label'=>'Class','options'=>array('select'=>'Select Class',$classes),"class"=>"form-control select_box")) ?>
							</div>
							<div class="col-md-3"></div>
						</div>
					</div>
						
		
         <div class="form-group">
			<div class="row">
				<div class="col-md-4"></div>
				<div class="col-sm-2"><?php echo $this->Form->submit('Show',array("class"=>"btn btn-info"));?></div>
				<div class="col-md-4">
					<?php echo $this->Html->link('<i class="btn btn-warning">Student Admission</i>', array("controller"=>"Student","action"=>"studentAdmission"),array("escape"=>false)); ?>			
			</div>
		</div>
	  <!-------------------------------------------------------------------------------------->
      </div>
    </div>
  </div>				
				   <?php echo $this->Form->end(); ?>
				</div>
			</div>
        </div>
		</div>
	<!-------------------------------------------------------------------------->
		<div class="col-md-3"></div>
	  
	  </div>
      <!-- row -->
    
	</section>
    <!-- content -->
  </div>
  <!-- content-wrapper -->