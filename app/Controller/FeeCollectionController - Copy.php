<?php 
App::uses('NumberToWord', 'View/Helper');

class FeeCollectionController extends AppController {

 
	public $uses = array('Admin','Caste','RteFeeCollection','RteFeeCollectionDetail','GovtFeeCollection','GovtFeeCollectionDetail','FeeCollectionDetail','FeeHeadAssign','FeeClassWise','AddClass','AcademicYear','FeeCollection','FeeClassWises','FeeClassWiseDetails','StudentDetail');
	public $helpers = array('NumberToWord','Html', 'Form', 'Js','Session');

		/*Fee Head Assign*/
		public function feeHeadAssign($id=null)
		{
			$this->_userSessionCheckout();
			$this->layout="ptes_admin";
			if(!empty($this->request->data))
			{
				$condition=array('conditions'=>array('fee_head_name'=>$this->request->data['FeeHeadAssign']['fee_head_name'],
									'fee_head_type'=>$this->request->data['FeeHeadAssign']['fee_head_type'],
									'fee_head_code'=>$this->request->data['FeeHeadAssign']['fee_head_code']));
				$check=$this->FeeHeadAssign->find('all',$condition);
				
				if(empty($check))
				{
					$this->FeeHeadAssign->save($this->request->data);
					$this->Session->setFlash("<div class='alert alert-success fade in' style='height:50px'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
					<i class='fa fa-check'></i> Fee Head Saved.</div>");
					$this->redirect(array("controller"=>"FeeCollection","action"=>"feeHeadAssign"));	
				}
				else
				{
					$this->Session->setFlash("<div class='alert alert-success fade in' style='height:50px'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
					<i class='fa fa-check'></i> Fee Head Already Saved.</div>");
					$this->redirect(array("controller"=>"FeeCollection","action"=>"feeHeadAssign"));	
				}
			}
			else if(empty($this->request->data))
			{
				$this->request->data = $this->FeeHeadAssign->read(null,$id);  
			}
			$head_list = $this->FeeHeadAssign->find("all");
			$this->set("head_list",$head_list); 
		}
		public function deleteFeeHead($id=null)
		{
			$this->_userSessionCheckout();
			$this->layout="ptes_admin"; 
			$this->FeeHeadAssign->delete($id);
			$this->Session->setFlash("<div class='alert alert-danger fade in' style='height:50px'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
					<i class='fa  fa-trash-o'></i> Fee head deleted.</div>");
			$this->redirect(array("controller"=>"FeeCollection","action"=>"FeeHeadAssign"));
		} 
		/*Fee Assign for RTE*/
		public function feeAssignOther($id=null)
		{
			$this->_userSessionCheckout();
			$this->layout="ptes_admin";
			

			if(!empty($this->request->data))
			{			
				$condition=array('conditions'=>array('academic_year_id'=>$this->request->data['FeeClassWises']['academic_year_id'],
									'add_class_id'=>$this->request->data['FeeClassWises']['add_class_id'],
									'caste_id'=>$this->request->data['FeeClassWises']['caste_id'],
									'fee_type'=>$this->request->data['FeeClassWises']['fee_type'],
									'apply_for'=>$this->request->data['FeeClassWises']['apply_for']));
				$check=$this->FeeClassWises->find('all',$condition);
				
				if(empty($check))
				{
					$this->request->data['FeeClassWises']['total_payable'] = $this->request->data['total_payable'];
					$this->FeeClassWises->save($this->request->data['FeeClassWises']);
					$fee_class_id = $this->FeeClassWises->id;
					if($fee_class_id!='')
					{
						$fee_head_name = $this->request->data['FeeClassWiseDetails']['fee_head_name'];
						for($i=0;$i<count($fee_head_name);$i++)  
						{
							 $data = array(
								"FeeClassWiseDetails"=>array(
									"fee_class_wise_id"=>$fee_class_id,
									"fee_head_name"=>ucfirst($fee_head_name[$i]),
									"fee_head_code"=>$this->request->data['FeeClassWiseDetails']['fee_head_code'][$i],
									"fee_head_amount"=>$this->request->data['FeeClassWiseDetails']['fee_head_amount'][$i]
								)
							); 
							 $this->FeeClassWiseDetails->saveAll($data);  
						}
						$this->Session->setFlash("<div class='alert alert-success fade in' style='height:50px'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<i class='fa fa-check'></i> Fee Assigned Successfuly.</div>");
						$this->redirect(array("controller"=>"FeeCollection","action"=>"feeAssignOther"));
						
					}
				}
				else
				{
					$this->Session->setFlash("<div class='alert alert-warning fade in' style='height:50px'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
					<i class='fa fa-check'></i> Fee Already Assigned.</div>");
					$this->redirect(array("controller"=>"FeeCollection","action"=>"feeAssignOther"));
				}
			}
			else if(empty($this->request->data))
			{
				$this->request->data = $this->FeeClassWises->read(null,$id);
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
			
			/*Get Class */
			$Caste = $this->Caste->find('all');
			$Caste = Set::extract($Caste, '{n}.Caste');
			$Caste_array = array();
			if(!empty($Caste)){
			    foreach($Caste as $cls){ 
				$Caste_array[$cls['caste']] = $cls['caste'];
			    }
			}
			$this->set('caste_array', $Caste_array); 
			
		}
		/*Fee Assign for RTE*/
		public function feeAssignDetails($fee_type)
		{ 
			$this->_userSessionCheckout();
			$this->layout="ajax"; 
			$conditions = array("conditions"=>array("fee_head_type"=>$fee_type));
			$fee_head = $this->FeeHeadAssign->find("all",$conditions);
			$this->set("fee_head",$fee_head); 
		}
		public function listFeeAssign()
		{
			$this->_userSessionCheckout();
			$this->layout="ptes_admin";
			$list = $this->FeeClassWises->find('all');
			$this->set("class_fee_list",$list); 
			
		}
		public function deleteFeeAssign($id=null)
		{
			$this->_userSessionCheckout();
			$this->layout="ptes_admin"; 
			$this->FeeClassWises->delete($id);
			$this->Session->setFlash("<div class='alert alert-danger fade in' style='height:50px'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
					<i class='fa  fa-trash-o'></i> Fee Assign deleted.</div>");
			$this->redirect(array("controller"=>"FeeCollection","action"=>"listFeeAssign"));
		}
		public function deleteFeeAssignRte($id=null)
		{
			$this->_userSessionCheckout();
			$this->layout="ptes_admin"; 
			$this->FeeClassWises->delete($id);
			$this->Session->setFlash("<div class='alert alert-danger fade in' style='height:50px'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
					<i class='fa  fa-trash-o'></i> Fee Assign deleted.</div>");
			$this->redirect(array("controller"=>"FeeCollection","action"=>"listRteFee"));
		}
		public function editFeeAssignRte($id=null)
		{
			$this->_userSessionCheckout();
			$this->layout="ptes_admin";
			
			if(!empty($this->request->data))
			{
				//print_r($this->request->data);
				$this->FeeClassWises->save($this->request->data['FeeClassWises']);
				$fee_class_id = $this->FeeClassWises->id;
				
				$edit_id = $this->request->data['FeeClassWiseDetails']['id'];
				for($i=0;$i<count($edit_id);$i++)  
				{
					 $data = array(
						"FeeClassWiseDetails"=>array(
							"fee_class_wise_id"=>$fee_class_id,
							"fee_head_name"=>ucfirst($this->request->data['FeeClassWiseDetails']['fee_head_name'][$i]),
							"fee_head_code"=>$this->request->data['FeeClassWiseDetails']['fee_head_code'][$i],
							"fee_head_amount"=>$this->request->data['FeeClassWiseDetails']['fee_head_amount'][$i]
						)
					);
					 $this->FeeClassWiseDetails->id = $edit_id[$i];	
					 $this->FeeClassWiseDetails->save($data);  
				}
				$this->Session->setFlash("<div class='alert alert-success fade in' style='height:50px'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
					<i class='fa  fa-trash-o'></i> Updated Successfuly.</div>");
				$this->redirect(array("controller"=>"FeeCollection","action"=>"listRteFee"));
						
			}
			
			$this->request->data = $this->FeeClassWises->read(null,$id);
			 
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
		public function editFeeAssignOther($id=null)
		{
			$this->_userSessionCheckout();
			$this->layout="ptes_admin";
			
			if(!empty($this->request->data))
			{
				
				$this->FeeClassWises->save($this->request->data['FeeClassWises']);
				$fee_class_id = $this->FeeClassWises->id;
				
				$edit_id = $this->request->data['FeeClassWiseDetails']['id'];
				for($i=0;$i<count($edit_id);$i++)  
				{
					 $data = array(
						"FeeClassWiseDetails"=>array(
							"fee_class_wise_id"=>$fee_class_id,
							"fee_head_name"=>ucfirst($this->request->data['FeeClassWiseDetails']['fee_head_name'][$i]),
							"fee_head_code"=>$this->request->data['FeeClassWiseDetails']['fee_head_code'][$i],
							"fee_head_amount"=>$this->request->data['FeeClassWiseDetails']['fee_head_amount'][$i]
						)
					);
					 $this->FeeClassWiseDetails->id = $edit_id[$i];	
					 $this->FeeClassWiseDetails->save($data);  
				}
				$this->Session->setFlash("<div class='alert alert-success fade in' style='height:50px'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
					<i class='fa  fa-trash-o'></i> Updated Successfuly.</div>");
				$this->redirect(array("controller"=>"FeeCollection","action"=>"listFeeAssign"));
						
			}
			
			$this->request->data = $this->FeeClassWises->read(null,$id);
			 
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
		
		/*Fee Assign for RTE*/
		public function listRteFee()
		{
			$this->_userSessionCheckout();
			$this->layout="ptes_admin";
			$condition = array("conditions"=>array("FeeClassWises.fee_type"=>"RTE"));
			$list = $this->FeeClassWises->find('all',$condition);
			$this->set("rte_fee_list",$list);
			
		}
		
		/*Fee Assign for management*/
		public function feeAssignManagement()
		{
			$this->_userSessionCheckout();
			$this->layout="ptes_admin";
		}
		
		/*Fee Assign for Govt*/
		public function feeAssignRte($id=null)
		{
			$this->_userSessionCheckout();
			$this->layout="ptes_admin";
			
			if(!empty($this->request->data))
			{
				
				$condition=array('conditions'=>array('academic_year_id'=>$this->request->data['FeeClassWises']['academic_year_id'],
									'add_class_id'=>$this->request->data['FeeClassWises']['add_class_id'], 
									'fee_type'=>$this->request->data['FeeClassWises']['fee_type'],
									'apply_for'=>$this->request->data['FeeClassWises']['apply_for']));
				$check=$this->FeeClassWises->find('all',$condition);
				
				if(empty($check))
				{
					$this->request->data['FeeClassWises']['fee_category'] = "";
					$this->FeeClassWises->save($this->request->data['FeeClassWises']);
					$fee_class_id = $this->FeeClassWises->id;
					if($fee_class_id!='')
					{
						$edit_id = $this->request->data['FeeClassWiseDetails']['id'];
						$fee_head_name = $this->request->data['FeeClassWiseDetails']['fee_head_name'];
						for($i=0;$i<count($fee_head_name);$i++)  
						{
							 $data = array(
								"FeeClassWiseDetails"=>array(
									"fee_class_wise_id"=>$fee_class_id,
									"fee_head_name"=>ucfirst($fee_head_name[$i]),
									"fee_head_code"=>$this->request->data['FeeClassWiseDetails']['fee_head_code'][$i],
									"fee_head_amount"=>$this->request->data['FeeClassWiseDetails']['fee_head_amount'][$i]
								)
							); 
							$this->FeeClassWiseDetails->id = $edit_id[$i];
							$this->FeeClassWiseDetails->save($data);  
						}
						$this->Session->setFlash("<div class='alert alert-success fade in' style='height:50px'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<i class='fa fa-check'></i> Fee Assigned Successfuly.</div>");
						$this->redirect(array("controller"=>"FeeCollection","action"=>"listRteFee"));
						
					}  
				}
				else
				{
					$this->Session->setFlash("<div class='alert alert-warning fade in' style='height:50px'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
					<i class='fa fa-check'></i> Fee Already Assigned.</div>");
					$this->redirect(array("controller"=>"FeeCollection","action"=>"listRteFee"));
				}
				
			}
			else if(empty($this->request->data))
			{
				$this->request->data = $this->FeeClassWises->read(null,$id);
				//print_r($this->request->data);
			}
			
			$condtions = array("conditions"=>array("fee_head_type"=>"RTE"));
			$head_list = $this->FeeHeadAssign->find("all",$condtions);
			$this->set("head_list",$head_list); 
			
			
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
		
		/*Fee Collection Management*/
		public function feeCollectionManagement()
		{
			$this->_userSessionCheckout();
			$this->layout="ptes_admin";
			
			/* Generate Management receipt format MYYNNNN */
			$count_applications=$this->FeeCollection->find('count');
			$serial_number=str_pad($count_applications+1, 4, '0', STR_PAD_LEFT);
			$year=date('y');
			$gove_receipt='M'.$year.$serial_number;
			$this->set('gove_receipt',$gove_receipt); 
			 
			if(!empty($this->request->data))
			{
				//print_r($this->request->data);
				//FOR GETTING STUDENT DETAILS FOR FEE Collection
				$student_code_ = split('-',$this->request->data['FeeCollection']['student_code']);
				$student_code = $student_code_[1];
				
				$conditions = array("conditions"=>array('StudentDetail.student_code'=>$student_code));
				
				$student_details= $this->StudentDetail->find("first",$conditions);
				$this->set('student_details', $student_details); 
				
				//FOR GETTING CLASS WISE FEE FOR StudentDetail
				$class = $this->request->data['FeeCollection']['add_class_id'];
				//$academic_year_id = $student_details['StudentDetail']['academic_year_id'];
				$academic_year_id =  $this->request->data['FeeCollection']['academic_year_id'];
				$this->set("academic_year_id",$academic_year_id);
				$caste_id = $student_details['Caste']['caste'];
				if($caste_id=="SC" || $caste_id=="ST")
				{
					$caste_id = "SC/ST";
				}
				$fee_type="Mgnt";
				$apply_for = "Non_MPM";
				
				 $fee_conditions= array("conditions"=>array("academic_year_id"=>$academic_year_id,'add_class_id'=>$class,
										'caste_id'=>$caste_id,'fee_type'=>$fee_type ,'apply_for'=>$apply_for)); 
				 
				$fee_structure = $this->FeeClassWises->find('all',$fee_conditions);
				$this->set('fee_structure',$fee_structure) ; 
				
				//FOR GET THE ALRADY PAID AMOUNT  
				$student_id = $student_details['StudentDetail']['id'];
				$paid_amount  = $this->FeeCollection->query("select sum(paying_amount)as TOTAL_PAID from fee_collections as FeeCollection  where FeeCollection.student_detail_id = $student_id and FeeCollection.academic_year_id = $academic_year_id ");
			 	$this->set("student_paid_amount",$paid_amount[0][0]['TOTAL_PAID']);
				
				//FOR GET THE GOVT FEE DETAILS FOR DISPLAY IN MGNT FORM.  
				$govt_paid_amount  = $this->GovtFeeCollection->query("select sum(paying_amount)as TOTAL_PAID,payable_amount from govt_fee_collections as GovtFeeCollection  where GovtFeeCollection.student_detail_id = $student_id and GovtFeeCollection.academic_year_id = $academic_year_id ");
			 	$this->set("govt_student_paid_amount",$govt_paid_amount[0][0]['TOTAL_PAID']);
				//print_r($govt_paid_amount);
			}
			
			//To get student for autocomplete
			$conditionrte = array("conditions"=>array("admitting_under_rte"=>"no"));
			$student=$this->StudentDetail->find('all',$conditionrte,array('fields'=>array('student_name','student_code'))); 
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
		public function feeCollectionManagementProcess()
		{
			//FOR SAVE COLLECTION DATA BASED ON THE RECEIPT
				//$receipt_no = $this->request->data['FeeCollection']['receipt_no'];
				$this->_userSessionCheckout();
				if(!empty($this->request->data))
				{
					//print_r($this->request->data);
					$fee_type="Mgnt";
					$receipt_date = $this->request->data['FeeCollection']['receipt_date'];
					$daterep = new DateTime($receipt_date);
					$next_payment_date = $this->request->data['FeeCollection']['next_payment_date'];
					$datenpd = new DateTime($next_payment_date);
					$this->request->data['FeeCollection']['add_class_id'] = $this->request->data['add_class_id'];
					$this->request->data['FeeCollection']['academic_year_id'] = $this->request->data['academic_year_id'];
					$this->request->data['FeeCollection']['fee_type'] = $fee_type;
					$this->request->data['FeeCollection']['student_detail_id'] = $this->request->data['student_detail_id'];
					$this->request->data['FeeCollection']['receipt_date'] = $daterep->format('Y-m-d');
					$this->request->data['FeeCollection']['next_payment_date'] = $datenpd->format('Y-m-d');
					
					$this->FeeCollection->save($this->request->data['FeeCollection']);
					$fee_collection_id= $this->FeeCollection->id;
					if($fee_collection_id>0)
					{
						$count= $this->request->data['FeeCollectionDetail']['fee_head_code'];
						for($fcd_i = 0;$fcd_i<count($count);$fcd_i++)
						{
							if($this->request->data['FeeCollectionDetail']['fee_head_code'][$fcd_i]!='')
							{
								$data = array(
									"FeeCollectionDetail"=>array(
										"fee_collection_id"=>$fee_collection_id,
										"fee_head_name"=>$this->request->data['FeeCollectionDetail']['fee_head_name'][$fcd_i],
										"fee_head_code"=>$this->request->data['FeeCollectionDetail']['fee_head_code'][$fcd_i],
										"fee_head_amount"=>$this->request->data['FeeCollectionDetail']['fee_head_amount'][$fcd_i],
										"fee_paying_amount"=>$this->request->data['FeeCollectionDetail']['fee_paying_amount'][$fcd_i]
									)
								);
								
								$this->FeeCollectionDetail->saveAll($data);
							}
							
						}
					}
				}
				
				$this->Session->setFlash("<div class='alert alert-success fade in' style='height:50px'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<i class='fa fa-check'></i> Fee Collection Successfuly.  :<a href='feeCollectionManagementPrint/$fee_collection_id' target='_blank'>Print Receipt <i class='fa fa-print'></i></a></div>");
				$this->redirect(array("controller"=>"FeeCollection","action"=>"feeCollectionManagement"));
				//FOR SAVE COLLECTION DATA BASED ON THE RECEIPT
		}
		/*List of Fee Collection*/
		public function listFeeCollection()
		{
			$this->_userSessionCheckout();
			$this->layout="ptes_admin"; 
			
			if(!empty($this->request->data))
			{
				//print_r($this->request->data);
				$conditions = array("conditions"=>array("FeeCollection.academic_year_id"=>$this->request->data['FeeCollection']['academic_year_id'],
														"FeeCollection.add_class_id"=>$this->request->data['FeeCollection']['add_class_id']	));
				$list_of_collection = $this->FeeCollection->find("all",$conditions);
				$this->set('list_of_collection',$list_of_collection);
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
		
		/*Fee Collection management print */
		public function feeCollectionManagementPrint($id=null)
		{
			$this->_userSessionCheckout();
			$this->layout="ajax";
			$conditions = array("conditions"=>array("FeeCollection.id"=>$id));
			$receipt_details = $this->FeeCollection->find("first",$conditions);
			$this->set('receipt_details',$receipt_details);
			//echo $this->NumberToWord->convert_number_to_words(12); 
			//print_r($receipt_details);
			
		}
		/*Fee Collection management view */
		public function feeCollectionManagementView($id=null)
		{
			$this->_userSessionCheckout();
			$this->layout="ptes_admin";
			$conditions = array("conditions"=>array("FeeCollection.id"=>$id));
			$receipt_details = $this->FeeCollection->find("first",$conditions);
			$this->set('receipt_details',$receipt_details);
			//echo $this->NumberToWord->convert_number_to_words(12); 
			//print_r($receipt_details);
			
		}
		 
		/*Fee Collection Govt view */
		public function feeCollectionGovtView($id=null)
		{
			$this->_userSessionCheckout();
			$this->layout="ptes_admin";
			$conditions = array("conditions"=>array("GovtFeeCollection.id"=>$id));
			$receipt_details = $this->GovtFeeCollection->find("first",$conditions);
			$this->set('receipt_details',$receipt_details);
			//echo $this->NumberToWord->convert_number_to_words(12); 
			//print_r($receipt_details); 
		}
		/*Fee Collection RTE view */
		public function feeCollectionRteView($id=null)
		{
			$this->_userSessionCheckout();
			$this->layout="ptes_admin";
			$conditions = array("conditions"=>array("RteFeeCollection.id"=>$id));
			$receipt_details = $this->RteFeeCollection->find("first",$conditions);
			$this->set('receipt_details',$receipt_details);
			//echo $this->NumberToWord->convert_number_to_words(12); 
			//print_r($receipt_details); 
		}
		
		
		public function deleteFeeCollectionMgnt($id=null)
		{
			$this->_userSessionCheckout();
			$this->layout="ptes_admin"; 
			$this->FeeCollection->delete($id);
			$this->Session->setFlash("<div class='alert alert-danger fade in' style='height:50px'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
					<i class='fa  fa-trash-o'></i>Fee Details deleted.</div>");
			$this->redirect(array("controller"=>"FeeCollection","action"=>"listFeeCollection"));
		}
		
		public function editFeeCollectionMgnt($id=null)
		{
			$this->_userSessionCheckout();
			$this->layout="ptes_admin";
			if(!empty($this->request->data))
			{
				//print_r($this->request->data);
				$receipt_date = $this->request->data['FeeCollection']['receipt_date'];
				$daterep = new DateTime($receipt_date);
				$next_payment_date = $this->request->data['FeeCollection']['next_payment_date'];
				$datenpd = new DateTime($next_payment_date);
					
				$this->request->data['FeeCollection']['receipt_date'] = $daterep->format('Y-m-d');
				$this->request->data['FeeCollection']['next_payment_date'] = $datenpd->format('Y-m-d');
				$this->request->data = $this->FeeCollection->save($this->request->data);
				//debug($this->FeeCollection->getDataSource()->getLog(false,false));
				
				//SAVE FEE COLLECTION DETAILS
				$count= $this->request->data['FeeCollectionDetail']['id'];
				for($fcd_i = 0;$fcd_i<count($count);$fcd_i++)
				{
					if($this->request->data['FeeCollectionDetail']['fee_head_code'][$fcd_i]!='')
					{
						$data = array(
							"FeeCollectionDetail"=>array(
								"fee_head_name"=>$this->request->data['FeeCollectionDetail']['fee_head_name'][$fcd_i],
								"fee_head_code"=>$this->request->data['FeeCollectionDetail']['fee_head_code'][$fcd_i],
								"fee_head_amount"=>$this->request->data['FeeCollectionDetail']['fee_head_amount'][$fcd_i],
								"fee_paying_amount"=>$this->request->data['FeeCollectionDetail']['fee_paying_amount'][$fcd_i]
							)
						);
						
						$this->FeeCollectionDetail->id = $count[$fcd_i];
						$this->FeeCollectionDetail->save($data);
					}
					
				}
				$this->Session->setFlash("<div class='alert alert-success fade in' style='height:50px'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<i class='fa fa-check'></i> Fee Collection Updated Successfuly.   </div>");
				$this->redirect(array("controller"=>"FeeCollection","action"=>"listFeeCollection"));
				//SAVE FEE COLLECTION DETAILS
				
			}
			
			
			$this->request->data = $this->FeeCollection->read(null,$id);
			$this->request->data['FeeCollection']['receipt_date'] = date('d-m-Y',strtotime($this->request->data['FeeCollection']['receipt_date']));
			$this->request->data['FeeCollection']['next_payment_date'] = date('d-m-Y',strtotime($this->request->data['FeeCollection']['next_payment_date']));
			
		}
		
		/*****************************************************
		**            GOVE FEE COLLECTION START				**
		**			By : Raghupathi on 20-09-2016		    **
		******************************************************/
		/*Fee Collection Management*/
		public function feeCollectionGovt()
		{
			$this->_userSessionCheckout();
			$this->layout="ptes_admin";
			
			/* Generate Management receipt format GYYNNNN */
			$count_applications=$this->GovtFeeCollection->find('count');
			$serial_number=str_pad($count_applications+1, 4, '0', STR_PAD_LEFT);
			$year=date('y');
			$gove_receipt='G'.$year.$serial_number;
			$this->set('gove_receipt',$gove_receipt); 
			 
			if(!empty($this->request->data))
			{
				//print_r($this->request->data);
				//FOR GETTING STUDENT DETAILS FOR FEE Collection
				$student_code_ = split('-',$this->request->data['GovtFeeCollection']['student_code']);
				$student_code = $student_code_[1];
				
				//$conditions = array("conditions"=>array('StudentDetail.student_code'=>$student_code,
										//'StudentDetail.academic_year_id'=>$this->request->data['GovtFeeCollection']['academic_year_id']));
										
				$conditions = array("conditions"=>array('StudentDetail.student_code'=>$student_code));
				
				
				$student_details= $this->StudentDetail->find("first",$conditions);
				$this->set('student_details', $student_details); 
				//print_r($student_details);
				
				//FOR GETTING CLASS WISE FEE FOR StudentDetail
				//$class = $student_details['StudentDetail']['add_class_id'];
				$class = $this->request->data['GovtFeeCollection']['add_class_id'];
				//$academic_year_id = $student_details['StudentDetail']['academic_year_id'];
				$academic_year_id =  $this->request->data['GovtFeeCollection']['academic_year_id'];
				$this->set("academic_year_id",$academic_year_id);
				$caste_id = $student_details['Caste']['caste'];
				if($caste_id=="SC" || $caste_id=="ST")
				{
					$caste_id = "SC/ST";
				}
				$fee_type="Govt";
				//$apply_for = "Non_MPM";
				
				 $fee_conditions= array("conditions"=>array("FeeClassWises.academic_year_id"=>$academic_year_id,'FeeClassWises.add_class_id'=>$class,
										'FeeClassWises.caste_id'=>$caste_id,'FeeClassWises.fee_type'=>$fee_type));  
				 
				$fee_structure = $this->FeeClassWises->find('all',$fee_conditions);
				//debug($this->FeeClassWises->getDataSource()->getLog(false,false));
				$this->set('fee_structure',$fee_structure) ; 
				//print_r($fee_structure);
				
				//FOR GET THE ALRADY PAID AMOUNT
				$paid_conditions = array("conditions"=>array('GovtFeeCollection.student_detail_id'=>$student_details['StudentDetail']['id'],
										'GovtFeeCollection.academic_year_id'=>$academic_year_id));
				 
				//$paid_amount  =  $this->FeeCollection->find('all',$paid_conditions,array("fields"=>"FeeCollection.paying_amount")); 
				$student_id = $student_details['StudentDetail']['id'];
				$paid_amount  = $this->GovtFeeCollection->query("select sum(paying_amount)as TOTAL_PAID from govt_fee_collections as GovtFeeCollection  where GovtFeeCollection.student_detail_id = $student_id and GovtFeeCollection.academic_year_id = $academic_year_id ");
			 	//debug($this->FeeCollection->getDataSource()->getLog(false,false));
				$this->set("student_paid_amount",$paid_amount[0][0]['TOTAL_PAID']);
			}
			
			//To get student for autocomplete
			$student=$this->StudentDetail->find('all',array('fields'=>array('student_name','student_code'))); 
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
		
		public function feeCollectionGovtProcess()
		{
			//FOR SAVE COLLECTION DATA BASED ON THE RECEIPT
				//$receipt_no = $this->request->data['FeeCollection']['receipt_no'];
				$this->_userSessionCheckout();
				if(!empty($this->request->data))
				{
					print_r($this->request->data);
					$fee_type="Govt";
					$receipt_date = $this->request->data['GovtFeeCollection']['receipt_date'];
					$daterep = new DateTime($receipt_date);
					$next_payment_date = $this->request->data['GovtFeeCollection']['next_payment_date'];
					$datenpd = new DateTime($next_payment_date);
					$this->request->data['GovtFeeCollection']['add_class_id'] = $this->request->data['add_class_id'];
					echo $this->request->data['GovtFeeCollection']['academic_year_id'] = $this->request->data['GovtFeeCollection']['academic_year_id'];
					$this->request->data['GovtFeeCollection']['fee_type'] = $fee_type;
					$this->request->data['GovtFeeCollection']['student_detail_id'] = $this->request->data['student_detail_id'];
					$this->request->data['GovtFeeCollection']['receipt_date'] = $daterep->format('Y-m-d');
					$this->request->data['GovtFeeCollection']['next_payment_date'] = $datenpd->format('Y-m-d');
					
					$this->GovtFeeCollection->save($this->request->data['GovtFeeCollection']);
					$fee_collection_id= $this->GovtFeeCollection->id;
					if($fee_collection_id>0)
					{
						$count= $this->request->data['GovtFeeCollectionDetail']['fee_head_code'];
						for($fcd_i = 0;$fcd_i<count($count);$fcd_i++)
						{
							if($this->request->data['GovtFeeCollectionDetail']['fee_head_code'][$fcd_i]!='')
							{
								$data = array(
									"GovtFeeCollectionDetail"=>array(
										"govt_fee_collection_id"=>$fee_collection_id,
										"fee_head_name"=>$this->request->data['GovtFeeCollectionDetail']['fee_head_name'][$fcd_i],
										"fee_head_code"=>$this->request->data['GovtFeeCollectionDetail']['fee_head_code'][$fcd_i],
										"fee_head_amount"=>$this->request->data['GovtFeeCollectionDetail']['fee_head_amount'][$fcd_i],
										"fee_paying_amount"=>$this->request->data['GovtFeeCollectionDetail']['fee_paying_amount'][$fcd_i]
									)
								);
								
								$this->GovtFeeCollectionDetail->saveAll($data);
							}
							
						}
					}
				}
				
				$this->Session->setFlash("<div class='alert alert-success fade in' style='height:50px'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<i class='fa fa-check'></i> Fee Collection Successfuly.  :<a href='feeCollectionGovtPrint/$fee_collection_id' target='_blank'>Print Receipt <i class='fa fa-print'></i></a></div>");
				$this->redirect(array("controller"=>"FeeCollection","action"=>"feeCollectionGovt"));
				//FOR SAVE COLLECTION DATA BASED ON THE RECEIPT
		}
		
		/*List of Govt Fee Collection*/
		public function listFeeCollectionGovt()
		{
			$this->_userSessionCheckout();
			$this->layout="ptes_admin"; 
			
			if(!empty($this->request->data))
			{
				//print_r($this->request->data);
				$conditions = array("conditions"=>array("GovtFeeCollection.academic_year_id"=>$this->request->data['GovtFeeCollection']['academic_year_id'],
														"GovtFeeCollection.add_class_id"=>$this->request->data['GovtFeeCollection']['add_class_id']));
				$list_of_collection = $this->GovtFeeCollection->find("all",$conditions);
				$this->set('list_of_collection',$list_of_collection);
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
		
		//DELETE GOVT FEE Collection
		public function deleteFeeCollectionGovt($id=null)
		{
			$this->_userSessionCheckout();
			$this->layout="ptes_admin"; 
			$this->GovtFeeCollection->delete($id);
			$this->Session->setFlash("<div class='alert alert-danger fade in' style='height:50px'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
					<i class='fa  fa-trash-o'></i> Fee Details deleted.</div>");
			$this->redirect(array("controller"=>"FeeCollection","action"=>"listFeeCollectionGovt"));
		}
		
		//EDIT GOVT FEE Collection
		public function editFeeCollectionGovt($id=null)
		{
			$this->_userSessionCheckout();
			$this->layout="ptes_admin";
			if(!empty($this->request->data))
			{
				//print_r($this->request->data);
				$receipt_date = $this->request->data['GovtFeeCollection']['receipt_date'];
				$daterep = new DateTime($receipt_date);
				$nxt_date = $this->request->data['GovtFeeCollection']['next_payment_date'];
				$datenxt = new DateTime($nxt_date);
				$this->request->data['GovtFeeCollection']['receipt_date'] = $daterep->format('Y-m-d');
				$this->request->data['GovtFeeCollection']['next_payment_date'] = $datenxt->format('Y-m-d');
				$this->request->data = $this->GovtFeeCollection->save($this->request->data);
				//debug($this->FeeCollection->getDataSource()->getLog(false,false));
				
				//SAVE FEE COLLECTION DETAILS
				$count= $this->request->data['GovtFeeCollectionDetail']['id'];
				for($fcd_i = 0;$fcd_i<count($count);$fcd_i++)
				{
					if($this->request->data['GovtFeeCollectionDetail']['fee_head_code'][$fcd_i]!='')
					{
						$data = array(
							"GovtFeeCollectionDetail"=>array(
								"fee_head_name"=>$this->request->data['GovtFeeCollectionDetail']['fee_head_name'][$fcd_i],
								"fee_head_code"=>$this->request->data['GovtFeeCollectionDetail']['fee_head_code'][$fcd_i],
								"fee_head_amount"=>$this->request->data['GovtFeeCollectionDetail']['fee_head_amount'][$fcd_i],
								"fee_paying_amount"=>$this->request->data['GovtFeeCollectionDetail']['fee_paying_amount'][$fcd_i]
							)
						);
						
						$this->GovtFeeCollectionDetail->id = $count[$fcd_i];
						$this->GovtFeeCollectionDetail->save($data);
					}
					
				}
				
				//SAVE FEE COLLECTION DETAILS
				$this->redirect(array("controller"=>"FeeCollection","action"=>"listFeeCollectionGovt"));
			}
			
			
			$this->request->data = $this->GovtFeeCollection->read(null,$id);
			$this->request->data['GovtFeeCollection']['receipt_date'] = date('d-m-Y',strtotime($this->request->data['GovtFeeCollection']['receipt_date']));
			$this->request->data['GovtFeeCollection']['next_payment_date'] = date('d-m-Y',strtotime($this->request->data['GovtFeeCollection']['next_payment_date']));
			
		}
		
		/*Fee Collection Govt print */
		public function feeCollectionGovtPrint($id=null)
		{
			$this->_userSessionCheckout();
			$this->layout="ajax";
			$conditions = array("conditions"=>array("GovtFeeCollection.id"=>$id));
			$receipt_details = $this->GovtFeeCollection->find("first",$conditions);
			$this->set('receipt_details',$receipt_details);
			//echo $this->NumberToWord->convert_number_to_words(12); 
			//print_r($receipt_details);
			
		}
		/*****************************************************
		**            GOVE FEE COLLECTION START				**
		**			By : Raghupathi on 20-09-2016		    **
		******************************************************/
		
		 
		/*****************************************************
		**            RTE FEE COLLECTION START				**
		**			By : Raghupathi on 20-09-2016		    **
		******************************************************/
		public function feeCollectionRte()
		{
			$this->_userSessionCheckout();
			$this->layout="ptes_admin";
			
			/* Generate Management receipt format GYYNNNN */
			$count_applications=$this->RteFeeCollection->find('count');
			$serial_number=str_pad($count_applications+1, 4, '0', STR_PAD_LEFT);
			$year=date('y');
			$gove_receipt='R'.$year.$serial_number;
			$this->set('gove_receipt',$gove_receipt); 
			 
			if(!empty($this->request->data))
			{
				//print_r($this->request->data);
				//FOR GETTING STUDENT DETAILS FOR FEE Collection
				$student_code_ = split('-',$this->request->data['RteFeeCollection']['student_code']);
				$student_code = $student_code_[1];
				
				$conditions = array("conditions"=>array('StudentDetail.student_code'=>$student_code));
				$student_details= $this->StudentDetail->find("first",$conditions);
				$this->set('student_details', $student_details); 
				//print_r($student_details);
				
				//FOR GETTING CLASS WISE FEE FOR StudentDetail
				$class = $this->request->data['RteFeeCollection']['add_class_id'];
				//$academic_year_id = $student_details['StudentDetail']['academic_year_id'];
				$academic_year_id =  $this->request->data['RteFeeCollection']['academic_year_id'];
				$this->set("academic_year_id",$academic_year_id);
				$fee_type="RTE";
				$lang = "Sanskrit";
				$belongs_to = $student_details['StudentDetail']['admitting_under_rte'];
				if($belongs_to=="yes")
				{
					if($class=="8" || $class=="9" || $class=="10")
					{
						$fee_conditions= array("conditions"=>array("academic_year_id"=>$academic_year_id,'add_class_id'=>$class,
												'apply_for'=>$lang,'fee_type'=>$fee_type));  
					}
					else
					{
						
						$fee_conditions= array("conditions"=>array("academic_year_id"=>$academic_year_id,'add_class_id'=>$class,'fee_type'=>$fee_type));  
					}
					$fee_structure = $this->FeeClassWises->find('all',$fee_conditions);
					//debug($this->FeeClassWises->getDataSource()->getLog(false,false));
					$this->set('fee_structure',$fee_structure) ; 
					//print_r($fee_structure);
					
					//FOR GET THE ALRADY PAID AMOUNT
					$paid_conditions = array("conditions"=>array('RteFeeCollection.student_detail_id'=>$student_details['StudentDetail']['id'],
											'RteFeeCollection.academic_year_id'=>$academic_year_id));
					 
					//$paid_amount  =  $this->FeeCollection->find('all',$paid_conditions,array("fields"=>"FeeCollection.paying_amount")); 
					$student_id = $student_details['StudentDetail']['id'];
					$paid_amount  = $this->RteFeeCollection->query("select sum(paying_amount)as TOTAL_PAID from rte_fee_collections as RteFeeCollection  where RteFeeCollection.student_detail_id = $student_id and RteFeeCollection.academic_year_id = $academic_year_id ");
					//debug($this->FeeCollection->getDataSource()->getLog(false,false));
					$this->set("student_paid_amount",$paid_amount[0][0]['TOTAL_PAID']);
				}
				else
				{
					$this->Session->setFlash("<div class='alert alert-warning fade in' style='height:50px'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
					<i class='fa fa-info-circle'></i> $student_code Student not belongs to RTE .</div>");
					$this->redirect(array("controller"=>"FeeCollection","action"=>"feeCollectionRte"));
				}
			}
			
			
			//To get student for autocomplete
			$conditionrte = array("conditions"=>array("admitting_under_rte"=>"yes"));
			$student=$this->StudentDetail->find('all',$conditionrte,array('fields'=>array('student_name','student_code'))); 
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
		public function feeCollectionRteProcess()
		{
			$this->_userSessionCheckout();
			//FOR SAVE COLLECTION DATA BASED ON THE RECEIPT
				//$receipt_no = $this->request->data['FeeCollection']['receipt_no'];
				if(!empty($this->request->data))
				{
					//print_r($this->request->data);
					$fee_type="Govt";
					$receipt_date = $this->request->data['RteFeeCollection']['receipt_date'];
					$daterep = new DateTime($receipt_date);
					$next_payment_date = $this->request->data['RteFeeCollection']['next_payment_date'];
					$datenpd = new DateTime($next_payment_date);
					$this->request->data['RteFeeCollection']['add_class_id'] = $this->request->data['add_class_id'];
					$this->request->data['RteFeeCollection']['academic_year_id'] = $this->request->data['academic_year_id'];
					$this->request->data['RteFeeCollection']['fee_type'] = $fee_type;
					$this->request->data['RteFeeCollection']['student_detail_id'] = $this->request->data['student_detail_id'];
					$this->request->data['RteFeeCollection']['receipt_date'] = $daterep->format('Y-m-d');
					$this->request->data['RteFeeCollection']['next_payment_date'] = $datenpd->format('Y-m-d');
					
					$this->RteFeeCollection->save($this->request->data['RteFeeCollection']);
					$fee_collection_id= $this->RteFeeCollection->id;
					if($fee_collection_id>0)
					{
						$count= $this->request->data['RteFeeCollectionDetail']['fee_head_code'];
						for($fcd_i = 0;$fcd_i<count($count);$fcd_i++)
						{
							if($this->request->data['RteFeeCollectionDetail']['fee_head_code'][$fcd_i]!='')
							{
								$data = array(
									"RteFeeCollectionDetail"=>array(
										"rte_fee_collection_id"=>$fee_collection_id,
										"fee_head_name"=>$this->request->data['RteFeeCollectionDetail']['fee_head_name'][$fcd_i],
										"fee_head_code"=>$this->request->data['RteFeeCollectionDetail']['fee_head_code'][$fcd_i],
										"fee_head_amount"=>$this->request->data['RteFeeCollectionDetail']['fee_head_amount'][$fcd_i],
										"fee_paying_amount"=>$this->request->data['RteFeeCollectionDetail']['fee_paying_amount'][$fcd_i]
									)
								);
								
								$this->RteFeeCollectionDetail->saveAll($data);
							}
							
						}
					}
				}
				$this->Session->setFlash("<div class='alert alert-success fade in' style='height:50px'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<i class='fa fa-check'></i> Fee Collection Successfuly.  :<a href='feeCollectionRtePrint/$fee_collection_id' target='_blank'>Print Receipt <i class='fa fa-print'></i></a></div>");
				$this->redirect(array("controller"=>"FeeCollection","action"=>"feeCollectionRte"));
				//FOR SAVE COLLECTION DATA BASED ON THE RECEIPT
		}
		
		/*List of Govt Fee Collection*/
		public function listFeeCollectionRte()
		{
			$this->_userSessionCheckout();
			$this->layout="ptes_admin"; 
			
			if(!empty($this->request->data))
			{
				//print_r($this->request->data);
				$conditions = array("conditions"=>array("RteFeeCollection.academic_year_id"=>$this->request->data['RteFeeCollection']['academic_year_id'],
														"RteFeeCollection.add_class_id"=>$this->request->data['RteFeeCollection']['add_class_id']));
				$list_of_collection = $this->RteFeeCollection->find("all",$conditions);
				$this->set('list_of_collection',$list_of_collection);
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
		
		//DELETE GOVT FEE Collection
		public function deleteFeeCollectionRte($id=null)
		{
			$this->_userSessionCheckout();
			$this->layout="ptes_admin"; 
			$this->RteFeeCollection->delete($id);
			$this->Session->setFlash("<div class='alert alert-danger fade in' style='height:50px'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
					<i class='fa  fa-trash-o'></i> RTE Fee deleted.</div>");
			$this->redirect(array("controller"=>"FeeCollection","action"=>"listFeeCollectionRte"));
		}
		
		//EDIT GOVT FEE Collection
		public function editFeeCollectionRte($id=null)
		{
			$this->_userSessionCheckout();
			$this->layout="ptes_admin";
			if(!empty($this->request->data))
			{
				//print_r($this->request->data);
				$receipt_date = $this->request->data['RteFeeCollection']['receipt_date'];
				$daterep = new DateTime($receipt_date);
				$nxt_date = $this->request->data['RteFeeCollection']['next_payment_date'];
				$datenxt = new DateTime($nxt_date);
				$this->request->data['RteFeeCollection']['receipt_date'] = $daterep->format('Y-m-d');
				$this->request->data['RteFeeCollection']['next_payment_date'] = $datenxt->format('Y-m-d');
				$this->request->data = $this->RteFeeCollection->save($this->request->data);
				//debug($this->FeeCollection->getDataSource()->getLog(false,false));
				
				//SAVE FEE COLLECTION DETAILS
				$count= $this->request->data['RteFeeCollectionDetail']['id'];
				for($fcd_i = 0;$fcd_i<count($count);$fcd_i++)
				{
					if($this->request->data['RteFeeCollectionDetail']['fee_head_code'][$fcd_i]!='')
					{
						$data = array(
							"RteFeeCollectionDetail"=>array(
								"fee_head_name"=>$this->request->data['RteFeeCollectionDetail']['fee_head_name'][$fcd_i],
								"fee_head_code"=>$this->request->data['RteFeeCollectionDetail']['fee_head_code'][$fcd_i],
								"fee_head_amount"=>$this->request->data['RteFeeCollectionDetail']['fee_head_amount'][$fcd_i],
								"fee_paying_amount"=>$this->request->data['RteFeeCollectionDetail']['fee_paying_amount'][$fcd_i]
							)
						);
						
						$this->RteFeeCollectionDetail->id = $count[$fcd_i];
						$this->RteFeeCollectionDetail->save($data);
					}
					
				}
				
				//SAVE FEE COLLECTION DETAILS
				$this->redirect(array("controller"=>"FeeCollection","action"=>"listFeeCollectionRte"));
			}
			
			
			$this->request->data = $this->RteFeeCollection->read(null,$id);
			$this->request->data['RteFeeCollection']['receipt_date'] = date('d-m-Y',strtotime($this->request->data['RteFeeCollection']['receipt_date']));
			$this->request->data['RteFeeCollection']['next_payment_date'] = date('d-m-Y',strtotime($this->request->data['RteFeeCollection']['next_payment_date']));
			
		}
		
		/*Fee Collection RTE print */
		public function feeCollectionRtePrint($id=null)
		{
			$this->_userSessionCheckout();
			$this->layout="ajax";
			$conditions = array("conditions"=>array("RteFeeCollection.id"=>$id));
			$receipt_details = $this->RteFeeCollection->find("first",$conditions);
			$this->set('receipt_details',$receipt_details);
			//echo $this->NumberToWord->convert_number_to_words(12); 
			//print_r($receipt_details);
			
		}
		
		
		/*****************************************************
		**            RTE FEE COLLECTION START				**
		**			By : Raghupathi on 20-09-2016		    **
		******************************************************/ 
		public function feeConsolidationReport()
		{
			$this->_userSessionCheckout();
			configure::write("debug",0);
			$this->layout="ptes_admin";
			if(!empty($this->request->data))
			{	
				$academic_year_id = $this->request->data['FeeCollection']['academic_year_id'];
				//print_r($this->request->data);
				
				$class_list = $this->AddClass->find("all",array('order'=>'class ASC'));
				$this->set("class_list",$class_list);
				
				$student_count_class_array = array();
				$mgnt_class_paid_amount_array = array();
				$mgnt_class_payable_amount_array = array();
				
				$govt_class_payable_amount_array = array();
				$govt_class_paid_amount_array = array();
				$rte_class_paid_amount_array = array();
				$rte_class_payable_amount_array = array();
				$mgnt_class_paid_amount_=0;
				$govt_class_paid_amount_ = 0;
				$rte_class_paid_amount_=0;
				$student_class_wise = 0;
				
				for($i=0;$i<count($class_list);$i++)
				{
					$class_id = $class_list[$i]['AddClass']['id'];
					
					//for get total count of student for the particular class 
					$student_count_class_wise = $this->StudentDetail->find("count",array("conditions"=>array("add_class_id"=>$class_id,"StudentDetail.academic_year_id"=>$academic_year_id)));
					array_push($student_count_class_array,$student_count_class_wise);
					$this->set("student_count_class_array",$student_count_class_array); 
					
					//FOR GETTING THE TOTAL PAYABLE AMOUNT FOR CLASS
					$mgnt_payable_amount = $this->mgntFeeClasswisePayableAmount($class_id,$academic_year_id);
					$mgnt_class_payable_amount_array[] = $mgnt_payable_amount;
					$this->set("mgnt_class_payable_amount_array",$mgnt_class_payable_amount_array);
				
					$govt_payable_amount = $this->govtFeeClasswisePayableAmount($class_id,$academic_year_id);
					$govt_class_payable_amount_array[] = $govt_payable_amount;
					$this->set("govt_class_payable_amount_array",$govt_class_payable_amount_array);
					
					$rte_payable_amount = $this->rteFeeClasswisePayableAmount($class_id,$academic_year_id);
					$rte_class_payable_amount_array[] = $rte_payable_amount;
					$this->set("rte_class_payable_amount_array",$rte_class_payable_amount_array);
					
					
					//FOR GETTING THE COURSE FEE FOR EACH CLASS 
					 $mgnt_class_paid_amount_  = $this->FeeCollection->query("select sum(paying_amount)as TOTAL_PAID,payable_amount as TOTAL_PAYABLE from fee_collections as FeeCollection  where FeeCollection.add_class_id = $class_id and FeeCollection.academic_year_id = $academic_year_id ");
					array_push($mgnt_class_paid_amount_array,$mgnt_class_paid_amount_); 
					$this->set("mgnt_class_paid_amount_array",$mgnt_class_paid_amount_array);
					
					$govt_class_paid_amount_  = $this->GovtFeeCollection->query("select sum(paying_amount)as TOTAL_PAID, payable_amount as TOTAL_PAYABLE from govt_fee_collections as GovtFeeCollection  where GovtFeeCollection.add_class_id = $class_id and GovtFeeCollection.academic_year_id = $academic_year_id ");
					array_push($govt_class_paid_amount_array,$govt_class_paid_amount_); 
					$this->set("govt_class_paid_amount_array",$govt_class_paid_amount_array);
					//print_r($govt_class_paid_amount_array);
					
					$rte_class_paid_amount_  = $this->RteFeeCollection->query("select sum(paying_amount)as TOTAL_PAID, payable_amount as TOTAL_PAYABLE from rte_fee_collections as RteFeeCollection  where RteFeeCollection.add_class_id = $class_id and RteFeeCollection.academic_year_id = $academic_year_id ");
					array_push($rte_class_paid_amount_array,$rte_class_paid_amount_); 
					$this->set("rte_class_paid_amount_array",$rte_class_paid_amount_array); 
					
					
				}
				//print_r($mgnt_class_paid_amount_array);
				
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
		
		public function feeConsolidationReportPrint($academic_year_id=null)
		{
			$this->_userSessionCheckout();
			configure::write("debug",2);
			$this->layout="ajax";
			if(!empty($academic_year_id))
			{	
				//$academic_year_id = $this->request->data['FeeCollection']['academic_year_id'];
				//print_r($this->request->data);
				$class_list = $this->AddClass->find("all");
				$this->set("class_list",$class_list);
				
				$student_count_class_array = array();
				$mgnt_class_paid_amount_array = array();
				$mgnt_class_payable_amount_array = array();
				
				$govt_class_payable_amount_array = array();
				$govt_class_paid_amount_array = array();
				$rte_class_paid_amount_array = array();
				$rte_class_payable_amount_array = array();
				$mgnt_class_paid_amount_=0;
				$govt_class_paid_amount_ = 0;
				$rte_class_paid_amount_=0;
				$student_class_wise = 0;
				
				for($i=0;$i<count($class_list);$i++)
				{
					$class_id = $class_list[$i]['AddClass']['id'];
					
					//for get total count of student for the particular class 
					$student_count_class_wise = $this->StudentDetail->find("count",array("conditions"=>array("add_class_id"=>$class_id,"StudentDetail.academic_year_id"=>$academic_year_id)));
					array_push($student_count_class_array,$student_count_class_wise);
					$this->set("student_count_class_array",$student_count_class_array); 
					
					//FOR GETTING THE TOTAL PAYABLE AMOUNT FOR CLASS
					$mgnt_payable_amount = $this->mgntFeeClasswisePayableAmount($class_id,$academic_year_id);
					$mgnt_class_payable_amount_array[] = $mgnt_payable_amount;
					$this->set("mgnt_class_payable_amount_array",$mgnt_class_payable_amount_array);
				
					$govt_payable_amount = $this->govtFeeClasswisePayableAmount($class_id,$academic_year_id);
					$govt_class_payable_amount_array[] = $govt_payable_amount;
					$this->set("govt_class_payable_amount_array",$govt_class_payable_amount_array);
					
					$rte_payable_amount = $this->rteFeeClasswisePayableAmount($class_id,$academic_year_id);
					$rte_class_payable_amount_array[] = $rte_payable_amount;
					$this->set("rte_class_payable_amount_array",$rte_class_payable_amount_array);
					
					
					//FOR GETTING THE COURSE FEE FOR EACH CLASS 
					 $mgnt_class_paid_amount_  = $this->FeeCollection->query("select sum(paying_amount)as TOTAL_PAID,payable_amount as TOTAL_PAYABLE from fee_collections as FeeCollection  where FeeCollection.add_class_id = $class_id and FeeCollection.academic_year_id = $academic_year_id ");
					array_push($mgnt_class_paid_amount_array,$mgnt_class_paid_amount_); 
					$this->set("mgnt_class_paid_amount_array",$mgnt_class_paid_amount_array);
					
					$govt_class_paid_amount_  = $this->GovtFeeCollection->query("select sum(paying_amount)as TOTAL_PAID, payable_amount as TOTAL_PAYABLE from govt_fee_collections as GovtFeeCollection  where GovtFeeCollection.add_class_id = $class_id and GovtFeeCollection.academic_year_id = $academic_year_id ");
					array_push($govt_class_paid_amount_array,$govt_class_paid_amount_); 
					$this->set("govt_class_paid_amount_array",$govt_class_paid_amount_array);
					//print_r($govt_class_paid_amount_array);
					
					$rte_class_paid_amount_  = $this->RteFeeCollection->query("select sum(paying_amount)as TOTAL_PAID, payable_amount as TOTAL_PAYABLE from rte_fee_collections as RteFeeCollection  where RteFeeCollection.add_class_id = $class_id and RteFeeCollection.academic_year_id = $academic_year_id ");
					array_push($rte_class_paid_amount_array,$rte_class_paid_amount_); 
					$this->set("rte_class_paid_amount_array",$rte_class_paid_amount_array); 
					
					
				}
				//print_r($mgnt_class_paid_amount_array);
				
			} 
		}
		
		// FOR STUDENT INDIVIDUAL FEE REPORTS
		public function feeIndividualReport()
		{
			$this->_userSessionCheckout();
			$this->layout="ptes_admin";
			
			if(!empty($this->request->data))
			{
				//print_r($this->request->data);
				//FOR GETTING STUDENT DETAILS FOR FEE Collection
				
				$student_code_ = split('-',$this->request->data['FeeCollection']['student_code']);
				$student_code = $student_code_[1];
				
				$conditions = array("conditions"=>array('StudentDetail.student_code'=>$student_code));
				$student_details= $this->StudentDetail->find("first",$conditions);
				$this->set('student_details', $student_details); 
				 
				
				$student_id = $student_details['StudentDetail']['id']; 
				
				//TO GET MGNT FEE DETAILS
				$mgnt_conditions = array("conditions"=>array('FeeCollection.student_detail_id'=>$student_id,
										'FeeCollection.academic_year_id'=>$this->request->data['FeeCollection']['academic_year_id'],
										'FeeCollection.add_class_id'=>$this->request->data['FeeCollection']['add_class_id']));
				$mgnt_fee_details = $this->FeeCollection->find("all",$mgnt_conditions); 
				$this->set('mgnt_fee_details', $mgnt_fee_details);
				
				//TO GET GOVT FEE DETAILS
				
				$govt_conditions = array("conditions"=>array('GovtFeeCollection.student_detail_id'=>$student_id,
										'GovtFeeCollection.academic_year_id'=>$this->request->data['FeeCollection']['academic_year_id'],
										'GovtFeeCollection.add_class_id'=>$this->request->data['FeeCollection']['add_class_id']));
				$govt_fee_details = $this->GovtFeeCollection->find("all",$govt_conditions); 
				$this->set('govt_fee_details', $govt_fee_details);
				
				//TO GET RTE FEE DETAILS
				
				$rte_conditions = array("conditions"=>array('RteFeeCollection.student_detail_id'=>$student_id,
										'RteFeeCollection.academic_year_id'=>$this->request->data['FeeCollection']['academic_year_id'],
										'RteFeeCollection.add_class_id'=>$this->request->data['FeeCollection']['add_class_id']));
				$rte_fee_details = $this->RteFeeCollection->find("all",$rte_conditions); 
				$this->set('rte_fee_details', $rte_fee_details);
				//print_r($govt_fee_details);
				
				 
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
			$student=$this->StudentDetail->find('all',array('fields'=>array('student_name','student_code'))); 
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
				$class_array[$cls['id']] = $cls['class'];
			    }
			}
			$this->set('class_array', $class_array); 
		}
		// FOR STUDENT INDIVIDUAL FEE REPORTS
		public function feeIndividualReportPrint($student_code1=null,$academic_year_id=null)
		{
			$this->_userSessionCheckout();
			$this->layout="ajax";
			
			if(!empty($this->request->data))
			{
				//print_r($this->request->data);
				//FOR GETTING STUDENT DETAILS FOR FEE Collection
				
				$student_code_ = split('-',$student_code1);
				$student_code = $student_code_[1];
				
				$conditions = array("conditions"=>array('StudentDetail.student_code'=>$student_code,
										'StudentDetail.academic_year_id'=>$academic_year_id));
				$student_details= $this->StudentDetail->find("first",$conditions);
				$this->set('student_details', $student_details); 
				 
				
				$student_id = $student_details['StudentDetail']['id']; 
				
				//TO GET MGNT FEE DETAILS
				$mgnt_conditions = array("conditions"=>array('FeeCollection.student_detail_id'=>$student_id,
										'FeeCollection.academic_year_id'=>$academic_year_id));
				$mgnt_fee_details = $this->FeeCollection->find("all",$mgnt_conditions); 
				$this->set('mgnt_fee_details', $mgnt_fee_details);
				
				//TO GET GOVT FEE DETAILS
				
				$govt_conditions = array("conditions"=>array('GovtFeeCollection.student_detail_id'=>$student_id,
										'GovtFeeCollection.academic_year_id'=>$academic_year_id));
				$govt_fee_details = $this->GovtFeeCollection->find("all",$govt_conditions); 
				$this->set('govt_fee_details', $govt_fee_details);
				
				//TO GET RTE FEE DETAILS
				
				$rte_conditions = array("conditions"=>array('RteFeeCollection.student_detail_id'=>$student_id,
										'RteFeeCollection.academic_year_id'=>$academic_year_id));
				$rte_fee_details = $this->RteFeeCollection->find("all",$rte_conditions); 
				$this->set('rte_fee_details', $rte_fee_details);
				print_r($govt_fee_details);
				
				 
			} 
		}
		
		//FOR CLASS FEE WISE REPORTS
		public function feeClasswiseReport()
		{
			$this->_userSessionCheckout();
			configure::write("debug",0);
			$this->layout="ptes_admin";
			
			if(!empty($this->request->data))
			{
				//print_r($this->request->data);
				
				$class_id = $this->request->data['FeeCollection']['class_id'];
				$academic_year_id = $this->request->data['FeeCollection']['academic_year_id']; 
				
				$conditions = array("conditions"=>array("StudentDetail.add_class_id"=>$class_id,"StudentDetail.academic_year_id"=>$academic_year_id));
				//$conditions = array("conditions"=>array("StudentDetail.add_class_id"=>$class_id));
				$student_list = $this->StudentDetail->find("all",$conditions);
				
				$student_details_array= array();
				$student_details_code= array();
				$student_details_code_rte= array();
				$student_details_array_rte= array();
				
				$govt_class_amount_ = 0;
				$rte_class_amount_ = 0;
				$rte_class_amount_array = array();
				$govt_class_amount_array = array();
				$mgnt_class_amount_ = 0;
				$mgnt_class_amount_array = array();
				$govt_class_paid_amount_array = array();
				$govt_class_paid_amount_ = 0;
				$mgnt_class_paid_amount_array = array();
				$mgnt_class_paid_amount_ = 0;
				$mgnt_class_paid_amount_= 0; 
				
				for($i=0;$i<count($student_list);$i++)
				{			
					
					$rte_or_not = $student_list[$i]['StudentDetail']['admitting_under_rte'];
					if($rte_or_not!="yes")
					{
						$this->set("class_name",$student_list[$i]['AddClass']['class_name']);
						$this->set("academic_year",$student_list[$i]['AcademicYear']['academic_year']); 
						
						$student_details_array[] =  $student_list[$i]['StudentDetail']['student_name'];
						$student_details_code[] =  $student_list[$i]['StudentDetail']['student_code'];
						$this->set('student_details_code',$student_details_code);
						$this->set('student_details_array',$student_details_array);
						$student_id = $student_list[$i]['StudentDetail']['id'];
						$class = $student_list[$i]['StudentDetail']['add_class_id'];
						//$academic_year_id = $student_list[$i]['StudentDetail']['academic_year_id'];
						$academic_year_id = $academic_year_id;
						$caste_id = $student_list[$i]['Caste']['caste'];
						$mpm_non_mpm = $student_list[$i]['StudentDetail']['mpm_employee'];
						$govt_fee_type = "Govt";
						$mgnt_fee_type = "Mgnt";
						$rte_fee_type = "RTE";
						$lang = "Sanskrit";
						$apply_for = $student_list[$i]['StudentDetail']['mpm_employee'];
						if($caste_id=="SC" || $caste_id=="ST")
						{
							$caste_id = "SC/ST";
						}
					
						//FOR CHECKING RTE STUDENT OR NOT
						
										
						//FOR GETTING THE GOVT COURSE FEE FOR EACH CLASS 
						$condition=array('conditions'=>array('academic_year_id'=>$academic_year_id,'add_class_id'=>$class,
										'caste_id'=>$caste_id,'fee_type'=>$govt_fee_type),"fields"=>array('FeeClassWises.total_payable'),'recursive'=>0);
						$govt_class_amount_=$this->FeeClassWises->find('all',$condition); 
						array_push($govt_class_amount_array,$govt_class_amount_[0]['FeeClassWises']['total_payable']);  
						$this->set('govt_class_amount_array',$govt_class_amount_array);
						
						//print_r($govt_class_amount_);
						//FOR GETTING THE MGNT COURSE FEE FOR EACH CLASS 
						$mgnt_condition=array('conditions'=>array('academic_year_id'=>$academic_year_id,'add_class_id'=>$class,
										'caste_id'=>$caste_id,'fee_type'=>$mgnt_fee_type,'apply_for'=>$apply_for),"fields"=>array('FeeClassWises.total_payable'),'recursive'=>0); 
						$mgnt_class_amount_=$this->FeeClassWises->find('all',$mgnt_condition); 
						array_push($mgnt_class_amount_array,$mgnt_class_amount_[0]['FeeClassWises']['total_payable']);  
						$this->set('mgnt_class_amount_array',$mgnt_class_amount_array);
						
						//FOR GETTING THE PAID GOVT FOR INDIVIDUAL STUDENT
						$govt_class_paid_amount_  = $this->GovtFeeCollection->query("select sum(paying_amount)as TOTAL_PAID from govt_fee_collections as GovtFeeCollection  where GovtFeeCollection.add_class_id = $class and GovtFeeCollection.academic_year_id = $academic_year_id and GovtFeeCollection.student_detail_id = $student_id");
						$govt_class_paid_amount_array[]=$govt_class_paid_amount_[0][0]['TOTAL_PAID']; 
						$this->set("govt_class_paid_amount_array",$govt_class_paid_amount_array);
						
						//FOR GETTING THE PAID MGNT FOR INDIVIDUAL STUDENT
						$mgnt_class_paid_amount_  = $this->FeeCollection->query("select sum(paying_amount)as TOTAL_PAID from fee_collections as FeeCollection  where FeeCollection.add_class_id = $class and FeeCollection.academic_year_id = $academic_year_id and FeeCollection.student_detail_id = $student_id");
						//echo "select sum(paying_amount)as TOTAL_PAID from fee_collections as FeeCollection  where FeeCollection.add_class_id = $class and FeeCollection.academic_year_id = $academic_year_id and FeeCollection.student_detail_id = $student_id";
						$mgnt_class_paid_amount_array[]=$mgnt_class_paid_amount_[0][0]['TOTAL_PAID']; 
						$this->set("mgnt_class_paid_amount_array",$mgnt_class_paid_amount_array); 
						//print_r($mgnt_class_paid_amount_array);
						
					}
					/** FOR RTE STUDENT **/
					else
					{
						$this->set("class_name",$student_list[$i]['AddClass']['class_name']);
						$this->set("academic_year",$student_list[$i]['AcademicYear']['academic_year']); 
						$student_details_array_rte[] =  $student_list[$i]['StudentDetail']['student_name'];
						$student_details_code_rte[] =  $student_list[$i]['StudentDetail']['student_code'];
						$this->set('student_details_code_rte',$student_details_code_rte);
						$this->set('student_details_array_rte',$student_details_array_rte);
						$student_id = $student_list[$i]['StudentDetail']['id'];
						$class = $student_list[$i]['StudentDetail']['add_class_id'];
						$academic_year_id = $student_list[$i]['StudentDetail']['academic_year_id']; 
						$rte_fee_type = "RTE";
						$lang = "Sanskrit";
						
						//FOR GETTING THE RTE COURSE FEE FOR EACH CLASS 
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
						array_push($rte_class_amount_array,$rte_class_amount_[0]['FeeClassWises']['total_payable']);  
						$this->set('rte_class_amount_array',$rte_class_amount_array);
						
						//FOR GETTING THE PAID RTE FOR INDIVIDUAL STUDENT
						$rte_class_paid_amount_  = $this->RteFeeCollection->query("select sum(paying_amount)as TOTAL_PAID from rte_fee_collections as RteFeeCollection  where RteFeeCollection.add_class_id = $class and RteFeeCollection.academic_year_id = $academic_year_id and RteFeeCollection.student_detail_id = $student_id");
						$rte_class_paid_amount_array[]=$rte_class_paid_amount_[0][0]['TOTAL_PAID']; 
						$this->set("rte_class_paid_amount_array",$rte_class_paid_amount_array);  
					 	
					}
					  
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
		//FOR PRINT
		public function feeClasswiseReportPrint($class_id,$academic_year_id)
		{
			$this->_userSessionCheckout();
			configure::write("debug",0);
			$this->layout="ajax";
			
			if($class_id!='' && $academic_year_id!='')
			{
				//print_r($this->request->data);
				
				//$class_id = $this->request->data['FeeCollection']['class_id'];
				//$academic_year_id = $this->request->data['FeeCollection']['academic_year_id']; 
				
				$conditions = array("conditions"=>array("StudentDetail.add_class_id"=>$class_id,"StudentDetail.academic_year_id"=>$academic_year_id));
				$student_list = $this->StudentDetail->find("all",$conditions);
				
				$student_details_array= array();
				$student_details_code= array();
				$student_details_code_rte= array();
				$student_details_array_rte= array();
				
				$govt_class_amount_ = 0;
				$rte_class_amount_ = 0;
				$rte_class_amount_array = array();
				$govt_class_amount_array = array();
				$mgnt_class_amount_ = 0;
				$mgnt_class_amount_array = array();
				$govt_class_paid_amount_array = array();
				$govt_class_paid_amount_ = 0;
				$mgnt_class_paid_amount_array = array();
				$mgnt_class_paid_amount_ = 0;
				$mgnt_class_paid_amount_= 0; 
				
				for($i=0;$i<count($student_list);$i++)
				{			
					
					$rte_or_not = $student_list[$i]['StudentDetail']['admitting_under_rte'];
					if($rte_or_not!="yes")
					{
						$this->set("class_name",$student_list[$i]['AddClass']['class_name']);
						$this->set("academic_year",$student_list[$i]['AcademicYear']['academic_year']); 
						$student_details_array[] =  $student_list[$i]['StudentDetail']['student_name'];
						$student_details_code[] =  $student_list[$i]['StudentDetail']['student_code'];
						$this->set('student_details_code',$student_details_code);
						$this->set('student_details_array',$student_details_array);
						$student_id = $student_list[$i]['StudentDetail']['id'];
						$class = $student_list[$i]['StudentDetail']['add_class_id'];
						$academic_year_id = $student_list[$i]['StudentDetail']['academic_year_id'];
						$caste_id = $student_list[$i]['Caste']['caste'];
						$mpm_non_mpm = $student_list[$i]['StudentDetail']['mpm_employee'];
						$govt_fee_type = "Govt";
						$mgnt_fee_type = "Mgnt";
						$rte_fee_type = "RTE";
						$lang = "Sanskrit";
						$apply_for = $student_list[$i]['StudentDetail']['mpm_employee'];
						if($caste_id=="SC" || $caste_id=="ST")
						{
							$caste_id = "SC/ST";
						}
					
						//FOR CHECKING RTE STUDENT OR NOT
						
										
						//FOR GETTING THE GOVT COURSE FEE FOR EACH CLASS 
						$condition=array('conditions'=>array('academic_year_id'=>$academic_year_id,'add_class_id'=>$class,
										'caste_id'=>$caste_id,'fee_type'=>$govt_fee_type),"fields"=>array('FeeClassWises.total_payable'),'recursive'=>0);
						$govt_class_amount_=$this->FeeClassWises->find('all',$condition); 
						array_push($govt_class_amount_array,$govt_class_amount_[0]['FeeClassWises']['total_payable']);  
						$this->set('govt_class_amount_array',$govt_class_amount_array);
						
						//print_r($govt_class_amount_);
						//FOR GETTING THE MGNT COURSE FEE FOR EACH CLASS 
						$mgnt_condition=array('conditions'=>array('academic_year_id'=>$academic_year_id,'add_class_id'=>$class,
										'caste_id'=>$caste_id,'fee_type'=>$mgnt_fee_type,'apply_for'=>$apply_for),"fields"=>array('FeeClassWises.total_payable'),'recursive'=>0); 
						$mgnt_class_amount_=$this->FeeClassWises->find('all',$mgnt_condition); 
						array_push($mgnt_class_amount_array,$mgnt_class_amount_[0]['FeeClassWises']['total_payable']);  
						$this->set('mgnt_class_amount_array',$mgnt_class_amount_array);
						
						//FOR GETTING THE PAID GOVT FOR INDIVIDUAL STUDENT
						$govt_class_paid_amount_  = $this->GovtFeeCollection->query("select sum(paying_amount)as TOTAL_PAID from govt_fee_collections as GovtFeeCollection  where GovtFeeCollection.add_class_id = $class and GovtFeeCollection.academic_year_id = $academic_year_id and GovtFeeCollection.student_detail_id = $student_id");
						$govt_class_paid_amount_array[]=$govt_class_paid_amount_[0][0]['TOTAL_PAID']; 
						$this->set("govt_class_paid_amount_array",$govt_class_paid_amount_array);
						
						//FOR GETTING THE PAID MGNT FOR INDIVIDUAL STUDENT
						$mgnt_class_paid_amount_  = $this->FeeCollection->query("select sum(paying_amount)as TOTAL_PAID from fee_collections as FeeCollection  where FeeCollection.add_class_id = $class and FeeCollection.academic_year_id = $academic_year_id and FeeCollection.student_detail_id = $student_id");
						$mgnt_class_paid_amount_array[]=$mgnt_class_paid_amount_[0][0]['TOTAL_PAID']; 
						$this->set("mgnt_class_paid_amount_array",$mgnt_class_paid_amount_array); 
						
					}
					/** FOR RTE STUDENT **/
					else
					{
						$this->set("class_name",$student_list[$i]['AddClass']['class_name']);
						$this->set("academic_year",$student_list[$i]['AcademicYear']['academic_year']); 
						$student_details_array_rte[] =  $student_list[$i]['StudentDetail']['student_name'];
						$student_details_code_rte[] =  $student_list[$i]['StudentDetail']['student_code'];
						$this->set('student_details_code_rte',$student_details_code_rte);
						$this->set('student_details_array_rte',$student_details_array_rte);
						$student_id = $student_list[$i]['StudentDetail']['id'];
						$class = $student_list[$i]['StudentDetail']['add_class_id'];
						$academic_year_id = $student_list[$i]['StudentDetail']['academic_year_id']; 
						$rte_fee_type = "RTE";
						$lang = "Sanskrit";
						
						//FOR GETTING THE RTE COURSE FEE FOR EACH CLASS 
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
						array_push($rte_class_amount_array,$rte_class_amount_[0]['FeeClassWises']['total_payable']);  
						$this->set('rte_class_amount_array',$rte_class_amount_array);
						
						//FOR GETTING THE PAID RTE FOR INDIVIDUAL STUDENT
						$rte_class_paid_amount_  = $this->RteFeeCollection->query("select sum(paying_amount)as TOTAL_PAID from rte_fee_collections as RteFeeCollection  where RteFeeCollection.add_class_id = $class and RteFeeCollection.academic_year_id = $academic_year_id and RteFeeCollection.student_detail_id = $student_id");
						$rte_class_paid_amount_array[]=$rte_class_paid_amount_[0][0]['TOTAL_PAID']; 
						$this->set("rte_class_paid_amount_array",$rte_class_paid_amount_array);  
					 	
					}
					  
				} 
							
			}  
		}
		
		
		function classWiseStudentReport()
		{
			$this->_userSessionCheckout();
			$this->layout="ptes_admin";
			$class_id = $this->request->data['FeeCollection']['class_id'];
			$academic_year_id = $this->request->data['FeeCollection']['academic_year_id']; 
				
			$conditions = array("conditions"=>array("StudentDetail.add_class_id"=>$class_id,"StudentDetail.academic_year_id"=>$academic_year_id),"recursive"=>0);
			$student_list = $this->StudentDetail->find("all",$conditions);
			$this->set('student_list',$student_list) ;
			
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
		public function viewFeeAssignOther($id=null)
		{
			$this->_userSessionCheckout();
			$this->layout="ptes_admin";
			$this->request->data = $this->FeeClassWises->read(null,$id);
			
		}
		public function viewFeeAssignRte($id=null)
		{
			$this->_userSessionCheckout();
			$this->layout="ptes_admin";
			$this->request->data = $this->FeeClassWises->read(null,$id);
			
		}
		
}
