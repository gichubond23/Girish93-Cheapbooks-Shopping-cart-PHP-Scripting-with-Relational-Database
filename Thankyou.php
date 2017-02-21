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
 <?php echo '<h1>Order placed successfully</h1>';?>
  </div>

<p>Thanks for shopping with CheapBooks.</p>
<p>We hope you enjoyed your shopping at Cheapbooks</p>
<p>We encourage you to motivate us by giving your feedback at www.Cheapbooks.com/reviews</p>
<form action="logout.php">
<button type="submit" class="btn btn-danger" name="logout">Click here to Logout</button>
</form>


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html> 	

