 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
	  <h1>Setting</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Setting</a></li>
        <li class="active">Application Fee</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
     
  <!------------"Application Form Entry" created: 20 aug 2016 ----------->
  
	 <div class="row">
        <!-- left column -->
		
        <div class="col-md-6">
          <div class="box box-success"><div class="box-header with-border"><h4>Application Fee</h4></div>
            <!-- form start -->
           <?php echo $this->Form->create('ApplicationFee',array("url"=>array("controller"=>"Setting","action"=>"applicationFee")));?>
		   
              <div class="box-body">
                <div class="form-group">
					<div class="row">
						<div class="col-sm-3"><label>Fee Amount <span class="mandatory_fields">*</span></label></div>
						<div class="col-sm-5">
						<?php 
							echo $this->Form->input('id',array("type"=>"hidden")); 
							echo $this->Form->input('fee_amount',array("type"=>"text","class"=>"form-control","required","label"=>false));?>
						</div>
						<div class="col-sm-2"><?php echo $this->Form->submit('Save',array("class"=>"btn btn-info"));?></div>
				   </div>
                </div>
				
              </div>
            <?php echo $this->Form->end();?>
			<!---- form end ------>
          
		  
		</div>
			<?php echo $this->Session->flash(); ?>
        </div>
        <!--col (left) -->
		
	
<!--------------Add  Category ---------------->
	
        <!-- right column -->
         
		
      </div>
      <!-- row -->
    
	</section>
    <!-- content -->
  </div>
  <!-- content-wrapper -->