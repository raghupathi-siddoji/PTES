 <?php //print_r($govt_class_amount_array);?>
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
	  <h1>Asset Report</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Fee</a></li>
        <li class="active">Asset Report</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
  
	<div class="row"> 
		<!------------------------------------>
		 
		<?php echo $this->Form->create('Report',array("url"=>array("controller"=>"Report","action"=>"assetReport")));?>
		
			<div class="form-horizontal">
				<div class="col-md-2">&nbsp;</div>
				<div class="col-md-10"> 
					<div class="box box-warning"> 
						<div class="box-header with-border">
							<div class="row"> 
								<div class="col-md-3">
									<?php echo $this->Form->input("academic_year_id",array("type"=>"select","options"=>$academic_year_array,"class"=>"form-control select_box","empty"=>"select"));?>		
								</div>  
								<div class="col-md-3">
									<?php echo $this->Form->input('asset_category_id',array('type'=>'select','id'=>'select','options'=>$category_list ,"class"=>"form-control select_box","required","empty"=>"select"));?>
								</div>
								<div class="col-md-3">
										<?php $belongs_to = array("School"=>"School","Students"=>"Students","Teachers"=>"Teachers","Admin"=>"Admin");?> 
									<?php echo $this->Form->input("belongs_to",array("type"=>"select","options"=>$belongs_to ,"class"=>"form-control select_box","empty"=>"select"));?>		  
								</div> 
								<div class="col-md-3"><br>
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
		$belongs_to = $this->request->data['Report']['belongs_to'];
		$asset_category_id = $this->request->data['Report']['asset_category_id']; 
		$academic_year_id = $this->request->data['Report']['academic_year_id']; 
	?>
	<div class="row">
		<div class="col-md-12 col-md-push-11">  
			<?php echo $this->Html->link('<i class="fa fa-print fa-2x" ></i>',
											array("controller"=>"Report","action"=>"assetReportPrint",$asset_category_id,$academic_year_id,$belongs_to),
											array("escape"=>false,"target"=>"_blank","title"=>"Print")); ?> 
		</div>
	</div>
	<div class="row">
		<div class="form-horizontal"> 
			<div class="col-md-12"> 
				<div class="box box-warning">			
					<div class="box-body"> 
						<div class="row"> 
							<div class="col-md-12 text-center"><h4>LIST OF  <?php echo strtoupper($asset_list[0]['AssetCategory']['category']);?> ASSET </h4></div>
						</div>
						 
						<!--DISPLAY START -->
							<table width="100%" class="table-bordered">
							  <tr style="background:#999999;color:white" align="center">
								<td>Sl.No</td>
								<td>Asset Name</td>
								<td>Total Asset</td>
								<td>Working Asset</td>
								<td>Damage Asset</td>
								<td>Purchase Date</td>
								<td>Brand</td> 
							  </tr> 
							  <?php 
							    $i=1;
							  foreach($asset_list as $list):?>
								  <tr align="center">
									<td><?php echo $i++;?></td>
									<td><?php echo $list['Asset']['asset_name'];?></td>
									<td><?php echo $list['Asset']['total_asset'];?></td>
									<td><?php echo $list['Asset']['working_asset'];?> </td>
									<td><?php echo $list['Asset']['damaged_asset'];?> </td>
									<td><?php echo date('d-m-Y',strtotime($list['Asset']['purchased_date']));?> </td>
									<td><?php echo $list['Asset']['brand'];?> </td>
								  </tr> 
							  <?php endforeach;?>
							</table>
						<!--DISPLAY END -->
					</div>
				</div>
			</div> 
			 
		</div>
	</div> 
	
	 
	
	
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
  
      