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
        <li class="active">Book Details</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

	
        <!-- right column -->
		<div class="row">
        <div class="col-md-12">
		
          <div class="box box-warning">
		  <div class="box-header with-border">
			<div class="row">
				<div class="col-md-4"><h4>Book List</h4></div>
				<div class="col-md-6"><?php echo $this->session->flash(); ?></div>
				<div class="col-md-1">
					<?php echo $this->Html->link('<i style="font-size:15px" class="glyphicon glyphicon-print"></i>', array("controller"=>"LibraryManagement","action"=>"bookDetailsListPrintout"),array("escape"=>false,'target'=>'_blank')); ?>
				</div>
				<div class="col-md-1">
					<?php echo $this->Html->link('<i class="btn btn-info btn-sm pull-right">Book Detail Entry</i>', array("controller"=>"LibraryManagement","action"=>"bookDetails"),array("escape"=>false)); ?>
				</div>
			</div>
			</div>
			  <div class="box-body">
				<table class="table table-bordered table-condensed" id="example1">
				<thead>
				<tr><th>#</th><th>Book Code</th><th>RFID / Barcode</th><th>Title </th><th>Category</th><th>Author</th><th>Language</th><th>Publisher</th><th>Cost</th>
				<th>Bill No</th><th>Condition</th><th></th></tr>
				</thead>
				<?php 
					//print_r($list as $values);
					$i=1;
					foreach($books as $values)
					{
						$id=$values['BookDetail']['id'];
						$book_id=$values['BookDetail']['book_unique_code'];
				?>
				<tr>
					<td><?php echo $i++;?></td>
					<td><?php echo $values['BookDetail']['book_code'];?></td>
					<td><?php echo $values['BookDetail']['book_unique_code'];?></td>
					<td><?php echo $values['BookDetail']['title'];?></td>
					<td><?php echo $values['BookCategory']['category_name'];?></td>
					<td><?php echo $values['BookAuthor']['author_name_one'];?></td>
					<td><?php echo $values['BookLanguage']['language'];?></td>
					<td><?php echo $values['BookPublisher']['publisher_name'];?></td>
					<td><?php echo $values['BookDetail']['price'];?></td>
					<td><?php echo $values['BookDetail']['bill_no'];?></td>
					<td><?php echo $values['BookDetail']['condition'];?></td>
					
					<td><?php echo $this->Html->link('<i style="font-size:12px;" class="glyphicon glyphicon-edit"></i>'
					,array("controller"=>"LibraryManagement","action"=>"bookDetailEdit",$id),
					array("escape"=>false)); ?> | <?php echo $this->Html->link('<i style="font-size:12px;" class="glyphicon glyphicon-trash"></i>'
					,array("controller"=>"LibraryManagement","action"=>"bookDetailsDelete",$book_id),
					array("confirm"=>"Are you sure you want ro delete?","escape"=>false)); ?></td>
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