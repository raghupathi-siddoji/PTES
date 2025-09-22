<header class="main-header">
        <!-- Logo -->
        <a href="../Admin/adminHome" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini">PTES</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg">PTES</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
        
			<!-- -->
			<div class="navbar-custom-menu">
				<ul class="nav navbar-nav"> 
				  
				  <!-- User Account: style can be found in dropdown.less -->
				  <li class="dropdown user user-menu">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
					  <span class="fa fa-user fa-1x"></span>
					  <span class="hidden-xs">Sign by: <?php echo $this->Session->read('user_session_name');?></span>
					</a>
					<ul class="dropdown-menu">
					  <!-- User image --> 
					  <!-- Menu Footer-->
					  <li class="user-footer">
						<div class="pull-left">
						  <?php echo $this->Html->link("Password Change",array("controller"=>"Setting","action"=>"passwordChange"),array("class"=>"btn btn-default btn-flat","escape"=>false));?>
						</div>
						<div class="pull-right">
							<?php echo $this->Html->link("Sing out",array("controller"=>"admin","action"=>"logout"),array("class"=>"btn btn-default btn-flat","escape"=>false));?>
						  
						</div>
					  </li>
					</ul>
				  </li>
				  <!-- Control Sidebar Toggle Button --> 
				</ul>
			</div>
			<!-- -->
        </nav>
      </header> 
	  
	  
	  <!-- side bar-->
	  <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
         <!---   <div class="pull-left image">
              <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div> -->
            
			<!---<div class="pull-left info">
              <p>Alexander Pierce</p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>-->
			
          </div>
          <!-- search form -->
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
			 
			
			<?php 
			$user_type = $this->Session->read('user_type');
			if($user_type=="admin"){
			?>
				<li class="treeview">
				  <a href="#">
					<i class="fa fa-graduation-cap"></i>
					<span>Academic</span>
					<i class="fa fa-angle-left pull-right"></i> </a>
					  <ul class="treeview-menu"> 
							<li class="active"> 				  
							<li><?php echo $this->Html->link('<i class="fa fa-circle-o"> Generate Application Form</i>',
						  array("controller"=>"Student","action"=>"generateApplication"),array("escape"=>false));?></li>
						 
							<li><?php echo $this->Html->link('<i class="fa fa-circle-o"> Student Admission</i>',
						  array("controller"=>"Student","action"=>"studentAdmission"),array("escape"=>false));?></li>
						 
							<li><?php echo $this->Html->link('<i class="fa fa-circle-o"> Parent Detail</i>',
						  array("controller"=>"Student","action"=>"parentList"),array("escape"=>false));?></li>
						  
						  <li><?php echo $this->Html->link('<i class="fa fa-circle-o"> Previous School Detail</i>',
						  array("controller"=>"Student","action"=>"previousSchoolList"),array("escape"=>false));?></li>
						  
						  <li><?php echo $this->Html->link('<i class="fa fa-circle-o"> Student List</i>',
						  array("controller"=>"Student","action"=>"studentLists"),array("escape"=>false));?></li>
						  
						  <li><?php echo $this->Html->link('<i class="fa fa-circle-o"> Co-curricular activities</i>',
						  array("controller"=>"Student","action"=>"coCurricular"),array("escape"=>false));?></li>
						  
						<li><?php echo $this->Html->link('<i class="fa fa-circle-o"> Language Allocation</i>',
						array("controller"=>"Student","action"=>"viewLanguage"),array("escape"=>false));?></li>
						
						<li><?php echo $this->Html->link('<i class="fa fa-circle-o"> Promote Student</i>',
						array("controller"=>"Student","action"=>"promoteStudent"),array("escape"=>false));?></li>
					  </ul>
				</li>
			<?php } ?>
			
			<?php  
			if($user_type=="admin" || $user_type=="accountant"){
			?> 
				<li class="treeview">
				  <a href="#">
					<i class="fa fa-credit-card"></i> <span>Fee </span>
					<i class="fa fa-angle-left pull-right"></i>
				  </a>
					  <ul class="treeview-menu">
					 
						<li><?php echo $this->Html->link('<i class="fa fa-circle-o"> Fee Collecion Management</i>',
						 array("controller"=>"FeeCollection","action"=>"feeCollectionManagement"),array("escape"=>false));?></li>
						 
						 <li><?php echo $this->Html->link('<i class="fa fa-circle-o"> Fee Collecion Govt</i>',
						 array("controller"=>"FeeCollection","action"=>"feeCollectionGovt"),array("escape"=>false));?></li>
						 
						 <li><?php echo $this->Html->link('<i class="fa fa-circle-o"> Fee Collecion RTE</i>',
						 array("controller"=>"FeeCollection","action"=>"feeCollectionRte"),array("escape"=>false));?></li>
						 
						
						<li><?php echo $this->Html->link('<i class="fa fa-circle-o"> Fee Assign for RTE</i>',
						  array("controller"=>"FeeCollection","action"=>"listRteFee"),array("escape"=>false));?></li>
						  
						  <li><?php echo $this->Html->link('<i class="fa fa-circle-o"> Fee Assign for Other</i>',
						  array("controller"=>"FeeCollection","action"=>"feeAssignOther"),array("escape"=>false));?></li>
						  
						  <li><?php echo $this->Html->link('<i class="fa fa-circle-o"> List of Mgnt Fee Collecion</i>',
						  array("controller"=>"FeeCollection","action"=>"listFeeCollection"),array("escape"=>false));?></li>
						  
						  <li><?php echo $this->Html->link('<i class="fa fa-circle-o"> List of Govt Fee Collecion</i>',
						  array("controller"=>"FeeCollection","action"=>"listFeeCollectionGovt"),array("escape"=>false));?></li>
						  
						  <li><?php echo $this->Html->link('<i class="fa fa-circle-o"> List of RTE Fee Collecion</i>',
						  array("controller"=>"FeeCollection","action"=>"listFeeCollectionRte"),array("escape"=>false));?></li>
						  
						  
						  <li><?php echo $this->Html->link('<i class="fa fa-circle-o"> List of Fee Assign</i>',
						  array("controller"=>"FeeCollection","action"=>"listFeeAssign"),array("escape"=>false));?></li>
						
						  <li><?php echo $this->Html->link('<i class="fa fa-circle-o"> Fee Head Assign</i>',
						  array("controller"=>"FeeCollection","action"=>"feeHeadAssign"),array("escape"=>false));?></li> 
						  
						  
					 </ul>
				 </li>
			 <!----------------------Created By Jyothi------------------------------------------------------------->
			<?php } ?> 
			
			<?php  
			if($user_type=="admin"){
			?>
			<li class="treeview">
              <a href="#">
                <i class="fa fa-calendar-minus-o"></i>
                <span>TimeTable</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu"> 
                  <li class="active">  
					<li><?php echo $this->Html->link('<i class="fa fa-circle-o"> Add Subject</i>',
				  array("controller"=>"TimeTable","action"=>"addSubject"),array("escape"=>false));?></li>
				  
				  <li><?php echo $this->Html->link('<i class="fa fa-circle-o"> Add Class Timings</i>',
				  array("controller"=>"TimeTable","action"=>"addClassTimings"),array("escape"=>false));?></li>
				  <li><?php echo $this->Html->link('<i class="fa fa-circle-o"> Subject Allocation</i>',
				  array("controller"=>"TimeTable","action"=>"periodSubjectAllocation"),array("escape"=>false));?></li>
				  <li><?php echo $this->Html->link('<i class="fa fa-circle-o"> Assign Periods Teacher</i>',
				  array("controller"=>"TimeTable","action"=>"assignPeriodsTeacher"),array("escape"=>false));?></li>
				  <li><?php echo $this->Html->link('<i class="fa fa-circle-o"> Generate TimeTable</i>',
				  array("controller"=>"TimeTable","action"=>"generateTimeTable"),array("escape"=>false));?></li>
    
              </ul>
            </li>
			<?php } ?>
			<?php 
			 
			if($user_type=="admin" || $user_type=="teacher"){
			?>
				<li class="treeview">
				  <a href="#">
					<i class="fa fa-users"></i> <span>Attendance</span>
					<i class="fa fa-angle-left pull-right"></i> </a>
				  <ul class="treeview-menu">
				  
				  	 <li><?php echo $this->Html->link('<i class="fa fa-circle-o"> Daily Attendance</i>',
							 array("controller"=>"Attendance","action"=>"DailyAttendance"),array("escape"=>false));?></li>
							 <li><?php echo $this->Html->link('<i class="fa fa-circle-o"> Attendance List</i>',
							 array("controller"=>"Attendance","action"=>"AttendanceLists"),array("escape"=>false));?></li>
					<li><?php echo $this->Html->link('<i class="fa fa-circle-o"> Student Attendance</i>',
					  array("controller"=>"Attendance","action"=>"classWiseAttendance"),array("escape"=>false));?></li>
					
					<li><?php echo $this->Html->link('<i class="fa fa-circle-o"> Update Student Attendance</i>',
					  array("controller"=>"Attendance","action"=>"updateAttendance"),array("escape"=>false));?></li>
					  
					<li><?php echo $this->Html->link('<i class="fa fa-circle-o"> Monthly Wise Report</i>',
					  array("controller"=>"Attendance","action"=>"attendanceMonthReport"),array("escape"=>false));?></li>
					  
					 
				  </ul>
				</li>
				
				<li class="treeview">
						<a href="#">
							<i class="fa fa-book"></i> <span>Spoken English</span>
							<i class="fa fa-angle-left pull-right"></i>
						</a>
						<ul class="treeview-menu">
						<li><?php echo $this->Html->link('<i class="fa fa-circle-o"> Assign Spoken English Grade</i>',
										array("controller"=>"SpokenEnglish","action"=>"SpokenEnglish"),array("escape"=>false));?></li>
						<li><?php echo $this->Html->link('<i class="fa fa-circle-o"> Spoken English Report </i>',
										array("controller"=>"SpokenEnglish","action"=>"SpokenEnglishReport"),array("escape"=>false));?></li> 
						<li><?php echo $this->Html->link('<i class="fa fa-circle-o"> Spoken English List </i>',
										array("controller"=>"SpokenEnglish","action"=>"SpokenEnglishList"),array("escape"=>false));?></li> 
						</ul>
					</li>

                <!-- spoken English -->
				
				<!-- Unit Test
				<li class="treeview">
						<a href="#">
							<i class="fa fa-book"></i> <span>Unit Test</span>
							<i class="fa fa-angle-left pull-right"></i>
						</a>
						<ul class="treeview-menu">
						<li><?php //echo $this->Html->link('<i class="fa fa-circle-o"> Marks Assign</i>',
										//array("controller"=>"Exam","action"=>"UnitTestMarks"),array("escape"=>false));?></li>
						<li><?php //echo $this->Html->link('<i class="fa fa-circle-o"> Marks List </i>',
										//array("controller"=>"Exam","action"=>"UnitTestList"),array("escape"=>false));?></li> 
						 <li><?php //echo $this->Html->link('<i class="fa fa-circle-o"> Marks Report </i>',
										//array("controller"=>"Exam","action"=>"UnitTestMarksList"),array("escape"=>false));?></li> 
						</ul>
					</li>-->
				<!-- Unit Test-->
				
				
				<!-- Vasavi SMS-->
				<li class="treeview">
				  <a href="#">
					<i class="fa fa-envelope-o"></i>
					<span>SMS</span>
					<i class="fa fa-angle-left pull-right"></i> </a>
					  <ul class="treeview-menu"> 
						 
					  <li>
						  <a href="#"><i class="fa fa-circle-o"></i>School SMS
							<span class="pull-right-container">
							  <i class="fa fa-angle-left pull-right"></i>
							</span>
						  </a>  
						  <ul class="treeview-menu">
								<li><?php echo $this->Html->link('<i class="fa fa-circle-o"> Quick Send SMS</i>',
								 array("controller"=>"Sms","action"=>"quickSms"),array("escape"=>false));?></li>
									
																	 
								  
								 
								 <li><?php echo $this->Html->link('<i class="fa fa-circle-o"> Individual Wise SMS</i>',
				 array("controller"=>"Sms","action"=>"individualSms"),array("escape"=>false));?></li> 
				 
				 
						  </ul>
						</li> 
                </li>
				 <li>
						  <a href="#"><i class="fa fa-circle-o"></i> Faculty SMS
							<span class="pull-right-container">
							  <i class="fa fa-angle-left pull-right"></i>
							</span>
						  </a>  
						  <ul class="treeview-menu">
								 
								 
								 <li><?php echo $this->Html->link('<i class="fa fa-circle-o"> Individual Wise SMS</i>',
								 array("controller"=>"Sms","action"=>"facultyIndividualSms"),array("escape"=>false));?></li>
					
						  </ul>						 
						</li>
							<li class="active"> 				  
							<li><?php echo $this->Html->link('<i class="fa fa-circle-o"> Notification Type</i>',
				 array("controller"=>"Sms","action"=>"notificationType"),array("escape"=>false));?></li> 
					  </ul>
				</li>
				 
				<!-- Vasavi SMS-->
				
			 
				<li class="treeview">
				  <a href="#">
					<i class="fa fa-edit"></i>
					<span>Examination</span>
					<i class="fa fa-angle-left pull-right"></i> </a>
				  <ul class="treeview-menu">
					<li><?php echo $this->Html->link('<i class="fa fa-circle-o"> Create Examination</i>',
					  array("controller"=>"Exam","action"=>"createExamList"),array("escape"=>false));?></li>
					
					<li><?php echo $this->Html->link('<i class="fa fa-circle-o"> Marks Entry</i>',
					  array("controller"=>"Exam","action"=>"marksDetailList"),array("escape"=>false));?></li>
					  
					 <li><?php echo $this->Html->link('<i class="fa fa-circle-o"> Update Marks Entry </i>',
					  array("controller"=>"Exam","action"=>"marksEntryUpdate"),array("escape"=>false));?></li>
					
					<li><?php echo $this->Html->link('<i class="fa fa-circle-o"> Subject Allocation</i>',
					  array("controller"=>"Exam","action"=>"subjectAllocationList"),array("escape"=>false));?></li>
					  
					<li><?php echo $this->Html->link('<i class="fa fa-circle-o"> Grade Setting</i>',
					  array("controller"=>"Exam","action"=>"gradeSettingList"),array("escape"=>false));?></li>
					  
					 <li><?php echo $this->Html->link('<i class="fa fa-circle-o"> Class Wise Mark List</i>',
					  array("controller"=>"Exam","action"=>"classWiseMark"),array("escape"=>false));?></li>
				
					 <li><?php echo $this->Html->link('<i class="fa fa-circle-o"> Class Wise Grade List</i>',
					  array("controller"=>"Exam","action"=>"classWiseGrade"),array("escape"=>false));?></li>
					  
					   <li><?php echo $this->Html->link('<i class="fa fa-circle-o"> Individual Marks List</i>',
					  array("controller"=>"Exam","action"=>"individualMarksList"),array("escape"=>false));?></li>
					  
					  <li><?php echo $this->Html->link('<i class="fa fa-circle-o"> Marks Card</i>',
					  array("controller"=>"Exam","action"=>"getMarksCard"),array("escape"=>false));?></li>
				
				  </ul>
				</li>
			<?php } ?>
			
			<?php  
			if($user_type=="admin" || $user_type=="librarian"){
			?>
				<li class="treeview">
					  <a href="#">
					 <i class="fa fa-book"></i>
					 <span>Library Management</span>
					 <i class="fa fa-angle-left pull-right"></i>
					  </a>
					  <ul class="treeview-menu">
					  
					  <li><?php echo $this->Html->link('<i class="fa fa-circle-o"> Book Category</i>',
					   array("controller"=>"LibraryManagement","action"=>"bookCategory"),array("escape"=>false));?></li>
					   
					   <li><?php echo $this->Html->link('<i class="fa fa-circle-o"> Book Publisher</i>',
					   array("controller"=>"LibraryManagement","action"=>"bookPublisherList"),array("escape"=>false));?></li>
					   
					   <li><?php echo $this->Html->link('<i class="fa fa-circle-o"> Book Author</i>',
					   array("controller"=>"LibraryManagement","action"=>"bookAuthorList"),array("escape"=>false));?></li>
					   
					   <li><?php echo $this->Html->link('<i class="fa fa-circle-o"> Book Vendor</i>',
					   array("controller"=>"LibraryManagement","action"=>"bookVendorList"),array("escape"=>false));?></li>
					   
					   <li><?php echo $this->Html->link('<i class="fa fa-circle-o"> Book Location</i>',
					   array("controller"=>"LibraryManagement","action"=>"bookLocation"),array("escape"=>false));?></li>
					   
					   <li><?php echo $this->Html->link('<i class="fa fa-circle-o"> Book Language</i>',
					   array("controller"=>"LibraryManagement","action"=>"bookLanguage"),array("escape"=>false));?></li>   
					   
						<li><?php echo $this->Html->link('<i class="fa fa-circle-o"> Book Details</i>',
					   array("controller"=>"LibraryManagement","action"=>"bookDetailsList"),array("escape"=>false));?></li>
					   
					   <li><?php echo $this->Html->link('<i class="fa fa-circle-o"> Book Issue</i>',
					   array("controller"=>"LibraryManagement","action"=>"bookIssue"),array("escape"=>false));?></li>
					   
					   <li><?php echo $this->Html->link('<i class="fa fa-circle-o"> Book Return</i>',
					   array("controller"=>"LibraryManagement","action"=>"bookReturn"),array("escape"=>false));?></li>
					   
					   <li><?php echo $this->Html->link('<i class="fa fa-circle-o"> Staff Book Issue</i>',
					   array("controller"=>"LibraryManagement","action"=>"staffBookIssue"),array("escape"=>false));?></li>
					   
					   <li><?php echo $this->Html->link('<i class="fa fa-circle-o"> Staff Book Return</i>',
					   array("controller"=>"LibraryManagement","action"=>"staffBookReturn"),array("escape"=>false));?></li>
					   
						 <li><?php echo $this->Html->link('<i class="fa fa-circle-o"> Individual Report</i>',
					   array("controller"=>"LibraryManagement","action"=>"individualReport"),array("escape"=>false));?></li>
					   
					   <li><?php echo $this->Html->link('<i class="fa fa-circle-o"> Class Wise Report</i>',
					   array("controller"=>"LibraryManagement","action"=>"classWiseReport"),array("escape"=>false));?></li>
					   
					   
						<li><?php echo $this->Html->link('<i class="fa fa-circle-o"> Month Wise Report - Student</i>',
					   array("controller"=>"LibraryManagement","action"=>"monthWiseReport"),array("escape"=>false));?></li>
					   
					   <li><?php echo $this->Html->link('<i class="fa fa-circle-o"> Month Wise Report - Staff</i>',
					   array("controller"=>"LibraryManagement","action"=>"monthWiseReportStaff"),array("escape"=>false));?></li>
					 
					  </ul>
				</li>
			
			<?php } ?>
			<!--
			<li class="treeview">
              <a href="#">
                <i class="fa fa-question-circle"></i>
                <span>Question Bank </span>
                <i class="fa fa-angle-left pull-right"></i> </a>
				  <ul class="treeview-menu"> 
						<li class="active">  
						<li><?php echo $this->Html->link('<i class="fa fa-circle-o"> Add Chapters</i>',
					  array("controller"=>"QuestionBank","action"=>"addChapter"),array("escape"=>false));?></li>
					  
					  <li><?php echo $this->Html->link('<i class="fa fa-circle-o"> Add Marks</i>',
					  array("controller"=>"QuestionBank","action"=>"addMarks"),array("escape"=>false));?></li>
					  
					   <li><?php echo $this->Html->link('<i class="fa fa-circle-o"> Add Questing Headings</i>',
					  array("controller"=>"QuestionBank","action"=>"addQuestionHeading"),array("escape"=>false));?></li>
					  
					   <li><?php echo $this->Html->link('<i class="fa fa-circle-o"> Add Exam Type</i>',
					  array("controller"=>"QuestionBank","action"=>"addExamType"),array("escape"=>false));?></li>
					  
					   <li><?php echo $this->Html->link('<i class="fa fa-circle-o"> Generate Question Paper</i>',
					  array("controller"=>"QuestionBank","action"=>"generateQuestionPaper"),array("escape"=>false));?></li>
						
				  </ul>
            </li>
			-->
			<?php  
			if($user_type=="admin" || $user_type=="accountant"){
			?>
				<li class="treeview">
				  <a href="#">
					<i class="fa fa-dollar"></i>
					<span>Payroll Maintenance </span>
					<i class="fa fa-angle-left pull-right"></i>
				  </a>
				  <ul class="treeview-menu">
						
					  <li class="active"> 
					 <li><?php echo $this->Html->link('<i class="fa fa-circle-o">  Staff Details</i>',
					  array("controller"=>"StaffDetail","action"=>"staffDetails"),array("escape"=>false));?></li>
					  
					  <li><?php echo $this->Html->link('<i class="fa fa-circle-o">  Staff Details Update</i>',
					  array("controller"=>"StaffDetail","action"=>"staffDetailsUpdate"),array("escape"=>false));?></li>
					  
					 <li><?php echo $this->Html->link('<i class="fa fa-circle-o"> Staff Attendance</i>',
					  array("controller"=>"StaffDetail","action"=>"staffAttendance"),array("escape"=>false));?></li>
					  
					  <li><?php echo $this->Html->link('<i class="fa fa-circle-o"> Staff Attendance Update</i>',
					  array("controller"=>"StaffDetail","action"=>"staffAttendanceUpdate"),array("escape"=>false));?></li>
					  
					  <li><?php echo $this->Html->link('<i class="fa fa-circle-o"> Monthly Wise Report</i>',
					  array("controller"=>"StaffDetail","action"=>"attendanceMonthReport"),array("escape"=>false));?></li>
					  
					  <li><?php echo $this->Html->link('<i class="fa fa-circle-o">  Basic Allocation</i>',
					  array("controller"=>"PayrollMaintenance","action"=>"basicAllocation"),array("escape"=>false));?></li>
					  
					   <li><?php echo $this->Html->link('<i class="fa fa-circle-o">   Salary Component</i>',
					  array("controller"=>"PayrollMaintenance","action"=>"salaryComponent"),array("escape"=>false));?></li>
					  
					   <li><?php echo $this->Html->link('<i class="fa fa-circle-o">   Payroll Component</i>',
					  array("controller"=>"PayrollMaintenance","action"=>"payrollComponent"),array("escape"=>false));?></li>
					   <li><?php echo $this->Html->link('<i class="fa fa-circle-o">   Payroll Generation</i>',
					  array("controller"=>"PayrollMaintenance","action"=>"payrollGeneration"),array("escape"=>false));?></li>
					 
					<li><?php echo $this->Html->link('<i class="fa fa-circle-o">   Payroll List</i>',
					  array("controller"=>"PayrollMaintenance","action"=>"payrollList"),array("escape"=>false));?></li>
					  <li><?php echo $this->Html->link('<i class="fa fa-circle-o">  Staff List</i>',
					  array("controller"=>"StaffDetail","action"=>"staffList"),array("escape"=>false));?></li>
					  
				  </ul>
				</li>
			<?php } ?>
			<?php  
			if($user_type=="admin" ){
			?>
				<li class="treeview">
					<a href="#">
					<i class="fa fa-university"></i>
					<span>Asset Maintenance </span>
					<i class="fa fa-angle-left pull-right"></i> </a>
					<ul class="treeview-menu"> 
						<li class="active">  
						<li><?php echo $this->Html->link('<i class="fa fa-circle-o"> Add Category</i>',
						array("controller"=>"Asset","action"=>"addCategory"),array("escape"=>false));?></li>

						<li><?php echo $this->Html->link('<i class="fa fa-circle-o"> Add Asset</i>',
						array("controller"=>"Asset","action"=>"addAsset"),array("escape"=>false));?></li> 
						
						<li><?php echo $this->Html->link('<i class="fa fa-circle-o"> Asset Report </i>',
					  array("controller"=>"Report","action"=>"assetReport"),array("escape"=>false));?></li>
					</ul>
				</li> 
            
			
            <li class="treeview">
              <a href="#">
                <i class="fa fa-cog"></i> <span>Settings</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
				<li><?php echo $this->Html->link('<i class="fa fa-circle-o"> Academic Year</i>',
				 array("controller"=>"Setting","action"=>"academicYear"),array("escape"=>false));?></li>
				 
				 <li><?php echo $this->Html->link('<i class="fa fa-circle-o">  Blood Group</i>',
				  array("controller"=>"Setting","action"=>"bloodGroup"),array("escape"=>false));?></li>
				
				<li><?php echo $this->Html->link('<i class="fa fa-circle-o">  Caste</i>',
				 array("controller"=>"Setting","action"=>"caste"),array("escape"=>false));?></li>
	
				<li><?php echo $this->Html->link('<i class="fa fa-circle-o">  Class</i>',
				 array("controller"=>"Setting","action"=>"addClass"),array("escape"=>false));?></li>
				 
				  <li><?php echo $this->Html->link('<i class="fa fa-circle-o">  Designation</i>',
				  array("controller"=>"Setting","action"=>"designation"),array("escape"=>false));?></li>
				 
				 <li><?php echo $this->Html->link('<i class="fa fa-circle-o"> Holiday Setting</i>',
				  array("controller"=>"Attendance","action"=>"holidaySetting"),array("escape"=>false));?></li>
				
				<li><?php echo $this->Html->link('<i class="fa fa-circle-o"> Language</i>',
				 array("controller"=>"Setting","action"=>"language"),array("escape"=>false));?></li>
				 
				 <li><?php echo $this->Html->link('<i class="fa fa-circle-o">  Mother Tongue</i>',
				  array("controller"=>"Setting","action"=>"motherTongue"),array("escape"=>false));?></li>
				 
				  <li><?php echo $this->Html->link('<i class="fa fa-circle-o">  Qualification</i>',
				  array("controller"=>"Setting","action"=>"qualification"),array("escape"=>false));?></li>
				 
				 <li><?php echo $this->Html->link('<i class="fa fa-circle-o"> Religion</i>',
				  array("controller"=>"Setting","action"=>"religion"),array("escape"=>false));?></li>
				
				<li><?php echo $this->Html->link('<i class="fa fa-circle-o"> Section</i>',
				 array("controller"=>"Setting","action"=>"section"),array("escape"=>false));?></li>
				
				<li><?php echo $this->Html->link('<i class="fa fa-circle-o"> Sub Caste</i>',
				 array("controller"=>"Setting","action"=>"subCaste"),array("escape"=>false));?></li>
				 
				 <li><?php echo $this->Html->link('<i class="fa fa-circle-o"> Activity</i>',
				 array("controller"=>"Setting","action"=>"activity"),array("escape"=>false));?></li>
				 
				 <li><?php echo $this->Html->link('<i class="fa fa-circle-o"> Application Fee</i>',
				 array("controller"=>"Setting","action"=>"applicationFee"),array("escape"=>false));?></li>
				 
				 <li><?php echo $this->Html->link('<i class="fa fa-circle-o"> District</i>',
			 array("controller"=>"Setting","action"=>"district"),array("escape"=>false));?></li>
			 
			 <li><?php echo $this->Html->link('<i class="fa fa-circle-o"> Taluk</i>',
			 array("controller"=>"Setting","action"=>"taluk"),array("escape"=>false));?></li>
			 
			 <li><?php echo $this->Html->link('<i class="fa fa-circle-o"> State</i>',
			 array("controller"=>"Setting","action"=>"state"),array("escape"=>false));?></li>
						 
				
              </ul>
            </li>
			
			<?php }
			?>
			
			
		<?php  
			if($user_type=="admin" || $user_type=="accountant"){
			?>	
			<!-- Reports -->
			<li class="treeview">
              <a href="#">
                <i class="fa fa-file"></i>
                <span>Reports</span>
                <i class="fa fa-angle-left pull-right"></i> </a>
              <ul class="treeview-menu"> 
                  
				  <li><?php echo $this->Html->link('<i class="fa fa-circle-o"> Class Wise Nominal Roll </i>',
				  array("controller"=>"Report","action"=>"classwiseNominalRollReport"),array("escape"=>false));?></li>
				  
				  <li><?php echo $this->Html->link('<i class="fa fa-circle-o"> Individual Fee Details</i>',
				  array("controller"=>"FeeCollection","action"=>"feeIndividualReport"),array("escape"=>false));?></li>
				  
				  <li><?php echo $this->Html->link('<i class="fa fa-circle-o"> Class Fee Details</i>',
				  array("controller"=>"FeeCollection","action"=>"feeClasswiseReport"),array("escape"=>false));?></li>
				  
				  <li><?php echo $this->Html->link('<i class="fa fa-circle-o"> Fee Consolidation Report</i>',
				  array("controller"=>"FeeCollection","action"=>"feeConsolidationReport"),array("escape"=>false));?></li>
				  
				  <li><?php echo $this->Html->link('<i class="fa fa-circle-o"> Monthly Attendance Report</i>',
				  array("controller"=>"Attendance","action"=>"attendanceMonthReport"),array("escape"=>false));?></li>
				  
				     <li><?php echo $this->Html->link('<i class="fa fa-circle-o"> Library:Class Wise </i>',
					  array("controller"=>"LibraryManagement","action"=>"classWiseReport"),array("escape"=>false));?></li>
					  
					   <li><?php echo $this->Html->link('<i class="fa fa-circle-o"> Library:Month Wise - Student</i>',
					  array("controller"=>"LibraryManagement","action"=>"monthWiseReport"),array("escape"=>false));?></li>
					  
					  <li><?php echo $this->Html->link('<i class="fa fa-circle-o"> Library:Month Wise - Staff</i>',
					  array("controller"=>"LibraryManagement","action"=>"monthWiseReportStaff"),array("escape"=>false));?></li>
				  
					<li><?php echo $this->Html->link('<i class="fa fa-circle-o"> Study Certificate</i>',
				  array("controller"=>"Report","action"=>"studyCertificate"),array("escape"=>false));?></li>
				  
				  <li><?php echo $this->Html->link('<i class="fa fa-circle-o"> Character Certificate</i>',
				  array("controller"=>"Report","action"=>"charCertificate"),array("escape"=>false));?></li>
				  
				  <!--<li><?php echo $this->Html->link('<i class="fa fa-circle-o"> Transfer Certificate</i>',
				  array("controller"=>"Report","action"=>"tc"),array("escape"=>false));?></li>-->
				  
				
				  
				   <li><?php echo $this->Html->link('<i class="fa fa-circle-o"> Co Curricular </i>',
				  array("controller"=>"Report","action"=>"coCurricular"),array("escape"=>false));?></li>
				  
				   <li><?php echo $this->Html->link('<i class="fa fa-circle-o">  Monthly Salary List</i>',
				  array("controller"=>"PayrollMaintenance","action"=>"monthlySalaryList"),array("escape"=>false));?></li>
				
				<li><?php echo $this->Html->link('<i class="fa fa-circle-o">  Monthly Remmitance List</i>',
				  array("controller"=>"PayrollMaintenance","action"=>"monthlyRemmitanceList"),array("escape"=>false));?></li>
				   <li><?php echo $this->Html->link('<i class="fa fa-circle-o">  Monthly Remmitance of ESI</i>',
				  array("controller"=>"PayrollMaintenance","action"=>"monthlyRemmitanceEsi"),array("escape"=>false));?></li>
					<li><?php echo $this->Html->link('<i class="fa fa-circle-o">  Monthly Staff Salary</i>',
				  array("controller"=>"PayrollMaintenance","action"=>"monthlyStaffSalary"),array("escape"=>false));?></li>
				  
				  	<li><?php echo $this->Html->link('<i class="fa fa-circle-o"> Leave Available</i>',
				  array("controller"=>"Report","action"=>"leaveAvailable"),array("escape"=>false));?></li>
				  
				  <li><?php echo $this->Html->link('<i class="fa fa-circle-o"> Salary Certificate</i>',
				  array("controller"=>"Report","action"=>"salaryCertificate"),array("escape"=>false));?></li>
				  
					
              </ul>
            </li>
			<?php } ?>
			<!-- Reports -->
			 
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside> 
	  
	  <!-- side bar-->
	  
	 