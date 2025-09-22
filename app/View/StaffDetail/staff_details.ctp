			<!-- Bootstrap time Picker -->
   <?php echo $this->Html->css('plugins/timepicker/bootstrap-timepicker.min'); ?>
   <?php echo $this->Html->css('plugins/timepicker/bootstrap-timepicker'); ?>
 <div class="wrapper"> 
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Payroll Maintenance
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			 <li>Payroll Maintenance</li>
            <li class="active">Staff Detail</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
           
           <!------------"Staff Detail" created: 25 aug 2016 ----------->
			  
			<div class="row">
					<div class="col-md-12">
					 <div class="box box-success">
					 <br>
					<div class="box-header with-border">
						<div class="row"> 
							<div class="col-md-6">
								<h3 class="box-title">Staff Details</h3>
							</div>
							<div class="col-md-6">  
									<?php   echo $this->Session->flash();
									if($this->Session->flash()!='') { 
									
									?>	<!--
										<div class="alert alert-success alert-dismissible" id="success-alert">
											<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
											<h4><i class="icon fa fa-check"></i>Alert</h4> 
									    </div> <i id="basicSuccess">Success123</i>
									  --> 
									 <?php } ?>
							</div>
						</div>
					</div>
						<!-- form start -->
						<?php echo $this->Form->create('StaffDetail',array("type"=>"file","url"=>array("controller"=>"StaffDetail","action"=>"staffDetails")));?>
						<?php echo $this->Form->input('id');?>
						<div class="box-body">
							<div class="row">
								<div class="col-md-4">
									<label>First Name <span class="mandatory_fields">*</span></label>
									<?php 
										echo $this->Form->input('first_name',array("type"=>"text","class"=>"form-control","label"=>false,"required"));
									?>
								</div>
								<div class="col-md-4">
									<label>  Middle Name </label>
									<?php  
									echo $this->Form->input('middle_name',array("type"=>"text","class"=>"form-control","label"=>false));?>
								</div>	
								<div class="col-md-4">
								  <label>Last Name</label>
								  <?php  
										echo $this->Form->input('last_name',array("type"=>"text","class"=>"form-control","label"=>false));
									?>
								</div>
							</div> 
							<div class="row">
								<div class="col-md-4">
									<label>Gender <span class="mandatory_fields">*</span></label>
								<?php echo $this->Form->input('gender',array('type'=>'select','id'=>'select','options'=>array('Male'=>'Male','Female'=>'Female'),"class"=>"form-control select_box","required","empty"=>"select","label"=>false)) ?>
								</div>
								<div class="col-md-4">
									 <label>Date of Birth <span class="mandatory_fields">*</span></label>
								  <?php echo $this->Form->input('dob',array("type"=>"text","class"=>"form-control","label"=>false,"id"=>"datepicker","required"));?>
								</div>	
								<div class="col-md-4">
								  <label>Date of Join <span class="mandatory_fields">*</span></label>
								  <?php echo $this->Form->input('doj',array("type"=>"text","class"=>"form-control","label"=>false,"placeholder"=>"dd/mm/yyyy","id"=>"datepicker1","required"));?>
								</div>
							</div>
						 
							<div class="row">
								<div class="col-md-4">
									 <label>Mobile <span class="mandatory_fields">*</span></label>
									<?php  
										echo $this->Form->input('mobile',array("type"=>"text","class"=>"form-control","label"=>false,"required","onkeypress"=>"return isNumber(event)","minlength"=>"10","maxlength"=>"10","placeholder"=>"Ex: 9845098450"));
									?>			
								</div>	
								<div class="col-md-4">
								  <label>Email <span class="mandatory_fields">*</span></label>
									 <?php  
										echo $this->Form->input('email',array("type"=>"email","class"=>"form-control","label"=>false));
									?>
								</div>
								<div class="col-md-4">  
									<label>Blood Groop <span class="mandatory_fields">*</span></label>
									<?php echo $this->Form->input('blood_group',array('type'=>'select','id'=>'select','options'=>$blood_group_list,"class"=>"form-control select_box","empty"=>"select","required","label"=>false))?>
								</div>
								
								<!--
								<div class="col-md-4">
									<?php $option = array('Perment'=>'Perment','Temporary'=>'Temporary','Probationary'=>"Probationary","Contract"=>"Contract");?>
								   <?php echo $this->Form->input('type_joining',array('type'=>'select','id'=>'select','options'=>$option,"class"=>"form-control")) ?>
								</div> -->
							</div> 
							<div class="row">
								<div class="col-md-4">
								<label>Qualification <span class="mandatory_fields">*</span> </label>
								  <?php echo $this->Form->input('qualification',array('type'=>'text',"class"=>"form-control","label"=>false,"required")) ?>
								</div>	
								<div class="col-md-4">
								<label>Experience <span class="mandatory_fields">*</span></label>
								   <?php echo $this->Form->input('experience',array('type'=>'text',"class"=>"form-control","label"=>false,"required")) ?>
								</div>
								<div class="col-md-4">
								<label>Designation <span class="mandatory_fields">*</span></label>
								 <?php echo $this->Form->input('designation_id',array('type'=>'select','id'=>'select','options'=>$designation_list,"class"=>"form-control select_box","required","label"=>false,"empty"=>"select")) ?>
								</div>	
							</div> 
							<div class="row">
								
								<div class="col-md-4">
								<label>PF A/C <span class="mandatory_fields">*</span></label>
								   <?php echo $this->Form->input('pf_account',array('type'=>'text',"class"=>"form-control","label"=>false,"required")) ?>
								</div>
								<div class="col-md-4">
								<label>Adahar Card </label>
								 <?php echo $this->Form->input('adahar_card',array("type"=>"text","class"=>"form-control","label"=>false));?>
								</div>	
								<div class="col-md-4">
								<label>Pan card <span class="mandatory_fields">*</span></label>
								  <?php echo $this->Form->input('pan_card',array('type'=>'text',"class"=>"form-control","label"=>false,"required")); ?>
								</div>	
							</div> 
							<div class="row">
								
								
								<div class="col-md-4">
									<label>ESI(IP) Number <span class="mandatory_fields">*</span></label>
								 <?php echo $this->Form->input('esi_no',array("type"=>'text',"class"=>"form-control","label"=>false,"required"));?>
								</div>	
								<div class="col-md-4">
									<label>Employee ID <span class="mandatory_fields">*</span></label>
								 <?php echo $this->Form->input('emp_id',array("type"=>'text',"class"=>"form-control","label"=>false,"required","maxlength"=>"3","minlength"=>"3"));?>
								</div>
								<div class="col-md-4">
									<label>Photo Upload</label>
								<?php echo $this->Form->input('photo',array('type'=>'file',"class"=>"form-control","label"=>false)) ?>
								</div>
							</div>
							<div class="row">  
								<div class="col-md-4">
								<label>Bank Name <span class="mandatory_fields">*</span></label>
								  <?php echo $this->Form->input('bank_name',array('type'=>'text',"class"=>"form-control","label"=>false,"required")) ?>
								</div>
								<div class="col-md-4">
								<label>Bank Branch <span class="mandatory_fields">*</span></label>
								  <?php echo $this->Form->input('bank_branch',array('type'=>'text',"class"=>"form-control","label"=>false,"required")) ?>
								</div>	
								<div class="col-md-4">
								<label>SB A/C <span class="mandatory_fields">*</span></label>
								  <?php echo $this->Form->input('bank_account',array('type'=>'text',"class"=>"form-control","label"=>false,"required")) ?>
								</div>	
								<!--
								<div class="col-md-4"> 
									<?php echo $this->Form->input('emp_status',array('type'=>'select','id'=>'select','options'=>array('Active'=>'Active','Inactive'=>'Inactive'),"class"=>"form-control"))?>
								</div> 
								-->
							</div> 
							<div class="row">  
								<div class="col-md-4">
								<label>IFSC Code  </label>
								  <?php echo $this->Form->input('bank_ifsc',array('type'=>'text',"class"=>"form-control","label"=>false)) ?>
								</div>
								<div class="col-md-4">
								<label>Micro Code </label>
								  <?php echo $this->Form->input('bank_microcode',array('type'=>'text',"class"=>"form-control","label"=>false)) ?>
								</div> 
								<!--
								<div class="col-md-4"> 
									<?php echo $this->Form->input('emp_status',array('type'=>'select','id'=>'select','options'=>array('Active'=>'Active','Inactive'=>'Inactive'),"class"=>"form-control"))?>
								</div> 
								-->
							</div> 
							<div class="row">
								<div class="col-md-6">
								   <label>Permanent Address <span class="mandatory_fields">*</span></label>
								   <?php echo $this->Form->input('permanent_address',array("type"=>"textarea","rows"=>"5","class"=>"form-control","label"=>false,"id"=>"permanent_address","required")) ?>
								</div>
								<div class="col-md-6">
									<label>Communication Address </label>
								   <?php echo $this->Form->input('communication_address',array("type"=>"textarea","rows"=>"5","class"=>"form-control","label"=>false,"id"=>"communication_address")) ?>
								</div>
							</div>
							<div class="row"><div class="col-md-6"> <mark>Communication address is same as Permanent address click here <input type="checkbox" id="same_address"></mark></div> </div>
							<!--
							<div class="row">
								<div class="col-md-6">
								  
									<?php echo $this->Form->input('permanent_city',array('type'=>'select','id'=>'select','options'=>array('Shivamagoa'=>'Shivamagoa','Bhadravathi'=>'Bhadravathi','Davangere'=>'Davangere','Chitradurga'=>'Chitradurga','Chikmagalur'=>'Chikmagalur'),"class"=>"form-control select_box")) ?>
								</div>
								<div class="col-md-6">
								
									<?php echo $this->Form->input('communication_city',array('type'=>'select','id'=>'select','options'=>array('Shivamagoa'=>'Shivamagoa','Bhadravathi'=>'Bhadravathi','Davangere'=>'Davangere','Chitradurga'=>'Chitradurga','Chikmagalur'=>'Chikmagalur'),"class"=>"form-control select_box")) ?>
								</div>
							</div> -->
							<div class="row">
								<div class="col-md-6">
								   <label>Pincode <span class="mandatory_fields">*</span></label>
								   <?php echo $this->Form->input('permanent_pinecode',array("type"=>"text","class"=>"form-control","label"=>false,"id"=>"permanent_pinecode","minlength"=>"6","maxlength"=>"6","onkeypress"=>"return isNumber(event)","required")) ?>
								</div>
								<div class="col-md-6">
									<label>Pincode</label>
								   <?php echo $this->Form->input('communication_pinecode',array("type"=>"text","class"=>"form-control","label"=>false,"id"=>"communication_pinecode","minlength"=>"6","maxlength"=>"6","onkeypress"=>"return isNumber(event)")) ?>
								</div>
							</div> <br>
							<div class="row">
								<div class="col-sm-4"></div>
								<div class="col-sm-4"><?php echo $this->Form->submit('Submit',array("class"=>"btn btn-info"));?></div>
								<div class="col-sm-4"></div>
						   </div>
						</div>
						
					</div>
					<?php $old_file = $this->request->data['StaffDetail']['photo'];?>
					<?php echo $this->Form->input('old_image',array("type"=>"hidden","label"=>false,"value"=>$old_file)) ?>
					<?php echo $this->Form->end();?>
					<!---- form end ------>
				  	
				  
				</div>
				</div>
				</div>
			
				
    </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
	</div> <!-- wrapper -->
	
	<!-- bootstrap time picker -->
 
<!-- Page script -->
 
 <script>
 /* FOR COPY Address OF Permanent Address TO Communication Address*/
$("#same_address").click(function(){
	if($("#same_address").prop('checked'))
	{
		 $p_address = $("#permanent_address").val();
		 $("#communication_address").val( $p_address);
		  $p_address_pin= $("#permanent_pinecode").val();
		 $("#communication_pinecode").val($p_address_pin);
	}
	else
	{  
		 $("#communication_address").val(""); 
		  $("#communication_pinecode").val("");
	}
});
 
 
 </script>