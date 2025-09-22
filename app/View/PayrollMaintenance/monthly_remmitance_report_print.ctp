  <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<style>
.main_heading
{
	font-size:1.5em;
}
.sub_heading
{
	font-size:1.2em;
}
.heading
{
	background:#000;
	color:#fff;
	padding:10px;
}
</style>
</head>

<body onload="print();" onfocus="window.close()">
		<?php $ay = $monthly_payroll_list[0]['StaffPayroll']['academic_year_id'];
			$month = $monthly_payroll_list[0]['StaffPayroll']['month']; ?>
		
	   
	    
					  <center><h3>Remmitance List for the month of <?php echo  $monthName = date("F", mktime(0, 0, 0, $month));?></h3></center>
					 
						<table width="100%" border="1" style="border-collapse:collapse;font-size:85.0%" onclick="print();"> 
						  <tr>
							<th width="1%">Sl.No</th>
							<th width="8%">Staff Name </th>
							<th width="4%">A/c.</th>
							<th width="4%">Total Amount of Wages</th>
							<th width="4%">PF@12%</th>
							<th width="4%">EPS@8.33</th>
							<th width="4%">EPS@3.67</th> 
						  </tr>
						  <?php 
						  $i=1; 
						  $total_pay=0; 
						  $total_basic_pay=0; 
						  $total_eps_367 = 0;
						  $total_eps_833 = 0;
						  $total_pf = 0;
						  $pf_12 =0;
						   if(!empty($monthly_payroll_list)){
						  foreach($monthly_payroll_list as $list):
							 //for total pay
								$total_pay = $list['StaffPayroll']['basic_salary'];// + $special_inc;
								$total_basic_pay = $total_basic_pay + $total_pay;
								
								$pf_12 = ceil($total_pay * 12 /100);
								$total_pf = $total_pf + $pf_12;
								
								$eps_833 =  ceil($pf_12 * 8.33 / 100);
								$total_eps_833 = $total_eps_833 + $eps_833;
								
								$eps_367 =  ceil($pf_12 * 3.67 / 100);
								$total_eps_367 = $total_eps_367 + $eps_367;
							?>
							  <tr align="right">
								<td><?php echo $i++;?></td>
								<td><?php echo $list['StaffDetail']['first_name'];?></td>
								<td><?php echo $list['StaffDetail']['pf_account'];?></td>
								<td><?php echo $total_pay;?></td>
								<td><?php echo $pf_12;?></td>
								<td><?php echo ceil($eps_833);?></td>
								<td><?php echo  ceil($eps_367);?></td> 
							  </tr>
							<?php  
						  endforeach;
						 $total_employer_contribution =  ceil($total_eps_833) + ceil($total_eps_367);
						 $administrative_charges = ceil($total_basic_pay) * 1.61 / 100;
						  ?>
							 <tr align="right" style="font-weight:bold">
								<td colspan="3"> TOTAL</td> 
								<td><?php echo $total_basic_pay;?></td>
								<td><?php echo $total_pf;?></td>
								<td><?php echo ceil($total_eps_833) ;?></td>
								<td><?php echo ceil($total_eps_367) ;?></td> 
							</tr>
						  
						</table><br>
						<table width="100%" border="0" style="font-weight:600">
							<tr>
								<td width="4%">1</td>
								<td colspan="2">PF (Staff Contribution) </td>
								<td width="2%" align="center">:</td>
								<td width="2%" align="right"><?php echo $total_pf;?></td>
								<td width="57%">&nbsp;</td>
							</tr>
							  <tr>
								<td>2</td>
								<td colspan="2">Employer Contribution </td>
								<td align="center">:</td>
								<td align="right"><?php echo $total_employer_contribution;?></td>
								<td>&nbsp;</td>
							  </tr>
							   <tr>
								<td>&nbsp;</td>
								<td>a)</td>
								<td>EPS : <?php echo ceil($total_eps_833) ;?> </td>
								<td align="center">&nbsp;</td>
								<td align="right"> </td>
								<td>&nbsp;</td>
							  </tr>
							<tr>
								<td>&nbsp;</td>
							<td width="2%">b)</td>
							<td width="33%">EPF : <?php echo ceil($total_eps_367) ;?> </td>
							<td align="center">&nbsp;</td>
							<td align="right"> </td>
							<td>&nbsp;</td>
						  </tr>
						  <tr>
							<td>3</td>
							<td colspan="2">Administrative Charges </td>
							<td align="center">:</td>
							<td align="right"><?php echo ceil($administrative_charges); ?></td>
							<td>&nbsp;</td>
						  </tr>
						  <tr>
							<td>&nbsp;</td>
							<td colspan="2">&nbsp;</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
						  </tr>
						</table>
						<?php
						   } // IF ConDITION FOR EMPTY OR NOT
						   
						 else
						 {
							echo "<tr><td colspan='7'><center>NO RECORD FOUND...</center></td></tr>";
						 }
						  ?> 
						
							</body>
</html>	
						 
					   