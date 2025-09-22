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
		
        <div class="col-md-2"></div>
		
		<div class="col-md-8">
         <div class="box box-success">
			<div class="box-header with-border">
				<h4>Marks Card</h4>
			</div>
			<div class="box-body">
	
				<div class="form-group">
		           <?php echo $this->Form->create('MarksEntry',array("url"=>array("controller"=>"Exam","action"=>"marksCard")));?>
						<?php echo $this->Form->input('id',array("text"=>"hidden")); ?>
						
						<div class="row">
							
							<div class="col-md-3">
									<label>Academic Year <span class="mandatory_fields">*</span></label>
									<?php echo $this->Form->input("academic_year_id",array("type"=>"select","id"=>"year","options"=>$academic_year_array,"class"=>"form-control select_box","empty"=>"Select","required","label"=>false));?>		
								</div>
								<div class="col-md-3">
									<label>Class <span class="mandatory_fields">*</span></label>
									<?php echo $this->Form->input("add_class_id",array("type"=>"select","options"=>$class_array,"id"=>"class_id","class"=>"form-control select_box","empty"=>"select","required","label"=>false));?>		
								</div> 
								<div class="col-md-3">
									<label>Student Code<span class="mandatory_fields">*</span></label>
									<?php echo $this->Form->input("student_code",array("type"=>"select","id"=>"student_detail_id","class"=>"form-control","required","placeholder"=>"Type Student name or Code","label"=>false)); ?>
								</div> 
						<br>
						<div class="col-md-3">
							<?php echo $this->Form->submit('Get Marks List',array("class"=>"btn btn-info pull-right form-control"));?>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4"><?php echo $this->Session->flash(); ?></div>
				</div>
			   <?php echo $this->Form->end(); ?>
			</div>
		</div>
		</div>
			
		
		<div class="col-md-2"></div>
		
      </div>
      <!-- row -->
 
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