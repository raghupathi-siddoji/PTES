<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
	  <h1>Edit Spoken English</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Spoken English</a></li>
        <li class="active">Edit Spoken English</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content"> 
	
	
		
	<?php echo $this->Form->create('SpokenEnglishEdit',array("url"=>array("controller"=>"SpokenEnglish","action"=>"spokenEnglishEdit")));?>
	
	 
	<div class="row" align="center">
		<div class="form-horizontal">
			<div class="col-md-2">&nbsp;</div>
			<div class="col-md-8"> 
				<div class="box box-warning">			
					<div class="box-body">
						
						<div class="row">
							<div class="col-md-4"><label>Student Name :</label> <?php echo $Spoken_english_grade[0]['StudentDetail']['student_name'];?></div> 
							<div class="col-md-4"><label>Student Class :</label><?php echo $Spoken_english_grade[0]['AddClass']['class_name'];?></div>
							<div class="col-md-4"><label>Date :</label><?php echo $Spoken_english_grade[0]['SpokenEnglish']['date'];?></div>
						</div><br>
						<div class="row">
							<div class="col-md-push-4 col-md-4"><b>Grades</b>
							</div>
						</div><br>
						<?php $k=0; foreach($grade as $gradeList) { ?>
						<div class="row">
							<div class="col-md-push-4 col-md-4">
							<?php echo $this->Form->input("id.".$k,array("type"=>"hidden","value"=>$gradeList[0],"label"=>false));
								 $grade=array("A"=>"A","B"=>"B","C"=>"C");?>
									<?php echo $this->Form->input("grade.".$k,array("type"=>"select","options"=>$grade,"class"=>"form-control","value"=>$gradeList[1],"label"=>false));?>
								</div>
						</div><br>
						<?php $k++; } ?>
							<br><?php echo $this->Form->input("total_count",array("type"=>"hidden","value"=>$k,"label"=>false));?>
						<div class="row">
							<div class="col-md-4"></div>
							<div class="col-md-2"><?php echo $this->Form->submit("Update",array("class"=>"btn btn-info","onclick"=>"return validateForm()"));?></div>
							
						</div>
					</div>
				</div>
			</div> 
			<div class="col-md-2">&nbsp;</div>
			
		</div>
	</div>
	
	</div>
	<script>
 function get_students(year,class_id)
 {	 
	var year = document.getElementById("year").value;
	var class_id = document.getElementById("class_id").value;
	
	if(class_id != ""){
		 //alert(year+class_id);
		var dataString = year + '&' + class_id;
		$.get( "<?php echo $this->webroot?>Report/populateSchoolStudents/"+dataString, function( data ) {
		 
		//alert(data);
		  $( "#student_list123" ).html( data ); 
		   
		});
	} 
	
 }
 </script>