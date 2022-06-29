<?php
	session_start();
	$parkingid = $_SESSION['parkingid'];
	$_SESSION['parkingid'] = $parkingid;

	$dbcon = new PDO("mysql:host=localhost:3306;dbname=carparking;","root","");
	$dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	if( isset($_POST['carno']) ){

		date_default_timezone_set("Asia/Dhaka");
		$carno = $_POST["carno"];
		$bookingtime = date('d-m-y h:i:s');

		try {

			$quary = "INSERT INTO bookingdetail(parkingid, carno, bookingtime) VALUES('$parkingid', '$carno', '$bookingtime')";

			try {
				
				$dbcon->exec($quary);

				$query2="SELECT * FROM bookingdetail ORDER BY bid DESC LIMIT 1";

				$returnval2=$dbcon->query($query2);
				$info2 = $returnval2->fetchAll();
				foreach($info2 as $row2){
					$bid = $row2['bid'];
				}

				?>
					<script>window.location.assign("carbookingdetail.php?bid= <?php echo$bid; ?>")</script>
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

