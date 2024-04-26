<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Account erstellen</title>
    <link rel="stylesheet" href="register1.css">
  </head>
  <body>
    <?php
    if(isset($_POST["submit"])){
      require("mysql.php");
      $stmt = $mysql->prepare("SELECT * FROM accounts WHERE USERNAME = :user");
      $stmt->bindParam(":user", $_POST["username"]);
      $stmt->execute();
      $count = $stmt->rowCount();
      if($count == 0){
        if($_POST["pw"] == $_POST["pw2"]){
          $stmt = $mysql->prepare("INSERT INTO accounts (USERNAME, PASSWORD) VALUES (:user, :pw)");
          $stmt->bindParam(":user", $_POST["username"]);
          $hash = password_hash($_POST["pw"], PASSWORD_BCRYPT);
          $stmt->bindParam(":pw", $hash);
          $stmt->execute();
          echo "<p>Dein Account wurde angelegt</p>";
        } else {
          echo "<p>Die Passwörter stimmen nicht überein</p>";
        }
      } else {
        echo "<p>Der Username ist bereits vergeben !</p>";
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
                <h2>Registrieren</h2>
                <form method="POST" action="">
                    <div class="form">
                        <div class="inputBox">
                            <input type="text" name="username" required> <i>Benutzername</i>
                        </div>
                        <div class="inputBox">
                            <input type="password" name="pw" required> <i>Passwort</i>
                        </div>
                        <div class="inputBox">
                            <input type="password" name="pw2" required> <i>Passwort wiederholen</i>
                        </div>

                        <div class="links">                            
                            <a href="startseite.php">Startseite</a>
                            <a href="anmelden.php">Anmelden</a><br>
                        </div>

                        <div class="inputBox">
                            <input type="submit" name="submit" value="Konto Erstellen ">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
  </body>
</html>
