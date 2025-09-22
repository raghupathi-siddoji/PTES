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
         <li class="active">Book Location</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
           
          <!------------"BOOK Location" created: 20 aug 2016 ----------->
		  
			 <div class="row">
				<!-- left column -->
				
				<div class="col-md-6">
				  <div class="box box-success">
				<br>
					<div class="box-header with-border">
					  <h3 class="box-title">Book Location</h3>
					</div>
					<!-- form start -->
				   <?php echo $this->Form->create('BookLocation',array("url"=>array("controller"=>"LibraryManagement","action"=>"bookLocation")));
							echo $this->Form->input('id');
				   ?>
				   
					  <div class="box-body">
						<div class="form-group">
							<div class="row">
								<div class="col-sm-5"><label>Book Location<span class="mandatory_fields"> * </span></label></div>
								<div class="col-sm-7">
								<?php echo $this->Form->input('book_location',array("type"=>"text","class"=>"form-control","required","label"=>false));?>
								</div>
							</div>
							<br>
							<div class="row">
							<div class="col-sm-5"><label>Details</label></div>
						
							<div class="col-sm-7">
							 <div class="form-group">
							  	<?php echo $this->Form->input('details',array("type"=>"text","class"=>"form-control","label"=>false));?>
							</div>
							</div>
							
							</div>
							
							<br>
							<div class="row">
								<div class="col-sm-4"></div>
								<div class="col-sm-2"><?php echo $this->Form->submit('Submit',array("class"=>"btn btn-info"));?></div>
								<div class="col-sm-4">
									<?php echo $this->Html->link('<i class="btn btn-warning">Cancel</i>', array("controller"=>"LibraryManagement","action"=>"bookLocation"),array("escape"=>false)); ?>
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
        <div class="col-md-6">
		
          <div class="box box-warning">
			  <div class="box-body">
				<table class="table table-bordered" id="example1">
				<thead>
					<tr><th>Sl.No</th><th>Book Location </th><th>Details</th><th>Delete</th><th>Edit</th></tr>
				</thead>
				<?php 
					$i=1;
					foreach($list as $values)
					{
				?>
					<tr>
						<td><?php echo $i++;?></td>
						<td><?php echo $values['BookLocation']['book_location'];?> </td>
						<td><?php echo $values['BookLocation']['details'];?></td>
						<td><?php echo $this->Html->link('<i style="font-size:17px;" class="glyphicon glyphicon-trash"></i>'
						,array("controller"=>"LibraryManagement","action"=>"deleteBookLocation",$values['BookLocation']['id']),
						array("confirm"=>"Are you sure you want ro delete???","escape"=>false)); ?></td>
						</td>
						<td><?php echo $this->Html->link('<i style="font-size:17px;" class="glyphicon glyphicon-edit"></i>'
						,array("controller"=>"LibraryManagement","action"=>"bookLocation",$values['BookLocation']['id']),
						array("escape"=>false)); ?></td>
					</tr>
				<?php }?>
				</table>
								
			</div>
			
			</div>
        </div>
		
      </div>
      <!-- row -->
	
				
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
	</div> <!-- wrapper -->