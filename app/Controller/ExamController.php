<?php 
 
class ExamController extends AppController {

 
	public $uses = array('Admin','StudentDetail','AddClass','AcademicYear','BloodGroup','Caste','Language','MotherTongue','Religion','AcademicYear',
	'Section','SubCaste','SubjectAllocation','CreateExam','GradeSetting','MarksEntry','MarksEntryDetail','LanguageAllocation','LanguageAllocationDetail');
	public $helpers = array('Html', 'Form', 'Js','Session');

		/*Exam : Subject Allocation*/
		public function subjectAllocation($id=null)
		{
			$this->layout="ptes_admin";
			$this->_selectDropDown();
			if(!empty($this->request->data))
			{
				if(!$id){
				$conditions = array("add_class_id"=>$this->request->data['SubjectAllocation']['add_class_id'],
									"academic_year_id"=>$this->request->data['SubjectAllocation']['academic_year_id']);
    
				if($this->SubjectAllocation->hasAny($conditions))
				{
					$this->Session->setFlash("<div class='alert alert-danger fade in' style='height:50px'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>Subject Allocated for this Class</a></div>");
					$this->redirect('/Exam/subjectAllocation');
				}
				}
				
				if($this->SubjectAllocation->save($this->request->data))
				{
					$this->Session->setFlash("<div class='alert alert-success fade in' style='height:50px'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>Data Succesfully Inserted</div>");
					$this->redirect('/Exam/SubjectAllocationList');
				}
				else
				{
					$this->Session->setFlash("<div class='alert alert-danger fade in' style='height:50px'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>Data Not Inserted</div>");
					$this->redirect('/Exam/SubjectAllocation');
				}
			}
			else if(empty($this->request->data))
			{
				$this->request->data=$this->SubjectAllocation->read(null,$id);
			}
		}
		
		public function subjectAllocationDelete($id=null)
		{
			$this->SubjectAllocation->delete($id);
			$this->Session->setFlash("<div class='alert alert-success fade in' style='height:50px'>
			<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>Deleted Succesfully</div>");
			$this->redirect('/Exam/subjectAllocationList');
		}
		
		/*Exam : Create Exam*/
		public function createExam($id=null)
		{
			$this->layout="ptes_admin";
			$this->_selectDropDown();
			
			if(!empty($this->request->data))
			{
				if(!$id) {
				$conditions = array("exam_type"=>$this->request->data['CreateExam']['exam_type'],
									"add_class_id"=>$this->request->data['CreateExam']['add_class_id'],
									"academic_year_id"=>$this->request->data['CreateExam']['academic_year_id'],
									"section_id"=>$this->request->data['CreateExam']['section_id']);
    
				if($this->CreateExam->hasAny($conditions))
				{
					$this->Session->setFlash("<div class='alert alert-danger fade in' style='height:50px'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>Exam already Created </a></div>");
					$this->redirect('/Exam/createExam');
				}
				}
				
				$from_date = $this->request->data['CreateExam']['from_date'];
				$fromdate= new DateTime($from_date);
				$this->request->data['CreateExam']['from_date'] = $fromdate->format('Y-m-d');
					
				$to_date = $this->request->data['CreateExam']['to_date'];
				$todate= new DateTime($to_date);
				$this->request->data['CreateExam']['to_date'] = $todate->format('Y-m-d');
				
				if($this->CreateExam->save($this->request->data))
				{
					$this->Session->setFlash("<div class='alert alert-success fade in' style='height:50px'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>Data Succesfully Inserted</div>");
					$this->redirect('/Exam/createExamList');
				}
				else
				{
					$this->Session->setFlash("<div class='alert alert-danger fade in' style='height:50px'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>Data Not Inserted</div>");
					$this->redirect('/Exam/createExam');
				}
			}
			else if(!empty($id))
			{
				$this->request->data=$this->CreateExam->read(null,$id);
				$this->request->data['CreateExam']['from_date']=date('d-m-Y',strtotime($this->request->data['CreateExam']['from_date']));
				$this->request->data['CreateExam']['to_date']=date('d-m-Y',strtotime($this->request->data['CreateExam']['to_date']));
			}
		}
		
		public function createExamDelete($id=null)
		{
			$this->CreateExam->delete($id);
			$this->Session->setFlash("<div class='alert alert-success fade in' style='height:50px'>
			<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>Deleted Succesfully</div>");
			$this->redirect('/Exam/createExamList');
		}
		
		public function createExamList()
		{
			$this->layout="ptes_admin";
			$get_exam_list=$this->CreateExam->find('all');
			$this->set('exam',$get_exam_list);
		}

		/*Exam : Marks Entry*/
		public function marksEntry()
		{
			$this->layout="ptes_admin";
			$this->_selectDropDown();
			$this->_examTypeDropDown();
		}
		
		/*Exam : Marks Entry*/
		public function marksEnter()
		{
			$this->layout="ptes_admin";
			
			if(!empty($this->request->data))
			{
				$condition=array('conditions'=>array('CreateExam.exam_type'=>$this->request->data['MarksEntry']['exam_type'],
				'CreateExam.add_class_id'=>$this->request->data['MarksEntry']['add_class_id'],
				'CreateExam.academic_year_id'=>$this->request->data['MarksEntry']['academic_year_id']));
				if($this->MarksEntry->find('all',$condition))
				{
					$this->Session->setFlash("<div class='alert alert-danger fade in' style='height:50px'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>Marks Stored for this Exam</a></div>");
					$this->redirect('/Exam/marksEntry');
				}
				
				$conditions_create_exam=array('conditions'=>array('CreateExam.add_class_id'=>$this->request->data['MarksEntry']['add_class_id'],
					'CreateExam.exam_type'=>$this->request->data['MarksEntry']['exam_type'],
					'CreateExam.academic_year_id'=>$this->request->data['MarksEntry']['academic_year_id']));
				$get_exam_value=$this->CreateExam->find('all',$conditions_create_exam);
				
				$conditions_subject_allocation=array('conditions'=>array('SubjectAllocation.add_class_id'=>$this->request->data['MarksEntry']['add_class_id'],
					'SubjectAllocation.academic_year_id'=>$this->request->data['MarksEntry']['academic_year_id']));
				$get_subject_value=$this->SubjectAllocation->find('all',$conditions_subject_allocation);
				
				$conditions_student_list=array('conditions'=>array('StudentDetail.add_class_id'=>$this->request->data['MarksEntry']['add_class_id'],
					'StudentDetail.academic_year_id'=>$this->request->data['MarksEntry']['academic_year_id'],
					//'StudentDetail.section_id'=>$this->request->data['MarksEntry']['section_id']
					));
				$get_student_value=$this->StudentDetail->find('all',$conditions_student_list);
				
				if(!empty($get_exam_value) && !empty($get_subject_value) && !empty($get_student_value))
				{
					$this->set('exam',$get_exam_value);
					$this->set('subject',$get_subject_value);
					$this->set('student',$get_student_value);
				}
				else 
				{
					$this->Session->setFlash("<div class='alert alert-danger fade in' style='height:70px'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>Exam not Created or Subject Not Allocated or Students Not Admitted For this Class </div>");
					$this->redirect('/Exam/marksEntry');
				}
			}
		}
		
		public function storeMarks()
		{
			if(!empty($this->request->data))
			{
				$marks_deatil_store = array(
						"MarksEntryDetail" => array(
							"add_class_id"=>$this->request->data['MarksEntry']['add_class_id'],
							"academic_year_id"=>$this->request->data['MarksEntry']['academic_year_id'],
							"section_id"=>$this->request->data['MarksEntry']['section_id'],
							"create_exam_id"=>$this->request->data['MarksEntry']['create_exam_id'],
							"subject_allocation_id"=>$this->request->data['MarksEntry']['subject_allocation_id']
					)
				);
				$this->MarksEntryDetail->save($marks_deatil_store);
				$id=$this->MarksEntryDetail->getLastInsertId();
				
				$count=count($this->request->data['MarksEntry']['student_detail_id']);
				for($i=0;$i<$count;$i++)
				{
					for($check_mark=1;$check_mark<=10;$check_mark++)
					{
						if(empty($this->request->data['MarksEntry']["marks$check_mark"][$i]))
							$this->request->data['MarksEntry']["marks$check_mark"][$i]='--';
					}
					
					$marks_store = array(
						"MarksEntry" => array(
							"marks_entry_detail_id"=>$id,
							"student_detail_id"=>$this->request->data['MarksEntry']['student_detail_id'][$i],
							"add_class_id"=>$this->request->data['MarksEntry']['add_class_id'],
							"academic_year_id"=>$this->request->data['MarksEntry']['academic_year_id'],
							"section_id"=>$this->request->data['MarksEntry']['section_id'],
							"create_exam_id"=>$this->request->data['MarksEntry']['create_exam_id'],
							"subject_allocation_id"=>$this->request->data['MarksEntry']['subject_allocation_id'],
							"marks1"=>$this->request->data['MarksEntry']['marks1'][$i],
							"marks2"=>$this->request->data['MarksEntry']['marks2'][$i],
							"marks3"=>$this->request->data['MarksEntry']['marks3'][$i],
							"marks4"=>$this->request->data['MarksEntry']['marks4'][$i],
							"marks5"=>$this->request->data['MarksEntry']['marks5'][$i],
							"marks6"=>$this->request->data['MarksEntry']['marks6'][$i],
							"marks7"=>$this->request->data['MarksEntry']['marks7'][$i],
							"marks8"=>$this->request->data['MarksEntry']['marks8'][$i],
							"marks9"=>$this->request->data['MarksEntry']['marks9'][$i],
							"marks10"=>$this->request->data['MarksEntry']['marks10'][$i]
						)
					);
					$store_marks=$this->MarksEntry->saveAll($marks_store);
				}
				if(!empty($store_marks))
				{
					$this->Session->setFlash("<div class='alert alert-success fade in' style='height:50px'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>Marks Succesfully Stored</div>");
					$this->redirect('/Exam/marksDetailList');
				}
				else
				{
					$this->Session->setFlash("<div class='alert alert-danger fade in' style='height:50px'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>Record Not Inserted</div>");
					$this->redirect('/Exam/marksDetailList');
				}
			}
		}
		
		public function gradeSetting($id=null)
		{
			$this->layout="ptes_admin";
			$this->_selectDropDown();
			
			if(!empty($this->request->data))
			{
				$get_grade=$this->GradeSetting->save($this->request->data);
				if(!empty($get_grade))
				{
					$this->Session->setFlash("<div class='alert alert-success fade in' style='height:50px'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>Record Inserted</div>");
					$this->redirect('/Exam/gradeSettingList');
				}
				else
				{
					$this->Session->setFlash("<div class='alert alert-danger fade in' style='height:50px'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>Record Not Inserted</div>");
					$this->redirect('/Exam/gradeSetting');
				}
			}
			else if(empty($this->request->data))
			{
				$this->request->data=$this->GradeSetting->read(null,$id);
			}
		}
		
		public function gradeSettingDelete($id=null)
		{
			$this->GradeSetting->delete($id);
			$this->Session->setFlash("<div class='alert alert-success fade in' style='height:50px'>
			<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>Deleted Succesfully</div>");
			$this->redirect('/Exam/gradeSettingList');
		}
		
		public function gradeSettingList()
		{
			$this->layout="ptes_admin";
			
			$grade_setting_list=$this->GradeSetting->find('all');
			$this->set('gradelist',$grade_setting_list);
		}
		
		public function classWiseMark()
		{
			$this->_selectDropDown();
			$this->layout="ptes_admin";
			$this->_examTypeDropDown();
		}
		
		public function classWiseMarkList()
		{
			$this->layout="ptes_admin";
			
				$condition=array('conditions'=>array('CreateExam.exam_type'=>$this->request->data['MarksEntry']['exam_type'],
				'CreateExam.add_class_id'=>$this->request->data['MarksEntry']['add_class_id'],
				'CreateExam.academic_year_id'=>$this->request->data['MarksEntry']['academic_year_id']));
				if($get_value=$this->MarksEntry->find('all',$condition))
				{
					$this->set('marks_list',$get_value);
				}
				else
				{
					$this->Session->setFlash("<div class='alert alert-danger fade in' style='height:50px'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>Record Not Exists</div>");
					$this->redirect('/Exam/classWiseMark');
				}
		}
		
		public function subjectAllocationList()
		{
			$this->layout="ptes_admin";
			
			$get_subjects=$this->SubjectAllocation->find('all');
			$this->set('subject',$get_subjects);
		}
		
		public function viewGradeList($id=null)
		{
			$this->layout="ptes_admin";
			
			$grade_list=$this->GradeSetting->find('all',array('conditions'=>array('GradeSetting.id'=>$id)));
			$this->set('grade',$grade_list);
		}
		
		public function classWiseGrade()
		{
			$this->_selectDropDown();
			$this->layout="ptes_admin";
			$this->_examTypeDropDown();
		}
		
		public function classWiseGradeList()
		{
			$this->layout="ptes_admin";
				$grade_array=array();
				$j=1;
				$condition=array('conditions'=>array('CreateExam.exam_type'=>$this->request->data['MarksEntry']['exam_type'],
				'CreateExam.add_class_id'=>$this->request->data['MarksEntry']['add_class_id'],
				'CreateExam.academic_year_id'=>$this->request->data['MarksEntry']['academic_year_id']));
				
				if($this->request->data['MarksEntry']['exam_type']=='SA-1' || $this->request->data['MarksEntry']['exam_type']=='SA-2')
					$reduce=1.667;
				else
					$reduce=2;
				if($get_value=$this->MarksEntry->find('all',$condition))
				{
					foreach($get_value as $mark)
					{
						$grades=$this->GradeSetting->find('all',array('conditions'=>array('GradeSetting.max_marks'=>round($mark['CreateExam']['max_marks']/$reduce))));
						if(empty($grades))
						{
							$this->Session->setFlash("<div class='alert alert-danger fade in' style='height:50px'>
							<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>Grade Not Assigned</div>");
							$this->redirect('/Exam/classWiseGrade');
						}
					}
					$this->set('marks',$get_value);
					$this->set('grade',$grades);
					$this->set('percent',$reduce);
				}
				else
				{
					$this->Session->setFlash("<div class='alert alert-danger fade in' style='height:50px'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>Record Not Exists</div>");
					$this->redirect('/Exam/classWiseGrade');
				}
		}
		
		public function marksEntryUpdate()
		{
			$this->layout="ptes_admin";
			$this->_selectDropDown();
			$this->_examTypeDropDown();
		}
		
		
		public function marksEnterUpdate()
		{
			$this->layout="ptes_admin";
			
			if(!empty($this->request->data))
			{
				$condition=array('conditions'=>array('CreateExam.exam_type'=>$this->request->data['MarksEntry']['exam_type'],
				'CreateExam.add_class_id'=>$this->request->data['MarksEntry']['add_class_id'],
				'CreateExam.academic_year_id'=>$this->request->data['MarksEntry']['academic_year_id']));
				if($get_value=$this->MarksEntry->find('all',$condition))
				{
					$this->set('exam',$get_value);
				}
				else
				{
					$this->Session->setFlash("<div class='alert alert-danger fade in' style='height:50px'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>Record Not Exists</div>");
					$this->redirect('/Exam/marksEntryUpdate');
				}
			}	
		}
		
		public function storeMarksUpdate()
		{
			if(!empty($this->request->data))
			{
				$count=count($this->request->data['MarksEntry']['student_detail_id']);
				for($i=0;$i<$count;$i++)
				{
					for($check_mark=1;$check_mark<=10;$check_mark++)
					{
						if(empty($this->request->data['MarksEntry']["marks$check_mark"][$i]))
							$this->request->data['MarksEntry']["marks$check_mark"][$i]='--';
					}
					
					$marks_store = array(
						"MarksEntry" => array(
							"marks1"=>$this->request->data['MarksEntry']['marks1'][$i],
							"marks2"=>$this->request->data['MarksEntry']['marks2'][$i],
							"marks3"=>$this->request->data['MarksEntry']['marks3'][$i],
							"marks4"=>$this->request->data['MarksEntry']['marks4'][$i],
							"marks5"=>$this->request->data['MarksEntry']['marks5'][$i],
							"marks6"=>$this->request->data['MarksEntry']['marks6'][$i],
							"marks7"=>$this->request->data['MarksEntry']['marks7'][$i],
							"marks8"=>$this->request->data['MarksEntry']['marks8'][$i],
							"marks9"=>$this->request->data['MarksEntry']['marks9'][$i],
							"marks10"=>$this->request->data['MarksEntry']['marks10'][$i],
							"id"=>$this->request->data['MarksEntry']['id'][$i]
						)
					);
					$store_marks=$this->MarksEntry->saveAll($marks_store);
				}
				if(!empty($store_marks))
				{
					$this->Session->setFlash("<div class='alert alert-success fade in' style='height:50px'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>Record Updated Succesfully </div>");
					$this->redirect('/Exam/marksEntryUpdate');
				}
				else
				{
					$this->Session->setFlash("<div class='alert alert-danger fade in' style='height:50px'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>Record Not Updated</div>");
					$this->redirect('/Exam/marksEntryUpdate');
				}
			}
		}
		
		public function individualMarksList()
		{
			$this->layout="ptes_admin";
			$this->_examTypeDropDown();
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
			
			
			$student=$this->StudentDetail->find('all',array('fields'=>array('student_name','student_code'))); 
			$list_array = array();
			foreach($student as $slist){
					$list_array[] =  $slist['StudentDetail']['student_name']."-".$slist['StudentDetail']['student_code'];
			} 
			$student1='"'.implode('","',$list_array).'"'; 
		    $this->set('student',$student1);

			
			if(!empty($this->request->data))
			{
		$data=substr($this->request->data['MarksEntry']['student_code'], strpos($this->request->data['MarksEntry']['student_code'], "-")+1);
				
				$condition=array('conditions'=>array('CreateExam.exam_type'=>$this->request->data['MarksEntry']['exam_type'],
				'CreateExam.add_class_id'=>$this->request->data['MarksEntry']['add_class_id'],
				'StudentDetail.student_code'=>$data));
				
				if($this->request->data['MarksEntry']['exam_type']=='SA-1' || $this->request->data['MarksEntry']['exam_type']=='SA-2')
					$reduce=1.667;
				else
					$reduce=2;
				$total=0;
				if($get_value=$this->MarksEntry->find('all',$condition))
				{
					foreach($get_value as $mark)
					{
						$grades=$this->GradeSetting->find('all',array('conditions'=>array('GradeSetting.max_marks'=>round($mark['CreateExam']['max_marks']/$reduce))));
						if(empty($grades))
						{
							$this->Session->setFlash("<div class='alert alert-danger fade in' style='height:50px'>
							<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>Grade Not Assigned</div>");
							$this->redirect('/Exam/classWiseGrade');
						}
					}
					$get_lang=$this->LanguageAllocation->find('all',array('conditions'=>array('StudentDetail.student_code'=>$data)));
					$this->set('lang',$get_lang);
					$this->set('value',$get_value);
					$this->set('grade',$grades);
					$this->set('percent',$reduce);
				}
				else
				{
					$this->Session->setFlash("<div class='alert alert-danger fade in' style='height:50px'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>Record Not Exists</div>");
					//$this->redirect('/Exam/individualMarksList');
				}
			}
		}
		
		public function getMarksCard()
		{
			$this->layout="ptes_admin";
			$this->_selectDropDown();
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
			
			$student=$this->StudentDetail->find('all',array('fields'=>array('student_name','student_code'))); 
			$list_array = array();
			foreach($student as $slist){
					$list_array[] =  $slist['StudentDetail']['student_name']."-".$slist['StudentDetail']['student_code'];
			} 
			$student1='"'.implode('","',$list_array).'"'; 
		    $this->set('student',$student1);
		}
		
		public function marksCard()
		{
			$this->layout="ptes_admin";
			
			
			
			if(!empty($this->request->data))
			{
		$data=substr($this->request->data['MarksEntry']['student_code'], strpos($this->request->data['MarksEntry']['student_code'], "-")+1);

				$condition=array('conditions'=>array('StudentDetail.student_code'=>$data,'AddClass.id'=>$this->request->data['MarksEntry']['add_class_id']));
				if($get_value=$this->MarksEntry->find('all',$condition))
				{
					
					$this->set('value',$get_value);
					$get_lang=$this->LanguageAllocation->find('all',$condition);
					$this->set('lang',$get_lang);
				}
				else
				{
					$this->Session->setFlash("<div class='alert alert-danger fade in' style='height:50px'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>Record Not Exists</div>");
					$this->redirect('/Exam/getMarksCard');
				}
				$get_grade=$this->GradeSetting->find('all');
				$this->set('get_grade',$get_grade);
			}
		}
		
		public function getPrintOut($student_code=null,$exam_name=null,$clas_id=null)
		{
			$this->layout="ajax";
			$condition=array('conditions'=>array('CreateExam.exam_type'=>$exam_name,'StudentDetail.student_code'=>$student_code,'CreateExam.add_class_id'=>$clas_id));
				
				if($exam_name=='SA-1' || $exam_name=='SA-2')
					$reduce=1.667;
				else
					$reduce=2;
				$total=0;
				if($get_value=$this->MarksEntry->find('all',$condition))
				{
					foreach($get_value as $mark)
					{
						$grades=$this->GradeSetting->find('all',array('conditions'=>array('GradeSetting.max_marks'=>round($mark['CreateExam']['max_marks']/$reduce))));
						if(empty($grades))
						{
							$this->Session->setFlash("<div class='alert alert-danger fade in' style='height:50px'>
							<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>Grade Not Assigned</div>");
							$this->redirect('/Exam/classWiseGrade');
						}
						for($i=1;$i<=10;$i++)
						{
							if($mark['MarksEntry']["marks$i"]!='--')
							{
								$total=$total+round($mark['CreateExam']['max_marks']/$reduce);
								
							}
						}
					}
					$total_grade=$this->GradeSetting->find('all',array('conditions'=>array('GradeSetting.max_marks'=>$total)));
				//	debug($this->GradeSetting->getDataSource()->getLog(false,false));
					$get_lang=$this->LanguageAllocation->find('all',array('conditions'=>array('StudentDetail.student_code'=>$student_code)));
					
					$this->set('lang',$get_lang);
					$this->set('value',$get_value);
					$this->set('grade',$grades);
					$this->set('tot_grade',$total_grade);
					$this->set('percent',$reduce);
				}
		}
		
		public function getMarksCardPrint($student_code,$clas_id)
		{
			$this->layout="ajax";
			
			$condition=array('conditions'=>array('StudentDetail.student_code'=>$student_code,'AddClass.id'=>$clas_id));
				if($get_value=$this->MarksEntry->find('all',$condition))
				{
					$this->set('value',$get_value);
					$get_lang=$this->LanguageAllocation->find('all',$condition);
					$this->set('lang',$get_lang);
				}
				else
				{
					$this->Session->setFlash("<div class='alert alert-danger fade in' style='height:50px'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>Record Not Exists</div>");
					$this->redirect('/Exam/getMarksCard');
				}
                                $get_grade=$this->GradeSetting->find('all');
				$this->set('get_grade',$get_grade);
		}
		
		public function marksDetailList()
		{
			$this->layout="ptes_admin";
			$marks_list=$this->MarksEntryDetail->find('all');
			$this->set('list',$marks_list);
		}
		
		public function marksList($id=null)
		{
			$this->layout="ptes_admin";
			
				$condition=array('conditions'=>array('MarksEntry.marks_entry_detail_id'=>$id));
				if($get_value=$this->MarksEntry->find('all',$condition))
				{
					$this->set('marks_list',$get_value);
				}
		}
		public function marksEntryDelete($id=null)
		{
			$this->MarksEntryDetail->delete($id);
			$this->Session->setFlash("<div class='alert alert-success fade in' style='height:50px'>
			<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>Deleted Succesfully</div>");
			$this->redirect('/Exam/MarksDetailList');
		}
		
		public function printoutMarksList($id=null)
		{
			$this->layout="ajax";
			
				$condition=array('conditions'=>array('MarksEntry.marks_entry_detail_id'=>$id));
				if($get_value=$this->MarksEntry->find('all',$condition))
				{
					$this->set('marks_list',$get_value);
				}
		}
		
		
		
		public function printoutGradeList($exam=null,$class_id=null,$academic_year_id=null)
		{
			$this->layout="ajax";
				$grade_array=array();
				$j=1;
				$condition=array('conditions'=>array('CreateExam.exam_type'=>$exam,
				'CreateExam.add_class_id'=>$class_id,
				'CreateExam.academic_year_id'=>$academic_year_id));
				
				if($exam=='SA-1' || $exam=='SA-2')
					$reduce=1.667;
				else
					$reduce=2;
				if($get_value=$this->MarksEntry->find('all',$condition))
				{
					foreach($get_value as $mark)
					{
						$grades=$this->GradeSetting->find('all',array('conditions'=>array('GradeSetting.max_marks'=>round($mark['CreateExam']['max_marks']/$reduce))));
					}
					$this->set('marks',$get_value);
					$this->set('grade',$grades);
					$this->set('percent',$reduce);
				}
		}
		
		/*-----------------------------------------------------------unit test-------------------------------------------------------*/
		
		public function UnitTestMarks()
		{
			$this->_userSessionCheckout();
			$this->layout="ptes_admin"; 
			$this->_getClass(); 
			$this->_getAcademicYear();
			//$this->_getSubject();
			$this->_getSection();
			configure::write('debug',0);
			
			
			
			//print_r($this->request->data['UnitTest']);
			$academic_year_id=$this->request->data['UnitTest']['academic_year_id'];
			$section_id=$this->request->data['UnitTest']['section_id'];
			$class_id=$this->request->data['UnitTest']['add_class_id'];
			$sub_code=$this->request->data['UnitTest']['subject_allocation_id'];
			$date=$this->request->data['UnitTest']['date'];
			$this->set('academic_year_id',$academic_year_id);
			$this->set('class_id',$class_id);
			$this->set('section_id',$section_id);
			$this->set('sub_code',$sub_code);
			$this->set('date',$date);
			
			//print_r($section_id);
			
			if(!empty($this->request->data))
			{
				
				$condition=array('conditions'=>array('StudentDetail.academic_year_id'=>$academic_year_id,
				'StudentDetail.add_class_id'=>$class_id),
				'fields'=>array('StudentDetail.id','StudentDetail.student_name',
				'StudentDetail.academic_year_id','AddClass.class_name'),
				"order"=>'StudentDetail.student_name');
				$student_details=$this->StudentDetail->find('all',$condition);
				$this->set('student_details',$student_details);
				//print_r($student_details);
			}
		
		}
		
		public function UnitTestMarksEntry()
		{
			$this->_userSessionCheckout();
			//print_r($this->request->data);
			configure::write('debug',0);
			
			
			if(!empty($this->request->data))
			{
				$this->request->data['UnitTest']['date']=date('Y-m-d', strtotime($this->request->data['UnitTest']['date']));
				 $count=count($this->request->data['student_detail_id']);
				
													$this->UnitTest->save($this->request->data);
												 $id=$this->UnitTest->id;
				for($i=0;$i<$count;$i++)
				{
					
					if($this->request->data['marks'][$i]!='')
					{
						
					
												
												//print_r($id);
												for($k=0;$k<1;$k++){
													$assignData=array('UnitTestDetail'=>array(
													'unit_test_id'=>$id,
													'student_detail_id'=>$this->request->data['student_detail_id'][$i],
													'marks'=>$this->request->data['marks'][$i][$k],
													)
													);
													$this->UnitTestDetail->saveAll($assignData);
												}
													
				}
				
			
				}
				$unit_test_marks = $this->Session->setFlash("<div class='alert alert-success fade in' style='height:50px'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>Marks Saved.</div>");
				$this->redirect(array("controller"=>"Exam","action"=>"UnitTestMarks"));
				
			}
			
		}
		
		/* Unit Test Marks List */
		public function UnitTestMarksList()
		{
			$this->_userSessionCheckout();
			//configure::write('debug',2);
			$this->layout="ptes_admin"; 
			$this->_getClass();
			$this->_getAcademicYear();
			$this->_getSection();
			
			
			
			if(!empty($this->request->data))
			{
				//print_r($this->request->data);
				$academic_year = $this->request->data['UnitTest']['academic_year_id'];
				$add_class_id = $this->request->data['UnitTest']['add_class_id'];
				$from_date = $this->request->data['UnitTest']['from_date'];
				$to_date=$this->request->data['UnitTest']['to_date'];
				
				$this->StudentDetail->unbindModel(array('hasMany'=>"SchoolIndividualSms"));
				
				$conditions = array('conditions'=>array("StudentDetail.academic_year_id"=>$academic_year, 
					"StudentDetail.add_class_id"=>$add_class_id),
					'fields'=>array('StudentDetail.id','StudentDetail.student_name'),
					'order'=>'StudentDetail.student_name');
				
				$student_details=$this->StudentDetail->find('all',$conditions);
				$this->set('student_details',$student_details);
				//print_r($unit_test_marks);
				//print_r($student_details);
				
				
				if($from_date=='' && $to_date=='')
					{
						$conditions =array("UnitTest.academic_year_id"=>$academic_year, 
											"UnitTest.add_class_id"=>$add_class_id);
							
					}
					else
					{
						$start_date = new DateTime($from_date);
						$from_date = $start_date->format('Y-m-d');

						$end_date = new DateTime($to_date);
						$to_date = $end_date->format('Y-m-d');
					
						$conditions = array("UnitTest.academic_year_id"=>$academic_year,
							"UnitTest.add_class_id"=>$add_class_id,
							"UnitTest.date >= "=>$from_date,"UnitTest.date <= "=>$to_date);
						
					}
					$parm=array('conditions'=>$conditions);
				$unit_test = $this->UnitTest->find("all",$parm);
				//print_r($unit_test);
				
				$i=0;
				
				$student=array();
				foreach($student_details as $stud)
				{
					
					
					if($i ==0)
					{ 
						 $student[$i]['id']='#';
						$student[$i]['student_name']="Student Name";
						
					}
					else
						{
							$student[$i]['id']=$i;
							$student[$i]['student_name']=$stud['StudentDetail']['student_name'];
						
						}
					$j=0;
					foreach($unit_test as $test)
					{
						if($i ==0 )
						{
							$student[$i]['utdetails'][$j]['date']=date('d',strtotime($test['UnitTest']['date']));
							$student[$i]['utdetails'][$j]['subject']=$test['SubjectAllocation']['subject_code'];
							
							
						}
						
						
						else
						{
							foreach($test['UnitTestDetail'] as $utdetails)
							{
								if($stud['StudentDetail']['id'] == $utdetails['student_detail_id'])
								{
									
									$student[$i]['utdetails'][$j]=$utdetails['marks'];
									
									break;
								}
							}
						}
						$j++;
					}
					$i++;
				}//print_r($student);
				$this->set('details',$student);
				
				
			}	
		}
		//////////////////////////////////////////////
		////////  Unit Test Print ///////////////
		
		public function UnitTestReportPrint($academic_year_id=null,$add_class_id=null,$from_date1=null,$to_date1=null)
		{
			$this->_userSessionCheckout();
			//configure::write('debug',2);
			$this->layout="ajax"; 
			
				$academic_year =$academic_year_id; 
				$add_class_id = $add_class_id;
				
				if($from_date1 !=0 )
				 $from_date = $from_date1;
				if($to_date1 !=0 )
				$to_date = $to_date1;
			
			$this->StudentDetail->unbindModel(array('hasMany'=>"SchoolIndividualSms"));
				
				$conditions = array('conditions'=>array("StudentDetail.academic_year_id"=>$academic_year, 
					"StudentDetail.add_class_id"=>$add_class_id),
					'fields'=>array('StudentDetail.id','StudentDetail.student_name'),
					'order'=>'StudentDetail.student_name');
				
				$student_details=$this->StudentDetail->find('all',$conditions);
				$this->set('student_details',$student_details);
			
			//print_r($this->request->data);
				if($from_date=='' && $to_date=='')
					{
						$conditions =array("UnitTest.academic_year_id"=>$academic_year, 
																"UnitTest.add_class_id"=>$add_class_id);
							
					}
					else
					{
						$start_date = new DateTime($from_date);
						$from_date = $start_date->format('Y-m-d');

						$end_date = new DateTime($to_date);
						$to_date = $end_date->format('Y-m-d');
					
						$conditions = array("UnitTest.academic_year_id"=>$academic_year,
							"UnitTest.add_class_id"=>$add_class_id,
							"UnitTest.date >= "=>$from_date,"UnitTest.date <= "=>$to_date);
						
					}
					$parm=array('conditions'=>$conditions);
				$unit_test = $this->UnitTest->find("all",$parm);
				//print_r($unit_test);
				
				$i=0;
				
				$student=array();
				foreach($student_details as $stud)
				{
					
					
					if($i ==0)
					{ 
						 $student[$i]['id']='#';
						$student[$i]['student_name']="Student Name";
						
					}
					else
						{
							$student[$i]['id']=$i;
							$student[$i]['student_name']=$stud['StudentDetail']['student_name'];
						
						}
					$j=0;
					foreach($unit_test as $test)
					{
						if($i ==0 )
						{
							$student[$i]['utdetails'][$j]['date']=date('d',strtotime($test['UnitTest']['date']));
							$student[$i]['utdetails'][$j]['subject']=$test['SubjectAllocation']['subject_code'];
						}
						
						
						else
						{
							foreach($test['UnitTestDetail'] as $utdetails)
							{
								if($stud['StudentDetail']['id'] == $utdetails['student_detail_id'])
								{
									
									$student[$i]['utdetails'][$j]=$utdetails['marks'];
									
									break;
								}
							}
						}
						$j++;
					}
					$i++;
				}
				//print_r($student);
				$this->set('details',$student);
		}
		
		
		
		
		/*Unit Test Print */
		
		/*      Unit test list         */
		
		
		public function UnitTestList()
		{
			$this->_userSessionCheckout();
			//configure::write('debug',2);
			$this->layout="ptes_admin"; 
			$this->_getClass();
			$this->_getAcademicYear();
			$this->_getSection();
			//$this->_getSubject();
			
			
			
			if(!empty($this->request->data))
			{
				
				$academic_year = $this->request->data['UnitTest']['academic_year_id'];
				$add_class_id = $this->request->data['UnitTest']['add_class_id'];
				//$subject_id = $this->request->data['UnitTest']['subject'];
				$from_date = $this->request->data['UnitTest']['from_date'];
				$to_date=$this->request->data['UnitTest']['to_date'];
				//print_r($this->request->data);
				
				if($from_date=='' && $to_date=='')
					{
						$conditions =array("UnitTest.academic_year_id"=>$academic_year, 
											"UnitTest.add_class_id"=>$add_class_id,
												);
								
							print_r($conditions);
					}
					else
					{
						$start_date = new DateTime($from_date);
						$from_date = $start_date->format('Y-m-d');

						$end_date = new DateTime($to_date);
						$to_date = $end_date->format('Y-m-d');
					
						$conditions = array("UnitTest.academic_year_id"=>$academic_year,
							"UnitTest.add_class_id"=>$add_class_id,"UnitTest.date >= "=>$from_date,"UnitTest.date <= "=>$to_date);
						
					}
					$parm=array('conditions'=>$conditions);
				$unit_test = $this->UnitTest->find("all",$parm);
				//print_r($unit_test);
				$this->set('details',$unit_test);
				
				
			}	
		}
		
		/* Delete Test Details */
		
		public function deleteTest($id=null)
		{
			$this->_userSessionCheckout();
			$this->UnitTest->delete($id);
			$this->Session->setFlash("<div class='alert alert-success fade in' style='height:50px'>
			<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>Deleted Succesfully</div>");
			$this->redirect(array("controller"=>"Exam","action"=>"UnitTestList"));
           
		}
		/* Delete Test Details END*/
		
		/* Edit Test Details */
		
		public function UnitTestEdit($id=null,$date=null,$add_class_id=null,$academic_year_id=null)
		{
			$this->_userSessionCheckout();
			
			$this->layout="ptes_admin"; 
			//configure::write('debug',2);
			//print_r($this->request->data);
			
			if(!empty($this->request->data))
			{
				$count=count($this->request->data['student_detail_id']);
				for($i=0;$i<$count;$i++)
				{
					$assignData=array('UnitTestDetail'=>array(
					'id'=>$this->request->data['id'][$i],
					'unit_test_id'=>$this->request->data['unit_test_id'][$i],
					'student_detail_id'=>$this->request->data['student_detail_id'][$i],
					'marks'=>$this->request->data['marks'][$i]));
					$this->UnitTestDetail->saveAll($assignData);
				}
				$unit_test_marks = $this->Session->setFlash("<div class='alert alert-success fade in' style='height:50px'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>Marks Saved.</div>");
				$this->redirect(array("controller"=>"Exam","action"=>"UnitTestList"));
			}
			
			$this->StudentDetail->unbindModel(array('hasMany'=>"SchoolIndividualSms"));
			$condition_stud = array("conditions"=>array("StudentDetail.academic_year_id"=>$academic_year_id,
						"StudentDetail.add_class_id"=>$add_class_id),
						"fields"=>array("StudentDetail.id","StudentDetail.student_name","StudentDetail.academic_year_id"),
				"order"=>'StudentDetail.student_name');
				

				$students = $this->StudentDetail->find("all",$condition_stud);
				$this->set('students',$students);
				//print_r($students);
			
			$conditions = array("conditions"=>array("UnitTest.academic_year_id"=>$academic_year_id,
						"UnitTest.add_class_id"=>$add_class_id,
						"UnitTest.date "=>$date));
				

				$unit_test_marks = $this->UnitTest->find("all",$conditions);
				$this->set('unit_test_marks',$unit_test_marks);
				//print_r($unit_test_marks);
				
				$marks=array();
				$stud=array();
				
				foreach($students as $student)
				{
					foreach($unit_test_marks as $list)
					{
						foreach($list['UnitTestDetail'] as $details)
						{
							if($student['StudentDetail']['id'] == $details ['student_detail_id'])
							{
								$marks=array($details['id'],$list['UnitTest']['id'],$details['student_detail_id'],$student['StudentDetail']['student_name'],$details['marks']);
								break;
							}
						}
					}
					$stud[]=$marks;
				}
				$this->set('marks',$stud);
				//print_r($stud);
		}
		
		
		/* Edit Test Details END */
		
		
	/*-----------------------------------------------------------unit test End-------------------------------------------------------*/
}

