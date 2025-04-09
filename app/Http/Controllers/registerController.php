<?php 
//Checkofiemandníetisingelogd
/// TODO: start sessie
if(isset($_SESSION['userid']))
{
    die("Kan niet registreren - je bent al ingelogd");
}

//kernbergip 17, stap 2a:
$email = $_POST['email'];
if(filter_var($email, FILTER_VALIDATE_EMAIL) === false);
{
    die('Email is ongeldig');
}

//Kernbegrip17,stap2b
$password = $_POST['password'];
$password_check = .....................
if(..........................)
{
    die("Wachtwoorden zijn niet gelijk!");
}

//Kernbegrip17,stap2c:
require_once 'conn.php';
$sql= "SELECT* FROM users WHERE username = :email";
$statement = $conn->prepare($sql);
$statement->execute([":email"=>$email]);
if($statement->rowCount() > 0)
{
    ....................
}

//Kernbegrip17,stap3a:
if(empty(............))
{
    die("Wacht woord mag niet leeg zijn!");
}
$hash = ....................

//Kernbegrip17,stap3b:
$query="INSERT INTO users (username, password) VALUES (:email, :hash)";
..................................
$statement->execute([
    ............................,
    ............................
]);

//Stuurnaarlogin:
..................................
exit;

