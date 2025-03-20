<!doctype html>
<html lang="nl">

<head>
    <title>TakenLijst / Aanpassen</title>
</head>

<body>

    <div class="container">
        <h1>Aanpassen taak</h1>

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

        <!-- Formulier voor edit: -->
        <form action="../app/Http/Controllers/takenController.php" method="POST">
            <input type="hidden" name="action" value="edit">
            <input type="hidden" name="id" value="<?php echo $id; ?>">

            <div class="form-group">
                <label for="title">Titel</label>
                <input type="text" id="title" name="title" value="<?php echo $bericht['titel']; ?>">
            </div>

            <div class="form-group">
                <label for="department">Afdeling</label>
                <select name="department">
                    <option value="Groen" <?php echo ($bericht['afdeling'] == 'Groen') ? 'selected' : ''; ?>>Groen
                    </option>
                    <option value="Personeel" <?php echo ($bericht['afdeling'] == 'Personeel') ? 'selected' : ''; ?>>Personeel
                    </option>
                    <option value="Horeca" <?php echo ($bericht['afdeling'] == 'Horeca') ? 'selected' : ''; ?>>Horeca
                    </option>
                    <option value="Techniek" <?php echo ($bericht['afdeling'] == 'Techniek') ? 'selected' : ''; ?>>Techniek
                    </option>
                    <option value="Inkoop" <?php echo ($bericht['afdeling'] == 'Inkoop') ? 'selected' : ''; ?>>
                        Inkoop</option>
                    <option value="Klanten-service" <?php echo ($bericht['afdeling'] == 'Klanten-service') ? 'selected' : ''; ?>>Klantenservice</option>
                </select>
            </div>

            <div class="form-group">
                <label for="status">Status</label>
                <select name="status">
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

            <div class="form-group">
                <input type="submit" value="Pas aan">
            </div>
        </form>


        <form action="../app/Http/Controllers/takenController.php" method="POST">
            <input type="hidden" name="action" value="delete">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <input type="submit" value="Verwijder bericht">
        </form>

    </div>

    
</body>

</html>