
<?php 

$surveyID = $_GET['id'];
$surveytype = $_GET['type'];
$question = $_GET['question'];

if($surveytype  == 1) {
    ?>
    <form method="post" action="AnswerOption.php">
        <h1><?php echo $question; ?></h1>
        <h3>"True || False"</h3>

        <input type="submit" value="Submit">
    </form>
    <?php
}
else if($surveytype  == 2){
    ?>
  <form method="post" action="AnswerOption.php">
  <h1><?php echo $question; ?></h1>
  <label for="answer1">Answer 1:</label>
  <input type="text" name="comments1" id="answer1"><br>
  <label for="answer2">Answer 2:</label>
  <input type="text" name="comments2" id="answer2"><br>
  <label for="answer3">Answer 3:</label>
  <input type="text" name="comments3" id="answer3"><br>
  <label for="answer4">Answer 4:</label>
  <input type="text" name="comments4" id="answer4"><br>
  <br>
  <input type="submit" value="Submit">
</form>



    <?php
}
else if($surveytype == 3 ) {
    ?>
    <form method="post" action="AnswerOption.php">
    <h1><?php echo $question; ?></h1>
         
    <textarea name="textarea" rows="5" cols="40"></textarea>
        <br><br>
        <input type="submit" value="Submit">
    </form>
    <?php
}



?>
