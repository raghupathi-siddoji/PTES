<?php 
 
class AttendanceController extends AppController {
	
	public $uses = array('Admin','StudentDetail','AddClass','AcademicYear','BloodGroup','Caste','Language','MotherTongue','Religion',
	'Section','SubCaste','HolidaySetting','ClassWiseAttendance','ClassAttendance','StudentAttendance','StudentAttendanceDetail');
	public $helpers = array('Html', 'Form', 'Js','Session');

/*-------------------------------Holiday Setting------------------------------------------*/
		public function holidaySetting($id=null)
		{
			$this->layout="ptes_admin";
			if(!empty($this->request->data))
			{
				$condition=array('conditions'=>array('HolidaySetting.reason'=>$this->request->data['HolidaySetting']['reason'],
				'HolidaySetting.from_date'=>$this->request->data['HolidaySetting']['from_date'],
				'HolidaySetting.to_date'=>$this->request->data['HolidaySetting']['to_date']));
				$check=$this->HolidaySetting->find('all',$condition);
				
				if(empty($check))
				{		
					/**Date Picker**/
					$from_date = $this->request->data['HolidaySetting']['from_date'];
					$fromdate= new DateTime($from_date);
					$this->request->data['HolidaySetting']['from_date'] = $fromdate->format('Y-m-d');
					
					$to_date = $this->request->data['HolidaySetting']['to_date'];
					$todate= new DateTime($to_date);
					$this->request->data['HolidaySetting']['to_date'] = $todate->format('Y-m-d');
					
					$this->HolidaySetting->save($this->request->data);
					$this->Session->setFlash("<div class='alert alert-success fade in' style='height:50px'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>Data Succesfully Inserted</div>");
					$this->redirect('/Attendance/holidaySetting');
				}
				else
				{
					$this->Session->setFlash("<div class='alert alert-danger fade in' style='height:50px'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>Data Not Inserted. Holiday already assigned</div>");
					$this->redirect('/Attendance/holidaySetting');
				}
			}
			else if(!empty($id))
			{
				$this->request->data=$this->HolidaySetting->read(null,$id);
				$this->request->data['HolidaySetting']['from_date']=date('d-m-Y',strtotime($this->request->data['HolidaySetting']['from_date']));
				$this->request->data['HolidaySetting']['to_date']=date('d-m-Y',strtotime($this->request->data['HolidaySetting']['to_date']));
			}
			
			/* Display Holiday Setting List*/
			$holiday=$this->HolidaySetting->find('all',array('order'=>'HolidaySetting.from_date ASC'));
			$this->set("list",$holiday); 
		}
		
		/*Delete Holiday Setting Entry*/
		public function holidaySettingDelete($id=null)
		{
			$this->HolidaySetting->delete($id);
			$this->Session->setFlash("<div class='alert alert-success fade in' style='height:50px'>
			<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>Succesfully Deleted</div>");
			$this->redirect('/Attendance/holidaySetting');
		}
/*-------------------------------------------------------------------------*/
		
/*---------------------------Attendance : Class Wise Attendance----------*/
		public function classWiseAttendance()
		{
			$this->layout="ptes_admin";
			
			$this->_selectDropDown();
			$get_attendance_list=$this->ClassAttendance->find('all');
			$this->set('attend_list',$get_attendance_list);
			
		}
/*------------------------------------------------------------------------*/

/*------------------------------------Attendance List---------------------*/
		public function attendanceList()
		{
			$this->layout="ptes_admin_login";
			
			if(!empty($this->request->data))
			{
				$get_student=$this->StudentDetail->find('all',array('conditions'=>array('StudentDetail.add_class_id'=>$this->request->data['ClassWiseAttendance']['add_class_id'],'StudentDetail.academic_year_id'=>$this->request->data['ClassWiseAttendance']['academic_year_id']),'order'=>'StudentDetail.student_name ASC'));
				
				$conditions = array("add_class_id"=>$this->request->data['ClassWiseAttendance']['add_class_id'],
									"academic_year_id"=>$this->request->data['ClassWiseAttendance']['academic_year_id'],
									"month"=>$this->request->data['ClassWiseAttendance']['month']);
    
				if($this->ClassWiseAttendance->hasAny($conditions))
				{
					$this->Session->setFlash("<div class='alert alert-danger fade in' style='height:50px'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>Record Exits <a href='../Attendance/updateAttendance'>Click Here to Update</a></div>");
					$this->redirect('/Attendance/classWiseAttendance');
				}
				
				if(!empty($get_student))
				{
					$month_value=$this->request->data['ClassWiseAttendance']['month'];
					$y=date('Y');
					$start_date=01;
					$last_date = cal_days_in_month(CAL_GREGORIAN, $month_value, $y); 
					$begin=new DateTime($y."-".$month_value."-".$start_date);
					$end=new DateTime($y."-".$month_value."-".$last_date);
					
					
					$get_holiday = $this->HolidaySetting->find('all',array('conditions'=>array('MONTH(HolidaySetting.from_date)'=>$month_value),
																		'order'=>'HolidaySetting.from_date ASC'));
					$this->set('reason',$get_holiday);
					
					$date_list=array();
					$holiday_array=array();
					
					$i=1;
					$count=1;
					$day=1;
					while ($begin <= $end) // Loop will work begin to the end date 
					{
						 foreach($get_holiday as $h) {
							if(substr($h['HolidaySetting']['from_date'],-2)<=$count && substr($h['HolidaySetting']['to_date'],-2)>=$count )
								{
									$holiday_array[$day]=$count;
									$day++;
								}
							} 
						if($begin->format("D") == "Sun") //Check that the day is Sunday here
						{
							$date_list[$i]=$begin->format("d");
							$i++;
						}
						$begin->modify('+1 day');
						$count++;
					}
					$this->set('sunday_list',$date_list);
					$this->set('attendance',$get_student);
					$this->set('last',$last_date);
					$this->set('holiday',$holiday_array);
				}
				else
				{
					$this->Session->setFlash("<div class='alert alert-danger fade in' style='height:50px'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>Student List is empty for requesting Class </div>");
					$this->redirect('/Attendance/classWiseAttendance');
				}
			}
		}
/*-----------------------------------------------------------------------*/

/*--------------------------------Store Attendance List-------------------*/
		public function storeAttendance($id=null)
		{
			if(!empty($this->request->data))
			{
				$class_details = array(
					"ClassAttendance"=>array(
						"add_class_id"=>$this->request->data['ClassWiseAttendance']['add_class_id'],
						"academic_year_id"=>$this->request->data['ClassWiseAttendance']['academic_year_id'],
						"section_id"=>$this->request->data['ClassWiseAttendance']['section_id'],
						"month"=>$this->request->data['ClassWiseAttendance']['month'],
					)
				);
				$this->ClassAttendance->save($class_details);
				$id = $this->ClassAttendance->getLastInsertId();
				
				
				$count=count($this->request->data['ClassWiseAttendance']['student_detail_id']);
				for($studnt=0;$studnt<$count;$studnt++)
				{
					
					$data = array(
							"ClassWiseAttendance"=>array(
							"class_attendance_id"=>$id,
							"student_detail_id"=>$this->request->data['ClassWiseAttendance']['student_detail_id'][$studnt],
							"add_class_id"=>$this->request->data['ClassWiseAttendance']['add_class_id'],
							"academic_year_id"=>$this->request->data['ClassWiseAttendance']['academic_year_id'],
							"section_id"=>$this->request->data['ClassWiseAttendance']['section_id'],
							"month"=>$this->request->data['ClassWiseAttendance']['month'],
							"day1"=>$this->request->data['ClassWiseAttendance']['day1'][$studnt],
							"day2"=>$this->request->data['ClassWiseAttendance']['day2'][$studnt],
							"day3"=>$this->request->data['ClassWiseAttendance']['day3'][$studnt],
							"day4"=>$this->request->data['ClassWiseAttendance']['day4'][$studnt],
							"day5"=>$this->request->data['ClassWiseAttendance']['day5'][$studnt],
							"day6"=>$this->request->data['ClassWiseAttendance']['day6'][$studnt],
							"day7"=>$this->request->data['ClassWiseAttendance']['day7'][$studnt],
							"day8"=>$this->request->data['ClassWiseAttendance']['day8'][$studnt],
							"day9"=>$this->request->data['ClassWiseAttendance']['day9'][$studnt],
							"day10"=>$this->request->data['ClassWiseAttendance']['day10'][$studnt],
							"day11"=>$this->request->data['ClassWiseAttendance']['day11'][$studnt],
							"day12"=>$this->request->data['ClassWiseAttendance']['day12'][$studnt],
							"day13"=>$this->request->data['ClassWiseAttendance']['day13'][$studnt],
							"day14"=>$this->request->data['ClassWiseAttendance']['day14'][$studnt],
							"day15"=>$this->request->data['ClassWiseAttendance']['day15'][$studnt],
							"day16"=>$this->request->data['ClassWiseAttendance']['day16'][$studnt],
							"day17"=>$this->request->data['ClassWiseAttendance']['day17'][$studnt],
							"day18"=>$this->request->data['ClassWiseAttendance']['day18'][$studnt],
							"day19"=>$this->request->data['ClassWiseAttendance']['day19'][$studnt],
							"day20"=>$this->request->data['ClassWiseAttendance']['day20'][$studnt],
							"day21"=>$this->request->data['ClassWiseAttendance']['day21'][$studnt],
							"day22"=>$this->request->data['ClassWiseAttendance']['day22'][$studnt],
							"day23"=>$this->request->data['ClassWiseAttendance']['day23'][$studnt],
							"day24"=>$this->request->data['ClassWiseAttendance']['day24'][$studnt],
							"day25"=>$this->request->data['ClassWiseAttendance']['day25'][$studnt],
							"day26"=>$this->request->data['ClassWiseAttendance']['day26'][$studnt],
							"day27"=>$this->request->data['ClassWiseAttendance']['day27'][$studnt],
							"day28"=>$this->request->data['ClassWiseAttendance']['day28'][$studnt],
							"day29"=>$this->request->data['ClassWiseAttendance']['day29'][$studnt],
							"day30"=>$this->request->data['ClassWiseAttendance']['day30'][$studnt],
							"day31"=>$this->request->data['ClassWiseAttendance']['day31'][$studnt],
						)
					);
					$get=$this->ClassWiseAttendance->saveMany($data);
				}
				if(!empty($get))
				{
					$this->Session->setFlash("<div class='alert alert-success fade in' style='height:50px'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>Record Inserted</div>");
					$this->redirect('/Attendance/classWiseAttendance');
				}
				else
				{
					$this->Session->setFlash("<div class='alert alert-danger fade in' style='height:50px'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>Record Not Inserted</div>");
					$this->redirect('/Attendance/classWiseAttendance');
				}			
			}
			else if(empty($this->request->data))
			{
				$this->request->data=$this->ClassWiseAttendance->read(null,id);
			}
		}

/*-------------------------------------------------------------------------*/
		
		/*Attendance : Update Class Wise Attendance*/
		public function updateAttendance()
		{
			$this->layout="ptes_admin";
			
			$this->_selectDropDown();
		}
		
		public function updateAttendanceList()
		{
			$this->layout="ptes_admin_login";
			configure::write("debug",2);
			$conditions=0;
			if(!empty($this->request->data))
			{
					$conditions = array('conditions'=>array('ClassWiseAttendance.add_class_id'=>$this->request->data['ClassWiseAttendance']['add_class_id'],
					'ClassWiseAttendance.academic_year_id'=>$this->request->data['ClassWiseAttendance']['academic_year_id'],
					'ClassWiseAttendance.month'=>$this->request->data['ClassWiseAttendance']['month']));
						$attendance_list = $this->ClassWiseAttendance->find('all',$conditions);
					if(!empty($attendance_list ))
					{
						$get_holiday = $this->HolidaySetting->find('all',array('conditions'=>array('MONTH(HolidaySetting.from_date)'=>$this->request->data['ClassWiseAttendance']['month']),'order'=>'HolidaySetting.from_date ASC'));
						$this->set('reason',$get_holiday);
						$this->set('list',$attendance_list);
					}
					else
					{
						$this->Session->setFlash("<div class='alert alert-danger fade in' style='height:50px'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>Record Not Exists</div>");
						$this->redirect('/Attendance/updateAttendance');
					}
			}
			
		}
		
		public function storeUpdateAttendance($id=null)
		{
			if(!empty($this->request->data))
			{			
				$count=count($this->request->data['ClassWiseAttendance']['id']);
				for($studnt=0;$studnt<$count;$studnt++)
				{
					$data = array(
							"ClassWiseAttendance"=>array(
							"day1"=>$this->request->data['ClassWiseAttendance']['day1'][$studnt],
							"day2"=>$this->request->data['ClassWiseAttendance']['day2'][$studnt],
							"day3"=>$this->request->data['ClassWiseAttendance']['day3'][$studnt],
							"day4"=>$this->request->data['ClassWiseAttendance']['day4'][$studnt],
							"day5"=>$this->request->data['ClassWiseAttendance']['day5'][$studnt],
							"day6"=>$this->request->data['ClassWiseAttendance']['day6'][$studnt],
							"day7"=>$this->request->data['ClassWiseAttendance']['day7'][$studnt],
							"day8"=>$this->request->data['ClassWiseAttendance']['day8'][$studnt],
							"day9"=>$this->request->data['ClassWiseAttendance']['day9'][$studnt],
							"day10"=>$this->request->data['ClassWiseAttendance']['day10'][$studnt],
							"day11"=>$this->request->data['ClassWiseAttendance']['day11'][$studnt],
							"day12"=>$this->request->data['ClassWiseAttendance']['day12'][$studnt],
							"day13"=>$this->request->data['ClassWiseAttendance']['day13'][$studnt],
							"day14"=>$this->request->data['ClassWiseAttendance']['day14'][$studnt],
							"day15"=>$this->request->data['ClassWiseAttendance']['day15'][$studnt],
							"day16"=>$this->request->data['ClassWiseAttendance']['day16'][$studnt],
							"day17"=>$this->request->data['ClassWiseAttendance']['day17'][$studnt],
							"day18"=>$this->request->data['ClassWiseAttendance']['day18'][$studnt],
							"day19"=>$this->request->data['ClassWiseAttendance']['day19'][$studnt],
							"day20"=>$this->request->data['ClassWiseAttendance']['day20'][$studnt],
							"day21"=>$this->request->data['ClassWiseAttendance']['day21'][$studnt],
							"day22"=>$this->request->data['ClassWiseAttendance']['day22'][$studnt],
							"day23"=>$this->request->data['ClassWiseAttendance']['day23'][$studnt],
							"day24"=>$this->request->data['ClassWiseAttendance']['day24'][$studnt],
							"day25"=>$this->request->data['ClassWiseAttendance']['day25'][$studnt],
							"day26"=>$this->request->data['ClassWiseAttendance']['day26'][$studnt],
							"day27"=>$this->request->data['ClassWiseAttendance']['day27'][$studnt],
							"day28"=>$this->request->data['ClassWiseAttendance']['day28'][$studnt],
							"day29"=>$this->request->data['ClassWiseAttendance']['day29'][$studnt],
							"day30"=>$this->request->data['ClassWiseAttendance']['day30'][$studnt],
							"day31"=>$this->request->data['ClassWiseAttendance']['day31'][$studnt],
							"id"=>$this->request->data['ClassWiseAttendance']['id'][$studnt],
						)
					);
					$get_update=$this->ClassWiseAttendance->save($data);
				}
				if(!empty($get_update))
				{
					$this->Session->setFlash("<div class='alert alert-success fade in' style='height:50px'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>Record Updated</div>");
					$this->redirect('/Attendance/updateAttendance');
				}
				else
				{
					$this->Session->setFlash("<div class='alert alert-danger fade in' style='height:50px'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>Record Not Updated</div>");
					$this->redirect('/Attendance/updateAttendance');
				}	
			
			}
		}
		
		/***---- Month Wise Attendance Report----- 14 Sep-----****/
		public function attendanceMonthReport()
		{
			$this->layout="ptes_admin";
			
			$this->_selectDropDown();
		}
		
		public function attendanceMonthReportList()
		{
			$this->layout="ptes_admin";
			
			if(!empty($this->request->data))
			{
				$conditions = array('conditions'=>array('ClassWiseAttendance.add_class_id'=>$this->request->data['ClassWiseAttendance']['add_class_id'],
				'ClassWiseAttendance.academic_year_id'=>$this->request->data['ClassWiseAttendance']['academic_year_id'],
				'ClassWiseAttendance.month'=>$this->request->data['ClassWiseAttendance']['month']));
					$attendance_list = $this->ClassWiseAttendance->find('all',$conditions)	;
				if(!empty($attendance_list))
				{
					$this->set('list',$attendance_list);
				}
				else
				{
					$this->Session->setFlash("<div class='alert alert-danger fade in' style='height:50px'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>Record Not Exists</div>");
					$this->redirect('/Attendance/attendanceMonthReport');
				}
			}
		}
		/*****----------------------------------------******/
		
		public function attendanceAnnualReport()
		{
			$this->layout="ptes_admin";
			
			$this->_selectDropDown();
		}
		
		public function attendanceAnnualReportList()
		{
			$this->layout="ptes_admin";
			
			if(!empty($this->request->data))
			{
				$conditions = array('conditions'=>array('ClassWiseAttendance.add_class_id'=>$this->request->data['ClassWiseAttendance']['add_class_id'],
				'ClassWiseAttendance.section_id'=>$this->request->data['ClassWiseAttendance']['section_id'],
				'ClassWiseAttendance.academic_year_id'=>$this->request->data['ClassWiseAttendance']['academic_year_id']));
					$attendance_list = $this->ClassWiseAttendance->find('all',$conditions)	;
				if(!empty($attendance_list ))
				{
					$this->set('list',$attendance_list);
				}
				else
				{
					$this->Session->setFlash("<div class='alert alert-danger fade in' style='height:50px'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>Record Not Exists</div>");
					$this->redirect('/Attendance/attendanceAnnualReport');
				}
			}
		}
		
		public function deleteAttendance($id=null)
		{
			$this->layout="ptes_admin";
			$this->ClassAttendance->delete($id);
			$this->Session->setFlash("<div class='alert alert-success fade in' style='height:50px'>
			<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>Succesfully Deleted</div>");
			$this->redirect('/Attendance/ClassWiseAttendance');
			
		}
		
		public function viewAttendance($id=null)
		{
			$this->layout="ptes_admin";
			$conditions = array('conditions'=>array('ClassAttendance.id'=>$id));
						$attendance_list = $this->ClassWiseAttendance->find('all',$conditions);
				if(!empty($attendance_list))
				{
					$this->set('list',$attendance_list);
				}
				else
				{
					$this->Session->setFlash("<div class='alert alert-danger fade in' style='height:50px'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>Record Not Exists</div>");
					$this->redirect('/Attendance/attendanceMonthReport');
				}
		}
		
		public function printAttendance($id=null)
		{
			$this->layout="ajax";
			$conditions = array('conditions'=>array('ClassAttendance.id'=>$id));
				$attendance_list = $this->ClassWiseAttendance->find('all',$conditions);	
				if(!empty($attendance_list ))
				{
					$this->set('list',$attendance_list);
				}
				else
				{
					$this->Session->setFlash("<div class='alert alert-danger fade in' style='height:50px'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>Record Not Exists</div>");
					$this->redirect('/Attendance/attendanceMonthReport');
				}
		}
		
		/*Day wise Attendance*/
	public function DailyAttendance()
	{
		$this->_userSessionCheckout();
		$this->layout="ptes_admin";
		$this->_selectDropDown();
		configure::write('debug',2);
		 
		if(!empty($this->request->data))
		{
			$academic_year_id = $this->request->data['academic_year_id'];
			$class_id = $this->request->data['add_class_id']; 
			
			$c_date= date('Y-m-d');
			$check_attendance = array("academic_year_id"=>$academic_year_id,"add_class_id"=>$class_id,"attendance_date"=>$c_date);
			 
			$check_attendance_status = $this->StudentAttendance->hasAny($check_attendance);
			
			if($check_attendance_status=='1')
			{				
				$this->Session->setFlash("<div class='alert alert-danger fade in' style='height:50px'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>Attendance already taken</div>");
					$this->redirect('/Attendance/DailyAttendance');
			}
			else
			{
				 
				$conditions = array("conditions"=>array("StudentDetail.academic_year_id"=>$academic_year_id,"StudentDetail.add_class_id"=>$class_id,"student_type"=>0),'fields'=>array('student_name','id',"AddClass.class_name",'father_mobile_number'),"order"=>array('student_name ASC'));
				$this->StudentDetail->unbindModel(array("hasMany"=>array('SchoolIndividualSms')));
				$student_list = $this->StudentDetail->find("all",$conditions); 
				 
				$this->set("student_list",$student_list); 
				 
			}
		} 
	}
	
	public function DailyAttendanceSave()
	{
		$this->_userSessionCheckout();
		$this->layout="ptes_admin";
		$this->_selectDropDown();
		configure::write('debug',2);
		 
		 //print_r($this->request->data);
		if(!empty($this->request->data))
		{
			$academic_year_id = $this->request->data['StudentAttendance']['academic_year_id'];
			$class_id = $this->request->data['StudentAttendance']['add_class_id'];  
			 
			$data_attendance = array
						(
							"StudentAttendance"=>array
								( 
								'academic_year_id'=>$this->request->data['StudentAttendance']['academic_year_id'],
								'add_class_id'=>$this->request->data['StudentAttendance']['add_class_id'], 
								'attendance_date'=>date('Y-m-d',strtotime($this->request->data['StudentAttendance']['attendance_date']))
								)
						);
			$this->StudentAttendance->save($data_attendance); 
			$student_attendance_id = $this->StudentAttendance->id;
			$student_count = $this->request->data['StudentAttendance']['total_student'];
			
			$present_msg  ="Dear parent, Happy to inform that your son/daughter is present, and active in all school activies";
			$absent_msg = "Dear parent, Your son/daughter is absent to school today, Please make him/her to attend class regularly, Please send leave letter";
			
			
			 $username = 'stepintechno@gmail.com';
			 $hash = 'Aarvi@stepin301';
			 $sender = urlencode('VASAVI12');
			 
			 
			if($student_attendance_id>0) {
				for($i=0;$i<$student_count;$i++)
				{
					$numbers= "911".$this->request->data['StudentAttendance']["father_mobile_number"][$i];
					if($this->request->data['StudentAttendance']["attendance_status"][$i]=="P")
					{
						 
						 $message = 'Vasavi Public School '.' '.$present_msg;
					}
					else
					{
						$message = 'Vasavi Public School '.' '.$absent_msg; 
					}
					// Prepare data for POST request
					$data = array('username' => $username, 'hash' => $hash, 'numbers' => $numbers, "sender" => $sender, "message" => $message);
				 
					// Send the POST request with cURL
					$ch = curl_init('http://api.textlocal.in/send/');
					curl_setopt($ch, CURLOPT_POST, true);
					curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
					$response = curl_exec($ch);
					curl_close($ch);
					
					$sms_status=json_decode($response, true);
					
					
					//For save absent list
					$message_details = array(
										"AbsentSchoolSmsList"=>array(
											"academic_year_id"=>$academic_year_id,
											"add_class_id"=>$class_id,
											"notification_to"=>$numbers, 
											"message"=>$message,
											"date"=>date('Y-m-d'),
											"sent_time"=>date("h:i:s"),
										"status"=> $sms_status['status'],
											"student_detail_id"=>$this->request->data['StudentAttendance']["student_detail_id"][$i] 
										)
						);
						//$this->AbsentSchoolSmsList->saveAll($message_details);
					
					$data_attendance_details = array
													(
														"StudentAttendanceDetail"=>array
															(
															'student_detail_id'=>$this->request->data['StudentAttendance']["student_detail_id"][$i],
															'attendance_status'=>$this->request->data['StudentAttendance']["attendance_status"][$i], 
															'student_attendance_id'=>$student_attendance_id 
															)
													);
													
													//print_r($data_attendance_details);
					$this->StudentAttendanceDetail->saveAll($data_attendance_details);
				}
				
			  
			$this->Session->setFlash("<div class='alert alert-success fade in' style='height:50px'>
			<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>Attendance Save successfuly..</div>");
			$this->redirect('/Attendance/DailyAttendance');
			}
			 
		} 
	}
	
	public function AttendanceLists()
	{
		$this->_userSessionCheckout();
		$this->layout="ptes_admin";
		$this->_selectDropDown();
		configure::write('debug',0);
		// print_r($this->request->data);
		if(!empty($this->request->data))
		{
			$academic_year_id = $this->request->data['academic_year_id'];
			$class_id = $this->request->data['add_class_id']; 
			$attendance_date;
			
			$attendance_date1 = date('Y-m-d',strtotime($this->request->data['attendance_date'])); 
			
			 /*$attendance = array("conditions"=>array("StudentAttendance.academic_year_id"=>$academic_year_id,"StudentAttendance.add_class_id"=>$class_id,"StudentAttendance.attendance_date"=>$attendance_date1),"fields"=>array('StudentDetail.student_name','StudentAttendance.attendance_date','StudentAttendance.add_class_id','AddClass.class_name','StudentAttendance.attendance_status'));
			 
			$attendance_list = $this->StudentAttendance->find('all',$attendance);
			$this->set("attendance_list",$attendance_list);  */
			
			/*$attendance_list = array("StudentAttendance.academic_year_id"=>$academic_year_id,"StudentAttendance.add_class_id"=>$class_id,"StudentAttendance.attendance_date"=>$attendance_date1);
			$fields=array('StudentDetail.student_name','StudentAttendance.attendance_date','StudentAttendance.add_class_id' ,'StudentAttendanceDetail.attendance_status');
			
			$where = array(
					"joins"=>array(
						array(
							"table"=>"student_attendances",
							"alias"=>"StudentAttendances",
							"type"=>"INNER",
							"conditions"=>array("StudentAttendances.id = StudentAttendanceDetail.student_attendance_id") 
						),
						array(
							"table"=>"student_details",
							"alias"=>"StudentDetails",
							"type"=>"INNER",
							"conditions"=>array("StudentDetails.id=StudentAttendanceDetail.student_detail_id") 
						),
						
					),
					"conditions"=>$attendance_list,
					"fields"=>$fields
			);
			print_r($where);
			$student_attendance_list = $this->StudentAttendanceDetail->find('all',$where);
			debug($this->StudentAttendanceDetail->getDataSource()->getLog(false,false)); 
			print_r($student_attendance_list);*/
			
			$where = "select AddClass.class_name,StudentDetail.student_name,StudentAttendance.*,StudentAttendanceDetail.*
							FROM student_attendance_details StudentAttendanceDetail
							JOIN student_attendances StudentAttendance ON StudentAttendance.id = StudentAttendanceDetail.student_attendance_id
							JOIN student_details StudentDetail ON StudentDetail.id = StudentAttendanceDetail.student_detail_id
							JOIN add_classes AddClass ON AddClass.id = StudentAttendance.add_class_id
							AND StudentAttendance.academic_year_id='$academic_year_id'
							AND StudentAttendance.add_class_id='$class_id'
							AND StudentAttendance.attendance_date='$attendance_date1'
							";
							 
				$student_attendance_list = $this->StudentAttendanceDetail->query($where);		
					debug($this->StudentAttendanceDetail->getDataSource()->getLog(false,false)); 
			//print_r($where);
			$this->set('student_attendance_list',$student_attendance_list);
			
		} 
	}
	/*Day wise Attendance*/

}
