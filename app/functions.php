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

    $sql = $database->prepare('SELECT * FROM tasks WHERE user_id = :id AND deadline = :date ORDER BY completed DESC');
    $sql->bindParam(':id', $_SESSION['user']['id'], PDO::PARAM_INT);
    $sql->bindParam(':date', $date, PDO::PARAM_STR);
    $sql->execute();

    $tasks = $sql->fetchAll(PDO::FETCH_ASSOC);

    return $tasks;
}

function fetchAllLists($database)
{
    $sql = $database->prepare('SELECT * FROM lists WHERE user_id = :id ORDER BY id desc');
    $sql->bindParam(':id', $_SESSION['user']['id'], PDO::PARAM_INT);
    $sql->execute();

    $lists = $sql->fetchAll(PDO::FETCH_ASSOC);

    return $lists;
}


function fetchAllTasksWithinLists($database, $list)
{
    $listId = $list["id"];
    $sql = $database->prepare('SELECT tasks.* FROM tasks INNER JOIN
        lists on tasks.list_id = lists.id WHERE lists.user_id = :id AND list_id = :listId ORDER BY completed');
    $sql->bindParam(':id', $_SESSION['user']['id'], PDO::PARAM_INT);
    $sql->bindParam(':listId', $listId, PDO::PARAM_INT);
    $sql->execute();

    $tasks = $sql->fetchAll(PDO::FETCH_ASSOC);

    return $tasks;
}
