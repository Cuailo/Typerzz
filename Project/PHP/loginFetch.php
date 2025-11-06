<?php 

session_start();

include("DBconnection.php");

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE Username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    if ($row) {
        $hashedPassword = $row['Password'];


        if (password_verify($password, $hashedPassword)) {
            $_SESSION['username'] = $username;
            $_SESSION['user_id'] = $row['UserID'];
            $_SESSION['logged_in'] = 1;
            header("Location: ../home.php");
            exit;
        } else {
            echo '<script>
                alert("Login failed: Invalid username or password");
                window.location.href = "../Login.php";
            </script>';
        }
    } else {
        echo '<script>
            alert("Login failed: Invalid username or password");
            window.location.href = "../Login.php";
        </script>';
    }

    $stmt->close();
}

mysqli_close($conn);
?>

