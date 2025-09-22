<?php ?>
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
	  <h1>Academic</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Attendance</a></li>
        <li class="active">Class Wise Attendance</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
  
	 <div class="row">
        <!-- left column -->
		<div class="col-md-1"></div>
		<div class="col-md-10">
         <div class="box box-success">
			<div class="box-body">
			<div class="row">
				<div class="col-sm-4"><h4>Promote Students</h4></div>
					<div class="col-sm-6"><?php echo $this->Session->flash(); ?></div>
				</div>
			<div class="row">
			<div class="col-md-12">
				<?php echo $this->Form->create('StudentDetail',array("url"=>array("controller"=>"Student","action"=>"promoteStudent")));?>
						<?php echo $this->Form->input('id',array("text"=>"hidden")); ?>
					<div class="row">
						<label class="col-md-2">
							Academic Year<span class="mandatory_fields"> * </span>
						</label>
						<div class="col-md-3">
							<?php echo $this->Form->input('academic_year_id',array('type'=>'select','empty'=>'Select academic year','label'=>false,'options'=>array($year_list),"required","class"=>"form-control select_box"));?>
						</div>	
						<label class="col-md-2">
							Class<span class="mandatory_fields"> * </span>
						</label>
						<div class="col-md-3">
							<?php echo $this->Form->input('add_class_id',array('type'=>'select','label'=>false,'empty'=>'Select Class','options'=>array($classes),"required","class"=>"form-control select_box")) ?>
						</div>
						<div class="col-sm-2">
							<?php echo $this->Form->submit('Show',array("class"=>"btn btn-info"));?>
						</div>
				</div>
			</div>
		</div>
	  <!-------------------------------------------------------------------------------------->
      </div>
    </div>
  </div>				
				   <?php echo $this->Form->end(); ?>
				</div>
<!------------------------------------------------------------------------------------------->
	<?php if(!empty($details)) {?>
	<div class="row">
		<div class="col-md-1"></div>
		<div class="col-md-10">
			<div class="box box-success">
			<div class="box-body">
			<?php echo $this->Form->create('StudentDetail',array("url"=>array("controller"=>"Student","action"=>"promoteStudentsTo")));?>
				<div class="row">
					<div class="col-md-6" style="font-size:16px;">Promote Students</div>
					<div class="col-md-2" style="text-align:right;">
						<mark >Apply For All <input type="checkbox" id="select_all" onClick="selectAll(this)" ></mark>
					</div>
					<div class="col-md-2">
						<?php echo $this->Form->input('academic',array('type'=>'select','label'=>false,'id'=>'aca',"class"=>"select_box",'options'=>array('select'=>'Select academic year',$year_list)));?>
					</div>
					<div class="col-md-2">
						<?php echo $this->Form->input('class',array('type'=>'select','label'=>false,'id'=>'cls',"class"=>"pull-right select_box",'options'=>array('select'=>'Select Class',$classes))) ?>
					</div>
					
				</div>
				<br>
				<table class="table table-condensed">
					<tr>
						<th>Sl.No</th>
						<th>Student Name</th>
						<th>Student Code</th>
						<th>Class</th>
						<th>Promoting Academic year</th>
						<th>Promoting Class</th>
					</tr>
					<?php  $i=1; foreach($details as $list) { ?>
						<?php echo $this->Form->Input('id.',array('type'=>'hidden','value'=>$list['StudentDetail']['id'])); ?>
						<tr>
							<td><?php $a='a'.$i; $c='c'.$i; echo $i++; ?></td>
							<td><?php echo $list['StudentDetail']['student_name']; ?></td>
							<td><?php echo $list['StudentDetail']['student_code']; ?></td>
							<td><?php echo $list['AddClass']['class_name']; ?></td>
						
							<td><?php echo $this->Form->input('academic_year_id.',array('type'=>'select','empty'=>'Select academic year','id'=>$a,'label'=>false,'options'=>array($year_list),"required","class"=>"form-control select_box"));?></td>
							<td><?php echo $this->Form->input('add_class_id.',array('type'=>'select','id'=>$c,'label'=>false,'empty'=>'Select Class','options'=>array($classes),"required","class"=>"form-control select_box")) ?></td>
						</tr>
					<?php } ?>
				<tr>
					<td colspan="6" align="center"><?php echo $this->Form->submit('Promote',array("class"=>"btn btn-info"));?></td>
					<?php echo $this->Form->input('increment',array('type'=>'hidden','id'=>'count','value'=>$i)); ?>
					<?php echo $this->Form->end(); ?>
				</tr>
				</table>
				</div>
			</div>
		</div>
	</div>
	<?php } ?>
<!------------------------------------------------------------------------------------------->
  
	</section>
    <!-- content -->
  </div>
  <!-- content-wrapper -->
  
  <script>
	function selectAll() {
		
		var inr=0
		if(select_all.checked==true)
		{
				var count = document.getElementById('count').value;
				var aca = document.getElementById('aca').value;
				var cls = document.getElementById('cls').value;
				for(inr=1;inr<count;inr++)
				{
					document.getElementById('a'+inr).value = aca;
					document.getElementById('c'+inr).value = cls;
				}
		}
				
	} 
	</script>
  
  