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
					  <h3 class="box-title"> Add Question Heading</h3></div>
					<!-- form start -->
					  <div class="box-body">
						<div class="form-group">
							
							<div class="row">
								<div class="col-sm-5"><label>Class</label></div>
									<div class="col-sm-7">
									 <div class="form-group">
									  <select class="form-control">
										 <option> Select Class</option>
										<option>All</option>
										<option>LKG</option>
										<option>UKG</option>
										<option>1std</option>
										<option>2nd</option>
										<option>3rd</option>
										<option>4th</option>
										<option>5th</option>
										<option>6th</option>
										<option>7th</option>
										<option>8th</option>
										<option>9th</option>
										<option>10th</option>
									  </select>
									</div>
									</div>
							</div>
							<br>
							<div class="row">
								<div class="col-sm-5"><label>Subject</label></div>
									<div class="col-sm-7">
									 <div class="form-group">
										  <select class="form-control">
											<option> Select Subject</option>
											<option>Kannada</option>
											<option>English</option>
											<option>Maths</option>
											<option>Sciences</option>
											<option>Sports</option>
										  </select>
										  </select>
									</div>
								</div>
							</div>
							<br>
							<div class="row">
								<div class="col-sm-5"><label>Question Heading</label></div>
									<div class="col-sm-7">
										<textarea class="form-control" rows="3" placeholder="Enter ..."></textarea>
									</div>
							</div>
							<br>										
							<div class="row">
								<div class="col-sm-4"></div>
								<div class="col-sm-4"><?php echo $this->Form->submit('Submit',array("class"=>"btn btn-info"));?></div>
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
				<tr><th>#</th><th>Class </th><th>Subject </th><th>Question Heading</th><th>Delete</th><th>Edit</th></tr>
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