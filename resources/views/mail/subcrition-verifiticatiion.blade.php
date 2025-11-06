<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>

  <body>
    <p>Click the link for verify your email.</p>
    <a href="{{ route('newsletter-verify', $subcriber->verified_token) }}">Click here!</a>
  </body>

</html>
