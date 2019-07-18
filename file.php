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
</body>
<?php
session_start();
include_once 'dbh.inc.php';
if(isset($_POST['submit'])){
$name = mysqli_real_escape_string($conn, $_POST['user']);
echo '<h1 style="color:pink;"><u>Handle</u></h1><br>';
echo '<div style="color:grey;"><h3><b>USER NAME&nbsp;&nbsp;:&nbsp;&nbsp;';
echo $name;

 echo '  LIKES<br>';
$stmt = $conn->prepare("SELECT * FROM l WHERE user_uid='$name'");
$stmt->execute();
$stmt->bind_result($id, $movieid, $user, $moviename, $posadd, $pri);
while($stmt->fetch()){
    


    
    switch($pri){

        case 'public':
       
        echo '<table style="width:200px; height:257px; border:1px solid black;">';
echo'<th style="color:pink;text-align:left;"><h1><u>Profile Movies</u></h1><br></th>';
echo '<tr>';
for($i=1;$i<5;$i++){
while($stmt->fetch()){
    echo '<td style="text-align:center;border:1px solid black">';
    echo '<div class="img_wrap">';
    echo "<img class='img_img' src= '".$posadd."' width=200px height=200px>";
    
    echo  '<a href="liked.php?id='.$movieid.'&name='.$moviename.'&image='.$posadd.'">';
    echo '<p class="img_description">';
    echo '<br><b>MOVIENAME:';
    
    echo $moviename;
    echo '<br>imdbID:';
    echo $movieid;
    echo '</b><br>Click to View</p></a>';
    echo '</div>';
    echo "</td>";
   
}

}

echo '</tr></table><br><br><hr size="0.5px" style="border: 0.5px solid grey"><br><br>';
    

        break;

        case 'private': 
         echo '<script>alert("this account is private");</script>';
         
        break;
    }
}


    }
  ?>
  </html>
    



    

