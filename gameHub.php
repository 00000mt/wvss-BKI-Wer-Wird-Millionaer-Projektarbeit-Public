<?php
session_start();

if(isset($_SESSION['username'])){
    $username = $_SESSION['username'];
    require("mysql.php");
    $conn = new mysqli($host, $user, $passwort, $name);
    $sql = "SELECT spielgeld FROM accounts WHERE USERNAME = '$username'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $spielgeld = $row['spielgeld'];
        }
    } else {
        $spielgeld = 0;
    }
} 
else {
    $username = "Gast";
    $spielgeld = "(Bitte Anmelden) 0$";
}

if(isset($_COOKIE['background'])){
    $selectedBackground = $_COOKIE['background'];
} else {
    $selectedBackground = "#ffffff"; // Standard-Hintergrundfarbe
}

if(isset($_COOKIE['font-picker'])){
    $selectedfont = $_COOKIE['font-picker'];
} else {
    $selectedfont = "arial";
}

if(isset($_GET['logout'])) {
    // Wenn der Abmelde-Parameter gesetzt ist, führe die Abmeldefunktion aus
    session_unset();
    session_destroy();
    header("Location: anmelden.php"); // Weiterleitung zur Anmeldeseite
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wer Wird Millioner Game</title>
    <link rel="stylesheet" href="gameHub.css">
</head>
<body> 
    <div class="container">
        <div class="top-menu">
            <h1 id="mainTitle">Wer Wird Millionär</h1>
            <nav>
                <div class="left-menu">
                    <a href="startseite.php">Menu</a>
                    <a href="gameHub.php">Spielen</a>
                    <a href="Shop.php">Shop</a>
                </div>
            </nav>
            <div class="right-menu">
                <span class="geld"><?php echo $spielgeld?></span>
                <div class="dropdown2">
                    <button class="dropbtn2"><?php echo ($username === "Gast") ? "Anmelden" : $username; ?></button>
                    <div class="dropdown-content2">
                        <?php if($username === "Gast"): ?>
                            <a href="anmelden.php">Anmelden</a>
                        <?php else: ?>
                            <a href="logout.php">Abmelden</a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="center-menu">
            <h2>Wähle hier ein Quiz aus!</h2>
            <div class="buttons">
                <a href="Spiel\Spiel1.php" class="quiz-button">Test Spiel 1</a>
                <a href="Spiel\Spiel2.php" class="quiz-button">Test Spiel 2</a>
                <a href="#" class="quiz-button">1 vs 1 Modus</a>
                <a href="#" class="quiz-button">Quiz selbst erstellen</a>
            </div>
        </div>
    </div>
    <script>
        const dropdowns = document.querySelectorAll('.dropdown');

        dropdowns.forEach(dropdown => {
            const button = dropdown.querySelector('.dropbtn');
            const content = dropdown.querySelector('.dropdown-content');

            button.addEventListener('mouseenter', () => {
                content.classList.add('show');
            });

            dropdown.addEventListener('mouseleave', () => {
                content.classList.remove('show');
            });
        });
    </script>
</body>
</html>
