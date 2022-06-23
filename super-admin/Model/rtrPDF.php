<?php
require("fpdf183/fpdf.php");


class rtrPDF extends FPDF{
    function header(){
        $this->SetFont('Arial','B',15);
        $this->Rect(5,5,200,275,'D');
        $this->Image("../assets/images/pdfheader/pdfhead.png",40,3,150);
        $this->Ln();
        $this->SetFont("Times",'',15);
        $this->Ln(20);
    }
    
    function SetCol($col){
    // Set position at a given column
    $this->col = $col;
    $x = 10+$col*65;
    $this->SetLeftMargin($x);
    $this->SetX($x);
    }
    
    function footer(){
      $this->SetY(-15);
        // Select Arial italic 8
        $this->SetFont('Arial','I',8);
        // Print centered page number
        $this->Cell(0,10,'Page '.$this->PageNo(),0,0,'C');
        
    }
    

}