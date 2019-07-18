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
<div class="search">
    <h2 style="color:pink;">Find Your Friends!!</h2>
    <form action="file.php" method="POST">
    <input type="text" name="user" placeholder="Enter User name of Friend" style="width:400px;height:50px;text-align:center;color:white;background:grey;">
    
    <button type="submit" name="submit" class="searchbtn">FIND</button>
    </form>
</div>
</body>

</html>