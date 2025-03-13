<?php require_once __DIR__ . '/../backend/config.php'; ?>

<!doctype html>
<html lang="nl">

<head>
    <title>TakenLijst / Nieuwe taak</title>

</head>

<body>



    <div class="container">
        <h1>Nieuwe Taak</h1>

        <form action="../app/Http/Controllers/takenController.php" method="POST">
            <input type="hidden" name="action" value="create">

            <div class="form-group">
                <label for="title">Titel van de taak</label>
                <input type="text" name="title" id="title" class="form-input">
            </div>
            <div class="form-group">
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
            <div class="form-group">
                <label for="content">Beschrijving</label>
                <textarea name="content" id="content" class="form-input" rows="4"></textarea>
            </div>

            <input type="submit" value="voer taak in">

        </form>
    </div>

</body>

</html>