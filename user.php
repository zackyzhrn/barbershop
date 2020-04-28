<?php
  include_once 'koneksi.php';
  $query = 'select * from tbl_account;';

?>
<!doctype html>
<html lang="en">
  <head>
    <title>H. Yusuf Barber Shop</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700" rel="stylesheet"> 

    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="fonts/ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="fonts/fontawesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
    <link rel="icon" type="image/png" href="Login_v13/Login_v13/images/icons/favicon.ico"/>

    <!-- Theme Style -->
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    
    <header role="banner">
     
      <nav class="navbar navbar-expand-md navbar-dark bg-light">
        <div class="container">
          <a class="navbar-brand" href="halaman.php">H. Yusuf</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample05" aria-controls="navbarsExample05" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse navbar-light" id="navbarsExample05">
            <ul class="navbar-nav ml-auto pl-lg-5 pl-0">
              <li class="nav-item">
                <a class="nav-link" href="halaman.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="admin.php">Data Booking</a>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="user.php">Data User</a>
              </li>
              <li class="nav-item">
                <a class="nav-link"href="index.html">Logout</a>
              </li>
            </ul>
            
          </div>
        </div>
      </nav>
    </header>
    <!-- END header -->

    <section class="site-section" data-animate-effect="fadeInLeft" style="background-image: url(images/big_image_1.jpg);">
      <div class="container">
        <div class="row align-items-center site-hero-inner justify-content-center text-center">
          <table class="table table-dark table-striped mt-5">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Username</th>
                  <th>Password</th>
                  <th>Email</th>
                  <th>Alamat</th>
                  <th>Level</th>
                </tr>
              </thead>
              <tbody>
                <?php
                if ($result = $koneksi->query($query)) {
                  $i = 0;
            while ($row = $result->fetch_assoc()) {
                $fieldnama = $row["username_account"];
                $fieldemail = $row["email_account"];
                $fieldpassword = $row["password_account"];
                $fieldalamat = $row["alamat_account"];
                $fieldlevel = $row["level"];

                $i= ($i+1);
                echo '      
                  <tr>
                     <td>'.$i.'</td>
                     <td>'.$fieldnama.'</td>
                     <td>'.$fieldpassword.'</td>
                     <td>'.$fieldemail.'</td>
                     <td>'.$fieldalamat.'</td>
                     <td>'.$fieldlevel.'</td>
                  </tr> ';
        }
 
/*freeresultset*/
$result->free();    
}

                ?>
              </tbody>
            </table>
          <div class="col-md-8 text-center">

          </div>
        </div>
      </div>
    </section>
    <!-- END section -->

    
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/jquery-migrate-3.0.0.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/jquery.stellar.min.js"></script>

    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/magnific-popup-options.js"></script>

    <script src="js/main.js"></script>
  </body>
</html>
