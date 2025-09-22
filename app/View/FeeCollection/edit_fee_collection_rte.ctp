 <?php  //print_r($this->request->data);?>
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
	
	 
	<?php echo $this->Form->create('RteFeeCollection',array("url"=>array("controller"=>"FeeCollection","action"=>"editFeeCollectionRte")));?>
	<?php echo $this->Form->input("RteFeeCollection.student_detail_id",array("type"=>"hidden","value"=>$this->request->data['StudentDetail']['id']));?>
	<?php echo $this->Form->input("RteFeeCollection.add_class_id",array("type"=>"hidden","value"=>$this->request->data['AddClass']['id']));?>
	<?php echo $this->Form->input("RteFeeCollection.academic_year_id",array("type"=>"hidden","value"=>$this->request->data['AcademicYear']['id']));?>
	<?php echo $this->Form->input("RteFeeCollection.id");?>	
	<div class="row">
		<div class="col-md-6"> </div> 
			<div class="col-md-3"></div>
			<div class="col-md-3"> 
			<?php echo $this->Html->link('Go back',"javascript:history.back()",array("escapse"=>false,"class"=>"btn btn-info")); ?>
		</div>
	</div>
	
	<div class="row">
		<div class="form-horizontal">
			<div class="col-md-2">&nbsp;</div>
			<div class="col-md-8"> 
				<div class="box box-warning">			
					<div class="box-body">
						<div class="row">
							<div class="col-md-6"><label>Student Name :</label> <?php echo $this->request->data['StudentDetail']['student_name'];?></div> 
							<div class="col-md-2"><label>Student Code :</label></div>
							<div class="col-md-4"><?php echo $this->request->data['StudentDetail']['student_code'];?></div>
						</div>
						
						<div class="row">
						
							<div class="col-md-6"><label>Class :</label> <?php echo $this->request->data['AddClass']['class'];?></div> 
							<div class="col-md-2"><label>Receipt No :</label></div>
							<div class="col-md-4"><?php echo $this->Form->input("RteFeeCollection.receipt_no",array("type"=>"text","id"=>"fee",'label'=>false)); ?></div>
						</div>
						
						<div class="row">
							<div class="col-md-6"><label >Section :</label> <?php //echo $student_details['Section']['section'];?></div>
							<div class="col-md-2"><label>Receipt Date :</label></div>
							<div class="col-md-4"><?php echo $this->Form->input("RteFeeCollection.receipt_date",array("type"=>"text","id"=>"fee",'label'=>false,"id"=>"datepicker")); ?></div>
						</div>
						<div class="row"> 
							<div class="col-md-12">
								<table width="100%" class="table table-condensed" style="padding:5px;">
									<tr>
										<th>Sl.No</th>
										<th>Fee Head </th>
										<th>Fee Code</th>
										<th>Fee Amount</th>
										<th>Paying Amount</th>
									</tr>
										
									<?php 
									$i=1;
									$payable_amount = 0;
									 foreach($this->request->data['RteFeeCollectionDetail'] as $details) 
										{
											$payable_amount=$payable_amount + $details['fee_head_amount'];
											?>
											<tr>
												<td><?php echo $i;?></td>
												<td>
													<?php echo $this->Form->input("RteFeeCollectionDetail.id.",array("type"=>"hidden","id"=>"fee_head_name"."$i","value"=>$details['id'],"size"=>"10","label"=>false))?>
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
												<td><?php echo $this->Form->input("RteFeeCollectionDetail.fee_paying_amount.",array("type"=>"text","id"=>"fee_paying_amount"."$i","value"=>$details['fee_paying_amount'],"size"=>"10","label"=>false,"onKeyUp"=>"doPaying()","autocomplete"=>"off","maxlength"=>"8","onkeypress"=>"return isNumber(event)"))?></td>
											</tr>
											<?php $i++;
										}
									 
									?>
									<input type="hidden" name="total_count" id="total_count" value="<?php echo $i-1;?>">
								</table>
							</div>
						</div>
						<div class="row">
							<div class="col-md-5"><?php echo $this->Form->input("remarks",array("type"=>"textarea","class"=>"form-control","rows"=>"2")); ?>
							<?php echo $this->Form->input("RteFeeCollection.next_payment_date",array("type"=>"text","class"=>"form-control","id"=>"datepicker1")); ?></div>
							 
							 <div class="col-md-7">
								<div class="row">
									<label class="col-md-7" style="text-align:right">Payable Amount</label>
									<div class="col-md-5"><?php echo $this->Form->input("RteFeeCollection.payable_amount",array("type"=>"hidden","id"=>"payable_amount")); ?>
														 <?php 
														 $payable_amount = $this->request->data['RteFeeCollection']['payable_amount'];
														 echo number_format($payable_amount,2) ;?>
									</div>
								</div>
								<div class="row">
									<label class="col-md-7" style="text-align:right">Paid Amount</label>
									<div class="col-md-5"><?php echo $this->Form->input("RteFeeCollection.paid_amount",array("type"=>"hidden","id"=>"paid_amount")); ?>
										<?php 
										$student_paid_amount = $this->request->data['RteFeeCollection']['paid_amount'];
										echo number_format($student_paid_amount,2) ;
											//$total_balance = $payable_amount -$student_paid_amount;
										?>
										
									</div>
								</div>
							
							<div class="row">
								<div class="form-horizontal">
									<label class="col-md-7" style="text-align:right">Paying Amount</label>
									<div class="col-md-5"><?php echo $this->Form->input("RteFeeCollection.paying_amount",array("type"=>"text","id"=>"paying_amount","class"=>"form-control",
									 "required","label"=>false,"maxlength"=>"8","onkeypress"=>"return isNumber(event)","readonly")); ?></div>
								</div>
							</div>  
							
							<div class="row">
								<div class="form-horizontal">		
									<label class="col-md-7" style="text-align:right">Fine Amount</label>
									<div class="col-md-5"><?php echo $this->Form->input("RteFeeCollection.fine_amount",array("type"=>"text","class"=>"form-control","label"=>false,"id"=>"fine_amount","onkeypress"=>"return isNumber(event)","maxlength"=>"3")); ?></div>
								</div>
							</div>
							<div class="row">
								<div class="form-horizontal">	
									<label class="col-md-7" style="text-align:right">Balance</label>
									<div class="col-md-5"><?php echo $this->Form->input("RteFeeCollection.balance_amount",array("type"=>"text","class"=>"form-control","id"=>"balance_amount","label"=>false ,"onFocus"=>"doFine()","readonly","onkeypress"=>"return isNumber(event)")); ?></div>
								</div>
							</div>
							</div>
						</div>
						
						<div class="row">
							<div class="col-md-5"></div>
							<div class="col-md-4"><?php echo $this->Form->submit("Collection",array("class"=>"btn btn-info"));?></div>
							<div class="col-md-3"></div>
						</div>
					</div>
				</div>
			</div> 
			<div class="col-md-2">&nbsp;</div>
			
		</div>
	</div>
	<?php echo $this->Form->end(); ?>
	 
 
	</section>
    <!-- content -->
  </div>
  <!-- content-wrapper -->
  
  <script>
 
 
 <!--PAYING AMOUNT CAL -->
 function doPaying()
 {
	var total_paying_amount = parseInt(0);  
	var paying_amount =  parseInt(0);
	var balance_amount_ = parseInt(0);
	var payable_amount = parseInt(0);
	var paid_amount = parseInt(0);
	var total_balance_amount_ = parseInt(0);
	
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
	if(total_paying_amount>payable_amount)
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
  
      