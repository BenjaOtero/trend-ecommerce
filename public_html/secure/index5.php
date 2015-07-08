 <?php
require('../../controllers/componentes/fpdf.php');
require('../../models/inscripciones_mdl.php');
class PDF extends FPDF
{
    function Header()
    {
        $this->Image('../app_images/logo_rpt.jpg',70,8,60);
        $this->Ln(15);
        // Arial bold 15
        $this->SetFont('Arial','B',13);
        // Título
        $this->Cell(25,5,'Nro Doc',1,0,'C');
        $this->Cell(50,5,'Apellido',1,0,'C');
        $this->Cell(50,5,'Nombre',1,0,'C');
        $this->Cell(70,5,'Correo',1,0,'C');
        // Salto de línea
        $this->Ln(5);
    }
    function Footer()
    {
        // Posición: a 1,5 cm del final
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial','I',8);
        // Número de página
        $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
    }
}
$modelo = new InscripcionMDL();
//Creación del objeto de la clase heredada
$pdf=new PDF();
$filas=$modelo->Imprimir();

$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',11);
while($rows = mysql_fetch_array($filas)){
    $pdf->Cell(25,5,$rows['nro_documento'],1,0,'C');
    $pdf->Cell(50,5,$rows['apellido'],1,0,'C');
    $pdf->Cell(50,5,$rows['nombre'],1,0,'C');
    $pdf->Cell(70,5,$rows['correo'],1,0,'C');
    $pdf->Ln();
}
$pdf->Output();

?>