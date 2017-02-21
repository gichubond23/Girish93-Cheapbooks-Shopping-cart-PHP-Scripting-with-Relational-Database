<?php session_start(); ?>
<?php
if(isset($_SESSION['searchbytitle']))
{
foreach($_SESSION['searchbytitle'] as $value)
{
 echo $value['Title']; 
 echo $value['ISBN']; 
 echo $value['Number']; 	
}
}




?>