 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
	  <h1>Settings</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Settings</a></li>
        <li class="active">Academic Year Setting</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
     
  <!------------"Application Form Entry" created: 20 aug 2016 ----------->
  
	 <div class="row">
        <!-- left column -->
		
        <div class="col-md-6">
          <div class="box box-success">
<br>
            <!-- form start -->
           <?php echo $this->Form->create('',array("url"=>array("controller"=>"Setting","action"=>"academicYear")));?>
		   
              <div class="box-body">
                <div class="form-group">
					<div class="row">
						<div class="col-sm-5"><label>From Date</label></div>
						<div class="col-sm-7">
						<?php 
							echo $this->Form->input('id',array("type"=>"hidden")); 
							echo $this->Form->input('from_date',array("type"=>"text","class"=>"form-control","required","label"=>false));?>
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-sm-5"><label>To Date</label></div>
						<div class="col-sm-7">
						<?php echo $this->Form->input('to_date',array("type"=>"text","class"=>"form-control","required","label"=>false));?>
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-sm-5"><label>Academic year</label></div>
						<div class="col-sm-7">
						<?php echo $this->Form->input('academic_year',array("type"=>"text","class"=>"form-control","required","label"=>false));?>
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-sm-4"></div>
						<div class="col-sm-4"><?php echo $this->Form->submit('Save',array("class"=>"btn btn-info"));?></div>
						<div class="col-sm-4"></div>
				   </div>
                </div>
				
              </div>
            <?php echo $this->Form->end();?>
			<!---- form end ------>
          
		  
		</div>
        </div>
        <!--col (left) -->
		
	
<!--------------Add  Category ---------------->
	
        <!-- right column -->
        <div class="col-md-6">
		
          <div class="box box-warning">
			  <div class="box-body">
				<table class="table table-bordered" id="example1">
				<thead>
					<tr><th>#</th><th>From Date</th><th>To Date</th><th>Academic Year</th><th>Delete</th><th>Edit</th></tr>
				</thead>
				<!--	<?php	$i=1;	
					foreach($list as $lt) {?>
					<tr><td><?php echo $i++; ?></td>
					<td><?php echo $lt['Category']['category'];?></td>
					<?php $id=$lt['Category']['id'];?>
					<td><?php echo $this->Html->link('<i style="font-size:17px;" class="glyphicon glyphicon-trash"></i>'
						,array("controller"=>"Admin","action"=>"deletecategory", $id),
						array("confirm"=>"Are you sure you want ro delete???","escape"=>false)); ?></td>	
					
					<td><?php echo $this->Html->link('<i style="font-size:17px;" class="glyphicon glyphicon-edit"></i>'
					,array("controller"=>"Admin","action"=>"addcategory", $id),
					array("escape"=>false)); ?></td></tr>
					<?php } ?> -->
				
				</table>
				
					
			</div>
			
			</div>
        </div>
		
      </div>
      <!-- row -->
    
	</section>
    <!-- content -->
  </div>
  <!-- content-wrapper -->