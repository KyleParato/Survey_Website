<!-- <?php 
$userID = $_GET['userID'];
echo $userID;
echo "all survey";
?> -->



<?php



    if (isset($_POST['submit'])) {
        header("Location: AllQuestion.php");


        
    }



$conn = mysqli_connect('localhost','shaun', '1234', 'survey');

if(!$conn) {
     echo 'Connection error: ' . mysqli_connect_error();
}
else {



     $sql =  "SELECT SurveyName FROM survey";
     $result = mysqli_query($conn,$sql);
     $allSurvey = mysqli_fetch_all($result, MYSQLI_ASSOC);

     mysqli_free_result($result);
     mysqli_close($conn);
     explode(',',$allSurvey[0]['SurveyName']);


   
}

?>




<?php   include('templates/header.php')  ?>




<h4 class = "center grey-text"> ALL Survey</h4>


<div class = "container">    


<div class = "row">

<?php    foreach($allSurvey as $survey) {?>


  <div class="col s6 md3">
<div class="card z-depth-0">
<div class="card-content center">
<h6><?php echo htmlspecialchars($survey['SurveyName']);  ?> <h6>
</div>
<div class = "card-action right-align">



<form  class="form" action = "AllSurvey.php" method = "POST">


<input type="submit" name="submit" value = "Participate">



</form>







    


</div>
</div>
  </div>


     
     <?php } ?>


</div>
</div>
</head>



</html>

