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
                <h2 class="my-5 h2 text-left">Erfassen einer App</h2>

                <form action="../includes/register.inc.php" id="registerForm" method="post"
                      enctype="multipart/form-data">


                    <div class="md-form form-group mt-5">
                        <div class="row">
                            <div class="col-md-4"><label>Name der Applikation: </label></div>
                            <div class="col-md-8"><input class="form-control" type="text" name="appName"
                                                         placeholder="Name">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4"><label>Beschreibung der App: </label></div>
                            <div class="col-md-8"><textarea class="md-textarea form-control" placeholder="Beschreibung"
                                                            name="appDescription" rows="4" cols="50"></textarea></div>
                        </div>
                        <div class="row">
                            <div class="col-md-4"><label>Download Link:</label></div>
                            <div class="col-md-8"><input class="form-control" type="text" name="downloadLink"
                                                         placeholder="https://"></div>
                        </div>
                        <br>
                        <div class="row">
                            <h3>Hauptkategorien</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <div class="custom-control custom-checkbox"></div>
                            <input type="checkbox" class="custom-control-input" id="health" name="health" value="1">
                            <label class="custom-control-label" for="health">Gesundheitsprävention</label>
                        </div>
                        <div class="col-md-2">
                            <div class="custom-control custom-checkbox"></div>
                            <input type="checkbox" class="custom-control-input" id="prim" name="prim" value="2">
                            <label class="custom-control-label" for="prim">Primärprävention</label>
                        </div>
                        <div class="col-md-2">
                            <div class="custom-control custom-checkbox"></div>
                            <input type="checkbox" class="custom-control-input" id="sek" name="sek" value="3">
                            <label class="custom-control-label" for="sek">Sekundärprävention</label>
                        </div>
                        <div class="col-md-2">
                            <div class="custom-control custom-checkbox"></div>
                            <input type="checkbox" class="custom-control-input" id="patients" name="patients" value="4">
                            <label class="custom-control-label" for="patients">Laien / Patienten</label>
                        </div>
                        <div class="col-md-2">
                            <div class="custom-control custom-checkbox"></div>
                            <input type="checkbox" class="custom-control-input" id="prof" name="prof" value="5">
                            <label class="custom-control-label" for="prof">Heilberufsgruppen</label>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <h3>Kategorien</h3>

                    </div>
                    <div class="row">

                        <div class="col-md-2">
                            <div class="custom-control custom-checkbox"></div>
                            <input type="checkbox" class="custom-control-input" id="asthma" name="asthma"
                                   disabled="false"
                                   value="1">
                            <label class="custom-control-label" for="asthma">Asthma</label>
                        </div>

                        <div class="col-md-2">
                            <div class="custom-control custom-checkbox"></div>
                            <input type="checkbox" class="custom-control-input" id="behandlung" name="behandlung"
                                   disabled="false" value="2">
                            <label class="custom-control-label" for="behandlung">Behandlung</label></div>

                        <div class="col-md-2">
                            <div class="custom-control custom-checkbox"></div>
                            <input type="checkbox" class="custom-control-input" id="bildung" name="bildung"
                                   disabled="false"
                                   value="3">
                            <label class="custom-control-label" for="bildung">Bildung</label>
                        </div>

                        <div class="col-md-2">
                            <div class="custom-control custom-checkbox"></div>
                            <input type="checkbox" class="custom-control-input" id="blutdruck" name="blutdruck"
                                   disabled="false"
                                   value="4">
                            <label class="custom-control-label" for="blutdruck">Blutdruck</label>
                        </div>

                        <div class="col-md-2">
                            <div class="custom-control custom-checkbox"></div>
                            <input type="checkbox" class="custom-control-input" id="depresion" name="depression"
                                   disabled="false" value="5">
                            <label class="custom-control-label" for="depresion">Depression / Stress</label></div>

                        <div class="col-md-2">
                            <div class="custom-control custom-checkbox"></div>
                            <input type="checkbox" class="custom-control-input" id="diabetes" name="diabetes"
                                   disabled="false"
                                   value="6">
                            <label class="custom-control-label" for="diabetes">Diabetes</label></div>


                    </div>

                    <div class="row">

                        <div class="col-md-2">
                            <div class="custom-control custom-checkbox"></div>
                            <input type="checkbox" class="custom-control-input" id="entspannung" name="entspannung"
                                   disabled="false" value="7">
                            <label class="custom-control-label" for="entspannung">Entspannung</label>
                        </div>

                        <div class="col-md-2">
                            <div class="custom-control custom-checkbox"></div>
                            <input type="checkbox" class="custom-control-input" id="ernaehrung" name="ernaehrung"
                                   disabled="false" value="8">
                            <label class="custom-control-label" for="ernaehrung">Ernährung</label></div>

                        <div class="col-md-2">
                            <div class="custom-control custom-checkbox"></div>
                            <input type="checkbox" class="custom-control-input" id="fitness" name="fitness"
                                   disabled="false"
                                   value="9">
                            <label class="custom-control-label" for="fitness">Fitness</label>
                        </div>

                        <div class="col-md-2">
                            <div class="custom-control custom-checkbox"></div>
                            <input type="checkbox" class="custom-control-input" id="hautkrankheiten"
                                   name="hautkrankheiten"
                                   disabled="false" value="10">
                            <label class="custom-control-label" for="hautkrankheiten">Hautkrankheiten</label>
                        </div>

                        <div class="col-md-2">
                            <div class="custom-control custom-checkbox"></div>
                            <input type="checkbox" class="custom-control-input" id="kinderkrankheiten"
                                   name="kinderkrankheiten"
                                   disabled="false" value="11">
                            <label class="custom-control-label" for="kinderkrankheiten">Kinderkrankheiten</label></div>

                        <div class="col-md-2">
                            <div class="custom-control custom-checkbox"></div>
                            <input type="checkbox" class="custom-control-input" id="krebs" name="krebs" disabled="false"
                                   value="12">
                            <label class="custom-control-label" for="krebs">Krebs</label></div>


                    </div>

                    <div class="row">

                        <div class="col-md-2">
                            <div class="custom-control custom-checkbox"></div>
                            <input type="checkbox" class="custom-control-input" id="kreislaufkrankheiten"
                                   name="kreislaufkrankheiten" disabled="false" value="13">
                            <label class="custom-control-label" for="kreislaufkrankheiten">Kreislaufkrankheiten</label>
                        </div>

                        <div class="col-md-2">
                            <div class="custom-control custom-checkbox"></div>
                            <input type="checkbox" class="custom-control-input" id="leitlinien" name="leitlinien"
                                   disabled="false" value="14">
                            <label class="custom-control-label" for="leitlinien">Leitlinien</label></div>

                        <div class="col-md-2">
                            <div class="custom-control custom-checkbox"></div>
                            <input type="checkbox" class="custom-control-input" id="notfall" name="notfall"
                                   disabled="false"
                                   value="15">
                            <label class="custom-control-label" for="notfall">Notfall</label>
                        </div>

                        <div class="col-md-2">
                            <div class="custom-control custom-checkbox"></div>
                            <input type="checkbox" class="custom-control-input" id="schlaf" name="schlaf"
                                   disabled="false"
                                   value="16">
                            <label class="custom-control-label" for="schlaf">Schlafstörung</label>
                        </div>

                        <div class="col-md-2">
                            <div class="custom-control custom-checkbox"></div>
                            <input type="checkbox" class="custom-control-input" id="schwangerschaft"
                                   name="schwangerschaft"
                                   disabled="false" value="17">
                            <label class="custom-control-label" for="schwangerschaft">Schwangerschaft</label></div>

                        <div class="col-md-2">
                            <div class="custom-control custom-checkbox"></div>
                            <input type="checkbox" class="custom-control-input" id="vorsorge" name="vorsorge"
                                   disabled="false"
                                   value="18">
                            <label class="custom-control-label" for="vorsorge">Vorsorge</label></div>


                    </div>

                    <div class="row">

                        <div class="col-md-2">
                            <div class="custom-control custom-checkbox"></div>
                            <input type="checkbox" class="custom-control-input" id="diverses" name="diverses"
                                   disabled="false"
                                   value="19">
                            <label class="custom-control-label" for="diverses">Diverses</label>
                        </div>

                    </div>
                    <br>
                    <div class="row">
                        <h3>Selbsdeklaration:</h3>

                    </div>

                    <div class="row">
                        <div class="form-group green-border-focus">
                            <label for="reason_q1">Was ist das Hauptziel der App?</label>
                            <textarea class="form-control" name="reason_q1" id="reason_q1" rows="5"
                                      cols="150"></textarea>
                        </div>
                    </div>


                    <div class="row">
                        <div class="form-group green-border-focus">
                            <label for="reason_q2">Wie wird sichergestellt, dass das Hauptziel der App erreicht
                                wird?</label>
                            <textarea class="form-control" name="reason_q2" id="reason_q2" rows="5"
                                      cols="150"></textarea>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group green-border-focus">
                            <label for="risk_q1">Welche Risikofaktoren können durch die Nutzung der App
                                entstehen?</label>
                            <textarea class="form-control" id="risk_q1" name="risk_q1" rows="5" cols="150"></textarea>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group green-border-focus">
                            <label for="risk_q2">Welche Vorkehrungen treffen Sie zur Abwendung der Risiken durch die
                                Nutzung der
                                App?</label>
                            <textarea class="form-control" id="risk_q2" name="risk_q2" rows="5" cols="150"></textarea>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group green-border-focus">
                            <label for="ethnic_q1">Legen Sie dar, inwiefern die App ethischen Grundsätzen wie der
                                Patientenautonomie, der Zugangsgerechtigkeit, der Berufsethik oder Forschungsethik
                                folgt.</label>
                            <textarea class="form-control" id="ethnic_q1" name="ethnic_q1" rows="5"
                                      cols="150"></textarea>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group green-border-focus">
                            <label for="ethnic_q2">Bestehen bei ihrer App Interessenskonflikte? Wenn ja, welche?</label>
                            <textarea class="form-control" id="ethnic_q2" name="ethnic_q2" rows="5"
                                      cols="150"></textarea>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group green-border-focus">
                            <label for="ethnic_q3">Falls Ihre App im Forschungskontext eingesetzt wird: folgt der
                                Einsatz der
                                App den Grundsätzen von guter wissenschaftlicher Praxis? </label>
                            <textarea class="form-control" id="ethnic_q3" name="ethnic_q3" rows="5"
                                      cols="150"></textarea>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group green-border-focus">
                            <label for="law_q1">Welche allgemeinen oder spezifischen rechtlichen Vorgaben werden bei der
                                App
                                berücksichtigt?</label>
                            <textarea class="form-control" id="law_q1" name="law_q1" rows="5" cols="150"></textarea>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group green-border-focus">
                            <label for="content_q1">Geben Sie an welche validen Quellen herangezogen wurden?</label>
                            <textarea class="form-control" id="content_q1" name="content_q1" rows="5"
                                      cols="150"></textarea>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group green-border-focus">
                            <label for="content_q2">Wird die App regelmässig neuen inhaltlichen Erfordernissen
                                angepasst? Wenn
                                ja, welche?</label>
                            <textarea class="form-control" id="content_q2" name="content_q2" rows="5"
                                      cols="150"></textarea>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group green-border-focus">
                            <label for="technic_q1">Geben Sie an in welchem Ausmass Entwicklung, Betrieb und Nutzung den
                                Möglichkeiten der Technik entspricht?</label>
                            <textarea class="form-control" id="technic_q1" name="technic_q1" rows="5"
                                      cols="150"></textarea>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group green-border-focus">
                            <label for="technic_q2">Ist die App interoperabel mit anderen Anwendungen? Wenn ja,
                                inwiefern?</label>
                            <textarea class="form-control" id="technic_q2" name="technic_q2" rows="5"
                                      cols="150"></textarea>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group green-border-focus">
                            <label for="use_q1">Wurde die App nach «usability guidelines» entwickelt?</label>
                            <textarea class="form-control" id="use_q1" name="use_q1" rows="5" cols="150"></textarea>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group green-border-focus">
                            <label for="use_q2">Wurde die App nach «usability guidelines» entwickelt? *** muss noch
                                angepasst
                                werden***</label>
                            <textarea class="form-control" id="use_q2" name="use_q2" rows="5" cols="150"></textarea>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group green-border-focus">
                            <label for="ressource_q1">Wie viel Speicherplatz benötigt die App und wie viel kostet
                                sie?</label>
                            <textarea class="form-control" id="ressource_q1" name="ressource_q1" rows="5"
                                      cols="150"></textarea>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputAppPicture">Upload App Icon</span>
                            </div>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="inputAppPictureField" name="file"
                                       aria-describedby="inputAppPicture">
                                <label class="custom-file-label" for="inputGroupFile01">Datei auswählen</label>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputScreenshot">Upload Screenshot</span>
                            </div>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="inputScreenshotField"
                                       aria-describedby="inputScreenshot">
                                <label class="custom-file-label" for="inputGroupFile01">Datei auswählen</label>
                            </div>
                        </div>
                    </div>


                    <br>

                    <div class="row">
                        <button type="submit" name="register-submit" class="btn btn-outline-primary waves-effect"><i
                                    aria-hidden="true"></i>Absenden
                        </button>
                    </div>


                </form>
            </div>
        </main>
    </div>
</div>
<?php
include('constants/footer.php');
?>

<script src="../js/categoryCheckbox.js"></script>
</body>
