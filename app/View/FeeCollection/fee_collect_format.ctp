 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
	  <h1>Fee</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Fee</a></li>
        <li class="active">Fee Collection</li>
      </ol>
				<div class="col-md-10"></div>
				<div class="col-md-2">Date : <?php echo date('d-m-y'); ?></div>
    </section>

    <!-- Main content -->
    <section class="content">
  
	<div class="row">
       
	<!------------------------------------>
	<?php echo $this->Form->create('',array("url"=>array("controller"=>"FeeCollection","action"=>"feeCollectFormat")));?>
        <div class="col-md-12">
			
			<div class="box box-warning">
				<div class="box-body">
					<div class="row">
						<label class="col-md-3">Name : Kruthi V Kustagi</label>
						<label class="col-md-1">Class : 1st</label>
						<div class="col-md-3"></div>
						<label class="col-md-3">Student Code :</label>
						<label class="col-md-2">Recipt No:</label>
						
					</div>
					
					
					<table class="table table-bordered">
						<tr><th>Fee Head Name</th><th>Amount</th></tr>
						<tr><td>Admission</td><td>1500</td></tr>
						<tr><td>Tution</td><td>100</td></tr>
						<tr><td>Computer Skill</td><td>100</td></tr>
						<tr><td>Govt</td><td>500</td></tr>
					</table>
					<br>
					<div class="row">
						<div class="col-md-4"><?php echo $this->Form->input("remarks",array("type"=>"textarea","class"=>"form-control","rows"=>"2")); ?>
						<?php echo $this->Form->input("next_payment_date",array("type"=>"text","class"=>"form-control")); ?></div>
						<div class="col-md-3"></div>
						<div class="col-md-5"><br>
							<div class="row">
								<label class="col-md-4" style="text-align:right">Total Course Fee</label>
								<div class="col-md-8"><?php echo $this->Form->input("fee",array("type"=>"hidden","value"=>2200,"id"=>"fee")); ?>2200</div>
							</div>
						<div class="row">
							<label class="col-md-4" style="text-align:right">Paying Amount</label>
							<div class="col-md-8"><?php echo $this->Form->input("pay",array("type"=>"text","id"=>"pay","class"=>"form-control",
							"onKeyUp"=>"return bal_calc()","required","label"=>false)); ?></div>
						</div>
						<div class="row">
							<label class="col-md-4" style="text-align:right">Balance</label>
							<div class="col-md-8"><?php echo $this->Form->input("bal",array("type"=>"text","disabled","class"=>"form-control","id"=>"bal","label"=>false)); ?></div>
						</div>
						<div class="row">
							<label class="col-md-4" style="text-align:right">Fine Amount</label>
							<div class="col-md-8"><?php echo $this->Form->input("fine",array("type"=>"text","class"=>"form-control","label"=>false)); ?></div>
						</div>
						</div>
					</div>
					
					<div class="row">
						<div class="col-md-5"></div>
						<div class="col-md-4"><?php echo $this->Form->submit("Submit",array("class"=>"btn btn-info"));?></div>
						<div class="col-md-3"></div>
					</div>
				</div>
			</div>
		</div>
		<?php echo $this->Form->end(); ?>
	</div>
	
<!------------------------------------------------>
	</section>
    <!-- content -->
  </div>
  <!-- content-wrapper -->
  
  <script>
  function bal_calc() {
        
		var f= document.getElementById('fee').value;
        var p = document.getElementById('pay').value;
	var result = parseFloat(f) - parseFloat(p);
        if(!isNaN(result)){
            document.getElementById('bal').value = parseFloat(result);
        }
}
  </script>
  