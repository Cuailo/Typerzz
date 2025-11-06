<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Typerzz-Login</title>
    <link rel="stylesheet" href="./css/login.css?v=<?php echo time(); ?>">
    <link rel = "website icon" type ="png" href="./images/logo.png">
  </head>
  <body>
    <main>
      <section class = "Wholelogin">
        <div class = "login-headings">

          <h1>TYPERZZ</h1> 
          <h2>Login</h2> 
        
          <div class = "LoginForm">

            <form action = "./PHP/loginFetch.php" method = "POST">

              <div class = "input-box">
                <h3>Username</h3>
                <input type="text" required  minlength="4" maxlength="13" name="username">

              
             
              </div>
              
              <div class = "input-box">
                <h3>Password</h3>
                <div class = "password-container">
                  <input type="password" required  minlength="4" maxlength="18" id="password" name = "password">
                  <img src="./images/eye-close.png" alt="Toggle Password Visibility" id="eyeicon">
              </div>
              
              <div class = "register-link">
              <?php if (isset($error)): ?>
                <div><?php echo $error; ?></div>
              <?php endif; ?>
                <p>Don't have an account? <b><a href="http://localhost/computing_project/SignUp.php">Create one</a></b></p>
              </div>

            <button type = "submit" class="btn" name="login"><b>Log In</b></button>

            </form>
          
        </div>
        </div>
      </section>
    </main>
    <script src = "./javascript/LoginFunctions.js?v=<?php echo time(); ?>"></script>
  </body>

</html>
