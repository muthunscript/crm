<?php require_once("../includes/functions.php"); admin_login();
if(isset($_SESSION['admin_type'])&&$_SESSION['admin_type']=="affiliate")
{
	if(isset($_REQUEST['id'])&&$_REQUEST['id']!='')
	{
		$lg=mt4_live_acc::find_by_id($_REQUEST['id']);
		$us=users::find_by_id($lg['users']);
		/**if(empty($us)||$us['affiliated_id']!=$_SESSION['admin'])
		{
			header("Location:dashboard.php");
			exit();
		}**/

		if($us['affiliated_id']!=0&&$us['affiliated_id']!='')
		$aff=affiliate::find_by_id($us['affiliated_id']);
		if(empty($us)||(!isset($aff))||($us['affiliated_id']!=$_SESSION['admin']&&(isset($aff)&&$aff['parent']!=$_SESSION['admin'])))
		{
			header("Location:dashboard.php");
			exit();
		}
	}
}

$mt4_live_acc = mt4_live_acc::find_by_id($_GET['id']);

$kola = json_decode(file_get_contents('https://accounts.4xincome.com/api-v2/dashboard.php?login=1000222'));
//$_mt_user = array_shift(json_decode(file_get_contents($_this_site."/api-v2/user.php?s=".$mt4_live_acc['login_id']),true));
//$kola = json_decode(file_get_contents($_this_site."/api-v2/dashboard.php?login=1000222"));
$_mt_user = array_shift(json_decode(file_get_contents("https://accounts.4xincome.com/api-v2/user.php?login=1000222"),true));
$user=$_mt_user;


function group_array($arr,$key){
$result = array();
foreach ($arr as $data) {
  $id = $data->$key;
  if (isset($result[$id])) {
     $result[$id][] = $data;
  } else {
     $result[$id] = array($data);
  }
}
return $result;
}

$open_orders = array_filter($kola,function($v){ if($v->CLOSE_TIME=='1970-01-01 00:00:00' && ($v->CMD == 0 || $v->CMD == 1)){return TRUE; }else{return FALSE; } });
$close_orders = array_filter($kola,function($v){ if($v->CLOSE_TIME!='1970-01-01 00:00:00' && ($v->CMD == 0 || $v->CMD == 1)){return TRUE; }else{return FALSE; } });
$deposit = array_filter($kola,function($v){ if($v->PROFIT>0 && $v->CMD == 6 ){return TRUE; }else{return FALSE; } });
$withadraw = array_filter($kola,function($v){ if($v->PROFIT<0 && $v->CMD == 6 ){return TRUE; }else{return FALSE; } });

$orders_by_symbol = group_array($close_orders,"SYMBOL");

//echo count($kola)
$today = strtotime('12:00:00');
$today24 = $today - (24 * 60 * 60);

//print_r($close_orders);
//echo json_encode($kola);
//exit();
//echo strtotime($close_orders[9]->CLOSE_TIME);

$grouped = Array();
$grouped_lot = Array();
$grouped_number = Array();
$grouped_sym = Array();
$grouped_sym_n = Array();
$pnl = Array();

for($i=0;$i<15;$i++){
	$grouped[$i] = Array(); $grouped_lot[$i] = Array(0,0,date("d/m",$today24)); $grouped_number[$i] = Array(0,0,date("d/m",$today24));
	foreach($close_orders as $close_orders_t){
		if(strtotime($close_orders_t->CLOSE_TIME)<$today && strtotime($close_orders_t->CLOSE_TIME)>$today24){
			array_push($grouped[$i],$close_orders_t);
			$te1 = $grouped_lot[$i][1] + $close_orders_t->VOLUME;
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
		$grouped_sym[$close_orders_t->SYMBOL] = $close_orders_t;
		if(!array_key_exists($close_orders_t->SYMBOL,$grouped_sym_n)){ $grouped_sym_n[$close_orders_t->SYMBOL] = 0; }  
		$grouped_sym_n[$close_orders_t->SYMBOL]++;
		if($close_orders_t->PROFIT>$pnlmax){ $pnlmax = $close_orders_t->PROFIT; }
		if($close_orders_t->PROFIT<$pnlmin){ $pnlmin = $close_orders_t->PROFIT; }
		$pnlfinal += $close_orders_t->PROFIT;
		array_push($pnl,Array("id"=>sizeof($pnl),"day"=>sizeof($pnl),"profit"=>$pnl[sizeof($pnl)-1]["profit"]+$close_orders_t->PROFIT));
	}


	//print_r($grouped_sym_n);
	$m = Array();
	foreach($grouped_sym_n as $key=>$value){
		array_push($m,Array($key,$value));
	}
	

$demosit_arr = Array(); $totaldep = 0;
foreach($deposit as $deposit_t){
	array_push($demosit_arr,Array("id"=>$deposit_t->TICKET,"data"=>Array($deposit_t->TICKET,$deposit_t->PROFIT,$deposit_t->COMMENT,$deposit_t->CLOSE_TIME)));
	$totaldep += $deposit_t->PROFIT; 
	}
$demosit_arr = Array("rows"=>$demosit_arr);

$with_arr = Array();  $totalwith = 0;
foreach($withadraw as $withadraw_t){
	array_push($with_arr,Array("id"=>$withadraw_t->TICKET,"data"=>Array($withadraw_t->TICKET,$withadraw_t->PROFIT,$withadraw_t->COMMENT,$withadraw_t->CLOSE_TIME)));
	$totalwith += $deposit_t->PROFIT;
}
$with_arr = Array("rows"=>$with_arr);

$open_arr = Array();
foreach($open_orders as $open_orders_t){
	array_push($open_arr,Array("id"=>$open_orders_t->TICKET,"data"=>Array($open_orders_t->TICKET,$open_orders_t->SYMBOL,$open_orders_t->OPEN_PRICE,$open_orders_t->OPEN_TIME,$open_orders_t->PROFIT)));
}
$open_arr = Array("rows"=>$open_arr);

$close_arr = Array();
foreach($close_orders as $open_orders_t){
	array_push($close_arr,Array("id"=>$open_orders_t->TICKET,"data"=>Array($open_orders_t->TICKET,$open_orders_t->SYMBOL,$open_orders_t->OPEN_PRICE,$open_orders_t->OPEN_TIME,$open_orders_t->PROFIT)));
}
$close_arr = Array("rows"=>$close_arr);
$p_title = "Mt4 live acc";
?>
<html>
<head>
<style>


</style>
<title><?php echo $p_title; ?> - <?php echo $_site_name; ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
<link rel="stylesheet" type="text/css" href="../codebase/fonts/font_roboto/roboto.css"/>
<link rel="stylesheet" type="text/css" href="../skins/material/dhtmlx.css"/>
<link rel="stylesheet" type="text/css" href="../codebase/dhtmlx.css"/>
<script src="../codebase/dhtmlx.js"></script>
<script src="../js/jquery-1.7.2.min.js"></script>
<script src="../js/a_js.js"></script>
<script src="js/vengine.js"></script>
<script src="js/crop.js" ></script>

<?php include('html_head.php'); ?>
<?php echo_report(); ?><style>
.dhx_cell_cont_layout span {
   text-align: center;
   display: block;
   font-size: 20px;
}

.dhxdataview_placeholder {
   display: table;
}

.dhx_cell_cont_layout span:last-child {
   font-size: 35px;
   margin-top: 7px;
}

.dhx_dataview_item.dhx_dataview_default_item {
   display: table-cell;
   vertical-align: middle;
   float: none !important;
}
</style>

</head>
<body>
	<?php include('nav.php'); ?>

	<div id="content_wrapper" class="container-fluid">
    <?php if($_admin_lte_theme){ include('breadcrumb.php'); }?>
		<div class="row-fluid">
			<?php include('left_nav.php'); ?>
			<div id="content" class=" span12" style="padding-bottom: 50px;">

			<!-- CONTENT /////////////////////////////////////////////// === /////////////////////////////////////////////// 	-->
            <?php if(!$_admin_lte_theme){ ?> <div><?php echo blink_construct($p_title); ?></div> <?php } ?>
            
            <div class="box-header well" data-original-title>
						<h2><i class="icon-th"></i> Trader Insights</h2>
                        
                         
						
                        
                        
					</div>
				<div class="<?php if(!$_admin_lte_theme){ ?>box-content<?php }?> box-content1 box admin-form edit_pg theme-primary" >
            <div id="subcontent"  style="height:100%; ">
            
</div>
	</div>

            <!-- CONTENT END /////////////////////////////////////////////// === /////////////////////////////////////////////// 	-->
			</div><!--/#content.span10-->
		</div><!--/fluid-row-->

		<hr>
		<?php include('foot.php'); ?>
	</div><!--/.fluid-container-->
	</div>
</body>
<script>
	var k = '<?php echo json_encode($pnl); ?>';
	var k1 = <?php echo json_encode($m); ?>;
	var k2 = <?php echo json_encode($demosit_arr); ?>;
	var k3 = <?php echo json_encode($with_arr); ?>;
	var k4 = <?php echo json_encode($open_arr); ?>;
	var k5 = <?php echo json_encode($close_arr); ?>;
	var k6 = <?php echo json_encode($grouped_lot); ?>;
	var k7 = <?php echo json_encode($grouped_number); ?>;
	var k8 = [["Balance","<?php echo $_mt_user['BALANCE']; ?>"],["P/L","<?php echo $pnlfinal; ?>"],["Leverage","<?php echo $_mt_user['LEVERAGE']; ?>"],["Total Deposits","<?php echo $totaldep; ?>"],["Total Withdraw","<?php echo $totalwith; ?>"],["Group","<?php echo $_mt_user['GROUP']; ?>"]]
	
	window.dhx4.skin = 'material';
	var main_layout = new dhtmlXLayoutObject(document.getElementById("subcontent"), '4I');

	var a = main_layout.cells('a');
	a.setText('Trader Insights - <?php echo $_mt_user['LOGIN']; ?> (Real)');
	
	/****start**/
	var chart_1 = a.attachChart({
		view: 'area' ,
		yAxis:{
					start:<?php echo $pnlmin; ?>,
					end:<?php echo $pnlmax; ?>,
					},
		color:'#00ccff',
		value:'#profit#'
	});

	chart_1.parse(k, 'json');

/****end**/

	var b = main_layout.cells('b');
	b.hideHeader();
	var data_view_1 = b.attachDataView({
		type:{
			template:'<span>#data0#</span>  <span >#data1#</span>'
		}
	});
	
	data_view_1.parse(k8, 'jsarray');
	


	var c = main_layout.cells('c');
	var tabbar_1 = c.attachTabbar();
	tabbar_1.addTab('tab_1','Deposit');
	var tab_1 = tabbar_1.cells('tab_1');
	tab_1.setActive();
	var grid_1 = tab_1.attachGrid();
	grid_1.setIconsPath('../codebase/imgs/');
	
	grid_1.setHeader(["ID","Value","Comment","Time"]);
	grid_1.setColTypes("ro,ro,ro,ro");
	
	grid_1.setColSorting('str,str,str,str');
	grid_1.setInitWidths('*,*,*,*');
	grid_1.init();
	grid_1.parse(k2, 'json');
	


	tabbar_1.addTab('tab_2','Withdraw');
	var tab_2 = tabbar_1.cells('tab_2');
	var grid_2 = tab_2.attachGrid();
	grid_2.setIconsPath('../codebase/imgs/');
	
	grid_2.setHeader(["ID","Value","Comment","Time"]);
	grid_2.setColTypes("ro,ro,ro,ro");
	
	grid_2.setColSorting('str,str,str,str');
	grid_2.setInitWidths('*,*,*,*');
	grid_2.init();
	grid_2.parse(k3, 'json');
	


	tabbar_1.addTab('tab_3','Open Trades');
	var tab_3 = tabbar_1.cells('tab_3');
	var grid_3 = tab_3.attachGrid();
	grid_3.setIconsPath('../codebase/imgs/');
	
	grid_3.setHeader(["ID","Symbol","Open Price","Time","Profit"]);
	grid_3.setColTypes("ro,ro,ro,ro,ro");
	
	grid_3.setColSorting('str,str,str,str,str');
	grid_3.setInitWidths('*,*,*,*,*');
	grid_3.init();
	grid_3.parse(k4, 'json');
	


	tabbar_1.addTab('tab_4','Closed trades');
	var tab_4 = tabbar_1.cells('tab_4');
	var grid_4 = tab_4.attachGrid();
	grid_4.setIconsPath('../codebase/imgs/');
	
	grid_4.setHeader(["ID","Symbol","Open Price","TIme","Profit"]);
	grid_4.setColTypes("ro,ro,ro,ro,ro");
	
	grid_4.setColSorting('str,str,str,str,str');
	grid_4.setInitWidths('*,*,*,*,*');
	grid_4.init();
	grid_4.parse(k5, 'json');
	






	var cell_1 = main_layout.cells('d');
	cell_1.hideHeader();
	var layout_1 = cell_1.attachLayout('2U');

	var cell_2 = layout_1.cells('a');
	cell_2.hideHeader();
	/****start**/
	var chart_2 = cell_2.attachChart({
		view: 'pie3D' ,
		tooltip:{
			template:'#data0#'
		},
		legend:{"template":"#data0#","marker":{"type":"square","width":25,"height":15}},
		//gradient: false,
		value:'#data1#'
	});

	chart_2.parse(k1, 'jsarray');

/****end**/

	var cell_3 = layout_1.cells('b');
	var tabbar_2 = cell_3.attachTabbar();
	tabbar_2.addTab('tab_5','Lots - Last 15 days');
	var tab_5 = tabbar_2.cells('tab_5');
	tab_5.setActive();
	/****start**/
	var chart_3 = tab_5.attachChart({
		view: 'bar' ,
		gradient: false,
		xAxis:{"title":"Days","template":"#data2#","step":"2"},
		yAxis:{"title":"Lots"},
		value:'#data1#'
	});

	chart_3.parse(k6, 'jsarray');

/****end**/
/****start**/
	tabbar_2.addTab('tab_6','Trades - Last 15 days');
	var tab_6 = tabbar_2.cells('tab_6');
	var chart_4 = tab_6.attachChart({
		view: 'bar' ,
		gradient: false,
		xAxis:{"title":"Day","template":"#data2#","step":"2"},
		yAxis:{"title":"Trades Number"},
		value:'#data1#'
	});

	chart_4.parse(k7, 'jsarray');
/**end**/
</script>
	<?php include('foot_js.php'); ?>

</html>