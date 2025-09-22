 <div class="wrapper"> 
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Library Management
          </h1>
          <ol class="breadcrumb">
             <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
              <li><a href="#">Library Management</a></li>
         <li class="active">Class Wise Report</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
           
          <!------------"BOOK RETURN" created: 20 aug 2016 ----------->
			
			 <div class="row">
			 <div class="col-md-1"></div>
				<div class="col-md-10">
				  <div class="box box-success">
					<div class="box-header with-border">
					  <h3 class="box-title">Class Wise Report</h3>
					</div>
					  <div class="box-body">
						<div class="form-group">
			<?php echo $this->Form->create('BookIssue',array("url"=>array("controller"=>"LibraryManagement","action"=>"classWiseBooksIssued")));?>
						   <div class="row">
								<div class="col-md-2"></div>
								<div class="col-md-4">
									<label>Academic Year<span class="mandatory_fields"> * </span></label>
									<?php echo $this->Form->input('academic_year_id',array('type'=>'select','label'=>false,'options'=>array($year_list),"required","class"=>"form-control select_box",'empty'=>'Select Academic Year')) ?>
								</div>
						  		<div class="col-md-4">
									<label>Class<span class="mandatory_fields"> * </span></label>
									<?php 
									echo $this->Form->input('id',array("type"=>"hidden")); 
									echo $this->Form->input('add_class_id',array("type"=>"select","options"=>array($classes),"class"=>"form-control select_box","required","label"=>false,'empty'=>'Select Class'));?>
								</div>
								
							</div>
						</div>
							
						<div class="form-group">
							 <div class="row">
								<div class="col-md-2"></div>
									<div class="col-sm-4">
									<?php echo $this->Form->input('from_date',array("type"=>"text","id"=>"datepicker1","class"=>"form-control","label"=>false));?>
									</div>
								<div class="col-sm-4">
									<?php echo $this->Form->input('to_date',array("type"=>"text","id"=>"datepicker","class"=>"form-control","label"=>false));?>		
								</div>
							</div>
						</div>
						
						<div class="form-group">
							<div class="row">
							<div class="col-md-4"></div>
								<div class="col-md-4">
									<?php echo $this->Form->submit('Show',array("class"=>"btn btn-info"));?>
								</div>
						  </div>
						   
						</div>
					  </div>
					
					<?php echo $this->Form->end();?>
					<!---- form end ------>
				</div>
				<?php echo $this->Session->flash(); ?>
				</div>
				<div class="col-md-1"></div>
				</div>
				
        <!-- left column -->
				
				
				
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
	</div> <!-- wrapper -->