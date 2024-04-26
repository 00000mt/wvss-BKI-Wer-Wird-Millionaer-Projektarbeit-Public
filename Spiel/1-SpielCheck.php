<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "wwm-datenbank";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$questionId = $_POST['questionId'];
$selectedOption = $_POST['selectedOption'];

$sql = "SELECT correct_option FROM questions WHERE question_id = ?"; 

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $questionId);

$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();
  $correctOption = $row["correct_option"];

  if (strcasecmp($selectedOption, $correctOption) === 0) {
    echo "correct";
  } else {
    echo "incorrect";
  }
} else {
  echo "Question not found";
}

$stmt->close();
$conn->close();
?>