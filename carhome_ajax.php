
<?php
$email = $_GET['email'];
$conn = mysqli_connect("localhost", "root", "", "carparking");
$result = mysqli_query($conn, "SELECT * FROM carowner WHERE email = '$email'");
 
$data = array();
while ($row = mysqli_fetch_object($result))
{
    array_push($data, $row);
}
 
echo json_encode($data);
exit();