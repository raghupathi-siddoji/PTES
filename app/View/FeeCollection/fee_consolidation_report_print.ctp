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
<body>
				<table width="100%" border="1" id="main_table" style="border-collapse:collapse;" rules="groups" cellpadding="4px">
					  <tr>
					    <td width="18%" rowspan="3" align="center"><img src="../../img/logo.JPG" width="80px"></td>
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
						<td colspan="3" align="center"><b class="heading">  Fee Consolidation Report. </b></td> 
  </tr>
					  <tr>  
						<td colspan="3" align="center"> </td> 
					  </tr>
				</table>

				<br>
				<table width="100%" border="1" style="border-collapse:collapse;font-size:85.0%;" align="center">
				  <tr>
					<td colspan="3" align="center">&nbsp;</td>
					<td colspan="3" align="center"><strong>Amount to be collected </strong></td>
					<td colspan="3" align="center"><strong>Amount Collected</strong></td>
					<td colspan="3" align="center"><strong>Balance</strong></td>
				  </tr>
				  <tr style="background:#999999;color:white">
					<td width="2%" align="center"><strong>Sl.No</strong></td>
					<td width="13%" align="center"><strong>Class</strong></td>
					<td width="12%" align="center"><strong>Total Strength</strong></td>
					<td width="8%" align="center"><strong>Govt</strong></td>
					<td width="8%" align="center"><strong>Mgnt</strong></td>
					<td width="8%" align="center"><strong>RTE</strong></td>
					<td align="center"><strong>Govt</strong></td>
					<td align="center"><strong>Mgnt</strong></td>
					<td align="center"><strong>RTE</strong></td>
					<td align="center"><strong>Govt</strong></td>
					<td align="center"><strong>Mgnt</strong></td>
					<td align="center"><strong>RTE</strong></td>
				  </tr>
				  <?php 
					$i=0;
					$sl=1;
					$govt_payable = 0;
					$mgnt_payable = 0;
					$rte_payable = 0;
					
					$govt_paid = 0;
					$mgnt_paid = 0;
					$rte_paid = 0;
					
					$govt_balance = 0;
					$mgnt_balance = 0;
					$rte_balance = 0;
					
					$govt_tot_payable = 0;
					$mgnt_tot_payable = 0;
					$rte_tot_payable = 0;
					
					$govt_tot_paid = 0;
					$mgnt_tot_paid = 0;
					$rte_tot_paid = 0;
					
					$govt_tot_balance = 0;
					$mgnt_tot_balance = 0;
					$rte_tot_balance = 0;
					
					$total_amount_tobe_collected = 0;
					$total_amount_collected = 0;
					$total_amount_balance = 0;
					
					foreach($class_list as $class_list):
						$govt_payable = $govt_class_payable_amount_array[$i];
						$mgnt_payable = $mgnt_class_payable_amount_array[$i];
						$rte_payable = $rte_class_payable_amount_array[$i];
						
						$govt_paid = $govt_class_paid_amount_array[$i][0][0]['TOTAL_PAID'];
						$mgnt_paid = $mgnt_class_paid_amount_array[$i][0][0]['TOTAL_PAID'];
						$rte_paid = $rte_class_paid_amount_array[$i][0][0]['TOTAL_PAID'];
						
						$govt_balance = $govt_payable - $govt_paid;
						$mgnt_balance = $mgnt_payable - $mgnt_paid;
						$rte_balance = $rte_payable - $rte_paid;
						
						$govt_tot_payable = $govt_tot_payable + $govt_payable;
						$mgnt_tot_payable = $mgnt_tot_payable + $mgnt_payable;
						$rte_tot_payable = $rte_tot_payable + $rte_payable;
						
						$govt_tot_paid = $govt_tot_paid + $govt_paid;
						$mgnt_tot_paid = $mgnt_tot_paid + $mgnt_paid;
						$rte_tot_paid = $rte_tot_paid + $rte_paid;
						
						$govt_tot_balance = $govt_tot_balance + $govt_balance;
						$mgnt_tot_balance = $mgnt_tot_balance + $mgnt_balance;
						$rte_tot_balance = $rte_tot_balance + $rte_balance;
						
						$total_amount_tobe_collected = $total_amount_tobe_collected + $govt_payable + $mgnt_payable + $rte_payable;
						$total_amount_collected =  $total_amount_collected + $govt_paid + $mgnt_paid + $rte_paid;
						$total_amount_balance = $govt_tot_balance + $mgnt_tot_balance + $rte_tot_balance;
					?>
					  <tr align="right">
						<td><?php echo $sl++;?></td>
						<td align="center"> <?php echo $class_list['AddClass']['class_name'];?></td>
						<td align="center"><?php echo $student_count_class_array[$i];?></td>
						<td><?php if($govt_payable>0) {echo $govt_payable;} else {echo "--";}?></td>
						<td><?php if($mgnt_payable>0) {echo $mgnt_payable;} else {echo "--";} ?></td>
						<td><?php if($rte_payable>0) {echo $rte_payable;} else {echo "--";} ?></td>
						<td><?php if( $govt_paid>0) {echo $govt_paid;} else {echo "--";}?></td>
						<td><?php if( $mgnt_paid>0) {echo $mgnt_paid;} else {echo "--";} ?></td>
						<td><?php if( $rte_paid >0) {echo $rte_paid;} else {echo "--";} ?></td>
						<td><?php if( $govt_balance >0) {echo number_format($govt_balance,2);} else {echo "--";} ?>&nbsp;</td>
						<td><?php if( $mgnt_balance >0) {echo number_format($mgnt_balance,2);} else {echo "--";} ?>&nbsp;</td>
						<td><?php if( $rte_balance >0) {echo number_format($rte_balance,2);} else {echo "--";} ?>&nbsp;</td>
					  </tr>
				 <?php $i++;endforeach;?>
					<tr align="right" >
						<td width="2%"  ><strong> </strong></td>
						<td width="13%"  ><strong> </strong></td>
						<td width="12%"  ><strong> </strong></td>
						<td width="8%"  ><strong><?php if( $govt_tot_payable >0) {echo number_format($govt_tot_payable,2);} else {echo "0.0";} ?></strong></td>
						<td width="8%" ><strong><?php if( $mgnt_tot_payable >0) {echo number_format($mgnt_tot_payable,2);} else {echo "0.0";} ?></strong></td>
						<td width="8%" ><strong><?php if( $rte_tot_payable >0) {echo number_format($rte_tot_payable,2);} else {echo "0.0";} ?></strong></td>
						
						<td width="8%"  ><strong><?php if( $govt_tot_paid >0) {echo number_format($govt_tot_paid,2);} else {echo "0.0";} ?></strong></td>
						<td width="8%"  ><strong><?php if( $mgnt_tot_paid >0) {echo number_format($mgnt_tot_paid,2);} else {echo "0.0";} ?></strong></td>
						<td width="8%"  ><strong><?php if( $rte_tot_paid >0) {echo number_format($rte_tot_paid,2);} else {echo "0.0";} ?></strong></td>
						
						<td width="8%"  ><strong><?php if( $govt_tot_balance >0) {echo number_format($govt_tot_balance,2);} else {echo "0.0";} ?></strong></td>
						<td width="8%"  ><strong><?php if( $mgnt_tot_balance >0) {echo number_format($mgnt_tot_balance,2);} else {echo "0.0";} ?></strong></td>
						<td width="8%" ><strong><?php if( $rte_tot_balance >0) {echo number_format($rte_tot_balance,2);} else {echo "0.0";} ?></strong></td>
					</tr>
					<tr align="right" >
						<td width="2%"  ><strong> </strong></td>
						<td width="13%"  ><strong> </strong></td> 
						<td width="8%" colspan="3"><strong>Total Payable</strong></td> 
						<td width="8%"  ><strong><?php if( $total_amount_tobe_collected >0) {echo number_format($total_amount_tobe_collected,2);} else {echo "0.0";} ?></strong></td>
						
						<td width="8%"  colspan="2"><strong>Total Paid</strong></td> 
						<td width="8%"  ><strong><?php if( $total_amount_collected >0) {echo number_format($total_amount_collected,2);} else {echo "0.0";} ?></strong></td>
						<td width="8%"  colspan="2"><strong>Total Balance</strong></td> 
						<td width="8%"  ><strong><?php if( $total_amount_balance >0) {echo number_format($total_amount_balance,2);} else {echo "0.0";} ?></strong></td>
						
						
					</tr>
				</table>
				</body>
				 
</html>			 