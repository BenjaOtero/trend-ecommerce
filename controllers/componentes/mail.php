<?php
$mailTo = "info@congresosantiago.com.ar";
$mailNombre = $_POST['txtNombre'];
$mailFrom = $_POST['txtMail'];
$mailFromName = $_POST['txtNombre'];
$mailSubject = "Consulta a Congreso Santiago";
$mailMessage = $_POST['txtArea'].". Telefono: ".$_POST['txtTe'];
mail($mailTo, $mailSubject, $mailMessage, "From: $mailFromName <$mailFrom>\r\n");
echo "<center><b><p style='color: #ffffff'>Su mensaje se envío correctamente</p></b></center>";
?>