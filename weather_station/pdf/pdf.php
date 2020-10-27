<?php
require 'pdf/fpdf/fpdf.php';

class PDF extends FPDF
{
        // Tableau simple
    function BasicTable($header, $data)
    {
        // En-tête
        foreach ($header as $col)
            $this->Cell(65, 8, $col, 1);
        $this->Ln();
        // Données
        foreach ($data as $row) {
            foreach ($row as $col)
                $this->Cell(65, 8, $col, 1);
            $this->Ln();
        }
    }
}

?>