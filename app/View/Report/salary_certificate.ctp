<style>
.timetabletd{
	width:90px;
	height:90px;
}
table-bordered>thead>tr>th, .table-bordered>tbody>tr>th,   .table-bordered>tbody>tr>td {
border: 1px solid #B9D9F0;
}
</style>
<div class="wrapper"> 
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
         <section class="content-header">
          <h1>
            Salary & Service Certificate.
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			 <li>Payroll Maintenance</li>
            <li class="active">Payroll Generation</li>
          </ol>
        </section>

        <!-- Main content -->
  	  <section class="content">
       <!------------" Payroll Generation" created: 20 aug 2016 ----------->
		  
			<div class="row">
				<div class="col-md-3"></div>
					<div class="col-md-6">
					  <div class="box box-success"> 
						 
						<!-- form start -->
					   <?php echo $this->Form->create('StaffPayroll',array("url"=>array("controller"=>"Report","action"=>"salaryCertificate")));?>
					   
						  <div class="box-body">
							<div class="form-group"> 
								<div class="row">
									<div class="col-sm-4"><label>Staff Name</label></div>
									<div class="col-sm-6"> 
										 <?php
										  echo $this->Form->input('staff_detail_id',array("type"=>"select","class"=>"form-control select_box","required","label"=>false,"options"=>$emp_list,'empty'=>"Select Employee","required"));?> 
									 </div>
									<div class="col-sm-2">&nbsp;</div>
								</div>
							</div>
							<div class="form-group"> 
								<div class="row">
									<div class="col-sm-4"><label>Academic Year</label></div>
									<div class="col-sm-6"> 
										<?php echo $this->Form->input("academic_year_id",array("type"=>"select","options"=>$academic_year_array,"label"=>false,"class"=>"form-control select_box","required","empty"=>"select"));?>		
									</div>
									<div class="col-sm-2">&nbsp;</div>
								</div>
							</div> 
							<div class="form-group"> 
								<div class="row">
									<div class="col-sm-4"><label>Month</label></div>
									<div class="col-sm-6">  
											<?php $month = array('1'=>'January','2'=>'Febrauary','3'=>'March','4'=>'April',
									'5'=>'May','6'=>'June','7'=>'July','8'=>'August','9'=>'September','10'=>'October','11'=>'November','12'=>'December');?> 
											<?php echo $this->Form->input("month",array("type"=>"select","options"=>$month,"label"=>false,"class"=>"form-control select_box","required","empty"=>"select"));?>		  
										</div>
										<div class="col-sm-2">&nbsp;</div>
								</div>
							</div>
							 
								<div class="row">
									<div class="col-sm-4"></div>
									<div class="col-sm-4"><?php echo $this->Form->submit('Get List',array("class"=>"btn btn-info","name"=>"show_btn"));?></div>
									<div class="col-sm-4"></div>
							   </div>
							 
						  </div>
						<?php echo $this->Form->end();?>
						<!---- form end ------>
						<?php echo $this->Session->flash();?>
					</div>
					</div>
				<div class="col-md-3"></div>
			</div>
			<!-- row -->
			
			<?php if(isset($_POST['show_btn'])!='')	{
					if(!empty($salary_certificate))	{
				$staff_detail_id = $this->request->data['StaffPayroll']['staff_detail_id'];
				$month =  $this->request->data['StaffPayroll']['month'] ;
				$academic_year_id = $this->request->data['StaffPayroll']['academic_year_id'];
		 
			?>
			<div class="row" >
		   <div class="col-sm-10">&nbsp;</div>
		   <div class="col-sm-1">
			<?php echo $this->Html->link('<i class="fa fa-print fa-2x" ></i>',
											array("controller"=>"Report","action"=>"salaryCertificatePrint",$staff_detail_id,$month,$academic_year_id),
											array("escape"=>false,"target"=>"_blank","title"=>"Take a print")); ?></div>
											<div class="col-sm-2">&nbsp;</div>
		</div>
 
	 <div class="row" >
	   <div class="col-sm-2">&nbsp;</div><div class="col-sm-9 background">
        <!-- left column --> 
		<table width="90%" border="0" style="font-size:90.0%;">
		  <tr>
			<td colspan="2" rowspan="18" align="center" valign="top"></td>
			<td colspan="5" align="center">&nbsp;</td>
			</tr>
		  <tr>
			<td colspan="5" align="center">&nbsp;</td>
		  </tr>
		  <tr>
			<td colspan="5" align="center" style="font-size:18px">&nbsp;</td>
			</tr>
		  <tr>
			<td colspan="5" align="center">&nbsp;</td>
			</tr>
		  <tr>
			<td colspan="5" align="center"></td>
			</tr>
		  <tr>
			<td align="center">&nbsp;</td>
			<td align="center">&nbsp;</td>
			<td align="right">&nbsp;</td>
			<td>&nbsp;</td>
			<td align="center">&nbsp;</td>
		  </tr>
		  <tr>
			<td align="center">&nbsp;</td>
			<td align="center">&nbsp;</td>
			<td align="right">&nbsp;</td>
			<td>&nbsp;</td>
			<td align="center">&nbsp;</td>
		  </tr>
		  <tr>
			<td align="center">&nbsp;</td>
			<td align="center">&nbsp;</td>
			<td align="right">&nbsp;</td>
			<td>&nbsp;</td>
			<td align="center">&nbsp;</td>
		  </tr>
		  <tr>
			<td align="center">&nbsp;</td>
			<td align="center">&nbsp;</td>
			<td align="right">&nbsp;</td>
			<td>&nbsp;</td>
			<td align="center">&nbsp;</td>
		  </tr>
		  <tr>
			<td align="center">&nbsp;</td>
			<td align="center">&nbsp;</td>
			<td align="right">&nbsp;</td>
			<td>&nbsp;</td>
			<td align="center">&nbsp;</td>
		  </tr>
		  <tr>
			<td align="center">&nbsp;</td>
			<td align="center">&nbsp;</td>
			<td align="right">&nbsp;</td>
			<td>&nbsp;</td>
			<td align="center">&nbsp;</td>
		  </tr>
		 
		   
		  <tr>
			<td align="center">&nbsp;</td>
			<td align="center">&nbsp;</td>
			<td align="right">&nbsp;</td>
			<td>&nbsp;</td>
			<td align="center">&nbsp;</td>
		  </tr>
		  <tr>
			<td align="center">&nbsp;</td>
			<td align="center">&nbsp;</td>
			<td align="right">&nbsp;</td>
			<td>&nbsp;</td>
			<td align="center">&nbsp;</td>
		  </tr>
		  <tr>
			<td align="center">&nbsp;</td>
			<td align="center">&nbsp;</td>
			<td align="right">&nbsp;</td>
			<td>&nbsp;</td>
			<td align="center">&nbsp;</td>
		  </tr>
		  <tr>
			<td align="center">&nbsp;</td>
			<td align="center">&nbsp;</td>
			<td align="right"></td>
			<td>&nbsp;</td>
			<td align="center">&nbsp;</td>
		  </tr>
		  <tr>
			<td width="21%" align="center">&nbsp;</td>
			<td width="21%" align="center">&nbsp;</td> 
			<td width="21%" align="center">&nbsp;</td> 
			<td width="21%" align="right"><strong>Date: <?php echo date('d-m-Y');?> </strong></td> 
			<td  align="right"></td>
			 
		  </tr>
		</table>
		<table width="90%" border="0" align="center">  
		   <tr>
			<td>&nbsp;</td>
			<td width="14%">&nbsp;</td>
			<td colspan="2">&nbsp;</td>
			<td colspan="3">&nbsp;</td>
			<td>&nbsp;</td>
		  </tr>
		  <?php
			$status="";
			$gender = $salary_certificate['StaffDetail']['gender'];	
			if($gender=="Male")
			{
				$status = "He";
			}
			else
			{
				$status = "She";
			}
			$total_pay =  $salary_certificate['StaffPayroll']['basic_salary'];
			// attendance incenive
			$attendance_bonus=0;
			$no_of_leave = $salary_certificate['StaffPayroll']['cl'] + $salary_certificate['StaffPayroll']['el'];
						
			if($no_of_leave==0)
			{
				$attendance_bonus=300;
			}
			else if($no_of_leave>0 && $no_of_leave<2)
			{
				 
				$attendance_bonus=200;
			} 
			else if($no_of_leave>=2 && $no_of_leave<3)
			{
				$attendance_bonus=100;
			}
			
			else if($no_of_leave>=3)
			{
				$attendance_bonus=0;
			}
			 
		  ?>
		  <tr>
			<td>&nbsp;</td>
			<td colspan="6" style="font-size:20px;font-style:italic;">&nbsp;</td>
			<td>&nbsp;</td>
		  </tr>
		  <tr>
			<td>&nbsp;</td>
			<td colspan="6" style="font-size:16px;font-style:italic;">This is to certify that <strong><?php echo $salary_certificate['StaffDetail']['first_name'];?></strong> is working in our institution as <?php echo $staff_designation;?>. <?php echo $status;?> is working since <?php echo date('M-Y',strtotime($salary_certificate['StaffDetail']['doj']));?>. </td>
			<td>&nbsp;</td>
		  </tr>
		  <tr>
			<td>&nbsp;</td>
			<td colspan="6" style="font-size:20px;font-style:italic;">&nbsp;</td>
			<td>&nbsp;</td>
		  </tr>
		  <tr>
			<td>&nbsp;</td>
			<td colspan="6" style="font-size:20px;font-style:italic;"><strong>Earnings</strong></td>
			<td>&nbsp;</td>
		  </tr>
		  <tr>
			<td>&nbsp;</td>
			<td>Basic Salary : </td>
			<td></td>
			<td></td>
			<td></td>
			<td align="right"><?php echo $salary_certificate['StaffPayroll']['basic_salary'];?></td>
		  </tr>
		  <tr> 
			<td></td>
			<td colspan="4">Attendance Incentive : </td>  
			<td align="right"><?php echo $attendance_bonus;?></td>
		  </tr>
		<?php 
			$earning_amount_amount = 0;
			foreach($salary_certificate['StaffPayrollDetail'] as $ecomponent):
			if($ecomponent['component_type']=="Earnings"): 
			$earning_amount_amount = $earning_amount_amount + $ecomponent['amount_pre'];
			?>
		  <tr>
			<td>&nbsp;</td>
			<td><?php echo $ecomponent['component_name'];?> </td>
			<td></td>
			<td></td>
			<td></td>
			<td align="right"><?php echo $ecomponent['amount_pre'];?> </td>
		  </tr>
		<?php 	endif; endforeach;
		$gross_salary = 0;
		
		$gross_salary = $salary_certificate['StaffPayroll']['basic_salary'] + $earning_amount_amount + $attendance_bonus;
		
		?>
		
		<tr> 
			<td colspan="3" align="right"><strong>Gross Salary</strong></td>
			<td></td>
			<td></td>
			<td align="right"><strong><?php echo $gross_salary;?></strong></td>
		</tr>
		  <tr>
			<td>&nbsp;</td>
			<td colspan="6" style="font-size:20px;font-style:italic;">&nbsp;</td>
			<td>&nbsp;</td>
		  </tr>
		   <tr>
			<td>&nbsp;</td>
			<td colspan="6" style="font-size:20px;font-style:italic;"><strong>Deduction</strong></td>
			<td>&nbsp;</td>
		  </tr>
		  <?php 
				$esi_amount_total = 0;
				$pf_amount_1 = 0;
				$pt_amount = 0;
				foreach($salary_certificate['StaffPayrollDetail'] as $dcomponent):
				if($dcomponent['component_type']=="Deduction"): 
				if($dcomponent['component_name']=="ESI" || $dcomponent['component_name']=="esi")
				{
					if($total_pay<15000)
					{
					 
						//$esi_amount =  $gross_salary*(float)$dcomponent['amount_pre'];
						$esi_amount =  $list['StaffPayroll']['gross_salary']*(float)$dcomponent['amount_pre'];
						$esi_amount_total = ceil($esi_amount_total + $esi_amount / 100);
						 
					}
				}
				//for PF 
				if($dcomponent['component_name']=="PF")
				{	
					$pf_amount = $total_pay *  $dcomponent['amount_pre']; 
					$pf_amount_1 = $pf_amount / 100; 
				}
				
				if($dcomponent['component_name']=="PT" || $dcomponent['component_name']=="pt")
				{
					if($gross_salary>15000)
					{
						$pt_amount = $dcomponent['amount_pre']; 
					} 
				} 
				endif; endforeach;?>
				
			  <tr>
				<td>&nbsp;</td>
				<td><?php echo "ESI @ 1.75% :";?> </td>
				<td></td>
				<td></td>
				<td></td>
				<td align="right"><?php echo $esi_amount_total;?> </td>
			  </tr>
			   <tr>
				<td>&nbsp;</td>
				<td><?php echo "PF @ 12% :";?> </td>
				<td></td>
				<td></td>
				<td></td>
				<td align="right"><?php echo $pf_amount_1;?> </td>
			  </tr>
			  <tr>
				<td>&nbsp;</td>
				<td><?php echo "PT :";?> </td>
				<td></td>
				<td></td>
				<td></td>
				<td align="right"><?php echo $pt_amount;?> </td>
			  </tr>
			  <?php 
			  $total_dedution_ = 0;
			  foreach($salary_certificate['StaffPayrollDetail'] as $dcomponent){
				if($dcomponent['component_type']=="Deduction"){
					if(($dcomponent['component_name']!="PF") && ($dcomponent['component_name']!="ESI") && ($dcomponent['component_name']!="PT")){
						$total_dedution_ = $total_dedution_ + $dcomponent['amount_pre'];
					?>
					 <tr>
						<td>&nbsp;</td>
						<td width="20%"><?php echo $dcomponent['component_name'];?> :</td>
						<td></td>
						<td></td>
						<td></td>
						<td align="right"><?php echo $dcomponent['amount_pre'];?> </td>
					  </tr>
					<?php 
						}
					} 
				}
			
			$sub_total = $total_dedution_ + $pt_amount + $pf_amount_1 + $esi_amount_total;
			$net_pay = $gross_salary - $sub_total;
			?> 
		<tr> 
			<td colspan="3" align="right"><strong>Sub Total</strong></td>
			<td></td>
			<td></td>
			<td align="right"><strong><?php echo $sub_total;?></strong></td>
		</tr>
		   <tr> 
			<td colspan="3" align="right"><strong>Net Pay</strong></td>
			<td></td>
			<td></td>
			<td align="right"><strong><?php echo $net_pay;?></strong></td>
		</tr>
		  <tr>
			<td>&nbsp;</td>
			<td align="right" style="font-size:20px;font-style:italic;"></td>
			<td width="1%" align="right" style="font-size:20px;font-style:italic;">&nbsp;</td>
			<td width="1%" align="right" style="font-size:20px;font-style:italic;">&nbsp;</td>
			<td width="1%" align="right" style="font-size:20px;font-style:italic;">&nbsp;</td>
			<td width="57%" align="right" style="font-size:20px;font-style:italic;">&nbsp;</td>
			<td width="11%" align="right" style="font-size:20px;font-style:italic;">&nbsp;</td>
			<td>&nbsp;</td>
		  </tr>
		  <tr>
			<td>&nbsp;</td>
			<td colspan="6" style="font-size:20px;font-style:italic;"></td>
			<td>&nbsp;</td>
		  </tr>
		  <tr>
			<td>&nbsp;</td>
			<td colspan="6" style="font-size:20px;font-style:italic;">&nbsp;</td>
			<td>&nbsp;</td>
		  </tr>
		  <tr>
			<td>&nbsp;</td>
			<td colspan="6" style="font-size:20px;font-style:italic;"> </td>
			<td>&nbsp;</td>
		  </tr>
		  <tr>
			<td>&nbsp;</td>
			<td colspan="6" style="font-size:20px;font-style:italic;">&nbsp;</td>
			<td>&nbsp;</td>
		  </tr>
		  <tr>
			<td>&nbsp;</td>
			<td colspan="6" align="center" style="font-size:20px;font-style:italic;">&nbsp;</td>
			<td>&nbsp;</td>
		  </tr>
		  <tr>
			<td>&nbsp;</td>
			<td colspan="6" align="center" style="font-size:20px;font-style:italic;"> 
			  <span class="style1"> </span>   </td>
			<td>&nbsp;</td>
		  </tr>
		  <tr>
			<td>&nbsp;</td>
			<td colspan="6" align="center" style="font-size:20px;font-style:italic;">&nbsp;</td>
			<td>&nbsp;</td>
		  </tr>
		  <tr>
			<td>&nbsp;</td>
			<td colspan="6" style="font-size:20px;font-style:italic;">&nbsp;</td>
			<td>&nbsp;</td>
		  </tr>
		  <tr>
			<td colspan="8" align="center">&nbsp;</td>
			</tr>
		</table>
		</div>
			 <div class="col-md-2">&nbsp;</div>     
			</div>	 
		   
			  <!-- row -->
			<?php }
		
		else
		{
			?>
				<div class="row">
					<div class="col-md-3"></div>
						<div class="col-md-6">	<div class='alert alert-info fade in' style='height:50px'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>No Record Found</div>
						</div>
			<?php 
		}
		}
		?>
			
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
	</div> <!-- wrapper -->
	
	
	<style> 
	.background
	{
 		background:url('../img/salarycertificate.jpg') no-repeat !important; 
		background-size:800px 850px !important 
		/*width:800px;
		height:900px;
		margin-top:80px;background-position:center;*/
    }  
</style>