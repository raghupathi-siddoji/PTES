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
					  <h3 class="box-title">Individual Report</h3>
					</div>
					
					  <div class="box-body">
						<div class="form-group">
			<?php echo $this->Form->create('BookIssue',array("url"=>array("controller"=>"LibraryManagement","action"=>"individualReport")));?>
						   <div class="row">
								<div class="col-md-2">
									<label>Class<span class="mandatory_fields"> * </span></label>
								</div>
								<div class="col-md-3">
									<?php echo $this->Form->input('add_class_id',array('type'=>'select','label'=>false,'required','empty'=>'Select Class','options'=>array($classes),"class"=>"form-control select_box")) ?>
								</div>
								
						  		<div class="col-md-2">
									<label>Student Name / ID<span class="mandatory_fields"> * </span></label>
								</div>
								<div class="col-md-3">
								<?php 
									echo $this->Form->input('id',array("type"=>"hidden")); 
									echo $this->Form->input('student_code',array("type"=>"text","id"=>"student_code","class"=>"form-control","required","label"=>false));?>
							
								</div>
								<div class="col-md-2">
									<?php echo $this->Form->submit('Show',array("class"=>"btn btn-info"));?>
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
	<?php if(!empty($student_list)){ ?>
        <!-- left column -->
	<div class="row">
		<div class="col-md-1"></div>
		<div class="col-md-10">
		
          <div class="box box-warning">
		  <div class="box-header with-border">
		  <div class="row">
			<div class="col-md-11">
			<?php foreach($student_list as $s) {
				echo "Student name : ".$s['StudentDetail']['student_name'];
				echo "<br>"."Student code : ".$data=$s['StudentDetail']['student_code'];
				echo "<br>Class : ".$s['AddClass']['class_name'];
				$clas_id=$s['AddClass']['id'];
			break; } ?>
			</div>
			<div class="col-md-1">
				<?php echo $this->Html->link('<i class="glyphicon glyphicon-print"></i>',
				array('controller'=>'LibraryManagement','action'=>'individualReportPrint',$data,$clas_id),array('escape'=>false,'target'=>'_blank'))?>	
			</div>
		  </div>
			  <div class="box-body">
				<table class="table table-bordered">
				<thead>
					<tr><th>Sl.No</th><th>Book Title</th><th>Book Code</th><th>Unique Code</th><th>Issued Date</th><th>Return Date</th><th>Book Remark</th></tr>
				</thead>
	
				<?php $i=1; foreach($student_list as $l) { ?>
				<tr>
				<?php echo $this->Form->input('book_issue_id',array('type'=>'hidden','value'=>$l['BookIssueDetail']['book_issue_id'])); ?>
					<td><?php echo $i++;?></td>
					<td><?php echo $l['BookDetail']['title']; ?></td>
					<td><?php echo $l['BookDetail']['book_code']; ?></td>
					<td><?php echo $l['BookDetail']['book_unique_code']; ?></td>
					<td><?php echo date('d-M-Y',strtotime($l['BookIssue']['issue_date'])); ?></td>
					<td><?php echo date('d-M-Y',strtotime($l['BookIssue']['return_date']));?></td>
					<td><?php if($l['BookIssueDetail']['book_status']=='book_issued') 
								echo "Issued";
							else 
								echo "Returned"; ?></td>
				</tr>
				<?php } ?>
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