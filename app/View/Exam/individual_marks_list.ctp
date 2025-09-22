<?php if(!empty($lang))
	foreach($lang as $l) ?>
 
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
  
	 <div class="row">
        <!-- left column -->
		
       
		
		<div class="col-md-12">
         <div class="box box-success">
			<div class="box-body">
				<div class="row">
					<div class="col-md-4"><?php echo $this->Session->flash(); ?></div>
				</div>
	
				<div class="form-group">
		           <?php echo $this->Form->create('MarksEntry',array("url"=>array("controller"=>"Exam","action"=>"individualMarksList")));?>
						<?php echo $this->Form->input('id',array("text"=>"hidden")); ?>
						
						<div class="row">
							<div class="col-md-2">
									<label>Academic Year <span class="mandatory_fields">*</span></label>
									<?php echo $this->Form->input("academic_year_id",array("type"=>"select","id"=>"year","options"=>$academic_year_array,"class"=>"form-control select_box","empty"=>"Select","required","label"=>false));?>		
								</div>
								<div class="col-md-2">
									<label>Class <span class="mandatory_fields">*</span></label>
									<?php echo $this->Form->input("add_class_id",array("type"=>"select","options"=>$class_array,"id"=>"class_id","class"=>"form-control select_box","empty"=>"select","required","label"=>false));?>		
								</div> 
								<div class="col-md-2">
									<label>Student Code<span class="mandatory_fields">*</span></label>
									<?php echo $this->Form->input("student_code",array("type"=>"select","id"=>"student_detail_id","class"=>"form-control","required","placeholder"=>"Type Student name or Code","label"=>false)); ?>
								</div> 
							<div class="col-md-2">
								<label>Exam Type<span class="mandatory_fields"> * </span></label>
								<?php echo $this->Form->input('exam_type',array('type'=>'select','label'=>false,'empty'=>'Select Exam Type','options'=>array($exams),"required","class"=>"form-control select_box")) ?>
							</div>
							
							<div class="col-md-2"><label> </span></label>
								<?php echo $this->Form->submit('Get Marks List',array("class"=>"btn btn-info pull-right"));?>
							</div>
						</div>
				</div>
				
			   <?php echo $this->Form->end(); ?>
			</div>
		</div>
		</div>
		
		<div class="col-md-2"></div>
		
      </div>
      <!-- row -->
<!------------------------------------------------------------------------------------------------------->
<?php if(!empty($value)) { 
foreach($value as $list) { 
$student_code=$list['StudentDetail']['student_code'];
$exam_name=$list['CreateExam']['exam_type'];
$clas_id=$list['CreateExam']['add_class_id'];
?>
<div class="row">
    <div class="col-md-2"></div>
		
		<div class="col-md-8">
         <div class="box box-success">
		 <div class="box-header with-border"><h4>Individual Marks List
			<?php echo $this->Html->link('<i class="btn btn-info btn-sm pull-right">Print</i>',
			array('controller'=>'Exam','action'=>'getPrintOut',$student_code,$exam_name,$clas_id),array('escape'=>false,'target'=>'_blank'))?> </h4>
		 </div>
			<div class="box-body">
				<div class="row" style="color:#e91e63;">
					<div class="col-md-4">Student Code : <?php echo $list['StudentDetail']['student_code']; ?></div>
					<div class="col-md-4"></div>
					<div class="col-md-4 pull-right">Academic Year : <?php echo $list['AcademicYear']['academic_year']; ?></div>
				</div>
				<div class="row" style="color:#e91e63;">
					<div class="col-md-4">Student Name : <?php echo $list['StudentDetail']['student_name']; ?></div>
					<div class="col-md-4"></div>
					<div class="col-md-4 pull-right">Exam Name : <?php echo $list['CreateExam']['exam_type']; ?></div>
				</div>
				<div class="row" style="color:#e91e63;">
					<div class="col-md-4">Class: <?php echo $list['AddClass']['class']; ?></div>
					<div class="col-md-4"></div>
					<div class="col-md-4 pull-right">Section : <?php echo $list['Section']['section']; ?></div>
				</div>
				<div class="form-group"></div>
				
				<table class="table table-condensed">
					<tr style="color:#00C0EF">
						<th>Subject</th><th>Max Marks</th><th>Marks Secured</th><th>Grade</th>
					</tr>
					<?php if($list['AddClass']['class']==8 || $list['AddClass']['class']==9 || $list['AddClass']['class']==10) { ?>
						<?php $total=0; $total_secured=0;
						for($i=1;$i<=10;$i++) { ?>
					<tr>
						<?php if(!empty($list['SubjectAllocation']["sub$i"])) { 
							if($i==1) { ?><td><?php if(!empty($lang)) { echo $l['LanguageAllocation']['language_1']; }  ?></td>
							<?php } else if($i==2) { ?><td><?php if(!empty($lang)) { echo $l['LanguageAllocation']['language_2']; } ?></td>
							<?php } else if($i==3) { ?><td><?php if(!empty($lang)) { echo $l['LanguageAllocation']['language_3']; }  ?></td>
							<?php } else { ?> <td><?php  echo $list['SubjectAllocation']["sub$i"]; } ?></td>
							
							<?php $total_secured=$total_secured+round($list['MarksEntry']["marks$i"]/$percent); ?>
							<td><?php echo round($list['CreateExam']['max_marks']/$percent); $total=$total+round($list['CreateExam']['max_marks']/$percent);  ?></td>
							<td><?php  echo round($list['MarksEntry']["marks$i"]/$percent); ?></td>
							<td>
							<?php foreach($grade as $g)
							{
								if(($g['GradeSetting']['from_marksA+']>=(round($list['MarksEntry']["marks$i"]/$percent))) && ($g['GradeSetting']['to_marksA+']<=(round($list['MarksEntry']["marks$i"]/$percent))))
									echo $g['GradeSetting']['gradeA+'];
								
								else if(($g['GradeSetting']['from_marksA']>=(round($list['MarksEntry']["marks$i"]/$percent))) && ($g['GradeSetting']['to_marksA']<=(round($list['MarksEntry']["marks$i"]/$percent))))
									echo$g['GradeSetting']['gradeA'];
								
								else if(($g['GradeSetting']['from_marksB+']>=(round($list['MarksEntry']["marks$i"]/$percent))) && ($g['GradeSetting']['to_marksB+']<=(round($list['MarksEntry']["marks$i"]/$percent))))
									echo $g['GradeSetting']['gradeB+'];
								
								else if(($g['GradeSetting']['from_marksB']>=(round($list['MarksEntry']["marks$i"]/$percent))) && ($g['GradeSetting']['to_marksB']<=(round($list['MarksEntry']["marks$i"]/$percent))))
									echo $g['GradeSetting']['gradeB'];
								
								else
									echo $g['GradeSetting']['gradeC'];
							} ?>
						</td>
						<?php } ?>
					</tr>
					<?php } ?>
					<?php } else { ?>
					<?php $total=0; $total_secured=0;
						for($i=1;$i<=10;$i++) { ?>
					<tr>
						<?php if(!empty($list['SubjectAllocation']["sub$i"])) { 
							$total_secured=$total_secured+round($list['MarksEntry']["marks$i"]/$percent); ?>
							<td><?php  echo $list['SubjectAllocation']["sub$i"]; ?></td>
							<td><?php echo round($list['CreateExam']['max_marks']/$percent); $total=$total+round($list['CreateExam']['max_marks']/$percent);  ?></td>
							<td><?php  echo round($list['MarksEntry']["marks$i"]/$percent); ?></td>
							<td>
							<?php foreach($grade as $g)
							{
								if(($g['GradeSetting']['from_marksA+']>=(round($list['MarksEntry']["marks$i"]/$percent))) && ($g['GradeSetting']['to_marksA+']<=(round($list['MarksEntry']["marks$i"]/$percent))))
									echo $g['GradeSetting']['gradeA+'];
								
								else if(($g['GradeSetting']['from_marksA']>=(round($list['MarksEntry']["marks$i"]/$percent))) && ($g['GradeSetting']['to_marksA']<=(round($list['MarksEntry']["marks$i"]/$percent))))
									echo$g['GradeSetting']['gradeA'];
								
								else if(($g['GradeSetting']['from_marksB+']>=(round($list['MarksEntry']["marks$i"]/$percent))) && ($g['GradeSetting']['to_marksB+']<=(round($list['MarksEntry']["marks$i"]/$percent))))
									echo $g['GradeSetting']['gradeB+'];
								
								else if(($g['GradeSetting']['from_marksB']>=(round($list['MarksEntry']["marks$i"]/$percent))) && ($g['GradeSetting']['to_marksB']<=(round($list['MarksEntry']["marks$i"]/$percent))))
									echo $g['GradeSetting']['gradeB'];
								
								else
									echo $g['GradeSetting']['gradeC'];
							} ?>
						</td>
						<?php } ?>
					</tr>
					<?php } } ?>
					
					<tr>
						<td></td>
						<th><?php echo $total; ?></th>
						<th><?php echo $total_secured; ?></th>
						<td></td>
					<tr>
				</table>
				
				
			</div>
		 </div>
		</div>
		
	<div class="col-md-2"></div>
		
</div>
<?php } } ?> 
<!-------------------------------------------------------------------------------------------------------->	 
	</section>
    <!-- content -->
  </div>
  <!-- content-wrapper -->
  
   <script>
  jQuery(document).ready(function($){
     $(" #year,#class_id").on('change', function () {

 		

         var year = $('#year').val();
         console.log(year);

         var class_id = $('#class_id').val();

         $("#student_detail_id").find('option').remove();

         if (class_id) {


             $.ajax({
                 type: "POST",
                 url: '<?php echo Router::url(array("controller" => "FeeCollection", "action" => "getStudents")); ?>',
                 data: {year: year,class_id: class_id},
                 cache: false,
                 success: function (html) {
                     console.log(html);

                     $.each(html, function (key, value) {
                         $('<option>').val('').text('select');
                         $('<option>').val(key).text(value).appendTo($("#student_detail_id"));
                     });
                 }
             });
         }
     });
});
 </script>