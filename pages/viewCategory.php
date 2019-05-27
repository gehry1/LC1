<?php
session_start();

// First, we test if user is logged. If not, goto index.php (login page).
/* if (!isset($_SESSION['user'])) {
    header("Location: ../index.php");
    exit();
} */

include('../includes/mysql/pdo.inc.php');
include('constants/header.php');
?>


<body>
<div class="content-wrap">

    <div class="container">
        <main>
            <div class="container wow fadeIn">

                <?php

                try {
                    $dbh = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
                    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $categoryID = 0;
                    if (isset($_GET['id'])) {
                        $categoryID = (int)($_GET['id']);
                    }
                    if ($categoryID > 0) {

                        $sqlTitle = "SELECT name FROM category WHERE category.id = :categoryID";

                        $statementTitle = $dbh->prepare($sqlTitle);
                        $statementTitle->bindParam(':categoryID', $categoryID, PDO::PARAM_INT);
                        $statementTitle->execute();

                        while ($line = $statementTitle->fetch()) {
                            echo "<h2 class=\"my-5 h2 text-left\">" . $line['name'] . "</h2>";
                        }
                    } else {
                        echo "<h2 class=\"my-5 h2 text-left\">>The category does not exist</h2>";
                    }

                    //$dbh = null;
                } catch (PDOException $e) {
                    /*** echo the sql statement and error message ***/
                    echo $e->getMessage();
                }
                ?>


                <!--Section: Products v.3-->
                <section class="text-center mb-4">

                    <!--Grid row-->
                    <div class="row wow fadeIn">
                        <!--Grid column-->

                        <?php
                        try {
                            $dbh = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
                            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                            $categoryID = 0;
                            if (isset($_GET['id'])) {
                                $categoryID = (int)($_GET['id']);
                            }
                            if ($categoryID > 0) {
                                $sql = "select * from apppost, category_apppost WHERE category_apppost.category_id = :categoryID AND apppost.id = category_apppost.apppost_id";
                                $result = $dbh->prepare($sql);
                                $result->bindParam(':categoryID', $categoryID, PDO::PARAM_INT);
                                $result->execute();

                                $counterRow = 0;

                                while ($line = $result->fetch()) {
                                    if ($counterRow == 6) {
                                        echo "<div class=\"row wow fadeIn\">";
                                        $counterRow = 0;
                                    }
                                    echo "<div class=\"col-lg-2 col-md-6 mb-4\"><div class='card' onclick=\"location.href='viewApp.php?id=" . $line['id'] . "';\">";

                                    echo "<div class=\"view overlay\"><img src='../img/icons/" . $line['icon'] . "' class=\"card-img-top testbla\"style=\"padding-left: 20px; padding-right: 20px; padding-top: 20px; padding-bottom: 0px;\"><a><div class=\"mask rgba-white-slight\"></div></a></div>";

                                    echo "<div class=\"card-body text-center\"><h5 class='nameSquish'><strong><a class=\"dark-grey-text\">" . $line['name'] . "</a></strong></h5>";

                                    echo "<a href=\"\" class=\"grey-text\"><h5 class='nameSquish'>" . $line['developer'] . "</h5></a><div class='cqtbn'></div>";

                                    echo "</div></div></div>";
                                    $counterRow++;
                                    if ($counterRow == 6) {
                                        echo "</div>";
                                    }
                                }
                            } else {
                                echo "<h2 class=\"my-5 h2 text-left\">>The app does not exist</h2>";
                            }
                        } catch (PDOException $e) {

                            /*** echo the sql statement and error message ***/
                            echo $e->getMessage();
                        }
                        ?>
                    </div>
                </section>
        </main>
    </div>
</div>
<?php
include('constants/footer.php');
?>
</body>