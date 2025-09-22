 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
	  <h1>Fee </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Fee</a></li>
        <li class="active">Fee Head Assign</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
     
  <!------------ Add Category  ----------->
	 <div class="row">
        <!-- left column -->
		<div class="col-md-1">&nbsp;</div>
        <div class="col-md-10">
			 
	
        <!-- right column -->
        <div class="col-md-12">
		
          <div class="box box-warning">
			<div class="box-header with-border">Fee Assign For RTE
            <span><?php echo $this->Html->link('RTE Fee assign',array("controller"=>"FeeCollection","action"=>"feeAssignRte"),array("escape"=>false,"class"=>"btn btn-primary btn-sm pull-right"));?></span>
			</div> 
			  <div class="box-body">
				<table class="table table-bordered" id="example1">
					<thead>
						<tr><th>Sl.No</th><th>Academic Year</th><th>Class</th> <th>Type of Fees</th><th>Language</th> <th>Payable Amount</th><th>Action</th></tr>
					</thead>
					<?php 
						//print_r($class_fee_list);
						$i=1;
						foreach($rte_fee_list as $list):
					?>
						<tr>
							<td><?php echo $i++;?></td>
							<td><?php echo $list['AcademicYear']['academic_year'];?></td>
							<td><?php echo $list['AddClass']['class'];?></td> 
							<td><?php echo $list['FeeClassWises']['fee_type'];?></td> 
							<td><?php echo $list['FeeClassWises']['apply_for'];?></td>
							<td><?php echo $list['FeeClassWises']['total_payable'];?></td>  
							<td> 
							 <?php echo $this->Html->link('<i class="fa fa-trash-o" ></i>',
								array("controller"=>"FeeCollection","action"=>"deleteFeeAssignRte", $list['FeeClassWises']['id']),
								array("confirm"=>"Are you sure you want ro delete?", "escape"=>false)); ?>  | 
							<?php echo $this->Html->link('<i class="fa fa-pencil" ></i>',
											array("controller"=>"FeeCollection","action"=>"editFeeAssignRte", $list['FeeClassWises']['id']),
											array("escape"=>false)); ?> | 
							<?php echo $this->Html->link('Fee Breakup',
											array("controller"=>"FeeCollection","action"=>"viewFeeAssignRte", $list['FeeClassWises']['id']),
											array("escape"=>false)); ?></td>
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