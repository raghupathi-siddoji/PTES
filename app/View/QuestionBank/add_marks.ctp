 <div class="wrapper"> 
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
               Question Bank
            <small>Control panel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
           
          <!------------"Add Subject" created: 20 aug 2016 ----------->
		  
			 <div class="row">
				<!-- left column -->
				
				<div class="col-md-6">
				  <div class="box box-success">
				<br>
					<div class="box-header with-border">
					  <h3 class="box-title">Add Subject</h3>
					</div>
					<!-- form start -->
				   <?php //echo $this->Form->create('Category',array("url"=>array("controller"=>"Admin","action"=>"addcategory")));?>
				   
					  <div class="box-body">
						<div class="form-group">
							<div class="row">
								<div class="col-sm-5"><label>Subject</label></div>
								<div class="col-sm-7">
								<?php 
									echo $this->Form->input('id',array("type"=>"hidden")); 
									echo $this->Form->input('application_no',array("type"=>"text","class"=>"form-control","required","label"=>false));?>
								</div>
							</div>
							<br>
							<div class="row">
							<div class="col-sm-5"><label>Subject Type</label></div>
						
							<div class="col-sm-7">
							 <div class="form-group">
							 
							  <select class="form-control">
							   <option> Select Subject Type</option>
								<option>Regular Subject</option>
								<option>Other Subject</option>
							 </select>
							</div>
							</div>
							
							</div>
							
							
							<div class="row">
								<div class="col-sm-5"><label>Subject Code</label></div>
							<div class="col-sm-7">
								<?php echo $this->Form->input('student_name',array("type"=>"text","class"=>"form-control","required","label"=>false));?>
							</div>
							</div>
						
							
							<br>
							<div class="row">
								<div class="col-sm-4"></div>
								<div class="col-sm-4"><?php echo $this->Form->submit('Add Subject',array("class"=>"btn btn-info"));?></div>
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
				<tr><th>#</th><th>Subject </th><th>Subject Code</th><th>Delete</th><th>Edit</th></tr>
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
	
				
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
	</div> <!-- wrapper -->