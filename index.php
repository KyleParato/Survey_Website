
<<?php
$v = session_start();
//echo $v;
$conn = mysqli_connect('localhost','root', '', 'Survey');


if(!$conn) {
     echo 'Connection error: ' . mysqli_connect_error();
}else {
   echo 'Successfully connected';
}

if (isset($_POST['CreateAccount'])) {
   header('Location: CreateUser.php');
   exit;
}


if (isset($_POST['Login'])){
  
   $email = mysqli_real_escape_string($conn, $_POST["email"]); 
   $password = mysqli_real_escape_string($conn, $_POST["passworld"]); 


   $sql = "SELECT * FROM Users WHERE Email = '$email'";
   $result = mysqli_query($conn, $sql);

   if (mysqli_num_rows($result) > 0) {
      $user = mysqli_fetch_assoc($result);
      if ($password == $user['User_Password']) {
         $_SESSION["User_Email"] = $email;
         header('Location: DeleteSurvey.php');
         exit();
      }
      else{
         $user['User_Password'];
         header("Refresh:0");
      }
   }
   else{
      $user['User_Password'];
      header("Refresh:0");
   }
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
<form  class="form" action = "index.php" method = "POST">

<h1>Login</h1>

<label>Email</label>
<input type="text" name="email">

<label>Password</label>
<input type="text" name="passworld">




<div class="center">

<input type="submit" name="Login"  value = "Login">
<input type="submit" name="CreateAccount" value = "Create Account">


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


