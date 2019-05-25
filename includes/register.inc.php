<?php
/**
 * Created by PhpStorm.
 * User: yannick
 * Date: 2019-05-25
 * Time: 15:08
 */

if (isset($_POST['register-submit'])) {

    require 'mysql/dbh.inc.php';

    $appName = $_POST['appName'];
    $appDescription = $_POST['appDescription'];
    $downloadLink = $_POST['downloadLink'];


    //Hauptkategorien
    $health = $_POST['health'];
    $prim = $_POST['prim'];
    $sek = $_POST['sek'];
    $patients = $_POST['patients'];
    $prof = $_POST['prof'];

    //Unterkategorien
    $asthma = $_POST['asthma'];
    $behandlung = $_POST['behandlung'];
    $blutdruck = $_POST['blutdruck'];
    $depression = $_POST['depression'];
    $diabetes = $_POST['diabetes'];
    $entspannung = $_POST['entspannung'];
    $ernaehrung = $_POST['ernaehrung'];
    $fitness = $_POST['fitness'];
    $hautkrankheiten = $_POST['hautkrankheiten'];
    $kinderkrankheiten = $_POST['kinderkrankheiten'];
    $krebs = $_POST['krebs'];
    $kreislaufkrankheiten = $_POST['kreislaufkrankheiten'];
    $leitlinien = $_POST['leitlinien'];
    $notfall = $_POST['notfall'];
    $schlaf = $_POST['schlaf'];
    $schwangerschaft = $_POST['schwangerschaft'];
    $vorsorge = $_POST['vorsorge'];
    $diverses = $_POST['diverses'];

    //Selbsdeklaration
    $reason_q1 = $_POST['reason_q1'];
    $reason_q2 = $_POST['reason_q2'];
    $risk_q1 = $_POST['risk_q1'];
    $risk_q2 = $_POST['risk_q2'];
    $ethnic_q1 = $_POST['ethnic_q1'];
    $ethnic_q2 = $_POST['ethnic_q2'];
    $ethnic_q3 = $_POST['ethnic_q3'];
    $law_q1 = $_POST['law_q1'];
    $content_q1 = $_POST['content_q1'];
    $content_q2 = $_POST['content_q2'];
    $technic_q1 = $_POST['technic_q1'];
    $technic_q2 = $_POST['technic_q2'];
    $use_q1 = $_POST['use_q1'];
    $use_q2 = $_POST['use_q2'];
    $ressource_q1 = $_POST['ressource_q1'];

    //Images
    $appIcon = $_POST['appIcon'];
    $screenshot = $_POST['screenshot'];





    $sql = "SELECT name FROM AppPost WHERE name=?";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {

        header("Location: ../signup.php?error=sqlerror");
        exit();

    } else {
        mysqli_stmt_bind_param($stmt, "s", $appName);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        $reulstCheck = mysqli_stmt_num_rows($stmt);
        if ($reulstCheck > 0) {

            header("Location: ../signup.php?error=AppNametaken");
            exit();
        } else {

            $sql = "INSERT INTO AppPost (name, description, image, appstorelink,reason_q1,reason_q2,risk_q1,risk_q2,ethnic_q1,ethnic_q2,ethnic_q3,law_q1,content_q1,content_q2,technic_q1,technic_q2,use_q1,use_q2,ressource_q1) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql)) {

                header("Location: ../signup.php?error=sqlerror");
                exit();
            } else {



                mysqli_stmt_bind_param($stmt, "sssssssssssssssssss", $appName,$appDescription, $appIcon, $downloadLink, $reason_q1,$reason_q2,$risk_q1,$risk_q2,$ethnic_q1,$ethnic_q2,$ethnic_q3,$law_q1,$content_q1,$content_q2,$technic_q1,$technic_q2,$use_q1,$use_q2,$ressource_q1);
                mysqli_stmt_execute($stmt);
                header("Location: ../pages/test.php?signup=success");
                exit();
            }
        }


    }



    mysqli_stmt_close($stmt);
    mysqli_close($con);








}