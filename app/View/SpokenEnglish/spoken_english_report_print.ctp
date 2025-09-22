
<body onload=print()>
<div class="row">
            <div class="col-md-12">
		
          <div class="box box-warning">
			  <div class="box-body">
				<table onclick=print(); class="table table-bordered" border="1" cellpadding="0" cellspacing="0" width="100%" style="line-height: 30px;" >
				
				
					<thead>
						<tr>
							<th colspan="11"><?php if($this->params['pass'][1]!='') echo $this->params['pass'][1];?> STD Spoken English Grade Report <?php if($this->params['pass'][2]!='') echo $this->params['pass'][2]." To "; if($this->params['pass'][3]!='')echo $this->params['pass'][3];?></th>
						</tr>
					
						<tr><th>Sl.No</th><th>Name</th><th align="center">Grade A</th>
						<th align="center">Grade B</th><th align="center" >Grade C</th><th>Total</th></tr>
					</thead>
					<?php 
						//print_r($Spoken_english_grade);
						$i=0;
						$totA1	=0; $totB1=0; $totC1=0; $tot1=0;
						foreach($Spoken_english_grade as $list):
						
					?>
						<tr>
							<td><?php echo $i+1;?></td>
							<td><?php echo $list['StudentDetail']['student_name'];?></td>
							 
							<!--<td><?php //echo $list['AddClass']['class_name'];?></td>
							<td><?php //echo date('d-m-Y',strtotime($list['SpokenEnglish']['date']));?></td>-->
							<td width="8%" align="center"><?php echo $totA[$i];?></td><!--<td width="8%" align="center"><?php //echo number_format($totA[$i]/$tot[$i]*100,2); ?> %</td>-->
							<td width="8%" align="center"><?php echo $totB[$i]; ?></td><!--<td width="8%" align="center"><?php //echo number_format($totB[$i]/$tot[$i]*100,2); ?> %</td>-->
							<td width="8%" align="center"><?php echo $totC[$i]; ?></td><!--<td width="8%" align="center"><?php //echo number_format($totC[$i]/$tot[$i]*100,2); ?> %</td>-->
							<td align="center"><?php echo $tot[$i]; ?></td>
							<?php $totA1+=$totA[$i];  $totB1+=$totB[$i]; $totC1+=$totC[$i]; $tot1+=$tot[$i];?>

							<!--<td><?php //echo $list['SpokenEnglish']['payable_amount'];?></td>
							<td><?php //echo $list['SchoolFeeCollection']['paid_amount'];?></td>
							<td><?php// echo $list['SchoolFeeCollection']['paying_amount'];?></td>-->
							
						
							 
						</tr> 
					<?php $i++; endforeach; 
					
					?>
					<!--<tr>
							<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
							<td><?php //echo $totA1/$tot1*100; ?></td>
							<td><?php //echo $totB1/$tot1*100; ?></td>
							<td><?php //echo $totC1/$tot1*100; ?></td>
						</tr>-->
				</table> 
			</div>
        </div> 
      </div>
     
                        
         
      <!-- row --> 

		</div>
		</body>