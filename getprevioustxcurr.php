<?php
	$indicator = $_POST['indicator'];
	include 'functions.php';

	$obj = new myFunctions;
	$companyresults = $obj->countAlldata("txcurrlinelistsep2020");
	//$array = mysql_fetch_row($companyresults); 
	echo json_encode($companyresults);
	
?>