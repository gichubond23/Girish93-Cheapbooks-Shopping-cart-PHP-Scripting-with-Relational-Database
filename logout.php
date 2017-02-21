<?php 
session_start();
echo '<script>alert("Successfully logged out");</script>';
session_destroy();
echo '<script>window.location="login.php"</script>';
?>