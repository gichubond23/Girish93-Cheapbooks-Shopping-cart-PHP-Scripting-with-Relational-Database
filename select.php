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
  $dbname='';//DB password here

  $connection=new mysqli("$dbhost","$username","$password","$dbname");

  if($connection->connect_error)
  {
    die("Connection Failed:".$connection->connect_error);
  }

$Username=$_POST['username'];
$querystring="SELECT username,password FROM customers WHERE username='".$Username."'";
$result=$connection->query($querystring);

 
?>
  <?php
  if($result->num_rows>0){
  while ($row=$result->fetch_assoc()) {
   ?>
  <div class="page-header">
  <?php echo '<h1>Welcome '.$row['username'].'</h1>';?>
  </div>
  <?php } } ?>

    <div class="container">
    <div class="panel panel-default">
    <div class="panel-body bg-info">
    <form method="post" action="select.php">
    <label style="color:blue">Enter to search by Author or Title</label>
    <input type="text" name="searchby" class="search">
    <button type="submit" class="btn btn-primary"  name="sbt">Search by Title</button>
    <button type="submit" class="btn btn-success" class="author" name="sba">Search by Author</button>
    </form>
    </div>
    </div>
    </div>
    
  
  
  <div class="container">
   <?php 
   if(isset($_POST['searchby'])&&isset($_POST['sbt']))
    {
   $search=$_POST['searchby'];
  $querystring="SELECT a.Title,a.ISBN,b.Number FROM book a,stocks b WHERE a.Title LIKE '%$search%' AND a.ISBN=b.ISBN;";
  $querystring.="SELECT a.Title,a.ISBN,d.Number FROM book a,author b,writtenby c,stocks d WHERE b.name='".$search."' AND b.SSN=c.SSN AND  c.ISBN=a.ISBN AND a.ISBN=d.ISBN;";
  ?> 
  <?php if($connection->multi_query($querystring)){  $result=$connection->store_result(); ?>
  <div class="page-header">
  <?php echo "<h1><strong>Displaying ".mysqli_num_rows($result)." results for your search:</strong></h1>"; ?> 
  </div>
  <?php while($row = $result->fetch_assoc()){  ?>
  <div class="row">
  <div class="col-sm-6">
  <h1>Title:<?php echo $row['Title']; ?></h1> 
  <p><strong>ISBN Number:<?php echo $row['ISBN']; ?></strong></p>
  <p style="color:red">Number of copies:<?php echo $row['Number']; ?></p>
  </div>
  <div class="col-sm-2">
  <form method="post"  action="<?php $_SERVER['PHP_SELF']; ?>">
  <!--button type="button" class="btn btn-default" name="shopcart"><span class="glyphicon glyphicon-shopping-cart"></span> Add to Cart</button!-->
  <input type="button" name="shopcart" value="cart">
  </form>
  </div>
  </div>
  <?php }} ?>
  <form>
  <div class="col-sm-2">
  <a href="#" class="btn btn-default"><span class="glyphicon glyphicon-shopping-cart"></span> Go to Shopping Cart</a></p>
  </div>
  <label>Number of items in cart</label>
   <input type="text" name="cart2" class="shop" value=<?php $count=0; if($_SERVER['REQUEST_METHOD']=='POST'){ if(isset($_POST['shopcart'])){echo $count; } }?>>
   <?php 

?>
   >
  </div>
  </form>
  </div>
  <?php } ?>


      <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>