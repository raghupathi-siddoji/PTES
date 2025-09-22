<?php 
 
class SettingController extends AppController {

 
	public $uses = array('ApplicationFee','AcademicYear','BloodGroup','Caste','AddClass','State','Taluk','Language','MotherTongue','Religion','ActivitieSetting','SubCaste','Section','District','Designation','Qualification','ApplicationAmount');
	public $helpers = array('Html', 'Form', 'Js','Session');

/*--------------------------------------Academic Year Master Settting-----------------------------------------------*/	
		public function academicYear($id=null)
		{
			$this->_userSessionCheckout();
			$this->layout="ptes_admin";
			if(!empty($this->request->data))
			{
				$condition=array('conditions'=>array('AcademicYear.academic_year'=>$this->request->data['AcademicYear']['academic_year']));
				$check=$this->AcademicYear->find('all',$condition);
				
				if(empty($check))
				{
					$this->AcademicYear->save($this->request->data);
					$this->Session->setFlash("<div class='alert alert-success fade in' style='height:50px'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>Record Inserted</div>");
					$this->redirect('/Setting/academicYear');
				}
				else
				{
					$this->Session->setFlash("<div class='alert alert-danger fade in' style='height:50px'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-wrong'></i>The record already exists</div>");
					$this->redirect('/Setting/academicYear');
				}
			}
			else if(empty($this->request->data))
			{
				$this->request->data=$this->AcademicYear->read(null,$id);
			}
			
			/* Display Academic Year List*/
			$academic_year_list=$this->AcademicYear->find('all');
			$this->set("list",$academic_year_list); 
		}
		
		/*Delete AcademicYear Entry*/
		public function academicYearDelete($id=null)
		{
			$this->_userSessionCheckout();
			$this->AcademicYear->delete($id);
			$this->Session->setFlash("<div class='alert alert-success fade in' style='height:50px'>
			<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>Deleted Succesfully</div>");
			$this->redirect('/Setting/academicYear');
		}
/*----------------------------------------------------------------------------------------*/	
		
/*--------------------------------------Blood Group Master Settting------------------------------------------*/	
		public function bloodGroup($id=null)
		{
			$this->_userSessionCheckout();
			$this->layout="ptes_admin";
			if(!empty($this->request->data))
			{
				//$condition_blood_group=array('conditions'=>array('BloodGroup.blood_group'=>$this->request->data['BloodGroup']['blood_group']));
				$condition_blood_group=array('BloodGroup.blood_group'=>$this->request->data['BloodGroup']['blood_group']);
				$check_blood_group=$this->BloodGroup->hasAny($condition_blood_group);
				
				if($check_blood_group)
				{
					
					$this->Session->setFlash("<div class='alert alert-danger fade in' style='height:50px'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>The record already exists</div>");
					$this->redirect('/Setting/bloodGroup');
				}
				else
				{
					$this->BloodGroup->save($this->request->data);
					$this->Session->setFlash("<div class='alert alert-success fade in' style='height:50px'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>Record Inserted</div>");
					$this->redirect('/Setting/bloodGroup');
				}
			}
			else if(empty($this->request->data))
			{
				$this->request->data=$this->BloodGroup->read(null,$id);
			}
			
			/* Display Blood Group List*/
			$blood_group=$this->BloodGroup->find('all');
			$this->set("list",$blood_group); 
		}
		
		/*Delete Blood Group Entry*/
		public function bloodGroupDelete($id=null)
		{
			$this->_userSessionCheckout();
			$this->BloodGroup->delete($id);
			$this->Session->setFlash("<div class='alert alert-success fade in' style='height:50px'>
			<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>Deleted Succesfully</div>");
			$this->redirect('/Setting/bloodGroup');
		}
/*----------------------------------------------------------------------------------------*/	

/*--------------------------------------Caste Master Settting--------------------------------------------------*/	
		public function caste($id=null)
		{
			$this->_userSessionCheckout();
			$this->layout="ptes_admin";
			if(!empty($this->request->data))
			{
				$condition_caste=array('conditions'=>array('Caste.caste'=>$this->request->data['Caste']['caste']));
				$check_caste=$this->Caste->find('all',$condition_caste);
				
				if(empty($check_caste))
				{
					$this->Caste->save($this->request->data);
						$this->Session->setFlash("<div class='alert alert-success fade in' style='height:50px'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>Record Inserted</div>");
					$this->redirect('/Setting/caste');
				}
				else
				{
					$this->Session->setFlash("<div class='alert alert-danger fade in' style='height:50px'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>The record already exists</div>");
					$this->redirect('/Setting/caste');
				}
			}
			else if(empty($this->request->data))
			{
				$this->request->data=$this->Caste->read(null,$id);
			}
			
			/* Display Caste List*/
			$caste=$this->Caste->find('all');
			$this->set("list",$caste); 
		}
		
		/*Delete Caste Entry*/
		public function casteDelete($id=null)
		{
			$this->_userSessionCheckout();
			$this->Caste->delete($id);
			$this->Session->setFlash("<div class='alert alert-success fade in' style='height:50px'>
			<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>Deleted Succesfully</div>");
			$this->redirect('/Setting/caste');
		}
/*----------------------------------------------------------------------------------------*/	

/*--------------------------------------Class Master Settting--------------------------------------------------*/	
		public function addClass($id=null)
		{
			$this->_userSessionCheckout();
			$this->layout="ptes_admin";
			if(!empty($this->request->data))
			{
				$condition_class=array('conditions'=>array('AddClass.class'=>$this->request->data['AddClass']['class'],'AddClass.class_name'=>$this->request->data['AddClass']['class_name']));
				$check_class=$this->AddClass->find('all',$condition_class);
	
				if(empty($check_class))
				{
					$this->AddClass->save($this->request->data);
						$this->Session->setFlash("<div class='alert alert-success fade in' style='height:50px'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>Record Inserted</div>");
					$this->redirect('/Setting/addClass');
				}
				else
				{
					$this->Session->setFlash("<div class='alert alert-danger fade in' style='height:50px'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>The record already exists</div>");
					$this->redirect('/Setting/addClass');
				}
				exit();
			}
			else if(empty($this->request->data))
			{
				$this->request->data=$this->AddClass->read(null,$id);
			}
			
			/* Display Class List*/
			$lang=$this->AddClass->find('all');
			$this->set("list",$lang); 
		}
		
		/*Delete Class Entry*/
		public function classDelete($id=null)
		{
			$this->_userSessionCheckout();
			$this->AddClass->delete($id);
			$this->Session->setFlash("<div class='alert alert-success fade in' style='height:50px'>
			<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>Deleted Succesfully</div>");
			$this->redirect('/Setting/addClass');
		}
/*-------------------------------------------------------------------------------------------*/	

/*-------------------------------------Langvuage Settting--------------------------------------------------*/	
		public function language($id=null)
		{
			$this->_userSessionCheckout();
			$this->layout="ptes_admin";
			if(!empty($this->request->data))
			{
				$condition_language=array('conditions'=>array('Language.language'=>$this->request->data['Language']['language']));
				$check_language=$this->Language->find('all',$condition_language);
				
				if(empty($check_language))
				{
					$this->Language->save($this->request->data);
						$this->Session->setFlash("<div class='alert alert-success fade in' style='height:50px'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>Record Inserted</div>");
					$this->redirect('/Setting/language');
				}
				else
				{
					$this->Session->setFlash("<div class='alert alert-danger fade in' style='height:50px'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>The record already exists</div>");
					$this->redirect('/Setting/language');
				}
				
			}
			else if(empty($this->request->data))
			{
				$this->request->data=$this->Language->read(null,$id);
			}
			
			/* Display Language List*/
			$caste=$this->Language->find('all');
			$this->set("list",$caste); 
		}
		
		/*Delete Language Entry*/
		public function languageDelete($id=null)
		{
			$this->_userSessionCheckout();
			$this->Language->delete($id);
			$this->Session->setFlash("<div class='alert alert-success fade in' style='height:50px'>
			<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>Deleted Succesfully</div>");
			$this->redirect('/Setting/language');
		}
/*-------------------------------------------------------------------------------------------*/	

/*-------------------------------------Mother Tongue Settting--------------------------------------------------*/	
		public function motherTongue($id=null)
		{
			$this->_userSessionCheckout();
			$this->layout="ptes_admin";
			if(!empty($this->request->data))
			{
				$condition=array('conditions'=>array('MotherTongue.mother_tongue'=>$this->request->data['MotherTongue']['mother_tongue']));
				$check=$this->MotherTongue->find('all',$condition);
				
				if(empty($check))
				{
					$this->MotherTongue->save($this->request->data);
						$this->Session->setFlash("<div class='alert alert-success fade in' style='height:50px'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>Record Inserted</div>");
					$this->redirect('/Setting/motherTongue');
				}
				else
				{
					$this->Session->setFlash("<div class='alert alert-danger fade in' style='height:50px'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>The record already exists</div>");
					$this->redirect('/Setting/motherTongue');
				}
			}
			else if(empty($this->request->data))
			{
				$this->request->data=$this->MotherTongue->read(null,$id);
			}
			
			/* Display Mother Tongue List*/
			$mothertongue=$this->MotherTongue->find('all');
			$this->set("list",$mothertongue); 
		}
		
		/*Delete Mother Tongue Entry*/
		public function motherTongueDelete($id=null)
		{
			$this->_userSessionCheckout();
			$this->MotherTongue->delete($id);
			$this->Session->setFlash("<div class='alert alert-success fade in' style='height:50px'>
			<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>Deleted Succesfully</div>");
			$this->redirect('/Setting/motherTongue');
		}
/*-------------------------------------------------------------------------------------------*/	

/*-------------------------------------Religion Master Setting---------------------------------*/	
		public function religion($id=null)
		{
			$this->_userSessionCheckout();
			$this->layout="ptes_admin";
			if(!empty($this->request->data))
			{
				$condition=array('conditions'=>array('Religion.religion'=>$this->request->data['Religion']['religion']));
				$check=$this->Religion->find('all',$condition);
				
				if(empty($check))
				{
					$this->Religion->save($this->request->data);
						$this->Session->setFlash("<div class='alert alert-success fade in' style='height:50px'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>Record Inserted</div>");
					$this->redirect('/Setting/religion');
				}
				else
				{
					$this->Session->setFlash("<div class='alert alert-danger fade in' style='height:50px'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>The record already exists</div>");
					$this->redirect('/Setting/religion');
				}
			}
			else if(empty($this->request->data))
			{
				$this->request->data=$this->Religion->read(null,$id);
			}
			
			/* Display Religion List*/
			$religion=$this->Religion->find('all');
			$this->set("list",$religion); 
		}
		
		/*Delete Religion Entry*/
		public function religionDelete($id=null)
		{
			$this->_userSessionCheckout();
			$this->Religion->delete($id);
			$this->Session->setFlash("<div class='alert alert-success fade in' style='height:50px'>
			<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>Deleted Succesfully</div>");
			$this->redirect('/Setting/religion');
		}
/*-------------------------------------------------------------------------------------------*/	

/*-------------------------------------Section Master Setting------------------------------------*/	
		public function section($id=null)
		{
			$this->_userSessionCheckout();
			$this->layout="ptes_admin";
			if(!empty($this->request->data))
			{
				$condition=array('conditions'=>array('Section.section'=>$this->request->data['Section']['section']));
				$check=$this->Section->find('all',$condition);
				
				if(empty($check))
				{
					$this->request->data['Section']['section']=ucfirst($this->request->data['Section']['section']);
					$this->Section->save($this->request->data);
					$this->Session->setFlash("<div class='alert alert-success fade in' style='height:50px'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>Record Inserted</div>");
					$this->redirect('/Setting/section');
				}
				else
				{
					$this->Session->setFlash("<div class='alert alert-danger fade in' style='height:50px'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>The record already exists</div>");
					$this->redirect('/Setting/section');
				}
			}
			else if(empty($this->request->data))
			{
				$this->request->data=$this->Section->read(null,$id);
			}
			
			/* Display Section List*/
			$section=$this->Section->find('all');
			$this->set("list",$section); 
		}
		
		/*Delete Section Entry*/
		public function sectionDelete($id=null)
		{
			$this->_userSessionCheckout();
			$this->Section->delete($id);
			$this->Session->setFlash("<div class='alert alert-success fade in' style='height:50px'>
			<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>Deleted Succesfully</div>");
			$this->redirect('/Setting/section');
		}
/*-------------------------------------------------------------------------------------------*/	

/*-------------------------------------Sub Caste Master Setting-------------------------------*/	
		public function subCaste($id=null)
		{
			$this->_userSessionCheckout();
			$this->layout="ptes_admin";
			if(!empty($this->request->data))
			{
				$condition=array('conditions'=>array('SubCaste.subcaste'=>$this->request->data['SubCaste']['subcaste']));
				$check=$this->SubCaste->find('all',$condition);
				
				if(empty($check))
				{	
					$this->SubCaste->save($this->request->data);
						$this->Session->setFlash("<div class='alert alert-success fade in' style='height:50px'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>Record Inserted</div>");
					$this->redirect('/Setting/subCaste');
				}
				else
				{
					$this->Session->setFlash("<div class='alert alert-danger fade in' style='height:50px'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>The record already exists</div>");
					$this->redirect('/Setting/subCaste');
				}
			}
			else if(empty($this->request->data))
			{
				$this->request->data=$this->SubCaste->read(null,$id);
			}
			
			/* Display Sub Caste List*/
			$subcaste=$this->SubCaste->find('all');
			$this->set("list",$subcaste); 
		}
		
		/*Delete Sub Caste Entry*/
		public function subCasteDelete($id=null)
		{
			$this->_userSessionCheckout();
			$this->SubCaste->delete($id);
			$this->Session->setFlash("<div class='alert alert-success fade in' style='height:50px'>
			<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>Deleted Succesfully</div>");
			$this->redirect('/Setting/subCaste');
		}
/*-------------------------------------------------------------------------------------------*/	

/*-------------------------------------Designation Master Setting-------------------------------*/	
		public function designation($id=null)
		{
			$this->_userSessionCheckout();
			$this->layout="ptes_admin";
			if(!empty($this->request->data))
			{
				$condition=array('conditions'=>array('Designation.designation'=>$this->request->data['Designation']['designation']));
				$check=$this->Designation->find('all',$condition);
				
				if(empty($check))
				{	
					$this->Designation->save($this->request->data);
						$this->Session->setFlash("<div class='alert alert-success fade in' style='height:50px'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>Record Inserted</div>");
					$this->redirect('/Setting/designation');
				}
				else
				{
					$this->Session->setFlash("<div class='alert alert-danger fade in' style='height:50px'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>The record already exists</div>");
					$this->redirect('/Setting/designation');
				}
			}
			else if(empty($this->request->data))
			{
				$this->request->data=$this->Designation->read(null,$id);
			}
			
			/* Display Designation List*/
			$designation=$this->Designation->find('all');
			$this->set("list",$designation); 
		}
		
		/*Delete Designation Entry*/
		public function designationDelete($id=null)
		{
			$this->_userSessionCheckout();
			$this->Designation->delete($id);
			$this->Session->setFlash("<div class='alert alert-success fade in' style='height:50px'>
			<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>Deleted Succesfully</div>");
			$this->redirect('/Setting/designation');
		}
/*-------------------------------------------------------------------------------------------*/	

/*-------------------------------------Qualification Master Setting-------------------------------*/	
		public function qualification($id=null)
		{
			$this->_userSessionCheckout();
			$this->layout="ptes_admin";
			if(!empty($this->request->data))
			{
				$condition=array('conditions'=>array('Qualification.qualification'=>$this->request->data['Qualification']['qualification']));
				$check=$this->Qualification->find('all',$condition);
				
				if(empty($check))
				{	
					$this->Qualification->save($this->request->data);
					$this->Session->setFlash("<div class='alert alert-success fade in' style='height:50px'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>Record Inserted</div>");
					$this->redirect('/Setting/qualification');
				}
				else
				{
					$this->Session->setFlash("<div class='alert alert-danger fade in' style='height:50px'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>The record already exists</div>");
					$this->redirect('/Setting/qualification');
				}
			}
			else if(empty($this->request->data))
			{
				$this->request->data=$this->Qualification->read(null,$id);
			}
			
			/* Display Qualification List*/
			$qualification=$this->Qualification->find('all');
			$this->set("list",$qualification); 
		}
		
		/*Delete Sub Caste Entry*/
		public function qualificationDelete($id=null)
		{
			$this->_userSessionCheckout();
			$this->Qualification->delete($id);
			$this->Session->setFlash("<div class='alert alert-success fade in' style='height:50px'>
			<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>Deleted Succesfully</div>");
			$this->redirect('/Setting/qualification');
		}
/*-------------------------------------------------------------------------------------------*/	
		public function applicationAmount($id=null)
		{
			$this->_userSessionCheckout();
			$this->layout="ptes_admin";
			if(!empty($this->request->data))
			{
				$this->ApplicationAmount->save($this->request->data);
				if(!empty($id))
				{
					$this->Session->setFlash("<div class='alert alert-success fade in' style='height:50px'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>Record Updated</div>");
					$this->redirect('/Setting/applicationAmount');
				}
				else
				{
					$this->Session->setFlash("<div class='alert alert-success fade in' style='height:50px'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>Record Inserted</div>");
					$this->redirect('/Setting/applicationAmount');
				}				
			}
			else if(empty($this->request->data))
			{
				$this->request->data=$this->ApplicationAmount->read(null,$id);
			}
			
			/* Display Academic Year List*/
			$academic_year_list=$this->ApplicationAmount->find('all');
			$this->set("list",$academic_year_list); 
		}	
/*-------------------------------------Section Master Setting------------------------------------*/	
		public function district($id=null)
		{
			$this->_userSessionCheckout();
			$this->layout="ptes_admin";
			if(!empty($this->request->data))
			{
				$condition=array('conditions'=>array('District.district'=>$this->request->data['District']['district']));
				$check=$this->District->find('all',$condition);
				
				if(empty($check))
				{
					$this->request->data['District']['district']=ucfirst($this->request->data['District']['district']);
					$this->District->save($this->request->data);
					$this->Session->setFlash("<div class='alert alert-success fade in' style='height:50px'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>Record Inserted</div>");
					$this->redirect('/Setting/district');
				}
				else
				{
					$this->Session->setFlash("<div class='alert alert-danger fade in' style='height:50px'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>The record already exists</div>");
					$this->redirect('/Setting/district');
				}
			}
			else if(empty($this->request->data))
			{
				$this->request->data=$this->District->read(null,$id);
			}
			
			/* Display District List*/
			$district=$this->District->find('all');
			$this->set("list",$district); 
		}
		
		/*Delete District Entry*/
		public function districtDelete($id=null)
		{
			$this->_userSessionCheckout();
			$this->District->delete($id);
			$this->Session->setFlash("<div class='alert alert-success fade in' style='height:50px'>
			<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>Deleted Succesfully</div>");
			$this->redirect('/Setting/district');
		}
/*-------------------------------------------------------------------------------------------*/
/*-------------------------------------Section Master Setting------------------------------------*/	
		public function state($id=null)
		{
			$this->_userSessionCheckout();
			$this->layout="ptes_admin";
			if(!empty($this->request->data))
			{
				$condition=array('conditions'=>array('State.state'=>$this->request->data['State']['state']));
				$check=$this->State->find('all',$condition);
				
				if(empty($check))
				{
					$this->request->data['State']['state']=ucfirst($this->request->data['State']['state']);
					$this->State->save($this->request->data);
					$this->Session->setFlash("<div class='alert alert-success fade in' style='height:50px'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>Record Inserted</div>");
					$this->redirect('/Setting/state');
				}
				else
				{
					$this->Session->setFlash("<div class='alert alert-danger fade in' style='height:50px'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>The record already exists</div>");
					$this->redirect('/Setting/state');
				}
			}
			else if(empty($this->request->data))
			{
				$this->request->data=$this->State->read(null,$id);
			}
			
			/* Display State List*/
			$State=$this->State->find('all');
			$this->set("list",$State); 
		}
		
		/*Delete State Entry*/
		public function stateDelete($id=null)
		{
			$this->_userSessionCheckout();
			$this->State->delete($id);
			$this->Session->setFlash("<div class='alert alert-success fade in' style='height:50px'>
			<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>Deleted Succesfully</div>");
			$this->redirect('/Setting/state');
		}
/*-------------------------------------------------------------------------------------------*/	
/*-------------------------------------Section Master Setting------------------------------------*/	
		public function taluk($id=null)
		{
			$this->_userSessionCheckout();
			$this->layout="ptes_admin";
			if(!empty($this->request->data))
			{
				$condition=array('conditions'=>array('Taluk.taluk'=>$this->request->data['Taluk']['taluk']));
				$check=$this->Taluk->find('all',$condition);
				
				if(empty($check))
				{
					$this->request->data['Taluk']['taluk']=ucfirst($this->request->data['Taluk']['taluk']);
					$this->Taluk->save($this->request->data);
					$this->Session->setFlash("<div class='alert alert-success fade in' style='height:50px'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>Record Inserted</div>");
					$this->redirect('/Setting/taluk');
				}
				else
				{
					$this->Session->setFlash("<div class='alert alert-danger fade in' style='height:50px'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>The record already exists</div>");
					$this->redirect('/Setting/taluk');
				}
			}
			else if(empty($this->request->data))
			{
				$this->request->data=$this->Taluk->read(null,$id);
			}
			
			/* Display Taluk List*/
			$Taluk=$this->Taluk->find('all');
			$this->set("list",$Taluk); 
		}
		
		/*Delete Taluk Entry*/
		public function talukDelete($id=null)
		{
			$this->_userSessionCheckout();
			$this->Taluk->delete($id);
			$this->Session->setFlash("<div class='alert alert-success fade in' style='height:50px'>
			<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>Deleted Succesfully</div>");
			$this->redirect('/Setting/taluk');
		}
/*-------------------------------------------------------------------------------------------*/	
		public function applicationFee()
		{
			$this->_userSessionCheckout();
			$this->_userSessionCheckout();
			$this->layout="ptes_admin";

			if(!empty($this->request->data))
			{
				$this->ApplicationFee->save($this->request->data);
				$this->Session->setFlash("<div class='alert alert-success fade in' style='height:50px'>
			<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>Application fee updated Succesfully...</div>");
			$this->redirect('/Setting/applicationFee');
			}
			$this->request->data = $this->ApplicationFee->find("first");
		}
		/*-------------------------------------Password change Setting-------------------------------*/
		public function passwordChange()
		{
			$this->_userSessionCheckout();
			$this->layout="ptes_admin";

			if(!empty($this->request->data))
			{
				 
				$this->Admin->id = $this->Session->read("user_session_id");
				$this->Admin->saveField('password',$this->request->data['Admin']['new_password']);
				$this->Session->setFlash("<div class='alert alert-success fade in' style='height:50px'>
			<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>Password updated Succesfully...</div>");
			$this->redirect('/Setting/passwordChange');
			}
			
		}	
/*-------------------------------------Password change Setting-------------------------------*/	
	/*-------------------------------------Activies Master Setting-------------------------------*/	
		public function activity($id=null)
		{
			$this->layout="ptes_admin";
			if(!empty($this->request->data))
			{
				$condition=array('conditions'=>array('activity_name'=>$this->request->data['ActivitieSetting']['activity_name']));
				$check=$this->ActivitieSetting->find('all',$condition);
				
				if(empty($check))
				{	
					$this->ActivitieSetting->save($this->request->data);
					$this->Session->setFlash("<div class='alert alert-success fade in' style='height:50px'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>Record Inserted</div>");
					$this->redirect('/Setting/activity');
				}
				else
				{
					$this->Session->setFlash("<div class='alert alert-danger fade in' style='height:50px'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>Record Not Inserted</div>");
					$this->redirect('/Setting/activity');
				}
			}
			else if(empty($this->request->data))
			{
				$this->request->data=$this->ActivitieSetting->read(null,$id);
			}
			
			/* Display Activitie List*/
			$activity_list=$this->ActivitieSetting->find('all');
			$this->set("activity_list",$activity_list); 
		}
		
}
