<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';


if (isset($_POST['deleteList'])) {

  $sql = $database->prepare("DELETE FROM lists WHERE id = :listid");
  $sql->bindParam(':listid', $list["id"], PDO::PARAM_STR);


  $sql->execute();
};
