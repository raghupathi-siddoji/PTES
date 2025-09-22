<?php 
 
class PayrollMaintenanceController extends AppController {

 
	public $uses = array('AcademicYear','Admin','BasicAllocation','StaffPayrollDetail','StaffPayroll','SalaryComponent','StaffDetail','PayrollComponent','PayrollComponentDetail','StaffAttendance');
	public $helpers = array('Html', 'Form', 'Js','Session');


		 public function staffDetails()
		{
			$this->_userSessionCheckout();
			$this->layout="ptes_admin";
		}
		public function basicAllocation()
		{
			$this->_userSessionCheckout();
			configure::write("debug",0);
			$this->layout="ptes_admin";
			
			if(!empty($this->request->data))
			{
				$basicAllocation = $this->request->data['BasicAllocation']['staff_detail_id']; 
				for($i=0;$i<count($basicAllocation);$i++) 
				{
					if($this->request->data['BasicAllocation']['staff_detail_id'][$i]!="")
					{
						$data = array(
							"BasicAllocation"=>array(
							'staff_detail_id'=>$this->request->data['BasicAllocation']['staff_detail_id'][$i],
							'basic_salary'=>$this->request->data['BasicAllocation']['basic_salary'][$i],
							'staff_cl'=>$this->request->data['BasicAllocation']['staff_cl'][$i],
							'staff_el'=>$this->request->data['BasicAllocation']['staff_el'][$i]
							
							)
						);
						 
						$this->BasicAllocation->id = $this->request->data['BasicAllocation']['id'][$i];
						$this->BasicAllocation->save($data); 
						
					} 
				}
					
					
			}
			//$conditions = array("conditions"=>array("emp_status"=>"Active"));
			$staffList = $this->StaffDetail->find('all'); 
			$this->set("staffList",$staffList); 
			
			$salary = $this->BasicAllocation->find('all');
			$this->set("salary",$salary);
			 
			
		}
		public function salaryComponent($id=null)
		{
			$this->_userSessionCheckout();
			$this->layout="ptes_admin";
			if(!empty($this->request->data))
			{
				 $conditions = array("component_name"=>$this->request->data['SalaryComponent']['component_name'],
									"component_type"=>$this->request->data['SalaryComponent']['component_type']);
				
				if($this->SalaryComponent->hasAny($conditions))
				{
					$this->Session->setFlash("<div class='alert alert-danger fade in' style='height:50px'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
					<i class='fa fa-check'></i>Component already exist.</div>");
				}
				else
				{
				 
					$this->SalaryComponent->save($this->request->data);
					$this->Session->setFlash("<div class='alert alert-success fade in' style='height:50px'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
					<i class='fa fa-check'></i> Component Details saved.</div>");
					$this->redirect(array("controller"=>"PayrollMaintenance","action"=>"salaryComponent"));
				}
				
			}
			else if(empty($this->request->data))
			{
				$this->request->data = $this->SalaryComponent->read(null,$id);  
			}
			$component_list = $this->SalaryComponent->find("all");
			$this->set("component_list",$component_list);
			
		}
		public function deleteComponent($id=null)
		{
			$this->_userSessionCheckout();
			$this->layout="ptes_admin"; 
			$this->SalaryComponent->delete($id);
			$this->Session->setFlash("<div class='alert alert-danger fade in' style='height:50px'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
					<i class='fa  fa-trash-o'></i> Component Deleted.</div>");
			$this->redirect(array("controller"=>"PayrollMaintenance","action"=>"salaryComponent"));
		}
		
		public function payrollComponent($id=null)
		{
			$this->_userSessionCheckout();
			configure::write("debug",0);
			$this->layout="ptes_admin";
			
			if(!empty($this->request->data))
			{
				//For Save Component 
				$conditions = array("conditions"=>array("staff_detail_id"=>$this->request->data['PayrollComponent']['staff_detail_id']));
				$component = $this->PayrollComponent->find("first",$conditions);
				if(empty($component))
				{
					$this->PayrollComponent->save($this->request->data['PayrollComponent']);
					$payrollComponent_id = $this->PayrollComponent->id;
					if($payrollComponent_id>0)
					{
						$component = $this->request->data['PayrollComponentDetail']['component_name']; 
						for($i=0;$i<count($component);$i++) 
						{
							if($this->request->data['PayrollComponentDetail']['component_name'][$i]!="")
							{
								$data = array(
									"PayrollComponentDetail"=>array(
									'payroll_component_id'=>$payrollComponent_id,
									'staff_detail_id'=>$this->request->data['PayrollComponent']['staff_detail_id'],
									'component_name'=>$this->request->data['PayrollComponentDetail']['component_name'][$i],
									'component_type'=>$this->request->data['PayrollComponentDetail']['component_type'][$i],
									'component_value'=>$this->request->data['PayrollComponentDetail']['component_value'][$i],
									'amount_pre'=>$this->request->data['PayrollComponentDetail']['amount_pre'][$i],
									)
								);
								 //print_r($data);
								
								 $this->PayrollComponentDetail->create();
								 $this->PayrollComponentDetail->id = $this->request->data['PayrollComponentDetail']['id'][$i];
								 $this->PayrollComponentDetail->save($data); 
								} 
						}
						$this->Session->setFlash("<div class='alert alert-success fade in' style='height:50px'>
							<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
							<i class='fa fa-check'></i> Component assign successfully.</div>");
								$this->redirect(array("controller"=>"PayrollMaintenance","action"=>"payrollComponent"));
							 
					}
				}
				else
				{
					$this->Session->setFlash("<div class='alert alert-success fade in' style='height:50px'>
							<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
							<i class='fa fa-check'></i> Component already assign .</div>");
								$this->redirect(array("controller"=>"PayrollMaintenance","action"=>"payrollComponent"));
				}
				 
			}
			else if(empty($this->request->data))
			{
				$this->request->data = $this->PayrollComponent->read(null,$id); 
				//print_r($this->request->data);
			}
			
			//For gettting salary comonent
			$component_list = $this->SalaryComponent->find("all");
			$this->set("component_list",$component_list);
			
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
			
			//For gettting payroll component
			$payroll_component_list = $this->PayrollComponent->find("all");
			$this->set("payroll_component_list",$payroll_component_list);  
			
		}
		public function editPayrollComponent($id=null)
		{
			$this->_userSessionCheckout();
			configure::write("debug",0);
			$this->layout="ptes_admin";
			
			if(!empty($this->request->data))
			{
				//For Save Component 
				 	$this->PayrollComponent->save($this->request->data['PayrollComponent']);
					$payrollComponent_id = $this->PayrollComponent->id;
					if($payrollComponent_id>0)
					{
						$component = $this->request->data['PayrollComponentDetail']['component_name']; 
						for($i=0;$i<count($component);$i++) 
						{
							if($this->request->data['PayrollComponentDetail']['component_name'][$i]!="")
							{
								$data = array(
									"PayrollComponentDetail"=>array(
									'payroll_component_id'=>$payrollComponent_id,
									'staff_detail_id'=>$this->request->data['PayrollComponent']['staff_detail_id'],
									'component_name'=>$this->request->data['PayrollComponentDetail']['component_name'][$i],
									'component_type'=>$this->request->data['PayrollComponentDetail']['component_type'][$i],
									'component_value'=>$this->request->data['PayrollComponentDetail']['component_value'][$i],
									'amount_pre'=>$this->request->data['PayrollComponentDetail']['amount_pre'][$i],
									)
								);
								 //print_r($data);
								
								 $this->PayrollComponentDetail->create();
								 $this->PayrollComponentDetail->id = $this->request->data['PayrollComponentDetail']['id'][$i];
								 $this->PayrollComponentDetail->save($data); 
								} 
						}
						$this->Session->setFlash("<div class='alert alert-success fade in' style='height:50px'>
							<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
							<i class='fa fa-check'></i> Component assign successfully.</div>");
								$this->redirect(array("controller"=>"PayrollMaintenance","action"=>"payrollComponent"));
							 
					} 
				 
			}
			else if(empty($this->request->data))
			{
				$this->request->data = $this->PayrollComponent->read(null,$id); 
				//print_r($this->request->data);
			}
			
			//For gettting salary comonent
			$component_list = $this->SalaryComponent->find("all");
			$this->set("component_list",$component_list);
			
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
			
			//For gettting payroll component
			$payroll_component_list = $this->PayrollComponent->find("all");
			$this->set("payroll_component_list",$payroll_component_list);  
			
		}
		public function deletePayrollComponent($id=null)
		{
			$this->_userSessionCheckout();
			$this->layout="ptes_admin";
			$this->PayrollComponent->delete($id);
			$this->Session->setFlash("<div class='alert alert-danger fade in' style='height:50px'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
					<i class='fa  fa-trash-o'></i> Component Deleted.</div>");
			$this->redirect(array("controller"=>"PayrollMaintenance","action"=>"payrollComponent"));
		}
		public function payrollGeneration()
		{
			$this->_userSessionCheckout();
			configure::write("debug",0);
			$this->layout="ptes_admin";
			$total_earning_fixed_amount=0;
			$total_deduction_fixed_amount=0;
			$esi_amount_total=0;
			$other_amount_total=0;
			$total_deduction_amount=0;
			$attendance_bonus=0; 
			$gross_salary=0;
			$basic_salary=0;
			$home_allocated="";
			$pt=0;
			$special_inc_amount = 0;
			$cl_tot_count = 0;
			$el_tot_count = 0;
			$present_tot_count = 0;
			$year_cl_tot_count = 0;
			$year_el_tot_count = 0;
			$cl_lwa = 0;
			$el_lwa = 0;
			$cl_lwa_amt = 0;
			$el_lwa_amt = 0;
			$cl_day_wages =0;
			$cl_days_wages_amount = 0;
			$el_day_wages =0;
			$el_days_wages_amount = 0;
			$total_lwa = 0;
			$absent_tot_count = 0;
			$perday_wages = 0;
			$absent_count = 0;
			$status = 0;
			$hd_tot_count = 0;
			if(!empty($this->request->data))
			{
				$month = $this->request->data['StaffPayroll']['month'];
				$academic_year_id = $this->request->data['StaffPayroll']['academic_year_id'];
				
				$payroll_conditions = array("month"=>$this->request->data['StaffPayroll']['month'],"academic_year_id"=>$this->request->data['StaffPayroll']['academic_year_id']);
				if(!$this->StaffPayroll->hasAny($payroll_conditions))
				{
					//print_r($this->request->data); 
					//FOR GETTING ALL STAFF DETAILS
					//$conditions = array("conditions"=>array("emp_status"=>"Active"));
					$staff_list = $this->StaffDetail->find('all',	array('recursive' => 2));
					$i=0;
					 
					foreach($staff_list as $list)
					{
						$basic_salary = $list['BasicAllocation']['basic_salary'] ;
						$staff_id = $list['StaffDetail']['id'];
						$staff_el = $list['BasicAllocation']['staff_el'];
						$staff_cl = $list['BasicAllocation']['staff_cl']; 
						$perday_wages = $basic_salary / 30;
						
						//FOR GETTING ACADEMIC YEAR WISE CL AND EL FROM THE ATTENDANCE
						$yearwise_conditions = array("conditions"=>array('staff_detail_id'=>$staff_id,'academic_year_id'=>$academic_year_id,"month <="=>$month),"recursive"=>0);
						$yearwise_attendance = $this->StaffAttendance->find('all',$yearwise_conditions);
						foreach($yearwise_attendance as $year_count)
						{
							for($ya=1;$ya<=31;$ya++)
							{
								if($year_count['StaffAttendance']["day$ya"]=="CL"){$year_cl_tot_count++;}
								if($year_count['StaffAttendance']["day$ya"]=="EL"){$year_el_tot_count++;}
								
								
							}
						}  
						 
						//FOR GETTING MONTH WISE CL , EL ,Half Day AND ABSENT FROM THE ATTENDANCE
						$cl_conditions = array("conditions"=>array('staff_detail_id'=>$staff_id,'academic_year_id'=>$academic_year_id,'month'=>$month),"recursive"=>0);
						$cl_count = $this->StaffAttendance->find('all',$cl_conditions);
						
						foreach($cl_count as $leave_count)
						{
							for($a=1;$a<=31;$a++)
							{
								if($leave_count['StaffAttendance']["day$a"]=="CL"){$cl_tot_count++;}
								if($leave_count['StaffAttendance']["day$a"]=="EL"){$el_tot_count++;	}
								if($leave_count['StaffAttendance']["day$a"]=="P"){$present_tot_count++;	}
								if($leave_count['StaffAttendance']["day$a"]=="A"){$absent_tot_count++;	}
								if($leave_count['StaffAttendance']["day$a"]=="HD"){$hd_tot_count++;	}  
							}
						}
						$cl_tot_count = $cl_tot_count + $hd_tot_count/2;
					  //FOR CALCULATE LOSS OF WAGES BASED ON THE CL AND EL
					    $cl_tot_count = ceil($cl_tot_count);
						if($cl_tot_count>0)
						{
							if($year_cl_tot_count>$staff_cl)
							{
								$cl_lwa = $year_cl_tot_count-$staff_cl; 
								$cl_day_wages = $basic_salary / 30;
								$cl_days_wages_amount = $cl_day_wages * $cl_lwa;
							}
						}
						if($el_tot_count>0)
						{
							if($year_el_tot_count>$staff_el)
							{
								$el_lwa = $year_el_tot_count-$staff_el; 
								$el_day_wages = $basic_salary / 30;
								$el_days_wages_amount = $el_day_wages * $el_lwa;
							}
						}
						
						//FINDING LWA FOR ATTENDANCE
						$absent_count = $absent_tot_count* $perday_wages;
						
						
						$total_lwa = $cl_days_wages_amount + $el_days_wages_amount + $absent_count; 	
							
						//FOR CHECKING ATTENDANCE LEAVE BONUS 
						 $no_of_leave = $cl_tot_count + $el_tot_count;
						
						if($no_of_leave==0)
						{
							$attendance_bonus=300;
						}
						else if($no_of_leave>0 && $no_of_leave<2)
						{
							 
							$attendance_bonus=200;
						} 
						else if($no_of_leave>=2 && $no_of_leave<3)
						{
							$attendance_bonus=100;
						}
						
						else if($no_of_leave>=3)
						{
							$attendance_bonus=0;
						}
					 
						$gross_salary = $basic_salary + $total_earning_fixed_amount + $attendance_bonus ; 
						
						foreach($list['PayrollComponentDetail'] as $component)
						{
							if($component['component_type']=="Earnings")
							{
								if($component['component_value']=="Fixed")
								{
									$home_allocated = $list['PayrollComponent'][$i]['home_allocated'];
									
									if($list['PayrollComponent'][$i]['home_allocated']=="allocated")
									{ 
										if($component['component_name']=="HRA")
										{
										
											$component['amount_pre']=0;
										} 
									}
									/*else if($component['component_name']=="Special Incentive"){
										$component['amount_pre']=0;
										
									}*/
									else
									{
										
										//echo "<br>".$component['component_name']."-".$component['amount_pre'];
										//$total_earning_fixed_amount = $total_earning_fixed_amount + $component['amount_pre'] ; 
									} 
									$total_earning_fixed_amount = $total_earning_fixed_amount + $component['amount_pre'] ;
									//echo "<br>".$component['component_name']."-".$component['amount_pre'];
								}  
							}
							
							$gross_salary = $basic_salary + $total_earning_fixed_amount + $attendance_bonus ; 
							$gross_salary = $gross_salary - $total_lwa; 
							
						}
						
						foreach($list['PayrollComponentDetail'] as $component)
						{
							//FOR GETTING DEDUCTION COMPONENT
							if($component['component_type']=="Deduction")
							{
								if($component['component_value']=="Fixed")
								{
									if($component['component_name']=="PT" || $component['component_name']=="pt")
									{
										 if($gross_salary>15000)
										{
											$pt = $component['amount_pre'];
										} 		
									}
									 else
									 {
										
										 $total_deduction_fixed_amount =  $total_deduction_fixed_amount + (float)$component['amount_pre'];
									 }
									
								} 
								else if($component['component_value']=="Variable")
								{
									
									//HAVE TO CALCULATE ESI BASED ON GROSS SALARY AND EMP SALARY < 15,000
									if($component['component_name']=="ESI" || $component['component_name']=="esi")
									{
										 
										if($basic_salary<15000)
										{
											 
											$esi_amount =  $gross_salary*(float)$component['amount_pre'];
											$esi_amount_total = $esi_amount_total + $esi_amount / 100;
										}
										
									} 
									else 
									{
										$other_amount = $basic_salary*(float)$component['amount_pre'];
										$other_amount_total = $other_amount_total + $other_amount / 100;  
									}
									 
									
								} 
							} 
						}
						
						$total_deduction_amount = 	$esi_amount_total + $other_amount_total + $total_deduction_fixed_amount + $pt;
						
						//echo "other amount".$total_deduction_fixed_amount;
						//echo "<br>Total Deduction:".$total_deduction_amount;
						//echo " -Total Gross:". $gross_salary ;
						$net_salary = $gross_salary - $total_deduction_amount;
						//echo " -Total Net:".$net_salary;
						//FOR SAVE PAYROLL DETAILS
						
						//$payroll_date = $this->request->data['StaffPayroll']['payment_date'];
						//$dateb = new DateTime($payroll_date);
						$this->request->data['StaffPayroll']['staff_detail_id'] = $list['StaffDetail']['id'];
						$this->request->data['StaffPayroll']['month'] = $this->request->data['StaffPayroll']['month'];
						$this->request->data['StaffPayroll']['academic_year_id'] = $this->request->data['StaffPayroll']['academic_year_id'];
						$this->request->data['StaffPayroll']['payment_date'] = date('Y-m-d');
						$this->request->data['StaffPayroll']['basic_salary'] = $basic_salary;
						$this->request->data['StaffPayroll']['present_day'] = $present_tot_count;
						$this->request->data['StaffPayroll']['absent_day'] = $absent_tot_count;
						$this->request->data['StaffPayroll']['cl'] = $cl_tot_count;
						$this->request->data['StaffPayroll']['el'] = $el_tot_count;
						$this->request->data['StaffPayroll']['cl_lwa'] = $cl_days_wages_amount;
						$this->request->data['StaffPayroll']['el_lwa'] = $el_days_wages_amount;
						$this->request->data['StaffPayroll']['ab_lwa'] = $absent_count;
						$this->request->data['StaffPayroll']['gross_salary'] = $gross_salary;
						$this->request->data['StaffPayroll']['net_salary'] = $net_salary;
						$this->request->data['StaffPayroll']['home_allocated'] = $home_allocated;
						$this->StaffPayroll->saveAll($this->request->data['StaffPayroll']);
						 
						//FOR STORAING PAYROLL DETAILS WITH THE COMPONENT
						$staff_payroll_id = $this->StaffPayroll->id;
						if($staff_payroll_id>0)
						{
							foreach($list['PayrollComponentDetail'] as $component)
							{
								$data = array(
									"StaffPayrollDetail"=>array(
										"staff_payroll_id"=>$staff_payroll_id,
										"component_name"=>$component['component_name'],
										"component_type"=>$component['component_type'],
										"amount_pre"=>$component['amount_pre'] 
									) 
								);
								
								$this->StaffPayrollDetail->saveAll($data);
							} 
						}
						
					 
						$this->Session->setFlash("<div class='alert alert-success fade in' style='height:50px'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<i class='fa fa-check'></i> Payroll generated.</div>");
						
							
						//FOR STORAING PAYROLL DETAILS WITH THE COMPONENT
						$i++; 
						$total_earning_fixed_amount=0;
						$total_deduction_fixed_amount=0;
						$esi_amount_total=0;
						$other_amount_total=0;
						$total_deduction_amount=0;
						$attendance_bonus=0; 
						$gross_salary=0;
						$basic_salary=0;
						$pt=0;
						$home_allocated ="";
						$special_inc_amount = 0;
						$cl_tot_count = 0;
						$el_tot_count = 0;
						$present_tot_count = 0;
						$year_cl_tot_count = 0;
						$year_el_tot_count = 0;
						$cl_lwa = 0;
						$el_lwa = 0;
						$cl_lwa_amt = 0;
						$el_lwa_amt = 0;
						$cl_day_wages =0;
						$cl_days_wages_amount = 0;
						$el_day_wages =0;
						$el_days_wages_amount = 0;
						$total_lwa = 0;
						$absent_tot_count = 0;
						$perday_wages = 0;
						$absent_count = 0;
						$hd_tot_count = 0; 
					}
					
					
				}
				else
				{
					
					$this->Session->setFlash("<div class='alert alert-warning fade in' style='height:50px'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<i class='fa fa-check'></i> Already Payroll generated for this Month.</div>");
							//$this->redirect(array("controller"=>"PayrollMaintenance","action"=>"payrollGeneration"));
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
		
		public function payrollList()
		{
			$this->_userSessionCheckout();
			$this->layout="ptes_admin";
			if($this->request->data)
			{
				$conditions = array("conditions"=>array("month"=>$this->request->data['StaffPayroll']['month'],"academic_year_id"=>$this->request->data['StaffPayroll']['academic_year_id']));
				$payroll_list = $this->StaffPayroll->find("all",$conditions);
				$this->set("payroll_list",$payroll_list);
				//print_r($payroll_list) ;
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
		
		public function deleteStaffPayroll($id=null)
		{
			$this->_userSessionCheckout();
			$this->layout="ptes_admin";
			$payroll_list = $this->StaffPayroll->delete($id,true);
			$this->Session->setFlash("<div class='alert alert-warning fade in' style='height:50px'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<i class='fa fa-check'></i>Record deleted successfully.. </div>");
							$this->redirect(array("controller"=>"PayrollMaintenance","action"=>"payrollList"));
		}
		public function monthlySalaryList()
		{
			$this->_userSessionCheckout();
			$this->layout="ptes_admin";
			
			if($this->request->data)
			{
				$conditions = array("conditions"=>array("month"=>$this->request->data['StaffPayroll']['month'],"academic_year_id"=>$this->request->data['StaffPayroll']['academic_year_id']));
				$monthly_payroll_list = $this->StaffPayroll->find("all",$conditions);
				$this->set("monthly_payroll_list",$monthly_payroll_list); 
				$this->render('monthly_salary_report');
				
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
		public function monthlySalaryReportPrint($ay=null,$month=null)
		{
			$this->_userSessionCheckout();
			$this->layout="ajax";
			
			if($ay!='' && $month!='')
			{
				$conditions = array("conditions"=>array("month"=>$month,"academic_year_id"=>$ay));
				$monthly_payroll_list = $this->StaffPayroll->find("all",$conditions);
				$this->set("monthly_payroll_list",$monthly_payroll_list);
				//$this->redirect(array("controller"=>"PayrollMaintenance","action"=>"payrollList"));
				//$this->render('monthly_salary_report');
				
			} 
		}
		public function monthlyRemmitanceList()
		{
			$this->_userSessionCheckout();
			$this->layout="ptes_admin";
			
			if($this->request->data)
			{
				$conditions = array("conditions"=>array("month"=>$this->request->data['StaffPayroll']['month'],"academic_year_id"=>$this->request->data['StaffPayroll']['academic_year_id']));
				$monthly_payroll_list = $this->StaffPayroll->find("all",$conditions);
				$this->set("monthly_payroll_list",$monthly_payroll_list);
				//$this->redirect(array("controller"=>"PayrollMaintenance","action"=>"payrollList"));
				$this->render('monthly_remmitance_report');
				
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
		public function monthlyRemmitanceReportPrint($ay=null,$month=null)
		{
			$this->_userSessionCheckout();
			$this->layout="ajax";
			
			if($ay!='' && $month!='')
			{
				$conditions = array("conditions"=>array("month"=>$month,"academic_year_id"=>$ay));
				$monthly_payroll_list = $this->StaffPayroll->find("all",$conditions);
				$this->set("monthly_payroll_list",$monthly_payroll_list);  
			}
			 
		}
		
		public function monthlyRemmitanceEsi()
		{
			$this->_userSessionCheckout();
			$this->layout="ptes_admin";
			
			if($this->request->data)
			{
				$conditions = array("conditions"=>array("month"=>$this->request->data['StaffPayroll']['month'],"academic_year_id"=>$this->request->data['StaffPayroll']['academic_year_id']));
				$monthly_payroll_list = $this->StaffPayroll->find("all",$conditions);
				$this->set("monthly_payroll_list",$monthly_payroll_list);
				//$this->redirect(array("controller"=>"PayrollMaintenance","action"=>"payrollList"));
				$this->render('monthly_remmitance_esi_report');
				
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
		public function monthlyRemmitanceEsiReportPrint($ay=null,$month=null)
		{
			$this->_userSessionCheckout();
			$this->layout="ajax";
			
			if($ay!='' && $month!='')
			{
				$conditions = array("conditions"=>array("month"=>$month,"academic_year_id"=>$ay));
				$monthly_payroll_list = $this->StaffPayroll->find("all",$conditions);
				$this->set("monthly_payroll_list",$monthly_payroll_list); 
			} 
		}
		
		public function monthlyStaffSalary()
		{
			$this->_userSessionCheckout();
			$this->layout="ptes_admin";
			
			if($this->request->data)
			{
				$conditions = array("conditions"=>array("month"=>$this->request->data['StaffPayroll']['month'],"academic_year_id"=>$this->request->data['StaffPayroll']['academic_year_id']));
				$monthly_payroll_list = $this->StaffPayroll->find("all",$conditions);
				$this->set("monthly_payroll_list",$monthly_payroll_list);
				//$this->redirect(array("controller"=>"PayrollMaintenance","action"=>"payrollList"));
				$this->render('monthly_staff_salary_report');
				
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
		public function monthlyStaffSalaryReportPrint($ay=null,$month=null)
		{
			$this->_userSessionCheckout();
			$this->layout="ajax";
			
			if($ay!='' && $month!='')
			{
				$conditions = array("conditions"=>array("month"=>$month,"academic_year_id"=>$ay));
				$monthly_payroll_list = $this->StaffPayroll->find("all",$conditions);
				$this->set("monthly_payroll_list",$monthly_payroll_list);
				 
			} 
		}
		 
		
}
