select vtiger_deposit.*,vtiger_mt4trade.* from vtiger_deposit 
left join vtiger_mt4trade ON vtiger_mt4trade.ticket= vtiger_deposit.ticket   
left join vtiger_crmentity ON vtiger_crmentity.crmid= vtiger_deposit.depositid   
where vtiger_deposit.ticket!="" and vtiger_mt4trade.del_i=0 and vtiger_crmentity.deleted=0


SELECT vtiger_crmentityrel.* FROM `vtiger_mt4account` 
left join vtiger_crmentityrel ON vtiger_crmentityrel.relcrmid= vtiger_mt4account.mt4accountid 
where vtiger_mt4account.loginid=1331776548 and 	vtiger_crmentityrel.relmodule="mt4account" and vtiger_crmentityrel.module="Contacts"