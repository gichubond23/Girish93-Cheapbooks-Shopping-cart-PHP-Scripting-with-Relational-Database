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
$Password=$_POST['password'];
$querystring="SELECT username,password FROM customers WHERE username='".$Username."' AND password='".$Password."'";

$result=$connection->query($querystring);
while($row=$result->fetch_assoc())
{
if(($row['username']===$Username)&&($row['password']==$Password))
{
	echo $row['username'];
} 
}

?>