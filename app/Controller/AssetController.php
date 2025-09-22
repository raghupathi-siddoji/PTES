<?php 
 
class AssetController extends AppController {

 
	public $uses = array('Admin','AssetCategory','Asset',"AcademicYear");
	public $helpers = array('Html', 'Form', 'Js','Session');

		 public function addCategory($id=null)
		{
			$this->_userSessionCheckout();
			$this->layout="ptes_admin";
		 	if(!empty($this->request->data))
			{
				$condition=array('conditions'=>array('AssetCategory.category'=>$this->request->data['AssetCategory']['category']));
				$check=$this->AssetCategory->find('all',$condition);
				if(empty($check))
				{
					$this->AssetCategory->save($this->request->data);
					
					if(empty($id))
					{
						$this->Session->setFlash("<div class='alert alert-success fade in' style='height:50px'>
							<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
							<i class='fa fa-check'></i> Component assign successfully.</div>");
						$this->redirect(array("controller"=>"Asset","action"=>"addCategory"));
					}
					else 
					{
						$this->Session->setFlash("<div class='alert alert-success fade in' style='height:50px'>
							<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
							<i class='fa fa-check'></i> Data Updated Successfully.</div>");
						$this->redirect(array("controller"=>"Asset","action"=>"addCategory"));
					}
				}
				else
				{
					$this->Session->setflash("<div class='alert alert-danger fade in' style='height:50px'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<i class='fa fa-check'></i> Category Already Exists.</div>");
					$this->redirect(array("controller"=>"Asset","action"=>"addCategory"));
				}
			}
			else if(empty($this->request->data))
			{
				$this->request->data = $this->AssetCategory->read(null,$id);
			}
			/* Display Category List*/
			$list = $this->AssetCategory->find("all"); // get value from table
			$this->set("list",$list);  // setter it avaible to view
			
			

		}
		
		public function deleteCategory($id=null)
		{
			$this->_userSessionCheckout();
			$this->layout="ptes_admin";
			$this->AssetCategory->delete($id);
			$this->Session->setFlash("<div class='alert alert-danger fade in' style='height:50px'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<i class='fa fa-check'></i> Deleted Successfully.</div>");
			$this->redirect(array("controller"=>"Asset","action"=>"addCategory"));
			
		}
		/*   ASSET      */
		public function addAsset($id=null)
		{
			$this->_userSessionCheckout();
			$this->layout="ptes_admin";
			//print_r($this->request->data);
			if(!empty($this->request->data))
			{
				/*$condition=array('conditions'=>array('Asset.asset_name'=>$this->request->data['Asset']['asset_name']));
				$check=$this->Asset->find('all',$condition);
				if(empty($check))
				{*/
					$parchase_date_format = "0000-00-00";
					if($purchased_date!=''){
						$purchased_date = $this->request->data['Asset']['purchased_date'];
						$purchased_date_new = new DateTime($purchased_date);
						$parchase_date_format = $purchased_date_new->format('Y-m-d');
					}
					$this->request->data['Asset']['purchased_date'] = $parchase_date_format;
					$this->Asset->save($this->request->data);
					if(empty($id))
					{
						$this->Session->setFlash("<div class='alert alert-success fade in' style='height:50px'>
							<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
							<i class='fa fa-check'></i> Component assign successfully.</div>");
						$this->redirect(array("controller"=>"Asset","action"=>"addAsset"));
					}
					else 
					{
						$this->Session->setFlash("<div class='alert alert-success fade in' style='height:50px'>
							<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
							<i class='fa fa-check'></i> Data Updated Successfully.</div>");
						$this->redirect(array("controller"=>"Asset","action"=>"addAsset"));
					}
				/*}
				else
				{
					$this->Session->setflash("<div class='alert alert-danger fade in' style='height:50px'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<i class='fa fa-check'></i> Asset Name Already Exists.</div>");
					$this->redirect(array("controller"=>"Asset","action"=>"addAsset"));
				}*/
				
			}
			else if(empty($this->request->data))
			{
				$this->request->data=$this->Asset->read(null,$id);
				if($this->request->data['Asset']['purchased_date']!='')
				$this->request->data['Asset']['purchased_date'] = date('d/m/Y',strtotime($this->request->data['Asset']['purchased_date']));
			}
			/* Display Category List*/
			$list = $this->Asset->find("all"); // get value from table
			$this->set("list",$list);  // setter it avaible to view
			
			/*Get Category */
			$cateogry_list = $this->AssetCategory->find('all');
			$cateogry_list = Set::extract($cateogry_list, '{n}.AssetCategory');
			$cateogry_array = array();
			if(!empty($cateogry_list)){
			    foreach($cateogry_list as $cateogry){ 
				$cateogry_array[$cateogry['id']] = $cateogry['category'];
			    }
			}
			$this->set('category_list', $cateogry_array);
			
			/*Get Academic Year */
			$academic_year = $this->AcademicYear->find('all');
			$academic_year = Set::extract($academic_year, '{n}.AcademicYear');
			$academic_year_array = array();
			if(!empty($academic_year)){
			    foreach($academic_year as $ay){ 
				$academic_year_array[$ay['id']] = $ay['academic_year'];
			    }
			}
			$this->set('academic_year_array', $academic_year_array);
			
		}
		public function deleteAsset($id=null)
		{
			$this->_userSessionCheckout();
			$this->layout="ptes_admin";
			$this->Asset->delete($id);
			$this->Session->setFlash("<div class='alert alert-danger fade in' style='height:50px'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<i class='fa fa-check'></i> Deleted Successfully.</div>");
			$this->redirect(array("controller"=>"Asset","action"=>"addAsset"));
		}
		/*ASSET REPORT*/
		public function assetReport()
		{
			$this->_userSessionCheckout();
			$this->layout="ptes_admin";
			$report = $this->Asset->find("all");
			$this->set('report',$report);
		}
}
