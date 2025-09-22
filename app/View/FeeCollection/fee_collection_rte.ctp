 <?php //print_r($student_details);?>
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
	  <h1>RTE Fee Collection</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Fee</a></li>
        <li class="active">RTE Fee Collection</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
  
	<div class="row"> 
		<!------------------------------------>
		 
		<?php echo $this->Form->create('RteFeeCollection',array("url"=>array("controller"=>"FeeCollection","action"=>"feeCollectionRte")));?>
		
			<div class="form-horizontal">
				<div class="col-md-2">&nbsp;</div>
				<div class="col-md-8"> 
					<div class="box box-warning"> 
						<div class="box-header with-border">
							<div class="row">
							 
								<div class="col-md-3">
									<label>Academic Year <span class="mandatory_fields">*</span></label>
									<?php echo $this->Form->input("academic_year_id",array("type"=>"select","id"=>"year","options"=>$academic_year_array,"class"=>"form-control select_box","empty"=>"Select","required","label"=>false));?>		
								</div>
								<div class="col-md-3">
									<label>Class <span class="mandatory_fields">*</span></label>
									<?php echo $this->Form->input("add_class_id",array("type"=>"select","options"=>$class_array,"id"=>"class_id","class"=>"form-control select_box","empty"=>"select","required","label"=>false));?>		
								</div> 
								<div class="col-md-3">
									<label>Student Code<span class="mandatory_fields">*</span></label>
									<?php echo $this->Form->input("student_code",array("type"=>"select","id"=>"student_detail_id","class"=>"form-control","required","placeholder"=>"Type Student name or Code","label"=>false)); ?>
								</div> 	
								<div class="col-md-3"><br>
									<?php echo $this->Form->submit("Submit",array("class"=>"btn btn-primary btn-sm",'name'=>'show_btn','value'=>'Show')); ?>
								</div>
							</div>
							<!--<span><a href="" class="btn btn-primary btn-sm pull-right" data-toggle="modal" data-target="#management">Enter Student Code</a></span>-->
						</div>
					</div>
				</div>
				<div class="col-md-2">&nbsp;</div>
			</div>		
		<?php echo $this->Form->end(); ?> 
		
	</div>
	<div class="row"> 
		<div class="col-md-3">&nbsp;</div>
		<div class="col-md-6"><?php echo $this->Session->flash();?></div>
		<div class="col-md-3">&nbsp;</div>
	</div>
	
	
	<?php if(isset($_POST['show_btn'])!=''){?>
		<?php if(!empty($fee_structure)){?>
	<?php echo $this->Form->create('RteFeeCollection',array("url"=>array("controller"=>"FeeCollection","action"=>"feeCollectionRteProcess")));?>
	<?php echo $this->FOrm->input("student_detail_id",array("type"=>"hidden","value"=>$student_details['StudentDetail']['id']));?>
	<?php echo $this->FOrm->input("add_class_id",array("type"=>"hidden","value"=>$student_details['AddClass']['id']));?>
	<?php echo $this->FOrm->input("academic_year_id",array("type"=>"hidden","value"=>$academic_year_id));?>
		
	<div class="row">
		<div class="form-horizontal">
			<div class="col-md-2">&nbsp;</div>
			<div class="col-md-8"> 
				<div class="box box-warning">			
					<div class="box-body">
						<div class="row">
							<div class="col-md-6"><label>Student Name :</label> <?php echo $student_details['StudentDetail']['student_name'];?></div> 
							<div class="col-md-2"><label>Student Code :</label></div>
							<div class="col-md-4"><?php echo $student_details['StudentDetail']['student_code'];?></div>
						</div>
						
						<div class="row">
						
							<div class="col-md-6"><label>Class :</label> <?php echo $student_details['AddClass']['class'];?></div> 
							<div class="col-md-2"><label>Receipt No <span class="mandatory_fields">*</span> :</label></div>
							<div class="col-md-4"><?php echo $this->Form->input("receipt_no",array("type"=>"text","value"=>$gove_receipt,"id"=>"fee",'label'=>false,"class"=>"auto_generate")); ?></div>
						</div>
						
						<div class="row">
							<div class="col-md-6"><label >Section :</label> <?php echo $student_details['Section']['section'];?></div>
							<div class="col-md-2"><label>Receipt Date <span class="mandatory_fields">*</span> </label>:</div>
							<div class="col-md-4"><?php echo $this->Form->input("receipt_date",array("type"=>"text","value"=>date('d-m-Y'),"id"=>"fee",'label'=>false,"id"=>"datepicker")); ?></div>
						</div>
						<div class="row"> 
							<div class="col-md-4"><label>MPM/Non MPM :</label><?php echo $student_details['StudentDetail']['mpm_employee'];?></div>
							<div class="col-md-4"><label >RTE :</label><?php echo $student_details['StudentDetail']['admitting_under_rte'];?></div>
							<div class="col-md-4"><label >Caste :</label><?php echo $student_details['Caste']['caste'];?></div>
						</div><br>
						<div class="row"> 
							<div class="col-md-12">
								<table width="100%" class="table table-condensed" style="padding:5px;">
									<tr>
										<th>Sl.No</th>
										<th>Fee Head </th>
										<th>Fee Code</th>
										<th>Payable Amount</th>
										<th>Paying Amount</th>
									</tr>
										
									<?php 
									$i=1;
									$payable_amount = 0;
									foreach($fee_structure as $fee_details)
									{ 
										 
										foreach($fee_details['FeeClassWiseDetails'] as $details) 
										{
											$payable_amount=$payable_amount + $details['fee_head_amount'];
											?>
											<tr>
												<td><?php echo $i;?></td>
												<td>
													<?php echo $details['fee_head_name'];?>
													<?php echo $this->Form->input("RteFeeCollectionDetail.fee_head_name.",array("type"=>"hidden","id"=>"fee_head_name"."$i","value"=>$details['fee_head_name'],"size"=>"10","label"=>false))?>
												</td> 
												<td>
													<?php echo $details['fee_head_code'];?>
													<?php echo $this->Form->input("RteFeeCollectionDetail.fee_head_code.",array("type"=>"hidden","id"=>"fee_head_code"."$i","value"=>$details['fee_head_code'],"size"=>"10","label"=>false))?>
												</td> 
												<td> 
													<?php echo $details['fee_head_amount'];?>
													<?php echo $this->Form->input("RteFeeCollectionDetail.fee_head_amount.",array("type"=>"hidden","id"=>"fee_head_amount"."$i","value"=>$details['fee_head_amount'],"size"=>"10","label"=>false))?>
												</td>
												<td><?php echo $this->Form->input("RteFeeCollectionDetail.fee_paying_amount.",array("type"=>"text","id"=>"fee_paying_amount"."$i","value"=>"0.0","size"=>"10","label"=>false,"onKeyUp"=>"doPaying()","autocomplete"=>"off","onkeypress"=>"return isNumber(event)","maxlength"=>"8"))?></td>
											</tr>
											<?php $i++;
										}
										
									}
									?>
									<input type="hidden" name="total_count" id="total_count" value="<?php echo $i-1;?>">
								</table>
							</div>
						</div>
						<div class="row">
							<div class="col-md-5"><?php echo $this->Form->input("remarks",array("type"=>"textarea","class"=>"form-control","rows"=>"2")); ?>
							<?php echo $this->Form->input("next_payment_date",array("type"=>"text","class"=>"form-control","id"=>"datepicker1")); ?></div>
							 
							 <div class="col-md-7">
								<div class="row">
									<label class="col-md-7" style="text-align:right">Total Payable Amount</label>
									<div class="col-md-5"><?php echo $this->Form->input("payable_amount",array("type"=>"hidden","value"=>$payable_amount,"id"=>"payable_amount")); ?>
														 <?php echo number_format($payable_amount,2) ;?>
									</div>
								</div>
								<div class="row">
									<label class="col-md-7" style="text-align:right">Previous Paid Amount</label>
									<div class="col-md-5"><?php echo $this->Form->input("paid_amount",array("type"=>"hidden","value"=>$student_paid_amount,"id"=>"paid_amount")); ?>
										<?php echo number_format($student_paid_amount,2) ;
											$total_balance = $payable_amount -$student_paid_amount;
										?>
										
									</div>
								</div>
							
							<div class="row">
								<div class="form-horizontal">
									<label class="col-md-7" style="text-align:right">Now Paying Amount<span class="mandatory_fields">*</span> </label>
									<div class="col-md-5"><?php echo $this->Form->input("paying_amount",array("type"=>"text","id"=>"paying_amount","class"=>"form-control",
									 "required","label"=>false,"value"=>"0","readonly")); ?></div>
								</div>
							</div>  
							
							<div class="row">
								<div class="form-horizontal">		
									<label class="col-md-7" style="text-align:right">Fine Amount</label>
									<div class="col-md-5"><?php echo $this->Form->input("fine_amount",array("type"=>"text","class"=>"form-control","label"=>false,'value'=>"0.0","id"=>"fine_amount","onkeypress"=>"return isNumber(event)")); ?></div>
								</div>
							</div>
							<div class="row">
								<div class="form-horizontal">	
									<label class="col-md-7" style="text-align:right">Balance Amount to be pay</label>
									<div class="col-md-5"><?php echo $this->Form->input("balance_amount",array("type"=>"text","class"=>"form-control","id"=>"balance_amount","label"=>false,"value"=>$total_balance,"onFocus"=>"doFine()","readonly")); ?></div>
								</div>
							</div>
							</div>
						</div>
						
						<div class="row">
							<div class="col-md-5"></div>
							<div class="col-md-2"><?php echo $this->Form->submit("Collection",array("class"=>"btn btn-info"));?></div>
							<div class="col-md-5"><?php echo $this->Html->link("Cancel",array("controller"=>"FeeCollection","action"=>"listFeeCollectionRte"),array("escapse"=>false,"class"=>"btn btn-info"))?></div>
						</div>
					</div>
				</div>
			</div> 
			<div class="col-md-2">&nbsp;</div>
			
		</div>
	</div>
	<?php echo $this->Form->end(); ?>
	<?php 
		} // Empty checking
		else
		{
			?>
			<div class="row">
				<div class="col-md-2">&nbsp;</div>
				<div class="col-md-8">
						 <div class='alert alert-info fade in' style='height:50px'>
								<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
								<i class='glyphicon glyphicon-info-sign'></i>  FEE NOT YET ASSIGN.</div>
				</div>
			<?php 
		}
	} ?> 
 
	</section>
    <!-- content -->
  </div>
  <!-- content-wrapper -->
  
  <script>
    <!--AUTO COMPLETE REFERENCE -->
  
var $j = jQuery.noConflict();
  $j(function() {
    var availableTags = [<?=$student?>];
    $j( "#student_code" ).autocomplete({
      source: availableTags
    });
  } ); 
 <!--AUTO COMPLETE REFERENCE -->
 
 <!--PAYING AMOUNT CAL -->
 function doPaying()
 {
	var total_paying_amount = parseInt(0);  
	var paying_amount =  parseInt(0);
	var balance_amount_ = parseInt(0);
	var payable_amount = parseInt(0);
	var paid_amount = parseInt(0);
	var total_balance_amount_ = parseInt(0);
	var total_paid = parseInt(0);
	
	payable_amount = parseInt($("#payable_amount").val());	
	paid_amount = parseInt($("#paid_amount").val());
	if(isNaN(paid_amount))	
	{
		paid_amount = parseInt(0);
	}
	 
	var total_count = parseInt($("#total_count").val()); 
	for(i=1;i<=total_count;i++)
	{
		var paying_amount  = parseInt($("#fee_paying_amount"+i).val()); 
		total_paying_amount = total_paying_amount + paying_amount;
		 
	} 
	$("#paying_amount").val(total_paying_amount); 
	 
	balance_amount_ = payable_amount - paid_amount;
	total_balance_amount_ = balance_amount_ - total_paying_amount;
	 
	$("#balance_amount").val(total_balance_amount_); 
	total_paid = total_paying_amount + paid_amount;
	if(total_paid>payable_amount)
	{
		alert("Paying amount not gretaer than total payable amount...");
		$("#balance_amount").val(0); 
		$("#paying_amount").val(0); 
		for(i=1;i<=total_count;i++)
		{
			var paying_amount  = parseInt($("#fee_paying_amount"+i).val(0)); 
			 
			 
		} 
		return false; 
	} 
 }
 
 
 // FOR GET THE FINE AMOUNT
 function doFine()
 {
	var fine = parseInt(0);
	var balance_amount = parseInt(0);
	var tot_amount = parseInt(0);
	
	balance_amount =  parseInt($("#balance_amount").val());
	fine =  parseInt($("#fine_amount").val());
	tot_amount =  fine + balance_amount ;
	
	$("#balance_amount").val(tot_amount);
	tot_amount = parseInt(0);
 }
  </script>
  
  <script>
  jQuery(document).ready(function($){
     $(" #year,#class_id").on('change', function () {

 		

         var year = $('#year').val();
         console.log(year);

         var class_id = $('#class_id').val();

         $("#student_detail_id").find('option').remove();

         if (class_id) {


             $.ajax({
                 type: "POST",
                 url: '<?php echo Router::url(array("controller" => "FeeCollection", "action" => "getStudents")); ?>',
                 data: {year: year,class_id: class_id},
                 cache: false,
                 success: function (html) {
                     console.log(html);

                     $.each(html, function (key, value) {
                         $('<option>').val('').text('select');
                         $('<option>').val(key).text(value).appendTo($("#student_detail_id"));
                     });
                 }
             });
         }
     });
});
 </script>    