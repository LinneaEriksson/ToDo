<?php require __DIR__ . '/app/autoload.php';
require __DIR__ . '/views/header.php';


// $sql = $database->prepare('SELECT * FROM lists WHERE user_id = :id');
// $sql->bindParam(':id', $_SESSION['user']['id'], PDO::PARAM_INT);
// $sql->execute();

// $_SESSION['user'] = $sql->fetch(PDO::FETCH_ASSOC);

// $lists = $_SESSION['user']["title"];


?>

<article class="editProfileSection">

    <h1>Add a list</h1>
    <p>Add a list within wich you can create tasks.</p>

    <form action="app/users/lists.php" method="post">
        <div class="mb-3">
            <label for="list">Add a new list</label>
            <input class="form-control" type="list" name="list" id="list" placeholder="Write your list" required>
            <small class="form-text">Create your list</small>
        </div>

        <button type="submit" class="btn btn-primary">Add list</button>
    </form>
</article>

<?php
// DET HÄR FUNKAR INTE!!!!!!!!!!!!!!!!!!!
if (isset($_SESSION['lists'])) {

    foreach ($_SESSION['lists'] as $list) {
?>

        <article class="editProfileSection">
            <form action="app/users/lists.php" method="post">
                <h1>Add a task to <?= $list["title"] ?></h1>

                <?php foreach ($_SESSION['tasks'] as $task) { ?>
                    <?php print_r($task) ?>
                <?php } ?>


                <div class="mb-3">
                    <label for="title">Add a title to your ToDo</label>
                    <input class="form-control" type="title" name="title" id="title" placeholder="Title of the ToDo" required>
                    <small class="form-text">Write the title here</small>
                </div>

                <div class="mb-3">
                    <label for="todo">Add a task to your list here.</label>
                    <input class="form-control" type="todo" name="todo" id="todo" placeholder="Write your ToDo" required>
                    <small class="form-text">Create a task</small>
                </div>

                <div class="mb-3">
                    <label for="deadline">Add a deadline to your ToDo</label><br>
                    <input type="date" id="deadline" name="deadline" value="2022-01-01" min="22-01-01" max="3000-01-01">
                </div>

                <div class="mb-3">
                    <input type="checkbox" name="completed" value="Completed">
                    <label for="completed">The task is completed</label>
                </div>

                <input type="hidden" name="id" value="<?= $list["id"] ?>">

                <button type="submit" class="btn btn-primary">Add ToDo</button>
            </form>
        </article>
<?php

    }
}
require __DIR__ . '/views/footer.php'; ?>