

<!DOCTYPE html>
<html lang="gr">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>Admin - Fragoulakis</title>
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

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="materials.php">Material</a>
          </li>
          <li class="breadcrumb-item active">Add Material</li>
        </ol>

        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-person"></i>
            Add Material</div>
          <div class="card-body">

            <div class="row">
                <div class="col-md-4 offset-md-2">

                    <div class="form-group">
                      <label for="name">Τίτλος ταινίας</label>
                      <input type="text" name="name" class="form-control">
                    </div>

                    <div class="form-group">
                      <label for="name">Κωδικός προϊόντος</label>
                      <input type="text" name="product_code" class="form-control">
                    </div>

                    <div class="form-group">
                        Εικόνα ταινίας: <input type="file" name="myFile"><br><br>

                    </div>

                    <div class="form-group">
                      <label for="name">Κατηγορία ταινίας</label>
                      <input type="text" name="product_code" class="form-control">
                    </div>

                  </div>

                  <div class="col-md-4">

                  <div class="form-group">
                  <label for="price_sell">Περίληψη</label>
                  <textarea id="price_sell" rows="13" cols="50">
Εδώ θα γραφτεί η περίληψη της ταινίας που θέλετε να προσθέσετε.
</textarea>
                    </div>




                  </div>

            </div>

            <div class="row">
              <div class="col-md-12">
                  <div class="form-group" style="text-align: center;">
                    <button type="button" class="btn btn-block btn-success store-material">ΕΙΣΑΓΩΓΗ</button>
                  </div>
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
            <span>Copyright © Fragoulakis.gr 2019</span>
          </div>
        </div>
      </footer>

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <!-- Sweetalert -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/core.js"></script>

  <script type="text/javascript">

    setInputFilter(document.getElementById("price_sell_input"), function(value) {
      return /^-?\d*[.,]?\d*$/.test(value);
    });

    setInputFilter(document.getElementById("price_buy_input"), function(value) {
      return /^-?\d*[.,]?\d*$/.test(value);
    });

    setInputFilter(document.getElementById("analogy"), function(value) {
      return /^-?\d*[.,]?\d*$/.test(value);
    });


    $.ajax({
      url: API_LOCATION+'category/getCategories.php',
      type: "GET",
      dataType: "json",
      success: function(data){
        if(data.length == 0){
          Swal.fire({
            type: 'error',
            title: 'Σφάλμα..',
            text: 'Οι κατηγορίες προϊόντων δεν μπόρεσαν να φορτωθούν από τη βάση'
          })
        }
        for (var i = 0; i < data.length; i++) {
          var category_select = document.getElementById('category_id');
          var option = document.createElement("option");
          option.text = data[i].name;
          option.value = data[i].id;
          category_select.add(option);
        }
      }
    })

    $.ajax({
      url: API_LOCATION+'measurement_unit/getMeasurementUnits.php',
      type: "GET",
      dataType: "json",
      success: function(data){
        if(data.length == 0){
          Swal.fire({
            type: 'error',
            title: 'Σφάλμα..',
            text: 'Οι μονάδες μέτρησης δεν μπόρεσαν να φορτωθούν από τη βάση'
          })
        }
        for (var i = 0; i < data.length; i++) {
          var unit_select = document.getElementById('measurement_unit');
          var option = document.createElement("option");
          option.text = data[i].name;
          option.value = data[i].id;
          unit_select.add(option);
        }
      }
    })
  </script>


</body>
</html>
