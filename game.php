<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php if(isset($_SESSION["username"])): ?>
    <h1>Hier Kommt das Main Menu für das Game hin</h1>
    <a href="logout.php">Abmelden</a>
    <a href="Shop.php">Shop</a>
    <?php else: ?>
    <h1>Willkommen! Bitte anmelden, um fortzufahren oder drücke auf als Gast Spielen.</h1>
    <a href="anmelden.php">Anmelden</a>
    <a href="register.php">Registrieren</a>

    <?php endif; ?>
  </body>
</html>
