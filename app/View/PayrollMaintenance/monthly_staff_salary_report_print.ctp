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
		
	    
					  <center><h3 class="box-title">Staff Salary for the month of <?php echo  $monthName = date("F", mktime(0, 0, 0, $month));?></h3></center>
					 
						<table width="100%" border="1" style="border-collapse:collapse;font-size:85.0%" onclick="print();">
						  <tr>
							<th width="1%">Sl.No</th>
							<th width="8%">Staff Name </th>
							<th width="4%">A/c.</th>
							<th width="4%">Net Amount</th> 
						  </tr>
						  <?php 
						  $i=1; 
						  $total_pay=0; 
						  $total_basic_pay=0;  
						  
						  foreach($monthly_payroll_list as $list):
							 //for total pay
								$total_pay = $list['StaffPayroll']['net_salary'];// + $special_inc;
								$total_basic_pay = $total_basic_pay + $total_pay; 
								 
							?>
							  <tr>
								<td><?php echo $i++;?></td>
								<td><?php echo $list['StaffDetail']['first_name'];?></td>
								<td><?php echo $list['StaffDetail']['bank_account'];?></td>
								<td><?php echo $total_pay;?></td> 
							  </tr>
							<?php  
						  endforeach;?>
							<tr>
								<th colspan="3" align="right"> TOTAL</th>  
								<th><?php echo $total_basic_pay;?></th>
								 
							</tr>
						  
						</table>
	</body>
</html>	