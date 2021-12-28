<?php
require __DIR__ . '/app/autoload.php';
require __DIR__ . '/views/header.php';

$message = $_SESSION['message'] ?? '';
unset($_SESSION['message']);

?>

<article>
    <?php if ($message !== '') : ?>
        <p><?php echo $message; ?></p>
    <?php endif; ?>

    <h1><?php echo $config['title']; ?></h1>
    <p>This is the home page.</p>
</article>

<?php require __DIR__ . '/views/footer.php'; ?>