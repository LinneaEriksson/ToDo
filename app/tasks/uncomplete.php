<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';



if (isset($_POST['unCompleteTaskId'], $_POST['completed'])) {
    $id = trim(filter_var($_POST['unCompleteTaskId'], FILTER_SANITIZE_STRING));
    $completed = trim(filter_var($_POST['completed'], FILTER_SANITIZE_STRING));

    $sql = $database->prepare("UPDATE tasks SET completed = :complete WHERE id = :id");
    $sql->bindParam(':complete', $completed, PDO::PARAM_STR);
    $sql->bindParam(':id', $id, PDO::PARAM_INT);
    $sql->execute();
}

redirect($_SERVER['HTTP_REFERER']);
