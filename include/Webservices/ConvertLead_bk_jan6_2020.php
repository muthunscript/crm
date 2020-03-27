<?php
/* +*******************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.0
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 ******************************************************************************** */

require_once 'include/Webservices/Retrieve.php';
require_once 'include/Webservices/Create.php';
require_once 'include/Webservices/Delete.php';
require_once 'include/Webservices/DescribeObject.php';
require_once 'includes/Loader.php';
vimport ('includes.runtime.Globals');
vimport ('includes.runtime.BaseModel');

function vtws_convertlead($entityvalues, $user) {
	
	//echo var_dump($entityvalues);
	//echo var_dump($user);
	//exit();

	global $adb, $log;
	if (empty($entityvalues['assignedTo'])) {
		$entityvalues['assignedTo'] = vtws_getWebserviceEntityId('Users', $user->id);
	}
	if (empty($entityvalues['transferRelatedRecordsTo'])) {
		$entityvalues['transferRelatedRecordsTo'] = 'Contacts';
	}
	$activeAdminUser = Users::getActiveAdminUser();

	$leadObject = VtigerWebserviceObject::fromName($adb, 'Leads');
	$handlerPath = $leadObject->getHandlerPath();
	$handlerClass = $leadObject->getHandlerClass();

	require_once $handlerPath;

	$leadHandler = new $handlerClass($leadObject, $activeAdminUser, $adb, $log);


	$leadInfo = vtws_retrieve($entityvalues['leadId'], $activeAdminUser);
	$sql = "select converted from vtiger_leaddetails where converted = 1 and leadid=?";
	$leadIdComponents = vtws_getIdComponents($entityvalues['leadId']);
	$result = $adb->pquery($sql, array($leadIdComponents[1]));
	if ($result === false) {
		throw new WebServiceException(WebServiceErrorCode::$DATABASEQUERYERROR,
				vtws_getWebserviceTranslatedString('LBL_' .
						WebServiceErrorCode::$DATABASEQUERYERROR));
	}
	$rowCount = $adb->num_rows($result);
	if ($rowCount > 0) {
		throw new WebServiceException(WebServiceErrorCode::$LEAD_ALREADY_CONVERTED,
				"Lead is already converted");
	}

	$leadHasImage = false;
	if($leadInfo['imagename'] && $entityvalues['imageAttachmentId']) {
		$leadHasImage = true;
		$imageAttachmentId = $entityvalues['imageAttachmentId'];
	}
	$entityIds = array();

	$availableModules = array('Accounts', 'Contacts', 'Potentials');

	if (!(($entityvalues['entities']['Accounts']['create']) || ($entityvalues['entities']['Contacts']['create']))) {
		return null;
	}

	$quoteIds = array();
	$leadId = explode('x', $leadInfo['id']);
	$getQuote = 'SELECT quoteid from vtiger_quotes where contactid=?';
	$results = $adb->pquery($getQuote, array($leadId[1]));
	$count = $adb->num_rows($results);
	if($count > 0){
		for($i=0; $i < $count; $i++){
			$quoteIds[] = $adb->query_result($results, $i, 'quoteid');
		}
	}

	foreach ($availableModules as $entityName) {
		if ($entityvalues['entities'][$entityName]['create']) {
			$entityvalue = $entityvalues['entities'][$entityName];
			$entityObject = VtigerWebserviceObject::fromName($adb, $entityvalue['name']);
			$handlerPath = $entityObject->getHandlerPath();
			$handlerClass = $entityObject->getHandlerClass();

			require_once $handlerPath;

			$entityHandler = new $handlerClass($entityObject, $activeAdminUser, $adb, $log);

			$entityObjectValues = array();
			$entityObjectValues['assigned_user_id'] = $entityvalues['assignedTo'];
			$entityObjectValues = vtws_populateConvertLeadEntities($entityvalue, $entityObjectValues, $entityHandler, $leadHandler, $leadInfo);

			//update potential related to property
			if ($entityvalue['name'] == 'Potentials') {
				if (!empty($entityIds['Accounts'])) {
					$entityObjectValues['related_to'] = $entityIds['Accounts'];
				}
				if (!empty($entityIds['Contacts'])) {
					$entityObjectValues['contact_id'] = $entityIds['Contacts'];
				}
			}

			//update the contacts relation
			if ($entityvalue['name'] == 'Contacts') {
				if (!empty($entityIds['Accounts'])) {
					$entityObjectValues['account_id'] = $entityIds['Accounts'];
				}
			}

			try {
				$create = true;
				if ($entityvalue['name'] == 'Accounts') {
					$sql = "SELECT vtiger_account.accountid FROM vtiger_account,vtiger_crmentity WHERE vtiger_crmentity.crmid=vtiger_account.accountid AND vtiger_account.accountname=? AND vtiger_crmentity.deleted=0";
					$result = $adb->pquery($sql, array($entityvalue['accountname']));
					if ($adb->num_rows($result) > 0) {
						$entityIds[$entityName] = vtws_getWebserviceEntityId('Accounts', $adb->query_result($result, 0, 'accountid'));
						$create = false;
					}
				}
				if ($create) {
					$entityObjectValues['imagename'] = '';
					if(($leadHasImage) && ((($entityName == 'Contacts') || ($entityName == 'Accounts' && !$entityvalues['entities']['Contacts']['create'])))) {
						$imageName = $adb->query_result($adb->pquery('SELECT name FROM vtiger_attachments 
							WHERE attachmentsid = ?',array($imageAttachmentId)),0,'name');
						$entityObjectValues['imagename'] = $imageName;
					}
					$entityObjectValues['isconvertedfromlead'] = 1;
					$entityRecord = vtws_create($entityvalue['name'], $entityObjectValues, $activeAdminUser);
					$entityIds[$entityName] = $entityRecord['id'];
					if($leadHasImage && in_array($entityName,array('Accounts','Contacts'))) {
						$idComponents = explode('x',$entityIds[$entityName]);
						$crmId = $idComponents[1];
						$adb->pquery('UPDATE vtiger_seattachmentsrel SET crmid = ? WHERE attachmentsid = ?',array($crmId,$imageAttachmentId));
						$adb->pquery('UPDATE vtiger_crmentity SET setype = ? WHERE crmid = ?',array($entityName.' Image',$imageAttachmentId));
					}
				}
			} catch (DuplicateException $e) {
				throw $e;
			} catch (Exception $e) {
				throw new WebServiceException(WebServiceErrorCode::$UNKNOWNOPERATION,
						$e->getMessage().' : '.$entityvalue['name']);
			}
		}
	}


	try {
		$accountIdComponents = vtws_getIdComponents($entityIds['Accounts']);
		$accountId = $accountIdComponents[1];

		$contactIdComponents = vtws_getIdComponents($entityIds['Contacts']);
		$contactId = $contactIdComponents[1];

		if(!empty($entityIds['Potentials'])){
			$potentialIdComponents = vtws_getIdComponents($entityIds['Potentials']);
			$potentialId = $potentialIdComponents[1];
		}

		if (!empty($accountId) && !empty($contactId) && !empty($potentialId)) {
			$sql = "insert into vtiger_contpotentialrel values(?,?)";
			$result = $adb->pquery($sql, array($contactId, $potentialId));
			if ($result === false) {
				throw new WebServiceException(WebServiceErrorCode::$FAILED_TO_CREATE_RELATION,
						"Failed to related Contact with the Potential");
			}
		}
		if($quoteIds){
			$queryUpdate = 'UPDATE vtiger_quotes SET contactid=?, potentialid=? WHERE quoteid IN('. generateQuestionMarks($quoteIds).') ';
			$adb->pquery($queryUpdate, array($contactId, $potentialId, $quoteIds));

			if($accountId){
				$queryUpdate = 'UPDATE vtiger_quotes SET accountid=? WHERE quoteid IN('. generateQuestionMarks($quoteIds).')';
				$adb->pquery($queryUpdate, array($accountId, $quoteIds));
			}
		}
		$transfered = vtws_convertLeadTransferHandler($leadIdComponents, $entityIds, $entityvalues);

		$relatedIdComponents = vtws_getIdComponents($entityIds[$entityvalues['transferRelatedRecordsTo']]);
		vtws_getRelatedActivities($leadIdComponents[1], $accountId, $contactId, $relatedIdComponents[1]);
		vtws_updateConvertLeadStatus($entityIds, $entityvalues['leadId'], $entityvalues['accountnewId'], $user);//accountnewId
	} catch (Exception $e) {
		foreach ($entityIds as $entity => $id) {
			vtws_delete($id, $user);
		}
		return null;
	}

	$leadId = explode("x",$entityvalues['leadId']);
	if($leadId[1]) {
		$em = new VTEventsManager($adb);
		$em->initTriggerCache();

		$entityData = VTEntityData::fromEntityId($adb, $leadId[1], 'Leads');
		$entityData->entityIds = $entityIds;
		$entityData->transferRelatedRecordsTo = $entityvalues['transferRelatedRecordsTo'];

		$em->triggerEvent('vtiger.lead.convertlead', $entityData);
	}

	return $entityIds;
}

/*
 * populate the entity fields with the lead info.
 * if mandatory field is not provided populate with '????'
 * returns the entity array.
 */

function vtws_populateConvertLeadEntities($entityvalue, $entity, $entityHandler, $leadHandler, $leadinfo) {
	global $adb, $log;
	$column;
	$entityName = $entityvalue['name'];
	$sql = "SELECT * FROM vtiger_convertleadmapping";
	$result = $adb->pquery($sql, array());
	if ($adb->num_rows($result)) {
		switch ($entityName) {
			case 'Accounts':$column = 'accountfid';
				break;
			case 'Contacts':$column = 'contactfid';
				break;
			case 'Potentials':$column = 'potentialfid';
				break;
			default:$column = 'leadfid';
				break;
		}

		$leadFields = $leadHandler->getMeta()->getModuleFields();
		$entityFields = $entityHandler->getMeta()->getModuleFields();
		$row = $adb->fetch_array($result);
		$count = 1;
		do {
			$entityField = vtws_getFieldfromFieldId($row[$column], $entityFields);
			if ($entityField == null) {
				//user doesn't have access so continue.TODO update even if user doesn't have access
				continue;
			}
			$leadField = vtws_getFieldfromFieldId($row['leadfid'], $leadFields);
			if ($leadField == null) {
				//user doesn't have access so continue.TODO update even if user doesn't have access
				continue;
			}
			$leadFieldName = $leadField->getFieldName();
			$entityFieldName = $entityField->getFieldName();
			$entity[$entityFieldName] = $leadinfo[$leadFieldName];
			$count++;
		} while ($row = $adb->fetch_array($result));

		foreach ($entityFields as $fieldName=>$fieldModel) {
			if(!empty($entityFields[$fieldName]) && $fieldModel->getDefault() && $fieldName !='isconvertedfromlead') {
				if(!isset($entityvalue[$fieldName]) && empty($entity[$fieldName])) {
					$entityvalue[$fieldName] = $fieldModel->getDefault();
				}
			}
		}

		foreach ($entityvalue as $fieldname => $fieldvalue) {
			if (!empty($fieldvalue)) {
				$entity[$fieldname] = $fieldvalue;
			}
		}

		$entity = vtws_validateConvertEntityMandatoryValues($entity, $entityHandler, $entityName);
	}
	return $entity;
}

//function to handle the transferring of related records for lead
function vtws_convertLeadTransferHandler($leadIdComponents, $entityIds, $entityvalues) {

	try {
		$entityidComponents = vtws_getIdComponents($entityIds[$entityvalues['transferRelatedRecordsTo']]);
		vtws_transferLeadRelatedRecords($leadIdComponents[1], $entityidComponents[1], $entityvalues['transferRelatedRecordsTo']);
	} catch (Exception $e) {
		return false;
	}

	return true;
}

function vtws_updateConvertLeadStatus($entityIds, $leadId, $accountnewId, $user) {
	global $adb, $log;
	$leadIdComponents = vtws_getIdComponents($leadId);
	$accountnewIdComponents = vtws_getIdComponents($accountnewId);
	
//	echo var_dump($accountnewIdComponents);
//	exit();
	
	if ($entityIds['Accounts'] != '' || $entityIds['Contacts'] != '') {
		$sql = "UPDATE vtiger_leaddetails SET converted = 1 where leadid=?";
		$result = $adb->pquery($sql, array($leadIdComponents[1]));
		if ($result === false) {
			throw new WebServiceException(WebServiceErrorCode::$FAILED_TO_MARK_CONVERTED,
					"Failed mark lead converted");
		}
		else
		{
			
			/********Mt4 account start*******/
		
				$log->info("vtiger_mt4account enter");		
	
				$lead_data="select vtiger_crmentity.*,vtiger_leaddetails.*,vtiger_leadaddress.* from vtiger_crmentity left join vtiger_leadaddress ON vtiger_leadaddress.leadaddressid= vtiger_crmentity.crmid left join vtiger_leaddetails ON vtiger_leaddetails.leadid= vtiger_crmentity.crmid where vtiger_crmentity.crmid=?";
				
				$lead_data = $adb->pquery($lead_data, array($leadIdComponents[1]));
				$lead_data=$adb->fetch_array($lead_data);
				
				$log->info("lead data $lead_data");
				
				
				$passsword = valid_pwd1(11);
				$ph_passsword = valid_pwd1(7); //rand(123456,999999);
				$investor_pwd = valid_pwd1(11);
			
				
				
			
				$sql = 'SELECT * from vtiger_accountnew where accountnewid=?';

				$account_master = $adb->pquery($sql, array($accountnewIdComponents[1]));

				$account_master=$adb->fetch_array($account_master);


				$group = $account_master['title'];
				//$group = "test";

				$master = 'junior';
				$comment = "Live account Online ^" . $u['type_of_account'];
				$type = $account_master['title'];
				$status = 'k';
				//$login=10000003;
				$login=get_mt4_series();
				$name=$lead_data['firstname']." ".$lead_data['lastname'];
				$email=$lead_data['email'];
				$agent=$lead_data['firstname']." ".$lead_data['lastname'];//affiliate name
				$country=$lead_data['country'];
				$state=$lead_data['state'];
				$city=$lead_data['city'];
				$address=$lead_data['lane'];
				$phone=$lead_data['phone'];
				$zipcode=$lead_data['code'];
				$id="";
				$leverage="100";


				$response =open_account($group, $name, $passsword, $email, $agent, $country, $state, $city, $address, $phone, $ph_passsword, $status, $zipcode, $id, $leverage, $comment, $investor_pwd, $login = '');
				
				
		$log->info("mt4 response $response");
			
			if (strpos($response, 'OK') !== false)
			{
				$log->info("vtiger_mt4account start");
				
				$current_id = $adb->getUniqueID("vtiger_crmentity");
				
				$log->info("vtiger_crmentity getUniqueID $current_id");
				
				$f = explode_string('=', $response);
				$login_id = $f[1];
				
				$date_var = date("Y-m-d H:i:s");
				
			$sql1 = "INSERT INTO vtiger_crmentity (crmid,setype,createdtime,modifiedtime) VALUES (?, ?, ?, ?)";
			$params1 = array($current_id, 'mt4account', $adb->formatDate($date_var, true), $adb->formatDate($date_var, true));
			$adb->pquery($sql1, $params1);
			
			$log->info($sql1);
			$log->info($params1);
			
			//vtiger_mt4account
			
			$sql2 = "INSERT INTO `vtiger_mt4account` (`mt4accountid`, `loginid`, `response`, `pri_mary`, `password`, `investor_password`, `accountnewid`, `leverage`, `acc_type`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
			
			$params2 = array($current_id, $login_id, '1', '1', $passsword, $investor_pwd, $accountnewId,'100','Live');
			$adb->pquery($sql2, $params2);
			
			$log->info($sql2);
			$log->info($params2);
			
			
			$sql3 = "INSERT INTO `vtiger_crmentityrel` (`crmid`, `module`, `relcrmid`, `relmodule`) VALUES (?, ?, ?, ?)";
			
			$params3 = array($leadId, 'Leads', $current_id, 'mt4account');
			$adb->pquery($sql3, $params3);
			
			$log->info($sql3);
			$log->info($params3);
			
			$log->info("vtiger_mt4account end");
			
			
			
			}
			
			   
			
			
		
			
			
			/********Mt4 account end*******/
		}
		//updating the campaign-lead relation --Minnie
		$sql = "DELETE FROM vtiger_campaignleadrel WHERE leadid=?";
		$adb->pquery($sql, array($leadIdComponents[1]));

		$sql = "DELETE FROM vtiger_tracker WHERE item_id=?";
		$adb->pquery($sql, array($leadIdComponents[1]));

		//update the modifiedtime and modified by information for the record
		$leadModifiedTime = $adb->formatDate(date('Y-m-d H:i:s'), true);
		$crmentityUpdateSql = "UPDATE vtiger_crmentity SET modifiedtime=?, modifiedby=? WHERE crmid=?";
		$adb->pquery($crmentityUpdateSql, array($leadModifiedTime, $user->id, $leadIdComponents[1]));
	}

}

?>
