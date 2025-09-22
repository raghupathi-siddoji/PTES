 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
	  <h1>Spoken English Report</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="feeCollectionMenu">Spoken English</a></li>
        <li class="active">Spoken English Report</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
		<div class="row"> 
			<!------------------------------------>
			 
			<?php echo $this->Form->create('SpokenEnglish',array("url"=>array("controller"=>"SpokenEnglish","action"=>"SpokenEnglishReport")));?>
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
											echo $this->Form->input("add_class_id",array("type"=>"select","label"=>false,"options"=>$classes,"class"=>"form-control","empty"=>"Select"));
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
	
			 
			$academic_year = $this->request->data['SpokenEnglish']['academic_year_id']; 
			$add_class_id = $this->request->data['SpokenEnglish']['add_class_id'];
			$from_date = $this->request->data['SpokenEnglish']['from_date'];
			$to_date = $this->request->data['SpokenEnglish']['to_date'];
			if($from_date==""){$from_date=0;}if($to_date==""){$to_date=0;}
			
			
	?>
  <!------------ Add Category  ----------->
		<div class="row">
			<div class="col-md-6"> </div> 
		    
			<div class="col-md-3">
				<?php echo $this->Html->link('<span class="glyphicon glyphicon-print"></span>',array("controller"=>"SpokenEnglish","action"=>"SpokenEnglishReportPrint",$academic_year,$add_class_id,$from_date,$to_date),array("escape"=>false,"target"=>"_blank"));?>
			 </div>
		</div>
	 
	 <div class="row">

			 
    <?php //if($fee_type!="Miscellaneous Fee"){?>
        <!-- right column -->
            <div class="col-md-12">
		
          <div class="box box-warning">
			  <div class="box-body">
				<table class="table table-bordered" >
					<thead>
						<tr><th>Sl.No</th><th>Name</th><th>Date</th><th style="text-align: center;" >Grade A</th>
						<th style="text-align: center;" >Grade B</th><th style="text-align: center;" >Grade C</th><th style="text-align: center;">Total</th></tr>
					</thead>
					<?php 
						//print_r($class_fee_list);
						$i=0;
						$totA1	=0; $totB1=0; $totC1=0; $tot1=0;
						foreach($Spoken_english_grade as $list):
						
					?>
						<tr>
							<td><?php echo $i+1;?></td>
							<td><?php echo strtoupper($list['StudentDetail']['student_name']);?></td>
							 
							<!--<td><?php //echo $list['AddClass']['class_name'];?></td>-->
							<td><?php echo date('d-m-Y',strtotime($list['SpokenEnglish']['date']));?></td>
							<td width="8%" align="center"><?php echo $totA[$i];?></td>
							<td width="8%" align="center"><?php echo $totB[$i]; ?></td>
							<td width="8%" align="center"><?php echo $totC[$i]; ?></td>
							<td align="center"><?php echo $tot[$i]; ?></td>
							<?php $totA1+=$totA[$i];  $totB1+=$totB[$i]; $totC1+=$totC[$i]; $tot1+=$tot[$i];?>

							
							 
						</tr> 
					<?php $i++; endforeach; 
					
					?>
					
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