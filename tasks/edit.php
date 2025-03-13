<!doctype html>
<html lang="nl">

<head>
    <title>Prikbord / Aanpassen</title>
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
                    <option value="green" <?php echo ($bericht['afdeling'] == 'green') ? 'selected' : ''; ?>>Groen
                    </option>
                    <option value="staff" <?php echo ($bericht['afdeling'] == 'staff') ? 'selected' : ''; ?>>Personeel
                    </option>
                    <option value="catering" <?php echo ($bericht['afdeling'] == 'catering') ? 'selected' : ''; ?>>Horeca
                    </option>
                    <option value="technic" <?php echo ($bericht['afdeling'] == 'technic') ? 'selected' : ''; ?>>Techniek
                    </option>
                    <option value="procurment" <?php echo ($bericht['afdeling'] == 'procurment') ? 'selected' : ''; ?>>
                        Inkoop</option>
                    <option value="guest-service" <?php echo ($bericht['afdeling'] == 'guest-service') ? 'selected' : ''; ?>>Klantenservice</option>
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