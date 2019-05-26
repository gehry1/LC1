<?php
/**
 * Created by PhpStorm.
 * User: yannick
 * Date: 2019-05-26
 * Time: 19:31
 */
require 'mysql/dbh.inc.php';

function storeMainCategory($conn, $app, $mainCat){

    $stmt1 = $conn->prepare("INSERT INTO category_apppost (apppost_id,mainCategoryID ) VALUES (?,?)");

    $stmt1 ->bind_param( "ii", $app, $mainCat );

    $stmt1 -> execute();

    header("Location: ../pages/registerApp.php?signup=success");

    $stmt1->close();

}

function storeSubCategory($conn, $app, $subCat){

    $stmt2 = $conn->prepare("INSERT INTO subCategory_apppost (apppost_id,category_id ) VALUES (?,?)");

    $stmt2 ->bind_param( "ii", $app, $subCat );

    $stmt2 -> execute();

    header("Location: ../pages/registerApp.php?signup=success");

    $stmt2->close();

}