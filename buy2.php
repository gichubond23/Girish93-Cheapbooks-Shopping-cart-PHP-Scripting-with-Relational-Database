<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Welcome to CheapBooks</title>

    <!-- Bootstrap -->
    <link href="css/Login.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
   <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          </button>
          <h1 class="navbar-brand">Welcome to CheapBooks-The best shopping retail services to buy your books</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Home</a></li>
            <li><a href="#">Services</a></li>
            <li><a href="#">About</a></li>
          </ul>
        </div>
      </div>
    </nav>


<?php

$dbhost='localhost:3307';
  $username='root';
  $password='';//DB password here
  $dbname='';//DB name here

  $connection=new mysqli("$dbhost","$username","$password","$dbname");

  if($connection->connect_error)
  {
    die("Connection Failed:".$connection->connect_error);
  }

if(!isset($_SESSION['use']))
{
  header('Location:login.php');
}

$BasketID=md5(uniqid(rand(),true));
mysqli_query($connection,"INSERT INTO shoppingbasket VALUES('".$BasketID."','".$_SESSION['use']."')");
?>
<div class="page-header">
  <?php echo '<h1>CheckOut Page</h1>';?>
  </div>
  <div class="container">
  <div class="panel panel-default">
  <div class="panel-heading bg-grey">
  <h3 class="panel-title">Product Details</h3>
  </div>
  <table class="table table-bordered table-striped">
  <tbody>
  <tr>
  <th width=40%>ISBN</th>
  <th width=10%>Title</th>
  <th width=20%>Copies</th>
  <th width=15%>Quantity</th>
  <th width=5%>Price</th>
  <th width=15%>Total</th>
  <th width=5%>Remove</th>
  </tr>
  <?php
 if(!empty($_SESSION['shoppingcart']))
  {
  	$totalprice=0;
  	foreach($_SESSION['shoppingcart'] as $key => $value)
  	{
  ?>
  <tr>
  <td><?php echo $value['ISBN'];  ?></td>
  <td><?php echo $value['Title'];  ?></td>
  <td><?php echo $value['Copies'];  ?></td>
  <td><?php echo $value['Quantity'];  ?></td>
  <td><?php echo $value['Price'];  ?></td>
  <td><?php echo $value['Price']*$value['Quantity'];  ?>
  <td><a href="Cart.php?action=delete&id=<?php echo $value['ISBN'] ?>"><span class="text-danger">Remove</span></a></td>
  </tr>
  <?php 
  $totalprice=$totalprice+($value['Price']*$value['Quantity']);
  mysqli_query($connection,"INSERT INTO contains VALUES('".$value['ISBN']."','".$BasketID."','".$value['Quantity']."')");
  mysqli_query($connection,"INSERT INTO shippingorder VALUES('".$value['ISBN']."','".$value['Warehousecode']."','".$_SESSION['use']."','".$value['Quantity']."')");
  mysqli_query($connection,"UPDATE stocks SET number=number-'".$value['Quantity']."' WHERE ISBN='".$value['ISBN']."' AND warehouseCode='".$value['Warehousecode']."'");

}

echo '<script>alert("Items successfully added to cart");</script>';

}



?>
<td colspan=3 align="right">Total</td>
  <td align="right">$<?php echo $totalprice ?></td>
  <td></td>
  </tr>

  </tbody>
 </table> 
 </div>  
 <form method="post" action="Shippingorder.php">
 <button type="submit" class="btn btn-primary" class="author" name="buy">Confirm Order</button>	
 </form>	
 <br>
 <form action="logout.php">
 <button type="submit" class="btn btn-danger"  name="logout">Not in a mood to shop? Click here to Logout</button>
 </form>
 </div>
 
 
 <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html> 	
   