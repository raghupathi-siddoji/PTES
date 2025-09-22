 <div class="wrapper"> 
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Time Table
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a href="#">Time Table</a></li>
			 <li class="active">Assign Number Of Periods To Teacher</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
           
          <!------------"Add Subject" created: 20 aug 2016 ----------->
		  
			 <div class="row">
				<!-- left column -->
				
				<div class="col-md-5">
				  <div class="box box-success">
					<br>
					<div class="box-header with-border">
					  <h3 class="box-title">Assign Number Of Periods To Teacher</h3>
					</div>
					<!-- form start -->
					<?php echo $this->Form->create('AssignPeriodTeacher',array("url"=>array("controller"=>"TimeTable","action"=>"assignPeriodsTeacher")));
							echo $this->Form->input('id');?> 
				   
					  <div class="box-body">
						<div class="form-group">
							<div class="row">
								<div class="col-sm-5"><label>Academic Year</label></div>
									<div class="col-sm-7">
										<div class="form-group">
											<?php echo $this->Form->input("academic_year_id",array("type"=>"select","options"=>$academic_years_list,"label"=>false,"class"=>"form-control select_box","empty"=>"select","required"));?>		  
										</div>
									</div>
							</div>
							</br>
						
							<div class="row">
								<div class="col-sm-5"><label>Teachers</label></div>
									<div class="col-sm-7">
									 <div class="form-group">
										  <?php echo $this->Form->input("staff_detail_id",array("type"=>"select","options"=>$teacher_list,"label"=>false,"class"=>"form-control select_box","empty"=>"select","required"));?>		  
									</div>
								</div>
							</div>
							<br>
							<div class="row">
								<div class="col-sm-5"><label>Class</label></div>
									<div class="col-sm-7">
									 <div class="form-group">
										<?php echo $this->Form->input("add_class_id",array("type"=>"select","options"=>$class_list,"label"=>false,"class"=>"form-control select_box","empty"=>"select","required"));?>		  
									</div>
								</div>
							</div>
							<br>
							<div class="row">
								<div class="col-sm-5"><label>Section</label></div>
									<div class="col-sm-7">
									 <div class="form-group">
										<?php echo $this->Form->input("section_id",array("type"=>"select","options"=>$section_list,"label"=>false,"class"=>"form-control select_box","empty"=>"select","required"));?>		  
									</div>
								</div>
							</div>
							<br>
							<div class="row">
								<div class="col-sm-5"><label>Subject</label></div>
									<div class="col-sm-7">
									 <div class="form-group">
										<?php echo $this->Form->input("subject_id",array("type"=>"select","options"=>$subject_list,"label"=>false,"class"=>"form-control select_box","empty"=>"select","required"));?>		  
									</div>
								</div>
							</div>
							<br>
							<div class="row">
								<div class="col-sm-5"><label>Number of Periods</label></div>
									<div class="col-sm-7">
							<?php echo $this->Form->input('num_period_assign',array("type"=>"text","class"=>"form-control","required","label"=>false));?>
									</div>
							</div>
							<br>										
							<div class="row">
								<div class="col-sm-4"></div>
								<div class="col-sm-4"><?php echo $this->Form->submit('Submit',array("class"=>"btn btn-info"));?></div>
								<div class="col-sm-4"></div>
						   </div>
						</div>
						<?php echo $this->Session->flash();?>
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
					<tr><th>Sl.No</th><th>Class</th><th>Subject</th><th>Teachers</th><th>Periods</th><th>Delete</th><th>Edit</th></tr>
				</thead>
				<?php 
					$i=1;
					foreach($list1 as $values)
					{
				?>
				<tr>
					<td><?php echo $i++; ?></td>
					<td><?php echo $values['AddClass']['class_name']; ?></td>
					<td><?php echo $values['Subject']['subject_name']; ?> </td>
					<td><?php echo $values['StaffDetail']['first_name']; ?></td>
					<td><?php echo $values['AssignPeriodTeacher']['num_period_assign']; ?></td>
					<td><?php echo $this->Html->link('<i style="font-size:17px;" class="glyphicon glyphicon-trash"></i>'
						,array("controller"=>"TimeTable","action"=>"deleteAssignPeriodsTeacher",$values['AssignPeriodTeacher']['id']),
						array("confirm"=>"Are you sure you want ro delete???","escape"=>false)); ?></td>
					
					<td><?php echo $this->Html->link('<i style="font-size:17px;" class="glyphicon glyphicon-edit"></i>'
					,array("controller"=>"TimeTable","action"=>"assignPeriodsTeacher",$values['AssignPeriodTeacher']['id']),
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