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
         <li class="active">Month Wise Report</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
           
          <!------------"BOOK RETURN" created: 20 aug 2016 ----------->
			
			 <div class="row">
			 <div class="col-md-1"></div>
				<div class="col-md-10">
				  <div class="box box-success">
					<br>
					<div class="box-header with-border">
					  <h3 class="box-title">Month Wise Report</h3>
					</div>
					  <div class="box-body">
						<div class="form-group">
			<?php echo $this->Form->create('BookIssue',array("url"=>array("controller"=>"LibraryManagement","action"=>"monthWiseBooksIssued")));?>
				<div class="form-group">
							 <div class="row">
									<div class="col-sm-4">
										<label>From Date<span class="mandatory_fields"> * </span></label>
										<?php echo $this->Form->input('from_date',array("type"=>"text","id"=>"datepicker1","label"=>false,"class"=>"form-control","required"));?>
									</div>
								<div class="col-sm-4">
									<label>To Date<span class="mandatory_fields"> * </span></label>
									<?php echo $this->Form->input('to_date',array("type"=>"text","id"=>"datepicker","label"=>false,"class"=>"form-control","required"));?>		
								</div>
								<div class="col-sm-4"><label></label><?php echo $this->Form->submit('Get Detail',array("class"=>"btn btn-info pull-center"));?></div>
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
				
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
	</div> <!-- wrapper -->