<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';


if (isset($_POST['email'], $_POST['password'])) {
  $email = trim(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL));


  $statement = $database->prepare('SELECT * FROM users WHERE email = :email');
  $statement->bindParam(':email', $email, PDO::PARAM_STR);
  $statement->execute();
}

$user = $statement->fetch(PDO::FETCH_ASSOC);

if ($user === false) {
  redirect('/index.php');
}

if (password_verify($_POST['password'], $user['password'])) {
  $_SESSION['user'] = [
    'id' => $user['id'],
    'name' => $user['name'],
    'email' => $user['email'],
  ];

  $_SESSION['message'] = 'Welcome' . $user['name'] . '!';


  redirect('/index.php');
}
