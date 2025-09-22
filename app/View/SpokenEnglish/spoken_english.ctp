 
  <!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">  
	<style>
	
	.content
	{min-height:1px;}
	
	</style>
		<!-- Content Header (Page header) -->
		<section class="content-header">
		  <h1>
			Spoken English
		  </h1>
		  <ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
			<li>Spoken English</li>
			<li class="active">Assign Grade</li>
		  </ol>
		</section>
		<section class="content">
			<div class="row"> 
				<?php echo $this->Form->create('SpokenEnglish',array("url"=>array("controller"=>"SpokenEnglish","action"=>"SpokenEnglish")));?>
				<div class="col-md-10">
					<div class="box box-info">
						<div class="box-body">
							<div class="col-md-3">
								<div class="form-group">											
									<label for="select" class="col-sm-4 control-label">Batch</label>
									<div class="col-sm-8">
									<?php 
									echo $this->Form->input("academic_year_id",array("type"=>"select","label"=>false,"options"=>$year_list,"class"=>"form-control","required"));?> 
									 
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">											
									<label for="select" class="col-sm-4 control-label">Class</label>
									<div class="col-sm-8">
										<?php  
										echo $this->Form->input("add_class_id",array("type"=>"select","label"=>false,"options"=>$classes,"class"=>"form-control","empty"=>"Select","required"));
										?> 
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">											
									<label for="select" class="col-sm-2 control-label">Date</label>
										<div class="col-sm-10">
											<?php echo $this->Form->input('date',array("type"=>"text","class"=>"form-control","label"=>false,"id"=>"datepicker", 'value' => date('d-m-Y')));?>
											</div>
								</div>
							</div> 
							
							<div class="col-md-2">
								<button type="submit" class="btn btn-success" name="search_btn">
								  <i class="glyphicon glyphicon-search"></i> Search
								</button>
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
		
		<?php if(isset($this->request->data['search_btn'])){?>
		
		<?php echo $this->Form->create('SpokenEnglish',array("url"=>array("controller"=>"SpokenEnglish","action"=>"SpokenEnglishAssign")));	?>
		<?php echo $this->Form->input("academic_year_id",array("type"=>"hidden","value"=>$academic_year_id));?> 
		<?php echo $this->Form->input("add_class_id",array("type"=>"hidden","value"=>$class_id));?>
		<?php echo $this->FOrm->input("date",array("type"=>"hidden","value"=>$date));?>
		
		
		<section class="content"> 
			<div class="row">  
				<div class="col-md-12">
					<div class="box box-warning">
						<div class="box-header">
							<div class="col-md-4"><strong>Assign Grade</strong></div>
								<div class="col-md-push-7 col-md-2"><?php echo $this->Form->submit("Assign",array("class"=>"btn btn-success btn-md",'name'=>'show_btn','value'=>'Show')); ?></div>
						</div>
						<div class="box-body">
							<table class="table table-bordered" id="example1">
								<thead>
									<tr>
										<th>#</th>
										<th style="text-align:center;"></th>
										<th>Student Name</th>
										<th>Class</th>
										<?php for ($g=0;$g<10;$g++) { ?>
										<th>Grade </th><?php } ?>
										
										
									</tr>
								</thead>
								<tbody>
									<?php 
									$i=0;
									foreach($student_details as $lt) {
									$id = $lt['StudentDetail']['id'];
									
									
									?>
										<tr>
											<td><?php echo $i+1;?> <?php echo $this->Form->input("student_detail_id.".$i,array("type"=>"hidden","value"=>$lt['StudentDetail']['id']));?>
											<?php //echo $this->Form->input("add_class_id.".$i,array("type"=>"hidden","value"=>$lt['StudentDetail']['add_class_id']));?></td>
											<td align="center">											
											<?php echo $this->Form->input("check1.".$i,array("type"=>"checkbox","label"=>false,'class'=>'check',"onchange"=>'checkBx("'. $i.'",this );','checked'=>false));?>
											<?php echo $this->Form->input("check.".$i,array("type"=>"hidden","label"=>false,"id"=>"check".$i,"value"=>"0"));?></td>
											<td><?php echo $lt['StudentDetail']['student_name']; ?></td>
											<td><?php echo $lt['AddClass']['class_name']; ?></td>
											<?php $grade=array(""=>" ","A"=>"A","B"=>"B","C"=>"C");
											for ($k=0;$k<10;$k++) {?>
											<td align="center"><?php echo $this->Form->input("grade.".$i.".".$k,array("type"=>"select","id"=>"grade".$i.''.$k,"class"=>"gd".$k,"options"=>$grade,"label"=>false));?> </td>
											<?php } ?>
											
											<!--<td align="center"><?php 
												//$grade=array("A"=>"A","B"=>"B","C"=>"C");
											//echo $this->Form->input("grade.".$i,array("type"=>"select","label"=>false,"options"=>$grade,"class"=>"form-control","required"));?></td>-->

										</tr>
									<?php $i++; } ?> 
								</tbody>
							</table>
							
						</div>
					</div>
				</div> 	
			</div>
		<?php echo $this->Form->end();?>
		</section>
		<?php }?>
		
	</div>
	<script>
	function checkBx(i,j) {
	//alert(j.value);
	if ($("#check"+i).val()==0) {
		$("#check"+i).val(1);
		$("#grade"+i+'0').val('A');
	}
	else{
		$("#check"+i).val(0);
		for(k=0;k<10;k++)
		$("#grade"+i+''+k).val(' ');
	}
	}
	$(document).ready(function() {
   var  table = $('#example1').DataTable( {
	   "lengthMenu": [ [2, 4, 8, -1], [2, 4, 8, "All"] ],
        pageLength: 10,
    } );
	$('#SpokenEnglishSpokenEnglishAssignForm').on('submit', function(e){
      // Prevent actual form submission
	 
	  
       var form = this;

      // Encode a set of form elements from all pages as an array of names and values
      var params = table.$('input,select').serializeArray();

      // Iterate over all form elements
      $.each(params, function(){
         // If element doesn't exist in DOM
         if(!$.contains(document, form[this.name])){
            // Create a hidden element
            $(form).append(
               $('<input>')
                  .attr('type', 'hidden')
                  .attr('name', this.name)
                  .val(this.value)
            );
         }
      });
   });
	
   
   
} );
	</script>
<script>
	$("#checkAll").click(function () {
    $(".check").prop('checked', $(this).prop('checked'));
	$(".gd").val("A").change();

});




  </script>