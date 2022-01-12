<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';


if (isset($_POST['username'], $_POST['email'], $_POST['password'])) {
  $username = trim(filter_var($_POST['username'], FILTER_SANITIZE_STRING));
  $email = trim(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL));
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);


  $sql = $database->prepare("INSERT INTO users (username, email, password) VALUES (:username, :email, :password)");
  $sql->bindParam(':email', $email, PDO::PARAM_STR);
  $sql->bindParam(':username', $username, PDO::PARAM_STR);
  $sql->bindParam(':password', $password, PDO::PARAM_STR);

  $sql->execute();
};


redirect('/login.php');
