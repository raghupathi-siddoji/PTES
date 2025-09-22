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
   <?php echo $this->Form->create('BookIssue',array("url"=>array("controller"=>"LibraryManagement","action"=>"issueStudentBook")));?>

	<?php if(!empty($list)) { ?>
        <!-- left column -->
	<div class="row">
			
		<!-- Right column -->
		<div class="col-md-4">
				  <div class="box box-success">
					<div class="box-header with-border">
					  <h3 class="box-title">Book Issue</h3>
					</div>
					<!-- form start -->
				   
					  <div class="box-body">
						<div class="form-group">
							<div class="row">
								<div class="col-sm-5"><label>Issue Date<span class="mandatory_fields"> * </span></label></div>
								<div class="col-sm-7">	
									<?php echo $this->Form->input('issue_date',array("type"=>"text","id"=>"datepicker","class"=>"form-control","required","label"=>false));?>
								</div>
							</div>
							<br>
							<div class="row">
							
								<div class="col-sm-5"><label>Return Date<span class="mandatory_fields"> * </span></label></div>
								<div class="col-sm-7">	
									<?php echo $this->Form->input('return_date',array("type"=>"text","id"=>"datepicker1","class"=>"form-control","required","label"=>false));?>
								</div>
							</div>
							<br>
							<div class="row">
								<label class="col-sm-5">Academic Year<span class="mandatory_fields"> * </span></label>
								<div class="col-sm-7">
									<?php echo $this->Form->input('academic_year_id',array('type'=>'select','label'=>false,'options'=>array($year_list),"required","class"=>"form-control select_box",'empty'=>'Select Academic Year',)) ?>	</div>
								</div>
							</div>
							
							<div class="row">
								<label class="col-sm-5">Class<span class="mandatory_fields"> * </span></label>
								<div class="col-sm-7">
								<?php echo $this->Form->input('add_class_id',array('type'=>'select','label'=>false,'required','empty'=>'Select Class','options'=>array($classes),"class"=>"form-control select_box")) ?>
								</div>
							</div>
							<br>
							<div class="row">
								<div class="col-sm-5"><label>Student Name/ID <span class="mandatory_fields"> * </span></label></div>
								<div class="col-sm-7">	
									<?php 
									echo $this->Form->input('student_code',array("type"=>"text","id"=>"student_code","class"=>"form-control","required","label"=>false));?>
								</div>							</div>
							
							<br>
							<div class="row">
								<div class="col-sm-4"></div>
								<div class="col-sm-2"><?php echo $this->Form->submit('Issue',array("class"=>"btn btn-info"));?></div>
								<div class="col-sm-4"><?php echo $this->Html->link('<i class="btn btn-warning pull-right">Cancel</i>', array("controller"=>"LibraryManagement","action"=>"bookIssue"),array("escape"=>false)); ?></div>
						   </div>
						</div>
						
					  </div>
		 	 </div>
		 <!----------Right Side----------------->
		
		 <div class="col-md-8">
		
			<div class="box box-warning">
			  <div class="box-body">
				<table class="table table-condensed" id="example1">
				<thead>
					<tr><th>Sl.No</th><th>Book Title </th><th>Book Code</th><th>Author</th><th>Category</th><th>Language</th><th>Action</th></tr>
				</thead>
				<?php $i=1; foreach($list as $book) { 
				?>
				<tbody>
				<tr>
					<td><?php echo $i++; ?></td>
					<td><?php echo $book['BookDetail']['title']; ?></td>
					<td><?php echo $book['BookDetail']['book_code']; ?></td>
					<td> <?php echo $book['BookAuthor']['author_name_one']; ?> </td>
					<td> <?php echo $book['BookCategory']['category_name']; ?> </td>
					<td> <?php echo $book['BookLanguage']['language']; ?> </td>
					<td>
						<?php if(!empty($book['BookIssueDetail'][0]['book_status']))
							{
								echo "<h4 style='color:red;'>Issued</h4>";
							}
							else { ?> 
						<div class="form-group">
							<label>
							  <input type="checkbox" value=<?php echo $book['BookDetail']['id']; ?> name="book_issued[]">
							</label>
						</div>
						<?php } ?>
					</td>
				</tr>
				<?php } ?>
				</table>
								
				</div>
			</div>
        </div>
	   </div>
      <!-- row -->
	<?php } 
	else
	{ 
	echo $this->Session->flash();
	} ?>
		<?php echo $this->Form->end(); ?>
				
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