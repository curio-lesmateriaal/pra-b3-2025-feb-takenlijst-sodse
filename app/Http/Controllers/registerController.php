<?php
session_start();


$email = $_POST['email'];
if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
    header("Location: ../../../tasks/register.php?msg=Ongeldig emailadres!");
    exit;
}


$password = $_POST['password'];
$password_confirm = $_POST['password_confirm'];


if ($password !== $password_confirm) {
    header("Location: ../../../tasks/register.php?msg=Wachtwoorden komen niet overeen!");
    exit;
}



$name = $_POST['name'];
if (empty($name)) {
    header("Location: ../../../tasks/register.php?msg=Naam is verplicht!");
    exit;
}


require_once '../../../backend/conn.php';
$sql = "SELECT * FROM users WHERE username = :email";
$statement = $conn->prepare($sql);
$statement->execute([":email" => $email]);

if ($statement->rowCount() > 0) {
    header("Location: ../../../tasks/register.php?msg=Dit emailadres is al geregistreerd!");
    exit;
}


$sql = "SELECT * FROM users WHERE naam = :name";
$statement = $conn->prepare($sql);
$statement->execute([":name" => $name]);

if ($statement->rowCount() > 0) {
    header("Location: ../../../tasks/register.php?msg=Deze gebruikersnaam is al geregistreerd!");
    exit;
}


if (empty($password)) {
    header("Location: ../../../tasks/register.php?msg=Vul een geldig wachtwoord in!");
    exit;
}


$hash = password_hash($password, PASSWORD_BCRYPT);


$query = "INSERT INTO users (username, password, naam) VALUES (:email, :hash, :name)";
$statement = $conn->prepare($query);
$statement->execute([
    ":email" => $email,
    ":name" => $name,
    ":hash" => $hash
]);


header("Location: ../../../tasks/login.php?msg=Account aangemaakt!");
exit;
?>
