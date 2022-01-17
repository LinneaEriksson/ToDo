<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';


if (isset($_POST['deleteTask'])) {
    $id = trim(filter_var($_POST['deleteTask'], FILTER_SANITIZE_STRING));
    $sql = $database->prepare("DELETE FROM tasks WHERE id = :taskId");
    $sql->bindParam(':taskId', $id, PDO::PARAM_STR);
    $sql->execute();
};

redirect('/tasks.php');
