
<?php
// Als Daten müssen folgende nacheinander eingetragen werden
// Host | Meist localhost
// Benutzer | Benutzername der Datenbank
// Passwort | Passwort der Datenbank. Wenn keins vorhanden einfach leer lasssen
// Datenbank | Name der Datenbank
//include("config.php");


$db = new mysqli('localhost','a_pedi','1234','pedipla');
if($db->connect_error):
    echo $db->connect_error;
endif;


if(isset($_POST['absenden'])):

    $benutzername = $_POST['benutzername'];
    $passwort = $_POST['passwort'];
    $passwort_wiederholen = $_POST['passwort_wiederholen'];

    $search_user = $db->prepare("SELECT id FROM users WHERE email = ?");
    $search_user->bind_param('s',$benutzername);
    $search_user->execute();
    $search_result = $search_user->get_result();

    if($search_result->num_rows == 0):
        if($passwort == $passwort_wiederholen):
            $passwort = md5($passwort);
            $insert = $db->prepare("INSERT INTO users (email,passwort) VALUES (?,?)");
            $insert->bind_param('ss',$benutzername,$passwort);
            $insert->execute();
            if($insert !== false):
                echo 'Dein Account wurde erfolgreich erstellt!';
            endif;
        else:
            echo 'Deine Passwörter stimmen nicht überein!';
        endif;
    else:
        echo 'Der Benutzername ist leider schon vergeben!';
    endif;

endif;
?>

<html>
<head>
    <title>Register - Page</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>


</head>
<body>
<div class="container">
<form action="" method="post" class="needs-validation" novalidate>
    <div class="form-group">
        <label for="uname">Benutzername</label>
        <input type="text" class="form-control" id="uname" name="benutzername" placeholder="Benutzername" required>
        <div class="valid-feedback">Valid.</div>
        <div class="invalid-feedback">Bitte füllen Sie dieses Feld aus.</div>
    </div>
    <div class="form-groub">
        <label for="password">Passwort</label>
        <input type="password" class="form-control" id="password" name="passwort" placeholder="Passwort" required>
        <div class="valid-feedback">Valid.</div>
        <div class="invalid-feedback">Bitte füllen Sie dieses Feld aus.</div>
    </div>
    <div class="form-groub">
        <label for="password">Passwort</label>
        <input type="password" class="form-control" id="password" name="passwort_wiederholen" placeholder="Passwort wiederholen" required>
        <div class="valid-feedback">Valid.</div>
        <div class="invalid-feedback">Bitte füllen Sie dieses Feld aus.</div>
    </div>
    <input type="submit" name="absenden" value="Absenden"><br>
</form>
</div>

</body>
</html>
