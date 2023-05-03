


<?php

$conn = mysqli_connect('localhost','shaun', '1234', 'Survey');

if(!$conn) {
     echo 'Connection error: ' . mysqli_connect_error();
}else {
   echo 'Successfully connected';
}


if (isset($_POST['Lognin'])) {
   header('Location: login.php');
   exit;
}


if (isset($_POST['submit'])){
  


$name = mysqli_real_escape_string($conn, $_POST["name"]); 
$lastname = mysqli_real_escape_string($conn, $_POST["lastname"]); 



$phone = mysqli_real_escape_string($conn, $_POST["phone"]); 
$email = mysqli_real_escape_string($conn, $_POST["email"]); 
$passworld = mysqli_real_escape_string($conn, $_POST["passworld"]); 

$sql = "INSERT INTO User(FirstName,LastName, Email,Passwordd,PhoneNumber) VALUES ('$name', '$lastname', '$email', '$passworld','$phone')";

//$sql = "INSERT INTO User(FirstName,LastName, Email,Passwordd,PhoneNumber) VALUES ('$name', '$lastname', ' $email', '$passworld','$phone)";
//$sql = "INSERT INTO pizzas(title,email, ingredients) VALUES ('$title', '$email', ' $ingredients')";

if(mysqli_query($conn,$sql)){

   echo "welcome new user";
}
else {
   echo 'query error:'. mysqli_error($conn);
}
}
?>



<!DOCTYPE html>

<html>

<head>
<link href="style.css" rel="stylesheet" type="text/css" />
</head>



<body>

<form  class="form" action = "index.php" method = "POST">

<h1>New User</h1>


<label>First Name </label>
<input type="text" name="name">

<label>Last Name</label>
<input type="text" name="lastname">

<label>Email</label>
<input type="text" name="email">

<label>Password</label>
<input type="text" name="passworld">

<label>PhoneNumber</label>
<input type="text" name="phone">



<div class="center">

<input type="submit" name="submit" value = "Sign Up">
<input type="submit" name="Lognin" value = "Lognin">



</div>


</form>
</body>


</html>




