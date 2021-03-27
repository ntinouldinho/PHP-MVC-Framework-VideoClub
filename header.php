
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-black.css">
<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

<div class="w3-top">
 <div class="w3-bar w3-theme-d2 w3-left-align">
  <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-hover-white w3-theme-d2" href="javascript:void(0);" onclick="openNav()"><i class="fa fa-bars"></i></a>
  <a href="#" class="w3-bar-item w3-button w3-teal"><i class="fa fa-home w3-margin-right"></i>My Video Club</a>
  <a href="#work" class="w3-bar-item w3-button w3-hide-small w3-hover-white">What's New</a>
  <a href="#contact" class="w3-bar-item w3-button w3-hide-small w3-hover-white">Contact</a>
  <a href="#team" class="w3-bar-item w3-button w3-hide-small w3-hover-white">Team</a>
  <a href="logout.php" class="w3-bar-item w3-button w3-hide-small w3-hover-white">Logout</a>
  <?php if($_SESSION['type']==1){ ?>
    <a href="viewMovies" class="w3-bar-item w3-button w3-hide-small w3-hover-white">Manage Movies</a>
  <?php } ?>
  <?php if($_SESSION['type']==0){ ?>
    <a href="viewMovies.php" class="w3-bar-item w3-button w3-hide-small w3-hover-white fas fa-shopping-cart"></a>
  <?php } ?>
    <form class="form-inline mr-auto">
      <div class="md-form my-0">
        <input class="form-control" type="text" placeholder="Search" aria-label="Search">
        <i class="fas fa-search"></i>
      </div>
    </form>
  <!-- <a href="#" class="w3-bar-item w3-button w3-hide-small w3-right w3-hover-teal" title="Search"><i class="fa fa-search"></i></a> -->
 </div>

</div>