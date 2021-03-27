<?php print_r($movie)?>
<!DOCTYPE html>
<html>
<title>My Video Club</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-black.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <style>body {
  background-repeat: no-repeat;
  background-attachment: fixed; 
  background-size: 100% 100%;
}
.center {
  background-color:#009688;
  margin: auto;
  margin-top:40px;
  width: 60%;
  border: 3px none #73AD21;
  padding: 10px;
  color:white;
}
.title{
background-color:#009688;
  border:2px black solid; font-size:42px;
 display: inline; 
  padding: 10px;
}
.td{
	margin: auto;
  margin-top:50px;
  width: 60%;
}</style>
<body id="myPage">

 <div class="td"><h1 class="title"><?php echo $movie['title'];?></h1></div>
  
 
 <div class="center"><h3>Type:</h3><p><?php echo $movie['type'];?> </p></div>
  <div class="center"><h3>Price:</h3><p><?php echo $movie['price'];?>$</p></div>
  <div class="center"><h3>Plot:</h3></div>
  <div class="center"><p> <?php echo $movie['plot'];?></div></div>
<script>
  document.body.style.backgroundImage = "url('pics/<?php echo $movie['picture']?>')";
// Script for side navigation
function w3_open() {
  var x = document.getElementById("mySidebar");
  x.style.width = "300px";
  x.style.paddingTop = "10%";
  x.style.display = "block";
}

// Close side navigation
function w3_close() {
  document.getElementById("mySidebar").style.display = "none";
}

// Used to toggle the menu on smaller screens when clicking on the menu button
function openNav() {
  var x = document.getElementById("navDemo");
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
  } else { 
    x.className = x.className.replace(" w3-show", "");
  }
}
</script>

</body>
</html>