<?php require __DIR__ . '/app/autoload.php'; ?>
<?php require __DIR__ . '/views/header.php'; ?>

<article>
    <h1>Tasks</h1>
    <p>This is what you have todo!</p>



    <form action="app/users/tasks.php" method="post" enctype="multipart/form-data">
        <!-- Form for username -->
        <div class="mb-3">
            <label for="todo">Add a ToDo here</label>
            <input class="form-control" type="todo" name="todo" id="todo" placeholder="Write your ToDo" required>
            <small class="form-text">Create your ToDo</small>
        </div>

        <div class="mb-3">
            <label for="deadline">Add a deadline to your ToDo</label>
            <input type="date" id="deadline" name="deadline" value="2022-01-01" min="22-01-01" max="3000-01-01">
        </div>


        <button type="submit" class="btn btn-primary">Add ToDo</button>
    </form>
</article>

<?php require __DIR__ . '/views/footer.php'; ?>