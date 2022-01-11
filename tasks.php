<?php require __DIR__ . '/app/autoload.php';
require __DIR__ . '/views/header.php';


//  Kan detta läggas i en egen fil eller som en funktion? 
$sql = $database->prepare('SELECT * FROM lists WHERE user_id = :id ORDER BY id desc');
$sql->bindParam(':id', $_SESSION['user']['id'], PDO::PARAM_INT);
$sql->execute();

$lists = $sql->fetchAll(PDO::FETCH_ASSOC);

?>
<!-- Add a new list -->
<article class="editProfileSection">
    <h1>Add a new list</h1>

    <form action="app/lists/lists.php" method="post">
        <div class="mb-3">
            <label for="list">Add a list within wich you can create tasks.</label>
            <input class="form-control" type="list" name="list" id="list" required>

        </div>

        <button type="submit" class="btn btn-primary">Add list</button>
    </form>
</article>

<?php
foreach ($lists as $list) {

    $sql = $database->prepare('SELECT tasks.id, tasks.deadline, tasks.description, tasks.title, tasks.list_id, tasks.completed, lists.id  
    FROM tasks 
    INNER JOIN lists on tasks.list_id = lists.id 
    WHERE list_id = :id');

    $sql->bindParam(':id', $list["id"], PDO::PARAM_INT);
    $sql->execute();

    $tasks = $sql->fetchAll(PDO::FETCH_ASSOC);
?>
    <!-- Shows the lists, edit and delete options -->
    <article class="editProfileSection">
        <div class="spaceBetween">
            <h1> <?= $list["title"] ?></h1>
            <div class="buttonsInLine">

                <button class="btn btn-primary btnEditLists">Edit</button>

                <form action="app/lists/delete.php" method="post">
                    <input type="hidden" name="deleteList" value="<?= $list["id"] ?>">
                    <button type="submit" class="btn btn-primary btnDelete">Delete</button>
                </form>
            </div>
        </div>
        <!-- edit list -->
        <form action="app/lists/edit.php" method="post">
            <div class="mb-3">
                <div class="editListForm hidden">
                    <label for="editList">Edit your list</label>
                    <input class="form-control" type="text" name="editList" id="editList" placeholder="<?= $list["title"] ?>" required>
                    <input type="hidden" name="listId" value="<?= $list["id"] ?>">
                    <button type="submit" class="btn btn-primary">Edit list</button>
                </div>
            </div>
        </form>
        <!-- Shows tasks -->

        <?php foreach ($tasks as $task) :
        ?>

            <div class="tasks">
                <div class="spaceBetween">
                    <div>
                        <h4> <?php echo $task['title']; ?></h4>
                        <?php echo $task['description']; ?><br>
                        <?php echo $task['deadline']; ?>
                        <?php echo $task['completed']; ?>
                        <?php echo $task['id']; ?>

                    </div>
                    <!-- Edit or delete task here -->

                    <div class="buttonsInLine">
                        <button class="btn btn-primary btnEditLists">Edit</button>

                        <form action="app/tasks/delete.php" method="post">
                            <input type="hidden" name="deleteTask" value="<?= $task['id'] ?>">
                            <button type="submit" class="btn btn-primary btnDelete">Delete</button>
                        </form>
                    </div>
                </div>

                <!-- edit task -->

                <div class="mb-3">
                    <form action="app/tasks/edit.php" method="post">
                        <label for="editTask">Edit your task</label>
                        <input class="form-control" type="text" name="editTask" id="editTask" placeholder="<?= $task["title"] ?>" required>
                        <input type="hidden" name="taskId" value="<?= $task["id"] ?>">
                        <button type="submit" class="btn btn-primary">Edit task</button>
                    </form>
                </div>


            </div><?php
                endforeach; ?>

        <!-- add a new task to the list -->
        <form action="app/tasks/tasks.php" method="post">
            <div class="mb-3">
                <h3>Add a task to your list</h3>
                <label for="title">Add a title to your ToDo</label>
                <input class="form-control" type="title" name="title" id="title" required>

            </div>

            <div class="mb-3">
                <label for="todo">Add a task to your list here.</label>
                <input class="form-control" type="todo" name="todo" id="todo" required>
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
require __DIR__ . '/views/footer.php'; ?>