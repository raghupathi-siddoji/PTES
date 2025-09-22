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
				array("controller"=>"PayrollMaintenance","action"=>"monthlyRemmitanceEsiReportPrint", $ay,$month),
				array("escape"=>false,"target"=>"_blank")); ?></td>
			</div>
		</div>
       <!------------" Payroll Generation" created: 20 aug 2016 ----------->
		  
			 <div class="row">
				 
				<div class="col-md-12">
				  <div class="box box-success"> 
					<div class="box-header with-border">
					  <h3 class="box-title">Remmitance of ESI Contribution month of <?php echo  $monthName = date("F", mktime(0, 0, 0, $month));?></h3>
					</div>
					 
					  <div class="box-body"> 
						<table width="100%" border="1">
						  <tr>
							<th width="1%">Sl.No</th>
							<th width="8%">Staff Name </th>
							<th width="4%">Insured Person #.</th>
							<th width="4%">Total Amount of Wages</th>
							<th width="4%">ESI by staff</th>
							<th width="4%">ESI by Employer</th> 
						  </tr>
						  <?php 
						  $i=1; 
						  $gross_salary=0; 
						  $total_gross_pay=0; 
						  $esi_by_satff = 0;
						  $total_esi_staff = 0;
						  $esi_by_employer = 0;
						  $total_esi_employer =0;
						   if(!empty($monthly_payroll_list)){
						  foreach($monthly_payroll_list as $list):
							 //for total pay
								$gross_salary = $list['StaffPayroll']['gross_salary'];// + $special_inc;
								$total_gross_pay = $total_gross_pay + $gross_salary;
								
								$esi_by_satff = $gross_salary * 1.75 /100;
								$total_esi_staff = $total_esi_staff + $esi_by_satff;
								
								$esi_by_employer = $gross_salary * 4.75 /100;
								$total_esi_employer = $total_esi_employer + $esi_by_employer;
							?>
							  <tr>
								<td><?php echo $i++;?></td>
								<td><?php echo $list['StaffDetail']['first_name'];?></td>
								<td><?php echo $list['StaffDetail']['esi_no'];?></td>
								<td><?php echo $gross_salary;?> </td>
								<td><?php echo ceil($esi_by_satff);?></td>
								<td><?php echo ceil($esi_by_employer);?></td> 
							  </tr>
							<?php  
						  endforeach;?>
							<tr>
								<th colspan="3" align="right"> TOTAL</th> 
								<th><?php echo $total_gross_pay;?></th>
								<th><?php echo ceil($total_esi_staff);?></th>
								<th><?php echo ceil($total_esi_employer) ;?></th>
								 
							</tr>
						<?php
						 } // IF ConDITION FOR EMPTY OR NOT
						 else
						 {
							echo "<tr><td colspan='6'><center>NO RECORD FOUND...</center></td></tr>";
						 }
						?>
						</table>
						 
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