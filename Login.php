<?php

$conn = mysqli_connect('localhost', 'shaun', '1234', 'Survey');

if (!$conn) {
    echo 'Connection error: ' . mysqli_connect_error();
} else {
    if (isset($_POST['submit'])) {
        $email = mysqli_real_escape_string($conn, $_POST["email"]); 
        $password = mysqli_real_escape_string($conn, $_POST["passworld"]);
        
        $sql = "SELECT * FROM User WHERE Email = '$email'";
        $result = mysqli_query($conn, $sql);
        
        if (mysqli_num_rows($result) > 0) {
            $user = mysqli_fetch_assoc($result);
            if ($password == $user['Passwordd']) {
                // echo "Login successful!";
                // // Redirect to a new page or perform other actions here
                // header('Location: UserPage.php');


                // $user_id = $user['UserID'];
                // // Redirect to a new page with the user ID as a parameter
                // header("Location: UserPage.php?id=$user_id");     


                $user_id = $user['UserID'];
                $user_name = $user['FirstName'];
                // Redirect to a new page with the user ID and name as parameters
                header("Location: UserPage.php?id=$user_id&name=$user_name");
 

                // ...
            } else {
                echo "Incorrect password.";
            }
        } else {
            echo "Incorrect email.";
        }
        
        mysqli_free_result($result);
        mysqli_close($conn);
    }
}







// if (isset($_POST['submit'])){
//    // echo $_POST["email"];
//    // echo $_POST["title"];








// ////////////////////////////////////////////////////////////////

// if(empty($_POST["email"])) {
//    echo "type your email  </br>";
// }else {
//    echo htmlspecialchars($_POST["email"]);


// }

// /////////////////////////////////////

// if(empty($_POST["passworld"])) {
//    echo "type your passworld  </br>";
// }else {
//    echo htmlspecialchars($_POST["passworld"]);


// }


// }
?>



<!DOCTYPE html>

<html>

<head>
<link href="style.css" rel="stylesheet" type="text/css" />
</head>



<body>

<form  class="form" action = "Login.php" method = "POST">

<h1>Sign Up</h1>



<label>Email</label>
<input type="text" name="email">

<label>Password</label>
<input type="text" name="passworld">





<div class="center">
<input type="submit" name="submit" value = "loging">
</div>


</form>
</body>


</html>




