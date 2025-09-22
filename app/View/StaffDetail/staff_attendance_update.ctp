 
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
	  <h1>Attendance</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Staff Attendance</a></li>
        <li class="active">Staff Attendance Update</li>
      </ol>
    </section>

    <!-- Main content -->
     <!-- Main content -->
    <section class="content">
  
	 <div class="row">
        <!-- left column -->
		<div class="col-md-3"></div>
		<div class="col-md-6">
         <div class="box box-success">
			<div class="box-header with-border"><h4>Staff Attendance Update</h4></div>
			<div class="box-body">
				
		           <?php echo $this->Form->create('StaffAttendance',array("url"=>array("controller"=>"StaffDetail","action"=>"staffAttendanceListUpdate")));?>
						<?php echo $this->Form->input('id',array("text"=>"hidden")); ?>
					<div class="form-group">						
						<div class="row">
							<div class="col-md-3"></div>
							<div class="col-md-6">
						<?php echo $this->Form->input('academic_year_id',array('type'=>'select','options'=>array('select'=>'Select academic year',$year_list),"required","class"=>"form-control select_box"));?>
							</div>	
							<div class="col-md-3"></div>
						</div>
					</div>
					
					<div class="form-group">	
						<div class="row">
							<div class="col-md-3"></div>
							<div class="col-md-6">
								<?php echo $this->Form->input('month',array('type'=>'select',"required","class"=>"form-control select_box",
								'options'=>array('select'=>'Select Month','1'=>'January','2'=>'Febrauary','3'=>'March','4'=>'April',
								'5'=>'May','6'=>'June','7'=>'July','8'=>'August','9'=>'September','10'=>'October','11'=>'November','12'=>'December'))); ?>
							</div>
							<div class="col-md-3"></div>
						</div>
					</div>
					
						<div class="form-group">
							<div class="row">
								<div class="col-md-4"></div>
								<div class="col-sm-4"><?php echo $this->Form->submit('Get Attendance List',array("class"=>"btn btn-info"));?></div>
								<div class="col-md-4"></div>
							</div>
						</div>
						
					<div class="row">
						<div class="col-sm-2"></div>
						<div class="col-sm-8"><?php echo $this->Session->flash(); ?></div>
						<div class="col-sm-2"></div>
					</div>
						
						
						
				<!---<div class="row">
				  <div class="col-md-4"></div>
				    <div class="col-md-4">
						 <button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#attendance">Get Attendance List</button>
					</div>
				  <div class="col-md-4"></div>
				</div>-->
				
	<!---------------------Modal ----------------------------------------->
	<!--<div class="modal fade" id="attendance" role="dialog">
		<div class="modal-dialog modal-lg">
    
     
      <div class="modal-content" id="content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <div class="modal-title"><h4>Attendance List</h4>
			<div class="row">
				<small><div class="col-md-1">Class : 1st</div>
				<div class="col-md-1">Section : A</div>
				<div class="col-md-2">Month : August</div></small>
			</div>
		  </div>
		</div>
        
		<div class="modal-body">
			<div class="row">
			<div class="col-md-12">
			<table width="100%" height="100%"> 
					<thead>
					<tr>
					  <th>Sl.No</th>
					  <th>Name</th>
					  <th>01</th>
					  <th>02</th>
					  <th>03</th>
					  <th>04</th>
					  <th>05</th>
					  <th>06</th>
					  <th>07</th>
					  <th>08</th>
					  <th>09</th>
					  <th>10</th>
					  <th>11</th>
					  <th>12</th>
					  <th>13</th>
					  <th>14</th>
					  <th>15</th>
					  <th>16</th>
					  <th>17</th>
					  <th>18</th>
					  <th>19</th>
					  <th>20</th>
					  <th>21</th>
					  <th>22</th>
					  <th>23</th>
					  <th>24</th>
					  <th>25</th>
					  <th>26</th>
					  <th>27</th>
					  <th>28</th>
					  <th>29</th>
					  <th >30</th>
					  <th>31</th>
					</tr>
				</thead>
				<tbody>
				<tr height="40">
					<td>3456</td>
					<td>Kruthi v Kustagi</td>
					<td><?php echo $this->Form->input("attend_1",array("type"=>"text","value"=>"P","label"=>false,"size"=>"1")); ?></td>
					<td><?php echo $this->Form->input("attend_1",array("type"=>"text","value"=>"P","label"=>false,"size"=>"1")); ?></td>
					<td><?php echo $this->Form->input("attend_1",array("type"=>"text","value"=>"P","label"=>false,"size"=>"1")); ?></td>
					<td><?php echo $this->Form->input("attend_1",array("type"=>"text","value"=>"P","label"=>false,"size"=>"1")); ?></td>
					<td><?php echo $this->Form->input("attend_1",array("type"=>"text","value"=>"P","label"=>false,"size"=>"1")); ?></td>
					<td><?php echo $this->Form->input("attend_1",array("type"=>"text","value"=>"P","label"=>false,"size"=>"1")); ?></td>
					<td><?php echo $this->Form->input("attend_1",array("type"=>"text","value"=>"P","label"=>false,"size"=>"1")); ?></td>
					<td><?php echo $this->Form->input("attend_1",array("type"=>"text","value"=>"P","label"=>false,"size"=>"1")); ?></td>
					<td><?php echo $this->Form->input("attend_1",array("type"=>"text","value"=>"P","label"=>false,"size"=>"1")); ?></td>
					<td><?php echo $this->Form->input("attend_1",array("type"=>"text","value"=>"P","label"=>false,"size"=>"1")); ?></td>
					<td><?php echo $this->Form->input("attend_1",array("type"=>"text","value"=>"P","label"=>false,"size"=>"1")); ?></td>
					<td><?php echo $this->Form->input("attend_1",array("type"=>"text","value"=>"P","label"=>false,"size"=>"1")); ?></td>
					<td><?php echo $this->Form->input("attend_1",array("type"=>"text","value"=>"P","label"=>false,"size"=>"1")); ?></td>
					<td><?php echo $this->Form->input("attend_1",array("type"=>"text","value"=>"P","label"=>false,"size"=>"1")); ?></td>
					<td><?php echo $this->Form->input("attend_1",array("type"=>"text","value"=>"P","label"=>false,"size"=>"1")); ?></td>
					<td><?php echo $this->Form->input("attend_1",array("type"=>"text","value"=>"P","label"=>false,"size"=>"1")); ?></td>
					<td><?php echo $this->Form->input("attend_1",array("type"=>"text","value"=>"P","label"=>false,"size"=>"1")); ?></td>
					<td><?php echo $this->Form->input("attend_1",array("type"=>"text","value"=>"P","label"=>false,"size"=>"1")); ?></td>
					<td><?php echo $this->Form->input("attend_1",array("type"=>"text","value"=>"P","label"=>false,"size"=>"1")); ?></td>
					<td><?php echo $this->Form->input("attend_1",array("type"=>"text","value"=>"P","label"=>false,"size"=>"1")); ?></td>
					<td><?php echo $this->Form->input("attend_1",array("type"=>"text","value"=>"P","label"=>false,"size"=>"1")); ?></td>
					<td><?php echo $this->Form->input("attend_1",array("type"=>"text","value"=>"P","label"=>false,"size"=>"1")); ?></td>
					<td><?php echo $this->Form->input("attend_1",array("type"=>"text","value"=>"P","label"=>false,"size"=>"1")); ?></td>
					<td><?php echo $this->Form->input("attend_1",array("type"=>"text","value"=>"P","label"=>false,"size"=>"1")); ?></td>
					<td><?php echo $this->Form->input("attend_1",array("type"=>"text","value"=>"P","label"=>false,"size"=>"1")); ?></td>
					<td><?php echo $this->Form->input("attend_1",array("type"=>"text","value"=>"P","label"=>false,"size"=>"1")); ?></td>
					<td><?php echo $this->Form->input("attend_1",array("type"=>"text","value"=>"P","label"=>false,"size"=>"1")); ?></td>
					<td><?php echo $this->Form->input("attend_1",array("type"=>"text","value"=>"P","label"=>false,"size"=>"1")); ?></td>
					<td><?php echo $this->Form->input("attend_1",array("type"=>"text","value"=>"P","label"=>false,"size"=>"1")); ?></td>
					<td><?php echo $this->Form->input("attend_1",array("type"=>"text","value"=>"P","label"=>false,"size"=>"1")); ?></td>
					<td><?php echo $this->Form->input("attend_1",array("type"=>"text","value"=>"P","label"=>false,"size"=>"1")); ?></td>
				</tr>
				
				<tr height="40">
					<td>1234</td>
					<td>Kruthi</td>
					<td><?php echo $this->Form->input("attend_1",array("type"=>"text","value"=>"P","label"=>false,"size"=>"1")); ?></td>
					<td><?php echo $this->Form->input("attend_1",array("type"=>"text","value"=>"P","label"=>false,"size"=>"1")); ?></td>
					<td><?php echo $this->Form->input("attend_1",array("type"=>"text","value"=>"P","label"=>false,"size"=>"1")); ?></td>
					<td><?php echo $this->Form->input("attend_1",array("type"=>"text","value"=>"P","label"=>false,"size"=>"1")); ?></td>
					<td><?php echo $this->Form->input("attend_1",array("type"=>"text","value"=>"P","label"=>false,"size"=>"1")); ?></td>
					<td><?php echo $this->Form->input("attend_1",array("type"=>"text","value"=>"P","label"=>false,"size"=>"1")); ?></td>
					<td><?php echo $this->Form->input("attend_1",array("type"=>"text","value"=>"P","label"=>false,"size"=>"1")); ?></td>
					<td><?php echo $this->Form->input("attend_1",array("type"=>"text","value"=>"P","label"=>false,"size"=>"1")); ?></td>
					<td><?php echo $this->Form->input("attend_1",array("type"=>"text","value"=>"P","label"=>false,"size"=>"1")); ?></td>
					<td><?php echo $this->Form->input("attend_1",array("type"=>"text","value"=>"P","label"=>false,"size"=>"1")); ?></td>
					<td><?php echo $this->Form->input("attend_1",array("type"=>"text","value"=>"P","label"=>false,"size"=>"1")); ?></td>
					<td><?php echo $this->Form->input("attend_1",array("type"=>"text","value"=>"P","label"=>false,"size"=>"1")); ?></td>
					<td><?php echo $this->Form->input("attend_1",array("type"=>"text","value"=>"P","label"=>false,"size"=>"1")); ?></td>
					<td><?php echo $this->Form->input("attend_1",array("type"=>"text","value"=>"P","label"=>false,"size"=>"1")); ?></td>
					<td><?php echo $this->Form->input("attend_1",array("type"=>"text","value"=>"P","label"=>false,"size"=>"1")); ?></td>
					<td><?php echo $this->Form->input("attend_1",array("type"=>"text","value"=>"P","label"=>false,"size"=>"1")); ?></td>
					<td><?php echo $this->Form->input("attend_1",array("type"=>"text","value"=>"P","label"=>false,"size"=>"1")); ?></td>
					<td><?php echo $this->Form->input("attend_1",array("type"=>"text","value"=>"P","label"=>false,"size"=>"1")); ?></td>
					<td><?php echo $this->Form->input("attend_1",array("type"=>"text","value"=>"P","label"=>false,"size"=>"1")); ?></td>
					<td><?php echo $this->Form->input("attend_1",array("type"=>"text","value"=>"P","label"=>false,"size"=>"1")); ?></td>
					<td><?php echo $this->Form->input("attend_1",array("type"=>"text","value"=>"P","label"=>false,"size"=>"1")); ?></td>
					<td><?php echo $this->Form->input("attend_1",array("type"=>"text","value"=>"P","label"=>false,"size"=>"1")); ?></td>
					<td><?php echo $this->Form->input("attend_1",array("type"=>"text","value"=>"P","label"=>false,"size"=>"1")); ?></td>
					<td><?php echo $this->Form->input("attend_1",array("type"=>"text","value"=>"P","label"=>false,"size"=>"1")); ?></td>
					<td><?php echo $this->Form->input("attend_1",array("type"=>"text","value"=>"P","label"=>false,"size"=>"1")); ?></td>
					<td><?php echo $this->Form->input("attend_1",array("type"=>"text","value"=>"P","label"=>false,"size"=>"1")); ?></td>
					<td><?php echo $this->Form->input("attend_1",array("type"=>"text","value"=>"P","label"=>false,"size"=>"1")); ?></td>
					<td><?php echo $this->Form->input("attend_1",array("type"=>"text","value"=>"P","label"=>false,"size"=>"1")); ?></td>
					<td><?php echo $this->Form->input("attend_1",array("type"=>"text","value"=>"P","label"=>false,"size"=>"1")); ?></td>
					<td><?php echo $this->Form->input("attend_1",array("type"=>"text","value"=>"P","label"=>false,"size"=>"1")); ?></td>
					<td><?php echo $this->Form->input("attend_1",array("type"=>"text","value"=>"P","label"=>false,"size"=>"1")); ?></td>
				</tr>
				</tbody>
				</table>
			</div>
			</div>
			
        </div>
        
		<div class="modal-footer">
		<div class="row">
			<div class="col-md-1">P : Present</div>
			<div class="col-md-1">A : Absent</div>
			<div class="col-md-9"></div>
			<div class="col-md-1"></div>
		</div>
		
		<div class="row">
			<div class="col-md-1">S : Sunday</div>
			<div class="col-md-2" align="left">H : Holiday</div>
			<div class="col-md-8"></div>
			<div class="col-md-1"><button type="button" class="btn btn-default" data-dismiss="modal">Submit</button></div>
		</div>
         
        </div>
      </div>
	  </div>
	  </div>--->
	  <!-------------------------------------------------------------------------------------->
      
    </div>
  </div>				
				   <?php echo $this->Form->end(); ?>
				</div>
			</div>
        </div>
		</div>
	<!-------------------------------------------------------------------------->
		<div class="col-md-3"></div>
	  
	  </div>
      <!-- row -->
    
	</section>
    <!-- content -->
  </div>
  <!-- content-wrapper -->