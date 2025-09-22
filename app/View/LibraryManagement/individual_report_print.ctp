
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
				<img src="<?php echo $this->webroot."/img/logo.jpg"; ?>" width="120px" height="80px">
		  </p>
            </td>
          <td width="1000"><p align="center" class="style1">MPM EDUCATION SOCIETY </p>
            <p align="center" class="style2">PAPER TOWN ENGLISH SCHOOL </p>
            <p align="center" class="style1">Paper Town, Bhadravathi-577302</p> 
		</td>
        </tr>
      </table>
	  <p></p>
	   <?php foreach($book_list as $lt) ?>
	  <table width="100%">
		<tr><td>Student Name: <?php echo $lt['StudentDetail']['student_name']; ?></td></tr>
		<tr><td>Student Code: <?php echo $lt['StudentDetail']['student_code']; ?></td></tr>
		<tr><td>Class: <?php echo $lt['AddClass']['class']; ?></td></tr>
	  </table>
        <table width="100%" border="1" style="border-collapse:collapse" align="center" style="vertical-align:top">
				<thead>
				<tr align="center"><th>Sl.No</th><th>Unique Code</th><th>Book Code</th><th>Book Name</th><th>Author</th>
				<th>Issued Date</th><th>Return Date</th><th>Book Remark</th></tr>
				</thead>
				
				<?php $i=1; foreach($book_list as $l) { ?>
				<tr  align="center">
					<td><?php echo $i++;?></td>
					<td><?php echo $l['BookDetail']['book_unique_code']; ?></td>
					<td><?php echo $l['BookDetail']['book_code']; ?></td>
					<td><?php echo $l['BookDetail']['title']; ?></td>
					<td><?php echo $l['BookAuthor']['author_name_one']; ?></td>
					<td><?php echo date('d-M-y',strtotime($l['BookIssue']['issue_date'])); ?></td>
					<td><?php echo date('d-M-y',strtotime($l['BookIssue']['return_date'])); ?></td>
					<td><?php if($l['BookIssueDetail']['book_status']=='book_issued') 
								echo "Issued";
							else 
								echo "Returned"; ?></td>
				</tr>
				<?php } ?>
				</table>
</td>
</tr>
</table>
</div>
</body>