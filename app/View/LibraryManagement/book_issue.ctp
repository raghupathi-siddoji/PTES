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
         <li class="active">Book Issue</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
           
          <!------------"BOOK ISSUE" created: 20 aug 2016 ----------->
		  
			 <div class="row">
			
				<div class="col-md-1"></div>
				<div class="col-md-10">
				  <div class="box box-success">
				<br>
					<div class="box-header with-border">
					  <h3 class="box-title">Book Issue</h3>
					</div>
					<!-- form start -->
				   <?php echo $this->Form->create('BookIssue',array("url"=>array("controller"=>"LibraryManagement","action"=>"issueBooks"))); ?>
				   
					  <div class="box-body">
						<div class="form-group">
							<div class="row">
								<div class="col-sm-6"><label>Book Name</label>
									<?php 
									echo $this->Form->input('id',array("type"=>"hidden")); 
									echo $this->Form->input('title',array("type"=>"text","class"=>"form-control","label"=>false));?>
								</div>
							
								<div class="col-sm-6">
									<?php echo $this->Form->input('book_category_id',array('type'=>'select','options'=>array('Select Category'=>'Select Category',$categories),"class"=>"form-control select_box")) ?>	
								</div>
							</div>
							<br>
							<div class="row">
								<div class="col-sm-6">
							  	<?php echo $this->Form->input('book_author_id',array('type'=>'select','options'=>array('Select Author'=>'Select Author',$authors),"class"=>"form-control select_box")) ?>	</div>
							<div class="col-sm-6">
							  	<?php echo $this->Form->input('book_publisher_id',array('type'=>'select','options'=>array('Select Publisher'=>'Select Publisher',$publishers),"class"=>"form-control select_box")) ?>	</div>
							</div>
							
							<br>
							<div class="row">
								<div class="col-sm-4"></div>
								<div class="col-sm-4"><?php echo $this->Form->submit('Show',array("class"=>"btn btn-info form-control"));?></div>
								<div class="col-sm-4"></div>
						   </div>
						</div>
						<?php echo $this->session->flash(); ?>
						
					  </div>
					  <div class="col-md-1"></div>
					  <?php echo $this->Form->end(); ?>
					<!---- form end ------>
		
				</div>
				</div>
				</div>
				
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
	</div> <!-- wrapper -->
	
  <script>
    <!--AUTO COMPLETE REFERENCE -->
  
var $j = jQuery.noConflict();
  $j(function() {
    var availableTags = [<?=$student?>];
    $j( "#student_code" ).autocomplete({
      source: availableTags
    });
  } ); 
 <!--AUTO COMPLETE REFERENCE -->
</script>