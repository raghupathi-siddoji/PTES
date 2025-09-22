
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
<div align="center">
  <table  border="1" align="left"  style="border-collapse:collapse" width="100%" onclick="print()" >
    <tr>
      <td width="702">
	  <table width="100%" border="0" style="vertical-align:top" align="center">
        <tr>
          <td width="50">
		  <p align="left" class="style1">
				<img src="<?php echo $this->webroot."/img/logo.jpg"; ?>" width="80px" height="80px">
		  </p>
            </td>
          <td width="1000"><p align="center" class="style1">MPM EDUCATION SOCIETY </p>
            <p align="center" class="style2">MPMES INDP PU COLLEGE</p>
            <p align="center" class="style1">Paper Town, Bhadravathi-577302</p> 
			<p align="center" class="style8">Book Publisher Details</p>
		</td>
        </tr>
      </table>
	  <p></p>
        <table width="100%" border="1" style="border-collapse:collapse" align="center" style="vertical-align:top">
				<thead>
				<tr align="center"><th>#</th><th>Publisher Name </th><th>Address</th><th>City</th><th>State</th>
				<th>Contact</th><th>Email</th><th>Fax</th></tr>
				</thead>
				<?php 
					$i=1;
					foreach($list as $publisher_list)
					{
					?>
				<tr align="center">
					<td><?php echo $i++;?></td>
					<td><?php echo $publisher_list['BookPublisher']['publisher_name'] ; ?> </td>
					<td><?php echo $publisher_list['BookPublisher']['address']."-".$publisher_list['BookPublisher']['pincode']?></td>
					<td><?php echo $publisher_list['BookPublisher']['city']; ?></td>
					<td><?php echo $publisher_list['BookPublisher']['state']; ?></td>
					<td><?php echo $publisher_list['BookPublisher']['contact'];?> </td>
					<td><?php echo $publisher_list['BookPublisher']['email'];?></td>
					<td><?php echo $publisher_list['BookPublisher']['fax_no'];?></td>
				</tr>
				
					<?php }?>
				</table>
</td>
</tr>
</table>
</div>
</body>
								