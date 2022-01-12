<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';



if (isset($_POST['editTaskTitle'], $_POST['editTaskDescription'], $_POST['deadline'])) {
  $taskTitle = trim(filter_var($_POST['editTaskTitle']));
  $taskDescription = trim(filter_var($_POST['editTaskDescription']));
  $deadline = trim(filter_var($_POST['deadline']));
  $id = trim(filter_var($_POST['taskId']));

  $sql = $database->prepare("UPDATE tasks SET title = :title, description = :description, deadline = :deadline WHERE id = :id");
  $sql->bindParam(':title', $taskTitle, PDO::PARAM_STR);
  $sql->bindParam(':description', $taskDescription, PDO::PARAM_STR);
  $sql->bindParam(':deadline', $deadline, PDO::PARAM_STR);
  $sql->bindParam(':id', $id, PDO::PARAM_INT);
  $sql->execute();





  redirect($_SERVER['HTTP_REFERER']);
}
