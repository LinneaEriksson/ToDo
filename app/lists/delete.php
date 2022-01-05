<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';


if (isset($_POST['deleteList'])) {
  $id = trim(filter_var($_POST['deleteList'], FILTER_SANITIZE_STRING));

  $sql = $database->prepare("DELETE FROM lists WHERE id = :listid");
  $sql->bindParam(':listid', $id, PDO::PARAM_STR);


  $sql->execute();
};

redirect('/tasks.php');
