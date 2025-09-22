 <html>
<head>

</head>

<body onload="print();" onfocus="window.close()">
 <center><h4>LIST OF  <?php echo strtoupper($asset_list[0]['AssetCategory']['category']);?> ASSET </h4> </center>
						 
<!--DISPLAY START -->
	<table width="100%" style="border-collapse:collapse;" border="1">
	  <tr style="background:#999999;color:white" align="center">
		<td>Sl.No</td>
		<td>Asset Name</td>
		<td>Total Asset</td>
		<td>Working Asset</td>
		<td>Damage Asset</td>
		<td>Purchase Date</td>
		<td>Brand</td> 
	  </tr> 
	  <?php 
		$i=1;
	  foreach($asset_list as $list):?>
		  <tr align="center">
			<td><?php echo $i++;?></td>
			<td><?php echo $list['Asset']['asset_name'];?></td>
			<td><?php echo $list['Asset']['total_asset'];?></td>
			<td><?php echo $list['Asset']['working_asset'];?> </td>
			<td><?php echo $list['Asset']['damaged_asset'];?> </td>
			<td><?php echo date('d-m-Y',strtotime($list['Asset']['purchased_date']));?> </td>
			<td><?php echo $list['Asset']['brand'];?> </td>
		  </tr> 
	  <?php endforeach;?>
	</table> 

</body>

</html>