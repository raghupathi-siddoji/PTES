 <?php  // print_r($staffList);?>
 <div class="wrapper"> 
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
         <section class="content-header">
          <h1>
            Payroll Maintenance 
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			 <li>Payroll Maintenance</li>
            <li class="active">Basic Salary Allocation</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content" >
           
		   
          <!------------  ----------->
		   <div class="row" >
		    <div class="col-xs-2" ></div>
        <div class="col-xs-8" >
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Basic Salary Allocation </h3> 
            </div>
			<?php echo $this->Form->create('BasicAllocation',array("url"=>array("controller"=>"PayrollMaintenance","action"=>"basicAllocation")));?>
			 
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>Sl.No</th>
				  <th>Employee Name</th>
                  <th>Employee Id</th>
                  <th>Basic Salary <span class="mandatory_fields">*</span></th> 
				  <th>CL <span class="mandatory_fields">*</span></th> 
				  <th>EL <span class="mandatory_fields">*</span></th> 
                  </tr>
				<?php 
					$i=1;
					$j=0;
					foreach($staffList as $list){
					if($list['StaffDetail']['id']== $salary[$j]['BasicAllocation']['staff_detail_id'])
					{
					?>  
						<tr>
						  <td><?php echo $i++;?></td>
						  <td><?php echo $list['StaffDetail']['first_name'];?></td>
						  <td>  
								<?php echo $this->Form->input('id.',array('type'=>'hidden','label'=>false,'div'=>false,'value'=>$salary[$j]['BasicAllocation']['id']));?>
								<?php echo $this->Form->input('staff_detail_id.',array("type"=>"hidden","class"=>"form-control input-sm","label"=>false,"value"=>$list['StaffDetail']['id']));
								?>
								<?php echo $list['StaffDetail']['emp_id'];?></td>
						  <td><?php  
								echo $this->Form->input('basic_salary.',array("type"=>"text","class"=>"form-control input-sm","label"=>false,"value"=>$salary[$j]['BasicAllocation']['basic_salary'],"maxlength"=>"5","onkeypress"=>"return isNumber(event)"
));
								?></td>
							<td><?php  
								echo $this->Form->input('staff_cl.',array("type"=>"text","class"=>"form-control input-sm","label"=>false,"value"=>$salary[$j]['BasicAllocation']['staff_cl'],"maxlength"=>"2","onkeypress"=>"return isNumber(event)"
));
								?></td>
							<td><?php  
								echo $this->Form->input('staff_el.',array("type"=>"text","class"=>"form-control input-sm","label"=>false,"value"=>$salary[$j]['BasicAllocation']['staff_el'],"maxlength"=>"2","onkeypress"=>"return isNumber(event)"
));
								?></td>
						 </tr> 
					<?php  
					}
					else
					{?>
						<tr>
						  <td><?php echo $i++;?></td>
						  <td><?php echo $list['StaffDetail']['first_name'];?></td>
						  <td> <?php  
								echo $this->Form->input('staff_detail_id.',array("type"=>"hidden","class"=>"form-control input-sm","label"=>false,"value"=>$list['StaffDetail']['id']));
								?>
								<?php echo $list['StaffDetail']['emp_id'];?></td>
						  <td><?php  
								echo $this->Form->input('basic_salary.',array("type"=>"text","class"=>"form-control input-sm","label"=>false,"value"=>'0',"maxlength"=>"5","onkeypress"=>"return isNumber(event)"
));
								?></td>
							<td><?php  
								echo $this->Form->input('staff_cl.',array("type"=>"text","class"=>"form-control input-sm","label"=>false,"value"=>'0',"maxlength"=>"2","onkeypress"=>"return isNumber(event)"
));
								?></td>
							<td><?php  
								echo $this->Form->input('staff_el.',array("type"=>"text","class"=>"form-control input-sm","label"=>false,"value"=>'0',"maxlength"=>"2","onkeypress"=>"return isNumber(event)"
));
								?></td>
						   
						</tr> 
						<?php }
						$j++;
						} ?>
						<tr>
						  <td colspan="5" align="center"><?php echo $this->Form->submit('Allocate',array("class"=>"btn btn-info"));?></td>
						</tr>	
				</table>
            </div>
			<?php echo $this->Form->end();?>
			 <div class="col-xs-2" ></div>
            <!-- /.box-body -->
          </div>
		   
          <!-- /.box -->
        </div>
      </div>		
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
	</div> <!-- wrapper -->