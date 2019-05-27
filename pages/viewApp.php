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
                <div class="row wow fadeIn">
                    <?php

                    try {
                        $dbh = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);
                        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        $appID = 0;
                        if (isset($_GET['id'])) {
                            $appID = (int)($_GET['id']);
                        }
                        if ($appID > 0) {

                            $sqlTitle = "SELECT * FROM apppost WHERE apppost.id = :appID";

                            $statementTitle = $dbh->prepare($sqlTitle);
                            $statementTitle->bindParam(':appID', $appID, PDO::PARAM_INT);
                            $statementTitle->execute();

                            while ($line = $statementTitle->fetch()) {
                                /* Column 9 starts */
                                echo "<div class=\"col-lg-9 col-md-6 mb-4\">";
                                echo "<h1 class=\"h1-responsive h1title viewAppTitle\">" . $line['name'] . "</h1>";
                                echo "<h5 class='viewAppDev'>" . $line['developer'] . "</h5>";
                                echo "<div class=\"col-lg-9 col-md-6 mb-4\" style=\"padding-left: 0px;\"><p>" . $line['description'] . "<p>";
                                echo "</div></div>";
                                /* Column 9 ends */

                                /* Column 3 starts */
                                echo "<div class=\"col-lg-3 col-md-6 mb-4\">";
                                echo "<button type=\"submit\" name=\"register-submit\" class=\"btn btn-primary waves-effect viewAppButtonLink\" onclick=\"location.href='" . $line['appstorelink'] . "';\">Link zum App-Store</button>";
                                echo "<div class=\"view overlay\"><img src='../img/icons/" . $line['icon'] . "' class=\"card-img-top testbla\"style=\"padding-left: 20px; padding-right: 20px; padding-top: 48px; padding-bottom: 0px;\">";
                                echo "</div>";
                                /* Column 3 ends*/


                            }
                        } else {
                            echo "<h2 class=\"my-5 h2 text-left\">>The app does not exist</h2>";
                        }

                        //$dbh = null;
                    } catch (PDOException $e) {
                        /*** echo the sql statement and error message ***/
                        echo $e->getMessage();
                    }
                    ?>


        </main>
    </div>
</div>
<?php
include('constants/footer.php');
?>
</body>