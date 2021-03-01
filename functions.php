<?php
	class myFunctions{
		private $host = "localhost";
		private $user = "root";
		private $db = "rtooli";
		private $pass = "Finess@Xeon";
		private $conn;

		/*** function to create database connection ***/
		public function __construct(){
			$this->conn = new PDO("mysql:host=".$this->host.";dbname=".$this->db,$this->user,$this->pass,[PDO::ATTR_EMULATE_PREPARES => false, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
		}

		/*** function to insert data ***/
		public function insertData($table,$tabledata){
			try{
				$prefix = "";
				$tablelist = "";
				foreach($tabledata as $col=>$value){
					$listvalues = $prefix."".$col."=:".$col;
					$prefix = ",";
					$tablelist = $tablelist."".$listvalues;
				}

				$dataprefix = "";
				$datalist = "";
				foreach($tabledata as $col=>$value){
					$listvalues = $dataprefix."':".$col."'=>".$value;
					$dataprefix = ",";
					$datalist = $datalist."".$listvalues;
				}

				$sql = "INSERT INTO $table SET ".$tablelist."";
				$q = $this ->conn->prepare($sql);
				$q->execute($tabledata);
				return true;
			}
			catch(PDOException $e){
				echo 'Error: ' . $e->getMessage();
			}			
		}

		/*** function to read all data from a table without a condition ****/
		public function readAlldata($table){
			try{
				$sql = "SELECT * FROM $table";
				$q = $this->conn->query($sql);
				while($r=$q->fetch(PDO::FETCH_ASSOC)){
					$data[]=$r;
				}
				if (isset($data)) {
			  		return $data;
				}
				else{
					$error = "No Data";
					return $error;
				}
			}
			catch(PDOException $e){
				echo 'Error: ' . $e->getMessage();
			}
		}

		/*** function to read all data from a table without a condition ****/
		public function readTopdata($table){
			try{
				$sql = "SELECT * FROM $table LIMIT 100";
				$q = $this->conn->query($sql);
				while($r=$q->fetch(PDO::FETCH_ASSOC)){
					$data[]=$r;
				}
				return $data;
			}
			catch(PDOException $e){
				echo 'Error: ' . $e->getMessage();
			}
		}

		/**** function to read data from specific columns without a condition ***/
		public function readSpecificdata($table,$tabledata){
			try{
				$prefix = "";
				$tablelist = "";
				foreach($tabledata as $value){
					$listvalues = $prefix."".$value;
					$prefix = ",";
					$tablelist = $tablelist."".$listvalues;
				}

				$sql = "SELECT $tablelist FROM $table";
				$q = $this->conn->query($sql);
				while($r=$q->fetch(PDO::FETCH_ASSOC)){
					$data[]=$r;
				}
				return $data;
			}
			catch(PDOException $e){
				echo 'Error: ' . $e->getMessage();
			}
		}

		/**** function to read all data from a table with a WHERE condition ***/
		public function readAlldatawhere($table, $tabledata){
			try{
				foreach($tabledata as $col=>$value){
					$col = $col;
					$colvalue = $value;
				}
				$sql = "SELECT * FROM $table WHERE $col = '$colvalue'";
				$q = $this->conn->query($sql);
				while($r=$q->fetch(PDO::FETCH_ASSOC)){
					$data[]=$r;
				}
				return $data;
			}
			catch(PDOException $e){
				echo 'Error: ' . $e->getMessage();
			}
		}
		/*** function to read data from specific columns with a WHERE condition ****/

		/*** function to count rows in a table ***/
		public function countAlldata($table){
			try{
				$sql = "SELECT count(*) AS Total FROM $table";
				$q = $this->conn->query($sql);
				while($r=$q->fetch(PDO::FETCH_ASSOC)){
					$data[]=$r;
				}
				return $data;
			}
			catch(PDOException $e){
				echo 'Error: ' . $e->getMessage();
			}
		}

		public function deathstoanalysis($table){
			try{
				$sql = "SELECT
					SUM(CASE WHEN PreviousStatus = 'Previous Active' and StartARTDate IS NOT NULL THEN 1 ELSE 0 END) AS 'TotalPreviousActive',
					SUM(CASE WHEN PreviousStatus = 'Previous LTFU' and StartARTDate IS NOT NULL THEN 1 ELSE 0 END) AS 'TotalPreviousLTFU',
					SUM(CASE WHEN StartARTDate IS NULL THEN 1 ELSE 0 END) AS 'TotalNotInART'
 					FROM $table";
				$q = $this->conn->query($sql);
				while($r=$q->fetch(PDO::FETCH_ASSOC)){
					$data[]=$r;
				}
				return $data;
			}
			catch(PDOException $e){
				echo 'Error: ' . $e->getMessage();
			}
		}

		/*** function to count rows where ***/
		public function countalldatawhere($table, $tabledata){
			try{
				foreach($tabledata as $col=>$value){
					$col = $col;
					$colvalue = $value;
				}
				$sql = "SELECT * FROM $table WHERE $col = '$colvalue'";
				$q = $this->conn->query($sql);
				while($r=$q->fetch(PDO::FETCH_ASSOC)){
					$data[]=$r;
				}
				return $data;
			}
			catch(PDOException $e){
				echo 'Error: ' . $e->getMessage();
			}
		}

		/*** function to update records in a table ***/
		public function updateDatawhere($table,$tablecol,$where){
			try{
				$joinarray = array_merge($tablecol,$where);
				$prefix = "";
				$tablelist = "";
				foreach($tablecol as $col=>$value){
					$listvalues = $prefix."".$col."=:".$col;
					$prefix = ",";
					$tablelist = $tablelist."".$listvalues;
				}

				$whereprefix = "";
				$wherelist = "";
				foreach($where as $colwhere=>$valuewhere){
					$wherelistvalues = $whereprefix."".$colwhere."=:".$colwhere;
					$whereprefix = ",";
					$wherelist = $wherelist."".$wherelistvalues;
				}

				$sql = "UPDATE $table SET ".$tablelist." WHERE ".$wherelist."";
				$q = $this->conn->prepare($sql);
				$q->execute($joinarray);
				return true;
			}
			catch(PDOException $e){
				echo 'Error: ' . $e->getMessage();
			}
		}

		/*** function to generate password ***/
		function generateStrongPassword()
		{
			$length = 9;
			$add_dashes = false;
			$available_sets = 'luds';
			$sets = array();
			if(strpos($available_sets, 'l') !== false)
				$sets[] = 'abcdefghjkmnpqrstuvwxyz';
			if(strpos($available_sets, 'u') !== false)
				$sets[] = 'ABCDEFGHJKMNPQRSTUVWXYZ';
			if(strpos($available_sets, 'd') !== false)
				$sets[] = '23456789';
			if(strpos($available_sets, 's') !== false)
				$sets[] = '!@#$%&*?';
			$all = '';
			$password = '';
			foreach($sets as $set)
			{
				$password .= $set[array_rand(str_split($set))];
				$all .= $set;
			}
			$all = str_split($all);
			for($i = 0; $i < $length - count($sets); $i++)
				$password .= $all[array_rand($all)];
			$password = str_shuffle($password);
			if(!$add_dashes)
				return $password;
			$dash_len = floor(sqrt($length));
			$dash_str = '';
			while(strlen($password) > $dash_len)
			{
				$dash_str .= substr($password, 0, $dash_len) . '-';
				$password = substr($password, $dash_len);
			}
			$dash_str .= $password;
			return $dash_str;
		}
		/*** function to generate password manganese ***/

		public function generateHash($password){
			/*** generate the password salt ***/
			$salt = substr(strtr(base64_encode(openssl_random_pseudo_bytes(22)), '+', '.'), 0, 22);
			/*** generate password hash ***/
			$hash = crypt($password, '$2y$12$' . $salt);
			$hasharray = array("salt"=>"".$salt."","password"=>"".$hash."");
			return $hasharray;
		}

		/*** hash paswword with manganese ****/
		public function hashPassword($password,$manganese){
			$hash = crypt($password, '$2y$12$' . $manganese);
			return $hash;
		}

		public function readAllorderdesc($table, $tabledata, $order){
			try{
				foreach($tabledata as $col=>$value){
					$col = $col;
					$colvalue = $value;
				}
				$sql = "SELECT * FROM $table WHERE $col = '$colvalue' ORDER BY $order ASC";
				$q = $this->conn->query($sql);
				while($r=$q->fetch(PDO::FETCH_ASSOC)){
					$data[]=$r;
				}
				return $data;
			}
			catch(PDOException $e){
				echo 'Error: ' . $e->getMessage();
			}
		}


		// public function refreshtxcurr($indicator,$reportingdate,$newmonthdate,$reportingmonth,$reportingyear){
		// 	try{
		// 		// foreach($tabledata as $col=>$value){
		// 		// 	$col = $col;
		// 		// 	$colvalue = $value;
		// 		// }
		// 		// $sql = "SELECT * FROM $table WHERE $col = '$colvalue' ORDER BY $order ASC";
		// 		// $q = $this->conn->query($sql);
		// 		// while($r=$q->fetch(PDO::FETCH_ASSOC)){
		// 		// 	$data[]=$r;
		// 		// }
		// 		// return $data;
		// 		//$sql = "call sp_refreshtxcurr('$indicator','$reportingdate','$newmonthdate','$reportingmonth','$reportingyear');";
		// 		$stpro = $this->conn->prepare("CALL sp_refreshtxcurr(?, ?, ?, ?, ?, @TotalTx)");
		// 		$stpro->bindParam(1, $indicator, PDO::PARAM_STR, 100);
		// 		$stpro->bindParam(2, $reportingdate, PDO::PARAM_STR, 100);
		// 		$stpro->bindParam(3, $newmonthdate, PDO::PARAM_STR, 100);
		// 		$stpro->bindParam(4, $reportingmonth, PDO::PARAM_STR, 100);
		// 		$stpro->bindParam(5, $reportingyear, PDO::PARAM_STR, 100);
		// 		// while($result = $stpro->fetch(PDO::FETCH_ASSOC)) {
		// 		// 	$data[]=$result;
		// 		// }
		// 		// return $data;
		// 		$stpro->execute();
		// 		$query = $conn->query("SELECT @TotalTx as result")->fetch(PDO::FETCH_OBJ);
  //   			echo $query->result;
		// 	}
		// 	catch(PDOException $e){
		// 		echo 'Error: ' . $e->getMessage();
		// 	}
		// }


		//function to generate txcurr data
		public function refreshtxcurr($indicator,$reportingdate,$newmonthdate,$reportingmonth,$reportingyear){
			$sql = 'CALL sp_refreshtxcurr(:indicator,:reportingdate,:newmonthdate,:reportingmonth,:reportingyear,@total)';
			$this->conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, true);
			$stmt = $this->conn->prepare($sql);
			$stmt->bindParam(':indicator', $indicator, PDO::PARAM_STR, 100);
			$stmt->bindParam(':reportingdate', $reportingdate, PDO::PARAM_STR, 100);
			$stmt->bindParam(':newmonthdate', $newmonthdate, PDO::PARAM_STR, 100);
			$stmt->bindParam(':reportingmonth', $reportingmonth, PDO::PARAM_STR, 100);
			$stmt->bindParam(':reportingyear', $reportingyear, PDO::PARAM_STR, 100);
			$stmt->execute();
	        $res = $stmt->fetchAll();
		    $stmt->nextRowset();
		    $stmt->closeCursor();
        	return $res;
		}

		//function to generate txcurr data
		public function refreshtxnew($indicator,$endoflastreportingperiod,$startofcurrentreportingperiod,$endofcurrentreportingperiod,$startofnextreportingperiod,$currentreportingmonth,$currentreportingyear){
			$sql = 'CALL sp_refreshtxnew(:indicator,:endoflastreportingperiod,:startofcurrentreportingperiod,:endofcurrentreportingperiod,:startofnextreportingperiod,:currentreportingmonth,:currentreportingyear,@total)';
			$this->conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, true);
			$stmt = $this->conn->prepare($sql);
			$stmt->bindParam(':indicator', $indicator, PDO::PARAM_STR, 100);
			$stmt->bindParam(':endoflastreportingperiod', $endoflastreportingperiod, PDO::PARAM_STR, 100);
			$stmt->bindParam(':startofcurrentreportingperiod', $startofcurrentreportingperiod, PDO::PARAM_STR, 100);
			$stmt->bindParam(':endofcurrentreportingperiod', $endofcurrentreportingperiod, PDO::PARAM_STR, 100);
			$stmt->bindParam(':startofnextreportingperiod', $startofnextreportingperiod, PDO::PARAM_STR, 100);
			$stmt->bindParam(':currentreportingmonth', $currentreportingmonth, PDO::PARAM_STR, 100);
			$stmt->bindParam(':currentreportingyear', $currentreportingyear, PDO::PARAM_STR, 100);
			$stmt->execute();
	        $res = $stmt->fetchAll();
		    $stmt->nextRowset();
		    $stmt->closeCursor();
        	return $res;
		}

		//function to refresh rtts
		public function refreshtxrtt($indicator,$endoflastreportingperiod,$startofcurrentreportingperiod,$endofcurrentreportingperiod,$startofnextreportingperiod,$currentreportingmonth,$currentreportingyear){
			$sql = 'CALL sp_refreshrtt(:indicator,:endoflastreportingperiod,:startofcurrentreportingperiod,:endofcurrentreportingperiod,:startofnextreportingperiod,:currentreportingmonth,:currentreportingyear,@total)';
			$this->conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, true);
			$stmt = $this->conn->prepare($sql);
			$stmt->bindParam(':indicator', $indicator, PDO::PARAM_STR, 100);
			$stmt->bindParam(':endoflastreportingperiod', $endoflastreportingperiod, PDO::PARAM_STR, 100);
			$stmt->bindParam(':startofcurrentreportingperiod', $startofcurrentreportingperiod, PDO::PARAM_STR, 100);
			$stmt->bindParam(':endofcurrentreportingperiod', $endofcurrentreportingperiod, PDO::PARAM_STR, 100);
			$stmt->bindParam(':startofnextreportingperiod', $startofnextreportingperiod, PDO::PARAM_STR, 100);
			$stmt->bindParam(':currentreportingmonth', $currentreportingmonth, PDO::PARAM_STR, 100);
			$stmt->bindParam(':currentreportingyear', $currentreportingyear, PDO::PARAM_STR, 100);
			$stmt->execute();
	        $res = $stmt->fetchAll();
		    $stmt->nextRowset();
		    $stmt->closeCursor();
        	return $res;
		}

		//function to refresh tis
		public function refreshtis($indicator,$endoflastreportingperiod,$startofcurrentreportingperiod,$endofcurrentreportingperiod,$startofnextreportingperiod,$currentreportingmonth,$currentreportingyear){
			$sql = 'CALL sp_refreshtis(:indicator,:endoflastreportingperiod,:startofcurrentreportingperiod,:endofcurrentreportingperiod,:startofnextreportingperiod,:currentreportingmonth,:currentreportingyear,@total)';
			$this->conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, true);
			$stmt = $this->conn->prepare($sql);
			$stmt->bindParam(':indicator', $indicator, PDO::PARAM_STR, 100);
			$stmt->bindParam(':endoflastreportingperiod', $endoflastreportingperiod, PDO::PARAM_STR, 100);
			$stmt->bindParam(':startofcurrentreportingperiod', $startofcurrentreportingperiod, PDO::PARAM_STR, 100);
			$stmt->bindParam(':endofcurrentreportingperiod', $endofcurrentreportingperiod, PDO::PARAM_STR, 100);
			$stmt->bindParam(':startofnextreportingperiod', $startofnextreportingperiod, PDO::PARAM_STR, 100);
			$stmt->bindParam(':currentreportingmonth', $currentreportingmonth, PDO::PARAM_STR, 100);
			$stmt->bindParam(':currentreportingyear', $currentreportingyear, PDO::PARAM_STR, 100);
			$stmt->execute();
	        $res = $stmt->fetchAll();
		    $stmt->nextRowset();
		    $stmt->closeCursor();
        	return $res;
		}


		//function to refresh deaths
		public function refreshdeaths($indicator,$endoflastreportingperiod,$startofcurrentreportingperiod,$endofcurrentreportingperiod,$startofnextreportingperiod,$currentreportingmonth,$currentreportingyear){
			$sql = 'CALL sp_refreshdeaths(:indicator,:endoflastreportingperiod,:startofcurrentreportingperiod,:endofcurrentreportingperiod,:startofnextreportingperiod,:currentreportingmonth,:currentreportingyear,@total)';
			$this->conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, true);
			$stmt = $this->conn->prepare($sql);
			$stmt->bindParam(':indicator', $indicator, PDO::PARAM_STR, 100);
			$stmt->bindParam(':endoflastreportingperiod', $endoflastreportingperiod, PDO::PARAM_STR, 100);
			$stmt->bindParam(':startofcurrentreportingperiod', $startofcurrentreportingperiod, PDO::PARAM_STR, 100);
			$stmt->bindParam(':endofcurrentreportingperiod', $endofcurrentreportingperiod, PDO::PARAM_STR, 100);
			$stmt->bindParam(':startofnextreportingperiod', $startofnextreportingperiod, PDO::PARAM_STR, 100);
			$stmt->bindParam(':currentreportingmonth', $currentreportingmonth, PDO::PARAM_STR, 100);
			$stmt->bindParam(':currentreportingyear', $currentreportingyear, PDO::PARAM_STR, 100);
			$stmt->execute();
	        $res = $stmt->fetchAll();
		    $stmt->nextRowset();
		    $stmt->closeCursor();
        	return $res;
		}

		//function to refresh tos
		public function refreshtos($indicator,$endoflastreportingperiod,$startofcurrentreportingperiod,$endofcurrentreportingperiod,$startofnextreportingperiod,$currentreportingmonth,$currentreportingyear){
			$sql = 'CALL sp_refreshtos(:indicator,:endoflastreportingperiod,:startofcurrentreportingperiod,:endofcurrentreportingperiod,:startofnextreportingperiod,:currentreportingmonth,:currentreportingyear,@total)';
			$this->conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, true);
			$stmt = $this->conn->prepare($sql);
			$stmt->bindParam(':indicator', $indicator, PDO::PARAM_STR, 100);
			$stmt->bindParam(':endoflastreportingperiod', $endoflastreportingperiod, PDO::PARAM_STR, 100);
			$stmt->bindParam(':startofcurrentreportingperiod', $startofcurrentreportingperiod, PDO::PARAM_STR, 100);
			$stmt->bindParam(':endofcurrentreportingperiod', $endofcurrentreportingperiod, PDO::PARAM_STR, 100);
			$stmt->bindParam(':startofnextreportingperiod', $startofnextreportingperiod, PDO::PARAM_STR, 100);
			$stmt->bindParam(':currentreportingmonth', $currentreportingmonth, PDO::PARAM_STR, 100);
			$stmt->bindParam(':currentreportingyear', $currentreportingyear, PDO::PARAM_STR, 100);
			$stmt->execute();
	        $res = $stmt->fetchAll();
		    $stmt->nextRowset();
		    $stmt->closeCursor();
        	return $res;
		}


		//function to refresh ltfu
		public function refreshltfu($indicator,$endoflastreportingperiod,$startofcurrentreportingperiod,$endofcurrentreportingperiod,$startofnextreportingperiod,$currentreportingmonth,$currentreportingyear,$previoustxcurrtbl,$currenttxcurrtbl,$currentdeathstbl,$currenttostbl){
			$sql = 'CALL sp_refreshltfu(:indicator,:endoflastreportingperiod,:startofcurrentreportingperiod,:endofcurrentreportingperiod,:startofnextreportingperiod,:currentreportingmonth,:currentreportingyear,:previoustxcurrtbl,:currenttxcurrtbl,:currentdeathstbl,:currenttostbl,@total)';
			$this->conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, true);
			$stmt = $this->conn->prepare($sql);
			$stmt->bindParam(':indicator', $indicator, PDO::PARAM_STR, 100);
			$stmt->bindParam(':endoflastreportingperiod', $endoflastreportingperiod, PDO::PARAM_STR, 100);
			$stmt->bindParam(':startofcurrentreportingperiod', $startofcurrentreportingperiod, PDO::PARAM_STR, 100);
			$stmt->bindParam(':endofcurrentreportingperiod', $endofcurrentreportingperiod, PDO::PARAM_STR, 100);
			$stmt->bindParam(':startofnextreportingperiod', $startofnextreportingperiod, PDO::PARAM_STR, 100);
			$stmt->bindParam(':currentreportingmonth', $currentreportingmonth, PDO::PARAM_STR, 100);
			$stmt->bindParam(':currentreportingyear', $currentreportingyear, PDO::PARAM_STR, 100);
			$stmt->bindParam(':previoustxcurrtbl', $previoustxcurrtbl, PDO::PARAM_STR, 100);
			$stmt->bindParam(':currenttxcurrtbl', $currenttxcurrtbl, PDO::PARAM_STR, 100);
			$stmt->bindParam(':currentdeathstbl', $currentdeathstbl, PDO::PARAM_STR, 100);
			$stmt->bindParam(':currenttostbl', $currenttostbl, PDO::PARAM_STR, 100);
			$stmt->execute();
	        $res = $stmt->fetchAll();
		    $stmt->nextRowset();
		    $stmt->closeCursor();
        	return $res;
		}

		//function to check if table exixts
		public function checkifdataexists($txcurrtbl){
        	try{
        		$table = "tr_generateddata";
        		$data = [];
				$sql = "SELECT dataid FROM $table WHERE reportingtable = '$txcurrtbl'";
				$q = $this->conn->query($sql);
				// while($r=$q->fetch(PDO::FETCH_ASSOC)){
				// 	$data[]=$r;
				// 	//prnt_r($r);
				// }
				// return $data;
				$r=$q->fetch(PDO::FETCH_ASSOC);
				return $r;
			}
			catch(PDOException $e){
				echo 'Error: ' . $e->getMessage();
			}
		}


		public function agegenderdistribution($reportingtbl){
        	try{
        		$data = [];
				$sql = "SELECT * FROM(
				SELECT AgeCategory AS age,
				SUM(CASE WHEN gender = 'M' THEN 1 ELSE 0 END) AS 'male',
				SUM(CASE WHEN gender = 'F' THEN 1 ELSE 0 END) AS 'female',
				CASE WHEN AgeCategory = '<1' THEN 1 
						WHEN AgeCategory = '1-4' THEN 2 
						WHEN AgeCategory = '5-9' THEN 3 
						WHEN AgeCategory = '10-14' THEN 4 
						WHEN AgeCategory = '15-19' THEN 5
						WHEN AgeCategory = '20-24' THEN 6 
						WHEN AgeCategory = '25-29' THEN 7 
						WHEN AgeCategory = '30-34' THEN 8 
						WHEN AgeCategory = '35-39' THEN 9
						WHEN AgeCategory = '40-44' THEN 10 
						WHEN AgeCategory = '45-49' THEN 11
						WHEN AgeCategory = '50+' THEN 12 
				        ELSE 0 END AS AgeCategoryPosition
				FROM(
					SELECT *
				    FROM $reportingtbl
				)txcurr GROUP BY AgeCategory 
				)txcurrdata ORDER BY AgeCategoryPosition ASC";
				$q = $this->conn->query($sql);
				while($r=$q->fetch(PDO::FETCH_ASSOC)){
					$data[]=$r;
					//prnt_r($r);
				}
				return $data;
				//$r=$q->fetch(PDO::FETCH_ASSOC);
				//return $r;
			}
			catch(PDOException $e){
				echo 'Error: ' . $e->getMessage();
			}
		}

	}
?>