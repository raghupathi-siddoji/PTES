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
         <li class="active">Book Publisher</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
           
          <!------------"BOOK publisher" created: 20 aug 2016 ----------->
        <!-- right column -->
		<div class="row">
        <div class="col-md-12">
		
          <div class="box box-warning">
			<div class="box-header with-border">
			<div class="row">
				<div class="col-md-4"><h4>Publisher List</h4></div>
				<div class="col-md-4"><?php echo $this->session->flash(); ?></div>
				<div class="col-md-2">
					<?php echo $this->Html->link('<i class="glyphicon glyphicon-print"></i>',array('controller'=>'LibraryManagement',
					'action'=>'bookPublisherListPrint'),array('escape'=>false,'target'=>'_blank'))?>	
				</div>
				<div class="col-md-2">
					<?php echo $this->Html->link('<i class="btn btn-info pull-right">Book Publisher Entry</i>', array("controller"=>"LibraryManagement","action"=>"bookPublisher"),array("escape"=>false)); ?>
				</div>
			</div>
			</div>
			  <div class="box-body">
				<table class="table table-bordered" id="example1">
				<thead>
				<tr><th>#</th><th>Publisher Code</th><th>Publisher Name </th><th>Contact</th><th>Email</th><th>Fax</th><th>Address</th><th>Delete</th><th>Edit</th></tr>
				</thead>
				<?php 
					$i=1;
					foreach($list as $publisher_list)
					{
					?>
				<tr>
					<td><?php echo $i++;?></td>
					<td><?php echo $publisher_list['BookPublisher']['publisher_code'] ; ?> </td>
					<td><?php echo $publisher_list['BookPublisher']['publisher_name'] ; ?> </td>
					<td><?php echo $publisher_list['BookPublisher']['contact'];?> </td>
					<td><?php echo $publisher_list['BookPublisher']['email'];?></td>
					<td><?php echo $publisher_list['BookPublisher']['fax_no'];?></td>
					<td><?php echo $publisher_list['BookPublisher']['address']."-".$publisher_list['BookPublisher']['city'];?></td>
					<td><?php echo $this->Html->link('<i style="font-size:12px;" class="glyphicon glyphicon-trash"></i>'
						,array("controller"=>"LibraryManagement","action"=>"deleteBookPublisher",$publisher_list['BookPublisher']['id']),
						array("confirm"=>"Are you sure you want ro delete???","escape"=>false)); ?></td>
					</td>
					<td><?php echo $this->Html->link('<i style="font-size:12px;" class="glyphicon glyphicon-edit"></i>'
					,array("controller"=>"LibraryManagement","action"=>"bookPublisher",$publisher_list['BookPublisher']['id']),
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