
<?php

$conn = mysqli_connect('localhost','root', '', 'Survey');

session_start();

if(!$conn) {
     echo 'Connection error: ' . mysqli_connect_error();
}else {
   //echo 'Successfully connected';
}


if (isset($_POST['Login'])) {
   header('Location: login.php');
   exit;
}


if (isset($_POST['SignUp'])){

   $name = mysqli_real_escape_string($conn, $_POST["name"]); 
   $lastname = mysqli_real_escape_string($conn, $_POST["lastname"]); 
   $phone = mysqli_real_escape_string($conn, $_POST["phone"]); 
   $email = mysqli_real_escape_string($conn, $_POST["email"]); 
   $passworld = mysqli_real_escape_string($conn, $_POST["passworld"]); 

   $sql = "INSERT INTO users(FName,LName,Email,User_Password,Phone_number,user_ts) VALUES 
                        ('$name', '$lastname', '$email', '$passworld','$phone',current_timestamp);";
   if(mysqli_query($conn,$sql)){
      $_SESSION["User_Email"] = $email;
      header("Location: DeleteSurvey.php");
      exit();
   }
   else {
      echo 'query error:'. mysqli_error($conn);
   }
}

if (isset($_POST['Back'])) {
   header('Location: index.php');
   exit;
}
?>



<!DOCTYPE html>

<html>

<head>
<link href="style.css" rel="stylesheet" type="text/css" />
<div class="header">
  <h1>Magic Survey</h1>
  <p>For all of your survey needs</p>
</div>
</head>



<body>
<form  class="form" action = "CreateUser.php" method = "POST">

<h1>Create Account</h1>


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

<input type="submit" name="SignUp" value = "Sign Up">
<input type="submit" name="Login"  value = "Login">

<!-- Testing a back button to return to index.php -->
<input type="submit" name="Back" value = "Back">

</script>

</div>


</form>
</body>


</html>


<!-- why pure php for some?
what is the link in header
what is the random survey on all survey page -->




<!-- <!DOCTYPE html>

<html>

<head>
<link href="style.css" rel="stylesheet" type="text/css" />
<div class="header">
  <h1>Magic Survey</h1>
  <p>For all of your survey needs</p>
</div>
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
<input type="submit" name="Login" value = "Login">



</div>


</form>
</body>


</html> -->


