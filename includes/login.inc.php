<?php
/**
 * Created by PhpStorm.
 * User: yannick
 * Date: 2019-05-17
 * Time: 18:40
 */
session_start();

if (isset($_POST['login-submit'])){

    require 'mysql/dbh.inc.php';

    $mailuid = $_POST['mail'];
    $password = $_POST['pwd'];

    if (empty($mailuid) || empty($password)){
        header("Location: ../index.php?error=emptyfields");
        exit();
    }
    else{
        $sql = "SELECT * FROM users WHERE email=?;";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)){

            header("Location: ../index.php?error=sqlerror");
            exit();
        }
        else{
            mysqli_stmt_bind_param($stmt, "s", $mailuid);
        }
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if ($row = mysqli_fetch_assoc($result)){
            $pwdCheck = password_verify($password, $row['password']);

            if ($pwdCheck == false){
                header("Location: ../pwwrong.php");
                exit();

            }
            elseif ($pwdCheck == true){
                session_start();
                $_SESSION['userId'] = $row['id'];
                $_SESSION['userUid'] = $row['email'];

                header("Location: ../pages/test.php");
                exit();
            }
            else{
                header("Location: ../pages/welcome1.php");
                exit();
            }
        }else{
            header("Location: ../index.php?error=nouser");
            exit();
        }

    }

}
else{
    header("Location: ../index.php");
    exit();
}