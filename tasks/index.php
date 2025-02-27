<?php require_once __DIR__.'/../backend/config.php'; ?>
<!doctype html>
<html lang="nl">

<head>
    <title>TakenLijst / overzicht</title>
   
</head>

<body>

    <div class="container">
        <h1>Taken</h1>
        <a href="create.php">Nieuwe Taak &gt;</a>

        <div>
            <?php
            //1. Verbinding
            require_once '../backend/conn.php';

            //2. Query
            $query = "SELECT * FROM  taken";

            //3. Prepare
            $statement = $conn->prepare($query);
            //4. Execute
            $statement->execute();

            //5. Fetch
            $taken = $statement->fetchAll(PDO::FETCH_ASSOC);

          
            
            ?>
            <table>
                <tr>
                    <th>Titel</th>
                   
                </tr>
            <?php

            foreach($taken as $taak): ?>
                
                    <td><?php echo $taak ['titel']; ?></td>
                    
                </tr>
               
            <?php endforeach; ?>
            </table>
            
            

        </div>
    </div>

</body>

</html>