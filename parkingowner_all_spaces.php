<?php 
session_start();
$email = $_SESSION['email'];

$dbcon = new PDO("mysql:host=localhost:3306;dbname=carparking;","root","");
$dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$query="SELECT * FROM carowner WHERE email='$email'";

$returnval=$dbcon->query($query);
$info = $returnval->fetchAll();

foreach ($info as $row){
    $_SESSION['id'] = $row['id'];
}
$ownerid = $_SESSION['id'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- fonts -->

    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Chakra+Petch:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="img/logo.png" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <!-- bootstrap cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <!-- font awsome cdn  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer"
    />
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js" crossorigin="anonymous"></script>
    <!-- custom css -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
    <title>GarirBari</title>
</head>

<body>
    <!-- animations -->
    <header class="header">
        <nav class=" fixed-top ">
            <div class="container">
                <div class="wrapper d-flex align-items-center justify-content-between">
                <a href="index.html" class="logo cursor-pointer d-flex align-items-center mb-0 mb-md-3">
                        <img style="width:100px; height: 50px;margin-left: -10px;" src="img/carlogo.png" alt="">
                        <span class="mt-2 text-uppercase">Garir Bari</span>
                    </a>
                    <input type="radio" name="slide" id="menu-btn">
                    <input type="radio" name="slide" id="cancel-btn">
                    <ul class="nav-links">
                        <ul class="nav-links">
                            <label for="cancel-btn" class="btn cancel-btn"> <i class="fas fa-times"></i>
                                        </label>
                                        
                                        <li><a href="addparkingspace.html">Add Parking Space</a></li>
                          
                            <li><a href="" class="desktop-item">Profile
                                                    <i class="fas fa-chevron-down" id="arrowDown"
                                                          style=" font-size: 18px;"></i>
                                              </a>
                                <input type="checkbox" id="showMega">
                                <label for="showMega" class="mobile-item">Profile
                                                    <i class="fas fa-chevron-down" style=" font-size: 18px;"></i>
                                              </label>
                                <div class="mega-box">
                                    <div class="content">
                                       
                                       
                                            <ul class="mega-links">
                                                <li><a href="website.html">View</a></li>
                                                <li><a href="wordpress.html">Change Profile</a></li>
                                            </ul>
                                       
                                       
                                    </div>
                                </div>
                            </li>
                            <li><a href="about.html">Logout</a></li>
                        </ul>

                    
                     
                        
                       
                    </ul>
                    <label for="menu-btn" class="btn menu-btn"> <i class="fas fa-bars"></i> </label>
                </div>
            </div>
        </nav>
    </header>

		
				
    <section class="blogs" id="blogs">
      <p class=" container font-weight-bold fs-2">Your Parking Spaces</p>
      <div class="d-flex justify-content-around flex-wrap">
        <?php
          $query1="SELECT * FROM parkingspace WHERE ownerid = '$ownerid' ORDER BY area ASC";

          $returnval1=$dbcon->query($query1);
          $info1 = $returnval1->fetchAll();
          $no = 1;
          foreach($info1 as $row1){
              $district = $row1['district'];
              $area = $row1['area'];
              $road1 = $row1['road1'];
              $road2 = $row1['road2'];
              $house = $row1['house'];
              $spacenum = $row1['spacenum'];
              $rent = $row1['rent'];
              $img = $row1['img'];
              if($img == ""){
                $img = "img/parking/default.jpeg";
              }
              
              ?>

        <div class="box p-3 m-2">
            <div class="image">
              <img src="<?php echo $img;?>" class="w-100 h-100 img-thumbnail" alt="Image not found" />
            </div>
            <div class="content p-2 text-center">
              <h3><?php echo $area;?></h3>
  
              <p class=""><?php echo "House: ",$house, ", Road: ", $road1, $road2, ", ",$area, ", ", $district;?></p>
  
              <a style="margin-top: 40px" href=""><?php echo $rent, ' Taka/Hour';?></a>
              <a href = "updateparkingspace.php?id=<?php echo $row1['id'] ?>" class="link-btn font-weight-bold">Edit</a>
            </div>
          </div>
          <?php
            $no = $no+1;
            }
          ?>
      </div>
    </section>	

    <section class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-12 col-sm-12">
                    <h4 class="text-center text-uppercase">services Provide</h4>
                    <a class="text-center text-capitalize text-decoration-none" href="">
                        <p>website Design </p>
                    </a>
                    <a class="text-center text-capitalize text-decoration-none" href="">
                        <p>Wordpress Development</p>
                    </a>
                    <a class="text-center text-capitalize text-decoration-none" href="">
                        <p>Mobile App Development</p>
                    </a>
                    <a class="text-center text-capitalize text-decoration-none" href="">
                        <p>Graphic design</p>
                    </a>
                    <a class="text-center text-capitalize text-decoration-none" href="">
                        <p>Seo Optimization</p>
                    </a>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12">
                    <h4 class="text-center text-uppercase">company</h4>
                    <a class="text-center text-capitalize text-decoration-none" href="">
                        <p>about us </p>
                    </a>
                    <a class="text-center text-capitalize text-decoration-none" href="">
                        <p>How it works </p>
                    </a>
                    <a class="text-center text-capitalize text-decoration-none" href="">
                        <p>packages </p>
                    </a>
                    <a class="text-center text-capitalize text-decoration-none" href="">
                        <p>Graphic design </p>
                    </a>
                    <a class="text-center text-capitalize text-decoration-none" href="">
                        <p>Seo Optimization </p>
                    </a>

                </div>
                <div class="col-lg-4 col-md-12 col-sm-12">
                    <h4 class="text-center text-uppercase">about</h4>
                    <a class="text-center text-capitalize text-decoration-none" href="">
                        <p>sajib405cse@gmail.com</p>
                    </a>
                    <a class="text-center text-capitalize text-decoration-none" href="">
                        <p>Address : Dhaka , United City , Madani Avenue</p>
                    </a>
                    <a class="text-center text-capitalize text-decoration-none" href="">
                        <p>Dhaka 1212 </p>
                    </a>
                    <h4 class="text-center text-uppercase">Follow Us</h4>
                    <div class="text-center p-2">
                        <a href=""> <i class="fab fa-facebook"></i></a>
                        <a href=""> <i class="fab fa-instagram"></i></a>
                        <a href=""> <i class="fab fa-dribbble"></i></a>
                        <a href=""> <i class="fab fa-twitter"></i></a>

                    </div>

                </div>
            </div>
            <hr>

            <div class="row">
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <h4 class="text-start text-uppercase mt-5">we accept</h4>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 text-end">
                    <img class="img-fluid" style="width: 100px; height: 100px; margin-top: 10px; padding-right:10px" src="img/bekash.png" alt="">
                    <img class="img-fluid" style="width: 100px; height: 100px; margin-top: 10px; padding-right:10px" src="img/nogod.png" alt="">
                    <img class="img-fluid" style="width: 100px; height: 100px; margin-top: 10px; padding-right:10px" src="img/payonner.png" alt="">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-12 col-xl-6 col-xxl-6 col-sm-12 text-secondary row d-flex align-self-end">
                    <p>all @copyright reserved to GarirBarigit</p>
                </div>
                <div class="col-lg-6 col-md-12 col-xl-6 col-xxl-6 col-sm-12 text-secondary text-end">
                    <p>made by <a class="text-capitalize text-decoration-none" href="https://www.facebook.com/rownokmahbub/">Mehbubur Rahman Rownok</a> </p>
                </div>
            </div>
        </div>

    </section>

    <!-- bootstrap js -->


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

    <!-- custom js -->
    <script src="style.js"></script>

</body>

>>>>>>> main
</html>