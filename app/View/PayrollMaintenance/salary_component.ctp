
</style>
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
            <li class="active">Salary Component</li>
          </ol>
        </section>

        <!-- Main content -->
  	  <section class="content">
       <!------------"Add Subject" created: 20 aug 2016 ----------->
		  
			 <div class="row">
				<!-- left column -->
				
				<div class="col-md-6">
				  <div class="box box-success">
				<br>
					<div class="box-header with-border">
					  <h3 class="box-title">Salary Component</h3>
					</div>
					<!-- form start -->
				   <?php echo $this->Form->create('SalaryComponent',array("url"=>array("controller"=>"PayrollMaintenance","action"=>"salaryComponent")));?>
					<?php echo $this->Form->input('id');?>
					  <div class="box-body">
						<div class="form-group">
							<div class="row">
								<div class="col-sm-5"><label>Component Name <span class="mandatory_fields">*</span></label></div>
								<div class="col-sm-7">
								<?php 
									echo $this->Form->input('component_name',array("type"=>"text","class"=>"form-control","required","label"=>false));?>
								</div>
							</div>
							<br>
							<div class="row">
							<div class="col-sm-5"><label>Component Type <span class="mandatory_fields">*</span></label></div>
						
							<div class="col-sm-7">
							 <div class="form-group">
							 <?php $option= array("Earnings"=>"Earnings","Deduction"=>"Deduction");?>
							  <?php echo $this->Form->input('component_type',array("type"=>"select","options"=>$option,"label"=>false,"class"=>"form-control select_box","empty"=>"select","required"));?> 
							</div>
							</div>
							</div> 
							<div class="row">
								<div class="col-sm-5"></div>
								<div class="col-sm-7"> 
									 <?php $options=array('Fixed'=>'Fixed','Variable'=>'Variable');
										$attributes=array('legend'=>false,"value"=>"Fixed");
										echo $this->Form->radio('component_value',$options,$attributes,array("class"=>"radio","label"=>true,"required"));?> 
										 
								</div> 
							</div> <br>
							<div class="row">
								<div class="col-sm-4"></div>
								<div class="col-sm-4"><?php echo $this->Form->submit('Add Component',array("class"=>"btn btn-info"));?></div>
								<div class="col-sm-4"></div>
						   </div>
						</div>
						<?php echo $this->Session->Flash();?>
					  </div>
					<?php echo $this->Form->end();?>
					<!---- form end ------>
				  	
				  
				</div>
				</div>
				<!--col (left) -->
				
<!--------------Add  Category ---------------->
	
        <!-- right column -->
        <div class="col-md-6">
		
          <div class="box box-warning">
			  <div class="box-body">
				<table class="table table-bordered" id="example1">
				<thead>
					<tr><th>Sl.No</th><th>Component Name</th><th>Component Type</th><th>Action</th></tr>
				</thead>
					<?php 
					$i=1;
					foreach($component_list as $list):
					$id = $list['SalaryComponent']['id'];?>
					<tr>
						<td><?php echo $i;?></td>
						<td><?php echo $list['SalaryComponent']['component_name'];?></td>
						<td><?php echo $list['SalaryComponent']['component_type'];?></td>
						<td> 
							 <?php echo $this->Html->link('<i class="fa fa-trash-o" ></i>',
								array("controller"=>"PayrollMaintenance","action"=>"deleteComponent", $id),
								array("confirm"=>"Are you sure you want ro delete?", "escape"=>false)); ?>  | 
							<?php echo $this->Html->link('<i class="fa fa-pencil" ></i>',
											array("controller"=>"PayrollMaintenance","action"=>"salaryComponent", $id),
											array("escape"=>false)); ?> </td>
					</tr> 
				<?php 
				$i++;
				endforeach;?>
				</table>
								
			</div>
			
			</div>
        </div>
		
      </div>
      <!-- row -->
	
				
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
	</div> <!-- wrapper -->