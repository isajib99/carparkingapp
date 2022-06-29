<?php
    session_start();
    $ownerid = $_SESSION["id"];
    $spotid = $_SESSION['spotid'];

    try {

        $dbcon = new PDO("mysql:host=localhost:3306;dbname=carparking;","root","");
        $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $quary = "DELETE FROM parkingspace WHERE id = '$spotid'";

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
?>

