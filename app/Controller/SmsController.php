<?php 
date_default_timezone_set('Asia/Kolkata');
ini_set('memory_limit', '2048M');
set_time_limit(0);
class SmsController extends AppController {

 
	public $uses = array('FacultySms','FacultyIndividualSms','Facultie','StaffDetail','Admin','SchoolIndividualSms','PucClassWiseSmsDetail','SchoolClassWiseSmsDetail','SchoolClassWiseSms','SchoolBulkSms','PucIndividualSms','PucClassWiseSms','ClassWiseSms','ClassWiseSmsDetail','PucBulkSms','StudentDetail','DegreeStudentDetail','PucStudentDetail','NotificationType','QuickSms','AcademicYear', 'Section', 'AddClass','Stream','Course','Combination', 'BulkSms', 'IndividualSms','SchoolQuickSms','PucQuickSms','PucCombination','PucCourse');
	public $helpers = array('Html', 'Form', 'Js','Session');
   
		public function index()
		{
			$this->_userSessionCheckout();
			$this->layout="ptes_admin";
			
			if(!empty($this->request->data))
			{
				$username = $this->request->data['Admin']['user_name'];
				$password = $this->request->data['Admin']['password'];
				$condition = array("conditions"=>array('user_name'=>$username,'password'=>$password));
				$user_detail = $this->Admin->find('first',$condition);
				 
				if(count($user_detail)>0){
					$this->Session->write('UserSession', session_id()); 
					$this->Session->write('user_type', $user_detail['Admin']['user_type']);
					$this->Session->write('user_session_name', $user_detail['Admin']['user_name']);
					$this->Session->write('user_session_id', $user_detail['Admin']['id']);
					$this->redirect(array('controller'=>'Admin','action'=>'adminHome')); 	
					
				}else{
					
					$this->Session->setFlash('User name / Password is wrong');
					$this->redirect(array('controller'=>'Admin','action'=>'index')); 
				}
			} 
			//debug($this->StudentDetail->getDataSource()->getLog(false,false));
		} 
		public function adminHome()
		{
			$this->_userSessionCheckout();
			Configure::write('debug', '2');
			$this->layout="ptes_admin"; 
			
			
			/* FOR STUDENT COUNT */
			$total_student=$this->StudentDetail->find('count');
			$this->set('total_student',$total_student);
			
			$mconditions = array("conditions"=>array("gender"=>"Male"));
			$male_total_student=$this->StudentDetail->find('count',$mconditions);
			$this->set('male_total_student',$male_total_student);
			
			$fmconditions = array("conditions"=>array("gender"=>"Female"));
			$female_total_student=$this->StudentDetail->find('count',$fmconditions);
			$this->set('female_total_student',$female_total_student); 
			/* FOR STUDENT COUNT */ 
			
			/* FOR STUDENT DATE OF BIRTH */
			$cdate = date('Y-m-d');
			$bdy =  $this->StudentDetail->find('all',array("fields"=>array("dob","student_name","student_code"),"recursive"=>0));
			$this->set("bdy" , $bdy);
			
			 
			/* FOR STUDENT DATE OF BIRTH */
		}
		function logout()
		{
			Configure::write('debug', '0');
			// Killing the administrator defined sessions
			$this->Session->delete('UserSession'); 
			$this->redirect(array('controller'=>'Admin','action'=>'index'));  
		}		
		
		/* SMS Notification Type */
		public function NotificationType($id=null)
		{
			$this->_userSessionCheckout();
			$this->layout="ptes_admin";
			if(!empty($this->request->data))
			{
				$condition=array('conditions'=>array('NotificationType.notification_type'=>$this->request->data['NotificationType']['notification_type']));
				$check=$this->NotificationType->find('all',$condition);
				
				if(empty($check))
				{
					$this->NotificationType->save($this->request->data);
					$this->Session->setFlash("<div class='alert alert-success fade in' style='height:50px'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>Record Inserted</div>");
					$this->redirect('/Sms/NotificationType');
				}
				else
				{
					$this->Session->setFlash("<div class='alert alert-danger fade in' style='height:50px'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-wrong'></i>The record already exists</div>");
					$this->redirect('/Sms/NotificationType');
				}
			}
			else if(empty($this->request->data))
			{
				$this->request->data=$this->NotificationType->read(null,$id);
			}
			
			/* Display SMS Notification List*/
			//$this->Notification->
			$notification_type_list=$this->NotificationType->find('all');
			 
			$this->set("list",$notification_type_list); 
			
		}
		
		/*Delete SMS Notification Entry*/
		public function notificationTypeDelete($id=null)
		{
			$this->_userSessionCheckout();
			$this->NotificationType->delete($id);
			$this->Session->setFlash("<div class='alert alert-success fade in' style='height:50px'>
			<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>Deleted Succesfully</div>");
			$this->redirect('/Sms/NotificationType');
		}
		/* End of SMS Notification Type */
		
		public function quickSms($id=null)
		{
		        //configure::write('debug',2);
			$this->_userSessionCheckout();
			$this->layout="ptes_admin";
			$this->_SmsDropDown(); 
			$current_date = date('y-m-d');
			
			if(!empty($this->request->data))
			{
				$mobile_no_list = explode(',',$this->request->data['QuickSms']['send_to']); 
				foreach($mobile_no_list as $mbl_no)
				{
					
					
					$student_condition = array("conditions"=>array("StudentDetail.father_mobile_number"=>$mbl_no),"fields"=>array("id"));
					$contact_person = $this->StudentDetail->find("first",$student_condition);
					//print_r($contact_person);
					$student_id = $contact_person['StudentDetail']['id'];
					if($student_id==''){$student_id = 0;}
					
					$mobile_no= "91".$mbl_no;
					 $username = 'stepintechno@gmail.com';
					 $hash = 'Aarvi@stepin30';
					
					// Message details
					//$numbers = array(919886610714);
					$sender = urlencode('VASAVI');
					$message = 'Vasavi Public School '.' '.$this->request->data['QuickSms']['notification_type_id'].': '.$this->request->data['QuickSms']['message'];
					//$message  = $this->request->data['QuickSms']['message'];
				  
					$numbers = "91".$mbl_no;
				 
					// Prepare data for POST request
					$data = array('username' => $username, 'hash' => $hash, 'numbers' => $numbers, "sender" => $sender, "message" => $message);
				 
					// Send the POST request with cURL
					$ch = curl_init('http://api.textlocal.in/send/');
					curl_setopt($ch, CURLOPT_POST, true);
					curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
					$response = curl_exec($ch);
					curl_close($ch);
					
					//print_r($response);
					// Process your response here
					$sms_status=json_decode($response, true);
					
					$data_quick = array(
							"SchoolQuickSms"=>array(
								"notification_type_id"=>$this->request->data['QuickSms']['notification_type_id'],
								"send_to"=>$numbers,
								"message_from"=> "HighSchool",
								"message"=> $message,
								"sent_date"=>date('Y-m-d'),
								"sent_time"=>date("h:i:s"),
								"status"=> $sms_status['status'],
								"student_detail_id"=>$student_id
							)
					);
					
					$this->SchoolQuickSms->saveAll($data_quick);
				}
				$quick_sms = $this->Session->setFlash("<div class='alert alert-success fade in' style='height:50px'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>Quick SMS Details Sent Succefully.</div>");
					$this->redirect('/Sms/quickSms');
			}
			//else if(empty($this->request->data))
			//{
				//$this->request->data=$this->SchoolQuickSms->read(null,$id);
			//}
			
			/* Display Quick SMS List*/
			//$quick_sms_list=$this->SchoolQuickSms->find('all');
			//$this->set("quick_sms_list",$quick_sms_list);  
		}
		
		/* Quick SMS Type */
		/* Quick SMS Type */
		public function puQuickSms($id=null)
		{
			$this->_userSessionCheckout();
			$this->layout="ptes_admin";
			$this->_SmsDropDown(); 
			
			if(!empty($this->request->data))
			{
				$mobile_no_list = explode(',',$this->request->data['QuickSms']['send_to']); 

				foreach($mobile_no_list as $mbl_no)
				{
					
					$student_condition = array("conditions"=>array("PucStudentDetail.father_mobile_number"=>$mbl_no),"fields"=>array("id"));
					$contact_person = $this->PucStudentDetail->find("first",$student_condition);
					 
					$student_id = $contact_person['PucStudentDetail']['id'];
					if($student_id==''){$student_id = 0;}
					
					$mobile_no= "91".$mbl_no;
					$username = 'usha.cs@sahyadri.edu.in';
					$hash = 'Aptra2017';
					
					// Message details
					//$numbers = array(919886610714);
					$sender = urlencode('MILPUC');
					$message = 'Milagres PU College'.' '.$this->request->data['QuickSms']['notification_type_id'].': '.$this->request->data['QuickSms']['message'].' Thank You.';
					//$message  = $this->request->data['QuickSms']['message'];
				  
					$numbers = "91".$mbl_no;
				 
					// Prepare data for POST request
					$data = array('username' => $username, 'hash' => $hash, 'numbers' => $numbers, "sender" => $sender, "message" => $message);
				 
					// Send the POST request with cURL
					$ch = curl_init('http://api.textlocal.in/send/');
					curl_setopt($ch, CURLOPT_POST, true);
					curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
					$response = curl_exec($ch);
					curl_close($ch);
					
					// Process your response here
					$sms_status=json_decode($response, true);
					
					$data_quick = array(
							"PucQuickSms"=>array(
								"notification_type_id"=>$this->request->data['QuickSms']['notification_type_id'],
								"send_to"=>$numbers,
								"message_from"=> "PUC",
								"message"=> $message,
								"sent_date"=>date('Y-m-d'),
								"sent_time"=>date("h:i:s"),
								"status"=> $sms_status['status'],
								"puc_student_detail_id"=>$student_id
							)
					);

					$this->PucQuickSms->saveAll($data_quick);
					
				}
				$quick_sms = $this->Session->setFlash("<div class='alert alert-success fade in' style='height:50px'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>Quick SMS Details Sent Succefully.</div>");
					//$this->redirect('/Sms/quickSms');
								
			}
			else if(empty($this->request->data))
			{
				$this->request->data=$this->PucQuickSms->read(null,$id);
			}
			
			/* Display Quick SMS List*/
			$quick_sms_list=$this->PucQuickSms->find('all');
			$this->set("quick_sms_list",$quick_sms_list);  
		}
		
		/*Delete Quick SMS Entry*/
		public function quickSmsTypeDelete($id=null)
		{
			$this->_userSessionCheckout();
			$this->QuickSms->delete($id);
			$this->Session->setFlash("<div class='alert alert-success fade in' style='height:50px'>
			<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>Deleted Succesfully</div>");
			$this->redirect('/Sms/quickSms');
		}
		 
		/* End of Quick SMS Type */
		
		public function degreeQuickSms($id=null)
		{
			
			configure::write(0);
			$this->_userSessionCheckout();
			$this->layout="ptes_admin";
			$this->_SmsDropDown(); 
			
			if(!empty($this->request->data))
			{
				$mobile_no_list = explode(',',$this->request->data['QuickSms']['send_to']); 

				foreach($mobile_no_list as $mbl_no)
				{
					
					$student_condition = array("conditions"=>array("DegreeStudentDetail.father_mobile_number"=>$mbl_no),"fields"=>array("id"));
					$contact_person = $this->DegreeStudentDetail->find("first",$student_condition);  
					$student_id = $contact_person['DegreeStudentDetail']['id'];
					if($student_id==''){$student_id = 0;}
						
					$mobile_no= "91".$mbl_no;
					$username = 'usha.cs@sahyadri.edu.in';
					$hash = 'Aptra2017';
					
					// Message details
					//$numbers = array(919886610714);
					$sender = urlencode('MILDEG');
					$message = 'Milagres Degree College'.' '.$this->request->data['QuickSms']['notification_type_id'].': '.$this->request->data['QuickSms']['message'].' Thank You.';
					//$message  = $this->request->data['QuickSms']['message'];
                                         $c_time = date('h:i:s');
				  
					$numbers = "91".$mbl_no;
				 
					// Prepare data for POST request
					$data = array('username' => $username, 'hash' => $hash, 'numbers' => $numbers, "sender" => $sender, "message" => $message);
				 
					// Send the POST request with cURL
					$ch = curl_init('http://api.textlocal.in/send/');
					curl_setopt($ch, CURLOPT_POST, true);
					curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
					$response = curl_exec($ch);
					curl_close($ch);
					
					// Process your response here
					$sms_status=json_decode($response, true);
					
					$data_quick = array(
							"QuickSms"=>array(
								"notification_type_id"=>$this->request->data['QuickSms']['notification_type_id'],
								"send_to"=>$numbers,
								"message_from"=> "Degree",
								"message"=> $message,
"sent_time"=>$c_time,
								"sent_date"=>date('Y-m-d'),
								
								"status"=> $sms_status['status'],
								"degree_student_detail_id"=>$student_id
							)
					);

					$this->QuickSms->saveAll($data_quick);
					
				}

				$quick_sms = $this->Session->setFlash("<div class='alert alert-success fade in' style='height:50px'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>SMS Sent Succefully.</div>");
					// $this->redirect('/Sms/degreeQuickSms');
								
			}
			else if(empty($this->request->data))
			{
				$this->request->data=$this->QuickSms->read(null,$id);
			}
			
			/* Display Quick SMS List*/
			$quick_sms_list=$this->QuickSms->find('all');
			$this->set("quick_sms_list",$quick_sms_list);  
		} 
		/* Bulk SMS */
		public function bulkSms()
		{
			$this->_userSessionCheckout();
			$this->layout="ptes_admin";
			 
			/* Notification Type Dropdown */
			$this->_SmsDropDown();  
			
			// Process Data
			$current_date = date('y-m-d');
			if(!empty($this->request->data))
			{
				$all_student_list = $this->StudentDetail->find("all",array("conditions"=>array("academic_year_id"=>$this->request->data['academic_year_id']),"fields"=>array("father_mobile_number","StudentDetail.id")));
				
				//$this->set('all_student_list',$all_student_list); 
				
				// Message details 
			    if(count($all_student_list) > 0)
				{ 	  
					
					foreach($all_student_list as $student_mobile)
					{  
						if($student_mobile['StudentDetail']['father_mobile_number']!='')
						{

							$username = 'usha.cs@sahyadri.edu.in';
							$hash = 'Aptra2017';
							
							// Message details
							//$numbers = array(919886610714);
							$sender = urlencode('MILHGS');
							$message = $this->request->data['message'];
							$message = 'Milagres High School'.' '.$this->request->data['notification_type_id'].': '.$this->request->data['message'].' Thank You.';
						 
							$numbers = "91".$student_mobile['StudentDetail']['father_mobile_number']; 
						 
							// Prepare data for POST request
							$data = array('username' => $username, 'hash' => $hash, 'numbers' => $numbers, "sender" => $sender, "message" => $message);
						 
							// Send the POST request with cURL
							$ch = curl_init('http://api.textlocal.in/send/');
							curl_setopt($ch, CURLOPT_POST, true);
							curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
							curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
							$response = curl_exec($ch);
							curl_close($ch);
							
							// Process your response here 
							 
							$sms_status=json_decode($response, true);
							
						 
							$data_msg = array(
								"SchoolBulkSms"=>array(
									"academic_year_id"=> $this->request->data['academic_year_id'],
									"notification_to"=>$numbers,
									"notification_type_id"=>$this->request->data['notification_type_id'],
									"message"=> $this->request->data['message'],
									"status"=> $sms_status['status'], 
									"sent_date"=>date('Y-m-d'),
									"sent_time"=>date("h:i:s"),
									"student_detail_id"=>$student_mobile['StudentDetail']['id']
								)
							); 
							$this->SchoolBulkSms->saveAll($data_msg); 
						}
					}  
					
					$bulk_sms = $this->Session->setFlash("<div class='alert alert-success fade in' style='height:50px'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i> Bulk SMS Sent Succesfully.</div>");
					$this->redirect('/Sms/bulkSms'); 
				}
				 
			}
			
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
		/* End of Bulk SMS */
		
		/* PU:Bulk SMS */
		public function puBulkSms()
		{
			$this->_userSessionCheckout();
			$this->layout="ptes_admin";
			 
			/* Notification Type Dropdown */
			$this->_SmsDropDown();  
			
			// Process Data
			if(!empty($this->request->data))
			{
				
				$all_student_list = $this->PucStudentDetail->find("all",array("conditions"=>array("academic_year_id"=>$this->request->data['Admin']['academic_year_id']),"fields"=>array("father_mobile_number","PucStudentDetail.id")));
				
				$this->set('all_student_list',$all_student_list);  
				
				//print_r($all_student_list);
				// Message details
			    foreach($all_student_list as $student_mobile)
				{  
					if($student_mobile['PucStudentDetail']['father_mobile_number']!='')
					{

						$username = 'usha.cs@sahyadri.edu.in';
						$hash = 'Aptra2017';
						
						// Message details
						//$numbers = array(919886610714);
						$sender = urlencode('MILPUC');
						$message = 'Milagres PU College'.' '.$this->request->data['Admin']['notification_type_id'].': '.$this->request->data['message'].' Thank You.';
					 
						$numbers = "91".$student_mobile['PucStudentDetail']['father_mobile_number']; 
					 
						// Prepare data for POST request
						$data = array('username' => $username, 'hash' => $hash, 'numbers' => $numbers, "sender" => $sender, "message" => $message);
					 
						// Send the POST request with cURL
						$ch = curl_init('http://api.textlocal.in/send/');
						curl_setopt($ch, CURLOPT_POST, true);
						curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
						curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
						$response = curl_exec($ch);
						curl_close($ch);
						
						// Process your response here
						//echo $response; 
						
						// Process your response here
						$sms_status=json_decode($response, true);
						
						//print_r($sms_status['status']);
						
						
						$data_msg = array(
							"PucBulkSms"=>array(
								"academic_year_id"=> $this->request->data['Admin']['academic_year_id'],
								"notification_to"=>$numbers,
								"notification_type_id"=>$this->request->data['Admin']['notification_type_id'],
								"message"=>$message,
								"status"=> $sms_status['status'],
								"message_from"=> "PUC",
								"sent_date"=>date('Y-m-d'),
								"sent_time"=>date("h:i:s"),
								"puc_student_detail_id"=>$student_mobile['PucStudentDetail']['id']
							)
						);
						
						$this->PucBulkSms->saveAll($data_msg);
						
					}
				}
				$quick_sms = $this->Session->setFlash("<div class='alert alert-success fade in' style='height:50px'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>SMS Details Sent Succefully.</div>");
					$this->redirect('/Sms/puBulkSms');
			}
			
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
		/* End of Bulk SMS */
		
		
			/* Class wise Bulk SMS  for degree*/
		public function degreeClasswiseSms()
		{
			$this->_userSessionCheckout();
			$this->layout="ptes_admin";
			$this->_getStream();
			$this->_getSection(); 
			 
			/* Notification Type Dropdown */
			$this->_SmsDropDown();  
			// Process Data
			if(!empty($this->request->data))
			{  
				$academic_year_id =  $this->request->data['ClassWiseSms']['academic_year_id'];
				$year =  $this->request->data['ClassWiseSms']['year'];
				$stream_id =  $this->request->data['ClassWiseSms']['stream_id'];
				$section_id =  $this->request->data['ClassWiseSms']['section_id'];
				$notification_type_id =  $this->request->data['ClassWiseSms']['notification_type_id'];
				
				$course_id =  $this->request->data['DegreeStudentDetail']['course_id'];
				$combination_id =  $this->request->data['DegreeStudentDetail']['combination_id'];
				
				if($section_id=='' and $combination_id=='')
				{
					 
					$condition = array("conditions"=>array("DegreeStudentDetail.academic_year_id"=>$academic_year_id,
															"DegreeStudentDetail.year" =>$year  ,
															"DegreeStudentDetail.stream_id" => $stream_id ,
															"DegreeStudentDetail.course_id" =>$course_id)   , 
															"fields"=>array("DegreeStudentDetail.father_mobile_number","DegreeStudentDetail.id"));
				} 
				
				if($section_id!='' and $combination_id=='')
				{ 
					 
					$condition = array("conditions"=>array("DegreeStudentDetail.academic_year_id"=>$academic_year_id,
															"DegreeStudentDetail.year" =>$year  ,
															"DegreeStudentDetail.stream_id" => $stream_id ,
															"DegreeStudentDetail.course_id" =>$course_id   ,
														     "DegreeStudentDetail.section_id"=> $section_id), 
															"fields"=>array("DegreeStudentDetail.father_mobile_number","DegreeStudentDetail.id"));
				}
				if($section_id=='' and $combination_id!='')
				{ 
					 
					$condition = array("conditions"=>array("DegreeStudentDetail.academic_year_id"=>$academic_year_id,
															"DegreeStudentDetail.year" =>$year  ,
															"DegreeStudentDetail.stream_id" => $stream_id ,
															"DegreeStudentDetail.course_id" =>$course_id   ,
															"DegreeStudentDetail.combination_id" =>$combination_id), 
															"fields"=>array("DegreeStudentDetail.father_mobile_number","DegreeStudentDetail.id"));
				}
				
				if($section_id!='' && $combination_id!='')
				{ 
					$condition = array("conditions"=>array("DegreeStudentDetail.academic_year_id"=>$academic_year_id,
															"DegreeStudentDetail.year" =>$year  ,
															"DegreeStudentDetail.stream_id" => $stream_id ,
															"DegreeStudentDetail.course_id" =>$course_id   ,
															"DegreeStudentDetail.combination_id" =>$combination_id,
															"DegreeStudentDetail.section_id"=> $section_id),
															"fields"=>array("DegreeStudentDetail.father_mobile_number","DegreeStudentDetail.id"));
				} 
				$class_wise_list = $this->DegreeStudentDetail->find("all",$condition);  
				 
				//print_r($class_wise_list);
				$message = 'Milagres Degree College'.' '.$this->request->data['ClassWiseSms']['notification_type_id'].': '.$this->request->data['ClassWiseSms']['message'].' Thank You.';
					 
					 
				$data_class = array(
								"ClassWiseSms"=>array(
									"academic_year_id"=>$this->request->data['ClassWiseSms']['academic_year_id'],
									"year"=>$this->request->data['ClassWiseSms']['year'],
									"stream_id"=>$this->request->data['ClassWiseSms']['stream_id'],
									"course_id"=> $this->request->data['DegreeStudentDetail']['course_id'],
									"combination_id"=> $this->request->data['DegreeStudentDetail']['combination_id'],
									"section_id"=> $this->request->data['ClassWiseSms']['section_id'],
									"notification_type_id"=>$this->request->data['ClassWiseSms']['notification_type_id'], 
									"message"=> $message,
									"date"=>date('Y-m-d'),
									"sent_time"=>date("h:i:s")
								)
							);
							 
							$this->ClassWiseSms->save($data_class);  
							$class_id = $this->ClassWiseSms->id;
							
				foreach($class_wise_list as $student_mobile)
				{
					
					 
					if($student_mobile['DegreeStudentDetail']['father_mobile_number']!='')
					{
						 
						/*SMS**/ 
				
						$username = 'usha.cs@sahyadri.edu.in';
						$hash = 'Aptra2017';
						
						// Message details
						//$numbers = array(919886610714);
						$sender = urlencode('MILDEG');
						
						$numbers = "91".$student_mobile['DegreeStudentDetail']['father_mobile_number'];
					 
						// Prepare data for POST request
						$data = array('username' => $username, 'hash' => $hash, 'numbers' => $numbers, "sender" => $sender, "message" => $message);
					 
						// Send the POST request with cURL
						$ch = curl_init('http://api.textlocal.in/send/');
						curl_setopt($ch, CURLOPT_POST, true);
						curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
						curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
						$response = curl_exec($ch);
						curl_close($ch);
						
						// Process your response here
						//echo $response; 
						
						// Process your response here
						$sms_status=json_decode($response, true);
						
						//print_r($sms_status['status']);
						  
						/*SMS**/
						 
							
						//$class_id = $this->params['$this->ClassWiseSms->id'];
						
						if($class_id!='')
						{
							$data_class_details = array(
								"ClassWiseSmsDetail"=>array(
									"class_wise_sms_id"=>$class_id,
									"notification_to"=>$numbers,
									"status"=>$sms_status['status'],
									"degree_student_detail_id"=>$student_mobile['DegreeStudentDetail']['id']
								)
							);
							$this->ClassWiseSmsDetail->saveAll($data_class_details);
						}
					

					}
						
				}
				/* $data_class = array(
							"ClassWiseSms"=>array(
								"academic_year_id"=>$this->request->data['ClassWiseSms']['academic_year_id'],
								"year"=>$this->request->data['ClassWiseSms']['year'],
								"stream_id"=>$this->request->data['ClassWiseSms']['stream_id'],
								"course_id"=> $this->request->data['DegreeStudentDetail']['course_id'],
								"combination_id"=> $this->request->data['DegreeStudentDetail']['combination_id'],
								"section_id"=> $this->request->data['ClassWiseSms']['section_id'],
								"notification_type_id"=>$this->request->data['ClassWiseSms']['notification_type_id'],
								"type"=> "Degree",
								"message"=> $message,
								"date"=>date('Y-m-d'),
								"sent_time"=>date("h:i:s"),
								//"degree_student_detail_id"=>$student_mobile['DegreeStudentDetail']['id'],
								//"status"=>$sms_status['status']
							)
						);
						$this->ClassWiseSms->saveAll($data_class); */
						
						
				$class_wise_sms = $this->Session->setFlash("<div class='alert alert-success fade in' style='height:50px'>
							<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>Class Wise SMS Details Sent Succefully.</div>");
						//$this->redirect('/Sms/degreeClasswiseSms');
				
				 
			}
			
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
		/* Class wise Bulk SMS  for degree*/
		
		/* PU : Class wise Bulk SMS  for degree*/
		public function puClasswiseSms()
		{
			$this->_userSessionCheckout();
			$this->layout="ptes_admin";
			$this->_getStream();
			$this->_getSection(); 
			$this->_getPucCourse();
			$this->_getPucCombination();
			
			/* Notification Type Dropdown */
			$this->_SmsDropDown();  
			// Process Data
			if(!empty($this->request->data))
			{  
				//print_r($this->request->data);
				$academic_year_id =  $this->request->data['PucClassWiseSms']['academic_year_id'];
				$year =  $this->request->data['PucClassWiseSms']['year']; 
				$section_id =  $this->request->data['PucClassWiseSms']['section_id'];
				$notification_type_id =  $this->request->data['PucClassWiseSms']['notification_type_id'];
				
				$course_id =  $this->request->data['PucClassWiseSms']['puc_course_id'];
				$combination_id =  $this->request->data['PucStudentDetail']['puc_combination_id']; 
				
				if($section_id=='')
				{
					 
					$condition = array("conditions"=>array("PucStudentDetail.academic_year_id"=>$academic_year_id,
															"PucStudentDetail.year" =>$year  , 
															"PucStudentDetail.puc_course_id" =>$course_id,
															"PucStudentDetail.puc_combination_id" =>$combination_id)   , 
															"fields"=>array("PucStudentDetail.father_mobile_number","PucStudentDetail.id"));print_r($condition);
				} 
				else
				{ 
					$condition = array("conditions"=>array("PucStudentDetail.academic_year_id"=>$academic_year_id,
															"PucStudentDetail.year" =>$year  , 
															"PucStudentDetail.puc_course_id" =>$course_id   ,
															"PucStudentDetail.puc_combination_id" =>$combination_id,
															"PucStudentDetail.section_id"=> $section_id),
															"fields"=>array("PucStudentDetail.father_mobile_number","PucStudentDetail.id"));
				} 
				$class_wise_list = $this->PucStudentDetail->find("all",$condition);  
				
				$message = 'Milagres PU College'.' '.$this->request->data['PucClassWiseSms']['notification_type_id'].': '.$this->request->data['PucClassWiseSms']['message'].' Thank You.';
				
				$data_class = array
						(
							"PucClassWiseSms"=>array
							(
							"academic_year_id"=>$this->request->data['PucClassWiseSms']['academic_year_id'],
							"year"=>$this->request->data['PucClassWiseSms']['year'],
							"puc_course_id"=>$this->request->data['PucClassWiseSms']['puc_course_id'],
							"puc_combination_id"=> $this->request->data['PucStudentDetail']['puc_combination_id'], 
							"section_id"=> $this->request->data['PucClassWiseSms']['section_id'],
							"notification_type_id"=>$this->request->data['PucClassWiseSms']['notification_type_id'], 
							"message"=> $message,
							"sent_date"=>date('Y-m-d'),
							"sent_time"=>date("h:i:s")							
							)
						);
						
						$this->PucClassWiseSms->saveAll($data_class);
						
						$class_id = $this->PucClassWiseSms->id;
						
						foreach($class_wise_list as $student_mobile)
				{
					
					 
					if($student_mobile['PucStudentDetail']['father_mobile_number']!='')
					{
						 
						/*SMS**/ 
				
						$username = 'usha.cs@sahyadri.edu.in';
						$hash = 'Aptra2017';
						
						// Message details
						//$numbers = array(919886610714);
						$sender = urlencode('MILDEG');
						
						$numbers = "91".$student_mobile['PucStudentDetail']['father_mobile_number'];
					 
						// Prepare data for POST request
						$data = array('username' => $username, 'hash' => $hash, 'numbers' => $numbers, "sender" => $sender, "message" => $message);
					 
						// Send the POST request with cURL
						$ch = curl_init('http://api.textlocal.in/send/');
						curl_setopt($ch, CURLOPT_POST, true);
						curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
						curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
						$response = curl_exec($ch);
						curl_close($ch);
						
						// Process your response here
						//echo $response; 
						
						// Process your response here
						$sms_status=json_decode($response, true);
						
						//print_r($sms_status['status']);
						  
						/*SMS**/
						 
							
						//$class_id = $this->params['$this->ClassWiseSms->id'];
						
						if($class_id!='')
						{
							$data_class_details = array(
								"PucClassWiseSmsDetail"=>array(
									"puc_class_wise_sms_id"=>$class_id,
									"notification_to"=>$numbers,
									"status"=>$sms_status['status'],
									"puc_student_detail_id"=>$student_mobile['PucStudentDetail']['id']
								)
							);
							$this->PucClassWiseSmsDetail->saveAll($data_class_details);
						}
					

					}
						
				}
						
			}
			
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
		/* Class wise Bulk SMS  for degree*/
		
		
		/* Bulk SMS  for degree*/
		public function degreeBulkSms()
		{
			$this->_userSessionCheckout();
			$this->layout="ptes_admin";
			$this->_getStream();
			$this->_getSection();
			
			 
			/* Notification Type Dropdown */
			$this->_SmsDropDown();  
			// Process Data
			if(!empty($this->request->data))
			{ 
				$academic_year_id =  $this->request->data['BulkSms']['academic_year_id']; 
				$notification_type_id =  $this->request->data['BulkSms']['notification_type_id'];  
				$notification_to =  $this->request->data['BulkSms']['notification_to'];  
				$message = $this->request->data['message'];
				  
				if($notification_to=="All_Student")
				{
					$condition = array("conditions"=>array("DegreeStudentDetail.academic_year_id"=>$academic_year_id),
															"fields"=>array("DegreeStudentDetail.father_mobile_number","DegreeStudentDetail.id"));
															
					$class_wise_list = $this->DegreeStudentDetail->find("all",$condition);
					
					foreach($class_wise_list as $student_mobile)
					{  
						if($student_mobile['DegreeStudentDetail']['father_mobile_number']!='')
						{

							$username = 'usha.cs@sahyadri.edu.in';
							$hash = 'Aptra2017';
							
							// Message details
							//$numbers = array(919886610714);
							$sender = urlencode('MILDEG');
							 
							$message = 'Milagres Degree College'.' '.$this->request->data['BulkSms']['notification_type_id'].': '.$this->request->data['message'].' Thank You.';
							
						 
							$numbers = "91".$student_mobile['DegreeStudentDetail']['father_mobile_number']; 
						 
							// Prepare data for POST request
							$data = array('username' => $username, 'hash' => $hash, 'numbers' => $numbers, "sender" => $sender, "message" => $message);
						 
							// Send the POST request with cURL
							$ch = curl_init('http://api.textlocal.in/send/');
							curl_setopt($ch, CURLOPT_POST, true);
							curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
							curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
							$response = curl_exec($ch);
							curl_close($ch);
							
							// Process your response here
							//echo $response; 
							
							// Process your response here
							$sms_status=json_decode($response, true);
							
							//print_r($sms_status['status']);
							
							
							$data_msg = array(
								"BulkSms"=>array(
									"academic_year_id"=> $this->request->data['BulkSms']['academic_year_id'],
									"notification_to"=>$numbers,
									"notification_type_id"=>$this->request->data['BulkSms']['notification_type_id'],
									"message"=> $message,
									"status"=> $sms_status['status'],
									"type"=> "Degree",
									"date"=>date('Y-m-d'),
									"sent_time"=>date("h:i:s"),
									"degree_student_detail_id"=>$student_mobile['DegreeStudentDetail']['id']
								)
							);

							$this->BulkSms->saveAll($data_msg);
							
						}
					}
					$degree_bulk_sms = $this->Session->setFlash("<div class='alert alert-success fade in' style='height:50px'>
							<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>SMS Details Sent Succefully.</div>");
						$this->redirect('/Sms/degreeBulkSms');
					 			
															
				} 
				 
			}
			
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
		/* Bulk SMS  for degree*/
		
		/* Individual SMS  for degree*/
		public function degreeIndividualSms()
		{
			$this->_userSessionCheckout();
			$this->layout="ptes_admin";
			$this->_getStream();
			$this->_getSection(); 
			 
			// print_r($this->request->data);
			/* Notification Type Dropdown */
			$this->_SmsDropDown();  
			// Process Data
			if(!empty($this->request->data))
			{  
				$academic_year_id =  $this->request->data['academic_year_id'];
				$year =  $this->request->data['year'];
				$stream_id =  $this->request->data['stream_id'];
				$section_id =  $this->request->data['section_id']; 
				
				//$notification_type_id =  $this->request->data['Admin']['notification_type_id'];
				
				$course_id =  $this->request->data['DegreeStudentDetail']['course_id'];
				$combination_id =  $this->request->data['DegreeStudentDetail']['combination_id'];
				
				if($section_id=='' and $combination_id=='')
				{
					 
					$condition = array("conditions"=>array("DegreeStudentDetail.academic_year_id"=>$academic_year_id,
															"DegreeStudentDetail.year" =>$year  ,
															"DegreeStudentDetail.stream_id" => $stream_id ,
															"DegreeStudentDetail.course_id" =>$course_id)   , 
															"fields"=>array("DegreeStudentDetail.id","DegreeStudentDetail.father_mobile_number","DegreeStudentDetail.student_name"));
				} 
				
				if($section_id!='' and $combination_id=='')
				{ 
					 
					$condition = array("conditions"=>array("DegreeStudentDetail.academic_year_id"=>$academic_year_id,
															"DegreeStudentDetail.year" =>$year  ,
															"DegreeStudentDetail.stream_id" => $stream_id ,
															"DegreeStudentDetail.course_id" =>$course_id   ,
														     "DegreeStudentDetail.section_id"=> $section_id), 
															"fields"=>array("DegreeStudentDetail.id","DegreeStudentDetail.father_mobile_number","DegreeStudentDetail.student_name"));
				}
				if($section_id=='' and $combination_id!='')
				{ 
					 
					$condition = array("conditions"=>array("DegreeStudentDetail.academic_year_id"=>$academic_year_id,
															"DegreeStudentDetail.year" =>$year  ,
															"DegreeStudentDetail.stream_id" => $stream_id ,
															"DegreeStudentDetail.course_id" =>$course_id   ,
															"DegreeStudentDetail.combination_id" =>$combination_id), 
															"fields"=>array("DegreeStudentDetail.id","DegreeStudentDetail.father_mobile_number","DegreeStudentDetail.student_name"));
				}
				
				if($section_id!='' && $combination_id!='')
				{ 
					$condition = array("conditions"=>array("DegreeStudentDetail.academic_year_id"=>$academic_year_id,
															"DegreeStudentDetail.year" =>$year  ,
															"DegreeStudentDetail.stream_id" => $stream_id ,
															"DegreeStudentDetail.course_id" =>$course_id   ,
															"DegreeStudentDetail.combination_id" =>$combination_id,
															"DegreeStudentDetail.section_id"=> $section_id),
															"fields"=>array("DegreeStudentDetail.id","DegreeStudentDetail.father_mobile_number","DegreeStudentDetail.student_name"));
				} 
				$class_wise_list = $this->DegreeStudentDetail->find("all",$condition); 
				//print_r($class_wise_list);
				$this->set("class_wise_student_list",$class_wise_list); 
				
				 
			}
			
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
		
		public function degreeIndividualSmsSend()
		{
			$this->_userSessionCheckout();
			$this->layout="ptes_admin"; 
		 
				//print_r($this->request->data);
				//exit();
			if(!empty($this->request->data))
			{
				$i=0;
				foreach($this->request->data['mobile_no'] as $mobile_no)
				{
					if($mobile_no>0)
					{
						$student_mob_id = explode(',',$mobile_no);  
						$username = 'usha.cs@sahyadri.edu.in';
						$hash = 'Aptra2017';
						
						// Message details
						//$numbers = array(919886610714);
						$sender = urlencode('MILDEG');
						 
					    $message = 'Milagres Degree College'.' '.$this->request->data['notification_type_id'].': '.$this->request->data['message'].' Thank You.';
					 
						$numbers = "91".$mobile_no;
					 
						// Prepare data for POST request
						$data = array('username' => $username, 'hash' => $hash, 'numbers' => $numbers, "sender" => $sender, "message" => $message);
					 
						// Send the POST request with cURL
						$ch = curl_init('http://api.textlocal.in/send/');
						curl_setopt($ch, CURLOPT_POST, true);
						curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
						curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
						$response = curl_exec($ch);
						curl_close($ch);
						
						// Process your response here
						//echo $response; 
						
						// Process your response here
						$sms_status=json_decode($response, true);
						
						//print_r($sms_status['status']);
						
						
						/*SMS**/
						$data_ind = array(
							"IndividualSms"=>array(
								"academic_year_id"=>$this->request->data['academic_year_id'],
								"year"=>$this->request->data['year'],
								"stream_id"=>$this->request->data['stream_id'],
								"course_id"=> $this->request->data['DegreeStudentDetail']['course_id'],
								"combination_id"=> $this->request->data['DegreeStudentDetail']['combination_id'],
								"section_id"=> $this->request->data['section_id'],
								"degree_student_detail_id"=> $student_mob_id[1],
								"notification_type_id"=>$this->request->data['notification_type_id'],
								"notification_to"=>$student_mob_id[0],
								"type"=> "Degree",
								"message"=> $message,
								"status"=> $sms_status['status'],
								"date"=>date('Y-m-d'),
								"sent_time"=>date("h:i:s")
							)
					);
					$this->IndividualSms->saveAll($data_ind);
						
					}
					$i++;
				}
				$this->Session->setFlash("<div class='alert alert-success fade in' style='height:50px'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>Individual SMS Sent Succesfully.</div>");
					$this->redirect('/Sms/degreeIndividualSms');
			}
				
		}
		/* Individual SMS  for degree*/
		
		/* Individual SMS  for degree*/
		public function pucIndividualSms()
		{
			$this->_userSessionCheckout();
			$this->layout="ptes_admin";
			$this->_getStream();
			$this->_getSection();  
			$this->_getPucCourse();
			$this->_getPucCombination();
			
			/* Notification Type Dropdown */
			$this->_SmsDropDown();  
			// Process Data
			if(!empty($this->request->data))
			{  
				//print_r($this->request->data);
				$academic_year_id =  $this->request->data['pucIndividualSms']['academic_year_id'];
				$year =  $this->request->data['pucIndividualSms']['year']; 
				$section_id =  $this->request->data['pucIndividualSms']['section_id'];
				//$notification_type_id =  $this->request->data['Admin']['notification_type_id'];
				
				$course_id =  $this->request->data['pucIndividualSms']['puc_course_id'];
				$combination_id =  $this->request->data['PucStudentDetail']['puc_combination_id']; 
				
				if($section_id=='')
				{
					 
					$condition = array("conditions"=>array("PucStudentDetail.academic_year_id"=>$academic_year_id,
															"PucStudentDetail.year" =>$year  , 
															"PucStudentDetail.puc_course_id" =>$course_id,
															"PucStudentDetail.puc_combination_id" =>$combination_id)   , 
															"fields"=>array("PucStudentDetail.father_mobile_number","PucStudentDetail.student_name","PucStudentDetail.id"));
				} 
				else
				{ 
					$condition = array("conditions"=>array("PucStudentDetail.academic_year_id"=>$academic_year_id,
															"PucStudentDetail.year" =>$year  , 
															"PucStudentDetail.puc_course_id" =>$course_id   ,
															"PucStudentDetail.puc_combination_id" =>$combination_id,
															"PucStudentDetail.section_id"=> $section_id),
															"fields"=>array("PucStudentDetail.father_mobile_number"
															,"PucStudentDetail.student_name"
															,"PucStudentDetail.id"));
				} 
				$class_wise_list = $this->PucStudentDetail->find("all",$condition);   
				$this->set("class_wise_student_list",$class_wise_list); 
				
				 
			}
			
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
		
		public function pucIndividualSmsSend()
		{
			$this->_userSessionCheckout();
			$this->layout="ptes_admin"; 
			 
			if(!empty($this->request->data))
			{
				//print_r($this->request->data);
				$i=0;
				foreach($this->request->data['mobile_no'] as $mobile_no)
				{
					
					if($mobile_no>0)
					{
						$student_mob_id = explode(',',$mobile_no); 
						
						$username = 'usha.cs@sahyadri.edu.in';
						$hash = 'Aptra2017';
						
						// Message details
						//$numbers = array(919886610714);
						$sender = urlencode('MILPUC');
						$message = 'Milagres PU College'.' '.$this->request->data['notification_type_id'].': '.$this->request->data['message'].' Thank You.';
					 
						$numbers = "91".$mobile_no;
					 
						// Prepare data for POST request
						$data = array('username' => $username, 'hash' => $hash, 'numbers' => $numbers, "sender" => $sender, "message" => $message);
					 
						// Send the POST request with cURL
						$ch = curl_init('http://api.textlocal.in/send/');
						curl_setopt($ch, CURLOPT_POST, true);
						curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
						curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
						$response = curl_exec($ch);
						curl_close($ch); 
						 
						// Process your response here
						$sms_status=json_decode($response, true);
						
						//print_r($sms_status['status']);
						
						
						/*SMS**/
						$data_ind = array(
							"PucIndividualSms"=>array(
								"academic_year_id"=>$this->request->data['academic_year_id'],
								"year"=>$this->request->data['year'], 
								"puc_course_id"=> $this->request->data['course'],
								"puc_combination_id"=> $this->request->data['combination'],
								"section_id"=> $this->request->data['section_id'], 
								"notification_type_id"=>$this->request->data['notification_type_id'],
								"notification_to"=>$student_mob_id[0], 
								"message"=> $this->request->data['message'],
								"status"=> $sms_status['status'],
								"sent_date"=>date('Y-m-d'),
								"sent_time"=>date("h:i:s"),
								"puc_student_detail_id"=>$student_mob_id[1]
							)
					);
					$this->PucIndividualSms->saveAll($data_ind);
						
					}
					$i++;
				} 
				$this->Session->setFlash("<div class='alert alert-success fade in' style='height:50px'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>Individual SMS Sent Succesfully.</div>");
					//$this->redirect('/Sms/pucIndividualSms');
			}
			$this->redirect('pucIndividualSms'); 
		}
		/* Individual SMS  for PUC*/
		
		
		public function classwiseSms()
		{
			$this->_userSessionCheckout();
			$this->layout="ptes_admin";
			
			/* Notification Type Dropdown */
			$this->_SmsDropDown(); 
			
			// Process Data
			
			if(!empty($this->request->data))
			{
				if($this->request->data['section_id']=="")
				{
					
					$class_wise_list = $this->StudentDetail->find("all",array("conditions"=>array("academic_year_id"=>$this->request->data['academic_year_id'], "add_class_id" => $this->request->data['add_class_id']),"fields"=>array("father_mobile_number","StudentDetail.id")));
				}
				else
				{
					$class_wise_list = $this->StudentDetail->find("all",array("conditions"=>array("academic_year_id"=>$this->request->data['academic_year_id'], "add_class_id" => $this->request->data['add_class_id'],"section_id"=>$this->request->data['section_id']),"fields"=>array("father_mobile_number","StudentDetail.id")));
				
				}
				  
				// Message details
				//$message ='Vasavi Public School '.' '.$this->request->data['notification_type_id'].': '.$this->request->data['message'];
				$message = 'Vasavi Public School '.' '.$this->request->data['notification_type_id'].': '.$this->request->data['message'];
				$data_class = array(
							"SchoolClassWiseSms"=>array(
								"academic_year_id"=>$this->request->data['academic_year_id'], 
								"add_class_id"=> $this->request->data['add_class_id'], 
								"section_id"=> $this->request->data['section_id'],
								"notification_type_id"=>$this->request->data['notification_type_id'], 
								"message"=> $message,
								"sent_date"=>date('Y-m-d'),
								"sent_time"=>date("h:i:s"),
								"message_from"=> "HighSchool"								
								
							)
					);
					
					$this->SchoolClassWiseSms->saveAll($data_class);
					
					
				if(count($class_wise_list) > 0)
				{ 
					 
				foreach($class_wise_list as $student_mobile)
				{
					if($student_mobile['StudentDetail']['father_mobile_number']!='')
					{ 
					 	 
						/*SMS**/ 
				
						 $username = 'stepintechno@gmail.com';
					 $hash = 'Aarvi@stepin30';
						
						// Message details
						//$numbers = array(919886610714);
						$sender = urlencode('VASAVI');
						$message = $this->request->data['message'];
						
					 
						$numbers = "91".$student_mobile['StudentDetail']['father_mobile_number'];
					 
						// Prepare data for POST request
						$data = array('username' => $username, 'hash' => $hash, 'numbers' => $numbers, "sender" => $sender, "message" => $message);
					 
						// Send the POST request with cURL
						$ch = curl_init('http://api.textlocal.in/send/');
						curl_setopt($ch, CURLOPT_POST, true);
						curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
						curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
						$response = curl_exec($ch);
						curl_close($ch);
						
						// Process your response here
						echo $response; 
						
						// Process your response here
						$sms_status=json_decode($response, true);
						
						//print_r($sms_status['status']);
						  
						/*SMS**/
						
						
						$class_id = $this->SchoolClassWiseSms->id;
						if($class_id!='')
						{
							$data_class_details = array(          //unblock the comment to save the data
								"SchoolClassWiseSmsDetail"=>array(
									"school_class_wise_sms_id"=>$class_id,
									"notification_to"=>$numbers,
									"status"=>$sms_status['status'],
									"student_detail_id"=>$student_mobile['StudentDetail']['id']
								)
							);
							$this->SchoolClassWiseSmsDetail->saveAll($data_class_details);
						} 
					
					
						$quick_sms = $this->Session->setFlash("<div class='alert alert-success fade in' style='height:50px'>
							<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>SMS Details Sent Succefully.</div>");
						//$this->redirect('/Sms/classwiseSms');
					}
					  
				} 
					
				}
				else {
					$class_wise_sms = $this->Session->setFlash("<div class='alert alert-success fade in' style='height:50px'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>Mobile Number Not Found.</div>");
					//$this->redirect('/Sms/classwiseSms');
				}
			}
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
			
			/* Get Section Dropdown Select List */
			$section_list=$this->Section->find('all');
			$section_array = array();
			if(!empty($section_list))
			{
				foreach($section_list as $get_Section)
				{ 
					$section_array[$get_Section['Section']['id']] = $get_Section['Section']['section'];
				}
			}
			$this->set('listSection',$section_array);
			
			/* Get Class Dropdown Select List */
			$condition = array("order"=>array("class ASC"));
			$class_list=$this->AddClass->find('all',$condition);
			$class_array = array();
			if(!empty($class_list))
			{
				foreach($class_list as $class)
				{ 
					$class_array[$class['AddClass']['id']] = $class['AddClass']['class'];
				}
			}
			$this->set('classes',$class_array);
			
		}
		
		/* Individual SMS */
		public function individualSms()
		{
			$this->_userSessionCheckout();
			$this->layout="ptes_admin";
			
			/* Notification Type Dropdown */
			$this->_SmsDropDown(); 

			// Process Data
			
			if(!empty($this->request->data))
			{
				//print_r($this->request->data);
				$academic_year_id = $this->request->data('academic_year_id');
				$class_id = $this->request->data('add_class_id');
				$section_id = $this->request->data('section_id');
				
				if($this->request->data['section_id']=="")
				{
					
					$condition = array("conditions"=>array("StudentDetail.academic_year_id"=>$academic_year_id, 
										"add_class_id" => $this->request->data['add_class_id']),
										"fields"=>array("father_mobile_number","student_name","StudentDetail.id")); 
				}
				else
				{
					$condition =  array("conditions"=>array("StudentDetail.academic_year_id"=>$academic_year_id,
										"add_class_id" => $this->request->data['add_class_id'],
										"section_id"=>$this->request->data['section_id']),
										"fields"=>array("father_mobile_number","student_name","StudentDetail.id")); 
				}
				$class_wise_list = $this->StudentDetail->find("all",$condition);
				$this->set('ind_list',$class_wise_list);
				//print_r($ind_list); 
			}
			
			
				
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
			
			/* Get Section Dropdown Select List */
			$section_list=$this->Section->find('all');
			$section_array = array();
			if(!empty($section_list))
			{
				foreach($section_list as $get_Section)
				{ 
					$section_array[$get_Section['Section']['id']] = $get_Section['Section']['section'];
				}
			}
			$this->set('listSection',$section_array);
			
			/* Get Class Dropdown Select List */
			$condition = array("order"=>array("class ASC"));
			$class_list=$this->AddClass->find('all',$condition);
			$class_array = array();
			if(!empty($class_list))
			{
				foreach($class_list as $class)
				{ 
					$class_array[$class['AddClass']['id']] = $class['AddClass']['class'];
				}
			}
			$this->set('classes',$class_array);
		}
		/* End of Individual SMS */
		
		public function individualSmsSend(){
			
			$this->_userSessionCheckout();
			$this->layout="ptes_admin";
			configure::write('debug',0);
			
			// Process Data
			//print_r($this->request->data);
			if(!empty($this->request->data))
			{
				$i=0;
				foreach($this->request->data['mobile_no'] as $mobile_no)
				{
					
					if($mobile_no>0)
					{
						$student_mob_id = explode(',',$mobile_no); 
						
						 $username = 'stepintechno@gmail.com';
						$hash = 'Aarvi@stepin30';
						
						// Message details
						//$numbers = array(919886610714);
						$sender = urlencode('VASAVI');
						 
					    $message = 'Vasavi Public School '.' '.$this->request->data['notification_type_id'].': '.$this->request->data['message'];
						$numbers = "91".$mobile_no;
					 
						// Prepare data for POST request
						$data = array('username' => $username, 'hash' => $hash, 'numbers' => $numbers, "sender" => $sender, "message" => $message);
					 
						// Send the POST request with cURL
						$ch = curl_init('http://api.textlocal.in/send/');
						curl_setopt($ch, CURLOPT_POST, true);
						curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
						curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
						$response = curl_exec($ch);
						curl_close($ch);
						
						// Process your response here
						//echo $response; 
						
						// Process your response here
						$sms_status=json_decode($response, true);
						
						//print_r($sms_status['status']);
						
						
						/*SMS**/
						$data_ind = array(
							"SchoolIndividualSms"=>array(
								"academic_year_id"=>$this->request->data['academic_year_id'], 
								"add_class_id"=> $this->request->data['course'], 
								"section_id"=> $this->request->data['section_id'], 
								"notification_type_id"=>$this->request->data['notification_type_id'],
								"notification_to"=>$student_mob_id[0], 
								"message"=> $message,
								"status"=> $sms_status['status'],
								"date"=>date('Y-m-d'),
								"sent_time"=>date("h:i:s"),
								"student_detail_id"=>$student_mob_id[1],
								"message_from"=> "HighSchool"
							)
					); 
					$this->SchoolIndividualSms->saveAll($data_ind);
						
					}
					$i++;
				} 
				$this->Session->setFlash("<div class='alert alert-success fade in' style='height:50px'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>Individual SMS Sent Succesfully.</div>");
					$this->redirect('/Sms/IndividualSms');
			}
		}
		
		public function Quick_sms_report()
		{
			$this->_userSessionCheckout();
			$this->layout="ptes_admin";
		}
		public function Individual_sms_report()
		{
			$this->_userSessionCheckout();
			$this->layout="ptes_admin";
		}
		public function Bulk_sms_report()
		{
			$this->_userSessionCheckout();
			$this->layout="ptes_admin";
		}
		public function adminQuickSms($id=null)
		{
			
			configure::write(0);
			$this->_userSessionCheckout();
			$this->layout="ptes_admin";
			$this->_SmsDropDown(); 
			
			if(!empty($this->request->data))
			{
				$mobile_no_list = explode(',',$this->request->data['QuickSms']['send_to']); 

				foreach($mobile_no_list as $mbl_no)
				{
					
					$student_condition = array("conditions"=>array("DegreeStudentDetail.father_mobile_number"=>$mbl_no),"fields"=>array("id"));
					$contact_person = $this->DegreeStudentDetail->find("first",$student_condition);  
					$student_id = $contact_person['DegreeStudentDetail']['id'];
					if($student_id==''){$student_id = 0;}
						
					$mobile_no= "91".$mbl_no;
					$username = 'usha.cs@sahyadri.edu.in';
					$hash = 'Aptra2017';
					
					// Message details
					//$numbers = array(919886610714);
					$sender = urlencode('MILDEG');
					$message = 'Milagres Degree College'.' '.$this->request->data['QuickSms']['notification_type_id'].': '.$this->request->data['QuickSms']['message'].' Thank You.';
					//$message  = $this->request->data['QuickSms']['message'];
                                         $c_time = date('h:i:s');
				  
					$numbers = "91".$mbl_no;
				 
					// Prepare data for POST request
					$data = array('username' => $username, 'hash' => $hash, 'numbers' => $numbers, "sender" => $sender, "message" => $message);
				 
					// Send the POST request with cURL
					$ch = curl_init('http://api.textlocal.in/send/');
					curl_setopt($ch, CURLOPT_POST, true);
					curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
					$response = curl_exec($ch);
					curl_close($ch);
					
					// Process your response here
					$sms_status=json_decode($response, true);
					
					$data_quick = array(
							"QuickSms"=>array(
								"notification_type_id"=>$this->request->data['QuickSms']['notification_type_id'],
								"send_to"=>$numbers,
								"message_from"=> "Degree",
								"message"=> $message,
"sent_time"=>$c_time,
								"sent_date"=>date('Y-m-d'),
								
								"status"=> $sms_status['status'],
								"degree_student_detail_id"=>$student_id
							)
					);

					$this->QuickSms->saveAll($data_quick);
					
				}

				$quick_sms = $this->Session->setFlash("<div class='alert alert-success fade in' style='height:50px'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>SMS Sent Succefully.</div>");
					// $this->redirect('/Sms/degreeQuickSms');
								
			}
			else if(empty($this->request->data))
			{
				$this->request->data=$this->QuickSms->read(null,$id);
			}
			
			/* Display Quick SMS List*/
			$quick_sms_list=$this->QuickSms->find('all');
			$this->set("quick_sms_list",$quick_sms_list);  
		}

		/* Pre school Quick SMS Type */
		public function preSchoolQuickSms($id=null)
		{
			$this->_userSessionCheckout();
			$this->layout="ptes_admin";
			$this->_SmsDropDown(); 
			$current_date = date('y-m-d');
			
			if(!empty($this->request->data))
			{
				$mobile_no_list = explode(',',$this->request->data['QuickSms']['send_to']); 
				foreach($mobile_no_list as $mbl_no)
				{
					
					
					$student_condition = array("conditions"=>array("StudentDetail.father_mobile_number"=>$mbl_no),"fields"=>array("id"));
					$contact_person = $this->StudentDetail->find("first",$student_condition);
					//print_r($contact_person);
					$student_id = $contact_person['StudentDetail']['id'];
					if($student_id==''){$student_id = 0;}
					
					$mobile_no= "91".$mbl_no;
					$username = 'usha.cs@sahyadri.edu.in';
					$hash = 'Aptra2017';
					
					// Message details
					//$numbers = array(919886610714);
					$sender = urlencode('MILHGS');
					$message = 'Milagres Pre School'.' '.$this->request->data['QuickSms']['notification_type_id'].': '.$this->request->data['QuickSms']['message'].' Thank You.';
					//$message  = $this->request->data['QuickSms']['message'];
				  
					$numbers = "91".$mbl_no;
				 
					// Prepare data for POST request
					$data = array('username' => $username, 'hash' => $hash, 'numbers' => $numbers, "sender" => $sender, "message" => $message);
				 
					// Send the POST request with cURL
					$ch = curl_init('http://api.textlocal.in/send/');
					curl_setopt($ch, CURLOPT_POST, true);
					curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
					$response = curl_exec($ch);
					curl_close($ch);
					
					//print_r($response);
					// Process your response here
					$sms_status=json_decode($response, true);
					
					$data_quick = array(
							"SchoolQuickSms"=>array(
								"notification_type_id"=>$this->request->data['QuickSms']['notification_type_id'],
								"send_to"=>$numbers,
								"message_from"=> "PreSchool",
								"message"=> $message,
								"sent_date"=>date('Y-m-d'),
								"sent_time"=>date("h:i:s"),
								"status"=> $sms_status['status'],
								"student_detail_id"=>$student_id
							)
					);
					//print_r($data_quick);
					$this->SchoolQuickSms->saveAll($data_quick);
				}
				$quick_sms = $this->Session->setFlash("<div class='alert alert-success fade in' style='height:50px'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>Quick SMS Details Sent Succefully.</div>");
					$this->redirect('/Sms/preSchoolQuickSms');
			}
			 
			
			 
			 
		}
		/* Pre school Quick SMS Type */
		
		/* Pre school Class wise SMS Type */
		public function preSchoolClasswiseSms()
		{
			$this->_userSessionCheckout();
			$this->layout="ptes_admin";
			
			/* Notification Type Dropdown */
			$this->_SmsDropDown(); 
			
			// Process Data
			
			if(!empty($this->request->data))
			{
				if($this->request->data['section_id']=="")
				{
					
					$class_wise_list = $this->StudentDetail->find("all",array("conditions"=>array("academic_year_id"=>$this->request->data['academic_year_id'], "add_class_id" => $this->request->data['add_class_id']),"fields"=>array("father_mobile_number","StudentDetail.id")));
				}
				else
				{
					$class_wise_list = $this->StudentDetail->find("all",array("conditions"=>array("academic_year_id"=>$this->request->data['academic_year_id'], "add_class_id" => $this->request->data['add_class_id'],"section_id"=>$this->request->data['section_id']),"fields"=>array("father_mobile_number","StudentDetail.id")));
				
				}
				  $message = 'Milagres Pre School'.' '.$this->request->data['notification_type_id'].': '.$this->request->data['message'].' Thank You.';
				 
				  
				  $data_class = array(
							"SchoolClassWiseSms"=>array(
								"academic_year_id"=>$this->request->data['academic_year_id'], 
								"add_class_id"=> $this->request->data['add_class_id'], 
								"section_id"=> $this->request->data['section_id'],
								"notification_type_id"=>$this->request->data['notification_type_id'], 
								"message"=> $message,
								"sent_date"=>date('Y-m-d'),
								"sent_time"=>date("h:i:s"),
								"message_from"=>"PreSchool"														
							)
					);
						$this->SchoolClassWiseSms->saveAll($data_class);
				  
				// Message details
			 
				if(count($class_wise_list) > 0)
				{ 
					 
				foreach($class_wise_list as $student_mobile)
				{
					if($student_mobile['StudentDetail']['father_mobile_number']!='')
					{ 
					 	 
						/*SMS**/ 
				
						$username = 'usha.cs@sahyadri.edu.in';
						$hash = 'Aptra2017';
						
						// Message details
						//$numbers = array(919886610714);
						$sender = urlencode('MILHGS');
						$message = $this->request->data['message'];
						//$message = 'Milagres Pre School'.' '.$this->request->data['notification_type_id'].': '.$this->request->data['message'].' Thank You.';
					 
						$numbers = "91".$student_mobile['StudentDetail']['father_mobile_number'];
					 
						// Prepare data for POST request
						$data = array('username' => $username, 'hash' => $hash, 'numbers' => $numbers, "sender" => $sender, "message" => $message);
					 
						// Send the POST request with cURL
						$ch = curl_init('http://api.textlocal.in/send/');
						curl_setopt($ch, CURLOPT_POST, true);
						curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
						curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
						$response = curl_exec($ch);
						curl_close($ch);
						
						// Process your response here
						//echo $response; 
						
						// Process your response here
						$sms_status=json_decode($response, true);
						
						//print_r($sms_status['status']);
						  
						/*SMS**/
						
						$class_id = $this->SchoolClassWiseSms->id;    //unblock to save the data into class wise details table
						if($class_id!='')
						{
							$data_class_details = array(
								"SchoolClassWiseSmsDetail"=>array(
									"school_class_wise_sms_id"=>$class_id,
									"notification_to"=>$numbers,
									"status"=>$sms_status['status'],
									"student_detail_id"=>$student_mobile['StudentDetail']['id']
								)
							);
							$this->SchoolClassWiseSmsDetail->saveAll($data_class_details);
						} 
					
					
						$quick_sms = $this->Session->setFlash("<div class='alert alert-success fade in' style='height:50px'>
							<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>SMS Details Sent Succefully.</div>");
						//$this->redirect('/Sms/classwiseSms');
					}
					  
				} 
					
				}
				else {
					$class_wise_sms = $this->Session->setFlash("<div class='alert alert-success fade in' style='height:50px'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>Mobile Number Not Found.</div>");
					//$this->redirect('/Sms/classwiseSms');
				}
			}
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
			
			/* Get Section Dropdown Select List */
			$section_list=$this->Section->find('all');
			$section_array = array();
			if(!empty($section_list))
			{
				foreach($section_list as $get_Section)
				{ 
					$section_array[$get_Section['Section']['id']] = $get_Section['Section']['section'];
				}
			}
			$this->set('listSection',$section_array);
			
			/* Get Class Dropdown Select List */
			$condition = array('conditions'=>array('AddClass.class'=>array('PreNursery','LKG','UKG')));
			$class_list=$this->AddClass->find('all',$condition); 
			$class_array = array();
			if(!empty($class_list))
			{
				foreach($class_list as $class)
				{ 
					$class_array[$class['AddClass']['id']] = $class['AddClass']['class'];
				}
			}
			$this->set('classes',$class_array); 
		} 
		/* Pre school Class wise SMS Type */
		
		/* Pre-school Individual SMS */
		public function preSchoolIndividualSms()
		{
			$this->_userSessionCheckout();
			$this->layout="ptes_admin";
			
			/* Notification Type Dropdown */
			$this->_SmsDropDown(); 

			// Process Data
			
			if(!empty($this->request->data))
			{
				//print_r($this->request->data);
				$academic_year_id = $this->request->data('academic_year_id');
				$class_id = $this->request->data('add_class_id');
				$section_id = $this->request->data('section_id');
				
				if($this->request->data['section_id']=="")
				{
					
					$condition = array("conditions"=>array("academic_year_id"=>$this->request->data['academic_year_id'], 
										"add_class_id" => $this->request->data['add_class_id']),
										"fields"=>array("father_mobile_number","student_name","StudentDetail.id")); 
				}
				else
				{
					$condition =  array("conditions"=>array("academic_year_id"=>$this->request->data['academic_year_id'],
										"add_class_id" => $this->request->data['add_class_id'],
										"section_id"=>$this->request->data['section_id']),
										"fields"=>array("father_mobile_number","student_name","StudentDetail.id")); 
				}
				$class_wise_list = $this->StudentDetail->find("all",$condition);
				$this->set('ind_list',$class_wise_list);
				//print_r($ind_list); 
			}
			
			
				
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
			
			/* Get Section Dropdown Select List */
			$section_list=$this->Section->find('all');
			$section_array = array();
			if(!empty($section_list))
			{
				foreach($section_list as $get_Section)
				{ 
					$section_array[$get_Section['Section']['id']] = $get_Section['Section']['section'];
				}
			}
			$this->set('listSection',$section_array);
			
			/* Get Class Dropdown Select List */
			$condition = array('conditions'=>array('AddClass.class'=>array('PreNursery','LKG','UKG')));
			$class_list=$this->AddClass->find('all',$condition);
			$class_array = array();
			if(!empty($class_list))
			{
				foreach($class_list as $class)
				{ 
					$class_array[$class['AddClass']['id']] = $class['AddClass']['class'];
				}
			}
			$this->set('classes',$class_array);
		}
		/* End of Individual SMS */
		
		public function preSchoolIndividualSmsSend(){
			
			$this->_userSessionCheckout();
			$this->layout="ptes_admin";
			
			// Process Data
			if(!empty($this->request->data))
			{
				$i=0;
				foreach($this->request->data['mobile_no'] as $mobile_no)
				{
					
					if($mobile_no>0)
					{
						$student_mob_id = explode(',',$mobile_no); 
						
						$username = 'usha.cs@sahyadri.edu.in';
						$hash = 'Aptra2017';
						
						// Message details
						//$numbers = array(919886610714);
						$sender = urlencode('MILHGS');
						 
					    $message = 'Milagres Pre School'.' '.$this->request->data['notification_type_id'].': '.$this->request->data['message'].' Thank You.';
						$numbers = "91".$mobile_no;
					 
						// Prepare data for POST request
						$data = array('username' => $username, 'hash' => $hash, 'numbers' => $numbers, "sender" => $sender, "message" => $message);
					 
						// Send the POST request with cURL
						$ch = curl_init('http://api.textlocal.in/send/');
						curl_setopt($ch, CURLOPT_POST, true);
						curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
						curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
						$response = curl_exec($ch);
						curl_close($ch);
						
						// Process your response here
						//echo $response; 
						
						// Process your response here
						$sms_status=json_decode($response, true);
						
						//print_r($sms_status['status']);
						
						
						/*SMS**/
						$data_ind = array(
							"SchoolIndividualSms"=>array(
								"academic_year_id"=>$this->request->data['academic_year_id'], 
								"add_class_id"=> $this->request->data['course'], 
								"section_id"=> $this->request->data['section_id'], 
								"notification_type_id"=>$this->request->data['notification_type_id'],
								"notification_to"=>$student_mob_id[0], 
								"message"=> $message,
								"status"=> $sms_status['status'],
								"date"=>date('Y-m-d'),
								"sent_time"=>date("h:i:s"),
								"student_detail_id"=>$student_mob_id[1],
								"message_from"=>"PreSchool"
							)
					);
					//print_r($data_ind );
					$this->SchoolIndividualSms->saveAll($data_ind);
						
					}
					$i++;
				} 
				$this->Session->setFlash("<div class='alert alert-success fade in' style='height:50px'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>Individual SMS Sent Succesfully.</div>");
					$this->redirect('/Sms/preSchoolIndividualSms');
			}
		}
		
		/* Primary school Quick SMS Type */
		public function primarySchoolQuickSms($id=null)
		{
		        configure::write('debug',2);
			$this->_userSessionCheckout();
			$this->layout="ptes_admin";
			$this->_SmsDropDown(); 
			$current_date = date('y-m-d');
			
			if(!empty($this->request->data))
			{
				$mobile_no_list = explode(',',$this->request->data['QuickSms']['send_to']); 
				foreach($mobile_no_list as $mbl_no)
				{
					
					
					$student_condition = array("conditions"=>array("StudentDetail.father_mobile_number"=>$mbl_no),"fields"=>array("id"));
					$contact_person = $this->StudentDetail->find("first",$student_condition);
					//print_r($contact_person);
					$student_id = $contact_person['StudentDetail']['id'];
					if($student_id==''){$student_id = 0;}
					
					$mobile_no= "91".$mbl_no;
					$username = 'usha.cs@sahyadri.edu.in';
					$hash = 'Aptra2017';
					
					// Message details
					//$numbers = array(919886610714);
					$sender = urlencode('MILHGS');
					$message = 'Milagres Primary School'.' '.$this->request->data['QuickSms']['notification_type_id'].': '.$this->request->data['QuickSms']['message'].' Thank You.';
					//$message  = $this->request->data['QuickSms']['message'];
				  
					$numbers = "91".$mbl_no;
				 
					// Prepare data for POST request
					$data = array('username' => $username, 'hash' => $hash, 'numbers' => $numbers, "sender" => $sender, "message" => $message);
				 
					// Send the POST request with cURL
					$ch = curl_init('http://api.textlocal.in/send/');
					curl_setopt($ch, CURLOPT_POST, true);
					curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
					$response = curl_exec($ch);
					curl_close($ch);
					
					//print_r($response);
					// Process your response here
					$sms_status=json_decode($response, true);
					
					$data_quick = array(
							"SchoolQuickSms"=>array(
								"notification_type_id"=>$this->request->data['QuickSms']['notification_type_id'],
								"send_to"=>$numbers,
								"message_from"=> "PrimarySchool",
								"message"=> $message,
								"sent_date"=>date('Y-m-d'),
								"sent_time"=>date("h:i:s"),
								"status"=> $sms_status['status'],
								"student_detail_id"=>$student_id
							)
					);
					 
					$this->SchoolQuickSms->saveAll($data_quick);
				}
				$quick_sms = $this->Session->setFlash("<div class='alert alert-success fade in' style='height:50px'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>Quick SMS Details Sent Succefully.</div>");
					$this->redirect('/Sms/primarySchoolQuickSms');
			}
			//else if(empty($this->request->data))
			//{
				//$this->request->data=$this->SchoolQuickSms->read(null,$id);
			//}
			
			/* Display Quick SMS List*/
			//$quick_sms_list=$this->SchoolQuickSms->find('all');
			//$this->set("quick_sms_list",$quick_sms_list);  
		}
		/* Primary school Quick SMS Type */
		
		/* Pre school Class wise SMS Type */
		public function primarySchoolClasswiseSms()
		{
			$this->_userSessionCheckout();
			$this->layout="ptes_admin";
			
			/* Notification Type Dropdown */
			$this->_SmsDropDown(); 
			
			// Process Data
			
			if(!empty($this->request->data))
			{
				if($this->request->data['section_id']=="")
				{
					
					$class_wise_list = $this->StudentDetail->find("all",array("conditions"=>array("academic_year_id"=>$this->request->data['academic_year_id'], "add_class_id" => $this->request->data['add_class_id']),"fields"=>array("father_mobile_number","StudentDetail.id")));
				}
				else
				{
					$class_wise_list = $this->StudentDetail->find("all",array("conditions"=>array("academic_year_id"=>$this->request->data['academic_year_id'], "add_class_id" => $this->request->data['add_class_id'],"section_id"=>$this->request->data['section_id']),"fields"=>array("father_mobile_number","StudentDetail.id")));
				
				}
				  
				// Message details
					$message = 'Milagres Primary School'.' '.$this->request->data['notification_type_id'].': '.$this->request->data['message'].' Thank You.';
					
					$data_class = array(
								"SchoolClassWiseSms"=>array(
									"academic_year_id"=>$this->request->data['academic_year_id'], 
									"add_class_id"=> $this->request->data['add_class_id'], 
									"section_id"=> $this->request->data['section_id'],
									"notification_type_id"=>$this->request->data['notification_type_id'], 
									"message"=> $message,
									"sent_date"=>date('Y-m-d'),
									"sent_time"=>date("h:i:s"),
									"message_from"=>"PrimarySchool" 									
								)
							);
							$this->SchoolClassWiseSms->saveAll($data_class);
						
						
				if(count($class_wise_list) > 0)
				{ 
					 
					foreach($class_wise_list as $student_mobile)
					{
						if($student_mobile['StudentDetail']['father_mobile_number']!='')
						{ 
							 
							/*SMS**/ 
					
							$username = 'usha.cs@sahyadri.edu.in';
							$hash = 'Aptra2017';
							
							// Message details
							//$numbers = array(919886610714);
							$sender = urlencode('MILHGS');
							$message = $this->request->data['message'];
							
						 
							$numbers = "91".$student_mobile['StudentDetail']['father_mobile_number'];
						 
							// Prepare data for POST request
							$data = array('username' => $username, 'hash' => $hash, 'numbers' => $numbers, "sender" => $sender, "message" => $message);
						 
							// Send the POST request with cURL
							$ch = curl_init('http://api.textlocal.in/send/');
							curl_setopt($ch, CURLOPT_POST, true);
							curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
							curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
							$response = curl_exec($ch);
							curl_close($ch);
							
							// Process your response here
							//echo $response; 
							
							// Process your response here
							$sms_status=json_decode($response, true);
							
							//print_r($sms_status['status']);
							  
							/*SMS**/
							
							$class_id = $this->SchoolClassWiseSms->id;
							if($class_id!='')
							{
								$data_class_details = array(
									"SchoolClassWiseSmsDetail"=>array(
										"school_class_wise_sms_id"=>$class_id,
										"notification_to"=>$numbers,
										"status"=>$sms_status['status'],
										"student_detail_id"=>$student_mobile['StudentDetail']['id']
									)
								);
								$this->SchoolClassWiseSmsDetail->saveAll($data_class_details);
							} 
						
						
							$quick_sms = $this->Session->setFlash("<div class='alert alert-success fade in' style='height:50px'>
								<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>SMS Details Sent Succefully.</div>");
							//$this->redirect('/Sms/classwiseSms');
						}
						  
					} 
					
				}
				else {
					$class_wise_sms = $this->Session->setFlash("<div class='alert alert-success fade in' style='height:50px'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>Mobile Number Not Found.</div>");
					//$this->redirect('/Sms/classwiseSms');
				}
			}
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
			
			/* Get Section Dropdown Select List */
			$section_list=$this->Section->find('all');
			$section_array = array();
			if(!empty($section_list))
			{
				foreach($section_list as $get_Section)
				{ 
					$section_array[$get_Section['Section']['id']] = $get_Section['Section']['section'];
				}
			}
			$this->set('listSection',$section_array);
			
			/* Get Class Dropdown Select List */
			$condition = array('conditions'=>array('AddClass.class'=>array('01','02','03','04','05','06','07')),"order"=>array("class ASC"));
			$class_list=$this->AddClass->find('all',$condition); 
			$class_array = array();
			if(!empty($class_list))
			{
				foreach($class_list as $class)
				{ 
					$class_array[$class['AddClass']['id']] = $class['AddClass']['class'];
				}
			}
			$this->set('classes',$class_array); 
		} 
		/* Pre school Class wise SMS Type */
		
		/* Primary-school Individual SMS */
		public function primarySchoolIndividualSms()
		{
			$this->_userSessionCheckout();
			$this->layout="ptes_admin";
			
			/* Notification Type Dropdown */
			$this->_SmsDropDown(); 

			// Process Data
			
			if(!empty($this->request->data))
			{
				//print_r($this->request->data);
				$academic_year_id = $this->request->data('academic_year_id');
				$class_id = $this->request->data('add_class_id');
				$section_id = $this->request->data('section_id');
				
				if($this->request->data['section_id']=="")
				{
					
					$condition = array("conditions"=>array("academic_year_id"=>$this->request->data['academic_year_id'], 
										"add_class_id" => $this->request->data['add_class_id']),
										"fields"=>array("father_mobile_number","student_name","StudentDetail.id")); 
				}
				else
				{
					$condition =  array("conditions"=>array("academic_year_id"=>$this->request->data['academic_year_id'],
										"add_class_id" => $this->request->data['add_class_id'],
										"section_id"=>$this->request->data['section_id']),
										"fields"=>array("father_mobile_number","student_name","StudentDetail.id")); 
				}
				$class_wise_list = $this->StudentDetail->find("all",$condition);
				$this->set('ind_list',$class_wise_list);
				//print_r($ind_list); 
			}
			
			
				
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
			
			/* Get Section Dropdown Select List */
			$section_list=$this->Section->find('all');
			$section_array = array();
			if(!empty($section_list))
			{
				foreach($section_list as $get_Section)
				{ 
					$section_array[$get_Section['Section']['id']] = $get_Section['Section']['section'];
				}
			}
			$this->set('listSection',$section_array);
			
			/* Get Class Dropdown Select List */
			$condition = array('conditions'=>array('AddClass.class'=>array('01','02','03','04','05','06','07')),"order"=>array("class ASC"));
			 
			$class_list=$this->AddClass->find('all',$condition);
			$class_array = array();
			if(!empty($class_list))
			{
				foreach($class_list as $class)
				{ 
					$class_array[$class['AddClass']['id']] = $class['AddClass']['class'];
				}
			}
			$this->set('classes',$class_array);
		}
		/* End of Individual SMS */
		
		public function primarySchoolIndividualSmsSend(){
			
			$this->_userSessionCheckout();
			$this->layout="ptes_admin";
			
			// Process Data
			if(!empty($this->request->data))
			{
				$i=0;
				foreach($this->request->data['mobile_no'] as $mobile_no)
				{
					
					if($mobile_no>0)
					{
						$student_mob_id = explode(',',$mobile_no); 
						
						$username = 'usha.cs@sahyadri.edu.in';
						$hash = 'Aptra2017';
						
						// Message details
						//$numbers = array(919886610714);
						$sender = urlencode('MILHGS');
						 
					    $message = 'Milagres Primary School'.' '.$this->request->data['notification_type_id'].': '.$this->request->data['message'].' Thank You.';
						$numbers = "91".$mobile_no;
					 
						// Prepare data for POST request
						$data = array('username' => $username, 'hash' => $hash, 'numbers' => $numbers, "sender" => $sender, "message" => $message);
					 
						// Send the POST request with cURL
						$ch = curl_init('http://api.textlocal.in/send/');
						curl_setopt($ch, CURLOPT_POST, true);
						curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
						curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
						$response = curl_exec($ch);
						curl_close($ch);
						
						// Process your response here
						//echo $response; 
						
						// Process your response here
						$sms_status=json_decode($response, true);
						
						//print_r($sms_status['status']);
						
						
						/*SMS**/
						$data_ind = array(
							"SchoolIndividualSms"=>array(
								"academic_year_id"=>$this->request->data['academic_year_id'], 
								"add_class_id"=> $this->request->data['course'], 
								"section_id"=> $this->request->data['section_id'], 
								"notification_type_id"=>$this->request->data['notification_type_id'],
								"notification_to"=>$student_mob_id[0], 
								"message"=> $message,
								"status"=> $sms_status['status'],
								"date"=>date('Y-m-d'),
								"sent_time"=>date("h:i:s"),
								"student_detail_id"=>$student_mob_id[1],
								"message_from"=>"PrimarySchool"
							)
					);
					//print_r($data_ind );
					$this->SchoolIndividualSms->saveAll($data_ind);
						
					}
					$i++;
				} 
				$this->Session->setFlash("<div class='alert alert-success fade in' style='height:50px'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>Individual SMS Sent Succesfully.</div>");
					$this->redirect('/Sms/primarySchoolIndividualSms');
			}
		}
		/* Primary-school Individual SMS */

/*Faculty Quick SMS*/
		
		public function facultyIndividualSms()
		{
			$this->_userSessionCheckout();
			$this->layout="ptes_admin";
			configure::write('debug',2);
			/* Notification Type Dropdown */
			$this->_SmsDropDown(); 
			
			$condition= array("fields"=>array("StaffDetail.id","mobile","first_name"));
			$faculty_list = $this->StaffDetail->find("all",$condition);
			/*if(!empty($this->request->data))
			{
				$faculty=$this->request->data['faculty'];
				//$mobile=$this->request->data['Facultie']['mobile'];
				if($this->request->data['faculty']=="Teaching")
				{
					$condition= array("conditions"=>array("faculty_type"=>$faculty),"fields"=>array("mobile","Facultie.id","faculty_name"));
					$faculty_list = $this->Facultie->find("all",$condition);
					
				}
				if($this->request->data['faculty']=="NonTeaching")
				{
					$condition = array("conditions"=>array("faculty_type"=>$faculty),"fields"=>array("mobile","Facultie.id","faculty_name"));
					$faculty_list = $this->Facultie->find("all",$condition);								
				}
				if($this->request->data['faculty']=="All")
				{
					$condition = array("fields"=>array("mobile","Facultie.id","faculty_name"));
					$faculty_list = $this->Facultie->find("all",$condition);
				}	
				*/
				$this->set("faculty_list",$faculty_list);
				//print_r($faculty_list);			
				
			//}			
		}
		
		public function facultyIndividualSmsSend()
		{
			
			$this->_userSessionCheckout();
			$this->layout="ptes_admin";
			
			// Process Data
			//print_r($this->request->data);
			if(!empty($this->request->data))
			{
				$i=0;				
				foreach($this->request->data['mobile_no'] as $mobile_no)
				{
					
					if($mobile_no>0)
					{
						$student_mob_id = explode(',',$mobile_no); 
						
						$username = 'stepintechno@gmail.com';
					 $hash = 'Aarvi@stepin30';
						
						// Message details
						//$numbers = array(919886610714);
						$sender = urlencode('VASAVI');
						 
					    //$message = 'Milagres Primary School'.' '.$this->request->data['notification_type_id'].': '.$this->request->data['message'].' Thank You.';
						$message = 'Vasavi Public School '.' '.$this->request->data['notification_type_id'].': '.$this->request->data['message'];
						$numbers = "91".$mobile_no;
					 
						// Prepare data for POST request
						$data = array('username' => $username, 'hash' => $hash, 'numbers' => $numbers, "sender" => $sender, "message" => $message);
					 
						// Send the POST request with cURL
						$ch = curl_init('http://api.textlocal.in/send/');
						curl_setopt($ch, CURLOPT_POST, true);
						curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
						curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
						$response = curl_exec($ch);
						curl_close($ch);
						
						// Process your response here
						//echo $response; 
						
						// Process your response here
						$sms_status=json_decode($response, true);
						
						//print_r($sms_status['status']);
						
						
						/*SMS**/
						$data_ind = array(
							"FacultyIndividualSms"=>array(								
								"notification_type_id"=>$this->request->data['notification_type_id'],
								"mobile"=>$student_mob_id[0], 
								"message"=> $message,
								"status"=> $sms_status['status'],
								"sent_date"=>date('Y-m-d'),
								"sent_time"=>date("h:i:s"),
								"facultie_id"=>$student_mob_id[1]								
							)
					);
					$this->FacultyIndividualSms->saveAll($data_ind);
						
					}
					$i++;
				} 
				$this->Session->setFlash("<div class='alert alert-success fade in' style='height:50px'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>Individual SMS Sent Succesfully.</div>");
					$this->redirect('/Sms/facultyIndividualSms');
			}
		}

/***************************************
		Faculty  SMS Written by : Ajith 21-6-17
		****************************************/
		public function facultySms($id=null)
		{
			$this->_userSessionCheckout();
			$this->layout="ptes_admin";
			
			/* Notification Type Dropdown */
			$this->_SmsDropDown(); 
			
			// Process Data 
			if(!empty($this->request->data))
			{
				$notification_type =  $this->request->data['Facultie']['notification_type_id'];
				$faculty =  $this->request->data['Facultie']['faculty'];
				
				if($this->request->data['Facultie']['faculty']=="Teaching")
				{
					$condition= array("conditions"=>array("faculty_type"=>$faculty),"fields"=>array("mobile","Facultie.id"));
					$faculty_list = $this->Facultie->find("all",$condition);
					
				}
				if($this->request->data['Facultie']['faculty']=="NonTeaching")
				{
					$condition = array("conditions"=>array("faculty_type"=>$faculty),"fields"=>array("mobile","Facultie.id"));
					$faculty_list = $this->Facultie->find("all",$condition);								
				}
				if($this->request->data['Facultie']['faculty']=="All")
				{
					$condition = array("fields"=>array("mobile","Facultie.id"));
					$faculty_list = $this->Facultie->find("all",$condition);
				}
				  
				
				// Message details 
				if(count($faculty_list) > 0)
				{ 
					foreach($faculty_list as $mobile)
					{
						if($mobile['Facultie']['mobile']!='')
						{ 
							 
							/*SMS**/ 
					
							$username = 'usha.cs@sahyadri.edu.in';
							$hash = 'Aptra2017';
							
							// Message details
							//$numbers = array(919886610714);
							$sender = urlencode('MILHGS');
							$message = $this->request->data['Facultie']['message'];
							//$message = 'Milagres Faculty'.' '.$this->request->data['Facultie']['notification_type_id'].': '.$this->request->data['Facultie']['message'].' Thank You.';
						    $message = 'Milagres Educational Institution'.' '.$this->request->data['Facultie']['notification_type_id'].': '.$this->request->data['Facultie']['message'].' Thank You.';
						 
							$numbers = "91".$mobile['Facultie']['mobile'];
						 
							// Prepare data for POST request
							$data = array('username' => $username, 'hash' => $hash, 'numbers' => $numbers, "sender" => $sender, "message" => $message);
						 
							// Send the POST request with cURL
							$ch = curl_init('http://api.textlocal.in/send/');
							curl_setopt($ch, CURLOPT_POST, true);
							curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
							curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
							$response = curl_exec($ch);
							curl_close($ch);
							
							// Process your response here
							//echo $response; 
							
							// Process your response here
							$sms_status=json_decode($response, true);
							
							//print_r($sms_status['status']);
							  
							/*SMS**/
							$data_class = array(
								"FacultySms"=>array(
									"faculty_type"=>$this->request->data['Facultie']['faculty'],
									"notification_type_id"=>$this->request->data['Facultie']['notification_type_id'], 
									"message"=> $message,
									"sent_date"=>date('Y-m-d'),
									"sent_time"=>date("h:i:s"),
									"message_from"=>$numbers,
									"status"=>$sms_status['status']
									
								)
							);
							$this->FacultySms->saveAll($data_class);
							/* $class_id = $this->FacultySms->id;
							if($class_id!='')
							{
								$data_class_details = array(
									"SchoolClassWiseSmsDetail"=>array(
										"school_class_wise_sms_id"=>$class_id,
										"notification_to"=>$numbers,
										"status"=>$sms_status['status'],
										"student_detail_id"=>$student_mobile['StudentDetail']['id']
									)
								);
								$this->SchoolClassWiseSmsDetail->saveAll($data_class_details);
							}  */
						
						
							$quick_sms = $this->Session->setFlash("<div class='alert alert-success fade in' style='height:50px'>
								<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>SMS Details Sent Succefully.</div>");
							//$this->redirect('/Sms/classwiseSms');
						}
					  
					}  
				}
				else {
					$class_wise_sms = $this->Session->setFlash("<div class='alert alert-success fade in' style='height:50px'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>Mobile Number Not Found.</div>");
					//$this->redirect('/Sms/classwiseSms');
				} 
			}
		}
		

		
		
}
