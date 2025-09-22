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
		
	    <div class="col-sm-8">&nbsp;</div>
	   <div class="col-sm-1">
			<?php echo $this->Html->link('<i class="fa fa-print" ></i>',
											array("controller"=>"PayrollMaintenance","action"=>"monthlyStaffSalaryReportPrint", $ay,$month),
											array("escape"=>false,"target"=>"_blank")); ?></td>
		</div>
		 <div class="col-sm-3">&nbsp;</div>
	</div>
       <!------------" Payroll Generation" created: 20 aug 2016 ----------->
		  
			 <div class="row">
				<div class="col-md-3">&nbsp; </div>
				<div class="col-md-6">
				  <div class="box box-success"> 
					<div class="box-header with-border">
					  <h3 class="box-title">Staff Salary for the month of <?php echo  $monthName = date("F", mktime(0, 0, 0, $month));?></h3>
					</div>
					 
					  <div class="box-body"> 
						<table width="100%" border="1">
						  <tr>
							<th width="1%">Sl.No</th>
							<th width="8%">Staff Name </th>
							<th width="4%">A/c.</th>
							<th width="4%">Net Amount</th> 
						  </tr>
						  <?php 
						  $i=1; 
						  $total_pay=0; 
						  $total_basic_pay=0;  
						  
						  foreach($monthly_payroll_list as $list):
							 //for total pay
								$total_pay = $list['StaffPayroll']['net_salary'];// + $special_inc;
								$total_basic_pay = $total_basic_pay + $total_pay; 
								 
							?>
							  <tr>
								<td><?php echo $i++;?></td>
								<td><?php echo $list['StaffDetail']['first_name'];?></td>
								<td><?php echo $list['StaffDetail']['bank_account'];?></td>
								<td><?php echo $total_pay;?></td> 
							  </tr>
							<?php  
						  endforeach;?>
							<tr>
								<th colspan="3" align="right"> TOTAL</th>  
								<th><?php echo $total_basic_pay;?></th>
								 
							</tr>
						  
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