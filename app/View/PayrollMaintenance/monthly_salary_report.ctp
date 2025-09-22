<?php  //print_r($monthly_payroll_list);?>
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
            Payroll Maintenance
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			 <li>Payroll Maintenance</li>
            <li class="active">Payroll Generation</li>
          </ol>
        </section>

        <!-- Main content -->
  	  <section class="content">
	  <div class="row" >
		<?php $ay = $monthly_payroll_list[0]['StaffPayroll']['academic_year_id'];
			$month = $monthly_payroll_list[0]['StaffPayroll']['month']; ?>
		
	   <div class="col-sm-11">&nbsp;</div>
	   <div class="col-sm-1">
			<?php echo $this->Html->link('<i class="fa fa-print" ></i>',
											array("controller"=>"PayrollMaintenance","action"=>"monthlySalaryReportPrint", $ay,$month),
											array("escape"=>false,"target"=>"_blank")); ?></td>
		</div>
		 
	</div>
       <!------------" Payroll Generation" created: 20 aug 2016 ----------->
		  
			 <div class="row">
				 
				<div class="col-md-12">
				  <div class="box box-success"> 
					<div class="box-header with-border">
					  <h3 class="box-title">Salary List for the month of <?php echo  $monthName = date("F", mktime(0, 0, 0, $month));?></h3>
					</div>
					 
					  <div class="box-body"> 
						<table width="100%" border="1" style="border-collapse:collapse;font-size:90.0%"> 
						  <tr style="font-size:85.0%">
							<th width="2%">Sl.No</th>
							<th width="8%">Staff Name </th>
							<th width="3%">Atdnc</th>
							<th width="3%">CL</th>
							<th width="3%">EL</th>
							<th width="3%">Ab</th>
							<th width="4%">LWA</th>
							<th width="4%">Designation</th>
							<th width="4%">Basic Pay </th>
							<th width="4%">Specl In</th>
							<th width="4%">HRA</th>
							<th width="4%">AI</th>
							<th width="4%">Gross Salary </th>
							<th width="4%">P.F</th>
							<th width="4%">ESI</th>
							<th width="4%">P.T</th>
							<th width="4%">L.I.C</th>
							<th width="4%">Fest adv </th>
							<th width="4%">Edu adv </th>
							<th width="4%">HR</th>
							<th width="4%">Other Rev </th>
							<th width="4%">Tot Revry</th>
							<th width="4%">Net salary </th>
						  </tr>
						  <tr style="font-size:85.0%;text-align:center">
							<th width="2%"></th>
							<th width="8%">1</th>
							<th width="3%">2</th>
							<th width="3%">3</th>
							<th width="3%">4</th>
							<th width="3%">5</th>
							<th width="4%">6</th>
							<th width="4%">7</th>
							<th width="4%">8</th>
							<th width="4%">9</th>
							<th width="4%">10</th>
							<th width="4%">11</th>
							<th width="4%">12=8 to 11-6</th>
							<th width="4%">13</th>
							<th width="4%">14</th>
							<th width="4%">15</th>
							<th width="4%">16</th>
							<th width="4%">17</th>
							<th width="4%">18 </th>
							<th width="4%">19</th>
							<th width="4%">20 </th>
							<th width="2%">21=13 to 20</th>
							<th width="4%">22 = 12-21 </th>
						  </tr>
						  <?php 
						  $i=1;
						  $special_inc=0;
						  $hra_amt = 0;
						  $total_pay=0;
						  $attendance_bonus=0;
						  $gross_salary=0;
						  $pf_amount_1 = 0;
						  $pf_amount = 0;
						  $esi_amount_total = 0;
						  $esi_amount = 0;
						  $pt_amount=0;
						  $lic_amount = 0;
						  $festival_advance = 0;
						  $education_advance = 0;
						  $hr_amount = 0;
						  $other_recovery =0;
						  $total_recovery = 0;
						  $no_of_leave = 0;
						  $year_cl_tot_count = 0;
						  $year_el_tot_count = 0;
						  $lwa = 0;
						  $total_lwa = 0;
						  $present_days =0;
						  $total_net_pay = 0;
						  $total_lic_amount = 0;
						  $total_hr_amount = 0;
						  $total_pt_amount =0;
						  $total_gross_salary=0;
						  $total_basic_pay = 0;
						  $total_special_inc=0;
						  $total_hra_amt = 0;
						  $total_attendance_bonus =0;
						  $total_pf_amount_1=0;
						  $total_esi_amount_total=0;
						  $total_pt_amount = 0;
							$total_lic_amount =0;
							$total_festival_advance=0;
							$total_education_advance=0;
							$total_hr_amount =0;
							$total_other_recovery = 0;
							$total_overall_recovery=0;
						  
						  
						  if(!empty($monthly_payroll_list)){
						  foreach($monthly_payroll_list as $list):
							//for total pay
									$total_pay = $list['StaffPayroll']['basic_salary'];// + $special_inc;
									$total_basic_pay = $total_basic_pay + $list['StaffPayroll']['basic_salary'];
									$total_net_pay += ceil($list['StaffPayroll']['net_salary']);
									$total_gross_salary+=$list['StaffPayroll']['gross_salary'];;
									
								foreach($list['StaffPayrollDetail'] as $component):
									if($component['component_name']=='Special Incentive'){
									$special_inc = $component['amount_pre'];
									$total_special_inc= $total_special_inc + $special_inc;	
									} 
									 
									
									
									//for HRA 
									if($component['component_type'] = "Earnings" && $component['component_name']=="HRA")
									{	
										if($list['StaffPayroll']['home_allocated']=="allocated")
										{
											 $hra_amt = $component['amount_pre']=0;
										}
										else {
										$hra_amt = $component['amount_pre'];
										$total_hra_amt+=$hra_amt;	
										}
									}
									
									//FOR Attendance BONUS
									
									$no_of_leave = $list['StaffPayroll']['cl'] + $list['StaffPayroll']['el'];
									$present_days1 = 30 -  $no_of_leave; 
									$present_days = $present_days1 - $list['StaffPayroll']['absent_day'];
									
									//$absent_count = $list['StaffPayroll']['absent_day'] * $total_pay;
									//$total_lwa = $list['StaffPayroll']['cl_lwa'] + $list['StaffPayroll']['el_lwa'] + $list['StaffPayroll']['ab_lwa'];
									
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
									else if($no_of_leave>3)
									{
										$attendance_bonus=0;
									}
									$total_attendance_bonus+=$attendance_bonus;
									//FOR Gross Salary
									 $gross_salary = $total_pay + $hra_amt + $attendance_bonus  + $special_inc;
									 $lwa = $list['StaffPayroll']['cl_lwa'] + $list['StaffPayroll']['el_lwa'] +  $list['StaffPayroll']['ab_lwa'];
									 $gross_salary = $gross_salary - $lwa;
									 
									/**********************
									** DEDUCAION PART    **
									**********************/
									//for PF 
									if($component['component_type'] = "Deduction" && $component['component_name']=="PF")
									{	
										$pf_amount = $total_pay *  $component['amount_pre']; 
										$pf_amount_1 = $pf_amount / 100;
										$total_pf_amount_1+=$pf_amount_1;
									}
									
									//for ESI HAVE TO CALCULATE ESI BASED ON GROSS SALARY AND EMP SALARY < 15,000
									if($component['component_type'] = "Deduction" && $component['component_name']=="ESI" || $component['component_name']=="esi")
									{
										if($total_pay<15000)
										{
										 
											//$esi_amount =  $gross_salary*(float)$component['amount_pre'];
											$esi_amount =  $list['StaffPayroll']['gross_salary']*(float)$component['amount_pre'];
											$esi_amount_total = ceil($esi_amount_total + $esi_amount / 100);
											$total_esi_amount_total+=$esi_amount_total;
										}
									}
									//for ESI HAVE TO CALCULATE ESI BASED ON GROSS SALARY AND EMP SALARY > 15,000
									if($component['component_type'] = "Deduction" && $component['component_name']=="PT" || $component['component_name']=="pt")
									{
										if($gross_salary>15000)
										{
											$pt_amount = $component['amount_pre'];
											$total_pt_amount = $total_pt_amount + $pt_amount;
										} 
									}
									//for ESI HAVE TO CALCULATE ESI BASED ON GROSS SALARY AND EMP SALARY > 15,000
									if($component['component_type'] = "Deduction" && $component['component_name']=="LIC" || $component['component_name']=="Lic")
									{ 
											$lic_amount = $component['amount_pre']; 
											$total_lic_amount= $total_lic_amount + $lic_amount;
									}
									//for ESI HAVE TO CALCULATE ESI BASED ON GROSS SALARY AND EMP SALARY > 15,000
									if($component['component_type'] = "Deduction" && $component['component_name']=="Festival Advance")
									{ 
											$festival_advance = $component['amount_pre']; 
											$total_festival_advance+=$festival_advance;
									}
									//for ESI HAVE TO CALCULATE ESI BASED ON GROSS SALARY AND EMP SALARY > 15,000
									if($component['component_type'] = "Deduction" && $component['component_name']=="Education Advance")
									{ 
											$education_advance = $component['amount_pre'];
											$total_education_advance+=$education_advance;
									}
									//for HR
									if($component['component_type'] = "Deduction" && $component['component_name']=="HR")
									{ 
											$hr_amount = $component['amount_pre']; 
											$total_hr_amount = $total_hr_amount + $hr_amount;
									}
									//for other recovery
									if($component['component_type'] = "Deduction" && $component['component_name']=="other recovery")
									{ 
											$other_recovery = $component['amount_pre'];
											$total_other_recovery+=$other_recovery;
									}
									$total_recovery = $other_recovery + $hr_amount + $education_advance + $festival_advance + $lic_amount + $pt_amount + $esi_amount_total + $pf_amount_1;
									
								endforeach;
								$total_overall_recovery+=$total_recovery;
								
								
								?>
								  <tr align="right">
									<td><?php echo $i++;?></td>
									<td><?php echo $list['StaffDetail']['first_name'];?></td>
									<td><?php echo $present_days;?></td>
									<td><?php echo $list['StaffPayroll']['cl'];?></td>
									<td><?php echo $list['StaffPayroll']['el'];?></td>
									<td><?php echo $list['StaffPayroll']['absent_day'];?></td>
									<td><?php echo ceil($lwa);?></td> 
									<td><?php echo $list['StaffDetail']['designation_id'];?></td>
									<td><?php echo $list['StaffPayroll']['basic_salary'];?></td>
									<td><?php echo $special_inc;?></td> 
									<td><?php echo $hra_amt;?></td>
									<td><?php echo $attendance_bonus;?></td>
									<td><?php echo $gross_salary;?></td>
									<td><?php echo $pf_amount_1;?></td>
									<td><?php echo $esi_amount_total;?></td>
									<td><?php echo $pt_amount;?></td>
									<td><?php echo $lic_amount;?></td>
									<td><?php echo $festival_advance;?> </td>
									<td><?php echo $education_advance;?> </td>
									<td><?php echo $hr_amount;?> </td>
									<td><?php echo $other_recovery;?> </td>
									<td><?php echo $total_recovery;?></td>
									<td><?php echo ceil($list['StaffPayroll']['net_salary']);?></td>
									 
								  </tr>
								 
								<?php 
							 
							$special_inc=0;	
							$total_pay=0;	
							$hr_amt=0;
							$attendance_bonus=0;
							$gross_salary=0;
							$pf_amount_1 = 0;
							$pf_amount = 0;
							$esi_amount_total = 0;
							$esi_amount = 0;
							$pt_amount=0;
							$lic_amount = 0;
							$festival_advance = 0;
							$education_advance = 0;
							$hr_amount = 0;
							$other_recovery =0;
							$total_recovery = 0;
							$no_of_leave = 0;
							$year_cl_tot_count = 0;
							$year_el_tot_count = 0;
							$lwa = 0;
							 $present_days =0;
							 $total_lwa = 0;
						  endforeach;
						  ?>
						  
						  <tr style="font-weight:bold;" align="right">
									<td> 1</td>
									<td> </td>
									<td> </td>
									<td> </td>
									<td> </td>
									<td> </td>
									 <td> </td>
									<td> </td>
									<td align="right"> <?php echo $total_basic_pay;?></td>
									<td align="right"> <?php echo $total_special_inc;?></td>
									<td align="right"> <?php echo $total_hra_amt;?></td>
									 <td align="right"> <?php echo $total_attendance_bonus;?></td>
									 <td align="right"> <?php echo $total_gross_salary;?></td>
									 <td align="right"> <?php echo $total_pf_amount_1;?></td>
									 <td align="right"> <?php echo $total_esi_amount_total;?></td>
									<td align="right"> <?php echo $total_pt_amount;?></td>
									<td align="right"> <?php echo $total_lic_amount;?></td>
									<td align="right"> <?php echo $total_festival_advance;?></td>
									<td align="right"> <?php echo $total_education_advance;?></td>
									<td align="right"> <?php echo $total_hr_amount;?></td>
									<td align="right"> <?php echo $total_other_recovery;?></td>
									<td align="right"> <?php echo $total_overall_recovery;?></td>
									<td>  <?php echo ceil($total_net_pay);?> </td>
									 
									 
								  </tr> 
						 <?php
						  
						  } // IF ConDITION FOR EMPTY OR NOT
						 else
						 {
							echo "<tr><td colspan='23'><center>NO RECORD FOUND...</center></td></tr>";
						 }
						  ?>
						  
						</table><br>
						<!-- total summary-->
						<table width="70%" border="1" style="border-collapse:collapse;font-size:90.0%">
						  <tr align="center">
							<td width="5%" align="left"><strong>Sl</strong></td>
							<td width="30%"><strong>Components</strong></td>
							<td width="20%"><strong>Amount</strong></td>
							<td width="15%"><strong>Voucher No </strong></td>
							<td width="15%"><strong>Cheque No </strong></td>
							<td width="25%"><strong>Dated</strong></td>
						  </tr>
						  <tr>
							<td>1</td>
							<td>NET PAY </td>
							<td align="right"><?php echo ceil($total_net_pay);?></td>
							<td align="right"></td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
						  </tr>
						  <tr>
							<td>2</td>
							<td>LIC PREMIUM </td>
							<td align="right"><?php echo ceil($total_lic_amount);?></td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
						  </tr>
						  <tr>
							<td>3</td>
							<td>HOUSE RENT &amp; LIGHT CHARGE </td>
							<td align="right"><?php echo ceil($total_hr_amount);?></td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
						  </tr>
						  <tr>
							<td>4</td>
							<td>PROFESSIONAL TAX </td>
							<td align="right"><?php echo ceil($total_pt_amount);?></td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
						  </tr>
						</table>
						<!-- total summary-->
					  </div>
					 
					 
				</div>
				</div>
				 
	  </div>
      <!-- row -->
	
				
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
	</div> <!-- wrapper -->
	
	<script>
function myFunction() {
 
    //var myWindow = window.open("monthly_salary_report_print", "MsgWindow", "width=700,height=600"); 
}
</script>