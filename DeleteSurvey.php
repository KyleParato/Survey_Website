<?php
    $userID = $_GET['userID'];
    $conn = mysqli_connect('localhost','shaun', '1234', 'survey');

    if (isset($_POST['submit'])) {
        $survey_id = $_POST['survey_id'];

        // Delete the survey with the given survey ID
        $sql = "DELETE FROM survey WHERE SurveyID = $survey_id";
        mysqli_query($conn, $sql);

        echo "You deleted the survey";
        // Redirect to the same page after deleting the survey
       // header("Location: AllSurvey.php?userID=$userID");
        exit();
    }

    if (!$conn) {
        echo 'Connection error: ' . mysqli_connect_error();
    } else {
        $sql = "SELECT SurveyName, SurveyID FROM survey WHERE UserID = $userID";
        $result = mysqli_query($conn, $sql);
        $allSurvey = mysqli_fetch_all($result, MYSQLI_ASSOC);
        mysqli_free_result($result);
        mysqli_close($conn);
    }
?>

<?php include('templates/header.php') ?>

<h4 class="center grey-text">ALL Survey</h4>

<div class="container">
    <div class="row">
        <?php foreach ($allSurvey as $survey) { ?>
            <div class="col s6 md3">
                <div class="card z-depth-0">
                    <div class="card-content center">
                        <h6><?php echo htmlspecialchars($survey['SurveyName']); ?></h6>
                    </div>
                    <div class="card-action right-align">
                        <form class="form" method="POST">
                            <input type="hidden" name="survey_id" value="<?php echo $survey['SurveyID']; ?>">
                            <input type="hidden" name="userID" value="<?php echo $userID; ?>">
                            <input type="submit" name="submit" value="Delete">
                        </form>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
