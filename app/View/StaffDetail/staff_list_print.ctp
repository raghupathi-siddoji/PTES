<html>
<body onload="print();" onfocus="window.close()">	
	<center><h3>Staff List</h3></center>
					 
						<table width="100%" border="1" style="border-collapse:collapse;font-size:85.0%" onclick="print();"> 
							 
							<thead>
							<tr><th>Emp ID</th><th>Name</th><th>Gender</th><th>DOB</th><th>Qualification</th><th>Mobile</th><th>Email</th><th>Designation</th> </tr>
							</thead>
							<?php	$i=1;	
								foreach($staffList as $list) {
								$id = $list['StaffDetail']['id'];
								?>
									<tr>
										<td><?php echo $list['StaffDetail']['emp_id'];?></td>
										<td><?php echo $list['StaffDetail']['first_name'];?></td>
										<td><?php echo $list['StaffDetail']['gender'];?></td>
										<td><?php echo date('d-m-Y',strtotime($list['StaffDetail']['dob']));?></td>
										<td><?php echo $list['StaffDetail']['qualification'];?></td>
										<td><?php echo $list['StaffDetail']['mobile'];?></td>
										<td><?php echo $list['StaffDetail']['email'];?></td>
										<td><?php echo $list['Designation']['designation'];?></td>	 
									</tr>
								<?php } ?> 
							 </table>
							</body>
						</html>
							