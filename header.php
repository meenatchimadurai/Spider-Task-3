<?php
session_start();
?>


<!DOCTYPE html>
<html>
<head>
 <link rel="stylesheet" type="text/css" href="style.css">
<title>
MOVIE WISH
</title>
</head>
<body >
<header>
<nav>
<div class="main-wrapper">
<ul>
<li><a href="index.php">Home</a></li>
</ul>
<div class="nav-login">
    <?php
    if(isset($_SESSION['u_id'])){
       echo ' <form action="logout.inc.php" method="POST" >
       <button type="submit" name="submit">Logout</button>
   
       </form>';
       echo "You are logged in";
    }else{
        echo '<form action="login.inc.php" method="POST">
        <input type="text" name="uid" placeholder="Username/e-mail">
        <input type="password" name="pwd" placeholder="password">
        <button type="submit" name="submit">login</button>
        </form>
        <a href="signup.php">signup</a>';
    }
    ?>
   

</div>
</div>
</nav>
</header>
