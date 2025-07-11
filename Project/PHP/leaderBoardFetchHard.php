<?php 
include("DBconnection.php");

$stmt = mysqli_prepare($conn,  "SELECT users.Username, userstatshard.UserID, MAX(userstatshard.WPM) AS best_speed 
FROM userstatshard 
JOIN users ON userstatshard.UserID = users.UserID 
GROUP BY userstatshard.UserID, users.Username 
ORDER BY best_speed DESC 
LIMIT 10");

mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

$counter = 1;

while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    echo "<tr>";
        echo "<td class='dataTable'>" . $counter . ".</td>";
        echo "<td class='dataTable'>" . htmlspecialchars($row['Username']) . "</td>";
        echo "<td class='dataTable'>" . htmlspecialchars($row['best_speed']) . " WPM</td>";
    echo "</tr>";
    $counter++;    
}

mysqli_close($conn);
?>