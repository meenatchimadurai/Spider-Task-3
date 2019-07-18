<?php
session_start();
include_once 'dbh.inc.php';
if(isset($_POST['submit'])){
$name = mysqli_real_escape_string($conn, $_POST['user']);
echo 'USERNAME:';
        echo $name;
        echo '<br>';
        echo '<br>';
        echo '<br>';
        echo "YOUR FRIEND";
        echo '  LIKES<br>';
$stmt = $conn->prepare("SELECT * FROM l WHERE user_uid='$name'");
$stmt->execute();
$stmt->bind_result($id, $movieid, $user, $moviename, $posadd, $pri);
while($stmt->fetch()){
    


    
    switch($pri){

        case 'public':
       
        
        

echo '<table style="width:300px; border:1px solid black">';
echo '<th><b>LIKED</b><br></th>';
echo '<tr>';

        echo '<td style="text-align:center;border:1px solid black">';
    echo  '<a href="liked.php?id='.$movieid.'&name='.$moviename.'&image='.$posadd.'">';
    echo "<img src= '".$posadd."' width=250px height=250px></a>";
    echo '<br/>';
    echo $moviename;
    echo '<br>';
    echo $user;
    echo "</td>";

echo '</tr>';
    

        break;

        case 'private': 
         echo '<script>alert("this account is private");</script>';
         
        break;
    }
}


    }
  
    



    

