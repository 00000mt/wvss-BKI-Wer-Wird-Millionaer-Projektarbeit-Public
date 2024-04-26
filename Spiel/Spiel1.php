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
        <p class='frage box'>Frage 1: Wenn man als Patient schon Tabletten nehmen muss, dann bitte welche ...?</p>
        <div class="options">
            <div>
                <input type="radio" id="q1_option1" name="q1" data-option="A">
                <label for="q1_option1">A: an Teilnahme</label>
                <input type="radio" id="q1_option2" name="q1" data-option="B">
                <label for="q1_option2">B: bei Stand</label>
            </div>
            <div>
                <input type="radio" id="q1_option3" name="q1" data-option="C">
                <label for="q1_option3">C: unter Stützung</label>
                <input type="radio" id="q1_option4" name="q1" data-option="D">
                <label for="q1_option4">D: mit Wirkung </label>
            </div>
        </div>
    </div>
    <div class="question" id="question2" style="display: none;">
        <p class='frage box'>Frage 2: Wer beim Sprechen plötzlich nicht mehr weiterweiß, verliert redensartlich den ...?</p>
        <div class="options">
            <div>
                <input type="radio" id="q2_option1" name="q2" data-option="A">
                <label for="q2_option1">A: Faden </label>
                <input type="radio" id="q2_option2" name="q2" data-option="B">
                <label for="q2_option2">B: Öden</label>
            </div>
            <div>
                <input type="radio" id="q2_option3" name="q2" data-option="C">
                <label for="q2_option3">C: Schalen</label>
                <input type="radio" id="q2_option4" name="q2" data-option="D">
                <label for="q2_option4">D: Tristen</label>
            </div>
        </div>
    </div>
    <div class="question" id="question3" style="display: none;">
        <p class='frage box'>Frage 3: Welche Nachricht sorgt bei Aktienbesitzern schon mal für schlechte Laune?</p>
        <div class="options">
            <div>
                <input type="radio" id="q3_option1" name="q3" data-option="A">
                <label for="q3_option1">A: Mahrder im Bad </label>
                <input type="radio" id="q3_option2" name="q3" data-option="B">
                <label for="q3_option2">B: Dax im Keller </label>
            </div>
            <div>
                <input type="radio" id="q3_option3" name="q3" data-option="C">
                <label for="q3_option3">C: Wisel im Flur</label>
                <input type="radio" id="q3_option4" name="q3" data-option="D">
                <label for="q3_option4">D: Fux in der Küche</label>
            </div>
        </div>
    </div>
    <div class="question" id="question4" style="display: none;">
        <p class='frage box'>Frage 4: Kostet bei der Kosmetikerin das Wimpernkleben noch mal extra, ist das sozusagen ...?</p>
        <div class="options">
            <div>
                <input type="radio" id="q4_option1" name="q4" data-option="A">
                <label for="q4_option1">A: eine Seh-Schwäche </label>
                <input type="radio" id="q4_option2" name="q4" data-option="B">
                <label for="q4_option2">B: ein Blick-Kontakt </label>
            </div>
            <div>
                <input type="radio" id="q4_option3" name="q4" data-option="C">
                <label for="q4_option3">C: eine Linsen-Trübung</label>
                <input type="radio" id="q4_option4" name="q4" data-option="D">
                <label for="q4_option4">D: ein Augen-Aufschlag</label>
            </div>
        </div>
    </div>
    <div class="question" id="question5" style="display: none;">
        <p class='frage box'>Frage 5: Zu welcher „Wirtschaft“ gibt es im allgemeinen Sprachgebrauch keinen gleichnamigen Wirt?</p>
        <div class="options">
            <div>
                <input type="radio" id="q5_option1" name="q5" data-option="A">
                <label for="q5_option1">A: Landwirtschaft</label>
                <input type="radio" id="q5_option2" name="q5" data-option="B">
                <label for="q5_option2">B: Gastwirtschaft</label>
            </div>
            <div>
                <input type="radio" id="q5_option3" name="q5" data-option="C">
                <label for="q5_option3">C: Betriebswirtschaft</label>
                <input type="radio" id="q5_option4" name="q5" data-option="D">
                <label for="q5_option4">D: Vetternwirtschaft</label>
            </div>
        </div>
    </div>
    <div class="question" id="question6" style="display: none;">
        <p class='frage box'>Frage 6: Wer die Porta Nigra in Trier bewacht, kann sich auch ohne fußballerisches Talent mit Fug und Recht wie bezeichnen?</p>
        <div class="options">
            <div>
                <input type="radio" id="q6_option1" name="q6" data-option="A">
                <label for="q6_option1">A: Torhüter</label>
                <input type="radio" id="q6_option2" name="q6" data-option="B">
                <label for="q6_option2">B: Libero</label>
            </div>
            <div>
                <input type="radio" id="q6_option3" name="q6" data-option="C">
                <label for="q6_option3">C: Spielmacher</label>
                <input type="radio" id="q6_option4" name="q6" data-option="D">
                <label for="q6_option4">D: Mittelstürmer</label>
            </div>
        </div>
    </div>
    <div class="question" id="question7" style="display: none;">
        <p class='frage box'>Frage 7: Was findet immer mehr Abnehmer?</p>
        <div class="options">
            <div>
                <input type="radio" id="q7_option1" name="q7" data-option="A">
                <label for="q7_option1">A: Heißluftwaschmaschinen</label>
                <input type="radio" id="q7_option2" name="q7" data-option="B">
                <label for="q7_option2">B: Heißluftstaubsauger</label>
            </div>
            <div>
                <input type="radio" id="q7_option3" name="q7" data-option="C">
                <label for="q7_option3">C: Heißluftfritteusen </label>
                <input type="radio" id="q7_option4" name="q7" data-option="D">
                <label for="q7_option4">D: Heißluftzahnbürsten</label>
            </div>
        </div>
    </div>
    <div class="question" id="question8" style="display: none;">
        <p class='frage box'>Frage 8: Mit welchem Begriff wird einer der zentralen Punkte von Charles Darwins Evolutionstheorie zusammengefasst?</p>
        <div class="options">
            <div>
                <input type="radio" id="q8_option1" name="q8" data-option="A">
                <label for="q8_option1">A: Selection of the Smartest</label>
                <input type="radio" id="q8_option2" name="q8" data-option="B">
                <label for="q8_option2">B: Battle of the Strongest</label>
            </div>
            <div>
                <input type="radio" id="q8_option3" name="q8" data-option="C">
                <label for="q8_option3">C: Survival of the Fittest</label>
                <input type="radio" id="q8_option4" name="q8" data-option="D">
                <label for="q8_option4">D: Draft of the Biggest</label>
            </div>
        </div>
    </div>
    <div class="question" id="question9" style="display: none;">
        <p class='frage box'>Frage 9: Bei welchen Karnevalskostümen muss man aufpassen, nicht mit § 42a des entsprechenden Gesetzes in Konflikt zu kommen?</p>
        <div class="options">
            <div>
                <input type="radio" id="q9_option1" name="q9" data-option="A">
                <label for="q9_option1">A: Prinzessin und Fee</label>
                <input type="radio" id="q9_option2" name="q9" data-option="B">
                <label for="q9_option2">B: Sheriff und Pirat</label>
            </div>
            <div>
                <input type="radio" id="q9_option3" name="q9" data-option="C">
                <label for="q9_option3">C: Hexe und Clown</label>
                <input type="radio" id="q9_option4" name="q9" data-option="D">
                <label for="q9_option4">D: Micky und Minnie Maus</label>
            </div>
        </div>
    </div>
    <div class="question" id="question10" style="display: none;">
        <p class='frage box'>Frage 10: 1984 folgte als bundesdeutsche First Lady ...?</p>
        <div class="options">
            <div>
                <input type="radio" id="q10_option1" name="q10" data-option="A">
                <label for="q10_option1">A: Wilhelmine auf Elly</label>
                <input type="radio" id="q10_option2" name="q10" data-option="B">
                <label for="q10_option2">B: Mildred auf Hilda</label>
            </div>
            <div>
                <input type="radio" id="q10_option3" name="q10" data-option="C">
                <label for="q10_option3">C: Marianne auf Veronica</label>
                <input type="radio" id="q10_option4" name="q10" data-option="D">
                <label for="q10_option4">D: Christina auf Christiane</label>
            </div>
        </div>
    </div>
    <div class="question" id="question11" style="display: none;">
        <p class='frage box'>Frage 11: Was wird üblicherweise gebraut und nicht gebrannt?</p>
        <div class="options">
            <div>
                <input type="radio" id="q11_option1" name="q11" data-option="A">
                <label for="q11_option1">A: Whisky</label>
                <input type="radio" id="q11_option2" name="q11" data-option="B">
                <label for="q11_option2">B: Tequila</label>
            </div>
            <div>
                <input type="radio" id="q11_option3" name="q11" data-option="C">
                <label for="q11_option3">C: Sake</label>
                <input type="radio" id="q11_option4" name="q11" data-option="D">
                <label for="q11_option4">D: Ouzo</label>
            </div>
        </div>
    </div>
    <div class="question" id="question12" style="display: none;">
        <p class='frage box'>Frage 12: Wo gewann Lukas Dauser den Weltmeistertitel, der ausschlaggebend für seine Wahl zu Deutschlands „Sportler des Jahres 2023″ war?</p>
        <div class="options">
            <div>
                <input type="radio" id="q12_option1" name="q12" data-option="A">
                <label for="q12_option1">A: am Barren</label>
                <input type="radio" id="q12_option2" name="q12" data-option="B">
                <label for="q12_option2">B: auf dem Basketballfeld</label>
            </div>
            <div>
                <input type="radio" id="q12_option3" name="q12" data-option="C">
                <label for="q12_option3">C: an der Tischtennisplatte</label>
                <input type="radio" id="q12_option4" name="q12" data-option="D">
                <label for="q12_option4">D: auf der Biathlonstrecke</label>
            </div>
        </div>
    </div>
    <div class="question" id="question13" style="display: none;">
        <p class='frage box'>Frage 13: Eine normale Klarinette besteht in der Regel aus fünf Einzelteilen: Mundstück, Oberstück, Unterstück, Schallbecher und ...?</p>
        <div class="options">
            <div>
                <input type="radio" id="q13_option1" name="q13" data-option="A">
                <label for="q13_option1">A: Apfel</label>
                <input type="radio" id="q13_option2" name="q13" data-option="B">
                <label for="q13_option2">B: Birne</label>
            </div>
            <div>
                <input type="radio" id="q13_option3" name="q13" data-option="C">
                <label for="q13_option3">C: Kirsche</label>
                <input type="radio" id="q13_option4" name="q13" data-option="D">
                <label for="q13_option4">D: Banane</label>
            </div>
        </div>
    </div>
    <div class="question" id="question14" style="display: none;">
        <p class='frage box'>Frage 14: Welche Handwerker attestieren vielen ihrer Produkte eine sogenannte Ringfestigkeit?</p>
        <div class="options">
            <div>
                <input type="radio" id="q14_option1" name="q14" data-option="A">
                <label for="q14_option1">A: Tischler und Lackierer</label>
                <input type="radio" id="q14_option2" name="q14" data-option="B">
                <label for="q14_option2">B: Schneider und Schuhmacher</label>
            </div>
            <div>
                <input type="radio" id="q14_option3" name="q14" data-option="C">
                <label for="q14_option3">C: Bäcker und Konditoren</label>
                <input type="radio" id="q14_option4" name="q14" data-option="D">
                <label for="q14_option4">D: Maurer und Dachdecker</label>
            </div>
        </div>
    </div>
    <div class="question" id="question15" style="display: none;">
        <p class='frage box'>Frage 15: Welches Land änderte Ende 2023 das Motiv auf seiner Nationalflagge ab, weil die bisherige Version zu sehr an eine Sonnenblume erinnere?</p>
        <div class="options">
            <div>
                <input type="radio" id="q15_option1" name="q15" data-option="A">
                <label for="q15_option1">A: Chile</label>
                <input type="radio" id="q15_option2" name="q15" data-option="B">
                <label for="q15_option2">B: Nigeria</label>
            </div>
            <div>
                <input type="radio" id="q15_option3" name="q15" data-option="C">
                <label for="q15_option3">C: Bhutan</label>
                <input type="radio" id="q15_option4" name="q15" data-option="D">
                <label for="q15_option4">D: Kirgisistan</label>
            </div>
        </div>
    </div>
    <!----------------Ende-Fragen---------------->

    <button class="button checkAnswer" onclick="checkAnswer(this)">Einloggen</button>
    <button class="button nextBtn" onclick="nextQuestion(this)" style="display: none;">Weiter</button>
    <div class="actions" style="display: none;">
        <button class="button ststr" onclick="window.location.href='../startseite.php';">Zur Startseite</button>
        <button class="button nestr" onclick="window.location.href='Spiel1.php';">Neustarten</button>
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
            xhr.open("POST", "1-SpielCheck.php", true);
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