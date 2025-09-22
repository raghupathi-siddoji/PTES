  <?php if(!empty($lang))
	foreach($lang as $l) ?>
 <style type="text/css">
table,th,td
{
	border-collapse:collapse;
	margin:5px;
}
.style1 {font-family: Calibri; text-align:center;}
.style5 {font-family: Calibri}
.style6 {text-align: center}
#id1
{
width:998;
height:550;
border:2px solid #000000;
}
.style11 {font-size: 18px}
.style13 {font-size: 20px}
p
{
margin:1px;
}
</style> 
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
   <section class="content-header">
	  <h1>Examination</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Exam</a></li>
        <li class="active">Marks Entry</li>
      </ol>
    </section>
	
    <!-- Main content -->
    <section class="content">
<!-------------->
<div class="row">	
	<div class="col-md-12">
        <div class="box">
			<div class="box-body">
			<?php foreach($value as $list) { 
			$student_code=$list['StudentDetail']['student_code'];
			$clas_id=$list['AddClass']['id'];?>
<div class="row">
		<div class="col-md-10"></div>
		<div class="col-md-1">
			<?php echo $this->Html->link('<i class="btn btn-warning btn-sm pull-right">Cancel</i>',
			array('controller'=>'Exam','action'=>'getMarksCard'),array('escape'=>false))?>
		</div>
		<div class="col-md-1">
			<?php echo $this->Html->link('<i class="btn btn-info btn-sm pull-right">Print</i>',
			array('controller'=>'Exam','action'=>'getMarksCardPrint',$student_code,$clas_id),array('escape'=>false,'target'=>'_blank'))?> </h4>
		 </div>
	</div>
<table width="1011"  id="id1">
<tr><td width="1001" height="610">
<table width="984" height="580" border="1" align="center">
  <tr>
    <td height="33" colspan="14"><table width="976" border="0">
      <tr>
        <td width="300"><span class="style1">Name : <?php echo $list['StudentDetail']['student_name'];?>  </span></td>
        <td width="371"><span class="style11">Part A: Academic Excellance Progress Report </span></td>
        <td width="200" align="center"><span class="style1">Class : <?php echo $list['AddClass']['class_name']; ?></span></td>
        <td width="200" align="right"><span class="style1">Student Code : <?php echo $list['StudentDetail']['student_code']; ?></span></td>
      </tr><?php break; } ?>
    </table></td>
  </tr>
  <tr>
	<td width="140"></td>
	<td colspan="5"><div align="center" class="style5">First Semester</div></td>
	<td colspan="5"><div align="center" class="style5">Second Semester</div></td>
	<td colspan="5"></td>
  </tr>
  <tr>
    <td width="140" rowspan="2"><div align="center" class="style5">Subjects</div></td>
    <td width="55" height="37"><div align="center" class="style5"><span class="style6">FA-1 </span></div></td>
    <td width="55"><div align="center" class="style5"><span class="style6">FA-2</span></div></td>
    <td width="55"><div align="center" class="style5"><span class="style6">Total FA </span></div></td>
    <td width="55"><div align="center" class="style5"><span class="style6">SA-1</span></div></td>
    <td width="67" rowspan="2"><p class="style1">Total (FA+SA) 50% </p></td>
    <td width="55" height="37"><div align="center" class="style5"><span class="style6">FA-3 </span></div></td>
    <td width="55"><div align="center" class="style5"><span class="style6">FA-4</span></div></td>
    <td width="55"><div align="center" class="style5"><span class="style6">Total FA </span></div></td>
    <td width="55"><div align="center" class="style5"><span class="style6">SA-2</span></div></td>
   <td width="67" rowspan="2"><div align="center">
     <p><span class="style5">Total (FA+SA) 50%</span> </p>
    </div></td>
   <td width="55" rowspan="2"><div align="center"><span class="style5"></span><span class="style5">Total (FA) 40%</span> </div></td>
    <td width="42" rowspan="2"><div align="center"><span class="style5"></span><span class="style5">Total (SA) 60%</span> </div></td>
    <td width="76" rowspan="2"><p align="center" class="style1"><span class="style5"></span><span class="style5">Total Grade of (FA+SA) 100%</span> </p></td>
  </tr>
  <tr>
    <td height="28"><div align="center">10%</div></td>
    <td><div align="center">10%</div></td>
    <td><div align="center">20%</div></td>
    <td><div align="center">30%</div></td>
    <td><div align="center">10%</div></td>
    <td><div align="center">10%</div></td>
    <td><div align="center">20%</div></td>
    <td><div align="center">30%</div></td>
  </tr>
	<?php  $fa1=0;  $fa2=0; $sa=1; $fa3=0;  $f4=0; $s4=0; $total_fa=0; $totla_sa=0;
	if($list['AddClass']['class']==8 || $list['AddClass']['class']==9 || $list['AddClass']['class']==10) {
	for($i=1;$i<=10;$i++)  {  ?>
	<tr align="center">
		<?php foreach($value as $sub) { ?>
		<?php if(!empty($sub['SubjectAllocation']["sub$i"])) { ?>
			<?php if($i==1) { ?><td><?php if(!empty($lang)) { echo $l['LanguageAllocation']['language_1']; }  ?></td>
			<?php } else if($i==2) { ?><td><?php if(!empty($lang)) { echo $l['LanguageAllocation']['language_2']; } ?></td>
			<?php } else if($i==3) { ?><td><?php if(!empty($lang)) { echo $l['LanguageAllocation']['language_3']; }  ?></td>
			<?php } else { ?> <td><?php  echo $sub['SubjectAllocation']["sub$i"]; } ?></td>
		<?php } else {?><td>--</td><?php } 
		 foreach($value as $mark_list)
			{  if($mark_list['CreateExam']['exam_type']=='FA-1')
					{
					
						 foreach($get_grade as $grade_list) 
						 { 
							if($grade_list['GradeSetting']['max_marks']=='10')
							{  
									$fa1=round($mark_list['MarksEntry']["marks$i"]/2);
									//echo $fa1;
									if($fa1<=$grade_list['GradeSetting']['from_marksA+'] && $fa1>=$grade_list['GradeSetting']['to_marksA+'] )
									{?>
										<td><?php echo $grade_list['GradeSetting']['gradeA+']; ?></td>
							  <?php }else if($fa1<=$grade_list['GradeSetting']['from_marksA'] && $fa1>=$grade_list['GradeSetting']['to_marksA'] )
									{?>
										<td><?php echo $grade_list['GradeSetting']['gradeA']; ?></td>
							  <?php }else if($fa1<=$grade_list['GradeSetting']['from_marksB+'] && $fa1>=$grade_list['GradeSetting']['to_marksB+'] )
									{?>
										<td><?php echo $grade_list['GradeSetting']['gradeB+']; ?></td>
							 <?php  }else if($fa1<=$grade_list['GradeSetting']['from_marksB'] && $fa1>=$grade_list['GradeSetting']['to_marksB'] )
									{?>
										<td><?php echo $grade_list['GradeSetting']['gradeB']; ?></td>
							 <?php  }else if($fa1<=$grade_list['GradeSetting']['from_marksC'] && $fa1>=$grade_list['GradeSetting']['to_marksC'] )
									{?>
										<td><?php echo $grade_list['GradeSetting']['gradeC']; ?></td>
                                                         <?php  }else {?>
										<td><?php echo '--' ?></td>
											 
							 <?php  }
							}
						}
					}
					 if($mark_list['CreateExam']['exam_type']=='FA-2')
					{
					
						foreach($get_grade as $grade_list) 
						{ 
							if($grade_list['GradeSetting']['max_marks']=='10')
							{  
									$fa2=round($mark_list['MarksEntry']["marks$i"]/2);
									if($fa2<=$grade_list['GradeSetting']['from_marksA+'] && $fa2>=$grade_list['GradeSetting']['to_marksA+'] )
									{?>
										<td><?php echo $grade_list['GradeSetting']['gradeA+']; ?></td>
							  <?php }else if($fa2<=$grade_list['GradeSetting']['from_marksA'] && $fa2>=$grade_list['GradeSetting']['to_marksA'] )
									{?>
										<td><?php echo $grade_list['GradeSetting']['gradeA']; ?></td>
							  <?php }else if($fa2<=$grade_list['GradeSetting']['from_marksB+'] && $fa2>=$grade_list['GradeSetting']['to_marksB+'] )
									{?>
										<td><?php echo $grade_list['GradeSetting']['gradeB+']; ?></td>
							 <?php  }else if($fa2<=$grade_list['GradeSetting']['from_marksB'] && $fa2>=$grade_list['GradeSetting']['to_marksB'] )
									{?>
										<td><?php echo $grade_list['GradeSetting']['gradeB']; ?></td>
							 <?php  }else if($fa2<=$grade_list['GradeSetting']['from_marksC'] && $fa2>=$grade_list['GradeSetting']['to_marksC'] )
									{?>
										<td><?php echo $grade_list['GradeSetting']['gradeC']; ?></td>
							 <?php  }else {?>
										<td><?php echo '--' ?></td>				 
							 <?php  }
							}	
						
							else if($grade_list['GradeSetting']['max_marks']=='20')
							{  
									$Tot_fa1=$fa1+$fa2;
									if($Tot_fa1<=$grade_list['GradeSetting']['from_marksA+'] && $Tot_fa1>=$grade_list['GradeSetting']['to_marksA+'] )
									{?>
										<td><?php echo $grade_list['GradeSetting']['gradeA+']; ?></td>
							  <?php }else if($Tot_fa1<=$grade_list['GradeSetting']['from_marksA'] && $Tot_fa1>=$grade_list['GradeSetting']['to_marksA'] )
									{?>
										<td><?php echo $grade_list['GradeSetting']['gradeA']; ?></td>
							  <?php }else if($Tot_fa1<=$grade_list['GradeSetting']['from_marksB+'] && $Tot_fa1>=$grade_list['GradeSetting']['to_marksB+'] )
									{?>
										<td><?php echo $grade_list['GradeSetting']['gradeB+']; ?></td>
							 <?php  }else if($Tot_fa1<=$grade_list['GradeSetting']['from_marksB'] && $Tot_fa1>=$grade_list['GradeSetting']['to_marksB'] )
									{?>
										<td><?php echo $grade_list['GradeSetting']['gradeB']; ?></td>
							 <?php  }else if($Tot_fa1<=$grade_list['GradeSetting']['from_marksC'] && $Tot_fa1>=$grade_list['GradeSetting']['to_marksC'] )
									{?>
										<td><?php echo $grade_list['GradeSetting']['gradeC']; ?></td>
							 <?php  }else {?>
										<td><?php echo '--' ?></td>				 
							 <?php  }
							}
						}
			
					}
					if($mark_list['CreateExam']['exam_type']=='SA-1')
					{
					
						foreach($get_grade as $grade_list) 
						{ 
							if($grade_list['GradeSetting']['max_marks']=='30')
							{  
									$sa1=round($mark_list['MarksEntry']["marks$i"]/1.67);
									if($sa1<=$grade_list['GradeSetting']['from_marksA+'] && $sa1>=$grade_list['GradeSetting']['to_marksA+'] )
									{?>
										<td><?php echo $grade_list['GradeSetting']['gradeA+']; ?></td>
							  <?php }else if($sa1<=$grade_list['GradeSetting']['from_marksA'] && $sa1>=$grade_list['GradeSetting']['to_marksA'] )
									{?>
										<td><?php echo $grade_list['GradeSetting']['gradeA']; ?></td>
							  <?php }else if($sa1<=$grade_list['GradeSetting']['from_marksB+'] && $sa1>=$grade_list['GradeSetting']['to_marksB+'] )
									{?>
										<td><?php echo $grade_list['GradeSetting']['gradeB+']; ?></td>
							 <?php  }else if($sa1<=$grade_list['GradeSetting']['from_marksB'] && $sa1>=$grade_list['GradeSetting']['to_marksB'] )
									{?>
										<td><?php echo $grade_list['GradeSetting']['gradeB']; ?></td>
							 <?php  }else if($sa1<=$grade_list['GradeSetting']['from_marksC'] && $sa1>=$grade_list['GradeSetting']['to_marksC'] )
									{?>
										<td><?php echo $grade_list['GradeSetting']['gradeC']; ?></td>
							 <?php  }else {?>
										<td><?php echo '--' ?></td>				 
							 <?php  }
							}	
						
							else if($grade_list['GradeSetting']['max_marks']=='50')
							{  
									$Tot=$Tot_fa1+$sa1;
									if($Tot<=$grade_list['GradeSetting']['from_marksA+'] && $Tot>=$grade_list['GradeSetting']['to_marksA+'] )
									{?>
										<td><?php echo $grade_list['GradeSetting']['gradeA+']; ?></td>
							  <?php }else if($Tot<=$grade_list['GradeSetting']['from_marksA'] && $Tot>=$grade_list['GradeSetting']['to_marksA'] )
									{?>
										<td><?php echo $grade_list['GradeSetting']['gradeA']; ?></td>
							  <?php }else if($Tot<=$grade_list['GradeSetting']['from_marksB+'] && $Tot>=$grade_list['GradeSetting']['to_marksB+'] )
									{?>
										<td><?php echo $grade_list['GradeSetting']['gradeB+']; ?></td>
							 <?php  }else if($Tot<=$grade_list['GradeSetting']['from_marksB'] && $Tot>=$grade_list['GradeSetting']['to_marksB'] )
									{?>
										<td><?php echo $grade_list['GradeSetting']['gradeB']; ?></td>
							 <?php  }else if($Tot<=$grade_list['GradeSetting']['from_marksC'] && $Tot>=$grade_list['GradeSetting']['to_marksC'] )
									{?>
										<td><?php echo $grade_list['GradeSetting']['gradeC']; ?></td>
							 <?php  }else {?>
										<td><?php echo '--' ?></td>				 
							 <?php  }
							}
						}
			
					}
					 if($mark_list['CreateExam']['exam_type']=='FA-3')
					{
					
						 foreach($get_grade as $grade_list) 
						 { 
							if($grade_list['GradeSetting']['max_marks']=='10')
							{  
									$fa3=round($mark_list['MarksEntry']["marks$i"]/2);
									//echo $fa3;
									if($fa3<=$grade_list['GradeSetting']['from_marksA+'] && $fa3>=$grade_list['GradeSetting']['to_marksA+'] )
									{?>
										<td><?php echo $grade_list['GradeSetting']['gradeA+']; ?></td>
							  <?php }else if($fa3<=$grade_list['GradeSetting']['from_marksA'] && $fa3>=$grade_list['GradeSetting']['to_marksA'] )
									{?>
										<td><?php echo $grade_list['GradeSetting']['gradeA']; ?></td>
							  <?php }else if($fa3<=$grade_list['GradeSetting']['from_marksB+'] && $fa3>=$grade_list['GradeSetting']['to_marksB+'] )
									{?>
										<td><?php echo $grade_list['GradeSetting']['gradeC']; ?></td>
							 <?php  }else if($fa3<=$grade_list['GradeSetting']['from_marksB'] && $fa3>=$grade_list['GradeSetting']['to_marksB'] )
									{?>
										<td><?php echo $grade_list['GradeSetting']['gradeB']; ?></td>
							 <?php  }else if($fa3<=$grade_list['GradeSetting']['from_marksC'] && $fa3>=$grade_list['GradeSetting']['to_marksC'] )
									{?>
										<td><?php echo $grade_list['GradeSetting']['gradeC']; ?></td>
							 <?php  }else {?>
										<td><?php echo '--' ?></td>				 
							 <?php  }
							}
						}
					}
					if($mark_list['CreateExam']['exam_type']=='FA-4')
					{
					
						foreach($get_grade as $grade_list) 
						{ 
							if($grade_list['GradeSetting']['max_marks']=='10')
							{  
									$fa4=round($mark_list['MarksEntry']["marks$i"]/2);
									//echo $fa4;
									if($fa4<=$grade_list['GradeSetting']['from_marksA+'] && $fa4>=$grade_list['GradeSetting']['to_marksA+'] )
									{?>
										<td><?php echo $grade_list['GradeSetting']['gradeA+']; ?></td>
							  <?php }else if($fa4<=$grade_list['GradeSetting']['from_marksA'] && $fa4>=$grade_list['GradeSetting']['to_marksA'] )
									{?>
										<td><?php echo $grade_list['GradeSetting']['gradeA']; ?></td>
							  <?php }else if($fa4<=$grade_list['GradeSetting']['from_marksB+'] && $fa4>=$grade_list['GradeSetting']['to_marksB+'] )
									{?>
										<td><?php echo $grade_list['GradeSetting']['gradeB+']; ?></td>
							 <?php  }else if($fa4<=$grade_list['GradeSetting']['from_marksB'] && $fa4>=$grade_list['GradeSetting']['to_marksB'] )
									{?>
										<td><?php echo $grade_list['GradeSetting']['gradeB']; ?></td>
							 <?php  }else if($fa4<=$grade_list['GradeSetting']['from_marksC'] && $fa4>=$grade_list['GradeSetting']['to_marksC'] )
									{?>
										<td><?php echo $grade_list['GradeSetting']['gradeC']; ?></td>
							 <?php  }else {?>
										<td><?php echo '--' ?></td>				 
							 <?php  }
							}	
						
							else if($grade_list['GradeSetting']['max_marks']=='20')
							{  
									$Tot_fa2=$fa3+$fa4;
									if($Tot_fa2<= $grade_list['GradeSetting']['from_marksA+'] && $Tot_fa2>=$grade_list['GradeSetting']['to_marksA+'] )
									{?>
										<td><?php echo $grade_list['GradeSetting']['gradeA+']; ?></td>
							  <?php }else if($Tot_fa2<= $grade_list['GradeSetting']['from_marksA'] && $Tot_fa2>=$grade_list['GradeSetting']['to_marksA'] )
									{?>
										<td><?php echo $grade_list['GradeSetting']['gradeA']; ?></td>
							  <?php }else if($Tot_fa2<= $grade_list['GradeSetting']['from_marksB+'] && $Tot_fa2>=$grade_list['GradeSetting']['to_marksB+'] )
									{?>
										<td><?php echo $grade_list['GradeSetting']['gradeB+']; ?></td>
							 <?php  }else if($Tot_fa2<= $grade_list['GradeSetting']['from_marksB'] && $Tot_fa2>=$grade_list['GradeSetting']['to_marksB'] )
									{?>
										<td><?php echo $grade_list['GradeSetting']['gradeB']; ?></td>
							 <?php  }else if($Tot_fa2<=$grade_list['GradeSetting']['from_marksC'] && $Tot_fa2>=$grade_list['GradeSetting']['to_marksC'] )
									{?>
										<td><?php echo $grade_list['GradeSetting']['gradeC']; ?></td>
							 <?php  }else {?>
										<td><?php echo '--' ?></td>				 
							 <?php  }
							}
						}
					}
					 if($mark_list['CreateExam']['exam_type']=='SA-2')
					{
					
						foreach($get_grade as $grade_list) 
						{ 
							if($grade_list['GradeSetting']['max_marks']=='30')
							{  
									$sa2=round($mark_list['MarksEntry']["marks$i"]/1.67);
									if($sa2<=$grade_list['GradeSetting']['from_marksA+'] && $sa2>=$grade_list['GradeSetting']['to_marksA+'] )
									{?>
										<td><?php echo $grade_list['GradeSetting']['gradeA+']; ?></td>
							  <?php }else if($sa2<=$grade_list['GradeSetting']['from_marksA'] && $sa2>=$grade_list['GradeSetting']['to_marksA'] )
									{?>
										<td><?php echo $grade_list['GradeSetting']['gradeA']; ?></td>
							  <?php }else if($sa2<=$grade_list['GradeSetting']['from_marksB+'] && $sa2>=$grade_list['GradeSetting']['to_marksB+'] )
									{?>
										<td><?php echo $grade_list['GradeSetting']['gradeB+']; ?></td>
							 <?php  }else if($sa2<=$grade_list['GradeSetting']['from_marksB'] && $sa2>=$grade_list['GradeSetting']['to_marksB'] )
									{?>
										<td><?php echo $grade_list['GradeSetting']['gradeB']; ?></td>
							 <?php  }else if($sa2<=$grade_list['GradeSetting']['from_marksC'] && $sa2>=$grade_list['GradeSetting']['to_marksC'] )
									{?>
										<td><?php echo $grade_list['GradeSetting']['gradeC']; ?></td>
							 <?php  }else {?>
										<td><?php echo '--' ?></td>				 
							 <?php  }
							}	
						
							else if($grade_list['GradeSetting']['max_marks']=='50')
							{  
									$Tot=$Tot_fa2+$sa1;
									if($Tot<=$grade_list['GradeSetting']['from_marksA+'] && $Tot>=$grade_list['GradeSetting']['to_marksA+'] )
									{?>
										<td><?php echo $grade_list['GradeSetting']['gradeA+']; ?></td>
							  <?php }else if($Tot<=$grade_list['GradeSetting']['from_marksA'] && $Tot>=$grade_list['GradeSetting']['to_marksA'] )
									{?>
										<td><?php echo $grade_list['GradeSetting']['gradeA']; ?></td>
							  <?php }else if($Tot<=$grade_list['GradeSetting']['from_marksB+'] && $Tot>=$grade_list['GradeSetting']['to_marksB+'] )
									{?>
										<td><?php echo $grade_list['GradeSetting']['gradeB+']; ?></td>
							 <?php  }else if($Tot<=$grade_list['GradeSetting']['from_marksB'] && $Tot>=$grade_list['GradeSetting']['to_marksB'] )
									{?>
										<td><?php echo $grade_list['GradeSetting']['gradeB']; ?></td>
							 <?php  }else if($Tot<=$grade_list['GradeSetting']['from_marksC'] && $Tot>=$grade_list['GradeSetting']['to_marksC'] )
									{?>
										<td><?php echo $grade_list['GradeSetting']['gradeC']; ?></td>
							 <?php  }else {?>
										<td><?php echo '--' ?></td>				 
							 <?php  }
							}
							else if($grade_list['GradeSetting']['max_marks']=='40')
							{  
									$Tot_fa=$Tot_fa1+$Tot_fa2;
									if($Tot_fa<=$grade_list['GradeSetting']['from_marksA+'] && $Tot_fa>=$grade_list['GradeSetting']['to_marksA+'] )
									{?>
										<td><?php echo $grade_list['GradeSetting']['gradeA+']; ?></td>
							  <?php }else if($Tot_fa<=$grade_list['GradeSetting']['from_marksA'] && $Tot_fa>=$grade_list['GradeSetting']['to_marksA'] )
									{?>
										<td><?php echo $grade_list['GradeSetting']['gradeA']; ?></td>
							  <?php }else if($Tot_fa<=$grade_list['GradeSetting']['from_marksB+'] && $Tot_fa>=$grade_list['GradeSetting']['to_marksB+'] )
									{?>
										<td><?php echo $grade_list['GradeSetting']['gradeB+']; ?></td>
							 <?php  }else if($Tot_fa<=$grade_list['GradeSetting']['from_marksB'] && $Tot_fa>=$grade_list['GradeSetting']['to_marksB'] )
									{?>
										<td><?php echo $grade_list['GradeSetting']['gradeB']; ?></td>
							 <?php  }else if($Tot_fa<=$grade_list['GradeSetting']['from_marksC'] && $Tot_fa>=$grade_list['GradeSetting']['to_marksC'] )
									{?>
										<td><?php echo $grade_list['GradeSetting']['gradeC']; ?></td>
							 <?php  }else {?>
										<td><?php echo '--' ?></td>				 
							 <?php  }
							}
							else if($grade_list['GradeSetting']['max_marks']=='60')
							{  
									$Tot_sa=$sa1+$sa2;
									if($Tot_sa<=$grade_list['GradeSetting']['from_marksA+'] &$Tot_sa>=$grade_list['GradeSetting']['to_marksA+'] )
									{?>
										<td><?php echo $grade_list['GradeSetting']['gradeA+']; ?></td>
							  <?php }else if($Tot_sa<=$grade_list['GradeSetting']['from_marksA'] &$Tot_sa>=$grade_list['GradeSetting']['to_marksA'] )
									{?>
										<td><?php echo $grade_list['GradeSetting']['gradeA']; ?></td>
							  <?php }else if($Tot_sa<=$grade_list['GradeSetting']['from_marksB+'] &$Tot_sa>=$grade_list['GradeSetting']['to_marksB+'] )
									{?>
										<td><?php echo $grade_list['GradeSetting']['gradeB+']; ?></td>
							 <?php  }else if($Tot_sa<=$grade_list['GradeSetting']['from_marksB'] &$Tot_sa>=$grade_list['GradeSetting']['to_marksB'] )
									{?>
										<td><?php echo $grade_list['GradeSetting']['gradeB']; ?></td>
							 <?php  }else if($Tot_sa<=$grade_list['GradeSetting']['from_marksC'] &$Tot_sa>=$grade_list['GradeSetting']['to_marksC'] )
									{?>
										<td><?php echo $grade_list['GradeSetting']['gradeC']; ?></td>
							 <?php  }else {?>
										<td><?php echo '--' ?></td>				 
							 <?php  }
							}
							else if($grade_list['GradeSetting']['max_marks']=='100')
							{  
									$Total=$Tot_sa+$Tot_fa;
									if($Total<=$grade_list['GradeSetting']['from_marksA+'] && $Total>=$grade_list['GradeSetting']['to_marksA+'] )
									{?>
										<td><?php echo $grade_list['GradeSetting']['gradeA+']; ?></td>
							  <?php }else if($Total<=$grade_list['GradeSetting']['from_marksA'] && $Total>=$grade_list['GradeSetting']['to_marksA'] )
									{?>
										<td><?php echo $grade_list['GradeSetting']['gradeA']; ?></td>
							  <?php }else if($Total<=$grade_list['GradeSetting']['from_marksB+'] && $Total>=$grade_list['GradeSetting']['to_marksB+'] )
									{?>
										<td><?php echo $grade_list['GradeSetting']['gradeB+']; ?></td>
							 <?php  }else if($Total<=$grade_list['GradeSetting']['from_marksB'] && $Total>=$grade_list['GradeSetting']['to_marksB'] )
									{?>
										<td><?php echo $grade_list['GradeSetting']['gradeB']; ?></td>
							 <?php  }else if($Total<=$grade_list['GradeSetting']['from_marksC'] && $Total>=$grade_list['GradeSetting']['to_marksC'] )
									{?>
										<td><?php echo $grade_list['GradeSetting']['gradeC']; ?></td>
							 <?php  }else {?>
										<td><?php echo '--' ?></td>				 
							 <?php  }
							}
						}
			
					}
			}?>
	<?php break; } ?>	
		</tr>
	<?php  } } else { 

	for($i=1;$i<=10;$i++)  {  ?>
	<tr align="center">
		<?php foreach($value as $sub) { ?>
		<?php if(!empty($sub['SubjectAllocation']["sub$i"])) { ?>
			<td><?php  echo $sub['SubjectAllocation']["sub$i"];  ?></td>
		<?php } else {?><td>--</td><?php } ?>
			
			<?php foreach($value as $mark_list)
			{ ?>
				<?php if($mark_list['CreateExam']['exam_type']=='FA-1')
					{
					
						 foreach($get_grade as $grade_list) 
						 { 
							if($grade_list['GradeSetting']['max_marks']=='10')
							{  
									$fa1=round($mark_list['MarksEntry']["marks$i"]/2);
									//echo $fa1;
									if($fa1<=$grade_list['GradeSetting']['from_marksA+'] && $fa1>=$grade_list['GradeSetting']['to_marksA+'] )
									{?>
										<td><?php echo $grade_list['GradeSetting']['gradeA+']; ?></td>
							  <?php }else if($fa1<=$grade_list['GradeSetting']['from_marksA'] && $fa1>=$grade_list['GradeSetting']['to_marksA'] )
									{?>
										<td><?php echo $grade_list['GradeSetting']['gradeA']; ?></td>
							  <?php }else if($fa1<=$grade_list['GradeSetting']['from_marksB+'] && $fa1>=$grade_list['GradeSetting']['to_marksB+'] )
									{?>
										<td><?php echo $grade_list['GradeSetting']['gradeB+']; ?></td>
							 <?php  }else if($fa1<=$grade_list['GradeSetting']['from_marksB'] && $fa1>=$grade_list['GradeSetting']['to_marksB'] )
									{?>
										<td><?php echo $grade_list['GradeSetting']['gradeB']; ?></td>
							 <?php  }else if($fa1<=$grade_list['GradeSetting']['from_marksC'] && $fa1>=$grade_list['GradeSetting']['to_marksC'] )
									{?>
										<td><?php echo $grade_list['GradeSetting']['gradeC']; ?></td>
                                                          <?php  }else {?>
										<td><?php echo '--' ?></td>
											 
							 <?php  }
							}
						}
					}
					 if($mark_list['CreateExam']['exam_type']=='FA-2')
					{
					
						foreach($get_grade as $grade_list) 
						{ 
							if($grade_list['GradeSetting']['max_marks']=='10')
							{  
									$fa2=round($mark_list['MarksEntry']["marks$i"]/2);
									if($fa2<=$grade_list['GradeSetting']['from_marksA+'] && $fa2>=$grade_list['GradeSetting']['to_marksA+'] )
									{?>
										<td><?php echo $grade_list['GradeSetting']['gradeA+']; ?></td>
							  <?php }else if($fa2<=$grade_list['GradeSetting']['from_marksA'] && $fa2>=$grade_list['GradeSetting']['to_marksA'] )
									{?>
										<td><?php echo $grade_list['GradeSetting']['gradeA']; ?></td>
							  <?php }else if($fa2<=$grade_list['GradeSetting']['from_marksB+'] && $fa2>=$grade_list['GradeSetting']['to_marksB+'] )
									{?>
										<td><?php echo $grade_list['GradeSetting']['gradeB+']; ?></td>
							 <?php  }else if($fa2<=$grade_list['GradeSetting']['from_marksB'] && $fa2>=$grade_list['GradeSetting']['to_marksB'] )
									{?>
										<td><?php echo $grade_list['GradeSetting']['gradeB']; ?></td>
							 <?php  }else if($fa2<=$grade_list['GradeSetting']['from_marksC'] && $fa2>=$grade_list['GradeSetting']['to_marksC'] )
									{?>
										<td><?php echo $grade_list['GradeSetting']['gradeC']; ?></td>
                                                          <?php  }else {?>
										<td><?php echo '--' ?></td>
											 
							 <?php  }
							}	
						
							else if($grade_list['GradeSetting']['max_marks']=='20')
							{  
									$Tot_fa1=$fa1+$fa2;
									if($Tot_fa1<=$grade_list['GradeSetting']['from_marksA+'] && $Tot_fa1>=$grade_list['GradeSetting']['to_marksA+'] )
									{?>
										<td><?php echo $grade_list['GradeSetting']['gradeA+']; ?></td>
							  <?php }else if($Tot_fa1<=$grade_list['GradeSetting']['from_marksA'] && $Tot_fa1>=$grade_list['GradeSetting']['to_marksA'] )
									{?>
										<td><?php echo $grade_list['GradeSetting']['gradeA']; ?></td>
							  <?php }else if($Tot_fa1<=$grade_list['GradeSetting']['from_marksB+'] && $Tot_fa1>=$grade_list['GradeSetting']['to_marksB+'] )
									{?>
										<td><?php echo $grade_list['GradeSetting']['gradeB+']; ?></td>
							 <?php  }else if($Tot_fa1<=$grade_list['GradeSetting']['from_marksB'] && $Tot_fa1>=$grade_list['GradeSetting']['to_marksB'] )
									{?>
										<td><?php echo $grade_list['GradeSetting']['gradeB']; ?></td>
							 <?php  }else if($Tot_fa1<=$grade_list['GradeSetting']['from_marksC'] && $Tot_fa1>=$grade_list['GradeSetting']['to_marksC'] )
									{?>
										<td><?php echo $grade_list['GradeSetting']['gradeC']; ?></td>
                                                         <?php  }else {?>
										<td><?php echo '--' ?></td>
											 
							 <?php  }
							}
						}
			
					}
					if($mark_list['CreateExam']['exam_type']=='SA-1')
					{
					
						foreach($get_grade as $grade_list) 
						{ 
							if($grade_list['GradeSetting']['max_marks']=='30')
							{  
									$sa1=round($mark_list['MarksEntry']["marks$i"]/1.67);
									if($sa1<=$grade_list['GradeSetting']['from_marksA+'] && $sa1>=$grade_list['GradeSetting']['to_marksA+'] )
									{?>
										<td><?php echo $grade_list['GradeSetting']['gradeA+']; ?></td>
							  <?php }else if($sa1<=$grade_list['GradeSetting']['from_marksA'] && $sa1>=$grade_list['GradeSetting']['to_marksA'] )
									{?>
										<td><?php echo $grade_list['GradeSetting']['gradeA']; ?></td>
							  <?php }else if($sa1<=$grade_list['GradeSetting']['from_marksB+'] && $sa1>=$grade_list['GradeSetting']['to_marksB+'] )
									{?>
										<td><?php echo $grade_list['GradeSetting']['gradeB+']; ?></td>
							 <?php  }else if($sa1<=$grade_list['GradeSetting']['from_marksB'] && $sa1>=$grade_list['GradeSetting']['to_marksB'] )
									{?>
										<td><?php echo $grade_list['GradeSetting']['gradeB']; ?></td>
							 <?php  }else if($sa1<=$grade_list['GradeSetting']['from_marksC'] && $sa1>=$grade_list['GradeSetting']['to_marksC'] )
									{?>
										<td><?php echo $grade_list['GradeSetting']['gradeC']; ?></td>
                                                         <?php  }else {?>
										<td><?php echo '--' ?></td>
											 
							 <?php  }
							}	
						
							else if($grade_list['GradeSetting']['max_marks']=='50')
							{  
									$Tot=$Tot_fa1+$sa1;
									if($Tot<=$grade_list['GradeSetting']['from_marksA+'] && $Tot>=$grade_list['GradeSetting']['to_marksA+'] )
									{?>
										<td><?php echo $grade_list['GradeSetting']['gradeA+']; ?></td>
							  <?php }else if($Tot<=$grade_list['GradeSetting']['from_marksA'] && $Tot>=$grade_list['GradeSetting']['to_marksA'] )
									{?>
										<td><?php echo $grade_list['GradeSetting']['gradeA']; ?></td>
							  <?php }else if($Tot<=$grade_list['GradeSetting']['from_marksB+'] && $Tot>=$grade_list['GradeSetting']['to_marksB+'] )
									{?>
										<td><?php echo $grade_list['GradeSetting']['gradeB+']; ?></td>
							 <?php  }else if($Tot<=$grade_list['GradeSetting']['from_marksB'] && $Tot>=$grade_list['GradeSetting']['to_marksB'] )
									{?>
										<td><?php echo $grade_list['GradeSetting']['gradeB']; ?></td>
							 <?php  }else if($Tot<=$grade_list['GradeSetting']['from_marksC'] && $Tot>=$grade_list['GradeSetting']['to_marksC'] )
									{?>
										<td><?php echo $grade_list['GradeSetting']['gradeC']; ?></td>
                                                         <?php  }else {?>
										<td><?php echo '--' ?></td>
											 
							 <?php  }
							}
						}
			
					}
					 if($mark_list['CreateExam']['exam_type']=='FA-3')
					{
					
						 foreach($get_grade as $grade_list) 
						 { 
							if($grade_list['GradeSetting']['max_marks']=='10')
							{  
									$fa3=round($mark_list['MarksEntry']["marks$i"]/2);
									//echo $fa3;
									if($fa3<=$grade_list['GradeSetting']['from_marksA+'] && $fa3>=$grade_list['GradeSetting']['to_marksA+'] )
									{?>
										<td><?php echo $grade_list['GradeSetting']['gradeA+']; ?></td>
							  <?php }else if($fa3<=$grade_list['GradeSetting']['from_marksA'] && $fa3>=$grade_list['GradeSetting']['to_marksA'] )
									{?>
										<td><?php echo $grade_list['GradeSetting']['gradeA']; ?></td>
							  <?php }else if($fa3<=$grade_list['GradeSetting']['from_marksB+'] && $fa3>=$grade_list['GradeSetting']['to_marksB+'] )
									{?>
										<td><?php echo $grade_list['GradeSetting']['gradeC']; ?></td>
							 <?php  }else if($fa3<=$grade_list['GradeSetting']['from_marksB'] && $fa3>=$grade_list['GradeSetting']['to_marksB'] )
									{?>
										<td><?php echo $grade_list['GradeSetting']['gradeB']; ?></td>
							 <?php  }else if($fa3<=$grade_list['GradeSetting']['from_marksC'] && $fa3>=$grade_list['GradeSetting']['to_marksC'] )
									{?>
										<td><?php echo $grade_list['GradeSetting']['gradeC']; ?></td>
                                                          <?php  }else {?>
										<td><?php echo '--' ?></td>
											 
							 <?php  }
							}
						}
					}
					if($mark_list['CreateExam']['exam_type']=='FA-4')
					{
					
						foreach($get_grade as $grade_list) 
						{ 
							if($grade_list['GradeSetting']['max_marks']=='10')
							{  
									$fa4=round($mark_list['MarksEntry']["marks$i"]/2);
									//echo $fa4;
									if($fa4<=$grade_list['GradeSetting']['from_marksA+'] && $fa4>=$grade_list['GradeSetting']['to_marksA+'] )
									{?>
										<td><?php echo $grade_list['GradeSetting']['gradeA+']; ?></td>
							  <?php }else if($fa4<=$grade_list['GradeSetting']['from_marksA'] && $fa4>=$grade_list['GradeSetting']['to_marksA'] )
									{?>
										<td><?php echo $grade_list['GradeSetting']['gradeA']; ?></td>
							  <?php }else if($fa4<=$grade_list['GradeSetting']['from_marksB+'] && $fa4>=$grade_list['GradeSetting']['to_marksB+'] )
									{?>
										<td><?php echo $grade_list['GradeSetting']['gradeB+']; ?></td>
							 <?php  }else if($fa4<=$grade_list['GradeSetting']['from_marksB'] && $fa4>=$grade_list['GradeSetting']['to_marksB'] )
									{?>
										<td><?php echo $grade_list['GradeSetting']['gradeB']; ?></td>
							 <?php  }else if($fa4<=$grade_list['GradeSetting']['from_marksC'] && $fa4>=$grade_list['GradeSetting']['to_marksC'] )
									{?>
										<td><?php echo $grade_list['GradeSetting']['gradeC']; ?></td>
                                                         <?php  }else {?>
										<td><?php echo '--' ?></td>
											 
							 <?php  }
							}	
						
							else if($grade_list['GradeSetting']['max_marks']=='20')
							{  
									$Tot_fa2=$fa3+$fa4;
									if($Tot_fa1<=$grade_list['GradeSetting']['from_marksA+'] && $Tot_fa2>=$grade_list['GradeSetting']['to_marksA+'] )
									{?>
										<td><?php echo $grade_list['GradeSetting']['gradeA+']; ?></td>
							  <?php }else if($Tot_fa2<=$grade_list['GradeSetting']['from_marksA'] && $Tot_fa2>=$grade_list['GradeSetting']['to_marksA'] )
									{?>
										<td><?php echo $grade_list['GradeSetting']['gradeA']; ?></td>
							  <?php }else if($Tot_fa2<=$grade_list['GradeSetting']['from_marksB+'] && $Tot_fa2>=$grade_list['GradeSetting']['to_marksB+'] )
									{?>
										<td><?php echo $grade_list['GradeSetting']['gradeB+']; ?></td>
							 <?php  }else if($Tot_fa2<=$grade_list['GradeSetting']['from_marksB'] && $Tot_fa2>=$grade_list['GradeSetting']['to_marksB'] )
									{?>
										<td><?php echo $grade_list['GradeSetting']['gradeB']; ?></td>
							 <?php  }else if($Tot_fa2<=$grade_list['GradeSetting']['from_marksC'] && $Tot_fa2>=$grade_list['GradeSetting']['to_marksC'] )
									{?>
										<td><?php echo $grade_list['GradeSetting']['gradeC']; ?></td>
                                                         <?php  }else {?>
										<td><?php echo '--' ?></td>
											 
							 <?php  }
							}
						}
					}
					 if($mark_list['CreateExam']['exam_type']=='SA-2')
					{
					
						foreach($get_grade as $grade_list) 
						{ 
							if($grade_list['GradeSetting']['max_marks']=='30')
							{  
									$sa2=round($mark_list['MarksEntry']["marks$i"]/1.67);
									if($sa2<=$grade_list['GradeSetting']['from_marksA+'] && $sa2>=$grade_list['GradeSetting']['to_marksA+'] )
									{?>
										<td><?php echo $grade_list['GradeSetting']['gradeA+']; ?></td>
							  <?php }else if($sa2<=$grade_list['GradeSetting']['from_marksA'] && $sa2>=$grade_list['GradeSetting']['to_marksA'] )
									{?>
										<td><?php echo $grade_list['GradeSetting']['gradeA']; ?></td>
							  <?php }else if($sa2<=$grade_list['GradeSetting']['from_marksB+'] && $sa2>=$grade_list['GradeSetting']['to_marksB+'] )
									{?>
										<td><?php echo $grade_list['GradeSetting']['gradeB+']; ?></td>
							 <?php  }else if($sa2<=$grade_list['GradeSetting']['from_marksB'] && $sa2>=$grade_list['GradeSetting']['to_marksB'] )
									{?>
										<td><?php echo $grade_list['GradeSetting']['gradeB']; ?></td>
							 <?php  }else if($sa2<=$grade_list['GradeSetting']['from_marksC'] && $sa2>=$grade_list['GradeSetting']['to_marksC'] )
									{?>
										<td><?php echo $grade_list['GradeSetting']['gradeC']; ?></td>
                                                         <?php  }else {?>
										<td><?php echo '--' ?></td>
											 
							 <?php  }
							}	
						
							else if($grade_list['GradeSetting']['max_marks']=='50')
							{  
									$Tot=$Tot_fa2+$sa1;
									if($Tot<=$grade_list['GradeSetting']['from_marksA+'] && $Tot>=$grade_list['GradeSetting']['to_marksA+'] )
									{?>
										<td><?php echo $grade_list['GradeSetting']['gradeA+']; ?></td>
							  <?php }else if($Tot<=$grade_list['GradeSetting']['from_marksA'] && $Tot>=$grade_list['GradeSetting']['to_marksA'] )
									{?>
										<td><?php echo $grade_list['GradeSetting']['gradeA']; ?></td>
							  <?php }else if($Tot<=$grade_list['GradeSetting']['from_marksB+'] && $Tot>=$grade_list['GradeSetting']['to_marksB+'] )
									{?>
										<td><?php echo $grade_list['GradeSetting']['gradeB+']; ?></td>
							 <?php  }else if($Tot<=$grade_list['GradeSetting']['from_marksB'] && $Tot>=$grade_list['GradeSetting']['to_marksB'] )
									{?>
										<td><?php echo $grade_list['GradeSetting']['gradeB']; ?></td>
							 <?php  }else if($Tot<=$grade_list['GradeSetting']['from_marksC'] && $Tot>=$grade_list['GradeSetting']['to_marksC'] )
									{?>
										<td><?php echo $grade_list['GradeSetting']['gradeC']; ?></td>
                                                         <?php  }else {?>
										<td><?php echo '--' ?></td>
											 
							 <?php  }
							}
							else if($grade_list['GradeSetting']['max_marks']=='40')
							{  
									$Tot_fa=$Tot_fa1+$Tot_fa2;
									if($Tot_fa<=$grade_list['GradeSetting']['from_marksA+'] && $Tot_fa>=$grade_list['GradeSetting']['to_marksA+'] )
									{?>
										<td><?php echo $grade_list['GradeSetting']['gradeA+']; ?></td>
							  <?php }else if($Tot_fa<=$grade_list['GradeSetting']['from_marksA'] && $Tot_fa>=$grade_list['GradeSetting']['to_marksA'] )
									{?>
										<td><?php echo $grade_list['GradeSetting']['gradeA']; ?></td>
							  <?php }else if($Tot_fa<=$grade_list['GradeSetting']['from_marksB+'] && $Tot_fa>=$grade_list['GradeSetting']['to_marksB+'] )
									{?>
										<td><?php echo $grade_list['GradeSetting']['gradeB+']; ?></td>
							 <?php  }else if($Tot_fa<=$grade_list['GradeSetting']['from_marksB'] && $Tot_fa>=$grade_list['GradeSetting']['to_marksB'] )
									{?>
										<td><?php echo $grade_list['GradeSetting']['gradeB']; ?></td>
							 <?php  }else if($Tot_fa<=$grade_list['GradeSetting']['from_marksC'] && $Tot_fa>=$grade_list['GradeSetting']['to_marksC'] )
									{?>
										<td><?php echo $grade_list['GradeSetting']['gradeC']; ?></td>
                                                         <?php  }else {?>
										<td><?php echo '--' ?></td>
											 
							 <?php  }
							}
							else if($grade_list['GradeSetting']['max_marks']=='60')
							{  
									$Tot_sa=$sa1+$sa2;
									if($Tot_sa<=$grade_list['GradeSetting']['from_marksA+'] &$Tot_sa>=$grade_list['GradeSetting']['to_marksA+'] )
									{?>
										<td><?php echo $grade_list['GradeSetting']['gradeA+']; ?></td>
							  <?php }else if($Tot_sa<=$grade_list['GradeSetting']['from_marksA'] &$Tot_sa>=$grade_list['GradeSetting']['to_marksA'] )
									{?>
										<td><?php echo $grade_list['GradeSetting']['gradeA']; ?></td>
							  <?php }else if($Tot_sa<=$grade_list['GradeSetting']['from_marksB+'] &$Tot_sa>=$grade_list['GradeSetting']['to_marksB+'] )
									{?>
										<td><?php echo $grade_list['GradeSetting']['gradeB+']; ?></td>
							 <?php  }else if($Tot_sa<=$grade_list['GradeSetting']['from_marksB'] &$Tot_sa>=$grade_list['GradeSetting']['to_marksB'] )
									{?>
										<td><?php echo $grade_list['GradeSetting']['gradeB']; ?></td>
							 <?php  }else if($Tot_sa<=$grade_list['GradeSetting']['from_marksC'] &$Tot_sa>=$grade_list['GradeSetting']['to_marksC'] )
									{?>
										<td><?php echo $grade_list['GradeSetting']['gradeC']; ?></td>
                                                         <?php  }else {?>
										<td><?php echo '--' ?></td>
											 
							 <?php  }
							}
							else if($grade_list['GradeSetting']['max_marks']=='100')
							{  
									$Total=$Tot_sa+$Tot_fa;
									if($Total<=$grade_list['GradeSetting']['from_marksA+'] && $Total>=$grade_list['GradeSetting']['to_marksA+'] )
									{?>
										<td><?php echo $grade_list['GradeSetting']['gradeA+']; ?></td>
							  <?php }else if($Total<=$grade_list['GradeSetting']['from_marksA'] && $Total>=$grade_list['GradeSetting']['to_marksA'] )
									{?>
										<td><?php echo $grade_list['GradeSetting']['gradeA']; ?></td>
							  <?php }else if($Total<=$grade_list['GradeSetting']['from_marksB+'] && $Total>=$grade_list['GradeSetting']['to_marksB+'] )
									{?>
										<td><?php echo $grade_list['GradeSetting']['gradeB+']; ?></td>
							 <?php  }else if($Total<=$grade_list['GradeSetting']['from_marksB'] && $Total>=$grade_list['GradeSetting']['to_marksB'] )
									{?>
										<td><?php echo $grade_list['GradeSetting']['gradeB']; ?></td>
							 <?php  }else if($Total<=$grade_list['GradeSetting']['from_marksC'] && $Total>=$grade_list['GradeSetting']['to_marksC'] )
									{?>
										<td><?php echo $grade_list['GradeSetting']['gradeC']; ?></td>
                                                         <?php  }else {?>
										<td><?php echo '--' ?></td>
											 
							 <?php  }
							}
						}
			
					}
			}?>
			
	<?php break; }  ?>	
		</tr>
	<?php } } ?>					
	<tr>		
    <td height="26">Class Teacher's Sign </td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="26">Principal's Sign </td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="26"><div align="left"><span class="style1"></span>Parent's Sign </div></td>
    <td><div align="left"><span class="style1"></span></div></td>
    <td><div align="left"><span class="style1"></span></div></td>
    <td><div align="left"><span class="style1"></span></div></td>
    <td><div align="left"><span class="style1"></span></div></td>
    <td><div align="left"><span class="style1"></span></div></td>
    <td><div align="left"><span class="style1"></span></div></td>
    <td><div align="left"><span class="style1"></span></div></td>
    <td><div align="left"><span class="style1"></span></div></td>
    <td><div align="left"><span class="style1"></span></div></td>
    <td><div align="left"><span class="style1"></span></div></td>
    <td><div align="left"><span class="style1"></span></div></td>
    <td><div align="left"><span class="style1"></span></div></td>
    <td><div align="left"><span class="style1"></span></div></td>
  </tr>
 </table>
 <table>
  <tr>
    <td width="277" height="38"><div align="left"><span style="vertical-align:bottom" align="center">Result : </span></div></td>
    <td width="706" ><div align="right"><span style="vertical-align:bottom" align="right">Sign of Principal</span></div></td>
    </tr>
</table>

</td></tr></table>

<br />

<table width="1013" id="id1">
<tr><td width="1003">
<table width="988" height="266" border="1" align="center">
  <tr>
    <td height="33" colspan="9"><div align="center"><span class="style11">Part B : Social Emotional Scientific Skills and Creativity </span></div></td>
  </tr>
  <tr>
    <td width="273" height="45"></td>
    <td height="45" colspan="2"><p class="style1 style13">1st Semester </p></td>
    <td colspan="2"><div align="center"><span class="style1 style13">2nd  Semester </span></div></td>
   </tr>
  <tr>
    <td height="28">Skills</td>
    <td width="95" align="center">Grade</td>
    <td width="220"><div align="center">Descriptive Measures </div></td>
    <td width="108" align="center">Grade</td>
    <td width="258" colspan="-1"><div align="center">Descriptive Measures </div></td>
  </tr>
  <tr>
    <td height="28">Emotional - Social Skills </td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="-1">&nbsp;</td>
  </tr>
  <tr>
    <td height="28">Organizational Skills </td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="-1">&nbsp;</td>
  </tr>
  <tr>
    <td height="28">Scientific Skills </td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="-1">&nbsp;</td>
  </tr>
  <tr>
    <td height="28">Aesthetic &amp; Fine Arts </td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="-1">&nbsp;</td>
  </tr>
  <tr>
    <td height="28">Creative Skills </td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="-1">&nbsp;</td>
  </tr>
</table>
<p align="center" class="style11">Mentality & Values</p>
<table width="988" height="184" border="1" align="center">
  <tr>
    <td width="273" height="28">&nbsp;</td>
    <td width="95"  align="center">Grade</td>
    <td width="220"><div align="center">Descriptive Measures </div></td>
    <td width="108"  align="center">Grade</td>
    <td width="258" colspan="-1"><div align="center">Descriptive Measures </div></td>
  </tr>
  <tr>
    <td height="28">About Teachers </td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="-1">&nbsp;</td>
  </tr>
  <tr>
    <td height="28">Classmates</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="-1">&nbsp;</td>
  </tr>
  <tr>
    <td height="28">School Programmes </td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="-1">&nbsp;</td>
  </tr>
  <tr>
    <td height="28">Environment</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="-1">&nbsp;</td>
  </tr>
  <tr>
    <td height="28">Values</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="-1">&nbsp;</td>
  </tr>
</table>
<p align="center" class="style11">Special Performance</p>
<table height="167" border="1" align="right">
  <tr>
    <td height="43"><div align="center">Details of Special Performance </div></td>
  </tr>
  <tr>
    <td height="45">1)</td>
  </tr>
  <tr>
    <td width="430" height="45">2)</td>
    </tr>
</table>
<table border="1" align="left">
  <tr>
    <td height="39"> * Country Games / Sports Yoga </td>
    <td><div align="center">Work Experience </div></td>
  </tr>
  <tr>
    <td height="39">* Sevadal / NCC / Scouts &amp; Guides </td>
    <td>* Handicraft </td>
  </tr>
  <tr>
    <td height="39">* Folk Art / Fine Art </td>
    <td>* Horticulture / Shramadhan </td>
  </tr>
  <tr>
    <td width="263" height="39">* Others </td>
    <td width="185">&nbsp;</td>
  </tr>
</table>
</td>
</tr>
</table>

</div></div></div></div>	  
    
	</section>
    <!-- content -->
  </div>
  <!-- content-wrapper -->