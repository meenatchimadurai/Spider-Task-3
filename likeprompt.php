
<?php
session_start();
$username =   $_SESSION['u_uid'];

include_once 'dbh.inc.php';
if(isset($_POST['p'])){
    $option=mysqli_real_escape_string($conn, $_POST['quest']);
    switch($option){
      case 'public': 
    
    $sql = "UPDATE l SET pri='$option' WHERE user_uid='$username'";
    mysqli_query($conn, $sql);
    echo '<script>alert("Your friends can see your Profile Videos");</script>';
    break;
  
    case 'private': 
    
    $sql = "UPDATE l SET pri='$option' WHERE user_uid='$username'";
    mysqli_query($conn, $sql);
    echo '<script>alert("Your friends cannot see your Profile Videos");</script>';
    break;
    }
  
   header("Location: profile.php?video added to likes");
  }
  
  
    