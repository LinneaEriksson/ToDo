<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

// Remove the user session variable and redirect the user back to the homepage.
unset($_SESSION['user']);
$_SESSION['message'] = 'You\'ve successfully logged out. Hope to see you soon again!';

redirect('/');
