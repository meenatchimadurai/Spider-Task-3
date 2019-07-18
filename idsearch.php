<?php
session_start();
?>

<html>
<head>
 <link rel="stylesheet" type="text/css" href="style.css">
 <style>
  
table, th, td {
  border: 1px solid black;
  color: black;
  text-align: left;
}
.hide-me{
  display : none;
  visibility : none;
  
}
.show-me{
  visibility : visible;
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
 <div class='movsearch'>

<form>
<input name="name" id="name" placeholder="enter moviee name" style="width:400px;height:50px;text-align:center;color:white;background:grey;">
<button type="submit" name="submit" id="submit" class="searchbtn">submit</button><br><br>

</form>
</div>


<table id="info"></table>
<button type="submit" name="submit" id="movie" class="searchbtn">Load more results</button>

</body>
<script>
var btn = document.getElementById('movie');
var info = document.getElementById('info');
var alt = document.getElementById('movie');
var j=0;
var page=1;
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
  for(i=0;i<data.Search.length;i++){

    if(j==0){
     htmlstring+="<tr>" 
    }
    j++;
    htmlstring+= "<td>";
    htmlstring+= "<div class='img_wrap'>";
    htmlstring += "<img class= 'img_img' src='"+ data.Search[i].Poster +"' width='200px' height='200px'>";
      htmlstring +=  "<a href='liked.php?id="+data.Search[i].imdbID+"&name="+data.Search[i].Title+"&image="+data.Search[i].Poster+"'>"+ "<p class='img_description' style='color:grey; text-align:center;'>"  + "<br>";
   htmlstring += "<b>" + "MOVIE NAME:" + "</b>" + data.Search[i].Title + "<br/><b>YEAR:</b>"+ data.Search[i].Year +"<br/>"+"<b>imdbID:</b>"+ data.Search[i].imdbID+ "</br><b>Tap to view more</b></p></a>" ;
      
      if(j==5){
       htmlstring+="</tr>";
        j=0;
      }
  
  } 
  info.insertAdjacentHTML('beforeend', htmlstring);   
  }
  function doit(){
    var moviename = $_GET('name');
    if(page<5){
      btn.classList.remove("hide-me");
      btn.classList.add("show-me");
    }
    else{
      btn.classList.remove("show-me");
      btn.classList.add("hide-me");
    }

    if(moviename!=null){
    var request = new XMLHttpRequest();
    request.open('GET', 'http://www.omdbapi.com/?apikey=d6f339fd&s='+ moviename +'&page='+ page +'');
    request.onload = function(){
        var ourdata = JSON.parse(request.responseText);
        //console.log(ourdata);
      printData(ourdata);

    };
    request.onerror=function(){
            console.log("Connection error");
            alert("ERROR");
        };
        request.send();
        if(page>5){
            btn.classList.add("hide-me");
        }
        
        
      

    }
   
}
 doit();
  
    //console.log(moviename); 

  btn.addEventListener("click", function(){
    page++;
    doit();
  });
    
</script>
</html>

 