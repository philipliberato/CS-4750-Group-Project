<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Signin</title>

    <!-- Bootstrap core CSS -->
    <link href="static/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="static/css/signin.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="base-template.css" rel="stylesheet">
    <link href="signinPrettifier.css" rel="stylesheet">
   

    <!-- JQuery -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

  </head>

  <body>


    <div class="container">

      <form class="form-signin" id="signupform">
        <h2 class="form-signin-heading" id="whiteFonts">Welcome back!</h2>
        <p id="whiteFonts"><i>Please fill in your login information below.</i></p>
        <br>
        <br>
        <label for="inputEmail" class="sr-only">Email Address</label>
        <input type="text" id="inputEmail" class="form-control" placeholder="Username" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
        <div id=buttonWidth width="50"></div>
        <button class="btn btn-lg btn-primary btn-block" width="50" type="submit">Sign in</button>
      </form>

    </div>

  </body>
</html>
