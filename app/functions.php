<?php

declare(strict_types=1);

function redirect(string $path)
{
    header("Location: ${path}");
    exit;
}

function fetchTasksWithDeadlineToday($database)
{
    $date = date('Y-m-d');

    $sql = $database->prepare('SELECT * FROM tasks WHERE user_id = :id AND deadline = :date ORDER BY completed');
    $sql->bindParam(':id', $_SESSION['user']['id'], PDO::PARAM_INT);
    $sql->bindParam(':date', $date, PDO::PARAM_STR);
    $sql->execute();

    $tasks = $sql->fetchAll(PDO::FETCH_ASSOC);

    return $tasks;
}
