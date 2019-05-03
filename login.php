<form action="" method="post">
    Dein Benutzername:<br>
    <input type="text" name="benutzername" placeholder="Benutzername"><br>
    Dein Passwort:<br>
    <input type="password" name="passwort" placeholder="Passwort"><br>
    <input type="submit" name="absenden" value="Absenden"><br>
</form>
<?php
// Als Daten müssen folgende nacheinander eingetragen werden
// Host | Meist localhost
// Benutzer | Benutzername der Datenbank
// Passwort | Passwort der Datenbank. Wenn keins vorhanden einfach leer lasssen
// Datenbank | Name der Datenbank
$db = new mysqli('localhost','tutorial','','tutorial');
if($db->connect_error):
    echo $db->connect_error;
endif;

if(isset($_POST['absenden'])):
    $benutzername = strtolower($_POST['benutzername']);
    $passwort = $_POST['passwort'];
    $passwort = md5($passwort);

    $search_user = $db->prepare("SELECT id FROM users WHERE benutzername = ? AND passwort = ?");
    $search_user->bind_param('ss',$benutzername,$passwort);
    $search_user->execute();
    $search_result = $search_user->get_result();

    if($search_result->num_rows == 1):
        $search_object = $search_result->fetch_object();

        $_SESSION['user'] = $search_object->id;
        header('Location: /tutorials/login/');
    else:
        echo 'Deine Angaben sind leider nicht korrekt!';
    endif;
endif;