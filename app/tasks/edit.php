<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';



if (isset($_POST['editTaskTitle'], $_POST['editTaskDescription'], $_POST['deadline'])) {
  $taskTitle = trim(filter_var($_POST['editTaskTitle'], FILTER_SANITIZE_STRING));
  $taskDescription = trim(filter_var($_POST['editTaskDescription'], FILTER_SANITIZE_STRING));
  $deadline = trim(filter_var($_POST['deadline'], FILTER_SANITIZE_STRING));
  $id = trim(filter_var($_POST['taskId']));

  $sql = $database->prepare("UPDATE tasks SET title = :title, description = :description, deadline = :deadline WHERE id = :id");
  $sql->bindParam(':title', $taskTitle, PDO::PARAM_STR);
  $sql->bindParam(':description', $taskDescription, PDO::PARAM_STR);
  $sql->bindParam(':deadline', $deadline, PDO::PARAM_STR);
  $sql->bindParam(':id', $id, PDO::PARAM_INT);
  $sql->execute();


  redirect($_SERVER['HTTP_REFERER']);
}
