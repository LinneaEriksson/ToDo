<?php
require __DIR__ . '/app/autoload.php';
require __DIR__ . '/views/header.php';

$message = $_SESSION['message'] ?? '';
unset($_SESSION['message']);

//  Kan detta läggas i en egen fil eller som en funktion? Hämtar ut listorna
?> <p> <?php if ($message !== '') : ?>
<p><?php echo $message; ?></p>
<?php endif; ?> <br>
<?php

if (isset($_SESSION['user']) === false) {
?>
    <article class="editProfileSection">

        <h1><?php echo $config['title']; ?></h1>
        <p>Welcome to ToDo!<br>
            On this site you can create your own ToDo-lists.<br>
            Click here to get started today!</p>
        <form method="get" action="/signup.php">
            <button type="submit" class="btn btn-primary">Sign up here!</button>
    </article>
<?php
}



if (isset($_SESSION['user']) === true) {

?>

    <article class="editProfileSection">

        <h1>This is what you have ToDo today</h1>

        <?php
        $date = date('Y-m-d');

        $sql = $database->prepare('SELECT * FROM tasks WHERE user_id = :id AND deadline = :date ORDER BY completed');
        $sql->bindParam(':id', $_SESSION['user']['id'], PDO::PARAM_INT);
        $sql->bindParam(':date', $date, PDO::PARAM_STR);
        $sql->execute();

        $tasksTests = $sql->fetchAll(PDO::FETCH_ASSOC);


        foreach ($tasksTests as $taskTest) :
            if ($taskTest['completed']) {
            } else {
        ?>
                <div class="tasksUncompleted">
                    <h4> <?php echo $taskTest['title']; ?></h4>
                    <?php echo $taskTest['description']; ?><br>
                </div>
        <?php

            }
        endforeach; ?>

        <h1>Completed tasks with deadline today</h1>
        <?php
        foreach ($tasksTests as $taskTest) :
            if ($taskTest['completed']) {
        ?>
                <div class="tasksCompleted">
                    <h4> <?php echo $taskTest['title']; ?></h4>
                    <?php echo $taskTest['description']; ?><br>
                    <?php echo $taskTest['completed']; ?>
                </div>
        <?php

            }
        endforeach; ?>

    </article>
<?php
}

require __DIR__ . '/views/footer.php'; ?>