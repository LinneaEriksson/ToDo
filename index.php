<?php
require __DIR__ . '/app/autoload.php';
require __DIR__ . '/views/header.php';

$message = $_SESSION['message'] ?? '';
unset($_SESSION['message']);


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
    $tasks = fetchTasksWithDeadlineToday($database);


    if ($tasks) {
    ?>
        <article class="editProfileSection">

            <h1>This is what you have ToDo today</h1>

            <?php
            foreach ($tasks as $task) :
                if ($task['completed']) {
                } else {
            ?>
                    <div class="tasksUncompleted">
                        <h4> <?php echo $task['title']; ?></h4>
                        <?php echo $task['description']; ?><br>
                        <input type="hidden" name="listId" value="<?= $list["id"] ?>">
                        <button type="submit" class="completedTask">Completed</button>
                    </div>

            <?php

                }
            endforeach; ?>

            <h1>Completed tasks with deadline today</h1>
            <?php
            foreach ($tasks as $task) :
                if ($task['completed']) {
            ?>
                    <div class="tasksCompleted">
                        <h4> <?php echo $task['title']; ?></h4>
                        <?php echo $task['description']; ?><br>
                        <?php echo $task['completed']; ?>
                    </div>
            <?php

                }
            endforeach; ?>

        </article>
    <?php
    } else {
    ?>
        <article class="editProfileSection">

            <h1>You don't have anything ToDo today!</h1>
            <p>If you're bored you can always
                <a href="/tasks.php">add a Todo!</button>

            </p>
    <?php
    }
}

require __DIR__ . '/views/footer.php'; ?>