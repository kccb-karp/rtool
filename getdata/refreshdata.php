<?php
	$indicator = $_POST['indicator'];
	
	include '../functions.php';
	ini_set('memory_limit', '-1');

	if($indicator == 'txcurr'){
		$reportingdate = $_POST['reportingdate'];
		$newmonthdate = $_POST['newmonthdate'];
		$reportingmonth = $_POST['reportingmonth'];
		$reportingyear = $_POST['reportingyear'];
		$obj = new myFunctions;
		$companyresults = $obj->refreshtxcurr($indicator,$reportingdate,$newmonthdate,$reportingmonth,$reportingyear);
		echo json_encode($companyresults);
	}

	if($indicator == 'txnew'){
		$endoflastreportingperiod = $_POST['endoflastreportingperiod'];
		$startofcurrentreportingperiod = $_POST['startofcurrentreportingperiod'];
		$endofcurrentreportingperiod = $_POST['endofcurrentreportingperiod'];
		$startofnextreportingperiod = $_POST['startofnextreportingperiod'];
		$reportingmonth = $_POST['reportingmonth'];
		$reportingyear = $_POST['reportingyear'];
		$obj = new myFunctions;
		$companyresults = $obj->refreshtxnew($indicator,$endoflastreportingperiod,$startofcurrentreportingperiod,$endofcurrentreportingperiod,$startofnextreportingperiod,$reportingmonth,$reportingyear);
		echo json_encode($companyresults);
	}

	if($indicator == 'txrtt'){
		$endoflastreportingperiod = $_POST['endoflastreportingperiod'];
		$startofcurrentreportingperiod = $_POST['startofcurrentreportingperiod'];
		$endofcurrentreportingperiod = $_POST['endofcurrentreportingperiod'];
		$startofnextreportingperiod = $_POST['startofnextreportingperiod'];
		$reportingmonth = $_POST['reportingmonth'];
		$reportingyear = $_POST['reportingyear'];
		$obj = new myFunctions;
		$companyresults = $obj->refreshtxrtt($indicator,$endoflastreportingperiod,$startofcurrentreportingperiod,$endofcurrentreportingperiod,$startofnextreportingperiod,$reportingmonth,$reportingyear);
		echo json_encode($companyresults);
	}
		
	if($indicator == 'tis'){
		$endoflastreportingperiod = $_POST['endoflastreportingperiod'];
		$startofcurrentreportingperiod = $_POST['startofcurrentreportingperiod'];
		$endofcurrentreportingperiod = $_POST['endofcurrentreportingperiod'];
		$startofnextreportingperiod = $_POST['startofnextreportingperiod'];
		$reportingmonth = $_POST['reportingmonth'];
		$reportingyear = $_POST['reportingyear'];
		$obj = new myFunctions;
		$companyresults = $obj->refreshtis($indicator,$endoflastreportingperiod,$startofcurrentreportingperiod,$endofcurrentreportingperiod,$startofnextreportingperiod,$reportingmonth,$reportingyear);
		echo json_encode($companyresults);
	}

	if($indicator == 'deaths'){
		$endoflastreportingperiod = $_POST['endoflastreportingperiod'];
		$startofcurrentreportingperiod = $_POST['startofcurrentreportingperiod'];
		$endofcurrentreportingperiod = $_POST['endofcurrentreportingperiod'];
		$startofnextreportingperiod = $_POST['startofnextreportingperiod'];
		$reportingmonth = $_POST['reportingmonth'];
		$reportingyear = $_POST['reportingyear'];
		$obj = new myFunctions;
		$companyresults = $obj->refreshdeaths($indicator,$endoflastreportingperiod,$startofcurrentreportingperiod,$endofcurrentreportingperiod,$startofnextreportingperiod,$reportingmonth,$reportingyear);
		echo json_encode($companyresults);
	}

	if($indicator == 'tos'){
		$endoflastreportingperiod = $_POST['endoflastreportingperiod'];
		$startofcurrentreportingperiod = $_POST['startofcurrentreportingperiod'];
		$endofcurrentreportingperiod = $_POST['endofcurrentreportingperiod'];
		$startofnextreportingperiod = $_POST['startofnextreportingperiod'];
		$reportingmonth = $_POST['reportingmonth'];
		$reportingyear = $_POST['reportingyear'];
		$obj = new myFunctions;
		$companyresults = $obj->refreshtos($indicator,$endoflastreportingperiod,$startofcurrentreportingperiod,$endofcurrentreportingperiod,$startofnextreportingperiod,$reportingmonth,$reportingyear);
		echo json_encode($companyresults);
	}

	if($indicator == 'ltfu'){
		$endoflastreportingperiod = $_POST['endoflastreportingperiod'];
		$startofcurrentreportingperiod = $_POST['startofcurrentreportingperiod'];
		$endofcurrentreportingperiod = $_POST['endofcurrentreportingperiod'];
		$startofnextreportingperiod = $_POST['startofnextreportingperiod'];
		$reportingmonth = $_POST['reportingmonth'];
		$reportingyear = $_POST['reportingyear'];
		$previoustxcurrtbl = $_POST['previoustxcurrtbl'];
		$currenttxcurrtbl = $_POST['currenttxcurrtbl'];
		$currentdeathstbl = $_POST['currentdeathstbl'];
		$currenttostbl = $_POST['currenttostbl'];
		$obj = new myFunctions;
		$companyresults = $obj->refreshltfu($indicator,$endoflastreportingperiod,$startofcurrentreportingperiod,$endofcurrentreportingperiod,$startofnextreportingperiod,$reportingmonth,$reportingyear,$previoustxcurrtbl,$currenttxcurrtbl,$currentdeathstbl,$currenttostbl);
		echo json_encode($companyresults);
	}
?>