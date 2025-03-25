<?php require_once __DIR__ . '/../backend/config.php'; ?>
<!doctype html>
<html lang="nl">

<head>
    <title>TakenLijst / Overzicht</title>
    <?php require_once "../head.php" ?>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php require_once "../header.php" ?>

    <h1>Taken</h1>
    <div class="links">
        <a href="create.php" id="links1">Nieuwe Taak</a>
        <a href="done.php" id="links2">Alle meldingen met status "Done"</a>
    </div>

    <div class="msg">
        <?php
        // Dit is voor het tonen van meldingen
        if (isset($_GET['msg'])) {
            $message = $_GET['msg'];
            echo "<p>$message</p>";
        }
        ?>
    </div>

    <div class="container">
        <!-- To-Do -->
        <div class="to-do">
            <h1>To do</h1>
            <?php
            require_once '../backend/conn.php';

            // Query om taken op te halen met status 'todo'
            $query = "SELECT * FROM taken WHERE status = 'todo'";

            $statement = $conn->prepare($query);
            $statement->execute();
            $takenToDo = $statement->fetchAll(PDO::FETCH_ASSOC);
            ?>

            <ul>
                <?php foreach ($takenToDo as $taak): ?>
                    <li>
                        <a href="edit.php?id=<?php echo $taak['id']; ?>" class="tasks-ind">
                            <span class="afdeling-done">
                                <?php echo $taak['titel']; ?> - Afdeling: <?php echo $taak['afdeling']; ?>
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
            $query = "SELECT * FROM taken WHERE status = 'in-progress'";

            $statement = $conn->prepare($query);
            $statement->execute();
            $takenInProgress = $statement->fetchAll(PDO::FETCH_ASSOC);
            ?>

            <ul>
                <?php foreach ($takenInProgress as $taak): ?>
                    <li>
                        <a href="edit.php?id=<?php echo $taak['id']; ?>" class="tasks-ind2">
                            <span class="afdeling-done">
                                <?php echo $taak['titel']; ?> - Afdeling: <?php echo $taak['afdeling']; ?>
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
            $query = "SELECT * FROM taken WHERE status = 'done'";

            $statement = $conn->prepare($query);
            $statement->execute();
            $takenDone = $statement->fetchAll(PDO::FETCH_ASSOC);
            ?>

            <ul>
                <?php foreach ($takenDone as $taak): ?>
                    <li>
                        <a href="edit.php?id=<?php echo $taak['id']; ?>" class="tasks-ind3">
                            <span class="afdeling-done">
                                <?php echo $taak['titel']; ?> - Afdeling: <?php echo $taak['afdeling']; ?>
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