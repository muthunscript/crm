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
class mt4account extends CRMEntity {
	var $log;
	var $db;

	var $table_name = "vtiger_mt4account";
	var $table_index= 'mt4accountid';
	var $tab_name = Array('vtiger_crmentity','vtiger_mt4account');
	var $tab_name_index = Array('vtiger_crmentity'=>'crmid','vtiger_mt4account'=>'mt4accountid');
	/**
	 * Mandatory table for supporting custom fields.
	 */
	var $customFieldTable = Array();

	var $entity_table = "vtiger_crmentity";
	
	var $column_fields = Array();

	
	var $sortby_fields = Array('users','loginid','password','investor_password','leverage','pri_mary','acc_type');

	var $list_link_field= 'loginid';

	// This is the list of vtiger_fields that are in the lists.
	var $list_fields = Array(
	'Users' => Array('mt4account'=>'users'),
	'login Id' => Array('mt4account'=>'loginid'),
	'Password' => Array('mt4account'=>'password'),
	'Investor Password' => Array('mt4account'=>'investor_password'),
	'Leverage' => Array('mt4account'=>'leverage'),
	'Primary' => Array('mt4account'=>'pri_mary'),
	'Account Type' => Array('mt4account'=>'acc_type')
	);


	var $range_fields = Array();


	var $list_fields_name = Array(
	'Users' => 'users',
	'login Id' => 'loginid',
	'Password' => 'password',
	'Investor Password' => 'investor_password',
	'Leverage' => 'leverage',
	'Primary' => 'pri_mary',
	'Account Type' => 'acc_type'
	);

	var $search_fields = Array(
	'Users' => Array('mt4account'=>'users'),
	'login Id' => Array('mt4account'=>'loginid'),
	'Password' => Array('mt4account'=>'password'),
	'Investor Password' => Array('mt4account'=>'investor_password'),
	'Leverage' => Array('mt4account'=>'leverage'),
	'Primary' => Array('mt4account'=>'pri_mary'),
	'Account Type' => Array('mt4account'=>'acc_type'),
		);

	var $search_fields_name = Array(
	'Users' => 'users',
	'login Id' => 'loginid',
	'Password' => 'password',
	'Investor Password' => 'investor_password',
	'Leverage' => 'leverage',
	'Primary' => 'pri_mary',
	'Account Type' => 'acc_type'
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

	function mt4account() {
		$this->log = LoggerManager::getLogger('mt4account');
		$this->db = PearDatabase::getInstance();
		
		//$this->db->setDebug(true);
		
		$this->column_fields = getColumnFields('mt4account');
	}

	/** Function to handle module specific operations when saving a entity
	*/
	function save_module($module)
	{
		// now handling in the crmentity for uitype 69
		//$this->insertIntoAttachment($this->id,$module);
	}
	
	/*
	* Function to get the relation tables for related modules
	* @param - $secmodule secondary module name
	* returns the array with table names and fieldnames storing relations between module and this module
	*/
	function setRelationTables($secmodule) {
		$rel_tables = array (
				"Leads" => array("vtiger_seactivityrel" => array("activityid", "crmid"), "vtiger_activity" => "activityid"),
		);
		return $rel_tables[$secmodule];
	}
	
  
}

?>


