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

redirect('/tasks.php');
