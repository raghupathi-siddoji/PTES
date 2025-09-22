<html>

	<body onload="print();" onfocus="close();">
	<center><h3>Co Curricular Activity Details</h3></center>
	<table width="100%" border="0">
		<tr>
			<td width="10%">Student Name:</td>
			<td><?php echo $co_curricular_list[0]['StudentDetail']['student_name'];?></td>
			<td width="20%">Academic Year:</td>
			<td><?php echo $co_curricular_list[0]['AcademicYear']['academic_year'];?></td> 
			<td width="10%">Class:</td>
			<td><?php echo $co_curricular_list[0]['StudentDetail']['add_class_id'];?></td> 
		</tr>
		 
	</table>  
	<table width="100%" border="1" style="border-collapse:collapse">
	  <tr align="center" bgcolor="#666666">
		<td width="10%"><span class="style4">#</span></td>
		<td width="21%"><span class="style4">Activity Name </span></td>
		<td width="11%"><span class="style4">Secured Place </span></td>
		<td width="14%"><span class="style4">Date</span></td>
		<td width="18%"><span class="style4">Organized  By </span></td>
		<td width="35%"><span class="style4">Details</span></td>
	  </tr>
		<?php $i=1;
		foreach($co_curricular_list as $list):?>
		  <tr>
			<td><?php echo $i++;?></td>
			<td><?php echo $list['ActivitieSetting']['activity_name'];?></td>
			<td><?php echo $list['CoCurricular']['secured_place'];?></td>
			<td><?php echo date('d-m-Y',strtotime($list['CoCurricular']['activities_date']));?></td>
			<td><?php echo $list['CoCurricular']['hosted_by'];?></td>
			<td><?php echo $list['CoCurricular']['details'];?></td>
		  </tr>
		<?php endforeach;?>
	</table>
	
	</body>					 
 </html>

	
<style type="text/css">
<!--
.style4 {color: #FFFFFF; font-weight: bold; }
-->
</style>

 