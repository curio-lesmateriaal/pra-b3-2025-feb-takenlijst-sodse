<?php require_once 'head.php'; ?>

<header>
    <div class="container-header">
        <nav>
            <img src="<?php echo $base_url; ?>img/logo.png" alt="logo" class="logo">
            <a href="<?php echo $base_url; ?>index.php">Home</a> |
            <a href="<?php echo $base_url; ?>tasks/index.php">Taken</a>
        </nav>
        <div class="inlog">
            <?php
            if (isset($_SESSION['userid'])): ?>
                <p>
                <nav><a href="<?php echo $base_url; ?>tasks/logout.php">Uitloggen</a></nav>
                </p>
            <?php else: ?>
                <p>
                <nav><a href="<?php echo $base_url; ?>tasks/login.php">Inloggen</a></nav>
                </p>
            <?php endif; ?>


        </div>
    </div>
</header>