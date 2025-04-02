<?php
session_start();
if (!isset($_SESSION['userid'])) {
    $msg = "Je bent nog niet ingelogd!";
    header("Location: login.php?msg=" . $msg);
}


$afdeling = $_GET['afdeling'];


require_once __DIR__ . '/../backend/config.php'; ?>
<!doctype html>
<html lang="nl">

<head>
    <title>TakenLijst / Overzicht</title>

    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php require_once "../header.php" ?>
    

    <h1>Taken van geselecteerde afdeling:</h1>
    <div class="container-linkjes2">
    
    <div class="drop-down">
        <form action="afdeling.php" method="GET">
            <select name="afdeling">
                <option value="">-- Selecteer afdeling --</option>
                <option value="Personeel">Personeel</option>
                <option value="Horeca">Horeca</option>
                <option value="Techniek">Techniek</option>
                <option value="Inkoop">Inkoop</option>
                <option value="Klanten-service">Klantenservice</option>
                <option value="Groen">Groen</option>
            </select>
            <input div class="taken-filter" type="submit" value="filter">
        </form>
    </div>
    <div class="links">
        <a href="create.php" id="links1">Nieuwe Taak</a>
        <a href="index.php" id="links3">Terug naar dashboard</a>
        <a href="done.php" id="links2">Alle meldingen met status "Done"</a>
    </div>

    <?php
    if (isset($_GET['msg']) && !empty($_GET['msg'])) {
        ?>
        <div class="msgI">
            <p><?php echo htmlspecialchars($_GET['msg']); ?></p>
        </div>
        <?php
    }
    ?>

    <div class="container">
        <!-- To-Do -->
        <div class="to-do">
            <h1>To do</h1>
            <?php
            require_once '../backend/conn.php';

            // Query om taken op te halen met status 'todo'
            $query = "SELECT * FROM taken WHERE status = 'todo' AND afdeling = :afdeling ORDER BY deadline ASC";

            $statement = $conn->prepare($query);
            $statement->execute([
                ':afdeling' => $afdeling
            ]);
            $takenToDo = $statement->fetchAll(PDO::FETCH_ASSOC);
            ?>

            <ul>
                <?php foreach ($takenToDo as $taak): ?>
                    <li>
                        <a href="edit.php?id=<?php echo $taak['id']; ?>" class="tasks-ind">
                            <span class="afdeling-done">
                                <?php echo $taak['titel']; ?> - Afdeling: <?php echo $taak['afdeling']; ?> - Deadline:
                                <?php echo $taak['deadline']; ?>
                            </span>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>

        <!-- In-Progress -->
        <div class="in-progress">
            <h1>In progress</h1>
            <?php
            $query = "SELECT * FROM taken WHERE status = 'in-progress' AND afdeling = :afdeling ORDER BY deadline ASC";

            $statement = $conn->prepare($query);
            $statement->execute([
                ':afdeling' => $afdeling
            ]);
            $takenInProgress = $statement->fetchAll(PDO::FETCH_ASSOC);
            ?>

            <ul>
                <?php foreach ($takenInProgress as $taak): ?>
                    <li>
                        <a href="edit.php?id=<?php echo $taak['id']; ?>" class="tasks-ind2">
                            <span class="afdeling-done">
                                <?php echo $taak['titel']; ?> - Afdeling: <?php echo $taak['afdeling']; ?> - Deadline:
                                <?php echo $taak['deadline']; ?>
                            </span>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>

        <!-- Done -->
        <div class="done">
            <h1>Done</h1>
            <?php
            $query = "SELECT * FROM taken WHERE status = 'done' AND afdeling = :afdeling ORDER BY deadline ASC";

            $statement = $conn->prepare($query);
            $statement->execute([
                ':afdeling' => $afdeling
            ]);
            $takenDone = $statement->fetchAll(PDO::FETCH_ASSOC);
            ?>

            <ul>
                <?php foreach ($takenDone as $taak): ?>
                    <li>
                        <a href="edit.php?id=<?php echo $taak['id']; ?>" class="tasks-ind3">
                            <span class="afdeling-done">
                                <?php echo $taak['titel']; ?> - Afdeling: <?php echo $taak['afdeling']; ?> - Deadline:
                                <?php echo $taak['deadline']; ?>
                            </span>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>

    <?php require_once "../footer.php" ?>
</body>

</html>