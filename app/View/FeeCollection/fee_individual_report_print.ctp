						<?php print_r($mgnt_fee_details);?>
						<div class="row">
							<div class="col-md-2">Student Name: </div>
							<div class="col-md-4 "><?php echo $student_details['StudentDetail']['student_name'];?></div>
							<div class="col-md-2">Class:</div>
							<div class="col-md-4"> <?php echo $student_details['AddClass']['class_name'];?></div>
						</div>
						<div class="row">
							<div class="col-md-2">Academic Year:</div>
							<div class="col-md-4"><?php echo $student_details['AcademicYear']['academic_year'];?></div>
							<div class="col-md-2">Student Code:</div>
							<div class="col-md-4"><?php echo $student_details['StudentDetail']['student_code'];?> </div>
						</div>
						<div class="row"> 
							<div class="col-md-2"> MPM/Non MPM : </div>
							<div class="col-md-4"><?php echo $student_details['StudentDetail']['mpm_employee'];?></div>
							<div class="col-md-2">  Caste : </div>
							<div class="col-md-4"><?php echo $student_details['Caste']['caste'];?></div>
						</div>
						<div class="row">
							 
							<div class="col-md-12 text-center"><h4>Management Fee Details</h4></div>
						</div>
						<!--DISPLAY START -->
							<table width="100%" class="table">
							  <tr style="background:#999999;color:white">
								<td>Sl.No</td>
								<td>Date</td>
								<td>Receipt No </td>
								<td>Total Payable Amount </td>
								<td>Paying Amount </td>
								<td>Fine</td>
								<td>Balance to be pay</td>
								<td>View</td>
								<td>Print</td>
							  </tr>
							  <?php 
								$i=1;
								foreach($mgnt_fee_details as $mgnt_fee):?>
								  <tr>
									<td><?php echo $i++;?></td>
									<td><?php echo date('d-m-Y',strtotime($mgnt_fee['FeeCollection']['receipt_date']));?></td>
									<td><?php echo $mgnt_fee['FeeCollection']['receipt_no'];?></td>
									<td><?php echo $mgnt_fee['FeeCollection']['payable_amount'];?></td>
									<td><?php echo $mgnt_fee['FeeCollection']['paying_amount'];?></td>
									<td><?php echo $mgnt_fee['FeeCollection']['fine_amount'];?></td>
									<td><?php echo $mgnt_fee['FeeCollection']['balance_amount'];?></td>
									<td><?php echo $this->Html->link('<i class="fa fa-eye" ></i>',
											array("controller"=>"FeeCollection","action"=>"feeCollectionManagementView", $mgnt_fee['FeeCollection']['id']),
											array("escape"=>false)); ?></td>
									<td><?php echo $this->Html->link('<i class="fa fa-print" ></i>',
											array("controller"=>"FeeCollection","action"=>"feeCollectionManagementPrint", $mgnt_fee['FeeCollection']['id']),
											array("escape"=>false,"target"=>"_blank")); ?></td>
								  </tr>
							  <?php endforeach;?>
							</table>
	 
	<!-- Govt -->
 
						 
					 
						<center"><h4>Govt Fee Details</h4></center>
						 
						<!--DISPLAY START -->
							<table width="100%" class="table">
							  <tr style="background:#999999;color:white">
								<td>#</td>
								<td>Date</td>
								<td>Receipt No </td>
								<td>Payable Amount </td>
								<td>Paying Amount </td>
								<td>Fine</td>
								<td>Balance</td>
								<td>View</td>
								<td>Print</td>
							  </tr>
							  <?php 
								$i=1;
								if(!empty($govt_fee_details)){
									foreach($govt_fee_details as $govt_fee):?>
									  <tr>
										<td><?php echo $i++;?></td>
										<td><?php echo date('d-m-Y',strtotime($govt_fee['GovtFeeCollection']['receipt_date']));?></td>
										<td><?php echo $govt_fee['GovtFeeCollection']['receipt_no'];?></td>
										<td><?php echo $govt_fee['GovtFeeCollection']['payable_amount'];?></td>
										<td><?php echo $govt_fee['GovtFeeCollection']['paying_amount'];?></td>
										<td><?php echo $govt_fee['GovtFeeCollection']['fine_amount'];?></td>
										<td><?php echo $govt_fee['GovtFeeCollection']['balance_amount'];?></td>
										<td><?php echo $this->Html->link('<i class="fa fa-eye" ></i>',
												array("controller"=>"FeeCollection","action"=>"feeCollectionGovtView", $govt_fee['GovtFeeCollection']['id']),
												array("escape"=>false)); ?></td>
										<td><?php echo $this->Html->link('<i class="fa fa-print" ></i>',
												array("controller"=>"FeeCollection","action"=>"feeCollectionGovtPrint", $govt_fee['GovtFeeCollection']['id']),
												array("escape"=>false,"target"=>"_blank")); ?></td>
									  </tr>
								  <?php endforeach; }
								  else{ ?>
										<tr><td colspan="9">No record found...</td></tr>
								  <?php }?>
							</table>
						<!--DISPLAY END -->
			 
	<!-- Govt -->
	
	<!-- RTE -->
	 
						 <center><h4>RTE Fee Details</h4></center>
						 
						<!--DISPLAY START -->
							<table width="100%" class="table">
							  <tr style="background:#999999;color:white">
								<td>#</td>
								<td>Date</td>
								<td>Receipt No </td>
								<td>Payable Amount </td>
								<td>Paying Amount </td>
								<td>Fine</td>
								<td>Balance</td>
								<td>View</td>
								<td>Print</td>
							  </tr>
							  <?php 
								$i=1;
								if(!empty($rte_fee_details)){
									foreach($rte_fee_details as $rte_fee):?>
									  <tr>
										<td><?php echo $i++;?></td>
										<td><?php echo date('d-m-Y',strtotime($rte_fee['RteFeeCollection']['receipt_date']));?></td>
										<td><?php echo $rte_fee['RteFeeCollection']['receipt_no'];?></td>
										<td><?php echo $rte_fee['RteFeeCollection']['payable_amount'];?></td>
										<td><?php echo $rte_fee['RteFeeCollection']['paying_amount'];?></td>
										<td><?php echo $rte_fee['RteFeeCollection']['fine_amount'];?></td>
										<td><?php echo $rte_fee['RteFeeCollection']['balance_amount'];?></td>
										<td><?php echo $this->Html->link('<i class="fa fa-eye" ></i>',
												array("controller"=>"FeeCollection","action"=>"feeCollectionRteView", $rte_fee['RteFeeCollection']['id']),
												array("escape"=>false)); ?></td>
										<td><?php echo $this->Html->link('<i class="fa fa-print" ></i>',
												array("controller"=>"FeeCollection","action"=>"feeCollectionRtePrint", $rte_fee['RteFeeCollection']['id']),
												array("escape"=>false,"target"=>"_blank")); ?></td>
									  </tr>
								  <?php endforeach; }
								  else{ ?>
										<tr><td colspan="9">No record found...</td></tr>
								  <?php }?>
							</table>
						<!--DISPLAY END -->
 
	
	
	 