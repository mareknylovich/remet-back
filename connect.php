<?php

$connect = mysqli_connect($hostname = 'localhost',
                          $username = 'root',
                          $password = 'Sumutise100',
                          $database = 'proj');

if (!$connect)
{
    echo "Error";
}