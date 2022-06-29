<?php
    session_start();
    $ownerid = $_SESSION["id"];
    $spotid = $_SESSION['spotid'];

	if( isset($_POST['area']) && isset($_POST['road1']) && isset($_POST['road2']) && isset($_POST['house']) && isset($_POST['spacenum']) ){

		$area = $_POST["area"];
		$road1 = $_POST["road1"];
		$road2 = $_POST["road2"];
		$house = $_POST["house"];
		$spacenum = $_POST["spacenum"];
		$rent = $_POST["rent"];

		if(isset($_FILES['imgfile']) && !empty($_FILES['imgfile'])){
            $img=$_FILES["imgfile"];
            move_uploaded_file($img['tmp_name'],"img/parking/$area$road1$house.jpg");
            $imgurl = "img/parking/$area$road1$house.jpg";
			echo "okkkkkkk";
        }

		try {

			$dbcon = new PDO("mysql:host=localhost:3306;dbname=carparking;","root","");
			$dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$quary = "UPDATE parkingspace SET ownerid='$ownerid',area='$area',road1='$road1',road2='$road2',house='$house',spacenum='$spacenum',img='$imgurl',rent='$rent' WHERE id = '$spotid'";

			try {
				
				$dbcon->exec($quary);
				?>
					<script>window.location.assign('parkinghome.php')</script>
				<?php
			} catch (PDOExpection $ex) {
				?>
					<script>window.location.assign('signup1.php')</script>
				<?php
			}
			
		} catch (PDOExpection $ex) {
			?>
					<script>window.location.assign('signup2.php')</script>
			<?php
		}
	}else{
			?>
				<script>window.location.assign('signup3.php')</script>
			<?php
	}
?>

