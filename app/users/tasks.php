<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

// Add a task


if (isset($_POST['todo'], $_POST['deadline'])) {
  $todo = trim(filter_var($_POST['todo'], FILTER_SANITIZE_STRING));
  $deadline = ($_POST['deadline']);
  // LÄGG TILL FÖR DATUM HÄR!!


  $sql = $database->prepare("INSERT INTO tasks (description, deadline) VALUES (:todo, :deadline)");
  $sql->bindParam(':tasks', $todo, PDO::PARAM_STR);
  $sql->bindParam(':deadline', $deadline, PDO::PARAM_STR);

  $sql->execute();
};



redirect('/tasks.php');
