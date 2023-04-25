<?php

include('config/db_connect.php');

if (isset($_POST['submit'])){
    // echo $_POST["email"];
    // echo $_POST["title"];


if(empty($_POST["email"])) {
    echo "Please enter a valid email address </br>";
}else {
    echo "thank you for your email address";
}

////////////////////////////////////////////////////////////////


if(empty($_POST["title"])) {
    echo "title is required </br>";
}else {
    echo htmlspecialchars($_POST["title"]);


 }


////////////////////////////////////////////////////////////////

if(empty($_POST["ingredients"])) {
    echo "ingredients  </br>";
}else {
    echo htmlspecialchars($_POST["ingredients"]);


 }




 
 $email = mysqli_real_escape_string($conn, $_POST["email"]); 
 $title = mysqli_real_escape_string($conn, $_POST["title"]); 
 $ingredients = mysqli_real_escape_string($conn, $_POST["ingredients"]); 

 $sql = "INSERT INTO pizzas(title,email, ingredients) VALUES ('$title', '$email', ' $ingredients')";


if(mysqli_query($conn,$sql)){
header("Location:index.php");

}
else {
    echo 'query error:'. mysqli_error($conn);
}

}

?>

<!DOCTYPE html>

<html>

<head>
<title> php tutorials </title>
</head>



<body>

<?php include("templates/header.php");?>

<section class="container grey-text">

<h4 class="center">Add pizza </h4>


<form  class="white" action = "add.php" method = "POST">
<label>your email</label>
<input type="text" name="email">

<label>Pizza title</label>
<input type="text" name="title">

<label>Ingredients (comma seprated) title</label>
<input type="text" name="ingredients">
<div class="center">

<input type="submit" name="submit" value = "submit">
</div>








</form>



</section>


<?php include("templates/footer.php");?>


</body>


</html>