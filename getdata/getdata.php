<?php
	$indicator = $_POST['indicator'];
	include 'functions.php';

	if($indicator == 'txcurrdec'){
		$obj = new myFunctions;
		$companyresults = $obj->countAlldata("txcurrDecFinal");
		//$array = mysql_fetch_row($companyresults); 
		echo json_encode($companyresults);
	}

	if($indicator == 'txcurrsep'){
		$obj = new myFunctions;
		$companyresults = $obj->countAlldata("txcurrlinelistsep2020");
		//$array = mysql_fetch_row($companyresults); 
		echo json_encode($companyresults);
	}
	
?>