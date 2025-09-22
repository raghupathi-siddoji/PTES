 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
	  <h1>List of Management Fee </h1>
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
			 
			<?php echo $this->Form->create('FeeCollection',array("url"=>array("controller"=>"FeeCollection","action"=>"listFeeCollection")));?>
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
			<div class="col-md-3"><?php echo $this->Html->link("Add Management Fee",array("controller"=>"FeeCollection","action"=>"feeCollectionManagement"),array("escapse"=>false,"class"=>"btn btn-info"))?></div>
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
						<tr><th>Sl.No</th><th>Student Code</th><th>Name</th><th>Receipt #</th><th>Date</th><th>Payable Fee</th><th>Paying Fee</th><th>Balance</th><th>View</th><th>Action</th></tr>
					</thead>
					<?php 
						//print_r($class_fee_list);
						$i=1;
						$total_paid = 0;
						foreach($list_of_collection as $list):
						//$total_paid = $total_paid + $list['FeeCollection']['paying_amount'];
					?>
						<tr>
							<td><?php echo $i++;?></td>
							<td><?php echo $list['StudentDetail']['student_code'];?></td>
							<td><?php echo $list['StudentDetail']['student_name'];?></td>
							 
							<td><?php echo $list['FeeCollection']['receipt_no'];?></td>
							<td><?php echo date('d-m-Y',strtotime($list['FeeCollection']['receipt_date']));?></td>
							<td><?php echo $list['FeeCollection']['payable_amount'];?></td>
							<td><?php echo $list['FeeCollection']['paying_amount'];?></td>
							 
							<td><?php echo $list['FeeCollection']['balance_amount'];?></td>
							<td><?php echo $this->Html->link('<i class="fa fa-eye" ></i>',
											array("controller"=>"FeeCollection","action"=>"feeCollectionManagementView", $list['FeeCollection']['id']),
											array("escape"=>false)); ?></td>
							<td> 
							 <?php echo $this->Html->link('<i class="fa fa-trash-o" ></i>',
								array("controller"=>"FeeCollection","action"=>"deleteFeeCollectionMgnt", $list['FeeCollection']['id']),
								array("confirm"=>"Are you sure you want ro delete?", "escape"=>false)); ?>  | 
							<?php echo $this->Html->link('<i class="fa fa-pencil" ></i>',
											array("controller"=>"FeeCollection","action"=>"editFeeCollectionMgnt", $list['FeeCollection']['id']),
											array("escape"=>false)); ?> | 
							<?php echo $this->Html->link('<i class="fa fa-print" ></i>',
											array("controller"=>"FeeCollection","action"=>"feeCollectionManagementPrint", $list['FeeCollection']['id']),
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