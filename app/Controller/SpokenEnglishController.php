
<?php 

class SpokenEnglishController extends AppController {

 
	public $uses = array('StudentDetail','AcademicYear','AddClass','Section','SpokenEnglish','SpokenEnglishDetail');
	public $helpers = array('Html', 'Form', 'Js','Session');



		// Spoken English
		
		public function SpokenEnglish()
		{
			$this->_userSessionCheckout();
			$this->layout="ptes_admin"; 
			$this->_getClass(); 
			$this->_getAcademicYear();
			configure::write('debug',0);
			
			$academic_year_id=$this->request->data['SpokenEnglish']['academic_year_id'];
			$class_id=$this->request->data['SpokenEnglish']['add_class_id'];
			$date=$this->request->data['SpokenEnglish']['date'];
			$this->set('academic_year_id',$academic_year_id);
			$this->set('class_id',$class_id);
			$this->set('date',$date);
			
			
			if(!empty($this->request->data))
			{
				
				$condition=array('conditions'=>array('StudentDetail.academic_year_id'=>$academic_year_id,
				'StudentDetail.add_class_id'=>$class_id),
				'fields'=>array('StudentDetail.id','StudentDetail.student_name',
				'StudentDetail.academic_year_id','AddClass.class_name'),
				'order'=>'StudentDetail.student_name '
				);
				$student_details=$this->StudentDetail->find('all',$condition);
				$this->set('student_details',$student_details);
				//print_r($student_details);
			}
			
			
		}
		
		public function SpokenEnglishAssign()
		{
			$this->_userSessionCheckout();
			//print_r($this->request->data);
			configure::write('debug',0);
			
			
			if(!empty($this->request->data))
			{
				 $count=count($this->request->data['student_detail_id']);
				for($i=0;$i<$count;$i++)
				{
					
					if($this->request->data['check'][$i]>'0')
					{ //echo $i;
						
					$data=array('SpokenEnglish'=>array(
													'student_detail_id'=>$this->request->data['student_detail_id'][$i],
													'academic_year_id'=>$this->request->data['SpokenEnglish']['academic_year_id'],
													'add_class_id'=>$this->request->data['SpokenEnglish']['add_class_id'],
													'date' => date('Y-m-d',strtotime($this->request->data['date']))
														
													)
													);
												$this->SpokenEnglish->saveAll($data);
												 $id=$this->SpokenEnglish->id;
												//print_r($id);
												for($k=0;$k<10;$k++){
													if(!empty($this->request->data['grade'][$i][$k])){
													$assignData=array('SpokenEnglishDetail'=>array(
													'spoken_english_id'=>$id,
													'grade'=>$this->request->data['grade'][$i][$k],
													)
													);
													$this->SpokenEnglishDetail->saveAll($assignData);
													}
												}
													
				}
				
			
				}
				$spoken_english_assign = $this->Session->setFlash("<div class='alert alert-success fade in' style='height:50px'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>Spoken English Assigned.</div>");
				$this->redirect(array("controller"=>"SpokenEnglish","action"=>"SpokenEnglish"));
			}
			
		}
		
		
		

		
		/* Spoken English List */
		public function SpokenEnglishList()
		{
			$this->_userSessionCheckout();
			//configure::write('debug',2);
			$this->layout="ptes_admin"; 
			$this->_getClass();
			$this->_getAcademicYear();
			$this->_getSection();
			
			if(!empty($this->request->data))
			{

				$academic_year = $this->request->data['SpokenEnglish']['academic_year_id'];
				$add_class_id = $this->request->data['SpokenEnglish']['add_class_id'];
				$from_date = $this->request->data['SpokenEnglish']['from_date'];
				

				/*if($from_date=='')
				{
					$conditions = array("conditions"=>array("SpokenEnglish.academic_year_id"=>$academic_year,
					"SpokenEnglish.add_class_id"=>$add_class_id,
						"is_delete"=>"0"),array("recursive"=>"-1"),
						"group"=>array('SpokenEnglish.student_detail_id'),
						'order'=>'StudentDetail.student_name ');
				}
				else
				{*/
					$start_date = new DateTime($this->request->data['SpokenEnglish']['from_date']);
					$from_date = $start_date->format('Y-m-d');

					//$end_date = new DateTime($this->request->data['SpokenEnglish']['to_date']);
					//$to_date = $end_date->format('Y-m-d');

					$conditions = array("conditions"=>array("SpokenEnglish.academic_year_id"=>$academic_year,
						"SpokenEnglish.add_class_id"=>$add_class_id,
						"is_delete"=>"0",
						"SpokenEnglish.date "=>$from_date),
						"fields"=>array('StudentDetail.student_name','StudentDetail.id','AddClass.class_name','SpokenEnglish.*'),
						"group"=>array('SpokenEnglish.student_detail_id'),'order'=>'StudentDetail.student_name ');
				//}

				$Spoken_english_grade = $this->SpokenEnglish->find("all",$conditions);
				$this->set('Spoken_english_grade',$Spoken_english_grade);
				//print_r($Spoken_english_grade);
				
				$j=0;
				
				$totA=array();
				$totB=array();
				$totC=array();
				$tot=array();
				
				foreach($Spoken_english_grade as $spoken_english)
				{
					if($from_date=='')// &$ $to_date=='')
					{
					
						$tot_gradeA  = $this->SpokenEnglishDetail->query("SELECT COUNT(spoken_english_details.id) FROM spoken_english_details JOIN spoken_englishes ON 
						spoken_englishes.id=spoken_english_details.spoken_english_id
						WHERE add_class_id='".$add_class_id."' AND academic_year_id='".$academic_year."' AND student_detail_id='".$spoken_english['StudentDetail']['id']."' AND grade='A' ");
							$totA[$j]=$tot_gradeA[0][0]['COUNT(spoken_english_details.id)']; 
							
							
							
						$tot_gradeB = $this->SpokenEnglishDetail->query("SELECT COUNT(spoken_english_details.id) FROM `spoken_english_details` JOIN spoken_englishes ON 
						spoken_englishes.id=spoken_english_details.spoken_english_id
						WHERE add_class_id='".$add_class_id."' AND academic_year_id='".$academic_year."' AND student_detail_id='".$spoken_english['StudentDetail']['id']."' AND grade='B' ");
							$totB[$j]=$tot_gradeB[0][0]['COUNT(spoken_english_details.id)']; 
							
						$tot_gradeC  = $this->SpokenEnglishDetail->query("SELECT COUNT(spoken_english_details.id) FROM `spoken_english_details` JOIN spoken_englishes ON 
						spoken_englishes.id=spoken_english_details.spoken_english_id
						WHERE add_class_id='".$add_class_id."' AND academic_year_id='".$academic_year."' AND student_detail_id='".$spoken_english['StudentDetail']['id']."' AND grade='C' ");
							$totC[$j]=$tot_gradeC[0][0]['COUNT(spoken_english_details.id)']; 
							
						$tot_grade  = $this->SpokenEnglishDetail->query("SELECT COUNT(spoken_english_details.id) FROM `spoken_english_details` JOIN spoken_englishes ON 
						spoken_englishes.id=spoken_english_details.spoken_english_id
						WHERE add_class_id='".$add_class_id."' AND academic_year_id='".$academic_year."' AND student_detail_id='".$spoken_english['StudentDetail']['id']."'");
							$tot[$j]=$tot_grade[0][0]['COUNT(spoken_english_details.id)']; 
						
						
					}
					
					else
					{
						$tot_gradeA  = $this->SpokenEnglishDetail->query("SELECT COUNT(spoken_english_details.id) FROM spoken_english_details JOIN spoken_englishes ON 
						spoken_englishes.id=spoken_english_details.spoken_english_id
						WHERE add_class_id='".$add_class_id."' AND academic_year_id='".$academic_year."' AND student_detail_id='".$spoken_english['StudentDetail']['id']."' AND grade='A' AND date = '".$from_date."'  ");
							$totA[]=$tot_gradeA[0][0]['COUNT(spoken_english_details.id)']; 
							
						$tot_gradeB = $this->SpokenEnglishDetail->query("SELECT COUNT(spoken_english_details.id) FROM `spoken_english_details` JOIN spoken_englishes ON 
						spoken_englishes.id=spoken_english_details.spoken_english_id
						WHERE add_class_id='".$add_class_id."' AND academic_year_id='".$academic_year."' AND student_detail_id='".$spoken_english['StudentDetail']['id']."' AND grade='B' AND date = '".$from_date."' ");
							$totB[]=$tot_gradeB[0][0]['COUNT(spoken_english_details.id)']; 
							
						$tot_gradeC  = $this->SpokenEnglishDetail->query("SELECT COUNT(spoken_english_details.id) FROM `spoken_english_details` JOIN spoken_englishes ON 
						spoken_englishes.id=spoken_english_details.spoken_english_id
						WHERE add_class_id='".$add_class_id."' AND academic_year_id='".$academic_year."' AND student_detail_id='".$spoken_english['StudentDetail']['id']."' AND grade='C' AND date= '".$from_date."' ");
							$totC[]=$tot_gradeC[0][0]['COUNT(spoken_english_details.id)']; 
							
						$tot_grade  = $this->SpokenEnglishDetail->query("SELECT COUNT(spoken_english_details.id) FROM `spoken_english_details` JOIN spoken_englishes ON 
						spoken_englishes.id=spoken_english_details.spoken_english_id
						WHERE add_class_id='".$add_class_id."' AND academic_year_id='".$academic_year."' AND student_detail_id='".$spoken_english['StudentDetail']['id']."' AND date = '".$from_date."'");
							$tot[]=$tot_grade[0][0]['COUNT(spoken_english_details.id)']; 
						
					}
					$j++;
				}
				//print_r($totA);print_r($totB);print_r($totC);print_r($tot);
				$this->set('totA',$totA);
				$this->set('totB',$totB);
				$this->set('totC',$totC);
				$this->set('tot',$tot);
			}
			
			
		}
		//Delete Spoken English
		
		public function deleteSpokenEnglish($student_detail_id=null,$date=null,$add_class_id=null,$academic_year_id=null)
		{
			$this->_userSessionCheckout();
			$this->layout="ptes_admin";
			
			//$this->SpokenEnglish->id = $id;
			
			$this->SpokenEnglishDetail->deleteAll(['SpokenEnglish.student_detail_id'=>$student_detail_id,
			'SpokenEnglish.date'=>$date,
			'SpokenEnglish.add_class_id'=>$add_class_id,'SpokenEnglish.academic_year_id'=>$academic_year_id]);
			
			
			$this->SpokenEnglish->deleteAll(['SpokenEnglish.student_detail_id'=>$student_detail_id,
			'SpokenEnglish.date'=>$date,
			'SpokenEnglish.add_class_id'=>$add_class_id,'SpokenEnglish.academic_year_id'=>$academic_year_id]);
			
			
			
			//$this->SpokenEnglish->deleteAll(array('is_delete', '1');
			$this->Session->setFlash("<div class='alert alert-danger fade in' style='height:50px'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<i class='fa  fa-trash-o'></i>Spoken English deleted.</div>");
			$this->redirect(array("controller"=>"SpokenEnglish","action"=>"SpokenEnglishList"));
		}
		
		public function spokenEnglishEdit($student_detail_id=null,$date=null,$add_class_id=null,$academic_year_id=null)
		{
			//configure::write("debug",2);
			$this->_userSessionCheckout();
			$this->layout="ptes_admin";
			
			if(!empty($this->request->data))
				{
					for($i=0;$i<$this->request->data['SpokenEnglishEdit']['total_count'];$i++)
					{
						//print_r($this->request->data);
						
						$data=array('SpokenEnglishDetail'=>array('id'=>$this->request->data['id'][$i],'grade'=>$this->request->data['grade'][$i]));
						$this->SpokenEnglishDetail->saveAll($data);
						
					}
					$this->Session->setFlash("<div class='alert alert-success fade in' style='height:50px'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<i class='fa fa-check'></i> Spoken English Updated Successfuly.  :</div>");
						$this->redirect(array("controller"=>"SpokenEnglish","action"=>"SpokenEnglishList"));
					
				}
			
					$conditions = array("conditions"=>array("SpokenEnglish.academic_year_id"=>$academic_year_id,
						"SpokenEnglish.student_detail_id"=>$student_detail_id,
						"SpokenEnglish.add_class_id"=>$add_class_id,
						
						"SpokenEnglish.date "=>$date,
						));
				

				$Spoken_english_grade = $this->SpokenEnglish->find("all",$conditions);
				$this->set('Spoken_english_grade',$Spoken_english_grade);
				//print_r($Spoken_english_grade);
				
				$grade=array();
				foreach($Spoken_english_grade as $list)
				{
					foreach($list['SpokenEnglishDetail'] as $details)
					{
						$grade[]=array($details['id'],$details['grade']);
					}
				}
				$this->set('grade',$grade);
				//print_r($grade);
				
				//$this->request->data = $this->SpokenEnglishDetail->read(null,$id);
				
				
        }
		
		//Spoken English
		
		public function SpokenEnglishReport()
		{
			$this->_userSessionCheckout();
			configure::write('debug',0);
			$this->layout="ptes_admin"; 
			$this->_getClass();
			$this->_getAcademicYear();
			$this->_getSection();
			
			if(!empty($this->request->data))
			{

				$academic_year = $this->request->data['SpokenEnglish']['academic_year_id'];
				$add_class_id = $this->request->data['SpokenEnglish']['add_class_id'];
				$from_date = $this->request->data['SpokenEnglish']['from_date'];
				$to_date = $this->request->data['SpokenEnglish']['to_date'];


				if($from_date=='' & $to_date=='')
				{
					$conditions = array("conditions"=>array("SpokenEnglish.academic_year_id"=>$academic_year, "SpokenEnglish.add_class_id"=>$add_class_id,
						"is_delete"=>"0"),array("recursive"=>"-1"),
						"fields"=>array('StudentDetail.student_name','StudentDetail.id','AddClass.class_name','SpokenEnglish.*'),
						"group"=>array('SpokenEnglish.student_detail_id'),
						'order'=>'StudentDetail.student_name');
				}
				else
				{
					$start_date = new DateTime($this->request->data['SpokenEnglish']['from_date']);
					$from_date = $start_date->format('Y-m-d');

					$end_date = new DateTime($this->request->data['SpokenEnglish']['to_date']);
					$to_date = $end_date->format('Y-m-d');

					$conditions = array("conditions"=>array("SpokenEnglish.academic_year_id"=>$academic_year,
						"SpokenEnglish.add_class_id"=>$add_class_id,
						"is_delete"=>"0",
						"SpokenEnglish.date >= "=>$from_date,
						"SpokenEnglish.date <= "=>$to_date,),
						"fields"=>array('StudentDetail.student_name','StudentDetail.id','AddClass.class_name','SpokenEnglish.*'),
						"group"=>array('SpokenEnglish.student_detail_id'),
						'order'=>'StudentDetail.student_name');
				}

				$Spoken_english_grade = $this->SpokenEnglish->find("all",$conditions);
				$this->set('Spoken_english_grade',$Spoken_english_grade);
				//print_r($Spoken_english_grade);
				
				$j=0;
				
				$totA=array();
				$totB=array();
				$totC=array();
				$tot=array();
				
				foreach($Spoken_english_grade as $spoken_english)
				{
					if($from_date=='' & $to_date=='')
					{
					
						$tot_gradeA  = $this->SpokenEnglishDetail->query("SELECT COUNT(spoken_english_details.id) FROM spoken_english_details JOIN spoken_englishes ON 
						spoken_englishes.id=spoken_english_details.spoken_english_id
						WHERE add_class_id='".$add_class_id."' AND academic_year_id='".$academic_year."' AND student_detail_id='".$spoken_english['StudentDetail']['id']."' AND grade='A' ");
							$totA[$j]=$tot_gradeA[0][0]['COUNT(spoken_english_details.id)']; 
							
							
							
						$tot_gradeB = $this->SpokenEnglishDetail->query("SELECT COUNT(spoken_english_details.id) FROM `spoken_english_details` JOIN spoken_englishes ON 
						spoken_englishes.id=spoken_english_details.spoken_english_id
						WHERE add_class_id='".$add_class_id."' AND academic_year_id='".$academic_year."' AND student_detail_id='".$spoken_english['StudentDetail']['id']."' AND grade='B' ");
							$totB[$j]=$tot_gradeB[0][0]['COUNT(spoken_english_details.id)']; 
							
						$tot_gradeC  = $this->SpokenEnglishDetail->query("SELECT COUNT(spoken_english_details.id) FROM `spoken_english_details` JOIN spoken_englishes ON 
						spoken_englishes.id=spoken_english_details.spoken_english_id
						WHERE add_class_id='".$add_class_id."' AND academic_year_id='".$academic_year."' AND student_detail_id='".$spoken_english['StudentDetail']['id']."' AND grade='C' ");
							$totC[$j]=$tot_gradeC[0][0]['COUNT(spoken_english_details.id)']; 
							
						$tot_grade  = $this->SpokenEnglishDetail->query("SELECT COUNT(spoken_english_details.id) FROM `spoken_english_details` JOIN spoken_englishes ON 
						spoken_englishes.id=spoken_english_details.spoken_english_id
						WHERE add_class_id='".$add_class_id."' AND academic_year_id='".$academic_year."' AND student_detail_id='".$spoken_english['StudentDetail']['id']."'");
							$tot[$j]=$tot_grade[0][0]['COUNT(spoken_english_details.id)']; 
						
						
					}
					
					else
					{
						$tot_gradeA  = $this->SpokenEnglishDetail->query("SELECT COUNT(spoken_english_details.id) FROM spoken_english_details JOIN spoken_englishes ON 
						spoken_englishes.id=spoken_english_details.spoken_english_id
						WHERE add_class_id='".$add_class_id."' AND academic_year_id='".$academic_year."' AND student_detail_id='".$spoken_english['StudentDetail']['id']."' AND grade='A' AND date >= '".$from_date."' AND date<= '".$to_date."' ");
							$totA[]=$tot_gradeA[0][0]['COUNT(spoken_english_details.id)']; 
							
						$tot_gradeB = $this->SpokenEnglishDetail->query("SELECT COUNT(spoken_english_details.id) FROM `spoken_english_details` JOIN spoken_englishes ON 
						spoken_englishes.id=spoken_english_details.spoken_english_id
						WHERE add_class_id='".$add_class_id."' AND academic_year_id='".$academic_year."' AND student_detail_id='".$spoken_english['StudentDetail']['id']."' AND grade='B' AND date >= '".$from_date."' AND date<= '".$to_date."' ");
							$totB[]=$tot_gradeB[0][0]['COUNT(spoken_english_details.id)']; 
							
						$tot_gradeC  = $this->SpokenEnglishDetail->query("SELECT COUNT(spoken_english_details.id) FROM `spoken_english_details` JOIN spoken_englishes ON 
						spoken_englishes.id=spoken_english_details.spoken_english_id
						WHERE add_class_id='".$add_class_id."' AND academic_year_id='".$academic_year."' AND student_detail_id='".$spoken_english['StudentDetail']['id']."' AND grade='C' AND date >= '".$from_date."' AND date<= '".$to_date."' ");
							$totC[]=$tot_gradeC[0][0]['COUNT(spoken_english_details.id)']; 
							
						$tot_grade  = $this->SpokenEnglishDetail->query("SELECT COUNT(spoken_english_details.id) FROM `spoken_english_details` JOIN spoken_englishes ON 
						spoken_englishes.id=spoken_english_details.spoken_english_id
						WHERE add_class_id='".$add_class_id."' AND academic_year_id='".$academic_year."' AND student_detail_id='".$spoken_english['StudentDetail']['id']."' AND date >= '".$from_date."' AND date<= '".$to_date."'");
							$tot[]=$tot_grade[0][0]['COUNT(spoken_english_details.id)']; 
						
					}
					$j++;
				}
				//print_r($totA);print_r($totB);print_r($totC);print_r($tot);
				$this->set('totA',$totA);
				$this->set('totB',$totB);
				$this->set('totC',$totC);
				$this->set('tot',$tot);
			}
			
			
		}
		
		public function SpokenEnglishReportPrint($academic_year_id=null,$add_class_id=null,$from_date1=null,$to_date1=null)
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

			
				if($from_date=='' & $to_date=='')
				{
					
					$conditions = array("conditions"=>array("SpokenEnglish.academic_year_id"=>$academic_year, "SpokenEnglish.add_class_id"=>$add_class_id,
						"is_delete"=>"0"),array("recursive"=>"-1"),
						"fields"=>array('StudentDetail.student_name','StudentDetail.id','SpokenEnglish.*'),
						"group"=>array('SpokenEnglish.student_detail_id'),
						'order'=>'StudentDetail.student_name');
						
				}
				else
				{
					$start_date = new DateTime($from_date);
					 $from_date = $start_date->format('Y-m-d');

					$end_date = new DateTime($to_date);
					$to_date = $end_date->format('Y-m-d');
					
					/*$start_date = new DateTime($this->request->data['SpokenEnglish']['date']);
					echo $from_date = $start_date->format('Y-m-d');
					//echo $from_date =date('Y-m-d', strtotime($this->request->data['SpokenEnglish']['date']));

					$end_date = new DateTime($this->request->data['SpokenEnglish']['date']);
					$to_date = $end_date->format('Y-m-d');*/

					$conditions = array("conditions"=>array("SpokenEnglish.academic_year_id"=>$academic_year,
						"SpokenEnglish.add_class_id"=>$add_class_id,
						"is_delete"=>"0",
						"SpokenEnglish.date >= "=>$from_date,
						"SpokenEnglish.date <= "=>$to_date),
						"fields"=>array('StudentDetail.student_name','StudentDetail.id','SpokenEnglish.*'),
						"group"=>array('SpokenEnglish.student_detail_id'),
						'order'=>'StudentDetail.student_name');
				}
	
				$Spoken_english_grade = $this->SpokenEnglish->find("all",$conditions);
				$this->set('Spoken_english_grade',$Spoken_english_grade);
				//print_r($Spoken_english_grade);
				
				$j=0;
				
				$totA=array();
				$totB=array();
				$totC=array();
				$tot=array();
				
				foreach($Spoken_english_grade as $spoken_english)
				{
					
					//print_r($spoken_english);
					if($from_date=='' & $to_date=='')
					{
					
						$tot_gradeA  = $this->SpokenEnglishDetail->query("SELECT COUNT(spoken_english_details.id) FROM spoken_english_details JOIN spoken_englishes ON 
						spoken_englishes.id=spoken_english_details.spoken_english_id
						WHERE add_class_id='".$add_class_id."' AND academic_year_id='".$academic_year."' AND student_detail_id='".$spoken_english['StudentDetail']['id']."' AND grade='A' ");
							$totA[$j]=$tot_gradeA[0][0]['COUNT(spoken_english_details.id)']; 
							
							
							
						$tot_gradeB = $this->SpokenEnglishDetail->query("SELECT COUNT(spoken_english_details.id) FROM `spoken_english_details` JOIN spoken_englishes ON 
						spoken_englishes.id=spoken_english_details.spoken_english_id
						WHERE add_class_id='".$add_class_id."' AND academic_year_id='".$academic_year."' AND student_detail_id='".$spoken_english['StudentDetail']['id']."' AND grade='B' ");
							$totB[$j]=$tot_gradeB[0][0]['COUNT(spoken_english_details.id)']; 
							
						$tot_gradeC  = $this->SpokenEnglishDetail->query("SELECT COUNT(spoken_english_details.id) FROM `spoken_english_details` JOIN spoken_englishes ON 
						spoken_englishes.id=spoken_english_details.spoken_english_id
						WHERE add_class_id='".$add_class_id."' AND academic_year_id='".$academic_year."' AND student_detail_id='".$spoken_english['StudentDetail']['id']."' AND grade='C' ");
							$totC[$j]=$tot_gradeC[0][0]['COUNT(spoken_english_details.id)']; 
							
						$tot_grade  = $this->SpokenEnglishDetail->query("SELECT COUNT(spoken_english_details.id) FROM `spoken_english_details` JOIN spoken_englishes ON 
						spoken_englishes.id=spoken_english_details.spoken_english_id
						WHERE add_class_id='".$add_class_id."' AND academic_year_id='".$academic_year."' AND student_detail_id='".$spoken_english['StudentDetail']['id']."'");
							$tot[$j]=$tot_grade[0][0]['COUNT(spoken_english_details.id)']; 
						
						
					}
					
					else
					{
						$tot_gradeA  = $this->SpokenEnglishDetail->query("SELECT COUNT(spoken_english_details.id) FROM spoken_english_details JOIN spoken_englishes ON 
						spoken_englishes.id=spoken_english_details.spoken_english_id
						WHERE add_class_id='".$add_class_id."' AND academic_year_id='".$academic_year."' AND student_detail_id='".$spoken_english['StudentDetail']['id']."' AND grade='A' AND date >= '".$from_date."' AND date<= '".$to_date."' ");
							$totA[]=$tot_gradeA[0][0]['COUNT(spoken_english_details.id)']; 
							
						$tot_gradeB = $this->SpokenEnglishDetail->query("SELECT COUNT(spoken_english_details.id) FROM `spoken_english_details` JOIN spoken_englishes ON 
						spoken_englishes.id=spoken_english_details.spoken_english_id
						WHERE add_class_id='".$add_class_id."' AND academic_year_id='".$academic_year."' AND student_detail_id='".$spoken_english['StudentDetail']['id']."' AND grade='B' AND date >= '".$from_date."' AND date<= '".$to_date."' ");
							$totB[]=$tot_gradeB[0][0]['COUNT(spoken_english_details.id)']; 
							
						$tot_gradeC  = $this->SpokenEnglishDetail->query("SELECT COUNT(spoken_english_details.id) FROM `spoken_english_details` JOIN spoken_englishes ON 
						spoken_englishes.id=spoken_english_details.spoken_english_id
						WHERE add_class_id='".$add_class_id."' AND academic_year_id='".$academic_year."' AND student_detail_id='".$spoken_english['StudentDetail']['id']."' AND grade='C' AND date >= '".$from_date."' AND date<= '".$to_date."' ");
							$totC[]=$tot_gradeC[0][0]['COUNT(spoken_english_details.id)']; 
							
						$tot_grade  = $this->SpokenEnglishDetail->query("SELECT COUNT(spoken_english_details.id) FROM `spoken_english_details` JOIN spoken_englishes ON 
						spoken_englishes.id=spoken_english_details.spoken_english_id
						WHERE add_class_id='".$add_class_id."' AND academic_year_id='".$academic_year."' AND student_detail_id='".$spoken_english['StudentDetail']['id']."' AND date >= '".$from_date."' AND date<= '".$to_date."'");
							$tot[]=$tot_grade[0][0]['COUNT(spoken_english_details.id)']; 
						
					}
					$j++;
				}
				//print_r($totA);print_r($totB);print_r($totC);print_r($tot);
				$this->set('totA',$totA);
				$this->set('totB',$totB);
				$this->set('totC',$totC);
				$this->set('tot',$tot);
			
		}
	}