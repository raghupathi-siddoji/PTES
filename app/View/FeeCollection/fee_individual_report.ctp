 <?php //print_r($govt_student_paid_amount);?>
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
	  <h1>Student Individual Fee Details</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Fee</a></li>
        <li class="active">Fee Collection</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
  
	<div class="row"> 
		<!------------------------------------>
		 
		<?php echo $this->Form->create('FeeCollection',array("url"=>array("controller"=>"FeeCollection","action"=>"feeIndividualReport")));?>
		
			<div class="form-horizontal">
				<div class="col-md-2">&nbsp;</div>
				<div class="col-md-8"> 
					<div class="box box-warning"> 
						<div class="box-header with-border">
							<div class="row">
								<div class="col-md-3">
									<label>Academic Year <span class="mandatory_fields">*</span></label>
									<?php echo $this->Form->input("academic_year_id",array("type"=>"select","options"=>$academic_year_array,"class"=>"form-control select_box","empty"=>"select","required","label"=>false));?>		
								</div>
								
								<div class="col-md-3">
									<label>Class <span class="mandatory_fields">*</span></label>
									<?php echo $this->Form->input("add_class_id",array("type"=>"select","options"=>$class_array,"class"=>"form-control select_box","empty"=>"select","required","label"=>false));?>		
								</div>  
								<div class="col-md-3">
									<label>Student Code/ name <span class="mandatory_fields">*</span></label>
									<?php echo $this->Form->input("student_code",array("type"=>"text","id"=>"student_code","class"=>"form-control","required","placeholder"=>"Type Student name or Code","label"=>false)); ?>
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
	
	<?php if(isset($_POST['show_btn'])!=''){
		$student_code = $this->request->data['FeeCollection']['student_code'];
		$academic_year_id = $this->request->data['FeeCollection']['academic_year_id'];
		
	?>
	 	
	<div class="row">
		<div class="form-horizontal">
			<div class="col-md-2">&nbsp;</div>
			<div class="col-md-8"> 
				<div class="box box-warning">			
					<div class="box-body"> 
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
						<!--DISPLAY END -->
					</div>
				</div>
			</div> 
			<div class="col-md-2">&nbsp;</div>
			
		</div>
	</div>
	<!-- Govt -->
	<div class="row">
		<div class="form-horizontal">
			<div class="col-md-2">&nbsp;</div>
			<div class="col-md-8"> 
				<div class="box box-warning">			
					<div class="box-body"> 
						 
						<div class="row"> 
							<div class="col-md-12 text-center"><h4>Govt Fee Details</h4></div>
						</div>
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
					</div>
				</div>
			</div> 
			<div class="col-md-2">&nbsp;</div>
			
		</div>
	</div>
	<!-- Govt -->
	
	<!-- RTE -->
	<div class="row">
		<div class="form-horizontal">
			<div class="col-md-2">&nbsp;</div>
			<div class="col-md-8"> 
				<div class="box box-warning">			
					<div class="box-body"> 
						 
						<div class="row"> 
							<div class="col-md-12 text-center"><h4>RTE Fee Details</h4></div>
						</div>
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
					</div>
				</div>
			</div> 
			<div class="col-md-2">&nbsp;</div>
			
		</div>
	</div>
	<!-- RTE -->
	
	
	
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
  
      