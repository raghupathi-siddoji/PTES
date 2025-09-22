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
			 <li class="active">Add Subject</li>
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
				   <?php echo $this->Form->create('Subject',array("url"=>array("controller"=>"TimeTable","action"=>"addSubject")));
							echo $this->Form->input('id');?>
				   
					  <div class="box-body">
						<div class="form-group">
							<div class="row">
								<div class="col-sm-5"><label>Subject</label></div>
								<div class="col-sm-7">
								<?php echo $this->Form->input('subject_name',array("type"=>"text","class"=>"form-control","required","label"=>false));?>
								</div>
							</div>
							<br>
							<!--<div class="row">
							<div class="col-sm-5"><label>Subject Type</label></div>
						
							<div class="col-sm-7">
							 <div class="form-group">
							 <?php 
								//$subject_type= array("Language1"=>"Language1","Language2"=>"Language2","Language3"=>"Language3","Regular Subject"=>"Regular Subject");
								//echo $this->Form->input("subject_type",array("type"=>"select","options"=>$subject_type,"label"=>false,"class"=>"form-control"));?>		  
							</div>
							</div>
							</div>-->
							
							<div class="row">
								<div class="col-sm-5"><label>Subject Code</label></div>
							<div class="col-sm-7">
								<?php echo $this->Form->input('subject_code',array("type"=>"text","class"=>"form-control","required","label"=>false,"minlength"=>"3","maxlength"=>"3","placeholder"=>"EX: KAN , ENG"));?>
							</div>
							</div>
						
							
							<br>
							<div class="row">
								<div class="col-sm-4"></div>
								<div class="col-sm-4"><?php echo $this->Form->submit('Add Subject',array("class"=>"btn btn-info"));?></div>
								<div class="col-sm-4"></div>
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
					<tr><th>Sl.No</th><th>Subject </th><th>Subject Code</th><th>Delete</th><th>Edit</th></tr>
				</thead>
				<?php 
					$i=1;
					foreach($list as $values)
					{
				?>
				<tr>
					<td><?php echo $i++; ?></td>
					<td><?php echo ucwords($values['Subject']['subject_name']); ?> </td>
					<td><?php echo strtoupper($values['Subject']['subject_code']); ?>  </td>
					<td><?php echo $this->Html->link('<i style="font-size:17px;" class="glyphicon glyphicon-trash"></i>'
						,array("controller"=>"TimeTable","action"=>"deleteSubject",$values['Subject']['id']),
						array("confirm"=>"Are you sure you want ro delete???","escape"=>false)); ?></td>
					</td>
					<td><?php echo $this->Html->link('<i style="font-size:17px;" class="glyphicon glyphicon-edit"></i>'
					,array("controller"=>"TimeTable","action"=>"addSubject",$values['Subject']['id']),
					array("escape"=>false)); ?></td>
				</tr>
				
				<?php
				}?>
				</table>
								
			</div>
			
			</div>
        </div>
		
      </div>
      <!-- row -->
	
				
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
	</div> <!-- wrapper -->