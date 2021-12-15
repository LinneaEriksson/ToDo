<?php require __DIR__ . '/app/autoload.php'; ?>
<?php require __DIR__ . '/views/header.php';

$date = date("y-m-d");
$errors = [];

if (isset($_FILES['avatar'])) {
  $avatar = $_FILES['avatar'];
  $destination =  __DIR__ . '/app/database/userimages/' . $date . $avatar['name'];


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
?>

<h1>Sign up here!</h1>

<form action="signup.php" method="post" enctype="multipart/form-data">
  <!-- Form for username -->
  <div class="mb-3">
    <label for="username">Username</label>
    <input class="form-control" type="username" name="username" id="username" placeholder="Write your username" required>
    <small class="form-text">Create your username</small>
  </div>
  <!-- form for email -->
  <div class="mb-3">
    <label for="email">Email</label>
    <input class="form-control" type="email" name="email" id="email" placeholder="francis@darjeeling.com" required>
    <small class="form-text">Please provide the your email address.</small>
  </div>

  <!-- form for password -->
  <div class="mb-3">
    <label for="password">Password</label>
    <input class="form-control" type="password" name="password" id="password" placeholder="Please create a password" required>
    <small class="form-text">Create your password</small>
  </div>
  <!-- form for profilepicture -->
  <div class="mb-3">
    <label for="avatar">Choose a PNG image to upload</label>
    <input type="file" name="avatar" id="avatar" accept=".png" required>
  </div>

  <button type="submit" class="btn btn-primary">Sign up!</button>
</form>

<?php foreach ($errors as $error) : ?>
  <p class="error"><?php echo $error; ?></p>
<?php endforeach; ?>

<?php if (isset($message)) : ?>
  <p class="success"><?php echo $message; ?></p>
<?php endif; ?>

<!-- class = form-control är bootstrap och alltså en förinställd css. DU KAN ÄNDRA DET HÄR!!!  -->
<!-- primary i btn-primary är förinställd färg. Det finns olika färger, googla "bootstrapcolor" så kommer det upp!  -->



<?php require __DIR__ . '/views/footer.php'; ?>