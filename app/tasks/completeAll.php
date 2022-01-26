<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';



if (isset($_POST['complete-all'])) {
    $id = trim(filter_var($_POST['complete-all'], FILTER_SANITIZE_STRING));
    $completed = trim(filter_var($_POST['completed'], FILTER_SANITIZE_STRING));

    $sql = $database->prepare("UPDATE tasks SET completed = :complete WHERE list_id = :id");
    $sql->bindParam(':complete', $completed, PDO::PARAM_STR);
    $sql->bindParam(':id', $id, PDO::PARAM_INT);
    $sql->execute();
}
redirect($_SERVER['HTTP_REFERER']);
