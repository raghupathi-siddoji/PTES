
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
	  <h1>Examination</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Exam</a></li>
        <li class="active">Create Exam</li>
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
					<div class="col-md-8"><h4>Create Examination</h4></div>
					<div class="col-md-4">
						<?php echo $this->Session->flash(); ?>
						<?php echo $this->Html->link('<i class="btn btn-info btn-sm pull-right">Exam List</i>',
				  array('controller'=>'Exam','action'=>'createExamList'),array('escape'=>false))?>
					</div>
				</div>
			</div>
		
			<div class="box-body">
				<div class="form-group">
		           <?php echo $this->Form->create('CreateExam',array("url"=>array("controller"=>"Exam","action"=>"createExam"))); ?>
						<?php echo $this->Form->input('id',array("text"=>"hidden")); ?>
						
						<div class="row">
							<div class="col-md-6">
							<label>Class <span class="mandatory_fields"> * </span></label>
								<?php echo $this->Form->input('add_class_id',array('type'=>'select','label'=>false,'empty'=>'Select Class','options'=>array($classes),"required","class"=>"form-control select_box")) ?>
							</div>	
							<div class="col-md-6">
								<?php echo $this->Form->input('section_id',array('type'=>'select','options'=>array('select'=>'Select Section',$listSection),"required","class"=>"form-control select_box")) ?>
							</div>
						</div>
						
						<div class="row">
							<div class="col-md-6">
								<label>Academic Year<span class="mandatory_fields"> * </span></label>
								<?php echo $this->Form->input('academic_year_id',array('type'=>'select','label'=>false,'empty'=>'Select academic year','options'=>array($year_list),"required","class"=>"form-control select_box"));?>
							</div>	
							<div class="col-md-6">
							<label>Maximum Marks<span class="mandatory_fields"> * </span></label>
								<?php echo $this->Form->input('max_marks',array('type'=>'text',"required","class"=>"form-control","label"=>false)) ?>							
							</div>
						</div>
						
						<div class="row">
							<div class="col-md-6">
								<label>From Date<span class="mandatory_fields"> * </span></label>
								<?php echo $this->Form->input('from_date',array('type'=>'text','label'=>false,'id'=>'datepicker',"required","class"=>"form-control")) ?>
							</div>	
							<div class="col-md-6">
								<label>To Date<span class="mandatory_fields"> * </span></label>
								<?php echo $this->Form->input('to_date',array('type'=>'text','label'=>false,'id'=>'datepicker1',"required","class"=>"form-control")) ?>							
							</div>
						</div>
						
						<div class="row">
							<div class="col-md-6">
							<label>Type of Exam<span class="mandatory_fields"> * </span></label>
								<?php echo $this->Form->input('exam_type',array('type'=>'text',"required","class"=>"form-control","required","label"=>false)) ?>
							</div>
							<div class="col-md-6">
							<label>Examination Summary</label>
								<?php echo $this->Form->input('exam_summary',array('type'=>'text',"class"=>"form-control","label"=>false)) ?>
							</div>	
						</div>
					
						<br>
						
				<div class="row">
				  <div class="col-md-4"></div>
				    <div class="col-md-4">
						<?php echo $this->Form->submit('Create',array("class"=>"btn btn-info pull-right form-control"));?>
					</div>
				  <div class="col-md-4">
						<?php echo $this->Html->link('<i class="btn btn-warning btn-sm pull-right">Cancel</i>',array('controller'=>'Exam','action'=>'createExamList'),array('escape'=>false))?>
				  </div>
				</div>
				
				   <?php echo $this->Form->end(); ?>
				</div>
			</div>
        </div>
		</div>
		
		<div class="col-md-2"></div>
      </div>
      <!-- row -->
    
	</section>
    <!-- content -->
  </div>
  <!-- content-wrapper -->