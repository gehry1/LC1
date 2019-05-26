<?php
/**
 * Created by PhpStorm.
 * User: yannick
 * Date: 2019-05-17
 * Time: 16:41
 */

if (isset($_POST['signup-submit'])) {


    require 'mysql/dbh.inc.php';



    $firstname= $_POST['firstname'];
    $lastname= $_POST['lastname'];
    $company= $_POST['company'];
    $mail = $_POST['mail'];
    $password = $_POST['pwd'];
    $passwordRepeat = $_POST['pwd-repeat'];

    if (empty($firstname) || empty($mail) || empty($password) || empty($passwordRepeat) || empty($lastname) || empty($company)) {

        header("Location: ../signup.php?error=emptyfields&uid=" . $firstname . "&mail=" . $mail);
        exit();
    } elseif (!filter_var($mail, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $firstname)) {
        header("Location: ../signup.php?error=invalidmailuid");
        exit();
    } elseif (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../signup.php?error=invalidmail&uid=" . $firstname);
        exit();
    } elseif (!preg_match("/^[a-zA-Z0-9]*$/", $firstname)) {
        header("Location: ../signup.php?error=invaliduid&uid=" . $mail);
        exit();
    } elseif ($password !== $passwordRepeat) {
        header("Location: ../signup.php?error=passwordcheck&uid=" . $firstname . "&mail=" . $mail);
        exit();
    } else {


        $sql = "SELECT email FROM users WHERE email=?";
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) {

            header("Location: ../signup.php?error=sqlerror");
            exit();

        } else {
            mysqli_stmt_bind_param($stmt, "s", $mail);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $reulstCheck = mysqli_stmt_num_rows($stmt);
            if ($reulstCheck > 0) {

                header("Location: ../signup.php?error=emailtaken");
                exit();
            } else {

                $sql = "INSERT INTO users (firstname, lastname, company, password, email) VALUES (?,?,?,?,?)";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {

                    header("Location: ../signup.php?error=sqlerror");
                    exit();
                } else {

                    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

                    mysqli_stmt_bind_param($stmt, "sssss", $firstname,$lastname, $company, $hashedPwd, $mail);
                    mysqli_stmt_execute($stmt);
                    header("Location: ../signup.php?signup=success");
                    exit();
                }
            }


        }

    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
else{

    header("Location: ../signup.php");
    exit();

}