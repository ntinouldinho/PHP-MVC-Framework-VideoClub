

<!DOCTYPE html>
<html lang="gr">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  
  <title>Admin - Fragoulakis</title>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-black.css">
<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

</head>

<body id="page-top">

  <?php include 'header.php'; ?>
  
  <div id="wrapper">

    
    <div id="content-wrapper">
      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item active">Customers</li>
        </ol>
        
        <div class="row">
            <div class="col-md-12">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Title</th>
                      <th>Type</th>
                      <th>Price</th>
                      <th>Plot</th>
                      <th >Picture</th>
                      <th>Edit</th>
                      <th>Delete</th>
                  </tr>
                  </thead>

                  <tbody>
                    <?php
                    
                        foreach ($movies as $key => $value) {
                            echo '<tr>
                                    <td>'.$value['title'].'</td>
                                    <td>'.$value['type'].'</td>
                                    <td>'.$value['price'].'</td>
                                    <td>'.$value['plot'].'</td>
                                    <td><img src="pics/'.$value['picture'].'" width="100px" height="100px"></td>
                                    <td><a href="edit/'.$value['html_id'].'"><i class="fas fa-edit"></i></a></td>
                                    <td><a href="customer.php?id='.$value['id'].'"><i class="fas fa-times"></i></a></td>
                                  </tr>';
                        }
                    ?>
                  </tbody>
                </table>
              </div> 
            
            </div>
        </div>  
      
    
    </div>
      <!-- /.container-fluid -->

      <!-- Sticky Footer -->
      <footer class="sticky-footer">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright © ASPS AUEB 2019</span>
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
  
  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Page level plugin JavaScript-->
  <!-- <script src="vendor/chart.js/Chart.min.js"></script> -->
  <script src="vendor/datatables/jquery.dataTables.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/core.js"></script>

</body>

</html>
