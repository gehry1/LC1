<html>
<head>
    <title>Index - Seite</title>
</head>
<body>
<?php
session_start();
// Seite?
$page = strtolower($_GET['page']);

// Nutzer ist angemeldet?
// TODO: Prüfen ob Nutzer angemeldet ist
if(isset($_SESSION['user'])):
    require_once('ui.php');
else:
    if($page == 'login'):
        echo 'Doch <a href="index.php?page=registrieren">registrieren</a>?';
        require_once('login.php');
    elseif($page == 'register'):
        echo 'Doch <a href="index.php?page=anmelden">anmelden</a>?';
        require_once('register.php');
    else:
        echo 'Hey! Willst du dich <a href="index.php?page=login">anmelden</a> oder <a href="index.php?page=register">registrieren</a>?';
    endif;
endif;
?>
</body>
</html>