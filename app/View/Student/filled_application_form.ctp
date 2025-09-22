
<style type="text/css">
.style1 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: medium;
}
.style2 {font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 30px; }
#id {font-family: Calibri}
td
{
 border:1px solid #000000;
 font-size:18px;
}
#ul
{
	margin-bottom:2px;
}
#addr
{
vertical-align:bottom;
}
p
{
	margin:5px;
}
#li
{
width:30px;
height:30px;
border:1px solid #000000;
float:left;
margin:5px;
display:inline;
}
#li1
{
width:30px;
height:30px;
border:1px solid #000000;
margin:5px;
float:left;
display:block;
}
.style3 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 20px;
}
.style4 {
	font-size: 16px;
	font-weight: bold;
}
.style6 {font-size: 16px}
.style8 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-weight: bold;
	font-style: italic;
}
.style15 {font-family: Verdana, Arial, Helvetica, sans-serif;}
.style17 {font-family: Verdana, Arial, Helvetica, sans-serif}
.style18 {font-size: 20px;}
</style>
<body onload="print()">
<?php foreach($detail as $lt) { ?>
<div align="center">
<table onclick="print()">
<tr>
<td width="1004" height="215">
  
  <table border="0">
    <tr>
      <td width="217" height="91" style="border:0px solid #000000; vertical-align:top">
		<div align="center">
<img src="<?php echo $this->webroot."/img/logo.jpg"; ?>" width="80px" height="80px">		</div>
	</td>
	   
      <td width="556" style="border:0px solid #000000;">
	  <div align="center">
	  	<p class="style1">MPM EDUCATION SOCIETY </p>
  		<p class="style2">PAPER TOWN ENGLISH SCHOOL </p>
  		<p class="style1">Paper Town, Bhadravathi-577302</p>
  	   </div>	   </td>
      
	  <td width="217" rowspan="2" style="border:0px solid #000000;vertical-align:top">
	  	<table width="180" height="180" align="right">
        	<tr>
			<?php if(!empty($P_detail)) { foreach($P_detail as $pic) { ?>
				<td width="171" height="144"><div align="center">
						<img src="<?php echo $this->webroot."/StudentPhoto/".$pic['ParentDetail']['student_photo']; ?>" width="100px"  alt="Student photo" height="100px">
				</div></td>
			<?php } } else { ?>
				<td width="171" height="144"></td>
			<?php } ?>
			</tr>
		</table>	  </td>
   </tr>
   
   <tr>
      <td height="104" colspan="2" style="border:0px solid #000000;vertical-align:top;"><table border="0" align="right">
          <tr>
            <td width="290" height="100"><p class="style18">Application No:<?php echo $lt['StudentApplication']['application_no']; ?> </p>
              <p class="style18">Admission  No: <?php echo $lt['StudentDetail']['admission_number']?> </p>
              <p class="style18">Student Code : <?php echo $lt['StudentDetail']['student_code']?></p>
              <p align="center" class="style18">(To be filled by Office Only)</p>
			  </td>
            <td width="497" style="border:0px solid #000000;"><div align="center">
              <p class="style3">APPLICATION FORM </p>
              <p class="style6">(N.B: Application not furnishing the full information will be rejected)</p>
              <p class="style4">Application should be fill in CAPITAL LETTERS </p>
            </div></td>
          </tr>
        </table>        </td>
   </tr>
  </table>
</td></tr></table>
<br />
  <table width="1005" border="1" style="border-collapse:collapse">
    
	<tr >
      <td width="30" height="80"><div align="center">1.</div></td>
      <td width="296">Name of the Student </td>
      <td width="666"><div align="left" style="text-transform: uppercase;">&nbsp;<?php echo $lt['StudentDetail']['student_name']?></div></td>
    </tr>
    
	<tr>
      <td height="80"><div align="center">2.</div></td>
      <td>Sex of the student </td>
      <td><?php echo $lt['StudentDetail']['gender']?></td>
    </tr>
    
	<tr>
      <td height="150"><div align="center">3.</div></td>
      <td><p>Date of the Birth of the Student </p>
      <p>(Enclosed Photocopy of Birth Certificate)</p></td>
      <td> 
	  	<p><?php echo date('d-m-Y',strtotime($lt['StudentDetail']['dob']));?></p>
		<p><small>(In Words)</small>&nbsp;  <?php echo " ".date('d',strtotime($lt['StudentDetail']['dob']));?> day of
		&nbsp; <?php echo " ".date('F',strtotime($lt['StudentDetail']['dob']));?> month of
		   &nbsp; <?php echo " ".date('Y',strtotime($lt['StudentDetail']['dob']));?> year<br><br>
		  </p></td>
    </tr>
    
	<tr>
      <td height="103"><div align="center">4.</div></td>
      <td>Permanent address of student </td>
      <td><?php echo $lt['StudentDetail']['permanent_address']." - ".$lt['StudentDetail']['permanent_address_pincode'];?></td>
    </tr> 
	
	<tr>
	<?php if(!empty($P_detail)) { 
		foreach($P_detail as $P_lt) ?>
		<td height="150"><div align="center">5.</div></td>
		<td>Name of the Mother , Father and Guardian (if any) </td>
		<td> 
			<br><p>&nbsp;Mother Name : <?php  echo $P_lt['ParentDetail']['mother_name']; ?></p><br>
			<p>&nbsp;Father Name : <?php  echo $P_lt['ParentDetail']['father_name']; ?> </p><br>
			<p>&nbsp;Guardian Name : <?php  echo $P_lt['ParentDetail']['guardian']; ?> </p><br>
		</td>
	<?php } else { ?>
		<td height="150"><div align="center">5.</div></td>
		<td>Name of the Mother , Father and Guardian (if any) </td>
		<td> 
			<br><p>&nbsp;Mother Name : </p><br>
			<p>&nbsp;Father Name : </p><br>
			<p>&nbsp;Guardian Name :  </p><br>
		</td>
	<?php } ?> 
	</tr>
    
	<tr>
	<?php if(!empty($P_detail)) { ?>
      <td height="150"><div align="center">6.</div></td>
      <td>Occupation of Parents / Guardian and Annual Income </td>
      <td> 
		<br><p>&nbsp;Father : <?php  echo $P_lt['ParentDetail']['father_job']; ?></p><br>
        <p>&nbsp;Mother (If Employed) :<?php  echo $P_lt['ParentDetail']['mother_job']; ?></p><br>
        <p>&nbsp;Guardian : <?php  echo $P_lt['ParentDetail']['guardian_job']; ?>  </p><br>
        <p>&nbsp;Annual Income : <?php  echo $P_lt['ParentDetail']['annual_income']; ?>  </p><br>
	</td>
	<?php } else {?>
	<td height="150"><div align="center">6.</div></td>
      <td>Occupation of Parents / Guardian and Annual Income </td>
      <td> 
		<br><p>&nbsp;Father : </p><br>
        <p>&nbsp;Mother (If Employed) : </p><br>
        <p>&nbsp;Guardian :  </p><br>
        <p>&nbsp;Annual Income :  </p><br>
	</td>
	<?php } ?>
    </tr>
    
	<tr>
	<?php if(!empty($P_detail)) { ?>
      <td height="195"><div align="center">7.</div></td>
      <td>Present address of Parent/Guardian </td>
      <td>
		<p><?php echo $lt['StudentDetail']['permanent_address']." - ".$lt['StudentDetail']['permanent_address_pincode']; ?></p>
		<br>
        <p>&nbsp;Mobile No: <?php echo $P_lt['ParentDetail']['mobile_no']; ?></p>
        <p>&nbsp;eMail Id: <?php echo $P_lt['ParentDetail']['mail']; ?></p>
	  </td>
	 <?php } else { ?>
		<td height="195"><div align="center">7.</div></td>
		<td>Present address of Parent/Guardian </td>
		<td>
		<p><?php echo $lt['StudentDetail']['permanent_address']." - ".$lt['StudentDetail']['permanent_address_pincode']; ?></p>
		<br>
        <p>&nbsp;Mobile No:</p>
        <p>&nbsp;eMail Id:</p>
	  </td>
	 <?php } ?>
    </tr>
    
	<tr>
      <?php if($lt['StudentDetail']['mpm_employee']=='MPM') { ?>
		<td height="190"><div align="center">8.</div></td>
		<td>If the Father / Mother is Employee of the MPM Ltd., furnish the details </td>
		<td><br> <p>&nbsp;Father / Mother Name: <?php echo $lt['StudentDetail']['mpm_parent_name']; ?></p><br>
			<p>&nbsp;1) Department : <?php echo $lt['StudentDetail']['department']; ?></p><br>
			<p>&nbsp;2) Designation : <?php echo $lt['StudentDetail']['designation']; ?></p><br>
			<p>&nbsp;3) E.C.No : <?php echo $lt['StudentDetail']['e_c_no']; ?>   </p><br>
		</td>
		<?php } else {?>
		<td height="190"><div align="center">8.</div></td>
		<td>If the Father / Mother is Employee of the MPM Ltd., furnish the details </td>
		<td>No
		</td>
		<?php } ?>
    </tr>
    
	<tr>
	<?php if(!empty($P_detail)) { ?> 
      <td height="150"><div align="center">9.</div></td>
      <td>Name of the Brothers / Sisters of the studying in PTES with Class and Section </td>
      <td>
		<?php if($P_lt['ParentDetail']['other_ptes_student']=='yes') { ?>		
						<p>1)<?php if($P_lt['ParentDetail']['student_name_one']) {
							echo " ".$P_lt['ParentDetail']['student_name_one']."  ".$P_lt['ParentDetail']['class_one']; 
						 } ?></p>
						<br>
						<p>2)<?php if($P_lt['ParentDetail']['student_name_two']) {
							echo " ".$P_lt['ParentDetail']['student_name_two']."  ".$P_lt['ParentDetail']['class_two']; 
						} ?></p>
						<br>
						<p>3)<?php if($P_lt['ParentDetail']['student_name_three']) { 
							echo " ".$P_lt['ParentDetail']['student_name_three']."  ".$P_lt['ParentDetail']['class_three'];
						} ?></p>
						<br>
						<p>4)<?php if($P_lt['ParentDetail']['student_name_four']) { 
							echo " ".$P_lt['ParentDetail']['student_name_four']."  ".$P_lt['ParentDetail']['class_four']; 
						}  ?></p>
			<?php }  else { echo "No"; } ?>
	  </td>
	<?php } else {?>
	 <td height="150"><div align="center">9.</div></td>
      <td>Name of the Brothers / Sisters of the studying in PTES with Class and Section </td>
      <td>
		
	  </td>
	<?php } ?>
    </tr>
    
	<tr>
	<?php if(!empty($P_detail)) { ?>
      <td height="135"><div align="center">10.</div></td>
      <td>Educational Qualification of Parent/Guardian </td>
      <td><br><p>&nbsp;Father : <?php echo $P_lt['ParentDetail']['father_qualification']; ?></p><br>
        <p>&nbsp;Mother : <?php echo $P_lt['ParentDetail']['mother_qualification']; ?></p><br>
        <p>&nbsp;Guardian : <?php echo $P_lt['ParentDetail']['guardian_qualification']; ?></p><br>
	</td>
	<?php } else { ?>
		<td height="135"><div align="center">10.</div></td>
      <td>Educational Qualification of Parent/Guardian </td>
      <td><br><p>&nbsp;Father : </p><br>
        <p>&nbsp;Mother :  </p><br>
        <p>&nbsp;Guardian : </p><br>
	</td>
	<?php } ?>
    </tr>
    
	<tr>
      <td height="160"><div align="center">11.</div></td>
      <td><p>Nationality, Religion and Caste </p>
      <p>(Enclosed the Photocopy of Caste certificate)</p></td>
      <td><br><p>&nbsp;Nationality : <?php echo $lt['StudentDetail']['nationality']; ?></p><br>
        <p>&nbsp;Religion :  <?php echo $lt['Religion']['religion']; ?></p><br>
        <p>&nbsp;Caste : <?php echo $lt['Caste']['caste']; ?></p><br>
        <p>&nbsp;Sub Caste : <?php echo $lt['SubCaste']['subcaste']; ?>  </p><br></td>
    </tr>
    
	<tr>
	<?php if(!empty($S_detail)) {  ?> 
      <td height="80"><div align="center">12.</div></td>
      <td>Last school attended by the student, if any </td>
      <td>
		 <?php echo "Yes"; ?>
	</td>
	<?php } else { ?>
		<td height="80"><div align="center">12.</div></td>
		<td>Last school attended by the student, if any </td>
		<td></td>
	<?php } ?>
    </tr>
    
	<tr>
      <td height="80"><div align="center">13.</div></td>
      <td>Mother Tongue of the student </td>
      <td><?php echo $lt['MotherTongue']['mother_tongue']; ?></td>
    </tr>
    
	<tr>
      <td height="80"><div align="center">14.</div></td>
      <td>Whether Vaccinated or not / Blood Group </td>
      <td><div align="center">Vaccinated : <?php echo $lt['StudentDetail']['vaccinated']; ?> / Blood Group : <?php echo $lt['BloodGroup']['blood_group']; ?> </div></td>
    </tr>
    
	<tr>
      <td height="90"><div align="center">15.</div></td>
      <td><p>Aadhar No.</p>
      <p>(Enclosed the Photocopy of Aadhar Card) </p></td>
      <td><?php echo $lt['StudentDetail']['aadhar_card_number']; ?></td>
    </tr>
  </table>
  
  <table width="983">
    <tr>
      <td height="58" colspan="2" style="margin:3px;border:0px solid #000000;" > I request to admit the above mentioned my Son / Daughter to the <span style="text-decoration:underline"><?php echo $lt['AddClass']['class_name']; ?></span> Class /Std. </td>
    </tr>
    <tr>
      <td width="524" height="54" style="margin:3px;border:0px solid #000000;">Date : </td>
      <td width="443" style="margin:3px;border:0px solid #000000;"><div style="vertical-align:bottom" align="right">
        <p>&nbsp;</p>
        <p>Signature of Parent/ Guardian </p>
      </div></td>
    </tr>
  </table>
  <table>
    <tr>
      <td colspan="2" style="border:0px solid #000000"><div align="center" class="style8">For OFFICE USE Only </div></td>
      </tr>
    <tr>
      <td colspan="2" style="border:0px solid #000000"><hr noshade="noshade" /></td>
      </tr>
    <tr>
      <td width="301" height="124" style="border:0px solid #000000"><table>
        <tr  >
          <td  style="border:0px solid #000000"><span class="style15">Date of Birth Certificate </span></td>
          <td></td>
        </tr>
        <tr>
          <td  style="border:0px solid #000000"><span class="style15">Transfer Certificate </span></td>
          <td></td>
        </tr>
        <tr>
          <td  style="border:0px solid #000000"><span class="style15">Caste Certificate </span></td>
          <td></td>
        </tr>
        <tr>
          <td  style="border:0px solid #000000"><span class="style15">Aadhar Photocopy </span></td>
          <td></td>
        </tr>
        <tr>
          <td  style="border:0px solid #000000"><span class="style15">Ration Card photocopy </span></td>
          <td></td>
        </tr>
        <tr>
          <td width="231"  style="border:0px solid #000000"><span class="style15">(BPL / APL)</span></td>
          <td width="36"></td>
        </tr>
      </table></td>
      <td width="668" style="border:0px solid #000000; vertical-align:top;">
		<p align="left" class="style17">If MPM Employee. EC No: 
			<small><?php if($lt['StudentDetail']['mpm_employee']=='MPM') { echo $lt['StudentDetail']['e_c_no']; } ?></small>
		</p>
        <p align="left" class="style17">Whether Direct Dependent of MPM Employee or Outsider :
			<small><?php if($lt['StudentDetail']['mpm_employee']=='MPM') { echo "Yes"; } else { echo "No"; } ?></small>
		</p>
        <p align="left" class="style17">Whether Admitting Under RTE Act : <small><?php if($lt['StudentDetail']['admitting_under_rte']=='yes') { echo "Yes"; } else { echo "No"; } ?></small></p>
        <p align="left" class="style17">School DISE No: <small><?php echo $lt['StudentDetail']['dise_no']; ?></small> </p>
        <p align="left" class="style17">School Student Code : <small><?php echo $lt['StudentDetail']['student_code']; ?> </small> </p>
       </td>
    </tr>
    <tr>
      <td height="112" colspan="2" style="vertical-align:bottom;border:0px solid #000000"><p align="right" class="style17" style="">Signature of Head of the Institution (with seal) </p></td>
      </tr>
  </table>



</div>
<?php } ?>
</body>