<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Patient Dashboard</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css">
    <!-- Bootstrap CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="../css/mdb.min.css" rel="stylesheet">
    <!-- MDBootstrap Datatables  -->
    <link href="../css/addons/datatables.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../css/style.css" rel="stylesheet">
</head>

<body>
<nav class="navbar fixed-top navbar-expand-lg navbar-light white scrolling-navbar">


    <!-- Brand -->
    <a class="navbar-brand waves-effect" href="../pages/discover.php" target="">
        <strong class="blue-text">App-Store Pädiatrie Schweiz</strong>
    </a>

    <!-- Collapse -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent"
            aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>


    <!-- Links -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link waves-effect" href="../pages/discover.php">Entdecken
                    <span class="sr-only"></span>
                </a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-4" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">
                    <i class=""></i> Kategorien </a>

                <div class="dropdown-menu dropdown-menu-xl-left">
                    <div class="row customDropdown">
                        <?php
                        try {
                            $dbh = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);

                            $sql1 = "select name from category where maincat_id = 1";
                            $result1 = $dbh->query($sql1);

                            echo "<div class='col'><a>Gesundheitsförderung</a><div class=\"dropdown-divider\"></div><ul style=\"list-style: none; padding-left: 0px;\" >";
                            while ($line = $result1->fetch()) {
                                echo "<li><a>" . $line['name'] . "</a></li>";
                            }
                            echo "</ul></div>";

                            $sql2 = "select name from category where maincat_id = 2";
                            $result1 = $dbh->query($sql2);

                            echo "<div class='col'><a>Früherkennung/Aufklärung</a><div class=\"dropdown-divider\"></div><ul style=\"list-style: none; padding-left: 0px;\" >";
                            while ($line = $result1->fetch()) {
                                echo "<li><a>" . $line['name'] . "</a></li>";
                            }
                            echo "</ul></div>";

                            $sql3 = "select name from category where maincat_id = 3";
                            $result1 = $dbh->query($sql3);

                            echo "<div class='col'><a>Sekundäprävention</a><div class=\"dropdown-divider\"></div><ul style=\"list-style: none; padding-left: 0px;\" >";
                            while ($line = $result1->fetch()) {
                                echo "<li><a>" . $line['name'] . "</a></li>";
                            }
                            echo "</ul></div>";

                            $sql4 = "select name from category where maincat_id = 4";
                            $result1 = $dbh->query($sql4);

                            echo "<div class='col'><a>Tertiärprävention</a><div class=\"dropdown-divider\"></div><ul style=\"list-style: none; padding-left: 0px;\" >";
                            while ($line = $result1->fetch()) {
                                echo "<li><a>" . $line['name'] . "</a></li>";
                            }
                            echo "</ul></div>";

                            $sql5 = "select name from category where maincat_id = 5";
                            $result1 = $dbh->query($sql5);

                            echo "<div class='col'><a>Gesundheitsfachpersonal</a><div class=\"dropdown-divider\"></div><ul style=\"list-style: none; padding-left: 0px;\" >";
                            while ($line = $result1->fetch()) {
                                echo "<li><a>" . $line['name'] . "</a></li>";
                            }
                            echo "</ul></div>";

                        } catch (PDOException $e) {
                            echo $e->getMessage();
                        }


                        ?>

            <li class="nav-item">
                <a class="nav-link waves-effect" href="../pages/registerApp.php">App Registrieren
                    <span class="sr-only"></span>
                </a>
            </li>
        </ul>
    </div>
    </div>
    </li>


    <!-- Left -->


    </ul>

    <ul class="navbar-nav mr-auto">


    </ul>

    <!-- Right -->
    <ul class="navbar-nav ml-auto">
        <form class="form-inline">
            <div class="md-form my-0">
                <input class="form-control mr-sm-2" type="text" placeholder="App Suchen" aria-label="Search">
            </div>
        </form>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-4" data-toggle="dropdown"
               aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-user"></i> Login </a>

            <div class="dropdown-menu dropdown-menu-right">
                <form class="px-4 py-3" action="../includes/login.inc.php" method="post">
                    <div class="form-group">
                        <label for="exampleDropdownFormEmail1">E-Mail-Adresse</label>
                        <input type="email" class="form-control" id="exampleDropdownFormEmail1"
                               placeholder="email@example.com" name="mail">
                    </div>
                    <div class="form-group">
                        <label for="exampleDropdownFormPassword1">Passwort</label>
                        <input type="password" class="form-control" id="exampleDropdownFormPassword1"
                               placeholder="Passwort" name="pwd">
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="dropdownCheck">
                        <label class="form-check-label" for="dropdownCheck">
                            Angemeldet bleiben
                        </label>
                    </div>
                    <button type="submit" class="btn btn-primary" name="login-submit">Anmelden</button>
                </form>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="signup.php" id="register">Registrieren</a>
                <a class="dropdown-item" href="#">Passwort vergessen?</a>
            </div>
        </li>
    </ul>

    </div>
</nav>


<!-- JQuery -->
<script src="../js/jquery-3.3.1.min.js"></script>
<!-- Popper.js -->
<script src="../js/popper.min.js"></script>
<!-- Bootstrap JS -->
<script src="../js/bootstrap.min.js"></script>
<!-- Material Design Bootstrap JS -->
<script src="../js/mdb.min.js"></script>
<!-- MDBootstrap Datatables  -->
<script type="text/javascript" src="../js/addons/datatables.min.js"></script>
</body>
</html>
