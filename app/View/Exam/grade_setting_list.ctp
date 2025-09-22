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
	<div class="col-md-1"></div>
	<div class="col-md-10">
        <div class="box box-warning">
			<div class="box-header with-border"><h4>Grade List<a href="../Exam/gradeSetting" class="btn btn-info btn-sm pull-right">Grade Setting</a></h4>
		</div>
			
			<div class="box-body">
			<div class="row">
				<div class="col-md-1"></div>
				<div class="col-md-10">
				<table class="table table-condensed table-bordered" id="example1">
					<thead>
						<tr>
							<th>Sl.No</th>
							<th>Maximum Marks</th>
							<th>Grade Setting Details</th>
							<th>Delete</th>
							<th>Edit</th>
						</tr>
					</thead>
					
					<tbody>
					 <?php $number=1; foreach($gradelist as $sub) { 
					 $id=$sub['GradeSetting']['id']; ?> 
						<tr>
							<td><?php echo $number++; ?></td>
							<td><?php echo $sub['GradeSetting']['max_marks']; ?></td>
							<td><?php echo $this->Html->link('View'
						,array("controller"=>"Exam","action"=>"viewGradeList",$id),
						array("escape"=>false)); ?></td>
						
							<td><?php echo $this->Html->link('<i style="font-size:17px;" class="glyphicon glyphicon-trash"></i>'
						,array("controller"=>"Exam","action"=>"gradeSettingDelete",$id),
						array("confirm"=>"Are you sure you want ro delete???","escape"=>false)); ?></td>	
					
					<td><?php echo $this->Html->link('<i style="font-size:17px;" class="glyphicon glyphicon-edit"></i>'
					,array("controller"=>"Exam","action"=>"gradeSetting",$id),
					array("escape"=>false)); ?></td>
						</tr>
					<?php } ?>
						
					</tbody>
				</table>
				</div>
				</div>
				
				<div class="row">
				<div class="col-md-4"><?php echo $this->Session->flash(); ?></div>
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