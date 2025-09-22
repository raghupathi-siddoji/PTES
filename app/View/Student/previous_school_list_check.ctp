
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
	  <h1>Academic</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Academic</a></li>
        <li class="active">Parent Details</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    <!----------------------------------------------------->
	<div class="row">
        <!-- left column -->
		
        <div class="col-md-1"></div>
		
		<div class="col-md-10">
         <div class="box box-success">
			<div class="box-body">
				<?php echo $this->Form->create('PreviousSchoolDetail',array("url"=>array("controller"=>"Student","action"=>"previousSchoolListCheck"))); ?>
				<div class="form-group">
				 <div class="row">
					<div class="col-sm-4"><label>Student Code</label></div>
					<div class="col-sm-4">
					<?php echo $this->Form->input('id',array("type"=>"hidden")); 
		echo $this->Form->input('student_code',array("type"=>"text","id"=>"student_code","class"=>"form-control","required","label"=>false));?>
					</div>
					<div class="col-sm-4"><?php echo $this->Form->submit("Submit",array("class"=>"btn btn-info")); ?></div>
				</div>
				</div>
				<?php echo $this->Form->end();?>
				<div class="row">
					<div class="col-sm-5">
						<?php echo $this->Session->flash(); ?>
					</div>
				</div>
			</div>
		</div>
		</div>
	</div>
    
	</section>
    <!-- content -->
  </div>
  <!-- content-wrapper -->
  
  <script type="text/javascript">

function checkstud(val){
 var element=document.getElementById('stud_check');
 if(val=='yes')
   element.style.display='inline';
 else  
   element.style.display='none';
}

</script> 

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