 <div class="wrapper"> 
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
           Asset Maintenance
           </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		 <li><a href="#">Asset Maintenance</a></li>
        <li class="active">Add Asset</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
         
		<!-------------- Asset Report   ---------------->
				  
       	<div class="row">
        <div class="col-md-12">
		
          <div class="box box-warning">
			  <div class="box-body">
				<table class="table table-bordered" id="example1">
				<thead>
				<tr><th>#</th><th>Category</th><th>Belong To</th><th>Asset Name</th><th>Working</th><th>Damaged</th><th>Total</th><th>Brand</th><th>Purchased Date</th></tr>
				</thead>
				<?php 
					$i=1;
					foreach($report as $assList)
					{
				?>
				<tr>
					<td><?php echo $i++; ?></td>
					<td><?php echo $assList['AssetCategory']['category'];?></td>
					<td><?php echo $assList['Asset']['belongs_to'];?> </td>
					<td><?php echo $assList['Asset']['asset_name'];?></td>
					<td><?php echo $assList['Asset']['working_asset'];?> </td>
					<td><?php echo $assList['Asset']['damaged_asset'];?></td>
					<td><?php echo $assList['Asset']['total_asset'];?> </td>
					<td><?php echo $assList['Asset']['brand']; ?></td>
					<td><?php echo $assList['Asset']['purchased_date']; ?></td>
				</tr>
				<?php 
				}
				?>
				</table>
								
			</div>
			
			</div>
        </div>
		
      </div>
      <!-- row -->
	
				
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
	</div> <!-- wrapper -->