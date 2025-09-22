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
         <li class="active">Book Return</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
           
          <!------------"BOOK RETURN" created: 20 aug 2016 ----------->
			
			 <div class="row">
			 <div class="col-md-1"></div>
				<div class="col-md-10">
				  <div class="box box-success">
					<br>
					<div class="box-header with-border">
					  <h3 class="box-title">Book Return</h3>
					</div>
					<form method="post">
					  <div class="box-body">
						<div class="form-group">
			<?php echo $this->Form->create('StaffBookIssue',array("url"=>array("controller"=>"LibraryManagement","action"=>"staffBookReturn")));?>
						   <div class="row">
						  		<div class="col-md-3"><label>Staff Name / ID<span class="mandatory_fields"> * </span></label></div>
								<div class="col-md-4">
								<?php 
									echo $this->Form->input('id',array("type"=>"hidden")); ?>
									<?php
									  echo $this->Form->input('staff_detail_id',array("type"=>"select","class"=>"form-control select_box","required","label"=>false,"options"=>$emp_list,'empty'=>"Select Employee","required"));?>
									 
							
								</div>
								<div class="col-md-1">
									<?php echo $this->Form->submit('Show',array("class"=>"btn btn-info"));?>
								</div>
								<div class="col-md-3">
									<?php echo $this->Html->link('<i class="btn btn-warning">Cancel</i>', array("controller"=>"LibraryManagement","action"=>"staffBookReturn"),array("escape"=>false)); ?>
								</div>
						  </div>
						   
						</div>
					  </div>
					
					<?php echo $this->Form->end();?>
					<!---- form end ------>
				  	
				  
				</div>
				</div>
				<div class="col-md-1"></div>
				</div>
			
<!--------------Add  Category ---------------->
	<?php if(!empty($list)){ ?>
        <!-- left column -->
	<div class="row">
		<div class="col-md-1"></div>
		<div class="col-md-10">
		
          <div class="box box-warning">
		   <div class="box-header with-border">
			<?php foreach($staff_list as $s) {
				echo "Staff name : ".$s['StaffDetail']['first_name'];
			break; } ?>
		  </div>
			  <div class="box-body">
			  <?php echo $this->Form->create('StaffBookIssue',array("url"=>array("controller"=>"LibraryManagement","action"=>"StaffBookReturnProcess")));?>
				<table class="table table-bordered" id="example1">
				<thead>
				<tr><th>Sl.No</th><th>Issued Book</th><th>Issued Date</th><th>Return Date</th><th>Action</th></tr>
				</thead>
				
				<?php $i=1; foreach($list as $l) { ?>
				<tr>
				<?php echo $this->Form->input('staff_book_issue_id',array('type'=>'hidden','value'=>$l['StaffBookIssueDetail']['staff_book_issue_id'])); ?>
					<td><?php echo $i++;?></td>
					<td><?php echo $l['BookDetail']['title'] ?></td>
					<td><?php echo $l['StaffBookIssue']['issue_date'] ?></td>
					<td><?php echo $l['StaffBookIssue']['return_date'] ?></td>
					<td><div class="form-group"> 
						<label>
						<input type="checkbox" value=<?php echo $l['StaffBookIssueDetail']['id']; ?> name="book_issued[]">
						</label>
					</div></td>
					
				</tr>
				<?php } ?>
				</table>
				<table class="table table-bordered" id="example1">
				
				<tr>
					<td colspan="5" align="right"><?php echo $this->Form->submit('Return',array("class"=>"btn btn-info"));?></td>
				</tr>
				</table>
								
				</div>
			</div>
			<?php echo $this->Form->end(); ?>
        </div>
		<div class="col-md-1"></div>
	</div>
      <!-- row -->
	<?php } else
	{
		echo $this->Session->flash(); 
	}?>
				
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
	</div> <!-- wrapper -->