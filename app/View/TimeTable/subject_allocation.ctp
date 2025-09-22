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
			 <li class="active">Subject Allocation</li>
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
					  <h3 class="box-title">Subject Allocation</h3>
					</div>
					<!-- form start -->
				<!--   <?php echo $this->Form->create('Category',array("url"=>array("controller"=>"Admin","action"=>"addcategory")));?> -->
				   
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
								<div class="col-sm-5"><label>Section</label></div>
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
								<div class="col-sm-5"><label>Subject</div>
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
									</div>
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
								<div class="col-sm-4">
									<div class="checkbox">
									  <label>
										<input type="checkbox"> Monday
									  </label>
									</div>
								</div>
								<div class="col-sm-4">
									<div class="checkbox">
									  <label>
										<input type="checkbox"> Tuesday
									  </label>
									</div>
								</div>
								<div class="col-sm-4">
									<div class="checkbox">
									  <label>
										<input type="checkbox"> Wednesday
									  </label>
									</div>
								</div>
							</div>	
							<div class="row">
								<div class="col-sm-4">
									<div class="checkbox">
									  <label>
										<input type="checkbox"> Thrusday
									  </label>
									</div>
								</div>
								<div class="col-sm-4">
									<div class="checkbox">
									  <label>
										<input type="checkbox"> Friday
									  </label>
									</div>
								</div>
								<div class="col-sm-4">
									<div class="checkbox">
									  <label>
										<input type="checkbox"> Saturday
									  </label>
									</div>
								</div>
							</div>
							
							<br>
							<div class="row">
								<div class="col-sm-5"><label>Period Order Series</label></div>
									<div class="col-sm-7">
									 <div class="form-group">
									  <select class="form-control">
										<option>option 1</option>
										<option>option 2</option>
										<option>option 3</option>
										<option>option 4</option>
										<option>option 5</option>
									  </select>
									</div>
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
					<tr><th>Sl.No</th><th>Class </th><th>Subject </th><th>Order Series</th><th>Delete</th><th>Edit</th></tr>
				</thead>
				<tr>
					<td>1</td>
					<td>1 STD </td>
					<td>Kannada </td>
					<td>2</td>
					<td> <i class="fa fa-trash-o" style="color:red"></i></td>
					<td> <i class="fa fa-pencil"  style="color:#00C0EF"></i></td>
				</tr>
				<tr>
					<td>2</td>
					<td>3 RD </td>
					<td>English </td>
					<td>1</td>
					<td> <i class="fa fa-trash-o" style="color:red"></i></td>
					<td> <i class="fa fa-pencil"  style="color:#00C0EF"></i></td>
				</tr>
				<tr>
					<td>3</td>
					<td>7 TH</td>
					<td>Hindi </td>
					<td>6</td>
					<td> <i class="fa fa-trash-o" style="color:red"></i></td>
					<td> <i class="fa fa-pencil"  style="color:#00C0EF"></i></td>
				</tr>
				<tr>
					<td>4</td>
					<td>6 TH </td>
					<td>Social Science </td>
					<td>4</td>
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