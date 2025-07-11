<?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['testWPM'])) {
            $userWPM = intval($_POST['testWPM']);
            $userID = $_SESSION['user_id'];

            include("DBconnection.php");

            $stmt = mysqli_prepare($conn, "INSERT INTO userstatshard (WPM, UserID) VALUES (?, ?)");
            mysqli_stmt_bind_param($stmt, "ii", $userWPM, $userID);

            if (mysqli_stmt_execute($stmt)) {
                echo "<script>console.log('Data successfully inserted');</script>";
            } else {
                echo "<script>console.error('Error inserting data');</script>";
            }

            mysqli_close($conn);
        }
        ?>