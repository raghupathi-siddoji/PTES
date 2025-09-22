<?php
/**
 

*/
App::uses('AppModel', 'Model');

/**
 * Application model for Cake.
 *
 * Add your application-wide methods in the class below, your models
 * will inherit them.
 *
 * @package       app.Model
 */
class BookDetail extends Model {
	
	public $hasMany=array("BookIssueDetail","StaffBookIssueDetail");
	public $belongsTo=array("BookAuthor","BookCategory","BookLanguage","BookLocation","BookPublisher","BookVendor");
 
}
