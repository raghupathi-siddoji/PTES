 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
	  <h1>Academic</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Academic</a></li>
        <li class="active">Student Admission</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
     
  <!------------"Application Form Entry" created: 20 aug 2016 ----------->
  
	 <div class="row">
        <!-- left column -->
		
        <div class="col-md-3"></div>
		
		<div class="col-md-6">
         <div class="box box-success">
			<div class="box-header with-border">Student Admission </div>
		
			<div class="box-body">
				 <?php echo $this->Form->create('StudentApplication',array("url"=>array("controller"=>"Student","action"=>"studentAdmission")));?>
				 <div class="row">
						<div class="col-sm-5"><label>Application Number <span class="mandatory_fields">*</span></label></div>
						<div class="col-sm-7">
						<?php 
							echo $this->Form->input('id',array("type"=>"hidden")); 
							echo $this->Form->input('application_no',array("type"=>"text","class"=>"form-control","required","label"=>false,"autocomplete"=>"off"));?>
						</div>
				</div>
				<br>
				<div class="form-group">
					<div class="row">
						<div class="col-sm-4"></div>
						<div class="col-sm-4"><?php echo $this->Form->submit('Submit',array("class"=>"btn btn-info"));?></div>
						<div class="col-sm-4"></div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-1"></div>
					<div class="col-sm-10"><?php echo $this->Session->flash(); ?></div>
					<div class="col-sm-1"></div>
				</div>
			</div>
		 </div>
	
        </div>
		
		<div class="col-md-3"></div>
		
      </div>
      <!-- row -->
    
	</section>
    <!-- content -->
  </div>
  <!-- content-wrapper -->