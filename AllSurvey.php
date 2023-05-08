<?php
    $v = session_start();
    $conn = mysqli_connect('localhost','root', '', 'Survey');
    if (isset($_POST['Participate'])) {
        $survey_id = $_POST['survey_id'];
        $userID = $_SESSION["User_Email"];
        $_SESSION['SCode'] = $survey_id;
       // $userID = $_GET['userID'];
        $sql = "insert into response (user_email,survey_code,response_ts) values
                ('$userID',$survey_id,current_timestamp);";
        $r = (mysqli_query($conn,$sql));
        header("Location: AllQuestion.php");
        exit();

       
    }

    if(!$conn) {
        echo 'Connection error: ' . mysqli_connect_error();
    } else {
        $sql = "SELECT * FROM survey";
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
                        <h6><?php echo htmlspecialchars($survey['Survey_Name']); ?></h6>
                    </div>
                    <div class="card-action right-align">
                        <form class="form" method="POST">
                            <input type="hidden" name="survey_id" value="<?php echo $survey['Survey_Code']; ?>">
                            <input type="hidden" name="userID" value="<?php echo $userID; ?>">

                           
                            <input type="submit" name="Participate" value="Participate">
                        
                        
                        </form>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
