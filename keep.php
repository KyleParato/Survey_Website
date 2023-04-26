<?php 

// $surveyID = $_GET['id'];
// $surveytype = $_GET['type'];
// echo  $surveyID; 
// echo  $surveytype;


// echo "type answer for your question";

?>




<!DOCTYPE html>
<html>
<head>
    <title>Question Page</title>
</head>
<body>
    <h1>Question Page</h1>
    <form method="post" action="submit_answers.php">
        <!-- Question 1: Multiple answers -->
        <p>Question 1: Which of the following colors do you like? (select all that apply)</p>
        <input type="checkbox" name="question1[]" value="red">Red<br>
        <input type="checkbox" name="question1[]" value="blue">Blue<br>
        <input type="checkbox" name="question1[]" value="green">Green<br>
        
        <!-- Question 2: Multiple choice -->
        <p>Question 2: What is your favorite fruit?</p>
        <input type="radio" name="question2" value="apple">Apple<br>
        <input type="radio" name="question2" value="banana">Banana<br>
        <input type="radio" name="question2" value="orange">Orange<br>
        
        <!-- Question 3: Yes/No -->
        <p>Question 3: Do you like pizza?</p>
        <input type="radio" name="question3" value="yes">Yes<br>
        <input type="radio" name="question3" value="no">No<br>
        
        <!-- Question 4: Essay -->
        <p>Question 4: What do you like about your favorite book?</p>
        <textarea name="question4"></textarea><br>
        
        <br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
