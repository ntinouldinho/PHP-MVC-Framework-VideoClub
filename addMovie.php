<?php
  include 'session.php';
  if ( !$_SESSION['loggedin'] ){
    header('Location: index.php');
  }
  include 'header.php';
?>

<!DOCTYPE html>
<html lang="gr">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>Edit Movie</title>
  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
  <!-- Custom style -->
  <link href="css/style.css" rel="stylesheet">

</head>

<body id="page-top">

  <div id="wrapper">

    <div id="content-wrapper">
      <div class="container-fluid">


        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-person"></i>
            Add Movie</div>
          <div class="card-body">

            <div class="row">
                <div class="col-md-4 offset-md-2">

                    <div class="form-group">
                      <label for="name">Title *</label>
                      <input type="text" name="name" class="form-control">
                    </div>

                    <div class="form-group">
                      <label for="price">Price</label>
                      <input id="price_input" type="text" name="price" class="form-control">
                    </div>

                    <div class="form-group">
                      <label for="summary">Summary</label>
                      <input id="summary_input" type="text" name="summary" class="form-control">
                    </div>

                  </div>

                  <div class="col-md-4">

                  <div class="form-group">
                      <label for="type">Type</label>
                      <input id="type_input" type="text" name="type" class="form-control">
                    </div>

                    <div class="form-group">
                      <label for="picture">Movie Image</label>
                      <input id="picture_input" type="text" name="picture" class="form-control">
                    </div>

                  </div>
            </div>

               <div class="row">
                 <div class="col-md-12">
                   <button type="button" class="btn btn-block btn-success edit-material">ΠΡΟΣΘΗΚΗ</button>
                 </div>
               </div>



          </div>
        </div>

      </div>
      <!-- /.container-fluid -->

      <!-- Sticky Footer -->
      <footer class="sticky-footer">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright ©  ASPS AUEB 2019</span>
          </div>
        </div>
      </footer>

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->




  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
   <!-- Sweetalert -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>



  <script type="text/javascript">


    $('button.edit-material').click(function(){
      var movie = {};
      movie.title = $.trim($('input[name="name"]').val());
      movie.price = $.trim($('input[name="price"]').val());
      movie.plot = $.trim($('input[name="summary"]').val());
      movie.type =$.trim($('input[name="type"]').val());
      movie.picture = $.trim($('input[name="picture"]').val());

        $.ajax({
            url: 'http://localhost/asps/webservices/movies/addMovie.php',
            data: movie,
            type: "POST",
            dataType: "json",
            success: function(data){
              if (data.status == 1){
                Swal.fire({
                  type: 'success',
                  title: 'Επιτυχία',
                  text: 'Το προιον αποθηκεύθηκε'
                })
              }else if(data.status == 0){
                Swal.fire({
                  type: 'success',
                  title: 'Επιτυχία',
                  text: 'Η αλλαγή έχει γίνει ήδη!'
                })
              }else{
                Swal.fire({
                  type: 'warning',
                  title: 'Κατι πήγε στραβά',
                  text: 'Για καποιο ανεξήγητο λόγο δεν μπόρεί να αλλάξει'
                })
              }
            }
          })



    })
  </script>

</body>

</html>
