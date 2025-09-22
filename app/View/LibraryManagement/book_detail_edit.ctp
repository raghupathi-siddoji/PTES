<?php foreach($list as $lt) ?>
 <div class="wrapper"> 
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Library Management
          </h1>
          <ol class="breadcrumb">
              <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
              <li><a href="#">Library Management</a></li>
        <li class="active">Book Details</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
           
          <!------------"BOOK Details" created: 20 aug 2016 ----------->
		  
			 <div class="row">
				<!-- left column -->
				<div class="col-md-1"></div>
				<div class="col-md-10">
				  <div class="box box-success">
				<br>
					<div class="box-header with-border">
					  <h3 class="box-title">Book Details</h3>
					</div>
					<!-- form start -->
	 <?php echo $this->Form->create('BookDetail',array("type"=>"file","class" =>"bookDetails","url"=>array("controller"=>"LibraryManagement","action"=>"bookDetailEdit")));?>				   
					  <div class="box-body">
						<div class="form-group">
							<div class="row">
								<div class="col-sm-6">
									<?php echo $this->Form->input('book_code',array('type'=>'text','class'=>'form-control','value'=>$lt['BookDetail']['book_code'],"readonly")); ?>
								</div>
								<div class="col-sm-6">
									<?php echo $this->Form->input('book_unique_code',array('type'=>'text','class'=>'form-control','value'=>$lt['BookDetail']['book_unique_code'],"readonly")); ?> 
								</div>
							</div>
							<div class="row">
								<div class="col-sm-4">
									<?php echo $this->Form->input('id',array('type'=>'hidden','value'=>$lt['BookDetail']['id'])); ?>
									<label>Book Language<span class="mandatory_fields"> * </span></label>
									<?php echo $this->Form->input('book_language_id',array('type'=>'select','label'=>false,'options'=>array('Select'=>'Select Language',$languages),'default'=>$lt['BookDetail']['book_language_id'],"required","class"=>"form-control select_box")) ?>	</div>
										
								<div class="col-sm-4">
									<label>Book Category<span class="mandatory_fields"> * </span></label>
									<?php echo $this->Form->input('book_category_id',array('type'=>'select','label'=>false,'options'=>array('select'=>'Select Category',$categories),'default'=>$lt['BookDetail']['book_category_id'],"required","class"=>"form-control select_box")) ?>	</div>
								<div class="col-sm-4"><label>Title<span class="mandatory_fields"> * </span></label>
									<?php echo $this->Form->input('title',array("type"=>"text",'value'=>$lt['BookDetail']['title'],"class"=>"form-control","required","label"=>false));?>
								</div> 
							</div>
							<div class="row">
							<div class="col-sm-4"><label>Sub Title<span class="mandatory_fields"> * </span></label>
									<?php echo $this->Form->input('sub_title',array("type"=>"text","class"=>"form-control",'value'=>$lt['BookDetail']['sub_title'],"required","label"=>false));?>
								</div>
								<div class="col-sm-4"><label>Price<span class="mandatory_fields"> * </span></label>
								  	<?php echo $this->Form->input('price',array("type"=>"text","class"=>"form-control",'value'=>$lt['BookDetail']['price'],"required","label"=>false,"onkeypress"=>"return isNumber(event)"));?>
								</div>
								<div class="col-sm-4"><label>No of Copies</label>
							  	<?php echo $this->Form->input('number_of_copies',array("type"=>"text","class"=>"form-control","label"=>false,'value'=>$lt['BookDetail']['number_of_copies'],'readonly',"onkeypress"=>"return isNumber(event)"));?>
								</div> 
							</div> 
							<div class="row">
							<div class="col-sm-4"><label>Edition</label>
									<?php echo $this->Form->input('edition',array("type"=>"text","class"=>"form-control",'value'=>$lt['BookDetail']['edition'],"label"=>false));?>
								</div>
								<div class="col-sm-4"><label>Volume</label>
									<?php echo $this->Form->input('volume',array("type"=>"text","class"=>"form-control",'value'=>$lt['BookDetail']['volume'],"label"=>false));?>
								</div>
								<div class="col-sm-4"><label>Pages</label>
									<?php echo $this->Form->input('pages',array("type"=>"text","class"=>"form-control",'value'=>$lt['BookDetail']['pages'],"label"=>false,"onkeypress"=>"return isNumber(event)"));?>
								</div> 
							</div>
							<div>
							
							<div class="row">
								<div class="col-sm-4">
									<label>Book Vendor<span class="mandatory_fields"> * </span></label>
									<?php echo $this->Form->input('book_vendor_id',array('type'=>'select','label'=>false,'options'=>array('select'=>'select vendor',$vendors),'default'=>$lt['BookDetail']['book_vendor_id'],'class'=>'form-control select_box')); ?>
								</div>
								<div class="col-sm-4">
									<label>Book Author<span class="mandatory_fields"> * </span></label>
									<?php echo $this->Form->input('book_author_id',array('type'=>'select','label'=>false,'options'=>array('select'=>'select Author',$authors),'default'=>$lt['BookDetail']['book_author_id'],'class'=>'form-control select_box')); ?>
								</div>
								<div class="col-sm-4">
									<label>Book Publisher<span class="mandatory_fields"> * </span></label>
									<?php echo $this->Form->input('book_publisher_id',array('type'=>'select','label'=>false,'options'=>array('select'=>'select vendor',$publishers),'default'=>$lt['BookDetail']['book_publisher_id'],'class'=>'form-control select_box')); ?>
								</div>
							</div>
							
							<div class="row">
								<div class="col-sm-4">
									<label>Book Location<span class="mandatory_fields"> * </span></label>
									<?php echo $this->Form->input('book_location_id',array('type'=>'select','label'=>false,'options'=>array('Select Location',$locations),'default'=>$lt['BookDetail']['book_location_id'],'class'=>'form-control select_box')); ?>
								</div>
								<div class="col-sm-4">	
									<label>Purchased Year<span class="mandatory_fields"> * </span></label>
									<?php echo $this->Form->input('purchased_year',array('type'=>'text','label'=>false,"required",'value'=>$lt['BookDetail']['purchased_year'],"class"=>"form-control","onkeypress"=>"return isNumber(event)")); ?>	
								</div>
								<div class="col-md-4">
 								<label>Photo Upload</label>
								<?php echo $this->Form->input('photo_path',array('type'=>'file',"class"=>"form-control","label"=>false)) ?>
								</div>
							</div>
							<div class="form-group">
							<div class="row" >
								<div class="col-sm-3"><label>Status<span class="mandatory_fields"> * </span></label>
							  		<?php $status =array('New'=>'New','Second Handle'=>'Second Handle');?>   
									<?php echo $this->Form->input("status",array("type"=>"select","options"=>$status,"label"=>false,'default'=>$lt['BookDetail']['status'],"class"=>"form-control select_box"));?>		  
								
								</div>
								<div class="col-sm-3"><label>Condition<span class="mandatory_fields"> * </span></label>
							  		<?php $Condition =array('Readable'=>'Readable ','UnReadable'=>'UnReadable');?>   
									<?php echo $this->Form->input("condition",array("type"=>"select","options"=>$Condition,"label"=>false,'default'=>$lt['BookDetail']['condition'],"class"=>"form-control select_box"));?>		  
								</div>
								<div class="col-md-3">
									<label>Bill No<span class="mandatory_fields"> * </span></label>
									<?php echo $this->Form->input('bill_no',array('type'=>'text',"required","class"=>"form-control",'value'=>$lt['BookDetail']['bill_no'],"label"=>false)) ?>
								</div>
								<div class="col-md-3">
									<label>Bill Date<span class="mandatory_fields"> * </span></label>
									<?php echo $this->Form->input('bill_date',array("type"=>"text","id"=>"datepicker1","class"=>"form-control",'value'=>$lt['BookDetail']['bill_date'],"required","label"=>false));?>								
								</div>
							</div>
							</div>
							
							<div class="row">
								<div class="col-sm-4"></div>
								<div class="col-sm-4"><?php echo $this->Form->submit('Submit',array("class"=>"btn btn-info form-control"));?></div>
								<div class="col-sm-4">
									<?php echo $this->Html->link('<i class="btn btn-warning btn-sm pull-right">Cancel</i>',
								array('controller'=>'LibraryManagement','action'=>'bookDetailsList'),array('escape'=>false))?>
								</div>
						   </div>
						</div>
						<div class="form-group">
						<div class="row">
							<div class="col-md-4"></div>
							<div class="col-md-4">
								<?php echo $this->Session->Flash();?>
							</div>
							<div class="col-md-4"></div>
						</div>
						</div>
							
					  </div>
					  <div class="col-md-1"></div>
					<?php echo $this->Form->end(); ?>
					<!---- form end ------>
				  	
				  
				</div>
				</div>
				</div>
				<!--col (left) -->
				</div>
				
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
	</div> <!-- wrapper -->