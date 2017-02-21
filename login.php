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
    <h1>Login Page</h1>
    </div>
    <div class="container">
    <form class="form-horizontal" method="post">
    <div class="panel panel-default">
    <div class="panel-body bg-info">
    <h2 class="form-signin-heading">Please sign in</h2>
  <div class="form-group">
    <label for="inputUsername3" class="col-sm-2 control-label">Username</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" id="inputUsername3" placeholder="Username" name="username">
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
    <div class="col-sm-5">
      <input type="password" class="form-control" id="inputPassword3" placeholder="Password" name="password">
    </div>
  </div>
   <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" formaction="loginvalid.php"  class="btn btn-primary" name="login">Sign in</button>
      <button type="submit" formaction="register.php" class="btn btn-success" name="register">Click here to Register</button>
       <h3>Are you a New User? Hit the register button to become a part of our family</h3>
    </div>
  </div>
</div>
</div>
</form>
</div>


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


if($_SERVER['REQUEST_METHOD']=='POST'){ 
$username=$_POST['username'];
$address=$_POST['address'];
$email=$_POST['email'];
$pno=$_POST['pno'];
$password=$_POST['password'];

$querystring="INSERT INTO customers VALUES('".$username."','".md5($password)."','".$address."','".$pno."','".$email."')";
$result=$connection->query($querystring);

if($result)
{
  echo '<h1 style="color:red"><em>Successfully Registered</em></h1>';
  
}
else
{
  echo '<h1>Please check if all the details entered are correct</h1>';
}
}
?>




    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>