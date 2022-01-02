<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

// Add a list

if (isset($_POST['list'])) {
  $list = trim(filter_var($_POST['list'], FILTER_SANITIZE_STRING));


  $sql = $database->prepare("INSERT INTO lists (title, user_id) VALUES (:list, :userid)");
  $sql->bindParam(':list', $list, PDO::PARAM_STR);
  $sql->bindParam(':userid', $_SESSION['user']['id'], PDO::PARAM_STR);

  $sql->execute();
};



// Add a task 



if (isset($_POST['title'], $_POST['todo'], $_POST['deadline'])) {
  $title = trim(filter_var($_POST['title'], FILTER_SANITIZE_STRING));
  $todo = trim(filter_var($_POST['todo'], FILTER_SANITIZE_STRING));
  $deadline = ($_POST['deadline']);
  $completed = ($_POST['completed']);


  $sql = $database->prepare("INSERT INTO tasks (title, description, deadline, completed, user_id) VALUES (:title, :todo, :deadline, :completed, :userid)");
  $sql->bindParam(':title', $title, PDO::PARAM_STR);
  $sql->bindParam(':todo', $todo, PDO::PARAM_STR);
  $sql->bindParam(':deadline', $deadline, PDO::PARAM_STR);
  $sql->bindParam(':completed', $completed, PDO::PARAM_STR);
  $sql->bindParam(':userid', $_SESSION['user']['id'], PDO::PARAM_STR);

  $sql->execute();
};





redirect('/tasks.php');
