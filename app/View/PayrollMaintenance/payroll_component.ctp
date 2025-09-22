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
            <li class="active">Assign Component </li>
          </ol>
        </section>


        <!-- Main content -->
        <section class="content">
           
          <!------------"Add Subject" created: 20 aug 2016 ----------->
		  
			 <div class="row">
				<!-- left column -->
				
				<div class="col-md-6">
				  <div class="box box-success"> 
					<div class="box-header with-border">
					  <h3 class="box-title">Assign Component </h3>
					</div>
					<!-- form start -->
					<?php echo $this->Form->create('PayrollComponent',array("url"=>array("controller"=>"PayrollMaintenance","action"=>"payrollComponent")));?>
					 <?php echo $this->Form->input('PayrollComponent.id');?>
					  <div class="box-body">
						<div class="form-group">
							<div class="row">
								<div class="col-sm-5"><label>Employee Id / Name <span class="mandatory_fields">*</span></label></div>
									<div class="col-sm-7">
									 <div class="form-group">
									  <?php
									  echo $this->Form->input('PayrollComponent.staff_detail_id',array("type"=>"select","class"=>"form-control select_box","required","label"=>false,"options"=>$emp_list,'empty'=>"Select Employee","required"));?>
									 
									</div>
									</div>
							</div> 
							<div class="row">
							
							<div class="col-sm-12">
							<div class="box">
								
								<!-- /.box-header -->
								<div class="box-body no-padding">
								  <table class="table table-condensed">
									<tr>
									  <th>Component</th>
									  <th>Component Type</th>
									  <th>Component Value</th>
									  <th width="30%" >Amount / Percent </th>
									</tr>
									<?php 
									$i=1;
									$j=0;
									foreach($component_list as $list):
									$id = $list['SalaryComponent']['id'];?> 
									<?php  
									if($list['SalaryComponent']['component_name'] ==  $this->request->data['PayrollComponentDetail'][$j]['component_name'])
									{
										if($list['SalaryComponent']['component_type'] ==  $this->request->data['PayrollComponentDetail'][$j]['component_type'])
										{?>
											<tr> 
												<td>
													<?php echo $this->Form->input('PayrollComponentDetail.id.',array("type"=>"hidden","label"=>false,"value"=>$this->request->data['PayrollComponentDetail'][$j]['id']));?>
													<?php echo $list['SalaryComponent']['component_name'];?>
													<?php echo $this->Form->input('PayrollComponentDetail.component_name.',array("type"=>"hidden","label"=>false,"value"=>$list['SalaryComponent']['component_name']));?>
												</td>
												<td>
													<?php echo $list['SalaryComponent']['component_type'];?>
													<?php echo $this->Form->input('PayrollComponentDetail.component_type.',array("type"=>"hidden","label"=>false,"value"=>$list['SalaryComponent']['component_type']));?>
												</td>
												<td>
													<?php echo $list['SalaryComponent']['component_value'];?>
													<?php echo $this->Form->input('PayrollComponentDetail.component_value.',array("type"=>"hidden","label"=>false,"value"=>$list['SalaryComponent']['component_value']));?>
												</td>
												<td><?php echo $this->Form->input('PayrollComponentDetail.amount_pre.',array("type"=>"text","label"=>false,"value"=>$this->request->data['PayrollComponentDetail'][$j]['amount_pre'],"onkeypress"=>"return isNumber(event)","maxlength"=>"8"));?></td>
											</tr>
									<?php  
										}
									}
									else
									{
									?>
									<tr> 
												<td>
													<?php echo $list['SalaryComponent']['component_name'];?>
													<?php echo $this->Form->input('PayrollComponentDetail.component_name.',array("type"=>"hidden","label"=>false,"value"=>$list['SalaryComponent']['component_name']));?>
												</td>
												<td>
													<?php echo $list['SalaryComponent']['component_type'];?>
													<?php echo $this->Form->input('PayrollComponentDetail.component_type.',array("type"=>"hidden","label"=>false,"value"=>$list['SalaryComponent']['component_type']));?>
												</td>
												<td>
													<?php echo $list['SalaryComponent']['component_value'];?>
													<?php echo $this->Form->input('PayrollComponentDetail.component_value.',array("type"=>"hidden","label"=>false,"value"=>$list['SalaryComponent']['component_value']));?>
												</td>
												<td><?php echo $this->Form->input('PayrollComponentDetail.amount_pre.',array("type"=>"text","label"=>false,"onkeypress"=>"return isNumber(event)","value"=>"0.0","maxlength"=>"8"));?></td>
											</tr>
									
									<?php }
									$i++;
									$j++;
									endforeach;?>
								  </table>
								  
								  <div class="row">
								  <div class="col-sm-1"></div>
								<div class="col-sm-4"><?php echo $this->Form->input("home_allocated",array("type"=>"checkbox","value"=>"allocated"))?></div>
								<div class="col-sm-4"> </div>
								<div class="col-sm-3"></div>
						    </div>
						   
								</div>
								<!-- /.box-body -->
							  </div>
							  
							  <!-- /.box -->
								</div>
							</div>
							 
							<div class="row">
								<div class="col-sm-4"></div>
								<div class="col-sm-4"><?php echo $this->Form->submit('Assign',array("class"=>"btn btn-info"));?></div>
								<div class="col-sm-4"></div>
						   </div>
						</div>
						
					  </div>
					  
					<?php echo $this->Form->end();?>
					<!---- form end ------>
				  	
				  <?php echo $this->Session->Flash();?>
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
					<tr><th>Sl.No</th><th> Name </th><th>Employee Id </th><th>Action</th></tr>
				</thead>
				<?php 
					$j=1;
					$i=0;
					foreach($payroll_component_list as $list):
					$id = $list['PayrollComponent']['id'];?>
					<tr>
						<td><?php echo $j;?></td>
						<td><?php echo $list['StaffDetail']['first_name'];?></td>
						<td><?php echo $list['StaffDetail']['emp_id'];?></td>
						 
						<td> <?php echo $this->Html->link('<i class="fa fa-trash-o" ></i>',
								array("controller"=>"PayrollMaintenance","action"=>"deletePayrollComponent", $id),
								array("confirm"=>"Are you sure you want ro delete?", "escape"=>false)); ?>  | 
							<?php echo $this->Html->link('<i class="fa fa-pencil" ></i>',
											array("controller"=>"PayrollMaintenance","action"=>"editPayrollComponent", $id),
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
	
	
	<!------------------------------------------------------------------------------------------------>

<div class="modal fade" id="student" role="dialog">
	<div class="modal-dialog modal-lg">
    
      <!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<div class="modal-title"><h4 style="color:#e91e63;">Student Profile</h4></div>
			</div>
        
			<div class="modal-body">
				<div class="row">
							
							<div class="col-sm-12">
							<div class="box">
								
								<!-- /.box-header -->
								<div class="box-body no-padding">
								  <table class="table table-condensed">
									<tr>
									  <th>Component</th>
									  <th>Component Type</th>
									  <th>Component Value</th>
									  <th width="30%" >Amount / Percent </th>
									</tr>
									<?php 
									$i=1;
									foreach($component_list as $list):
									$id = $list['SalaryComponent']['id'];?>
										<tr> 
											<td>
												<?php echo $list['SalaryComponent']['component_name'];?>
												<?php echo $this->Form->input('PayrollComponentDetail.component_name.',array("type"=>"hidden","label"=>false,"value"=>$list['SalaryComponent']['component_name']));?>
											</td>
											<td>
												<?php echo $list['SalaryComponent']['component_type'];?>
												<?php echo $this->Form->input('PayrollComponentDetail.component_type.',array("type"=>"hidden","label"=>false,"value"=>$list['SalaryComponent']['component_type']));?>
											</td>
											<td>
												<?php echo $list['SalaryComponent']['component_value'];?>
												<?php echo $this->Form->input('PayrollComponentDetail.component_value.',array("type"=>"hidden","label"=>false,"value"=>$list['SalaryComponent']['component_value']));?>
											</td>
											<td><?php echo $this->Form->input('PayrollComponentDetail.amount_pre.',array("type"=>"text","label"=>false));?></td>
										</tr>
									<?php 
									$i++;
									endforeach;?>
								  </table>
								</div>
								<!-- /.box-body -->
							  </div>
							  
							  <!-- /.box -->
								</div>
							</div>
			</div>
			
			<div class="modal-footer">
				<button type="submit" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
			
		</div>
	</div>
</div>
<!-------------------------------------------------------------------------------------------------->