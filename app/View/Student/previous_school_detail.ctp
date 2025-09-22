 
 
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
	  <h1>Academic</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Academic</a></li>
        <li class="active">Previous School Details</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
     
  <!------------"Previous School Details entry" created: 23 aug 2016 ----------->
 
	 <div class="row">
        
	<div class="col-md-2"></div>	
		<div class="col-md-8">
         <div class="box box-success">
			<div class="box-header with-border">
		      <?php echo $this->Form->create('PreviousSchoolDetail',array("type"=>"file","class" =>"previousSchoolDetail","url"=>array("controller"=>"Student","action"=>"previousSchoolDetail")));?>
			  <div style="color:#00C0EF">
			<?php 
				$studentid=$this->Session->read('StudentId'); 
				$student_name=$this->Session->read('StudentName'); 
				$student_code=$this->Session->read('StudentCode'); 
				echo $this->Form->input('id',array("type"=>"hidden")); 
						
				if(!empty($get_student_id)) 			
				{
					echo "Student Name : ".$get_student_name;
					echo "<br>Student Code : ".$get_student_code;
					echo $this->Form->input('student_detail_id',array("type"=>"hidden","value"=>$get_student_id)); 
				}
				else
				{
					echo "Student Name : ".$student_name;
					echo "<br>Student Code : ".$student_code;
					echo $this->Form->input('student_detail_id',array("type"=>"hidden","value"=>$studentid)); 
				} ?>
				</div>
				<span class="pull-right"><?php echo $this->Session->flash(); ?></span>
			</div>
			<div class="box-body">
			
			<div class="row">
				<div class="col-md-12">
					<label>Name of School <span class="mandatory_fields">*</span></label>
					<?php echo $this->Form->input('school_name',array("type"=>"text","class"=>"form-control","required","label"=>false)); ?>
				</div>
			</div>
			
			<div class="row">
				<div class="col-md-6">
					<label>Registration Number <span class="mandatory_fields">*</span></label>
					<?php echo $this->Form->input('register_number',array("type"=>"text","class"=>"form-control","required","label"=>false));?>
				</div>
				<div class="col-md-6">
					<label>Year of Passing <span class="mandatory_fields">*</span></label>
					<?php echo $this->Form->input('passing_year',array("type"=>"text","class"=>"form-control","required","label"=>false,"placeholder"=>"Ex: 2016","onkeypress"=>"return isNumber(event)","minlength"=>"4","maxlength"=>"4")); ?>
				</div>	
			</div>
			
			<div class="row">
				<div class="col-md-6">
					<label>Medium <span class="mandatory_fields">*</span></label>
					<?php echo $this->Form->input('medium',array('type'=>'select','options'=>array('Kannada'=>'Kannada','English'=>'English'),"class"=>"form-control select_box","required","label"=>false,'empty'=>'Select Medium'));?>
				</div>
				<div class="col-md-6">
					<label>Marks Secured <span class="mandatory_fields">*</span></label>
					<?php echo $this->Form->input('marks_secured',array("type"=>"text","class"=>"form-control","required","label"=>false,"onkeypress"=>"return isNumber(event)","maxlength"=>"3")); ?>
				</div>	
			</div>
			
			<div class="row">
				<div class="col-md-12">
					<label>Address of School <span class="mandatory_fields">*</span></label>
					<?php echo $this->Form->input('addr_school',array("type"=>"textarea","class"=>"form-control","required","label"=>false));?>
				</div>
			</div>
			
			<div class="form-group">
			<div class="row">
				<div class="col-md-6">
					<label>City <span class="mandatory_fields">*</span></label>
					<?php echo $this->Form->input('city',array("type"=>"text","class"=>"form-control","required","label"=>false));?>
				</div>
				<div class="col-md-6">
					<label>District <span class="mandatory_fields">*</span></label>
					<?php echo $this->Form->input('district',array("type"=>"text","class"=>"form-control","required","label"=>false));?>
				</div>
			</div>
			</div>
			
			<div class="form-group">
			<div class="row">
				<div class="col-md-4">
					
							<label>Documents</label>
							<?php echo $this->Form->input('document.',array("type"=>"file","label"=>false,"multiple",'title'=>false)); ?>
						
						<?php if(!empty($old_documents)) 
								echo $this->Form->input('old_doc',array("type"=>"text","readonly","label"=>false,"value"=>$old_documents,"class"=>"form-control"));
						  else
								echo $this->Form->input('old_doc',array("type"=>"hidden","readonly","label"=>false,"value"=>$old_documents));?>
						
				</div>
			</div>
			</div>

			<div class="row">
				<div class="col-md-4"></div>
				  <div class="col-md-4">
					<?php echo $this->Form->submit('Submit',array("class"=>"btn btn-info form-control","onClick"=>"return validate()"));?>
				  </div>
				<div class="col-md-4">
					<?php echo $this->Html->link('<i class="btn btn-warning btn-sm pull-right">Cancel</i>',
					array('controller'=>'Student','action'=>'previousSchoolList'),array('escape'=>false))?>
				</div>
			</div>
			
			</div>	
				<?php echo $this->Form->end(); ?> 
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