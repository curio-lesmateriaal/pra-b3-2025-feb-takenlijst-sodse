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
    <title>TakenLijst / Overzicht</title>

    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php require_once "../header.php" ?>

    <div class="container-linkjes2">
        <h1 div class="index-h1">Taken</h1>
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
            <a href="my.php" id="links3">Bekijk mijn taken</a>
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
                $query = "SELECT * FROM taken WHERE status = 'todo' ORDER BY deadline ASC";

                $statement = $conn->prepare($query);
                $statement->execute();
                $takenToDo = $statement->fetchAll(PDO::FETCH_ASSOC);
                ?>
                <?php foreach ($takenToDo as $taak): ?>
                    <a href="edit.php?id=<?php echo $taak['id']; ?>" class="tasks-ind">
                        <span class="afdeling-done">
                            <div><?php echo htmlspecialchars($taak['titel']); ?></div>
                            <div>Afdeling: <?php echo htmlspecialchars($taak['afdeling']); ?></div>
                            <div>Deadline: <?php echo htmlspecialchars($taak['deadline']); ?></div>
                        </span>

                    </a>
                <?php endforeach; ?>
            </div>

            <!-- In-Progress -->
            <div class="in-progress">
                <h1>In progress</h1>
                <?php
                $query = "SELECT * FROM taken WHERE status = 'in-progress' ORDER BY deadline ASC";

                $statement = $conn->prepare($query);
                $statement->execute();
                $takenInProgress = $statement->fetchAll(PDO::FETCH_ASSOC);
                ?>

                <?php foreach ($takenInProgress as $taak): ?>
                    <a href="edit.php?id=<?php echo $taak['id']; ?>" class="tasks-ind2">
                        <span class="afdeling-done">
                            <div><?php echo htmlspecialchars($taak['titel']); ?></div>
                            <div>Afdeling: <?php echo htmlspecialchars($taak['afdeling']); ?></div>
                            <div>Deadline: <?php echo htmlspecialchars($taak['deadline']); ?></div>
                        </span>

                    </a>
                <?php endforeach; ?>
            </div>

            <!-- Done -->
            <div class="done">
                <h1>Done</h1>
                <?php
                $query = "SELECT * FROM taken WHERE status = 'done' ORDER BY deadline ASC";

                $statement = $conn->prepare($query);
                $statement->execute();
                $takenDone = $statement->fetchAll(PDO::FETCH_ASSOC);
                ?>
                <?php foreach ($takenDone as $taak): ?>
                    <a href="edit.php?id=<?php echo $taak['id']; ?>" class="tasks-ind3">
                        <span class="afdeling-done">
                            <div><?php echo htmlspecialchars($taak['titel']); ?></div>
                            <div>Afdeling: <?php echo htmlspecialchars($taak['afdeling']); ?></div>
                            <div>Deadline: <?php echo htmlspecialchars($taak['deadline']); ?></div>
                        </span>

                    </a>
                <?php endforeach; ?>
            </div>
        </div>

        <?php require_once "../footer.php" ?>
</body>

</html>