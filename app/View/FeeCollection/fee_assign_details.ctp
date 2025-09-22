	<?php //print_r($fee_head);?> 
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
	$i=1;
	foreach($fee_head as $list):?>
		<div class="form-group"> 			
			<div class="row">
				<div class="col-md-1"><?php echo $i;?></div>
				<div class="col-md-3">
					<?php echo $list['FeeHeadAssign']['fee_head_name'];?>
					<?php echo $this->Form->input("FeeClassWiseDetails.fee_head_name.",array("type"=>"hidden","class"=>"form-control","label"=>false,"value"=>$list['FeeHeadAssign']['fee_head_name'])); ?>
				</div>
				<div class="col-md-3">
					<?php echo $list['FeeHeadAssign']['fee_head_code'];?>
					<?php echo $this->Form->input("FeeClassWiseDetails.fee_head_code.",array("type"=>"hidden","class"=>"form-control","label"=>false,"value"=>$list['FeeHeadAssign']['fee_head_code'])); ?>
				</div>
				<div class="col-md-3"><?php echo $this->Form->input("FeeClassWiseDetails.fee_head_amount.",array("type"=>"text","id"=>"fee_head_amount$i","class"=>"form-control","value"=>"0.0","label"=>false,"onkeypress"=>"return isNumber(event)","maxlength"=>"8")); ?></div>
				<div class="col-md-1">&nbsp;</div> 
			</div>
		</div> 
	<?php $i++;endforeach;?>
	<div class="form-group"> 
								<div class="row"> 
										<label class="col-md-1"> </span></label>
										<label class="col-md-3"> </span></label>
										<label class="col-md-3">Total Payable Amount <span class="mandatory_fields">*</span></label>
										<div class="col-md-3"><?php echo $this->Form->input('total_payable',array('type'=>'text','id'=>'total_payable',"class"=>"calculation_text form-control","label"=>false, "onFocus"=>"getPayableAmount()","onkeypress"=>"return isNumber(event)","required"));?></label></div>
										 
								</div>
							</div>	
							<div class="row">
								<div class="col-md-8">&nbsp;</div>
									<div class="col-md-4">
										<?php //$fee_type_edit =  $this->request->data['FeeClassWises']['fee_type'];?>
										<?php echo $this->Form->submit("Fee Assign",array("class"=>"btn btn-primary")); ?>
									</div>
							</div>
	<input type="hidden" id="total_count" value=<?php echo $i-1;?> > 
	
	