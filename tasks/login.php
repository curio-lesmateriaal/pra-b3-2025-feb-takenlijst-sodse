<?php
session_start();
if (isset($_SESSION['userid'])) {
    header("Location: index.php?msg=");
}
require_once __DIR__ . '/../backend/config.php';
?>




<!doctype html>
<html lang=" nl">

<head>
    <title>Takenlijst / Login</title>
    <?php require_once __DIR__ . '/../head.php'; ?>
</head>

<body>

    <div class="container-login">

    <a href="../index.php">Terug naar homepagina</a>
        <h1>Login</h1>
        <?php
        if (isset($_GET['msg']) && !empty($_GET['msg'])) {
            ?>
            <div class="msgLogin">
                <p><?php echo htmlspecialchars($_GET['msg']); ?></p>
            </div>
            <?php
        }
        ?>
        <form action="<?php echo $base_url; ?>/app/Http/Controllers/loginController.php" method="POST">
            <input type="hidden" name="action" value="create">

            <div class="stylelogin">
                <div class="form-group-login">
                    <label for="username">Gebruikersnaam:</label>
                    <input type="text" name="username" id="username" class="form-input">
                </div>


                <div class="form-group-login">
                    <label for="password">Wachtwoord: </label>
                    <input type="password" min="0" name="password" id="password" class="form-input">
                </div>
            </div>
            <input type="submit" value="Login">

        </form>
    </div>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: rgb(37, 150, 190);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
            background: linear-gradient(rgba(37, 150, 190, 0.2), rgba(144, 238, 144, 0.2)),
                url('../img/logo.png') no-repeat center center fixed;
            background-size: 1000px
        }

        .container-login {
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            text-align: center;
            width: 550px;

        }

        .container-login h1 {
            margin-bottom: 20px;
            font-size: 24px;
        }


        .msgLogin {
            margin-bottom: 25px;
            display: flex;
            justify-content: center;
            font-size: 20px;
            background-color: #FFCCCB;
            border: 2px solid black;
            width: 500px;
            border-radius: 10px;
            margin-top: 10px;
            margin-left: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        .form-group-login label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
            margin-left: 0px;
        }

        .form-group-login input {
            width: 96.5%;
            padding: 5px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        input[type="submit"] {
            background-color: green;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 5px;
            font-size: 16px;
            transition: 0.3s;
            margin-right: 100px;    
        }

        input[type="submit"]:hover {
            background-color: rgb(26, 255, 0);
        }
    </style>
</body>

</html>