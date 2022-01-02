<?php require __DIR__ . '/app/autoload.php'; ?>
<?php require __DIR__ . '/views/header.php'; ?>

<article class="editProfileSection">
  <h1>Sign up here!</h1>

  <form action="app/users/register.php" method="post" enctype="multipart/form-data">

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
      <small class="form-text">Please provide your email address.</small>
    </div>

    <!-- form for password -->
    <div class="mb-3">
      <label for="password">Password</label>
      <input class="form-control" type="password" name="password" id="password" placeholder="Please create a password" required>
      <small class="form-text">Create your password</small>
    </div>

    <button type="submit" class="btn btn-primary">Sign up!</button>
  </form>
</article>


<?php require __DIR__ . '/views/footer.php'; ?>