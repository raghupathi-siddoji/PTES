 <div class="wrapper"> 
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
         <section class="content-header">
		  <h4>Report</h4>
		  <ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a href="#">Report</a></li>
			<li class="active">Class Wise Report</li>
		  </ol>
		</section>

        <!-- Main content -->
        <section class="content">
           
          <!------------"Class Wise Report" created: 20 aug 2016 ----------->
		  
			 <div class="row">
				<!-- left column -->
				<div class="col-md-2"></div>
				<div class="col-md-8">
				  <div class="box box-success">
				<br>
					<div class="box-header with-border">
					  <h3 class="box-title">Class Wise Report</h3>
					</div>
					  <div class="box-body">
						<div class="form-group">
							<div class="row">
								<div class="col-sm-3"><label>Acadmic Year</label>
								<div class="form-group">
								<?php //echo $this->Form->input('',array('type'=>'select','id'=>'select','options'=>array('Select Acadmic Year'=>'Select Acadmic Year','2011-2012'=>'2011-2012','2012-2013'=>'2012-2013','2013-2014'=>'2013-2014','2014-2015'=>'2014-2015','2015-2016'=>'2015-2016','2016-2017'=>'2016-2017'),"required","class"=>"form-control")) ?>
									<select class="form-control">
									  <option> Select Acadmic Year</option>
									  	<option>2011-2012</option>
										<option>2012-2013</option>
										<option>2013-2014</option>
										<option>2014-2015</option>
										<option>2015-2016</option>
										<option>2016-2017</option>
										</select>
								</div>
								</div>
							
							<div class="col-sm-3"><label>Class</label>
							
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
							
							<div class="col-sm-3"><label>Section</label>
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
								<div class="col-sm-3"><label>Language</label>
							  <div class="form-group">
										 <select class="form-control">
										   <option> Select Language</option>
											<option>English</option>
											<option>Hindi</option>
											<option>Kannada</option>
											</select>
									</div>
								</div>
							</div>
							
							<br>
							
							<div class="row">
								<div class="col-sm-4"></div>
								<div class="col-sm-4"><?php echo $this->Form->submit('Show',array("class"=>"btn btn-info"));?></div>
								<div class="col-sm-4"></div>
						   </div>
						</div>
						
					  </div>
					<?php echo $this->Form->end();?>
					<!---- form end ------>
				  	
				  
				</div>
				</div>
				<div class="col-md-2"></div>
				</div>
				<!--col (left) -->
				
<!--------------Add  Category ---------------->
	
        <!-- right column -->
		<div class="row">
		 <div class="col-md-12">
		
          <div class="box box-warning">
		   <div class="box-header">
              <h3 class="box-title" style="color:#00C0EF;" >Total Student : 100</h3>
			 <span style="color:#00C0EF;float:right;paddding:10px;">
		 <span style="color:#00C0EF;float:right;margin-left:10px;"> <i class="fa fa-file-word-o"style="font-size:22px;paddding-right:10px;" ></i></span>
			 <span style="color:#00C0EF;float:right;margin-left:10px;">	 <i class="fa fa-file-excel-o" style="font-size:22px;paddding-left:10px;"></i></span>
			 <span style="color:#00C0EF;float:right;margin-left:10px;">		 <i class="fa fa-file-pdf-o" style="font-size:22px;paddding-left:10px;"></i></span>	   </span> 
            </div>
			  <div class="box-body">
				<table class="table table-bordered" id="example1">
				<thead>
					<tr><th>Sl.No</th><th>SID</th><th>Class</th><th>Section</th><th>Gender</th><th>Aadhar Card</th><th>Language</th><th>Caste/SubCaste</th><th>Blood Group</th></tr>
				</thead>
				
				<tr>
					<td>1</td>
					<td>1001 </td>
					<td>1Std </td>
					<td>A</td>
					<td>Male </td>
					<td>A67O789 </td>
					<td>English</td>
					<td>SC / 1 </td>
					<td>O+ve </td>
					 
				</tr>
				<tr>
					<td>2</td>
					<td>1001 </td>
					<td>1Std </td>
					<td>A</td>
					<td>Male </td>
					<td>A67O789 </td>
					<td>English</td>
					<td>SC / 1 </td>
					<td>O+ve </td>
					 
				</tr>
				<tr>
					<td>3</td>
					<td>1001 </td>
					<td>1Std </td>
					<td>A</td>
					<td>Male </td>
					<td>A67O789 </td>
					<td>English</td>
					<td>SC / 1 </td>
					<td>O+ve </td>
					 
				</tr>
				<tr>
					<td>4</td>
					<td>1001 </td>
					<td>1Std </td>
					<td>A</td>
					<td>Male </td>
					<td>A67O789 </td>
					<td>English</td>
					<td>SC / 1 </td>
					<td>O+ve </td>
					 
				</tr>
				 
				</table>
								
			</div>
			
			</div>
        </div>
		
      </div>
      <!-- row -->
	
				
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
	</div> <!-- wrapper -->