
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

if(!isset($_SESSION['use']))
{
  header('Location:login.php');
}

?>

<?php
if(isset($_POST['cart']))
{
  if(isset($_SESSION['shoppingcart']))
  {
    $item_id=array_column($_SESSION['shoppingcart'],$_GET['id']);
    if(!in_array($_GET['id'],$item_id))
    {
    if($_POST['quantity']>$_POST['hiddencopy'])
    {
      echo '<script>alert("Quantity not available");</script>';
    }
    $count=count($_SESSION['shoppingcart']);
    $item=array(
        "ISBN"=>$_GET['id'],
        "Title"=>$_POST['hiddentitle'],
        "Copies"=>$_POST['hiddencopy'],
        "Quantity"=>$_POST['quantity'],
         "Price"=>$_POST['hiddenprice'],
         "Warehousecode"=>$_POST['hiddenwarecode']
    );
    $_SESSION['shoppingcart'][$count]=$item;
    echo '<script>window.location="prevresnew.php"</script>';
   
    }
    else
    {
      echo '<script>alert("Item already added")</script>';
      header("Location:Account.php");
    }
    
  }
  else
  {
    $item=array(
        "ISBN"=>$_GET['id'],
        "Title"=>$_POST['hiddentitle'],
        "Copies"=>$_POST['hiddencopy'],
        "Quantity"=>$_POST['quantity'],
        "Price"=>$_POST['hiddenprice'],
        "Warehousecode"=>$_POST['hiddenwarecode']
    );
    $_SESSION['shoppingcart'][0]=$item;
    echo '<script>window.location="prevresnew.php"</script>';
  }
}


if(!isset($_SESSION['count'])){
 $_SESSION['count'] = 0;
 } 
 if(isset($_POST['cart'])){
 $count = $_SESSION['count'] + 1;
 $_SESSION['count'] = $count;
}
 
 
 
 


 

?>
