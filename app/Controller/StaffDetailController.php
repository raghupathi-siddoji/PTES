<?php 
 /*********************************
** START 						**
** FOR STAFF DETAILS            **
** BY : RAGHUPATHI SIDDOJI      **  
** ON 07/09/2016                **
*********************************/
class StaffDetailController extends AppController {

 
	public $uses = array('StaffAttendanceDetail','AcademicYear','Admin','StaffDetail','Qualification','BloodGroup','Designation','HolidaySetting','StaffAttendance');
	public $helpers = array('Html', 'Form', 'Js','Session');

		
	    /*FOR STAFF DETAILS SAVE. 
		ON 07/09/2016, BY : RAGHUPATHI SIDDOJI
		*/
		public function staffDetails($id=null)
		{
			Configure::write('debug', 0);
			$this->layout="ptes_admin";
			
			if(!empty($this->request->data))
			{
				//IMAGES UPLOAD
				$upload_message = 0;
				$new_file_name="";
				$file_name= $this->request->data['StaffDetail']['photo']['name'];
				$file_type = $this->request->data['StaffDetail']['photo']['type'];
				$file_ext = substr($file_name, strripos($file_name, '.')); // get file name
				$allowed_file_types = array('.jpeg','.jpg','.png','.gif'); 
				
				if($file_name!='')
				{
					if(in_array($file_ext,$allowed_file_types))
					{ 
						$new_file_name = "M".rand().$file_ext;
						$target = WWW_ROOT."staff_photo/".$new_file_name;
						move_uploaded_file($this->request->data['StaffDetail']['photo']['tmp_name'],$target);
						
						$dob = $this->request->data['StaffDetail']['dob'];
						$dateb = new DateTime($dob); 
						$doj = $this->request->data['StaffDetail']['doj'];
						$datej = new DateTime($doj); 
						$this->request->data['StaffDetail']['dob'] = $dateb->format('Y-m-d');
						$this->request->data['StaffDetail']['doj'] = $datej->format('Y-m-d'); 
						$this->request->data['StaffDetail']['photo'] = $new_file_name;  
						
						$this->StaffDetail->save($this->request->data);
						$this->Session->setFlash("Details saved");
						$this->redirect(array("controller"=>"StaffDetail","action"=>"staffDetails"));
					}
					else
					{
						$this->Session->setFlash("Only jpg/ png/gif file typs are allowed");
						
					}
				}
				else
				{
					
				$this->request->data['StaffDetail']['photo'] = $this->request->data['StaffDetail']['old_image'];
				$dob = $this->request->data['StaffDetail']['dob'];
				$dateb = new DateTime($dob); 
				$doj = $this->request->data['StaffDetail']['doj'];
				$datej = new DateTime($doj); 
				$this->request->data['StaffDetail']['dob'] = $dateb->format('Y-m-d');
				$this->request->data['StaffDetail']['doj'] = $datej->format('Y-m-d');  
				$this->StaffDetail->save($this->request->data);
				//print_r($this->request->data);
				$this->Session->setFlash("Details saved");
				$this->redirect(array("controller"=>"StaffDetail","action"=>"staffList"));
				} 
			}
			else if(empty($this->request->data))
			{
				$this->request->data = $this->StaffDetail->read(null,$id); 
			    $this->request->data['StaffDetail']['dob'] = date('d/m/Y',strtotime($this->request->data['StaffDetail']['dob']));
				$this->request->data['StaffDetail']['doj'] = date('d/m/Y',strtotime($this->request->data['StaffDetail']['doj']));
  
			}
			/*Get Blood Group */
			$blood_group = $this->BloodGroup->find('all');
			$blood_group = Set::extract($blood_group, '{n}.BloodGroup');
			$blood_array = array();
			if(!empty($blood_group)){
			    foreach($blood_group as $blood){ 
				$blood_array[$blood['id']] = $blood['blood_group'];
			    }
			}
			$this->set('blood_group_list', $blood_array);
			
			/*Get Designation list */
			$designation_list = $this->Designation->find('all');
			$designation_list = Set::extract($designation_list, '{n}.Designation');
			$designation_array = array();
			if(!empty($designation_list)){
			    foreach($designation_list as $designation){ 
				$designation_array[$designation['id']] = $designation['designation'];
			    }
			}
			$this->set('designation_list', $designation_array);
			
		}
		
		/*FOR STAFF LIST 
		ON 08/09/2016, BY : RAGHUPATHI SIDDOJI
		*/
		public function staffList()
		{
			$this->layout="ptes_admin";
			$staffList = $this->StaffDetail->find('all');
			$this->set('staffList',$staffList) ;
			//print_r($staffList);
		}
		public function staffListPrint()
		{
			$this->layout="ajax";
			$staffList = $this->StaffDetail->find('all');
			$this->set('staffList',$staffList) ;
			//print_r($staffList);
		}
		public function deleteStaff($id=null)
		{
			$this->layout="ptes_admin";
			$list = $this->StaffDetail->delete($id);
		$this->redirect(array("controller"=>"StaffDetail","action"=>"staffList")); 
		}
		public function basicAllocation()
		{
			$this->layout="ptes_admin";
		}
		public function salaryComponent()
		{
			$this->layout="ptes_admin";
		}
		public function payrollComponent()
		{
			$this->layout="ptes_admin";
		}
		public function payrollGeneration()
		{
			$this->layout="ptes_admin";
		}
		
		 
		public function staffDetailsUpdate( )
		{
			$this->layout="ptes_admin";
			
			if(!empty($this->request->data))
			{
				$conditions = array("conditions"=>array("StaffDetail.id"=>$this->request->data['StaffDetail']['staff_detail_id']),"recursive"=>0);
				$this->request->data = $this->StaffDetail->find("first",$conditions);
				$this->request->data['StaffDetail']['date_of_probationary'] = date('d-m-Y',strtotime($this->request->data['StaffDetail']['date_of_probationary']));
				$this->request->data['StaffDetail']['date_of_permanent'] = date('d-m-Y',strtotime($this->request->data['StaffDetail']['date_of_permanent']));
				$this->request->data['StaffDetail']['date_of_death'] = date('d-m-Y',strtotime($this->request->data['StaffDetail']['date_of_death']));
				$this->request->data['StaffDetail']['date_of_confirmation'] = date('d-m-Y',strtotime($this->request->data['StaffDetail']['date_of_confirmation']));
				$this->request->data['StaffDetail']['date_of_resignation'] = date('d-m-Y',strtotime($this->request->data['StaffDetail']['date_of_resignation']));
				$this->request->data['StaffDetail']['date_of_retirement'] = date('d-m-Y',strtotime($this->request->data['StaffDetail']['date_of_retirement']));
				 
				 
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
			
		}
		public function staffDetailsUpdateProcess( )
		{
			$this->layout="ptes_admin";
			 
			if(!empty($this->request->data))
			{
				  
				$date_of_probationary = new DateTime($this->request->data['StaffDetail']['date_of_probationary']);
				$date_of_permanent = new DateTime($this->request->data['StaffDetail']['date_of_permanent']);
				$date_of_death = new DateTime($this->request->data['StaffDetail']['date_of_death']);
				$date_of_confirmation = new DateTime($this->request->data['StaffDetail']['date_of_confirmation']);
				$date_of_resignation = new DateTime($this->request->data['StaffDetail']['date_of_resignation']);
				$date_of_retirement = new DateTime($this->request->data['StaffDetail']['date_of_retirement']); 
				
				$this->request->data['StaffDetail']['date_of_probationary'] = $date_of_probationary->format('Y-m-d');
				$this->request->data['StaffDetail']['date_of_permanent'] =  $date_of_permanent->format('Y-m-d');
				$this->request->data['StaffDetail']['date_of_death'] =  $date_of_death->format('Y-m-d');
				$this->request->data['StaffDetail']['date_of_confirmation'] =  $date_of_confirmation->format('Y-m-d');
				$this->request->data['StaffDetail']['date_of_resignation'] =  $date_of_resignation->format('Y-m-d');
				$this->request->data['StaffDetail']['date_of_retirement'] = $date_of_retirement->format('Y-m-d'); 
				$this->request->data = $this->StaffDetail->save($this->request->data);
				$this->Session->setFlash("<div class='alert alert-success fade in' style='height:50px'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> Staff details updated...</div>");
					$this->redirect('/StaffDetail/staffDetailsUpdate');
				
			} 
			 
		}
		
		public function staffAttendance()
		{
			$this->layout="ptes_admin";
			
			$get_attendance_list=$this->StaffAttendanceDetail->find('all');
			$this->set('attend_list',$get_attendance_list);		
			
			/* Get Academic Year Dropdown Select List */
			$academic_year_list=$this->AcademicYear->find('all',array('order'=>'AcademicYear.academic_year DESC'));
			$academic_array = array();
			if(!empty($academic_year_list))
			{
				foreach($academic_year_list as $aca_year)
				{ 
					$academic_array[$aca_year['AcademicYear']['id']] = $aca_year['AcademicYear']['academic_year'];
				}
			}
			$this->set('year_list',$academic_array);
		}
		
		/*Staff Attendance List: 14 Sep by Kruthi */
		public function staffAttendanceList()
		{
			$this->layout="ptes_admin_login";
			
			if(!empty($this->request->data))
			{
				$conditions = array("academic_year_id"=>$this->request->data['StaffAttendance']['academic_year_id'],
									"month"=>$this->request->data['StaffAttendance']['month']);
    
				if($this->StaffAttendanceDetail->hasAny($conditions))
				{
					$this->Session->setFlash("<div class='alert alert-danger fade in' style='height:50px'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Record Exits  <a href='../StaffAttendance/updateStaffAttendance'>Click Here to Update</a></div>");
					$this->redirect('/StaffDetail/staffAttendance');
				}
				
				
				$month_value=$this->request->data['StaffAttendance']['month'];
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
					
				$i=1; $count=1; $day=1;
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
				$staffList = $this->StaffDetail->find('all');
				$this->set('staffList',$staffList) ;
				$this->set('sunday_list',$date_list);
				$this->set('last',$last_date);
				$this->set('holiday',$holiday_array);
			}
		}
		/*---------*/
		
		/*Store Staff Attendance by: Kruthi  14 Sep*/
		public function storeStaffAttendance($id=null)
		{
			if(!empty($this->request->data))
			{
				$count=count($this->request->data['StaffAttendance']['staff_detail_id']);
				
				$class_details = array(
					"StaffAttendanceDetail"=>array(
						"academic_year_id"=>$this->request->data['StaffAttendance']['academic_year_id'],
						"month"=>$this->request->data['StaffAttendance']['month'],
					)
				);
				$this->StaffAttendanceDetail->save($class_details);
				$id = $this->StaffAttendanceDetail->getLastInsertId();
				
				
				for($studnt=0;$studnt<$count;$studnt++)
				{
					
					$data = array(
							"StaffAttendance"=>array(
							"staff_attendance_detail_id"=>$id,
							"staff_detail_id"=>$this->request->data['StaffAttendance']['staff_detail_id'][$studnt],
							"day1"=>$this->request->data['StaffAttendance']['day1'][$studnt],
							"day2"=>$this->request->data['StaffAttendance']['day2'][$studnt],
							"day3"=>$this->request->data['StaffAttendance']['day3'][$studnt],
							"day4"=>$this->request->data['StaffAttendance']['day4'][$studnt],
							"day5"=>$this->request->data['StaffAttendance']['day5'][$studnt],
							"day6"=>$this->request->data['StaffAttendance']['day6'][$studnt],
							"day7"=>$this->request->data['StaffAttendance']['day7'][$studnt],
							"day8"=>$this->request->data['StaffAttendance']['day8'][$studnt],
							"day9"=>$this->request->data['StaffAttendance']['day9'][$studnt],
							"day10"=>$this->request->data['StaffAttendance']['day10'][$studnt],
							"day11"=>$this->request->data['StaffAttendance']['day11'][$studnt],
							"day12"=>$this->request->data['StaffAttendance']['day12'][$studnt],
							"day13"=>$this->request->data['StaffAttendance']['day13'][$studnt],
							"day14"=>$this->request->data['StaffAttendance']['day14'][$studnt],
							"day15"=>$this->request->data['StaffAttendance']['day15'][$studnt],
							"day16"=>$this->request->data['StaffAttendance']['day16'][$studnt],
							"day17"=>$this->request->data['StaffAttendance']['day17'][$studnt],
							"day18"=>$this->request->data['StaffAttendance']['day18'][$studnt],
							"day19"=>$this->request->data['StaffAttendance']['day19'][$studnt],
							"day20"=>$this->request->data['StaffAttendance']['day20'][$studnt],
							"day21"=>$this->request->data['StaffAttendance']['day21'][$studnt],
							"day22"=>$this->request->data['StaffAttendance']['day22'][$studnt],
							"day23"=>$this->request->data['StaffAttendance']['day23'][$studnt],
							"day24"=>$this->request->data['StaffAttendance']['day24'][$studnt],
							"day25"=>$this->request->data['StaffAttendance']['day25'][$studnt],
							"day26"=>$this->request->data['StaffAttendance']['day26'][$studnt],
							"day27"=>$this->request->data['StaffAttendance']['day27'][$studnt],
							"day28"=>$this->request->data['StaffAttendance']['day28'][$studnt],
							"day29"=>$this->request->data['StaffAttendance']['day29'][$studnt],
							"day30"=>$this->request->data['StaffAttendance']['day30'][$studnt],
							"day31"=>$this->request->data['StaffAttendance']['day31'][$studnt],
						)
					);
					$get=$this->StaffAttendance->saveMany($data);
				}
				if(!empty($get))
				{
					$this->Session->setFlash("<div class='alert alert-success fade in' style='height:50px'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Record Inserted</div>");
					$this->redirect('/StaffDetail/staffAttendance');
				}
				else
				{
					$this->Session->setFlash("<div class='alert alert-danger fade in' style='height:50px'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Record Not Inserted</div>");
					$this->redirect('/StaffDetail/staffAttendance');
				}			
			}
			else if(empty($this->request->data))
			{
				$this->request->data=$this->StaffAttendance->read(null,id);
			}
		}
		/*----------*/
		
		/*Staff Attendance Update By kruthi 14 Sep*/
		public function staffAttendanceUpdate()
		{
			$this->layout="ptes_admin";
			
			/* Get Academic Year Dropdown Select List */
			$academic_year_list=$this->AcademicYear->find('all',array('order'=>'AcademicYear.academic_year DESC'));
			$academic_array = array();
			if(!empty($academic_year_list))
			{
				foreach($academic_year_list as $aca_year)
				{ 
					$academic_array[$aca_year['AcademicYear']['id']] = $aca_year['AcademicYear']['academic_year'];
				}
			}
			$this->set('year_list',$academic_array);
		}
		/*-------*/
		
		public function staffAttendanceListUpdate()
		{
			$this->layout="ptes_admin_login";
			
			$conditions=0;
			if(!empty($this->request->data))
			{
			   $conditions = array('conditions'=>array(
					'StaffAttendanceDetail.academic_year_id'=>$this->request->data['StaffAttendance']['academic_year_id'],
					'StaffAttendanceDetail.month'=>$this->request->data['StaffAttendance']['month']));
					$attendance_list = $this->StaffAttendance->find('all',$conditions);	
				if(!empty($attendance_list ))
				{
					$get_holiday = $this->HolidaySetting->find('all',array('conditions'=>array('MONTH(HolidaySetting.from_date)'=>$this->request->data['StaffAttendance']['month']),'order'=>'HolidaySetting.from_date ASC'));
					$this->set('reason',$get_holiday);
					$this->set('list',$attendance_list);
				}
				else
				{
					$this->Session->setFlash("<div class='alert alert-danger fade in' style='height:50px'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Record Not Exists</div>");
					$this->redirect('/StaffDetail/staffAttendanceUpdate');
				}
			}	
		}

		public function storeStaffAttendanceUpdate($id=null)
		{
			if(!empty($this->request->data))
			{
				$count=count($this->request->data['StaffAttendance']['staff_detail_id']);
				for($studnt=0;$studnt<$count;$studnt++)
				{
					
					$data = array(
							"StaffAttendance"=>array(
							"day1"=>$this->request->data['StaffAttendance']['day1'][$studnt],
							"day2"=>$this->request->data['StaffAttendance']['day2'][$studnt],
							"day3"=>$this->request->data['StaffAttendance']['day3'][$studnt],
							"day4"=>$this->request->data['StaffAttendance']['day4'][$studnt],
							"day5"=>$this->request->data['StaffAttendance']['day5'][$studnt],
							"day6"=>$this->request->data['StaffAttendance']['day6'][$studnt],
							"day7"=>$this->request->data['StaffAttendance']['day7'][$studnt],
							"day8"=>$this->request->data['StaffAttendance']['day8'][$studnt],
							"day9"=>$this->request->data['StaffAttendance']['day9'][$studnt],
							"day10"=>$this->request->data['StaffAttendance']['day10'][$studnt],
							"day11"=>$this->request->data['StaffAttendance']['day11'][$studnt],
							"day12"=>$this->request->data['StaffAttendance']['day12'][$studnt],
							"day13"=>$this->request->data['StaffAttendance']['day13'][$studnt],
							"day14"=>$this->request->data['StaffAttendance']['day14'][$studnt],
							"day15"=>$this->request->data['StaffAttendance']['day15'][$studnt],
							"day16"=>$this->request->data['StaffAttendance']['day16'][$studnt],
							"day17"=>$this->request->data['StaffAttendance']['day17'][$studnt],
							"day18"=>$this->request->data['StaffAttendance']['day18'][$studnt],
							"day19"=>$this->request->data['StaffAttendance']['day19'][$studnt],
							"day20"=>$this->request->data['StaffAttendance']['day20'][$studnt],
							"day21"=>$this->request->data['StaffAttendance']['day21'][$studnt],
							"day22"=>$this->request->data['StaffAttendance']['day22'][$studnt],
							"day23"=>$this->request->data['StaffAttendance']['day23'][$studnt],
							"day24"=>$this->request->data['StaffAttendance']['day24'][$studnt],
							"day25"=>$this->request->data['StaffAttendance']['day25'][$studnt],
							"day26"=>$this->request->data['StaffAttendance']['day26'][$studnt],
							"day27"=>$this->request->data['StaffAttendance']['day27'][$studnt],
							"day28"=>$this->request->data['StaffAttendance']['day28'][$studnt],
							"day29"=>$this->request->data['StaffAttendance']['day29'][$studnt],
							"day30"=>$this->request->data['StaffAttendance']['day30'][$studnt],
							"day31"=>$this->request->data['StaffAttendance']['day31'][$studnt],
							"id"=>$this->request->data['StaffAttendance']['id'][$studnt],
						)
					);
					$get_update=$this->StaffAttendance->saveMany($data);
				}
				if(!empty($get_update))
				{
					$this->Session->setFlash("<div class='alert alert-success fade in' style='height:50px'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Record Updated</div>");
					$this->redirect('/StaffDetail/staffAttendanceUpdate');
				}
				else
				{
					$this->Session->setFlash("<div class='alert alert-danger fade in' style='height:50px'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Record Not Updated</div>");
					$this->redirect('/StaffDetail/staffAttendanceUpdate');
				}	
			}
		}
		
		/*---- Month Wise Attendance Report----- 14 Sep-----*/
		public function attendanceMonthReport()
		{
			$this->layout="ptes_admin";
			
			/* Get Academic Year Dropdown Select List */
			$academic_year_list=$this->AcademicYear->find('all',array('order'=>'AcademicYear.academic_year DESC'));
			$academic_array = array();
			if(!empty($academic_year_list))
			{
				foreach($academic_year_list as $aca_year)
				{ 
					$academic_array[$aca_year['AcademicYear']['id']] = $aca_year['AcademicYear']['academic_year'];
				}
			}
			$this->set('year_list',$academic_array);
		}
		
		public function attendanceMonthReportList()
		{
			$this->layout="ptes_admin";
			
			if(!empty($this->request->data))
			{
				$conditions = array('conditions'=>array(
				'StaffAttendanceDetail.academic_year_id'=>$this->request->data['StaffAttendance']['academic_year_id'],
				'StaffAttendanceDetail.month'=>$this->request->data['StaffAttendance']['month']));
				$attendance_list = $this->StaffAttendance->find('all',$conditions);	
				 				if(!empty($attendance_list ))		
				
				{
					$get_detail=$this->StaffAttendanceDetail->find('all',$conditions);
					$this->set('list',$attendance_list);
					$this->set('details',$get_detail);
				}
				else
				{
					$this->Session->setFlash("<div class='alert alert-danger fade in' style='height:50px'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Record Not Exists</div>");
					$this->redirect('/StaffDetail/attendanceMonthReport');
				}
			}
		}
		
		public function viewAttendance($id=null)
		{
			$this->layout="ptes_admin";
			$conditions = array('conditions'=>array('StaffAttendanceDetail.id'=>$id));
						
				$attendance_list = $this->StaffAttendance->find('all',$conditions);	 				if(!empty($attendance_list ))
				{
					$this->set('list',$attendance_list);
				}
				else
				{
					$this->Session->setFlash("<div class='alert alert-danger fade in' style='height:50px'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>Record Not Exists</div>");
					$this->redirect('/StaffDetail/staffAttendance');
				}
		}
		public function printAttendance($id=null)
		{
			$this->layout="ajax";
			$conditions = array('conditions'=>array('StaffAttendanceDetail.id'=>$id));
						
				$attendance_list = $this->StaffAttendance->find('all',$conditions);	 				if(!empty($attendance_list ))
				{
					$this->set('list',$attendance_list);
				}
				else
				{
					$this->Session->setFlash("<div class='alert alert-danger fade in' style='height:50px'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>Record Not Exists</div>");
					$this->redirect('/StaffDetail/staffAttendance');
				}
		}
		
		public function deleteAttendance($id=null)
		{
			$this->StaffAttendanceDetail->delete($id);
			$this->Session->setFlash("<div class='alert alert-success fade in' style='height:50px'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<i class='fa fa-check'></i> Deleted Successfully.</div>");
			$this->redirect(array("controller"=>"StaffDetail","action"=>"staffAttendance"));
		}
		
		
}
