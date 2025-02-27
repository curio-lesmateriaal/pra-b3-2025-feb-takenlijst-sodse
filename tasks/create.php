<?php require_once __DIR__.'/../backend/config.php'; ?>

<!doctype html>
<html lang="nl">

<head>
    <title>TakenLijst / Nieuwe taak</title>
 
</head>

<body>

   

    <div class="container">
        <h1>Nieuwe Taak</h1>

        <form action="<?php echo $base_url; ?>/app/Http/Controllers/takenController.php" method="POST">
        <input type="hidden" name="action" value="create">

            <div class="form-group">
                <label for="titel">Titel van de taak</label>
                <input type="text" name="titel" id="titel" class="form-input">
            </div>
            <div class="form-group">
                <label for="afdeling">Afdeling</label>
                <select name="afdeling">
                    <option value="personeel">Personeel</option>
                    <option value="hoerca">Horeca</option>
                    <option value="techniek">Techniek</option>
                    <option value="inkoop">Inkoop</option>
                    <option value="klantenservice">klantenservice</option>
                    <option value="groen">Groen</option>
                </select>

            </div>
            <div class="form-group">
                <label for="beschrijving">Beschrijving</label>
                <textarea name="beschrijving" id="beschrijving" class="form-input" rows="4"></textarea>
            </div>

            <input type="submit" value="voer taak in">

        </form>
    </div>

</body>

</html>
