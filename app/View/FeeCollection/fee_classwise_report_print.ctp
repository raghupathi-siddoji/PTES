  <html>
 <head>
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
<body >

				<table width="100%" border="1" id="main_table" style="border-collapse:collapse;" rules="groups" cellpadding="4px">
					  <tr>
					    <td width="18%" rowspan="3" align="center"><img src="../../../img/logo.jpg" width="80px"></td>
					    <td align="center">MPM EDUCATION SOCIETY</td>
					    <td align="center">&nbsp;</td>
  </tr>
					  <tr>
						<td align="center"><strong class="main_heading"> PAPER TOWN ENGLISH SCHOOL</h2>
						</strong></td>
					    <td align="center">&nbsp;</td>
					  </tr>
					  <tr> 
						 
						<td width="65%" align="center"><span class="sub_heading">Paper Town Bhadravathi - 577302. &nbsp;&nbsp;&nbsp;Off: 08282-270735</span></td>
					    <td width="17%" align="center">&nbsp;</td>
					  </tr>
					 <tr>  
						<td colspan="3" align="center"><b class="heading">   Class wise fee report </b></td> 
  </tr>
					  <tr>  
						<td colspan="3" align="center"> </td> 
					  </tr>
				</table>

				<br>
						<table width="100%" border="0" style=" font-size:80.0%;">
							<tr>  
								
								<td width="20%"><b>Academic year : </b></td> 
								<td width="10%"> <?php echo $academic_year;?></td> 
								<td width="10%"><b>Class :</b></td> 
								<td ><?php echo $class_name;?> </td> 
							</tr>
						</table>
						<!--DISPLAY START -->
							<center><h4>NON RTE STUDENTS FEE DETAILS</h4></center>
							<table width="100%" style="border-collapse:collapse;font-size:85.0%;" border="1" id="table_style">
							  <tr style="background:#999999;color:white" align="center">
								<td>#</td>
								<td>Student Name</td>
								<td>Student Code</td>
								<td colspan="2">Total Payable Amount </td>
								<td colspan="2">Total Paid Amount </td> 
								<td colspan="2">Balance to be pay</td> 
							  </tr>
							  <tr align="center">
								<td> </td>
								<td> </td>
								<td> </td>
								<td>GOVT</td>
								<td >MGNT</td> 
								<td>GOVT</td>
								<td >MGNT</td> 
								<td>GOVT</td>
								<td >MGNT</td>
							 
								 
							  </tr>
							  <?php  
								$j=1;
								$govt_class_paid_amount_=0;
								$govt_class_class_amount_=0;
								$mgnt_class_paid_amount_ = 0;
								$mgnt_class_class_amount_ = 0;
								$govt_balance_amount = 0;
								$mgnt_balance_amount = 0;
								$mgnt_total_payable = 0;
								$mgnt_total_paid = 0;
								$mgnt_total_balance = 0;
								 
								$govt_total_payable = 0;
								$govt_total_paid = 0;
								$govt_total_balance = 0;
								
								$total_payable = 0;
								$total_paid = 0;
								$total_balance = 0;
								
								for($i=0;$i<count($student_details_array);$i++): 
									$govt_class_class_amount_=$govt_class_amount_array[$i];
									$mgnt_class_class_amount_ = $mgnt_class_amount_array[$i];
									$govt_class_paid_amount_= $govt_class_paid_amount_array[$i];
									$mgnt_class_paid_amount_= $mgnt_class_paid_amount_array[$i]; 
									
									//GETTING BALANCE AMOUNT
									$govt_balance_amount = $govt_class_class_amount_-$govt_class_paid_amount_;
									$mgnt_balance_amount = $mgnt_class_class_amount_-$mgnt_class_paid_amount_;
									
									//GETTING TOTAL AMOUNT
									$mgnt_total_payable = $mgnt_total_payable + $mgnt_class_class_amount_;
									$mgnt_total_paid = $mgnt_total_paid + $mgnt_class_paid_amount_;
									$mgnt_total_balance = $mgnt_total_balance + $mgnt_balance_amount;
									
									$govt_total_payable = $govt_total_payable + $govt_class_class_amount_;
									$govt_total_paid = $govt_total_paid + $govt_class_paid_amount_;
									$govt_total_balance = $govt_total_balance + $govt_balance_amount;
									
									//GETTING TOTAL FINAL AMOUNT
									$total_payable = $mgnt_total_payable + $govt_total_payable ;
									$total_paid = $mgnt_total_paid + $govt_total_paid;
									$total_balance = $mgnt_total_balance + $govt_total_balance;
									
								?>
								<tr >
									<td><?php echo $j;?></td>
									<td><?php echo $student_details_array[$i];?></td>
									<td><?php echo $student_details_code[$i];?></td>
									<td align="right"><?php echo $govt_class_class_amount_;?></td>
									<td align="right"> <?php echo $mgnt_class_class_amount_;?></td> 
									<td align="right"> <?php echo $govt_class_paid_amount_;?></td>
									<td align="right"><?php echo $mgnt_class_paid_amount_;?></td> 
									<td align="right"><?php echo number_format($govt_balance_amount,2);?></td>
									<td align="right"><?php echo number_format($mgnt_balance_amount,2);?></td>
									 
								</tr> 
							  <?php  $j++;endfor;?>
								  <tr align="right" style="font-weight:bold;font-size:80.0%;">
									<td> </td>
									<td> </td>
									<td> </td>
									<td><?PHP echo number_format($govt_total_payable,2);?></td>
									<td ><?PHP echo number_format($mgnt_total_payable,2);?></td> 
									<td><?PHP echo number_format($govt_total_paid,2);?></td>
									<td ><?PHP echo number_format($mgnt_total_paid,2);?></td> 
									<td><?PHP echo number_format($govt_total_balance,2);?></td>
									<td ><?PHP echo number_format($mgnt_total_balance,2);?></td> 
								  </tr>
								  <tr>
									<td colspan="9">&nbsp;</td>
								  </tr>
								  <tr align="right" style="font-weight:bold;">
									 
									<td colspan="5"> Total Payable : 
									 <?PHP echo number_format($total_payable,2);?></td> 
									<td colspan="2"> Total Paid : 
									 <?PHP echo number_format($total_paid,2);?></td> 
									<td colspan="2"> Total Balance :  
									 <?PHP echo number_format($total_balance,2);?></td> 
								  </tr>
							</table>
						<!--DISPLAY END -->
					 <br><br>
						<!--RTE DISPLAY START -->
							<center><h4>RTE STUDENTS FEE DETAILS</h4></center>
							<table width="100%" style="border-collapse:collapse;" border="1">
							  <tr style="background:#999999;color:white" align="center">
								<td>Sl.No</td>
								<td>Student Name</td>
								<td>Student Code</td>
								<td>Total Payable Amount </td>
								<td>Total Paid Amount </td> 
								<td>Balance to be pay</td> 
							  </tr>
							  
							  <?php  
								 
								$rte_class_class_amount_=0;
								$rte_class_paid_amount_ = 0; 
								$rte_balance_amount = 0; 
								 
								$rte_total_payable = 0;
								$rte_total_paid = 0;
								$rte_total_balance = 0; 
								
								$k=1;
								
								for($j=0;$j<count($student_details_array_rte);$j++): 
									 
									$rte_class_class_amount_ = $rte_class_amount_array[$j]; 
									$rte_class_paid_amount_= $rte_class_paid_amount_array[$j]; 
									
									//GETTING BALANCE AMOUNT
									$rte_balance_amount = $rte_class_class_amount_-$rte_class_paid_amount_; 
									
									//GETTING TOTAL AMOUNT
									$rte_total_payable = $rte_total_payable + $rte_class_class_amount_; 
									$rte_total_paid = $rte_total_paid + $rte_class_paid_amount_;
									$rte_total_balance = $rte_total_balance + $rte_balance_amount; 
								?>
								<tr >
									<td><?php echo $k;?></td>
									<td><?php echo $student_details_array_rte[$j];?></td>
									<td><?php echo $student_details_code_rte[$j];?></td> 
									<td align="right"> <?php  echo $rte_class_class_amount_;?></td>  
									<td align="right"><?php   echo $rte_class_paid_amount_;?></td>  
									<td align="right"><?php echo number_format($rte_balance_amount,2);?></td> 
								</tr> 
								<tr>
									<td colspan="9">&nbsp;</td>
								  </tr>
							  <?php  $k++;endfor;?>
								  <tr align="right" style="font-weight:bold">
									 
									 
									<td  colspan="4">Total Payable :
									 <?PHP echo number_format($rte_total_payable,2);?></td>  
									<td  > Total Paid :   
									 <?PHP echo number_format($rte_total_paid,2);?></td>  
									<td  > Total Balance : 
									 <?PHP echo number_format($rte_total_balance,2);?></td> 
								  </tr>
								   
							</table>
						<!--RTE DISPLAY END -->
					 
					</table>
				</body>
				 
</html>	
	 
      