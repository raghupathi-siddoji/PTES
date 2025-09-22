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
        <li class="active">Book Category</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
           
          <!------------"BOOK CATEGORY" created: 20 aug 2016 ----------->
		  
			 <div class="row">
				<!-- left column -->
				
				<div class="col-md-5">
				  <div class="box box-success">
				<br>
					<div class="box-header with-border">
					  <h3 class="box-title">Book Category</h3>
					</div>
					<!-- form start -->
				   <?php echo $this->Form->create('BookCategory',array("url"=>array("controller"=>"LibraryManagement","action"=>"bookCategory")));?>
				   <?php echo  $this->Form->input('id');?>
					
					  <div class="box-body">
						<div class="form-group">
							<div class="row">
								<div class="col-sm-5"><label>Category Name<span class="mandatory_fields"> * </span></label></div>
								<div class="col-sm-7">
									<?php echo $this->Form->input("category_name",array("type"=>"text","required","class"=>"form-control","label"=>false));?>
								</div>
							</div>
						</div>
						
						<div class="form-group">
							<div class="row">
								<div class="col-sm-5"><label>Category Code<span class="mandatory_fields"> * </span></label></div>
								<div class="col-sm-7">
									<?php echo $this->Form->input("category_code",array("type"=>"text",'minLength'=>'2','maxLength'=>'2',"required","class"=>"form-control","label"=>false));?>
								</div>
							</div>
						</div>
						
						<div class="form-group">
							<div class="row">
							<div class="col-sm-5"><label>Details</label></div>
						
							<div class="col-sm-7">
							 <div class="form-group">
							  			<?php echo $this->Form->input("details",array("type"=>"textarea","rows"=>"3","class"=>"form-control","label"=>false));?>
							</div>
							</div>
							
							</div>
							
							<br>
							<div class="row">
								<div class="col-sm-4"></div>
								<div class="col-sm-2"><?php echo $this->Form->submit('Submit',array("class"=>"btn btn-info"));?></div>
								<div class="col-sm-4">
									<?php echo $this->Html->link('<i class="btn btn-warning">Cancel</i>', array("controller"=>"LibraryManagement","action"=>"bookCategory"),array("escape"=>false)); ?>
								</div>
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
				<tr><th>#</th><th>Category Name </th><th>Code</th><th>Details</th><th>Delete</th><th>Edit</th></tr>
				</thead>
				<?php 
					$i=1;
					foreach($list as $values)
					{
				?>
				<tr>
					<td><?php echo $i++;?></td>
					<td><?php echo $values['BookCategory']['category_name'];?> </td>
					<td><?php echo $values['BookCategory']['category_code'];?> </td>
					<td><?php echo $values['BookCategory']['details'];?> </td>
					<td><?php echo $this->Html->link('<i style="font-size:17px;" class="glyphicon glyphicon-trash"></i>'
						,array("controller"=>"LibraryManagement","action"=>"deleteBookCategory",$values['BookCategory']['id']),
						array("confirm"=>"Are you sure you want ro delete???","escape"=>false)); ?></td>
					</td>
					<td><?php echo $this->Html->link('<i style="font-size:17px;" class="glyphicon glyphicon-edit"></i>'
					,array("controller"=>"LibraryManagement","action"=>"bookCategory",$values['BookCategory']['id']),
					array("escape"=>false)); ?></td>
				</tr>
				<?php } ?>
				</table>
								
			</div>
			
			</div>
        </div>
		
      </div>
      <!-- row -->
	
				
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
	</div> <!-- wrapper -->