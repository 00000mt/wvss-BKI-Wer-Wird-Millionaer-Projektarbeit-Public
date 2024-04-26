<?php
session_start();
if(isset($_SESSION['username'])){
    $username = $_SESSION['username'];
    require("../mysql.php");
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
    $selectedBackground = "#ffffff"; 
}
if(isset($_COOKIE['font-picker'])){
    $selectedfont = $_COOKIE['font-picker'];
} else {
    $selectedfont = "arial";
}
function updateSpielgeld($spielgeld) {
    $_SESSION['spielgeld'] = $spielgeld;
  }
  
?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz 12.02.2024</title>
    <link rel="stylesheet" href="Spiel.css">
</head>
<body>

<div id="quiz">
    <div class="exit">
        <button class="exitbutton" onclick="showConfirmationDialog()">Zur Startseite</button>
    </div>
    <!------------------Tabelle------------------>
    <div class="progress-table">
        <table>
            <tr>
                <td>15</td>
                <td>1.000.000</td>
            </tr>
            <tr>
                <td>14</td>
                <td>500.000</td>
            </tr>
            <tr>
                <td>13</td>
                <td>125.000</td>
            </tr>
            <tr>
                <td>12</td>
                <td>64.000</td>
            </tr>
            <tr>
                <td>11</td>
                <td>32.000</td>
            </tr>
            <tr>
                <td>10</td>
                <td>16.000</td>
            </tr>
            <tr>
                <td>9</td>
                <td>8.000</td>
            </tr>
            <tr>
                <td>8</td>
                <td>4.000</td>
            </tr>
            <tr>
                <td>7</td>
                <td>2.000</td>
            </tr>
            <tr>
                <td>6</td>
                <td>1.000</td>
            </tr>
            <tr>
                <td>5</td>
                <td>500</td>
            </tr>
            <tr>
                <td>4</td>
                <td>300</td>
            </tr>
            <tr>
                <td>3</td>
                <td>200</td>
            </tr>
            <tr>
                <td>2</td>
                <td>100</td>
            </tr>
            <tr>
                <td>1</td>
                <td>50</td>
            </tr>
        </table>
    </div>
    <!---------------Ende-Tabelle---------------->

    <!------------------Fragen------------------->
    <div class="question" id="question1">
        <p class='frage box'>Frage 1: Um Abgaben, die man an den Staat abführen muss, handelt es sich ...?</p>
        <div class="options">
            <div>
                <input type="radio" id="q1_option1" name="q1" data-option="A">
                <label for="q1_option1">A: dazu Geben</label>
                <input type="radio" id="q1_option2" name="q1" data-option="B">
                <label for="q1_option2">B: mit Wirken</label>
            </div>
            <div>
                <input type="radio" id="q1_option3" name="q1" data-option="C">
                <label for="q1_option3">C: unter Stützung</label>
                <input type="radio" id="q1_option4" name="q1" data-option="D">
                <label for="q1_option4">D: bei Steuern</label>
            </div>
        </div>
    </div>
    <div class="question" id="question2" style="display: none;">
        <p class='frage box'>Frage 2: Alle waren dem Anlass entsprechend festlich gekleidet nur einer erschien mal wieder in einem unmöglichen ...?</p>
        <div class="options">
            <div>
                <input type="radio" id="q2_option1" name="q2" data-option="A">
                <label for="q2_option1">A: Aufzug</label>
                <input type="radio" id="q2_option2" name="q2" data-option="B">
                <label for="q2_option2">B: Fahrstuhl</label>
            </div>
            <div>
                <input type="radio" id="q2_option3" name="q2" data-option="C">
                <label for="q2_option3">C: Lift</label>
                <input type="radio" id="q2_option4" name="q2" data-option="D">
                <label for="q2_option4">D: Paternoster</label>
            </div>
        </div>
    </div>
    <div class="question" id="question3" style="display: none;">
        <p class='frage box'>Frage 3: Wird unmittelbar nach dem Anpfiff sogleich ein Treffer erzielt, handelt es sich sozusagen um ein ...?</p>
        <div class="options">
            <div>
                <input type="radio" id="q3_option1" name="q3" data-option="A">
                <label for="q3_option1">A: Inspekt-Tor</label>
                <input type="radio" id="q3_option2" name="q3" data-option="B">
                <label for="q3_option2">B: Detekt-Tor</label>
            </div>
            <div>
                <input type="radio" id="q3_option3" name="q3" data-option="C">
                <label for="q3_option3">C: Diktat-Tor</label>
                <input type="radio" id="q3_option4" name="q3" data-option="D">
                <label for="q3_option4">D: Direkt-Tor</label>
            </div>
        </div>
    </div>
    <div class="question" id="question4" style="display: none;">
        <p class='frage box'>Frage 4: Wer mit jemandem keinerlei Interessen oder Eigenschaften teilt, hat mit ihm nichts ...?</p>
        <div class="options">
            <div>
                <input type="radio" id="q4_option1" name="q4" data-option="A">
                <label for="q4_option1">A: ekelhaft </label>
                <input type="radio" id="q4_option2" name="q4" data-option="B">
                <label for="q4_option2">B: gemein</label>
            </div>
            <div>
                <input type="radio" id="q4_option3" name="q4" data-option="C">
                <label for="q4_option3">C: fies</label>
                <input type="radio" id="q4_option4" name="q4" data-option="D">
                <label for="q4_option4">D: widerlich</label>
            </div>
        </div>
    </div>
    <div class="question" id="question5" style="display: none;">
        <p class='frage box'>Frage 5: Begegnet die frühere Miss Middleton dem 43. US-Präsidenten, dann trifft ...?</p>
        <div class="options">
            <div>
                <input type="radio" id="q5_option1" name="q5" data-option="A">
                <label for="q5_option1">A: Bonnie Tyler</label>
                <input type="radio" id="q5_option2" name="q5" data-option="B">
                <label for="q5_option2">B: Kim Wilde</label>
            </div>
            <div>
                <input type="radio" id="q5_option3" name="q5" data-option="C">
                <label for="q5_option3">C: Annie Lennox</label>
                <input type="radio" id="q5_option4" name="q5" data-option="D">
                <label for="q5_option4">D: Kate Bush</label>
            </div>
        </div>
    </div>
    <div class="question" id="question6" style="display: none;">
        <p class='frage box'>Frage 6: War die Maßnahme erfolgreich, dann ist die Technik durch ein ...?</p>
        <div class="options">
            <div>
                <input type="radio" id="q6_option1" name="q6" data-option="A">
                <label for="q6_option1">Back-up back to up</label>
                <input type="radio" id="q6_option2" name="q6" data-option="B">
                <label for="q6_option2">B: Plug-in plug to in</label>
            </div>
            <div>
                <input type="radio" id="q6_option3" name="q6" data-option="C">
                <label for="q6_option3">C: Update up to date</label>
                <input type="radio" id="q6_option4" name="q6" data-option="D">
                <label for="q6_option4">D: Download down to load</label>
            </div>
        </div>
    </div>
    <div class="question" id="question7" style="display: none;">
        <p class='frage box'>Frage 7: Was macht man für gewöhnlich mit einem Petit Four?</p>
        <div class="options">
            <div>
                <input type="radio" id="q7_option1" name="q7" data-option="A">
                <label for="q7_option1">A: anziehen</label>
                <input type="radio" id="q7_option2" name="q7" data-option="B">
                <label for="q7_option2">B: essen</label>
            </div>
            <div>
                <input type="radio" id="q7_option3" name="q7" data-option="C">
                <label for="q7_option3">C: fahren </label>
                <input type="radio" id="q7_option4" name="q7" data-option="D">
                <label for="q7_option4">D: hören</label>
            </div>
        </div>
    </div>
    <div class="question" id="question8" style="display: none;">
        <p class='frage box'>Frage 8: Stößt man auf das Kürzel „LotR“, ist in der Regel was das Thema?</p>
        <div class="options">
            <div>
                <input type="radio" id="q8_option1" name="q8" data-option="A">
                <label for="q8_option1">A: Fluch der Karibik</label>
                <input type="radio" id="q8_option2" name="q8" data-option="B">
                <label for="q8_option2">B: Harry Potter</label>
            </div>
            <div>
                <input type="radio" id="q8_option3" name="q8" data-option="C">
                <label for="q8_option3">C: Krieg der Sterne</label>
                <input type="radio" id="q8_option4" name="q8" data-option="D">
                <label for="q8_option4">D: Der Herr der Ringe</label>
            </div>
        </div>
    </div>
    <div class="question" id="question9" style="display: none;">
        <p class='frage box'>Frage 9: Was zählt mit rund 80.000 Einwohnern zu den fünf größten Städten eines deutschen Bundeslandes?</p>
        <div class="options">
            <div>
                <input type="radio" id="q9_option1" name="q9" data-option="A">
                <label for="q9_option1">A: Neuchemnitz</label>
                <input type="radio" id="q9_option2" name="q9" data-option="B">
                <label for="q9_option2">B: Neuaugsburg</label>
            </div>
            <div>
                <input type="radio" id="q9_option3" name="q9" data-option="C">
                <label for="q9_option3">C: Neumünster</label>
                <input type="radio" id="q9_option4" name="q9" data-option="D">
                <label for="q9_option4">D: Neukassel</label>
            </div>
        </div>
    </div>
    <div class="question" id="question10" style="display: none;">
        <p class='frage box'>Frage 10: Welcher Megahit klingt mit einem markanten letzten Einsatz der Panflöte aus?</p>
        <div class="options">
            <div>
                <input type="radio" id="q10_option1" name="q10" data-option="A">
                <label for="q10_option1">A: Poker Face</label>
                <input type="radio" id="q10_option2" name="q10" data-option="B">
                <label for="q10_option2">B: La Isla Bonita</label>
            </div>
            <div>
                <input type="radio" id="q10_option3" name="q10" data-option="C">
                <label for="q10_option3">C: Whenever, Wherever</label>
                <input type="radio" id="q10_option4" name="q10" data-option="D">
                <label for="q10_option4">D: My Heart Will Go On</label>
            </div>
        </div>
    </div>
    <div class="question" id="question11" style="display: none;">
        <p class='frage box'>Frage 11: Als die Presse im Januar 2024 von „A23a“ berichtete - mit rund 4.000 km² etwas größer als Mallorca -, ging es um den größten existierenden ...?</p>
        <div class="options">
            <div>
                <input type="radio" id="q11_option1" name="q11" data-option="A">
                <label for="q11_option1">A: Meteoritenkrater</label>
                <input type="radio" id="q11_option2" name="q11" data-option="B">
                <label for="q11_option2">B: Eisberg</label>
            </div>
            <div>
                <input type="radio" id="q11_option3" name="q11" data-option="C">
                <label for="q11_option3">C: Zwergplaneten</label>
                <input type="radio" id="q11_option4" name="q11" data-option="D">
                <label for="q11_option4">D: lebenden Organismus</label>
            </div>
        </div>
    </div>
    <div class="question" id="question12" style="display: none;">
        <p class='frage box'>Frage 12: Wo sind Berufsbezeichnungen wie „best boy“, „swing gang“ und „key grip“ geläufig?</p>
        <div class="options">
            <div>
                <input type="radio" id="q12_option1" name="q12" data-option="A">
                <label for="q12_option1">A: an Filmsets</label>
                <input type="radio" id="q12_option2" name="q12" data-option="B">
                <label for="q12_option2">B: in Freizeitparks</label>
            </div>
            <div>
                <input type="radio" id="q12_option3" name="q12" data-option="C">
                <label for="q12_option3">C: bei Raumfahrtbehörden</label>
                <input type="radio" id="q12_option4" name="q12" data-option="D">
                <label for="q12_option4">D: in Sterneküchen</label>
            </div>
        </div>
    </div>
    <div class="question" id="question13" style="display: none;">
        <p class='frage box'>Frage 13: Wobei handelt es sich um ein sogenanntes Unterscheidungszeichen?</p>
        <div class="options">
            <div>
                <input type="radio" id="q13_option1" name="q13" data-option="A">
                <label for="q13_option1">A: PB für Paderborn</label>
                <input type="radio" id="q13_option2" name="q13" data-option="B">
                <label for="q13_option2">B: PK für Polizeikommissar</label>
            </div>
            <div>
                <input type="radio" id="q13_option3" name="q13" data-option="C">
                <label for="q13_option3">C: Pt für Platin</label>
                <input type="radio" id="q13_option4" name="q13" data-option="D">
                <label for="q13_option4">D: PS für Pferdestärke</label>
            </div>
        </div>
    </div>
    <div class="question" id="question14" style="display: none;">
        <p class='frage box'>Frage 14: Wo löste die Juristin Nataša Pirc Musar Ende 2022 den sogenannten Instagram-Präsidenten Borut Pahor als Staatsoberhaupt ab?</p>
        <div class="options">
            <div>
                <input type="radio" id="q14_option1" name="q14" data-option="A">
                <label for="q14_option1">A: Montenegro</label>
                <input type="radio" id="q14_option2" name="q14" data-option="B">
                <label for="q14_option2">B: Bosnien und Herzegowina</label>
            </div>
            <div>
                <input type="radio" id="q14_option3" name="q14" data-option="C">
                <label for="q14_option3">C: Kroatien</label>
                <input type="radio" id="q14_option4" name="q14" data-option="D">
                <label for="q14_option4">D: Slowenien</label>
            </div>
        </div>
    </div>
    <div class="question" id="question15" style="display: none;">
        <p class='frage box'>Frage 15: Die erste bezahlte Fracht, die im Jahr 1836 auf einer deutschen Eisenbahnlinie befördert wurde, bestand aus ...?</p>
        <div class="options">
            <div>
                <input type="radio" id="q15_option1" name="q15" data-option="A">
                <label for="q15_option1">A: einem Ballen Leder/label>
                <input type="radio" id="q15_option2" name="q15" data-option="B">
                <label for="q15_option2">B: zwei Fässern Bier</label>
            </div>
            <div>
                <input type="radio" id="q15_option3" name="q15" data-option="C">
                <label for="q15_option3">C: drei Kisten Schrauben</label>
                <input type="radio" id="q15_option4" name="q15" data-option="D">
                <label for="q15_option4">D: vier Sack Kartoffeln</label>
            </div>
        </div>
    </div>
    <!----------------Ende-Fragen---------------->

    <button class="button checkAnswer" onclick="checkAnswer(this)">Einloggen</button>
    <button class="button nextBtn" onclick="nextQuestion(this)" style="display: none;">Weiter</button>
    <div class="actions" style="display: none;">
        <button class="button ststr" onclick="window.location.href='../startseite.php';">Zur Startseite</button>
        <button class="button nestr" onclick="window.location.href='Spiel2.php';">Neustarten</button>
    </div>
    <input type="hidden" id="currentQuestion" value="1">
</div>

<script>
    var currentQuestion = 1;
    function checkAnswer() {
        var selectedOption = document.querySelector('input[name="q' + currentQuestion + '"]:checked');
        var optionValue = selectedOption ? selectedOption.dataset.option : null;
        var questionId = document.getElementById('currentQuestion').value;
        if (optionValue) {
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "2-SpielCheck.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    var response = xhr.responseText;
                    if (response === 'correct') {
                        document.getElementById(selectedOption.id).nextElementSibling.classList.add('correct');
                        document.querySelector('.actions').style.display = 'none';
                        document.querySelector('.nextBtn').style.display = 'block';
                        if (currentQuestion === 15) {
                            window.location.href = 'Win.php';
                            executePhpScript();
                        }
                    } else {
                        document.getElementById(selectedOption.id).nextElementSibling.classList.add('incorrect');
                        document.querySelector('.nextBtn').style.display = 'none';
                        document.querySelector('.actions').style.display = 'block';
                    }
                    document.querySelector('.checkAnswer').style.display = 'none';
                }
            };
            xhr.send("questionId=" + questionId + "&selectedOption=" + optionValue);
        } else {
            alert('Bitte wähle eine Antwort aus!');
        }
    }
    function nextQuestion() {
        currentQuestion++;
        document.getElementById('question' + (currentQuestion - 1)).style.display = 'none';
        if (currentQuestion <= 15) {
            document.getElementById('question' + currentQuestion).style.display = 'block';
            document.querySelector('.checkAnswer').style.display = 'block';
            document.querySelector('.nextBtn').style.display = 'none';
            highlightTableRow(currentQuestion);

        }
        document.getElementById('currentQuestion').value = currentQuestion;
    }
    function restartQuiz() {
        currentQuestion = 1;
        document.querySelector('.actions').style.display = 'none';
        document.getElementById('question1').style.display = 'block';
        document.querySelector('.checkAnswer').style.display = 'block';
        document.getElementById('currentQuestion').value = currentQuestion;
        highlightTableRow(currentQuestion);
    }
    function highlightTableRow(questionNumber) {
        var tableRows = document.querySelectorAll('.progress-table table tr');
        tableRows.forEach(function(row) {
            row.classList.remove('active');
        });
        var currentRow = document.querySelector('.progress-table table tr:nth-child(' + (17 - questionNumber) + ')');
        currentRow.classList.add('active');
    }
    function executePhpScript() {
        var xhr = new XMLHttpRequest();
        xhr.open("GET", "ausgabe/1000000-Ausgabe.php", true);
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
            }
        };
        xhr.send();
    }
    //Code fehler haft 
    /*function showConfirmationDialog() {    
    var currentQuestion = <?php echo $currentQuestion; ?>;
    var confirmation = confirm("Möchten Sie die Seite verlassen?");
    if (confirmation) {
        var leaveWithMoney = confirm("Möchten Sie die Seite mit Ihrem Spielgeld verlassen?");
        if (leaveWithMoney) {
            <?php 
            $updSpielGeld = 0;
            switch ($currentQuestion) {
                case 1:
                    $updSpielGeld = 50;
                    break;
                case 2:
                    $updSpielGeld = 100;
                    break;
                case 3:
                    $updSpielGeld = 200;
                    break;
                case 4:
                    $updSpielGeld = 300;
                    break;
                case 5:
                    $updSpielGeld = 500;
                    break;
                case 6:
                    $updSpielGeld = 1000;
                    break;
                case 7:
                    $updSpielGeld = 2000;
                    break;
                case 8:
                    $updSpielGeld = 4000;
                    break;
                case 9:
                    $updSpielGeld = 8000;
                    break;
                case 10:
                    $updSpielGeld = 16000;
                    break;
                case 11:
                    $updSpielGeld = 32000;
                    break;
                case 12:
                    $updSpielGeld = 64000;
                    break;
                case 13:
                    $updSpielGeld = 125000;
                    break;
                case 14:
                    $updSpielGeld = 500000;
                    break;
            }
            updateSpielgeld($updSpielGeld);
            ?>
            // Direkter Aufruf der nächsten Frage-Funktion hier
            nextQuestion();
        } else {
            window.location.href = '../startseite.php';
        }
    }
}
*/

function showConfirmationDialog() {    
    var confirmation = confirm("Möchten Sie die Seite verlassen?");
    if (confirmation) {
        window.location.href = '../startseite.php';
    }
}
</script>
</body>
</html>