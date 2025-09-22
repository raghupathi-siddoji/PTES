 <div class="wrapper"> 
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Library Management
          </h1>
          <ol class="breadcrumb">
             <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
              <li><a href="#">Library Management</a></li>
         <li class="active">Book Issue</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
           
          <!------------"BOOK ISSUE" created: 20 aug 2016 ----------->
		  
			 <div class="row">
			
				<div class="col-md-1"></div>
				<div class="col-md-10">
				  <div class="box box-success">
				<br>
					<div class="box-header with-border">
					  <h3 class="box-title">Book Issue</h3>
					</div>
					<!-- form start -->
					<form method="post">
				   <?php //echo $this->Form->create('',array("url"=>array(""=>"Admin","action"=>"addcategory")));?>
				   
					  <div class="box-body">
						<div class="form-group">
							<div class="row">
								<div class="col-sm-6"><label>Book Name</label>
									<?php 
									echo $this->Form->input('id',array("type"=>"hidden")); 
									echo $this->Form->input('PublisherName',array("type"=>"text","class"=>"form-control","required","label"=>false));?>
								</div>
							
								<div class="col-sm-6">
									<?php echo $this->Form->input('Book Category',array('type'=>'select','id'=>'select','options'=>array('Select Category'=>'Select Category','Science'=>'Science','Dictionary'=>'Dictionary','Social'=>'Social','Others'=>'Others'),"required","class"=>"form-control")) ?>	
								</div>
							</div>
							<br>
							<div class="row">
								<div class="col-sm-6">
							  	<?php echo $this->Form->input('Book Author',array('type'=>'select','id'=>'select','options'=>array('Select Author'=>'Select Author','Abhijeet K. S'=>'Abhijeet K. S','E. Suresh Kumar'=>'E. Suresh Kumar','E.H.J. Pallett'=>'E.H.J. Pallett','E. Rukmangadachari'=>'E. Rukmangadachari'),"required","class"=>"form-control")) ?>	</div>
							<div class="col-sm-6">
							  	<?php echo $this->Form->input('Book Publisher',array('type'=>'select','id'=>'select','options'=>array('Select Publisher'=>'Select Publisher','McGraw-Hill Education'=>'McGraw-Hill Education','Macmillan Education'=>'Macmillan Education','Skylark Publications'=>'Skylark Publications','Springer'=>'Springer'),"required","class"=>"form-control")) ?>	</div>
							</div>
							
							<br>
							<div class="row">
								<div class="col-sm-4"></div>
								<div class="col-sm-4"><?php echo $this->Form->submit('Show',array("class"=>"btn btn-info","name"=>"show_btn"));?></div>
								<div class="col-sm-4"></div>
						   </div>
						</div>
						
					  </div>
					  <div class="col-md-1"></div>
					<?php echo $this->Form->end();?>
					<!---- form end ------>
				  	
				  
				</div>
				</div>
				</div>
			
<!--------------Add  Category ---------------->
	<?php if(isset($_POST['show_btn'])!=''){?>
        <!-- left column -->
	<div class="row">
			
		<!-- Right column -->
		<div class="col-md-5">
				<div class="col-md-12">
				  <div class="box box-success">
				<br>
					<div class="box-header with-border">
					  <h3 class="box-title">Book Issue</h3>
					</div>
					<!-- form start -->
				   
					  <div class="box-body">
						<div class="form-group">
							<div class="row">
								<div class="col-sm-5"><label>Issue Date</label></div>
								<div class="col-sm-7">	
									<?php 
									echo $this->Form->input('id',array("type"=>"hidden")); 
									echo $this->Form->input('PublisherName',array("type"=>"text","class"=>"form-control","required","label"=>false));?>
								</div>
							</div>
							<br>
							<div class="row">
							
								<div class="col-sm-5"><label>Return Date</label></div>
								<div class="col-sm-7">	
									<?php 
									echo $this->Form->input('id',array("type"=>"hidden")); 
									echo $this->Form->input('PublisherName',array("type"=>"text","class"=>"form-control","required","label"=>false));?>
								</div>
							</div>
							<br>
							<div class="row">
								<div class="col-sm-5"><label>Student Name / ID </label></div>
								<div class="col-sm-7">	
									<?php 
									echo $this->Form->input('id',array("type"=>"hidden")); 
									echo $this->Form->input('PublisherName',array("type"=>"text","class"=>"form-control","required","label"=>false));?>
								</div>							</div>
							
							<br>
							<div class="row">
								<div class="col-sm-4"></div>
								<div class="col-sm-4"><?php echo $this->Form->submit('Issue',array("class"=>"btn btn-info"));?></div>
								<div class="col-sm-4"></div>
						   </div>
						</div>
						
					  </div>
				</div>
		 	 </div>
		 </div>
		 
		 <!----------Right Side----------------->
		
		 <div class="col-md-7">
		
			<div class="box box-warning">
			  <div class="box-body">
				<table class="table table-bordered" id="example1">
				<thead>
					<tr><th>Sl.No</th><th>Book Title </th><th>Edition</th><th>Volume</th><th>No of Copies</th><th>Action</th></tr>
				</thead>
				
				<tr>
					<td>1</td>
					<td>A Guide to MATLAB Object-Oriented Programming </td>
					<td>1st Edition, 2010 </td>
					<td>1</td>
					<td>25</td>
					<td><div class="form-group"> <label><input type="checkbox" class="flat-red" ></label></div></td>
					
				</tr>
				<tr>
					<td>2</td>
					<td>A TB OF PHYSICAL CHEM  </td>
					<td>5 Edition </td>
					<td>4</td>
					<td>10</td>
					<td>
						<div class="form-group">
							<label>
							  <input type="checkbox" class="flat-red" >
							</label>
						</div>
					 </td>
					</tr>
				<tr>
					<td>3</td>
					<td>A Handbook of Statistical Graphics</td>
					<td>1st Edition, 2008 </td>
					<td>2</td>
					<td>5 </td>
					<td>
					 <div class="form-group">
							<label>
							  <input type="checkbox" class="flat-red" >
							</label>
						</div>
					</td>
				</tr>
				<tr>
					<td>4</td>
					<td>A Modern Approach to Discrete Mathematics and Structure</td>
					<td>First Edition, 2009 </td>
					<td>2</td>
					<td>30</td>
					<td>
						<div class="form-group">
							<label>
							  <input type="checkbox" class="flat-red" >
							</label>
						</div>
					</td>
				</tr>
				</table>
								
				</div>
			</div>
        </div>
	   </div>
      <!-- row -->
	<?php }?>
				
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
	</div> <!-- wrapper -->