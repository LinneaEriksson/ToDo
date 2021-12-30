<?php require __DIR__ . '/app/autoload.php'; ?>
<?php require __DIR__ . '/views/header.php'; ?>

<article>
  <h1>Edit profile</h1>
  <p>Change your personal settings here!</p>
</article>


<h2>Add or edit your profile picture here</h2>
<form action="app/users/editProfile.php" method="post" enctype="multipart/form-data">

  <div class="mb-3">
    <label for="profilePicture">Choose a PNG image to upload</label>
    <input type="file" name="profilePicture" id="profilePicture" accept=".png" required>
  </div>

  <button type="submit" class="btn btn-primary">Add picture</button>
</form>

<?php

if (isset($_SESSION['user']['image_url'])) {
?>
  <img src="<?= $_SESSION['user']['image_url'] ?>">
<?php
}



require __DIR__ . '/views/footer.php'; ?>