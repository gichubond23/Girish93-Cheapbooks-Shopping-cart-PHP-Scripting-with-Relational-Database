<?php
session_start();
?>
<html>
    <head></head>
    <body>
        <form method="post" action="submit.php">
            <input type="submit" name="count" value="Start counting" />
        </form>
        <?php
        
            if(!($_SESSION['count'])){
                $_SESSION['count'] = 0;
            }
                if(isset($_POST['count'])){
                $count = $_SESSION['count'] + 2;
                $_SESSION['count'] = $count;
            }
        
        echo $_SESSION['count'];
        ?>
    </body>
</html>