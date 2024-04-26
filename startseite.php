<?php
  session_start(); // Starte die Session

  // Überprüfe, ob der Benutzer angemeldet ist, indem du prüfst, ob die Benutzervariable in der Session gesetzt ist
  $user_is_logged_in = isset($_SESSION['user_id']);

  // Wenn der Benutzer angemeldet ist, kannst du den Benutzernamen aus der Session erhalten
  $user_name = '';
  if ($user_is_logged_in) {
    // Nehme den Benutzernamen aus der Session
    $user_name = $_SESSION['username'];
  }
?>

<!DOCTYPE html>
<html lang="de" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Wer Wird Millionär</title>
  <link rel="stylesheet" href="startseite1.css">
</head>
<body>
  <div class="top-buttons">
    <?php
      if ($user_is_logged_in) {
        echo "<span class='username'>$user_name</span>";
        echo "<a href='logout.php' class='logout-button'>Abmelden</a>";
      } else {
        echo "<a href='anmelden.php' class='signin-button'>Anmelden</a>";
        echo "<a href='register.php' class='register-button'>Registrieren</a>";
      }
    ?>
  </div>
  <h1>Wer Wird Millionär</h1>

  <div class="container">
    <div class="button-group">
      <a href="gameHub.php" class="oval-button bigger">Spielen</a>
      <a href="shop.php" class="oval-button bigger">Shop besuchen</a>
      <a href="credits.htm" class="oval-button bigger">Credits</a>
    </div>
  </div>

  <div class="rank-list">
    <h2>Rangliste</h2>
    <?php
      // Verbindung zur Datenbank herstellen (Anpassung erforderlich)
      $host = "localhost";
      $name = "wwm-datenbank";
      $user = "root";
      $passwort = "";
      $db = new PDO("mysql:host=$host;dbname=$name", $user, $passwort);
      

      // SQL-Abfrage zum Abrufen der Top 10-Benutzer basierend auf Spielgeld (Anpassung erforderlich)
      $sql = "SELECT username, spielgeld FROM accounts ORDER BY spielgeld DESC LIMIT 10";

      // Abfrage ausführen
      $result = $db->query($sql);
      echo "<table class='rangliste'>";
      echo "<tr><th>Rang</th><th>Name</th><th>Spielgeld</th></tr>";
      $rank = 1;
      while ($row = $result->fetch()) {
        echo "<tr>";
        echo "<td>" . $rank . "</td>";
        echo "<td>" . $row['username'] . "</td>";
        echo "<td>" . formatiereGeldbetrag($row['spielgeld']) . "</td>";
        echo "</tr>";
        $rank++;
      }
      echo "</table>";
      function formatiereGeldbetrag($betrag) {
        $einheiten = array(
          '' => 1,
          ' Tsd' => 1000,
          ' Mio' => 1000000,
          ' Mrd' => 1000000000,
          ' Bio' => 1000000000000,
          ' Bil' => 1000000000000000,
          ' Tri' => 1000000000000000000
        );
      

        foreach (array_reverse($einheiten, true) as $einheit => $multiplikator) {
          if ($betrag >= $multiplikator) {
            $dezimalstellen = ($multiplikator >= 1000 ? 2 : 0);
            return number_format($betrag / $multiplikator, $dezimalstellen, ',', '.') . $einheit;
          }
        }
      }
      
    ?>
  </div>
</body>
</html>
