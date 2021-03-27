
<!DOCTYPE html>
<html lang="gr">
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>Login - Fragoulakis</title>
  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
  <style type="text/css">
    .card-login {
      max-width: 35rem;
    }
    .card-header.login{
      background: #949494;
    }
    .btn-login{
      cursor: pointer;
      width: 50%;
      margin: auto;
      background-color: #e99a3c;
      color: #fff;
    }
    .btn-login:hover,.btn-login:active,.btn-login:visited{
      background-color: #e99a3c !important;
      color: #fff;
    }
    .login-results{
      text-align: center;
      display: none;
      margin:0;
      color: red;
    }
  </style>

</head>

<body class="bg-dark">

  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header login"><img height='25%' width='25%' src="img/ok.jpg" class="img-fluid"></div>
      <div class="card-body">
        <form>
          <div class="form-group">
            <div class="form-label-group">
              <input type="text" id="username" class="form-control" placeholder="Username" required="required" autofocus="autofocus">
              <label for="username">Username</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="password" id="password" class="form-control" placeholder="Password" required="required">
              <label for="password">Password</label>
            </div>
          </div>
          <button type="button" class="btn btn-primary btn-block btn-login">ΕΙΣΟΔΟΣ</button>
          <p class="login-results"></p>
        </form>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <!-- Custom js -->
  <script>
     $('#username, #password').keyup(function(event) {
        if (event.keyCode === 13) {
            $('.btn-login').click();
        }
    });

    $('.btn-login').click(function() {

        var json_array = {};
		json_array["username"] = $('#username').val();
		json_array["password"] = $('#password').val();
		
		if(json_array["username"] &&json_array["password"]){

			$.post("/asps/login", json_array, function(data, status){
        var obj=JSON.parse(data);
        console.log(obj);
				if(status == "success" && obj.status=="1"){
					$.post('session.php', obj, function() {
                console.log(obj);
                alert(obj);
                window.location.href ='http://localhost/asps/viewAllMovies';
          })
				}else{
          $('p.login-results').text('Το username ή το password δεν είναι σωστό.').show();
				}
      })
      
      
    }else{
      $('p.login-results').text('Το username ή το password δεν έχει συμπληρωθεί.').show();  
    }
    return;
    });
  </script>
</body>
</html>
