<?php
  include_once 'koneksi.php';
  session_start();

  if (!isset($_POST['name']) || !isset($_POST['phone']) || !isset($_POST['pencukur']) || !isset($_SESSION ['reloaded']) || $_SESSION['reloaded']) {
    # code...
    if (!isset($_SESSION['id'])) {
      header('location: login.php');
      exit;
    }


    header('location: book.php');
    exit;
  }

  $_SESSION['reloaded'] = true;

  $pencukur = $_POST['pencukur'];
  $name = $_POST['name'];
  $phone = $_POST['phone'];
  $user = $_SESSION['id'];
  // echo "Pencukur : $pencukur , Nama : $name , Phone : $phone , User : $user";

  $sql = "SELECT max(id_booking) AS maxid FROM tbl_booking";
  $result = $koneksi->query($sql);
  // Get ID
  $row = mysqli_fetch_assoc($result);
  // Booking ID
  $firstid = substr($row["maxid"], -3);
  $secondid = $firstid + 1;

  $bookid = str_pad($secondid, 5, "BK001", STR_PAD_LEFT); 

  $nextdate = date('Y-m-d', strtotime('+1 day', time()))." 8:00:00";

  if (date('H', time()) < 22
 || ( date('i', time()) < 30 && date('H', time()) == 21 )) { 
$sql = 'INSERT INTO tbl_booking(id_booking,nama_booking,phone,id_account,id_tukur)
 VALUES ("'.$bookid.'","'.$name.'","'.$phone.'",'.$user.',"'.$pencukur.'");';
} else { 
$sql = 'INSERT INTO tbl_booking(id_booking,tanggal_booking, nama_booking,phone,id_account,id_tukur) VALUES ("'.$bookid.'","'.$nextdate.'","'.$name.'","'.$phone.'",'.$user.',"'.$pencukur.'");';
 }
    
  if ($koneksi->query($sql) === TRUE) {
      echo "<script>alert('berhasil')</script>";
    }

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
    <link rel="icon" type="image/png" href="Login_v13/Login_v13/images/icons/kumis.png"/>

    <!-- Theme Style -->
    <link rel="stylesheet" href="css/style.css">
    <style type="text/css">
      .cbimg{
          object-fit: cover; /* Do not scale the image */
        object-position: center; /* Center the image within the element */
        width: 100%;
        max-height: 300px;
        margin-bottom: 1rem;
      }
    </style>
  </head>
  <body>
    
    <header role="banner">
     
      <nav class="navbar navbar-expand-md navbar-dark bg-light">
        <div class="container">
          <a class="navbar-brand" href="index1.html">H. Yusuf</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample05" aria-controls="navbarsExample05" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse navbar-light" id="navbarsExample05">
            <ul class="navbar-nav ml-auto pl-lg-5 pl-0">
              <li class="nav-item">
                <a class="nav-link" href="index1.html">Home</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="hairstyle.html" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Haircut</a>
                <div class="dropdown-menu" aria-labelledby="dropdown04">
                  <a class="dropdown-item" href="hairstyle.html">Crew Cut</a>
                  <a class="dropdown-item" href="hairstyle.html">Regular Hair Cut</a>
                  <a class="dropdown-item" href="hairstyle.html">Shampoo + Cut</a>
                  <a class="dropdown-item" href="hairstyle.html">Beard Trim with Razor</a>
                  <a class="dropdown-item" href="hairstyle.html">Hair Color</a>
                </div>
 
              </li>
              <li class="nav-item">
                <a class="nav-link " href="about.html">About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="book.php">Booking now</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="index.html">Logout</a>
              </li>
            </ul>
            
          </div>
        </div>
      </nav>
    </header>
    <!-- END header -->

    <section class="site-hero overlay" data-stellar-background-ratio="0.5" style="background-image: url(images/big_image_1.jpg);">
      <div class="container">
        <div class="row align-items-center site-hero-inner justify-content-center">
          <div class="col-md-8 text-center">

            <div class="mb-5 element-animate">
              <h1 class="mb-4">Receipt</h1>
              <p class="lead">See the Receipt below</p>
            </div>

          </div>
        </div>
      </div>
    </section>
    <!-- END section -->



    


   
 <section class="quick-info element-animate" data-animate-effect="fadeInLeft">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 bgcolor">
            <div class="row">
              <div class="col-md-4 mb-3">
                <div class="media">
                  <div class="mr-3 icon-wrap"><span class="icon ion-ios-telephone"></span></div>
                  <div class="media-body">
                    <h5>(+62) 234 5633 342</h5>
                    <p>Call us 24/7 we will get back to you ASAP</p>
                  </div>
                </div>
              </div>
              <div class="col-md-4 mb-3">
                <div class="media">
                  <div class="mr-3 icon-wrap"><span class="icon ion-location"></span></div>
                  <div class="media-body">
                    <h5>Jalan Kemandoran 8</h5>
                    <p>Kebayoran Lama, Jakarta Selatan, 12210 Indonesia</p>
                  </div>
                </div>
              </div>
              <div class="col-md-4 mb-3">
                <div class="media">
                  <div class="mr-3 icon-wrap"><span class="icon ion-android-time"></span></div>
                  <div class="media-body">
                    <h5>Daily: 8 am - 10 pm</h5>
                    <p>Sun-Thurs, Saturday <br> Friday: Closed</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- END section -->
    

    <section class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-md-12">

            <form action="#" method="post">

              <div class="row">
                <div class="col-md-12 form-group" >
                  <label>Booking ID</label>
                  <input type="text" class="form-control" value="<?= $bookid ?>"  readonly>
                </div>
              </div>


                  <div class="row">
                    <div class="col-md-6 form-group">
                      <label for="name">Name</label>
                      <input type="text" class="form-control" value="<?= $name ?>"  readonly>
                    </div>
                    <div class="col-md-6 form-group">
                      <label for="phone">Phone</label>
                      <input type="text" class="form-control" value="<?= $phone ?>"  readonly>
                    </div>
                  </div>
              <div class="row">
                <div class="col-md-12 form-group" >
                  <label>Tukur ID</label>
                  <input type="text" class="form-control" value="<?= $pencukur ?>"  readonly>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 form-group" >
                  <label>Day</label>
                  <input type="text" class="form-control" value="<?= (date('H', time()) < 22 || ( date('i', time()) < 30 && date('H', time()) == 22 ) ? date('d/m/Y', time()) : date('d/m/Y', strtotime('+1 day', time())) ) ; ?>"  readonly>
                </div>
                <div class="col-md-6 form-group">
                      <label for="phone">Time</label>
                      <input type="text" class="form-control" value="<?= (date('H', time()) < 22 || ( date('i', time()) < 30 && date('H', time()) == 22 ) ? date('h:i:s a', time()) : '8:00:00 am' ) ;?>"  readonly>
                    </div>
              </div>
              <div class="row">
                <div class="col-md-12 form-group" >
                  <label>Price</label>
                  <input type="text" class="form-control" value="Rp 112.500"  readonly>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12 form-group" >
                <label>Anda menghemat Rp 37,500‬</label>
                <input type="text" name="" class="form-control" value="Harga asli : Rp 150,000" readonly=""> 
              </div>
              </div>

<!--                   <div class="row">
                    <div class="col-md-12 form-group">
                      <label for="message">Write Message</label>
                      <textarea name="message" id="message" class="form-control " cols="30" rows="8"></textarea>
                    </div>
                  </div> -->
                </form>
          </div>
        </div>
      </div>
    </section>
    <!-- END section -->

    <section class="section-cover cta" data-stellar-background-ratio="0.5" style="background-image: url(images/big_image_2.jpg);">
      <div class="container">
        <div class="row justify-content-center align-items-center intro">
          <div class="col-md-8 text-center element-animate">
            <h2 class="mb-4"><span>Book on the website by choosing a crew</span> Get 25% discount</h2>
            <p><a href="book.php" class="btn btn-black">Book now</a></p>
          </div>
        </div>
      </div>
    </section>
    <!-- END section -->


    
    
   
    <footer class="site-footer">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md-4">
            <h3 class="mb-4">About</h3>
            <p class="mb-4">H. Yusuf is the name of a Betawi family. The barber was made by a subsidiary of Vocational Telkom Jakarta named OK Zahran Shidqie Abdi</p>
            <ul class="list-unstyled ">
              <li class="d-flex"><span class="mr-3"><span class="icon ion-ios-location"></span></span><span class="">Jalan Kemandoran 8, RT 007 RW 011, Kebayoran Lama, Jakarta Selatan, 12210 Indonesia</span></li>
              <li class="d-flex"><span class="mr-3"><span class="icon ion-ios-telephone"></span></span><span class="">(+62) 242 4942 290</span></li>
              <li class="d-flex"><span class="mr-3"><span class="icon ion-email"></span></span><span class="">barberhjyusuf@gmail.com</span></li>
            </ul>
          </div>
          <div class="col-md-2">
            <h3 class="mb-4">Links</h3>
            <ul class="list-unstyled ">
              <li><a href="about1.html">About</a></li>
              <li><a href="hairstyle1.html">Hairstyle</a></li>
            </ul>
          </div>
          <div class="col-md-3">
            <h3 class="mb-4">Latest Blog</h3>
            <ul class="list-unstyled blog-entry-footer">
              <li>
                <span class="post-meta">March 20, 2018</span>
                <h3>7 Best Destination in The World</h3></a>
              </li>
              <li>
                <span class="post-meta">March 20, 2018</span>
                <h3>4 Hour Work Week And The Rest Is Travel</h3></a>
              </li>
              <li>
                <span class="post-meta">March 20, 2018</span>
                <h3>Why You Should Travel Today</h3></a>
              </li>
            </ul>
          </div>
          <div class="col-md-3">
            <h3>Connect</h3>
            <p>
              <a href="https://www.facebook.com/nabeel.rasyid.3/" target="blank" class="p-2"><span class="fa fa-facebook"></span></a>
              <a href="https://twitter.com/zackyzhrn_" target="blank" class="p-2"><span class="fa fa-twitter"></span></a>
              <a href="https://www.instagram.com/zackyzhrn_/" target="blank" class="p-2"><span class="fa fa-instagram">
            </p>
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-md-7 text-center">
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="#">OK Zahran Shidqie Abdi</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
          </div>
        </div>
      </div>
    </footer>
    <!-- END footer -->
    
    <!-- loader -->
    <div id="loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#f4b214"/></svg></div>

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