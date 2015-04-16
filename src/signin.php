<?php
include('login.php'); // Includes Login Script

if(isset($_SESSION['login_user'])){
$atype = $_SESSION['acct_type'];
if ($atype == 3) {
	header("location: adminwelcome.php");
} else if ($atype == 2) {
	header("location: professionalwelcome.php");
} else {
	header("location: welcome.php");

	}
}
?>


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

      <form class="form-signin" id="signupform" method="post">
        <h2 class="form-signin-heading" id="whiteFonts">Welcome back!</h2>
        <p id="whiteFonts"><i>Please fill in your login information below.</i></p>
        <br>
        <br>
        <label for="inputEmail" class="sr-only">Username</label>
        <input type="text" id="inputEmail" name="username" class="form-control" placeholder="Username" required autofocus>
        <label for="inputPassword" class="sr-only" >Password</label>
        <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
        <input name="submit" type="submit" value=" Login ">
        <span><?php echo $error; ?></span>
      </form>

    </div>

  </body>
</html>
