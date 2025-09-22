
<html>
<head>

</head>

<body onload="print();" onfocus="window.close()"><style>
.timetabletd{
	width:90px;
	height:90px;
}
table-bordered>thead>tr>th, .table-bordered>tbody>tr>th,   .table-bordered>tbody>tr>td {
border: 1px solid #B9D9F0;
}
</style>
 
			
		 
			
		<div class="background">
        <!-- left column --> 
		 <table width="800px" border="0"  border="1" style="border-collapse:collapse;font-size:90.0%;"  >
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
		<table width="800px"  border="0" style="border-collapse:collapse;font-size:90.0%;margin-left:40px">  
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
			<td colspan="3" align="right"> </td>
			<td></td>
			<td></td>
			<td align="right"><strong> </td>
		</tr>
		<tr> 
			<td colspan="3" align="right"><strong>Sub Total</strong></td>
			<td></td>
			<td></td>
			<td align="right"><strong><?php echo $sub_total;?></strong></td>
		</tr>
		 <tr> 
			<td colspan="3" align="right"> </td>
			<td></td>
			<td></td>
			<td align="right"><strong> </td>
		</tr><br>
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
			</tr><tr>
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
			</tr><tr>
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
			</tr><tr>
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
			</tr><tr>
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
			</tr><tr>
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
			</tr><tr>
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
			</tr><tr>
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
			</tr><tr>
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
 </body>

</html>
	<style> 
	.background
	{
 		background:url('../../../../img/salarycertificate.jpg') no-repeat !important; 
		background-size:810px 955px !important;
	 
		margin-top:60px !important;
		
		/*width:800px;
		height:900px;
		margin-top:80px;background-position:center;*/
    }  
	
	@media print {
    .page {
        margin: 0.81;
        border: initial;
        border-radius: initial;
        width: initial;
        min-height: initial;
        box-shadow: initial;
        background: initial;
        page-break-after: always;
    } 
</style>