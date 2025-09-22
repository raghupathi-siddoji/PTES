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
			 
			<?php echo $this->Form->create('SpokenEnglish',array("url"=>array("controller"=>"SpokenEnglish","action"=>"SpokenEnglishList")));?>
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
									<label>Date </label>
									<?php 
											 
											echo $this->Form->input('from_date',array("type"=>"text","class"=>"form-control","label"=>false,"id"=>"datepicker","required"));?>
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
			
			if($from_date==""){$from_date=0;}
			
			
	?>
  <!------------ Add Category  ----------->
		
	 
	 <div class="row">

			 
    <?php //if($fee_type!="Miscellaneous Fee"){?>
        <!-- right column -->
            <div class="col-md-12">
		
          <div class="box box-warning">
			  <div class="box-body">
				<table class="table table-bordered" id="example1" >
					<thead>
						<tr><th>Sl.No</th><th>Name</th><th>Class</th><th>Date</th><th style="text-align: center;">Grade A</th>
						<th style="text-align: center;">Grade B</th><th style="text-align: center;">Grade C</th>
						<th>Total</th><th style="text-align: center;">Action</th></tr>
					</thead>
					<?php 
						//print_r($class_fee_list);
						$i=0;
						$totA1	=0; $totB1=0; $totC1=0; $tot1=0;
						foreach($Spoken_english_grade as $list):
						
					?>
						<tr>
							<td><?php echo $i+1;?></td>
							<td><?php echo $list['StudentDetail']['student_name'];?></td>
							 
							<td><?php echo $list['AddClass']['class_name'];?></td>
							<td><?php echo date('d-m-Y',strtotime($list['SpokenEnglish']['date']));?></td>
							<td  align="center"><?php echo $totA[$i];?></td>
							<td  align="center"><?php echo $totB[$i]; ?></td>
							<td  align="center"><?php echo $totC[$i]; ?></td>
							<td align="center"><?php echo $tot[$i]; ?></td>
							<?php $totA1+=$totA[$i];  $totB1+=$totB[$i]; $totC1+=$totC[$i]; $tot1+=$tot[$i];?>
							<td> 
								 <?php echo $this->Html->link('<i class="fa fa-trash-o" ></i>',
									array("controller"=>"SpokenEnglish","action"=>"deleteSpokenEnglish", $list['StudentDetail']['id'],$list['SpokenEnglish']['date'],$list['SpokenEnglish']['add_class_id'],$list['SpokenEnglish']['academic_year_id']),
									array("confirm"=>"Are you sure you want ro delete?", "escape"=>false)); ?>  | 
								<?php echo $this->Html->link('<i class="fa fa-pencil" ></i>',
												array("controller"=>"SpokenEnglish","action"=>"spokenEnglishEdit", $list['StudentDetail']['id'],$list['SpokenEnglish']['date'],$list['SpokenEnglish']['add_class_id'],$list['SpokenEnglish']['academic_year_id']),
												array("escape"=>false)); ?><!--| 
								<?php// echo $this->Html->link('<i class="fa fa-print" ></i>',
											//	array("controller"=>"SchoolFeeCollection","action"=>"tuitionFeePrint", $list['SchoolFeeCollection']['id']),
											//	array("escape"=>false,"target"=>"_blank")); ?></td>-->
							
						</tr> 
					<?php $i++; endforeach; 
					?>
					<!--<tr>
							<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
							<td><?php //echo $totA1/$tot1*100; ?></td>
							<td><?php //echo $totB1/$tot1*100; ?></td>
							<td><?php //echo $totC1/$tot1*100; ?></td>
						</tr>-->
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