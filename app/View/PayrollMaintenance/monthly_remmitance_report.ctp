<?php  //print_r($monthly_payroll_list);?>
<style>
.timetabletd{
	width:90px;
	height:90px;
}
table-bordered>thead>tr>th, .table-bordered>tbody>tr>th,   .table-bordered>tbody>tr>td {
border: 1px solid #B9D9F0;
}
</style>
<div class="wrapper"> 
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
         <section class="content-header">
          <h1>
            Payroll Maintenance
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			 <li>Payroll Maintenance</li>
            <li class="active">Payroll Generation</li>
          </ol>
        </section>

        <!-- Main content -->
  	  <section class="content">
	  <div class="row" >
		<?php $ay = $monthly_payroll_list[0]['StaffPayroll']['academic_year_id'];
			$month = $monthly_payroll_list[0]['StaffPayroll']['month']; ?>
		
	    <div class="col-sm-11">&nbsp;</div>
	   <div class="col-sm-1">
			<?php echo $this->Html->link('<i class="fa fa-print" ></i>',
											array("controller"=>"PayrollMaintenance","action"=>"monthlyRemmitanceReportPrint", $ay,$month),
											array("escape"=>false,"target"=>"_blank")); ?></td>
		</div>
	</div>
       <!------------" Payroll Generation" created: 20 aug 2016 ----------->
		  
			 <div class="row">
				 
				<div class="col-md-12">
				  <div class="box box-success"> 
					<div class="box-header with-border">
					  <h3 class="box-title">Remmitance List for the month of <?php echo  $monthName = date("F", mktime(0, 0, 0, $month));?></h3>
					</div>
					 
					  <div class="box-body"> 
						<table width="100%" border="1">
						  <tr>
							<th width="1%">Sl.No</th>
							<th width="8%">Staff Name </th>
							<th width="4%">A/c.</th>
							<th width="4%">Total Amount of Wages</th>
							<th width="4%">PF@12%</th>
							<th width="4%">EPS@8.33</th>
							<th width="4%">EPS@3.67</th> 
						  </tr>
						  <?php 
						  $i=1; 
						  $total_pay=0; 
						  $total_basic_pay=0; 
						  $total_eps_367 = 0;
						  $total_eps_833 = 0;
						  $total_pf = 0;
						  $pf_12 =0;
						   if(!empty($monthly_payroll_list)){
						  foreach($monthly_payroll_list as $list):
							 //for total pay
								$total_pay = $list['StaffPayroll']['basic_salary'];// + $special_inc;
								$total_basic_pay = $total_basic_pay + $total_pay;
								
								$pf_12 = ceil($total_pay * 12 /100);
								$total_pf = $total_pf + $pf_12;
								
								$eps_833 =  ceil($pf_12 * 8.33 / 100);
								$total_eps_833 = $total_eps_833 + $eps_833;
								
								$eps_367 =  ceil($pf_12 * 3.67 / 100);
								$total_eps_367 = $total_eps_367 + $eps_367;
							?>
							  <tr align="right">
								<td><?php echo $i++;?></td>
								<td><?php echo $list['StaffDetail']['first_name'];?></td>
								<td><?php echo $list['StaffDetail']['pf_account'];?></td>
								<td><?php echo $total_pay;?></td>
								<td><?php echo $pf_12;?></td>
								<td><?php echo ceil($eps_833);?></td>
								<td><?php echo  ceil($eps_367);?></td> 
							  </tr>
							<?php  
						  endforeach;
						 $total_employer_contribution =  ceil($total_eps_833) + ceil($total_eps_367);
						 $administrative_charges = ceil($total_basic_pay) * 1.61 / 100;
						  ?>
							 <tr align="right" style="font-weight:bold">
								<td colspan="3"> TOTAL</td> 
								<td><?php echo $total_basic_pay;?></td>
								<td><?php echo $total_pf;?></td>
								<td><?php echo ceil($total_eps_833) ;?></td>
								<td><?php echo ceil($total_eps_367) ;?></td> 
							</tr>
						  
						</table><br>
						<table width="100%" border="0" style="font-weight:600">
						  <tr>
							<td width="4%">1</td>
							<td colspan="2">PF (Staff Contribution) </td>
							<td width="2%" align="center">:</td>
							<td width="3%" align="right"><?php echo $total_pf;?></td>
							<td width="78%">&nbsp;</td>
						  </tr>
						  <tr>
							<td>2</td>
							<td colspan="2">Employer Contribution </td>
							<td align="center">:</td>
							<td align="right"><?php echo $total_employer_contribution;?></td>
							<td>&nbsp;</td>
						  </tr>
						   <tr>
							<td>&nbsp;</td>
							<td>a)</td>
							<td>EPS : <?php echo ceil($total_eps_833) ;?> </td>
							<td align="center">&nbsp;</td>
							<td align="right"> </td>
							<td>&nbsp;</td>
						  </tr>
						  <tr>
							<td>&nbsp;</td>
							<td width="2%">b)</td>
							<td width="11%">EPF : <?php echo ceil($total_eps_367) ;?> </td>
							<td align="center">&nbsp;</td>
							<td align="right"> </td>
							<td>&nbsp;</td>
						  </tr>
						  <tr>
							<td>3</td>
							<td colspan="2">Administrative Charges </td>
							<td align="center">:</td>
							<td align="right"><?php echo ceil($administrative_charges); ?></td>
							<td>&nbsp;</td>
						  </tr>
						  <tr>
							<td>&nbsp;</td>
							<td colspan="2">&nbsp;</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
						  </tr>
						</table>	
						<?php
						   } // IF ConDITION FOR EMPTY OR NOT
						   
						 else
						 {
							echo "<tr><td colspan='7'><center>NO RECORD FOUND...</center></td></tr>";
						 }
						  ?> 
					  </div>
					 
					 
				</div>
				</div>
				 
	  </div>
      <!-- row -->
	
				
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
	</div> <!-- wrapper -->
	
	<script>
function myFunction() {
 
    //var myWindow = window.open("monthly_salary_report_print", "MsgWindow", "width=700,height=600"); 
}
</script>