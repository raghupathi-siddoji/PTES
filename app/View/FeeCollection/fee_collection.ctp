 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
	  <h1>Fee</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Fee</a></li>
        <li class="active">Fee Collection</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
     
  <!------------ Add Category  ----------->
	<div class="row">
       <div class="col-md-3"></div>
        <div class="col-md-6">
			<div class="box box-success">
			 <div class="box-header with-border">Fee Collection</div>
				<div class="box-body">
					<?php echo $this->Form->create('',array("url"=>array("controller"=>"FeeCollection","action"=>"feeCollectFormat")));?>
						<div class="row">
							<div class="col-md-4">
								<?php echo $this->Form->input("student_code",array("type"=>"text","class"=>"form-control","required")); ?>
							</div>
							<div class="col-md-4">
						<?php echo $this->Form->input('academic_year',array('type'=>'select','id'=>'select','options'=>array('select'=>'Select academic year','1'=>'2016-17'),"required","class"=>"form-control"));?>
							</div>
							<div class="col-md-4"><br>
								<?php echo $this->Form->submit("Submit",array("class"=>"btn btn-info btn-sm")); ?>
							</div>
						</div>
					<?php echo $this->Form->end();?>
				</div>
			</div>
		</div>
		<div class="col-md-3"></div>
	</div>
	
	</section>
    <!-- content -->
  </div>
  <!-- content-wrapper -->
  
  <script>
  function bal_calc() {
        var f= document.getElementById('fee').value;
        var p = document.getElementById('pay').value;
         result = parseInt(f) - parseInt(p);
        if(!isNaN(result)){
            document.getElementById('bal').value = result;
        }
}
  </script>