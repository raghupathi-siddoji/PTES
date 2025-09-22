 
 
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
	  <h1>Examination</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Exam</a></li>
        <li class="active">Marks Entry</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
  
	 <div class="row">
        <!-- left column -->
		
        <div class="col-md-2"></div>
		
		<div class="col-md-8">
         <div class="box box-success">
			<div class="box-header with-border"><h4>Class Wise Grade List</h4></div>
		
			<div class="box-body">
				<div class="form-group">
		           <?php echo $this->Form->create('MarksEntry',array("url"=>array("controller"=>"Exam","action"=>"classWiseGradeList")));?>
						<?php echo $this->Form->input('id',array("text"=>"hidden")); ?>
						
						<div class="row">
							<div class="col-md-6"><label>Class<span class="mandatory_fields"> * </span></label>
								<?php echo $this->Form->input('add_class_id',array('type'=>'select','label'=>false,'empty'=>'Select Class','options'=>array($classes),"required","class"=>"form-control select_box")) ?>
							</div>	
							<div class="col-md-6">
								<?php echo $this->Form->input('section_id',array('type'=>'select','options'=>array('select'=>'Select Section',$listSection),"required","class"=>"form-control select_box")) ?>
							</div>
						</div>
					</div>
						
					<div class="form-group">
						<div class="row">
							<div class="col-md-6">
							<label>Type of Exam<span class="mandatory_fields"> * </span></label>
								<?php echo $this->Form->input('exam_type',array('type'=>'select','label'=>false,'empty'=>'Select Exam Type','options'=>array($exams),"required","class"=>"form-control select_box")) ?>
							</div>	
							<div class="col-md-6"><label>Academic Year<span class="mandatory_fields"> * </span></label>
						<?php echo $this->Form->input('academic_year_id',array('type'=>'select','label'=>false,'empty'=>'Select academic year','options'=>array($year_list),"required","class"=>"form-control select_box"));?>
							</div>
						</div>
					</div>
			
				<div class="form-group">
				<div class="row">
				  <div class="col-md-4"></div>
				    <div class="col-md-4">
						<?php echo $this->Form->submit('Show Grade List',array("class"=>"btn btn-info pull-right form-control"));?>
					</div>
				  <div class="col-md-4"></div>
				</div>
				</div>
				
				<div class="row">
					<div class="col-md-2"></div>
					<div class="col-md-8"><?php echo $this->Session->flash(); ?></div>
					<div class="col-md-2"></div>
				</div>
				
			   <?php echo $this->Form->end(); ?>
			 </div>
			</div>
		 </div>
		
		<div class="col-md-2"></div>
		
      </div>
      <!-- row -->
<!------------------------------------------------------------------------------------------------------->
	 
	</section>
    <!-- content -->
  </div>
  <!-- content-wrapper -->