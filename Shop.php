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
} else {
  $username = "Gast";
  $spielgeld = "(Bitte Anmelden) 0$";
}

if(isset($_COOKIE['background'])){
  $selectedBackground = $_COOKIE['background'];
} else {
  $selectedBackground = "#ffffff";
}
if(isset($_COOKIE['font-picker'])){
  $selectedfont = $_COOKIE['font-picker'];
} else {
  $selectedfont = "arial";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wer Wird Millioner Game Shop</title>
    <link rel="stylesheet" href="Shop1.css">
</head>

<body id="content" style="background-color: <?php echo $selectedBackground; ?>"> 
    <h1 id="mainTitle">Wer Wird Millioner Game Shop</h1>
            <nav>
                <a href="startseite.php">Menu</a>
                <a href="gameHub.php">Spielen</a>
                <a class="select"href="Shop.php">Shop</a>
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
            </nav>
            <div class="container">
        <h2>Standard Farb Hintergründe</h2>
        <div class="box">
          <img src="VorschauBilder/Blau.png" alt="Bild">
            <div class="buttons">
                <form method="post" action="">
                    <button type="submit" name="select_image">Select</button>
                    <input type="hidden" name="image_path" value="#0000ff">
                </form>
                <form method="post" action="">
                    <button type="submit" name="buy_image">Buy</button>
                    <input type="hidden" name="image_path" value="VorschauBilder/Blau.png">
                </form>
            </div>
        </div>
        <div class="box">
            <img src="VorschauBilder/Rot.png" alt="Bild">
            <div class="buttons">
                <form method="post" action="">
                    <button type="submit" name="select_image">Select</button>
                    <input type="hidden" name="image_path" value="#ff0000">
                </form>
                <form method="post" action="">
                    <button type="submit" name="buy_image">Buy</button>
                    <input type="hidden" name="image_path" value="VorschauBilder/rot.png">
                </form>
            </div>
        </div>
        <div class="box">
            <img src="VorschauBilder/Schwarz.png" alt="Bild">
            <div class="buttons">
                <form method="post" action="">
                    <button type="submit" name="select_image">Select</button>
                    <input type="hidden" name="image_path" value="#000000">
                </form>
                <form method="post" action="">
                    <button type="submit" name="buy_image">Buy</button>
                    <input type="hidden" name="image_path" value="VorschauBilder/Schwarz.png">
                </form>
            </div>
        </div>
        <div class="box">
            <img src="VorschauBilder/Weiß.png" alt="Bild">
            <div class="buttons">
                <form method="post" action="">
                    <button type="submit" name="select_image">Select</button>
                    <input type="hidden" name="image_path" value="#ffffff">
                </form>
                <form method="post" action="">
                    <button type="submit" name="buy_image">Buy</button>
                    <input type="hidden" name="image_path" value="VorschauBilder/Weiß.png">
                </form>
            </div>
        </div>
    </div>

    <div class="container">
        <h2>Besondere Hintergründe</h2>
        <div class="box">
            <img src="CustemHindergruende/Dirt.png" alt="Bild">
            <div class="buttons">
                <form method="post" action="">
                    <button type="submit" name="select_image">Select</button>
                    <input type="hidden" name="image_path" value="CustemHindergruende/Dirt.png">
                </form>
                <form method="post" action="">
                    <button type="submit" name="buy_image">Buy</button>
                    <input type="hidden" name="image_path" value="CustemHindergruende/Dirt.png">
                </form>
            </div>
        </div>
        <div class="box">
            <img src="CustemHindergruende/Backround2.jpg" alt="Bild">
            <div class="buttons">
                <form method="post" action="">
                    <button type="submit" name="select_image">Select</button>
                    <input type="hidden" name="image_path" value="CustemHindergruende/Backround2.jpg">
                </form>
                <form method="post" action="">
                    <button type="submit" name="buy_image">Buy</button>
                    <input type="hidden" name="image_path" value="CustemHindergruende/Backround2.jpg">
                </form>
            </div>
        </div>
        <div class="box">
            <img src="CustemHindergruende/Backround3.jpg" alt="Bild">
            <div class="buttons">
                <form method="post" action="">
                    <button type="submit" name="select_image">Select</button>
                    <input type="hidden" name="image_path" value="CustemHindergruende/Backround3.jpg">
                </form>
                <form method="post" action="">
                    <button type="submit" name="buy_image">Buy</button>
                    <input type="hidden" name="image_path" value="CustemHindergruende/Backround3.jpg">
                </form>
            </div>
        </div>
          <div class="box">
            <img src="CustemHindergruende/Cobble.png" alt="Bild">
            <div class="buttons">
                <form method="post" action="">
                    <button type="submit" name="select_image">Select</button>
                    <input type="hidden" name="image_path" value="url(CustemHindergruende/Cobble.png)">
                </form>
                <form method="post" action="">
                    <button type="submit" name="buy_image">Buy</button>
                    <input type="hidden" name="image_path" value="CustemHindergruende/Cobble.png">
                </form>
          </div>
    </div>   
    <script>
        const buttons = document.querySelectorAll('button[name="select_image"]');
        const content = document.getElementById('content');
        const radios = document.querySelectorAll('.font-picker');

        buttons.forEach(button => {
            button.addEventListener('click', function(event) {
                event.preventDefault();
                const imagePath = this.nextElementSibling.value;
                if (imagePath.includes('Cobble.png' || 'Dirt.png')) {
                    content.style.backgroundImage = imagePath;
                    content.style.backgroundSize = '200px'; 
                    content.style.backgroundRepeat = 'repeat';
                }
                else if (imagePath.includes('url')) {
                    content.style.backgroundImage = imagePath;
                    content.style.backgroundSize = 'cover';
                }
                else {
                    content.style.backgroundImage = 'none';
                    content.style.backgroundColor = imagePath;
                }
                document.cookie = "background=" + imagePath;
            });
        });

        radios.forEach(radio => {
            radio.addEventListener('change', function() {
                content.style.fontFamily = this.value;
                document.cookie = "font-picker=" + this.value;
            });
        });
    </script>                                                                                         
</body>
</html>