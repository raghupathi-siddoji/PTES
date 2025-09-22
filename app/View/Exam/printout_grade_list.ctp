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
<table height="193" border="1" style="border-collapse:collapse" width="100%" onclick="print()">
  <tr>
    <td width="1010">
	<?php foreach($marks as $details) { ?>
     <table width="100%" height="50" border="0">
		<tr>
		<td width="1000" colspan="2">
			<table width="100%" border="0" style="vertical-align:top" align="center">
			<tr>
				<td width="111">
					<img src="<?php echo $this->webroot."/img/logo.jpg"; ?>" width="120px" align="left" class="style1" height="80px">
				</td>
				<td width="1000">
					 <div align="center">
	  	<p class="style1">MPM EDUCATION SOCIETY </p>
  		<p class="style2">PAPER TOWN ENGLISH SCHOOL </p>
  		<p class="style1">Paper Town, Bhadravathi-577302</p>
  	   </div>
				</td>
				<td></td>
			</tr>
			</table>
		</td>
		</tr>
	<table>
	<table width="100%">
		 <tr>
          <td>Academic Year : <?php echo $details['AcademicYear']['academic_year']; ?></td>
          <td>Class: <?php echo $details['AddClass']['class']; ?></td>
		  <td align="right">Test / Examination : <?php echo $details['CreateExam']['exam_type']; ?></td>
		</tr>
      </table>
	<?php break; } ?>
				<table  width="100%" height="63" border="1" style="border-collapse:collapse">
					<thead>
						<tr align="center">
						 <th>Sl.No</th>
						<th>Name</th>
					<?php $no_subject=1; foreach($marks as $mark) { 
								for($i=1;$i<=10;$i++) {
									if(!empty($mark['SubjectAllocation']["sub$i"])) { ?>
										<th><?php $no_subject++;
											echo $mark['SubjectAllocation']["subcode$i"]; ?></th>
						<?php } } break; } ?>
						</tr>
					</thead>
					
					
					<tbody>
					<?php $number=1; 
						foreach($marks as $mark_data) { ?>
						<tr align="center">
						<td><?php echo $number++; ?></td>
						<td width="120"><?php echo $mark_data['StudentDetail']['student_name']; ?></td>
						<?php 
							for($count=1;$count<$no_subject;$count++) { ?>
						<td>
							<?php foreach($grade as $g)
							{
								if(($g['GradeSetting']['from_marksA+']>=(round($mark_data['MarksEntry']["marks$count"]/$percent))) && ($g['GradeSetting']['to_marksA+']<=(round($mark_data['MarksEntry']["marks$count"]/$percent))))
									echo $g['GradeSetting']['gradeA+']." (".number_format($mark_data['MarksEntry']["marks$count"]/$percent,2).")";
								
								else if(($g['GradeSetting']['from_marksA']>=(round($mark_data['MarksEntry']["marks$count"]/$percent))) && ($g['GradeSetting']['to_marksA']<=(round($mark_data['MarksEntry']["marks$count"]/$percent))))
									echo$g['GradeSetting']['gradeA']." (".number_format($mark_data['MarksEntry']["marks$count"]/$percent,2).")";
								
								else if(($g['GradeSetting']['from_marksB+']>=(round($mark_data['MarksEntry']["marks$count"]/$percent))) && ($g['GradeSetting']['to_marksB+']<=(round($mark_data['MarksEntry']["marks$count"]/$percent))))
									echo $g['GradeSetting']['gradeB+']." (".number_format($mark_data['MarksEntry']["marks$count"]/$percent,2).")";
								
								else if(($g['GradeSetting']['from_marksB']>=(round($mark_data['MarksEntry']["marks$count"]/$percent))) && ($g['GradeSetting']['to_marksB']<=(round($mark_data['MarksEntry']["marks$count"]/$percent))))
									echo $g['GradeSetting']['gradeB']." (".number_format($mark_data['MarksEntry']["marks$count"]/$percent,2).")";
								
								else
									echo $g['GradeSetting']['gradeC']." (".number_format($mark_data['MarksEntry']["marks$count"]/$percent,2).")";
							} ?>
						</td>
								
						<?php } ?>
						</tr>
					<?php } ?>
					</tbody>
				</table>
			</td>
		</tr>
	</table> 
</body>