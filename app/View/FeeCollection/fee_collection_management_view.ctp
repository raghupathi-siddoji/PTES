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
		<div class="form-horizontal">
			<div class="col-md-2">&nbsp;</div>
			<div class="col-md-8"> 
				<div class="box box-warning">			
					<div class="box-body"> 
						<div class="row">
							<div class="col-md-3"> </div>
							<div class="col-md-3"></div>
							<div class="col-md-3"> </div>
							<div class="col-md-3">
							<?php echo $this->Html->link('go back',"javascript:history.back()",array("escapse"=>false,"class"=>"btn btn-info")); ?>
							<?php //echo $this->Html->link("Go Back",array("controller"=>"FeeCollection","action"=>"feeIndividualReport"),array("escapse"=>false,"class"=>"btn btn-info"))?></div>
						</div>
						 
						
						<!--DISPLAY START -->
							<table width="100%" class="table">
							  <tr style="background:grey;color:white">
								<td>Sl.No</td>
								<td>Fee Particular</td>
								<td>Fee Code </td>
								<td>Fee Head</td>
								<td>Paying Amount</td>
							  </tr>
							 <?php 
								$i=1;
								foreach($receipt_details['FeeCollectionDetail'] as $fee_details):?>
								  <tr>
									<td width="10%"><?php echo $i;?></td>
									<td ><?php echo $fee_details['fee_head_name'];?></td>
									<td align="center"><?php echo $fee_details['fee_head_code'];?></td>
									<td align="center"><?php echo $fee_details['fee_head_amount'];?></td>
									<td align="center"><?php echo $fee_details['fee_paying_amount'];?></td>
									 
								  </tr>
								<?php $i++;endforeach;?>	
							</table>
						<!--DISPLAY END -->
					</div>
				</div>
			</div> 
			<div class="col-md-2">&nbsp;</div>
			
		</div>
	</div> 
	</section>
    <!-- content -->
  </div>
  <!-- content-wrapper --> 