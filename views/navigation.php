<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#"><?php echo $config['title']; ?></a>

    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="/index.php">Home</a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="/about.php">About</a>
        </li>


        <?php if (isset($_SESSION['user']) === false) { ?>
            <li class="nav-item">
                <a class="nav-link" href="/login.php">Login</a>
            </li>

        <?php } ?>

        <?php if (isset($_SESSION['user']) === true) { ?>
            <li class="nav-item">
                <a class="nav-link" href="/app/users/logout.php">Logout</a>
            </li>

        <?php } ?>



    </ul>
</nav>