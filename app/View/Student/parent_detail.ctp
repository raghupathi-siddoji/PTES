
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
	  <h1>Academic</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Academic</a></li>
        <li class="active">Parent Details</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
 <!------------"Parent/Guardian Details" created: 23 aug 2016 ----------->
	  <div class="row">
        <!-- left column -->
		
        <div class="col-md-1"></div>
		
		<div class="col-md-10">
         <div class="box box-success">
			<div class="box-header with-border">
			 <?php echo $this->Form->create('ParentDetail',array("type"=>"file","class"=>"parentDetail","url"=>array("controller"=>"Student", "action"=>"parentDetail")));?>
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
				<div class="col-md-4">
					<label>Father Name <span class="mandatory_fields">*</span></label>
					<?php 
						echo $this->Form->input('father_name',array("type"=>"text","class"=>"form-control","required","label"=>false));
					?>
				</div>
				<div class="col-md-4">
				<label>Mother Name <span class="mandatory_fields">*</span></label>
				   <?php echo $this->Form->input('mother_name',array("type"=>"text","required","label"=>false,"class"=>"form-control")) ?>
				</div>
				<div class="col-md-4">
				<label>Guardian Name (If any)</label>
				   <?php echo $this->Form->input('guardian',array("type"=>"text","class"=>"form-control","label"=>false)) ?>
				</div>
				
			</div>
			
			<div class="row">
				<div class="col-md-4">
					<label>Father Qualification <span class="mandatory_fields">*</span></label>
					<?php echo $this->Form->input('father_qualification',array("type"=>"text","class"=>"form-control","required","label"=>false));
					?>
				</div>		
				<div class="col-md-4">
				  <label>Mother Qualification <span class="mandatory_fields">*</span></label>
				  <?php echo $this->Form->input('mother_qualification',array("type"=>"text","required","label"=>false,"class"=>"form-control"));?>
				</div>	
					<div class="col-md-4">
				<label>Guardian Qualification</label>
				  <?php echo $this->Form->input('guardian_qualification',array("type"=>"text","class"=>"form-control","label"=>false));?>
				</div>	
			</div>
			
			<div class="row">
				<div class="col-md-4">
					<label>Father Occupation <span class="mandatory_fields">*</span></label>
					<?php echo $this->Form->input('father_job',array("type"=>"text","class"=>"form-control","required","label"=>false));?>
				</div>		
				<div class="col-md-4">
				  <label>Mother Occupation</label>
				  <?php echo $this->Form->input('mother_job',array("type"=>"text","label"=>false,"class"=>"form-control"));?>
				</div>	
					<div class="col-md-4">
				<label>Guardian Occupation</label>
				  <?php echo $this->Form->input('guardian_job',array("type"=>"text","class"=>"form-control","label"=>false));?>
				</div>	
			</div>
			
			<div class="row">
				<div class="col-md-4">
					<label>Annual Income : Parent/Guardian <span class="mandatory_fields">*</span></label>
				   <?php echo $this->Form->input('annual_income',array("type"=>"text","class"=>"form-control","required","label"=>false,"onkeypress"=>"return isNumber(event)"));?>
				</div>		
				<div class="col-md-4">
				  <label>Mobile Number : Parent/Guardian <span class="mandatory_fields">*</span></label>
				  <?php echo $this->Form->input('mobile_no',array("type"=>"text","label"=>false,"required","class"=>"form-control","onkeypress"=>"return isNumber(event)","minlength"=>"10","maxlength"=>"10","placeholder"=>"Ex : 9845098450"
));?>
				</div>	
					<div class="col-md-4">
				<label>Mail Id : Parent/Guardian</label>
				  <?php echo $this->Form->input('mail',array("type"=>"text","class"=>"form-control","label"=>false));?>
				</div>	
			</div>
			
			<div class="form-group">
			<div class="row">
				<div class="col-md-3">
					<br><label>Brother/Sister Studying in PTES </label><br>
					<?php $options=array("yes"=>" YES ","no"=>" NO ");
					echo $this->Form->radio('other_ptes_student',$options,array("legend"=>false,"value"=>"no","required","label"=>false,'onchange'=>'return checkstud(this.value);'));?>	
				</div>
			<div id="stud_check" style="display:none;">	
				<div class="col-md-8">
				<div class="form-group">
					<div class="row">
						<div class="col-md-3">
							<label>1.Student Name</label>
							<?php echo $this->Form->input('student_name_one',array("type"=>"text","class"=>"form-control","label"=>false));?>
							<label>class</label>
							<?php echo $this->Form->input('class_one',array('type'=>'select','options'=>array('select'=>'Select Class',$classes),"class"=>"form-control select_box","label"=>false));?>
						</div>
						<div class="col-md-3">
							<label>2.Student Name</label>
							<?php echo $this->Form->input('student_name_two',array("type"=>"text","class"=>"form-control","label"=>false));?>
							<label>class</label>
							<?php echo $this->Form->input('class_two',array('type'=>'select','options'=>array('select'=>'Select Class',$classes),"class"=>"form-control select_box","label"=>false));?>
						</div>
						<div class="col-md-3">
							<label>3.Student Name</label>
							<?php echo $this->Form->input('student_name_three',array("type"=>"text","class"=>"form-control","label"=>false));?>
							<label>class</label>
							<?php echo $this->Form->input('class_three',array('type'=>'select','options'=>array('select'=>'Select Class',$classes),"class"=>"form-control select_box","label"=>false));?>
						</div> 
						<div class="col-md-3">
							<label>4.Student Name</label>
							<?php echo $this->Form->input('student_name_four',array("type"=>"text","class"=>"form-control","label"=>false));?>
							<label>class</label>
							<?php echo $this->Form->input('class_four',array('type'=>'select','options'=>array('select'=>'Select Class',$classes),"class"=>"form-control select_box","label"=>false));?>
						</div>
					</div>
				</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4">
					<label>Student Photo</label>
					<?php echo $this->Form->input('student_photo',array("type"=>"file","label"=>false,"value"=>$old_photo_name)); ?>
					<?php if(empty($old_photo_name))
							echo $this->Form->input('previous_photo',array("type"=>"hidden","label"=>false,"value"=>$old_photo_name)); 
						else
							echo $this->Form->input('previous_photo',array("type"=>"text","class"=>"form-control","readonly","label"=>false,"value"=>$old_photo_name)); ?>
				</div>
		</div>
	<div class="row">
		<div class="col-md-4"></div>
			<div class="col-md-4">
			<?php echo $this->Form->submit('Submit',array("class"=>"btn btn-info form-control","onClick"=>"return validate()"));?>
			</div>
		<div class="col-md-4">
			<?php echo $this->Html->link('<i class="btn btn-warning btn-sm pull-right">Cancel</i>',
			array('controller'=>'Student','action'=>'parentList'),array('escape'=>false))?>
		</div>
	</div>
			
			</div>	
				<?php echo $this->Form->end(); ?> 
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
  
  <script type="text/javascript">

function checkstud(val){
 var element=document.getElementById('stud_check');
 if(val=='yes')
   element.style.display='inline';
 else  
   element.style.display='none';
}

</script> 