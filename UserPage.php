<?php
// Include database credentials
echo 'Welcome: ' . $_GET['name'];
$conn = mysqli_connect('localhost','shaun', '1234', 'survey');

if(!$conn) {
     echo 'Connection error: ' . mysqli_connect_error();
} else {
 //  echo 'Successfully connected';
// header("Location: Question.php?id=$user_id&name=$user_name");
header('Location: Question.php');



}

if (isset($_POST['submit'])) {
    $surveyName = mysqli_real_escape_string($conn, $_POST["SurveyName"]); 
    $surveyCode = mysqli_real_escape_string($conn, $_POST["SurveyCode"]); 
    $startDate = mysqli_real_escape_string($conn, $_POST["StartDate"]); 
    $endDateTime = mysqli_real_escape_string($conn, $_POST["EndDateTime"]); 

    // Get user ID from URL
    $userID = $_GET['id'];

    // Construct SQL query
    $sql = "INSERT INTO Survey(SurveyName, SurveyCode, StartDateTime, EndDateTime, UserID) 
            VALUES('$surveyName','$surveyCode','$startDate','$endDateTime',$userID)";

    // Execute query
    if(mysqli_query($conn, $sql)) {
        echo "Survey created successfully!";

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
    <form class="form" action="UserPage.php?id=<?php echo $_GET['id']; ?>" method="POST">
        <h1>Create Survey</h1>
        <label>SurveyName </label>
        <input type="text" name="SurveyName">
        <label>Survey Code</label>
        <input type="text" name="SurveyCode">
        <label>StartDate</label>
        <input type="text" name="StartDate">
        <label>EndDateTime</label>
        <input type="text" name="EndDateTime">
        <div class="center">
            <input type="submit" name="submit" value="Create">
            <input type="submit" name="Lognin" value="See All Survey">
        </div>
    </form>
</body>
</html>
