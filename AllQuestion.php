<?php
    $userID = $_GET['userID'];
    $survey_id = $_GET['survey_id'];
    echo "UserID: $userID<br>";
    echo "SurveyID: $survey_id";
?>





<?php
    $userID = $_GET['userID'];
    echo  $userID;

    $conn = mysqli_connect('localhost','shaun', '1234', 'survey');

    if (isset($_POST['submit'])) {
        $survey_id = $_POST['survey_id'];
      //  header("Location: AllQuestion.php?userID=$userID&survey_id=$survey_id");
    }

    if(!$conn) {
        echo 'Connection error: ' . mysqli_connect_error();
    } else {
        $sql = "SELECT QuestionName FROM Question WHERE SurveyID = $survey_id";
        $result = mysqli_query($conn, $sql);
        $allQuestion = mysqli_fetch_all($result, MYSQLI_ASSOC);
        mysqli_free_result($result);
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





                    </div>
                    <div class="card-action right-align">
                        <form class="form" method="POST">
                           
                            <input type="hidden" name="survey_id" value="<?php echo $survey['SurveyID']; ?>">
                           
                            <input type="submit" name="submit" value="Participate">



                        
                        
                        </form>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
