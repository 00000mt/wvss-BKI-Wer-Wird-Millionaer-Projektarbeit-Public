<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="anmelden1.css">
</head>

<body>
    <?php
    if (isset($_POST["submit"])) {
        require("mysql.php");
        $stmt = $mysql->prepare("SELECT * FROM accounts WHERE USERNAME = :user");
        $stmt->bindParam(":user", $_POST["username"]);
        $stmt->execute();
        $count = $stmt->rowCount();
        if ($count == 1) {
            $row = $stmt->fetch();
            if (password_verify($_POST["pw"], $row["PASSWORD"])) {
                session_start();
                $_SESSION["username"] = $row["USERNAME"];
                header("Location: gameHub.php");
            } else {
                echo "Der Login ist fehlgeschlagen";
            }
        } else {
            echo "Der Login ist fehlgeschlagen";
        }
    }
    ?>
    <section>
        <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span>
        <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span>
        <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span>
        <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span>
        <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span>
        <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span>
        <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span>
        <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span>
        <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span>
        <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span>
        <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span>
        <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span>
        <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span>
        <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span>
        <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span>
        <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span>
        <div class="signin">
            <div class="content">
                <h2>Anmelden</h2>
                <form method="POST" action="">
                    <div class="form">
                        <div class="inputBox">
                            <input type="text" name="username" required> <i>Username</i>
                        </div>
                        <div class="inputBox">
                            <input type="password" name="pw" required> <i>Password</i>
                        </div>
                        <div class="links">                            
                            <a href="startseite.php">Startseite</a>
                            <a href="register.php">Regestrieren</a><br>
                        </div>
                        <div class="inputBox">

                            <input type="submit" name="submit" value="Login">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

</body>

</html>
