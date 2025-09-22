
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

<body onload="print()">

<table width="49%" border="1" id="main_table" style="border-collapse:collapse;font-size:85.0%" rules="groups" cellpadding="4px">
  <tr>
    <td width="18%" rowspan="2s" align="center"><img src="../../img/logo.jpg" width="80px"></td>
    <td width="2%">&nbsp;</td>
    <td colspan="5" align="left"><strong class="main_heading"> PAPER TOWN ENGLISH SCHOOL</h2></strong></td>
    <td width="3%">&nbsp;</td>
  </tr>
  <tr> 
     
    <td colspan="7" align="left"><span class="sub_heading">Paper Town Bhadravathi - 577302. &nbsp;&nbsp;&nbsp;Off: 008282-270735.</span></td>
     
  </tr>
 <tr>  
    <td colspan="8" align="center"><b class="heading">Govt Fee Receipt</b></td> 
  </tr>
  <tr>  
    <td colspan="8" align="center"> <hr></td> 
  </tr>
  <tr>
    <td><strong>Student Name </strong></td>
    <td><strong>:</strong></td>
    <td width="20%" align="left"><?php echo $receipt_details['StudentDetail']['student_name'];?></td>
    <td width="14%" align="center">&nbsp;</td>
    <td width="16%" align="left"><strong>Date</strong></td>
    <td width="2%"><strong>:</strong></td>
    <td width="19%" align="left"><?php echo date('d-m-Y',strtotime($receipt_details['GovtFeeCollection']['receipt_date']));?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Student Code </strong></td>
    <td><strong>:</strong></td>
    <td align="left"><?php echo $receipt_details['StudentDetail']['student_code'];?></td>
    <td align="center">&nbsp;</td>
    <td align="left"><strong>Receipt No </strong></td>
    <td><strong>:</strong></td>
    <td align="left"><?php echo $receipt_details['GovtFeeCollection']['receipt_no'];?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="20%"><strong>Academic Year</strong></td>
    <td><strong>:</strong></td>
    <td align="left"> <?php echo $receipt_details['AcademicYear']['academic_year'];?></td>
    <td align="center">&nbsp;</td>
    <td align="left"><strong>Class</strong></td>
    <td><strong>:</strong></td>
    <td align="left"><?php echo $receipt_details['AddClass']['class'];?></td>
    <td>&nbsp;</td>
  </tr>
   
  <tr>
    <td colspan="8">
		<table width="100%" border="1" style="border-collapse:collapse" cellpadding="3px">
      <tr>
        <td width="2%" align="center"><strong>Sl.No</strong></td>
        <td width="65%" align="center"><strong>Fee Particulars </strong></td>
        <td width="33%" align="center"><strong>Amount</strong></td>
      </tr>
		<?php 
		$i=1;
		foreach($receipt_details['GovtFeeCollectionDetail'] as $fee_details):
			if($fee_details['fee_paying_amount']>0) :?>
		  <tr>
			<td width="10%" ><?php echo $i;?></td>
			<td ><?php echo $fee_details['fee_head_name'];?></td>
			<td align="right"><?php echo $fee_details['fee_paying_amount'];?></td>
		  </tr>
		<?php $i++;endif;endforeach;?>	
		<tr>
			<th> </td>
			<th align="right">Total Payable Amount</th>
			<th align="right"><?php echo $receipt_details['GovtFeeCollection']['payable_amount'];?></th>
		</tr>
		<tr>
			<th> </td>
			<th align="right">Previous Paid Amount</th>
			<th align="right"><?php echo $receipt_details['GovtFeeCollection']['paid_amount'];?></th>
		</tr>
		<tr>
			<th> </td>
			<th align="right">Now Paying Amount</th>
			<th align="right"><?php echo $receipt_details['GovtFeeCollection']['paying_amount'];?></th>
		</tr>
		<tr>
			<th> </td>
			<th align="right">Balance Amount to be pay</th>
			<th align="right"><?php echo $receipt_details['GovtFeeCollection']['balance_amount'];?></th>
		</tr>
    </table></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="5" align="center">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="8"><strong>In Words: <?php echo $this->NumberToWord->convert_number_to_words($receipt_details['GovtFeeCollection']['paying_amount']);?> only </strong></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td colspan="3" align="center"> </td>
    <td>&nbsp;</td>
  </tr>
  <tr> 
    
    <td colspan="4" align="left"><strong>Next Payment Date:<?php echo date('d-m-Y',strtotime($receipt_details['GovtFeeCollection']['next_payment_date']));?></strong></td> 
    <td colspan="3" align="right"><strong>Signature</strong></td>
   <td>&nbsp;</td>
  </tr>
</table>
<br><span style="margin-left:518px;margin-top:-100px">|</span>
<!-- Table two -->
<table width="49%" border="1" id="main_table" style="border-collapse:collapse;font-size:85.0%;margin-left:530px;margin-top:-635px" rules="groups" cellpadding="4px">
  <tr>
    <td width="18%" rowspan="2s" align="center"><img src="../../img/logo.jpg" width="80px"></td>
    <td width="2%">&nbsp;</td>
    <td colspan="5" align="left"><strong class="main_heading"> PAPER TOWN ENGLISH SCHOOL</h2></strong></td>
    <td width="3%">&nbsp;</td>
  </tr>
  <tr> 
     
    <td colspan="7" align="left"><span class="sub_heading">Paper Town Bhadravathi - 577302. &nbsp;&nbsp;&nbsp;Off: 008282-270735.</span></td>
     
  </tr>
 <tr>  
    <td colspan="8" align="center"><b class="heading">Govt Fee Receipt</b></td> 
  </tr>
  <tr>  
    <td colspan="8" align="center"> <hr></td> 
  </tr>
  <tr>
    <td><strong>Student Name </strong></td>
    <td><strong>:</strong></td>
    <td width="20%" align="left"><?php echo $receipt_details['StudentDetail']['student_name'];?></td>
    <td width="14%" align="center">&nbsp;</td>
    <td width="16%" align="left"><strong>Date</strong></td>
    <td width="2%"><strong>:</strong></td>
    <td width="19%" align="left"><?php echo date('d-m-Y',strtotime($receipt_details['GovtFeeCollection']['receipt_date']));?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Student Code </strong></td>
    <td><strong>:</strong></td>
    <td align="left"><?php echo $receipt_details['StudentDetail']['student_code'];?></td>
    <td align="center">&nbsp;</td>
    <td align="left"><strong>Receipt No </strong></td>
    <td><strong>:</strong></td>
    <td align="left"><?php echo $receipt_details['GovtFeeCollection']['receipt_no'];?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="20%"><strong>Academic Year</strong></td>
    <td><strong>:</strong></td>
    <td align="left"> <?php echo $receipt_details['AcademicYear']['academic_year'];?></td>
    <td align="center">&nbsp;</td>
    <td align="left"><strong>Class</strong></td>
    <td><strong>:</strong></td>
    <td align="left"><?php echo $receipt_details['AddClass']['class'];?></td>
    <td>&nbsp;</td>
  </tr>
   
  <tr>
    <td colspan="8">
		<table width="100%" border="1" style="border-collapse:collapse" cellpadding="3px">
      <tr>
        <td width="2%" align="center"><strong>Sl.No</strong></td>
        <td width="65%" align="center"><strong>Fee Particulars </strong></td>
        <td width="33%" align="center"><strong>Amount</strong></td>
      </tr>
		<?php 
		$i=1;
		foreach($receipt_details['GovtFeeCollectionDetail'] as $fee_details):
			if($fee_details['fee_paying_amount']>0) :?>
		  <tr>
			<td width="10%" ><?php echo $i;?></td>
			<td ><?php echo $fee_details['fee_head_name'];?></td>
			<td align="right"><?php echo $fee_details['fee_paying_amount'];?></td>
		  </tr>
		<?php $i++;endif;endforeach;?>	
		<tr>
			<th> </td>
			<th align="right">Total Payable Amount</th>
			<th align="right"><?php echo $receipt_details['GovtFeeCollection']['payable_amount'];?></th>
		</tr>
		<tr>
			<th> </td>
			<th align="right">Previous Paid Amount</th>
			<th align="right"><?php echo $receipt_details['GovtFeeCollection']['paid_amount'];?></th>
		</tr>
		<tr>
			<th> </td>
			<th align="right">Now Paying Amount</th>
			<th align="right"><?php echo $receipt_details['GovtFeeCollection']['paying_amount'];?></th>
		</tr>
		<tr>
			<th> </td>
			<th align="right">Balance Amount to be pay</th>
			<th align="right"><?php echo $receipt_details['GovtFeeCollection']['balance_amount'];?></th>
		</tr>
    </table></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="5" align="center">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="8"><strong>In Words: <?php echo $this->NumberToWord->convert_number_to_words($receipt_details['GovtFeeCollection']['paying_amount']);?> only </strong></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td colspan="3" align="center"> </td>
    <td>&nbsp;</td>
  </tr>
  <tr> 
    
    <td colspan="4" align="left"><strong>Next Payment Date:<?php echo date('d-m-Y',strtotime($receipt_details['GovtFeeCollection']['next_payment_date']));?></strong></td> 
    <td colspan="3" align="right"><strong>Signature</strong></td>
   <td>&nbsp;</td>
  </tr>
</table>
 <!-- Table two -->
</body>
</html>

<style>
/*#main_table td
{
	
	border:solid 0px #333333;
	border-collapse:collapse;
}*/
</style>