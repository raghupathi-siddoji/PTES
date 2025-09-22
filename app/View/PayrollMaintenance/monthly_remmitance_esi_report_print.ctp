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
					  <center><h3 class="box-title">Remmitance of ESI Contribution month of <?php echo  $monthName = date("F", mktime(0, 0, 0, $month));?></h3></center>
 
					  
						<table width="100%" border="1" style="border-collapse:collapse;font-size:85.0%" onclick="print();">
						  <tr>
							<th width="1%">Sl.No</th>
							<th width="8%">Staff Name </th>
							<th width="4%">Insured Person #.</th>
							<th width="4%">Total Amount of Wages</th>
							<th width="4%">ESI by staff</th>
							<th width="4%">ESI by Employer</th> 
						  </tr>
						  <?php 
						  $i=1; 
						  $gross_salary=0; 
						  $total_gross_pay=0; 
						  $esi_by_satff = 0;
						  $total_esi_staff = 0;
						  $esi_by_employer = 0;
						  $total_esi_employer =0;
						   if(!empty($monthly_payroll_list)){
						  foreach($monthly_payroll_list as $list):
							 //for total pay
								$gross_salary = $list['StaffPayroll']['gross_salary'];// + $special_inc;
								$total_gross_pay = $total_gross_pay + $gross_salary;
								
								$esi_by_satff = $gross_salary * 1.75 /100;
								$total_esi_staff = $total_esi_staff + $esi_by_satff;
								
								$esi_by_employer = $gross_salary * 4.75 /100;
								$total_esi_employer = $total_esi_employer + $esi_by_employer;
							?>
							  <tr>
								<td><?php echo $i++;?></td>
								<td><?php echo $list['StaffDetail']['first_name'];?></td>
								<td><?php echo $list['StaffDetail']['esi_no'];?></td>
								<td><?php echo $gross_salary;?> </td>
								<td><?php echo ceil($esi_by_satff);?></td>
								<td><?php echo ceil($esi_by_employer);?></td> 
							  </tr>
							<?php  
						  endforeach;?>
							<tr>
								<th colspan="3" align="right"> TOTAL</th> 
								<th><?php echo $total_gross_pay;?></th>
								<th><?php echo ceil($total_esi_staff);?></th>
								<th><?php echo ceil($total_esi_employer) ;?></th>
								 
							</tr>
						<?php
						 } // IF ConDITION FOR EMPTY OR NOT
						 else
						 {
							echo "<tr><td colspan='6'><center>NO RECORD FOUND...</center></td></tr>";
						 }
						?>
						</table>
													</body>
</html>	
		
						 
					  