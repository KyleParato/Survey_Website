<?php
//$userID = $_GET['userID'];
$userID = $_GET['userID'];


//echo  "userIDDDDDDD: " . $userID ;
$survey_id = $_GET['survey_id'];

$conn = mysqli_connect('localhost', 'shaun', '1234', 'survey');

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['submit'])) {
   // $userID = $_GET['userID'];

   $userIDD = $_POST['userID'];
    $survey_id = $_POST['survey_id'];
    $question_id = $_POST['question_id'];
    $option_name = $_POST['option_name'];


    echo $question_id;
    echo $option_name;
    echo $userID;
    
    // Check if all required fields are set
    if (empty($question_id) || empty($option_name) || empty($userIDD)) {
        echo "All fields are required!";
        exit();
    }
    
    // Do something with the selected option and question ID...
    
    $sql = "INSERT INTO Response(Answer, UserID, QuestionID) VALUES ('$option_name', '$userIDD', '$question_id')";
    if(mysqli_query($conn, $sql)) {
        echo "Survey created successfully!";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
    exit();
}








if (!$conn) {
    echo 'Connection error: ' . mysqli_connect_error();
} else {
    $sql = "SELECT QuestionName, QuestionID FROM Question WHERE SurveyID = $survey_id";
    $result = mysqli_query($conn, $sql);
    $allQuestion = mysqli_fetch_all($result, MYSQLI_ASSOC);
    mysqli_free_result($result);

    foreach ($allQuestion as &$question) {
        $sql2 = "SELECT OptionName FROM AnswerOption WHERE QuestionID = {$question['QuestionID']}";
        $result2 = mysqli_query($conn, $sql2);
        $options2 = mysqli_fetch_all($result2, MYSQLI_ASSOC);
        mysqli_free_result($result2);
        $question['options'] = $options2;
    }

    mysqli_close($conn);
}
?>

<?php include('templates/header.php') ?>

<h4 class="center grey-text">ALL Question</h4>

<div class="container">
    <div class="row">
        <?php foreach ($allQuestion as $question) { ?>
            <div class="col s6 md3">
                <div class="card z-depth-0">
                    <div class="card-content center">
                        <h6><?php echo htmlspecialchars($question['QuestionName']); ?></h6>
                        <h6><?php echo htmlspecialchars($question['QuestionID']); ?></h6>




                                <?php foreach ($question['options'] as $option) { ?>
                                <form class="form" method="POST" action="AllQuestion.php">
                                <input type="hidden" name="question_id" value="<?php echo $question['QuestionID']; ?>">
                                <input type="hidden" name="option_name" value="<?php echo $option['OptionName']; ?>">
                                <input type="hidden" name="userID" value="<?php echo $userID; ?>">

                                <button type="submit" name="submit"><?php echo htmlspecialchars($option['OptionName']); ?></button>
                                </form>
                                <?php } ?>









                    </div>
                    <div class="card-action right-align">
                       
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
