<html>
<head>

</head>

<body onload="print();" onfocus="window.close()">
<div class="background">
<table width="720px" border="0" style="font-size:90.0%;">
  <tr>
    <td colspan="2" rowspan="17" align="center" valign="top"></td>
    <td colspan="5" align="center">&nbsp;</td>
    </tr>
  <tr>
    <td colspan="5" align="center" style="font-size:18px">&nbsp;</td>
    </tr>
  <tr>
    <td colspan="5" align="center">&nbsp;</td>
    </tr>
  <tr>
    <td colspan="5" align="center">&nbsp;</td>
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
    <td align="right">&nbsp;</td>
    <td>&nbsp;</td>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td width="21%" align="center">&nbsp;</td>
    <td width="21%" align="center">&nbsp;</td>
    <td width="22%" align="right"> </td>
    <td width="10%"> </td>
    <td width="10%" align="center">&nbsp;</td>
  </tr>
</table>
<table width="720px" border="0" align="center"> 
   
  <tr>
    <td width="8%">&nbsp;</td>
    <td width="10%">&nbsp;</td>
    <td colspan="2">&nbsp;</td>
    <td colspan="3">&nbsp;</td>
    <td width="8%">&nbsp;</td>
  </tr>
  <?php 
		$gender ="";  
		if($char_certificate_details['StudentDetail']['gender']=="Female")
		{
			$gender ="D/o";
		}
		else{
			$gender ="S/o";
		}
		$father_name = $char_certificate_details['ParentDetail'][0]['father_name']; 
		$academic_year =  $char_certificate_details['AcademicYear']['academic_year'];
		 
		 
	?>
  <tr>
    <td>&nbsp;</td>
    <td colspan="6" style="font-size:20px;font-style:italic;line-height:40px;text-align:justify">This is to certify that&nbsp;<span style="font-size:20px;font-weight:bolder;"><?php echo $char_certificate_details['StudentDetail']['student_name'];?> <?php echo $gender;?> <?php echo $father_name;?>
            </span>&nbsp;<span style="font-size:20px;font-style:italic;">.has
studied from <span style="font-weight:bold"><?php echo $from_class;?></span> to <span style="font-weight:bold"><?php echo $to_class;?></span> in our Institution </span><span style="font-size:20px;font-weight:bolder;"> </span><span style=IInd PUC"font-size:20px;font-style:italic;">  during the year <span style="font-weight:bold"><?php echo $academic_year;?>.</span></span></td>
    <td>&nbsp;</td>
  </tr>
  
  <tr>
    <td>&nbsp;</td>
    <td colspan="6" style="font-size:20px;font-style:italic;">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="6" style="font-size:20px;font-style:italic;">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="6" style="font-size:18px;font-style:italic;text-align:center;font-weight:bold;">  "HIS / HER CHARACTER AND CONDUCT ARE / WERE SATISFACTORY"  .</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="6" style="font-size:20px;font-style:italic;">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="6" align="right" style="font-size:20px;font-style:italic;">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="right" style="font-size:20px;font-style:italic;">&nbsp;</td>
    <td width="15%" align="right" style="font-size:20px;font-style:italic;">&nbsp;</td>
    <td width="3%" align="right" style="font-size:20px;font-style:italic;">&nbsp;</td>
    <td width="25%" align="right" style="font-size:20px;font-style:italic;">&nbsp;</td>
    <td width="20%" align="right" style="font-size:20px;font-style:italic;">&nbsp;</td>
    <td width="11%" align="right" style="font-size:20px;font-style:italic;">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="6" style="font-size:20px;font-style:italic;">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="6" style="font-size:20px;font-style:italic;">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td style="font-size:20px;font-style:italic;">Date : </td>
    <td style="font-size:20px;font-style:italic;"><?php echo date('d-m-Y');?></td>
    <td colspan="4" style="font-size:20px;font-style:italic;">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="left" style="font-size:20px;font-style:italic;">Place : </td>
    <td align="right" style="font-size:20px;font-style:italic;">Bhadravathi.</td>
    <td align="right" style="font-size:20px;font-style:italic;">&nbsp;</td>
    <td colspan="3" align="right" style="font-size:20px;font-style:italic;">Signature of Principal</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="6" align="center" style="font-size:20px;font-style:italic;">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="6" align="center" style="font-size:20px;font-style:italic;">&nbsp; </td>
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
    <td>&nbsp;</td>
    <td colspan="6" style="font-size:20px;font-style:italic;">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
   <tr>
    <td>&nbsp;</td>
    <td colspan="6" style="font-size:20px;font-style:italic;">&nbsp;</td>
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
/*
body { 
    background-color: #FAFAFA;
    font: 12pt "Tahoma";
}
* {
    box-sizing: border-box;
    -moz-box-sizing: border-box;
}
.page {
    width: 21cm;
    min-height: 29.7cm;
    padding: 2cm;
    margin: 1cm auto;
    border: 1px #D3D3D3 solid;
    border-radius: 5px;
    background: white;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
}
.subpage {
    padding: 1cm;
    border: 5px red solid;
    height: 256mm;
    outline: 2cm #FFEAEA solid;
}

@page {
    size: A4;
    margin: 0.81px;
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
}
*/
	.background
	{
 		background:url('../../../../../img/ptescharactercertificat.jpg') no-repeat !important; 
		background-size:720px 920px !important;
		background-position:top center !important;
		margin-top:60px !important;
		 
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