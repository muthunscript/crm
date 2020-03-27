C:\xampp\htdocs\vtigercrm7\layouts\v7\modules\Vtiger
http://20.0.0.139/vtigercrm7/index.php?module=newModule&view=List&viewname=&app=MARKETING


C:\xampp\htdocs\vtigercrm7\data\CRMEntity.php


INSERT INTO `vtiger_tab` (`tabid`, `name`, `presence`, `tabsequence`, `tablabel`, `modifiedby`, `modifiedtime`, `customized`, `ownedby`, `isentitytype`, `trial`, `version`, `parent`, `source`, `issyncable`, `allowduplicates`, `sync_action_for_duplicates`) VALUES ('51', 'newModule', '1', '51', 'newModule', NULL, NULL, '0', '0', '1', '0', '0', '', '', '0', '1', '1');

INSERT INTO `vtiger_parenttab` (`parenttabid`, `parenttab_label`, `sequence`, `visible`) VALUES(9, 'newModule', 9, 0);

INSERT INTO `vtiger_parenttabrel` (`parenttabid`, `tabid`, `sequence`) VALUES(9, 51, 1);



/******************/




INSERT INTO `vtiger_tab` (`tabid`, `name`, `presence`, `tabsequence`, `tablabel`, `modifiedby`, `modifiedtime`, `customized`, `ownedby`, `isentitytype`, `trial`, `version`, `parent`, `source`, `issyncable`, `allowduplicates`, `sync_action_for_duplicates`) VALUES ('52', 'countries', '1', '52', 'countries', NULL, NULL, '0', '0', '1', '0', '0', '', '', '0', '1', '1');

INSERT INTO `vtiger_parenttab` (`parenttabid`, `parenttab_label`, `sequence`, `visible`) VALUES(10, 'countries', 10, 0);

INSERT INTO `vtiger_parenttabrel` (`parenttabid`, `tabid`, `sequence`) VALUES(10, 52, 1);