<?php
// This script and data application were generated by AppGini 5.51
// Download AppGini for free from http://bigprof.com/appgini/download/

	$currDir=dirname(__FILE__);
	include("$currDir/defaultLang.php");
	include("$currDir/language.php");
	include("$currDir/lib.php");
	@include("$currDir/hooks/register.php");
	include("$currDir/register_dml.php");

	// mm: can the current member access this page?
	$perm=getTablePermissions('register');
	if(!$perm[0]){
		echo error_message($Translation['tableAccessDenied'], false);
		echo '<script>setTimeout("window.location=\'index.php?signOut=1\'", 2000);</script>';
		exit;
	}

	$x = new DataList;
	$x->TableName = "register";

	// Fields that can be displayed in the table view
	$x->QueryFieldsTV=array(   
		"`register`.`id`" => "id",
		"`register`.`client_name`" => "client_name",
		"IF(    CHAR_LENGTH(`employees1`.`first`) || CHAR_LENGTH(`employees1`.`last`), CONCAT_WS('',   `employees1`.`first`, ' ', `employees1`.`last`), '') /* Sold by */" => "seller",
		"`register`.`date`" => "date",
		"`register`.`phone`" => "phone",
		"`register`.`email`" => "email"
	);
	// mapping incoming sort by requests to actual query fields
	$x->SortFields = array(   
		1 => '`register`.`id`',
		2 => 2,
		3 => 3,
		4 => '`register`.`date`',
		5 => 5,
		6 => 6
	);

	// Fields that can be displayed in the csv file
	$x->QueryFieldsCSV=array(   
		"`register`.`id`" => "id",
		"`register`.`client_name`" => "client_name",
		"IF(    CHAR_LENGTH(`employees1`.`first`) || CHAR_LENGTH(`employees1`.`last`), CONCAT_WS('',   `employees1`.`first`, ' ', `employees1`.`last`), '') /* Sold by */" => "seller",
		"`register`.`date`" => "date",
		"`register`.`phone`" => "phone",
		"`register`.`email`" => "email"
	);
	// Fields that can be filtered
	$x->QueryFieldsFilters=array(   
		"`register`.`id`" => "ID",
		"`register`.`client_name`" => "Sold to",
		"IF(    CHAR_LENGTH(`employees1`.`first`) || CHAR_LENGTH(`employees1`.`last`), CONCAT_WS('',   `employees1`.`first`, ' ', `employees1`.`last`), '') /* Sold by */" => "Sold by",
		"`register`.`date`" => "Date Sold",
		"`register`.`phone`" => "Phone",
		"`register`.`email`" => "Email"
	);

	// Fields that can be quick searched
	$x->QueryFieldsQS=array(   
		"`register`.`id`" => "id",
		"`register`.`client_name`" => "client_name",
		"IF(    CHAR_LENGTH(`employees1`.`first`) || CHAR_LENGTH(`employees1`.`last`), CONCAT_WS('',   `employees1`.`first`, ' ', `employees1`.`last`), '') /* Sold by */" => "seller",
		"`register`.`date`" => "date",
		"`register`.`phone`" => "phone",
		"`register`.`email`" => "email"
	);

	// Lookup fields that can be used as filterers
	$x->filterers = array(  'seller' => 'Sold by');

	$x->QueryFrom="`register` LEFT JOIN `employees` as employees1 ON `employees1`.`id`=`register`.`seller` ";
	$x->QueryWhere='';
	$x->QueryOrder='';

	$x->AllowSelection = 0;
	$x->HideTableView = ($perm[2]==0 ? 1 : 0);
	$x->AllowDelete = $perm[4];
	$x->AllowMassDelete = false;
	$x->AllowInsert = $perm[1];
	$x->AllowUpdate = $perm[3];
	$x->SeparateDV = 1;
	$x->AllowDeleteOfParents = 0;
	$x->AllowFilters = 1;
	$x->AllowSavingFilters = 1;
	$x->AllowSorting = 1;
	$x->AllowNavigation = 1;
	$x->AllowPrinting = 1;
	$x->AllowCSV = 1;
	$x->RecordsPerPage = 10;
	$x->QuickSearch = 1;
	$x->QuickSearchText = $Translation["quick search"];
	$x->ScriptFileName = "register_view.php";
	$x->RedirectAfterInsert = "register_view.php";
	$x->TableTitle = "Register";
	$x->TableIcon = "resources/table_icons/cash_register.png";
	$x->PrimaryKey = "`register`.`id`";

	$x->ColWidth   = array(  150, 150, 150, 150, 150);
	$x->ColCaption = array("Sold to", "Sold by", "Date Sold", "Phone", "Email");
	$x->ColFieldName = array('client_name', 'seller', 'date', 'phone', 'email');
	$x->ColNumber  = array(2, 3, 4, 5, 6);

	$x->Template = 'templates/register_templateTV.html';
	$x->SelectedTemplate = 'templates/register_templateTVS.html';
	$x->ShowTableHeader = 1;
	$x->ShowRecordSlots = 0;
	$x->HighlightColor = '#FFF0C2';

	// mm: build the query based on current member's permissions
	$DisplayRecords = $_REQUEST['DisplayRecords'];
	if(!in_array($DisplayRecords, array('user', 'group'))){ $DisplayRecords = 'all'; }
	if($perm[2]==1 || ($perm[2]>1 && $DisplayRecords=='user' && !$_REQUEST['NoFilter_x'])){ // view owner only
		$x->QueryFrom.=', membership_userrecords';
		$x->QueryWhere="where `register`.`id`=membership_userrecords.pkValue and membership_userrecords.tableName='register' and lcase(membership_userrecords.memberID)='".getLoggedMemberID()."'";
	}elseif($perm[2]==2 || ($perm[2]>2 && $DisplayRecords=='group' && !$_REQUEST['NoFilter_x'])){ // view group only
		$x->QueryFrom.=', membership_userrecords';
		$x->QueryWhere="where `register`.`id`=membership_userrecords.pkValue and membership_userrecords.tableName='register' and membership_userrecords.groupID='".getLoggedGroupID()."'";
	}elseif($perm[2]==3){ // view all
		// no further action
	}elseif($perm[2]==0){ // view none
		$x->QueryFields = array("Not enough permissions" => "NEP");
		$x->QueryFrom = '`register`';
		$x->QueryWhere = '';
		$x->DefaultSortField = '';
	}
	// hook: register_init
	$render=TRUE;
	if(function_exists('register_init')){
		$args=array();
		$render=register_init($x, getMemberInfo(), $args);
	}

	if($render) $x->Render();

	// hook: register_header
	$headerCode='';
	if(function_exists('register_header')){
		$args=array();
		$headerCode=register_header($x->ContentType, getMemberInfo(), $args);
	}  
	if(!$headerCode){
		include_once("$currDir/header.php"); 
	}else{
		ob_start(); include_once("$currDir/header.php"); $dHeader=ob_get_contents(); ob_end_clean();
		echo str_replace('<%%HEADER%%>', $dHeader, $headerCode);
	}

	echo $x->HTML;
	// hook: register_footer
	$footerCode='';
	if(function_exists('register_footer')){
		$args=array();
		$footerCode=register_footer($x->ContentType, getMemberInfo(), $args);
	}  
	if(!$footerCode){
		include_once("$currDir/footer.php"); 
	}else{
		ob_start(); include_once("$currDir/footer.php"); $dFooter=ob_get_contents(); ob_end_clean();
		echo str_replace('<%%FOOTER%%>', $dFooter, $footerCode);
	}
?>