<?php 
 
class StudentController extends AppController {

 
	public $uses = array('LanguageAllocation','LanguageAllocationDetail','Taluk','District','State','Admin','CoCurricular','ApplicationFee','ActivitieSetting','StudentApplication','StudentDetail','AddClass','AcademicYear','BloodGroup','Caste','Language','MotherTongue','Religion',
	'Section','SubCaste','ParentDetail','PreviousSchoolDetail');
	public $helpers = array('Html', 'Form', 'Js','Session');

  
/*-------------------------Student : Application Form Format 22 Aug 2016-------------------*/
	public function applicationForm($id=null)
	{
		$this->_userSessionCheckout();
		$this->layout="ajax";
	
		$condition=array('conditions'=>array('StudentApplication.application_no'=>$id));
		$get=$this->StudentApplication->find('all',$condition);
		$this->set('detail',$get);
	}
/*-------------------------------------------------------------------------------------------*/
		
/*----------------Student : Student Admission(Application Number)----------------------------*/
	public function studentAdmission()
	{
		$this->_userSessionCheckout();
		$this->layout="ptes_admin";
		
		if(!empty($this->request->data))   
		{
			$application_number=$this->request->data['StudentApplication']['application_no'];
			$get=$this->StudentApplication->find('all',array('conditions'=>array('StudentApplication.application_no'=>$application_number)));
			$get_student=$this->StudentDetail->find('all',array('conditions'=>array('StudentApplication.application_no'=>$application_number)));

			if(!empty($get_student))
			{
				$this->Session->setFlash("<div class='alert alert-danger fade in' style='height:50px'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>Student By This Application Number Already Registered.</a></div>");
				$this->redirect('/Student/studentAdmission');
			}
			if(!empty($get))
			{
				$this->Session->write('applicationId',$get[0]['StudentApplication']['id']);
				$this->Session->write('name',$get[0]['StudentApplication']['student_name']);
				$this->Session->write('application_number',$get[0]['StudentApplication']['application_no']);
				$this->redirect('/Student/studentDetail');
			}
			else
			{
				$this->Session->setFlash("<div class='alert alert-danger fade in' style='height:50px'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>
				Incorrect Application number  or Application number not exists</div>");
				$this->redirect('/Student/studentAdmission');
			}
		}
	}
/*---------------------------------------------------------------------------------------------*/
		
/*--------------------------------Student : Student Detail Entry------------------------------*/
	 
		  
	public function studentDetail($id=null)
	{
		$this->_userSessionCheckout();
		$this->layout="ptes_admin";

		$this->_selectDropDown();

		if(!empty($this->request->data))
		{
			$this->request->data['StudentDetail']['student_name']=ucfirst($this->request->data['StudentDetail']['student_name']);
			$this->request->data['StudentDetail']['date_of_admision']=$this->request->data['StudentDetail']['date_of_admision'];

			$dob = $this->request->data['StudentDetail']['dob'];
			$DOB = new DateTime($dob);
			$this->request->data['StudentDetail']['dob'] = $DOB->format('Y-m-d');

			$date_of_admision = $this->request->data['StudentDetail']['date_of_admision'];
			$admision_date = new DateTime($date_of_admision);
			$this->request->data['StudentDetail']['date_of_admision'] = $admision_date->format('Y-m-d');

			if(empty($this->request->data['StudentDetail']['student_code']) && empty($this->request->data['StudentDetail']['admission_number']))
			{

				/*Generate Student Code and Admission number*/
				if($this->request->data['StudentDetail']['gender']=='Male')
				$gender=str_pad(1,2,0,STR_PAD_LEFT);
				else
				$gender=str_pad(2,2,0,STR_PAD_LEFT);

				$get_class_value=$this->AddClass->find('all',array('conditions'=>array('AddClass.id'=>$this->request->data['StudentDetail']['add_class_id'])));
				$year_values=$this->AcademicYear->find('all',array('conditions'=>array('AcademicYear.id'=>$this->request->data['StudentDetail']['academic_year_id'])));
				$class_val=$get_class_value[0]['AddClass']['class'];
				$get_year_value=$year_values[0]['AcademicYear']['academic_year'];
				$this->request->data['StudentDetail']['joined_academic_year'] = $get_year_value;

				$count_student=$this->StudentDetail->find('count',array('conditions'=>array('StudentDetail.academic_year_id'=>$this->request->data['StudentDetail']['academic_year_id'])));
				if(!$id)
				{
					$serial_number=str_pad($count_student+1, 3, '0', STR_PAD_LEFT);
					$y1=substr($get_year_value,2,2);
					$y2=substr($get_year_value,5,2);
					$studentcode=$y1.$y2.$class_val.$gender.$serial_number;
					$admission_number='AD'.$y1.$serial_number;
				}
				else
				{
					$serial_number=str_pad($count_student, 3, '0', STR_PAD_LEFT);
					$studentcode=$y1.$y2.$class_val.$gender.$serial_number;
					$admission_number='AD'.$y1.$serial_number;
				}
			/*-----------------*/

				$this->request->data['StudentDetail']['student_code']=$studentcode;
				$this->request->data['StudentDetail']['admission_number']=$admission_number;
			}
			else
			{
				/*Generate Student Code and Admission number*/
				if($this->request->data['StudentDetail']['gender']=='Male')
				$gender=str_pad(1,2,0,STR_PAD_LEFT);
				else
				$gender=str_pad(2,2,0,STR_PAD_LEFT);

				$get_class_value=$this->AddClass->find('all',array('conditions'=>array('AddClass.id'=>$this->request->data['StudentDetail']['add_class_id'])));
				$year_values=$this->AcademicYear->find('all',array('conditions'=>array('AcademicYear.id'=>$this->request->data['StudentDetail']['academic_year_id'])));
				$class_val=$get_class_value[0]['AddClass']['class'];
				$get_year_value=$year_values[0]['AcademicYear']['academic_year'];
				$this->request->data['StudentDetail']['joined_academic_year'] = $get_year_value;

				$serial_number=substr($this->request->data['StudentDetail']['student_code'], 8, 3);
				$y1=substr($get_year_value,2,2);
				$y2=substr($get_year_value,5,2);
				$studentcode=$y1.$y2.$class_val.$gender.$serial_number;
				$admission_number='AD'.$y1.$serial_number;

				$this->request->data['StudentDetail']['student_code']=$studentcode;
				$this->request->data['StudentDetail']['admission_number']=$admission_number;
			}

			if($this->StudentDetail->save($this->request->data))
			{
				$this->Session->delete('applicationId');
				$this->Session->delete('name');
				$this->Session->delete('application_number');
				if($studentcode)
				{
					$this->Session->setFlash("<div class='alert alert-success fade in' style='height:80px'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>Student Details Inserted Succesfully<br>Student Code : ".$studentcode."</div>");
					$this->redirect('/Student/studentLists');
				}
				else
				{
					$this->Session->setFlash("<div class='alert alert-success fade in' style='height:50px'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>Student Details Updated Succesfully</div>");
					$this->redirect('/Student/studentLists');
				}
			}
		}
	else if(!empty($id))
	{
		$this->request->data=$this->StudentDetail->read(null,$id);
		$this->set('application_number',$this->request->data['StudentApplication']['application_no']);
		$this->set('Sname',$this->request->data['StudentDetail']['student_name']);
		$this->set('application_num',$this->request->data['StudentDetail']['student_application_id']);
		$this->set('sCode',$this->request->data['StudentDetail']['student_code']);
		$this->set('aId',$this->request->data['StudentDetail']['admission_number']);
		$this->request->data['StudentDetail']['date_of_admision']=date('d-m-Y',strtotime($this->request->data['StudentDetail']['date_of_admision']));
		$this->request->data['StudentDetail']['dob']=date('d-m-Y',strtotime($this->request->data['StudentDetail']['dob']));
	} 


	/* Get taluk Dropdown Select List */
	$taluk_list=$this->Taluk->find('all');
	$taluk_array = array();
	if(!empty($taluk_list))
	{
	foreach($taluk_list as $taluk)
	{ 
	$taluk_array[$taluk['Taluk']['taluk']] = $taluk['Taluk']['taluk'];
	}
	}
	$this->set('taluks',$taluk_array);


	/* Get state Dropdown Select List */
	$state_list=$this->State->find('all');
	$state_array = array();
	if(!empty($state_list))
	{
	foreach($state_list as $state)
	{ 
	$state_array[$state['State']['state']] = $state['State']['state'];
	}
	}
	$this->set('states',$state_array);


	/* Get district Dropdown Select List */
	$district_list=$this->District->find('all');
	$district_array = array();
	if(!empty($district_list))
	{
	foreach($district_list as $district)
	{ 
	$district_array[$district['District']['district']] = $district['District']['district'];
	}
	}
	$this->set('districts',$district_array);
	}
	/*--------------------------------Student : Student Detail Entry------------------------------*/

	public function languageAllocation()
		{
			$this->_userSessionCheckout();
			$this->layout="ptes_admin";
			$this->_selectDropDown();
			
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
		}
		
		public function langaugeAllocations()
		{
			$this->_userSessionCheckout();
			$this->layout="ptes_admin";
			
			if(!empty($this->request->data))
			{
				$conditions = array("add_class_id"=>$this->request->data['StudentDetail']['add_class_id'],
							"academic_year_id"=>$this->request->data['StudentDetail']['academic_year_id']);
    
				if($this->LanguageAllocation->hasAny($conditions))
				{
					$this->Session->setFlash("<div class='alert alert-danger fade in' style='height:50px'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>Language already Allocated</a></div>");
					$this->redirect('/Student/viewLanguage');
				}
				
				$student_list=$this->StudentDetail->find('all',array('conditions'=>array(
						'StudentDetail.academic_year_id'=>$this->request->data['StudentDetail']['academic_year_id'],
						'StudentDetail.add_class_id'=>$this->request->data['StudentDetail']['add_class_id'])));
				if(!empty($student_list))
				{
					$this->set('student',$student_list);
				}
				else
				{
					$this->Session->setflash("<div class='alert alert-danger fade in' style='height:50px'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i> Record Not Exists</div>");
					$this->redirect(array("controller"=>"Student","action"=>"viewLanguage"));
				}
			}
			/* Get language Dropdown Select List */		
			$language_list=$this->Language->find('all');
			$language_array = array();
			if(!empty($language_list))
			{
				foreach($language_list as $Lang)
				{ 
					$language_array[$Lang['Language']['language']] = $Lang['Language']['language'];
				}
			}
			$this->set('listLanguage',$language_array);
		}
		
		public function storeLanguages()
		{
			$this->_userSessionCheckout();
			if(!empty($this->request->data))
			{
				$language_details = array(
					"LanguageAllocationDetail"=>array(
						"add_class_id"=>$this->request->data['LanguageAllocation']['add_class_id'],
						"academic_year_id"=>$this->request->data['LanguageAllocation']['academic_year_id'],
						"section_id"=>$this->request->data['LanguageAllocation']['section_id'],
					)
				);
				$this->LanguageAllocationDetail->save($language_details);
				$id = $this->LanguageAllocationDetail->getLastInsertId();
				
				
				$count=count($this->request->data['LanguageAllocation']['student_detail_id']);
				for($studnt=0;$studnt<$count;$studnt++)
				{
					
					$data = array(
						"LanguageAllocation"=>array(
							"language_allocation_detail_id"=>$id,
							"student_detail_id"=>$this->request->data['LanguageAllocation']['student_detail_id'][$studnt],
							"add_class_id"=>$this->request->data['LanguageAllocation']['add_class_id'],
							"academic_year_id"=>$this->request->data['LanguageAllocation']['academic_year_id'],
							"section_id"=>$this->request->data['LanguageAllocation']['section_id'][$studnt],
							"language_1"=>$this->request->data['LanguageAllocation']['language_1'][$studnt],
							"language_2"=>$this->request->data['LanguageAllocation']['language_2'][$studnt],
							"language_3"=>$this->request->data['LanguageAllocation']['language_3'][$studnt],
						)
					);
					$get=$this->LanguageAllocation->saveMany($data);
				}
				if(!empty($get))
				{
					$this->Session->setFlash("<div class='alert alert-success fade in' style='height:50px'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>Record Inserted</div>");
					$this->redirect('/Student/viewLanguage');
				}
				else
				{
					$this->Session->setFlash("<div class='alert alert-danger fade in' style='height:50px'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>Record Not Inserted</div>");
					$this->redirect('/Student/viewLanguage');
				}			
			}
		}
		
		public function viewLanguage()
		{
			$this->_userSessionCheckout();
			$this->layout="ptes_admin";
			$this->set('language',$this->LanguageAllocationDetail->find('all'));
		}
		public function viewLanguageAllocated($id=null)
		{
			$this->_userSessionCheckout();
			$this->layout="ptes_admin";
			$this->set('language',$this->LanguageAllocation->find('all',array('conditions'=>array('LanguageAllocation.language_allocation_detail_id'=>$id))));
		}
		public function deleteLanguageAllocate($id=null)
		{
			$this->_userSessionCheckout();
			$this->LanguageAllocationDetail->delete($id);
			$this->Session->setflash('Deleted Succesfully');
			$this->redirect(array("controller"=>"Student","action"=>"viewLanguage"));
		}
		
		/*display Student List*/
		public function studentList()
		{
			$this->_userSessionCheckout();
			$this->layout="ptes_admin";
			if($this->request->data['StudentDetail']['add_class_id']=='select')
			{
				if($student_list=$this->StudentDetail->find('all',array('conditions'=>array(
							'StudentDetail.academic_year_id'=>$this->request->data['StudentDetail']['academic_year_id']),
							'order'=>'StudentDetail.admission_number ASC')))
				{
					$this->set('list',$student_list);
				}
				else
				{
					$this->Session->setFlash("<div class='alert alert-danger fade in' style='height:50px'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>
					List Empty</div>");
					$this->redirect('/Student/studentLists');
				}
			}
			else
			{
				if($student_list=$this->StudentDetail->find('all',array('conditions'=>array(
							'StudentDetail.academic_year_id'=>$this->request->data['StudentDetail']['academic_year_id'],
							'StudentDetail.add_class_id'=>$this->request->data['StudentDetail']['add_class_id']),
							'order'=>'StudentDetail.admission_number ASC')))
				{
					$this->set('list',$student_list);
				}
				else
				{
					$this->Session->setFlash("<div class='alert alert-danger fade in' style='height:50px'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>
					List Empty</div>");
					$this->redirect('/Student/studentLists');
				}
			}
		}
		
		/*display Student List*/
		public function studentProfile($id=null)
		{	
			$this->_userSessionCheckout();
			$this->layout="ptes_admin";
			$student_list=$this->StudentDetail->find('all',array('conditions'=>array('StudentDetail.id'=>$id)));
			$p_list=$this->ParentDetail->find('all',array('conditions'=>array('StudentDetail.id'=>$id)));
			$image=$this->PreviousSchoolDetail->find('all',array('conditions'=>array('StudentDetail.id'=>$id)));
			$this->set('list',$student_list);
			$this->set('parent_list',$p_list);
			$this->set('profilepic',$image);
		}
		
		/*Delete Student Record*/
		public function deleteStudent($id=null)
		{
			$this->_userSessionCheckout();
			$this->StudentDetail->delete($id);
			$this->Session->setflash('Deleted Succesfully');
			$this->redirect(array("controller"=>"Student","action"=>"StudentDetail"));
		}
		
/*----------------------------------------------------------------------------------------*/
		
/*-------------------------Student : Parent details Entry--------------------------------*/
		public function parentList()
		{
			$this->_userSessionCheckout();
			$this->layout="ptes_admin";
		
			/*Display Parent Details*/
			$get_parent_list=$this->ParentDetail->find('all');
			$this->set('set_parent_list',$get_parent_list);
		}
		public function parentListCheck()
		{
			$this->_userSessionCheckout();
			$this->layout="ptes_admin";
			
			$student=$this->StudentDetail->find('all',array('fields'=>array('student_name','student_code'))); 
			$list_array = array();
			foreach($student as $slist){
					$list_array[] =  $slist['StudentDetail']['student_name']."-".$slist['StudentDetail']['student_code'];
			} 
			$student1='"'.implode('","',$list_array).'"'; 
		    $this->set('student',$student1);

			if(!empty($this->request->data))
			{
				$data=substr($this->request->data['ParentDetail']['student_code'],strpos($this->request->data['ParentDetail']['student_code'], "-")+1);
				if($get_student_id=$this->ParentDetail->find('all',array('conditions'=>array('StudentDetail.student_code'=>$data))))

				if(!empty($get_student_id))
				{
					$this->Session->setFlash("<div class='alert alert-danger fade in' style='height:50px'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>Parent Detail Already Registered.</a></div>");
					$this->redirect('/Student/parentListCheck');
				}
				
				if($get_student=$this->StudentDetail->find('all',array('conditions'=>array('StudentDetail.student_code'=>$data))))
				{
					$this->Session->write('StudentId',$get_student[0]['StudentDetail']['id']);
					$this->Session->write('StudentName',$get_student[0]['StudentDetail']['student_name']);
					$this->Session->write('StudentCode',$get_student[0]['StudentDetail']['student_code']);
					$this->redirect('/Student/parentDetail');
				}
				else
				{
					$this->Session->setFlash("<div class='alert alert-danger fade in' style='height:50px'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>
					Inorrect Student Code  or Student Code not exists</div>");
					$this->redirect('/Student/parentListCheck');
				}
			}
		}
		
		/*Store Parent Details*/
		public function parentDetail($id=null)
		{
			$this->_userSessionCheckout();
			$this->layout="ptes_admin";
			
			if(!empty($this->request->data))
			{
				$photo_tmp_name=$this->request->data['ParentDetail']['student_photo']['tmp_name'];
				$student_photo_name=$this->request->data['ParentDetail']['student_photo']['name'];
				$student_photo_type=$this->data['ParentDetail']['student_photo']['type'];
				$new_photo_name="";
				$photo_ext = substr($student_photo_name, strripos($student_photo_name, '.')); // get file name
				$allowed_photo_types = array('.jpeg','.jpg','.png','.gif','.JPG'); 
    
				if($student_photo_name!='')
				{
					if(in_array($photo_ext,$allowed_photo_types))
					{ 
						$new_photo_name = "S".$this->data['ParentDetail']['student_detail_id'].$photo_ext;
						$target = WWW_ROOT."StudentPhoto/".$new_photo_name;
						move_uploaded_file($photo_tmp_name,$target);
					}
					else
					{
						$this->Session->setflash("<div class='alert alert-danger fade in' style='height:50px'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>
						Student Photo Only jpg/ png/gif file typs are allowed</div>");
					}
				}
				else
				{
						$new_photo_name=$this->request->data['ParentDetail']['previous_photo'];
				}
				$this->request->data['ParentDetail']['student_photo'] = $new_photo_name;
				$this->request->data['ParentDetail']['father_name']=ucfirst($this->request->data['ParentDetail']['father_name']);
				$this->request->data['ParentDetail']['mother_name']=ucfirst($this->request->data['ParentDetail']['mother_name']);
				$this->request->data['ParentDetail']['guardian']=ucfirst($this->request->data['ParentDetail']['guardian']);
				if($this->ParentDetail->save($this->request->data))
				{
					$this->Session->setflash("<div class='alert alert-success fade in' style='height:50px'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>Data Inserted Successfully</div>");
					$this->Session->delete('StudentId');
					$this->Session->delete('StudentName');
					$this->Session->delete('StudentCode');
					$this->redirect('/Student/ParentList');
				}
			}
			else if(empty($this->request->data))
			{
				$this->request->data=$this->ParentDetail->read(null,$id);
				$this->set('get_student_id',$this->request->data['ParentDetail']['student_detail_id']);
				$this->set('get_student_code',$this->request->data['StudentDetail']['student_code']);
				$this->set('get_student_name',$this->request->data['StudentDetail']['student_name']);
				$this->set('old_photo_name',$this->request->data['ParentDetail']['student_photo']);
			}
			/* Get Class Dropdown Select List */
			$class_list=$this->AddClass->find('all');
			$class_array = array();
			if(!empty($class_list))
			{
				foreach($class_list as $class)
				{ 
					$class_array[$class['AddClass']['class']] = $class['AddClass']['class_name'];
				}
			}
			$this->set('classes',$class_array);
		}
		/*Delete Parent Record*/
		public function deleteParent($id=null)
		{
			$this->_userSessionCheckout();
			$this->ParentDetail->delete($id);
			$this->Session->setflash("<div class='alert alert-danger fade in' style='height:50px'>
			<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i> Record Deleted</div>");
			$this->redirect(array("controller"=>"Student","action"=>"parentList"));
		}
/*---------------------------------------------------------------------------------------*/

/*---------------------Student : previous school detail of student Entry------------------*/
				/*Student : previous school detail of student List*/
		public function previousSchoolList()
		{
			$this->_userSessionCheckout();
			$this->layout="ptes_admin";
			
			/*Display Parent Details*/
			$get_school_list=$this->PreviousSchoolDetail->find('all');
			$this->set('set_school_list',$get_school_list);
		}
		public function previousSchoolListCheck()
		{		
			$this->_userSessionCheckout();
			$this->layout="ptes_admin";
			$student=$this->StudentDetail->find('all',array('fields'=>array('student_name','student_code'))); 
			$list_array = array();
			foreach($student as $slist){
					$list_array[] =  $slist['StudentDetail']['student_name']."-".$slist['StudentDetail']['student_code'];
			} 
			$student1='"'.implode('","',$list_array).'"'; 
		    $this->set('student',$student1);

			if(!empty($this->request->data))
			{
				$data=substr($this->request->data['PreviousSchoolDetail']['student_code'],strpos($this->request->data['PreviousSchoolDetail']['student_code'], "-")+1);
				if($get_student_id=$this->PreviousSchoolDetail->find('all',array('conditions'=>array('StudentDetail.student_code'=>$data))))

				if(!empty($get_student_id))
				{
					$this->Session->setFlash("<div class='alert alert-danger fade in' style='height:50px'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>Record Already Registered.</a></div>");
					$this->redirect('/Student/previousSchoolListCheck');
				}
				
				
				$get_student=$this->StudentDetail->find('all',array('conditions'=>array('StudentDetail.student_code'=>$data)));
				if(!empty($get_student))
				{
					$this->Session->write('StudentId',$get_student[0]['StudentDetail']['id']);
					$this->Session->write('StudentName',$get_student[0]['StudentDetail']['student_name']);
					$this->Session->write('StudentCode',$get_student[0]['StudentDetail']['student_code']);
					$this->redirect('/Student/previousSchoolDetail');
				}
				else
				{
					$this->Session->setFlash("<div class='alert alert-danger fade in' style='height:50px'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>Incorrect Student code or Student Code not exits</div>");
					$this->redirect('/Student/previousSchoolListCheck');
				}
			}
		}
		
		public function previousSchoolDetail($id=null)
		{
			$this->_userSessionCheckout();
			$this->layout="ptes_admin";
			if(!empty($this->request->data))
			{
				$this->request->data['PreviousSchoolDetail']['school_name']=ucfirst($this->request->data['PreviousSchoolDetail']['school_name']);
		
				 $studentDocumentDetails="";
				for($i=0;$i<sizeof($this->request->data['PreviousSchoolDetail']['document']);++$i)
				{
					sizeof($this->request->data['PreviousSchoolDetail']['document']);
					$file_name= $this->request->data['PreviousSchoolDetail']['document'][$i]['name'];
					$file_type = $this->request->data['PreviousSchoolDetail']['document'][$i]['type'];
					$file_ext = substr($file_name, strripos($file_name, '.')); // get file name
					$allowed_file_types = array('.pdf','.docx','.doc'); 
    
					if($file_name!='')
					{
						if(in_array($file_ext,$allowed_file_types))
						{ 
							$new_file_name = "D".$this->data['PreviousSchoolDetail']['student_detail_id'].$i.$file_ext;
							$target = WWW_ROOT."Document/".$new_file_name;
							move_uploaded_file($this->request->data['PreviousSchoolDetail']['document'][$i]['tmp_name'],$target);
							$studentDocumentDetails.=$new_file_name.",";
						}
						else
						{
							$this->Session->setflash("<div class='alert alert-danger fade in' style='height:50px'>
							<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>
							Documnets Only Pdf/ doc file typs are allowed</div>");
						}
					}
					else
					{
						$studentDocumentDetails=$this->request->data['PreviousSchoolDetail']['old_doc'];
					}
				}
				$this->request->data['PreviousSchoolDetail']['document']= $studentDocumentDetails;
				$check=$this->PreviousSchoolDetail->save($this->request->data)	;
				if(!empty($check))
				{
					$this->Session->setflash("<div class='alert alert-success fade in' style='height:50px'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>
					Data Inserted</div>");
				}
				else
				{
					$this->Session->setflash("<div class='alert alert-danger fade in' style='height:50px'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>Data Not Inserted</div>");	
				}
				
				$this->Session->delete('StudentId');
				$this->Session->delete('StudentName');
				$this->Session->delete('StudentCode');
				$this->redirect('/Student/previousSchoolList');
			}
			else
			{
				$this->request->data=$this->PreviousSchoolDetail->read(null,$id);
				$this->set('get_student_id',$this->request->data['PreviousSchoolDetail']['student_detail_id']);
				$this->set('get_student_code',$this->request->data['StudentDetail']['student_code']);
				$this->set('get_student_name',$this->request->data['StudentDetail']['student_name']);
				$this->set('old_documents',$this->request->data['PreviousSchoolDetail']['document']);
			}
		}
		
		/*Delete School Record*/
		public function deleteSchool($id=null)
		{
			$this->_userSessionCheckout();
			$this->PreviousSchoolDetail->delete($id);
			$this->Session->setflash("<div class='alert alert-danger fade in' style='height:50px'>
			<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>Record Deleted</div>");
			$this->redirect(array("controller"=>"Student","action"=>"previousSchoolList"));
		}
/*-------------------------------------------------------------------------------------------------------------*/
		/*display Parent and PreviousSchool List*/
		public function viewDetail($id=null)
		{
			$this->_userSessionCheckout();
			$this->layout="ptes_admin";
			$student_list=$this->StudentDetail->find('all',array('conditions'=>array('StudentDetail.id'=>$id)));
			$p_list=$this->ParentDetail->find('all',array('conditions'=>array('StudentDetail.id'=>$id)));
			$image=$this->PreviousSchoolDetail->find('all',array('conditions'=>array('StudentDetail.id'=>$id)));
			
			$this->set('list',$student_list);
			$this->set('parent_list',$p_list);
			$this->set('school_list',$image);
		}
		public function studentLists()
		{
			$this->_userSessionCheckout();
			$this->layout="ptes_admin";
			
			$this->_selectDropDown();
			
		}
		/*---------------------co Curricular activities : by raghupathi siddoji on 12/10/2016------------------*/
		public function coCurricular($id=null)
		{
			$this->_userSessionCheckout();
			$this->layout="ptes_admin";
			
			if(!empty($this->request->data))
			{
				$student_code_ = split('-',$this->request->data['CoCurricular']['student_detail_id']);
				$student_code = $student_code_[1];
				
				//Getting the student id for store in co curricular
				$conditions = array("conditions"=>array('StudentDetail.student_code'=>$student_code,
										'StudentDetail.academic_year_id'=>$this->request->data['CoCurricular']['academic_year_id']),
										'fields'=>array('id'),"recursive"=>0);
				$student_details= $this->StudentDetail->find("first",$conditions);
				$student_id = $student_details['StudentDetail']['id'];
				
				$codate = $this->request->data['CoCurricular']['activities_date'];
				$activities_date = new DateTime($codate);
					
				$this->request->data['CoCurricular']['student_detail_id'] = $student_id;
				$this->request->data['CoCurricular']['activities_date'] = $activities_date->format('Y-m-d');
				$this->CoCurricular->save($this->request->data);
				
				$this->Session->setFlash("<div class='alert alert-success fade in' style='height:50px'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>Details saved successfuly...</div>");
				$this->redirect('/Student/coCurricular');  
			}
			else if($id>0)
			{
				$this->request->data = $this->CoCurricular->read(null,$id);
				$this->request->data['CoCurricular']['student_detail_id'] = $this->request->data['StudentDetail']['student_name']."-".$this->request->data['StudentDetail']['student_code'];
				$this->request->data['CoCurricular']['activities_date'] = date('d-m-Y',strtotime($this->request->data['CoCurricular']['activities_date']));
				//print_r($this->request->data);
			}
			$cc_list = $this->CoCurricular->find("all"); 
			$this->set('cc_list',$cc_list);
			
			//print_r($cc_list);
			  
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
			
			/*Get Activities */
			$activities = $this->ActivitieSetting->find('all');
			$activities = Set::extract($activities, '{n}.ActivitieSetting');
			$activities_array = array();
			if(!empty($activities)){
			    foreach($activities as $ay){ 
				$activities_array[$ay['id']] = $ay['activity_name'];
			    }
			}
			$this->set('activities_array', $activities_array);
			
			$student=$this->StudentDetail->find('all',array('fields'=>array('student_name','student_code'))); 
			$list_array = array();
			foreach($student as $slist){
					$list_array[] =  $slist['StudentDetail']['student_name']."-".$slist['StudentDetail']['student_code'];
			} 
			$student1='"'.implode('","',$list_array).'"'; 
		    $this->set('student',$student1); 
		}
		
		public function deleteCoCurricular($id=null)
		{
			$this->_userSessionCheckout();
			$this->CoCurricular->delete($id);
			$this->Session->setFlash("<div class='alert alert-danger fade in' style='height:50px'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>Delete successfuly...</div>");
				
			$this->redirect(array("controller"=>"Student","action"=>"coCurricular"));
		}
		/*---------------------co Curricular activities : by raghupathi siddoji on 12/10/2016------------------*/
		
	 public function generateApplication()
	  {
			$this->_userSessionCheckout();		  
		  $this->layout="ptes_admin";
		   $this->_selectDropDown();
			//configure::write("debug",2);
		   
		   $get_year=$this->AcademicYear->find('all',array('order'=>'AcademicYear.academic_year ASC'));
		   foreach($get_year as $year1)
			 $year_val=$year1['AcademicYear']['academic_year'];
		   
		   $year2=substr($year_val,2,2);
		   
		   $count_applications=$this->StudentApplication->find('count',array('conditions'=>array('AcademicYear.academic_year'=>$year_val)));
		   $serial_number=str_pad($count_applications+1, 3, '0', STR_PAD_LEFT);
		   
		   $application='AP'.$year2.$serial_number;
		   $this->set('application_number',$application);
		   
		   $application_fee=$this->ApplicationFee->find('first');
					$this->set('application_fee',$application_fee); 
					
			/* Generate Application Receipt Number in format AFYYNNN */
					$year=date('y');
					$receipt_no=$this->StudentApplication->find('count');
					$receipt_serial_number=str_pad($receipt_no+1, 3, '0', STR_PAD_LEFT); 
					$receipt_no_='AF'.$year.$receipt_serial_number;
					
	   
		
	   $rdata = $this->request->data;
	   if(!empty($rdata))
	   {
		
		$this->request->data['StudentApplication']['date']=date('Y-m-d');
		$this->request->data['StudentApplication']['receipt_no']= $receipt_no_;
		$this->request->data['StudentApplication']['student_name']=ucfirst($this->request->data['StudentApplication']['student_name']);
		$this->StudentApplication->save($this->request->data);
		$this->Session->setFlash("<div class='alert alert-success fade in' style='height:50px'>
		<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>Record Inserted  <a href='../Student/applicationForm/".$this->request->data['StudentApplication']['application_no']."' target='_blank'>Print</a></div>");
		$this->redirect('/Student/generateApplication');
	   }
	   $get=$this->StudentApplication->find('all',array('order'=>'StudentApplication.id DESC'));
	   $this->set('list',$get); 
   }
/*----------------------------------------------------------------------------------------*/
  /*-------------------------Student : Application Form Format 18 Aug 2016-------------------*/
  public function filledApplicationForm($id=null)
  {
	$this->_userSessionCheckout();
   $this->layout="ajax";
  
   $condition=array('conditions'=>array('StudentDetail.student_code'=>$id));
   $get=$this->StudentDetail->find('all',$condition);
   $this->set('detail',$get);
   
   $condition=array('conditions'=>array('StudentDetail.student_code'=>$id));
   $Pget=$this->ParentDetail->find('all',$condition);
   $this->set('P_detail',$Pget);
   
   $condition=array('conditions'=>array('StudentDetail.student_code'=>$id));
   $Sget=$this->PreviousSchoolDetail->find('all',$condition);
   $this->set('S_detail',$Sget);
  }
/*-------------------------------------------------------------------------------------------*/
  public function generateApplicationNumber($year=null)
  {
   $this->_userSessionCheckout();
   $this->layout="ajax";
   $get_year=$this->AcademicYear->find('all',array('conditions'=>array('AcademicYear.id'=>$year)));
    foreach($get_year as $year1)
     $year_val=$year1['AcademicYear']['academic_year'];
   
   $year2=substr($year_val,2,2);
   
   $count_applications=$this->StudentApplication->find('count',array('conditions'=>array('StudentApplication.academic_year_id'=>$year)));
   $serial_number=str_pad($count_applications+1, 3, '0', STR_PAD_LEFT);
   
   $application='AP'.$year2.$serial_number;
   $this->set('application_number',$application);
  }
  public function  applicationFeePrint($id=null)
	{
		$this->_userSessionCheckout();
		$this->layout="ajax";
		
		$condition = array("conditions"=>array("application_no"=>$id));
		$application_fee = $this->StudentApplication->find("first",$condition);
		$this->set('application_fee',$application_fee);
		//print_r($application_fee); 
	}
	public function editLanguageAllocation($id=null)
		{
			$this->_userSessionCheckout();
			$this->layout="ptes_admin";
			$get_value=$this->LanguageAllocation->find('all',array('conditions'=>array('LanguageAllocation.language_allocation_detail_id'=>$id)));
			$this->set('lang',$get_value);
			//print_r($get_value);
			
			/* Get language Dropdown Select List */		
			$language_list=$this->Language->find('all');
			$language_array = array();
			if(!empty($language_list))
			{
				foreach($language_list as $Lang)
				{ 
					$language_array[$Lang['Language']['language']] = $Lang['Language']['language'];
				}
			}
			$this->set('listLanguage',$language_array);
		}
		
		public function updateLanguage()
		{
			$this->_userSessionCheckout();
			if(!empty($this->request->data))
			{
				$language_details = array(
					"LanguageAllocationDetail"=>array(
						"add_class_id"=>$this->request->data['LanguageAllocation']['add_class_id'],
						"academic_year_id"=>$this->request->data['LanguageAllocation']['academic_year_id'],
						"section_id"=>$this->request->data['LanguageAllocation']['section_id'],
						"id"=>$this->request->data['LanguageAllocation']['detail_id'],
					)
				);
				$this->LanguageAllocationDetail->save($language_details);
				
				$count=count($this->request->data['LanguageAllocation']['student_detail_id']);
				for($studnt=0;$studnt<$count;$studnt++)
				{
					
					$data = array(
						"LanguageAllocation"=>array(
							"language_allocation_detail_id"=>$this->request->data['LanguageAllocation']['detail_id'],
							"student_detail_id"=>$this->request->data['LanguageAllocation']['student_detail_id'][$studnt],
							"add_class_id"=>$this->request->data['LanguageAllocation']['add_class_id'],
							"academic_year_id"=>$this->request->data['LanguageAllocation']['academic_year_id'],
							"section_id"=>$this->request->data['LanguageAllocation']['section_id'][$studnt],
							"language_1"=>$this->request->data['LanguageAllocation']['language_1'][$studnt],
							"language_2"=>$this->request->data['LanguageAllocation']['language_2'][$studnt],
							"language_3"=>$this->request->data['LanguageAllocation']['language_3'][$studnt],
							"id"=>$this->request->data['LanguageAllocation']['id'][$studnt],
						)
					);
					$get=$this->LanguageAllocation->saveMany($data);
				}
				if(!empty($get))
				{
					$this->Session->setFlash("<div class='alert alert-success fade in' style='height:50px'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>Record Inserted</div>");
					$this->redirect('/Student/viewLanguage');
				}
				else
				{
					$this->Session->setFlash("<div class='alert alert-danger fade in' style='height:50px'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>Record Not Inserted</div>");
					$this->redirect('/Student/viewLanguage');
				}			
			}
		}
		
		public function promoteStudent()
		{
			$this->_userSessionCheckout();
			$this->layout="ptes_admin";
			$this->_selectDropDown();
			
			if(!empty($this->request->data))
			{
				$student_detail =  $this->StudentDetail->find('all',array('conditions'=>array('StudentDetail.add_class_id'=>$this->request->data['StudentDetail']['add_class_id'],
																						'StudentDetail.academic_year_id'=>$this->request->data['StudentDetail']['academic_year_id'])));
				if(!empty($student_detail))
				{
					$this->set('details',$student_detail);
				}
				else
				{
					$this->Session->setFlash("<div class='alert alert-danger fade in' style='height:50px'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>No Student..</div>");
					$this->redirect('/Student/promoteStudent');
				}
			}
		}
		
		public function promoteStudentsTo()
		{
			if(!empty($this->request->data))
			{
				//print_r($this->request->data);
				$count = sizeof($this->request->data['StudentDetail']['id']);
				for($i=0;$i<$count;$i++)
				{
					$data = array(
						"StudentDetail"=>array(
							"add_class_id"=>$this->request->data['StudentDetail']['add_class_id'][$i],
							"academic_year_id"=>$this->request->data['StudentDetail']['academic_year_id'][$i],
							"id"=>$this->request->data['StudentDetail']['id'][$i],
						)
					);
					
					$get = $this->StudentDetail->saveAll($data);
				}
				if(!empty($get))
				{
					$this->Session->setFlash("<div class='alert alert-success fade in' style='height:50px'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>Students Succesfully Promoted</div>");
					$this->redirect('/Student/promoteStudent');
				}
			}
		}
}
