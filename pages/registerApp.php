<?php
session_start();

// First, we test if user is logged. If not, goto index.php (login page).
/* if (!isset($_SESSION['user'])) {
    header("Location: ../index.php");
    exit();
} */

//include('../includes/mysql/pdo.inc.php');
include('constants/header.php');
$current = 'registerApp.php';
head($current);

?>
<body>
<div class="content-wrap">




</div>
<?php
include('constants/footer.php');
?>
</body>
