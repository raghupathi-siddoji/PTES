 <div class="wrapper"> 
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
           Asset Maintenance
           </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		 <li><a href="#">Asset Maintenance</a></li>
        <li class="active">Add Asset</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
           
          <!------------"Add Subject" created: 20 aug 2016 ----------->
		  
			 <div class="row">
				<!-- left column -->
				
				<div class="col-md-5">
				  <div class="box box-success">
				<br>
					<div class="box-header with-border">
					  <h3 class="box-title">Add Asset</h3>
					</div>
					<!-- form start -->
				   <?php echo $this->Form->create('Asset',array("url"=>array("controller"=>"Asset","action"=>"addAsset")));?>
				   <?php echo  $this->Form->input('id');?>
					
					  <div class="box-body">
						<div class="form-group">
							<div class="row">
								<div class="col-sm-5"><label>Academic year<span class="mandatory_fields">*</span></label></div>
								<div class="col-sm-7">
									 	<?php echo $this->Form->input('academic_year_id',array('type'=>'select','id'=>'select','options'=>$academic_year_array,"label"=>false,"class"=>"form-control select_box","required","empty"=>"select"));?>
							
								</div>
							</div>
							<br>
							<div class="row">
								<div class="col-sm-5"><label>Category<span class="mandatory_fields">*</span></label></div>
								<div class="col-sm-7">
									 	<?php echo $this->Form->input('asset_category_id',array('type'=>'select','id'=>'select','options'=>$category_list,"label"=>false,"class"=>"form-control select_box","required","empty"=>"select"));?>
							
								</div>
							</div>
							<br>
							<div class="row">
								<div class="col-sm-5"><label>Belongs To<span class="mandatory_fields">*</span></label></div>
								<div class="col-sm-7">
								   	<?php $month = array("School"=>"School","Students"=>"Students","Teachers"=>"Teachers","Admin"=>"Admin");?>   
									<?php echo $this->Form->input("belongs_to",array("type"=>"select","options"=>$month,"label"=>false,"class"=>"form-control select_box","required","empty"=>"select"));?>		  
								
								</div>
							</div>
							<br>
							<div class="row">
								<div class="col-sm-5"><label>Asset Name<span class="mandatory_fields">*</span></label></div>
								<div class="col-sm-7">
								  <?php echo $this->Form->input('asset_name',array("type"=>"text","class"=>"form-control input-sm","label"=>false,"required"));?>
								</div>
							</div>
							
							<br>
							<div class="row">
								<div class="col-sm-5"><label>Working Asset<span class="mandatory_fields">*</span></label></div>
								<div class="col-sm-7">
								 <?php echo $this->Form->input('working_asset',array("type"=>"text","class"=>"form-control input-sm","label"=>false,"required","onkeypress"=>"return isNumber(event)","id"=>"working_asset" ));?>
								</div>
							</div>
							<br>
							<div class="row">
								<div class="col-sm-5"><label>Damaged Asset<span class="mandatory_fields">*</span></label></div>
								<div class="col-sm-7">
								 <?php echo $this->Form->input('damaged_asset',array("type"=>"text","class"=>"form-control input-sm","label"=>false,"required","onkeypress"=>"return isNumber(event)","id"=>"damaged_asset" ));?>
								</div>
							</div>
							<br>
							<div class="row">
								<div class="col-sm-5"><label>Total Asset<span class="mandatory_fields">*</span></label></div>
								<div class="col-sm-7">
								 <?php echo $this->Form->input('total_asset',array("type"=>"text","class"=>"form-control input-sm","label"=>false,"required","onkeypress"=>"return isNumber(event)","id"=>"total_asset","onFocus"=>"return get_total_asset()"));?>
								</div>
							</div>
							<br>
							<div class="row">
								<div class="col-sm-5"><label>Purchased Date</label></div>
								<div class="col-sm-7">
									 <?php //echo $this->Form->input('purchased_date',array("type"=>"text","class"=>"form-control input-sm","label"=>false));?>
									  <?php echo $this->Form->input('purchased_date',array("type"=>"text","class"=>"form-control","label"=>false,"id"=>"datepicker","placeholder"=>"dd-mm-yyyy"));?>
								</div>
							</div>
							<br>
							<div class="row">
								<div class="col-sm-5"><label>Brand</label></div>
								<div class="col-sm-7">
										 <?php echo $this->Form->input('brand',array("type"=>"text","class"=>"form-control input-sm","label"=>false));?>
								</div>
							</div>
						
							
							<br>
							<div class="row">
								<div class="col-sm-4"></div>
								<div class="col-sm-4"><?php echo $this->Form->submit('Submit',array("class"=>"btn btn-info"));?></div>
								<div class="col-sm-4"></div>
						   </div>
						</div>
						<?php echo $this->Session->Flash();?>
					  </div>
					<?php echo $this->Form->end();?>
					<!---- form end ------>
				  	
				  
				</div>
				</div>
				<!--col (left) -->
				
<!--------------Add  Category ---------------->
	
        <!-- right column -->
        <div class="col-md-7">
		
          <div class="box box-warning">
			  <div class="box-body">
				<table class="table table-bordered" id="example1">
				<thead>
				<tr><th>#</th><th>Asset </th><th>Working</th><th>Damaged</th><th>Total</th><th>Delete</th><th>Edit</th></tr>
				</thead>
				<?php 
					$i=1;
					foreach($list as $assList)
					{
				?>
				<tr>
					<td><?php echo $i++; ?></td>
					<td><?php echo $assList['Asset']['asset_name'];?></td>
					<td><?php echo $assList['Asset']['working_asset'];?> </td>
					<td><?php echo $assList['Asset']['damaged_asset'];?></td>
					<td><?php echo $assList['Asset']['total_asset'];?> </td>
					<td><?php echo $this->Html->link('<i style="font-size:17px;" class="glyphicon glyphicon-trash"></i>'
						,array("controller"=>"Asset","action"=>"deleteAsset",$assList['Asset']['id']),
						array("confirm"=>"Are you sure you want ro delete???","escape"=>false)); ?></td>
					</td>
					<td><?php echo $this->Html->link('<i style="font-size:17px;" class="glyphicon glyphicon-edit"></i>'
					,array("controller"=>"Asset","action"=>"addAsset",$assList['Asset']['id']),
					array("escape"=>false)); ?></td>
				</tr>
				<?php 
				}
				?>
				</table>
								
			</div>
			
			</div>
        </div>
		
      </div>
      <!-- row -->
	
				
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
	</div> <!-- wrapper -->
	
	<script>
	function get_total_asset()
	{
		var working_asset =0;
		var damaged_asset = 0;
		var total_asset =0;
		working_asset = parseInt($("#working_asset").val());
		damaged_asset = parseInt($("#damaged_asset").val());
		total_asset = working_asset + damaged_asset;
		 $("#total_asset").val(total_asset);
		
	}
	
	</script>