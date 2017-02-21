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

<div class="page-header">
  <?php echo '<h1>Welcome '.$_SESSION['use'].'</h1>';?>
  </div>
  
    <div class="container">
    <div class="panel panel-default">
    <div class="panel-body bg-info">
    <form method="post" action="Account.php">
    <label style="color:blue">Enter to search by Author or Title</label>
    <input type="text" name="searchby" class="search">
    <button type="submit" class="btn btn-primary"  name="sbt">Search by Title</button>
    <button type="submit" class="btn btn-success" class="author" name="sba">Search by Author</button>
    </form>
    </div>
    </div>
    </div>
   


<div class="container">

 <div class="page-header">
  <?php echo "<h1><strong>Displaying previous results for your search:</strong></h1>"; ?> 
  </div>
<?php if(isset($_SESSION['searchbytitle']))
{
  ?>
   <div class="row">
<?php
foreach($_SESSION['searchbytitle'] as $key => $value)
{	
?>
<div class="col-md-3">
<div class="thumbnail text-center" >
<div class="img-thumbnail" text-align="center">
<?php echo '<img src="images/'.$value['ISBN'].'.jpeg">';
?>
</div>
<p><strong><?php echo $value['Title']; ?></strong></p>
<p><strong><?php echo $value['ISBN']; ?></strong></p>
<p style="color:red">Copies:<?php echo $value['Number']; ?></p>
<form method="post">
<a href="#" class="btn btn-default" name="cart"><span class="glyphicon glyphicon-shopping-cart"></span> Add to Cart</a></p>
</form>
</div>
</div>
<?php }} ?>
</div>
<?php if(isset($_SESSION['searchbyauthor']))
{
?>
<div class="row">
<?php
foreach($_SESSION['searchbyauthor'] as $key => $value)
{	
?>
<div class="col-md-3">
<div class="thumbnail text-center" >
<div class="img-thumbnail" text-align="center">
<?php echo '<img src="images/'.$value['ISBN'].'.jpeg">';
?>
</div>
<p><strong><?php echo $value['Title']; ?></strong></p>
<p><strong><?php echo $value['ISBN']; ?></strong></p>
<p style="color:red">Copies:<?php echo $value['Number']; ?></p>
<form method="post">
<a href="#" class="btn btn-default" name="cart"><span class="glyphicon glyphicon-shopping-cart"></span> Add to Cart</a></p>
</form>
</div>
</div>
<?php }} ?>
</div>
<form>
<a href="#" class="btn btn-default"><span class="glyphicon glyphicon-shopping-cart"></span> Go to Shopping Cart</a></p>
<label>Number of items in cart</label>
<input type="text" name="cart2" class="shop" value=<?php $count=0; if(isset($_POST['cart'])){echo $count++; } ?>>
</form>
</div>


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>






