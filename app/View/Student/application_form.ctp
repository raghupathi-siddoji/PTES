
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
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
	
<section class="content">
 <?php foreach($detail as $lt) { ?>
	
    <div class="box box-success">
       <div class="box-body">
            <div class="form-group">
				<div class="row">
				 <div class="col-sm-12">
<div align="center">
<table onclick="print()">
<tr>
<td width="1004" height="215">
  
  <table border="0">
    <tr>
      <td width="217" height="91" style="border:0px solid #000000; vertical-align:top">
		<div align="center">
<img src="<?php echo $this->webroot."/img/logo.jpg"; ?>" width="110px" height="80px">		</div>
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
				<td width="171" height="144"><div align="center"></div></td></tr>
		</table>	  </td>
   </tr>
   
   <tr>
      <td height="104" colspan="2" style="border:0px solid #000000;vertical-align:top;"><table border="0" align="right">
          <tr>
            <td width="290" height="100"><p class="style18">Application No:<?php echo $lt['StudentApplication']['application_no']; ?> </p>
              <p class="style18">Admission  No:____________</p>
              <p class="style18">Student Code : ____________</p>
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
      <td width="30" height="51"><div align="center">1.</div></td>
      <td width="296">Name of the Student </td>
      <td width="666"><div align="left" style="text-transform: uppercase;"><?php echo $lt['StudentApplication']['student_name']?></div></td>
    </tr>
    <tr>
      <td height="51"><div align="center">2.</div></td>
      <td>Sex of the student </td>
      <td><div align="center">Male  / Female   </div></td>
    </tr>
    <tr>
      <td height="190"><div align="center">3.</div></td>
      <td><p>Date of the Birth of the Student </p>
      <p>(Enclosed Photocopy of Birth Certificate)</p></td>
      <td> 
	  	<ul>
			<li id="li"></li>
			<li id="li"></li> 
			<li id="li" style="margin:3px;border:0px solid #000000;"></li>
			<li id="li"></li>
			<li id="li"></li>
			<li id="li" style="margin:3px;border:0px solid #000000;"></li>
			<li id="li"></li>
			<li id="li"></li>
			<li id="li"></li>
			<li id="li"></li>
		</ul>
		<p><br></p><br>
		<p> &nbsp; (In Words)___________________________________________________ day of<br />
		  <br>&nbsp;_____________________________________________________________ month of<br /><br>
		   &nbsp;_____________________________________________________________ year<br>
		  </p></td>
    </tr>
    <tr>
      <td height="103"><div align="center">4.</div></td>
      <td>Permanent address of student </td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td height="150"><div align="center">5.</div></td>
      <td>Name of the Mother , Father and Guardian (if any) </td>
      <td> <br><p>&nbsp;Mother Name : ___________________________________________</p><br>
        <p>&nbsp;Father Name :  ____________________________________________ </p><br>
        <p>&nbsp;Guardian Name : __________________________________________ </p><br></td>
    </tr>
    <tr>
      <td height="150"><div align="center">6.</div></td>
      <td>Occupation of Parents / Guardian and Annual Income </td>
      <td> <br><p>&nbsp;Father : __________________________________________________</p><br>
        <p>&nbsp;Mother (If Employed) : ______________________________________</p><br>
        <p>&nbsp;Guardian : _________________________________________________ </p><br>
		<p>&nbsp;Annual Income : _____________________________________________</p><br>
	</td>
    </tr>
    <tr>
      <td height="172"><div align="center">7.</div></td>
      <td>Present address of Parent/Guardian </td>
      <td>
		<p id="addr">&nbsp;</p>
        <p>&nbsp;</p>
        <p id="addr">&nbsp;Mobile No:</p>
        <p style="vertical-align:bottom">&nbsp;eMail Id:</p>
	  </td>
    </tr>
    <tr>
      <td height="190"><div align="center">8.</div></td>
      <td>If the Father / Mother is Employee of the MPM Ltd., furnish the details </td>
      <td><br> <p>&nbsp;Father / Mother Name: ________________________________________</p><br>
        <p>&nbsp;1) Department : ______________________________________________</p><br>
        <p>&nbsp;2) Designation : ______________________________________________</p><br>
        <p>&nbsp;3) E.C.No : _________________________________________________   </p><br></td>
    </tr>
    <tr>
      <td height="150"><div align="center">9.</div></td>
      <td>Name of the Brothers / Sisters of the studying in PTES with Class and Section </td>
      <td><br><p>&nbsp;1) ________________________________________________________</p><br>
        <p>&nbsp;2) ________________________________________________________</p><br>
        <p>&nbsp;3) ________________________________________________________   </p><br>
        <p>&nbsp;4) ________________________________________________________   </p><br>
        </td>
    </tr>
    <tr>
      <td height="135"><div align="center">10.</div></td>
      <td>Educational Qualification of Parent/Guardian </td>
      <td><br><p>&nbsp;Father : _____________________________________________________</p><br>
        <p>&nbsp;Mother : _____________________________________________________</p><br>
        <p>&nbsp;Guardian : ____________________________________________________</p><br>
	</td>
    </tr>
    <tr>
      <td height="160"><div align="center">11.</div></td>
      <td><p>Nationality, Religion and Caste </p>
      <p>(Enclosed the Photocopy of Caste certificate)</p></td>
      <td><br><p>&nbsp;Nationality : ____________________________________________________</p><br>
        <p>&nbsp;Religion :  ______________________________________________________</p><br>
        <p>&nbsp;Caste : ________________________________________________________</p><br>
        <p>&nbsp;Sub Caste : _____________________________________________________  </p><br></td>
    </tr>
    <tr>
      <td height="80"><div align="center">12.</div></td>
      <td>Last school attended by the student, if any </td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td height="80"><div align="center">13.</div></td>
      <td>Mother Tongue of the student </td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td height="80"><div align="center">14.</div></td>
      <td>Whether vaccinated or not / Blood Group </td>
      <td><div align="center">Vaccinated / Not Vaccinated / Blood Group : ________ </div></td>
    </tr>
    <tr>
      <td height="90"><div align="center">15.</div></td>
      <td><p>Aadhar No.</p>
      <p>(Enclosed the Photocopy of Aadhar Card) </p></td>
      <td>&nbsp;</td>
    </tr>
  </table>
  <table width="983">
    <tr>
      <td height="58" colspan="2" style="margin:3px;border:0px solid #000000;" > I request to admit the above mentioned my Son / Daughter to the ________ Class /Std. </td>
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
      <td width="668" style="border:0px solid #000000; vertical-align:top;"><p align="left" class="style17">If MPM Employee. EC No:__________________________________</p>
        <p align="left" class="style17">Whether Direct Dependent of MPM Employee or Outsider :___________</p>
        <p align="left" class="style17">Whether Admitting Under RTE Act :_________________________</p>
        <p align="left" class="style17">School DISE No: 2915011506 (Primary) / 29150117504 (High) </p>
        <p align="left" class="style17">School Student Code :_______________________________________</p>
       </td>
    </tr>
    <tr>
      <td height="112" colspan="2" style="vertical-align:bottom;border:0px solid #000000"><p align="right" class="style17" style="">Signature of Head of the Institution (with seal) </p></td>
      </tr>
  </table>



</div>
</div>
</div>
</div>
</div>
</div>
<?php } ?>
</section>
</div>
</body>