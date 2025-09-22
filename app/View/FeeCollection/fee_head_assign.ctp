 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
	  <h1>Fee </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Fee</a></li>
        <li class="active">Fee Head Assign</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
     
  <!------------ Add Category  ----------->
	 <div class="row">
        <!-- left column -->
		
        <div class="col-md-6">
          <div class="box box-success">
            <div class="box-header with-border">Fee Head Assign</div>
			
            <!-- form start -->
           <?php echo $this->Form->create('FeeHeadAssign',array("url"=>array("controller"=>"FeeCollection","action"=>"feeHeadAssign")));?>
			<?php echo $this->Form->input('id');?>
              <div class="box-body">
                <div class="form-group">
					<div class="row">
						<div class="col-sm-12"><label>Fee Head Name <span class="mandatory_fields">*</span></label>
					<?php 
					echo $this->Form->input('fee_head_name',array("type"=>"text","class"=>"form-control","label"=>false,"required"));?>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12"><label>Fee Type <span class="mandatory_fields">*</span></label>
							<?php echo $this->Form->input('fee_head_type',array('type'=>'select','id'=>'select','options'=>array('Govt'=>'Govt','Mgnt'=>'Management','RTE'=>"RTE"),"required","class"=>"form-control select_box","label"=>false,'empty'=>'Select Fee Type')) ?>
						</div>
				   </div>
					<div class="row"> 
						<div class="col-sm-12"><label>Fee Code <span class="mandatory_fields">*</span></label>
							<?php 
					echo $this->Form->input('fee_head_code',array("type"=>"text","class"=>"form-control","id"=>"fee_head_code1","label"=>false,"required","minlength"=>"4","maxlength"=>"4"));?>
						</div>
				   </div>  
					<div class="row">
						<div class="col-sm-12"><label>Description</label>
							<?php echo $this->Form->input('fee_description',array("type"=>"textarea","class"=>"form-control","rows"=>"2","label"=>false));?>
						</div>
				   </div>
					
					<div class="row">
						<div class="col-sm-4"></div>
						<div class="col-sm-4"><br>
							<?php echo $this->Form->submit('Save',array("class"=>"btn btn-info pull-center"));?>
						</div>
				   </div>
                </div>
				<?php echo $this->Session->flash();?>
              </div>
            <?php echo $this->Form->end();?>
			<!---- form end ------>
          
		</div>
        </div>
		  
        <!--col (left) -->
		
	
<!-------------------------------------->
	
        <!-- right column -->
        <div class="col-md-6">
		
          <div class="box box-warning">
			  <div class="box-body">
				<table class="table table-bordered" id="example1">
				<thead>
					<tr><th>Sl.No</th><th>Fee Head Name</th><th>Code</th><th>Type</th><th>Edit</th></tr>
				</thead>
				<?php 
					$i=1;
					foreach($head_list as $list):
					$id = $list['FeeHeadAssign']['id'];?>
					<tr>
						<td><?php echo $i;?></td>
						<td><?php echo $list['FeeHeadAssign']['fee_head_name'];?></td>
						<td><?php echo $list['FeeHeadAssign']['fee_head_code'];?></td>
						<td><?php echo $list['FeeHeadAssign']['fee_head_type'];?></td>
						<td> 
							 <?php echo $this->Html->link('<i class="fa fa-trash-o" ></i>',
								array("controller"=>"FeeCollection","action"=>"deleteFeeHead", $id),
								array("confirm"=>"Are you sure you want ro delete?", "escape"=>false)); ?>  | 
							<?php echo $this->Html->link('<i class="fa fa-pencil" ></i>',
											array("controller"=>"FeeCollection","action"=>"feeHeadAssign", $id),
											array("escape"=>false)); ?> </td>
					</tr> 
				<?php 
				$i++;
				endforeach;?>
				</table> 
				
				</table>
				
					
			</div>
			
			</div>
        </div>
		
      </div>
      <!-- row -->
    
	</section>
    <!-- content -->
  </div>
  <!-- content-wrapper -->
  
  
  <script>
  $("#select").on("change",
	function(){ 
		if(this.value=="Govt"){$("#fee_head_code1").val("FG");	}
		if(this.value=="Mgnt"){$(fee_head_code1).val("FM");	}
		if(this.value=="RTE"){ $(fee_head_code1).val("FR");	}
	}
  ) 
   
  </script>