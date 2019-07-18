<html>

<head>
 <link rel="stylesheet" type="text/css" href="style.css">
<title>
MOVIE WISH
</title>
</head>
<body>
<header>
<nav>
   <section class="h">
<div class="main-wrapper">
<ul>
<li>
<form action="logout.inc.php" method="POST" >
       <button type="submit" name="submit" class="headerbtn">Logout</button>
   
       </form>
       </li>
       <li>&emsp;&emsp;&emsp;&emsp;</li>
    
<li><a href="page.php">Home</a></li>

<li>&emsp;&emsp;&emsp;&emsp;</li>



      <li><a href="profile.php">MyProfile</a></li>
      
<li>&emsp;&emsp;&emsp;&emsp;</li>
     <li><a href="friend.php">Find a friend </a></li>
     
<li>&emsp;&emsp;&emsp;&emsp;</li>
<li><a href="search.php">Search</a></li>

<li>&emsp;&emsp;&emsp;&emsp;</li>




</ul>

 
</div>
</section>
</nav>
</header>
<h1 style="color:pink;"><u>Privacy Settings<u></h1><br>
<form method="POST" action="likeprompt.php">
  <select name="quest" style="width:200px;background-color:grey;color: white; text-align:center;height:30px;">
 <option value="no">--Set Your Privacy--</option>
 <option value="public">public  </option>
 <option value="private"> private </option>
</select> 
<button type="submit" name="p" class="pribtn"> SET </button>
</form><br>

    
</body>

<?php
session_start();


include_once 'dbh.inc.php';
$username =  $_SESSION['u_uid'];
$email = $_SESSION['u_email'];
echo '<h1 style="color:pink;"><u>Handle</u></h1><br>';
echo '<div style="color:grey;"><h3><b>USER NAME&nbsp;&nbsp;:&nbsp;&nbsp;';
echo $username;
echo '</h3><h3>e-mail&nbsp;&nbsp;:&nbsp;&nbsp;';
echo $email;
echo'</h3><br><br>';

$stmt = $conn->prepare("SELECT * FROM l WHERE user_uid='$username' ORDER BY id DESC");
$stmt->execute();
$stmt->bind_result($id, $user, $movieid, $moviename, $add, $pri);


echo '<table style="width:200px; height:257px; border:1px solid black;">';
echo'<th style="color:pink;text-align:left;"><h1><u>Profile Movies</u></h1><br></th>';
echo '<tr>';
for($i=1;$i<5;$i++){
while($stmt->fetch()){
    echo '<td style="text-align:center;border:1px solid black">';
    echo '<div class="img_wrap">';
    echo "<img class='img_img' src= '".$add."' width=200px height=200px>";
    
    echo  '<a href="liked.php?id='.$user.'&name='.$moviename.'&image='.$add.'">';
    echo '<p class="img_description">';
    echo '<br><b>MOVIENAME:';
    
    echo $moviename;
    echo '<br>imdbID:';
    echo $user;
    echo '</b><br>Click to View</p></a>';
    echo '</div>';
    echo "</td>";
   
}

}

echo '</tr></table><br><br><hr size="0.5px" style="border: 0.5px solid grey"><br><br>';
/*if(isset($_GET['quest']) && isset($_GET['submit'])){
    include_once 'dbh.inc.php';
    $option=$_GET['quest'];
    
    switch($option){
        case 'public': 
        $sql = "UPDATE users SET privacy='$option' WHERE user_uid='$username'";
        mysqli_query($conn, $sql);
        break;
        case 'private': 
        $sql = "UPDATE users SET privacy='$option' WHERE user_uid='$username'";
        mysqli_query($conn, $sql);
    }
    }
    */
?>
</html>