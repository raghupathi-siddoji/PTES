 <?php //print_r($list);?>
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
	  <h1>SMS</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-envelope-o" aria-hidden="true"></i> SMS</a></li>
		<li>Notification Type</li>
        <li class="active">Notification</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
     
  <!------------"Notification Type" created: 02 May 2017 ----------->
  
	 <div class="row">
        <!-- left column -->
		
        <div class="col-md-6">
          <div class="box box-success"><div class="box-header with-border"><h4>Notification</h4></div>
<br>
            <!-- form start -->
           <?php echo $this->Form->create('NotificationType',array("url"=>array("controller"=>"Sms","action"=>"notificationType")));?>
		   
              <div class="box-body">
                <div class="form-group">
					<div class="row">
						<div class="col-sm-5"><label>Notification Type<span class="mandatory_fields"> * </span></label></div>
						<div class="col-sm-7">
						<?php echo $this->Form->input('id',array("type"=>"hidden")); 
						echo $this->Form->input('notification_type',array("type"=>"text","class"=>"form-control","required","label"=>false));?>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<div class="col-sm-4"></div>
						<div class="col-sm-2"><?php echo $this->Form->submit('Save',array("class"=>"btn btn-info"));?></div>
						<div class="col-sm-4">
							<?php echo $this->Html->link('<i class="btn btn-warning">Cancel</i>', array("controller"=>"Sms","action"=>"notificationType"),array("escape"=>false)); ?>
						</div>
				   </div>
                </div>
				
              </div>
            <?php echo $this->Form->end();?>
			<!---- form end ------>
          
		  
		</div>
				<?php echo $this->Session->flash(); ?>
        </div>
        <!--col (left) -->
		
	
<!--------------Add  Category ---------------->
	
        <!-- right column -->
        <div class="col-md-6">
		
		<?php if(!empty($list)) { ?>
		<div class="box box-warning">
			  <div class="box-body">
				<table class="table table-bordered" id="example1">
				<thead>
					<tr><th>Sl.No</th><th>Notification Type</th><th>Delete</th><th>Edit</th></tr>
				</thead>
				<?php	$i=1;	
					foreach($list as $lt) {?>
					<tr><td><?php echo $i++; ?></td>
					<td><?php echo $lt['NotificationType']['notification_type'];?></td>
					<?php $id=$lt['NotificationType']['id'];?>
					<td><?php echo $this->Html->link('<i style="font-size:12px;" class="glyphicon glyphicon-trash"></i>'
						,array("controller"=>"Sms","action"=>"notificationTypeDelete",$id),
						array("confirm"=>"Are you sure you want ro delete???","escape"=>false)); ?></td>	
					
					<td><?php echo $this->Html->link('<i style="font-size:12px;" class="glyphicon glyphicon-edit"></i>'
					,array("controller"=>"Sms","action"=>"notificationType",$id),
					array("escape"=>false)); ?></td></tr>
					<?php } ?> 
				
				</table>
				
					
			</div>
			
			</div>
			
			<?php 
			} else
			echo "List is Empty";
			?>
        </div>
      </div>
      <!-- row -->



    
	</section>
    <!-- content -->
  </div>
  <!-- content-wrapper -->