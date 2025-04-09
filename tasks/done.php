<?php
session_start();
if (!isset($_SESSION['userid'])) {
    $msg = "Je bent nog niet ingelogd!";
    header("Location: login.php?msg=" . $msg);
}
?>


<!doctype html>
<html lang="nl">

<head>
    <title>Takenlijst / Aanpassen</title>
    <?php require_once "../head.php" ?>
</head>

<body>
    <?php require_once "../header.php" ?>

    <h1 div class="doneweb">DONE</h1>

    <h3>Alle taken die Done zijn:</h3>

    <?php
    //1. Verbinding
    require_once '../backend/conn.php';

    //2. Query
    $query = "SELECT * FROM  taken WHERE status = 'done' ORDER BY deadline ASC";

    //3. Prepare
    $statement = $conn->prepare($query);
    //4. Execute
    $statement->execute();

    //5. Fetch
    $takenDone2 = $statement->fetchAll(PDO::FETCH_ASSOC);
    ?>




<?php foreach ($takenDone2 as $taak): ?>
    <div class="TakenDone">
        <a href="edit.php?id=<?php echo $taak['id']; ?>" class="task-link">
            <div class="task-title"><?php echo htmlspecialchars($taak['titel']); ?></div>
            <span class="afdeling-done">Afdeling: <?php echo $taak['afdeling']; ?></span>
            <span class="afdeling-done">Deadline: <?php echo $taak['deadline']; ?></span>
        </a>
    </div>
<?php endforeach; ?>

    <?php require_once "../footer.php" ?>

</body>

</html>