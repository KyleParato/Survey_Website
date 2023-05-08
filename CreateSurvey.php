<?php
$v = session_start();
//echo $v;

$conn = mysqli_connect('localhost','root', '', 'Survey');

if(!$conn) {
     echo 'Connection error: ' . mysqli_connect_error();
}

if (isset($_POST['submit'])) {

    $surveyName = mysqli_real_escape_string($conn, $_POST["SurveyName"]); 
    $SurveyDescription = mysqli_real_escape_string($conn, $_POST["SurveyDescription"]); 
    $survey_link = mysqli_real_escape_string($conn, $_POST["Link"]);
    $startDate = mysqli_real_escape_string($conn, $_POST["StartDate"]); 
    $endDateTime = mysqli_real_escape_string($conn, $_POST["EndDateTime"]); 
 
    // Construct SQL query
    $userID = "'";
    $userID = $userID . $_SESSION["User_Email"];
    $userID = $userID . "'";
    $sql = "insert into survey (Survey_Name, Survey_Description, Link, User_Email,Start_Date_Time,End_Date_Time,survey_ts)
	            values('$surveyName','$SurveyDescription','$survey_link',$userID,'$startDate','$endDateTime',current_timestamp);";

    // Execute query
    if(mysqli_query($conn, $sql)) {
        $sql = "SELECT * FROM Survey WHERE  Survey_Name = '$surveyName'";
        $result = mysqli_query($conn, $sql);
        $Survey_Name_Code = mysqli_fetch_assoc($result);
 
        $survey_id = $Survey_Name_Code['Survey_Code'];
        $_SESSION["SCode"] = $survey_id;
        header("Location: Question.php");
        exit();
    } else {
        echo 'Query error: ' . mysqli_error($conn);
    }
}
?>

<?php include('templates/header.php')?>

<div class=center>
<form class="form" action="CreateSurvey.php" method="POST">
        <h1>Create Survey</h1>
        <label>SurveyName </label>
        <input type="text" name="SurveyName">
        <label>Survey Description</label>
        <input type="text" name="SurveyDescription">
        <label>Survey Link</label>
        <input type="text" name="Link">
        <label>StartDate</label>
        <input type="text" name="StartDate">
        <label>EndDateTime</label>
        <input type="text" name="EndDateTime">
        <div class="center">
            <input type="submit" name="submit" value="Create">
</form>
        </div>
</div>
<!-- <!DOCTYPE html>
<html>
<head>
    <link href="style.css" rel="stylesheet" type="text/css" />
    <div class="header">
        <h1>Magic Survey</h1>
        <p>For all of your survey needs</p>
    </div>
    <style>
    nav{
        display: flex;
        flex-flow: row nowrap;
        justify-content: space-evenly;
        background-color: #03739c;
        overflow: hidden;
    }
    </style>
</head>
<body>
<nav>
    <a href="DeleteSurvey.php">Your Surveys</a>
    <a href="AllSurvey.php">All Surveys</a>
    <a href="CreateSurvey.php">Create Survey</a>
    <a href="LogOut.php">Log Out</a>
</nav>
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
        <input type="hidden" name="userID" value="<?php echo $userID; ?>">
        <div class="center">
            <input type="submit" name="submit" value="Create">
            <input type="submit" name="Lognin" value="See All Survey">
            <input type="submit" name="delete" value=" Your Survey">
        </div>
    </form>
</body>
</html> -->
