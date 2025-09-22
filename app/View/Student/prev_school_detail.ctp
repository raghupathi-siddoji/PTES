 <style>
input[type="text"]
{
	background-color:white;
}
#select
{
	background-color: #ffff99;
}
</style>
 
 
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
				Student Code :  <span class="pull-right">Student Name : kruthi</span>
			</div>
		<?php echo $this->Form->create('',array("url"=>"/Student/otherDetail"));?>
			<div class="box-body">
			
			<div class="row">
				<div class="col-md-12">
					<label>Name of School <span class="mandatory_fields">*</span></label>
					<?php 
						echo $this->Form->input('id',array("type"=>"hidden")); 
						echo $this->Form->input('school_name',array("type"=>"text","class"=>"form-control","required","label"=>false));
					?>
				</div>
			</div>
			
			<div class="row">
				<div class="col-md-6">
					<label>Registration Number</label>
					<?php echo $this->Form->input('reg_num',array("type"=>"text","class"=>"form-control","required","label"=>false));?>
				</div>
				<div class="col-md-6">
					<label>Year of Passing</label>
					<?php echo $this->Form->input('passng_year',array("type"=>"text","class"=>"form-control","required","label"=>false,"placeholder"=>"2016")); ?>
				</div>	
			</div>
			
			<div class="row">
				<div class="col-md-6">
					<label>Medium</label>
					<?php echo $this->Form->input('medium',array('type'=>'select','id'=>'select','options'=>array('select'=>'Select Medium','1'=>'Kannada','2'=>'English'),"class"=>"form-control","required","label"=>false));?>
				</div>
				<div class="col-md-6">
					<label>Marks Secured</label>
					<?php echo $this->Form->input('marks_secured',array("type"=>"text","class"=>"form-control","required","label"=>false)); ?>
				</div>	
			</div>
			
			<div class="row">
				<div class="col-md-12">
					<label>Address of School</label>
					<?php echo $this->Form->input('addr_school',array("type"=>"textarea","class"=>"form-control","required","label"=>false));?>
				</div>
			</div>
			
			<div class="row">
				<div class="col-md-6">
					<label>City</label>
					<?php echo $this->Form->input('city',array("type"=>"text","class"=>"form-control","required","label"=>false));?>
				</div>
				<div class="col-md-6">
					<label>District</label>
					<?php echo $this->Form->input('district',array("type"=>"text","class"=>"form-control","required","label"=>false));?>
				</div>
			</div>
			
			<br>
			<div class="row">
				<div class="col-md-4"></div>
				  <div class="col-md-4">
					<?php echo $this->Form->submit('Submit',array("class"=>"btn btn-info form-control","onClick"=>"return validate()"));?>
				  </div>
				<div class="col-md-4"></div>
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