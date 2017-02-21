
<?php session_start(); ?>

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

$Username=$_POST['username'];
$Password=md5($_POST['password']);
$querystring="SELECT username,password FROM customers WHERE username='".$Username."' AND password='".$Password."'";
$result=$connection->query($querystring);

 if(!empty($_POST['username'])&&!empty($_POST['password']))
  {
  if($result->num_rows>0)
  {
   $_SESSION['use']=$Username;
   header('Location:Accountnew.php');

  }
 else
 {
  header('Location:login.php');
 }
 }
 else
 {
 header('Location:login.php');
 } 
 ?>
