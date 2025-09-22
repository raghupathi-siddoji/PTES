
 
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
   <section class="content-header">
	  <h1>Academic</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Academic</a></li>
        <li class="active">Student Detail</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
     
  <!------------"Student Detail Entry" created: 22 aug 2016 ----------->
  
	 <div class="row">
	 <?php echo $this->Form->create('StudentDetail',array("url"=>"/Student/studentDetail"));?>
		<div class="col-md-12">
         <div class="box box-success">
			<div class="box-header with-border">
			<div class="row">
			<div class="col-md-8">
				<div style="color:#00C0EF">
				<?php  echo $this->Form->input('id',array("type"=>"hidden")); ?>
				<div class="row">
					<?php $application=$this->Session->read('applicationId');
					$name=$this->Session->read('name');
					$number=$this->Session->read('application_number'); ?>
						<div class="col-md-4">
							<?php if(!empty($application_num))
							{
								echo $this->Form->input('student_application_id',array("type"=>"hidden","value"=>$application_num)); 
								echo "Application Number : ".$application_number;
							}
							else
							{
								echo $this->Form->input('student_application_id',array("type"=>"hidden","value"=>$application)); 
								echo "Application Number : ".$number;
							} ?>
						</div>
						<div class="col-md-4" style="text-align:center">
							<?php if(!empty($sCode))
							{
								echo "Student Code : ".$sCode;
								echo $this->Form->input('student_code',array("type"=>"hidden","value"=>$sCode));
							} ?>
						</div>
						<div class="col-md-4" style="text-align:right">
							<?php if(!empty($aId))
							{
								echo "Admission Number : ".$aId; 
								echo $this->Form->input('admission_number',array("type"=>"hidden","value"=>$aId)); 
							}?>
						</div>
					</div>
				</div>
			</div>
				<span class="pull-right"><?php echo $this->Session->flash();?></span>
			</div></div>
			<div class="box-body">
			<div class="row">
				<div class="col-md-3">
					<label>Name of Student<span class="mandatory_fields"> * </span></label>
					<?php  
					if(!empty($Sname))
						echo $this->Form->input('student_name',array("type"=>"text","class"=>"form-control","required","label"=>false,"value"=>$Sname)); 
					else
						echo $this->Form->input('student_name',array("type"=>"text","class"=>"form-control","required","label"=>false,"value"=>$name)); ?>
				</div>
				<div class="col-md-2"><label>Gender<span class="mandatory_fields"> * </span></label>
					<?php echo $this->Form->input('gender',array('type'=>'select','empty'=>'Select Gender','label'=>false,'options'=>array('Male'=>'Male','Female'=>'Female'),"required","class"=>"form-control select_box"));?>
				</div>	
				<div class="col-md-2">
				  <label>DOB<span class="mandatory_fields"> * </span></label>
				  <?php echo $this->Form->input('dob',array("type"=>"text",'id'=>'datepicker',"required","class"=>"form-control","label"=>false));?>
				</div>
				<div class="col-md-2">
				  <label>Place of Birth<span class="mandatory_fields"> * </span></label>
				  <?php echo $this->Form->input('birth_place',array("type"=>"text","required","class"=>"form-control","label"=>false));?>
				</div>
				<div class="col-md-3"><label>Mother Tongue<span class="mandatory_fields"> * </span></label>
				   <?php echo $this->Form->input('mother_tongue_id',array('type'=>'select','label'=>false,'empty'=>'Select Mother Tongue','options'=>array($listMotherTongue),"required","class"=>"form-control select_box")) ?>
				</div>
			</div>
			
			<div class="row">
				<div class="col-md-3"><label>Academic Year<span class="mandatory_fields"> * </span></label>
					<?php echo $this->Form->input('academic_year_id',array('type'=>'select','label'=>false,'empty'=>'Select Academic year','options'=>array($year_list),"required","class"=>"form-control select_box"));?>
				</div>
				<div class="col-md-3"><label>Class<span class="mandatory_fields"> * </span></label>
				   <?php echo $this->Form->input('add_class_id',array('type'=>'select','empty'=>'Select Class','options'=>array($classes),"required","class"=>"form-control select_box","label"=>false)) ?>
				</div>	
				<div class="col-md-3"><label>Section<span class="mandatory_fields"> * </span></label>
				   <?php echo $this->Form->input('section_id',array('type'=>'select','label'=>false,'options'=>array('select'=>'Select Section',$listSection),"required","class"=>"form-control select_box")) ?>
				</div>
				<div class="col-md-3"><label>Medium<span class="mandatory_fields"> * </span></label>
				   <?php echo $this->Form->input('language_id',array('type'=>'select','label'=>false,'options'=>array($listLanguage),'default'=>'English',"required","class"=>"form-control select_box")) ?>
				</div>
			</div>
			
			<div class="row">
				<div class="col-md-3"><label>Caste<span class="mandatory_fields"> * </span></label>
				   <?php echo $this->Form->input('caste_id',array('type'=>'select','label'=>false,'empty'=>'Select Caste','options'=>array($listcaste),"required","class"=>"form-control select_box")) ?>
				</div>
				<div class="col-md-3"><label>Sub Caste<span class="mandatory_fields"> * </span></label>
				  <?php echo $this->Form->input('sub_caste_id',array('type'=>'select','label'=>false,'empty'=>'Select Subcaste','options'=>array($listSubCaste),"required","class"=>"form-control select_box"));?>
				</div>	
				<div class="col-md-3"><label>Religion<span class="mandatory_fields"> * </span></label>
				   <?php echo $this->Form->input('religion_id',array('type'=>'select','label'=>false,'empty'=>'Select Religion','options'=>array($listReligion),"required","class"=>"form-control select_box")) ?>
				</div>	
				<div class="col-md-3"><label>Nationality<span class="mandatory_fields"> * </span></label>
				   <?php echo $this->Form->input('nationality',array("type"=>"text",'label'=>false,"required","class"=>"form-control","value"=>"Indian")) ?>
				</div>
			</div>
			
			<div class="row">
				<div class="col-md-3"><label>Blood Group<span class="mandatory_fields"> * </span></label>
				   <?php echo $this->Form->input('blood_group_id',array('type'=>'select','label'=>false,'empty'=>'Select Blood Group','options'=>array($bloodgroup_list),"required","class"=>"form-control select_box")) ?>
				</div>
				<div class="col-md-3"><label>Adhar Card Number</label>
				  <?php echo $this->Form->input('aadhar_card_number',array("type"=>"text",'label'=>false,"class"=>"form-control")); ?>
				</div>	 
				<div class="col-md-3"><label>Vaccinatted<span class="mandatory_fields"> * </span></label>
					<?php echo $this->Form->input('vaccinated',array('type'=>'select','label'=>false,'options'=>array('Yes'=>'Vaccinatted','No'=>'Not Vaccinatted'),"required","class"=>"form-control select_box"));?>
				</div>
				<div class="col-md-3"><label>Status<span class="mandatory_fields"> * </span></label>
					<?php echo $this->Form->input('status',array('type'=>'select','label'=>false,'options'=>array('Active'=>'Active','In Active'=>'In Active'),"required","class"=>"form-control select_box"));?>
				</div>
			</div>	
			<div class="row">
				<div class="col-md-6">
				   <label>Permanent Address<span class="mandatory_fields"> * </span></label>
				   <?php echo $this->Form->input('permanent_address',array("type"=>"textarea","rows"=>"4","id"=>"permanent_address","required","class"=>"form-control","label"=>false)) ?>
				</div>
				<div class="col-md-6">
					<label>CommunicationAddress<span class="mandatory_fields">*</span></label>
				   <?php echo $this->Form->input('communication_address',array("type"=>"textarea","rows"=>"4","id"=>"communication_address","required","class"=>"form-control","label"=>false)) ?>
				</div>
			</div>
			<div class="row"><div class="col-md-6"> <mark>Communication address is same as Permanent address click here <input type="checkbox" id="same_address"></mark></div> </div>
			<div class="row">	
				<div class="col-md-3">
				   <label>Taluk<span class="mandatory_fields"> * </span></label><br>
				    <?php echo $this->Form->input('permanent_address_taluk',array("type"=>"select","required","options"=>array($taluks),"default"=>"Bhadravathi","class"=>"form-control select_box","label"=>false,"empty"=>"Select")) ?>	
				 </div>
				 <div class="col-md-3">  
				   <label>District<span class="mandatory_fields"> * </span></label>
				   <?php echo $this->Form->input('permanent_address_district',array("type"=>"select","required","options"=>array($districts),"default"=>"Shimoga","class"=>"form-control select_box","label"=>false,"empty"=>"Select")) ?> 
				 </div>
				 <div class="col-md-3">
				   <label>Taluk<span class="mandatory_fields"> * </span></label>
				   <?php echo $this->Form->input('communication_address_taluk',array("type"=>"select","required","options"=>array($taluks),"default"=>"Bhadravathi","class"=>"form-control select_box","label"=>false,"empty"=>"Select")) ?>
				</div>
				<div class="col-md-3">
				   <label>District<span class="mandatory_fields"> * </span></label>
				   <?php echo $this->Form->input('communication_address_district',array("type"=>"select","required","options"=>array($districts),"default"=>"Shimoga","class"=>"form-control select_box","label"=>false,"empty"=>"Select")) ?>
				</div>
			</div>
			
			<div class="row">
				<div class="col-md-3">  	   
					<label>State<span class="mandatory_fields"> * </span></label>
					<?php echo $this->Form->input('permanent_address_state',array("type"=>"select","required","options"=>array($states),"default"=>"Karnataka","class"=>"form-control select_box","label"=>false,"empty"=>"Select")) ?>
				</div>
				<div class="col-md-3">  	   
					<label>Pincode<span class="mandatory_fields"> * </span></label>
					<?php echo $this->Form->input('permanent_address_pincode',array("type"=>"text","required","id"=>"permanent_address_pincode","class"=>"form-control","label"=>false,"maxlength"=>"6","onkeypress"=>"return isNumber(event)")) ?>
				</div>
				<div class="col-md-3">
				   <label>State<span class="mandatory_fields"> * </span></label>
				   <?php echo $this->Form->input('communication_address_state',array("type"=>"select","required","options"=>array($states),"default"=>"Karnataka","class"=>"form-control select_box","label"=>false,"empty"=>"Select")) ?>
				</div>
				<div class="col-md-3">
					<label>Pincode<span class="mandatory_fields"> * </span></label>
				   <?php echo $this->Form->input('communication_address_pincode',array("type"=>"text","required","id"=>"communication_address_pincode","class"=>"form-control","label"=>false,"minlength"=>"6","maxlength"=>"6","onkeypress"=>"return isNumber(event)")) ?>
				</div>
			</div>
		
			<div class="form-group">
			<div class="row">
				<div class="col-md-3">
					<label>Father/Mother is Employee of MPM Ltd.,<span class="mandatory_fields">*</span> </label><br>
					<?php $options=array("MPM"=>"MPM ","Non_MPM"=>"Non-MPM");
					echo $this->Form->radio('mpm_employee',$options,array("legend"=>false,"required","label"=>false,'onchange'=>'return checkjob(this.value);'));?>	
				</div>
				<div class="col-md-3">
					<label>Admitting Under RTE Act<span class="mandatory_fields"> * </span></label><br>
					<?php $options=array("yes"=>" YES ","no"=>" NO ");
					echo $this->Form->radio('admitting_under_rte',$options,array("legend"=>false,"required","label"=>false));?>	
				</div>
				<div class="col-md-3"><label>Student DISC Number</label>
					<?php echo $this->Form->input('dise_no',array('type'=>'text',"label"=>false,"class"=>"form-control"));?>
				</div>
				<div class="col-md-3">
					<label>Date of Admission<span class="mandatory_fields"> * </span></label>
				<?php echo $this->Form->input('date_of_admision',array("type"=>"text",'id'=>'datepicker1',"required","class"=>"form-control","label"=>false));?>

				</div>
			</div>
			</div>
			
		<div class="form-group">	
		<div class="row">	
			<div id="mpm_emp" style="display:none;">
			<div class="col-md-12">
				<div class="row">
					<div class="col-md-3">
						<label>Father/Mother Name</label>
						<?php echo $this->Form->input('mpm_parent_name',array("type"=>"text","class"=>"form-control","label"=>false));?>
					</div>
					<div class="col-md-3">
						<label>Department</label>
						<?php echo $this->Form->input('department',array("type"=>"text","class"=>"form-control","label"=>false));?>
					</div>
					<div class="col-md-3">
						<label>Designation</label>
						<?php echo $this->Form->input('designation',array("type"=>"text","class"=>"form-control","label"=>false));?>
					</div>
					<div class="col-md-3">
						<label>E.C.No</label>
						<?php echo $this->Form->input('e_c_no',array("type"=>"text","class"=>"form-control","label"=>false));?>
					</div>
				</div>
			</div>
			</div>
		</div>
		</div>
			
			<div class="row">
				<div class="col-md-4"></div>
				  <div class="col-md-4">
					<?php echo $this->Form->submit('Submit',array("class"=>"btn btn-info form-control"));?>
				  </div>
				<div class="col-md-4">
					<?php echo $this->Html->link('<i class="btn btn-warning btn-sm pull-right">Cancel</i>',
					array('controller'=>'Student','action'=>'studentLists'),array('escape'=>false))?>
				</div>
			</div>
			
			</div>	
				<?php echo $this->Form->end(); ?> 
			</div>
		 </div>
	
        </div>
		
      </div>
      <!-- row -->
    
	</section>
    <!-- content -->
  </div>
  <!-- content-wrapper -->
  
  <script type="text/javascript">
function checkjob(val){
 var element=document.getElementById('mpm_emp');
 if(val=='MPM')
   element.style.display='inline';
 else  
   element.style.display='none';
}

/* FOR COPY Address OF Permanent Address TO Communication Address*/
$("#same_address").click(function(){
	if($("#same_address").prop('checked'))
	{
		 $p_address = $("#permanent_address").val();
		 $("#communication_address").val( $p_address);
		  $p_address_pin= $("#permanent_address_pincode").val();
		 $("#communication_address_pincode").val($p_address_pin);
	}
	else
	{  
		 $("#communication_address").val(""); 
		  $("#communication_address_pincode").val("");
	}
});
</script>
 