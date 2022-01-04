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

  $sql = $database->prepare('SELECT * FROM lists WHERE user_id = :id');
  $sql->bindParam(':id', $_SESSION['user']['id'], PDO::PARAM_INT);
  $sql->execute();

  $_SESSION['lists'] = $sql->fetchAll(PDO::FETCH_ASSOC);
  $lists = $_SESSION['lists'];

  foreach ($lists as $list) {
    $id = $list["id"];

    $sql = $database->prepare('SELECT * FROM tasks WHERE list_id = :id');
    $sql->bindParam(':id', $id, PDO::PARAM_INT);
    $sql->execute();


    $_SESSION['tasks'][$id] = $sql->fetchAll(PDO::FETCH_ASSOC);
  };
};

// add a task

if (isset($_POST['title'], $_POST['todo'], $_POST['deadline'])) {
  $title = trim(filter_var($_POST['title'], FILTER_SANITIZE_STRING));
  $todo = trim(filter_var($_POST['todo'], FILTER_SANITIZE_STRING));
  $id = trim(filter_var($_POST['id'], FILTER_SANITIZE_STRING));
  $deadline = ($_POST['deadline']);
  $completed = ($_POST['completed']);


  $sql = $database->prepare("INSERT INTO tasks (title, description, deadline, completed, user_id, list_id) VALUES (:title, :todo, :deadline, :completed, :userid, :id)");
  $sql->bindParam(':title', $title, PDO::PARAM_STR);
  $sql->bindParam(':todo', $todo, PDO::PARAM_STR);
  $sql->bindParam(':deadline', $deadline, PDO::PARAM_STR);
  $sql->bindParam(':completed', $completed, PDO::PARAM_STR);
  $sql->bindParam(':userid', $_SESSION['user']['id'], PDO::PARAM_STR);
  $sql->bindParam(':id', $id, PDO::PARAM_STR);


  $sql->execute();

  // $sql = $database->prepare('SELECT * FROM tasks WHERE list_id = :id');
  // $sql->bindParam(':id', $id, PDO::PARAM_INT);
  // $sql->execute();

  // $_SESSION['tasks'] = $sql->fetchAll(PDO::FETCH_ASSOC);
  // $tasks = $_SESSION['tasks'];
};



redirect('/tasks.php');
