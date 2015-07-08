<script type="text/javascript">
   $('#loader').show();
</script>
<?php

 // Completa los datos
$buyer_email = urlencodechar($buyer_email);
$buyer_lastname = urlencodechar($buyer_lastname);
$buyer_name = urlencodechar($buyer_name);
$buyer_phone = urlencodechar($buyer_phone);
$country_id = urlencodechar("1");
$item_ammount_1 = urlencodechar($item_ammount_1);
$item_name_1 = urlencodechar($item_name_1);
$item_quantity_1 = urlencodechar("1");

// Usuario de modo seguro
$merchant = urlencodechar("0FDFC212-F384-44AA-B1C6-2556E4E3EA57");
$ok_url = urlencodechar("http://congresosantiago.com.ar");
$payment_method_available = urlencodechar("all");
$pending_url = urlencodechar("http://congresosantiago.com.ar");
$transaction_id = rand(-2147483648 , 2147483647);
$transaction_id = urlencodechar($transaction_id);

function urlencodechar($str){
    $newstrencode="";
	$countstr=strlen($str);	
	for($i=0;$i<$countstr;$i++){		
		$newstr = substr($str, $i,1);
		if($newstr==" "){
			$strencode="%20";
		}
		else{
			$strencode=urlencode($newstr);
		}
		if(substr_count($strencode, "%")==0){
			$newstrencode .=$strencode;				
		}
		else{
			$newstrencodeaux=strtolower($strencode);
			$newstrencode .=$newstrencodeaux;
		}		
	}
	return $newstrencode; 	
}
$concatenar = "buyer_email=".$buyer_email;
$concatenar .= "&buyer_lastname=".$buyer_lastname;
$concatenar .= "&buyer_name=".$buyer_name;
$concatenar .= "&buyer_phone=".$buyer_phone;
$concatenar .= "&country_id=".$country_id;
$concatenar .= "&item_ammount_1=".$item_ammount_1;
$concatenar .= "&item_name_1=".$item_name_1;
$concatenar .= "&item_quantity_1=".$item_quantity_1;
$concatenar .= "&merchant=".$merchant;
$concatenar .= "&ok_url=".$ok_url;
$concatenar .= "&payment_method_available=".$payment_method_available;
$concatenar .= "&pending_url=".$pending_url;
$concatenar .= "&transaction_id=".$transaction_id;

//data concatenated + Key
$hash = md5($concatenar."BB121E30-B638-4BF7-AA4E-C0C8AD091665");
?>
<div id="loader"></div>
<form action="https://checkout.dineromail.com/CheckOut"  method="post" id="frmDineromail" name="frmDineromail" target="">
	<input type="hidden" name="buyer_email" value="<?php echo $buyer_email; ?>" />
	<input type="hidden" name="buyer_lastname" value="<?php echo $buyer_lastname; ?>" />
	<input type="hidden" name="buyer_name" value="<?php echo $buyer_name; ?>" />
	<input type="hidden" name="buyer_phone" value="<?php echo $buyer_phone; ?>" />
	<input type="hidden" name="country_id" value="<?php echo $country_id; ?>" />
	<input type="hidden" name="item_ammount_1" value="<?php echo $item_ammount_1; ?>" />
	<input type="hidden" name="item_name_1" value="<?php echo $item_name_1; ?>" />
	<input type="hidden" name="item_quantity_1" value="<?php echo $item_quantity_1; ?>" />
	<input type="hidden" name="merchant" value="<?php echo $merchant; ?>" />
	<input type="hidden" name="ok_url" value="<?php echo $ok_url; ?>" />
	<input type="hidden" name="payment_method_available" value="<?php echo $payment_method_available; ?>" />
    <input type="hidden" name="pending_url" value="<?php echo $pending_url; ?>" />
	<input type="hidden" name="transaction_id" value="<?php echo $transaction_id; ?>" />
	<input type="hidden" name="hash" value="<?php echo $hash; ?>" />

</form>
<script type="text/javascript">
  setTimeout(refrescar, 500);
</script>


