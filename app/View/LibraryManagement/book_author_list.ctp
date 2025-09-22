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
        <li class="active">Book Author</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
           
          <!------------"BOOK Author" created: 20 aug 2016 ----------->
		  
        <!-- right column -->
		<div class="row">
        <div class="col-md-12">
		
          <div class="box box-warning">
			<div class="box-header with-bordered">
				<div class="row">
				<div class="col-md-4"><h4>Author List</h4></div>
				<div class="col-md-4"><?php echo $this->session->flash(); ?></div>
				<div class="col-md-2">
					<?php echo $this->Html->link('<i class="glyphicon glyphicon-print"></i>',array('controller'=>'LibraryManagement',
					'action'=>'bookAuthorListPrint'),array('escape'=>false,'target'=>'_blank'))?>	
				</div>
				<div class="col-md-2">
					<?php echo $this->Html->link('<i class="btn btn-info pull-right">Book Author Entry</i>', array("controller"=>"LibraryManagement","action"=>"bookAuthor"),array("escape"=>false)); ?>
				</div>
			</div>
			</div>
			  <div class="box-body">
				<table class="table table-bordered" id="example1">
				<thead>
				<tr><th>#</th><th>Author Code</th><th>Author Name </th><th>Contact</th><th>Email</th><th>Website</th><th>Delete</th><th>Edit</th></tr>
				</thead>
				<?php 
					$i=1;
					foreach($list as $values)
					{
				?>
				<tr>
					<td><?php echo $i++; ?></td>
					<td><?php echo $values['BookAuthor']['author_code']; ?></td>
					<td><?php echo $values['BookAuthor']['author_name_one']; ?></td>
					<td><?php echo $values['BookAuthor']['contact']; ?> </td>
					<td><?php echo $values['BookAuthor']['email'] ;?></td>
					<td><?php echo $values['BookAuthor']['website']; ?></td>
					<td><?php echo $this->Html->link('<i style="font-size:12px;" class="glyphicon glyphicon-trash"></i>'
						,array("controller"=>"LibraryManagement","action"=>"deleteBookAuthor",$values['BookAuthor']['id']),
						array("confirm"=>"Are you sure you want ro delete???","escape"=>false)); ?></td>
					</td>
					<td><?php echo $this->Html->link('<i style="font-size:12px;" class="glyphicon glyphicon-edit"></i>'
					,array("controller"=>"LibraryManagement","action"=>"bookAuthor",$values['BookAuthor']['id']),
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