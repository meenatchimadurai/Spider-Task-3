
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

</ul>

 
</div>
</section>
</nav>
</header> 



        <div id='info'></div>
        
  
    </body>
   
</html>
<?php
session_start();

include_once 'dbh.inc.php';
$username =  $_SESSION['u_uid'];

$stmt = $conn->prepare("SELECT DISTINCT movieid, moviename, posadd  FROM w WHERE user_uid='$username' ORDER BY id DESC");
$stmt->execute();
$stmt->bind_result($movieid,  $moviename, $add);

echo '<table style="width:200px; height:257px; border:1px solid black;">';
echo'<th style="color:pink;"><h1><u>WATCHED</u></h1><br></th>';
echo '<tr>';

for($i=1;$i<5;$i++){
while($stmt->fetch()){
    
    echo '<td style="text-align:center;border:1px solid black">';
    echo '<div class="img_wrap">';
    
    echo "<img class='img_img' src= '".$add."' width=200px height=200px>";
    
    echo  '<a href="liked.php?id='.$movieid.'&name='.$moviename.'&image='.$add.'">';
    echo '<p class="img_description">';
    echo '<br><b>MOVIENAME:';
    echo $moviename;
    echo '<br>';
    echo '<br>imdbID:';
    echo $movieid;
    echo '</b><br>Click to View</p></a>';
    echo '</div>';
    echo "</td>";
    
   
}

}

echo '</tr></table><br><br><hr size="0.5px" style="border: 0.5px solid grey"><br><br>';
$stmt = $conn->prepare("SELECT * FROM wl WHERE user_uid='$username' ORDER BY id DESC");
$stmt->execute();
$stmt->bind_result($id, $user, $movieid, $moviename, $add);

echo '<table style="width:200px; height:257px; border:1px solid black;">';
echo'<th style="color:pink;"><h1><u>WATCH LATER</u></h1><br></th>';
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


$stmt = $conn->prepare("SELECT * FROM l WHERE user_uid='$username' ORDER BY id DESC");
$stmt->execute();
$stmt->bind_result($id, $user, $movieid, $moviename, $add, $pri);


echo '<table style="width:200px; height:257px; border:1px solid black;">';
echo'<th style="color:pink;"><h1><u>LIKED</u></h1><br></th>';
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



?>