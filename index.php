<?php
    session_start();

    $user = $_SESSION["user"];
    

    
  $menu = <<<END
   <div class="topnav">
    <a class="active" href="#home">Home</a>
    <a href="login.php">login</a>
    <a href="logout.php">logout</a>
    <a href="register.php">register</a>
    <a href="upload.php">upload</a>
</div>
END;
echo $menu;

echo "<h1> Welcome back $user</h1>";
?>