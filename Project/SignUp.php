<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Typerzz-Sign Up</title>
    <link rel="stylesheet" href="./css/login.css?v=<?php echo time(); ?>">
    <link rel = "website icon" type ="png" href="./images/logo.png">
  </head>
  <body>
    <main>
      <section class = "WholeSignup">
        <div class = "login-headings">

          <h1>TYPERZZ</h1> 
          <h2>Sign Up</h2> 
        
          <div class = "LoginForm">

            <form action = "./PHP/register.php" method = "post">

              <div class = "input-box">
                <h3>Username</h3>
                <input type="text" required minlength="4" maxlength="13" id="username" name="username">

            
              </div>
              
              <div class = "input-box">
                <h3>Password</h3>
                <div class = "password1">
                  <input type="password" required minlength="4"  maxlength="18" id="password" name = "password">
                  <img src="./images/eye-close.png" alt="Toggle Password Visibility" id="eyeicon">
              </div>
              <div class = "input-box">
                <h3>Confirm Password</h3>
                <div class = "password2">
                  <input type="password" required minlength="4" maxlength="18" id="password2" name = "password2">
                  <p class = "errorText" id = "errorMsg" >The passwords do not match</p>
              </div>
             
              <div class = "register-link">
                <p>Already have an account? <b><a href="http://localhost/computing_project/Login.php">Log In</a></b></p>
              </div>

            <a href ="Login.html"><button type = "submit" class="btn" id="submitBtn" disabled><b>Sign Up</b></button></a>

            </form>
          
        </div>
      </div>
      </section>
    </main>
    <script src = "./javascript/signUpFunctions.js?v=<?php echo time(); ?>"></script>
  </body>
</html>