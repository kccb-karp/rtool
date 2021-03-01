<?php
	$reportingtbl = $_POST['reportingtbl'];
	include '../functions.php';

	ini_set('memory_limit', '-1');
	$obj = new myFunctions;
	$companyresults = $obj->readAlldata($reportingtbl);
	//$array = mysql_fetch_row($companyresults); 
	echo json_encode($companyresults);

	
?>