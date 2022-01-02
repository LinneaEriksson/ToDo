<?php

declare(strict_types=1);

$sql = $database->prepare('SELECT * FROM users WHERE id = :id');
$sql->bindParam(':id', $_SESSION['user']['id'], PDO::PARAM_INT);
$sql->execute();

$_SESSION['user'] = $sql->fetch(PDO::FETCH_ASSOC);

$profileImg = $_SESSION['user']["img_url"];
$email = $_SESSION['user']["email"];
