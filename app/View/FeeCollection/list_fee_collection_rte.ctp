 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
	  <h1>List of RTE Fee </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Fee</a></li>
        <li class="active">List of Management Fee</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
		<div class="row"> 
			<!------------------------------------>
			 
			<?php echo $this->Form->create('RteFeeCollection',array("url"=>array("controller"=>"FeeCollection","action"=>"listFeeCollectionRte")));?>
				<div class="form-horizontal">
					<div class="col-md-2">&nbsp;</div>
					<div class="col-md-6"> 
						<div class="box box-warning"> 
							<div class="box-header with-border">
								<div class="row"> 
									<div class="col-md-4">
										<label>Academic Year <span class="mandatory_fields">*</span></label>
										<?php echo $this->Form->input("academic_year_id",array("type"=>"select","options"=>$academic_year_array,"class"=>"form-control select_box","empty"=>"Select","required","label"=>false));?>		
									</div>
									<div class="col-md-4">
										<label>Class <span class="mandatory_fields">*</span></label>
										<?php echo $this->Form->input("add_class_id",array("type"=>"select","options"=>$class_array,"class"=>"form-control select_box","empty"=>"select","required","label"=>false));?>		
									</div> 			
									<div class="col-md-4"><br>
										<?php echo $this->Form->submit("Submit",array("class"=>"btn btn-primary btn-sm",'name'=>'show_btn','value'=>'Show')); ?>
									</div>
								</div>
								
							</div>
						</div>
					</div>
					<div class="col-md-2">&nbsp;</div>
				</div>  
		</div>
	 <div class="row"> 
		<div class="col-md-2">&nbsp;</div>
		<div class="col-md-6"><?php echo $this->Session->flash();?></div>
		<div class="col-md-4">&nbsp;</div>
	 </div>
	<?php if(isset($_POST['show_btn'])!=''){?>
  <!------------ Add Category  ----------->
		<div class="row">
			<div class="col-md-6"> </div> 
		   <div class="col-md-3"> </div> 
			<div class="col-md-3"><?php echo $this->Html->link("Add RTE Fee",array("controller"=>"FeeCollection","action"=>"feeCollectionRte"),array("escapse"=>false,"class"=>"btn btn-info"))?></div>
		</div>
	 
	 <div class="row">
        <!-- left column --> 
        <div class="col-md-12">
			 
	
        <!-- right column -->
        <div class="col-md-12">
		
          <div class="box box-warning">
			  <div class="box-body">
				<table class="table table-bordered" id="example1">
					<thead>
						<tr><th>Sl.No</th><th>Student Code</th><th>Name</th><th>Academic Year</th><th>Class</th><th>Receipt #</th><th>Date</th><th>Payable Fee</th><th>Paying Fee</th><th>Tot Paid</th><th>Balance</th><th>Details</th><th>Action</th></tr>
					</thead>
					<?php 
						//print_r($class_fee_list);
						$i=1;
						$total_paid = 0;
						foreach($list_of_collection as $list):
						$total_paid = $total_paid + $list['RteFeeCollection']['paying_amount'];
					?>
						<tr>
							<td><?php echo $i++;?></td>
							<td><?php echo $list['StudentDetail']['student_code'];?></td>
							<td><?php echo $list['StudentDetail']['student_name'];?></td>
							<td><?php echo $list['AcademicYear']['academic_year'];?></td>
							<td><?php echo $list['AddClass']['class_name'];?></td>
							<td><?php echo $list['RteFeeCollection']['receipt_no'];?></td>
							<td><?php echo date('d-m-Y',strtotime($list['RteFeeCollection']['receipt_date']));?></td>
							<td><?php echo $list['RteFeeCollection']['payable_amount'];?></td>
							<td><?php echo $list['RteFeeCollection']['paying_amount'];?></td>
							<td><?php echo $total_paid;?></td>
							<td><?php echo $list['RteFeeCollection']['balance_amount'];?></td>
							<td><?php echo $this->Html->link('<i class="fa fa-eye" ></i>',
											array("controller"=>"FeeCollection","action"=>"feeCollectionRteView", $list['RteFeeCollection']['id']),
											array("escape"=>false)); ?></td>
							<td> 
							 <?php echo $this->Html->link('<i class="fa fa-trash-o" ></i>',
								array("controller"=>"FeeCollection","action"=>"deleteFeeCollectionRte", $list['RteFeeCollection']['id']),
								array("confirm"=>"Are you sure you want ro delete?", "escape"=>false)); ?>  | 
							<?php echo $this->Html->link('<i class="fa fa-pencil" ></i>',
											array("controller"=>"FeeCollection","action"=>"editFeeCollectionRte", $list['RteFeeCollection']['id']),
											array("escape"=>false)); ?> | 
							<?php echo $this->Html->link('<i class="fa fa-print" ></i>',
											array("controller"=>"FeeCollection","action"=>"feeCollectionRtePrint", $list['RteFeeCollection']['id']),
											array("escape"=>false,"target"=>"_blank")); ?></td>
						</tr> 
					<?php endforeach; 
					$total_paid = 0;
					?>
					
				</table>  
			</div>
        </div> 
      </div>
      <!-- row --> 
			</div>
		</div>
	</div>	  
        <!--col (left) --> 
	<?php } ?>  <!-- if condition close-->	
	</section>
    <!-- content -->
  </div>
  <!-- content-wrapper -->