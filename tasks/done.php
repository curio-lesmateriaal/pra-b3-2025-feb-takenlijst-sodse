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
            $query = "SELECT * FROM  taken WHERE status = 'done'";

            //3. Prepare
            $statement = $conn->prepare($query);
            //4. Execute
            $statement->execute();

            //5. Fetch
            $takenDone2 = $statement->fetchAll(PDO::FETCH_ASSOC);
            ?>




            <div class="TakenDone">
            <?php foreach ($takenDone2 as $taak): ?>
                <ul>
                <li><a href="edit.php?id=<?php echo $taak['id']; ?>"><span class="titel"><?php echo $taak['titel']; ?></span> <span class="afdeling-done">Afdeling: <?php echo $taak['afdeling']; ?></span></a></li>



                </ul>


            <?php endforeach; ?>
            </div>






</body>

</html>
