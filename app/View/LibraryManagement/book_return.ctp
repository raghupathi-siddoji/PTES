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
				<div class="col-md-4">
				  <div class="box box-success">
					<br>
					<div class="box-header with-border">
					  <h3 class="box-title">Book Return</h3>
					</div>
					  <div class="box-body">
						<div class="form-group">
			<?php echo $this->Form->create('BookIssue',array("url"=>array("controller"=>"LibraryManagement","action"=>"bookReturn")));?>
						  <div class="form-group">
							<div class="row">
								<div class="col-md-12">
									<label>Class<span class="mandatory_fields"> * </span></label>
									<?php echo $this->Form->input('add_class_id',array('type'=>'select','label'=>false,'required','empty'=>'Select Class','options'=>array($classes),"class"=>"form-control select_box")) ?>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-md-12">
									<label>Student Name / ID<span class="mandatory_fields"> * </span></label>
									<?php echo $this->Form->input('id',array("type"=>"hidden")); 
									echo $this->Form->input('student_code',array("type"=>"text","id"=>"student_code","class"=>"form-control","required","label"=>false));?>
								</div>
							</div>
						</div>
								
						<div class="form-group">
							<div class="row">
								<div class="col-md-6">
									<?php echo $this->Form->submit('Show',array("class"=>"btn btn-info"));?>
								</div>
								
								<div class="col-md-6">
									<?php echo $this->Html->link('<i class="btn btn-warning">Cancel</i>', array("controller"=>"LibraryManagement","action"=>"bookReturn"),array("escape"=>false)); ?>
								</div>
						  </div>
						</div>
						
						<div class="form-group">
							<div class="row">
								<div class="col-md-12"><?php echo $this->session->flash(); ?></div>
							</div>
						</div>
						   
						</div>
					  </div>
					
					<?php echo $this->Form->end();?>
					<!---- form end ------>
				  	
				  
				</div>
				</div>
			
<!--------------Add  Category ---------------->
	<?php if(!empty($book)){ ?>
        <!-- left column -->
	
		<div class="col-md-8">
		
          <div class="box box-warning">
		  <div class="box-header with-border">
		  <div class="row" style="color:blue;">
			<?php foreach($student_list as $s) { ?>
				<div class="col-md-4"><?php echo "Student name : ".$s['StudentDetail']['student_name']; ?></div>
				<div class="col-md-4"><?php echo "Student code : ".$s['StudentDetail']['student_code']; ?></div>
				<div class="col-md-4"><?php echo "Class : ".$s['AddClass']['class_name']; ?></div>
			<?php break; } ?>
		</div>
		  </div>
			  <div class="box-body">
			  <?php echo $this->Form->create('BookIssue',array("url"=>array("controller"=>"LibraryManagement","action"=>"bookReturnProcess")));?>
				<table class="table table-bordered">
				<thead>
					<tr><th>Sl.No</th><th>Issued Book</th><th>Book Code</th><th>Issued Date</th><th>Return Date</th><th>Action</th></tr>
				</thead>
	
				<?php $i=1; foreach($book as $l) { ?>
				<tr>
				<?php echo $this->Form->input('book_issue_id',array('type'=>'hidden','value'=>$l['BookIssueDetail']['book_issue_id'])); ?>
					<td><?php echo $i++;?></td>
					<td><?php echo $l['BookDetail']['title']; ?></td>
					<td><?php echo $l['BookDetail']['book_code']; ?></td>
					<td><?php echo date('d-M-Y',strtotime($l['BookIssue']['issue_date'])); ?></td>
					<td><?php echo date('d-M-Y',strtotime($l['BookIssue']['return_date']));?></td>
					<td><div class="form-group"> 
						<label>
						<input type="checkbox" value=<?php echo $l['BookIssueDetail']['id']; ?> name="book_issued[]">
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
		<?php }  ?>
	</div>
      <!-- row -->
	
				
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
	</div> <!-- wrapper -->
	
  <script>
    <!--AUTO COMPLETE REFERENCE -->
  
var $j = jQuery.noConflict();
  $j(function() {
    var availableTags = [<?=$student?>];
    $j( "#student_code" ).autocomplete({
      source: availableTags
    });
  } ); 
 <!--AUTO COMPLETE REFERENCE -->
</script>