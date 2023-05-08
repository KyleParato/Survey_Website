<?php
session_start();
$userID = $_SESSION["User_Email"];
$survey_id = $_SESSION['SCode'];

$conn = mysqli_connect('localhost','root', '', 'Survey');

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// $sql = "SELECT * from Response where user_email = '$userID' and Survey_Code = $survey_id;";
// $result = mysqli_query($conn,$sql);
// if (!$result){
//     $sql = "insert into response (user_email,survey_code,response_ts) values
//                 ('$user_id',$survey_id,current_timestamp);";
//     mysqli_query($conn,$sql);
// }

//$sql = "SELECT * from Response where user_email = '$userID' and Survey_Code = $survey_id limit 1;";
$sql = "SELECT Response_ID from Response where User_Email = '$userID' and Survey_Code = $survey_id";
$result = mysqli_query($conn,$sql);
$response_result = mysqli_fetch_array($result);
$response_id = $response_result["Response_ID"];

if (isset($_POST['submit'])) {
   // $userID = $_GET['userID'];

    $userID = $_POST['userID'];
    $survey_id = $_SESSION['SCode'];
    $question_id = $_POST['question_id'];
    $option_name = $_POST['option_name'];

    // echo $response_result['Response_ID'];
    // echo $_SESSION['SCode'];
    // echo $question_id;
    // echo $option_name;
    // echo $userID;
    
    // Check if all required fields are set
    if (empty($question_id) || empty($option_name) || empty($userID)) {
        echo "All fields are required!";
        exit();
    }
    
    // Do something with the selected option and question ID...
    //$response_id = $response_result["Response_ID"];
    $sql = "INSERT INTO Answer (Answer_Value, Response_ID, Question_ID) VALUES ('$option_name', $response_id, $question_id);";
    if(mysqli_query($conn, $sql)) {
        
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
if (isset($_POST['Finish'])){
    header("Location: AllSurvey.php");
    exit();
}


if (!$conn) {
    echo 'Connection error: ' . mysqli_connect_error();
} else {
    $userID = $_SESSION["User_Email"];
    $survey_id = $_SESSION['SCode'];
    $sql = "SELECT * from question where Survey_Code = $survey_id;";
    $allQuestion = mysqli_query($conn, $sql);
}
?>

<?php include('templates/header.php') ?>

<h4 class="center grey-text">ALL Question</h4>

<div class="container">
    <div class="row">
        <?php 
            foreach ($allQuestion as $question) { ?>
            <div class="col s6 md3">
                <div class="card z-depth-0">
                    <div class="card-content center">
    
                        <h6><?php echo htmlspecialchars($question['QName']); ?></h6>
                        <p><?php echo htmlspecialchars($question['QDescription']); ?></p>
                                <?php 
                                $sql = "SELECT QOption FROM question_option WHERE Question_ID = {$question['Question_ID']};";
                                $options = mysqli_query($conn, $sql);
                                foreach ($options as $option){?>
                                <form class="form" method="POST" action="AllQuestion.php">
                                <input type="hidden" name="question_id" value="<?php echo $question['Question_ID']; ?>">
                                <input type="hidden" name="option_name" value="<?php echo $option['QOption']; ?>">
                                <input type="hidden" name="userID" value="<?php echo $userID; ?>">

                                <button type="submit" name="submit"><?php echo htmlspecialchars($option['QOption']); ?></button>
                                </form>
                                <?php } ?>
                    </div>
                    <div class="card-action right-align">
                       
                    </div>
                </div>
            </div>
        <?php }?>
    </div>
    <form class="form" method="POST" action="AllQuestion.php">
    <div class="center"><input type="submit" name="Finish"value="Finish"></div>
                                </form>
</div>
