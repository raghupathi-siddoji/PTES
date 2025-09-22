

<body onload=print()>
<div class="row">
            <div class="col-md-12">
		
          <div class="box box-warning">
			  <div class="box-body">
			  <table class="table table-bordered" border="1" cellpadding="0" cellspacing="0" width="100%" style="line-height: 30px;">
			  <tr>
						<th align="center" ><?php if($this->params['pass'][1]!='') echo $this->params['pass'][1];?> STD Unit Test Marks Report From
						<?php if($this->params['pass'][2]!='') echo $this->params['pass'][2]." To "; 
						if($this->params['pass'][3]!='')echo $this->params['pass'][3]; ?></th>
					</tr>
			  </table>
				<table class="table table-bordered" border="1" cellpadding="0" cellspacing="0" width="100%" style="line-height: 23px;" >
					
					<?php 
						
						$i=0;
						//print_r($details);
						foreach($details as $list):
						if($i==0)
						{
					?>
						<thead>
							<tr>
								<th><?php echo $list['id']; ?></th>
								<th><?php echo $list['student_name']; ?></th>
								<?php foreach($list['utdetails'] as $utdetail){ ?>
								<th><?php echo $utdetail['date']?>&nbsp;&nbsp;<br><?php echo $utdetail['subject']; ?></th>
								<?php } ?>
							</tr>
						</thead>
						<?php } 
						else { ?>
						
								<tr>
									<td><?php echo $i; ?></td>
									<td width="30%"><?php echo strtoupper($list['student_name']); ?></td>
									<?php foreach($list['utdetails'] as $utdetail){ ?>
									<td align="center"><?php echo $utdetail; ?></td>
									<?php } ?>
								</tr>
														
						<?php } ?>
						
						
					<?php $i++; endforeach; ?>
					
				</table> 
			</div>
        </div> 
      </div>
     
      <!-- row --> 

		</div>