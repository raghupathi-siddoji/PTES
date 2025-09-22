 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
	  <h1>Unit Test Marks Report</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="feeCollectionMenu">Examination</a></li>
        <li class="active">Unit Test Marks Report</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
		<div class="row"> 
			<!------------------------------------>
			 
			<?php echo $this->Form->create('UnitTest',array("url"=>array("controller"=>"Exam","action"=>"UnitTestMarksList")));?>
				<div class="form-horizontal">
					 
					<div class="col-md-12"> 
						<div class="box box-warning"> 
							<div class="box-header with-border">
								<div class="row"> 
								<div class="col-md-2">
									<label>Academic Year <span class="mandatory_fields">*</span></label>
									<?php echo $this->Form->input("academic_year_id",array("type"=>"select","options"=>$year_list,"class"=>"form-control select_box","required","label"=>false));?>		
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
								
								<div class="col-md-2"> <label>&nbsp;</label>
									<?php echo $this->Form->submit("Show",array("class"=>"btn btn-primary btn-sm",'name'=>'show_btn','value'=>'Show')); ?>
								</div>
							</div> 
								
							</div>
						</div>
					</div>
					 
				</div>  
		</div>
	 <div class="row"> 
		<div class="col-md-2">&nbsp;</div>
		<div class="col-md-6"><?php echo $this->Session->flash();?></div>
		<div class="col-md-4">&nbsp;</div>
	 </div>
	<?php if(isset($_POST['show_btn'])!=''){
	
			 
			$academic_year = $this->request->data['UnitTest']['academic_year_id']; 
			$add_class_id = $this->request->data['UnitTest']['add_class_id'];
			$from_date = $this->request->data['UnitTest']['from_date'];
			$to_date = $this->request->data['UnitTest']['to_date'];
			if($from_date==""){$from_date=0;}if($to_date==""){$to_date=0;}
			
			
			
	?>
  <!------------ Add Category  ----------->
		<div class="row">
			<div class="col-md-6"> </div> 
		    
			<div class="col-md-3">
				<?php echo $this->Html->link('<span class="glyphicon glyphicon-print"></span>',array("controller"=>"Exam","action"=>"UnitTestReportPrint",$academic_year,$add_class_id,$from_date,$to_date),array("escape"=>false,"target"=>"_blank"));?>
			 </div>
		</div>
	 
	 <div class="row">
            <div class="col-md-12">
		
          <div class="box box-warning">
			  <div class="box-body">
				<table class="table table-bordered" id="reportsMarks" >
					
					<?php 
						
						$i=0;
						
						foreach($details as $list):
						if($i==0)
						{
						
					?>
					
						<thead>
							<tr>
								<th><?php echo $list['id']; ?></th>
								<th><?php echo $list['student_name']; ?></th>
								<?php foreach($list['utdetails'] as $utdetail){ ?>
								<th><?php echo $utdetail['date']?>&nbsp;&nbsp;<br><?php echo $utdetail['subject']; ?></th>
								<?php } ?>
							</tr>
						</thead>
						<?php } 
						else { ?>
						
								<tr>
									<td><?php echo $i; ?></td>
									<td><?php echo strtoupper($list['student_name']); ?></td>
									<?php foreach($list['utdetails'] as $utdetail){ ?>
									<td><?php echo $utdetail; ?></td>
									<?php } ?>
								</tr>
														
						<?php } ?>
						
						
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