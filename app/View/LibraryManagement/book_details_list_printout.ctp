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
  <table  border="1" align="left"  style="border-collapse:collapse" width="100%" onclick="print()">
    <tr>
      <td width="702" height="306">
	  <table width="100%" border="0" style="vertical-align:top" align="center">
        <tr>
          <td width="50" height="144">
		  <p align="left" class="style1">
				<img src="<?php echo $this->webroot."/img/logo.jpg"; ?>" width="80px" height="80px">
		  </p>
            </td>
          <td width="1000"><p align="center" class="style1">MPM EDUCATION SOCIETY </p>
            <p align="center" class="style2">PAPER TOWN ENGLISH SCHOOL </p>
            <p align="center" class="style1">Paper Town, Bhadravathi-577302</p>
            <p align="center" class="style8">Library Book Details</p>
		</td>
        </tr>
      </table>
				<table width="100%" style="border-collapse:collapse" border="1">
				<thead align="center">
					<tr><th>Sl.no</th><th>Unique Code</th><th>Book Code</th><th>Title </th><th>Category</th><th>Author</th><th>Language</th><th>Publisher</th><th>Cost</th>
					<th>Bill No</th><th>Condition</th><th></th></tr>				
				</thead>
				<?php 
					//print_r($list as $values);
					$i=1;
					foreach($books as $values)
					{
					$id=$values['BookDetail']['id'];
					$book_id=$values['BookDetail']['book_code'];
				?>
				<tr align="center">
					<td><?php echo $i++;?></td>
					<td><?php echo $values['BookDetail']['book_unique_code'];?></td>
					<td><?php echo $values['BookDetail']['book_code'];?></td>
					<td><?php echo $values['BookDetail']['title'];?></td>
					<td><?php echo $values['BookCategory']['category_name'];?></td>
					<td><?php echo $values['BookAuthor']['author_name_one'];?></td>
					<td><?php echo $values['BookLanguage']['language'];?></td>
					<td><?php echo $values['BookPublisher']['publisher_name'];?></td>
					<td><?php echo $values['BookDetail']['price'];?></td>
					<td><?php echo $values['BookDetail']['bill_no'];?></td>
					<td><?php echo $values['BookDetail']['condition'];?></td>
				</tr>
				
					
					<?php } ?> 
				
				</table>
								
			</td>
		</tr>
	</table>
</div>
</body>