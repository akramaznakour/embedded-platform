<?php

require './pdf/pdf.php';
require '../dataBase/Database.php';
$database = new Database();


$pdf = new PDF();

// Titres des colonnes
foreach ($database->getDay_results() as $day_result)
    $data[] = [substr($day_result->getDay(), 0,10), $day_result->getTemperature(), $day_result->getHumidity()];

$header = array('DAY', 'Temperature ', 'Humidity');
// Chargement des données
$pdf->SetFont('Arial', '', 14);
$pdf->AddPage();
$pdf->BasicTable($header, $data);

$pdf->Output('I','data');
?>
