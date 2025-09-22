<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Step In Technologies</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <?php echo $this->Html->css('bootstrap/css/bootstrap.min');?>
	 
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style --> 
  <?php echo $this->Html->css('dist/css/AdminLTE.min');?> 
 <?php echo $this->Html->css('style1');?>
  </head>
  <body class="hold-transition login-page">
  <ul class="cb-slideshow">
            <li><span>Image 01</span><div><h3> </h3></div></li>
            <li><span>Image 02</span><div><h3> </h3></div></li>
            <li><span>Image 03</span><div><h3> </h3></div></li>
            <li><span>Image 04</span><div><h3> </h3></div></li>
            <li><span>Image 05</span><div><h3> </h3></div></li>
            <li><span>Image 06</span><div><h3> </h3></div></li>
        </ul>
  <?php echo $content_for_layout;?>
    <!-- jQuery 2.2.3 -->
	
<?php echo $this->Html->script('plugins/jQuery/jQuery-2.2.3.min');?>
<!-- Bootstrap 3.3.6 --> 
<?php echo $this->Html->script('bootstrap/js/bootstrap.min');?>
 
 
  </body>
</html>
<style>
	.bg
	{
		background-image:url(img/ptes.jpg);
		background-size:cover;
	}
</style>
 <style>
.sunday
{
	background-color: #ffff99;
}
.none
{
	background-color:#ff7f7f;
	color:white;

}
.holiday
{
	background-color: #00BFFF;
		color:white;

}
</style>
