<?php 
 
class AdminController extends AppController {

 
	public $uses = array('Admin','StudentDetail');
	public $helpers = array('Html', 'Form', 'Js','Session');

		public function index()
		{
			$this->layout="ptes_admin_login";
			
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
}
