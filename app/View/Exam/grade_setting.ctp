
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
	  <h1>Examination</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Exam</a></li>
        <li class="active">Grade Setting</li>
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
				<div class="row">
					<div class="col-md-8"><h4>Grade Setting</h4></div>
					<div class="col-md-4">
						<?php echo $this->Session->flash(); ?>
						 <?php echo $this->Html->link('<i class="btn btn-info btn-sm pull-right">Grade Setting List</i>',
				  array('controller'=>'Exam','action'=>'GradeSettingList'),array('escape'=>false))?>
					</div>
				</div>
			</div>
			<?php echo $this->Form->create('GradeSetting',array("url"=>"/Exam/gradeSetting"));?>
			<div class="box-body">
			<div class="row">
				<div class="col-md-4"></div>
				<div class="col-md-4">
					<label>Maximum Marks<span class="mandatory_fields"> * </span></label>
					<?php 
						echo $this->Form->input('id',array("type"=>"hidden")); 
						echo $this->Form->input('max_marks',array('type'=>'type',"required","class"=>"form-control","label"=>false));
					?>
				</div>
				<div class="col-md-4"></div>
			</div>	
			
				<div class="row">
					<div class="col-md-4"><label>From Marks<span class="mandatory_fields"> * </span></label></div>
					<div class="col-md-4"><label>To Marks<span class="mandatory_fields"> * </span></label></div>
					<div class="col-md-4"><label>Grade<span class="mandatory_fields"> * </span></label></div>
				</div>	
				<div class="form-group">
				<div class="row">
					<div class="col-md-4">
						<?php echo $this->Form->input('from_marksA+',array('type'=>'text',"required","class"=>"form-control","label"=>false)); ?>
					</div>	
					<div class="col-md-4">
						<?php echo $this->Form->input('to_marksA+',array('type'=>'text',"required","class"=>"form-control","label"=>false)); ?>							
					</div>
					<div class="col-md-4">
						<?php echo $this->Form->input('gradeA+',array('type'=>'text',"required","class"=>"form-control","label"=>false,"value"=>"A+")); ?>							
					</div>
				</div>
				</div>
				
				<div class="form-group">
				<div class="row">
					<div class="col-md-4">
						<?php echo $this->Form->input('from_marksA',array('type'=>'text',"required","class"=>"form-control","label"=>false)); ?>
					</div>	
					<div class="col-md-4">
						<?php echo $this->Form->input('to_marksA',array('type'=>'text',"required","class"=>"form-control","label"=>false)); ?>							
					</div>
					<div class="col-md-4">
						<?php echo $this->Form->input('gradeA',array('type'=>'text',"required","class"=>"form-control","label"=>false,"value"=>"A")); ?>							
					</div>
				</div>
				</div>
				
				<div class="form-group">
				<div class="row">
					<div class="col-md-4">
						<?php echo $this->Form->input('from_marksB+',array('type'=>'text',"required","class"=>"form-control","label"=>false)); ?>
					</div>	
					<div class="col-md-4">
						<?php echo $this->Form->input('to_marksB+',array('type'=>'text',"required","class"=>"form-control","label"=>false)); ?>							
					</div>
					<div class="col-md-4">
						<?php echo $this->Form->input('gradeB+',array('type'=>'text',"required","class"=>"form-control","label"=>false,"value"=>"B+")); ?>							
					</div>
				</div>
				</div>
				
				<div class="form-group">
				<div class="row">
					<div class="col-md-4">
						<?php echo $this->Form->input('from_marksB',array('type'=>'text',"required","class"=>"form-control","label"=>false)); ?>
					</div>	
					<div class="col-md-4">
						<?php echo $this->Form->input('to_marksB',array('type'=>'text',"required","class"=>"form-control","label"=>false)); ?>							
					</div>
					<div class="col-md-4">
						<?php echo $this->Form->input('gradeB',array('type'=>'text',"required","class"=>"form-control","label"=>false,"value"=>"B")); ?>							
					</div>
				</div>
				</div>
				
				<div class="form-group">
				<div class="row">
					<div class="col-md-4">
						<?php echo $this->Form->input('from_marksC',array('type'=>'text',"required","class"=>"form-control","label"=>false)); ?>
					</div>	
					<div class="col-md-4">
						<?php echo $this->Form->input('to_marksC',array('type'=>'text',"required","class"=>"form-control","label"=>false)); ?>							
					</div>
					<div class="col-md-4">
						<?php echo $this->Form->input('gradeC',array('type'=>'text',"required","class"=>"form-control","label"=>false,"value"=>"C")); ?>							
					</div>
				</div>
				</div>
				
				<div class="form-group">
				<div class="row">
					<div class="col-md-4"></div>
						<div class="col-md-4">
							<?php echo $this->Form->submit('Submit',array("class"=>"btn btn-info form-control"));?>
						</div>
					<div class="col-md-4">
						<?php echo $this->Html->link('<i class="btn btn-warning btn-sm pull-right">Cancel</i>',
						array('controller'=>'Exam','action'=>'gradeSettingList'),array('escape'=>false))?>
					</div>
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
function check_grade(val){
 var element=document.getElementById('grade_check');
 if(val!='Select Class')
   element.style.display='inline';
 else  
   element.style.display='none';
}

</script> 