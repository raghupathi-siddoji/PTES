  <style>
 input[type="text"]
{
	background-color:white;
}
#select
{
	background-color: #ffff99;
}
</style>
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
	  <h1>Fee</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Fee</a></li>
        <li class="active">Fee Assign for RTE</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
     
  <!---------------------------------------------------------------------->
	 <div class="row">
        <!-- left column -->
		<div class="col-md-1"></div>
        <div class="col-md-10">
         <div class="box box-warning">
            <div class="box-header with-border">Fee Assign For RTE
            <span><a href="" class="btn btn-primary btn-sm pull-right" data-toggle="modal" data-target="#rte">Fee Assign For RTE</a></span>
			</div>

            <!-- form start -->
              <div class="box-body">
			  
			<div class="row">
				<div class="col-md-12">
				<table class="table table-bordered" id="example1">
				<thead>
				<tr><th>#</th><th>Class</th><th>Academic Year</th><th>Language</th><th>Fee Detail</th><th>Delete</th></tr>
				</thead>
					<!--<?php	$i=1;	
					foreach($list as $lt) {?>
					
					<?php } ?>--->
				
				</table>
					
			   </div>
			</div>
		</div>
	</div>
	</div>

<!----------------------------------------------------------------------------------------------------->				
	<div class="modal fade" id="rte" role="dialog">
		<div class="modal-dialog modal-md">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <div class="modal-title"><h4>Fee Assign For RTE</h4>
		  </div>
		</div>
        
		<div class="modal-body">
		   <?php echo $this->Form->create('',array("url"=>array("controller"=>"FeeCollection","action"=>"feeAssignRte")));?>
				<div class="row">
					<div class="col-md-4">
						<?php echo $this->Form->input('id',array("type"=>"hidden")); 
						echo $this->Form->input('class',array('type'=>'select','id'=>'select','options'=>array('select'=>'Select Class','1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5'),"required",
						"class"=>"form-control"));
						?>
					</div>
					<div class="col-md-4">
						<?php echo $this->Form->input('academic_year',array('type'=>'select','id'=>'select','options'=>array('select'=>'Select academic year','1'=>'2016-17'),"required","class"=>"form-control"));?>
					</div>
					<div class="col-md-4">
						<?php echo $this->Form->input('Language',array('type'=>'select','id'=>'select','options'=>array('select'=>'Select Language','1'=>'Sanskrith','2'=>'English'),"required","class"=>"form-control")); ?>
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-md-1"></div>
					<label class="col-md-4">Fee Head Name</span></label>
					<label class="col-md-3">Amount</label>
					<label class="col-md-4">Select</label>
				</div>
				
				<div class="row">
					<div class="col-md-1"></div>
					<div class="col-md-4">Admission Fee</div>
					<div class="col-md-3"><?php echo $this->Form->input("amnt",array("type"=>"text","class"=>"form-control","label"=>false)); ?></div>
					<div class="col-md-4"><input type="checkbox"></div>
				</div>
				<br>
				<div class="row">
					<div class="col-md-1"></div>
					<div class="col-md-4">Tution Fee</div>
					<div class="col-md-3"><?php echo $this->Form->input("amnt",array("type"=>"text","class"=>"form-control","label"=>false)); ?></div>
					<div class="col-md-4"><input type="checkbox"></div>
				</div>
				<br>
				<div class="row">
					<div class="col-md-1"></div>
					<div class="col-md-4">Sport Fee</div>
					<div class="col-md-3"><?php echo $this->Form->input("amnt",array("type"=>"text","class"=>"form-control","label"=>false)); ?></div>
					<div class="col-md-4"><input type="checkbox"></div>
				</div>
				<br>
				<div class="row">
					<div class="col-md-1"></div>
					<div class="col-md-4">Computer Skill</div>
					<div class="col-md-3"><?php echo $this->Form->input("amnt",array("type"=>"text","class"=>"form-control","label"=>false)); ?></div>
					<div class="col-md-4"><input type="checkbox"></div>
				</div>
				<br>
			</div>
        
		<div class="modal-footer">
	
			<?php echo $this->Form->submit("Submit",array("class"=>"btn btn-default")); ?>
		</div>
            
		<?php echo $this->Form->end();?>
			<!---- form end ------>
         
        </div>
      </div>
	  </div>
	  </div>		
<!----------------------------------------------------------------------------------->
	
<!--------------------------------------------------------------------------->
      <!-- row -->
    
	</section>
    <!-- content -->
  </div>
  <!-- content-wrapper -->
