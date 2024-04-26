<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfetti</title>
    <link rel="stylesheet" href="win.css">
</head>
<body>
    <h1>EZ CLAP LOL</h1>
    <div id="confetti-container"></div>
    <button><a href="../gameHub.php">Zurück</a></button>
    <script>
        function createConfetti() {
            var colors = ['#f00', '#0f0', '#00f', '#ff0', '#0ff'];
            var confetti = document.createElement('div');
            confetti.className = 'confetto';
            confetti.style.left = Math.random() * window.innerWidth + 'px';
            confetti.style.backgroundColor = colors[Math.floor(Math.random() * colors.length)]; 
            document.getElementById('confetti-container').appendChild(confetti);
            confetti.addEventListener('animationend', function() {
                this.remove();
            });
        }
        setInterval(createConfetti, 10); 
    </script>
</body>
</html>