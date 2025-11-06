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
    <title>Typerzz-Home</title>
    <link rel="stylesheet" href="./css/home.css?v=<?php echo time(); ?>">
    <link rel = "website icon" type ="png" href="./images/logo.png">
  </head>
  <body>

    <h1>TYPERZZ</h1>
    <h2>Home</h2>
    <h3><a href="./PHP/Logoutsession.php?Logout=true"> Sign Out </a></h3>

    
    <section class = "tests">
      <h4>Test Your Speed</h4>
      <a href ="easyTest.php">
      <div class ="test-easy">
        <h4>Easy</h4>
        <ul>
          <li><img src="./images/bullet.png"> 60 seconds</li>
          <li><img src="./images/bullet.png">Common Words</li>
        </ul>
      </div>
      </a>
      <a href ="hardTest.php">
      <div class ="test-hard">
        <h4>Hard</h4>
        <ul>
          <li><img src ="./images/bullet.png"> 60 seconds</li>
          <li><img src ="./images/bullet.png"> Uncommon Words</li>
        </ul>
      </div>
      </a>
    </section>


    <section class ="statistics">
      <h4> Your Statistics</h4>
      <div class = "statisticsButtons">
        <div class = "statisticsButtonsWhole">
          <div class = "statisticsButtonsLeft">
            <h6 id = "EasyStatButton" class = "active" >Easy</h6>
          </div>
          <h6 id = "HardStatButton">Hard</h6>
        </div>
      </div>
      <h5><?php echo $_SESSION['username'];?></h5>

      <div class = "EasyStat">
        <?php include("./PHP/easyStatsFetch.php");?>
        <h6>Best Test</h6>
        <h2>WPM: <?php echo $bestWPM;?></h2>
        <h2>Leaderboard Position: <?php echo $rank;?> </h2>
        <h6>Average Test:</h6>
        <h2>WPM: <?php echo $average?></h2>
      </div>

      <div class = "HardStat">
        <?php include("./PHP/hardStatsFetch.php");?>
        <h6>Best Test</h6>
        <h2>WPM: <?php echo $bestWPM;?></h2>
        <h2>Leaderboard Position: <?php echo $rank;?> </h2>
        <h6>Average Test:</h6>
        <h2>WPM: <?php echo $average?></h2>
      </div>


    </section>
    
    <section class ="leaderboard">
      <h4>Leaderboard</h4>
      <div class = "LeaderboardButtons">
        <div class = "LeaderboardButtonsWhole">
          <div class = "LeaderboardButtonsleft">
            <h6 id = "easyButton" class = "active">Easy</h6>
          </div>
          <h6 id ="hardButton">Hard</h6>
        </div>
    </div>
    <div class = tableBox>
      <table class="tg"><thead>
          <tr>
            <th class="dataTable"></th>
            <th class="dataTable"><u>UserName</u></th>
            <th class="dataTable"><u>Speed</u></th>
          </tr>
        </thead>
        <tbody class = "easyLeader">
          <?php 
            include("./PHP/leaderBoardFetchEasy.php");
            ?>
        </tbody>
        <tbody class = "hardLeader">
          <?php 
            include("./PHP/leaderBoardFetchHard.php");
            ?>
      </tbody></table>
  </div>
    </section>
  <script src = "./javascript/HomeFunctions.js?v=<?php echo time(); ?>"></script>
  </body>

  </html>

