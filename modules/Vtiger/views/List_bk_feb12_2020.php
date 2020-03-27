<?php
/*+**********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.1
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 ************************************************************************************/

class Vtiger_List_View extends Vtiger_Index_View {
	protected $listViewEntries = false;
	protected $listViewCount = false;
	protected $listViewLinks = false;
	protected $listViewHeaders = false;
	protected $noOfEntries = false;
	protected $pagingModel = false;
	protected $listViewModel = false;
	function __construct() {
		parent::__construct();
	}
	
	public function requiresPermission(Vtiger_Request $request){
		$permissions = parent::requiresPermission($request);
		
		$permissions[] = array('module_parameter' => 'module', 'action' => 'DetailView');
		return $permissions;
	}

	function preProcess(Vtiger_Request $request, $display=true) {
		parent::preProcess($request, false);

		$moduleName = $request->getModule();
		$customView = new CustomView();
		if($customView->isPermittedCustomView($request->get('viewname'), 'List', $moduleName) != 'yes') {
			$viewName = $customView->getViewIdByName('All', $moduleName);
			$request->set('viewname', $viewName);
			$_REQUEST['viewname'] = $viewName;
		}

		$viewer = $this->getViewer($request);
		$cvId = $this->viewName;

		if(!$cvId) {
			$customView = new CustomView();
			$cvId = $customView->getViewId($moduleName);
		}
		$listHeaders = $request->get('list_headers', array());
		$tag = $request->get('tag');

		$listViewSessionKey = $moduleName.'_'.$cvId;
		if(!empty($tag)) {
			$listViewSessionKey .='_'.$tag;
		}

		$orderParams = Vtiger_ListView_Model::getSortParamsSession($listViewSessionKey);

		if(empty($listHeaders)) {
			$listHeaders = $orderParams['list_headers'];
		}

		$this->listViewModel = Vtiger_ListView_Model::getInstance($moduleName, $cvId, $listHeaders);
		$linkParams = array('MODULE'=>$moduleName, 'ACTION'=>$request->get('view'));
		$viewer->assign('CUSTOM_VIEWS', CustomView_Record_Model::getAllByGroup($moduleName));
		$this->viewName = $request->get('viewname');
		if(empty($this->viewName)){
			//If not view name exits then get it from custom view
			//This can return default view id or view id present in session
			$customView = new CustomView();
			$this->viewName = $customView->getViewId($moduleName);
		}

		$quickLinkModels = $this->listViewModel->getSideBarLinks($linkParams);
		$viewer->assign('QUICK_LINKS', $quickLinkModels);
		$this->initializeListViewContents($request, $viewer);
		$viewer->assign('VIEWID', $this->viewName);
		$moduleModel = Vtiger_Module_Model::getInstance($moduleName);
		$viewer->assign('MODULE_MODEL', $moduleModel);

		if($display) {
			$this->preProcessDisplay($request);
		}
	}

	function preProcessTplName(Vtiger_Request $request) {
		return 'ListViewPreProcess.tpl';
	}

	//Note : To get the right hook for immediate parent in PHP,
	// specially in case of deep hierarchy
	/*function preProcessParentTplName(Vtiger_Request $request) {
		return parent::preProcessTplName($request);
	}*/

	protected function preProcessDisplay(Vtiger_Request $request) {
		parent::preProcessDisplay($request);
	}


	function process (Vtiger_Request $request) {
		
		global $log;
		
		$viewer = $this->getViewer ($request);
		$moduleName = $request->getModule();
		$moduleModel = Vtiger_Module_Model::getInstance($moduleName);
		$viewName = $request->get('viewname');
		if(!empty($viewName)) {
			$this->viewName = $viewName;
		}

		
		
		$this->initializeListViewContents($request, $viewer);
		$this->assignCustomViews($request,$viewer);
		$viewer->assign('VIEW', $request->get('view'));
		$viewer->assign('MODULE_MODEL', $moduleModel);
		$viewer->assign('RECORD_ACTIONS', $this->getRecordActionsFromModule($moduleModel));
		$viewer->assign('CURRENT_USER_MODEL', Users_Record_Model::getCurrentUserModel());
		
		if($moduleName=="mt4report")
		{
			$loginid=$request->get('loginid');
		
		    if($loginid!="" && $loginid!=0)
			{
				
					$kola=withdraw_history($loginid);
					$log->info("withdraw_history list ".json_encode($kola));
					
					$_mt_user=array_shift(mt4_users($loginid));
					
					
					//Array ( [0] => 1331776130 [login] => 1331776130 [1] => test [group] => test [2] => 1 [enable] => 1 [3] => 0 [enable_change_pass] => 0 [4] => 0 [enable_readonly] => 0 [5] => 0 [enable_otp] => 0 [6] => [password_phone] => [7] => last l [name] => last l [8] => india [country] => india [9] => chennai [city] => chennai [10] => tamil nadu [state] => tamil nadu [11] => [zipcode] => [12] => [address] => [13] => [lead_source] => [14] => 9089787878 [phone] => 9089787878 [15] => lavanya+9000@nscript.in [email] => lavanya+9000@nscript.in [16] => [comment] => [17] => [id] => [18] => [status] => [19] => 2020-01-23 07:06:56 [regdate] => 2020-01-23 07:06:56 [20] => 2020-01-23 07:06:56 [lastdate] => 2020-01-23 07:06:56 [21] => 100 [leverage] => 100 [22] => 0 [agent_account] => 0 [23] => 1580709993 [timestamp] => 1580709993 [24] => 47 [balance] => 47 [25] => 0 [prevmonthbalance] => 0 [26] => 50 [prevbalance] => 50 [27] => 0 [credit] => 0 [28] => 0 [interestrate] => 0 [29] => 0 [taxes] => 0 [30] => 0 [send_reports] => 0 [31] => 0 [mqid] => 0 [32] => 0 [user_color] => 0 [33] => 47 [equity] => 47 [34] => 0 [margin] => 0 [35] => 0 [margin_level] => 0 [36] => 47 [margin_free] => 47 [37] => USD [currency] => USD [38] => [api_data] => [39] => 2020-02-05 07:50:18 [modify_time] => 2020-02-05 07:50:18 )
					
					
					$log->info("mt4_users list ".json_encode($_mt_user));
				
					
					//array(26) { [0]=> string(6) "259149" ["ticket"]=> string(6) "259149" [1]=> string(10) "1331776130" ["login"]=> string(10) "1331776130" [2]=> string(0) "" ["symbol"]=> string(0) "" [3]=> string(1) "6" ["cmd"]=> string(1) "6" [4]=> string(1) "1" ["volume"]=> string(1) "1" [5]=> string(19) "2020-02-03 06:05:49" ["open_time"]=> string(19) "2020-02-03 06:05:49" [6]=> string(1) "0" ["open_price"]=> string(1) "0" [7]=> string(1) "0" ["sl"]=> string(1) "0" [8]=> string(1) "0" ["tp"]=> string(1) "0" [9]=> string(19) "2020-02-03 06:05:49" ["close_time"]=> string(19) "2020-02-03 06:05:49" [10]=> string(1) "0" ["close_price"]=> string(1) "0" [11]=> string(2) "20" ["profit"]=> string(2) "20" [12]=> string(2) "ok" ["comment"]=> string(2) "ok" }
					
					$open_orders = array_filter($kola,function($v){ if($v[0]["close_time"]=='1970-01-01 00:00:00' && ($v[0]["cmd"] == 0 || $v[0]["cmd"] == 1)){return TRUE; }else{return FALSE; } });
					$close_orders = array_filter($kola,function($v){ if($v[0]["close_time"]!='1970-01-01 00:00:00' && ($v[0]["cmd"] == 0 || $v[0]["cmd"] == 1)){return TRUE; }else{return FALSE; } });
					$deposit = array_filter($kola,function($v){ if($v[0]["profit"]>0 && $v[0]["cmd"] == 6 ){ return TRUE; }else{ return FALSE; } });
					$withadraw = array_filter($kola,function($v){ if($v[0]["profit"]<0 && $v[0]["cmd"] == 6 ){return TRUE; }else{return FALSE; } });
					
				
					$orders_by_symbol = group_array($close_orders,"SYMBOL");
					
					$today = strtotime('12:00:00');
					$today24 = $today - (24 * 60 * 60);
					$grouped = Array();
					$grouped_lot = Array();
					$grouped_number = Array();
					$grouped_sym = Array();
					$grouped_sym_n = Array();
					$pnl = Array();

					for($i=0;$i<15;$i++){
						$grouped[$i] = Array(); $grouped_lot[$i] = Array(0,0,date("d/m",$today24)); $grouped_number[$i] = Array(0,0,date("d/m",$today24));
						foreach($close_orders as $close_orders_t){
							if(strtotime($close_orders_t[0]["close_time"])<$today && strtotime($close_orders_t[0]["close_time"])>$today24){
								array_push($grouped[$i],$close_orders_t);
								$te1 = $grouped_lot[$i][1] + $close_orders_t[0]["volume"];
								$te2 = $grouped_number[$i][1] + 1;
								$grouped_lot[$i] = Array($i,$te1,date("d/m",$today24));
								$grouped_number[$i] =  Array($i,$te2,date("d/m",$today24));
							}
						}
						$today = $today24 ;
						$today24 = $today24 - (24 * 60 * 60);
					}
					$pnl[0] = Array("id"=>0,"day"=>0,"profit"=>0);
					$pnlmax = 0; $pnlmin = 0; $pnlfinal=0;
					foreach($close_orders as $close_orders_t){
							$grouped_sym[$close_orders_t[0]["symbol"]] = $close_orders_t;
							if(!array_key_exists($close_orders_t[0]["symbol"],$grouped_sym_n)){ $grouped_sym_n[$close_orders_t[0]["symbol"]] = 0; }  
							$grouped_sym_n[$close_orders_t[0]["symbol"]]++;
							if($close_orders_t[0]["profit"]>$pnlmax){ $pnlmax = $close_orders_t[0]["profit"]; }
							if($close_orders_t[0]["profit"]<$pnlmin){ $pnlmin = $close_orders_t[0]["profit"]; }
							$pnlfinal += $close_orders_t[0]["profit"];
							array_push($pnl,Array("id"=>sizeof($pnl),"day"=>sizeof($pnl),"profit"=>$pnl[sizeof($pnl)-1]["profit"]+$close_orders_t[0]["profit"]));
						}


						
						$m = Array();
						foreach($grouped_sym_n as $key=>$value){
							array_push($m,Array($key,$value));
						}
						
						//echo json_encode($pnl);
						//exit();
						

					$demosit_arr = Array(); $totaldep = 0;
					foreach($deposit as $deposit_t){
						//array_push($demosit_arr,Array("id"=>$deposit_t[0]["ticket"],"data"=>Array($deposit_t[0]["ticket"],$deposit_t[0]["profit"],$deposit_t[0]["comment"],$deposit_t[0]["close_time"])));
						
						array_push($demosit_arr,Array($deposit_t[0]["ticket"],$deposit_t[0]["profit"],$deposit_t[0]["comment"],$deposit_t[0]["close_time"]));
						
						$totaldep += $deposit_t[0]["profit"]; 
						}
						
						
						
					//$demosit_arr = Array("rows"=>$demosit_arr);

					$with_arr = Array();  $totalwith = 0;
					foreach($withadraw as $withadraw_t){
						
						
						
						//array_push($with_arr,Array("id"=>$withadraw_t[0]["ticket"],"data"=>Array($withadraw_t[0]["ticket"],$withadraw_t[0]["profit"],$withadraw_t[0]["comment"],$withadraw_t[0]["close_time"])));
						
						array_push($with_arr,Array($withadraw_t[0]["ticket"],$withadraw_t[0]["profit"],$withadraw_t[0]["comment"],$withadraw_t[0]["close_time"]));
						
						$totalwith += $withadraw_t[0]["profit"];
					}
					//$with_arr = Array("rows"=>$with_arr);
					
					
					

					$open_arr = Array();
					foreach($open_orders as $open_orders_t){
						//array_push($open_arr,Array("id"=>$open_orders_t[0]["ticket"],"data"=>Array($open_orders_t[0]["ticket"],$open_orders_t[0]["symbol"],$open_orders_t[0]["open_price"],$open_orders_t[0]["open_time"],$open_orders_t[0]["profit"])));
						
						array_push($open_arr,Array($open_orders_t[0]["ticket"],$open_orders_t[0]["symbol"],$open_orders_t[0]["open_price"],$open_orders_t[0]["open_time"],$open_orders_t[0]["profit"]));
					}
					//$open_arr = Array("rows"=>$open_arr);

					$close_arr = Array();
					foreach($close_orders as $open_orders_t){
						//array_push($close_arr,Array("id"=>$open_orders_t[0]["ticket"],"data"=>Array($open_orders_t[0]["ticket"],$open_orders_t[0]["symbol"],$open_orders_t[0]["open_price"],$open_orders_t[0]["open_time"],$open_orders_t[0]["profit"])));
						
						array_push($close_arr,Array($open_orders_t[0]["ticket"],$open_orders_t[0]["symbol"],$open_orders_t[0]["open_price"],$open_orders_t[0]["open_time"],$open_orders_t[0]["profit"]));
					}
					//$close_arr = Array("rows"=>$close_arr);
					
					/*
					[[{"0":"1331776130","login":"1331776130","1":"test","group":"test","2":"1","enable":"1","3":"0","enable_change_pass":"0","4":"0","enable_readonly":"0","5":"0","enable_otp":"0","6":"","password_phone":"","7":"last l","name":"last l","8":"india","country":"india","9":"chennai","city":"chennai","10":"tamil nadu","state":"tamil nadu","11":"","zipcode":"","12":"","address":"","13":"","lead_source":"","14":"9089787878","phone":"9089787878","15":"lavanya+9000@nscript.in","email":"lavanya+9000@nscript.in","16":"","comment":"","17":"","id":"","18":"","status":"","19":"2020-01-23 07:06:56","regdate":"2020-01-23 07:06:56","20":"2020-01-23 07:06:56","lastdate":"2020-01-23 07:06:56","21":"100","leverage":"100","22":"0","agent_account":"0","23":"1580709993","timestamp":"1580709993","24":"47","balance":"47","25":"0","prevmonthbalance":"0","26":"50","prevbalance":"50","27":"0","credit":"0","28":"0","interestrate":"0","29":"0","taxes":"0","30":"0","send_reports":"0","31":"0","mqid":"0","32":"0","user_color":"0","33":"47","equity":"47","34":"0","margin":"0","35":"0","margin_level":"0","36":"47","margin_free":"47","37":"USD","currency":"USD","38":"\u0000\u0000\u0000\u0000\u0000\u0000\u0000\u0000\u0000\u0000\u0000\u0000\u0000\u0000\u0000\u0000","api_data":"\u0000\u0000\u0000\u0000\u0000\u0000\u0000\u0000\u0000\u0000\u0000\u0000\u0000\u0000\u0000\u0000","39":"2020-02-05 07:50:18","modify_time":"2020-02-05 07:50:18"}]]
					*/
					
					
					$viewer->assign('DEPOSIT_DATA', $demosit_arr);
					$viewer->assign('WITHDRAW_DATA', $with_arr);
					$viewer->assign('OPEN_DATA', $open_arr);
					$viewer->assign('CLOSE_DATA', $close_arr);
					$viewer->assign('MT_USER', $_mt_user);
					$viewer->assign('PNLFINAL', $pnlfinal);
					$viewer->assign('TOTALDEP', $totaldep);
					
				
			}
			
			
			
			
		}
		
		$viewer->view('ListViewContents.tpl', $moduleName);
	}

	function postProcess(Vtiger_Request $request) {
		$viewer = $this->getViewer ($request);
		$moduleName = $request->getModule();

		$viewer->view('ListViewPostProcess.tpl', $moduleName);
		parent::postProcess($request);
	}

	/**
	 * Function to get the list of Script models to be included
	 * @param Vtiger_Request $request
	 * @return <Array> - List of Vtiger_JsScript_Model instances
	 */
	function getHeaderScripts(Vtiger_Request $request) {
		$headerScriptInstances = parent::getHeaderScripts($request);
		$moduleName = $request->getModule();

		$jsFileNames = array(
			'modules.Vtiger.resources.List',
			"modules.$moduleName.resources.List",
			'modules.Vtiger.resources.ListSidebar',
			"modules.$moduleName.resources.ListSidebar",
			'modules.CustomView.resources.CustomView',
			"modules.$moduleName.resources.CustomView",
			"libraries.jquery.ckeditor.ckeditor",
			"libraries.jquery.ckeditor.adapters.jquery",
			"modules.Vtiger.resources.CkEditor",
			//for vtiger7 
			"modules.Vtiger.resources.MergeRecords",
			"~layouts/v7/lib/jquery/Lightweight-jQuery-In-page-Filtering-Plugin-instaFilta/instafilta.min.js",
			'modules.Vtiger.resources.Tag',
			"~layouts/".Vtiger_Viewer::getDefaultLayoutName()."/lib/jquery/floatThead/jquery.floatThead.js",
			"~layouts/".Vtiger_Viewer::getDefaultLayoutName()."/lib/jquery/perfect-scrollbar/js/perfect-scrollbar.jquery.js"
		);

		$jsScriptInstances = $this->checkAndConvertJsScripts($jsFileNames);
		$headerScriptInstances = array_merge($headerScriptInstances, $jsScriptInstances);
		return $headerScriptInstances;
	}

	/*
	 * Function to initialize the required data in smarty to display the List View Contents
	 */
	public function initializeListViewContents(Vtiger_Request $request, Vtiger_Viewer $viewer) {
		$moduleName = $request->getModule();
		$cvId = $this->viewName;
		$pageNumber = $request->get('page');
		$orderBy = $request->get('orderby');
		$sortOrder = $request->get('sortorder');
		$searchKey = $request->get('search_key');
		$searchValue = $request->get('search_value');
		$operator = $request->get('operator');
		$searchParams = $request->get('search_params');
		$tagParams = $request->get('tag_params');
		$starFilterMode = $request->get('starFilterMode');
		$listHeaders = $request->get('list_headers', array());
		$tag = $request->get('tag');
		$requestViewName = $request->get('viewname');
		$tagSessionKey = $moduleName.'_TAG';

		if(!empty($requestViewName) && empty($tag)) {
			unset($_SESSION[$tagSessionKey]);
		}

		if(empty($tag)) {   
			$tagSessionVal = Vtiger_ListView_Model::getSortParamsSession($tagSessionKey);
			if(!empty($tagSessionVal)) {
				$tag = $tagSessionVal;
			}
		}else{
			Vtiger_ListView_Model::setSortParamsSession($tagSessionKey, $tag);
		}

		$listViewSessionKey = $moduleName.'_'.$cvId;
		if(!empty($tag)) {
			$listViewSessionKey .='_'.$tag;
		}

		if(empty($cvId)) {
			$customView = new CustomView();
			$cvId = $customView->getViewId($moduleName);
		}

		$orderParams = Vtiger_ListView_Model::getSortParamsSession($listViewSessionKey);
		if($request->get('mode') == 'removeAlphabetSearch') {
			Vtiger_ListView_Model::deleteParamsSession($listViewSessionKey, array('search_key', 'search_value', 'operator'));
			$searchKey = '';
			$searchValue = '';
			$operator = '';
		}
		if($request->get('mode') == 'removeSorting') {
			Vtiger_ListView_Model::deleteParamsSession($listViewSessionKey, array('orderby', 'sortorder'));
			$orderBy = '';
			$sortOrder = '';
		}
		if(empty($listHeaders)) {
			$listHeaders = $orderParams['list_headers'];
		}

		 if(!empty($tag) && empty($tagParams)){
			$tagParams = $orderParams['tag_params'];
		}

		if(empty($orderBy) && empty($searchValue) && empty($pageNumber)) {
			if($orderParams) {
				$pageNumber = $orderParams['page'];
				$orderBy = $orderParams['orderby'];
				$sortOrder = $orderParams['sortorder'];
				$searchKey = $orderParams['search_key'];
				$searchValue = $orderParams['search_value'];
				$operator = $orderParams['operator'];
				if(empty($searchParams)) {
					$searchParams = $orderParams['search_params']; 
				}

				if(empty($starFilterMode)) {
					$starFilterMode = $orderParams['star_filter_mode'];
				}
			}
		} else if($request->get('nolistcache') != 1) {
			$params = array('page' => $pageNumber, 'orderby' => $orderBy, 'sortorder' => $sortOrder, 'search_key' => $searchKey,
				'search_value' => $searchValue, 'operator' => $operator, 'tag_params' => $tagParams,'star_filter_mode'=> $starFilterMode,'search_params' =>$searchParams);

			if(!empty($listHeaders)) {
				$params['list_headers'] = $listHeaders;
			}
			Vtiger_ListView_Model::setSortParamsSession($listViewSessionKey, $params);
		}
		if($sortOrder == "ASC"){
			$nextSortOrder = "DESC";
			$sortImage = "icon-chevron-down";
			$faSortImage = "fa-sort-desc";
		}else{
			$nextSortOrder = "ASC";
			$sortImage = "icon-chevron-up";
			$faSortImage = "fa-sort-asc";
		}

		if(empty ($pageNumber)){
			$pageNumber = '1';
		}

		if(!$this->listViewModel) {
			$listViewModel = Vtiger_ListView_Model::getInstance($moduleName, $cvId, $listHeaders);
		} else {
			$listViewModel = $this->listViewModel;
		}
		
		//echo var_dump($listViewModel);
		//exit();
		
		$currentUser = Users_Record_Model::getCurrentUserModel();

		$linkParams = array('MODULE'=>$moduleName, 'ACTION'=>$request->get('view'), 'CVID'=>$cvId);
		$linkModels = $listViewModel->getListViewMassActions($linkParams);

		// preProcess is already loading this, we can reuse
		if(!$this->pagingModel){
			$pagingModel = new Vtiger_Paging_Model();
			$pagingModel->set('page', $pageNumber);
			$pagingModel->set('viewid', $request->get('viewname'));
		} else{
			$pagingModel = $this->pagingModel;
		}

		if(!empty($orderBy)) {
			$listViewModel->set('orderby', $orderBy);
			$listViewModel->set('sortorder',$sortOrder);
		}

		if(!empty($operator)) {
			$listViewModel->set('operator', $operator);
			$viewer->assign('OPERATOR',$operator);
			$viewer->assign('ALPHABET_VALUE',$searchValue);
		}
		if(!empty($searchKey) && !empty($searchValue)) {
			$listViewModel->set('search_key', $searchKey);
			$listViewModel->set('search_value', $searchValue);
		}

		if(empty($searchParams)) {
			$searchParams = array();
		}
		if(count($searchParams) == 2 && empty($searchParams[1])) {
			unset($searchParams[1]);
		}

		if(empty($tagParams)){
			$tagParams = array();
		}

		$searchAndTagParams = array_merge($searchParams, $tagParams);

		$transformedSearchParams = $this->transferListSearchParamsToFilterCondition($searchAndTagParams, $listViewModel->getModule());
		$listViewModel->set('search_params',$transformedSearchParams);


		//To make smarty to get the details easily accesible
		foreach($searchParams as $fieldListGroup){
			foreach($fieldListGroup as $fieldSearchInfo){
				$fieldSearchInfo['searchValue'] = $fieldSearchInfo[2];
				$fieldSearchInfo['fieldName'] = $fieldName = $fieldSearchInfo[0];
				$fieldSearchInfo['comparator'] = $fieldSearchInfo[1];
				$searchParams[$fieldName] = $fieldSearchInfo;
			}
		}

		foreach($tagParams as $fieldListGroup){
			foreach($fieldListGroup as $fieldSearchInfo){
				$fieldSearchInfo['searchValue'] = $fieldSearchInfo[2];
				$fieldSearchInfo['fieldName'] = $fieldName = $fieldSearchInfo[0];
				$fieldSearchInfo['comparator'] = $fieldSearchInfo[1];
				$tagParams[$fieldName] = $fieldSearchInfo;
			}
		}

		if(!$this->listViewHeaders){
			$this->listViewHeaders = $listViewModel->getListViewHeaders();
		}

		if(!$this->listViewEntries){
			$this->listViewEntries = $listViewModel->getListViewEntries($pagingModel);
		}
		//if list view entries restricted to show, paging should not fail
		if(!$this->noOfEntries) {
			$this->noOfEntries = $pagingModel->get('_listcount');
		}
		if(!$this->noOfEntries) {
			$noOfEntries = count($this->listViewEntries);
		} else {
			$noOfEntries = $this->noOfEntries;
		}
		$viewer->assign('MODULE', $moduleName);

		if(!$this->listViewLinks){
			$this->listViewLinks = $listViewModel->getListViewLinks($linkParams);
		}
		$viewer->assign('LISTVIEW_LINKS', $this->listViewLinks);

		$viewer->assign('LISTVIEW_MASSACTIONS', $linkModels['LISTVIEWMASSACTION']);

		$viewer->assign('PAGING_MODEL', $pagingModel);
		if(!$this->pagingModel){
			$this->pagingModel = $pagingModel;
		}
		$viewer->assign('PAGE_NUMBER',$pageNumber);

		if(!$this->moduleFieldStructure) {
			$recordStructure = Vtiger_RecordStructure_Model::getInstanceForModule($listViewModel->getModule(), Vtiger_RecordStructure_Model::RECORD_STRUCTURE_MODE_FILTER);
			$this->moduleFieldStructure = $recordStructure->getStructure();   
		}

		if(!$this->tags) {
			$this->tags = Vtiger_Tag_Model::getAllAccessible($currentUser->id, $moduleName);
		}
		if(!$this->allUserTags) {
			$this->allUserTags = Vtiger_Tag_Model::getAllUserTags($currentUser->getId());
		}

		$listViewController = $listViewModel->get('listview_controller');
		$selectedHeaderFields = $listViewController->getListViewHeaderFields();

		$viewer->assign('ORDER_BY',$orderBy);
		$viewer->assign('SORT_ORDER',$sortOrder);
		$viewer->assign('NEXT_SORT_ORDER',$nextSortOrder);
		$viewer->assign('SORT_IMAGE',$sortImage);
		$viewer->assign('FASORT_IMAGE',$faSortImage);
		$viewer->assign('COLUMN_NAME',$orderBy);
		$viewer->assign('VIEWNAME',$this->viewName);

		$viewer->assign('LISTVIEW_ENTRIES_COUNT',$noOfEntries);
		$viewer->assign('LISTVIEW_HEADERS', $this->listViewHeaders);
		$viewer->assign('LIST_HEADER_FIELDS', json_encode(array_keys($this->listViewHeaders)));
		$viewer->assign('LISTVIEW_ENTRIES', $this->listViewEntries);
		$viewer->assign('MODULE_FIELD_STRUCTURE', $this->moduleFieldStructure);
		$viewer->assign('SELECTED_HEADER_FIELDS', $selectedHeaderFields);
		$viewer->assign('TAGS', $this->tags);
		$viewer->assign('ALL_USER_TAGS', $this->allUserTags);
		$viewer->assign('ALL_CUSTOMVIEW_MODEL', CustomView_Record_Model::getAllFilterByModule($moduleName));
		$viewer->assign('CURRENT_TAG',$tag);
		$viewer->assign('SELECTED_MENU_CATEGORY', 'MARKETING');
		if (PerformancePrefs::getBoolean('LISTVIEW_COMPUTE_PAGE_COUNT', false)) {
			if(!$this->listViewCount){
				$this->listViewCount = $listViewModel->getListViewCount();
			}
			$totalCount = $this->listViewCount;
			$pageLimit = $pagingModel->getPageLimit();
			$pageCount = ceil((int) $totalCount / (int) $pageLimit);

			if($pageCount == 0){
				$pageCount = 1;
			}
			$viewer->assign('PAGE_COUNT', $pageCount);
			$viewer->assign('LISTVIEW_COUNT', $totalCount);
		}
		$viewer->assign('LIST_VIEW_MODEL', $listViewModel);
		$viewer->assign('GROUPS_IDS', Vtiger_Util_Helper::getGroupsIdsForUsers($currentUser->getId()));
		$viewer->assign('IS_CREATE_PERMITTED', $listViewModel->getModule()->isPermitted('CreateView'));
		$viewer->assign('IS_MODULE_EDITABLE', $listViewModel->getModule()->isPermitted('EditView'));
		$viewer->assign('IS_MODULE_DELETABLE', $listViewModel->getModule()->isPermitted('Delete'));
		$viewer->assign('SEARCH_DETAILS', $searchParams);
		$viewer->assign('TAG_DETAILS', $tagParams);
		$viewer->assign('NO_SEARCH_PARAMS_CACHE', $request->get('nolistcache'));
		$viewer->assign('STAR_FILTER_MODE',$starFilterMode);
		$viewer->assign('VIEWID', $cvId);
		//Vtiger7
		$viewer->assign('REQUEST_INSTANCE',$request);

		//vtiger7
		$moduleModel = Vtiger_Module_Model::getInstance($moduleName);
		if($moduleModel->isQuickPreviewEnabled()){
			$viewer->assign('QUICK_PREVIEW_ENABLED', 'true');
		}

		$picklistDependencyDatasource = Vtiger_DependencyPicklist::getPicklistDependencyDatasource($moduleName);
		$viewer->assign('PICKIST_DEPENDENCY_DATASOURCE',Zend_Json::encode($picklistDependencyDatasource));
	}

	protected function assignCustomViews(Vtiger_Request $request, Vtiger_Viewer $viewer) {
		$allCustomViews = CustomView_Record_Model::getAllByGroup($request->getModule());
		if (!empty($allCustomViews)) {
			$viewer->assign('CUSTOM_VIEWS', $allCustomViews);
			$currentCVSelectedFields = array();
			foreach ($allCustomViews as $cat => $views) {
				foreach ($views as $viewModel) {
					if ($viewModel->getId() === $viewer->get_template_vars('VIEWID')) {
						$currentCVSelectedFields = $viewModel->getSelectedFields();
						$viewer->assign('CURRENT_CV_MODEL', $viewModel);
						break;
					}
				}
			}
		}
	}

	/**
	 * Function returns the number of records for the current filter
	 * @param Vtiger_Request $request
	 */
	function getRecordsCount(Vtiger_Request $request) {
		$moduleName = $request->getModule();
		$cvId = $request->get('viewname');
		$count = $this->getListViewCount($request);

		$result = array();
		$result['module'] = $moduleName;
		$result['viewname'] = $cvId;
		$result['count'] = $count;

		$response = new Vtiger_Response();
		$response->setEmitType(Vtiger_Response::$EMIT_JSON);
		$response->setResult($result);
		$response->emit();
	}

	/**
	 * Function to get listView count
	 * @param Vtiger_Request $request
	 */
	function getListViewCount(Vtiger_Request $request){
		$moduleName = $request->getModule();
		$cvId = $request->get('viewname');
		if(empty($cvId)) {
			$cvId = '0';
		}

		$searchKey = $request->get('search_key');
		$searchValue = $request->get('search_value');
		$tagParams = $request->get('tag_params');

		$listViewModel = Vtiger_ListView_Model::getInstance($moduleName, $cvId);

		if(empty($tagParams)){
			$tagParams = array();
		}

		$searchParams = $request->get('search_params');
		if(empty($searchParams) && !is_array($searchParams)){
			$searchParams = array();
		}
		$searchAndTagParams = array_merge($searchParams, $tagParams);

		$listViewModel->set('search_params',$this->transferListSearchParamsToFilterCondition($searchAndTagParams, $listViewModel->getModule()));

		$listViewModel->set('search_key', $searchKey);
		$listViewModel->set('search_value', $searchValue);
		$listViewModel->set('operator', $request->get('operator'));

		// for Documents folders we should filter with folder id as well
		$folder_value = $request->get('folder_value');
		if(!empty($folder_value)){
			$listViewModel->set('folder_id',$request->get('folder_id'));
			$listViewModel->set('folder_value',$folder_value);
		}

		$count = $listViewModel->getListViewCount();

		return $count;
	}



	/**
	 * Function to get the page count for list
	 * @return total number of pages
	 */
	function getPageCount(Vtiger_Request $request){
		$listViewCount = $this->getListViewCount($request);
		$pagingModel = new Vtiger_Paging_Model();
		$pageLimit = $pagingModel->getPageLimit();
		$pageCount = ceil((int) $listViewCount / (int) $pageLimit);

		if($pageCount == 0){
			$pageCount = 1;
		}
		$result = array();
		$result['page'] = $pageCount;
		$result['numberOfRecords'] = $listViewCount;
		$response = new Vtiger_Response();
		$response->setResult($result);
		$response->emit();
	}


	public function transferListSearchParamsToFilterCondition($listSearchParams, $moduleModel) {
		return Vtiger_Util_Helper::transferListSearchParamsToFilterCondition($listSearchParams, $moduleModel);
	}

	public function getHeaderCss(Vtiger_Request $request) {
		$headerCssInstances = parent::getHeaderCss($request);
		$cssFileNames = array(
			"~layouts/".Vtiger_Viewer::getDefaultLayoutName()."/lib/jquery/perfect-scrollbar/css/perfect-scrollbar.css",
		);
		$cssInstances = $this->checkAndConvertCssStyles($cssFileNames);
		$headerCssInstances = array_merge($headerCssInstances, $cssInstances);
		return $headerCssInstances;
	}

	public function getRecordActionsFromModule($moduleModel) {
		$editPermission = $deletePermission = 0;
		if ($moduleModel) {
			$editPermission	= $moduleModel->isPermitted('EditView');
			$deletePermission = $moduleModel->isPermitted('Delete');
		}

		$recordActions = array();
		$recordActions['edit'] = $editPermission;
		$recordActions['delete'] = $deletePermission;

		return $recordActions;
	}
}