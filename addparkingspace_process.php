<?php
    session_start();
    $ownerid = $_SESSION["id"];

	if( isset($_POST['district']) && isset($_POST['area']) && isset($_POST['road1']) && isset($_POST['road2']) && isset($_POST['house']) && isset($_POST['spacenum']) ){

		$district = $_POST["district"];
		$area = $_POST["area"];
		$road1 = $_POST["road1"];
		$road2 = $_POST["road2"];
		$house = $_POST["house"];
		$spacenum = $_POST["spacenum"];
		$rent = $_POST["rent"];
		$imgurl = "img/parking/default.jpeg";

		if(isset($_FILES['imgfile']) && !empty($_FILES['imgfile'])){
            $img=$_FILES["imgfile"];
            move_uploaded_file($img['tmp_name'],"img/parking/$area$road1$house.jpg");
            $imgurl = "img/parking/$area$road1$house.jpg";
			echo "ok";
        }

		try {

			$dbcon = new PDO("mysql:host=localhost:3306;dbname=carparking;","root","");
			$dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$quary = "INSERT INTO parkingspace(ownerid, district, area, road1, road2, house, spacenum, img, rent) VALUES('$ownerid','$district','$area','$road1','$road2','$house','$spacenum','$imgurl','$rent')";

			try {
				
				$dbcon->exec($quary);
				?>
					<script>window.location.assign('parkingowner_all_spaces.php')</script>
				<?php
			} catch (PDOExpection $ex) {
				?>
					<script>window.location.assign('signup.php')</script>
				<?php
			}
			
		} catch (PDOExpection $ex) {
			?>
					<script>window.location.assign('signup.php')</script>
			<?php
		}
	}else{
			?>
				<script>window.location.assign('signup.php')</script>
			<?php
	}
?>

