<?php


declare(strict_types=1);

function redirect(string $path)
{
    header("Location: ${path}");
    exit;
}


function getTasksByListId()
{
    $sql = $database->prepare('SELECT tasks.deadline, tasks.description, tasks.title FROM tasks WHERE list_id = :id');
    $sql->bindParam(':id', $id, PDO::PARAM_INT);
    $sql->bindParam(':id', $id, PDO::PARAM_INT);
    $sql->bindParam(':id', $id, PDO::PARAM_INT);
    $sql->execute();

    $tasks = $sql->fetchAll(PDO::FETCH_ASSOC);
}
