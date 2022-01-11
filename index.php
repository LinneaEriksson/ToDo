<?php
require __DIR__ . '/app/autoload.php';
require __DIR__ . '/views/header.php';

$message = $_SESSION['message'] ?? '';
unset($_SESSION['message']);

//  Kan detta läggas i en egen fil eller som en funktion? Hämtar ut listorna
$sql = $database->prepare('SELECT * FROM lists WHERE user_id = :id ORDER BY id desc');
$sql->bindParam(':id', $_SESSION['user']['id'], PDO::PARAM_INT);
$sql->execute();

$lists = $sql->fetchAll(PDO::FETCH_ASSOC);

?>
<p> <?php if ($message !== '') : ?>
<p><?php echo $message; ?></p>
<?php endif; ?> <br>

<article class="editProfileSection">

    <h1><?php echo $config['title']; ?></h1>
    <p>On this site you can create your own ToDo-lists.</p>

    <?php
    foreach ($lists as $list) {

        $date = date('Y-m-d');

        $sql = $database->prepare('SELECT tasks.deadline, tasks.description, tasks.title, tasks.list_id, tasks.completed, lists.id FROM tasks INNER JOIN lists on tasks.list_id = lists.id WHERE list_id = :id AND deadline = :date');
        $sql->bindParam(':id', $list["id"], PDO::PARAM_INT);
        $sql->bindParam(':date', $date, PDO::PARAM_STR);
        $sql->execute();


        $tasks = $sql->fetchAll(PDO::FETCH_ASSOC);


        echo "This is what you have ToDo today!";

        foreach ($tasks as $task) :
    ?>
            <div class="tasks">
                <div>
                    <h4> <?php echo $task['title']; ?></h4>
                    <?php echo $task['description']; ?><br>
                    <?php echo $task['deadline']; ?>
                    <?php echo $task['completed']; ?>
                </div>
            <?php
        endforeach; ?>

        <?php

    }

        ?>
</article>
<?php

require __DIR__ . '/views/footer.php'; ?>