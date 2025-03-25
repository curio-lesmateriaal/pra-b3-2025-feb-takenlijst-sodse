<?php
session_start();
if (isset($_SESSION['userid'])) {
    header("Location: index.php?msg=");
}
require_once __DIR__ . '/../backend/config.php';
?>


<!doctype html>
<html lang="nl">

<head>
    <title>Takenlijst / Login</title>
    <?php require_once __DIR__ . '/../head.php'; ?>
</head>

<body>

    <?php require_once __DIR__ . '/../header.php'; ?>

    <div class="container-login">
        <h1>Login</h1>
        <?php if (isset($_GET['msg'])) {
            echo "<div class='msg'>" . $_GET['msg'] . "</div>";
        } ?>

        <form action="<?php echo $base_url; ?>/app/Http/Controllers/loginController.php" method="POST">
            <input type="hidden" name="action" value="create">

            <div class="form-group-login">
                <label for="username">Gebruikersnaam:</label>
                <input type="text" name="username" id="username" class="form-input">
            </div>


            <div class="form-group-login">
                <label for="password">Wachtwoord: </labe>
                    <input type="password" min="0" name="password" id="password" class="form-input">
            </div>

            <input type="submit" value="Login">

        </form>
    </div>

</body>

</html>