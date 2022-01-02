<?php require __DIR__ . '/app/autoload.php'; ?>
<?php require __DIR__ . '/views/header.php'; ?>

<article class="editProfileSection">
  <h1>Edit profile</h1>
  <p>Change your personal settings here!</p>
</article>

<article class="editProfileSection">
  <h2>Add or change your profile picture here</h2>
  <form action="app/users/editProfile.php" method="post" enctype="multipart/form-data">

    <div class="mb-3">
      <label for="profilePicture">Choose a PNG image to upload</label>
      <input type="file" name="profilePicture" id="profilePicture" accept=".png" required>
    </div>

    <button type="submit" class="btn">Change profile picture</button>
  </form>
</article>

<?php

if (isset($_SESSION['user']['image_url'])) {
?>
  <img src="<?= $_SESSION['user']['image_url'] ?>">
<?php
}

?>
<!-- HÄR VILL VI HA EN PLACEHOLDER MED DEN NUVARANDE ADRESSEN OCH INTE FRANCIS!!!! -->
<article class="editProfileSection">
  <h2>Change your email-adress here </h2>
  <form action="app/users/editProfile.php" method="post">
    <div class="mb-3">
      <label for="email">Email</label>
      <input class="form-control" type="email" name="email" id="email" placeholder="francis@darjeeling.com" required>
      <small class="form-text">Provide with your new email here</small>
    </div>

    <button type="submit" class="btn">Change email</button>
  </form>
</article>


<article class="editProfileSection">
  <h2>Change your password here </h2>
  <form action="app/users/editProfile.php" method="post">
    <div class="mb-3">
      <label for="password">Password</label>
      <input class="form-control" type="password" name="password" id="password" placeholder="Please create a new password" required>
      <small class="form-text">Create your password</small>
    </div>

    <button type="submit" class="btn">Change password</button>
  </form>
</article>


<?php
require __DIR__ . '/views/footer.php'; ?>