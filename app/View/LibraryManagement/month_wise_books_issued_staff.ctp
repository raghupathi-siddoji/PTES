<?php //print_r($book_list); ?>
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
   <?php if(!empty($book_list)){ ?>
        <!-- left column -->
		<?php $from_date=$this->request->data['StaffBookIssue']['from_date']; ?>
		<?php $to_date=$this->request->data['StaffBookIssue']['to_date']; ?>
	<div class="row">
		<div class="col-md-12">
		
          <div class="box box-warning">
		  <div class="box-header with-border">
			<div class="row">
				<div class="col-md-10">
					<h4>Book Lists </h4>
				</div>
				
				<div class="col-md-1">
					<?php echo $this->Html->link('<i class="glyphicon glyphicon-print"></i>',
					array('controller'=>'LibraryManagement','action'=>'monthWiseBooksIssuedStaffPrint',$from_date,$to_date),array('escape'=>false,'target'=>'_blank'))?>
				</div>
				<div class="col-md-1">
					<?php echo $this->Html->link('<i class="btn btn-warning btn-sm pull-right">Go Back</i>',
					array('controller'=>'LibraryManagement','action'=>'monthWiseReportStaff'),array('escape'=>false))?>
				</div>
			</div>
			</div>
				
				</table>
			  <div class="box-body">
			  <div class="row">
			  <div class="col-md-12">
			  <?php if(!empty($from_date) && !empty($from_date)) {?>
		   <p align="center" style="font-size:16px;color:red;"> <?php echo "From : ".date('d-M-Y',strtotime($from_date))." To : ".date('d-M-Y',strtotime($to_date)); ?></p>
				<?php } ?>
				<table class="table table-bordered table-stripped">
				<thead>
				<tr><th>Sl.No</th><th>Staff Name</th><th>Staff Id</th><th>Unique Code</th><th>Book Code</th><th>Book Name</th><th>Author</th>
				<th>Issued Date</th><th>Return Date</th><th>Book Remark</th></tr>
				</thead>
				
				<?php $i=1; foreach($book_list as $l) { ?>
				<tr>
					<td><?php echo $i++;?></td>
					<td><?php echo $l['StaffDetail']['first_name']; ?></td>
					<td><?php echo $l['StaffDetail']['emp_id']; ?></td>
					<td><?php echo $l['BookDetail']['book_unique_code']; ?></td>
					<td><?php echo $l['BookDetail']['book_code']; ?></td>
					<td><?php echo $l['BookDetail']['title']; ?></td>
					<td><?php echo $l['BookAuthor']['author_name_one']; ?></td>
					<td><?php echo date('d-M-y',strtotime($l['StaffBookIssue']['issue_date'])); ?></td>
					<td><?php echo date('d-M-y',strtotime($l['StaffBookIssue']['return_date'])); ?></td>
					<td><?php if($l['StaffBookIssueDetail']['book_status']=='book_issued') 
								echo "Issued";
							else 
								echo "Returned"; ?></td>
				</tr>
				<?php } ?>
				</table>
				</div>
				</div>
								
				</div>
			</div>
        </div>
	</div>
      <!-- row -->
	<?php } else
	{
		echo $this->Session->flash(); 
	}?>
				
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
	</div> <!-- wrapper -->