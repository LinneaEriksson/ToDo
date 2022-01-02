<?php require __DIR__ . '/app/autoload.php'; ?>
<?php require __DIR__ . '/views/header.php';


$message = $_SESSION['message'] ?? '';
unset($_SESSION['message']);

?>

<article class="editProfileSection">
    <h1>Login</h1>

    <p> <?php if ($message !== '') : ?>
    <p><?php echo $message; ?></p>
<?php endif; ?> <br>

<form action="app/users/login.php" method="post">
    <div class="mb-3">
        <label for="email">Email</label>
        <input class="form-control" type="email" name="email" id="email" placeholder="francis@darjeeling.com" required>
        <small class="form-text">Please provide your email address.</small>
    </div>

    <div class="mb-3">
        <label for="password">Password</label>
        <input class="form-control" type="password" name="password" id="password" required>
        <small class="form-text">Please provide the your password (passphrase).</small>
    </div>

    <button type="submit" class="btn btn-primary">Login</button>
</form>
</article>

<article class="editProfileSection">
    <!-- För att komma vidare till sign up -->
    <h1> You don't have an account yet?</h1>
    <p>Click the button below to sign up today.
    <form method="get" action="/signup.php">
        <button type="submit" class="btn btn-primary">Sign up here!</button>
    </form>
</article>


<?php require __DIR__ . '/views/footer.php'; ?>