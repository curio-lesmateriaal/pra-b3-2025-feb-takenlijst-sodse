<?php

$action = $_POST['action'];

    $id = $_POST['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $department = $_POST['department'];
    $status = $_POST['status'];
    $deadline = $_POST['deadline'];
    $user = $_POST['user'];
    $created_at = $_POST['created at'];

if($action == "create") {

    //1. Verbinding
    require_once '../../../config/conn.php';

    //2. Query
    $query="INSERT INTO taken (id, titel, beschrijving, afdeling, status, deadline, user) VALUES(:id, :title, :description, :department, :status, :deadline, :user)";

    //3. Prepare
    $statement = $conn->prepare($query);

     //4. Voer statement uit, geef nu waarden mee voor de placeholders
     $statement->execute([
        ":title" => $title,
        ":description" => $description,
        ":department" => $department,
        ":status" => $status,
        ":deadline" => $deadline,
        ":user" => $user,
        ":created_at" => $created_at
        ]);

         header("Location: ../../../tasks/index.php?msg=Taak opgeslagen");
}

if($action == "edit") {

     //1. Verbinding
     require_once '../../../config/conn.php';

     //2. Query
     $query="UPDATE taken SET titel = :title , beschrijving = :description,
     afdeling = :department, status = :status, deadline = :deadline, 
     user = :user, WHERE id = :id
     ";
 
     //3. Prepare
     $statement = $conn->prepare($query);
 
      //4. Voer statement uit, geef nu waarden mee voor de placeholders
      $statement->execute([
         ":title" => $title,
         ":description" => $description,
         ":department" => $department,
         ":status" => $status,
         ":deadline" => $deadline,
         ":user" => $user,
         ":created_at" => $created_at,
         ":id"  => $id
         ]);
 
          header("Location: ../../../tasks/index.php?msg=Taak is aangepast");
 }
    
 if($action == "delete") {
    $id = $_POST['id'];

    //1. Verbinding
    require_once '../../../config/conn.php';

    //2. Query
    $query="DELETE FROM taken WHERE id = :id";

    //3. Prepare
    $statement = $conn->prepare($query);

    //4. Execute
    $statement->execute([
    ":id"  => $id
    ]);

    header("Location: ../../../resources/views/meldingen/index.php?msg=Taak is verwijderd");
}
