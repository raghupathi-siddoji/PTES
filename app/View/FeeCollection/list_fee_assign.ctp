<?php //print_r($class_fee_list);?>
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
	  <h1>List of Fee Assign </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">List of Fee Assign</a></li>
        <li class="active">Fee Head Assign</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
     
  <!------------ Add Category  ----------->
		<div class="row">
			<div class="col-md-6"> </div> 
			<div class="col-md-3"> </div> 
			<div class="col-md-3"><?php echo $this->Html->link("Assign Fee",array("controller"=>"FeeCollection","action"=>"feeAssignOther"),array("escapse"=>false,"class"=>"btn btn-info"))?></div>
		</div>
		
	 <div class="row">
        <!-- left column -->
		<div class="col-md-1">&nbsp;</div>
        <div class="col-md-11">
			 
	
        <!-- right column -->
        <div class="col-md-12">
		
          <div class="box box-warning">
			  <div class="box-body">
				<table class="table table-bordered" id="example1">
					<thead>
						<tr><th>Sl.No</th><th>Academic Year</th><th>Class</th><th>Fee Category</th><th>Type of Fees</th><th>MPM/Non MPM</th><th>Payable Amount</th><th>Action</th></tr>
					</thead>
					<?php 
						//print_r($class_fee_list);
						$i=1;
						foreach($class_fee_list as $list):
					?>
						<tr>
							<td><?php echo $i++;?></td>
							<td><?php echo $list['AcademicYear']['academic_year'];?></td>
							<td><?php echo $list['AddClass']['class'];?></td>
							<td><?php echo $list['FeeClassWises']['caste_id'];?></td>
							<td><?php echo $list['FeeClassWises']['fee_type'];?></td>
							<td><?php echo $list['FeeClassWises']['apply_for'];?></td>
							<td><?php echo $list['FeeClassWises']['total_payable'];?></td>
							<td> 
							 <?php echo $this->Html->link('<i class="fa fa-trash-o" ></i>',
								array("controller"=>"FeeCollection","action"=>"deleteFeeAssign", $list['FeeClassWises']['id']),
								array("confirm"=>"Are you sure you want ro delete?", "escape"=>false)); ?>  | 
							<?php echo $this->Html->link('<i class="fa fa-pencil" ></i>',
											array("controller"=>"FeeCollection","action"=>"editFeeAssignOther", $list['FeeClassWises']['id']),
											array("escape"=>false)); ?> | 
							<?php echo $this->Html->link('Fee Breakup',
											array("controller"=>"FeeCollection","action"=>"viewFeeAssignOther", $list['FeeClassWises']['id']),
											array("escape"=>false)); ?> </td>
						</tr> 
					<?php endforeach; ?>
				</table> 
			</div>
        </div>
		  <?php echo $this->Session->flash();?>
      </div>
      <!-- row --> 
			</div>
		</div>
	</div>	  
        <!--col (left) --> 
		
	</section>
    <!-- content -->
  </div>
  <!-- content-wrapper -->