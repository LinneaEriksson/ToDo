<?php require __DIR__ . '/app/autoload.php'; ?>
<?php require __DIR__ . '/views/header.php'; ?>

<h1>Sign up here!</h1>

<form action="app/users/login.php" method="post">
  <div class="mb-3">
    <label for="username">Username</label>
    <input class="form-control" type="username" name="username" id="username" placeholder="Write your username" required>
    <small class="form-text">Create your username</small>
  </div>

  <form action="app/users/register.php" method="post">
    <div class="mb-3">
      <label for="email">Email</label>
      <input class="form-control" type="email" name="email" id="email" placeholder="francis@darjeeling.com" required>
      <small class="form-text">Please provide the your email address.</small>
    </div>

    <form action="app/users/login.php" method="post">
      <div class="mb-3">
        <label for="password">Password</label>
        <input class="form-control" type="password" name="password" id="password" placeholder="Please create a password" required>
        <small class="form-text">Create your password</small>
      </div>

      <div class="mb-3">
        <label for="profileImage">Profile picture</label>
        <input class="form-control" type="profileImage" name="profileImage" id="profileImage" required>
        <small class="form-text">Please provide the your profile picture</small>
      </div>

      <button type="submit" class="btn btn-primary">Login</button>
    </form>

    <!-- class = form-control är bootstrap och alltså en förinställd css. DU KAN ÄNDRA DET HÄR!!!  -->
    <!-- primary i btn-primary är förinställd färg. Det finns olika färger, googla "bootstrapcolor" så kommer det upp!  -->



    <?php require __DIR__ . '/views/footer.php'; ?>