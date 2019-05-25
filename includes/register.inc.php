<?php
/**
 * Created by PhpStorm.
 * User: yannick
 * Date: 2019-05-25
 * Time: 15:08
 */

if (isset($_POST['register-submit'])) {

    require 'mysql/dbh.inc.php';






    //Selbsdeklaration







    if ($conn->connect_error){
        die("Connection failed: " .$conn->connect_error);
    }

    $stmt = $conn->prepare("INSERT INTO AppPost (name, description, appstorelink, reason_q1, reason_q2, risk_q1,risk_q2,ethnic_q1,ethnic_q2) VALUES (?,?,?,?,?,?,?,?,?)");
    $stmt ->bind_param("sssssssss", $appName, $appDescription, $downloadLink, $reasonq1, $reasonq2,$risk_q1,$risk_q2,$ethnic_q1,$ethnic_q2);


    $appName = $_POST['appName'];
    $appDescription = $_POST['appDescription'];
    $downloadLink = $_POST['downloadLink'];
    $reasonq1 = $_POST['reasonq1'];
    $reasonq2 = $_Post['reasonq2'];
    $risk_q1 = $_Post['risk_q1'];
    $risk_q2 = $_Post['risk_q2'];
    $ethnic_q1 = $_Post['ethnic_q1'];
    $ethnic_q2 = $_Post['ethnic_q2'];
    $ethnic_q3 = $_Post['ethnic_q3'];
    $law_q1 = $_Post['law_q1'];
    $content_q1 = $_Post['content_q1'];
    $content_q2 = $_Post['content_q2'];
    $technic_q1 = $_Post['technic_q1'];
    $technic_q2 = $_Post['technic_q2'];
    $use_q1 = $_Post['use_q1'];
    $use_q2 = $_Post['use_q2'];
    $ressource_q1 = $_Post['ressource_q1'];

    $stmt->execute();

    $stmt->close();
    $conn->close();






}