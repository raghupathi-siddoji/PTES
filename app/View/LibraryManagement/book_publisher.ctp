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
         <li class="active">Book Publisher</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
           
          <!------------"BOOK publisher" created: 20 aug 2016 ----------->
		  
			 <div class="row">
				<!-- left column -->
				<div class="col-md-1"></div>
				<div class="col-md-10">
				  <div class="box box-success">
				<br>
					<div class="box-header with-border">
					  <h3 class="box-title">Book Publisher</h3>
					
					<!-- form start -->
				   <?php echo $this->Form->create('BookPublisher',array("url"=>array("controller"=>"LibraryManagement","action"=>"bookPublisher")));
						echo $this->Form->input('id');
						 if(!empty($publisher_code))
							{
								 echo $this->Form->input('publisher_code',array('type'=>'hidden','value'=>$publisher_code));
								 echo "Publisher Code".$publisher_code;
							} 
					?>
					</div>
					  <div class="box-body">
						<div class="form-group">
							<div class="row">
								<div class="col-sm-4"><label>Publisher Name<span class="mandatory_fields"> * </span></label>
									<?php echo $this->Form->input("publisher_name",array("type"=>"text","required","class"=>"form-control input-sm","label"=>false));?>
									<?php echo $this->Form->input("previous_publisher",array("type"=>"hidden","value"=>$previous_publisher));?>
								</div>
							
								<div class="col-sm-4"><label>Published Year</label>
								   <?php echo $this->Form->input("publisher_year",array("type"=>"text","class"=>"form-control input-sm","label"=>false,"onkeypress"=>"return isNumber(event)"));?>
								</div>
								<div class="col-sm-4"><label>Contact No</label>
								  <?php echo $this->Form->input("contact",array("type"=>"text","class"=>"form-control input-sm","label"=>false,'maxLength'=>'10','minLength'=>'10',"onkeypress"=>"return isNumber(event)"));?>
								</div>
							
							</div>
							<br>
							<div class="row">
								<div class="col-sm-4"><label>Fax No</label>
									<?php echo $this->Form->input("fax_no",array("type"=>"text","class"=>"form-control input-sm","label"=>false,"onkeypress"=>"return isNumber(event)"));?>
								</div>
								<div class="col-sm-4"><label>Email</label>
							  		<?php echo $this->Form->input("email",array("type"=>"email","class"=>"form-control input-sm","label"=>false));?>
								</div>
							
								<div class="col-sm-4"><label>Website</label>
									<?php echo $this->Form->input("website",array("type"=>"text","class"=>"form-control input-sm","label"=>false));?>
								</div>
							
							</div>
							<br>
							
							
							<div class="row">
								<div class="col-sm-4">
									<label>Country</label>
									<?php echo $this->Form->input("country",array("type"=>"text","label"=>false,"class"=>"form-control"));?>		  
								</div>
								<div class="col-sm-4">
									<label>State</label>
									<?php echo $this->Form->input("state",array("type"=>"select","options"=>array("--"=>"Select State",$states),"label"=>false,"class"=>"form-control select_box"));?>		  
								</div>
								<div class="col-sm-4">
									<label>City</label>
									<?php echo $this->Form->input("city",array("type"=>"select","options"=>array("--"=>"Select State",$districts),"label"=>false,"class"=>"form-control select_box"));?>		  
								</div>
							</div>
							<br>
							<div class="row">
								<div class="col-sm-6"><label>Address</label>
									<?php echo $this->Form->input("address",array("type"=>"textarea","class"=>"form-control input-sm","label"=>false));?>
								</div>
								<div class="col-sm-6"><label>Pincode</label>
									<?php echo $this->Form->input("pincode",array("type"=>"text","class"=>"form-control input-sm","label"=>false,"onkeypress"=>"return isNumber(event)"));?>
							 	</div>
							</div>
							<br>
							
							
							
							<div class="row">
								<div class="col-sm-4"></div>
								<div class="col-sm-2"><?php echo $this->Form->submit('Submit',array("class"=>"btn btn-info"));?></div>
								<div class="col-sm-4">
									<?php echo $this->Html->link('<i class="btn btn-warning">Cancel</i>', array("controller"=>"LibraryManagement","action"=>"bookPublisherList"),array("escape"=>false)); ?>
								</div>
						   </div>
						</div>
						<?php echo $this->Session->Flash(); ?>
					  </div>
					  <div class="col-md-1"></div>
					<?php echo $this->Form->end();?>
					<!---- form end ------>
				  	
				  
				</div>
				</div>
				</div>
				
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
	</div> <!-- wrapper -->