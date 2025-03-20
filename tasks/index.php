<?php require_once __DIR__ . '/../backend/config.php'; ?>
<!doctype html>
<html lang="nl">

<head>
    <title>TakenLijst / Overzicht</title>
    <?php require_once "../head.php" ?>
</head>



<body>
    <?php require_once "../header.php" ?>

    <h1>Taken</h1>
    <a href="create.php">Nieuwe Taak &gt;</a>
    <a href="done.php">Alle meldingen met status "Done" &gt;</a>
    <div class="container">
        <?php
        //DIT IS VOOR MELDING TE TONEN!!!!
        if (isset($_GET['msg'])) {

            $message = $_GET['msg'];


            echo "<p>$message</p>";
        }
        ?>


        <div class="to-do">
            <h1>To do</h1>
            <?php
            //1. Verbinding
            require_once '../backend/conn.php';

            //2. Query
            $query = "SELECT * FROM  taken WHERE status = 'todo'";

            //3. Prepare
            $statement = $conn->prepare($query);
            //4. Execute
            $statement->execute();

            //5. Fetch
            $takenToDo = $statement->fetchAll(PDO::FETCH_ASSOC);
            ?>





            <?php foreach ($takenToDo as $taak): ?>
                <ul>

                    <li><a href="edit.php?id=<?php echo $taak['id']; ?>" class="tasks-ind"><span class="afdeling-done"><?php echo $taak['titel']; ?> Afdeling:
                            <?php echo $taak['afdeling']; ?></a></li>



                </ul>


            <?php endforeach; ?>
        </div>


        <div class="in-progress">
            <h1>In progress</h1>
            <?php
            //1. Verbinding
            require_once '../backend/conn.php';

            //2. Query
            $query = "SELECT * FROM  taken WHERE status = 'in-progress'";

            //3. Prepare
            $statement = $conn->prepare($query);
            //4. Execute
            $statement->execute();

            //5. Fetch
            $takenInProgress = $statement->fetchAll(PDO::FETCH_ASSOC);
            ?>





            <?php foreach ($takenInProgress as $taak): ?>
                    <ul>
                        <li><a href="edit.php?id=<?php echo $taak['id']; ?>" class="tasks-ind2"><span class="afdeling-done"><?php echo $taak['titel']; ?> Afdeling:
                                <?php echo $taak['afdeling']; ?></a></li>
                    </ul>


            <?php endforeach; ?>
        </div>

        <div class="done">
            <h1>Done</h1>
            <?php
            //1. Verbinding
            require_once '../backend/conn.php';

            //2. Query
            $query = "SELECT * FROM  taken WHERE status = 'done'";

            //3. Prepare
            $statement = $conn->prepare($query);
            //4. Execute
            $statement->execute();

            //5. Fetch
            $takenDone = $statement->fetchAll(PDO::FETCH_ASSOC);
            ?>





            <?php foreach ($takenDone as $taak): ?>
                <ul>
                    <li><a href="edit.php?id=<?php echo $taak['id']; ?>" class="tasks-ind3"><span class="afdeling-done"><?php echo $taak['titel']; ?> Afdeling:
                    <?php echo $taak['afdeling']; ?></a></li>

                </ul>


            <?php endforeach; ?>







        </div>
    </div>
</body>

</html>