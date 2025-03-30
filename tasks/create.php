<?php
session_start();
if (!isset($_SESSION['userid'])) {
    $msg = "Je bent nog niet ingelogd!";
    header("Location: login.php?msg=" . $msg);
}



require_once __DIR__ . '/../backend/config.php'; ?>

<!doctype html>
<html lang="nl">

<head>
    <title>TakenLijst / Nieuwe taak</title>
    <?php require_once "../head.php" ?>

</head>

<body>





    <?php require_once '../header.php'; ?>

    <h1 id="title-create">Nieuwe taak</h1>
    <div class="msg">
        <?php
        // Dit is voor het tonen van meldingen
        if (isset($_GET['msg'])) {
            $message = $_GET['msg'];
            echo "<p>$message</p>";
        }
        ?>
    </div>



    <div class="container-create">

        <form action="../app/Http/Controllers/takenController.php" method="POST">
            <input type="hidden" name="action" value="create">

            <div class="form-group1">
                <label for="title">Titel van de taak</label>
                <input type="text" name="title" id="title" class="form-input">
            </div>
            <div class="form-group1">
                <div class="afdeling-form">
                    <label for="department">Afdeling</label>
                    <select name="department">
                        <option value="Personeel">Personeel</option>
                        <option value="Horeca">Horeca</option>
                        <option value="Techniek">Techniek</option>
                        <option value="Inkoop">Inkoop</option>
                        <option value="Klanten-service">klantenservice</option>
                        <option value="Groen">Groen</option>
                    </select>
                </div>
            </div>


            <div class="form-group1">
                <label for="content">Beschrijving</label>
                <textarea name="content" id="content" class="form-input"></textarea>
            </div>

            <div class="form-group1">
                <label for="deadline">Deadline</label>
                <input type="date" name="deadline" id="deadline" class="form-input">
            </div>


            <input type="submit" class="submit-taak" value="Voer taak in">
        </form>
    </div>



    <?php require_once '../footer.php'; ?>
</body>

</html>