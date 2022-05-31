<?php
$servername = 'localhost:3306';
$username = 'root';
$password = '';
$database_name= 'trainingstudio_tms';

$conn = new mysqli($servername,$username,$password,$database_name);

if($conn-> connect_error){
    echo "failed";
    }
    else{
        echo "succssful*2";
    }