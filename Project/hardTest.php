<?php
  session_start();
    echo time();
	  header("Cache-Control: no-store, no-cache, must-revalidate"); 
    header("Cache-Control: post-check=0, pre-check=0", false);
    header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
    header("Pragma: no-cache"); 
    header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");

  if (!$_SESSION['logged_in']) {
    header("Location: ./Login.php");
    exit();
 }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Typerzz-test-Hard</title>
    <link rel="stylesheet" href="./css/tests.css?v=<?php echo time(); ?>">
    <link rel = "website icon" type ="png" href="./images/logo.png">
  </head>
  <body>

    <h1>TYPERZZ</h1>
    <h3><a href="./home.php"> Home </a></h3>
    <h2>Hard Test</h2>
    
    <main>
        <section class ="typingSection">

            <div class ="text">

            </div>

            <div class = "time">
              <h2 id="timer">Time: 60</h2>
            </div>
    
            <button type ="reset" class = "reset">Reset</button>
          
            <div class = "userTyping">
              <input class ="input" type="text" placeholder="start typing here to start the test.">
            </div>
        </section>


        <section class = "results">
          <h1>RESULTS</h1>
          <div class = "OverAllResultsWrap">
            <div class ="UserStats">
              <h2><?php echo $_SESSION['username'];?></h2>
              <ul>
              <li id ="WPM">WPM: </li>
            </ul>
            </div>
          </div>

        </section>
        <script src = "./javascript/jquery.js"></script>
        <script src="./javascript/TestFunctions.js?v=<?php echo time(); ?>"></script>
        <?php
        include("./PHP/resultsSubmitHard.php");
        ?>
    </main>
  </body>

  </html>
