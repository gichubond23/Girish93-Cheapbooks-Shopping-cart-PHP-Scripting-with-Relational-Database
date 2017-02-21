<!DOCTYPE html>
<body>
<form method="post" action="submit2.php">
Quantity (between 1 and 5):
  <input type="number" name="quantity" min="1" max="5">
 <input type="submit">
</form>
<?php
echo $_POST["quantity"];
?>
</body>
</html>