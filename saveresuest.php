<?php
 
include_once 'dbConnection.php';
//ob_start();

$teaching_rel = $_POST['teaching_rel'];
$hdr1 = $_POST['hdr1'];
$researc1 = $_POST['researc1'];
$leadership1 = $_POST['leadership1'];
$community1 = $_POST['community1'];
$leave11 = $_POST['leave11'];
$email = $_POST['email'];
$advicer = $_POST['advicer']; 
$Employee_No = $_POST['Employee_No'];
$name = $_POST['name'];
$status = $_POST['status'];
$c=0;

//if (strlen($times) > 200000) {  $times = "";    }

$q3=mysqli_query($con,"INSERT INTO request VALUES  ('$c', '$teaching_rel' , '$hdr1', '$researc1', '$leadership1', '$community1', '$leave11', '$email', '$advicer', '$Employee_No', '$name', '$status')") or die('Error');

echo'<br><div class="alert alert-warning alert-dismissible fade show" role="alert">
<strong>Successfully</strong> send request to your workplan adviver!
<button type="button" class="close" data-dismiss="alert" aria-label="Close"> 
<span aria-hidden="true">&times;</span>
</button>
</div>';

?>