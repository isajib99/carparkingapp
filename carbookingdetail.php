<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bree+Serif&display=swap" rel="stylesheet">
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
    <style>
        body{
            font-family: 'Bree Serif', serif;
        }
        .blogs{
          
      margin-top: 0px;
      background: linear-gradient(to top,rgb(245, 255, 252),#e7f3ea);
}
        .bg-gd{
            background: linear-gradient(to right, #fbc2eb 0%, #a6c1ee 51%, #fbc2eb 100%);
        }
     
        .link-btn {

  padding: 10px 20px;
  text-align: center;
  text-transform: uppercase;
  transition: 0.5s;
  background-size: 200% auto;
  color: white;
 /* text-shadow: 0px 0px 10px rgba(0,0,0,0.2);*/
  box-shadow: 0 0 20px #eee;
  border-radius: 15px;
  background-image: linear-gradient(to right, #f6d365 0%, #fda085 51%, #f6d365 100%);
  text-decoration: none;
 }

 .link-btn:hover {
  background-position: right center;
  color: black; /* change the direction of the change here */
}


    </style>
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

<?php
    $bid = $_GET['bid'];

    $dbcon = new PDO("mysql:host=localhost:3306;dbname=carparking;","root","");
    $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    $query1="SELECT * FROM bookingdetail WHERE bid = '$bid'";

    $returnval1=$dbcon->query($query1);
    $info1 = $returnval1->fetchAll();

    foreach($info1 as $row1){
        $parkingid = $row1['parkingid'];
        $carno = $row1['corno'];
        $bookingtime = $row1['bookingtime'];
        $checkin = $row1['checkin'];
        $checkintime = $row1['checkintime'];
        $checkout = $row1['checkout'];
        $checkouttime = $row1['checkouttime'];
        $bill = $row1['bill'];
        $paid = $row1['paid'];

        ?>
        <script>
            var ajax = new XMLHttpRequest();
            ajax.open("GET", "carbookingdetail_ajax.php?parkingid=<?php echo $parkingid;?>", true);
            ajax.send();
        
            ajax.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    var data = JSON.parse(this.responseText);
                    console.log(data);
                    var img = '<img class="w-100  text-center ratio ratio-1x1" style="margin-bottom: 10px;" src="';
                    for(var a = 0; a < data.length; a++) {
                        var area = data[a].area;
                        document.getElementById("area").innerHTML = area;
                        var road1 = data[a].road1;
                        var road2 = data[a].road2;
                        var house = data[a].house;
                        var spacenum = data[a].spacenum;
                        var spaceused = data[a].spaceused;
                        var spaceleft = spacenum - spaceused;
                        document.getElementById("spaceleft").innerHTML = spaceleft;
                        var rent = data[a].rent;
                        document.getElementById("rent").innerHTML = rent;
                        var img = img + data[a].img + '" alt="">';
                        document.getElementById("img").innerHTML = img;
                        
                    }
                    
                }
            };
        </script>
        <?php
    }
?>	
				
    <section class="blogs" id="blogs">
    <p class=" container font-weight-bold fs-4 text-center">Booking Details</p>
      <div class=" container col-4 flex justify-content-center align-items-center mx-auto border-secondary p-4 rounded-3 shadow-lg">
      <div id = "img"></div>
        <div class="row flex justify-content-center align-items-center">
            <div class="col-6 bg-gd border-right-1 border border-2 ">
                <h4>Area</h4>
            </div>
            <div class="col-6 bg-gd border-right-1 border border-2 ">
                <h4 id="area"></h4>
            </div>
        </div>

        <div class="row flex justify-content-center align-items-center">
            <div class="col-6 bg-gd border-right-1 border border-2 ">
                <h4>Rent</h4>
            </div>
            <div class="col-6 bg-gd border-right-1 border border-2 ">
                <h4 id="rent"></h4>
            </div>
        </div>

        <div class="row flex justify-content-center align-items-center">
            <div class="col-6 bg-gd border-right-1 border border-2 ">
                <h4>Available Spaces</h4>
            </div>
            <div class="col-6 bg-gd border-right-1 border border-2 ">
                <h4 id="spaceleft"></h4>
            </div>
        </div>
        
        <div class="row flex justify-content-center align-items-center">
            <div class="col-6 bg-gd border-right-1 border border-2 ">
                <h4>CheckIn</h4>
            </div>
            <div class="col-6 bg-gd border-right-1 border border-2 ">
                <h4>5.00AM</h4>
            </div>
        </div>
        <div class="row flex justify-content-center align-items-center">
            <div class="col-6 bg-gd border-right-1 border border-2 ">
                <h4>CheckOut</h4>
            </div>
            <div class="col-6 bg-gd border-right-1 border border-2 ">
            <a href = "updateparkingspace.php?id=<?php echo $row1['id'] ?>" class="link-btn font-weight-bold">Check Out</a>
            </div>
        </div>
        <div class="row flex justify-content-center align-items-center">
            <div class="col-6 bg-gd border-right-1 border border-2 ">
                <h4>Bill</h4>
            </div>
            <div class="col-6 bg-gd border-right-1 border border-2 ">
                <h4>- - - Taka</h4>
            </div>
        </div>
        <div class="row flex justify-content-center align-items-center">
            <div class="col-6 text-center mt-3">
                <a href = "updateparkingspace.php?id=<?php echo $row1['id'] ?>" class="link-btn font-weight-bold">Pay Bill</a>
            </div>
            <div class="col-6 text-center mt-3">
               <a class="link-btn" href="">Pay bill</a>
            </div>
        </div>
         
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

</html>