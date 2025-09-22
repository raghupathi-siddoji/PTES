  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  <style>
::-webkit-input-placeholder
{text-align:center;}
  </style>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
		Quick Send SMS
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-envelope-o" aria-hidden="true"></i> SMS</a></li>
		<li>Quick Send SMS</li>
        <li class="active">Quick SMS</li>
      </ol>
    </section>
	<!--main content-->
		 <!-- Main content -->
    <section class="content">
    <!-- <div class="container">-->
		<div class="row">
			<div class="col-md-8 col-md-push-2">
				<div class="box box-info">
					<div class="box-header with-border">
							<?php echo $this->Session->flash(); ?> 				  
					</div>
					<?php echo $this->Form->create('QuickSms',array("url"=>array("controller"=>"Sms","action"=>"quickSms")));?>
								<div class="box-body">
									<div class="row"> 
										<div class="col-md-12">												
											
											<div class="form-group">											
											  <label for="select" class="col-sm-2 control-label">Notification<span class="mandatory_fields"> * </span></label>
											  <div class="col-sm-7"> 
												 <?php 
												 echo $this->Form->input("notification_type_id",array("type"=>"select","label"=>false,"options"=>$notification_list,"class"=>"form-control","required","empty"=>"Select"));?>
											  </div>
											</div> 
											
											<div class="col-md-6">
												<div class="form-group">
													<label for="name" class="col-sm-4 control-label">Send To<span class="mandatory_fields"> * </span></label>
													<div class="col-sm-12">
														<?php echo $this->Form->textarea("send_to",array("label"=>false,"class"=>"form-control","required","rows"=>"5","placeholder"=>"9880100613,7846090020")); ?>
														
													</div>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label for="name" class="col-sm-4 control-label">Message<span class="mandatory_fields"> * </span></label>
													<div class="col-sm-12">
														<?php echo $this->Form->textarea("message",array("label"=>false,"class"=>"form-control","required","rows"=>"5","placeholder"=>"Message")); ?>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							  <!-- /.box-body -->
							  <div class="box-footer">								
								<button type="submit" class="btn btn-success" style="margin-left:314px;" value="Save"><i class="fa fa-paper-plane-o" aria-hidden="true"></i> Send</button>								
							  </div>
							  <!-- /.box-footer -->
					<?php echo $this->Form->end;?>
				</div>
			</div>
			
		</div>
	<!--</div>-->
      <!-- /.row -->
    </section>
	<!--main content end-->
  </div>