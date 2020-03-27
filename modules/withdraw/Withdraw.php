<?php
/*********************************************************************************
 * The contents of this file are subject to the SugarCRM Public License Version 1.1.2
 * ("License"); You may not use this file except in compliance with the
 * License. You may obtain a copy of the License at http://www.sugarcrm.com/SPL
 * Software distributed under the License is distributed on an  "AS IS"  basis,
 * WITHOUT WARRANTY OF ANY KIND, either express or implied. See the License for
 * the specific language governing rights and limitations under the License.
 * The Original Code is:  SugarCRM Open Source
 * The Initial Developer of the Original Code is SugarCRM, Inc.
 * Portions created by SugarCRM are Copyright (C) SugarCRM, Inc.;
 * All Rights Reserved.
 * Contributor(s): ______________________________________.
 ********************************************************************************/
/*********************************************************************************
 * $Header: /advent/projects/wesat/vtiger_crm/sugarcrm/modules/Contacts/Contacts.php,v 1.70 2005/04/27 11:21:49 rank Exp $
 * Description:  TODO: To be written.
 * Portions created by SugarCRM are Copyright (C) SugarCRM, Inc.
 * All Rights Reserved.
 * Contributor(s): ______________________________________..
 ********************************************************************************/
// Contact is used to store customer information.
class withdraw extends CRMEntity {
	var $log;
	var $db;

	var $table_name = "vtiger_withdraw";
	var $table_index= 'withdrawid';
	var $tab_name = Array('vtiger_crmentity','vtiger_withdraw');
	var $tab_name_index = Array('vtiger_crmentity'=>'crmid','vtiger_withdraw'=>'withdrawid');
	/**
	 * Mandatory table for supporting custom fields.
	 */
	var $customFieldTable = Array();

	var $entity_table = "vtiger_crmentity";
	
	var $column_fields = Array();

	var $sortby_fields = Array('loginid','name','bank_name','sort_code','iban','swift','bank_acc_id','amount','datetime','status');


	var $list_link_field= 'loginid';

	// This is the list of vtiger_fields that are in the lists.
	var $list_fields_name = Array(
	'login Id' => 'loginid',
	'Bank Account Name' => 'name',
	'Bank Name' => 'bank_name',
	'Sort code' => 'sort_code',
	'Iban' => 'iban',
	'Swift' => 'swift',
	'Bank account id' => 'bank_acc_id',
	'Amount' => 'amount',
	'Datetime' => 'datetime',
	'Status' => 'status'
	);

	var $search_fields = Array(
	'login Id' => Array('withdraw'=>'loginid'),
	'Bank Account Name' => Array('withdraw'=>'name'),
	'Bank Name' => Array('withdraw'=>'bank_name'),
	'Sort code' => Array('withdraw'=>'sort_code'),
	'Iban' => Array('withdraw'=>'iban'),
	'Swift' => Array('withdraw'=>'swift'),
	'Bank account id' => Array('withdraw'=>'bank_acc_id'),
	'Amount' => Array('withdraw'=>'amount'),
	'Datetime' => Array('withdraw'=>'datetime'),
	'Status' => Array('withdraw'=>'status'),
		);

	var $search_fields_name = Array(
	'login Id' => 'loginid',
	'Bank Account Name' => 'name',
	'Bank Name' => 'bank_name',
	'Sort code' => 'sort_code',
	'Iban' => 'iban',
	'Swift' => 'swift',
	'Bank account id' => 'bank_acc_id',
	'Amount' => 'amount',
	'Datetime' => 'datetime',
	'Status' => 'status'
	);

	// This is the list of vtiger_fields that are required
	var $required_fields =  array("loginid"=>1);

	// Used when enabling/disabling the mandatory fields for the module.
	// Refers to vtiger_field.fieldname values.
	var $mandatory_fields = Array();

	//Default Fields for Email Templates -- Pavani
	var $emailTemplate_defaultFields = array('firstname','lastname','salutation','title','email','department','phone','mobile','support_start_date','support_end_date');

	//Added these variables which are used as default order by and sortorder in ListView
	var $default_order_by = 'loginid';
	var $default_sort_order = 'ASC';

	// For Alphabetical search
	var $def_basicsearch_col = 'loginid';

	var $related_module_table_index = array();

	function withdraw() {
		$this->log = LoggerManager::getLogger('withdraw');
		$this->db = PearDatabase::getInstance();
		
		//$this->db->setDebug(true);
		
		$this->column_fields = getColumnFields('withdraw');
	}

	/** Function to handle module specific operations when saving a entity
	*/
	function save_module($module)
	{
		// now handling in the crmentity for uitype 69
		//$this->insertIntoAttachment($this->id,$module);
	}
	
  
}

?>


