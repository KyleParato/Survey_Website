<?php
$conn = mysqli_connect('localhost', 'shaun', '1234', 'survey');

if (!$conn) {
  echo 'Connection error: ' . mysqli_connect_error();
} 

if (isset($_POST['submit'])) {
  $questionId = $_POST['questionId'];
  $optionName = $_POST['optionName'];
  $optionName2 = $_POST['optionName2']; // fixed typo

  $sql = "INSERT INTO AnswerOption (OptionName, QuestionID) VALUES ('$optionName', $questionId), ('$optionName2', $questionId)";

  if (mysqli_query($conn, $sql)) {
    echo "Data inserted successfully";
   // header("Location: Question.php");
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
}

$questionId = $_GET['id'];
$questionType = $_GET['type'];
$question = $_GET['question'];

if ($questionType == 1) {
  ?>
  <form method="post" action="">
    <h1><?php echo "Please Summit anser forr your questionn"; ?></h1>
    <input type="hidden" name="questionId" value="<?php echo $questionId; ?>">
    <input type="text" name="optionName" value="True">
    <input type="text" name="optionName2" value="False">
    <br><br>
    <input type="submit" name="submit" value="Submit">
  </form>
  <?php
}

mysqli_close($conn); // added to close database connection
?>
