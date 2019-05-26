<?php

include('../includes/mysql/pdo.inc.php');
include('constants/header.php');

        if(isset($_GET['error'])){
            if ($_GET['error'] == "emptyfields"){
                echo '<p class="signuperror">Fill in all fields!</p>';
            }elseif ($_GET['error'] == "invalidmailuid"){
                echo '<p class="signuperror">E-Mail is not correct!</p>';
            }
        }
        ?>
       <div class="signup">
           <h1>Registrieren</h1>
    <form action="../includes/signup.inc.php" method="post">
        <div class="form-row">
            <div class="col">
                <div class="md-form mt-0">
                    <input type="text" name="firstname" placeholder="Vorname">
                </div>
            </div>
            <div class="col">
                <div class="md-form mt-0">
                    <input type="text" name="lastname" placeholder="Nachname">
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="col">
                <div class="md-form mt-0">
                    <input type="text" name="company" placeholder="Firma">
                </div>
            </div>
            <div class="col">
                <div class="md-form mt-0">
                    <input type="email" name="mail" placeholder="E-Mail">
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="col">
                <div class="md-form mt-0">
                    <input type="password" name="pwd" placeholder="Passwort">
                </div>
            </div>
            <div class="col">
                <div class="md-form mt-0">
                    <input type="password" name="pwd-repeat" placeholder="Passwort wiederholen">
                </div>
            </div>
        </div>

        <button type="submit" class="register-button" name="signup-submit">Registrieren</button>
    </form>

    </div>

<?php
include('constants/footer.php');
?>