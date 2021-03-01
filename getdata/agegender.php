<?php
	$reportingtbl = $_POST['tblname'];
	
	include '../functions.php';
	ini_set('memory_limit', '-1');

	$obj = new myFunctions;
	$companyresults = $obj->agegenderdistribution($reportingtbl);
	echo json_encode($companyresults);
?>