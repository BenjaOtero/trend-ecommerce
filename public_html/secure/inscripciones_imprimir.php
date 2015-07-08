 <?php
require('../../controllers/componentes/fpdf.php');
class PDF extends FPDF
{
    function conectar() {
        $server="localhost";
        $user="congres1_base";
        $pass="8953#AFjn";
        $cone=mysql_connect($server,$user,$pass) or die("Error en la conexion al servidor");
        mysql_select_db("congres1_base",$cone) or die("Error en la conexion con la base de datos");
        return $cone;
    }
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
//Creación del objeto de la clase heredada
$pdf=new PDF();
$conex= $pdf->conectar();
$sql="select * from inscripcion";
$consulta=@mysql_query($sql, $conex) or die('Error en el query: '.mysql_errno($conex).' - '.mysql_error($conex));
mysql_close($conex);

$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',11);
while($resultado = mysql_fetch_array($consulta)){
    $pdf->Cell(25,5,$resultado['nro_documento'],1,0,'C');
    $pdf->Cell(50,5,$resultado['apellido'],1,0,'C');
    $pdf->Cell(50,5,$resultado['nombre'],1,0,'C');
    $pdf->Cell(70,5,$resultado['correo'],1,0,'C');
    $pdf->Ln();
}
$pdf->Output();

?>