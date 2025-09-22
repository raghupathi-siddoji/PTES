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
	  <h1>Fee</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Fee</a></li>
        <li class="active">Fee Assign for RTE</li>
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
				<div class="box-header with-border">Fee Assign For RTE
			   </div>

            <!-- form start -->
              <div class="box-body">
			  
				<div class="row">
					<div class="col-md-12">
							 
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
										<div class="col-md-1"><?php echo $i++;?></div>
										<div class="col-md-3">
											<?php echo $this->Form->input("FeeClassWiseDetails.id.",array("type"=>"hidden","class"=>"form-control","label"=>false,"value"=>$list['id'])); ?>
											<?php echo $list['fee_head_name'];?> 
										</div>
										<div class="col-md-3">
											<?php echo $list['fee_head_code'];?>
										</div>
										<div class="col-md-3"><?php echo $list['fee_head_amount']; ?></div>
										<div class="col-md-1">&nbsp;</div> 
									</div>
								</div> 
							<?php endforeach;?>
							<div class="form-group"> 
								<div class="row"> 
										<label class="col-md-1"> </span></label>
										<label class="col-md-3"> </span></label>
										<label class="col-md-3">Total Payable Amount </label>
										<div class="col-md-3"><?php echo $this->request->data['FeeClassWises']['total_payable'];?></label></div>
										 
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
  </script>
 