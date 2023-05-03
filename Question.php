<?php
// Include database credentials
echo 'Welcome: ' . $_GET['name'];
$conn = mysqli_connect('localhost','shaun', '1234', 'survey');

if(!$conn) {
     echo 'Connection error: ' . mysqli_connect_error();
} else {
 //  echo 'Successfully connected';
// header("Location: Question.php?id=$user_id&name=$user_name");
//header('Location: Question.php');



}

if (isset($_POST['submit'])) {
    $questionName = mysqli_real_escape_string($conn, $_POST["QuestionName"]); 
    $description = mysqli_real_escape_string($conn, $_POST["Description"]); 
    $type = mysqli_real_escape_string($conn, $_POST["Type"]); 
    $surveyID = $_GET['id'];

    // Construct SQL query
    $sql = "INSERT INTO Question(QuestionName, Descriptionn, Typee, SurveyID) 
            VALUES('$questionName','$description','$type','$surveyID')";

    // Execute query
    if(mysqli_query($conn, $sql)) {
        echo "Question created successfully!";

        $questionID = mysqli_insert_id($conn);

        $sql = "SELECT * FROM Question WHERE  QuestionName = '$questionName'";
        $result = mysqli_query($conn, $sql);
        $Question_Id_type = mysqli_fetch_assoc($result);
 
     
        $Question_Id = $Question_Id_type['QuestionID'];
        $Question_type =  $Question_Id_type['Typee'];
        $QuestionName =  $Question_Id_type['QuestionName'];
                      // Redirect to a new page with the user ID and name as parameters
                     //header("Location: UserPage.php?id=$user_id&name=$user_name");
        if ($type == $Question_Id_type['Typee']) {
 
         header("Location: AnswerOption.php?id=$Question_Id&type=$Question_type&question=$QuestionName");
        // header("Location: AnswerOption.php?id=$questionID");

 
        }








        // Redirect to a new page that displays the questions for the survey
      //  header("Location: AnswerOption.php?id=$surveyID");








    } else {
        echo 'Query error: ' . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <link href="style.css" rel="stylesheet" type="text/css" />
</head>
<body>
    <form class="form" action="Question.php?id=<?php echo $_GET['id']; ?>" method="POST">
        <h1>Create Question</h1>
        <label>Question Name </label>
        <input type="text" name="QuestionName">
        <label>Description</label>
        <input type="text" name="Description">
        <label>(Type 1 = true,false)    OR    (Type 2 = optional)</label>
        <input type="text" name="Type">
        <div class="center">
            <input type="submit" name="submit" value="Create">
        </div>
    </form>
</body>
</html>
