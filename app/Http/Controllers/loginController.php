<?php

session_start();

$username = $_POST['username'];
$password = $_POST['password'];

//1. Verbinding
require_once '../../../backend/conn.php';

//2. Query
$query = "SELECT * FROM  users WHERE username = :username";

//3. Prepare
$statement = $conn->prepare($query);
//4. Execute
$statement->execute([
    ":username" => $username
]);

//5. Fetch
$user = $statement->fetch(PDO::FETCH_ASSOC);

if ($statement->rowCount() < 1) {
    header("Location: ../../../tasks/login.php?msg=Gebruikersnaam bestaat niet");
    die();
}

if (!password_verify(($password), $user['password'])) {
    header("Location: ../../../tasks/login.php?msg=Wachtwoord is niet correct");
    die();
}

$_SESSION['userid'] = $user['id'];

header("Location: ../../../tasks/index.php?msg=Ingelogd");

?>