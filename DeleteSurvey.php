<?php
    $v = session_start();
    
    $conn = mysqli_connect('localhost','root', '', 'Survey');

    if (isset($_POST['submit'])) {
        $survey_id = $_POST['survey_id'];
        $userid = $_SESSION["User_Email"];
        // Delete the survey with the given survey ID
        $sql = "SET foreign_key_checks = 0;";
        mysqli_query($conn, $sql);
        $sql = "UPDATE survey SET User_Email='Admin' WHERE Survey_Code = $survey_id;";
        mysqli_query($conn, $sql);
        $sql = "SET foreign_key_checks = 1;";
        mysqli_query($conn, $sql);

        echo "You deleted the survey";
        // Redirect to the same page after deleting the survey
        header("Location: DeleteSurvey.php");
        exit();
    }

    if (!$conn) {
        echo 'Connection error: ' . mysqli_connect_error();
    } else {
        $userID = "'";
        $userID = $userID . $_SESSION["User_Email"];
        $userID = $userID . "'";
        $sql = "SELECT * FROM survey WHERE User_Email = $userID";
        $result = mysqli_query($conn, $sql);
        $allSurvey = mysqli_fetch_all($result, MYSQLI_ASSOC);
        mysqli_free_result($result);
        mysqli_close($conn);
    }
?>

<?php include('templates/header.php') ?>

<h4 class="center grey-text">Your Surveys</h4>

<div class="container">
    <div class="row">
        <?php foreach ($allSurvey as $survey) { ?>
            <div class="col s6 md3">
                <div class="card z-depth-0">
                    <div class="card-content center">
                        <h6><?php echo htmlspecialchars($survey['Survey_Name']); ?></h6>
                    </div>
                    <div class="card-action right-align">
                        <form class="form" method="POST">
                            <input type="hidden" name="survey_id" value=<?php echo $survey['Survey_Code']; ?>>
                            <!-- <input type="hidden" name="userID" value="<?php echo $userID; ?>"> -->
                            <input type="submit" name="submit" value="Delete">
                        </form>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
