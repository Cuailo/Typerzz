<?php
    session_start();
    if (isset($_GET['Logout'])) {
        session_unset();
        session_destroy();

        header("Location: ../Login.php");
        exit();
    }
?>