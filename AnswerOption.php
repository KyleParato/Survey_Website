<?php
$conn = mysqli_connect('localhost', 'shaun', '1234', 'survey');

if (!$conn) {
  echo 'Connection error: ' . mysqli_connect_error();
} 

if (isset($_POST['submit'])) {
  $questionId = $_POST['questionId'];

  $questionType = $_POST['questionType'];


if($questionType  == 1) {
  $optionName = $_POST['optionName'];
  $optionName2 = $_POST['optionName2']; 

  $sql = "INSERT INTO AnswerOption (OptionName, QuestionID) VALUES ('$optionName', $questionId), ('$optionName2', $questionId)";

  if (mysqli_query($conn, $sql)) {
    echo "Data inserted successfully";
   // header("Location: Question.php");
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
}
elseif($questionType  == 2){
  $optionName = $_POST['optionName'];
  $optionName1 = $_POST['optionName1']; 
  $optionName2 = $_POST['optionName2'];
  $optionName3 = $_POST['optionName3']; 


  $sql = "INSERT INTO AnswerOption (OptionName, QuestionID) VALUES ('$optionName', $questionId), ('$optionName1', $questionId),('$optionName2', $questionId),('$optionName3', $questionId)";

  if (mysqli_query($conn, $sql)) {
    echo "Data inserted successfully";
   // header("Location: Question.php");
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }

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
    <input type="hidden" name="questionType" value="<?php echo $questionType; ?>">
    
    <input type="text" name="optionName" value="True">
    <input type="text" name="optionName2" value="False">
    <br><br>
    <input type="submit" name="submit" value="Submit">
  </form>
  <?php


}elseif ($questionType == 2) {
  ?>
  <form method="post" action="">
    <h1><?php echo "Type your answer"; ?></h1>
    <input type="hidden" name="questionId" value="<?php echo $questionId; ?>">
    <input type="hidden" name="questionType" value="<?php echo $questionType; ?>">
   
    <input type="text" name="optionName" >
    <input type="text" name="optionName1" >
    <input type="text" name="optionName2" >
    <input type="text" name="optionName3" >
    <br><br>
    <input type="submit" name="submit" value="Submit">
  </form>

  <?php

}

mysqli_close($conn); // added to close database connection
?>
