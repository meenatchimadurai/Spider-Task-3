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
    <h2 style="color:pink">Customise Your Search</h2>
<form>
<select name="quest" id="" style="width:400px;height:50px;text-align:center;color:white;background:grey;">
         <option value="no">How do you wanna search?</option>
         <option value="id"> ID </option>
         <option value="title"> Title </option>
     </select>  
     <button type="submit" name="submit" value="ok" id="btn" class="searchbtn" > SEARCH </button>
 </form> 
 <div>   
</body>
<?php
if(isset($_GET['quest']) && isset($_GET['submit'])){
    $option=$_GET['quest'];
    echo $option;
    switch($option){
        case 'id': header("Location: id.php");
        break;
        case 'title': header("Location: idsearch.php");
        break;
        case 'no': header("Location: page.php?error=notselected");
        
    }
    }
    ?>
</html>