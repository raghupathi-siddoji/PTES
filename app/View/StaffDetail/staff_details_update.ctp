 
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
						<div class="box-header with-border">
						  <h3 class="box-title">Staff Details Update</h3>
						</div>
						<div class="box-body"> 
						<?php echo $this->Form->create('StaffDetail',array("type"=>"file","url"=>array("controller"=>"StaffDetail","action"=>"staffDetailsUpdate")));?>
							<div class="row">
								<div class="col-md-4"> 
									 <?php
									  echo $this->Form->input('staff_detail_id',array("type"=>"select","class"=>"form-control select_box","required","label"=>false,"options"=>$emp_list,'empty'=>"Select Employee","required"));?> 
								</div>  
								<div class="col-sm-4"><?php echo $this->Form->submit('Show',array("class"=>"btn btn-info","name"=>"show_btn"));?></div>
								<div class="col-sm-4"><?php echo $this->Session->Flash();?></div>
							</div><br>
							
							
						 <?php echo $this->Form->end();?>
							<?php if(isset($_POST['show_btn'])!=''){?>
							<?php echo $this->Form->create('StaffDetail',array("type"=>"file","url"=>array("controller"=>"StaffDetail","action"=>"staffDetailsUpdateProcess")));?>
							<?php echo $this->Form->input("id");?>
								<div class="row">
									<div class="col-md-4"> 
										<label>Staff Name :</label><?php echo $this->request->data['StaffDetail']['first_name'];?>
									</div>
									<div class="col-md-4"> 
										<label>EMP Id :</label><?php echo $this->request->data['StaffDetail']['emp_id'];?>
									</div>	
									<div class="col-md-4"> 
									  
									</div>
								</div>
								<div class="row">
									<div class="col-md-4"> 
										<?php echo $this->Form->input('StaffDetail.date_of_probationary',array('label' => 'Date of  Probationary','type'=>'text',"class"=>"form-control","value"=>$this->request->data['StaffDetail']['date_of_probationary'],"id"=>"datepicker")) ?>
									</div>
									<div class="col-md-4"> 
									  <?php echo $this->Form->input('StaffDetail.date_of_permanent',array('label' => 'Date of  Permanent',"type"=>"text","required","class"=>"form-control","placeholder"=>"dd/mm/yyyy","value"=>$this->request->data['StaffDetail']['date_of_permanent'],"id"=>"datepicker1"));?>
									</div>	
									<div class="col-md-4"> 
									  <?php echo $this->Form->input('StaffDetail.date_of_retirement',array('label' => 'Date of  Retirement',"type"=>"text","required","class"=>"form-control","placeholder"=>"dd/mm/yyyy","value"=>$this->request->data['StaffDetail']['date_of_retirement'],"id"=>"datepicker2"));?>
									</div>
								</div>
								<div class="row">
									<div class="col-md-4"> 
										<?php echo $this->Form->input('StaffDetail.date_of_resignation',array('label' => 'Date of  Resignation','type'=>'text',"class"=>"form-control","value"=>$this->request->data['StaffDetail']['date_of_resignation'],"id"=>"datepicker3")) ?>
									</div>
									<div class="col-md-4"> 
									  <?php echo $this->Form->input('StaffDetail.date_of_confirmation',array('label' => 'Date of  confirmation',"type"=>"text","required","class"=>"form-control","placeholder"=>"dd/mm/yyyy","value"=>$this->request->data['StaffDetail']['date_of_confirmation'],"id"=>"datepicker4"));?>
									</div>	
									<div class="col-md-4"> 
									  <?php echo $this->Form->input('StaffDetail.date_of_death',array('label' => 'Date of  Death',"type"=>"text","required","class"=>"form-control","placeholder"=>"dd/mm/yyyy","value"=>$this->request->data['StaffDetail']['date_of_death'],"id"=>"datepicker5"));?>
									</div>
								</div><br>
								<div class="row">
									<div class="col-sm-4">&nbsp;</div>
									<div class="col-sm-4"><?php echo $this->Form->submit('Update',array("class"=>"btn btn-info"));?></div>
									<div class="col-sm-4">&nbsp;</div>
								</div>
							<?php echo $this->Form->end();?>	
							<?php } ?>
						</div>
						
					</div>
					<?php echo $this->Form->end();?>
					<!---- form end ------>
				  	
				  
				</div>
			</div>
		 
			
				
    </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
	</div> <!-- wrapper -->
	
	<!-- bootstrap time picker -->

 <?php echo $this->Html->script('plugins/timepicker/bootstrap-timepicker.min'); ?>
 <?php echo $this->Html->script('plugins/timepicker/bootstrap-timepicker'); ?>
  <?php echo $this->Html->script('jQuery/jquery-2.2.3.min'); ?>

<!-- Page script -->
<script>
 $(function () {
    //Initialize Select2 Elements
    $(".select2").select2();

    //Timepicker
    $(".timepicker").timepicker({
      showInputs: false
    });
  });
</script>