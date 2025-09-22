 <div class="wrapper"> 
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Time Table
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a href="#">Time Table</a></li>
			 <li class="active">Assign Number Of Periods To Teacher</li>
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
					  <h3 class="box-title">Assign Number Of Periods To Teacher</h3>
					</div>
					<!-- form start -->
				<!--   <?php echo $this->Form->create('Category',array("url"=>array("controller"=>"Admin","action"=>"addcategory")));?> -->
				   
					  <div class="box-body">
						<div class="form-group">
							<div class="row">
								<div class="col-sm-5"><label>Teachers</label></div>
									<div class="col-sm-7">
									 <div class="form-group">
										  <select class="form-control">
											<option>Select Teachers</option>
											<option>Teachers 1</option>
											<option>Teachers 2</option>
											<option>Teachers 3</option>
											<option>Teachers 4</option>
											<option>Teachers 5</option>
										  </select>
									</div>
								</div>
							</div>
							<br>
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
											<option> Select Section</option>
											<option>All</option>
											<option>A</option>
											<option>B</option>
											<option>C</option>
											<option>D</option>
										  </select>
									</div>
								</div>
							</div>
							<br>
							<div class="row">
								<div class="col-sm-5"><label>Number of Periods</label></div>
									<div class="col-sm-7">
							<?php echo $this->Form->input('student_name',array("type"=>"text","class"=>"form-control","required","label"=>false));?>
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
				<tr><th>#</th><th>Class </th><th>Subject </th><th>Teachers</th><th>Periods</th><th>Delete</th><th>Edit</th></tr>
				</thead>
				<tr>
					<td>1</td>
					<td>1 STD</td>
					<td>Kannada </td>
					<td>Rani K</td>
					<td>1</td>
					<td> <i class="fa fa-trash-o" style="color:red"></i></td>
					<td> <i class="fa fa-pencil"  style="color:#00C0EF"></i></td>
				</tr>
				<tr>
					<td>2</td>
					<td>2 ND</td>
					<td>Kannada </td>
					<td>Vani A</td>
					<td>1</td>
					<td> <i class="fa fa-trash-o" style="color:red"></i></td>
					<td> <i class="fa fa-pencil"  style="color:#00C0EF"></i></td>
				</tr>
				<tr>
					<td>3</td>
					<td>4 TH</td>
					<td>Hindi </td>
					<td>Vani V B</td>
					<td>6</td>
					<td> <i class="fa fa-trash-o" style="color:red"></i></td>
					<td> <i class="fa fa-pencil"  style="color:#00C0EF"></i></td>
				</tr>
				<tr>
					<td>4</td>
					<td>5 TH </td>
					<td>Engalish </td>
					<td>Rajini M</td>
					<td>3</td>
					<td> <i class="fa fa-trash-o" style="color:red"></i></td>
					<td> <i class="fa fa-pencil"  style="color:#00C0EF"></i></td>
				</tr>
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