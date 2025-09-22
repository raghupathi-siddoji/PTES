<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Step In Technologies</title>
     
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
	<?php echo $this->Html->css('bootstrap/css/bootstrap.min');?>
     
	<!-- Font Awesome -->  
	<?php echo $this->Html->css('font-awesome.min');?>
    <!-- Ionicons --> 
	<?php echo $this->Html->css('ionicons.min');?>
	 
	<?php echo $this->Html->css('plugins/datatables/dataTables.bootstrap');?>
    <!-- Theme style -->
	<?php echo $this->Html->css('dist/css/AdminLTE.min');?> 
	 <!-- Datepicker -->
	<?php echo $this->Html->css('plugins/datepicker/datepicker3');?> 

     
    <!-- AdminLTE Skins. Choose a skin from the css/skins folder instead of downloading all of them to reduce the load. -->
    <?php echo $this->Html->css('dist/css/skins/_all-skins.min');?> 
	 
 <!-- REFERENCE FOR AUTO COMPLETE -->
	 <!--<link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css"> -->
	  <!--<script src="https://code.jquery.com/jquery-1.12.4.js"></script>-->
    <!--<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>-->
   <?php echo $this->Html->css('jquery-ui');?> 
   	<?php echo $this->Html->script('jquery-1.12.4');?>
	<?php echo $this->Html->script('jquery-ui');?>
 
	<!-- REFERENCE FOR AUTO COMPLETE-->
	 
	
	
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

      <?php echo $this->Element('admin_header'); ?>
	  
      <?php echo $content_for_layout;?>
	  
      <?php echo $this->Element('admin_controller'); ?>
	  <?php echo $this->Element('admin_footer'); ?>
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
	<?php echo $this->Html->script('plugins/jQuery/jquery-2.2.3.min');?>
 
    <!-- jQuery UI 1.11.4 -->
	<?php echo $this->Html->script('jquery-ui.min');?>
	
    <!-- date-range-picker --> 
	<?php echo $this->Html->script('moment.min');?>
	
	
	<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.5 -->
	<?php echo $this->Html->script('bootstrap/js/bootstrap.min');?>
	
	<?php echo $this->Html->script('plugins/datatables/dataTables.bootstrap.min');?> 
	<?php echo $this->Html->script('plugins/datatables/jquery.dataTables.min');?>
    
    <!-- Morris.js charts 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script> -->
    	
	<?php echo $this->Html->script('dist/js/app.min');?> 
     
	<!-- link for custome alert message-->
	<?php echo $this->Html->script('Lobibox');?> 
	<?php echo $this->Html->script('demo');?> 
	
	<!-- for datepicker -->
	<?php echo $this->Html->script('plugins/datepicker/bootstrap-datepicker');?>
	<!-- for date input mask -->
	<?php echo $this->Html->script('plugins/input-mask/jquery.inputmask');?>
	<?php echo $this->Html->script('plugins/input-mask/jquery.inputmask.date.extensions');?>
	<?php echo $this->Html->script('plugins/input-mask/jquery.inputmask.extensions');?>
	
  </body>
</html>

<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
  //Date picker
     $('#datepicker').datepicker({
      autoclose: true,
	  format: 'dd-mm-yyyy'
    });
	$('#datepicker1').datepicker({ 
	  format: 'dd-mm-yyyy', autoclose: true
    });
	$('#datepicker2').datepicker({ 
	  format: 'dd-mm-yyyy', autoclose: true
    });
	$('#datepicker3').datepicker({ 
	  format: 'dd-mm-yyyy', autoclose: true
    });
	$('#datepicker4').datepicker({ 
	  format: 'dd-mm-yyyy', autoclose: true
    });
	$('#datepicker5').datepicker({ 
	  format: 'dd-mm-yyyy', autoclose: true
    });
	$('#datepicker6').datepicker({ 
	  format: 'dd-mm-yyyy', autoclose: true
    });
	 $("#datepicker").inputmask("dd-mm-yyyy", {"placeholder": "dd-mm-yyyy"});
	  $("#datepicker1").inputmask("dd-mm-yyyy", {"placeholder": "dd-mm-yyyy"});
	  
	  
	  	// FOR NUMBER VALIDATION
	function isNumber(evt) {evt = (evt) ? evt : window.event;
  var charCode = (evt.which) ? evt.which : evt.keyCode;
  if (charCode == 8 || charCode == 37) {
    return true;
  } else if (charCode == 46 && $(this).val().indexOf('.') != -1) {
    return false;
  } else if (charCode > 31 && charCode != 46 && (charCode < 48 || charCode > 57)) {
    return false;
  }
  return true;
}

  </script>
 
 
 <style>
.select_box
{
 background-color: #ffff99;
}
.auto_generate
{
 background-color:#3CB371;
 color:white;
}
.calculation_text
{
	background-color:#eee;
}
.mandatory_fields
{
	color:red;
	font-weight:bold;
}
</style>
