 
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
	  <h1>Fee</h1>
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
				<div class="box-header with-border">Fee Assign For Other
			   </div>

            <!-- form start -->
              <div class="box-body">
			  
				<div class="row">
					<div class="col-md-12">
							<?php echo $this->Form->create('FeeClassWises',array("url"=>array("controller"=>"FeeCollection","action"=>"editFeeAssignOther")));?>
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
									
									<div class="col-md-2"> 
										<label>Caste <span class="mandatory_fields">*</span></label>
										<?php echo $this->Form->input('fee_category',array('type'=>'select','id'=>'fee_category','options'=>array('select'=>'Select','GM'=>'GM','SC'=>'SC','ST'=>'ST'),"required","class"=>"form-control select_box","label"=>false));?>
									</div>
									<div class="col-md-2">
										<label>Type of Fees  <span class="mandatory_fields">*</span></label>
										
										<?php echo $this->Form->input('fee_type',array('type'=>'select','id'=>'fee_type','options'=>array('select'=>'Select','Govt'=>'Govt','Mgnt'=>'Management','RTE'=>"RTE"),"required","class"=>"form-control select_box","label"=>false));?>
									</div>
									<div class="col-md-3">
										<label>Apply For  <span class="mandatory_fields">*</span></label>
										<?php echo $this->Form->input('apply_for',array('type'=>'select','id'=>'fee_type','options'=>array('select'=>'Select','MPM'=>'MPM Employee','Non_MPM'=>'Non MPM Employee'),"class"=>"form-control select_box","label"=>false ));?>
									</div>
								</div> 
							</div>
							<div class="form-group"> 						
								<div class="row">
									<div class="col-md-1">#</div>
									<label class="col-md-3">Fee Head Name</span></label>
									<label class="col-md-3">Fee Code</span></label>
									<label class="col-md-3">Amount</label>
									<div class="col-md-1">&nbsp;</div>
									 
								</div>
							</div>
							<?php 
							$i=1;
							foreach($this->request->data['FeeClassWiseDetails'] as $list):?>
								<div class="form-group"> 			
									<div class="row">
										<div class="col-md-1"><?php echo $i;?></div>
										<div class="col-md-3">
											<?php echo $this->Form->input("FeeClassWiseDetails.id.",array("type"=>"hidden","class"=>"form-control","label"=>false,"value"=>$list['id'])); ?>
											<?php echo $list['fee_head_name'];?> 
											<?php echo $this->Form->input("FeeClassWiseDetails.fee_head_name.",array("type"=>"hidden","class"=>"form-control","label"=>false,"value"=>$list['fee_head_name'])); ?>
										</div>
										<div class="col-md-3">
											<?php echo $list['fee_head_code'];?>
											<?php echo $this->Form->input("FeeClassWiseDetails.fee_head_code.",array("type"=>"hidden","class"=>"form-control","label"=>false,"value"=>$list['fee_head_code'])); ?>
										</div>
										<div class="col-md-3"><?php echo $this->Form->input("FeeClassWiseDetails.fee_head_amount.",array("type"=>"text","id"=>"fee_head_amount$i","class"=>"form-control","label"=>false,"value"=>$list['fee_head_amount'],"onkeypress"=>"return isNumber(event)","maxlength"=>"8")); ?></div>
										<div class="col-md-1">&nbsp;</div> 
									</div>
								</div> 
							<?php $i++;endforeach;?>
							<div class="form-group"> 
								<div class="row"> 
										<label class="col-md-1"> </span></label>
										<label class="col-md-3"> </span></label>
										<label class="col-md-3">Total Payable Amount <span class="mandatory_fields">*</span></label>
										<div class="col-md-3"><?php echo $this->Form->input('FeeClassWises.total_payable',array('type'=>'text','id'=>'total_payable',"class"=>"form-control","label"=>false,"readonly","onFocus"=>"getPayableAmount()"));?></label></div>
										 
								</div>
							</div>
							<input type="hidden" id="total_count" value=<?php echo $i-1;?> > 
							<div class="row">
								<div class="col-md-8">&nbsp;</div>
									<div class="col-md-4">
										<?php $fee_type_edit =  $this->request->data['FeeClassWises']['fee_type'];?>
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
	 
	function populate_subcategory(id)
	{	
		var fee_type_id = $("#"+id).val(); 
		if(fee_type_id != ""){ 
		 	$.get( "<?=$this->webroot?>FeeCollection/feeAssignDetails/"+fee_type_id, function( data ) { 
			 $( "#content_display" ).html( data );  
			 }) ;
		} 	
	}  
	
	 function getPayableAmount()
	{ 
		count = $("#total_count").val(); 
		total_payable=0;
		
		for(i=1;i<=count;i++)
		{
			 total_payable  = total_payable + parseInt($("#fee_head_amount"+i).val());
		}
		if(total_payable>0){
		$("#total_payable").val(total_payable);}
	}
	
  </script>
 