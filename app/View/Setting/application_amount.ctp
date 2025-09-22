 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
	  <h1>Setting</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Setting</a></li>
        <li class="active">Caste</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
     
  <!------------"Application Form Entry" created: 20 aug 2016 ----------->
  
	 <div class="row">
        <!-- left column -->
		
        <div class="col-md-6">
          <div class="box box-success"><div class="box-header with-border"><h4>Application Amount</h4></div>
            <!-- form start -->
           <?php echo $this->Form->create('ApplicationAmount',array("url"=>array("controller"=>"Setting","action"=>"applicationAmount")));?>
		   
              <div class="box-body">
                <div class="form-group">
					<div class="row">
						<div class="col-sm-3"><label>Amount<span class="mandatory_fields"> * </span></label></div>
						<div class="col-sm-5">
						<?php 
							echo $this->Form->input('id',array("type"=>"hidden")); 
							echo $this->Form->input('amount',array("type"=>"text","class"=>"form-control","required","label"=>false));?>
						</div>
						<div class="col-sm-2"><?php echo $this->Form->submit('Save',array("class"=>"btn btn-info"));?></div>
						<div class="col-sm-2"><?php echo $this->Html->link('<i class="btn btn-warning pull-right">Cancel</i>', array("controller"=>"Setting","action"=>"applicationAmount"),array("escape"=>false)); ?></div>
				   </div>
                </div>
				
              </div>
            <?php echo $this->Form->end();?>
			<!---- form end ------>
          
		  
		</div>
			<?php echo $this->Session->flash(); ?>
        </div>
        <!--col (left) -->
		
	
<!--------------Add  Category ---------------->
	
        <!-- right column -->
        <div class="col-md-6">
		
		<?php if(!empty($list)) { ?>
          <div class="box box-warning">
			  <div class="box-body">
				<table class="table table-bordered" id="example1">
				<thead>
					<tr><th>Sl.No</th><th>Amount</th><th>Edit</th></tr>
				</thead>
				<?php	$i=1;	
					foreach($list as $lt) {?>
					<tr><td><?php echo $i++; ?></td>
					<td><?php echo $lt['ApplicationAmount']['amount'];?></td>
					<?php $id=$lt['ApplicationAmount']['id'];?>
					<td><?php echo $this->Html->link('<i style="font-size:12px;" class="glyphicon glyphicon-edit"></i>'
					,array("controller"=>"Setting","action"=>"applicationAmount", $id),
					array("escape"=>false)); ?></td></tr>
					<?php } ?> 
				
				</table>
				
					
			</div>
			
			</div>
        <?php } else echo "List Empty"; ?>
		
		</div>
		
      </div>
      <!-- row -->
    
	</section>
    <!-- content -->
  </div>
  <!-- content-wrapper -->