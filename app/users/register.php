<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

// DOWN FROM HERE IS FOR THE PICTURE!!


$date = date("y-m-d");
$errors = [];

if (isset($_FILES['avatar'])) {
  $avatar = $_FILES['avatar'];
  $destination =  __DIR__ . '/../database/userimages/' . $date . $avatar['name'];


  if (!in_array($avatar['type'], ['image/jpeg', 'image/png'])) {
    $errors[] = "The image file type is not allowed.";
  }

  if ($avatar['size'] > 2097152) {
    $errors[] = "The uploaded file exceeded the file size limit.";
  }

  if (count($errors) === 0) {
    move_uploaded_file($avatar['tmp_name'], $destination);
    $message = 'The file was successfully uploaded!';
  }
}

foreach ($errors as $error) : ?>
  <p class="error"><?php echo $error; ?></p>
<?php endforeach; ?>

<?php if (isset($message)) : ?>
  <p class="success"><?php echo $message; ?></p>
<?php endif;

// DOWN FROM HERE IS FOR THE REST 


if (isset($_POST['username'])) {
  $username = trim($_POST['username']);
  $email = $_POST['email'];
  $imgurl = $_FILES['avatar'];
  $password = $_POST['password'];


  $database = new PDO('sqlite:database.db');

  $database->exec("INSERT INTO users (username, email, img_url, password) VALUES ('$username', '$email','$imgurl', '$password')");
}



// redirect('/');