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
         <li class="active">Book Language</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
           
          <!------------"BOOK Language" created: 20 aug 2016 ----------->
		  
			 <div class="row">
				<!-- left column -->
				
				<div class="col-md-6">
				  <div class="box box-success">
				<br>
					<div class="box-header with-border">
					  <h3 class="box-title">Book Location</h3>
					</div>
					<!-- form start -->
				   <?php echo $this->Form->create('BookLanguage',array("url"=>array("controller"=>"LibraryManagement","action"=>"bookLanguage")));
							echo $this->Form->input('id');
				   ?>
				   
					  <div class="box-body">
						<div class="form-group">
							<div class="row">
								<div class="col-sm-5"><label>Language<span class="mandatory_fields"> * </span></label></div>
								<div class="col-sm-7">
								<?php echo $this->Form->input('language',array("type"=>"text","class"=>"form-control","required","label"=>false));?>
								</div>
							</div>
							<br>
							<div class="row">
							<div class="col-sm-5"><label>Language Code<span class="mandatory_fields"> * </span></label></div>
						
							<div class="col-sm-7">
							 <div class="form-group">
							  	<?php echo $this->Form->input('language_code',array("type"=>"text",'minLength'=>2,'maxLength'=>2,"class"=>"form-control","required","label"=>false));?>
							</div>
							</div>
							
							</div>
							
							<br>
							<div class="row">
								<div class="col-sm-4"></div>
								<div class="col-sm-2"><?php echo $this->Form->submit('Submit',array("class"=>"btn btn-info"));?></div>
								<div class="col-sm-4">
									<?php echo $this->Html->link('<i class="btn btn-warning">Cancel</i>', array("controller"=>"LibraryManagement","action"=>"bookLanguage"),array("escape"=>false)); ?>
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
	<?php if(!empty($list)) { ?>
        <!-- right column -->
        <div class="col-md-6">
		
          <div class="box box-warning">
			  <div class="box-body">
				<table class="table table-bordered" id="example1">
				<thead>
				<tr><th>#</th><th>Book Location </th><th>Details</th><th>Delete</th><th>Edit</th></tr>
				</thead>
				<?php 
					$i=1;
					foreach($list as $values)
					{
				?>
					<tr>
						<td><?php echo $i++;?></td>
						<td><?php echo $values['BookLanguage']['language'];?> </td>
						<td><?php echo $values['BookLanguage']['language_code'];?></td>
						<td><?php echo $this->Html->link('<i style="font-size:17px;" class="glyphicon glyphicon-trash"></i>'
						,array("controller"=>"LibraryManagement","action"=>"deleteBookLanguage",$values['BookLanguage']['id']),
						array("confirm"=>"Are you sure you want ro delete???","escape"=>false)); ?></td>
						</td>
						<td><?php echo $this->Html->link('<i style="font-size:17px;" class="glyphicon glyphicon-edit"></i>'
						,array("controller"=>"LibraryManagement","action"=>"bookLanguage",$values['BookLanguage']['id']),
						array("escape"=>false)); ?></td>
					</tr>
				<?php }?>
				</table>
								
			</div>
			
			</div>
			<?php } ?>
        </div>
		
      </div>
      <!-- row -->
	
				
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
	</div> <!-- wrapper -->