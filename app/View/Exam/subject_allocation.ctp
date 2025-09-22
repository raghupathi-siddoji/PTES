
 
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
	  <h1>Examination</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Exam</a></li>
        <li class="active">Subject Allocation</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
  
	 <div class="row">
        <!-- left column -->
		
        <div class="col-md-1"></div>
		
		<div class="col-md-10">
         <div class="box box-success">
			<div class="box-header with-border">
				<div class="row">
					<div class="col-md-8"><h4>Subject Allocation</h4></div>
					<div class="col-md-4">
						<?php echo $this->Session->flash(); ?>
						<?php echo $this->Html->link('<i class="btn btn-info btn-sm pull-right">Subject Allocation List</i>',
						array('controller'=>'Exam','action'=>'subjectAllocationList'),array('escape'=>false))?>
					</div>
				</div>
			</div>
			
			<div class="box-body">
				<div class="form-group">
		           <?php echo $this->Form->create('SubjectAllocation',array("url"=>array("controller"=>"Exam","action"=>"subjectAllocation")));?>
						<?php echo $this->Form->input('id',array("text"=>"hidden")); ?>
						
						<div class="box-header with-border">
						<div class="row">
							<div class="col-md-6">
							<label>Class<span class="mandatory_fields"> * </span></label>
								<?php echo $this->Form->input('add_class_id',array('type'=>'select','label'=>false,'empty'=>'Select Class','options'=>array($classes),"required","class"=>"form-control select_box")) ?>
							</div>	
							<div class="col-md-6">
							<label>Academic Year<span class="mandatory_fields"> * </span></label>
						<?php echo $this->Form->input('academic_year_id',array('type'=>'select','label'=>false,'empty'=>'Select academic year','options'=>array($year_list),"required","class"=>"form-control select_box"));?>
							</div>
						</div>
						</div>
						
						<div class="row">
							<div class="col-md-3"><label>Subject Name</label></div>
							<div class="col-md-3"><label>Subject Code</label></div>
							<div class="col-md-3"><label>Subject Name</label></div>
							<div class="col-md-3"><label>Subject Code</label></div>
						</div>
						
						<div class="row">
							<div class="col-md-3">
								<?php echo $this->Form->input('sub1',array('type'=>'text',"class"=>"form-control","label"=>false,"placeholder"=>"1")); ?>
							</div>	
							<div class="col-md-3">
								<?php echo $this->Form->input('subcode1',array('type'=>'text',"class"=>"form-control","label"=>false,"maxlength"=>"3","minlength"=>"3","placeholder"=>"KAN , ENG , HIN")); ?>							
							</div>
							<div class="col-md-3">
								<?php echo $this->Form->input('sub2',array('type'=>'text',"class"=>"form-control","label"=>false,"placeholder"=>"2")); ?>							
							</div>
							<div class="col-md-3">
								<?php echo $this->Form->input('subcode2',array('type'=>'text',"class"=>"form-control","label"=>false,"maxlength"=>"3","minlength"=>"3","placeholder"=>"KAN , ENG , HIN")); ?>							
							</div>
						</div>
								<br>						
						<div class="row">
							<div class="col-md-3">
								<?php echo $this->Form->input('sub3',array('type'=>'text',"class"=>"form-control","label"=>false,"placeholder"=>"3")); ?>
							</div>	
							<div class="col-md-3">
								<?php echo $this->Form->input('subcode3',array('type'=>'text',"class"=>"form-control","label"=>false,"maxlength"=>"3","minlength"=>"3","placeholder"=>"KAN , ENG , HIN")); ?>							
							</div>
							<div class="col-md-3">
								<?php echo $this->Form->input('sub4',array('type'=>'text',"class"=>"form-control","label"=>false,"placeholder"=>"4")); ?>							
							</div>
							<div class="col-md-3">
								<?php echo $this->Form->input('subcode4',array('type'=>'text',"class"=>"form-control","label"=>false,"maxlength"=>"3","minlength"=>"3","placeholder"=>"KAN , ENG , HIN")); ?>							
							</div>
						</div>
								<br>						
						<div class="row">
							<div class="col-md-3">
								<?php echo $this->Form->input('sub5',array('type'=>'text',"class"=>"form-control","label"=>false,"placeholder"=>"5")); ?>
							</div>	
							<div class="col-md-3">
								<?php echo $this->Form->input('subcode5',array('type'=>'text',"class"=>"form-control","label"=>false,"maxlength"=>"3","minlength"=>"3","placeholder"=>"KAN , ENG , HIN")); ?>							
							</div>
							<div class="col-md-3">
								<?php echo $this->Form->input('sub6',array('type'=>'text',"class"=>"form-control","label"=>false,"placeholder"=>"6")); ?>							
							</div>
							<div class="col-md-3">
								<?php echo $this->Form->input('subcode6',array('type'=>'text',"class"=>"form-control","label"=>false,"maxlength"=>"3","minlength"=>"3","placeholder"=>"KAN , ENG , HIN")); ?>							
							</div>
						</div>
								<br>						
						<div class="row">
							<div class="col-md-3">
								<?php echo $this->Form->input('sub7',array('type'=>'text',"class"=>"form-control","label"=>false,"placeholder"=>"7")); ?>
							</div>	
							<div class="col-md-3">
								<?php echo $this->Form->input('subcode7',array('type'=>'text',"class"=>"form-control","label"=>false,"maxlength"=>"3","minlength"=>"3","placeholder"=>"KAN , ENG , HIN")); ?>							
							</div>
							<div class="col-md-3">
								<?php echo $this->Form->input('sub8',array('type'=>'text',"class"=>"form-control","label"=>false,"placeholder"=>"8")); ?>							
							</div>
							<div class="col-md-3">
								<?php echo $this->Form->input('subcode8',array('type'=>'text',"class"=>"form-control","label"=>false,"maxlength"=>"3","minlength"=>"3","placeholder"=>"KAN , ENG , HIN")); ?>							
							</div>
						</div>
								<br>						
						<div class="row">
							<div class="col-md-3">
								<?php echo $this->Form->input('sub9',array('type'=>'text',"class"=>"form-control","label"=>false,"placeholder"=>"9")); ?>
							</div>	
							<div class="col-md-3">
								<?php echo $this->Form->input('subcode9',array('type'=>'text',"class"=>"form-control","label"=>false,"maxlength"=>"3","minlength"=>"3","placeholder"=>"KAN , ENG , HIN")); ?>							
							</div>
							<div class="col-md-3">
								<?php echo $this->Form->input('sub10',array('type'=>'text',"class"=>"form-control","label"=>false,"placeholder"=>"10")); ?>							
							</div>
							<div class="col-md-3">
								<?php echo $this->Form->input('subcode10',array('type'=>'text',"class"=>"form-control","label"=>false,"maxlength"=>"3","minlength"=>"3","placeholder"=>"KAN , ENG , HIN")); ?>							
							</div>
						</div>

								<br>
						
						<div class="row">
							<div class="col-md-4"></div>
								<div class="col-md-4">
									<?php echo $this->Form->submit('Add',array("class"=>"btn btn-info pull-right form-control","onClick"=>"return validate()"));?>
								</div>
							<div class="col-md-4">
								<?php echo $this->Html->link('<i class="btn btn-warning btn-sm pull-right">Cancel</i>',
								array('controller'=>'Exam','action'=>'subjectAllocationList'),array('escape'=>false))?>
							</div>
						</div>
				
				   <?php echo $this->Form->end(); ?>
				</div>
			</div>
		</div>
	
        </div>
		
		<div class="col-md-1"></div>
		
      </div>
      <!-- row -->
    
	</section>
    <!-- content -->
  </div>
  <!-- content-wrapper -->