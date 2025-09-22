 <div class="wrapper"> 
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
          Co-Curricular Activities
           </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		 <li><a href="#">Co-Curricular Activities</a></li>
        <li class="active">Add Asset</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
           
          <!------------"Add Subject" created: 20 aug 2016 ----------->
		  
			 <div class="row">
				<!-- left column -->
				
				<div class="col-md-5">
					<div class="box box-success">
			 
						<div class="box-header with-border">
						  <h3 class="box-title">Add Asset</h3>
						</div>
						<!-- form start -->
					   <?php echo $this->Form->create('CoCurricular',array("url"=>array("controller"=>"Student","action"=>"coCurricular")));?>
					   <?php  echo $this->Form->input("id");?>		
						<div class="box-body">
							<div class="form-group">
								<div class="row">
									<div class="col-sm-5"><label>Academic Year <span class="mandatory_fields">*</span></label></div>
									<div class="col-sm-7"> 
										<?php echo $this->Form->input("academic_year_id",array("type"=>"select","options"=>$academic_year_array,"class"=>"form-control select_box","empty"=>"select","required","label"=>false));?>		
									</div>
								</div>
							</div> 
							<div class="form-group">
								<div class="row">
									<div class="col-sm-5"><label>Student Name/ID <span class="mandatory_fields">*</span></label></div>
									<div class="col-sm-7"> 
										<?php echo $this->Form->input("student_detail_id",array("type"=>"text","id"=>"student_code","class"=>"form-control","required","placeholder"=>"Type Student name or Code","label"=>false)); ?>
									</div>
								</div>
							</div>
							
							<div class="form-group">
								<div class="row">
									<div class="col-sm-5"><label>Activities <span class="mandatory_fields">*</span></label></div>
									<div class="col-sm-7">
										<?php echo $this->Form->input("activitie_setting_id",array("type"=>"select","options"=>$activities_array,"class"=>"form-control select_box","empty"=>"Select","required","label"=>false));?>		
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-sm-5"><label>Secured place <span class="mandatory_fields">*</span></label></div>
									<div class="col-sm-7"> 
										<?php echo $this->Form->input('secured_place',array("type"=>"text","class"=>"form-control","required","label"=>false));?>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-sm-5"><label>Organized by</label></div>
									<div class="col-sm-7"> 
										<?php echo $this->Form->input('hosted_by',array("type"=>"text","class"=>"form-control","required","label"=>false));?>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-sm-5"><label>Date</label></div>
									<div class="col-sm-7"> 
										<?php echo $this->Form->input('activities_date',array("type"=>"text","class"=>"form-control","required","label"=>false,"id"=>"datepicker"));?>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-sm-5"><label>Details</label></div>
									<div class="col-sm-7"> 
										<?php echo $this->Form->input('details',array("type"=>"text","class"=>"form-control" ,"label"=>false));?>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-sm-5"> </div>
									<div class="col-sm-7"> 
										<?php echo $this->Form->submit('Save',array("type"=>"submit","class"=>"btn btn-info "));?>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="row"> 
									<div class="col-sm-12"> 
										<?php echo $this->Session->Flash();?>
									</div>
								</div>
							</div>
							
							<?php echo $this->Form->end();?>
							<!---- form end ------>
						
						</div>
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
					<tr><th>Sl.No</th><th>Academic </th><th>Student</th><th>Activities</th><th>Secu Place</th><th>Date</th><th>Edit</th></tr>
				</thead>
				 
				 <?php	$i=1;	
					foreach($cc_list as $lt) {?>
					<tr>
						<td><?php echo $i++; ?></td>
						<td><?php echo $lt['AcademicYear']['academic_year'];?></td>
						<td><?php echo $lt['StudentDetail']['student_name'];?></td>
						<td><?php echo $lt['ActivitieSetting']['activity_name'];?></td>
						<td><?php echo $lt['CoCurricular']['secured_place'];?></td>
						<?php $id=$lt['CoCurricular']['id'];?>
						<td><?php echo date('d-m-Y',strtotime($lt['CoCurricular']['activities_date']));?></td>
						
						<td>
						<?php echo $this->Html->link('<i style="font-size:17px;" class="fa fa-trash"></i>'
							,array("controller"=>"Student","action"=>"deleteCoCurricular", $id),
							array("confirm"=>"Are you sure you want ro delete???","escape"=>false)); ?> | 
						<?php echo $this->Html->link('<i style="font-size:17px;" class="fa fa-edit"></i>'
						,array("controller"=>"Student","action"=>"coCurricular", $id),
						array("escape"=>false)); ?></td>
					</tr>
					<?php } ?> 
				
				</table>
								
			</div>
			
			</div>
        </div>
		
      </div>
      <!-- row -->
	
				
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
	</div> <!-- wrapper -->
	

	
<script>
    <!--AUTO COMPLETE REFERENCE -->
  
var $j = jQuery.noConflict();
  $j(function() {
    var availableTags = [<?=$student?>];
    $j( "#student_code" ).autocomplete({
      source: availableTags
    });
  } ); 
 <!--AUTO COMPLETE REFERENCE -->
 
 </script>