<?php
        /* Finds the user's greatest submitted Words Per Minute*/
        $UserIDWPM = $_SESSION['user_id'];
        include("./PHP/DBconnection.php");
        $stmt = mysqli_prepare($conn,"SELECT * FROM userstatseasy WHERE UserID = ? ORDER BY WPM DESC LIMIT 1");
        mysqli_stmt_bind_param($stmt, "i", $UserIDWPM);
        
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

        

    

        if ($row && isset($row['WPM'])) {
          $bestWPM = $row['WPM'];
        } else {
          $bestWPM = "no score set";
        }

        /*Finds all of the user's highest Words Per Minute and orders them in a leaderboard fashion*/
      $stmt2 = mysqli_prepare($conn, "SELECT users.Username, userstatseasy.UserID, MAX(userstatseasy.WPM) AS BestWPM
FROM userstatseasy 
JOIN users ON userstatseasy.UserID = users.UserID 
GROUP BY userstatseasy.UserID, users.Username 
ORDER BY BestWPM DESC ");

      mysqli_stmt_execute($stmt2);
      
      $result2 = mysqli_stmt_get_result($stmt2);

      $position = 0;
      $rank = 0;

        /* finds the postion of the current logged in user's best Words Per Minute on the leaderboard*/

      while($row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC)) {
        $position++;
        if($row2['UserID'] == $UserIDWPM and $row2['BestWPM'] == $bestWPM) {
          $rank = $position;
          break; 
        }else {
          $rank = "no score set";
        }
      }

      /*Finds the average Words Per Minute based on all the user's submitted Words Per Minute Scores*/
      $stmt3 = mysqli_prepare($conn,"SELECT * FROM userstatseasy WHERE UserID = ?");
      mysqli_stmt_bind_param($stmt3, "i", $UserIDWPM);
      mysqli_stmt_execute($stmt3);

      $result3 = mysqli_stmt_get_result($stmt3);

      $counter = 0;
      $total = 0;
      

      while($row3 = mysqli_fetch_array($result3, MYSQLI_ASSOC)) {
        $counter++;
        $total = $total + $row3['WPM'];
      }
      if ($counter == 0) {
        $average = "no score set";
      }else{
        $average = round(($total/$counter),0);
      }



      

      mysqli_close($conn);
        ?>