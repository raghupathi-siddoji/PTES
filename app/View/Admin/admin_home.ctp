 <div class="wrapper"> 
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Dashboard
           
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h3><?php echo $total_student;?></h3>
                  <p>Total Students</p>
                </div>
                <div class="icon">
                  <i class="fa fa-group"></i>
                </div>
                <a href="#" class="small-box-footer">&nbsp;</a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h3><?php echo $male_total_student;?></h3>
                  <p>Boys</p>
                </div>
                <div class="icon">
                  <i class="fa fa-male"></i>
                </div>
                <a href="#" class="small-box-footer">&nbsp;</a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                   <h3><?php echo $female_total_student;?></h3>
                  <p>Girl</p>
                </div>
                <div class="icon">
                  <i class="fa fa-female"></i>
                </div>
               <a href="#" class="small-box-footer">&nbsp;</a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box 
              <div class="small-box bg-red">
                <div class="inner">
                  <h3>65</h3>
                  <p>Today Absent</p>
                </div>
                <div class="icon">
                  <i class="ion ion-pie-graph"></i>
                </div>
               <a href="#" class="small-box-footer">&nbsp;</a>
              </div>-->
            </div><!-- ./col -->
          </div><!-- /.row -->
          <!-- Main row -->
          <div class="row">
            <!-- Left col -->
            <section class="col-lg-7 connectedSortable"> 

              <!-- TO DO List -->
              <div class="box box-primary">
                <div class="box-header">
                  <i class="ion ion-clipboard"></i>
                  <h3 class="box-title">Today Birthday list</h3>
                   
                </div><!-- /.box-header -->
                <div class="box-body">
                  <ul class="todo-list">
					<?php 
						 
						for($i=0;$i<count($bdy);$i++)
						{
							$cdate = date('m-d');
							$db_bdy = explode('-',$bdy[$i]['StudentDetail']['dob']);
							$dbbirth_day = $db_bdy[1]."-".$db_bdy[2];
							 if($cdate ==$dbbirth_day)
							 {
								//echo "<br>".$dbbirth_day."".$bdy[$i]['StudentDetail']['student_name']."".$bdy[$i]['StudentDetail']['student_code'];
								?>
								 <li>
								  <!-- drag handle -->
								  <span class="handle"> 
									<i  class="fa fa-birthday-cake"></i>
								  </span> 
								  <!-- todo text -->
								  <span class="text"><?php echo $bdy[$i]['StudentDetail']['student_name']." ". $bdy[$i]['StudentDetail']['student_code'];?></span> 
								</li>
					
								<?php
								
							 } 
						}?> 
                  </ul>
                </div><!-- /.box-body -->
                <div class="box-footer clearfix no-border"> 
                </div>
              </div><!-- /.box -->

               

            </section><!-- /.Left col -->
            <!-- right col (We are only adding the ID to make the widgets sortable)-->
             
          </div><!-- /.row (main row) -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
	</div> <!-- wrapper -->