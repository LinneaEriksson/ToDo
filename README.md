<img src="https://media.giphy.com/media/LdaTvECy4WT8rpFE38/giphy.gif">

# The ToDo-project

This is a school-project to create our very own todo site.

# Installation

1. You can clone this repo and open it with your favourite code-editor.
2. Open a localhost in your terminal by writing: php -S localhost:8000
3. Visit the localhost in your browser.
4. Enjoy!

# Code Review

Code review written by [Amanda Karlsson](https://github.com/username).

1. signup.php:27 Front end makes sure that the user choses a long secure password. This is also best if it’s also secured with backend
2. signup.php:29 When creating a user, maybe it would be a good idea to use a “confirm password’-form. This requires the user write their password a second time to verify and secure that they typed in the correct password they want without any misspelling.
3. tasks.php:50-66 The lists and tasks looks great. One thing is that the delete button is very close to the edit button, so the user can easy delete their list.
4. tasks.php:109 - 125 Same issue here where the delete button is very close to the edit button, making it easy for the user to hit delete by mistake.
5. general The code looks great, but maybe try add some more comments so if you’d hand over your project to a partner in crime they’ll understand your code as well as you do.
6. profile.php The profile page has got a feature for uploading a profile picture but it’s only shown in the profile picture. If you want you could add an avatar to the page somewhere maybe in the navigation so it’s super clear who’s logged in.
7. tasks.php:135-145 Here is the form to add a task. When writing the info about the task, maybe be a bit more clear on where to write your title and where description of the task goes. At the moment it first says “Add a title to your ToDo” and then “Add a task to your list here.” which might be a but confusing.
8. editProfile.php When editing something on your profile like your email or password. Make sure to put some kind of message when done with editing so the user understands that the changes has been made.
9. css I like the way you’ve chosen your colourway throughout the page. The colors you’ve got goes well together and makes a calm and organised approach (which of course is what we want in our organising application).
10. general You’re page looks really great and is well structured. The code is semantic with only camelCases and you’ve done this assignment very well! Thank you for letting me review it!

# Testers

Tested by the following people:

1. Hanna Rosenberg
2. Susanne Lam

# Wunderlist+

Done by Sophie Wulf
link to pull request: https://github.com/LinneaEriksson/ToDo/pulls?q=is%3Apr+is%3Aclosed
