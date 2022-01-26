<?php require __DIR__ . '/app/autoload.php';
require __DIR__ . '/views/header.php';


$lists = fetchAllLists($database);

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

<?php foreach ($lists as $list) {
    $tasks = fetchAllTasksWithinLists($database, $list); ?>
    <!-- Shows the lists, edit and delete buttons -->
    <article class="editProfileSection">
        <div class="spaceBetween">
            <p class="listTitle"> <?= $list["title"] ?></p>

            <!-- MARK ALL TASKS AS DONE  -->

            <div class="buttonsInLine">
                <button class="btnEditLists"></button>
                <form action="app/lists/delete.php" method="post">
                    <input type="hidden" name="deleteList" value="<?= $list["id"] ?>">
                    <button type="submit" class="btnDelete"></button>
                </form>
            </div>
        </div>
        <form action="app/tasks/completeAll.php" method="post">
            <input type="hidden" name="completed" value="Completed">
            <input type="hidden" name="complete-all" value="<?= $list["id"] ?>">
            <button type="submit">mark all tasks as completed</button>
        </form>
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


        <?php foreach ($tasks as $task) : ?>
            <div class="tasks">
                <div class="spaceBetween">
                    <div>
                        <h4> <?php echo $task['title']; ?></h4>
                        <?php echo $task['description']; ?><br>
                        <?php echo "Deadline: ";
                        echo $task['deadline']; ?>
                    </div>


                    <!-- uncomplete, Edit or delete buttons for task here -->

                    <div class="mobileButtonsInLine">

                        <?php
                        if ($task['completed'] === 'Completed') { ?>
                            <form action="app/tasks/uncomplete.php" method="post">
                                <input type="hidden" name="completed" value="NULL">
                                <input type="hidden" name="unCompleteTaskId" value="<?= $task["id"] ?>">
                                <button type="submit" class="unCompleteTask"></button>
                            </form>
                        <?php } else { ?>
                            <form action="app/tasks/complete.php" method="post">
                                <input type="hidden" name="completed" value="Completed">
                                <input type="hidden" name="completeTaskId" value="<?= $task['id'] ?>">
                                <button type="submit" class="completeTask"></button>
                            </form>

                        <?php } ?>

                        <button class="btnEditTasks"></button>

                        <form action="app/tasks/delete.php" method="post">
                            <input type="hidden" name="deleteTask" value="<?= $task['id'] ?>">
                            <button type="submit" class="btnDelete"></button>
                        </form>
                    </div>
                </div>


                <!-- edit task -->

                <div class="mb-3">
                    <div class="editTaskForm hidden">
                        <form action="app/tasks/edit.php" method="post">

                            <label for="editTaskTitle">Edit your task title</label>
                            <input class="form-control" type="text" name="editTaskTitle" id="editTaskTitle" placeholder="<?= $task["title"] ?>" required>

                            <label for="editTaskDescription">Edit your task description</label>
                            <input class="form-control" type="text" name="editTaskDescription" id="editTaskDescription" placeholder="<?= $task["description"] ?>" required>

                            <label for="deadline">Add a new deadline to your ToDo</label><br>
                            <input type="date" id="deadline" name="deadline" value="2022-01-01" min="22-01-01" max="3000-01-01">
                            <br>
                            <input type="hidden" name="taskId" value="<?= $task["id"] ?>">
                            <br>
                            <button type="submit" class="btn btn-primary">Edit task</button>
                        </form>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>

        <!-- add a new task to the list -->


        <button class="btnAddTask">Add a new task to your list</button>
        <div class="newTaskDiv">
            <div class="mb-3">
                <form action="app/tasks/tasks.php" method="post">
                    <label for="title">Add a title to your task</label>
                    <input class="form-control" type="title" name="title" id="title" required>
            </div>

            <div class="mb-3">
                <label for="todo">Add a task description</label>
                <input class="form-control" type="todo" name="todo" id="todo" required>
            </div>

            <div class="mb-3">
                <label for="deadline">Add a deadline to your task</label><br>
                <input type="date" id="deadline" name="deadline" value="2022-01-01" min="22-01-01" max="3000-01-01">
            </div>

            <div class="mb-3">
                <input type="checkbox" name="completed" value="Completed">
                <label for="completed">The task is already completed</label>
            </div>

            <input type="hidden" name="id" value="<?= $list["id"] ?>">

            <button type="submit" class="btn btn-primary">Add task</button>
            </form>
        </div>
    </article>
<?php }


require __DIR__ . '/views/footer.php'; ?>
