 <html>
<head>

</head>

<body onload="print();" onfocus="window.close()">
<div class="background">
		<table width="100%" border="0" style="font-size:90.0%;">
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
			<td width="21%" align="center">&nbsp;</td>
			<td width="21%" align="center">&nbsp;</td>
			<td width="22%" align="right"><strong></strong></td>
			<td width="10%"><strong> </strong></td>
			<td width="10%" align="center">&nbsp;</td>
		  </tr>
		</table>
		<table width="710px" border="0" align="center" > 
		   
		  <tr>
			<td>&nbsp;</td>
			<td width="14%">&nbsp;</td>
			<td colspan="2">&nbsp;</td>
			<td colspan="3">&nbsp;</td>
			<td>&nbsp;</td>
		  </tr>
		  <?php 
			$gender ="";  
			if($study_certificate_details['StudentDetail']['gender']=="Female")
			{
				$gender ="D/o";
			}
			else{
				$gender ="S/o";
			}
			$father_name = $study_certificate_details['ParentDetail'][0]['father_name'];
			$class = $study_certificate_details['AddClass']['class_name'];
			$academic_year =  $study_certificate_details['AcademicYear']['academic_year'];
			$admission_no = $study_certificate_details['StudentDetail']['admission_number'];
			$mother_tongue = $study_certificate_details['MotherTongue']['mother_tongue'];
			$dob = date('d-m-Y',strtotime($study_certificate_details['StudentDetail']['dob']));
			$caste = $study_certificate_details['Caste']['caste']." / ".$study_certificate_details['SubCaste']['subcaste'] ;
			$date_split = explode("-",$dob);
			$date_in_words_year = $this->DateToWord->convert_number($date_split[2]);
			$date_in_words = $this->DateToWord->convert_number($date_split[0]); 
			$month = date("F", strtotime($dob)); 
		  ?>
		  <tr>
			<td>&nbsp;</td>
			<td colspan="6" style="font-size:18px;font-style:italic;line-height:35px;text-align:justify">This is to certify that&nbsp; Kumara / Kumari <span style="font-size:20px;font-weight:bolder;"><?php echo $study_certificate_details['StudentDetail']['student_name'];?> <?php echo $gender;?> <?php echo $father_name;?> 
			   </span>&nbsp;<span style="font-size:20px;font-style:italic;">.&nbsp;is a bonafide student of this Institution  studying in <span style="font-weight:bold"><?php echo $class;?></span> during the Academic year <span style="font-weight:bold"><?php echo $academic_year;?>. </span></span><br />
			   Admission number :  <span style="font-weight:bold"><?php echo $admission_no;?></span><br />
			  Date of birth: <span style="font-size:18px;font-style:italic;"><span style="font-weight:bold;font-size:16px;"><?php echo $dob;?> ( <?php echo $date_in_words." - ".$month." - ".$date_in_words_year;?> ) </span></span><br />Caste: <span style="font-weight:bold"><?php echo $caste;?></span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Mother tongue : <span style="font-weight:bold"><?php echo $mother_tongue;?></span></td>
			<td>&nbsp;</td>
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
			<td>&nbsp;</td>
			<td colspan="6" style="font-size:20px;font-style:italic;"></td>
			<td>&nbsp;</td>
		  </tr>
		  <tr>
			<td>&nbsp;</td>
			<td colspan="6" style="font-size:15px;font-weight:bold;text-align:center">"HIS / HER CHARACTER AND CONDUCT ARE / WERE SATISFACTORY"</td>
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
			<td style="font-size:16px;font-style:italic;font-weight:bold;" colspan="4">Date:<?php echo date('d-m-Y');?></td> 
			<td align="right" style="font-size:16px;font-style:italic;font-weight:bold;">Signature of Principal </td>
			<td style="font-size:20px;font-style:italic;">&nbsp;</td>
			<td>&nbsp;</td>
		  </tr>
		  <tr>
			<td>&nbsp;</td>
			<td align="right" style="font-size:20px;font-style:italic;">&nbsp;</td>
			<td width="1%" align="right" style="font-size:20px;font-style:italic;">&nbsp;</td>
			<td width="1%" align="right" style="font-size:20px;font-style:italic;">&nbsp;</td>
			<td width="1%" align="right" style="font-size:20px;font-style:italic;">&nbsp;</td>
			<td width="57%" align="right" style="font-size:20px;font-style:italic;">&nbsp;</td>
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
		</table>
 </div>

</body>

</html>
<style> 
/*body { 
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

*/	.background
	{
 		background:url('../../../img/ptesstudy.jpg') no-repeat !important; 
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
}	
</style>