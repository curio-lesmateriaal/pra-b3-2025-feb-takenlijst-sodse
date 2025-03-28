<?php

$action = $_POST['action'];




if ($action == "create") {


    $title = $_POST['title'];
    $content = $_POST['content'];
    $department = $_POST['department'];
    $deadline = $_POST['deadline'];


    if (empty($title)) {
        $errors[] = "Vul de titel van de taak in.";
    }

    if (empty($content)) {
        $errors[] = "Vul een geldige beschrijving in.";
    }

    if (isset($errors)) {
        var_dump($errors);
        exit();
    }




    //1. Verbinding
    require_once '../../../backend/conn.php';

    //2. Query
    $query = "INSERT INTO taken (titel, beschrijving, afdeling, deadline) VALUES(:title, :content, :department, :deadline)";

    //3. Prepare
    $statement = $conn->prepare($query);

    //4. Voer statement uit, geef nu waarden mee voor de placeholders
    $statement->execute([
        ":title" => $title,
        ":content" => $content,
        ":department" => $department,
        ":deadline" => $deadline
    ]);

    header("Location: ../../../tasks/index.php?msg=Taak opgeslagen");
}

if ($action == "edit") {



    $id = $_POST['id'];
    $title = $_POST['title'];
    $content = $_POST['content'];
    $department = $_POST['department'];
    $deadline = $_POST['deadline'];
    $status = $_POST['status'];


    if (empty($title)) {
        $errors[] = "Vul de titel van de taak in.";
    }

    if (empty($content)) {
        $errors[] = "Vul een geldige beschrijving in.";
    }
    if (empty($deadline)) {
        $errors[] = "Vul een geldige deadline in.";
    }
    if (isset($errors)) {
        var_dump($errors);
        exit();
    }



    //1. Verbinding
    require_once '../../../backend/conn.php';

    //2. Query
    $query = "UPDATE taken SET titel = :title , beschrijving = :content,
     afdeling = :department, deadline = :deadline, status = :status WHERE id = :id
     ";

    //3. Prepare
    $statement = $conn->prepare($query);

    //4. Voer statement uit, geef nu waarden mee voor de placeholders
    $statement->execute([
        ":title" => $title,
        ":content" => $content,
        ":department" => $department,
        ":deadline" => $deadline,
        ":status" => $status,
        ":id" => $id
    ]);

    header("Location: ../../../tasks/index.php?msg=Taak is aangepast");
}

if ($action == "delete") {
    $id = $_POST['id'];

    //1. Verbinding
    require_once '../../../backend/conn.php';

    //2. Query
    $query = "DELETE FROM taken WHERE id = :id";

    //3. Prepare
    $statement = $conn->prepare($query);

    //4. Execute
    $statement->execute([
        ":id" => $id
    ]);

    header("Location: ../../../tasks/index.php?msg=Taak is verwijderd");
}
