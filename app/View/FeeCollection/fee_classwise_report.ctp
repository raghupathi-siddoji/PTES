 <?php //print_r($govt_class_amount_array);?>
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
	  <h1>Class Fee Details</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Fee</a></li>
        <li class="active">Class wise Fee Details</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
  
	<div class="row"> 
		<!------------------------------------>
		 
		<?php echo $this->Form->create('FeeCollection',array("url"=>array("controller"=>"FeeCollection","action"=>"feeClasswiseReport")));?>
		
			<div class="form-horizontal">
				<div class="col-md-2">&nbsp;</div>
				<div class="col-md-6"> 
					<div class="box box-warning"> 
						<div class="box-header with-border">
							<div class="row"> 
								<div class="col-md-4">
									<label>Academic Year <span class="mandatory_fields">*</span></label>
									<?php echo $this->Form->input("academic_year_id",array("type"=>"select","options"=>$academic_year_array,"class"=>"form-control select_box","empty"=>"select","required","label"=>false));?>		
								</div>
								
								<div class="col-md-4">
									<label>Class <span class="mandatory_fields">*</span></label>
									<?php echo $this->Form->input("class_id",array("type"=>"select","options"=>$class_array,"class"=>"form-control select_box","empty"=>"select","required","label"=>false));?>		
								</div>  
								<div class="col-md-4"><br>
									<?php echo $this->Form->submit("Submit",array("class"=>"btn btn-primary btn-sm",'name'=>'show_btn','value'=>'Show')); ?>
								</div>
							</div>
							<!--<span><a href="" class="btn btn-primary btn-sm pull-right" data-toggle="modal" data-target="#management">Enter Student Code</a></span>-->
						</div>
					</div>
				</div>
				<div class="col-md-4">&nbsp;</div>
			</div>		
		<?php echo $this->Form->end(); ?> 
	</div>
	 
	
	<?php if(isset($_POST['show_btn'])!=''){
		$class_id = $this->request->data['FeeCollection']['class_id'];
		$academic_year_id = $this->request->data['FeeCollection']['academic_year_id']; 
	?>
	 	
	<div class="row">
		<div class="form-horizontal"> 
			<div class="col-md-12"> 
				<div class="box box-warning">			
					<div class="box-body">
						
						<div class="row">
							<div class="col-md-2">Class:</div>
							<div class="col-md-2"><?php echo $class_name;?></div>
							<div class="col-md-2">Academic Year:</div>
							<div class="col-md-1"><?php echo $academic_year;?> </div>
							<div class="col-md-1 col-md-push-4"><?php echo $this->Html->link('<i class="fa fa-print fa-2x" ></i>',
											array("controller"=>"FeeCollection","action"=>"feeClasswiseReportPrint", $class_id,$academic_year_id),
											array("escape"=>false,"target"=>"_blank","title"=>"Print")); ?></div>
						</div>
						<div class="row"> 
							<div class="col-md-12 text-center"><h4>Non RTE Students Fee Details </h4></div>
						</div>
						<!--DISPLAY START -->
							<table width="100%" class="table-bordered">
							  <tr style="background:#999999;color:white" align="center">
								<td>Sl.No</td>
								<td>Student Name</td>
								<td>Student Code</td>
								<td colspan="2">Total Payable Amount </td>
								<td colspan="2">Total Paid Amount </td> 
								<td colspan="2">Balance to be pay</td> 
							  </tr>
							  <tr align="center">
								<td> </td>
								<td> </td>
								<td> </td>
								<td>GOVT</td>
								<td >MGNT</td> 
								<td>GOVT</td>
								<td >MGNT</td> 
								<td>GOVT</td>
								<td >MGNT</td>
							 
								 
							  </tr>
							  <?php  
								$j=1;
								$govt_class_paid_amount_=0;
								$govt_class_class_amount_=0;
								$mgnt_class_paid_amount_ = 0;
								$mgnt_class_class_amount_ = 0;
								$govt_balance_amount = 0;
								$mgnt_balance_amount = 0;
								$mgnt_total_payable = 0;
								$mgnt_total_paid = 0;
								$mgnt_total_balance = 0;
								 
								$govt_total_payable = 0;
								$govt_total_paid = 0;
								$govt_total_balance = 0;
								
								$total_payable = 0;
								$total_paid = 0;
								$total_balance = 0;
								
								for($i=0;$i<count($student_details_array);$i++): 
									$govt_class_class_amount_=$govt_class_amount_array[$i];
									$mgnt_class_class_amount_ = $mgnt_class_amount_array[$i];
									$govt_class_paid_amount_= $govt_class_paid_amount_array[$i];
									$mgnt_class_paid_amount_= $mgnt_class_paid_amount_array[$i]; 
									
									//GETTING BALANCE AMOUNT
									$govt_balance_amount = $govt_class_class_amount_-$govt_class_paid_amount_;
									$mgnt_balance_amount = $mgnt_class_class_amount_-$mgnt_class_paid_amount_;
									
									//GETTING TOTAL AMOUNT
									$mgnt_total_payable = $mgnt_total_payable + $mgnt_class_class_amount_;
									$mgnt_total_paid = $mgnt_total_paid + $mgnt_class_paid_amount_;
									$mgnt_total_balance = $mgnt_total_balance + $mgnt_balance_amount;
									
									$govt_total_payable = $govt_total_payable + $govt_class_class_amount_;
									$govt_total_paid = $govt_total_paid + $govt_class_paid_amount_;
									$govt_total_balance = $govt_total_balance + $govt_balance_amount;
									
									//GETTING TOTAL FINAL AMOUNT
									$total_payable = $mgnt_total_payable + $govt_total_payable ;
									$total_paid = $mgnt_total_paid + $govt_total_paid;
									$total_balance = $mgnt_total_balance + $govt_total_balance;
									
								?>
								<tr >
									<td><?php echo $j;?></td>
									<td><?php echo $student_details_array[$i];?></td>
									<td><?php echo $student_details_code[$i];?></td>
									<td align="right"><?php echo $govt_class_class_amount_;?></td>
									<td align="right"> <?php echo $mgnt_class_class_amount_;?></td> 
									<td align="right"> <?php echo $govt_class_paid_amount_;?></td>
									<td align="right"><?php echo $mgnt_class_paid_amount_;?></td> 
									<td align="right"><?php echo number_format($govt_balance_amount,2);?></td>
									<td align="right"><?php echo number_format($mgnt_balance_amount,2);?></td>
									 
								</tr> 
							  <?php  $j++;endfor;?>
								  <tr align="right" style="font-weight:bold">
									<td> </td>
									<td> </td>
									<td> </td>
									<td><?PHP echo number_format($govt_total_payable,2);?></td>
									<td ><?PHP echo number_format($mgnt_total_payable,2);?></td> 
									<td><?PHP echo number_format($govt_total_paid,2);?></td>
									<td ><?PHP echo number_format($mgnt_total_paid,2);?></td> 
									<td><?PHP echo number_format($govt_total_balance,2);?></td>
									<td ><?PHP echo number_format($mgnt_total_balance,2);?></td> 
								  </tr>
								  <tr align="right" style="font-weight:bold;background:#999999;color:white">
									<td> </td>
									<td> </td>
									<td> </td>
									<td colspan="2"><?PHP ECHO "TOTAL PAYABLE : ";?>
									 <?PHP echo number_format($total_payable,2);?></td> 
									<td colspan="2"><?PHP echo "TOTAL PAID : ";?> 
									 <?PHP echo number_format($total_paid,2);?></td> 
									<td colspan="2"><?PHP echo "TOTAL BALANCE : ";?>
									 <?PHP echo number_format($total_balance,2);?></td> 
								  </tr>
							</table>
						<!--DISPLAY END -->
					</div>
				</div>
			</div> 
			 
		</div>
	</div> 
	
	<!-- FOR RTE STUDENT -->
	<div class="row">
		<div class="form-horizontal"> 
			<div class="col-md-12"> 
				<div class="box box-warning">			
					<div class="box-body"> 
						<div class="row"> 
							<div class="col-md-12 text-center"><h4>RTE Students Fee Details </h4></div>
						</div>
						<!--DISPLAY START -->
							<table width="100%" class="table-bordered">
							  <tr style="background:#999999;color:white" align="center">
								<td>Sl.No</td>
								<td>Student Name</td>
								<td>Student Code</td>
								<td  >Total Payable Amount </td>
								<td  >Total Paid Amount </td> 
								<td  >Balance to be pay</td> 
							  </tr>
							  
							  <?php  
								 
								$rte_class_class_amount_=0;
								$rte_class_paid_amount_ = 0; 
								$rte_balance_amount = 0; 
								 
								$rte_total_payable = 0;
								$rte_total_paid = 0;
								$rte_total_balance = 0; 
								
								$k=1;
								
								for($j=0;$j<count($student_details_array_rte);$j++): 
									 
									$rte_class_class_amount_ = $rte_class_amount_array[$j]; 
									$rte_class_paid_amount_= $rte_class_paid_amount_array[$j]; 
									
									//GETTING BALANCE AMOUNT
									$rte_balance_amount = $rte_class_class_amount_-$rte_class_paid_amount_; 
									
									//GETTING TOTAL AMOUNT
									$rte_total_payable = $rte_total_payable + $rte_class_class_amount_; 
									$rte_total_paid = $rte_total_paid + $rte_class_paid_amount_;
									$rte_total_balance = $rte_total_balance + $rte_balance_amount; 
								?>
								<tr >
									<td><?php echo $k;?></td>
									<td><?php echo $student_details_array_rte[$j];?></td>
									<td><?php echo $student_details_code_rte[$j];?></td> 
									<td align="right"> <?php  echo $rte_class_class_amount_;?></td>  
									<td align="right"><?php   echo $rte_class_paid_amount_;?></td>  
									<td align="right"><?php echo number_format($rte_balance_amount,2);?></td> 
								</tr> 
							  <?php  $k++;endfor;?>
								  <tr align="right" style="font-weight:bold">
									<td></td>
									<td></td><td></td>
									 
									<td  ><?PHP ECHO "TOTAL PAYABLE : ";?>
									 <?PHP echo number_format($rte_total_payable,2);?></td>  
									<td  ><?PHP echo "TOTAL PAID : ";?>  
									 <?PHP echo number_format($rte_total_paid,2);?></td>  
									<td  ><?PHP echo "TOTAL BALANCE : ";?>
									 <?PHP echo number_format($rte_total_balance,2);?></td> 
								  </tr>
								   
							</table>
						<!--DISPLAY END -->
					</div>
				</div>
			</div> 
			 
		</div>
	</div>
	
	
	<!-- FOR RTE STUDENT -->
	
	
	<?php echo $this->Form->end(); ?>
	<?php } ?> 
 
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
  </script>
  
      