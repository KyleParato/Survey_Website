<?php
include('config/db_connect.php');




$conn = mysqli_connect('localhost','shaun', '1234', 'ninja_pizza');

if(!$conn) {
     echo 'Connection error: ' . mysqli_connect_error();
}
else {

   
     $sql = 'SELECT title, id,ingredients FROM pizzas';
     $result = mysqli_query($conn,$sql);
     $pizzas = mysqli_fetch_all($result, MYSQLI_ASSOC);

     mysqli_free_result($result);
     mysqli_close($conn);
     explode(',',$pizzas[0]['ingredients']);



     print_r($pizzas);
}

?>




<?php   include('templates/header.php')  ?>




<h4 class = "center grey-text"> Pizzas</h4>


<div class = "container">    


<div class = "row">

<?php    foreach($pizzas as $pizza) {?>


  <div class="col s6 md3">
<div class="card z-depth-0">
<div class="card-content center">
<h6><?php echo htmlspecialchars($pizza['title']);  ?> <h6>
<h6><?php echo htmlspecialchars($pizza['ingredients']);  ?> <h6>
</div>
<div class = "card-action right-align">
     <a class = "brand-text" href = "#"> more info </a>
</div>
</div>
  </div>


     
     <?php } ?>


</div>



</div>






 
  ?>
</div>

<div class="center">
 
  <ul>
  <li>Item 1</li>
  <li>Item 2</li>
  <li>Item 3</li>
</ul>

</div>




<?php   include('templates/footer.php')  ?>




</head>







<body>

<?php include("templates/header.php");?>
<?php include("templates/footer.php");?>


</body>




</html>

.container {
  width: 960px;
  padding: 15px;
  margin: 20px;
}