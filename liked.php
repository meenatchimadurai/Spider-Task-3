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
<div id='src'></div>

<form method='POST'>
<button type='submit' name='like' class="searchbtn" style="background-color:orange; margin-left:330px;">like</button>
<button type='submit' name='watchlater' class="searchbtn" style="background-color:orange; margin-left:350px;">Watchlater</button>
</form>


<h2 style='color:pink'><u>COMMENTS</u></h2><br>

<form method='POST'>
<input type="text" placeholder='Add a Comment' name='comment' style="width:400px;height:50px;text-align:center;color:white;background:grey;">
<button type='submit' name='comm' class="searchbtn"> Add comment </button>

</body>

<script>
var info = document.getElementById('info');
var src=document.getElementById("src");
function $_GET(param) {
    var vars = {};
    window.location.href.replace( location.hash, '' ).replace( 
      /[?&]+([^=&]+)=?([^&]*)?/gi, // regexp
      function( m, key, value ) { // callback
        vars[key] = value !== undefined ? value : '';
      }
    );
  
    if ( param ) {
      return vars[param] ? vars[param] : null;  
    }
    return vars;
  }
  function renderDoc(data){
    console.log(data);
    var html="";

    html+="<p><iframe width='420' height='345' src='https://www.youtube.com/embed/"+ data.items[0].id.videoId +"'></iframe></p>";
    console.log(data.items[0].snippet.title);
    src.insertAdjacentHTML('beforeend',html);
}
  function printData(data){
    console.log("hello");
  var htmlstring="";

      htmlstring +=  "<table style='border: 2px solid grey;margin-left:200px;'><th><h1>" +data.Title+  "</h1></th><tr><td><img src='"+ data.Poster +"' width='400px' height='500px'>" + "<br></td><td>";
      htmlstring += "<b style='color:grey;'>" + "MOVIE NAME:" + "</b>" + data.Title + "<br><br/><b style='color:grey;'>YEAR:</b>"+ data.Year + "<br><br><b style='color:grey;'>" + "DIRECTOR:" + "</b>" + data.Director + "<br/><br><b style='color:grey;'>ACTORS:</b>"+ data.Actors;
      htmlstring += "<br><br><b style='color:grey;'>" + "PLOT:" + "</b>" + data.Plot + "<br><br/><b style='color:grey;'>imdbRATING:</b>"+ data.imdbRating + "<br><br><b style='color:grey;'>" + "BOXOFFICE:" + "</b>" + data.BoxOffice + "<br/><br><b style='color:grey;' >WEBSITE:</b>"+ data.Website;
      htmlstring+= "<br/></td></tr></table>";
       
  info.insertAdjacentHTML('beforeend', htmlstring);   
  }
  var id = $_GET('id');
    //console.log(moviename);
 
    var request = new XMLHttpRequest();
    var doc = new XMLHttpRequest();
    request.open('GET', 'http://www.omdbapi.com/?apikey=d6f339fd&i='+ id +'');
    doc.open('GET','https://www.googleapis.com/youtube/v3/search?q='+ id +'-trailer&order=relevance&part=snippet&type=video&maxResults=1&key=AIzaSyBwphg789ntL8W195s-KTTrRjnNKTO8PNk');

    request.onload = function(){
        var ourdata = JSON.parse(request.responseText);
       // console.log(ourdata);
      printData(ourdata);

    };
    doc.onload = function(){
        console.log("stepone");
        var ourData = JSON.parse(doc.responseText);
        console.log("step2");
        //var ourData=req.responseText;
       // console.log(ourData);
        renderDoc(ourData);
        console.log("step3");
    };
    request.onerror=function(){
        console.log("Connection error");
        alert("ERROR");
    };
    //doc.onerror=function(){
      //  console.log("Connectionnnnnnnnnnnerror");
        //alert("ERROR");
    //};
    request.send();
    doc.send();
    
    </script>
  

<?php
include_once 'dbh.inc.php';
session_start();
$username =  $_SESSION['u_uid'];
 $id = $_GET['id'];
 $moviename = $_GET['name'];
 $poster = $_GET['image'];
 
 $sql = "INSERT INTO w (movieid, user_uid, moviename, posadd) VALUES ('$id', '$username', '$moviename', '$poster');";
 mysqli_query($conn, $sql);

if(isset($_POST['like'])){
include_once 'dbh.inc.php';
$username =  $_SESSION['u_uid'];
 $id = $_GET['id'];
 $moviename = $_GET['name'];
 $poster = $_GET['image'];
 echo $id;
 $sql = "INSERT INTO l (movieid, user_uid, moviename, posadd) VALUES ('$id', '$username', '$moviename', '$poster');";
 mysqli_query($conn, $sql);
 echo '<script>alert("liked")</script>';


}
if(isset($_POST['watchlater'])){
  include_once 'dbh.inc.php';
  $username =  $_SESSION['u_uid'];
   $id = $_GET['id'];
   $moviename = $_GET['name'];
   $poster = $_GET['image'];
   echo $id;
   $sql = "INSERT INTO wl (movieid, user_uid, moviename, posadd) VALUES ('$id', '$username', '$moviename', '$poster');";
   mysqli_query($conn, $sql);
  }
  if(isset($_POST['comm'])){
    include_once 'dbh.inc.php';
    $username =  $_SESSION['u_uid'];
     $id = $_GET['id'];
     $comment = mysqli_real_escape_string($conn, $_POST['comment']);
  
     $sql = "INSERT INTO comment (movieid, user_uid, comment) VALUES ('$id', '$username', '$comment');";
     mysqli_query($conn, $sql);
    }
    $stmt = $conn->prepare("SELECT * FROM comment WHERE movieid='$id' ORDER BY id DESC");
$stmt->execute();
$stmt->bind_result($id, $movieid, $user, $time, $comment);
while($stmt->fetch()){

  if($comment!=null){
    echo '<b style="color:pink">';
  echo $user;
  echo '<br>';
  echo '@';
  echo $time;
  echo '</b><br><h3 style="color:grey">';
  echo $comment;
  echo '<br></h3>';
  }

   
}

 ?>

 
</html>