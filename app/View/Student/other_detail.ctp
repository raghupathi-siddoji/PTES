 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
	  <h1>Academic</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Academic</a></li>
        <li class="active">Other Detail</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
  
	 <div class="row">
        <!-- left column -->
		
        <div class="col-md-2"></div>
		
		<div class="col-md-8">
         <div class="box box-success">
			<div class="box-header with-border"><h4>Affix Document</h4>
				Student Code :
				<span class="pull-right">Student Name : kruthi</span>
			</div>
		
			<div class="box-body">
				<div class="form-group">
		           <?php echo $this->Form->create('',array("type"=>"file","class" =>"otherDetail","url"=>array("controller"=>"Student","action"=>"otherDetail")));?>
						<?php echo $this->Form->input('id',array("text"=>"hidden")); ?>
						<div class="row">
							<div class="col-md-6">
								<label>Student Photo</label>
								<?php echo $this->Form->input('student_photo',array("type"=>"file","required","label"=>false)); ?>
							</div>
							<div class="col-md-6">
								<label>Documents</label>
								<?php echo $this->Form->input('document',array("type"=>"file","required","label"=>false,"multiple")); ?>
							</div>
						</div>
			
						<br>
						
				<div class="row">
				  <div class="col-md-4"></div>
				    <div class="col-md-4">
						<?php echo $this->Form->submit('Add',array("class"=>"btn btn-info pull-right form-control","onClick"=>"return validate()"));?>
					</div>
				  <div class="col-md-4"></div>
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