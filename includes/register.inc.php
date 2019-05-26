<?php
/**
 * Created by PhpStorm.
 * User: yannick
 * Date: 2019-05-25
 * Time: 15:08
 */

if (isset($_POST['register-submit'])) {

    require 'mysql/dbh.inc.php';
    require 'category.php';

    $appName = $_POST['appName'];
    $appDescription = $_POST['appDescription'];
    $downloadLink = $_POST['downloadLink'];


    //Hauptkategorien
    $cat1 = $_POST['health'];
    $cat2 = $_POST['prim'];
    $cat3 = $_POST['sek'];
    $cat4 = $_POST['patients'];
    $cat5 = $_POST['prof'];

    //Unterkategorien
    $subCat1 = $_POST['asthma'];
    $subCat2 = $_POST['behandlung'];
    $subCat3 = $_POST['blutdruck'];
    $subCat4 = $_POST['depression'];
    $subCat5 = $_POST['diabetes'];
    $subCat6 = $_POST['entspannung'];
    $subCat7 = $_POST['ernaehrung'];
    $subCat8 = $_POST['fitness'];
    $subCat9 = $_POST['hautkrankheiten'];
    $subCat10 = $_POST['kinderkrankheiten'];
    $subCat11 = $_POST['krebs'];
    $subCat12 = $_POST['kreislaufkrankheiten'];
    $subCat13 = $_POST['leitlinien'];
    $subCat14 = $_POST['notfall'];
    $subCat15 = $_POST['schlaf'];
    $subCat16 = $_POST['schwangerschaft'];
    $subCat17 = $_POST['vorsorge'];
    $subCat18 = $_POST['diverses'];

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


    //FILE
    $file = $_FILES['file'];

    $fileName = $_FILES['file']['name'];
    $fileTmpName= $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png','gif');

    if (in_array($fileActualExt, $allowed)){
        if ($fileError === 0){
            if($fileSize < 500000){

                $fileNameNew = uniqid('', true).".".$fileActualExt;

                $fileDestination = 'includes/'.$fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);

            }else {

                echo "your file is too big";
            }


        }else {
            echo "there was an error!";
        }

    }else{
        echo "You cannot upload files oh this type!";
    }




    $stmt = $conn->prepare("INSERT INTO AppPost (name, description, image, appstorelink,reason_q1,reason_q2,risk_q1,risk_q2,ethnic_q1,ethnic_q2,ethnic_q3,law_q1,content_q1,content_q2,technic_q1,technic_q2,use_q1,use_q2,ressource_q1) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");

    $stmt ->bind_param( "sssssssssssssssssss", $appName,$appDescription, $fileNameNew, $downloadLink, $reason_q1,$reason_q2,$risk_q1,$risk_q2,$ethnic_q1,$ethnic_q2,$ethnic_q3,$law_q1,$content_q1,$content_q2,$technic_q1,$technic_q2,$use_q1,$use_q2,$ressource_q1);

    $stmt -> execute();
    $lastid = mysqli_insert_id($conn);



    $stmt->close();



    for ($i = 1; $i <= 5; $i++){

        if (isset(${'cat'.$i})){
            storeMainCategory($conn, $lastid, ${'cat'.$i});
        }
    }

    for ($j = 1; $j <= 18; $j++){

        if (isset(${'subCat'.$j})){
            storeSubCategory($conn, $lastid, ${'subCat'.$j});
        }
    }





    $conn->close();


//    if(isset($_POST['prim'])){
//        $stmt1 = $conn->prepare("INSERT INTO category_apppost (apppost_id,mainCategoryID ) VALUES (?,?)");
//
//        $stmt1 ->bind_param( "ii", $lastid, $prim );
//
//        $stmt1 -> execute();
//
//        header("Location: ../pages/registerApp.php?signup=success");
//
//        $stmt1->close();}
//
//    if(isset($_POST['sek'])){
//        $stmt1 = $conn->prepare("INSERT INTO category_apppost (apppost_id,mainCategoryID ) VALUES (?,?)");
//
//        $stmt1 ->bind_param( "ii", $lastid, $sek );
//
//        $stmt1 -> execute();
//
//        header("Location: ../pages/registerApp.php?signup=success");
//
//        $stmt1->close();}
//
//    if(isset($_POST['patients'])){
//        $stmt1 = $conn->prepare("INSERT INTO category_apppost (apppost_id,mainCategoryID ) VALUES (?,?)");
//
//        $stmt1 ->bind_param( "ii", $lastid, $patients );
//
//        $stmt1 -> execute();
//
//        header("Location: ../pages/registerApp.php?signup=success");
//
//        $stmt1->close();}
//
//    if(isset($_POST['prof'])){
//        $stmt1 = $conn->prepare("INSERT INTO category_apppost (apppost_id,mainCategoryID ) VALUES (?,?)");
//
//        $stmt1 ->bind_param( "ii", $lastid, $prof );
//
//        $stmt1 -> execute();
//
//        header("Location: ../pages/registerApp.php?signup=success");
//
//        $stmt1->close();}
































//    $sql = "SELECT name FROM AppPost WHERE name=?";
//    $stmt = mysqli_stmt_init($conn);
//
//    if (!mysqli_stmt_prepare($stmt, $sql)) {
//
//        header("Location: ../signup.php?error=sqlerror");
//        exit();
//
//    } else {
//        mysqli_stmt_bind_param($stmt, "s", $appName);
//        mysqli_stmt_execute($stmt);
//        mysqli_stmt_store_result($stmt);
//        $reulstCheck = mysqli_stmt_num_rows($stmt);
//        if ($reulstCheck > 0) {
//
//            header("Location: ../signup.php?error=AppNametaken");
//            exit();
//        } else {
//
//            $sql = "INSERT INTO AppPost (name, description, image, appstorelink,reason_q1,reason_q2,risk_q1,risk_q2,ethnic_q1,ethnic_q2,ethnic_q3,law_q1,content_q1,content_q2,technic_q1,technic_q2,use_q1,use_q2,ressource_q1) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
//            $stmt = mysqli_stmt_init($conn);
//            if (!mysqli_stmt_prepare($stmt, $sql)) {
//
//                header("Location: ../signup.php?error=sqlerror");
//                exit();
//            } else {
//
//
//
//                mysqli_stmt_bind_param($stmt, "sssssssssssssssssss", $appName,$appDescription, $fileNameNew, $downloadLink, $reason_q1,$reason_q2,$risk_q1,$risk_q2,$ethnic_q1,$ethnic_q2,$ethnic_q3,$law_q1,$content_q1,$content_q2,$technic_q1,$technic_q2,$use_q1,$use_q2,$ressource_q1);
//                mysqli_stmt_execute($stmt);
//                header("Location: ../pages/test.php?signup=success");
//                exit();
//            }
//        }
//
//
//    }
//
//
//
//    mysqli_stmt_close($stmt);
//    mysqli_close($con);
//
//
//
//
//    if (isset($_POST['health'])){
//
//        $sql = "INSERT INTO category_apppost (apppost_id,mainCategoryID ) VALUES (?,?)";
//        $stmt = mysqli_stmt_init($conn);
//        if (!mysqli_stmt_prepare($stmt, $sql)) {
//
//            header("Location: ../signup.php?error=sqlerror");
//            exit();
//        } else {
//
//
//
//            mysqli_stmt_bind_param($stmt, "ii", $health, $health );
//            mysqli_stmt_execute($stmt);
//            header("Location: ../pages/test.php?signup=success");
//            exit();
//        }
//
//    }
//
//
//
//    mysqli_stmt_close($stmt);
//    mysqli_close($con);



}