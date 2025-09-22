  
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
	  <h4>Co-Curricular Report</h4>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Report</a></li>
        <li class="active">>Co-Curricular</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
     
  <!------------ ----------->
  
	 <div class="row">
        <!-- left column -->
		
        <div class="col-md-2"></div>
		
		<div class="col-md-9">
         <div class="box box-success">  
			<div class="box-body">
				 <?php echo $this->Form->create('Report',array("url"=>array("controller"=>"Report","action"=>"coCurricular")));?>
				 
					 <div class="row">
						<div class="col-sm-2"><label> &nbsp;</label></div>
						<div class="col-sm-3"><label> Academic Year</label></div> 
						<div class="col-sm-3"><label> Student Name / Code</label></div>
					</div>
					<div class="row">
						<div class="col-sm-2"><label> &nbsp;</label></div>
						<div class="col-sm-3"><?php echo $this->Form->input("academic_year_id",array("type"=>"select","options"=>$academic_year_array,"class"=>"form-control select_box","empty"=>"Select","required","label"=>false));?>		</div>
					 
						<div class="col-sm-3"><label> <?php  
							echo $this->Form->input('student_code',array("type"=>"text","class"=>"form-control","required","id"=>"student_code","placeholder"=>"Type student code or name","label"=>false));?></label></div>
						<div class="col-sm-4">
							<?php echo $this->Form->submit('Show',array("class"=>"btn btn-info","name"=>"show_btn"));?>
						</div>	
					</div> 
				<br>
				 
			</div>
		 </div> 
        </div>  
      </div>
      <!-- row -->
	  
	  <!-- print area -->
	  <?php if(isset($_POST['show_btn'])!='') {
			 if(!empty($co_curricular_list)) {
		$academic_year_id = $this->request->data['Report']['academic_year_id'];
		$student_code_ =  $this->request->data['Report']['student_code'] ;
	  ?>
		<div class="row" >
		   <div class="col-sm-10">&nbsp;</div>
		   <div class="col-sm-1">
			<?php echo $this->Html->link('<i class="fa fa-print fa-2x" ></i>',
											array("controller"=>"Report","action"=>"coCurricularPrint", $student_code_,$academic_year_id),
											array("escape"=>false,"target"=>"_blank","title"=>"Take a print")); ?></div>
											<div class="col-sm-2">&nbsp;</div>
		</div>
	
		<div class="row" >
			<div class="col-sm-12"> 
				<div class="box">  
					<div class="box-body">
						<table width="100%" border="0">
							<tr>
								<td width="10%">Student Name:</td>
								<td><?php echo $co_curricular_list[0]['StudentDetail']['student_name'];?></td>
								<td width="10%">Academic Year:</td>
								<td><?php echo $co_curricular_list[0]['AcademicYear']['academic_year'];?></td> 
								<td width="10%">Class:</td>
								<td><?php echo $co_curricular_list[0]['StudentDetail']['add_class_id'];?></td> 
							</tr>
							<tr><td colspan="6">&nbsp;</td></tr> 	
						</table>  
						<table width="100%" border="1">
						  <tr align="center" bgcolor="#666666">
							<td width="10%"><span class="style4">#</span></td>
							<td width="21%"><span class="style4">Activity Name </span></td>
							<td width="11%"><span class="style4">Secured Place </span></td>
							<td width="14%"><span class="style4">Date</span></td>
							<td width="18%"><span class="style4">Organized  By </span></td>
							<td width="35%"><span class="style4">Details</span></td>
						  </tr>
							<?php $i=1;
							foreach($co_curricular_list as $list):?>
							  <tr>
								<td><?php echo $i++;?></td>
								<td><?php echo $list['ActivitieSetting']['activity_name'];?></td>
								<td><?php echo $list['CoCurricular']['secured_place'];?></td>
								<td><?php echo date('d-m-Y',strtotime($list['CoCurricular']['activities_date']));?></td>
								<td><?php echo $list['CoCurricular']['hosted_by'];?></td>
								<td><?php echo $list['CoCurricular']['details'];?></td>
							  </tr>
							<?php endforeach;?>
						</table>
					</div>
				</div>
			</div> 
		</div>
	  <?php } 
		else
		{
			?>
				<table width="100%" border="1"> <tr align="center" bgcolor="#666666" style="color:white"><td>No record found.</td></tr></table>
			<?php 
		}
	}
	  ?>
	  
	  
	</section>
    <!-- content -->
  </div>
  <!-- content-wrapper -->
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
 
<style type="text/css">
<!--
.style4 {color: #FFFFFF; font-weight: bold; }
-->
</style>

 