<?php


	if( isset($_POST['fn']) && isset($_POST['ln']) && isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['addr']) && isset($_POST['gender']) && !empty($_POST["pass"]) ){

		$fn = $_POST["fn"];
		$ln = $_POST["ln"];
		$email = $_POST["email"];
		$pass = md5($_POST["pass"]);
		$loc = $_POST["addr"];
		$gender = $_POST["gender"];
		$phone = $_POST["phone"];
		$occ = $_POST["occ"];
		$nid = $_POST["nid"];

		try {

			$dbcon = new PDO("mysql:host=localhost:3306;dbname=carparking;","root","");
			$dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$quary = "INSERT INTO parkingowner(firstname, lastname, gender, email, pass, phone, loc, nid, occ) VALUES('$fn','$ln','$gender','$email','$pass','$phone', '$loc', '$nid', '$occ')";
			echo $quary;

			try {
				
				$dbcon->exec($quary);
				session_start();
                    
				$_SESSION['email']=$email;


				$_SESSION['fn'] = $fn;
				$_SESSION['ln'] = $ln;

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

