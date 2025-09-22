<?php //print_r($tot_grade);?>
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
<?php foreach($value as $list) { ?>
<body onload="print()">
<div align="center">
  <table  border="1" align="left"  style="border-collapse:collapse" width="100%" onclick="print()">
    <tr>
      <td width="702" height="306">
	  <table width="100%" border="0" style="vertical-align:top" align="center">
        <tr>
          <td width="50" height="144">
		  <p align="left" class="style1">
				<img src="<?php echo $this->webroot."/img/logo.jpg"; ?>" width="120px" height="80px">
		  </p>
            </td>
          <td width="1000"><p align="center" class="style1">MPM EDUCATION SOCIETY </p>
            <p align="center" class="style2">PAPER TOWN ENGLISH SCHOOL </p>
            <p align="center" class="style1">Paper Town, Bhadravathi-577302</p>
            <p align="center" class="style8">Report Card</p>
            <p align="center" class="style9">Test / Examination : <?php echo $list['CreateExam']['exam_type']; ?></p>
		</td>
        </tr>
      </table>
        <table width="100%"  align="center" style="vertical-align:top">
          <tr>
            <td width="696" height="201"><div align="center" >
              <table width="100%" border="0">
                <tr>
                  <td width="324">
					<p align="left">Student Code : <?php echo $list['StudentDetail']['student_code']; ?></p>
					<p align="left">Student Name : <?php echo $list['StudentDetail']['student_name']; ?></p>
                      <p align="left">Class : <?php echo $list['AddClass']['class']; ?></p>
					</td>
                  <td width="357"><p align="right">Academic Year : <?php echo $list['AcademicYear']['academic_year']; ?></p>
                      <p align="right">Date : <?php echo date('d-m-y'); ?></p></td>
                </tr>
              </table>
			  <br>
              <table width="100%" height="96"  border="1"style="border-collapse:collapse">
                <tr>
                  <th width="359" height="29">Subject</th>
				  <th>Max Marks</th><th>Marks Secured</th><th>Grade</th>
                </tr>
				<?php if($list['AddClass']['class']==8 || $list['AddClass']['class']==9 || $list['AddClass']['class']==10) { ?>
						<?php $total=0; $total_secured=0;
						for($i=1;$i<=10;$i++) { ?>
					<tr align="center">
						<?php if(!empty($list['SubjectAllocation']["sub$i"])) { 
							if($i==1) { ?><td><?php if(!empty($lang)) { echo $l['LanguageAllocation']['language_1']; }  ?></td>
							<?php } else if($i==2) { ?><td><?php if(!empty($lang)) { echo $l['LanguageAllocation']['language_2']; } ?></td>
							<?php } else if($i==3) { ?><td><?php if(!empty($lang)) { echo $l['LanguageAllocation']['language_3']; }  ?></td>
							<?php } else { ?> <td><?php  echo $list['SubjectAllocation']["sub$i"]; } ?></td>
							
							<?php $total_secured=$total_secured+round($list['MarksEntry']["marks$i"]/$percent); ?>
							<td><?php echo round($list['CreateExam']['max_marks']/$percent); $total=$total+round($list['CreateExam']['max_marks']/$percent);  ?></td>
							<td><?php  echo round($list['MarksEntry']["marks$i"]/$percent); ?></td>
							<td>
							<?php foreach($grade as $g)
							{
								if(($g['GradeSetting']['from_marksA+']>=(round($list['MarksEntry']["marks$i"]/$percent))) && ($g['GradeSetting']['to_marksA+']<=(round($list['MarksEntry']["marks$i"]/$percent))))
									echo $g['GradeSetting']['gradeA+'];
								
								else if(($g['GradeSetting']['from_marksA']>=(round($list['MarksEntry']["marks$i"]/$percent))) && ($g['GradeSetting']['to_marksA']<=(round($list['MarksEntry']["marks$i"]/$percent))))
									echo$g['GradeSetting']['gradeA'];
								
								else if(($g['GradeSetting']['from_marksB+']>=(round($list['MarksEntry']["marks$i"]/$percent))) && ($g['GradeSetting']['to_marksB+']<=(round($list['MarksEntry']["marks$i"]/$percent))))
									echo $g['GradeSetting']['gradeB+'];
								
								else if(($g['GradeSetting']['from_marksB']>=(round($list['MarksEntry']["marks$i"]/$percent))) && ($g['GradeSetting']['to_marksB']<=(round($list['MarksEntry']["marks$i"]/$percent))))
									echo $g['GradeSetting']['gradeB'];
								
								else
									echo $g['GradeSetting']['gradeC'];
							} ?>
						</td>
						<?php } ?>
					</tr>
					<?php } ?>
					<?php } else { ?>
					<?php $total=0; $total_secured=0;
						for($i=1;$i<=10;$i++) { ?>
					<tr align="center">
						<?php if(!empty($list['SubjectAllocation']["sub$i"])) { 
							$total_secured=$total_secured+round($list['MarksEntry']["marks$i"]/$percent); ?>
							<td><?php  echo $list['SubjectAllocation']["sub$i"]; ?></td>
							<td><?php echo round($list['CreateExam']['max_marks']/$percent); $total=$total+round($list['CreateExam']['max_marks']/$percent);  ?></td>
							<td><?php  echo round($list['MarksEntry']["marks$i"]/$percent); ?></td>
							<td>
							<?php foreach($grade as $g)
							{
								if(($g['GradeSetting']['from_marksA+']>=(round($list['MarksEntry']["marks$i"]/$percent))) && ($g['GradeSetting']['to_marksA+']<=(round($list['MarksEntry']["marks$i"]/$percent))))
									echo $g['GradeSetting']['gradeA+'];
								
								else if(($g['GradeSetting']['from_marksA']>=(round($list['MarksEntry']["marks$i"]/$percent))) && ($g['GradeSetting']['to_marksA']<=(round($list['MarksEntry']["marks$i"]/$percent))))
									echo$g['GradeSetting']['gradeA'];
								
								else if(($g['GradeSetting']['from_marksB+']>=(round($list['MarksEntry']["marks$i"]/$percent))) && ($g['GradeSetting']['to_marksB+']<=(round($list['MarksEntry']["marks$i"]/$percent))))
									echo $g['GradeSetting']['gradeB+'];
								
								else if(($g['GradeSetting']['from_marksB']>=(round($list['MarksEntry']["marks$i"]/$percent))) && ($g['GradeSetting']['to_marksB']<=(round($list['MarksEntry']["marks$i"]/$percent))))
									echo $g['GradeSetting']['gradeB'];
								
								else
									echo $g['GradeSetting']['gradeC'];
							} ?>
						</td>
						<?php } ?>
					</tr>
					<?php } } ?>
					<tr align="center">
						<td></td>
						<th align="right">Total : <?php echo $total; ?></th>
						<th align="right">Marks Secured : <?php echo $total_secured; ?></th>
						<th align="right">Grade
					<?php foreach($tot_grade as $g1)
							{
								if(($g1['GradeSetting']['from_marksA+']>=$total_secured) && ($g1['GradeSetting']['to_marksA+']<=$total_secured))
									echo $g1['GradeSetting']['gradeA+'];
								
								else if(($g1['GradeSetting']['from_marksA']>=$total_secured) && ($g1['GradeSetting']['to_marksA']<=$total_secured))
									echo$g1['GradeSetting']['gradeA'];
								
								else if(($g1['GradeSetting']['from_marksB+']>=$total_secured) && ($g1['GradeSetting']['to_marksB+']<=$total_secured))
									echo $g1['GradeSetting']['gradeB+'];
								
								else if(($g1['GradeSetting']['from_marksB']>=$total_secured) && ($g1['GradeSetting']['to_marksB']<=$total_secured))
									echo $g1['GradeSetting']['gradeB'];
								
								else
									echo $g1['GradeSetting']['gradeC'];
							} ?>
					
						</th>
					</tr>
				</table>
              </div></td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
</div>
<?php } ?>
</body>