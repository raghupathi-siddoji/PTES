<?php 
 
class LibraryManagementController extends AppController {

 
	public $uses = array('Admin','AddClass','AcademicYear','District','State','Taluk','StudentDetail','BookCategory','BookPublisher','BookAuthor','StaffBookIssueDetail','StaffBookIssue','StaffDetail','BookIssueDetail','BookIssue','BookVendor','BookLocation','BookDetail','Language','BookLanguage');
	public $helpers = array('Html', 'Form', 'Js','Session');

	public function bookCategory($id=null)
		{
			$this->layout="ptes_admin";
			if(!empty($this->request->data))
			{
				$condition=array('conditions'=>array(
					'BookCategory.category_name'=>$this->request->data['BookCategory']['category_name'],
					'BookCategory.category_code'=>$this->request->data['BookCategory']['category_code'],
					'BookCategory.details'=>$this->request->data['BookCategory']['details']));
				$check=$this->BookCategory->find('all',$condition);
				
				if(empty($check))
				{
					$this->BookCategory->save($this->request->data);
					
					if(empty($id))
					{
						$this->Session->setFlash("<div class='alert alert-success fade in' style='height:50px'>
							<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
							<i class='fa fa-check'></i> Data Inserted successfully.</div>");
						$this->redirect(array("controller"=>"LibraryManagement","action"=>"bookCategory"));
					}
					else 
					{
						$this->Session->setFlash("<div class='alert alert-success fade in' style='height:50px'>
							<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
							<i class='fa fa-check'></i> Data Updated Successfully.</div>");
						$this->redirect(array("controller"=>"LibraryManagement","action"=>"bookCategory"));
					}
				}
				else
				{
					$this->Session->setflash("<div class='alert alert-danger fade in' style='height:50px'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<i class='fa fa-check'></i> Book Category Already Exists.</div>");
					$this->redirect(array("controller"=>"LibraryManagement","action"=>"bookCategory"));
				}
			}
			else if(empty($this->request->data))
			{
				$this->request->data = $this->BookCategory->read(null,$id);
			}
			/* Display Category List*/
			$list = $this->BookCategory->find("all"); // get value from table
			$this->set("list",$list);  // setter it avaible to view
		}
		public function deleteBookCategory($id=null)
		{
			$this->layout="ptes_admin";
			$this->BookCategory->delete($id);
			$this->Session->setFlash("<div class='alert alert-danger fade in' style='height:50px'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<i class='fa fa-check'></i> Deleted Successfully.</div>");
			$this->redirect(array("controller"=>"LibraryManagement","action"=>"bookCategory"));
		}
/**-------------------------------------------------------------------------***/
/**------------------------------Book Publisher--------------------------------***/
		public function bookPublisherList()
		{
			/* List Publisher details */
			$this->layout="ptes_admin";
			$list = $this->BookPublisher->find('all',array('order'=>"BookPublisher.publisher_code ASC"));
			$this->set('list',$list);
		}
		public function bookPublisherListPrint()
		{
			/* List Publisher details */
			$this->layout="ajax";
			$list = $this->BookPublisher->find('all');
			$this->set('list',$list);
		}
		
		public function bookPublisher($id=null)
		{
			$this->layout="ptes_admin";
			if(!empty($this->request->data))
			{
				
				$publisher_name = $this->request->data['BookPublisher']['publisher_name'];
				$l1 = substr($publisher_name,0,1);  $l2 = "P".strtoupper($l1);
					
				$get =  $this->BookPublisher->find('all');
				foreach($get as $get1)
				{
					$patren = substr($get1['BookPublisher']['publisher_code'],0,2)."%";
					if(substr($get1['BookPublisher']['publisher_code'],0,2) == $l2)
					{
						$count = $this->BookPublisher->query('SELECT COUNT(id) as count from book_publishers as BookPublisher where publisher_code LIKE "'.$patren.'" ');
						$count1 = $count[0][0]['count'];
					}
				}
				if(!empty($count1))
				{
					if(empty($this->request->data['BookPublisher']['publisher_code'] ))
						$this->request->data['BookPublisher']['publisher_code'] = $l2.str_pad($count1+1, 3, '0', STR_PAD_LEFT);
					else if($this->request->data['BookPublisher']['publisher_name'] != $this->request->data['BookPublisher']['previous_publisher'])
						$this->request->data['BookPublisher']['publisher_code'] = $l2.str_pad($count1+1, 3, '0', STR_PAD_LEFT);
					else
						$this->request->data['BookPublisher']['publisher_code'] = $l2.str_pad($count1, 3, '0', STR_PAD_LEFT);
				}
				else
				{
					$this->request->data['BookPublisher']['publisher_code'] = $l2.str_pad(1, 3, '0', STR_PAD_LEFT);
				}
				
				if(!empty($this->request->data['BookPublisher']['publisher_code']))
				{
					$this->BookPublisher->save($this->request->data);
					if(empty($id))
					{
						$this->Session->setFlash("<div class='alert alert-success fade in' style='height:50px'>
							<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
							<i class='fa fa-check'></i> Data Inserted successfully.</div>");
							$this->redirect(array("controller"=>"LibraryManagement","action"=>"bookPublisherList"));
					}
					else
					{
						$this->Session->setFlash("<div class='alert alert-success fade in' style='height:50px'>
							<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
							<i class='fa fa-check'></i> Data updated successfully.</div>");
							$this->redirect(array("controller"=>"LibraryManagement","action"=>"bookPublisherList"));
					}
				}
				else
				{
					$this->Session->setFlash("<div class='alert alert-success fade in' style='height:50px'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i> Record Not Inserted</div>");
					$this->redirect(array("controller"=>"LibraryManagement","action"=>"bookPublisherList"));
				}
				
			}
			else if(empty($this->request->data))
			{
				$this->request->data = $this->BookPublisher->read(null,$id);
				$this->set('publisher_code',$this->request->data['BookPublisher']['publisher_code']);
				$this->set('previous_publisher',$this->request->data['BookPublisher']['publisher_name']);
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
		public function deleteBookPublisher($id=null)
		{
			$this->layout="ptes_admin";
			$this->BookPublisher->delete($id);
			$this->Session->setFlash("<div class='alert alert-danger fade in' style='height:50px'>
							<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
							<i class='fa fa-check'></i> Deleted Successfully.</div>");
			$this->redirect(array("controller"=>"LibraryManagement","action"=>"bookPublisherList"));
		}
/**-------------------------------------------------------------------------***/
/**------------------------------Book Author--------------------------***/
		public function bookAuthorList()
		{
			$this->layout="ptes_admin";
			/* Display Category List*/
			$list = $this->BookAuthor->find("all",array('order'=>'BookAuthor.author_code ASC')); // get value from table
			$this->set("list",$list);  // setter it avaible to view
		}
		
		public function bookAuthorListPrint()
		{
			$this->layout="ajax";
			/* Display Category List*/
			$list = $this->BookAuthor->find("all"); // get value from table
			$this->set("list",$list);  // setter it avaible to view
		}
		
		public function bookAuthor($id=null)
		{
			$this->layout="ptes_admin";
			if(!empty($this->request->data))
			{
				$author_name = $this->request->data['BookAuthor']['author_name_one'];
				$l1 = substr($author_name,0,1);  $l2 = "A".strtoupper($l1);
					
				$get =  $this->BookAuthor->find('all');
				foreach($get as $get1)
				{
					$patren = substr($get1['BookAuthor']['author_code'],0,2)."%";
					if(substr($get1['BookAuthor']['author_code'],0,2) == $l2)
					{
						$count = $this->BookAuthor->query('SELECT COUNT(id) as count from book_authors as BookAuthor where author_code LIKE "'.$patren.'" ');
						$count1 = $count[0][0]['count'];
					}
				}
				if(!empty($count1))
				{
					if(empty($this->request->data['BookAuthor']['author_code'] ))
						$this->request->data['BookAuthor']['author_code'] = $l2.str_pad($count1+1, 3, '0', STR_PAD_LEFT);
					else if($this->request->data['BookAuthor']['previous_author'] != $this->request->data['BookAuthor']['author_name_one'])
						$this->request->data['BookAuthor']['author_code'] = $l2.str_pad($count1+1, 3, '0', STR_PAD_LEFT);
					else
						$this->request->data['BookAuthor']['author_code'] = $l2.str_pad($count1, 3, '0', STR_PAD_LEFT);
					
				}
				else
				{
					$this->request->data['BookAuthor']['author_code'] = $l2.str_pad(1, 3, '0', STR_PAD_LEFT);
				}
				
				if(!empty($this->request->data['BookAuthor']['author_code']))
				{
					$this->BookAuthor->save($this->request->data);
					if(empty($id))
					{
						$this->Session->setFlash("<div class='alert alert-success fade in' style='height:50px'>
							<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
							<i class='fa fa-check'></i> Data Inserted successfully.</div>");
						$this->redirect(array("controller"=>"LibraryManagement","action"=>"bookAuthorList"));
					}
					else 
					{
						$this->Session->setFlash("<div class='alert alert-success fade in' style='height:50px'>
							<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
							<i class='fa fa-check'></i> Data Updated Successfully.</div>");
						$this->redirect(array("controller"=>"LibraryManagement","action"=>"bookAuthorList"));
					}
				}
				else
				{
					$this->Session->setflash("<div class='alert alert-danger fade in' style='height:50px'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<i class='fa fa-check'></i> Not Inserted</div>");
					$this->redirect(array("controller"=>"LibraryManagement","action"=>"bookAuthorList"));
				}
			}
			else if(empty($this->request->data))
			{
				$this->request->data = $this->BookAuthor->read(null,$id);
				$this->set('author_code',$this->request->data['BookAuthor']['author_code']);
				$this->set('previous_author',$this->request->data['BookAuthor']['author_name_one']);
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
		public function deleteBookAuthor($id=null)
		{
			$this->layout="ptes_admin";
			$this->BookAuthor->delete($id);
			$this->Session->setFlash("<div class='alert alert-danger fade in' style='height:50px'>
							<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
							<i class='fa fa-check'></i> Deleted Successfully.</div>");
			$this->redirect(array("controller"=>"LibraryManagement","action"=>"bookAuthorList"));
		}
/**-------------------------------------------------------------------------***/
/**------------------------------Book Vendor---------------------------------***/
		public function bookVendorList()
		{
			$this->layout="ptes_admin";
			/*List Book Vendor details*/
			$list = $this->BookVendor->find('all',array('order'=>'BookVendor.vendor_code ASC'));
			$this->set('list',$list);
		}
		public function bookVendorListPrint()
		{
			$this->layout="ajax";
			/*List Book Vendor details*/
			$list = $this->BookVendor->find('all');
			$this->set('list',$list);
		}
		public function bookVendor($id=null)
		{
			$this->layout="ptes_admin";
			if(!empty($this->request->data))
			{
				$vendor_name = $this->request->data['BookVendor']['vendor_name'];
				$l1 = substr($vendor_name,0,1);  $l2 = "V".strtoupper($l1);
				
					
				$get =  $this->BookVendor->find('all');
				foreach($get as $get1)
				{
					$patren = substr($get1['BookVendor']['vendor_code'],0,2)."%";
					if(substr($get1['BookVendor']['vendor_code'],0,2) == $l2)
					{
						$count = $this->BookVendor->query('SELECT COUNT(id) as count from book_vendors as BookVendor where vendor_code LIKE "'.$patren.'" ');
						$count1 = $count[0][0]['count'];
					}
				}
				if(!empty($count1))
				{
					if(empty($this->request->data['BookVendor']['vendor_code'] ))
						$this->request->data['BookVendor']['vendor_code'] = $l2.str_pad($count1+1, 3, '0', STR_PAD_LEFT);
					else if($this->request->data['BookVendor']['previous_vendor'] != $this->request->data['BookVendor']['vendor_name'])
						$this->request->data['BookVendor']['vendor_code'] = $l2.str_pad($count1+1, 3, '0', STR_PAD_LEFT);
					else
						$this->request->data['BookVendor']['vendor_code'] = $l2.str_pad($count1, 3, '0', STR_PAD_LEFT);
				}
				else
				{
					$this->request->data['BookVendor']['vendor_code'] = $l2.str_pad(1, 3, '0', STR_PAD_LEFT);
				}
				if(!empty($this->request->data['BookVendor']['vendor_code']))
				{
					$this->BookVendor->save($this->request->data);
						if(empty($id))
						{
							$this->Session->setFlash("<div class='alert alert-success fade in' style='height:50px'>
							<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
							<i class='fa fa-check'></i> Data Inserted successfully.</div>");
							$this->redirect(array("controller"=>"LibraryManagement","action"=>"bookVendorList"));
						}
					else	
						{
							$this->Session->setFlash("<div class='alert alert-success fade in' style='height:50px'>
							<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
							<i class='fa fa-check'></i> Data updated successfully.</div>");
							$this->redirect(array("controller"=>"LibraryManagement","action"=>"bookVendorList"));
						}
				}
				else
				{
					$this->Session->setFlash("<div class='alert alert-danger fade in' style='height:50px'>
							<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
							<i class='fa fa-check'></i> Not Inserted</div>");
					$this->redirect(array("controller"=>"LibraryManagement","action"=>"bookVendorList"));
			
				}
				
			}
			else if(empty($this->request->data))
			{
				$this->request->data=$this->BookVendor->read(null,$id);
				$this->set('vendor_code',$this->request->data['BookVendor']['vendor_code']);
				$this->set('previous_vendor',$this->request->data['BookVendor']['vendor_name']);
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
		public function deleteBookVendor($id=null)
		{
			$this->layout="ptes_admin";
			$this->BookVendor->delete($id);
			$this->Session->setFlash("<div class='alert alert-danger fade in' style='height:50px'>
							<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
							<i class='fa fa-check'></i> Deleted Successfully.</div>");
			$this->redirect(array("controller"=>"LibraryManagement","action"=>"bookVendorList"));
		}
/***---------------------------------------------------------------------------------**/
/***---------------------------Book Location--------------------------------------**/
		public function bookLocation($id=null)
		{
			$this->layout="ptes_admin";
			if(!empty($this->request->data))
			{
				if(empty($id))
				{
				$condition=array('conditions'=>array('BookLocation.book_location'=>$this->request->data['BookLocation']['book_location']));
				$check=$this->BookLocation->find('all',$condition);
				}
				if(empty($check))
				{
					$this->BookLocation->save($this->request->data);
					if(empty($id))
					{
						$this->Session->setFlash("<div class='alert alert-success fade in' style='height:50px'>
							<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
							<i class='fa fa-check'></i> Data Inserted successfully.</div>");
						$this->redirect(array("controller"=>"LibraryManagement","action"=>"bookLocation"));
					}
					else{
						$this->Session->setFlash("<div class='alert alert-success fade in' style='height:50px'>
							<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
							<i class='fa fa-check'></i> Data updated successfully.</div>");
						$this->redirect(array("controller"=>"LibraryManagement","action"=>"bookLocation"));
					}
				}
				else
				{
					$this->Session->setFlash("<div class='alert alert-danger fade in' style='height:50px'>
							<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
							<i class='fa fa-check'></i> Location Name Already Exists.</div>");
					$this->redirect(array("controller"=>"LibraryManagement","action"=>"bookLocation"));
			
				}
				
			}
			else if(empty($this->request->data))
			{
				$this->request->data=$this->BookLocation->read(null,$id);
			}
			
			/*List Book Vendor details*/
			$list = $this->BookLocation->find('all');
			$this->set('list',$list);
		}
		public function deleteBookLocation($id=null)
		{
			$this->layout="ptes_admin";
			$this->BookLocation->delete($id);
			$this->Session->setFlash("<div class='alert alert-danger fade in' style='height:50px'>
							<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
							<i class='fa fa-check'></i> Deleted Successfully.</div>");
			$this->redirect(array("controller"=>"LibraryManagement","action"=>"bookLocation"));
		}
/***---------------------------------------------------------------------------------**/
/***----------/*Master Setting Type of Language: kruthi 22 sep---------------------------**/
		public function bookLanguage($id=null)
		{
			$this->layout="ptes_admin";
			if(!empty($this->request->data))
			{
				if(empty($id))
				{
					$conditions = array("language"=>$this->request->data['BookLanguage']['language'],
						"language_code"=>$this->request->data['BookLanguage']['language_code']);
    
					if($this->BookLanguage->hasAny($conditions))
					{
						$this->Session->setFlash("<div class='alert alert-danger fade in' style='height:50px'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>Language Already Exists</a></div>");
						$this->redirect('/LibraryManagement/bookLanguage');
					}
				}
				
				if($this->BookLanguage->save($this->request->data))
				{
					$this->Session->setFlash("<div class='alert alert-success fade in' style='height:50px'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>Data Succesfully Inserted</div>");
					$this->redirect('/LibraryManagement/bookLanguage');
				}
				else
				{
					$this->Session->setFlash("<div class='alert alert-danger fade in' style='height:50px'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>Data Not Inserted</div>");
					$this->redirect('/LibraryManagement/bookLanguage');
				}
			}
			else if(empty($this->request->data))
			{
				$this->request->data=$this->BookLanguage->read(null,$id);
			}
			/*List Book Languages details*/
			$list = $this->BookLanguage->find('all');
			$this->set('list',$list);
		}
		public function deleteBookLanguage($id=null)
		{
			$this->layout="ptes_admin";
			$this->BookLanguage->delete($id);
			$this->Session->setFlash("<div class='alert alert-success fade in' style='height:50px'>
							<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
							<i class='fa fa-check'></i> Deleted Successfully.</div>");
			$this->redirect(array("controller"=>"LibraryManagement","action"=>"bookLanguage"));
		}
/***----------/*  BookDetails :Sep 22 by Kruthi ---------------------------**/	
		public function bookDetailsList()
		{
			$this->_userSessionCheckout();
			$this->layout="ptes_admin";
			$book_list=$this->BookDetail->find('all',array('order'=>array('BookDetail.book_code ASC')));
			$this->set('books',$book_list);
		}
		
		public function bookDetailsListPrintout()
		{
			$this->_userSessionCheckout();
			$this->layout="ajax";
			$book_list=$this->BookDetail->find('all');
			$this->set('books',$book_list);
		}
	
			public function bookDetails($id=null,$book_id=null)
		{
			$this->layout="ptes_admin";
			$this->_libraryDropDown();
			
			if(!empty($this->request->data))
			{
				$from_date = $this->request->data['BookDetail']['bill_date'];
				$fromdate= new DateTime($from_date);
				$this->request->data['BookDetail']['bill_date'] = $fromdate->format('Y-m-d');
				
				if(empty($this->request->data['BookDetail']['book_code']))
				{
					$get_language=$this->BookLanguage->find('all',array('conditions'=>array('BookLanguage.id'=>$this->request->data['BookDetail']['book_language_id'])));
					$get_category=$this->BookCategory->find('all',array('conditions'=>array('BookCategory.id'=>$this->request->data['BookDetail']['book_category_id'])));
				
					$language_val=$get_language[0]['BookLanguage']['language_code'];
					$category_val=$get_category[0]['BookCategory']['category_code'];
					$year=$this->request->data['BookDetail']['purchased_year'];
				
					$count_book = $this->BookDetail->find('count',array('conditions'=>array(
																'BookDetail.book_language_id'=>$this->request->data['BookDetail']['book_language_id'],
																'BookDetail.book_category_id'=>$this->request->data['BookDetail']['book_category_id']),
																'group'=>'BookDetail.title'));
					$this->request->data['BookDetail']['book_unique_code'] = $language_val.$category_val.str_pad($count_book+1, 4, '0', STR_PAD_LEFT);
					$count = $this->BookDetail->find('count');
					
				} 
				$photo_tmp_name=$this->request->data['BookDetail']['photo_path']['tmp_name'];
				$book_photo_name=$this->request->data['BookDetail']['photo_path']['name'];
				$new_photo_name="";
				$photo_ext = substr($book_photo_name, strripos($book_photo_name, '.')); // get file name
				$allowed_photo_types = array('.jpeg','.jpg','.png','.gif','.JPG'); 
    
				if($book_photo_name!='')
				{
					if(in_array($photo_ext,$allowed_photo_types))
					{ 
						$new_photo_name = "Book".$this->data['BookDetail']['book_code'].$photo_ext;
						$target = WWW_ROOT."BookPhoto/".$new_photo_name;
						move_uploaded_file($photo_tmp_name,$target);
					}
					else
					{
						$this->Session->setflash("<div class='alert alert-danger fade in' style='height:50px'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>
						Student Photo Only jpg/ png/gif file typs are allowed</div>");
					}
				}
				$this->request->data['BookDetail']['photo_path'] = $new_photo_name;
				for($i=0;$i<$this->request->data['BookDetail']['number_of_copies'];$i++)
				{
					$this->request->data['BookDetail']['book_code'] = $year."-".$language_val.$category_val.str_pad(++$count, 4, '0', STR_PAD_LEFT);
					$get = $this->BookDetail->save($this->request->data);
				}
				if($get)
				{
					$this->Session->setFlash("<div class='alert alert-success fade in' style='height:50px'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>Data Succesfully Inserted</div>");
					$this->redirect('/LibraryManagement/bookDetailsList');
				}
				else
				{
					$this->Session->setFlash("<div class='alert alert-danger fade in' style='height:50px'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>Data Not Inserted</div>");
					$this->redirect('/LibraryManagement/bookDetailsList');
				}
			}
			else if(empty($this->request->data))
			{
				$this->request->data=$this->BookDetail->read(null,$id);
				$this->set('book_code',$book_id);
			}
		}
		
		public function bookDetailsDelete($book_id=null)
		{
			$this->layout="ptes_admin";
			$this->BookDetail->query('delete from book_details where book_unique_code = "'.$book_id.'" ');
			$this->Session->setFlash("<div class='alert alert-success fade in' style='height:50px'>
							<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
							<i class='fa fa-check'></i> Deleted Successfully.</div>");
			$this->redirect(array("controller"=>"LibraryManagement","action"=>"bookDetailsList"));
		}
		public function bookDetailEdit($id=null)
		{
			$this->layout="ptes_admin";
			$this->_libraryDropDown();
			
			$get=$this->BookDetail->find('all',array('conditions'=>array('BookDetail.id'=>$id)));
			$this->set('list',$get);
			
			if(!empty($this->request->data))
			{
				
				$from_date = $this->request->data['BookDetail']['bill_date'];
				$fromdate= new DateTime($from_date);
				$this->request->data['BookDetail']['bill_date'] = $fromdate->format('Y-m-d');
			
				$get_language=$this->BookLanguage->find('all',array('conditions'=>array('BookLanguage.id'=>$this->request->data['BookDetail']['book_language_id'])));
				$get_category=$this->BookCategory->find('all',array('conditions'=>array('BookCategory.id'=>$this->request->data['BookDetail']['book_category_id'])));
				
				$language_val=$get_language[0]['BookLanguage']['language_code'];
				$category_val=$get_category[0]['BookCategory']['category_code'];
				$year=$this->request->data['BookDetail']['purchased_year'];
			
				$count_book = $this->BookDetail->find('count',array('conditions'=>array(
												'BookDetail.book_language_id'=>$this->request->data['BookDetail']['book_language_id'],
												'BookDetail.book_category_id'=>$this->request->data['BookDetail']['book_category_id']),
												'group'=>'BookDetail.title'));
				$this->request->data['BookDetail']['book_unique_code'] = $language_val.$category_val.str_pad($count_book+1, 4, '0', STR_PAD_LEFT);
				$this->request->data['BookDetail']['book_code'] = $year."-".$language_val.$category_val.str_pad($count_book+1, 4, '0', STR_PAD_LEFT);
				
				$photo_tmp_name=$this->request->data['BookDetail']['photo_path']['tmp_name'];
				$book_photo_name=$this->request->data['BookDetail']['photo_path']['name'];
				$new_photo_name="";
				$photo_ext = substr($book_photo_name, strripos($book_photo_name, '.')); // get file name
				$allowed_photo_types = array('.jpeg','.jpg','.png','.gif','.JPG'); 
    
				if($book_photo_name!='')
				{
					if(in_array($photo_ext,$allowed_photo_types))
					{ 
						$new_photo_name = "Book".$this->data['BookDetail']['book_code'].$photo_ext;
						$target = WWW_ROOT."BookPhoto/".$new_photo_name;
						move_uploaded_file($photo_tmp_name,$target);
					}
					else
					{
						$this->Session->setflash("<div class='alert alert-danger fade in' style='height:50px'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>
						Student Photo Only jpg/ png/gif file typs are allowed</div>");
					}
				}
				$this->request->data['BookDetail']['photo_path'] = $new_photo_name;
				$get = $this->BookDetail->save($this->request->data);
				
				if($get)
				{
					$this->Session->setFlash("<div class='alert alert-success fade in' style='height:50px'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>Data Succesfully Inserted</div>");
					$this->redirect('/LibraryManagement/bookDetailsList');
				}
			}
		}
/***------------------------------------------------------------------------------------****/
		/*  BookIssue */
		public function bookIssue()
		{
			$this->_userSessionCheckout();
			$this->_libraryDropDown();
			
			$this->layout="ptes_admin";
		}		
		public function issueBooks()
		{
			configure::write("debug",0);
			$this->_userSessionCheckout();
			$this->_libraryDropDown();
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
				if($this->request->data['BookIssue']['book_category_id']=='Select Category' && 
				$this->request->data['BookIssue']['book_publisher_id']=='Select Publisher'&& 
				$this->request->data['BookIssue']['book_author_id']=='Select Author' && 
				empty($this->request->data['BookIssue']['title']))
				{
					$this->Session->setFlash("<div class='alert alert-danger fade in' style='height:50px'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>Fields are Empty</div>");
					$this->redirect('/LibraryManagement/bookIssue');
				}
				
				else if($this->request->data['BookIssue']['book_category_id']!='Select Category' && 
					$this->request->data['BookIssue']['book_publisher_id']!='Select Publisher'&& 
					$this->request->data['BookIssue']['book_author_id']!='Select Author' && 
					!empty($this->request->data['BookIssue']['title']))
				{
					$conditions = array('conditions'=>array(
					'BookDetail.book_category_id'=>$this->request->data['BookIssue']['book_category_id'],
					'BookDetail.book_publisher_id'=>$this->request->data['BookIssue']['book_publisher_id'],
					'BookDetail.book_author_id'=>$this->request->data['BookIssue']['book_author_id'],
					'BookDetail.title'=>$this->request->data['BookIssue']['title']));
						$book_list = $this->BookDetail->find('all',$conditions);
					if(!empty($book_list ))
					{
						$this->set('list',$book_list);
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
					}
					else
					{
						$this->Session->setFlash("<div class='alert alert-danger fade in' style='height:50px'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>Book Not Exists</div>");
						$this->redirect('/LibraryManagement/bookIssue');
					}
				}
				
				else if($this->request->data['BookIssue']['book_category_id']!='Select Category')
				{
					$conditions = array('conditions'=>array(
					'BookDetail.book_category_id'=>$this->request->data['BookIssue']['book_category_id']));
						
					$book_list = $this->BookDetail->find('all',$conditions); 					if(!empty($book_list ))
					{
						$this->set('list',$book_list);
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
					}
					else
					{
						$this->Session->setFlash("<div class='alert alert-danger fade in' style='height:50px'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>Book Not Exists</div>");
						$this->redirect('/LibraryManagement/bookIssue');
					}
				}
				
				else if($this->request->data['BookIssue']['book_publisher_id']!='Select Publisher')
				{
					$conditions = array('conditions'=>array(
					'BookDetail.book_publisher_id'=>$this->request->data['BookIssue']['book_publisher_id']));
					$book_list = $this->BookDetail->find('all',$conditions); 					if(!empty($book_list ))
					{
						$this->set('list',$book_list);
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
					}
					else
					{
						$this->Session->setFlash("<div class='alert alert-danger fade in' style='height:50px'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>Book Not Exists</div>");
						$this->redirect('/LibraryManagement/bookIssue');
					}
				}
				
				else if($this->request->data['BookIssue']['book_author_id']!='Select Author')
				{
					$conditions = array('conditions'=>array('BookDetail.book_author_id'=>$this->request->data['BookIssue']['book_author_id']));
					$book_list = $this->BookDetail->find('all',$conditions); 					if(!empty($book_list ))
					{
						$this->set('list',$book_list);
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
					}
					else
					{
						$this->Session->setFlash("<div class='alert alert-danger fade in' style='height:50px'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>Book Not Exists</div>");
						$this->redirect('/LibraryManagement/bookIssue');
					}
				}
				
				else if(!empty($this->request->data['BookIssue']['title']))
				{
					$conditions = array('conditions'=>array(
					'BookDetail.title'=>$this->request->data['BookIssue']['title']));
						
					$book_list = $this->BookDetail->find('all',$conditions); 					if(!empty($book_list ))
					{
						$this->set('list',$book_list);
					
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
					}
					else
					{
						$this->Session->setFlash("<div class='alert alert-danger fade in' style='height:50px'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>Book Not Exists</div>");
						$this->redirect('/LibraryManagement/bookIssue');
					}
				}
			}
		}
		
		public function issueStudentBook()
		{	
			$this->_userSessionCheckout();
			if(!empty($this->request->data))
			{
				
		$data=substr($this->request->data['BookIssue']['student_code'], strpos($this->request->data['BookIssue']['student_code'], "-")+1);

				$count=count($this->request->data['book_issued']);
				for($i=0;$i<$count;$i++)
				{
					$condition = array('conditions'=>array('StudentDetail.student_code'=>$data,'AddClass.id'=>$this->request->data['BookIssue']['add_class_id']));
					if($get_value=$this->BookIssue->find('all',$condition))
					{
						foreach($get_value as $get)
						{
							$condition_book = array('conditions'=>array('BookIssueDetail.book_issue_id'=>$get['BookIssue']['id']
														,'BookIssueDetail.book_detail_id'=>$this->request->data['book_issued'][$i]));
							if($this->BookIssueDetail->find('all',$condition_book))
							{
								$this->Session->setFlash("<div class='alert alert-danger fade in' style='height:50px'>
								<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>Book Already Issued</div>");
								$this->redirect('/LibraryManagement/bookIssue');
							}

						}
					}
				}
				
				$conditions_student_id = array('conditions'=>array('StudentDetail.student_code'=>$data,'AddClass.id'=>$this->request->data['BookIssue']['add_class_id']));		
				if($student_id=$this->StudentDetail->find('all',$conditions_student_id))
				{
					foreach($student_id as $s)
					{
						$student_detail_id=$s['StudentDetail']['id'];
					}
				}
				else
				{
					$this->Session->setFlash("<div class='alert alert-danger fade in' style='height:50px'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>Invalid Student Code</div>");
					$this->redirect('/LibraryManagement/bookIssue');
				}
				
				$issue_date = $this->request->data['BookIssue']['issue_date'];
				$issuedate= new DateTime($issue_date);
				$this->request->data['BookIssue']['issue_date'] = $issuedate->format('Y-m-d');
					
				$return_date = $this->request->data['BookIssue']['return_date'];
				$returndate= new DateTime($return_date);
				$this->request->data['BookIssue']['return_date'] = $returndate->format('Y-m-d');
				
				$book_details = array(
					"BookIssue"=>array(
						"student_detail_id"=>$student_detail_id,
						"academic_year_id"=>$this->request->data['BookIssue']['academic_year_id'],
						"add_class_id"=>$this->request->data['BookIssue']['add_class_id'],
						"issue_date"=>$this->request->data['BookIssue']['issue_date'],
						"return_date"=>$this->request->data['BookIssue']['return_date'],
						"status"=>'issued',
					)
				);
				$this->BookIssue->save($book_details);
				$id = $this->BookIssue->getLastInsertId();
				
				for($i=0;$i<$count;$i++)
				{
					if($book_issue=$this->BookDetail->find('all',array('conditions'=>array('BookDetail.id'=>$this->request->data['book_issued'][$i]))));
					{
						foreach($book_issue as $b)
						{
							$author_id=$b['BookDetail']['book_author_id'];
							$language_id=$b['BookDetail']['book_language_id'];
							$category_id=$b['BookDetail']['book_category_id'];
						}
					}
					
					
					$data = array(
							"BookIssueDetail"=>array(
							"book_issue_id"=>$id, 
							"student_detail_id"=>$student_detail_id,
							"academic_year_id"=>$this->request->data['BookIssue']['academic_year_id'],
							"add_class_id"=>$this->request->data['BookIssue']['add_class_id'],
							"book_detail_id"=>$this->request->data['book_issued'][$i],
							"book_author_id"=>$author_id,
							"book_category_id"=>$category_id,
							"book_language_id"=>$language_id,
							"book_status"=>'book_issued',
						)
					);
					print_r($get=$this->BookIssueDetail->saveAll($data));
				}
				if(!empty($get))
				{
					$this->Session->setFlash("<div class='alert alert-success fade in' style='height:50px'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>Book Issued Succesfully</div>");
					$this->redirect('/LibraryManagement/bookIssue');
				}
				else
				{
					$this->Session->setFlash("<div class='alert alert-danger fade in' style='height:50px'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>Book Not Issued</div>");
					$this->redirect('/LibraryManagement/bookIssue');
				}
			}
		}
		
/* ************---------------------- BookReturn----------- */
		public function bookReturn()
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
		$data=substr($this->request->data['BookIssue']['student_code'], strpos($this->request->data['BookIssue']['student_code'], "-")+1);

				$conditions_student_id = array('conditions'=>array('StudentDetail.student_code'=>$data,'AddClass.id'=>$this->request->data['BookIssue']['add_class_id']));
				
				$student_book_list = $this->BookIssue->find('all',$conditions_student_id);
						 				if(!empty($student_book_list ))
				{
					$this->set('student_list',$student_book_list);
					foreach($student_book_list as $student)
					{
						$student_id=$student['BookIssue']['student_detail_id'];
					}
					
					$conditions_book_id = array('conditions'=>array('BookIssue.student_detail_id'=>$student_id,
																	'BookIssueDetail.add_class_id'=>$this->request->data['BookIssue']['add_class_id'],
																	'BookIssueDetail.book_status LIKE'=>'book_issued'));
					if($get_books=$this->BookIssueDetail->find('all',$conditions_book_id))
					{
						$this->set('book',$get_books);
					}
					else
					{
						$this->Session->setFlash("<div class='alert alert-danger fade in' style='height:50px'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>Record Not Exists</div>");
						$this->redirect('/LibraryManagement/bookReturn');
					}
				}
				else
				{
					$this->Session->setFlash("<div class='alert alert-danger fade in' style='height:50px'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>Record Not Exists</div>");
					$this->redirect('/LibraryManagement/bookReturn');
				}
			}
			
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
		}
		
		public function bookReturnProcess()
		{
			$this->_userSessionCheckout();
			if(!empty($this->request->data))
			{
				$count=count($this->request->data['book_issued']);
				echo $book_issue_id=$this->request->data['BookIssue']['book_issue_id'];
				for($i=0;$i<$count;$i++)
				{
					$data = array(
						"BookIssueDetail" => array(
							"book_status" => 'book_returned',
							"id" => $this->request->data['book_issued'][$i],
						)
					);
					$book_status_change=$this->BookIssueDetail->saveAll($data);
				}
				
				if(!empty($book_status_change))
				{
					$this->Session->setFlash("<div class='alert alert-success fade in' style='height:50px'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>Book Returned Succesfully</div>");
					$this->redirect('/LibraryManagement/bookReturn');
				}
				else
				{
					$this->Session->setFlash("<div class='alert alert-danger fade in' style='height:50px'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>Book Not Returned</div>");
					$this->redirect('/LibraryManagement/bookReturn');
				}
			}							
		}
		public function classWiseReport()
		{
			$this->_userSessionCheckout();
			$this->layout="ptes_admin";
			
			$class_list=$this->AddClass->find('all');
			$class_array = array();
			if(!empty($class_list))
			{
				foreach($class_list as $class)
				{ 
					$class_array[$class['AddClass']['id']] = $class['AddClass']['class_name'];
				}
			}
			$this->set('classes',$class_array);
			
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
		}
		
		public function classWiseBooksIssued()
		{
			$this->_userSessionCheckout();
			$this->layout="ptes_admin";
			if(!empty($this->request->data))
			{
				
			if(empty($this->request->data['BookIssue']['from_date']) || empty($this->request->data['BookIssue']['to_date']))
				{
					$condition_get_detail = array('conditions'=>array('BookIssue.add_class_id'=>$this->request->data['BookIssue']['add_class_id'],'BookIssue.academic_year_id'=>$this->request->data['BookIssue']['academic_year_id']));
					$student_book_list = $this->BookIssue->find('all',$condition_get_detail);	
					if(!empty($student_book_list ))
					{
						$this->set('list',$student_book_list);
						$this->set('book_list',$this->BookIssueDetail->find('all',$condition_get_detail));
					}
					else
					{
						$this->Session->setFlash("<div class='alert alert-danger fade in' style='height:50px'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>Record Not Exists</div>");
						$this->redirect('/LibraryManagement/classWiseReport');
					}
				}
				else if(!empty($this->request->data['BookIssue']['from_date']) && !empty($this->request->data['BookIssue']['to_date']))
				{
					$from_date = $this->request->data['BookIssue']['from_date'];
					$fromdate= new DateTime($from_date);
					$this->request->data['BookIssue']['from_date'] = $fromdate->format('Y-m-d');
						
					$to_date = $this->request->data['BookIssue']['to_date'];
					$todate= new DateTime($to_date);
					$this->request->data['BookIssue']['to_date'] = $todate->format('Y-m-d');
					
					$date_from=$this->request->data['BookIssue']['from_date'];
					$date_to=$this->request->data['BookIssue']['to_date'];
					
					$condition_get_detail = array('conditions'=>array(
					'BookIssue.add_class_id'=>$this->request->data['BookIssue']['add_class_id'],
					'BookIssue.academic_year_id'=>$this->request->data['BookIssue']['academic_year_id'],
					'BookIssue.issue_date BETWEEN ? AND ? '=>array($date_from,$date_to)));
					$student_book_list = $this->BookIssueDetail->find('all',$condition_get_detail);	
					if(!empty($student_book_list ))
					{
						$this->set('book_list',$student_book_list);
						$this->set('fromdate',$date_from);
						$this->set('todate',$date_to);
					}
					else
					{
						$this->Session->setFlash("<div class='alert alert-danger fade in' style='height:50px'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>Record Not Exists</div>");
						$this->redirect('/LibraryManagement/classWiseReport');
					}
				}	
			}
		}
		
	public function classWiseBooksIssuedPrint($clas_id=null,$aca_id=null,$from_date=null,$to_date=null)
		{
			$this->_userSessionCheckout();
			$this->layout="ajax";
			if(empty($from_date) || empty($from_date))
				{
					$condition_get_detail = array('conditions'=>array('BookIssue.add_class_id'=>$clas_id,'BookIssue.academic_year_id'=>$aca_id));
					$student_book_list = $this->BookIssue->find('all',$condition_get_detail);	
					if(!empty($student_book_list ))
					{
						$this->set('list',$student_book_list);
						$this->set('book_list',$this->BookIssueDetail->find('all',$condition_get_detail));
					}
				}
				else if(!empty($from_date) && !empty($to_date))
				{
	
					$fromdate= new DateTime($from_date);
					$from_date = $fromdate->format('Y-m-d');
						
					$todate= new DateTime($to_date);
					$to_date = $todate->format('Y-m-d');
					
					$date_from=$from_date;
					$date_to=$to_date;
					
					$condition_get_detail = array('conditions'=>array(
					'BookIssue.add_class_id'=>$clas_id,
					'BookIssue.academic_year_id'=>$aca_id,
					'BookIssue.issue_date BETWEEN ? AND ? '=>array($date_from,$date_to)));
					$student_book_list = $this->BookIssueDetail->find('all',$condition_get_detail);	
					if(!empty($student_book_list ))
					{
						$this->set('book_list',$student_book_list);
						$this->set('fromdate',$date_from);
						$this->set('todate',$date_to);
					}
				}	
		}
	
		public function monthWiseReport()
		{
			$this->_userSessionCheckout();
			$this->layout="ptes_admin";
		}
		
		public function monthWiseBooksIssued($id=null)
		{
			$this->_userSessionCheckout();
			$this->layout="ptes_admin";
			if(!empty($this->request->data))
			{
				$from_date = $this->request->data['BookIssue']['from_date'];
				$fromdate= new DateTime($from_date);
				$this->request->data['BookIssue']['from_date'] = $fromdate->format('Y-m-d');
						
				$to_date = $this->request->data['BookIssue']['to_date'];
				$todate= new DateTime($to_date);
				$this->request->data['BookIssue']['to_date'] = $todate->format('Y-m-d');
					
				$date_from=$this->request->data['BookIssue']['from_date'];
				$date_to=$this->request->data['BookIssue']['to_date'];
				
				$condition=array('conditions'=>array('BookIssue.issue_date BETWEEN ? AND ? '=>array($date_from,$date_to)));
				$datewise_list=$this->BookIssueDetail->find('all',$condition);
				$this->set('book_list',$datewise_list);
			}
		}
		
		public function monthWiseBooksIssuedPrint($from_date=null,$to_date=null)
		{
			$this->_userSessionCheckout();
			$this->layout="ajax";
				$fromdate= new DateTime($from_date);
				$from_date= $fromdate->format('Y-m-d');
						
				$todate= new DateTime($to_date);
				$to_date = $todate->format('Y-m-d');
					
				$date_from=$from_date;
				$date_to=$to_date;
				
				$condition=array('conditions'=>array('BookIssue.issue_date BETWEEN ? AND ? '=>array($date_from,$date_to)));
				$datewise_list=$this->BookIssueDetail->find('all',$condition);
				$this->set('book_list',$datewise_list);
				$this->set('fromdate',$from_date);
				$this->set('todate',$to_date);
		}
		
/**-----------  staffBookIssue ------------------------*/
		public function staffBookIssue()
		{
			$this->_userSessionCheckout();
			$this->layout="ptes_admin";
			$this->_libraryDropDown();
		}
		public function issueStaffBooks()
		{
			$this->_userSessionCheckout();
			$this->layout="ptes_admin";
			$this->_libraryDropDown();
			
			$this->layout="ptes_admin";
			if(!empty($this->request->data))
			{
				if($this->request->data['StaffBookIssue']['book_category_id']=='Select Category' && 
				$this->request->data['StaffBookIssue']['book_publisher_id']=='Select Publisher'&& 
				$this->request->data['StaffBookIssue']['book_author_id']=='Select Author' && 
				empty($this->request->data['StaffBookIssue']['title']))
				{
					$this->Session->setFlash("<div class='alert alert-danger fade in' style='height:50px'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>Fields are Empty</div>");
					$this->redirect('/LibraryManagement/staffBookIssue');
				}
				
				else if($this->request->data['StaffBookIssue']['book_category_id']!='Select Category' && 
					$this->request->data['StaffBookIssue']['book_publisher_id']!='Select Publisher'&& 
					$this->request->data['StaffBookIssue']['book_author_id']!='Select Author' && 
					!empty($this->request->data['StaffBookIssue']['title']))
				{
					$conditions = array('conditions'=>array(
					'BookDetail.book_category_id'=>$this->request->data['StaffBookIssue']['book_category_id'],
					'BookDetail.book_publisher_id'=>$this->request->data['StaffBookIssue']['book_publisher_id'],
					'BookDetail.book_author_id'=>$this->request->data['StaffBookIssue']['book_author_id'],
					'BookDetail.title'=>$this->request->data['StaffBookIssue']['title']));
					$book_list = $this->BookDetail->find('all',$conditions); 					if(!empty($book_list ))
					{
						$this->set('list',$book_list);
					}
					else
					{
						$this->Session->setFlash("<div class='alert alert-danger fade in' style='height:50px'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>Record Not Exists</div>");
						$this->redirect('/LibraryManagement/staffBookIssue');
					}
				}
				
				else if($this->request->data['StaffBookIssue']['book_category_id']!='Select Category')
				{
					$conditions = array('conditions'=>array(
					'BookDetail.book_category_id'=>$this->request->data['StaffBookIssue']['book_category_id']));
						
					$book_list = $this->BookDetail->find('all',$conditions); 					if(!empty($book_list ))
					{
						$this->set('list',$book_list);
					}
					else
					{
						$this->Session->setFlash("<div class='alert alert-danger fade in' style='height:50px'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>Book Not Exists</div>");
						$this->redirect('/LibraryManagement/staffBookIssue');
					}
			
				}
				
				else if($this->request->data['StaffBookIssue']['book_publisher_id']!='Select Publisher')
				{
					$conditions = array('conditions'=>array(
					'BookDetail.book_publisher_id'=>$this->request->data['StaffBookIssue']['book_publisher_id']));
					$book_list = $this->BookDetail->find('all',$conditions); 					if(!empty($book_list ))
					{
						$this->set('list',$book_list);
					}
					else
					{
						$this->Session->setFlash("<div class='alert alert-danger fade in' style='height:50px'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>Book Not Exists</div>");
						$this->redirect('/LibraryManagement/staffBookIssue');
					}
				}
				
				else if($this->request->data['StaffBookIssue']['book_author_id']!='Select Author')
				{
					$conditions = array('conditions'=>array('BookDetail.book_author_id'=>$this->request->data['StaffBookIssue']['book_author_id']));
					$book_list = $this->BookDetail->find('all',$conditions); 					if(!empty($book_list ))
					{
						$this->set('list',$book_list);
					}
					else
					{
						$this->Session->setFlash("<div class='alert alert-danger fade in' style='height:50px'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>Book Not Exists</div>");
						$this->redirect('/LibraryManagement/staffBookIssue');
					}
				}
				
				else if(!empty($this->request->data['StaffBookIssue']['title']))
				{
					$conditions = array('conditions'=>array(
					'BookDetail.title'=>$this->request->data['StaffBookIssue']['title']));
						
					$book_list = $this->BookDetail->find('all',$conditions); 					if(!empty($book_list ))
					{
						$this->set('list',$book_list);
					}
					else
					{
						$this->Session->setFlash("<div class='alert alert-danger fade in' style='height:50px'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>Book Not Exists</div>");
						$this->redirect('/LibraryManagement/staffBookIssue');
					}
				}
			}
			
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
		}
		
		public function issueStaffBooksDetail()
		{
			$this->_userSessionCheckout();
			if(!empty($this->request->data))
			{
				print_r($this->request->data);
				$count=count($this->request->data['book_issued']);
				for($i=0;$i<$count;$i++)
				{
				$condition = array('conditions'=>array(
				'StaffBookIssue.staff_detail_id'=>$this->request->data['StaffBookIssue']['staff_detail_id']));
				
					if($get_value=$this->StaffBookIssue->find('all',$condition))
					{
						foreach($get_value as $get)
						{
							echo $get['StaffBookIssue']['id'];
							$condition_book = array('conditions'=>array(
							'StaffBookIssueDetail.staff_book_issue_id'=>$get['StaffBookIssue']['id'],
							'StaffBookIssueDetail.book_detail_id'=>$this->request->data['book_issued'][$i]));
							
							if($this->StaffBookIssueDetail->find('all',$condition_book))
							{
								$this->Session->setFlash("<div class='alert alert-danger fade in' style='height:50px'>
								<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>Book Already Issued</div>");
								$this->redirect('/LibraryManagement/staffBookIssue');
							}

						}
					}
				}
				
				$conditions_student_id = array('conditions'=>array(
				'StaffDetail.id'=>$this->request->data['StaffBookIssue']['staff_detail_id']));	
				$check=$this->StaffDetail->find('all',$conditions_student_id);	
				if(empty($check))
				{
					$this->Session->setFlash("<div class='alert alert-danger fade in' style='height:50px'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>Invalid Staff</div>");
					$this->redirect('/LibraryManagement/staffBookIssue');
				}

				$issue_date = $this->request->data['StaffBookIssue']['issue_date'];
				$issuedate= new DateTime($issue_date);
				$this->request->data['StaffBookIssue']['issue_date'] = $issuedate->format('Y-m-d');
					
				$return_date = $this->request->data['StaffBookIssue']['return_date'];
				$returndate= new DateTime($return_date);
				$this->request->data['StaffBookIssue']['return_date'] = $returndate->format('Y-m-d');
				
				$book_details = array(
					"StaffBookIssue"=>array(
						"staff_detail_id"=>$this->request->data['StaffBookIssue']['staff_detail_id'],
						"issue_date"=>$this->request->data['StaffBookIssue']['issue_date'],
						"return_date"=>$this->request->data['StaffBookIssue']['return_date'],
						"status"=>'issued',
					)
				);
				$this->StaffBookIssue->save($book_details);
				$id = $this->StaffBookIssue->getLastInsertId();
				
				for($i=0;$i<$count;$i++)
				{
					if($book_issue=$this->BookDetail->find('all',array('conditions'=>array('BookDetail.id'=>$this->request->data['book_issued'][$i]))));
					{
						foreach($book_issue as $b)
						{
							$author_id=$b['BookDetail']['book_author_id'];
							$language_id=$b['BookDetail']['book_language_id'];
							$category_id=$b['BookDetail']['book_category_id'];
						}
					}
				
					$data = array(
							"StaffBookIssueDetail"=>array(
							"staff_book_issue_id"=>$id,
							"staff_detail_id"=>$this->request->data['StaffBookIssue']['staff_detail_id'],
							"book_detail_id"=>$this->request->data['book_issued'][$i],
							"book_author_id"=>$author_id,
							"book_category_id"=>$category_id,
							"book_language_id"=>$language_id,
							"book_status"=>'book_issued',
						)
					);
					print_r($get=$this->StaffBookIssueDetail->saveAll($data));
				}
				if(!empty($get))
				{
					$this->Session->setFlash("<div class='alert alert-success fade in' style='height:50px'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>Book Issued Succesfully</div>");
					$this->redirect('/LibraryManagement/staffBookIssue');
				}
				else
				{
					$this->Session->setFlash("<div class='alert alert-danger fade in' style='height:50px'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>Book Not Issued</div>");
					$this->redirect('/LibraryManagement/staffBookIssue');
				}
			}
		}
		/*  staffBookReturn  */
		public function staffBookReturn()
		{
			$this->_userSessionCheckout();
			$this->layout="ptes_admin";
			
			if(!empty($this->request->data))
			{
				$conditions_staff_id = array('conditions'=>array('StaffBookIssue.staff_detail_id'=>$this->request->data['StaffBookIssue']['staff_detail_id']));
				$staff_book_list = $this->StaffBookIssue->find('all',$conditions_staff_id);		
				if(!empty($staff_book_list ))
				{
					$this->set('staff_list',$staff_book_list);
					foreach($staff_book_list as $staff)
					{
						$staff_id=$staff['StaffBookIssue']['staff_detail_id'];
					}
					
					$conditions_book_id = array('conditions'=>array('StaffBookIssue.staff_detail_id'=>$staff_id,'StaffBookIssueDetail.book_status LIKE'=>'book_issued'));
					if($get_books=$this->StaffBookIssueDetail->find('all',$conditions_book_id))
					{
						$this->set('list',$get_books);
					}
					else
					{
						$this->Session->setFlash("<div class='alert alert-danger fade in' style='height:50px'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>Record Not Exists</div>");
						$this->redirect('/LibraryManagement/staffBookReturn');
					}
				}
				else
				{
					$this->Session->setFlash("<div class='alert alert-danger fade in' style='height:50px'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>Record Not Exists</div>");
					$this->redirect('/LibraryManagement/staffBookReturn');
				}
			}
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
		}
		
		public function staffBookReturnProcess()
		{
			$this->_userSessionCheckout();
			if(!empty($this->request->data))
			{
				$count=count($this->request->data['book_issued']);
				for($i=0;$i<$count;$i++)
				{
					$data = array(
						"StaffBookIssueDetail" => array(
							"book_status" => 'book_returned',
							"id" => $this->request->data['book_issued'][$i],
						)
					);
					$book_status_change=$this->StaffBookIssueDetail->saveAll($data);
				}
				
				if(!empty($book_status_change))
				{
					$this->Session->setFlash("<div class='alert alert-success fade in' style='height:50px'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>Book Returned Succesfully</div>");
					$this->redirect('/LibraryManagement/staffBookReturn');
				}
				else
				{
					$this->Session->setFlash("<div class='alert alert-danger fade in' style='height:50px'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>Book Not Returned</div>");
					$this->redirect('/LibraryManagement/staffBookReturn');
				}
			}							
		}
		/**---------Monthy Staff Library Report---------**/
	public function monthWiseReportStaff()
		{
			$this->_userSessionCheckout();
			$this->layout="ptes_admin";

		}
		
		public function monthWiseBooksIssuedStaff()
		{
			$this->_userSessionCheckout();
			$this->layout="ptes_admin";
			if(!empty($this->request->data))
			{
				$from_date = $this->request->data['StaffBookIssue']['from_date'];
				$fromdate= new DateTime($from_date);
				$this->request->data['StaffBookIssue']['from_date'] = $fromdate->format('Y-m-d');
						
				$to_date = $this->request->data['StaffBookIssue']['to_date'];
				$todate= new DateTime($to_date);
				$this->request->data['StaffBookIssue']['to_date'] = $todate->format('Y-m-d');
					
				$date_from=$this->request->data['StaffBookIssue']['from_date'];
				$date_to=$this->request->data['StaffBookIssue']['to_date'];
			 
		
				$condition=array('conditions'=>array('StaffBookIssue.issue_date >='=>$date_from,'StaffBookIssue.issue_date <='=>$date_to));
				$datewise_list=$this->StaffBookIssueDetail->find('all',$condition);
				$this->set('book_list',$datewise_list);
				
				
			}
		}
		
		public function monthWiseBooksIssuedStaffPrint($from_date=null,$to_date=null)
		{
			$this->_userSessionCheckout();
			$this->layout="ajax";
				$fromdate= new DateTime($from_date);
				$date_from= $fromdate->format('Y-m-d');
						
				$todate= new DateTime($to_date);
				$date_to= $todate->format('Y-m-d');
					
				$condition=array('conditions'=>array('StaffBookIssue.issue_date >='=>$date_from,'StaffBookIssue.issue_date <='=>$date_to));
				$datewise_list=$this->StaffBookIssueDetail->find('all',$condition);
			
				$this->set('book_list',$datewise_list);
				$this->set('fromdate',$from_date);
				$this->set('todate',$to_date);

		}
		
		public function individualReport()
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
		$data=substr($this->request->data['BookIssue']['student_code'], strpos($this->request->data['BookIssue']['student_code'], "-")+1);

				$conditions_student_id = array('conditions'=>array('StudentDetail.student_code'=>$data,'AddClass.id'=>$this->request->data['BookIssue']['add_class_id']));
				$student_book_list = $this->BookIssueDetail->find('all',$conditions_student_id);
						
				if(!empty($student_book_list))
				{
					$this->set('student_list',$student_book_list);
				}
				else
				{
					$this->Session->setFlash("<div class='alert alert-danger fade in' style='height:50px'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-check'></i>Record Not Exists</div>");
					$this->redirect('/LibraryManagement/individualReport');
				}
			}
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
		}
		public function individualReportPrint($data,$clas_id)
		{
			$this->_userSessionCheckout();
			$this->layout="ajax";
			
			$conditions_student_id = array('conditions'=>array('StudentDetail.student_code'=>$data,'AddClass.id'=>$clas_id));	
			$student_book_list = $this->BookIssueDetail->find('all',$conditions_student_id);	
			if(!empty($student_book_list))
			{
				$this->set('book_list',$student_book_list);
			}
		}
}