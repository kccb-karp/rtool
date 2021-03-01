<?php
$db_host = 'localhost';
$db_username = 'root';
$db_password = 'karp@2018';
$db_name = 'rtool';
 
$db = new mysqli($db_host, $db_username, $db_password, $db_name);
 
if($db->connect_error){
    die("Unable to connect database: " . $db->connect_error);
}

require_once "../vendor/autoload.php";
//require_once "db.php";
 
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

ini_set('memory_limit', '-1');
$spreadsheet = new Spreadsheet();
$Excel_writer = new Xlsx($spreadsheet);
 
$spreadsheet->setActiveSheetIndex(0);
$activeSheet = $spreadsheet->getActiveSheet();
 
$activeSheet->setCellValue('A1', 'FacilityName');
$activeSheet->setCellValue('B1', 'CCCNumber');
$activeSheet->setCellValue('C1', 'gender');
$activeSheet->setCellValue('D1', 'Person Id');
$activeSheet->setCellValue('E1', 'gender');
$activeSheet->setCellValue('F1', 'DOB');
$activeSheet->setCellValue('G1', 'Last Visit Age');
$activeSheet->setCellValue('H1', 'Patient Type');
$activeSheet->setCellValue('I1', 'ART Initiation Date');
$activeSheet->setCellValue('J1', 'Drug Initiation Date');
$activeSheet->setCellValue('K1', 'HIV Enrollment Date');
$activeSheet->setCellValue('L1', 'Last Visit Date');
$activeSheet->setCellValue('M1', 'Next Appointment');
$activeSheet->setCellValue('N1', 'Defaulting Day');
$activeSheet->setCellValue('O1', 'Drug Start Date');
$activeSheet->setCellValue('P1', 'Program');
$activeSheet->setCellValue('Q1', 'Last Regimen');
$activeSheet->setCellValue('R1', 'Last Regimen Name');
$activeSheet->setCellValue('S1', 'Last Regimen Line');
$activeSheet->setCellValue('T1', 'Last VL');
$activeSheet->setCellValue('U1', 'VL Result Text');
$activeSheet->setCellValue('V1', 'Last VL Date');
$activeSheet->setCellValue('W1', 'Pregnancy');
$activeSheet->setCellValue('X1', 'Age Category');
 
$query = $db->query("SELECT * FROM txcurrDecFinal");
 
if($query->num_rows > 0) {
    $i = 2;
    while($row = $query->fetch_assoc()) {
        $activeSheet->setCellValue('A'.$i , $row['FacilityName']);
        $activeSheet->setCellValue('B'.$i , $row['MFLCode']);
        $activeSheet->setCellValue('C'.$i , $row['CCCNumber']);
        $activeSheet->setCellValue('D'.$i , $row['person_id']);
        $activeSheet->setCellValue('E'.$i , $row['gender']);
        $activeSheet->setCellValue('F'.$i , $row['birthdate']);
        $activeSheet->setCellValue('G'.$i , $row['AgeAtLastVisit']);
        $activeSheet->setCellValue('H'.$i , $row['patienttype']);
        $activeSheet->setCellValue('I'.$i , $row['ARTInitiationDate']);
        $activeSheet->setCellValue('J'.$i , $row['drugInitiationDate']);
        $activeSheet->setCellValue('K'.$i , $row['HIVEnrollmentDate']);
        $activeSheet->setCellValue('L'.$i , $row['LastVisitDate']);
        $activeSheet->setCellValue('M'.$i , $row['NextAppointmentDate']);
        $activeSheet->setCellValue('N'.$i , $row['defaultingday']);
        $activeSheet->setCellValue('O'.$i , $row['drugstartdate']);
        $activeSheet->setCellValue('P'.$i , $row['program']);
        $activeSheet->setCellValue('Q'.$i , $row['LastRegimen']);
        $activeSheet->setCellValue('R'.$i , $row['LastRegimenName']);
        $activeSheet->setCellValue('S'.$i , $row['LastRegimenLine']);
        $activeSheet->setCellValue('T'.$i , $row['LastVLResult']);
        $activeSheet->setCellValue('U'.$i , $row['LastVLResultText']);
        $activeSheet->setCellValue('V'.$i , $row['LastVLDate']);
        $activeSheet->setCellValue('W'.$i , $row['PregnancyStatus']);
        $activeSheet->setCellValue('X'.$i , $row['AgeCategory']);
        $i++;
    }
}
 
$filename = 'txcurr.xlsx';
 
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename='. $filename);
header('Cache-Control: max-age=0');
$Excel_writer->save('php://output');