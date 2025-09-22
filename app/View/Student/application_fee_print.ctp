<?php //print_r( $application_fee);?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<style>
.main_heading
{
	font-size:11px;
	font-weight:bolder;
}
.sub_heading
{
	font-size:9px;
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

<table width="50%" border="1" id="main_table" style="border-collapse:collapse;font-size:85.0%" rules="groups" cellpadding="4px">
  <tr>
    <td width="18%" rowspan="3" align="center"><img src="../../img/logo.jpg" width="80px"></td>
    <td>&nbsp;</td>
    <td colspan="5" align="center" style="font-size:8px">MPM EDUCATION SOCIETY.</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="2%">&nbsp;</td>
    <td colspan="5" align="center"><strong class="main_heading"> PAPER TOWN ENGLISH SCHOOL</h2></strong></td>
    <td width="3%">&nbsp;</td>
  </tr>
  <tr> 
     
    <td colspan="7" align="center"><span class="sub_heading">Paper Town Bhadravathi - 577302. Off: 08282-270735.</span></td>
  </tr>
    
  <tr>  
    <td colspan="8" align="center"> </td> 
  </tr>
 <tr>  
    <td colspan="8" align="center"><b class="heading">Application Fee Receipt</b></td> 
  </tr>
  <tr>  
    <td colspan="8" align="center"> <hr></td> 
  </tr>
  <tr>
    <td><strong>Name </strong></td>
    <td><strong>:</strong></td>
    <td align="left" colspan="3"><?php echo $application_fee['StudentApplication']['student_name'];?></td> 
	<td width="20%"><strong>App No : </strong></td> 
    <td align="left" colspan="2"><?php echo $application_fee['StudentApplication']['application_no'];?></td>
  </tr>
  <tr> 
    <td align="left"><strong>Receipt No </strong></td>
    <td><strong>:</strong></td>
    <td align="left" colspan="2"><?php echo $application_fee['StudentApplication']['receipt_no'];?></td>
  
	<td  align="right"><strong>Date :</strong></td> 
	<td   align="right" colspan="3"><?php echo date('d-m-Y',strtotime($application_fee['StudentApplication']['date']));?></td>
 
  </tr>
   
    <tr>  
    <td colspan="8" align="center"> </td> 
  </tr>
  <tr>
    <td colspan="8">
		<table width="100%" border="1" style="border-collapse:collapse" cellpadding="3px">
      <tr>
        <td width="2%" align="center"><strong>Sl.No</strong></td>
        <td width="65%" align="center"><strong>Fee Particulars </strong></td>
        <td width="33%" align="center"><strong>Amount</strong></td>
      </tr>
		<tr>
        <td width="2%" align="center"><strong>1</strong></td>
        <td width="65%" align="center"><strong>Application Fee</strong></td>
        <td width="33%" align="center"><?php echo $application_fee['StudentApplication']['amount'];?></td>
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
    <td colspan="8"  align="left"><strong>In Words: <?php echo $this->NumberToWord->convert_number_to_words($application_fee['StudentApplication']['amount']);?> only </strong></td>
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
    
    <td colspan="4" align="left"> </td> 
    <td colspan="3" align="right"><strong>Signature</strong></td>
   <td>&nbsp;</td>
  </tr>
</table>
</body>
</html>

<style>
/*#main_table td
{
	
	border:solid 0px #333333;
	border-collapse:collapse;
}*/
</style>