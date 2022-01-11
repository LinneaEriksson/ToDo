<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

if (isset($_POST['editList'])) {
  $list = trim(filter_var($_POST['editList'], FILTER_SANITIZE_STRING));
  $id = trim(filter_var($_POST['listId'], FILTER_SANITIZE_STRING));

  $sql = $database->prepare("UPDATE lists SET title = :title WHERE id = :id");
  $sql->bindParam(':title', $list, PDO::PARAM_STR);
  $sql->bindParam(':id', $id, PDO::PARAM_INT);
  $sql->execute();
}

redirect('/tasks.php');
