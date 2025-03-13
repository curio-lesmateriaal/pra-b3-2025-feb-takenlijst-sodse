<!doctype html>
<html lang="nl">

<head>
    <title>Takenlijst / Aanpassen</title>
</head>

<body>
<h1>DONE</h1>

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





            <?php foreach ($takenDone2 as $taak): ?>
                <ul>
                <li><a href="edit.php?id=<?php echo $taak['id']; ?>"><?php echo $taak['titel']; ?> Afdeling: <?php echo $taak['afdeling']; ?></a></li>


                </ul>


            <?php endforeach; ?>






</body>

</html>
