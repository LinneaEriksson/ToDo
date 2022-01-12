<?php
require __DIR__ . '/app/autoload.php';
require __DIR__ . '/views/header.php';

$message = $_SESSION['message'] ?? '';
unset($_SESSION['message']);

?> <p> <?php if ($message !== '') : ?>
<div class="messageIndexPage">
    <p><?php echo $message; ?></p>
</div>
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


            ?>
                <div class="tasks">
                    <div class="spaceBetween">
                        <div>
                            <h4> <?php echo $task['title']; ?></h4>
                            <?php echo $task['description']; ?><br>
                            <?php echo "Deadline: Today!";; ?>
                        </div>


                        <!-- uncomplete, Edit or delete buttons for task here -->

                        <div class="buttonsInLine">

                            <?php
                            if ($task['completed'] === 'Completed') {
                            ?>
                                <form action="app/tasks/uncomplete.php" method="post">
                                    <input type="hidden" name="completed" value="NULL">
                                    <input type="hidden" name="unCompleteTaskId" value="<?= $task["id"] ?>">
                                    <button type="submit" class="unCompleteTask"></button>
                                </form>
                            <?php } else {
                            ?>
                                <form action="app/tasks/complete.php" method="post">
                                    <input type="hidden" name="completed" value="Completed">
                                    <input type="hidden" name="completeTaskId" value="<?= $task['id'] ?>">
                                    <button type="submit" class="completeTask"></button>
                                </form>

                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            <?php endforeach;
            ?>
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