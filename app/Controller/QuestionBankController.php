<?php 
 
class QuestionBankController extends AppController {

 
	public $uses = array('Admin');
	public $helpers = array('Html', 'Form', 'Js','Session');

		 public function addChapter()
		{
			$this->layout="ptes_admin";
		}
		public function addMarks()
		{
			$this->layout="ptes_admin";
		}
		public function addQuestionHeading()
		{
			$this->layout="ptes_admin";
		}
		public function addExamType()
		{
			$this->layout="ptes_admin";
		}
		public function generateQuestionPaper()
		{
			$this->layout="ptes_admin";
		}
		
}
