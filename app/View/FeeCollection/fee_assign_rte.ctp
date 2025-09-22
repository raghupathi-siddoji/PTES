  <style>
 input[type="text"]
{
	background-color:white;
}
#select
{
	background-color: #ffff99;
}
</style>
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
	  <h1>RTE Fee Assign</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Fee</a></li>
        <li class="active">Fee Assign for Other</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
     
  <!---------------------------------------------------------------------->
<div class="row">
        <!-- left column -->
		<div class="col-md-2"></div>
		<div class="col-md-8">
			 <div class="box box-warning"> 
				<div class="box-header with-border">
					<div class="row">
						<div class="col-md-9"> Fee Assign For RTE  </div>
						<div class="col-md-3"><?php echo $this->Html->link("View RTE Assign",array("controller"=>"FeeCollection","action"=>"listRteFee"),array("escapse"=>false,"class"=>"btn btn-info"))?></div>
					</div>
			   </div>

            <!-- form start -->
              <div class="box-body"> 
				<div class="row">
					<div class="col-md-12">
							<?php echo $this->Form->create('FeeClassWises',array("url"=>array("controller"=>"FeeCollection","action"=>"feeAssignRte")));?>
							<?php echo $this->Form->input('id');?>
							<div class="form-group"> 	
								<div class="row">
								 
									<div class="col-md-3">
										<label>Academic Year <span class="mandatory_fields">*</span></label>
										<?php echo $this->Form->input('academic_year_id',array('type'=>'select','id'=>'academic_year_id','options'=>$academic_year_array,"required","class"=>"form-control select_box","empty"=>"Select","label"=>false));?>
									</div> 
									<div class="col-md-2"> 
										<label>Class <span class="mandatory_fields">*</span></label>
										<?php echo $this->Form->input('add_class_id',array('type'=>'select','id'=>'add_class_id','options'=>$class_array,"required","class"=>"form-control select_box","empty"=>"Select","label"=>false));
										?>
									</div>
									<div class="col-md-3">
										<label>RTE Fees <span class="mandatory_fields">*</span></label>
										<?php echo $this->Form->input('fee_type',array('type'=>'select','id'=>'fee_type','options'=>array('RTE'=>"RTE"),"required","class"=>"form-control select_box","label"=>false,'onchange' => 'populate_subcategory(this.id);'));?>
									</div>
									<div class="col-md-4">
										<label>Language</label>(Only for 8 to 10 class)
										<?php echo $this->Form->input('apply_for',array('type'=>'select','id'=>'fee_type','options'=>array('select'=>'Select Language','Sanskrith'=>'Sanskrith','English'=>'English'),"class"=>"form-control select_box","label"=>false ));?>
									</div>
								</div> 
							</div>
							<div class="form-group"> 						
								<div class="row">
									<div class="col-md-1">Sl.No</div>
									<label class="col-md-3">Fee Head Name</span></label>
									<label class="col-md-3">Fee Code</span></label>
									<label class="col-md-3">Amount</label>
									<div class="col-md-1">&nbsp;</div>
									 
								</div>
							</div>
							<?php 
							$i=0;
							$j=1;
							foreach($head_list as $list):
								$fee_name = $this->request->data['FeeClassWiseDetails'][$i]['fee_head_name'];
								$fee_code = $this->request->data['FeeClassWiseDetails'][$i]['fee_head_code'];
								$fee_head_amount = $this->request->data['FeeClassWiseDetails'][$i]['fee_head_amount'];
								$edit_id = $this->request->data['FeeClassWiseDetails'][$i]['id'];
								 
							 
									?>
									<div class="form-group"> 			
									<div class="row">
										<div class="col-md-1"><?php echo $j++;?></div>
										<div class="col-md-3">
											 
											<?php echo $list['FeeHeadAssign']['fee_head_name'];?>
											<?php echo $this->Form->input("FeeClassWiseDetails.fee_head_name.",array("type"=>"hidden","class"=>"form-control","label"=>false,"value"=>$list['FeeHeadAssign']['fee_head_name'])); ?>
										</div>
										<div class="col-md-3">
											<?php echo $list['FeeHeadAssign']['fee_head_code'];?>
											<?php echo $this->Form->input("FeeClassWiseDetails.fee_head_code.",array("type"=>"hidden","class"=>"form-control","label"=>false,"value"=>$list['FeeHeadAssign']['fee_head_code'])); ?>
										</div>
										<div class="col-md-3"><?php echo $this->Form->input("FeeClassWiseDetails.fee_head_amount.",array("type"=>"text","id"=>"fee_head_amount$i","class"=>"form-control","label"=>false,"onkeypress"=>"return isNumber(event)","value"=>"0.0","maxlength"=>"8")); ?></div>
										<div class="col-md-1">&nbsp;</div> 
									</div>
									
								</div> 
								<?php  
							$i++;endforeach;?>
								<div class="form-group"> 
								<div class="row"> 
										<label class="col-md-1"> </span></label>
										<label class="col-md-3"> </span></label>
										<label class="col-md-3">Total Payable Amount </label>
										<div class="col-md-3"><?php echo $this->Form->input('total_payable',array('type'=>'text','id'=>'total_payable',"class"=>"calculation_text form-control","label"=>false,"value"=>"0.0","onFocus"=>"getPayableAmount()","onkeypress"=>"return isNumber(event)","required"));?></label></div>
										 
								</div>
							</div>
								<input type="hidden" id="total_count" value=<?php echo $i;?> > 
							<div class="row">
								<div class="col-md-8">&nbsp;</div>
									<div class="col-md-4"> 
										<?php echo $this->Form->submit("Fee Assign",array("class"=>"btn btn-primary")); ?>
									</div>
							</div>
						</div>
						
				   </div>
				</div>
				<div class="row">
					<div class="col-md-2">&nbsp;</div>
					<div class="col-md-8"><?php echo $this->Session->flash();?></div>
					<div class="col-md-2">&nbsp;</div>
			
		</div>
		<div class="col-md-2">&nbsp;</div>
	</div>
	
	</div>
	
      <!-- row -->
    
	</section>
    <!-- content -->
  </div>
  <!-- content-wrapper -->
  
  <script>
  function getPayableAmount()
	{ 
		count = $("#total_count").val(); 
		total_payable=0;
		
		for(i=0;i<count;i++)
		{
			 total_payable  = total_payable + parseInt($("#fee_head_amount"+i).val());
		}
		if(total_payable>0){
		$("#total_payable").val(total_payable);}
	}
  </script>
 