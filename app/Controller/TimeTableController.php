<?php 
 
class TimeTableController extends AppController {

 
	public $uses = array('Admin','ClassTiming','ClassTimingDetails','AddClass','Section','AcademicYear','TimeTable','Subject','StaffDetail','AssignPeriodTeacher','PeriodSubjectAllocation');
	public $helpers = array('Html', 'Form', 'Js','Session');

		 
		public function addSubject($id=null)
		{
			$this->layout="ptes_admin";
			if(!empty($this->request->data))
			{
				$condition=array('conditions'=>array('Subject.subject_name'=>$this->request->data['Subject']['subject_name'])); //,'Subject.subject_code'=>$this->request->data['Subject']['subject_code']
				$check=$this->Subject->find('all',$condition);
				if(empty($check))
				{
					$this->Subject->save($this->request->data);
					
					 $this->Session->setFlash("<div class='alert alert-success fade in' style='height:50px'>
							<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
							<i class='fa fa-check'></i> Data insreted successfully.</div>");
						$this->redirect(array("controller"=>"TimeTable","action"=>"addSubject")); 
				}
				else
				{
					$this->Session->setflash("<div class='alert alert-danger fade in' style='height:50px'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<i class='fa fa-check'></i> Subject Name Already Exists.</div>");
					$this->redirect(array("controller"=>"TimeTable","action"=>"addSubject"));
				}
			}
			else if(empty($this->request->data))
			{
				$this->request->data = $this->Subject->read(null,$id);
			}
			/* Display Subject List*/
			$list = $this->Subject->find("all"); // get value from table
			$this->set("list",$list);  // setter it avaible to view
		}
		public function deleteSubject($id=null)
		{
			$this->layout="ptes_admin";
			$this->Subject->delete($id);
			$this->Session->setflash("<div class='alert alert-danger fade in' style='height:50px'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<i class='fa fa-check'></i> Deleted Successfully.</div>");
					$this->redirect(array("controller"=>"TimeTable","action"=>"addSubject"));
		}
		public function addClassTimings($id=null)
		{
			configure::write("debug",0);
			$this->layout="ptes_admin";
			if(!empty($this->request->data))
			{
				$count1 = count($this->request->data['ClassTiming']['add_class_id']);
				$count2 = count($this->request->data['ClassTiming']['section_id']);
				
				for($i=0;$i<$count1;$i++)
				{
					for($j=0;$j<$count2;$j++)
					{
						$add_class_id=$this->request->data['ClassTiming']['add_class_id'][$i];
						$section_id=$this->request->data['ClassTiming']['section_id'][$j];
						
						 $data= array("ClassTiming"=>array(
										 'id'=>'' ,
										 'syllbus'=>$this->request->data['ClassTiming']['syllbus'],
										'academic_year_id' => $this->request->data['ClassTiming']['academic_year_id'],
										'add_class_id'=>$this->request->data['ClassTiming']['add_class_id'][$i],
										'section_id'=>$this->request->data['ClassTiming']['section_id'][$j]
										));
						$this->ClassTiming->save($data); 
						$id = $this->ClassTiming->id;
						if($id>0)
						{
							$ClassTiming = $this->request->data['ClassTimingDetails']['id']; 
							//echo count($ClassTiming);
							for($n=0;$n<count($ClassTiming);$n++) 
							{
								
								if($this->request->data['ClassTimingDetails']['start_time'][$n]!="")
								{
									//echo "indside if .. ".$i;
									$data = array(
										"ClassTimingDetails"=>array(
										'class_timing_id'=>$id,
										'days'=>$this->request->data['days'][$n],
										'start_time'=>$this->request->data['ClassTimingDetails']['start_time'][$n],
										'end_time'=>$this->request->data['ClassTimingDetails']['end_time'][$n] ,
										'number_of_period'=>$this->request->data['ClassTimingDetails']['number_of_period'][$n] ,
										'time_duration'=>$this->request->data['ClassTimingDetails']['time_duration'][$n],
										'break_duration'=>$this->request->data['ClassTimingDetails']['break_duration'][$n],
										'break_after_period'=>$this->request->data['ClassTimingDetails']['break_after_period'][$n] ,
										'leisure_duration'=>$this->request->data['ClassTimingDetails']['leisure_duration'][$n],
										'leisure_after_period'=>$this->request->data['ClassTimingDetails']['leisure_after_period'][$n] 
										)
									);
									$this->ClassTimingDetails->id = $ClassTiming[$n];
									$this->ClassTimingDetails->save($data); 
									/*$log = $this->ClassTimingDetails->getDataSource()->getLog(false,false);
									debug($log);*/
										////////////////////createTimeTable///////////////////
										$day = $this->request->data['days'][$n];
										$no_period = $this->request->data['ClassTimingDetails']['number_of_period'][$n];
										$break_period = $this->request->data['ClassTimingDetails']['break_after_period'][$n] ;
										$start_time = $this->request->data['ClassTimingDetails']['start_time'][$n];
										$time_duration = $this->request->data['ClassTimingDetails']['time_duration'][$n];
										$break_time = $this->request->data['ClassTimingDetails']['break_duration'][$n];
										$leisure_duration = $this->request->data['ClassTimingDetails']['leisure_duration'][$n];
										$leisure_after_period = $this->request->data['ClassTimingDetails']['leisure_after_period'][$n];
										
										$this->createTimeTable($id,$no_period,$break_period,$start_time,$time_duration,$day,$break_time,$leisure_duration,$leisure_after_period);
								} 
							} 
						}
					}
				}
				
				
				$this->Session->setFlash("<div class='alert alert-success fade in' style='height:50px'>
							<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
							<i class='fa fa-check'></i> Class Timings added successfully.</div>");
				$this->redirect(array("controller"=>"TimeTable","action"=>"addClassTimings"));
			}
			else if(empty($this->request->data))
			{
				
				$this->request->data = $this->ClassTiming->read(null,$id);
				/*$this->request->data = $this->ClassTimingDetails->read(null,$id);
				$this->request->data['ClassTimingDetails']['start_time'] = DateTime::createFromFormat('H:i',$this->request->data['ClassTimingDetails']['start_time']); 
				$this->request->data['ClassTimingDetails']['end_time'] = DateTime::createFromFormat('H:i',$this->request->data['ClassTimingDetails']['end_time']); 
				*/
			}
			
			/*****************LIST ******************************/
			$class_details_list=$this->ClassTimingDetails->find('all',array('order'=>array('ClassTimingDetails.id ASC')));
			$this->set('class_details_list',$class_details_list);
			
			//print_r($class_details_list);
			/*Get academic_years_list */
			$academic_years_list = $this->AcademicYear->find('all',array('order'=>'AcademicYear.academic_year DESC'));
			$academic_years_list = Set::extract($academic_years_list, '{n}.AcademicYear');
			$academic_years = array();
			if(!empty($academic_years_list)){
			    foreach($academic_years_list as $academic_y){ 
				$academic_years[$academic_y['id']] = $academic_y['academic_year'];
			    }
			}
			$this->set('academic_years_list', $academic_years);
			
			/*Get class_list */
			$class_list = $this->AddClass->find('all');
			$class_list = Set::extract($class_list, '{n}.AddClass');
			$class_array = array();
			if(!empty($class_list)){
			    foreach($class_list as $class){ 
				$class_array[$class['id']] = $class['class_name'];
			    }
			}
			$this->set('class_list', $class_array);
			
			/*Get section_list */
			$section_list = $this->Section->find('all');
			$section_list = Set::extract($section_list, '{n}.Section');
			$section = array();
			if(!empty($section_list)){
			    foreach($section_list as $section){ 
				$section_array[$section['id']] = $section['section'];
			    }
			}
			$this->set('section_list', $section_array);
			
		}
		public function classTimingsList()
		{
			$this->layout="ptes_admin";
			
			$class_list=$this->ClassTiming->find('all');
			$this->set('class_list',$class_list);
			/*$class_details_list=$this->ClassTimingDetails->find('all',array('order'=>array('ClassTimingDetails.id ASC')));
			$this->set('class_details_list',$class_details_list);*/
		}
		public function deleteClassTimings($id=null)
		{
			$this->layout="ptes_admin";
			$this->ClassTiming->delete($id);
			
			$this->Session->setFlash("<div class='alert alert-danger fade in' style='height:50px'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<i class='fa fa-check'></i> Deleted Successfully.</div>");
			$this->redirect(array("controller"=>"TimeTable","action"=>"addClassTimings"));
		}
		
		public function createTimeTable($class_id,$no_period,$break_period,$start_time,$time_duration,$day,$break_time,$leisure_duration,$leisure_after_period)
		{
						//Configure::write('debug', 0);
						$dt = DateTime::createFromFormat('H:i a',$start_time); 
						for($i=1; $i<=$no_period ; $i++)
						{
							$period=$i;
							$time1 = date('h:i a', strtotime($dt->format('H:i')));
							$dt1=($dt->add(new DateInterval('PT'.$time_duration.'M'))) * $i;          
							//echo $dt1;
							$time2 = date('h:i a', strtotime($dt->format('H:i'))); 
							 $time = $time1 ." ". $time2;
							//echo "<BR>";
							$t =$time2;
							$this->TimeTable->query("INSERT INTO time_tables VALUES('','".$class_id."',
			 														'".$period."',
																	'".$time."',
																	'".$day."','','','','','')");
													
							if($break_period > 0)
							{
								if( $i == $break_period )
								{
										$dt1=($dt->add(new DateInterval('PT'.$break_time.'M'))) * $i;
									$time2 = date('h:i a', strtotime($dt->format('H:i')));  
										
									$BREAK = "BREAK-".$t ." ". $time2;
									//echo $BREAK."<BR>";
									$this->TimeTable->query("INSERT INTO time_tables VALUES('','".$class_id."',
																		'BREAK',
																		 '".$BREAK."',
																		'".$day."','','','','','')");
								}
							}
							
							if( $i == $leisure_after_period )
							{
								 $dt1=($dt->add(new DateInterval('PT'.$leisure_duration.'M'))) * $i;
								 $time2 = date('h:i a', strtotime($dt->format('H:i')));  
									
								 $LEISURE = "LEISURE-".$t ." ". $time2;
								// echo $LEISURE."<BR>";
								 $this->TimeTable->query("INSERT INTO time_tables VALUES('','".$class_id."',
			 														'LEISURE',
																	 '".$LEISURE."',
																	'".$day."','','','','','')");
							}
						}
						
		}
		/////////////////Seclect Class and Section ////////
		function generateTimeTable()
		{
			Configure::write('debug',0);
			$this->layout="ptes_admin";
					
			/*************Update timetable subject and teacher*******************/
			/****************************get Class_timings_id*********************/
				$condition= array('conditions'=>array('ClassTiming.add_class_id'=>$this->request->data['TimeTable']['add_class_id'],'ClassTiming.section_id'=>$this->request->data['TimeTable']['section_id']));
				$cls_id = $this->ClassTiming->find('all',$condition);	
					$id=$cls_id[0]['ClassTiming']['id'];
				if(!empty($cls_id))
				{
					/**************SET 0 To SUBJECT AND TEACHER BEFORE UPDATE EVENYTIME*************/
					$this->TimeTable->query("UPDATE time_tables set subject_id='',staff_detail_id =''  WHERE class_timing_id='".$id."' ");
					/******************************************************************************/
					
					/****************************get PeriodSubjectAllocation values*********************/
					$condition= array('PeriodSubjectAllocation.add_class_id'=>$this->request->data['TimeTable']['add_class_id'],
										'PeriodSubjectAllocation.section_id'=>$this->request->data['TimeTable']['section_id']);
					$values= $this->PeriodSubjectAllocation->find('all',array('conditions'=>$condition,'order'=>array('PeriodSubjectAllocation.id')));

					
					/*$log = $this->PeriodSubjectAllocation->getDataSource()->getLog(false,false);
						debug($log);*/
					//print_r($values);
					if(!empty($values))
					{
						//print_r($values);
						$subject ='';
						foreach($values as $values1 )
						{
							if($values1['PeriodSubjectAllocation']['subject_type'] == 'Language1')
							{
								 $teacher1 = $this->getTeacherName($this->request->data['TimeTable']['add_class_id'],$this->request->data['TimeTable']['section_id'],$values1['PeriodSubjectAllocation']['subject_id']);
								
								//$subject1 = $subject1." ,".substr($values1['Subject']['subject_name'],0,3)."-".substr($teacher1,0,3);
								$subject1 = $subject1." ,".substr($values1['Subject']['subject_name'],0,3)."-".$teacher1;
								$subject = substr($subject1,1);
							}
							if($values1['PeriodSubjectAllocation']['subject_type'] == 'Language2')
							{
								$teacher2 = $this->getTeacherName($this->request->data['TimeTable']['add_class_id'],$this->request->data['TimeTable']['section_id'],$values1['PeriodSubjectAllocation']['subject_id']);
								$subject2 = $subject2 ." ,".substr($values1['Subject']['subject_name'],0,3)."-".$teacher2;
								$subject = substr($subject2,1);
							}
							if($values1['PeriodSubjectAllocation']['subject_type'] == 'Language3')
							{
								$teacher3 = $this->getTeacherName($this->request->data['TimeTable']['add_class_id'],$this->request->data['TimeTable']['section_id'],$values1['PeriodSubjectAllocation']['subject_id']);
								$subject3 = $subject3 ." ,".substr($values1['Subject']['subject_name'],0,3)."-".$teacher3;
								$subject = substr($subject3,1);
							}
							if($values1['PeriodSubjectAllocation']['subject_type'] == 'Regular')
							{
								$teacher4 = $this->getTeacherName($this->request->data['TimeTable']['add_class_id'],$this->request->data['TimeTable']['section_id'],$values1['PeriodSubjectAllocation']['subject_id']);
								$subject4 = substr($values1['Subject']['subject_name'],0,3)."-".$teacher4;
								 $subject = $subject4;
							}
							
							 $subject_id =  $values1['PeriodSubjectAllocation']['subject_id'];
							 
							/****************************get staff_detail_id*********************/
							$condition2= array('conditions'=>array('AssignPeriodTeacher.add_class_id'=>$this->request->data['TimeTable']['add_class_id'],'AssignPeriodTeacher.section_id'=>$this->request->data['TimeTable']['section_id'],'AssignPeriodTeacher.subject_id'=>$subject_id));
							
							$staff_detail_id= $this->AssignPeriodTeacher->find('all',$condition2);
							//print_r($staff_detail_id);
							$day = explode(',',rtrim($values1['PeriodSubjectAllocation']['weekdays'],','));
							if(!empty($staff_detail_id))
							{
									foreach($staff_detail_id as $staff_id)
									{
										//$subject = $subject ." ". substr($staff_id['StaffDetail']['first_name'],0,3);
										/****************************get Day********************/
										foreach($day as $val)
										{
											$this->PeriodSubjectAllocation->query("UPDATE time_tables set subject_id='".$subject."' WHERE class_timing_id='".$cls_id[0]['ClassTiming']['id']."' and time_tables.day='".trim($val)."' and time_tables.period='".$values1['PeriodSubjectAllocation']['period_order']."' ");
										
										}
										
									}
									/*$log = $this->PeriodSubjectAllocation->getDataSource()->getLog(false,false);
										debug($log);*/
							}
							else
							{
								/****************************get Day********************/
								foreach($day as $val)
								{
									$this->PeriodSubjectAllocation->query("UPDATE time_tables set subject_id='".$subject."'  WHERE class_timing_id='".$cls_id[0]['ClassTiming']['id']."' and time_tables.day='".trim($val)."' and time_tables.period='".$values1['PeriodSubjectAllocation']['period_order']."' ");
									/*$log = $this->PeriodSubjectAllocation->getDataSource()->getLog(false,false);
									debug($log);*/
								}
							}
						
						}$subject ='';	
						
					}
				}
			/**********************LIST TIMETABLE DATA**********************************************/
			$condition = array("academic_year_id"=>$this->request->data['TimeTable']['academic_year_id'] ,
								"add_class_id"=> $this->request->data['TimeTable']['add_class_id'],
								"section_id"=>$this->request->data['TimeTable']['section_id']);
			$getlist = $this->TimeTable->find("all",array('conditions'=>$condition,'order'=>array('TimeTable.id')));
			/*$log = $this->TimeTable->getDataSource()->getLog(false,false);
			debug($log);*/
			//print_r($getlist);
			$this->set("list",$getlist);
			
			/********************************************************************/
			/*Get academic_years_list */
			$academic_years_list = $this->AcademicYear->find('all',array('order'=>'AcademicYear.academic_year DESC'));
			$academic_years_list = Set::extract($academic_years_list, '{n}.AcademicYear');
			$academic_years = array();
			if(!empty($academic_years_list)){
			    foreach($academic_years_list as $academic_y){ 
				$academic_years[$academic_y['id']] = $academic_y['academic_year'];
			    }
			}
			$this->set('academic_years_list', $academic_years);
			
			/*Get class_list */
			$class_list = $this->AddClass->find('all');
			$class_list = Set::extract($class_list, '{n}.AddClass');
			$class_array = array();
			if(!empty($class_list)){
			    foreach($class_list as $class){ 
				$class_array[$class['id']] = $class['class_name'];
			    }
			}
			$this->set('class_list', $class_array);
			
			/*Get section_list */
			$section_list = $this->Section->find('all');
			$section_list = Set::extract($section_list, '{n}.Section');
			$section = array();
			if(!empty($section_list)){
			    foreach($section_list as $section){ 
				$section_array[$section['id']] = $section['section'];
			    }
			}
			$this->set('section_list', $section_array);
			
		}
		public function getTeacherName($class,$section,$subject_id)
		{
			$condition1= array('conditions'=>array('AssignPeriodTeacher.add_class_id'=>$class,'AssignPeriodTeacher.section_id'=>$section,'AssignPeriodTeacher.subject_id'=>$subject_id));
			$staff_detail_id= $this->AssignPeriodTeacher->find('all',$condition1);
			/*$log = $this->AssignPeriodTeacher->getDataSource()->getLog(false,false);
			debug($log);*/
			//$tea='';
			if(!empty($staff_detail_id))
			{
				
				//print_r(count($staff_detail_id));
				//echo "\n";
				if(count($staff_detail_id)>1)
				{
					//echo "inside if ...";
					//echo count($staff_detail_id[0]['StaffDetail']['first_name']);
					foreach($staff_detail_id as $teacher)
					{
						 $tea= $tea.", ". substr($teacher['StaffDetail']['first_name'],0,3);
						
					}
					//echo "\n";
						return "(".trim($tea,",")." )";
				}
				else if(count($staff_detail_id)==1)
				{
					//echo "inside else if ...";
					 $tea = substr($staff_detail_id[0]['StaffDetail']['first_name'],0,3);
					//echo "\n";
					return $tea;
				}
				
			
				return $tea;
			}
						
		}
		////////////////////////////////////END CLASS TIMINGS AND TIMETABLE INSERTION////////////////////////////////////////////////////
		public function assignPeriodsTeacher($id=null)
		{
			$this->layout="ptes_admin";
			if(!empty($this->request->data))
			{
				$condition=array('conditions'=>array('AssignPeriodTeacher.academic_year_id'=>$this->request->data['AssignPeriodTeacher']['academic_year_id'],
													'AssignPeriodTeacher.add_class_id'=>$this->request->data['AssignPeriodTeacher']['add_class_id'],
													'AssignPeriodTeacher.section_id'=>$this->request->data['AssignPeriodTeacher']['section_id'],
													'AssignPeriodTeacher.subject_id'=>$this->request->data['AssignPeriodTeacher']['subject_id'],
													'AssignPeriodTeacher.staff_detail_id'=>$this->request->data['AssignPeriodTeacher']['staff_detail_id']));
				$check=$this->AssignPeriodTeacher->find('all',$condition);
				//print_r($check);
				if(empty($check))
				{
					$this->AssignPeriodTeacher->save($this->request->data['AssignPeriodTeacher']);
					
						$this->Session->setFlash("<div class='alert alert-success fade in' style='height:50px'>
							<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
							<i class='fa fa-check'></i> Data insreted successfully.</div>");
						$this->redirect(array("controller"=>"TimeTable","action"=>"assignPeriodsTeacher"));
					
				}
				else
				{
					$this->Session->setflash("<div class='alert alert-danger fade in' style='height:50px'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<i class='fa fa-check'></i> Teacher Already Allocated.</div>");
					$this->redirect(array("controller"=>"TimeTable","action"=>"assignPeriodsTeacher"));
				}
			}
			else if(empty($this->request->data))
			{
				$this->request->data = $this->AssignPeriodTeacher->read(null,$id);
			}
			/* Display AssignPeriodTeacher List*/
			$list1 = $this->AssignPeriodTeacher->find("all"); // get value from table
			$this->set("list1",$list1);  // setter it avaible to view
			
			//////////////////////////////////////////////////////////////////////////////////////////
			/*Get academic_years_list */
			$academic_years_list = $this->AcademicYear->find('all',array('order'=>'AcademicYear.academic_year DESC'));
			$academic_years_list = Set::extract($academic_years_list, '{n}.AcademicYear');
			$academic_years = array();
			if(!empty($academic_years_list)){
			    foreach($academic_years_list as $academic_y){ 
				$academic_years[$academic_y['id']] = $academic_y['academic_year'];
			    }
			}
			$this->set('academic_years_list', $academic_years);
			
			/*Get teacher_list */
			$StaffDetail_list = $this->StaffDetail->find('all',array('conditions'=>array('StaffDetail.designation_id'=>1)));
			$StaffDetail_list = Set::extract($StaffDetail_list, '{n}.StaffDetail');
			$StaffDetail_array = array();
			if(!empty($StaffDetail_list)){
			    foreach($StaffDetail_list as $StaffDetail){ 
				$StaffDetail_array[$StaffDetail['id']] = $StaffDetail['first_name'];
				}
			}
			$this->set('teacher_list',$StaffDetail_array);
			
			$class_list = $this->AddClass->find('all');
			$class_list = Set::extract($class_list, '{n}.AddClass');
			$class_array = array();
			if(!empty($class_list)){
			    foreach($class_list as $class){ 
				$class_array[$class['id']] = $class['class_name'];
			    }
			}
			$this->set('class_list', $class_array);
			
			/*Get section_list */
			$section_list = $this->Section->find('all');
			$section_list = Set::extract($section_list, '{n}.Section');
			$section = array();
			if(!empty($section_list)){
			    foreach($section_list as $section){ 
				$section_array[$section['id']] = $section['section'];
			    }
			}
			$this->set('section_list', $section_array);
			/*Get subject_list */
			$subject_list = $this->Subject->find('all');
			$subject_list = Set::extract($subject_list, '{n}.Subject');
			$subject_array = array();
			if(!empty($subject_list)){
			    foreach($subject_list as $subject){ 
				$subject_array[$subject['id']] = $subject['subject_name'];
			    }
			}
			$this->set('subject_list', $subject_array);
		}
		public function deleteAssignPeriodsTeacher($id=null)
		{
			$this->layout="ptes_admin";
			$this->AssignPeriodTeacher->delete($id);
			$this->Session->setFlash("<div class='alert alert-danger fade in' style='height:50px'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<i class='fa fa-check'></i> Deleted successfully.</div>");
			$this->redirect(array("controller"=>"TimeTable","action"=>"assignPeriodsTeacher"));
				
		}
		///////////////////////////////Start subjectAllocation///////////////////////////////////////////
		public function periodSubjectAllocation($id=null)
		{
			$this->layout="ptes_admin";
			if(!empty($this->request->data))
			{
					$dayList=" ";
								$days = $this->request->data['PeriodSubjectAllocation']['weekdays'];
								for($i=0;$i<count($days);$i++)
								{
									foreach($days[$i] as $day1)
									{
										$dayList.= $day1.",";
									}
								}
								$this->request->data['PeriodSubjectAllocation']['weekdays']=$dayList;
					if($this->request->data['PeriodSubjectAllocation']['subject_type']=="Regular")
					{
						$condition_period = array('conditions'=>array('PeriodSubjectAllocation.add_class_id'=>$this->request->data['PeriodSubjectAllocation']['add_class_id'],
															   'PeriodSubjectAllocation.section_id'=>$this->request->data['PeriodSubjectAllocation']['section_id'],
															   'PeriodSubjectAllocation.period_order'=>$this->request->data['PeriodSubjectAllocation']['period_order']
																));
						$period = $this->PeriodSubjectAllocation->find('all',$condition_period);
						if(empty($period))
						{
							$this->periodSubjectAllocationSubMethod($this->request->data['PeriodSubjectAllocation'],$dayList,$this->request->data['PeriodSubjectAllocation']['add_class_id'],$this->request->data['PeriodSubjectAllocation']['section_id'],$this->request->data['PeriodSubjectAllocation']['subject_id'],$this->request->data['PeriodSubjectAllocation']['subject_type'],$this->request->data['PeriodSubjectAllocation']['period_order'],$id);
						}
						else
						{
								$this->Session->setFlash("<div class='alert alert-success fade in' style='height:50px'>
									<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
									<i class='fa fa-check'></i> Subject Already Add to this Period.</div>");
									$this->redirect(array("controller"=>"TimeTable","action"=>"periodSubjectAllocation"));
						}
					}
					else
					{
						/****************************Start CONDTION FOR Language1 *******************************/
						if($this->request->data['PeriodSubjectAllocation']['subject_type']=="Language1")
						{
						
							$condition_period = array('conditions'=>array('PeriodSubjectAllocation.add_class_id'=>$this->request->data['PeriodSubjectAllocation']['add_class_id'],
															   'PeriodSubjectAllocation.section_id'=>$this->request->data['PeriodSubjectAllocation']['section_id'],
															   'PeriodSubjectAllocation.subject_id'=>$this->request->data['PeriodSubjectAllocation']['subject_id'],
															   'PeriodSubjectAllocation.period_order'=>$this->request->data['PeriodSubjectAllocation']['period_order']
																));
							$period = $this->PeriodSubjectAllocation->find('all',$condition_period);
							if(empty($period))
							{
								$this->periodSubjectAllocationSubMethod($this->request->data['PeriodSubjectAllocation'],$dayList,$this->request->data['PeriodSubjectAllocation']['add_class_id'],$this->request->data['PeriodSubjectAllocation']['section_id'],$this->request->data['PeriodSubjectAllocation']['subject_id'],$this->request->data['PeriodSubjectAllocation']['subject_type'],$this->request->data['PeriodSubjectAllocation']['period_order'],$id);
							}
							else
							{
									$this->Session->setFlash("<div class='alert alert-success fade in' style='height:50px'>
										<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
										<i class='fa fa-check'></i> Language Already Add to this Period.</div>");
										$this->redirect(array("controller"=>"TimeTable","action"=>"periodSubjectAllocation"));
							}
						}
						/**********************************END CONDTION FOR Language1 ****************************/
						/****************************Start CONDTION FOR Language2 *******************************/
						
						else if($this->request->data['PeriodSubjectAllocation']['subject_type']=="Language2")
						{
							//echo "Language2";
							$condition_period = array('conditions'=>array('PeriodSubjectAllocation.add_class_id'=>$this->request->data['PeriodSubjectAllocation']['add_class_id'],
															   'PeriodSubjectAllocation.section_id'=>$this->request->data['PeriodSubjectAllocation']['section_id'],
																'PeriodSubjectAllocation.period_order'=>$this->request->data['PeriodSubjectAllocation']['period_order'],
																 'PeriodSubjectAllocation.subject_id'=>$this->request->data['PeriodSubjectAllocation']['subject_id']
															  
																));
							$period = $this->PeriodSubjectAllocation->find('all',$condition_period);
							if(empty($period))
							{
								$this->periodSubjectAllocationSubMethod($this->request->data['PeriodSubjectAllocation'],$dayList,$this->request->data['PeriodSubjectAllocation']['add_class_id'],$this->request->data['PeriodSubjectAllocation']['section_id'],$this->request->data['PeriodSubjectAllocation']['subject_id'],$this->request->data['PeriodSubjectAllocation']['subject_type'],$this->request->data['PeriodSubjectAllocation']['period_order'],$id);
							}
							else
							{
									$this->Session->setFlash("<div class='alert alert-success fade in' style='height:50px'>
										<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
										<i class='fa fa-check'></i> Language Already Add to this Period.</div>");
										$this->redirect(array("controller"=>"TimeTable","action"=>"periodSubjectAllocation"));
							}
						}
						/**********************************END CONDTION FOR Language2 ****************************/
						/****************************Start CONDTION FOR Language3 *******************************/
						else if($this->request->data['PeriodSubjectAllocation']['subject_type']=="Language3")
						{
							$condition_period = array('conditions'=>array('PeriodSubjectAllocation.add_class_id'=>$this->request->data['PeriodSubjectAllocation']['add_class_id'],
															   'PeriodSubjectAllocation.section_id'=>$this->request->data['PeriodSubjectAllocation']['section_id'],
															'PeriodSubjectAllocation.subject_id'=>$this->request->data['PeriodSubjectAllocation']['subject_id'],
															  'PeriodSubjectAllocation.period_order'=>$this->request->data['PeriodSubjectAllocation']['period_order']
																	));
							$period = $this->PeriodSubjectAllocation->find('all',$condition_period);
							if(empty($period))
							{
								$this->periodSubjectAllocationSubMethod($this->request->data['PeriodSubjectAllocation'],$dayList,$this->request->data['PeriodSubjectAllocation']['add_class_id'],$this->request->data['PeriodSubjectAllocation']['section_id'],$this->request->data['PeriodSubjectAllocation']['subject_id'],$this->request->data['PeriodSubjectAllocation']['subject_type'],$this->request->data['PeriodSubjectAllocation']['period_order'],$id);
							}
							else
							{
									$this->Session->setFlash("<div class='alert alert-success fade in' style='height:50px'>
										<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
										<i class='fa fa-check'></i> Language Already Add to this Period.</div>");
										$this->redirect(array("controller"=>"TimeTable","action"=>"periodSubjectAllocation"));
							}
						}
						/**********************************END CONDTION FOR Language3 ****************************/
					}
				}
		
			else if(empty($this->request->data))
			{
				$this->request->data = $this->PeriodSubjectAllocation->read(null,$id);
			}
			
			//////////////////////////////////////////////////////////////////////////////////////////
			/*Get academic_years_list */
			$academic_years_list = $this->AcademicYear->find('all',array('order'=>'AcademicYear.academic_year DESC'));
			$academic_years_list = Set::extract($academic_years_list, '{n}.AcademicYear');
			$academic_years = array();
			if(!empty($academic_years_list)){
			    foreach($academic_years_list as $academic_y){ 
				$academic_years[$academic_y['id']] = $academic_y['academic_year'];
			    }
			}
			$this->set('academic_years_list', $academic_years);
			
			
			$class_list = $this->AddClass->find('all');
			$class_list = Set::extract($class_list, '{n}.AddClass');
			$class_array = array();
			if(!empty($class_list)){
			    foreach($class_list as $class){ 
				$class_array[$class['id']] = $class['class_name'];
			    }
			}
			$this->set('class_list', $class_array);
			
			/*Get section_list */
			$section_list = $this->Section->find('all');
			$section_list = Set::extract($section_list, '{n}.Section');
			$section = array();
			if(!empty($section_list)){
			    foreach($section_list as $section){ 
				$section_array[$section['id']] = $section['section'];
			    }
			}
			$this->set('section_list', $section_array);
			/*Get subject_list */
			$subject_list = $this->Subject->find('all');
			$subject_list = Set::extract($subject_list, '{n}.Subject');
			$subject_array = array();
			if(!empty($subject_list)){
			    foreach($subject_list as $subject){ 
				$subject_array[$subject['id']] = $subject['subject_name'];
			    }
			}
			$this->set('subject_list', $subject_array);
		}
		public function periodSubjectAllocationSubMethod($data,$dayList,$class,$section,$subject,$subject_type,$period,$id)
		{
			
			$condition = array('conditions'=>array('PeriodSubjectAllocation.add_class_id'=>$class,
															   'PeriodSubjectAllocation.section_id'=>$section,
															   'PeriodSubjectAllocation.subject_id'=>$subject,
															   'PeriodSubjectAllocation.subject_type'=>$subject_type,
															   'PeriodSubjectAllocation.period_order'=>$period));
						$days = $this->PeriodSubjectAllocation->find('all',$condition);
						if(empty($days))
						{
							$this->PeriodSubjectAllocation->save($data);
							$this->Session->setFlash("<div class='alert alert-success fade in' style='height:50px'>
								<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
								<i class='fa fa-check'></i> Data insreted successfully.</div>");
							$this->redirect(array("controller"=>"TimeTable","action"=>"periodSubjectAllocation"));
						}
						else
						{
							$this->PeriodSubjectAllocation->query("UPDATE period_subject_allocations set weekdays='".$dayList."' WHERE id='".$days[0]['PeriodSubjectAllocation']['id']."'");
									
							/*if($days[0]['PeriodSubjectAllocation']['weekdays']!=$dayList)
							{
								if(!empty($id))
								{
									$this->Session->setFlash("<div class='alert alert-success fade in' style='height:50px'>
									<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
									<i class='fa fa-check'></i> Data Updated Successfully.</div>");
									$this->redirect(array("controller"=>"TimeTable","action"=>"periodSubjectAllocation"));
								}
								else
								{
									$this->Session->setFlash("<div class='alert alert-success fade in' style='height:50px'>
									<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
									<i class='fa fa-check'></i> Duplicate entry.</div>");
									$this->redirect(array("controller"=>"TimeTable","action"=>"periodSubjectAllocation"));
								}
								
							}
							else{
								//echo "true....duplicate";
								$this->Session->setFlash("<div class='alert alert-success fade in' style='height:50px'>
								<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
								<i class='fa fa-check'></i> Duplicate entry.</div>");
								$this->redirect(array("controller"=>"TimeTable","action"=>"periodSubjectAllocation"));
							}*/
						}
		}
	
		public function deletePeriodSubjectAllocation($id=null)
		{
			$this->layout="ptes_admin";
			$this->PeriodSubjectAllocation->delete($id);
			$this->Session->setFlash("<div class='alert alert-danger fade in' style='height:50px'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<i class='fa fa-check'></i> Deleted successfully.</div>");
			$this->redirect(array("controller"=>"TimeTable","action"=>"periodSubjectAllocationList"));
				
		}
		public function periodSubjectAllocationList()
		{
			$this->layout="ptes_admin";
			
			$list = $this->PeriodSubjectAllocation->find("all"); // get value from table
			$this->set("list",$list);  // setter it avaible to view
			}
		
}
