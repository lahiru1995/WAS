<?php
session_start();
if(isset($_SESSION["email"])){
session_destroy();
}
include_once 'dbConnection.php';
$ref=@$_GET['q'];
$email = $_POST['email'];
$password = $_POST['password'];
//$v = $_POST['login'];

 
$result = mysqli_query($con,"SELECT * FROM user WHERE email = '$email' and password = '$password' ") or die('Error');
$count=mysqli_num_rows($result);

if($count==1){
while($row = mysqli_fetch_array($result)) {
	$name = $row['name'];
	$v = $row['login'];
}
$_SESSION["name"] = $name;
$_SESSION["email"] = $email;


if($v==0){
	header("location:index.php?q=1");
}elseif($v==1){
	header("location:advicer.php?q=1");
}
elseif($v==2){
	header("location:admin-dashboad.php?q=1");
}elseif($v==5){
	header("location:university-admin.php?q=1");
}elseif($v==4){
	header("location:faculty-admin.php?q=1");
}
//header("location:account.php?q=1");
} 

else{
//header("location:login.php");
header("location:$ref?w=Wrong Username or Password");
//echo '<script>alert("Welcome to Geeks for Geeks")</script>';
}
?>