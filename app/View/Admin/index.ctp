 
<div class="row"> 
			<div class="col-md-8"></div>
			<div class="col-md-4">
			
<div class="login-box">
  <div class="login-logo" >
    <b>&nbsp;</b> 
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>

	
			   <?php echo $this->Form->create("Admin",array("url"=>array("controller"=>"Admin","action"=>"index")));?>
				  <div class="form-group has-feedback"> 
					<?php echo $this->Form->input('user_name',array('type'=>'text','class'=>'form-control','required',
						"placeholder"=>"User Name","label"=>false,'after' =>'<i class="glyphicon glyphicon-user form-control-feedback"></i>'
						,'div'  => 'form-group has-feedback'));?>
				  </div>
				  <div class="form-group has-feedback">
					<?php echo $this->Form->input('password',array('type'=>'password','class'=>'form-control','required',
					   "placeholder"=>"Password","label"=>false,'after' =>'<i class="glyphicon glyphicon-lock form-control-feedback"></i>'
						,'div'  => 'form-group has-feedback'));?>
				  </div>
				  <div class="row">
					 
					<!-- /.col -->
					<div class="col-xs-4">
						<?php echo $this->Form->submit('Login',array("class"=>"btn btn-primary btn-block btn-flat"));?>
						
					</div>
					<!-- /.col -->
					<span style="color:red;"><?php echo $this->Session->flash();?></span>
				  </div>
			
     

   <!-- <a href="#">I forgot my password</a>--><br> 

  </div>
  <!-- /.login-box-body -->
</div>
	<?php echo $this->Form->end(); ?>
			</div>
		</div>
	</div>
 