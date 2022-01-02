<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

$date = date("y-m-d");

// This is where you add and change the profile-picture. WE CAN DO THIS AS A FUNCTION!!!!!! 

if (isset($_FILES['profilePicture'])) {
  // This is an array, and you want to get the name from the file that the user uploads, thats why you put name after profilepicture!
  $profilePicture = trim(filter_var($_FILES['profilePicture']['name'], FILTER_SANITIZE_STRING));
  $profilePicture = $date . $profilePicture;
  $destination =  __DIR__ . '/../database/userimages/' . $profilePicture;
  // The file always ends up in a temporary place, here we put it in the right destination. 
  move_uploaded_file($_FILES['profilePicture']['tmp_name'], $destination);
  $insertToDatabase = ("UPDATE users SET img_url = :profilePicture WHERE id = :id");
  $sql = $database->prepare($insertToDatabase);
  $sql->bindParam(':profilePicture', $profilePicture, PDO::PARAM_STR);
  $sql->bindParam(':id', $_SESSION['user']['id'], PDO::PARAM_INT);
  $sql->execute();

  // This is to update the new profile-picture to the site. 
  $sql = $database->prepare('SELECT * FROM users WHERE id = :id');
  $sql->bindParam(':id', $_SESSION['user']['id'], PDO::PARAM_INT);
  $sql->execute();

  $_SESSION['user'] = $sql->fetch(PDO::FETCH_ASSOC);
}

// This is where we change the emailadress

if (isset($_POST['email'])) {
  $email = trim(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL));
  $insertToDatabase = ("UPDATE users SET email = :email WHERE id = :id");
  $sql = $database->prepare($insertToDatabase);
  $sql->bindParam(':email', $email, PDO::PARAM_STR);
  $sql->bindParam(':id', $_SESSION['user']['id'], PDO::PARAM_INT);
  $sql->execute();

  // This is to update information to the site.
  $sql = $database->prepare('SELECT * FROM users WHERE id = :id');
  $sql->bindParam(':id', $_SESSION['user']['id'], PDO::PARAM_INT);
  $sql->execute();

  $_SESSION['user'] = $sql->fetch(PDO::FETCH_ASSOC);
}



// This is where we change username

if (isset($_POST['password'])) {
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
  $insertToDatabase = ("UPDATE users SET password = :password WHERE id = :id");
  $sql = $database->prepare($insertToDatabase);
  $sql->bindParam(':password', $password, PDO::PARAM_STR);
  $sql->bindParam(':id', $_SESSION['user']['id'], PDO::PARAM_INT);
  $sql->execute();

  // This is to update information to the site.
  $sql = $database->prepare('SELECT * FROM users WHERE id = :id');
  $sql->bindParam(':id', $_SESSION['user']['id'], PDO::PARAM_INT);
  $sql->execute();

  $_SESSION['user'] = $sql->fetch(PDO::FETCH_ASSOC);
};

redirect('/editProfile.php');
