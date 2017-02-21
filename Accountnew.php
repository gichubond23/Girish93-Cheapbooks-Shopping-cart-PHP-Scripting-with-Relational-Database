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
 
?>



  <div class="page-header">
  <?php echo '<h1>Welcome '.$_SESSION['use'].'</h1>';?>
  </div>
  
    <div class="container">
    <div class="panel panel-default">
    <div class="panel-body bg-info">
    <form method="post" action="Accountnew.php">
    <label style="color:blue">Enter to search by Author or Title</label>
    <input type="text" name="searchby" class="search">
    <button type="submit" class="btn btn-primary"  name="sbt">Search by Title</button>
    <button type="submit" class="btn btn-success" class="author" name="sba">Search by Author</button>
    </form>
    <form method="post" action="prevresnew.php">
    <button type="submit" class="btn btn-primary">Previous Results</button>
    </form>
    <br>
    <form action="logout.php">
    <button type="submit" class="btn btn-danger"  name="logout">Not in a mood to shop? Click here to Logout</button>
    </form>
    </div>
    </div>
    </div>
   
  
  
  <div class="container">
   
  <?php if(isset($_POST['searchby']))
  { 
   $search=$_POST['searchby']; 
   $querystring="SELECT a.Title,a.ISBN,b.Number,c.name,b.warehouseCode,a.Price FROM book a,stocks b,warehouse c WHERE a.Title LIKE '%$search%' AND a.ISBN=b.ISBN AND b.warehouseCode=c.warehouseCode;";
   $querystring.="SELECT a.Title,a.ISBN,d.Number,a.Price,e.name,d.warehouseCode FROM book a,author b,writtenby c,stocks d,warehouse e WHERE b.name LIKE '%$search%' AND b.SSN=c.SSN AND  c.ISBN=a.ISBN AND a.ISBN=d.ISBN AND d.warehouseCode=e.warehouseCode";
$_SESSION['searchbytitle']=array();
$_SESSION['searchbyauthor']=array();
$_SESSION['searchvalue']=$search;

  if($connection->multi_query($querystring)){ $result=$connection->store_result();     
   if(isset($_POST['sbt']))
    {    
    $_SESSION['bytitle']=$_POST['sbt'];
   ?>
  <div class="page-header">
  <?php echo "<h1><strong>Displaying ".mysqli_num_rows($result)." results for your search:</strong></h1>"; ?> 
  </div>
   <div class="row">
  <?php while($row = $result->fetch_assoc()){
  if($row['Number']!=0){
  ?>
  <div class="col-md-3">
  <div class="thumbnail text-center" >
  <div class="img-thumbnail" text-align="center">
  <?php echo '<img src="images/'.$row['ISBN'].'.jpeg">' ?>
  </div>
  <form method="post" action="Cartprocess.php?action=add&id=<?php echo $row['ISBN'] ?>">
  <p><strong><?php echo $row['Title']; ?></strong></p> 
  <p><strong><?php echo $row['ISBN']; ?></strong></p>
  <p style="color:red">Copies:<?php echo $row['Number']; ?></p>
  Select Quantity:<input type="number" name="quantity" min=1 max=25><br>
  <input type="hidden" name="hiddentitle" value="<?php echo $row['Title'] ?>">
  <input type="hidden" name="hiddencopy" value="<?php echo $row['Number'] ?>">
  <input type="hidden" name="hiddenprice" value="<?php echo $row['Price'] ?>">
  <?php
 $_SESSION['title']=$row['Title'];
 $_SESSION['ISBN']=$row['ISBN'];
 $_SESSION['number']=$row['Number'];

 $_SESSION['searchbytitle'][]=array("Title"=>$row['Title'],"ISBN"=>$row['ISBN'],"Number"=>$row['Number']);

  ?>
  <br><p><span><button type="submit" class="btn btn-success" name="cart"><span class="glyphicon glyphicon-shopping-cart"></span><?php echo $row['name'].': '?>Add to Cart</button></span></p>
  <input type="hidden" name="hiddenwarecode" value="<?php echo $row['warehouseCode'] ?>">
  </form>
  </div>
  </div>
  <?php
  $_SESSION['warehousename']=$row['name'];
  } } ?>
  </div>
  <form>
  <label>Number of items in cart</label>
  <input type="text" name="cart2" class="shop" value="<?php if(!isset($_SESSION['count'])){
 $_SESSION['count'] = 0;
 } 
 if(isset($_POST['cart'])){
 $count = $_SESSION['count'] + 1;
 $_SESSION['count'] = $count; } echo $_SESSION['count'] ?>">
  </form>
  <br>
  <form action="Cart.php">
   <button type="submit" class="btn btn-primary"  name="goto"><span class="glyphicon glyphicon-shopping-cart"></span> Go to Shopping Cart</button></p>
  </form>
   
  <?php }  ?>
  <?php 
  $connection->next_result();  
  $result=$connection->store_result();   
 
  if(isset($_POST['sba']))
  {
  $_SESSION['byauthor']=$_POST['sba'];
  ?>
  <div class="page-header">
  <?php echo "<h1><strong>Displaying ".mysqli_num_rows($result)." results for your search:</strong></h1>"; ?> 
  </div>
  <div class="row">
  <?php while($row = $result->fetch_assoc()){  
   if($row['Number']!=0){
  ?>
  <div class="col-md-3">
  <div class="thumbnail text-center" >
  <div class="img-thumbnail" text-align="center">
  <?php echo '<img src="images/'.$row['ISBN'].'.jpeg">' ?>
  </div>
  <p><strong><?php echo $row['Title']; ?></strong></p> 
  <p><strong><?php echo $row['ISBN']; ?></strong></p>
  <p style="color:red">Copies:<?php echo $row['Number']; ?></p>
   <form method="post" action="Cartprocess.php?action=add&id=<?php echo $row['ISBN'] ?>">
  Select Quantity:<input type="number" name="quantity" min=1 max=25><br>
  <input type="hidden" name="hiddentitle" value="<?php echo $row['Title'] ?>">
  <input type="hidden" name="hiddenprice" value="<?php echo $row['Price'] ?>">
  <input type="hidden" name="hiddencopy" value="<?php echo $row['Number'] ?>">
  <?php
 $_SESSION['searchbyauthor'][]=array("Title"=>$row['Title'],"ISBN"=>$row['ISBN'],"Number"=>$row['Number']);
   ?>
 <br><p><span><button type="submit" class="btn btn-success" name="cart"><span class="glyphicon glyphicon-shopping-cart"></span><?php echo $row['name'].': '?>Add to Cart</button></span></p>
 <input type="hidden" name="hiddenwarecode" value="<?php echo $row['warehouseCode'] ?>">
  </form>
  </div>
  </div>
  <?php 
  $_SESSION['warehousename']=$row['name'];
  }} ?>
  </div>
  <form>
  <label>Number of items in cart</label>
  <input type="text" name="cart2" class="shop" value="<?php if(!isset($_SESSION['count'])){
 $_SESSION['count'] = 0;
 } 
 if(isset($_POST['cart'])){
 $count = $_SESSION['count'] + 1;
 $_SESSION['count'] = $count; }  
 echo $_SESSION['count']; ?>">
  </form>
  <br>
  <form action="Cart.php">
  <button type="submit"  class="btn btn-primary" name="goto"><span class="glyphicon glyphicon-shopping-cart"></span> Go to Shopping Cart</button></p>
  </form>
  <?php  } } }?>
  </div>



  

      <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>