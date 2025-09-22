<?php
 /*
 By:Raghupathi Siddoji
 on 30-Aug-2016
 for PTES reports function 
 */

App::uses('AppController', 'Controller');
 
class ReportController extends AppController {

 
	public $uses = array('Designation','StudentDetail','AcademicYear','AddClass','CoCurricular','Asset','AssetCategory','Language','StaffDetail','StaffAttendanceDetail','StaffPayroll'); 
	public $helpers = array('DateToWord','Html', 'Form', 'Js','Session');
	
	public function studyCertificate()
	{
		$this->_userSessionCheckout();
		configure::write("debug",0);
		$this->layout="ptes_admin"; 
		if(!empty($this->request->data))
		{ 
			 
			$academic_year_id = $this->request->data['Report']['academic_year_id'];
			$student_code_ = split('-',$this->request->data['Report']['student_code']);
			$student_code = $student_code_[1];
			
			$condition = array("conditions"=>array("student_code"=>$student_code,"StudentDetail.academic_year_id"=>$academic_year_id));
			$study_certificate_details = $this->StudentDetail->find("first",$condition);
			//debug($this->StudentDetail->getDataSource()->getLog(false,false));
			$this->set("study_certificate_details",$study_certificate_details);
			//$this->render("study_certificate_details");
			 
		}
		/*Get Class */
			$class = $this->AddClass->find('all');
			$class = Set::extract($class, '{n}.AddClass');
			$class_array = array();
			if(!empty($class)){
			    foreach($class as $cls){ 
				$class_array[$cls['id']] = $cls['class'];
			    }
			}
			$this->set('class_array', $class_array); 
		/*Get Academic Year */
			$academic_year = $this->AcademicYear->find('all',array('order'=>'AcademicYear.academic_year DESC'));
			$academic_year = Set::extract($academic_year, '{n}.AcademicYear');
			$academic_year_array = array();
			if(!empty($academic_year)){
			    foreach($academic_year as $ay){ 
				$academic_year_array[$ay['id']] = $ay['academic_year'];
			    }
			}
			$this->set('academic_year_array', $academic_year_array);
			
			
		//To get student for autocomplete
			$student=$this->StudentDetail->find('all',array('fields'=>array('student_name','student_code'),"recursive"=>0)); 
			$list_array = array();
			foreach($student as $slist){
					$list_array[] =  $slist['StudentDetail']['student_name']."-".$slist['StudentDetail']['student_code'];
			} 
			$student1='"'.implode('","',$list_array).'"'; 
		    $this->set('student',$student1); 
			 
	}
	public function CetstudyCertificate()
	{
		$this->_userSessionCheckout();
		$this->layout="ptes_admin";
		configure::write("debug",0);
		
		if(!empty($this->request->data))
		{ 
			 
			$academic_year_id = $this->request->data['Report']['academic_year_id'];
			$student_code_ = split('-',$this->request->data['Report']['student_code']);
			$student_code = $student_code_[1];
			
			$condition = array("conditions"=>array("student_code"=>$student_code,"StudentDetail.academic_year_id"=>$academic_year_id));
			$study_certificate_details = $this->StudentDetail->find("first",$condition); 
			$this->set("study_certificate_details",$study_certificate_details); 
		}
		
		/*Get Academic Year */
			$academic_year = $this->AcademicYear->find('all',array('order'=>'AcademicYear.academic_year DESC'));
			$academic_year = Set::extract($academic_year, '{n}.AcademicYear');
			$academic_year_array = array();
			if(!empty($academic_year)){
			    foreach($academic_year as $ay){ 
				$academic_year_array[$ay['id']] = $ay['academic_year'];
			    }
			}
			$this->set('academic_year_array', $academic_year_array);
			
			
		//To get student for autocomplete
			$student=$this->StudentDetail->find('all',array('fields'=>array('student_name','student_code'),"recursive"=>0)); 
			$list_array = array();
			foreach($student as $slist){
					$list_array[] =  $slist['StudentDetail']['student_name']."-".$slist['StudentDetail']['student_code'];
			} 
			$student1='"'.implode('","',$list_array).'"'; 
		    $this->set('student',$student1); 
			
			/*Get Class */
			$class = $this->AddClass->find('all');
			$class = Set::extract($class, '{n}.AddClass');
			$class_array = array();
			if(!empty($class)){
			    foreach($class as $cls){ 
				$class_array[$cls['class_name']] = $cls['class'];
			    }
			}
			$this->set('class_array', $class_array); 
	}
	public function CetstudyCertificatePrint($student_code_,$academic_year_id,$from_class,$to_class)
	{
		$this->_userSessionCheckout();
		configure::write("debug",0);
		$this->layout="ajax";
		
		if($student_code_!='')
		{ 
			 
			$academic_year_id = $academic_year_id;
			$student_code_ = split('-',$student_code_);
			$student_code = $student_code_[1]; 
		 
			$condition = array("conditions"=>array("student_code"=>$student_code,"StudentDetail.academic_year_id"=>$academic_year_id));
			$study_certificate_details = $this->StudentDetail->find("first",$condition); 
			$this->set("study_certificate_details",$study_certificate_details); 
				$this->set("from_class",$from_class); 
			$this->set("to_class",$to_class);
		}  
	}
	
	 
	public function charCertificate()
	{
		$this->_userSessionCheckout();
		configure::write("debug",0);
		$this->layout="ptes_admin";
		
		
		if(!empty($this->request->data))
		{ 
			 
			$academic_year_id = $this->request->data['Report']['academic_year_id'];
			$student_code_ = split('-',$this->request->data['Report']['student_code']);
			$student_code = $student_code_[1];
			
			$condition = array("conditions"=>array("student_code"=>$student_code,"StudentDetail.academic_year_id"=>$academic_year_id));
			$char_certificate_details = $this->StudentDetail->find("first",$condition); 
			$this->set("char_certificate_details",$char_certificate_details); 
		}
		
		
		/*Get Academic Year */
			$academic_year = $this->AcademicYear->find('all',array('order'=>'AcademicYear.academic_year DESC'));
			$academic_year = Set::extract($academic_year, '{n}.AcademicYear');
			$academic_year_array = array();
			if(!empty($academic_year)){
			    foreach($academic_year as $ay){ 
				$academic_year_array[$ay['id']] = $ay['academic_year'];
			    }
			}
			$this->set('academic_year_array', $academic_year_array);
			
			
		//To get student for autocomplete
			$student=$this->StudentDetail->find('all',array('fields'=>array('student_name','student_code'),"recursive"=>0)); 
			$list_array = array();
			foreach($student as $slist){
					$list_array[] =  $slist['StudentDetail']['student_name']."-".$slist['StudentDetail']['student_code'];
			} 
			$student1='"'.implode('","',$list_array).'"'; 
		    $this->set('student',$student1); 
			
			/*Get Class */
			$class = $this->AddClass->find('all');
			$class = Set::extract($class, '{n}.AddClass');
			$class_array = array();
			if(!empty($class)){
			    foreach($class as $cls){ 
				$class_array[$cls['class_name']] = $cls['class'];
			    }
			}
			$this->set('class_array', $class_array); 
			/*Get Class */
			$class = $this->AddClass->find('all');
			$class = Set::extract($class, '{n}.AddClass');
			$class_array = array();
			if(!empty($class)){
			    foreach($class as $cls){ 
				$class_array[$cls['id']] = $cls['class'];
			    }
			}
			$this->set('class_array1', $class_array); 
	}
	
	public function charCertificatePrint($student_code_,$academic_year_id,$from_class,$to_class)
	{
		$this->_userSessionCheckout();
		configure::write("debug",0);
		$this->layout="ajax"; 
		if($student_code_!='')
		{ 
			 
			$academic_year_id = $academic_year_id;
			$student_code_ = split('-',$student_code_);
			$student_code = $student_code_[1];
			
			$condition = array("conditions"=>array("student_code"=>$student_code,"StudentDetail.academic_year_id"=>$academic_year_id));
			$char_certificate_details = $this->StudentDetail->find("first",$condition); 
			$this->set("char_certificate_details",$char_certificate_details); 
			$this->set("from_class",$from_class); 
			$this->set("to_class",$to_class);
		} 
	}
	
	 
	public function tc()
	{
		$this->_userSessionCheckout();
		$this->layout="ptes_admin";
	}
	
	public function tcDetails()
	{
		$this->_userSessionCheckout();
		$this->layout="ptes_admin";
	}
	 
	 
	public function char_certificate_print()
	{
		$this->_userSessionCheckout();
		$this->layout="ajax";
	}
	public function studyCertificatePrint($student_code_,$academic_year_id)
	{
		$this->_userSessionCheckout();
		configure::write("debug",0);
		$this->layout="ajax"; 
		if($student_code_!='')
		{ 
			 $academic_year_id = $academic_year_id;
			$student_code_ = split('-',$student_code_);
			$student_code = $student_code_[1];
			
			$condition = array("conditions"=>array("student_code"=>$student_code,"StudentDetail.academic_year_id"=>$academic_year_id));
			$study_certificate_details = $this->StudentDetail->find("first",$condition);
			//debug($this->StudentDetail->getDataSource()->getLog(false,false));
			$this->set("study_certificate_details",$study_certificate_details);
			//$this->render("study_certificate_details"); 
		} 
			 
	}  
	public function classwiseNominalRollReport()
	{
		$this->_userSessionCheckout();
		configure::write("debug",0);
		$this->layout="ptes_admin";
		
		if(!empty($this->request->data))
		{
			$class_id = $this->request->data['Report']['class_id'];
			$academic_year_id = $this->request->data['Report']['academic_year_id']; 
			
			$condition = array("conditions"=>array("add_class_id"=>$class_id,"StudentDetail.academic_year_id"=>$academic_year_id),"order"=>array("StudentDetail.student_name"=>"ASC"));
			$nominal_roll_list = $this->StudentDetail->find("all",$condition); 
			$this->set('nominal_roll_list',$nominal_roll_list);
			//print_r($nominal_roll_list);
			
		}
		
		/*Get Academic Year */
			$academic_year = $this->AcademicYear->find('all',array('order'=>'AcademicYear.academic_year DESC'));
			$academic_year = Set::extract($academic_year, '{n}.AcademicYear');
			$academic_year_array = array();
			if(!empty($academic_year)){
			    foreach($academic_year as $ay){ 
				$academic_year_array[$ay['id']] = $ay['academic_year'];
			    }
			}
			$this->set('academic_year_array', $academic_year_array);
			
			/*Get Class */
			$class = $this->AddClass->find('all');
			$class = Set::extract($class, '{n}.AddClass');
			$class_array = array();
			if(!empty($class)){
			    foreach($class as $cls){ 
				$class_array[$cls['id']] = $cls['class'];
			    }
			}
			$this->set('class_array', $class_array); 
	}
	public function classwiseNominalRollReportPrint($class_id,$academic_year_id)
	{
		$this->_userSessionCheckout();
		configure::write("debug",0);
		$this->layout="ajax";
		
		if($class_id!='' && $academic_year_id!='')
		{ 
			
			$condition = array("conditions"=>array("add_class_id"=>$class_id,"StudentDetail.academic_year_id"=>$academic_year_id),"order"=>array("StudentDetail.student_name"=>"ASC"));
			$nominal_roll_list = $this->StudentDetail->find("all",$condition); 
			$this->set('nominal_roll_list',$nominal_roll_list);  
		} 
	}
	
	public function coCurricular()
	{
		$this->_userSessionCheckout();
		configure::write("debug",0);
		$this->layout="ptes_admin";
		
		if(!empty($this->request->data))
		{
			$student_code_ = split('-',$this->request->data['Report']['student_code']);
			$student_code = $student_code_[1];
			$academic_year_id = $this->request->data['Report']['academic_year_id']; 
			
			$conditions = array("conditions"=>array('StudentDetail.student_code'=>$student_code,
										'StudentDetail.academic_year_id'=>$this->request->data['Report']['academic_year_id']),
										'fields'=>array('id') );
				$student_details= $this->StudentDetail->find("first",$conditions);
				$student_id = $student_details['StudentDetail']['id'];
				
			
			$condition = array("conditions"=>array("student_detail_id"=>$student_id,"CoCurricular.academic_year_id"=>$academic_year_id) );
			$co_curricular_list = $this->CoCurricular->find("all",$condition); 
			$this->set('co_curricular_list',$co_curricular_list);
			//print_r($co_curricular_list); 
			
		}
		
		//To get student for autocomplete
			$student=$this->StudentDetail->find('all',array('fields'=>array('student_name','student_code'),"recursive"=>0)); 
			$list_array = array();
			foreach($student as $slist){
					$list_array[] =  $slist['StudentDetail']['student_name']."-".$slist['StudentDetail']['student_code'];
			} 
			$student1='"'.implode('","',$list_array).'"'; 
		    $this->set('student',$student1); 
			
			
		/*Get Academic Year */
			$academic_year = $this->AcademicYear->find('all',array('order'=>'AcademicYear.academic_year DESC'));
			$academic_year = Set::extract($academic_year, '{n}.AcademicYear');
			$academic_year_array = array();
			if(!empty($academic_year)){
			    foreach($academic_year as $ay){ 
				$academic_year_array[$ay['id']] = $ay['academic_year'];
			    }
			}
			$this->set('academic_year_array', $academic_year_array);
	}
	public function coCurricularPrint($student_code_=null,$academic_year_id=null)
	{
		$this->_userSessionCheckout();
		configure::write("debug",0);
		$this->layout="ajax";
		
		if($student_code_!='')
		{
			$student_code_ = split('-',$student_code_);
			$student_code = $student_code_[1]; 
			
			$conditions = array("conditions"=>array('StudentDetail.student_code'=>$student_code,
										'StudentDetail.academic_year_id'=>$academic_year_id),
										'fields'=>array('id') );
				$student_details= $this->StudentDetail->find("first",$conditions);
				$student_id = $student_details['StudentDetail']['id'];
				
			
			$condition = array("conditions"=>array("student_detail_id"=>$student_id,"CoCurricular.academic_year_id"=>$academic_year_id) );
			$co_curricular_list = $this->CoCurricular->find("all",$condition); 
			$this->set('co_curricular_list',$co_curricular_list);
			//print_r($co_curricular_list); 
			
		} 
	 
	}
	
	public function assetReport()
	{
		$this->_userSessionCheckout();
		$this->layout="ptes_admin";
		
		if(!empty($this->request->data))
		{
			$belongs_to = $this->request->data['Report']['belongs_to'];
			$asset_category_id = $this->request->data['Report']['asset_category_id']; 
			$academic_year_id = $this->request->data['Report']['academic_year_id']; 
			
			if($academic_year_id!='' && $asset_category_id!='' && $belongs_to!='')
			{
				$condition = array("conditions"=>array("academic_year_id"=>$academic_year_id,
														"asset_category_id"=>$asset_category_id,
														"belongs_to"=>$belongs_to)); 
			}
			else if($academic_year_id!='' && $asset_category_id!='')
			{
				$condition = array("conditions"=>array("academic_year_id"=>$academic_year_id,
														"asset_category_id"=>$asset_category_id )); 
			}
			else if($asset_category_id!='')
			{
				$condition = array("conditions"=>array("asset_category_id"=>$asset_category_id )); 
			}
			
			$asset_list = $this->Asset->find("all",$condition);
			$this->set("asset_list",$asset_list);
			//print_r($asset_list);
			 
		}
		
		/*Get Category */
			$cateogry_list = $this->AssetCategory->find('all');
			$cateogry_list = Set::extract($cateogry_list, '{n}.AssetCategory');
			$cateogry_array = array();
			if(!empty($cateogry_list)){
			    foreach($cateogry_list as $cateogry){ 
				$cateogry_array[$cateogry['id']] = $cateogry['category'];
			    }
			}
			$this->set('category_list', $cateogry_array);
			
			/*Get Academic Year */
			$academic_year = $this->AcademicYear->find('all',array('order'=>'AcademicYear.academic_year DESC'));
			$academic_year = Set::extract($academic_year, '{n}.AcademicYear');
			$academic_year_array = array();
			if(!empty($academic_year)){
			    foreach($academic_year as $ay){ 
				$academic_year_array[$ay['id']] = $ay['academic_year'];
			    }
			}
			$this->set('academic_year_array', $academic_year_array);
	}
	
	public function assetReportPrint($asset_category_id=null,$academic_year_id=null,$belongs_to=null)
	{
		$this->_userSessionCheckout();
		$this->layout="ajax";
		
		if($asset_category_id!='')
		{ 
			
			if($academic_year_id!='' && $asset_category_id!='' && $belongs_to!='')
			{
				$condition = array("conditions"=>array("academic_year_id"=>$academic_year_id,
														"asset_category_id"=>$asset_category_id,
														"belongs_to"=>$belongs_to)); 
			}
			else if($academic_year_id!='' && $asset_category_id!='')
			{
				$condition = array("conditions"=>array("academic_year_id"=>$academic_year_id,
														"asset_category_id"=>$asset_category_id )); 
			}
			else if($asset_category_id!='')
			{
				$condition = array("conditions"=>array("asset_category_id"=>$asset_category_id )); 
			}
			$asset_list = $this->Asset->find("all",$condition);
			$this->set("asset_list",$asset_list); 
		} 
	}
	
	public function languageAllocationReport()
	{
		$this->_userSessionCheckout();
		$this->layout="ptes_admin";
		
		
		if(!empty($this->request->data))
		{
			print_r($this->request->data);
			//$condition= array("conditions"=>array("LanguageAllocation.academic_year_id"=>"",))
		}
		
		
		/* Get Class Dropdown Select List */
		$class_list=$this->AddClass->find('all',array('conditions'=>array('AddClass.class BETWEEN ? AND ? '=>array('08','10'))));
		$class_array = array();
		if(!empty($class_list))
		{
			foreach($class_list as $class)
			{ 
				$class_array[$class['AddClass']['id']] = $class['AddClass']['class_name'];
			}
		}
		$this->set('clas_name',$class_array);
		
		/*Get Academic Year */
			$academic_year = $this->AcademicYear->find('all',array("order"=>"academic_year DESC"));
			$academic_year = Set::extract($academic_year, '{n}.AcademicYear');
			$academic_year_array = array();
			if(!empty($academic_year)){
			    foreach($academic_year as $ay){ 
				$academic_year_array[$ay['id']] = $ay['academic_year'];
			    }
			}
			$this->set('academic_year_array', $academic_year_array);
			
			/* Get language Dropdown Select List */
			$language_list=$this->Language->find('all');
			$language_array = array();
			if(!empty($language_list))
			{
				foreach($language_list as $Lang)
				{ 
					$language_array[$Lang['Language']['id']] = $Lang['Language']['language'];
				}
			}
			$this->set('listLanguage',$language_array); 
			
	}
	public function leaveAvailable()
	{
		$this->_userSessionCheckout();
		configure::write("debug",0);
		$this->layout="ptes_admin";
		
		if(!empty($this->request->data))
		{
			$staff_name_arry = array();
			$staff_designation_arry = array();
			$staff_cl_arry = array();
			$staff_el_arry = array();
			$staff_previou_el_arry = array();
			$months_cl_array = array();
			$months_el_array = array();
			$jcl=0;
			$jel=0;
			$jmonth_cl = array();
			$jmonth_el = array();
			$fcl=0;	
			$fel=0;	 
			$mcl=0;	
			$mel=0;
			$cl4=0;	
			$el4=0;
			$fmonth_cl = array();
			$fmonth_el = array();
			$mmonth_cl = array();
			$mmonth_el = array();
			$month_cl4 = array();
			$month_el4 = array();
			$month_cl5 = array();
			$month_el5 = array();
			$month_cl6 = array();
			$month_el6 = array();$month_cl7 = array();$month_el7 = array();$month_cl8 = array();$month_el8 = array();$month_cl9 = array();$month_el9 = array();
			$omonth_cl = array();$omonth_el = array();$month_cl11 = array();$month_el11 = array();$dmonth_cl12 = array();$dmonth_el12 = array();
			$cl5=0;	
			$el5=0;	
			$cl6=0;	$el6=0;$cl7=0;$el7=0;$cl8=0;$el8=0;$cl9=0;$el9=0;$cl10=0;$el10=0;$cl11=0;$el11=0;$dec_cl=0;$dec_el=0;
			$hd1=0;$hd2=0;$hd3=0;$hd4=0;$hd5=0;$hd6=0;$hd7=0;$hd8=0;$hd9=0;$hd10=0;$hd11=0;$hd12=0;
			
			$academic_year_id = $this->request->data['Report']['academic_year_id'];
			$month = $this->request->data['Report']['month']; 
			 
			$staff_leave_list = $this->StaffDetail->find("all",array("recursive"=>0));
			//print_r($staff_leave_list);
			foreach($staff_leave_list as $leave_list)
			{
				$id = $leave_list['StaffDetail']['id'];
				array_push($staff_name_arry,$leave_list['StaffDetail']['first_name']);
				$this->set("staff_name_arry",$staff_name_arry);
				
				array_push($staff_designation_arry,$leave_list['Designation']['designation']);
				$this->set("staff_designation_arry",$staff_designation_arry);
				
				array_push($staff_cl_arry,$leave_list['BasicAllocation']['staff_cl']);
				$this->set("staff_cl_arry",$staff_cl_arry);
				
				array_push($staff_el_arry,$leave_list['BasicAllocation']['staff_el']);
				$this->set("staff_el_arry",$staff_el_arry);
				
				array_push($staff_previou_el_arry,$leave_list['BasicAllocation']['previous_el']);
				$this->set("staff_previou_el_arry",$staff_previou_el_arry); 
				
				//FOR GETTING ATTENDANCE CL / EL COUNT
				
				$condition_leave = array("conditions"=>array("academic_year_id"=>$academic_year_id,"month <= "=>$month,"StaffAttendance.staff_detail_id"=>$id));
				$staff_leave = $this->StaffAttendanceDetail->StaffAttendance->find("all",$condition_leave); 
				//debug($this->StaffAttendanceDetail->getDataSource()->getLog(false,false));
				//print_r($condition_leave);
				foreach($staff_leave as $attendance)
				{ 
					 
					 if($attendance['StaffAttendanceDetail']['month']=="1")
					{
						for($ya=1;$ya<=31;$ya++)
						{
							if($attendance['StaffAttendance']["day$ya"]=="CL"){$jcl++;}
							if($attendance['StaffAttendance']["day$ya"]=="EL"){$jel++;} 
							if($attendance['StaffAttendance']["day$ya"]=="HD"){$hd1++;}  
						}
						array_push($jmonth_cl,$jcl+$hd1/2);
						$this->set("jmonth_cl",$jmonth_cl);
						array_push($jmonth_el,$jel);
						$this->set("jmonth_el",$jmonth_el);
					} 
					 
					if($attendance['StaffAttendanceDetail']['month']=="2")
					{
						for($ya=1;$ya<=31;$ya++)
						{	
							 
							if($attendance['StaffAttendance']["day$ya"]=="CL"){$fcl++;}
							if($attendance['StaffAttendance']["day$ya"]=="EL"){$fel++;} 
							if($attendance['StaffAttendance']["day$ya"]=="HD"){$hd2++;} 
							
						}
						 
						array_push($fmonth_cl,$fcl+$hd2/2);
						$this->set("fmonth_cl",$fmonth_cl);
						array_push($fmonth_el,$fel);
						$this->set("fmonth_el",$fmonth_el);
					}
				 	if($attendance['StaffAttendanceDetail']['month']=="3")
						{
							for($ya=1;$ya<=31;$ya++)
							{
								if($attendance['StaffAttendance']["day$ya"]=="CL"){$mcl++;}
								if($attendance['StaffAttendance']["day$ya"]=="EL"){$mel++;}
								if($attendance['StaffAttendance']["day$ya"]=="HD"){$hd3++;} 
								
							}
							array_push($mmonth_cl,$mcl+$hd3/2);
							$this->set("mmonth_cl",$mmonth_cl);
							array_push($mmonth_el,$mel);
							$this->set("mmonth_el",$mmonth_el);
						}
					if($attendance['StaffAttendanceDetail']['month']=="4")
						{
							for($ya=1;$ya<=31;$ya++)
							{
								if($attendance['StaffAttendance']["day$ya"]=="CL"){$cl4++;}
								if($attendance['StaffAttendance']["day$ya"]=="EL"){$el4++;} 
								if($attendance['StaffAttendance']["day$ya"]=="HD"){$hd4++;} 
							}
							array_push($month_cl4,$cl4+$hd4/2);
							$this->set("month_cl4",$month_cl4);
							array_push($month_el4,$el4);
							$this->set("month_el4",$month_el4);
						}
					if($attendance['StaffAttendanceDetail']['month']=="5")
						{
							for($ya=1;$ya<=31;$ya++)
							{
								if($attendance['StaffAttendance']["day$ya"]=="CL"){$cl5++;}
								if($attendance['StaffAttendance']["day$ya"]=="EL"){$el5++;} 
								if($attendance['StaffAttendance']["day$ya"]=="HD"){$hd5++;} 
							}
							array_push($month_cl5,$cl5+$hd5/2);
							$this->set("month_cl5",$month_cl5);
							array_push($month_el5,$el5);
							$this->set("month_el5",$month_el5);
						}
					if($attendance['StaffAttendanceDetail']['month']=="6")
						{
							for($ya=1;$ya<=31;$ya++)
							{
								if($attendance['StaffAttendance']["day$ya"]=="CL"){$cl6++;}
								if($attendance['StaffAttendance']["day$ya"]=="EL"){$el6++;} 
								if($attendance['StaffAttendance']["day$ya"]=="HD"){$hd6++;} 
							}
							array_push($month_cl6,$cl6+$hd6/2);
							$this->set("month_cl6",$month_cl6);
							array_push($month_el6,$el6);
							$this->set("month_el6",$month_el6);
						}
					if($attendance['StaffAttendanceDetail']['month']=="7")
					{
						for($ya=1;$ya<=31;$ya++)
						{
							if($attendance['StaffAttendance']["day$ya"]=="CL"){$cl7++;}
							if($attendance['StaffAttendance']["day$ya"]=="EL"){$el7++;} 
							if($attendance['StaffAttendance']["day$ya"]=="HD"){$hd7++;} 
						}
						array_push($month_cl7,$cl7+$hd7/2);
						$this->set("month_cl7",$month_cl7);
						array_push($month_el7,$el7);
						$this->set("month_el7",$month_el7);
					}
					if($attendance['StaffAttendanceDetail']['month']=="8")
					{
						for($ya=1;$ya<=31;$ya++)
						{
							if($attendance['StaffAttendance']["day$ya"]=="CL"){$cl8++;}
							if($attendance['StaffAttendance']["day$ya"]=="EL"){$el8++;} 
							if($attendance['StaffAttendance']["day$ya"]=="HD"){$hd8++;} 
						}
						array_push($month_cl8,$cl8+$hd8/2);
						$this->set("month_cl8",$month_cl8);
						array_push($month_el8,$el8);
						$this->set("month_el8",$month_el8);
					}
					if($attendance['StaffAttendanceDetail']['month']=="9")
					{
						for($ya=1;$ya<=31;$ya++)
						{
							if($attendance['StaffAttendance']["day$ya"]=="CL"){$cl9++;}
							if($attendance['StaffAttendance']["day$ya"]=="EL"){$el9++;} 
							if($attendance['StaffAttendance']["day$ya"]=="HD"){$hd9++;} 
						}
						array_push($month_cl9,$cl9+$hd9/2);
						$this->set("month_cl9",$month_cl9);
						array_push($month_el9,$el9);
						$this->set("month_el9",$month_el9);
					}
					if($attendance['StaffAttendanceDetail']['month']=="10")
					{
						for($ya=1;$ya<=31;$ya++)
						{
							if($attendance['StaffAttendance']["day$ya"]=="CL"){$cl10++;}
							if($attendance['StaffAttendance']["day$ya"]=="EL"){$el10++;} 
							if($attendance['StaffAttendance']["day$ya"]=="HD"){$hd10++;} 
						}
						array_push($omonth_cl,$cl10+$hd10/2);
						$this->set("omonth_cl",$omonth_cl);
						array_push($omonth_el,$el10);
						$this->set("omonth_el",$omonth_el);
					} 
					if($attendance['StaffAttendanceDetail']['month']=="11")
					{
						for($ya=1;$ya<=31;$ya++)
						{
							if($attendance['StaffAttendance']["day$ya"]=="CL"){$cl11++;}
							if($attendance['StaffAttendance']["day$ya"]=="EL"){$el11++;} 
							if($attendance['StaffAttendance']["day$ya"]=="HD"){$hd11++;} 
						}
						array_push($month_cl11,$cl11+$hd11/2);
						$this->set("month_cl11",$month_cl11);
						array_push($month_el11,$el11);
						$this->set("month_el11",$month_el11);
					} 
					if($attendance['StaffAttendanceDetail']['month']=="12")
					{
						for($ya=1;$ya<=31;$ya++)
						{
							if($attendance['StaffAttendance']["day$ya"]=="CL"){$dec_cl++;}
							if($attendance['StaffAttendance']["day$ya"]=="EL"){$dec_el++;} 
							if($attendance['StaffAttendance']["day$ya"]=="HD"){$hd12++;} 
						}
						array_push($dmonth_cl12,$dec_cl+$hd12/2);
						$this->set("dmonth_cl12",$dmonth_cl12);
						array_push($dmonth_el12,$dec_el);
						$this->set("dmonth_el12",$dmonth_el12);
					} 
				} 
				 
				$jcl=0;	
				$jel=0;	 
				$fcl=0;	
				$fel=0;	
				$mcl=0;	
				$mel=0;	
				$cl4=0;	
				$el4=0;
				$cl5=0;	
				$el5=0;	$cl6=0;	$el6=0;$cl7=0;	$el7=0; $cl8=0;$el8=0; $cl9=0;	$el9=0; $cl10=0;	$el10=0; $cl11=0;$el11=0;$dec_cl=0;$dec_el=0;
				//print_r($dmonth_cl12);
			} 
		 
		}
		
		/*Get Academic Year */
			$academic_year = $this->AcademicYear->find('all',array('order'=>'AcademicYear.academic_year DESC'));
			$academic_year = Set::extract($academic_year, '{n}.AcademicYear');
			$academic_year_array = array();
			if(!empty($academic_year)){
			    foreach($academic_year as $ay){ 
				$academic_year_array[$ay['id']] = $ay['academic_year'];
			    }
			}
			$this->set('academic_year_array', $academic_year_array);
		
	}
	public function leaveAvailablePrint($month=null,$ay=null)
	{
		$this->_userSessionCheckout();
		configure::write("debug",0);
		$this->layout="ajax";
		
		if($month!='' && $ay!='')
		{
			$staff_name_arry = array();
			$staff_designation_arry = array();
			$staff_cl_arry = array();
			$staff_el_arry = array();
			$staff_previou_el_arry = array();
			$months_cl_array = array();
			$months_el_array = array();
			$jcl=0;
			$jel=0;
			$jmonth_cl = array();
			$jmonth_el = array();
			$fcl=0;	
			$fel=0;	 
			$mcl=0;	
			$mel=0;
			$cl4=0;	
			$el4=0;
			$fmonth_cl = array();
			$fmonth_el = array();
			$mmonth_cl = array();
			$mmonth_el = array();
			$month_cl4 = array();
			$month_el4 = array();
			$month_cl5 = array();
			$month_el5 = array();
			$month_cl6 = array();
			$month_el6 = array();$month_cl7 = array();$month_el7 = array();$month_cl8 = array();$month_el8 = array();$month_cl9 = array();$month_el9 = array();
			$omonth_cl = array();$omonth_el = array();$month_cl11 = array();$month_el11 = array();$dmonth_cl12 = array();$dmonth_el12 = array();
			$cl5=0;	
			$el5=0;	
			$cl6=0;	$el6=0;$cl7=0;$el7=0;$cl8=0;$el8=0;$cl9=0;$el9=0;$cl10=0;$el10=0;$cl11=0;$el11=0;$dec_cl=0;$dec_el=0;
			$hd1=0;$hd2=0;$hd3=0;$hd4=0;$hd5=0;$hd6=0;$hd7=0;$hd8=0;$hd9=0;$hd10=0;$hd11=0;$hd12=0;
			
			$academic_year_id = $ay;
			$month = $month; 
			 
			$staff_leave_list = $this->StaffDetail->find("all",array("recursive"=>0));
			//print_r($staff_leave_list);
			foreach($staff_leave_list as $leave_list)
			{
				$id = $leave_list['StaffDetail']['id'];
				array_push($staff_name_arry,$leave_list['StaffDetail']['first_name']);
				$this->set("staff_name_arry",$staff_name_arry);
				
				array_push($staff_designation_arry,$leave_list['Designation']['designation']);
				$this->set("staff_designation_arry",$staff_designation_arry);
				
				array_push($staff_cl_arry,$leave_list['BasicAllocation']['staff_cl']);
				$this->set("staff_cl_arry",$staff_cl_arry);
				
				array_push($staff_el_arry,$leave_list['BasicAllocation']['staff_el']);
				$this->set("staff_el_arry",$staff_el_arry);
				
				array_push($staff_previou_el_arry,$leave_list['BasicAllocation']['previous_el']);
				$this->set("staff_previou_el_arry",$staff_previou_el_arry); 
				
				//FOR GETTING ATTENDANCE CL / EL COUNT
				
				$condition_leave = array("conditions"=>array("academic_year_id"=>$academic_year_id,"month <= "=>$month,"StaffAttendance.staff_detail_id"=>$id));
				$staff_leave = $this->StaffAttendanceDetail->StaffAttendance->find("all",$condition_leave); 
				//debug($this->StaffAttendanceDetail->getDataSource()->getLog(false,false));
				//print_r($condition_leave);
				foreach($staff_leave as $attendance)
				{ 
					 
					 if($attendance['StaffAttendanceDetail']['month']=="1")
					{
						for($ya=1;$ya<=31;$ya++)
						{
							if($attendance['StaffAttendance']["day$ya"]=="CL"){$jcl++;}
							if($attendance['StaffAttendance']["day$ya"]=="EL"){$jel++;} 
							if($attendance['StaffAttendance']["day$ya"]=="HD"){$hd1++;}  
						}
						array_push($jmonth_cl,$jcl+$hd1/2);
						$this->set("jmonth_cl",$jmonth_cl);
						array_push($jmonth_el,$jel);
						$this->set("jmonth_el",$jmonth_el);
					} 
					 
					if($attendance['StaffAttendanceDetail']['month']=="2")
					{
						for($ya=1;$ya<=31;$ya++)
						{	
							 
							if($attendance['StaffAttendance']["day$ya"]=="CL"){$fcl++;}
							if($attendance['StaffAttendance']["day$ya"]=="EL"){$fel++;} 
							if($attendance['StaffAttendance']["day$ya"]=="HD"){$hd2++;} 
							
						}
						 
						array_push($fmonth_cl,$fcl+$hd2/2);
						$this->set("fmonth_cl",$fmonth_cl);
						array_push($fmonth_el,$fel);
						$this->set("fmonth_el",$fmonth_el);
					}
				 	if($attendance['StaffAttendanceDetail']['month']=="3")
						{
							for($ya=1;$ya<=31;$ya++)
							{
								if($attendance['StaffAttendance']["day$ya"]=="CL"){$mcl++;}
								if($attendance['StaffAttendance']["day$ya"]=="EL"){$mel++;}
								if($attendance['StaffAttendance']["day$ya"]=="HD"){$hd3++;} 
								
							}
							array_push($mmonth_cl,$mcl+$hd3/2);
							$this->set("mmonth_cl",$mmonth_cl);
							array_push($mmonth_el,$mel);
							$this->set("mmonth_el",$mmonth_el);
						}
					if($attendance['StaffAttendanceDetail']['month']=="4")
						{
							for($ya=1;$ya<=31;$ya++)
							{
								if($attendance['StaffAttendance']["day$ya"]=="CL"){$cl4++;}
								if($attendance['StaffAttendance']["day$ya"]=="EL"){$el4++;} 
								if($attendance['StaffAttendance']["day$ya"]=="HD"){$hd4++;} 
							}
							array_push($month_cl4,$cl4+$hd4/2);
							$this->set("month_cl4",$month_cl4);
							array_push($month_el4,$el4);
							$this->set("month_el4",$month_el4);
						}
					if($attendance['StaffAttendanceDetail']['month']=="5")
						{
							for($ya=1;$ya<=31;$ya++)
							{
								if($attendance['StaffAttendance']["day$ya"]=="CL"){$cl5++;}
								if($attendance['StaffAttendance']["day$ya"]=="EL"){$el5++;} 
								if($attendance['StaffAttendance']["day$ya"]=="HD"){$hd5++;} 
							}
							array_push($month_cl5,$cl5+$hd5/2);
							$this->set("month_cl5",$month_cl5);
							array_push($month_el5,$el5);
							$this->set("month_el5",$month_el5);
						}
					if($attendance['StaffAttendanceDetail']['month']=="6")
						{
							for($ya=1;$ya<=31;$ya++)
							{
								if($attendance['StaffAttendance']["day$ya"]=="CL"){$cl6++;}
								if($attendance['StaffAttendance']["day$ya"]=="EL"){$el6++;} 
								if($attendance['StaffAttendance']["day$ya"]=="HD"){$hd6++;} 
							}
							array_push($month_cl6,$cl6+$hd6/2);
							$this->set("month_cl6",$month_cl6);
							array_push($month_el6,$el6);
							$this->set("month_el6",$month_el6);
						}
					if($attendance['StaffAttendanceDetail']['month']=="7")
					{
						for($ya=1;$ya<=31;$ya++)
						{
							if($attendance['StaffAttendance']["day$ya"]=="CL"){$cl7++;}
							if($attendance['StaffAttendance']["day$ya"]=="EL"){$el7++;} 
							if($attendance['StaffAttendance']["day$ya"]=="HD"){$hd7++;} 
						}
						array_push($month_cl7,$cl7+$hd7/2);
						$this->set("month_cl7",$month_cl7);
						array_push($month_el7,$el7);
						$this->set("month_el7",$month_el7);
					}
					if($attendance['StaffAttendanceDetail']['month']=="8")
					{
						for($ya=1;$ya<=31;$ya++)
						{
							if($attendance['StaffAttendance']["day$ya"]=="CL"){$cl8++;}
							if($attendance['StaffAttendance']["day$ya"]=="EL"){$el8++;} 
							if($attendance['StaffAttendance']["day$ya"]=="HD"){$hd8++;} 
						}
						array_push($month_cl8,$cl8+$hd8/2);
						$this->set("month_cl8",$month_cl8);
						array_push($month_el8,$el8);
						$this->set("month_el8",$month_el8);
					}
					if($attendance['StaffAttendanceDetail']['month']=="9")
					{
						for($ya=1;$ya<=31;$ya++)
						{
							if($attendance['StaffAttendance']["day$ya"]=="CL"){$cl9++;}
							if($attendance['StaffAttendance']["day$ya"]=="EL"){$el9++;} 
							if($attendance['StaffAttendance']["day$ya"]=="HD"){$hd9++;} 
						}
						array_push($month_cl9,$cl9+$hd9/2);
						$this->set("month_cl9",$month_cl9);
						array_push($month_el9,$el9);
						$this->set("month_el9",$month_el9);
					}
					if($attendance['StaffAttendanceDetail']['month']=="10")
					{
						for($ya=1;$ya<=31;$ya++)
						{
							if($attendance['StaffAttendance']["day$ya"]=="CL"){$cl10++;}
							if($attendance['StaffAttendance']["day$ya"]=="EL"){$el10++;} 
							if($attendance['StaffAttendance']["day$ya"]=="HD"){$hd10++;} 
						}
						array_push($omonth_cl,$cl10+$hd10/2);
						$this->set("omonth_cl",$omonth_cl);
						array_push($omonth_el,$el10);
						$this->set("omonth_el",$omonth_el);
					} 
					if($attendance['StaffAttendanceDetail']['month']=="11")
					{
						for($ya=1;$ya<=31;$ya++)
						{
							if($attendance['StaffAttendance']["day$ya"]=="CL"){$cl11++;}
							if($attendance['StaffAttendance']["day$ya"]=="EL"){$el11++;} 
							if($attendance['StaffAttendance']["day$ya"]=="HD"){$hd11++;} 
						}
						array_push($month_cl11,$cl11+$hd11/2);
						$this->set("month_cl11",$month_cl11);
						array_push($month_el11,$el11);
						$this->set("month_el11",$month_el11);
					} 
					if($attendance['StaffAttendanceDetail']['month']=="12")
					{
						for($ya=1;$ya<=31;$ya++)
						{
							if($attendance['StaffAttendance']["day$ya"]=="CL"){$dec_cl++;}
							if($attendance['StaffAttendance']["day$ya"]=="EL"){$dec_el++;} 
							if($attendance['StaffAttendance']["day$ya"]=="HD"){$hd12++;} 
						}
						array_push($dmonth_cl12,$dec_cl+$hd12/2);
						$this->set("dmonth_cl12",$dmonth_cl12);
						array_push($dmonth_el12,$dec_el);
						$this->set("dmonth_el12",$dmonth_el12);
					} 
				} 
				 
				$jcl=0;	
				$jel=0;	 
				$fcl=0;	
				$fel=0;	
				$mcl=0;	
				$mel=0;	
				$cl4=0;	
				$el4=0;
				$cl5=0;	
				$el5=0;	$cl6=0;	$el6=0;$cl7=0;	$el7=0; $cl8=0;$el8=0; $cl9=0;	$el9=0; $cl10=0;	$el10=0; $cl11=0;$el11=0;$dec_cl=0;$dec_el=0;
				//print_r($dmonth_cl12);
			} 
		 
		}
		
		/*Get Academic Year */
			$academic_year = $this->AcademicYear->find('all',array('order'=>'AcademicYear.academic_year DESC'));
			$academic_year = Set::extract($academic_year, '{n}.AcademicYear');
			$academic_year_array = array();
			if(!empty($academic_year)){
			    foreach($academic_year as $ay){ 
				$academic_year_array[$ay['id']] = $ay['academic_year'];
			    }
			}
			$this->set('academic_year_array', $academic_year_array);
		
	}
	public function salaryCertificate( )
	{
		$this->_userSessionCheckout();
		$this->layout="ptes_admin";
		
		if(!empty($this->request->data))
		{
			
			$condition = array("conditions"=>array("StaffPayroll.staff_detail_id"=>$this->request->data['StaffPayroll']['staff_detail_id'],
									'StaffPayroll.month'=>$this->request->data['StaffPayroll']['month'],
									"StaffPayroll.academic_year_id"=>$this->request->data['StaffPayroll']['academic_year_id']));
									
			$salary_certificate =$this->StaffPayroll->find("first",$condition);
			 $this->set('salary_certificate',$salary_certificate);
			
				$designation_id = $salary_certificate['StaffDetail']['designation_id'];
				$designation_condition = array("conditions"=>array("id"=>$designation_id),"recursive"=>0);
				$designation_name = $this->Designation->find("first",$designation_condition);
				$this->set("staff_designation",$designation_name['Designation']['designation']);
			 
			 
			 
		}
		
		/*Get staff details */
			$staff = $this->StaffDetail->find('all');
			$staff = Set::extract($staff, '{n}.StaffDetail');
			$staff_array = array();
			if(!empty($staff)){
			    foreach($staff as $staff1){ 
				$staff_array[$staff1['id']] = $staff1['first_name']." [ ".$staff1['emp_id']." ]";
			    }
			}
			$this->set('emp_list', $staff_array);
		/*Get Academic Year */
			$academic_year = $this->AcademicYear->find('all',array('order'=>'AcademicYear.academic_year DESC'));
			$academic_year = Set::extract($academic_year, '{n}.AcademicYear');
			$academic_year_array = array();
			if(!empty($academic_year)){
			    foreach($academic_year as $ay){ 
				$academic_year_array[$ay['id']] = $ay['academic_year'];
			    }
			}
			$this->set('academic_year_array', $academic_year_array);
	}
	public function salaryCertificatePrint($staff_detail_id,$month,$academic_year_id)
	{
		$this->_userSessionCheckout();
		$this->layout="ajax";
		
		if(!empty($staff_detail_id))
		{
			
			$condition = array("conditions"=>array("StaffPayroll.staff_detail_id"=>$staff_detail_id,
									'StaffPayroll.month'=>$month,
									"StaffPayroll.academic_year_id"=>$academic_year_id));
									
			$salary_certificate =$this->StaffPayroll->find("first",$condition);
			$this->set('salary_certificate',$salary_certificate);
			
			$designation_id = $salary_certificate['StaffDetail']['designation_id'];
			$designation_condition = array("conditions"=>array("id"=>$designation_id),"recursive"=>0);
			$designation_name = $this->Designation->find("first",$designation_condition);
			$this->set("staff_designation",$designation_name['Designation']['designation']);
			 
		} 
	}
}
