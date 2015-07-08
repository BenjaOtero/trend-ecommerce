<?php
  function cleanString($string){
    $string=trim($string);
    $string=mysql_escape_string($string);
	$string=htmlspecialchars($string);
    return $string;
  }
$mailTo = "info@karminna.com.ar";
$mailNombre = cleanString($_POST['txtNombre']);
$mailFrom = cleanString($_POST['txtMail']);
$mailFromName = cleanString($_POST['txtNombre']);
$mailSubject = "Consulta a Karminna";
$mailMessage = cleanString($_POST['txtArea']).". Telefono: ".cleanString($_POST['txtTe']);
mail($mailTo, $mailSubject, $mailMessage, "From: $mailFromName <$mailFrom>\r\n");
echo "<center><b><p style='color: #fff'>Su mensaje se envío correctamente</p></b></center>";
?>
<script type="text/javascript">
    setTimeout(refrescar, 2500);
    function refrescar(){
        document.frmContacto.txtNombre.value = "";
        document.frmContacto.txtMail.value = "";
        document.frmContacto.txtTe.value = "";
        document.frmContacto.txtArea.value = "";
        $('#popupmail').hide();
        $('#blockmail').hide();
    }
</script>
