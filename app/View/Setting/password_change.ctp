 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
	  <h1>Setting</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Setting</a></li>
        <li class="active">Password Change</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
     
  <!------------"Application Form Entry" created: 20 aug 2016 ----------->
  
	 <div class="row">
        <!-- left column -->
		<div class="col-md-2">&nbsp;</div>
        <div class="col-md-8">
          <div class="box box-success"><div class="box-header with-border"><h4>Password Change</h4></div>
            <!-- form start -->
           <?php echo $this->Form->create('',array("url"=>array("controller"=>"Setting","action"=>"passwordChange")));?>
		   
              <div class="box-body">
                <div class="form-group">
					<div class="row">
						<div class="col-sm-3"><label>New Password</label></div>
						<div class="col-sm-5">
						<?php  
							echo $this->Form->input('new_password',array("type"=>"password","id"=>"new_password","class"=>"form-control","required","label"=>false,"minlength"=>"5","maxlength"=>"8","placeholder"=>"Password should be 5 to 8 characters"));?>
						</div> 
				   </div>
                </div>
				<div class="form-group">
					<div class="row">
						<div class="col-sm-3"><label>Retype New Password</label></div>
						<div class="col-sm-5">
						<?php  
							echo $this->Form->input('retype_new_password',array("type"=>"password","id"=>"retype_new_password","class"=>"form-control","required","label"=>false,"minlength"=>"5","maxlength"=>"8","placeholder"=>"Password should be 5 to 8 characters"));?>
						</div>
						<div class="col-sm-2"><?php echo $this->Form->submit('Change',array("class"=>"btn btn-info","onclick"=>"return validate()"));?></div>
				   </div>
                </div>
				
              </div>
            <?php echo $this->Form->end();?>
			<!---- form end ------>
          
		  
		</div>
			<?php echo $this->Session->flash(); ?>
        </div>
        <!--col (left) --> 
		
      </div>
      <!-- row -->
    
	</section>
    <!-- content -->
  </div>
  <!-- content-wrapper -->
  
  <script>
	function validate()
	{
		new_password = $("#new_password").val();
		retype_new_password = $("#retype_new_password").val();
		if(retype_new_password!=new_password)
		{
			alert("Retype pasword not matched");
			return false;
		}
		return true;
	}
  
  
  </script>