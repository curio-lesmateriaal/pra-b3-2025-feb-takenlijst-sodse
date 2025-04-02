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
        <h1>Login</h1>
        <?php
        if (isset($_GET['msg']) && !empty($_GET['msg'])) {
            ?>
            <div class="msg">
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
                background-color: #f4f4f4;
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
                margin: 0;
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


            .msg {
                background-color:rgb(255, 0, 0);
                color:rgb(0, 0, 0);
                padding: 10px;
                margin-bottom: 15px;
                border-radius: 5px;
            }

            /* Form styling */
            form {
                display: flex;
                flex-direction: column;
            }

            /* Label styling */
            .form-group-login label {
                font-weight: bold;
                display: block;
                margin-bottom: 5px;
                text-align: left;
            }

            /* Input field styling */
            .form-group-login input {
                width: 100%;
                padding: 10px;
                margin-bottom: 15px;
                border: 1px solid #ccc;
                border-radius: 5px;
                font-size: 16px;
            }

            /* Submit button styling */
            input[type="submit"] {
                background-color: #007bff;
                color: white;
                border: none;
                padding: 10px;
                border-radius: 5px;
                font-size: 16px;
                cursor: pointer;
                transition: 0.3s;
            }

            input[type="submit"]:hover {
                background-color: #0056b3;
            }
        </style>
    </body>

    </html>