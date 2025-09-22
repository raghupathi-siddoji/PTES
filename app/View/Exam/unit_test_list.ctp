<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">  
	<style>
	
	.content
	{min-height:1px;}
	
	</style>
		<!-- Content Header (Page header) -->
		<section class="content-header">
		  <h1>
			Unit Test Marks List
		  </h1>
		  <ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
			<li>Unit Test</li>
			<li class="active">Unit Test Marks List</li>
		  </ol>
		</section>
		<section class="content">
			<div class="row"> 
				<?php echo $this->Form->create('UnitTest',array("url"=>array("controller"=>"Exam","action"=>"UnitTestList")));?>
				<div class="col-md-12">
					<div class="box box-info">
						<div class="box-body">
							<div class="col-md-2">
								<div class="form-group">											
									<label for="select" class="col-sm-2 control-label">Batch</label>
									<div class="col-sm-10">
									<?php 
									echo $this->Form->input("academic_year_id",array("type"=>"select","label"=>false,"options"=>$year_list,"class"=>"form-control","required"));?> 
									 
									</div>
								</div>
							</div>
							<div class="col-md-2"> 
									<label>Class<span class="mandatory_fields">*</span></label>
									<?php  
										echo $this->Form->input("add_class_id",array("type"=>"select","label"=>false,"options"=>$classes,"class"=>"form-control","empty"=>"Select","required"));
										?>
								</div>
								
								<div class="col-md-2">
									<label>From Date </label>
									<?php 
										echo $this->Form->input('from_date',array("type"=>"text","class"=>"form-control","label"=>false,"id"=>"datepicker"));?>
								</div> 
								<div class="col-md-2">
									<label>To Date </label>
									<?php 
										echo $this->Form->input('to_date',array("type"=>"text","class"=>"form-control","label"=>false,"id"=>"datepicker1"));?>
								</div> 
								
							
							
							<div class="col-md-2">
								<div class="form-group">											
									<label for="select" class="col-sm-2 control-label">&nbsp; </label>
										<div class="col-sm-10">
											<button type="submit" class="btn btn-success" name="search_btn">
												<i class="glyphicon glyphicon-search"></i> Search
											</button>
										</div>
									
								</div> 
							
							</div>
					</div>
				</div>
				<?php echo $this->Form->end(); ?>
			</div>
			<div class="row">
				<div class="col-md-4">
					<?php echo $this->Session->flash();?>
				</div>
			</div>
		</section>
		
		<?php if(isset($this->request->data['search_btn']))
		{
			$academic_year = $this->request->data['UnitTest']['academic_year_id']; 
			$add_class_id = $this->request->data['UnitTest']['add_class_id'];
			//$subject_id = $this->request->data['UnitTest']['subject_allocation_id'];
			$from_date = $this->request->data['UnitTest']['from_date'];
			$to_date = $this->request->data['UnitTest']['to_date'];
			if($from_date==""){$from_date=0;}if($to_date==""){$to_date=0;}
			?>
		
		<!------------ Add Category  ----------->
		
	 
	 <div class="row">
            <div class="col-md-12">
		
          <div class="box box-warning">
			  <div class="box-body">
				<table class="table table-bordered" id="example1" >
					
					
						<thead>
							<tr>
								<th>#</th>
								<th>Date</th>
								<th>Subject</th>
								<th>Action</th>
								
							</tr>
						</thead>
						<?php 
						$i=0;
						foreach($details as $list):
						$id = $list['UnitTest']['id'];
					?>
						<tr>		
							<td><?php echo $i+1; ?></td>
							<td><?php echo date('d-m-Y', strtotime($list['UnitTest']['date'])); ?></td>
							<td><?php echo $list['SubjectAllocation']['subject']; ?></td>
							<td>
								<?php echo $this->Html->link('<i style="font-size:12px;" class="glyphicon glyphicon-trash"></i>',array("controller"=>"Exam","action"=>"deleteTest",$id),
								array("confirm"=>"Are you sure you want to delete?","escape"=>false,"title"=>"Delete")); ?> | 
								<?php echo $this->Html->link('<i style="font-size:12px;" class="glyphicon glyphicon-edit"></i>'
									,array("controller"=>"Exam","action"=>"UnitTestEdit",$list['UnitTest']['id'],$list['UnitTest']['date'],$list['UnitTest']['add_class_id'],$list['UnitTest']['academic_year_id']),
									array("escape"=>false)); ?>
										</td>
						</tr>
						
					<?php $i++; endforeach; ?>
					
				</table> 
			</div>
        </div> 
      </div>
     
                        
          <?php } ?>
      <!-- row --> 

		</div>
	</div>	  
        <!--col (left) --> 
	<?php //} ?>  <!-- if condition close-->	
	</section>
    <!-- content -->
  </div>
  <!-- content-wrapper -->
  
  <script>
  function get_course_onstream(stream_id)
  {
	 if(stream_id != ""){

		$.get( "<?php echo $this->webroot?>DegreeFeeCollection/populateCourse/"+stream_id, function( data ) {
		  $( "#course_list" ).html( data ); 
		});
	} 
  }
  </script>
  
  <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
 <script src="https://cdn.datatables.net/buttons/1.4.1/js/dataTables.buttons.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>  
 <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
 <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
 <script src="https://cdn.datatables.net/buttons/1.4.1/js/buttons.print.min.js"></script>

<script>
  jQuery(document).ready(function($){
        $('#reportsMarks').dataTable({
            "sPaginationType": "full_numbers",
            "responsive": true,
            "ordering": true,
            "bSort": true,
			"searching": false, 
            "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
               dom: 'lBfrtip',
			   buttons: [
			   'excel'

        ]
        })
    });
	</script>