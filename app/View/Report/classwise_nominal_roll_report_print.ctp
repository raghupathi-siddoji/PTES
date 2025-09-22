<html>
<head>

</head>

<body onload="print();" onfocus="window.close()">					 
							<center><h4>NOMINAL ROLL FOR THE ACADEMIC YEAR: <?php echo $nominal_roll_list[0]['AcademicYear']['academic_year'];?> & CLASS: <?php echo $nominal_roll_list[0]['AddClass']['class_name'];?></h4></center>
						 
						 
						<!--DISPLAY START -->
							<table width="100%" border="1" style="border-collapse:collapse" onclick="print();">
							  <tr style="background:#999999;color:white" align="center">
								<td>Sl.No</td>
								<td>Student Name</td>
								<td>Student Code</td>
								<td>Admission No</td>
								<td>Father Name</td>
								<td>Mother Name</td>
								<td>DOB</td>
								<td>Caste/Subcaste</td>
								<td>Mother Tongue</td>
								<td>Mobile No</td> 
							  </tr>
							  <?php 
							  $i=1;
							  $j=0;
							  $father_name= "-";
							  $mother_name = "-";
							  $mobile_no = "";
							  foreach($nominal_roll_list as $list): 
								 $father_name= $list['ParentDetail'][0]['father_name'];
								 $mother_name = $list['ParentDetail'][0]['mother_name'];
								 $mobile_no = $list['ParentDetail'][0]['mobile_no'];
							  ?>
							  <tr align="left">
								<td><?php echo $i;?></td>
								<td><?php echo $list['StudentDetail']['student_name'];?> </td>
								<td><?php echo $list['StudentDetail']['student_code'];?> </td>
								<td><?php echo $list['StudentDetail']['admission_number'];?> </td>
								<td><?php echo $father_name;?> </td>
								<td><?php echo $mother_name;?> </td>
								<td><?php echo date('d-m-Y',strtotime($list['StudentDetail']['dob']));?> </td>
								<td><?php echo $list['Caste']['caste'];?>/<?php echo $list['SubCaste']['subcaste'];?> </td>
								<td><?php echo $list['MotherTongue']['mother_tongue'];?> </td>
								<td><?php echo $mobile_no;?> </td>
							  </tr> 
							  <?php $i++;$j++;endforeach;?>
							  
							  </body>

</html>
						 
      