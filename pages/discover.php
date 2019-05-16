<?php
session_start();

// First, we test if user is logged. If not, goto index.php (login page).
/* if (!isset($_SESSION['user'])) {
    header("Location: ../index.php");
    exit();
} */

include('../includes/mysql/pdo.inc.php');
include('constants/header.php');
$current = 'discover.php';
head($current);

?>
<body>
<div class="content-wrap">

    <div class="container">
        <main>

            <!--Navbar-->
            <nav class="navbar navbar-expand-lg navbar-dark mdb-color lighten-3 mt-3 mb-5">

                <!-- Navbar brand -->
                <span class="navbar-brand">Categories:</span>

                <!-- Collapse button -->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav"
                        aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Collapsible content -->
                <div class="collapse navbar-collapse" id="basicExampleNav">

                    <!-- Links -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="#">All
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Shirts</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Sport wears</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Outwears</a>
                        </li>

                    </ul>
                    <!-- Links -->

                </div>
                <!-- Collapsible content -->

            </nav>
            <!--/.Navbar-->


            <!--Section: Products v.3-->
            <section class="text-center mb-4">

                <!--Grid row-->
                <div class="row wow fadeIn">
                    <!--Grid column-->

                        <?php
                        try {
                            $dbh = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);
                            $sql = "select * from apppost";

                            $result = $dbh->query($sql);

                            $counterRow = 0;

                            while ($line = $result->fetch()) {
                                if ($counterRow == 4) {
                                    echo "<div class=\"row wow fadeIn\">";
                                    $counterRow = 0;
                                }
                                echo "<div class=\"col-lg-3 col-md-6 mb-4\"><div class='card' onclick=\"location.href='viewPatient.php?id=" . $line['id'] . "';\">";

                                echo "<div class=\"view overlay\"><img src='../img/icons/" . $line['image'] . "' class=\"card-img-top testbla\"style=\"padding-left: 37.5px; padding-right: 37.5px; padding-top: 37.5px; padding-bottom: 17.5px;\"><a><div class=\"mask rgba-white-slight\"></div></a></div>";

                                echo "<div class=\"card-body text-center\"><h5 class='nameSquish'><strong><a class=\"dark-grey-text\">" . $line['name'] . "</a></strong></h5><div class='cqtbn'></div>";

                                echo "<a href=\"\" class=\"grey-text\"><h5>Firma bla</h5></a>"; //update the developer column . $line[''] .

                                echo "</div></div></div>";
                                $counterRow++;
                                if ($counterRow == 4) {
                                    echo "</div>";
                                }


/*                                echo "<tr id='patientlist-" . $line['patientID'] . "' onclick=\"location.href='viewPatient.php?id=" . $line['patientID'] . "';\" class='hoverRow'><td class='widthOfRow tableCursor'>" . $line['patientID'] . "</td>";
                                echo "<td class='widthOfRow tableCursor'>" . $line['MRN'] . "</td>";
                                echo "<td class='tableCursor'>" . $line['first_name'] . "</td>";
                                echo "<td class='tableCursor'>" . $line['name'] . "</td>";
                                echo "<td class='tableCursor'>" . $line['birthdate'] . "</td>";
                                echo "<td class='tableCursor'>" . gender($line['gender']) . "</td>";
                                echo "<td class='myColumn widthOfRow tableCursor' onclick=\"event.stopPropagation(); deleteRow(" . $line['patientID'] . ")\"><i class=\"fas fa-trash-alt red-text\"></i></td>";
                                echo "</td></tr>";*/
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