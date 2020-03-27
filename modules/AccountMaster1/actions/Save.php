<?php

/* +***********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.0
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 * *********************************************************************************** */

class AccountMaster_Save_Action extends Vtiger_Save_Action {

	public function process(Vtiger_Request $request) {
		
		//echo "Countries_Save_Action";
		//exit();
		
		//To stop saveing the value of salutation as '--None--'
		$salutationType = $request->get('web_name');
		if ($salutationType === '--None--') {
			$request->set('web_name', '');
		}
		parent::process($request);
	}
}
