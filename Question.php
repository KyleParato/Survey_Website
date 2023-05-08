<?php
$v = session_start();
// Include database credentials
$conn = mysqli_connect('localhost','root', '', 'Survey');

if(!$conn) {
     echo 'Connection error: ' . mysqli_connect_error();
} else {
 //  echo 'Successfully connected';
// header("Location: Question.php?id=$user_id&name=$user_name");
//header('Location: Question.php');



}

if (isset($_POST['Create'])) {
    $questionName = mysqli_real_escape_string($conn, $_POST["QuestionName"]); 
    $description = mysqli_real_escape_string($conn, $_POST["Description"]); 
    $Qtype = mysqli_real_escape_string($conn, $_POST["QType"]); 
    $surveyID = $_SESSION["SCode"];

    // Construct SQL query
    $sql = "INSERT INTO Question(QName, QDescription, QType, Survey_Code,question_ts) 
            VALUES('$questionName','$description','$Qtype','$surveyID',current_timestamp);";

    // Execute query
    if(mysqli_query($conn, $sql)) {

        //$questionID = mysqli_insert_id($conn);

        $sql = "SELECT * FROM Question WHERE  QName = '$questionName' and Survey_Code = $surveyID;";
        $result = mysqli_query($conn, $sql);
        $Question = mysqli_fetch_assoc($result);
     
        $_SESSION["QID"] =    $Question['Question_ID'];
        $_SESSION["QType"] =  $Question['QType'];
        // $QuestionName =  $Question_Id_type['QuestionName'];
                      // Redirect to a new page with the user ID and name as parameters
                     //header("Location: UserPage.php?id=$user_id&name=$user_name");
        header("Location: AnswerOption.php");
        exit();

    } else {
        echo 'Query error: ' . mysqli_error($conn);
    }
}

if(isset($_POST['Finish'])){
    header("Location: DeleteSurvey.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <link href="style.css" rel="stylesheet" type="text/css" />
    <div class="header">
        <h1>Magic Survey</h1>
        <p>For all of your survey needs</p>
    </div>
</head>
<body>
    <form class="form" action="Question.php" method="POST">
        <h1>Create Question</h1>
        <label>Question Name </label>
        <input type="text" name="QuestionName">
        <label>Description</label>
        <input type="text" name="Description">
        <label>Choose A Question Type</label>
        <div style="display:flex; flex-direction: row;align-items: center">
            <input type="radio" name="QType" value="T/F"> 
            <label for="T/F">True/False</label><br>
            <input type="radio" name="QType" value="MC">
            <label for="MC">Multiple Choice</label><br>
        </div>
        <input type=submit name="Create" value = "Create">
        <input type=submit name="Finish" value = "Finish">
    </form>
</body>
</html>
