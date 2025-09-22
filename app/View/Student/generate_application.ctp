 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
	  <h1>Academic</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Academic</a></li>
        <li class="active">Generate ApplicationS</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
     
  <!------------"Application Form Entry" created: 20 aug 2016 ----------->
  
	 <div class="row">
        <!-- left column -->
		
        <div class="col-md-5">
          <div class="box box-success">
		     <div class="box-header with-border">Generate Application Form</div>
            <!-- form start -->
           <?php echo $this->Form->create('StudentApplication',array("url"=>array("controller"=>"Student","action"=>"generateApplication")));?>
		   
              <div class="box-body">
                <div class="form-group">
					<div class="row">
						<div class="col-sm-5"><label>Academic Year<span class="mandatory_fields">*</span></label></div>
						<div class="col-sm-7">
						<?php echo $this->Form->input('id',array("type"=>"hidden")); ?>
						<?php echo $this->Form->input('academic_year_id',array('type'=>'select','id'=>'year_id','label'=>false,'options'=>array($year_list),'onchange'=>"get_application_num(this.id)","required","class"=>"form-control select_box")); ?>
						</div>
					</div>
				</div>

			   <div class="form-group">
					<div class="row">
						<div class="col-sm-5"><label>Application Number<span class="mandatory_fields">*</span></label></div>
						<div class="col-sm-7">
						<span id="application_no">
							<?php echo  $this->Form->input('application_no',array("type"=>"text","class"=>"form-control auto_generate","value"=>$application_number,"required","label"=>false,"style"=>"background-color:#3CB371;color: white;","readonly"));?>
						</span>
						</div>
					</div>
				</div>
				
				<div class="form-group">
					<div class="row">
						<div class="col-sm-5"><label>Student Name<span class="mandatory_fields">*</span></label></div>
						<div class="col-sm-7">
							<?php echo $this->Form->input('student_name',array("type"=>"text","class"=>"form-control","required","label"=>false));?>
						</div>
					</div>
				</div>
				
				<div class="form-group">
					<div class="row">
						<div class="col-sm-5"><label>Application Amount<span class="mandatory_fields">*</span></label><p style="color:#00C0EF">[For New Admission only]</p></div>
						<div class="col-sm-7">
							<?php echo $this->Form->input('amount',array("type"=>"text","class"=>"form-control auto_generate", "value"=>$application_fee['ApplicationFee']['fee_amount'],"label"=>false,"style"=>"background-color:#3CB371;color: white;","readonly"));?>
						</div>
					</div>
				</div>
				
				<div class="form-group">
					<div class="row">
						<div class="col-sm-4"></div>
						<div class="col-sm-4"><?php echo $this->Form->submit('Get Application',array("class"=>"btn btn-info"));?></div>
						<div class="col-sm-4"></div>
				   </div>
                </div>
				 <div class="row">
				<div class="col-md-12">
					<?php echo $this->Session->flash(); ?>
				</div>
			</div>
				
              </div>
            <?php echo $this->Form->end();?>
			<!---- form end ------>
         
		  
		</div>
        </div>
        <!--col (left) -->
		
	
<!--------------Add  Category ---------------->
	
        <!-- right column -->
        <div class="col-md-7">
		
          <div class="box box-warning">
			  <div class="box-body">
				<table class="table table-bordered" id="example1">
				<thead>
					<tr><th>Sl.No</th><th>Application No</th><th>Student Name</th><th>Recipt</th><th>Application Form</th></tr>
				</thead>
				<tbody>
						<?php	$i=1;	
						foreach($list as $lt) {
						$id=$lt['StudentApplication']['application_no']; ?>
						<tr>
							<td><?php echo $i++; ?></td>
							<td><?php echo $lt['StudentApplication']['application_no'];?></td>
							<td><?php echo $lt['StudentApplication']['student_name'];?></td>
							
							<td><?php echo $this->Html->link('Get Recipt',array("controller"=>"Student","action"=>"applicationFeePrint", $id),
							array("escape"=>false,"target"=>"_blank")); ?></td>	
							
							<td><?php echo $this->Html->link('Get Appliation',array("controller"=>"Student","action"=>"applicationForm", $id),
							array("escape"=>false,'target'=>'_blank')); ?></td>	

							<!--<td><?php echo $this->Html->link('<i style="font-size:17px;" class="glyphicon glyphicon-trash"></i>'
							,array("controller"=>"Student","action"=>"applicationDelete", $id),
							array("confirm"=>"Are you sure you want ro delete?","escape"=>false)); ?></td>-->
					</tr>
					<?php } ?>
						
					</tbody>
				</table>
				
					
			</div>
			</div>
        </div>

      </div>
      <!-- row -->
    
	</section>
    <!-- content -->
  </div>
  <!-- content-wrapper -->
  
   <script>
	function get_application_num(id)
	{	
		var year = $("#year_id").val(); 
		if(year_id != ""){ 
		 	$.get( "<?=$this->webroot?>Student/generateApplicationNumber/"+year, function( data ) { 
			 $( "#application_no" ).html( data ); 
			 });
		} 
	}
	
  </script>