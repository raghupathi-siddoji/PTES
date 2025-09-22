<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
	
/*	public function _userSessionCheckout()
	{
		if(!$this->Session->check("UserSession"))
		{
			//$this->Session->setFlash('You need to be logged in to access this area.'); 
			$this->redirect(array("controller"=>"Homes","action"=>"UserRegistration"));
			exit();
		} 
		//echo "session alive";
	}
	
	/*  Admin login checkout 
	public function _adminSessionCheckout()
	{
		if(!$this->Session->check("AdminSession"))
		{
			$this->redirect(array("controller"=>"Admin","action"=>"index"));
			exit();
		}
	}
	
	public function _autoComplete()
	{
		$item=$this->Product->find('list',array('fields'=>'item_name'));
		$item_lst='"'.implode('","',$item).'"';
		$this->set('item_list',$item_lst); 		 
	}*/
	public function _selectDropDown()
		{
			/* Get Class Dropdown Select List */
			$class_list=$this->AddClass->find('all');
			$class_array = array();
			if(!empty($class_list))
			{
				foreach($class_list as $class)
				{ 
					$class_array[$class['AddClass']['id']] = $class['AddClass']['class'];
				}
			}
			$this->set('classes',$class_array);
			
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
			
			/* Get Blood Group Dropdown Select List */
			$blood_group_list=$this->BloodGroup->find('all');
			$group_array = array();
			if(!empty($blood_group_list))
			{
				foreach($blood_group_list as $blood)
				{ 
					$group_array[$blood['BloodGroup']['id']] = $blood['BloodGroup']['blood_group'];
				}
			}
			$this->set('bloodgroup_list',$group_array);
			
			/* Get Caste Dropdown Select List */
			$caste_list=$this->Caste->find('all');
			$caste_array = array();
			if(!empty($caste_list))
			{
				foreach($caste_list as $caste)
				{ 
					$caste_array[$caste['Caste']['id']] = $caste['Caste']['caste'];
				}
			}
			$this->set('listcaste',$caste_array);
			
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
			
			/* Get Mother Tongue Dropdown Select List */
			$mother_tongue_list=$this->MotherTongue->find('all');
			$motherTongue_array = array();
			if(!empty($mother_tongue_list))
			{
				foreach($mother_tongue_list as $get)
				{ 
					$motherTongue_array[$get['MotherTongue']['id']] = $get['MotherTongue']['mother_tongue'];
				}
			}
			$this->set('listMotherTongue',$motherTongue_array);
			
			/* Get Religion Dropdown Select List */
			$religion_list=$this->Religion->find('all');
			$religion_array = array();
			if(!empty($religion_list))
			{
				foreach($religion_list as $get_religion)
				{ 
					$religion_array[$get_religion['Religion']['id']] = $get_religion['Religion']['religion'];
				}
			}
			$this->set('listReligion',$religion_array);
			
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
			
			/* Get SubCaste Dropdown Select List */
			$subcaste_list=$this->SubCaste->find('all');
			$SubCaste_array = array();
			if(!empty($subcaste_list))
			{
				foreach($subcaste_list as $get_SubCaste)
				{ 
					$SubCaste_array[$get_SubCaste['SubCaste']['id']] = $get_SubCaste['SubCaste']['subcaste'];
				}
			}
			$this->set('listSubCaste',$SubCaste_array);
		}
		
		public function mgntFeeClasswisePayableAmount($class_id=null, $academic_year_id=null)
		{
			  	
			$conditions = array("conditions"=>array("StudentDetail.add_class_id"=>$class_id,"StudentDetail.academic_year_id"=>$academic_year_id));
			//print_r($conditions);
			$student_list = $this->StudentDetail->find("all",$conditions);
			
			$mgnt_class_amount_ = 0;
			$mgnt_total_class_amount_ = 0;
			
			for($i=0;$i<count($student_list);$i++)
			{			
				
				$rte_or_not = $student_list[$i]['StudentDetail']['admitting_under_rte'];
				if($rte_or_not!="yes")
				{
					 
					$student_id = $student_list[$i]['StudentDetail']['id'];
					$class = $student_list[$i]['StudentDetail']['add_class_id'];
					$academic_year_id = $student_list[$i]['StudentDetail']['academic_year_id'];
					$caste_id = $student_list[$i]['Caste']['caste'];
					$mpm_non_mpm = $student_list[$i]['StudentDetail']['mpm_employee']; 
					$mgnt_fee_type = "Mgnt"; 
					$apply_for = $student_list[$i]['StudentDetail']['mpm_employee'];
					if($caste_id=="SC" || $caste_id=="ST")
					{
						$caste_id = "SC/ST";
					} 
					//FOR GETTING THE MGNT COURSE FEE FOR EACH CLASS 
					$mgnt_condition=array('conditions'=>array('academic_year_id'=>$academic_year_id,'add_class_id'=>$class,
									'caste_id'=>$caste_id,'fee_type'=>$mgnt_fee_type,'apply_for'=>$apply_for),"fields"=>array('FeeClassWises.total_payable'),'recursive'=>0); 
					$mgnt_class_amount_=$this->FeeClassWises->find('all',$mgnt_condition); 
					$mgnt_total_class_amount_ = $mgnt_total_class_amount_ + $mgnt_class_amount_[0]['FeeClassWises']['total_payable'];  
				}	
				  
			} return $mgnt_total_class_amount_;
			
		}
		
		public function govtFeeClasswisePayableAmount($class_id=null, $academic_year_id=null)
		{
			  	
			$conditions = array("conditions"=>array("StudentDetail.add_class_id"=>$class_id,"StudentDetail.academic_year_id"=>$academic_year_id));
			//print_r($conditions);
			$student_list = $this->StudentDetail->find("all",$conditions); 
			
			$govt_class_amount_ = 0;
			$govt_total_class_amount_ = 0;
			$mgnt_condition = ''; 
			for($i=0;$i<count($student_list);$i++)
			{			
				
				$rte_or_not = $student_list[$i]['StudentDetail']['admitting_under_rte'];
				if($rte_or_not!="yes")
				{
					$student_id = $student_list[$i]['StudentDetail']['id'];
					$class = $student_list[$i]['StudentDetail']['add_class_id'];
					$academic_year_id = $student_list[$i]['StudentDetail']['academic_year_id'];
					$caste_id = $student_list[$i]['Caste']['caste'];
					$mpm_non_mpm = $student_list[$i]['StudentDetail']['mpm_employee'];
					$govt_fee_type = "Govt";  
					$apply_for = $student_list[$i]['StudentDetail']['mpm_employee'];
					if($caste_id=="SC" || $caste_id=="ST")
					{
						$caste_id = "SC/ST";
					} 
					//FOR GETTING THE MGNT COURSE FEE FOR EACH CLASS 
					$condition=array('conditions'=>array('academic_year_id'=>$academic_year_id,'add_class_id'=>$class,
										'caste_id'=>$caste_id,'fee_type'=>$govt_fee_type),"fields"=>array('FeeClassWises.total_payable'),'recursive'=>0);
					$govt_class_amount_=$this->FeeClassWises->find('all',$condition);  
					$govt_total_class_amount_ = $govt_total_class_amount_ + $govt_class_amount_[0]['FeeClassWises']['total_payable'];  
					//print_r($govt_class_amount_);
				}	
				  
			} return $govt_total_class_amount_;
			
		}
		
		public function rteFeeClasswisePayableAmount($class_id=null, $academic_year_id=null)
		{
			  	
			$conditions = array("conditions"=>array("StudentDetail.add_class_id"=>$class_id,"StudentDetail.academic_year_id"=>$academic_year_id));
			//print_r($conditions);
			$student_list = $this->StudentDetail->find("all",$conditions); 
			
			$rte_class_amount_ = 0;
			$rte_total_class_amount_ = 0;
			$mgnt_condition = ''; 
			$rte_fee_type = "RTE";
			
			for($i=0;$i<count($student_list);$i++)
			{			
				
				$rte_or_not = $student_list[$i]['StudentDetail']['admitting_under_rte'];
				if($rte_or_not=="yes")
				{
					$student_id = $student_list[$i]['StudentDetail']['id'];
					$class = $student_list[$i]['StudentDetail']['add_class_id'];
					$academic_year_id = $student_list[$i]['StudentDetail']['academic_year_id'];
					$lang = "Sanskrit";
					 
					if($class=="8" || $class=="9" || $class=="10")
					{
						$rte_conditions= array("conditions"=>array("FeeClassWises.academic_year_id"=>$academic_year_id,'FeeClassWises.add_class_id'=>$class,
											'FeeClassWises.apply_for'=>$lang,'FeeClassWises.fee_type'=>$rte_fee_type),"fields"=>array('FeeClassWises.total_payable'),'recursive'=>0);
											
					}
					else
					{
					
						$rte_conditions= array("conditions"=>array("FeeClassWises.academic_year_id"=>$academic_year_id,'FeeClassWises.add_class_id'=>$class,'FeeClassWises.fee_type'=>$rte_fee_type),"fields"=>array('FeeClassWises.total_payable'),'recursive'=>0);  
					}
						
					$rte_class_amount_=$this->FeeClassWises->find('all',$rte_conditions); 
					$rte_total_class_amount_ = $rte_total_class_amount_ + $rte_class_amount_[0]['FeeClassWises']['total_payable'];  
				}	
				  
			} return  $rte_total_class_amount_;
			
		}
		
		/*Exam Controller Dropdown*/
		public function _examTypeDropDown()
		{
			
			/* Get Class Dropdown Select List */
			$exam_list=$this->CreateExam->find('all');
			$exam_array = array();
			if(!empty($exam_list))
			{
				foreach($exam_list as $exam)
				{ 
					$exam_array[$exam['CreateExam']['exam_type']] = $exam['CreateExam']['exam_type'];
				}
			}
			$this->set('exams',$exam_array);
		}
		
		/*Library Management Controller Dropdown*/
		public function _libraryDropDown()
		{
			/* Get Author Dropdown Select List */
			$author_list=$this->BookAuthor->find('all');
			$author_array = array();
			if(!empty($author_list))
			{
				foreach($author_list as $author)
				{ 
					$author_array[$author['BookAuthor']['id']] = $author['BookAuthor']['author_name_one'];
				}
			}
			$this->set('authors',$author_array);
			
			/* Get Category Dropdown Select List */
			$category_list=$this->BookCategory->find('all');
			$category_array = array();
			if(!empty($category_list))
			{
				foreach($category_list as $category)
				{ 
					$category_array[$category['BookCategory']['id']] = $category['BookCategory']['category_name'];
				}
			}
			$this->set('categories',$category_array);
			
			/* Get Language Dropdown Select List */
			$language_list=$this->BookLanguage->find('all');
			$language_array = array();
			if(!empty($language_list))
			{
				foreach($language_list as $language)
				{ 
					$language_array[$language['BookLanguage']['id']] = $language['BookLanguage']['language'];
				}
			}
			$this->set('languages',$language_array);
			
			/* Get Location Dropdown Select List */
			$location_list=$this->BookLocation->find('all');
			$location_array = array();
			if(!empty($location_list))
			{
				foreach($location_list as $location)
				{ 
					$location_array[$location['BookLocation']['id']] = $location['BookLocation']['book_location'];
				}
			}
			$this->set('locations',$location_array);
			
			/* Get Publisher Dropdown Select List */
			$publisher_list=$this->BookPublisher->find('all');
			$publisher_array = array();
			if(!empty($publisher_list))
			{
				foreach($publisher_list as $publisher)
				{ 
					$publisher_array[$publisher['BookPublisher']['id']] = $publisher['BookPublisher']['publisher_name'];
				}
			}
			$this->set('publishers',$publisher_array);
			
			/* Get Language Dropdown Select List */
			$vendor_list=$this->BookVendor->find('all');
			$vendor_array = array();
			if(!empty($vendor_list))
			{
				foreach($vendor_list as $vendor)
				{ 
					$vendor_array[$vendor['BookVendor']['id']] = $vendor['BookVendor']['vendor_name'];
				}
			}
			$this->set('vendors',$vendor_array);
			
			/* Get Book Title Dropdown Select List */
			$book_title_list=$this->BookDetail->find('all');
			$book_array = array();
			if(!empty($book_title_list))
			{
				foreach($book_title_list as $book)
				{ 
					$book_array[$book['BookDetail']['id']] = $book['BookDetail']['title'];
				}
			}
			$this->set('book_lists',$book_array);
			
		}
		public function _userSessionCheckout()
		{
			if(!$this->Session->check("UserSession"))
			{
				$this->Session->setFlash('You need to be logged in to access this area.'); 
				$this->redirect(array("controller"=>"Admin","action"=>"index"));
				exit();
			} 
			//echo "session alive";
		}
		
		

}
