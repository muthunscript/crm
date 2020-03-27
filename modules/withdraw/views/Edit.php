<?php

/* +***********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.0
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 * *********************************************************************************** */

 
class Withdraw_Edit_View extends Vtiger_Edit_View {
	
	public function process(Vtiger_Request $request) {
	
	
	
		$moduleName = $request->getModule();
		$recordId = $request->get('record');
		$recordModel = $this->record;
		
		
		
		if(!$recordModel){
			if (!empty($recordId)) {
				
				//echo "if...........";
				
				$recordModel = Vtiger_Record_Model::getInstanceById($recordId, $moduleName);
				
				
				
			} else {
				
				//echo "else...........";
				
				$recordModel = Vtiger_Record_Model::getCleanInstance($moduleName);
			}
			
			
			
			$this->record = $recordModel;
		}
		
		
		
		
		$viewer = $this->getViewer($request);
		
		//echo var_dump($recordModel);
		//exit();
		
		
		
		

		$salutationFieldModel = Vtiger_Field_Model::getInstance('name', $recordModel->getModule());
		
		
		//echo "process2.............";
		//exit();
		
		//echo var_dump($salutationFieldModel);
		
		
		
		
		
		// Fix for http://trac.vtiger.com/cgi-bin/trac.cgi/ticket/7851
		$salutationType = $request->get('name');
		
		//echo var_dump($salutationType);
		
		//exit();
		
		
		if(!empty($salutationType)){
			$salutationFieldModel->set('fieldvalue', $request->get('name'));
		} else {
			$salutationFieldModel->set('fieldvalue', $recordModel->get('name')); 
		}
		$viewer->assign('SALUTATION_FIELD_MODEL', $salutationFieldModel);
		parent::process($request);
	}

	
	
}
