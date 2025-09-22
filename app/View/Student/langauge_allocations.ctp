
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
   <section class="content-header">
	  <h1>Examination</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Exam</a></li>
        <li class="active">Marks Entry</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
<!------------------------------------------------------------------------------------------------------->
<div class="row">	
	<div class="col-md-12">
	 <?php echo $this->Form->create('LanguageAllocation',array("url"=>array("controller"=>"Student","action"=>"storeLanguages")));?>
		<div class="box box-warning">
			<div class="box-header with-border">
				<div class="row"><div class="col-md-12"><h4>Language Allocations
					<?php echo $this->Html->link('<i class="btn btn-warning btn-sm pull-right">Go Back</i>',
					array('controller'=>'Student','action'=>'languageAllocation'),array('escape'=>false))?></h4>
				</div></div>
			</div>
		    
			<div class="box-body">
			<?Php foreach($student as $exam_value) { ?>
				<?php echo $this->Form->input('id',array("type"=>"hidden")); ?>
			
				<div class="row" style="color:#00C0EF">
					<div class="col-md-4">Class : <?php echo $exam_value['AddClass']['class']; ?></div> 
					<div class="col-md-8" align="right">Academic year : <?php echo $exam_value['AcademicYear']['academic_year']; ?></div>
				</div>
					<?php  echo $this->Form->input('add_class_id',array('type'=>'hidden','value'=>$exam_value['StudentDetail']['add_class_id']));
					 echo $this->Form->input('academic_year_id',array('type'=>'hidden','value'=>$exam_value['StudentDetail']['academic_year_id'])); ?>
			<?php break; } ?>
				<table class="table table-condensed table-bordered" style="text-align:center">
				<thead>
					<tr>
						<th>Sl.No</th>
						<th>Name</th>
						<th>Language I <span class="mandatory_fields"> * </span></th>
						<th>Language II <span class="mandatory_fields"> * </span></th>
						<th>Language III <span class="mandatory_fields"> * </span></th>
					</tr>
				</thead>
				<tbody>
					<?php $number=1; foreach($student as $student_value) {
						echo $this->Form->input('student_detail_id.',array('type'=>'hidden','value'=>$student_value['StudentDetail']['id']));
						echo $this->Form->input('section_id.',array('type'=>'hidden','value'=>$student_value['StudentDetail']['section_id']));?>
						<tr>
							<td><?php echo $number++; ?></td>
							<td><?php echo $student_value['StudentDetail']['student_name']; ?></td>
						    <td><?php echo $this->Form->input('language_1.',array('type'=>'select','label'=>false,'options'=>array($listLanguage),'default'=>'English',"required","class"=>"form-control select_box")); ?></td>
						    <td><?php echo $this->Form->input('language_2.',array('type'=>'select','label'=>false,'options'=>array($listLanguage),'default'=>'English',"required","class"=>"form-control select_box")); ?></td>
						    <td><?php echo $this->Form->input('language_3.',array('type'=>'select','label'=>false,'options'=>array($listLanguage),'default'=>'English',"required","class"=>"form-control select_box")); ?></td>
						</tr>
					<?php } ?>
				</tbody>
				</table>
				
				<div class="form-group"></div>
				
				<div class="row">
				  <div class="col-md-4"></div>
				    <div class="col-md-4">
						<?php echo $this->Form->submit('Add',array("class"=>"btn btn-info pull-right form-control"));?>
						<?php echo $this->Form->end(); ?>
					</div>
				  <div class="col-md-4"></div>
				</div>
			</div>
			
			
     </div>
 </div>
      <!-- row -->
	  
	  
    
	</section>
    <!-- content -->
  </div>
  <!-- content-wrapper -->