<?php
    if (isset($_SESSION['username'])) {
        $username = $_SESSION['username'];

        require("mysql.php");
        $conn = new mysqli($host, $user, $passwort, $name);
        $sql = "UPDATE accounts SET spielgeld = spielgeld + 300 WHERE USERNAME = '$username'";
    }
?>