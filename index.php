<?php
require __DIR__ . '/app/autoload.php';
require __DIR__ . '/views/header.php';

$message = $_SESSION['message'] ?? '';
unset($_SESSION['message']);

?>
<p> <?php if ($message !== '') : ?>
<p><?php echo $message; ?></p>
<?php endif; ?> <br>

<article class="editProfileSection">

    <h1><?php echo $config['title']; ?></h1>
    <p>On this site you can create your own ToDo-lists.</p>
</article>

<?php require __DIR__ . '/views/footer.php'; ?>