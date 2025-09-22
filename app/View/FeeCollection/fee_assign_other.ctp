 
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
				<div class="box-header with-border">
					<div class="row">
						<div class="col-md-9"> Fee Assign For Other  </div>
						<div class="col-md-3"><?php echo $this->Html->link("View Fee Assign other",array("controller"=>"FeeCollection","action"=>"listFeeAssign"),array("escapse"=>false,"class"=>"btn btn-info"))?></div>
					</div>
			   </div>

            <!-- form start -->
              <div class="box-body">
			  
				<div class="row">
					<div class="col-md-12">
							<?php echo $this->Form->create('FeeClassWises',array("url"=>array("controller"=>"FeeCollection","action"=>"feeAssignOther")));?>
							
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
										<?php echo $this->Form->input('caste_id',array('type'=>'select','id'=>'fee_category','options'=>$caste_array,"required","class"=>"form-control select_box","empty"=>"Select","label"=>false));?>
									</div>
									<div class="col-md-2">
										<label>Type of Fees <span class="mandatory_fields">*</span></label>
										<?php echo $this->Form->input('fee_type',array('type'=>'select','id'=>'fee_type','options'=>array('Govt'=>'Govt','Mgnt'=>'Management'),"required","class"=>"form-control select_box","label"=>false,'onchange' => 'populate_subcategory(this.id);',"empty"=>"Select"));?>
									</div>
									<div class="col-md-3">
										<label>MPM/Non MPM </label>
										<?php echo $this->Form->input('apply_for',array('type'=>'select','id'=>'fee_type','options'=>array('MPM'=>'MPM Employee','Non_MPM'=>'Non MPM Employee'),"class"=>"form-control select_box","label"=>false,'empty'=>'Select'));?>
									</div>
								</div> 
							</div>
							<div id="content_display"></div>
							
							
							
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
     