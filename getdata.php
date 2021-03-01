<?php
	$indicator = $_POST['indicator'];
	$reportingdate = $_POST['reportingdate'];
	$newmonthdate = $_POST['newmonthdate'];
	$reportingmonth = $_POST['reportingmonth'];
	$reportingyear = $_POST['reportingyear'];
	include 'functions.php';

	if($indicator == 'txcurr'){
		$txcurrtbl = $indicator.$reportingmonth.$reportingyear;
		$obj = new myFunctions;
		//check if table exists
		$checktable = $obj->checkifdataexists($txcurrtbl); 
		$tableid = $checktable['dataid'];
		if($tableid >= 1){
			$companyresults = $obj->countAlldata($txcurrtbl); 
			echo json_encode($companyresults);
		}
		else{
			echo "error";
		}
	}

	if($indicator == 'txnew'){
		$txcurrtbl = $indicator.$reportingmonth.$reportingyear;
		$obj = new myFunctions;
		//check if table exists
		$checktable = $obj->checkifdataexists($txcurrtbl); 
		$tableid = $checktable['dataid'];
		if($tableid >= 1){
			$companyresults = $obj->countAlldata($txcurrtbl); 
			echo json_encode($companyresults);
		}
		else{
			echo "error";
		}
	}

	if($indicator == 'txrtt'){
		$txcurrtbl = $indicator.$reportingmonth.$reportingyear;
		$obj = new myFunctions;
		//check if table exists
		$checktable = $obj->checkifdataexists($txcurrtbl); 
		$tableid = $checktable['dataid'];
		if($tableid >= 1){
			$companyresults = $obj->countAlldata($txcurrtbl); 
			echo json_encode($companyresults);
		}
		else{
			echo "error";
		}
	}


	if($indicator == 'tis'){
		$txcurrtbl = $indicator.$reportingmonth.$reportingyear;
		$obj = new myFunctions;
		//check if table exists
		$checktable = $obj->checkifdataexists($txcurrtbl); 
		$tableid = $checktable['dataid'];
		if($tableid >= 1){
			$companyresults = $obj->countAlldata($txcurrtbl); 
			echo json_encode($companyresults);
		}
		else{
			echo "error";
		}
	}

	if($indicator == 'deaths'){
		$txcurrtbl = $indicator.$reportingmonth.$reportingyear;
		$obj = new myFunctions;
		//check if table exists
		$checktable = $obj->checkifdataexists($txcurrtbl); 
		$tableid = $checktable['dataid'];
		if($tableid >= 1){
			$companyresults = $obj->countAlldata($txcurrtbl); 
			echo json_encode($companyresults);
		}
		else{
			echo "error";
		}
	}

	if($indicator == 'deathsanalysis'){
		$txcurrtbl = 'deaths'.$reportingmonth.$reportingyear;
		$obj = new myFunctions;
		//check if table exists
		$checktable = $obj->checkifdataexists($txcurrtbl); 
		$tableid = $checktable['dataid'];
		if($tableid >= 1){
			$companyresults = $obj->deathstoanalysis($txcurrtbl); 
			echo json_encode($companyresults);
		}
		else{
			echo "error";
		}
	}

	if($indicator == 'toanalysis'){
		$txcurrtbl = 'tos'.$reportingmonth.$reportingyear;
		$obj = new myFunctions;
		//check if table exists
		$checktable = $obj->checkifdataexists($txcurrtbl); 
		$tableid = $checktable['dataid'];
		if($tableid >= 1){
			$companyresults = $obj->deathstoanalysis($txcurrtbl); 
			echo json_encode($companyresults);
		}
		else{
			echo "error";
		}
	}

	if($indicator == 'ltfu'){
		$txcurrtbl = $indicator.$reportingmonth.$reportingyear;
		$obj = new myFunctions;
		//check if table exists
		$checktable = $obj->checkifdataexists($txcurrtbl); 
		$tableid = $checktable['dataid'];
		if($tableid >= 1){
			$companyresults = $obj->countAlldata($txcurrtbl); 
			echo json_encode($companyresults);
		}
		else{
			echo "error";
		}
	}

	if($indicator == 'tos'){
		$txcurrtbl = $indicator.$reportingmonth.$reportingyear;
		$obj = new myFunctions;
		//check if table exists
		$checktable = $obj->checkifdataexists($txcurrtbl); 
		$tableid = $checktable['dataid'];
		if($tableid >= 1){
			$companyresults = $obj->countAlldata($txcurrtbl); 
			echo json_encode($companyresults);
		}
		else{
			echo "error";
		}
	}

	

?>