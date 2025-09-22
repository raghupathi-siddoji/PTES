 <html>
 <body onload="print();">
			
			<?php  
				 
				$academic_year_id = $this->request->data['Report']['academic_year_id'];
			    $month = $this->request->data['Report']['month']; 
			?>
			 
						<center><h4>PAPER TOWN ENGLISH SCHOOL., BHADRAVATHI-577302.</h4></center>
						<center><h4>Leave Availabe Statement  as on <?php echo date("M",mktime(0,0,0,$month));?> 2016.</h4></center>
						<table width="100%" border="1" style="border-collapse:collapse;font-size:90.0%">
						  <tr style="font-weight:bold;text-align:center">
							<td width="1%">Sl</td>
							<td width="6%" rowspan="2">Staff Name </td>
							<td width="6%" rowspan="2">Designation</td>
							<td colspan="2" rowspan="2">LEAVE B / F from previous </td>
							<td colspan="26" align="center">LEAVE AVAILABE DURING 2016 FROM 01.01.2016 TO 31.12.2016 </td>
							<td colspan="2" rowspan="2"><p>Leave Availed in 2016 till </p>
							<p>31.07.2016 </p></td>
							<td colspan="2" rowspan="2">Closeing Balance as on 31.12.2016 </td>
						  </tr>
						  <tr style="font-weight:bold;text-align:center">
							<td>&nbsp;</td>
							<td colspan="2">O.B as on 01.01.2016 </td>
							<td colspan="2">Jan</td>
							<td colspan="2">Feb</td>
							<td colspan="2">March</td>
							<td colspan="2">April</td>
							<td colspan="2">May</td>
							<td colspan="2">June</td>
							<td colspan="2">July</td>
							<td colspan="2">Aug</td>
							<td colspan="2">Sept</td>
							<td colspan="2">Oct</td>
							<td colspan="2">Nov</td>
							<td colspan="2">Dec</td>
						  </tr>
						  <tr align="center">
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td width="2%">CL</td>
							<td width="4%">EL</td>
							<td width="2%">CL</td>
							<td width="5%">EL</td>
							<td width="4%">CL</td>
							<td width="3%">EL</td>
							<td width="3%">CL</td>
							<td width="2%">EL</td>
							<td width="2%">CL</td>
							<td width="3%">EL</td>
							<td width="3%">CL</td>
							<td width="3%">EL</td>
							<td width="2%">CL</td>
							<td width="2%">EL</td>
							<td width="2%">CL</td>
							<td width="2%">EL</td>
							<td width="2%">CL</td>
							<td width="2%">EL</td>
							<td width="2%">CL</td>
							<td width="2%">EL</td>
							<td width="2%">CL</td>
							<td width="3%">EL</td>
							<td width="2%">CL</td>
							<td width="3%">EL</td>
							<td width="2%">CL</td>
							<td width="3%">EL</td>
							<td width="2%">CL</td>
							<td width="2%">EL</td>
							<td width="2%">CL</td>
							<td width="6%">EL</td>
							<td width="2%">CL</td>
							<td width="6%">EL</td>
						  </tr>
						  <tr align="center">
							<td>1</td>
							<td>2</td>
							<td>3</td>
							<td>4</td>
							<td>5</td>
							<td>6</td>
							<td>7</td>
							<td>8</td>
							<td>9</td>
							<td>10</td>
							<td>11</td>
							<td>12</td>
							<td>13</td>
							<td>14</td>
							<td>15</td>
							<td>16</td>
							<td>17</td>
							<td>18</td>
							<td>19</td>
							<td>20</td>
							<td>21</td>
							<td>22</td>
							<td>23</td>
							<td>24</td>
							<td>25</td>
							<td>26</td>
							<td>27</td>
							<td>28</td>
							<td>29</td>
							<td>30</td>
							<td>31</td>
							<td>32</td>
							<td>33</td>
							<td>34</td>
							<td>35</td>
						  </tr>
						<?php 
							$i=1;
							$staff_previou_el = 0;
							$staff_cl = 0;
							$staff_el = 0;
							$jcl=0;	
							$jel=0;	 
							$fcl=0;	
							$fel=0;	
							$mcl=0;	
							$mel=0;	
							$cl4=0;	
							$el4=0;	
							$cl5=0;	
							$el5=0;	$cl6=0;	$el6=0;$cl7=0;	$el7=0;$cl8=0;	$el8=0;$cl9=0;	$el9=0;
							$cl10=0; $el10=0;$cl11=0; $el11=0;$cl12=0; $el12=0;
							$total_cl = 0;
							$total_el = 0;
							for($k=0;$k<count($staff_name_arry);$k++)
							{
							 
								if(!empty(array_filter($staff_previou_el_arry))){$staff_previou_el=$staff_previou_el_arry[$k];}else{$staff_previou_el=0;} 
							 
								if(!empty(array_filter($staff_cl_arry))){$staff_cl=$staff_cl_arry[$k];}else{$staff_cl=0;} 
								if(!empty(array_filter($staff_el_arry))){$staff_el=$staff_el_arry[$k];}else{$staff_el=0;}
							 
								if(!empty(array_filter($jmonth_cl))){$jcl=$jmonth_cl[$k];}else{$jcl=0;}
								if(!empty(array_filter($jmonth_el))){$jel=$jmonth_el[$k];}else{$jel=0;}
								
								if(!empty(array_filter($fmonth_cl))){$fcl=$fmonth_cl[$k];}else{$fcl=0;} 
								if(!empty(array_filter($fmonth_el))){$fel=$fmonth_el[$k];}else{$fel=0;} 
								
								if(!empty(array_filter($mmonth_cl))){$mcl=$mmonth_cl[$k];}else{$mcl=0;} 
								if(!empty(array_filter($mmonth_el))){$mel=$mmonth_el[$k];}else{$mel=0;} 
								
								
								if(!empty(array_filter($month_cl4))){$cl4=$month_cl4[$k];}else{$cl4=0;} 
								if(!empty(array_filter($month_el4))){$el4=$month_el4[$k];}else{$el4=0;} 
								
								if(!empty(array_filter($month_cl5))){$cl5=$month_cl5[$k];}else{$cl5=0;} 
								if(!empty(array_filter($month_el5))){$el5=$month_el5[$k];}else{$el5=0;} 
								
								if(!empty(array_filter($month_cl6))){$cl6=$month_cl6[$k];}else{$cl6=0;} 
								if(!empty(array_filter($month_el6))){$el6=$month_el6[$k];}else{$el6=0;} 
								
								if(!empty(array_filter($month_cl7))){$cl7=$month_cl7[$k];}else{$cl7=0;} 
								if(!empty(array_filter($month_el7))){$el7=$month_el7[$k];}else{$el7=0;} 
								
								if(!empty(array_filter($month_cl8))){$cl8=$month_cl8[$k];}else{$cl8=0;} 
								if(!empty(array_filter($month_el8))){$el8=$month_el8[$k];}else{$el8=0;} 
								
								if(!empty(array_filter($month_cl9))){$cl9=$month_cl9[$k];}else{$cl9=0;} 
								if(!empty(array_filter($month_el9))){$el9=$month_el9[$k];}else{$el9=0;} 
								
								if(!empty(array_filter($omonth_cl))){$cl10=$omonth_cl[$k];}else{$cl10=0;} 
								if(!empty(array_filter($omonth_el))){$el10=$omonth_el[$k];}else{$el10=0;}  
								
								if(!empty(array_filter($month_cl11))){$cl11=$month_cl11[$k];}else{$cl11=0;} 
								if(!empty(array_filter($month_el11))){$el11=$month_el11[$k];}else{$el11=0;} 
								
								if(!empty(array_filter($dmonth_cl12))){$cl12=$dmonth_cl12[$k];}else{$cl12=0;} 
								if(!empty(array_filter($dmonth_el12))){$el12=$dmonth_el12[$k];}else{$el12=0;} 
								
								$total_cl = $cl12 + $cl11 + $cl10 + $cl9 + $cl8 + $cl7 + $cl6 + $cl5 + $cl4 + $mcl + $fcl + $jcl;
								$total_el = $el12 + $el11 + $el10 + $el9 + $el8 + $el7 + $el6 + $el5 + $el4 + $mel + $fel + $jel;
								
								$allocated_cl = $staff_cl - $total_cl;
								$allocated_el = $staff_previou_el + $staff_el - $total_el;
								
						?>
							<tr align="center">
							<td><?php echo $i++;?></td>
							<td><?php echo $staff_name_arry[$k];?></td>
							<td><?php echo $staff_designation_arry[$k];?></td>
							<td>0</td>
							<td><?php echo $staff_previou_el;?></td>
							<td><?php echo $staff_cl;?></td>
							<td><?php echo $staff_el;?></td>
							<td><?php echo $jcl;?></td>
							<td><?php echo $jel;?></td>
							<td><?php echo $fcl; ?></td>
							<td><?php echo $fel;?></td>
							<td><?php echo $mcl;?></td>
							<td><?php echo $mel;?></td>
							<td><?php echo $cl4;?></td>
							<td><?php echo $el4;?></td>
							<td><?php echo $cl5;?></td>
							<td><?php echo $el5;?></td>
							<td><?php echo $cl6;?></td>
							<td><?php echo $el6;?></td>
							<td><?php echo $cl7;?></td>
							<td><?php echo $el7;?></td>
							<td><?php echo $cl8;?></td>
							<td><?php echo $el8;?></td>
							<td><?php echo $cl9;?></td>
							<td><?php echo $el9;?></td>
							<td><?php echo $cl10;?></td>
							<td><?php echo $el10;?></td>
							<td><?php echo $cl11;?></td>
							<td><?php echo $el11;?></td>
							<td><?php echo $cl12;?></td>
							<td><?php echo $el12;?></td>
							<td><?php echo $total_cl;?></td>
							<td><?php echo $total_el;?></td>
							<td><?php echo $allocated_cl;?></td>
							<td><?php echo $allocated_el;?></td>
						  </tr>
						<?php 
						$staff_previou_el = 0;
							$staff_cl = 0;
							$staff_el = 0;
							$jcl=0;	
							$jel=0;	 
							$fcl=0;	
							$fel=0;	
							$mcl=0;	
							$mel=0;	
						}?>
						</table>
						<BR>
			<table width="100%" border="0">
  <tr align="center">
    <td width="6%">&nbsp;</td>
    <td width="27%">Office Asst </td>
    <td width="13%">&nbsp;</td>
    <td width="18%">Accountant</td>
    <td width="6%">&nbsp;</td>
    <td width="6%">&nbsp;</td>
    <td width="6%">&nbsp;</td>
    <td width="1%">&nbsp;</td>
    <td width="14%">Head Master </td>
    <td width="3%">&nbsp;</td>
  </tr>
  <tr align="center">
    <td>&nbsp;</td>
    <td>(M.C. GOPAL)</td>
    <td>&nbsp;</td>
    <td>(ANTHONY DEVARAJ ) </td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>(GOPAL RAO G.N ) </td>
    <td>&nbsp;</td>
  </tr>
</table>
						
</body>

</html>
					 