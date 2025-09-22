<style type="text/css">

.style1 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: medium;
}
.style2 {font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 30px; }
.style7 {font-size: large}
.style8 {
	font-family: Calibri;
	font-size: 24px;
	text-decoration:underline;
}
.style9 {font-size: medium}
p
{
line-height:7px;
}
</style>
<body onload="print()">
<table height="193" border="1" style="border-collapse:collapse" onclick="print()">
  <tr>
    <td width="1010">
	<?php foreach($list as $details) { ?>
       <table border="0">
    <tr>
      <td width="217" height="91" style="border:0px solid #000000; vertical-align:top">
		<div align="left">
<img src="<?php echo $this->webroot."/img/logo.jpg"; ?>" width="80px" height="80px">		</div>
	</td>
	   
      <td width="810" style="border:0px solid #000000;">
	  <div align="center">
	  	<p class="style1">MPM EDUCATION SOCIETY </p>
  		<p class="style2">PAPER TOWN ENGLISH SCHOOL </p>
  		<p class="style1">Paper Town, Bhadravathi-577302</p>
  	   </div>	   </td>
      
	  <td width="100" rowspan="2" style="border:0px solid #000000;vertical-align:top">
	  </td>
   </tr>
   
  <tr>
      <table width="100%" height="50" border="0">
        <tr>
          <td></td>
          <td width="244"></td>
          <td align="right">Month : 
			<?php if($details['StaffAttendanceDetail']['month']==1 ) 
									echo "January";
								else if($details['StaffAttendanceDetail']['month']==2)
									echo "Febrauary";
								else if($details['StaffAttendanceDetail']['month']==3)
									echo "March";
								else if($details['StaffAttendanceDetail']['month']==4)
									echo "April";
								else if($details['StaffAttendanceDetail']['month']==5)
									echo "May";
								else if($details['StaffAttendanceDetail']['month']==6)
									echo "June";
								else if($details['StaffAttendanceDetail']['month']==7)
									echo "July";
								else if($details['StaffAttendanceDetail']['month']==8)
									echo "August";
								else if($details['StaffAttendanceDetail']['month']==9)
									echo "September";
								else if($details['StaffAttendanceDetail']['month']==10)
									echo "October";
								else if($details['StaffAttendanceDetail']['month']==11)
									echo "November";
								else if($details['StaffAttendanceDetail']['month']==12)
									echo "December"; ?>
		  </td>
        </tr>
      </table>
	  <?php break; } ?>
	  <table width="1200" height="63" border="1" style="border-collapse:collapse"> 
				<tr>
					<th>Sl.No</th>
					 <th>Name</th>
					 <?php foreach($list as $l) { ?>
					<?php for($i=1;$i<=31;$i++) { ?>
					
					<?php if($l['StaffAttendance']["day$i"]!='N') { ?>
					<th align="center"><?php  echo $i; ?></th> <?php }  ?>
					<?php } break; } ?>
					<th>Total Day</th>
					<th>Attended / Wroking</th>
				</tr>
			
			<?php $i=0;
				$serial_number=1; foreach($list as $attend) { ?>
				<tr>
					<td><?php echo $serial_number++; ?></td>
					<td><?php echo $attend['StaffDetail']['first_name']; ?></td>
					<?php $total_working_day=0; $attended=0; $total_day=0;
					for($a=1;$a<=31;$a++) 
					{  
						if($attend['StaffAttendance']["day$a"]!='N') {
							$total_day++;
						
						if($attend['StaffAttendance']["day$a"]!='H' && $attend['StaffAttendance']["day$a"]!='SH' && $attend['StaffAttendance']["day$a"]!='LH'
						&& $attend['StaffAttendance']["day$a"]!='RH' && $attend['StaffAttendance']["day$a"]!='NH' &&  $attend['StaffAttendance']["day$a"]!='OH'
						&&  $attend['StaffAttendance']["day$a"]!='S')
							{ $total_working_day++; ?>
							
								<?php if($attend['StaffAttendance']["day$a"]=='P' || $attend['StaffAttendance']["day$a"]=='OD'){ ?>
									<td style="color:green;"><?php $attended++; echo $attend['StaffAttendance']["day$a"];  ?></td>
									
								<?php } else if($attend['StaffAttendance']["day$a"]=='HD'){ ?>
									<td style="color:red;"><?php $attended= $attended + 0.5 ; echo $attend['StaffAttendance']["day$a"];  ?></td>
								
								<?php } else { ?> 
									<td style="color:red"><?php echo $attend['StaffAttendance']["day$a"]; ?></td><?php } ?>
					<?php }	else { ?>
							   <td style="color:blue"><?php echo $attend['StaffAttendance']["day$a"]; ?></td>
					<?php } } } ?>
					<td><?php echo $total_day; ?></td>
					<td><?php echo $attended."/".$total_working_day; ?></td>
				</tr>
				<?php 
				$i++;
				} ?>
	  </table>
    </td>
  </tr>
</table>
</body>