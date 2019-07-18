<?php
session_start();
?>

<html>
<html>
<head>
 <link rel="stylesheet" type="text/css" href="style.css">
 <style>
  
  table, th, td {
    border: 0px solid black;
    color: black;
    text-align: center;
  }
  </style>
  
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

<div class="movsearch" style="text-align:center;"></div>
<form>
<input name="name" id="name" placeholder="enter movie id" style="width:400px;height:50px;text-align:center;color:white;background:grey;">
<button type="submit" name="submit" id="submit" class="searchbtn">submit</button>
</form>
</div><br>


<table id="info"></table>

</body>
<script>
var btn = document.getElementById('movie');
var info = document.getElementById('info');
var j=0;
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
  function printData(data){
    console.log("hello");
  var htmlstring="";
  htmlstring+= "<div class='img_wrap' style='margin-left:300px; border: 0px solid black;text-align:left;color:pink;'>";
  
  htmlstring+="<img src='"+ data.Poster +"' width='300px' height='400px'>";

      htmlstring +=  "<a href='liked.php?id="+data.imdbID+"&name="+data.Title+"&image="+data.Poster+"'>"+"<p class='img_description' style='color:grey;text-align:center;'><br><br><b>Tap to know ratings,plot and more<b></p>" + "</a>" + "<br>";
      htmlstring += "<div style='text-align:left color:'pink;' ><b style='color:grey;'>" + "MOVIE NAME:" + "</b>" + data.Title + "<br/><b style='color:grey;'>YEAR:</b>"+ data.Year +"<br/>"+"<b style='color:grey;'>imdbID:</b>"+ data.imdbID+ "</br>";
      htmlstring += "<b style='color:grey;'>" + "RATED:" + "</b>" + data.Rated + "<br/><b style='color:grey;'>DIRECTOR:</b>"+ data.Director +"<br/>"+"<b style='color:grey;'>ACTORS:</b>"+ data.Actors+ "</br></div>";  
  info.insertAdjacentHTML('beforeend', htmlstring);   
  }

  var moviename = $_GET('name');
    //console.log(moviename);

  window.onload =  function(){
    if(moviename!=null){
    var request = new XMLHttpRequest();
    request.open('GET', 'http://www.omdbapi.com/?apikey=d6f339fd&i='+ moviename +'');
    request.onload = function(){
        var ourdata = JSON.parse(request.responseText);
        console.log(ourdata);
      printData(ourdata);

    };
    request.send();
    }
    
};
</script>
</html>

 


