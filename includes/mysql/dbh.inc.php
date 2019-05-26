<?php
/**
 * Created by PhpStorm.
 * User: yannick
 * Date: 2019-05-17
 * Time: 16:55
 */

$servername = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "pedipla";

$conn = mysqli_connect($servername, $dBUsername, $dBPassword, $dBName);

if(!$conn){
    die("Connection failed: ".mysqli_connect_error());
}