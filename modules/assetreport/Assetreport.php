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
class assetreport extends CRMEntity {
	var $log;
	var $db;

	var $table_name = "vtiger_assetreport";
	var $table_index= 'assetreportid';
	var $tab_name = Array('vtiger_crmentity','vtiger_assetreport');
	var $tab_name_index = Array('vtiger_crmentity'=>'crmid','vtiger_assetreport'=>'assetreportid');
	/**
	 * Mandatory table for supporting custom fields.
	 */
	var $customFieldTable = Array();

	var $entity_table = "vtiger_crmentity";
	
	var $column_fields = Array();

	//var $sortby_fields = Array('lastname','firstname','title','email','phone','smownerid','accountname');
	var $sortby_fields = Array('symbol','title','leverage','acc_type','visible');

	var $list_link_field= 'symbol';

	// This is the list of vtiger_fields that are in the lists.
	var $list_fields = Array(
	'Web Name' => Array('assetreport'=>'symbol'),
	'Title' => Array('assetreport'=>'title'),
	'Leverage' => Array('assetreport'=>'leverage'),
	'Account Type' => Array('assetreport'=>'acc_type'),
	'Visible' => Array('assetreport'=>'visible')
	);


	var $range_fields = Array();


	var $list_fields_name = Array(
	'Web Name' => 'symbol',
	'Title' => 'title',
	'Leverage' => 'leverage',
	'Account Type' => 'acc_type',
	'Visible' => 'visible'
	);

	var $search_fields = Array(
	'Web Name' => Array('assetreport'=>'symbol'),
	'Title' => Array('assetreport'=>'title'),
	'Leverage' => Array('assetreport'=>'leverage'),
	'Account Type' => Array('assetreport'=>'acc_type'),
	'Visible' => Array('assetreport'=>'visible'),
		);

	var $search_fields_name = Array(
	'Web Name' => 'symbol',
	'Title' => 'title',
	'Leverage' => 'leverage',
	'Account Type' => 'acc_type',
	'Visible' => 'visible'
	);

	// This is the list of vtiger_fields that are required
	var $required_fields =  array("symbol"=>1);

	// Used when enabling/disabling the mandatory fields for the module.
	// Refers to vtiger_field.fieldname values.
	var $mandatory_fields = Array();

	//Default Fields for Email Templates -- Pavani
	var $emailTemplate_defaultFields = array('firstname','lastname','salutation','title','email','department','phone','mobile','support_start_date','support_end_date');

	//Added these variables which are used as default order by and sortorder in ListView
	var $default_order_by = 'symbol';
	var $default_sort_order = 'ASC';

	// For Alphabetical search
	var $def_basicsearch_col = 'symbol';

	var $related_module_table_index = array();

	function assetreport() {
		$this->log = LoggerManager::getLogger('assetreport');
		$this->db = PearDatabase::getInstance();
		
		//$this->db->setDebug(true);
		
		$this->column_fields = getColumnFields('assetreport');
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


