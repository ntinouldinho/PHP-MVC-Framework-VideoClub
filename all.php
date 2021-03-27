

<?php
  // session_start();
  include 'session.php';
  if ( !$_SESSION['loggedin'] ){
    header('Location: index.php');
  }
  include 'header.php';
?>
<!DOCTYPE html>
<html lang="gr">
<title>My Video Club</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body{
font-style: oblique;
}
.movie:link{
color: white;
}
.movie:hover {
  color: black;
  background-color: transparent;
  text-decoration: none;
}
</style>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-black.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<body id="myPage">

<!-- Image Header -->
<div class="w3-display-container w3-animate-opacity">
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <?php 
            for($i = 0; $i < count($carousel); $i++){
              $str='<li data-target="#myCarousel" data-slide-to="'.$i.'" ';
              if($i==0){$str.=' class="active" '; }
              $str.='></li>';
              echo $str;
            }
        ?>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
	<div class="item active">
	  <div><a id="avengers" class="movie">
        <img src="pics/avenger.jpg" style="width:100%;height:700px;">
		<div class="carousel-caption d-none d-md-block" style="margin-left:400px;padding-bottom:250px;">
			<h1>Avengers: The end game</h1>
			<p>"I STILL BELIEVE IN HEROES"</p>
		</div>
		</a>
		</div>
      </div>
      <div class="item">
	  <div><a id="joker" class="movie">
        <img src="pics/joker3.jpg" style="width:100%;height:700px;">
		<div class="carousel-caption d-none d-md-block" style="margin-left:400px;padding-bottom:250px;">
			<h1>JOKER</h1>
			<p>"IS IT JUST ME OR IS IT GETTING CRAZIER OUT THERE?"</p>
		</div>
		</a>
		</div>
      </div>

      <div class="item">
	  <div><a id="lucky" class="movie">
        <img src="pics/theluckyone2.jpg" style="width:100%;height:700px;">
      <div class="carousel-caption d-none d-md-block" >
			<h1>The Lucky One</h1>
			<p>"HE WAS THE TOAST TO HER BUTTER."</p>
		</div>
		</a>
		</div>
      </div>
    

      <?php 
          for($i = 0; $i < count($carousel); $i++){
            echo '<div class="item"> <div><a id="'.$carousel[$i]['html_id'].'" class="movie">
                  <img src="pics/'.$carousel[$i]['picture'].'" style="width:100%;height:700px;">
                  <div class="carousel-caption d-none d-md-block" >
			              <h1>'.$carousel[$i]['title'].'</h1>
                    <p>'.$carousel[$i]['catchphrase'].'</p> </div> </a> </div> </div>';
          
          }
      ?>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>


</div>





<!-- Work Row -->
<div class="w3-row-padding w3-padding-64 w3-theme-l1" id="work">

<div class="w3-quarter">
<h2>What's New?</h2>
<h3>Top movies out right now!</h3>
</div>

<?php 
          for($i = 0; $i < count($newMovies); $i++){
            echo '<div class="w3-quarter" >
            <div class="w3-card w3-white">
              <a id="'.$newMovies[$i]['html_id'].'"class="movie"><img src="pics/'.$newMovies[$i]['picture'].'" style="width:100%;height:200px;" ></a>
              <div class="w3-container" style="background-color: #009688; color:white;">
              <h2>'.$newMovies[$i]['title'].'</h2>
              <h4>'.$newMovies[$i]['type'].'</h4>
              <p>'.$newMovies[$i]['plot'].'</p>
              </div>
              </div>
            </div>';
          }
?>



</div>



<!-- Contact Container -->
<div class="w3-container w3-padding-64 w3-theme-l5" id="contact">
  <div class="w3-row">
    <div class="w3-col m5">
    <div class="w3-padding-16"><span class="w3-xlarge w3-border-teal w3-bottombar">Contact Us</span></div>
      <h3>Address</h3>
      <p><i class="fa fa-map-marker w3-text-teal w3-xlarge"></i>&nbsp;&nbsp;76 Patission street, Athens, Greece</p>
      <p><i class="fa fa-phone w3-text-teal w3-xlarge"></i>&nbsp;&nbsp;21 0820 3911</p>
      <p><i class="fa fa-envelope-o w3-text-teal w3-xlarge"></i>&nbsp;&nbsp; webmaster@aueb.gr</p>
    </div>
    <div class="w3-col m7">
      <form class="w3-container w3-card-4 w3-padding-16 w3-white" action="/action_page.php" target="_blank">
      <div class="w3-section">      
        <label>Name</label>
        <input class="w3-input" type="text" name="Name" required>
      </div>
      <div class="w3-section">      
        <label>Email</label>
        <input class="w3-input" type="text" name="Email" required>
      </div>
      <div class="w3-section">      
        <label>Message</label>
        <input class="w3-input" type="text" name="Message" required>
      </div>  
      <input class="w3-check" type="checkbox" checked name="Like">
      <label>I Like it!</label>
      <button type="submit" class="w3-button w3-right w3-theme">Send</button>
      </form>
    </div>
  </div>
</div>

<!-- Image of location/map -->
<img src="pics/popcorn.webp" class="w3-image w3-greyscale-min" style="width:100%;">
<!-- Team Container -->
<div class="w3-container w3-padding-64 w3-center" id="team">
<h2>OUR TEAM</h2>
<p>Meet the team - our office rats:</p>

<div class="w3-row"><br>

<div class="w3-quarter" style='margin-left:350px'>
  <img src="pics/xrisa.jpg" alt="Boss" style="width:45%" class="w3-circle w3-hover-opacity">
  <h3>Chrysa Dikonimaki</h3>
  <p>Web Designer</p>
</div>

<div class="w3-quarter">
  <img src="pics/kon.jpg" alt="Boss" style="width:45%" class="w3-circle w3-hover-opacity">
  <h3>Konstantinos Konstantopoulos</h3>
  <p>Programmer</p>
</div>


</div>
</div>

<!-- Footer -->
<footer class="w3-container w3-padding-32 w3-theme-d1 w3-center">
  <h4>Follow Us</h4>
  <a class="w3-button w3-large w3-teal" href="javascript:void(0)" title="Facebook"><i class="fa fa-facebook"></i></a>
  <a class="w3-button w3-large w3-teal" href="javascript:void(0)" title="Twitter"><i class="fa fa-twitter"></i></a>
  <a class="w3-button w3-large w3-teal" href="javascript:void(0)" title="Google +"><i class="fa fa-google-plus"></i></a>
  <a class="w3-button w3-large w3-teal" href="javascript:void(0)" title="Google +"><i class="fa fa-instagram"></i></a>
  <a class="w3-button w3-large w3-teal w3-hide-small" href="javascript:void(0)" title="Linkedin"><i class="fa fa-linkedin"></i></a>
  
</footer>

<script>
console.log('<?php echo $_SESSION['loggedin'] ?>');
$('.movie').click(function(){
    window.location.href = "movieDetails/"+$(this).attr('id');
});
</script>

</body>
</html>