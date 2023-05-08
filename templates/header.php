
<head>
<link href="style.css" rel="stylesheet" type="text/css" />
<title>  Survery </title>

    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

<style type="text/css"> 

nav{
    display: flex;
    flex-flow: row nowrap;
    justify-content: space-evenly;
    background-color: #03739c;
    overflow: hidden;
}

.header {
    padding: 40px; 
    text-align: center; /* center the text */
    background: #0081af; /* blue background */
    color: #ead2ac; /* yellow text color */
}
body {
    font-family: Arial, Helvetica, sans-serif;
    background: #d3d3d3
}

</style>

<div class="header">
  <h1>Magic Survey</h1>
  <p>For all of your survey needs</p>
</div>

</head>
<body   class = "body">
<nav>
    <a href="DeleteSurvey.php">Your Surveys</a>
    <a href="AllSurvey.php">All Surveys</a>
    <a href="CreateSurvey.php">Create Survey</a>
    <a href="LogOut.php">Log Out</a>
</nav>
</body>