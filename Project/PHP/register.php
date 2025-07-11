<?php
include('DBconnection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['password2'];

    $stmt = $conn->prepare("SELECT Username FROM users WHERE Username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    
    if ($stmt->num_rows > 0) {
        echo '<script>
                alert("Signup failed: username taken");
                window.location.href = "../SignUp.php";
            </script>';
        $stmt->close();
        exit;
    }

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO users (Username, Password) VALUES (?,?)");
    $stmt->bind_param("ss", $username, $hashedPassword);

    if ($stmt->execute()) {
        header("Location: ../Login.php");
    }else {
        echo "Error creating user: " . $stmt->error;
    }

    $stmt->close();
}

mysqli_close($conn);

?>