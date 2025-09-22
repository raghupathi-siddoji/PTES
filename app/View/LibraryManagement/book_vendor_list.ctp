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
         <li class="active">Book Vendor</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
        <!-- right column -->
		<div class="row">
        <div class="col-md-12">
		
          <div class="box box-warning">
			<div class="box-header with-bordered">
			<div class="row">
				<div class="col-md-4"><h4>Vendor List</h4></div>
				<div class="col-md-4"><?php echo $this->session->flash(); ?></div>
				<div class="col-md-2">
					<?php echo $this->Html->link('<i class="glyphicon glyphicon-print"></i>',array('controller'=>'LibraryManagement',
					'action'=>'bookVendorListPrint'),array('escape'=>false,'target'=>'_blank'))?>	
				</div>
				<div class="col-md-2">
					<?php echo $this->Html->link('<i class="btn btn-info pull-right">Book Vendor Entry</i>', array("controller"=>"LibraryManagement","action"=>"bookVendor"),array("escape"=>false)); ?>
				</div>
			</div>
			</div>
			  <div class="box-body">
				<table class="table table-bordered" id="example1">
				<thead>
				<tr><th>#</th><th>Vendor Code</th><th>Vendor Name </th><th>Contact</th><th>Email</th><th>Website</th><th>Delete</th><th>Edit</th></tr>
				</thead>
				<?php 
					$i=1;
					foreach($list as $values)
					{
					
				?>
				<tr>
					<td><?php echo $i++;?></td>
					<td><?php echo $values['BookVendor']['vendor_code'];?> </td>
					<td><?php echo $values['BookVendor']['vendor_name'];?> </td>
					<td><?php echo $values['BookVendor']['contact'];?> </td>
					<td><?php echo $values['BookVendor']['email'];?></td>
					<td><?php echo $values['BookVendor']['website'];?></td>
					<td><?php echo $this->Html->link('<i style="font-size:12px;" class="glyphicon glyphicon-trash"></i>'
						,array("controller"=>"LibraryManagement","action"=>"deleteBookVendor",$values['BookVendor']['id']),
						array("confirm"=>"Are you sure you want ro delete???","escape"=>false)); ?></td>
					</td>
					<td><?php echo $this->Html->link('<i style="font-size:12px;" class="glyphicon glyphicon-edit"></i>'
					,array("controller"=>"LibraryManagement","action"=>"bookVendor",$values['BookVendor']['id']),
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