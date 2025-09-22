  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
   <section class="content-header">
	  <h1>Examination</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Exam</a></li>
        <li class="active">Marks Entry</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
<!------------------------------------------------------------------------------------------------------->
<div class="row">	
	<div class="col-md-12">
        <div class="box box-warning">
			<div class="box-header with-border">
			<div class="row">
			<div class="col-md-4"><h4>Subject Allocation List</h4></div>
			<div class="col-md-6"><?php echo $this->Session->flash(); ?></div>
			<div class="col-md-2">
			<a href="../Exam/subjectAllocation" class="btn btn-info btn-sm pull-right">Subject Allocation</a>
			</div>
			</div>
		</div>
			
			<div class="box-body">
				<table class="table table-condensed table-bordered" id="example1">
					<thead>
						<tr>
							 <th>Sl.No</th>
							<th>Class</th>
							<?php for($i=1;$i<=10;$i++) { ?>
								<th><?php echo "Subject".$i; ?></th>
							<?php } ?>
							<th>Delete</th>
							<th>Edit</th>
						</tr>
					</thead>
					
					<tbody>
					 <?php $number=1; foreach($subject as $sub) { 
					 $id=$sub['SubjectAllocation']['id']; ?> 
						<tr>
							<td><?php echo $number++; ?></td>
							<td><?php echo $sub['AddClass']['class']; ?></td>
							<?PHP for($i=1;$i<=10;$i++) {
								if(!empty($sub['SubjectAllocation']["sub$i"])) { ?>
									<td><?php echo $sub['SubjectAllocation']["subcode$i"]; ?></td>
								<?php } else { ?>
									<td><?php echo "NONE"; ?></td>
								<?php } } ?>
								
							<td><?php echo $this->Html->link('<i style="font-size:17px;" class="glyphicon glyphicon-trash"></i>'
						,array("controller"=>"Exam","action"=>"subjectAllocationDelete",$id),
						array("confirm"=>"Are you sure you want ro delete???","escape"=>false)); ?></td>	
					
					<td><?php echo $this->Html->link('<i style="font-size:17px;" class="glyphicon glyphicon-edit"></i>'
					,array("controller"=>"Exam","action"=>"subjectAllocation",$id),
					array("escape"=>false)); ?></td
						</tr>
					<?php } ?>
						
					</tbody>
				</table>
				
				<div class="row">
				</div>
				
			</div>
        </div>
	</div>
	
 </div>
 <!-- row -->
	  
	  
    
	</section>
    <!-- content -->
  </div>
  <!-- content-wrapper -->