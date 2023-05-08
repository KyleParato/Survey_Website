<?php
session_start();
$conn = mysqli_connect('localhost','root', '', 'Survey');
echo $_SESSION['User_Email'];
echo $_SESSION['QID'];
echo $_SESSION['QType'];

if (!$conn) {
  echo 'Connection error: ' . mysqli_connect_error();
} 
$questionId = $_SESSION["QID"];
$questionType = $_SESSION["QType"];
if ($questionType == "T/F") {
  $sql = "insert into question_option(qoption,qorder,question_id,qoption_ts) values
              ('True', 1,$questionId,current_timestamp),
              ('False',2,$questionId,current_timestamp); ";
  if (mysqli_query($conn, $sql)) {
      //echo "Data inserted successfully";
  }
  else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
  header("Location: Question.php");
  exit();
}
if (isset($_POST['submit'])) {
  $questionId = $_SESSION['QID'];

  //$questionType = $_POST['questionType'];

  $optionName =  $_POST['optionName'];
  $optionName1 = $_POST['optionName1']; 
  $optionName2 = $_POST['optionName2'];
  $optionName3 = $_POST['optionName3']; 

  $sql = "insert into question_option (qoption, qorder,question_id,qoption_ts) values
           ('$optionName', 1, $questionId,current_timestamp),
           ('$optionName1',2, $questionId,current_timestamp),
           ('$optionName2',3, $questionId,current_timestamp),
           ('$optionName3',4, $questionId,current_timestamp);";

        
  //          insert into question_option (qoption, qorder,question_id,qoption_ts) values
	//          ("True", 1,1,current_timestamp),
  //          ("False",2,1,current_timestamp),
  //          ("Pizza",1,2,current_timestamp),
  //          ("Tacos",2,2,current_timestamp),
  //          ("Salad",3,2,current_timestamp);

  if (mysqli_query($conn, $sql)) {
    //echo "Data inserted successfully";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
  header("Location: Question.php");
  exit();
}
?>

<?php include("templates/header.php")?>
<div class=center>
<form method="post" action="AnswerOption.php" method="POST">
    <h1>Enter Options<?phpecho $_SESSION["User_Email"];?></h1>
    <label>Option 1</label>
    <input type="text" name="optionName" >
    <label>Option 2</label>
    <input type="text" name="optionName1" >
    <label>Option 3</label>
    <input type="text" name="optionName2" >
    <label>Option 4</label>
    <input type="text" name="optionName3" >
    <br><br>
    <input type="submit" name="submit" value="Submit">
  </form>
</div>

