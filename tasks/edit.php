<!doctype html>
<html lang="nl">

<head>
    <title>TakenLijst / Aanpassen</title>
    <?php require_once "../head.php" ?>
</head>



<?php require_once "../header.php" ?>

<h1 id="title-edit">Aanpassen taak</h1>

<?php
//Haal id uit de URL
$id = $_GET['id'];

//Voer query uit
require_once '../backend/conn.php';
$query = "SELECT * FROM taken WHERE id = :id";
$statement = $conn->prepare($query);
$statement->execute([':id' => $id]);
$bericht = $statement->fetch(PDO::FETCH_ASSOC);
?>
<div class="container-edit">
    <!-- Formulier voor edit: -->
    <form action="../app/Http/Controllers/takenController.php" method="POST">
        <input type="hidden" name="action" value="edit">
        <input type="hidden" name="id" value="<?php echo $id; ?>">

        <div class="form-group">

            <label for="title">Titel</label>
            <input type="text" id="title" name="title" value="<?php echo $bericht['titel']; ?>">


            <div class="form-group">
                <label for="department">Afdeling</label>
                <select name="department" id="department">

                    <option value="Groen" <?php echo ($bericht['afdeling'] == 'Groen') ? 'selected' : ''; ?>>Groen
                    </option>
                    <option value="Personeel" <?php echo ($bericht['afdeling'] == 'Personeel') ? 'selected' : ''; ?>>
                        Personeel
                    </option>
                    <option value="Horeca" <?php echo ($bericht['afdeling'] == 'Horeca') ? 'selected' : ''; ?>>Horeca
                    </option>
                    <option value="Techniek" <?php echo ($bericht['afdeling'] == 'Techniek') ? 'selected' : ''; ?>>
                        Techniek
                    </option>
                    <option value="Inkoop" <?php echo ($bericht['afdeling'] == 'Inkoop') ? 'selected' : ''; ?>>
                        Inkoop</option>
                    <option value="Klanten-service" <?php echo ($bericht['afdeling'] == 'Klanten-service') ? 'selected' : ''; ?>>Klantenservice</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" id="status">
                <option value="todo" <?php echo ($bericht['status'] == 'todo') ? 'selected' : ''; ?>>To-do</option>
                <option value="in-progress" <?php echo ($bericht['status'] == 'in-progress') ? 'selected' : ''; ?>>
                    In-progress</option>
                <option value="done" <?php echo ($bericht['status'] == 'done') ? 'selected' : ''; ?>>Done</option>
            </select>
        </div>

        <div class="form-group">
            <label for="content">Beschrijving</label>
            <textarea id="content" name="content"><?php echo $bericht['beschrijving']; ?></textarea>
        </div>
        <!-- 
        <div class="form-group"> -->
        <!-- <div class="button"> -->
        <input type="submit" class="submit-taak" value="Pas aan">
</div>
</div>
</div>
</form>

<!--<div class="button"> -->
<form action="../app/Http/Controllers/takenController.php" method="POST">
    <input type="hidden" name="action" value="delete">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <input type="submit" class="submit-taak-delete" value="Verwijder bericht">
</form>
</div>
</form>
</div>

</div>

<?php require_once "../footer.php" ?>
</body>

</html>